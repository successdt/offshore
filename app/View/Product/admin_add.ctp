
<?php echo $this->Form->create('Product', array(
	'inputDefaults' => array(
		'label' => false
	),
	'type' => 'file'
)); ?>

<div class="new-product">
	<div class="main-input">
		<?php echo $this->Session->flash(); ?>
		<div class="main-input-block" style="padding: 0px;">
			<?php echo $this->Form->input('name', array(
				'placeholder' => __('Product name'),
				'style' => 'width:100%; margin:0px;'
			)) ?>
		</div>
		<div class="main-input-block">
			<div class="main-input-title">
				<?php echo __('Product Description') ?>
			</div>
			<div class="main-input-content">
				<?php echo $this->Form->input('description', array('type' => 'textarea', 'class' => 'desc')) ?>
			</div>
		</div>
		<div class="main-input-block">
			<div class="main-input-title">
				<?php echo __('Short Description') ?>
			</div>
			<div class="main-input-content">
				<?php echo $this->Form->input('short_description', array('type' => 'textarea', 'class' => 'short_desc')) ?>
			</div>
		</div>
		<div class="main-input-block">
			<div class="main-input-title">
				<?php echo __('Product Gallery') ?>
			</div>
			<div class="main-input-content" style="padding: 10px;">
				<?php echo $this->Html->link(__('Add product gallery images'), array(
					'controller' => 'file',
					'action' => 'view',
					'?' =>  array('path' => 'product')
				), array(
					'target' => '_blank'
				) ) ?>
			</div>
		</div>
	</div>
	<div class="side-input">
		<div class="side-input-block">
			<div class="side-input-title">
				<?php echo __('Product Data') ?>
			</div>
			<div class="side-input-content">
				<table>
					<tr>
						<td><?php echo __('Price') ?></td>
						<td><?php echo $this->Form->input('price') ?></td>
					</tr>
					<tr>
						<td><?php echo __('SKU') ?></td>
						<td><?php echo $this->Form->input('sku') ?></td>
					</tr>
					<tr>
						<td><?php echo __('Qty') ?></td>
						<td><?php echo $this->Form->input('qty') ?></td>
					</tr>
					<tr>
						<td><?php echo __('In stock') ?></td>
						<td>
							<?php echo $this->Form->input('is_in_stock', array(
								'type' => 'checkbox',
								'style' => 'width: auto',
								'checked' => 'checked'
							))
							?>
						</td>
					</tr>
				</table>
				
			</div>
		</div>
		<div class="side-input-block">
			<div class="side-input-title">
				<?php echo __('Product Categories') ?>
			</div>
			<div class="side-input-content">
				<div class="margin10" style="overflow: auto; max-height: 400px;">
					<?php echo $this->element('admin/category_tree') ?>
				</div>
				
			</div>
		</div>
		
		<div class="side-input-block">
			<div class="side-input-title">
				<?php echo __('Product Image') ?>
				<span class="pull-right" style="margin-top: -5px;">
					<a class="btn" href="javascript:chooseFile();">
						<?php echo __('Choose File') ?>
					</a>												
				</span>
			</div>
			<div class="side-input-content">
				<table>
					<tr>
						<td>
							<div style="height: 0px; overflow: hidden;">
									<?php echo $this->Form->input('file', array('type' => 'file', 'label' => false, 'id' => 'fileInput')) ?>
							</div>
							<input id="disabledInput" type="text" placeholder="<?php echo __('File path') ?>" disabled>
						</td>

					</tr>
					<tr>
						<td><?php echo $this->Form->input('image_label', array('placeholder' => 'Image label')) ?></td>
					</tr>
				</table>				
			</div>
		</div>
		
		<div class="side-input-block">
			<div class="side-input-title">
				<?php echo __('Action') ?>
			</div>
			<div class="side-input-content">
				<input type="submit" value="<?php echo __('Save') ?>" class="btn btn-success" />
			</div>
		</div>
	</div>
</div>

<?php echo $this->Html->script('tiny_mce', array('inline' => false)) ?>
<?php echo $this->Html->scriptStart(array('inline' =>false)) ?>
//<script>
$(document).ready(function(){
	tinymce.init({
		selector: "textarea.desc",
		height : 500
	});
	tinymce.init({
		selector: "textarea.short_desc",
		height : 200
	});
	$("#fileInput").change(function(){
		$('#disabledInput').val($(this).val());
	});
});
function chooseFile() {
  $("#fileInput").click();
}
<?php echo $this->Html->scriptEnd() ?>