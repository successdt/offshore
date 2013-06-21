<?php echo $this->Form->create('Product', array(
	'inputDefaults' => array(
		'label' => false
	)
)); ?>

<div class="new-product">
	<div class="main-input">
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
				<?php echo $this->Form->input('description', array('type' => 'textarea')) ?>
			</div>
		</div>
		<div class="main-input-block">
			<div class="main-input-title">
				<?php echo __('Short Description') ?>
			</div>
			<div class="main-input-content">
				<?php echo $this->Form->input('short_description', array('type' => 'textarea')) ?>
			</div>
		</div>
		<div class="main-input-block">
			<div class="main-input-title">
				<?php echo __('Product Gallery') ?>
			</div>
			<div class="main-input-content" style="padding: 10px;">
				<?php echo $this->Html->link(__('Add product gallery images'), '#') ?>
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
				<div class="margin10" style="overflow: auto; max-height: 400px;">
					<ul class="category-list-input">
						<li>
							<?php echo $this->Form->input('cat_1', array('type' => 'checkbox', 'div' => false)) ?>
							Mobile
							<ul class="category-list-input">
								<li><?php echo $this->Form->input('cat_1', array('type' => 'checkbox', 'div' => false)) ?>Nokia</li>
								<li><?php echo $this->Form->input('cat_1', array('type' => 'checkbox', 'div' => false)) ?>Samsung</li>
								<li><?php echo $this->Form->input('cat_1', array('type' => 'checkbox', 'div' => false)) ?>Apple</li>
							</ul>
							
						</li>
						<li>
							<?php echo $this->Form->input('cat_1', array('type' => 'checkbox', 'div' => false)) ?>
							Tablet
							<ul class="category-list-input">
								<li><?php echo $this->Form->input('cat_1', array('type' => 'checkbox', 'div' => false)) ?>Asus</li>
								<li><?php echo $this->Form->input('cat_1', array('type' => 'checkbox', 'div' => false)) ?>Samsung</li>
								<li><?php echo $this->Form->input('cat_1', array('type' => 'checkbox', 'div' => false)) ?>Apple</li>
							</ul>						
						</li>
					</ul>
				</div>
				
			</div>
		</div>

		<div class="side-input-block">
			<div class="side-input-title">
				<?php echo __('Action') ?>
			</div>
			<div class="side-input-content">
				<input type="submit" value="<?php echo __('Save') ?>" class="btn btn-success" />
				<button class="btn btn-danger"><?php echo __('Delete') ?></button>
			</div>
		</div>
	</div>
</div>

<?php echo $this->Html->script('tiny_mce', array('inline' => false)) ?>
<?php echo $this->Html->scriptStart(array('inline' =>false)) ?>
//<script>
$(document).ready(function(){
	tinymce.init({
		selector: "textarea"
	});
});
<?php echo $this->Html->scriptEnd() ?>