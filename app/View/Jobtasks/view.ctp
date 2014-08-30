<div class="jobtasks view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Jobtask'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Jobtask'), array('action' => 'edit', $jobtask['Jobtask']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Jobtask'), array('action' => 'delete', $jobtask['Jobtask']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $jobtask['Jobtask']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Jobtasks'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Jobtask'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Jobtemplates'), array('controller' => 'jobtemplates', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Jobtemplate'), array('controller' => 'jobtemplates', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Skills'), array('controller' => 'skills', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Skill'), array('controller' => 'skills', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($jobtask['Jobtask']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Code'); ?></th>
		<td>
			<?php echo h($jobtask['Jobtask']['code']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Jobtemplate'); ?></th>
		<td>
			<?php echo $this->Html->link($jobtask['Jobtemplate']['id'], array('controller' => 'jobtemplates', 'action' => 'view', $jobtask['Jobtemplate']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Skill'); ?></th>
		<td>
			<?php echo $this->Html->link($jobtask['Skill']['id'], array('controller' => 'skills', 'action' => 'view', $jobtask['Skill']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

