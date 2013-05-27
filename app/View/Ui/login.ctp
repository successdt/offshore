<div class="login-form btn-success">
	<h1>Login to Admin Panel</h1>
	<hr />
	<?php 
	echo $this->Form->create('User');
	echo $this->Form->input('username');
	echo $this->Form->input('password');
	echo $this->Form->end(array('label' => 'Login', 'class' => 'btn'));
	?>
</div>