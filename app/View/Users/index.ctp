        <div id="page-wrapper">
   
            <div class="row">
                            <div class="col-lg-12">
                    <h1 class="page-header">Users</h1>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="btn btn-danger" href="/cafmworks/users/add">Add</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    
                                        <tr>
						<th><?php echo $this->Paginator->sort('username'); ?></th>
						<th><?php echo $this->Paginator->sort('fullname','Full name'); ?></th>
						<th><?php echo $this->Paginator->sort('Email'); ?></th>
						<th><?php echo $this->Paginator->sort('Phone'); ?></th>
						<th class="actions"></th>
                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($users as $user): ?>
                                        					<tr>
						
						<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['fullname']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['phone']); ?>&nbsp;</td>


						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $user['User']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $user['User']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
						</td>
					</tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
               
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

