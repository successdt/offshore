<?php echo $this->Form->create('Product', array(
	'inputDefaults' => array(
		'label' => false
	)
)); ?>

<div class="new-product">
	<div class="main-input">
		<div class="main-input-block" style="padding: 0px;">
			<?php echo $this->Form->input('name', array(
				'placeholder' => __('Page title'),
				'style' => 'width:100%; margin:0px;'
			)) ?>
		</div>
		<div class="main-input-block">
			<div class="main-input-title">
				<?php echo __('Page Content') ?>
			</div>
			<div class="main-input-content">
				<?php echo $this->Form->input('content', array('type' => 'textarea', 'class' => 'full-edit')) ?>
			</div>
		</div>
		<div class="main-input-block">
			<div class="main-input-title">
				<?php echo __('Page Description') ?>
			</div>
			<div class="main-input-content">
				<?php echo $this->Form->input('description', array('type' => 'textarea')) ?>
			</div>
		</div>
		<div class="main-input-block">
			<div class="main-input-title">
				<?php echo __('Page Gallery') ?>
			</div>
			<div class="main-input-content" style="padding: 10px;">
				<?php echo $this->Html->link(__('Add page gallery images'), '#') ?>
			</div>
		</div>
	</div>
	<div class="side-input">
		<div class="side-input-block">
			<div class="side-input-title">
				<?php echo __('Settings') ?>
			</div>
			<div class="side-input-content">
				<?php echo $this->Form->input('is_active', array(
					'type' => 'checkbox',
					'style' => 'width: auto',
					'label' => 'Enable'
				))
				?>
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
		selector: "textarea.full-edit"
	});
});
<?php echo $this->Html->scriptEnd() ?>