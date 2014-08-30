<div class="tasktemplates view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Tasktemplate'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Tasktemplate'), array('action' => 'edit', $tasktemplate['Tasktemplate']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Tasktemplate'), array('action' => 'delete', $tasktemplate['Tasktemplate']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $tasktemplate['Tasktemplate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Tasktemplates'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Tasktemplate'), array('action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($tasktemplate['Tasktemplate']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Code'); ?></th>
		<td>
			<?php echo h($tasktemplate['Tasktemplate']['code']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Jobtemplate'); ?></th>
		<td>
			<?php echo $this->Html->link($tasktemplate['Jobtemplate']['id'], array('controller' => 'jobtemplates', 'action' => 'view', $tasktemplate['Jobtemplate']['id'])); ?>
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
	<h3><?php echo __('Related Jobtemplates'); ?></h3>
	<?php if (!empty($tasktemplate['Jobtemplate'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Tasktemplate Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($tasktemplate['Jobtemplate'] as $jobtemplate): ?>
		<tr>
			<td><?php echo $jobtemplate['id']; ?></td>
			<td><?php echo $jobtemplate['code']; ?></td>
			<td><?php echo $jobtemplate['tasktemplate_id']; ?></td>
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
