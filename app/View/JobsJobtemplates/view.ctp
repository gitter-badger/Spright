<div class="jobsJobtemplates view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Jobs Jobtemplate'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Jobs Jobtemplate'), array('action' => 'edit', $jobsJobtemplate['JobsJobtemplate']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Jobs Jobtemplate'), array('action' => 'delete', $jobsJobtemplate['JobsJobtemplate']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $jobsJobtemplate['JobsJobtemplate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Jobs Jobtemplates'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Jobs Jobtemplate'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Jobs'), array('controller' => 'jobs', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Job'), array('controller' => 'jobs', 'action' => 'add'), array('escape' => false)); ?> </li>
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
		<th><?php echo __('Job'); ?></th>
		<td>
			<?php echo $this->Html->link($jobsJobtemplate['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $jobsJobtemplate['Job']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Jobtemplate'); ?></th>
		<td>
			<?php echo $this->Html->link($jobsJobtemplate['Jobtemplate']['id'], array('controller' => 'jobtemplates', 'action' => 'view', $jobsJobtemplate['Jobtemplate']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

