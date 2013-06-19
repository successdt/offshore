<?php echo $this->Form->create('Product', array(
	'inputDefaults' => array(
		'label' => false
	)
)); ?>

<div class="new-product">
	<div class="main-input">
		<div>
			<?php echo $this->Form->input('name', array('placeholder' => __('Product name'))) ?>
		</div>
		<div>
			<?php echo $this->Form->input('Description', array(
				'type' => 'textarea'
			)) ?>			
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
						<td><?php echo __('In stock') ?></td>
						<td>
							<?php echo $this->Form->input('is_in_stock', array(
								'type' => 'checkbox',
								'style' => 'width: auto'
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
				<?php echo $this->Form->input('cat_1', array('type' => 'checkbox')) ?>
			</div>
		</div>
		<div class="side-input-block">
			<div class="side-input-title">
				<?php echo __('Product Gallery') ?>
			</div>
			<div class="side-input-content">
				<?php echo $this->Html->link(__('Add product gallery images'), '#') ?>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Form->end(array('label' => 'Save', 'class' => 'btn')) ?>
<?php echo $this->Html->script('tiny_mce', array('inline' => false)) ?>
<?php echo $this->Html->scriptStart(array('inline' =>false)) ?>
//<script>
$(document).ready(function(){
	tinymce.init({
		selector: "textarea"
	});
});
<?php echo $this->Html->scriptEnd() ?>