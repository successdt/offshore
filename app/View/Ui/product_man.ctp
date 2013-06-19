<div class="main">
	<table class="main-manager-table">
		<tr>
			<td class="main-header">
				<div class="main-header-content">
					<div class="pull-left margin10">
						<p class="h1">Products Manager</p>					

					</div>
					<div class="pull-left margin10">
						<select>
						  <option value="all">Show all categies</option>
						  <option value="saab">Saab</option>
						  <option value="opel">Opel</option>
						  <option value="audi">Audi</option>
						</select>	
						<select>
						  <option value="all">Show all dates</option>
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
					<div class="pull-left margin10">
	
					</div>
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
							<th><?php echo __('SKU') ?></th>
							<th><?php echo __('Price') ?></th>
							<th><?php echo __('Categories') ?></th>
							<th><?php echo __('Thumbnail') ?></th>
							<th><?php echo __('Created Time') ?></th>
						</thead>
						<tbody >
							<tr>
								<td><input type="checkbox" /></td>
								<td>1</td>
								<td>Lumia</td>
								<td>nk_lu</td>
								<td>7200000</td>
								<td>Nokia</td>
								<td></td>
								<td>12/06/2012</td>
							</tr>
							<tr class="bg-style1">
								<td><input type="checkbox" /></td>
								<td>1</td>
								<td>Lumia</td>
								<td>nk_lu</td>
								<td>7200000</td>
								<td>Nokia</td>
								<td></td>
								<td>12/06/2012</td>
							</tr>
							<tr>
								<td><input type="checkbox" /></td>
								<td>1</td>
								<td>Lumia</td>
								<td>nk_lu</td>
								<td>7200000</td>
								<td>Nokia</td>
								<td></td>
								<td>12/06/2012</td>
							</tr>
							<tr class="bg-style1">
								<td><input type="checkbox" /></td>
								<td>1</td>
								<td>Lumia</td>
								<td>nk_lu</td>
								<td>7200000</td>
								<td>Nokia</td>
								<td></td>
								<td>12/06/2012</td>
							</tr>
						</tbody>
					</table>
				</div>
			</td>	
		</tr>
	</table>
</div>
