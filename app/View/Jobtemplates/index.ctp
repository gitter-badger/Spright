        <div id="page-wrapper">
   
            <div class="row">
                            <div class="col-lg-12">
                    <h1 class="page-header">Job Templates</h1>
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="btn btn-danger" href="/cafmworks/jobtemplates/add">Add</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    
                                        <tr>
                                            <th><?php echo $this->Paginator->sort('Name'); ?></th>
                                            <th>Actions</th>
                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($jobtemplates as $jobtemplate): ?>
                                        <tr>
                                            <td><?php echo h($jobtemplate['Jobtemplate']['code']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $jobtemplate['Jobtemplate']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $jobtemplate['Jobtemplate']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $jobtemplate['Jobtemplate']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $jobtemplate['Jobtemplate']['id'])); ?>
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

