<?php 
	$data['sort']['sort'] = isset($data['sort']['sort']) ? $data['sort']['sort'] : '';
	$data['sort']['direction'] = isset($data['sort']['direction']) ? $data['sort']['direction'] : '';
?>
<div class="main">
	<table class="main-manager-table">
		<tr>
			<td class="main-header">
				<div class="main-header-content">
					<div class="pull-left margin10">
						<p class="h1">Products Manager</p>					

					</div>
					<div class="pull-left margin10">
						<form name="product" action="<?php echo $this->Html->url(array('controller' => 'product', 'action' => 'manage')) ?>" method="GET">
						<?php echo $this->Form->input('category_id', array(
							'type' => 'select',
							'name' => 'category_id',
							'options' => $data['category'],
							'label' => false,
							'empty' => __('Choose Category')
						)) ?>	
					</div>
					<div class="pull-left margin10">
						<?php
						//form
					 	echo $this->Form->end(array(
							'class' => 'btn',
							'label' => __('Filter') 
						)) ?>
					</div>
					<div class="pull-right margin10">
						<ul style="list-style-type: none;">
							<li class="dropdown pull-left" style="margin: 0px 10px;">
								<a href="#" class="dropdown-toggle btn" data-toggle="dropdown">
									<?php echo __('Choose Action') ?>
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="javascript:del()"><?php echo __('Delete') ?></a>
									</li>
								</ul>
							</li>
							<li class="pull-left">		
								<?php echo $this->Html->link(__('New'), array(
									'controller' => 'product',
									'action' => 'add'
								), array(
									'class' => 'btn btn-success',
									'tilte' => __('New Product')
								)); ?>							
							</li>

						</ul>

						

					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td class="main-content-bg">
				<div class="main-content">
					<div class="pull-left margin10 bold-link">
						<?php echo $this->Paginator->counter(
						    'Page {:page} of {:pages}, showing {:current} records out of
						     {:count} total'
						); ?>
					</div>
					<div class="pull-left margin10">
	
					</div>
					<div class="pull-right margin10">
						<?php echo $this->Paginator->first('<<', array(
							'class' => 'btn page-number',
							'tag' => 'span'
						)); ?>	
						<?php echo $this->Paginator->prev(__('<'), array(
							'class' => 'btn',
							'tag' => false
						), null, array(
							'class' => 'prev disabled btn',
							
						)); ?>	
						<?php echo $this->Paginator->numbers(array(
							'first' => 2,
							'last' => 2,
							'class' => 'btn page-number',
							'currentClass' => 'disabled',
							'currentTag' => 'span',
							'tag' => 'span',
							'separator' => ' '
						)); ?>
						<?php echo $this->Paginator->next(__('>'), array(
							'class' => 'btn',
							'tag' => false
						), null, array(
							'class' => 'next disabled btn',
							
						)); ?>
						<?php echo $this->Paginator->last('>>', array(
							'class' => 'btn page-number',
							'tag' => 'span'
						)); ?>							
					</div>
					<table class="manager-table"  style="text-align: left;">
						<thead class="text-color1">
							<th style="width: 20px; text-align: center;">
								<input type="checkbox" class="check-all" onclick="selectAll()" />
							</th>
							<th class="sort-enable <?php echo ($data['sort']['sort'] == 'id') ? 'active' : '' ?>">
								<?php if(($data['sort']['sort'] == 'id') && ($data['sort']['direction'] == 'desc')): ?>
									<i class="icon icon-arrow-down"></i>
								<?php endif; ?>
								<?php if(($data['sort']['sort'] == 'id') && ($data['sort']['direction'] == 'asc')): ?>
									<i class="icon icon-arrow-up"></i>
								<?php endif; ?>
								<?php echo $this->Paginator->sort('id', __('ID')) ?>
							</th>
							<th class="sort-enable <?php echo ($data['sort']['sort'] == 'name') ? 'active' : '' ?>">
								<?php if(($data['sort']['sort'] == 'name') && ($data['sort']['direction'] == 'desc')): ?>
									<i class="icon icon-arrow-down"></i>
								<?php endif; ?>
								<?php if(($data['sort']['sort'] == 'name') && ($data['sort']['direction'] == 'asc')): ?>
									<i class="icon icon-arrow-up"></i>
								<?php endif; ?>
								<?php echo $this->Paginator->sort('name', __('Name')) ?>
							</th>
							<th class="sort-enable <?php echo ($data['sort']['sort'] == 'sku') ? 'active' : '' ?>">
								
								<?php if(($data['sort']['sort'] == 'sku') && ($data['sort']['direction'] == 'desc')): ?>
									<i class="icon icon-arrow-down"></i>
								<?php endif; ?>
								<?php if(($data['sort']['sort'] == 'sku') && ($data['sort']['direction'] == 'asc')): ?>
									<i class="icon icon-arrow-up"></i>
								<?php endif; ?>
								<?php echo $this->Paginator->sort('sku', __('SKU')) ?>
							</th>
							<th class="sort-enable <?php echo ($data['sort']['sort'] == 'price') ? 'active' : '' ?>">
								<?php // echo __('Price') ?>
								<?php if(($data['sort']['sort'] == 'price') && ($data['sort']['direction'] == 'desc')): ?>
									<i class="icon icon-arrow-down"></i>
								<?php endif; ?>
								<?php if(($data['sort']['sort'] == 'price') && ($data['sort']['direction'] == 'asc')): ?>
									<i class="icon icon-arrow-up"></i>
								<?php endif; ?>
								<?php echo $this->Paginator->sort('price', __('Price')) ?>
							</th>
							<th>
								<?php echo __('Categories') ?>
							</th>
							<th>
								<?php echo __('Short Description') ?>
							</th>
							<th class="sort-enable <?php echo ($data['sort']['sort'] == 'created_at') ? 'active' : '' ?>">
								
								<?php if(($data['sort']['sort'] == 'created_at') && ($data['sort']['direction'] == 'desc')): ?>
									<i class="icon icon-arrow-down"></i>
								<?php endif; ?>
								<?php if(($data['sort']['sort'] == 'created_at') && ($data['sort']['direction'] == 'asc')): ?>
									<i class="icon icon-arrow-up"></i>
								<?php endif; ?>
								<?php echo $this->Paginator->sort('created_at', __('Created Time')) ?>
							</th>
							<th>
								<?php echo __('Action') ?>
							</th>
						</thead>
						<tbody>
							<?php if(isset($data['product'])): ?>
								<form method="post" action="<?php echo $this->Html->url(array('controller' => 'product', 'action' => 'delete')) ?>" id="product-action">
								<?php foreach($data['product'] as $product): ?>
								<tr>
									<td style="text-align: center;">
										<input type="checkbox" class="product-select" name="data[Product][id][]" value="<?php echo $product['Product']['id'] ?>" />
									</td>
									<td><?php echo $product['Product']['id'] ?></td>
									<td><?php echo $product['Product']['name'] ?></td>
									<td><?php echo $product['Product']['sku'] ?></td>
									<td><?php echo $product['Product']['price'] ?></td>
									<td><?php echo $product['Product']['categories'] ?></td>
									<td><?php echo h($product['Product']['short_description']) ?></td>
									<td><?php echo date('d/m/Y', strtotime($product['Product']['created_at']))?></td>
									<td>
										<?php echo $this->Html->link(__('Edit'), array(
											'controller' => 'product',
											'action' => 'edit',
											$product['Product']['id']
										)) ?>
									</td>
								</tr>								
								<?php endforeach; ?>
								</form>
							<?php endif ?>
						</tbody>
					</table>
				</div>
			</td>	
		</tr>
	</table>
</div>
<?php echo $this->Html->scriptStart(array('inline' =>false)) ?>
//<script>
$(document).ready(function(){
	$('.manager-table th.sort-enable, .btn.page-number').click(function(){
		var url = $(this).find('a').attr('href');
		window.location.href = url;
	});
});
function selectAll(){
	if($('.check-all').is(':checked')){
		$('.manager-table tbody input').each(function(){
			if(!$(this).is(':checked'))
				$(this).click();
		});			
	}

	else {
		$('.manager-table tbody input').each(function(){
			if($(this).is(':checked'))
				$(this).click();
		});			
	}
}
function del(){
	message = '<?php echo __('Are you sure?') ?>';
	if(confirm(message))
		$('#product-action').submit();
}
<?php echo $this->Html->scriptEnd() ?>
