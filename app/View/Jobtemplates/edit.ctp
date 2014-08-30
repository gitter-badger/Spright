<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit job template</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
			<?php echo $this->Form->create('Jobtemplate', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('code', array('class' => 'form-control', 'placeholder' => 'Code', 'label' => 'Job template name'));?>
				</div>
				 <h3>Tasks</h3>

				 <? debug($tasks); ?>


                                <table class="table table-hover">
                                    <thead>
                                    
                                        <tr>
                                            <th>Task Name</th>
                                            <th>Skill</th>
              

                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach ($this->request->data['Jobtasks'] as $jobtask): ?>

                                        <tr>
                                            <td><?php echo h($jobtask['code']); ?>&nbsp;</td>
                                            <td><?php echo h($jobtask['skill_id']); ?>&nbsp;</td>		
                                        </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                           

				<div class="form-group">
					<?php echo $this->Form->submit(__('Save'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>
            
                                </div>




                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->