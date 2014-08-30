<div class="statustypes view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Statustype'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Statustype'), array('action' => 'edit', $statustype['Statustype']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Statustype'), array('action' => 'delete', $statustype['Statustype']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $statustype['Statustype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Statustypes'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Statustype'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Jobs'), array('controller' => 'jobs', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Job'), array('controller' => 'jobs', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Tasks'), array('controller' => 'tasks', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Task'), array('controller' => 'tasks', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($statustype['Statustype']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Code'); ?></th>
		<td>
			<?php echo h($statustype['Statustype']['code']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($statustype['Statustype']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($statustype['Statustype']['modified']); ?>
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
	<?php if (!empty($statustype['Job'])): ?>
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
	<?php foreach ($statustype['Job'] as $job): ?>
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
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Tasks'); ?></h3>
	<?php if (!empty($statustype['Task'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Job Id'); ?></th>
		<th><?php echo __('Statustype Id'); ?></th>
		<th><?php echo __('Scheduled'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($statustype['Task'] as $task): ?>
		<tr>
			<td><?php echo $task['id']; ?></td>
			<td><?php echo $task['job_id']; ?></td>
			<td><?php echo $task['statustype_id']; ?></td>
			<td><?php echo $task['scheduled']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tasks', 'action' => 'view', $task['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tasks', 'action' => 'edit', $task['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'tasks', 'action' => 'delete', $task['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $task['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Task'), array('controller' => 'tasks', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
