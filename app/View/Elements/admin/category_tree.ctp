<?php
function addCategory($categories){
	$categoryTree = '';
	foreach ($categories as $category){
		$id = $category['Category']['id'];
		$name = $category['Category']['name'];
		$categoryTree .= '<li>' . 
		 	'<input type="checkbox" name="data[category_id][]"  value="'. $id . '" id="category_id'. $id . '"/>' .
			$category['Category']['name'] . '<ul class="category-list-input">';
		$categoryTree .= addCategory($category['child']);
		$categoryTree .= '</ul></li>';
	}
	return $categoryTree;
}

$categoryTree = '';
if(isset($data['category'])){
	$categoryTree = addCategory($data['category']);
}
?>
<ul class="category-list-input">
	<?php echo $categoryTree; ?>					
</ul>
