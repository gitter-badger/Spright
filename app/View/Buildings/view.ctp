<div class="buildings view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Building'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Building'), array('action' => 'edit', $building['Building']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Building'), array('action' => 'delete', $building['Building']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $building['Building']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Buildings'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Building'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Departments'), array('controller' => 'departments', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Department'), array('controller' => 'departments', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Floors'), array('controller' => 'floors', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Floor'), array('controller' => 'floors', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Rooms'), array('controller' => 'rooms', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Room'), array('controller' => 'rooms', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($building['Building']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Code'); ?></th>
		<td>
			<?php echo h($building['Building']['code']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Department'); ?></th>
		<td>
			<?php echo $this->Html->link($building['Department']['id'], array('controller' => 'departments', 'action' => 'view', $building['Department']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Floors'); ?></h3>
	<?php if (!empty($building['Floor'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Building Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($building['Floor'] as $floor): ?>
		<tr>
			<td><?php echo $floor['id']; ?></td>
			<td><?php echo $floor['code']; ?></td>
			<td><?php echo $floor['building_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'floors', 'action' => 'view', $floor['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'floors', 'action' => 'edit', $floor['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'floors', 'action' => 'delete', $floor['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $floor['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Floor'), array('controller' => 'floors', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Rooms'); ?></h3>
	<?php if (!empty($building['Room'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Building Id'); ?></th>
		<th><?php echo __('Floor Id'); ?></th>
		<th><?php echo __('Bookable'); ?></th>
		<th><?php echo __('Capacity'); ?></th>
		<th><?php echo __('Roomtype Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($building['Room'] as $room): ?>
		<tr>
			<td><?php echo $room['id']; ?></td>
			<td><?php echo $room['code']; ?></td>
			<td><?php echo $room['building_id']; ?></td>
			<td><?php echo $room['floor_id']; ?></td>
			<td><?php echo $room['bookable']; ?></td>
			<td><?php echo $room['capacity']; ?></td>
			<td><?php echo $room['roomtype_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'rooms', 'action' => 'view', $room['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'rooms', 'action' => 'edit', $room['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'rooms', 'action' => 'delete', $room['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $room['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Room'), array('controller' => 'rooms', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
