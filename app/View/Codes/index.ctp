<div class="codes index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Codes'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">



                <div id="page-wrapper">
   
            <div class="row">
                            <div class="col-lg-12">
                     <h1 class="page-header">Location</h1>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="btn btn-danger" href="/questions/add">Add</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="tree1" data-url="/questions/buildquestion.json"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
               
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->



<ul id="contextMenu" class="dropdown-menu" role="menu" style="display:none" >
    <li><a tabindex="-1" href="#">Add</a></li>

    <li class="divider"></li>
    <li><a tabindex="-1" href="#">Delete</a></li>
</ul>

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Code'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Codes'), array('controller' => 'codes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Parent Code'), array('controller' => 'codes', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Codetypes'), array('controller' => 'codetypes', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Codetype'), array('controller' => 'codetypes', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table id="sprightCodes" cellpadding="0" cellspacing="0" class="table table-striped table-hover">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('code'); ?></th>
						<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
						<th><?php echo $this->Paginator->sort('lft'); ?></th>
						<th><?php echo $this->Paginator->sort('rght'); ?></th>
						<th><?php echo $this->Paginator->sort('codetype_id'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('modified'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($codes as $code): ?>
					<tr class="<?php echo $code['Code']['id']; ?>">
						<td class="<?php echo $code['Code']['id']; ?>"><?php echo h($code['Code']['id']); ?>&nbsp;</td>
						<td class="<?php echo $code['Code']['id']; ?>"><?php echo h($code['Code']['code']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($code['ParentCode']['id'], array('controller' => 'codes', 'action' => 'view', $code['ParentCode']['id'])); ?>
		</td>
						<td><?php echo h($code['Code']['lft']); ?>&nbsp;</td>
						<td><?php echo h($code['Code']['rght']); ?>&nbsp;</td>
								<td>
			<?php echo $this->Html->link($code['Codetype']['id'], array('controller' => 'codetypes', 'action' => 'view', $code['Codetype']['id'])); ?>
		</td>
						<td><?php echo h($code['Code']['created']); ?>&nbsp;</td>
						<td><?php echo h($code['Code']['modified']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $code['Code']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $code['Code']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $code['Code']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $code['Code']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			
			
	

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->