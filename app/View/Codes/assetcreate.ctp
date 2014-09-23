<div id="page-wrapper" class="assetCreate">


    <div class="row">
        <div class="col-lg-12">


            <div class="panel-body">
                <div class="panel-heading">
        <h1>Create Asset</h1>

    </div>
                <div class="row">


                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">

                        <li class="active"><a href="#general" data-toggle="tab">General <i class="fa"></i></a></li>
                        <li><a href="#detailed" data-toggle="tab">Detailed <i class="fa"></i></a></li>
                        <li><a href="#linked" data-toggle="tab">Linked</a></li>
                        <li><a href="#attachments" data-toggle="tab">Attachments</a></li>
                        <li><a href="#depreciation" data-toggle="tab">Asset Depreciation</a></li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="general">

                            <?php echo $this->Form->create('Code', array('role' => 'form','class'=>'assetForm')); ?>

                            <div class="row" style="padding:20px">
                                <div class="col-md-6">



                                    <div class="form-group">
                                       <?php echo $this->Form->input('Code.code', array('class' => 'form-control', 'placeholder' => 'Unique Asset Code','label'=>'Asset Code'));?>
                                   </div>
                                   <div class="form-group">
                                       <?php echo $this->Form->textarea('Code.description', array('class' => 'form-control', 'placeholder' => 'Detailed description of the asset','label'=>'Asset Description'));?>
                                   </div>				
                                   <div class="form-group">
                                       <?php echo $this->Form->input('status', array('class' => 'form-control',
                                        'options' => array('Active','Decomissioned'),
                                        'empty' => '--'
                                        ));?>
                                    </div>	
                                    <div id="chooseLocation">
                                       <div class="form-group"><?php echo $this->Form->input('Site.code',array('type' => 'select','class' => 'form-control','label'=>'Site','empty'=> '-- Select a site --')); ?></div>
                                       <div class="form-group"><?php echo $this->Form->input('Building.code',array('type' => 'select','class' => 'form-control','label'=>'Building')); ?></div>
                                       <div class="form-group"><?php echo $this->Form->input('Floor.code',array('type' => 'select','class' => 'form-control','label'=>'Floor')); ?></div>
                                       <div class="form-group"><?php echo $this->Form->input('Room.code',array('type' => 'select','class' => 'form-control','label'=>'Room')); ?></div>
                                   </div>


                               </div>
                           </div>

                           <div class="form-group">
                               <button type="submit" class="btn btn-primary btn-lg btn-block">Create Asset</button>
                           </div>


                       </div>

                       <div class="tab-pane fade in" id="detailed">

                        <div class="row" style="padding:20px">
                            <div class="col-md-6"> <!-- col-md-6 start> -->
                                <div class="form-group">    
                                   <?php echo $this->Form->input('status', array('label'=> 'Bookable Space' ,'class' => 'form-control','options' => array('Yes','No'),'empty' => 'Is this space Bookable?'));?>
                               </div>

                               <div class="form-group">
                                   <?php echo $this->Form->input('Code.capacity', array('class' => 'form-control', 'placeholder' => 'How many people can fit in this room?'));?>
                               </div>

                               <div class="form-group">
                                   <?php echo $this->Form->input('Code.manufacturer', array('class' => 'form-control', 'placeholder' => 'Who is the Manufacturer?'));?>
                               </div>

                               <div class="form-group">
                                   <?php echo $this->Form->input('Code.supplier', array('class' => 'form-control', 'placeholder' => 'Who is the supplier?'));?>
                               </div>

                               <div class="form-group">
                                   <?php echo $this->Form->input('Code.make', array('class' => 'form-control', 'placeholder' => 'What is the make?'));?>
                               </div>

                               <div class="form-group">
                                   <?php echo $this->Form->input('Code.model', array('class' => 'form-control', 'placeholder' => 'What is the model?'));?>
                               </div>

                            <div class="input-group">
  <span class="input-group-addon">$</span>
  <input type="text" class="form-control">
  <span class="input-group-addon">.00</span>
</div>
                           </div>
                       </div> <!-- col-md-6 end> -->
                   </div>


                   <?php echo $this->Form->end() ?>
                   </div

               </div>
           </div>
       </div></div></div
       <!-- /.row -->
   </div>
   <!-- /#page-wrapper -->




