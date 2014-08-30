<div class="rooms view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Room'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Room'), array('action' => 'edit', $room['Room']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Room'), array('action' => 'delete', $room['Room']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $room['Room']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Rooms'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Room'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Buildings'), array('controller' => 'buildings', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Building'), array('controller' => 'buildings', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Floors'), array('controller' => 'floors', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Floor'), array('controller' => 'floors', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Roomtypes'), array('controller' => 'roomtypes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Roomtype'), array('controller' => 'roomtypes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Jobs'), array('controller' => 'jobs', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Job'), array('controller' => 'jobs', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($room['Room']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Code'); ?></th>
		<td>
			<?php echo h($room['Room']['code']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Building'); ?></th>
		<td>
			<?php echo $this->Html->link($room['Building']['id'], array('controller' => 'buildings', 'action' => 'view', $room['Building']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Floor'); ?></th>
		<td>
			<?php echo $this->Html->link($room['Floor']['id'], array('controller' => 'floors', 'action' => 'view', $room['Floor']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Bookable'); ?></th>
		<td>
			<?php echo h($room['Room']['bookable']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Capacity'); ?></th>
		<td>
			<?php echo h($room['Room']['capacity']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Roomtype'); ?></th>
		<td>
			<?php echo $this->Html->link($room['Roomtype']['id'], array('controller' => 'roomtypes', 'action' => 'view', $room['Roomtype']['id'])); ?>
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
	<h3><?php echo __('Related Jobs'); ?></h3>
	<?php if (!empty($room['Job'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Jobtype Id'); ?></th>
		<th><?php echo __('Room Id'); ?></th>
		<th><?php echo __('Statustype Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($room['Job'] as $job): ?>
		<tr>
			<td><?php echo $job['id']; ?></td>
			<td><?php echo $job['code']; ?></td>
			<td><?php echo $job['description']; ?></td>
			<td><?php echo $job['user_id']; ?></td>
			<td><?php echo $job['jobtype_id']; ?></td>
			<td><?php echo $job['room_id']; ?></td>
			<td><?php echo $job['statustype_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'jobs', 'action' => 'view', $job['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'jobs', 'action' => 'edit', $job['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'jobs', 'action' => 'delete', $job['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $job['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Job'), array('controller' => 'jobs', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
