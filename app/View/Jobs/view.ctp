<div class="jobs view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Job'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Job'), array('action' => 'edit', $job['Job']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Job'), array('action' => 'delete', $job['Job']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $job['Job']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Jobs'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Job'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Jobtypes'), array('controller' => 'jobtypes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Jobtype'), array('controller' => 'jobtypes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Rooms'), array('controller' => 'rooms', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Room'), array('controller' => 'rooms', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Statustypes'), array('controller' => 'statustypes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Statustype'), array('controller' => 'statustypes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Joblogs'), array('controller' => 'joblogs', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Joblog'), array('controller' => 'joblogs', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Tasks'), array('controller' => 'tasks', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Task'), array('controller' => 'tasks', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Jobtemplates'), array('controller' => 'jobtemplates', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Jobtemplate'), array('controller' => 'jobtemplates', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($job['Job']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Code'); ?></th>
		<td>
			<?php echo h($job['Job']['code']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Description'); ?></th>
		<td>
			<?php echo h($job['Job']['description']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($job['User']['id'], array('controller' => 'users', 'action' => 'view', $job['User']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Jobtype'); ?></th>
		<td>
			<?php echo $this->Html->link($job['Jobtype']['id'], array('controller' => 'jobtypes', 'action' => 'view', $job['Jobtype']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Room'); ?></th>
		<td>
			<?php echo $this->Html->link($job['Room']['code'], array('controller' => 'rooms', 'action' => 'view', $job['Room']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Statustype'); ?></th>
		<td>
			<?php echo $this->Html->link($job['Statustype']['id'], array('controller' => 'statustypes', 'action' => 'view', $job['Statustype']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Qs1'); ?></th>
		<td>
			<?php echo h($job['Job']['qs1']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Qs2'); ?></th>
		<td>
			<?php echo h($job['Job']['qs2']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Qs3'); ?></th>
		<td>
			<?php echo h($job['Job']['qs3']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Qs4'); ?></th>
		<td>
			<?php echo h($job['Job']['qs4']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Qs5'); ?></th>
		<td>
			<?php echo h($job['Job']['qs5']); ?>
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
	<h3><?php echo __('Related Joblogs'); ?></h3>
	<?php if (!empty($job['Joblog'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Job Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($job['Joblog'] as $joblog): ?>
		<tr>
			<td><?php echo $joblog['id']; ?></td>
			<td><?php echo $joblog['code']; ?></td>
			<td><?php echo $joblog['job_id']; ?></td>
			<td><?php echo $joblog['created']; ?></td>
			<td><?php echo $joblog['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'joblogs', 'action' => 'view', $joblog['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'joblogs', 'action' => 'edit', $joblog['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'joblogs', 'action' => 'delete', $joblog['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $joblog['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Joblog'), array('controller' => 'joblogs', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Tasks'); ?></h3>
	<?php if (!empty($job['Task'])): ?>
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
	<?php foreach ($job['Task'] as $task): ?>
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
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Jobtemplates'); ?></h3>
	<?php if (!empty($job['Jobtemplate'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($job['Jobtemplate'] as $jobtemplate): ?>
		<tr>
			<td><?php echo $jobtemplate['id']; ?></td>
			<td><?php echo $jobtemplate['code']; ?></td>
			<td><?php echo $jobtemplate['created']; ?></td>
			<td><?php echo $jobtemplate['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'jobtemplates', 'action' => 'view', $jobtemplate['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'jobtemplates', 'action' => 'edit', $jobtemplate['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'jobtemplates', 'action' => 'delete', $jobtemplate['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $jobtemplate['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Jobtemplate'), array('controller' => 'jobtemplates', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
