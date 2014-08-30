<div class="jobtypes view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Jobtype'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Jobtype'), array('action' => 'edit', $jobtype['Jobtype']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Jobtype'), array('action' => 'delete', $jobtype['Jobtype']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $jobtype['Jobtype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Jobtypes'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Jobtype'), array('action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($jobtype['Jobtype']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Code'); ?></th>
		<td>
			<?php echo h($jobtype['Jobtype']['code']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($jobtype['Jobtype']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($jobtype['Jobtype']['modified']); ?>
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
	<?php if (!empty($jobtype['Job'])): ?>
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
	<?php foreach ($jobtype['Job'] as $job): ?>
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
