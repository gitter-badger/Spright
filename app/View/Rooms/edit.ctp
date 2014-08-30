<div class="rooms form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Room'); ?></h1>
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

																<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('Room.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Room.id'))); ?></li>
																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Rooms'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Buildings'), array('controller' => 'buildings', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Building'), array('controller' => 'buildings', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Floors'), array('controller' => 'floors', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Floor'), array('controller' => 'floors', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Roomtypes'), array('controller' => 'roomtypes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Roomtype'), array('controller' => 'roomtypes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Jobs'), array('controller' => 'jobs', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Job'), array('controller' => 'jobs', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Room', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('code', array('class' => 'form-control', 'placeholder' => 'Code'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('building_id', array('class' => 'form-control', 'placeholder' => 'Building Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('floor_id', array('class' => 'form-control', 'placeholder' => 'Floor Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('bookable', array('class' => 'form-control', 'placeholder' => 'Bookable'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('capacity', array('class' => 'form-control', 'placeholder' => 'Capacity'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('roomtype_id', array('class' => 'form-control', 'placeholder' => 'Roomtype Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
