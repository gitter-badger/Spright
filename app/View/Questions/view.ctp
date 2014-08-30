<div class="questions view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Question'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Question'), array('action' => 'edit', $question['Question']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Question'), array('action' => 'delete', $question['Question']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Questions'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Question'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Questions'), array('controller' => 'questions', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Parent Question'), array('controller' => 'questions', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($question['Question']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Code'); ?></th>
		<td>
			<?php echo h($question['Question']['code']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Parent Question'); ?></th>
		<td>
			<?php echo $this->Html->link($question['ParentQuestion']['id'], array('controller' => 'questions', 'action' => 'view', $question['ParentQuestion']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Lft'); ?></th>
		<td>
			<?php echo h($question['Question']['lft']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Rght'); ?></th>
		<td>
			<?php echo h($question['Question']['rght']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Jobtemplate Id'); ?></th>
		<td>
			<?php echo h($question['Question']['jobtemplate_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($question['Question']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($question['Question']['modified']); ?>
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
	<h3><?php echo __('Related Questions'); ?></h3>
	<?php if (!empty($question['ChildQuestion'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Jobtemplate Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($question['ChildQuestion'] as $childQuestion): ?>
		<tr>
			<td><?php echo $childQuestion['id']; ?></td>
			<td><?php echo $childQuestion['code']; ?></td>
			<td><?php echo $childQuestion['parent_id']; ?></td>
			<td><?php echo $childQuestion['lft']; ?></td>
			<td><?php echo $childQuestion['rght']; ?></td>
			<td><?php echo $childQuestion['jobtemplate_id']; ?></td>
			<td><?php echo $childQuestion['created']; ?></td>
			<td><?php echo $childQuestion['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'questions', 'action' => 'view', $childQuestion['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'questions', 'action' => 'edit', $childQuestion['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'questions', 'action' => 'delete', $childQuestion['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $childQuestion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Child Question'), array('controller' => 'questions', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
