<div class="attachments view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Attachment'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Attachment'), array('action' => 'edit', $attachment['Attachment']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Attachment'), array('action' => 'delete', $attachment['Attachment']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $attachment['Attachment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Attachments'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Attachment'), array('action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($attachment['Attachment']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Model'); ?></th>
		<td>
			<?php echo h($attachment['Attachment']['model']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Foreign Key'); ?></th>
		<td>
			<?php echo h($attachment['Attachment']['foreign_key']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($attachment['Attachment']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Attachment'); ?></th>
		<td>
			<?php echo h($attachment['Attachment']['attachment']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Dir'); ?></th>
		<td>
			<?php echo h($attachment['Attachment']['dir']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Type'); ?></th>
		<td>
			<?php echo h($attachment['Attachment']['type']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Size'); ?></th>
		<td>
			<?php echo h($attachment['Attachment']['size']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Active'); ?></th>
		<td>
			<?php echo h($attachment['Attachment']['active']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Createdate'); ?></th>
		<td>
			<?php echo h($attachment['Attachment']['createdate']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

