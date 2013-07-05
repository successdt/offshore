<?php echo $this->Form->create('User', array(
	'inputDefaults' => array(
		'label' => false
	)
)); ?>

<div class="new-product">
	<div class="main-input">
		<div class="main-input-block" style="border-radius: 7px;">
			<div class="main-input-content">
				<table class="main-manager-table">
					<tr>
						<td class="main-header">
							<div class="main-header-content">
								<div class="pull-left margin10">
									<p class="h1">Users Manager</p>
								</div>
								<div class="pull-left margin10">	
									<select>
									  <option value="all">Show all owner</option>
									  <option value="saab">Saab</option>
									  <option value="opel">Opel</option>
									  <option value="audi">Audi</option>
									</select>			
								</div>
								<div class="pull-left margin10">
									<button class="btn"><?php echo __('Filter') ?></button>	
								</div>
								<div class="pull-right margin10">
									<button class="btn btn-success">New</button>
									<button class="btn">Action</button>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td class="main-content-bg">
							<div class="main-content">
								<div class="pull-left margin10 bold-link">Total 4 items</div>
								<div class="pull-right margin10">
									<button class="btn">Prev</button>
									<button class="btn">0</button>
									<button class="btn">1</button>
									<button class="btn">2</button>
									<button class="btn">Next</button>
								</div>
								<table class="manager-table">
									<thead class="text-color1">
										<th style="width: 20px;"><input type="checkbox" /></th>
										<th class="active"><?php echo __('ID') ?></th>
										<th><?php echo __('Name') ?></th>
										<th><?php echo __('Owner') ?></th>
										<th><?php echo __('Status') ?></th>
									</thead>
									<tbody >
										<tr>
											<td><input type="checkbox" /></td>
											<td>1</td>
											<td class="text-left">Cart</td>
											<td>Super Admin</td>
											<td>13/06/2013</td>
										</tr>
										<tr class="bg-style1">
											<td><input type="checkbox" /></td>
											<td>2</td>
											<td class="text-left">Downloads</td>
											<td>Admin</td>
											<td>13/06/2013</td>
										</tr>
										<tr>
											<td><input type="checkbox" /></td>
											<td>3</td>
											<td class="text-left">Contact</td>
											<td>Admin</td>
											<td>13/06/2013</td>
										</tr>
										<tr class="bg-style1">
											<td><input type="checkbox" /></td>
											<td>4</td>
											<td class="text-left">Shop</td>
											<td>Admin</td>
											<td>13/06/2013</td>
										</tr>
									</tbody>
								</table>
							</div>
						</td>	
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="side-input">
		<div class="side-input-block">
			<div class="side-input-title">
				<?php echo __('New User') ?>
			</div>
			<div class="side-input-content">
				<table>
					<tr>
						<td><?php echo __('UserName') ?></td>
						<td><?php echo $this->Form->input('username') ?></td>
					</tr>
					<tr>
						<td><?php echo __('Password') ?></td>
						<td><?php echo $this->Form->input('password', array('type' => 'password')) ?></td>
					</tr>
					<tr>
						<td><?php echo __('First Name') ?></td>
						<td><?php echo $this->Form->input('firstname') ?></td>
					</tr>
					<tr>
						<td><?php echo __('Last Name') ?></td>
						<td><?php echo $this->Form->input('lastname') ?></td>
					</tr>
					
					<tr>
						<td><?php echo __('Type') ?></td>
						<td>
							<?php echo $this->Form->select('parent_id', array(
								1 => 'Super Admin',
								2 => 'Admin'
							), array('empty' => false)); ?>
						</td>
					</tr>
					<tr>
						<td><?php echo __('Active') ?></td>
						<td><?php echo $this->Form->input('is_active', array(
							'type' => 'checkbox',
							'style' => 'width: auto'
						)) ?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" value="<?php echo __('Create') ?>" class="btn btn-success" style="width: auto;"/>
						</td>
					</tr>
				</table>
				
			</div>
		</div>
	</div>
</div>

<div class="main">

</div>
