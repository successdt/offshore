<?php echo $this->Form->create('Page', array(
	'inputDefaults' => array(
		'label' => false
	)
)); ?>

<div class="new-product">
	<div class="main-input">
		<?php echo $this->Session->flash(); ?>
		<div class="main-input-block" style="padding: 0px;">
			<?php echo $this->Form->input('title', array(
				'placeholder' => __('Page title'),
				'style' => 'width:100%; margin:0px;',
				'value' => isset($data['page']['title']) ? $data['page']['title'] : ''
			)) ?>
		</div>
		<div class="main-input-block">
			<div class="main-input-title">
				<?php echo __('Page Content') ?>
			</div>
			<div class="main-input-content">
				<?php echo $this->Form->input('content', array(
					'type' => 'textarea',
					'class' => 'full-edit',
					'value' => isset($data['page']['content']) ? $data['page']['content'] : ''
				)) ?>
			</div>
		</div>
		<div class="main-input-block">
			<div class="main-input-title">
				<?php echo __('Page Description') ?>
			</div>
			<div class="main-input-content">
				<?php echo $this->Form->input('description', array(
					'type' => 'textarea',
					'value' => isset($data['page']['description']) ? $data['page']['description'] : ''
				)) ?>
			</div>
		</div>
		<div class="main-input-block">
			<div class="main-input-title">
				<?php echo __('Meta Description') ?>
			</div>
			<div class="main-input-content">
				<?php echo $this->Form->input('meta_description', array(
					'type' => 'textarea',
					'value' => isset($data['page']['meta_description']) ? $data['page']['meta_description'] : ''
				)) ?>
			</div>
		</div>
				
		<div class="main-input-block">
			<div class="main-input-title">
				<?php echo __('Meta Keyword') ?>
			</div>
			<div class="main-input-content">
				<?php echo $this->Form->input('meta_keyword', array(
					'type' => 'textarea',
					'value' => isset($data['page']['meta_keyword']) ? $data['page']['meta_keyword'] : ''
				)) ?>
			</div>
		</div>			
	</div>
	<div class="side-input">
		<div class="side-input-block">
			<div class="side-input-title">
				<?php echo __('Settings') ?>
			</div>
			<div class="side-input-content">
				<?php echo $this->Form->input('is_actived', array(
					'type' => 'checkbox',
					'style' => 'width: auto',
					'label' => 'Enable',
					'value' => '1',
					'checked' => (isset($data['page']['is_actived']) && (!$data['page']['is_actived'])) ? '' : 'checked'
				))
				?>
			</div>
		</div>
		
		<div class="side-input-block">
			<div class="side-input-title">
				<?php echo __('Page Gallery') ?>
			</div>
			<div class="main-input-content" style="padding: 10px;">
				<?php echo $this->Html->link(__('Add page gallery images'), array(
					'controller' => 'file',
					'action' => 'view'
				), array(
					'target' => '_blank'
				) ) ?>
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
		selector: "textarea.full-edit",
		height : 500
	});
});
<?php echo $this->Html->scriptEnd() ?>