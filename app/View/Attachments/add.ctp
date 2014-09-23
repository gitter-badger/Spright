<div class="attachments form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Attachment'); ?></h1>
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

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Attachments'), array('action' => 'index'), array('escape' => false)); ?></li>
														</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Attachment', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('model', array('class' => 'form-control', 'placeholder' => 'Model'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('foreign_key', array('class' => 'form-control', 'placeholder' => 'Foreign Key'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('attachment', array('class' => 'form-control', 'placeholder' => 'Attachment'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('dir', array('class' => 'form-control', 'placeholder' => 'Dir'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('type', array('class' => 'form-control', 'placeholder' => 'Type'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('size', array('class' => 'form-control', 'placeholder' => 'Size'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('active', array('class' => 'form-control', 'placeholder' => 'Active'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('createdate', array('class' => 'form-control', 'placeholder' => 'Createdate'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
