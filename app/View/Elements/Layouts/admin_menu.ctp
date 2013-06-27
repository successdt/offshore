<div class="navbar navbar-fixed-top navigator">
	<div class="navbar-inner">
		<ul class="nav">
			<li>
				<a href="<?php echo $this->Html->url(array('controller' => 'ui', 'action' => 'dashboard')) ?>">
					<i class="icon-home"></i>
					Dashboard
				</a>
			</li>
			<li class="divider-vertical"></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					Category
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo $this->Html->url(array('controller' => 'ui', 'action' => 'newCat')) ?>">New Category</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array('controller' => 'ui', 'action' => 'catMan')) ?>">Manage Categories</a>
					</li>
				</ul>
				
			</li>
			<li class="divider-vertical"></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					Product
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo $this->Html->url(array('controller' => 'Product', 'action' => 'add')) ?>">New Product</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array('controller' => 'ui', 'action' => 'productMan')) ?>">Manage Products</a>
					</li>
					<li>
						<a href="#">Promotion</a>
					</li>
					<li>
						<a href="#">Order</a>
					</li>
				</ul>
			</li>
			<li class="divider-vertical"></li>
			<li class="dropdown">
				<a href="#"  class="dropdown-toggle" data-toggle="dropdown">
					Page
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo $this->Html->url(array('controller' => 'ui', 'action' => 'newPage')) ?>">New Page</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array('controller' => 'ui', 'action' => 'pageMan')) ?>">Manage Pages</a>
					</li>
				</ul>
			</li>
			<li class="divider-vertical"></li>
			<li class="dropdown">
				<a href="<?php echo $this->Html->url(array('controller' => 'ui', 'action' => 'userMan')) ?>">Users</a>
			</li>
			<li class="divider-vertical"></li>
			<li class="dropdown">
				<a href="#"  class="dropdown-toggle" data-toggle="dropdown">
					System
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo $this->Html->url(array('controller' => 'file', 'action' => 'view')) ?>">File Manager</a>
					</li>
					<li>
						<a href="#">Social Connection</a>
					</li>
					<li>
						<a href="#">Contact</a>
					</li>
					<li>
						<a href="<?php echo $this->Html->url(array('controller' => 'ui', 'action' => 'configure')) ?>">Configure</a>
					</li>
				</ul>
			</li>
			<li class="divider-vertical"></li>
		</ul>
		<div class="pull-right margin10">Last login: Thursday, May 23, 2013</div>
	</div>
</div>