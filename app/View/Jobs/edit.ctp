<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">


                    <h1><span class="btn btn-info" type="button"><?php echo $this->data['Statustype']['code']; ?> </span> Details <small>WO<?php echo $this->data['Job']['id']; ?></small></h1>


                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                   
                      
                        <div class="panel-body">
                            <div class="row">
                               

                            <!-- Nav tabs -->
                            <ul id="tabs" class="nav nav-tabs">
                                
                                <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                                <li><a href="#tasks" data-toggle="tab">Tasks</a></li>
                                <li><a href="#history" data-toggle="tab">History</a></li>
                                <li><a href="#complete" data-toggle="tab">Complete</a></li>
                          
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="details">
                                    <h4></h4>

                                   


                                    <?php echo $this->Form->create('Job', array('role' => 'form')); ?>

                                       <div class="row" style="padding:20px">
                                <div class="col-md-6"><div class="form-group">
					<?php echo $this->Form->input('fullname', array('class' => 'form-control', 'placeholder' => 'User Id','label'=>'Requestor', 'disabled' => 'disabled'));?>
				</div>
					<div class="form-group">
					<?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'User Id','label'=>'Email'));?>
				</div>
					<div class="form-group">
					<?php echo $this->Form->input('phone', array('class' => 'form-control', 'placeholder' => 'User Id','label'=>'Phone'));?>
				</div>
			    <div class="form-group">
                    <?php echo $this->Form->input('building_id', array('class' => 'form-control', 'placeholder' => 'Room Id')); ?>
                </div>

                <div class="form-group">
                    <?php echo $this->Form->input('room_id', array('class' => 'form-control', 'placeholder' => 'Room Id'));?>
                </div>

				<div class="form-group">
					<?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => 'Description'));?>
				</div>
				
		
				<div class="form-group">
					<?php echo $this->Form->input('statustype_id', array('class' => 'form-control', 'placeholder' => 'Statustype Id'));?>
				</div></div>
                                <div class="col-md-6"><div class="form-group">
					<?php echo $this->Form->input('qs1', array('class' => 'form-control', 'label' => 'Questions' , 'disabled' => 'disabled'));?>
				</div>
				<div class="form-group">
					<?php if($this->data['Job']['qs2']) echo $this->Form->input('qs2', array('class' => 'form-control', 'label' => false));?>
				</div>
				<div class="form-group">
					<?php if($this->data['Job']['qs3']) echo $this->Form->input('qs3', array('class' => 'form-control', 'label' => false));?>
				</div>
				<div class="form-group">
					<?php if($this->data['Job']['qs4']) echo $this->Form->input('qs4', array('class' => 'form-control', 'label' => false));?>
				</div>
				<div class="form-group">
					<?php if($this->data['Job']['qs5']) echo $this->Form->input('qs5', array('class' => 'form-control', 'label' => false));?>
				</div></div>
                            </div>

			
				
	
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
				</div>

			

                                   
                                </div>
                                <div class="tab-pane fade" id="tasks">
                                <br />
<!-- Tasks -->
<div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Task</th>
                                            <th>Scheduled</th>
                                            
                                            <th>Created</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php foreach ($this->data['Task'] as $task): ?>    
                                    
                                        <tr>
                                            
                                            <td><?php echo $task['code']; ?></td>
                                            <td> 
                                                  <?php if ($task['scheduled' ]===0): ?>
                                             <?php  echo $task['user_id']; ?></i>
                                            <?php else: ?>
                                                 <i class="fa fa-times" style="color:red"></i>
                                            <?php endif; ?>
                                            
                                            </td>
                                            <td><?php echo $task['created']; ?></td>
                                            
    
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
            <!-- End Tasks -->        
            

 

                                </div>


                                <div class="tab-pane fade" id="history">


                                </div>
                                <div class="tab-pane fade" id="complete">
                                    <h4></h4>

<div class="form-group">
<label>Completion time</label>
					<div class="input-group date form_datetime" style="max-width:30%" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input class="form-control" size="16" type="text" value="" readonly="">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
					<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                </div>
				</div>


                                    	<div class="form-group">
					<?php echo $this->Form->input('completioncomments', array('class' => 'form-control', 'placeholder' => 'What did you do to resolve this work order?','label'=>'Completion comments','type'=>'textarea'));?>
				</div>

				<button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-check"></i> Complete</button>
                                 
                                </div>
                    
                            </div>
                            
                            <?php echo $this->Form->end() ?>
             
        
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->




