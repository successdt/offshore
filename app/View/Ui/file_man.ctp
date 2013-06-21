
<div class="new-product">
	<div class="main-input">
		<div class="main-input-block">
			<div class="main-input-title">
				Folder Name
			</div>
			<div class="main-input-content" >
				<div style="min-height: 500px; background-color: #FFF; margin: 10px;"></div>
			</div>
		</div>
	</div>
	<div class="side-input">
		<div class="side-input-block">
			<div class="side-input-title">
				<?php echo __('Parent Category') ?>
			</div>
			<div class="side-input-content">
				<?php echo $this->Form->select('parent_id', array(
					1 => 'mobile',
					2 => 'nokia',
					3 => 'apple',
					4 => 'tablet'
				), array('empty' => false)); ?>
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

<?php echo $this->Html->scriptStart(array('inline' =>false)) ?>
//<script>
$(document).ready(function(){
});
<?php echo $this->Html->scriptEnd() ?>