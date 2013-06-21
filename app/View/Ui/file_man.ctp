
<div class="new-product">
	<div class="main-input">
		<div class="main-input-block">
			<div class="main-input-title">
				<span>Folder Name</span>
				<span class="pull-right" style="margin-top: -5px;">
					<a href="#" class="btn">
						<?php echo __('Up') ?>
					</a>
					<a href="#" class="btn">
						<?php echo __('Rename') ?>
					</a>
					<a href="#" class="btn">
						<?php echo __('Move') ?>
					</a>
					<a href="#" class="btn">
						<?php echo __('Copy') ?>
					</a>
					<a href="#" class="btn btn-danger">
						<?php echo __('Delete') ?>
					</a>

				</span>
			</div>
			<div class="main-input-content" >
				<div style="min-height: 500px; background-color: #FFF; margin: 10px; overflow: auto;">
				
					<table class="manager-table" style="text-align: left;">
						<thead class="text-color1">
							<th style="width: 20px;"><input type="checkbox" /></th>
							<th><?php echo __('Name') ?></th>
							<th><?php echo __('Permissions') ?></th>
							<th><?php echo __('Size') ?></th>
							<th><?php echo __('Modified') ?></th>
							<th><?php echo __('Type') ?></th>
						</thead>
						<tbody >
							<tr style="cursor: pointer;">
								<td><input type="checkbox" /></td>
								<td>
									<i class="icon icon-folder-open"></i>
									test
								</td>
								<td>read</td>
								<td>256KB</td>
								<td>2013/06/21 14:42 PM</td>
								<td>folder</td>
							</tr>
							<tr style="cursor: pointer;">
								<td><input type="checkbox" /></td>
								<td>
									<i class="icon icon-file"></i>
									test.php
								</td>
								<td>read</td>
								<td>256KB</td>
								<td>2013/06/21 14:42 PM</td>
								<td>php</td>
							</tr>
							<?php for($i = 0; $i < 4; $i++): ?>
							<tr style="cursor: pointer;">
								<td><input type="checkbox" /></td>
								<td>
									<i class="icon icon-picture"></i>
									test.jpg
								</td>
								<td>read</td>
								<td>256KB</td>
								<td>2013/06/21 14:42 PM</td>
								<td>JPG</td>
							</tr>
							<?php endfor ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="side-input">

		<div class="side-input-block">
			<div class="side-input-title">
				<?php echo __('Folder Tree') ?>
			</div>
			<div class="side-input-content">
				<div style="max-height: 300px; overflow: auto; background-color: #FFF;">
					<ul class="category-list-input">
						<li>
							<a href="#">
								<i class="icon icon-folder-open"></i> img
							</a>
							
							<ul  class="category-list-input">
								<li>
									<a href="#">
										<i class="icon icon-folder-open"></i> icon
									</a>
									
								</li>
								<li>
									<a href="#">
										<i class="icon icon-folder-open"></i> upload
									</a>
									
								</li>
							</ul>
						</li>
					</ul>				
				</div>
			</div>
		</div>
		<div class="side-input-block">
			<div class="side-input-title">
				<?php echo __('Preview') ?>
			</div>
			<div class="side-input-content">
				<div class="file-man-preview">
					<?php echo $this->Html->image('icons/header_bg.jpg') ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $this->Html->scriptStart(array('inline' =>false)) ?>
//<script>
$(document).ready(function(){
});
<?php echo $this->Html->scriptEnd() ?>