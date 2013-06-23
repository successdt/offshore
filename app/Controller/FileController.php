<?php
/**
 * admin file manager
 * @author duythanhdao@live.com
 */
class FileController extends AppController{
	public $name = 'file';
	public $uses = array();
	public $layout = 'admin';
	
	public function admin_view(){
		$dir = WWW_ROOT . 'img';
		$folderMap = $this->getHmtlFolderMap($dir);
		$folderSelect = $this->getFolderWithRadioGroup($dir);
		if(isset($_GET['path']) && $_GET['path']){
			$path = $_GET['path'];
			$path = ltrim($path, '/');
			$path = ltrim($path, '\\');
			$dir .= DS . $path;
			$currentPath = $path;
			$parentPath = str_replace(WWW_ROOT . 'img' . DS, '', (dirname($dir)));
			$parentPath = str_replace(WWW_ROOT . 'img', '', (dirname($dir)));
		}
		else {
			$parentPath = '';
			$path = 'img';
			$currentPath = '';
		}
			
		if(is_dir($dir)){
			$listFiles = $this->getListFiles($dir);
			$data = array(
				'current_name' => $path,
				'list_file' => $listFiles,
				'dir_map' => $folderMap,
				'dir_select' => $folderSelect,
				'parent_path' => $parentPath,
				'current_path' => $currentPath	
			);
			$this->set('data', $data);		
		}			

	}
	
	public function admin_rename(){
		$dir = WWW_ROOT . 'img';
		if(isset($_GET['from']) && $_GET['from'] && isset($_GET['to']) && $_GET['to']){
			$from = $dir . DS . $_GET['from'];
			$to = $dir . DS . $_GET['to'];
			rename($from, $to);
		}
		$this->redirect(array('controller' => 'file', 'action' => 'view'));
	}
	public function admin_delete(){
		$dir = WWW_ROOT . 'img';
		if(isset($this->request->data) && ($data = $this->request->data)){
			$files = json_decode($data['list-file']);
			foreach($files as $file){
				if(is_dir($dir . DS . $file)){
					rmdir($dir . DS . $file);
				}
				else {
					unlink($dir . DS . $file);
				}
				
			}
		}
		$this->redirect(array('controller' => 'file', 'action' => 'view'));	
	}
	public function admin_move(){
		$dir = WWW_ROOT . 'img';
		$param = '';
		if(isset($this->request->data) && ($data = $this->request->data)){
			$files = json_decode($data['list-move-file']);
			if(isset($data['move-file-path'])){
				foreach($files as $file){
					$dest = $data['move-file-path'];
					$param = $dest;
					$path = $dir . DS . $file;
					$dest = $dir . DS . $dest;
					$exploded = explode('/', $file);
					$fileName = explode('\\', end($exploded));
					if (copy($path, $dest . DS . end($fileName))) {
						  unlink($path);
					}
				}				
			}
			

		}
		$this->redirect(array('controller' => 'file', 'action' => 'view', '?' => array('path' => $param)));			
	}
	public function admin_copy(){
		$dir = WWW_ROOT . 'img';
		$param = '';
		if(isset($this->request->data) && ($data = $this->request->data)){
			$files = json_decode($data['list-copy-file']);
			if(isset($data['move-file-path'])){
				foreach($files as $file){
					$dest = $data['move-file-path'];
					$param = $dest;
					$path = $dir . DS . $file;
					$dest = $dir . DS . $dest;
					$exploded = explode('/', $file);
					$fileName = explode('\\', end($exploded));
					copy($path, $dest . DS . end($fileName));
				}				
			}
			

		}
		$this->redirect(array('controller' => 'file', 'action' => 'view', '?' => array('path' => $param)));			
	}
	public function admin_newdir(){
		$dir = WWW_ROOT . 'img';
		$param = '';
		if(isset($this->request->data) && ($data = $this->request->data)){
			if(isset($data['new-dir-name']) && $data['new-dir-name']){
				$param = $data['new-dir-path'];
				mkdir($dir . DS . $param . DS . $data['new-dir-name']);
			}
				
		}
		$this->redirect(array('controller' => 'file', 'action' => 'view', '?' => array('path' => $param)));			
	}
	public function admin_upload(){
		$this->layout = 'popup';
		$dir = WWW_ROOT . 'img';
		$data = array(
			'path' => '',
			'success' => false
		);
		$imgFormat = array('image/gif', 'image/jpeg', 'image/pjeg', 'image/png');
		if(isset($_GET['path']) && $uploadPath = $_GET['path']){
			$data['path'] = $uploadPath;
		}
		if (!empty($_FILES) && in_array($_FILES["data"]["type"]["file"], $imgFormat)) {
			$path = $dir . DS . $data['path'];
			if (!is_dir($path)) {
				mkdir($path, 0777, true);
				chmod($path, 0777);
			}
			
			$tmp = $path . DS . $_FILES["data"]["name"]["file"];
			
						
			$data['success'] = move_uploaded_file($_FILES['data']['tmp_name']["file"], $tmp);
		}
		$this->set('data', $data);
		
	}
	public function getListFiles($dir){
		$files = scandir($dir);
		$listFile = array(
			'dir' => array(),
			'file' => array()
		);
		$cleanPath = rtrim($dir, '/'). '/';
		
		
	    foreach($files as $t) {
	    	$path = str_replace(WWW_ROOT . 'img', '', $cleanPath) . $t;
	    	$path = ltrim($path, '/');
	    	$path = ltrim($path, '\\');
	        if ($t<>"." && $t<>".." && is_dir($dir . DS . $t)) {
	        	$size = $this->folderSize($dir . DS . $t);
	        	
	        	$listFile['dir'][] = array(
					'name' => $t,
					'size' => $this->sizeFormat($size),
					'permissions' => fileperms($cleanPath . $t),
					'last_modified' => date ("Y/m/d H:i:s", filemtime($cleanPath . $t)),
					'path' => $path
				);
	        }
	        elseif(filetype($cleanPath . $t) == 'file') {
	        	$tmp = explode('.', $t);
	        	$listFile['file'][] = array(
					'name' => $t,
					'size' => filesize($cleanPath . $t),
					'type' => end($tmp),
					'permissions' => fileperms($cleanPath . $t),
					'last_modified' => date ("Y/m/d H:i:s", filemtime($cleanPath . $t)),
					'path' => $path
				);
	        }
	    }
	    return $listFile;
	}

	public function folderSize($path) {
	    $totalSize = 0;
	    $files = scandir($path);
	    $cleanPath = rtrim($path, '/'). '/';
	
	    foreach($files as $t) {
	        if ($t<>"." && $t<>"..") {
	            $currentFile = $cleanPath . $t;
	            if (is_dir($currentFile)) {
	                $size = $this->folderSize($currentFile, true);
	                $totalSize += $size;
	            }
	            else {
	                $size = filesize($currentFile);
	                $totalSize += $size;
	            }
	        }   
	    }
		return $totalSize;
	}
	
	public function folderMap($path){
	    $files = scandir($path);
	    $cleanPath = rtrim($path, '/'). '/';
	    $map = array();
	    foreach($files as $t) {
	        if ($t<>"." && $t<>"..") {
	            $currentFile = $cleanPath . $t;
	            if (is_dir($currentFile)) {
	            	$map[] = array(
						'child' => $this->folderMap($currentFile),
						'name' => $t
					);
	            }
	        }
	    }
	    return $map;
	}
	
	public function getHmtlFolderMap($path){
	    $files = scandir($path);
	    $cleanPath = rtrim($path, '/'). '/';
	    $map = array();
	    $html = array();
	    foreach($files as $t) {
	        if ($t<>"." && $t<>"..") {
	            $currentFile = $cleanPath . $t;
	            $path = str_replace(WWW_ROOT . 'img', '', $cleanPath) . $t;
		    	$path = ltrim($path, '/');
		    	$path = ltrim($path, '\\');
	            if (is_dir($currentFile)) {
	            	$html[] = '							
						<li>
							<a href="javascript:view(\'' . $path . '\')">
								<i class="icon icon-folder-open"></i> ' . $t . '
							</a>
							<ul  class="category-list-input">
								' . $this->getHmtlFolderMap($currentFile) . '
							</ul>
						</li>';
	            	$map[] = array(
						'child' => $this->folderMap($currentFile),
						'name' => $t
					);
	            }
	        }
	    }
	    return implode('', $html);
	}
	
	public function getFolderWithRadioGroup($path){
	    $files = scandir($path);
	    $cleanPath = rtrim($path, '/'). '/';
	    $map = array();
	    $html = array();
	    foreach($files as $t) {
	        if ($t<>"." && $t<>"..") {
	            $currentFile = $cleanPath . $t;
	            $path = str_replace(WWW_ROOT . 'img', '', $cleanPath) . $t;
		    	$path = ltrim($path, '/');
		    	$path = ltrim($path, '\\');
	            if (is_dir($currentFile)) {
	            	$html[] = '							
						<li>
							<input type="radio" name="move-file-path" value="' . $path . '">' . $t . '
							<ul  class="category-list-input">
								' . $this->getFolderWithRadioGroup($currentFile) . '
							</ul>
						</li>';
	            	$map[] = array(
						'child' => $this->folderMap($currentFile),
						'name' => $t
					);
	            }
	        }
	    }
	    return implode('', $html);
	}
	
	public function sizeFormat($size){
		return round($size / 1024);
	}
}