

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">


                    <h1>Job template <small><?php echo h($jobtemplate['Jobtemplate']['code']); ?></small></h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>


            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                   
                      
                        <div class="panel-body">
                     
            

<h3><?php echo __('Tasks'); ?></h3>
	<?php if (!empty($jobtemplate['Jobtask'])): ?>


		   <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                      		<th>Actions</th>
                                        </tr>
                                    </thead>
                                 	<tbody>
	<?php foreach ($jobtemplate['Jobtask'] as $task): ?>
		<tr>
			
			<td><?php echo $task['code']; ?></td>
			

			<td class="actions">
				
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'jobtasks', 'action' => 'edit', $task['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'jobtasks', 'action' => 'delete', $task['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $task['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->

<?php endif; ?>

        </div>
        </div>
        </div>
        <!-- /#page-wrapper -->





