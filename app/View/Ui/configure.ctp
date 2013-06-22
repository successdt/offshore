<?php echo $this->Form->create('Config', array(
	'inputDefaults' => array(
		'label' => false
	)
)); ?>
<div class="admin-config pull-left">
	<div class="main-input-block">
		<div class="main-input-title">
			<?php echo __('General') ?>
			<span class="pull-right" style="margin-top: -5px;">
				<a href="#" class="btn btn-success">
					<?php echo __('Save') ?>
				</a>
			</span>
		</div>
		<div class="main-input-content">
			<table style="width: 100%; margin: 5px 0px 5px 5px;">
				<tr>
					<td>
						<?php echo __('Language') ?>
					</td>
					<td>
						<?php echo $this->Form->select('language', array(
							1 => 'Vietnamese',
							2 => 'Japanese',
							3 => 'English',
							4 => 'Chinese'
						), array('empty' => false));
						?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo __('Currency') ?>
					</td>
					<td>
						<?php echo $this->Form->select('language', array(
							1 => 'US Dollar',
							2 => 'Vietnamese Dong',
							3 => 'Japanese Yen',
						), array('empty' => false));
						?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo __('Shop name') ?>
					</td>
					<td>
						<?php echo $this->Form->input('shop_name') ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo __('Telephone') ?>
					</td>
					<td>
						<?php echo $this->Form->input('telephone') ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo __('Email') ?>
					</td>
					<td>
						<?php echo $this->Form->input('email') ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo __('Address') ?>
					</td>
					<td>
						<?php echo $this->Form->input('address', array('type' => 'textarea')) ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo __('Product per page') ?>
					</td>
					<td>
						<?php echo $this->Form->input('product_per_page') ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo __('Copyright') ?>
					</td>
					<td>
						<?php echo $this->Form->input('copyright', array('type' => 'textarea')) ?>
					</td>
				</tr>
			</table>
		</div>
	</div>

</div>
<div class="admin-config pull-right">
	<div class="main-input-block">
		<div class="main-input-title">
			<?php echo __('SMTP Email') ?>
			<span class="pull-right" style="margin-top: -5px;">
				<a href="#" class="btn btn-success">
					<?php echo __('Save') ?>
				</a>
			</span>
		</div>
		<div class="main-input-content">
			<table style="width: 100%; margin: 5px 0px 5px 5px;">
				<tr>
					<td>
						<?php echo __('Username') ?>
					</td>
					<td>
						<?php echo $this->Form->input('smtp_username') ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo __('Password') ?>
					</td>
					<td>
						<?php echo $this->Form->input('smpt_password') ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo __('Host') ?>
					</td>
					<td>
						<?php echo $this->Form->input('smtp_host') ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo __('Port') ?>
					</td>
					<td>
						<?php echo $this->Form->input('smtp_port') ?>
					</td>
				</tr>				
			</table>
		</div>
	</div>
</div>
