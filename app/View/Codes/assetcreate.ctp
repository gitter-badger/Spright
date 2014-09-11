<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">


                    <h1>Create Asset</h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                   
                      
                        <div class="panel-body">
                            <div class="row">
                               

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                
                                <li class="active"><a href="#details" data-toggle="tab">General</a></li>
                                <li><a href="#details" data-toggle="tab">Detailed</a></li>
                                <li><a href="#details" data-toggle="tab">Linked</a></li>
                                    <li><a href="#tasks" data-toggle="tab">Attachments</a></li>
                                <li><a href="#tasks" data-toggle="tab">Asset Depreciation</a></li>

                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="details">

                                    <?php echo $this->Form->create('Job', array('role' => 'form')); ?>

                                       <div class="row" style="padding:20px">
                                <div class="col-md-6">
                <div class="form-group">
					<?php echo $this->Form->input('code', array('class' => 'form-control', 'placeholder' => 'Unique Asset Code','label'=>'Asset Code'));?>
				</div>
                <div class="form-group">
					<?php echo $this->Form->textarea('description', array('class' => 'form-control', 'placeholder' => 'Detailed description of the asset','label'=>'Asset Description'));?>
				</div>				
			    <div class="form-group">
					<?php echo $this->Form->input('status', array('class' => 'form-control',
                        'options' => array('Active','Decomissioned'),
                        'empty' => '--'
                    ));?>
				</div>	
				
				                <div class="form-group">
					<?php echo $this->Form->input('site_id',array('class' => 'form-control','type'=>'select','label'=>'Site','empty' => '--')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('building_id', array('class' => 'form-control', 'type'=>'select','label'=>'Building'));?>
                </div>
                
                
	
		</div>
      </div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-lg btn-block">Create Asset</button>
				</div>

        
                                </div>
                                 
                                
                            
                            <?php echo $this->Form->end() ?>
             </div
        
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->




