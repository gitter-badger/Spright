<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Raise a job</h1>
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
                        <?php echo $this->Form->create('Job', array('role' => 'form')); ?>
                        
                        <?php
                        //We need to store the ID's as well because its need to find the job templat to use 
                        echo $this->Form->hidden( 'qs1ID');
                        echo $this->Form->hidden( 'qs2ID');
                        echo $this->Form->hidden( 'qs3ID');
                        echo $this->Form->hidden( 'qs4ID');
                        echo $this->Form->hidden( 'qs5ID');
                        ?>



                <div class="form-group">
                    <?php echo $this->Form->input('fullname', array('class' => 'form-control', 'placeholder' => 'Requestors full name'));?>
                </div>
                        <div class="form-group">

                    <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Requestors email'));?>
                </div>
                        <div class="form-group">
                    <?php echo $this->Form->input('phone', array('class' => 'form-control', 'placeholder' => 'Requestors contact number'));?>
                </div>

                <div class="form-group">
                    <?php echo $this->Form->input('building_id', array('class' => 'form-control', 'placeholder' => 'Room Id','empty' => '-- Choose a building --'));
                    //echo $form->input('salutation_id', array('options' => $salutations, 'empty' => 'Please choose a title'));

                    ?>
                </div>

                <div class="form-group">
                    <?php echo $this->Form->input('room_id', array('class' => 'form-control', 'placeholder' => 'Room Id'));?>
                </div>

                <div class="form-group">
                    <?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => 'In detail please describe what you need help with?'));?>

                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
            
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                      <div class="col-lg-6">
                                    <h3>How can we help you?</h3>
                 <div class="form-group">


					<?php echo $this->Form->input('qs1',array('class' => 'form-control','type'=>'select','label'=>false,'empty' => '--')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('qs2', array('class' => 'form-control', 'type'=>'select','label'=>false));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('qs3', array('class' => 'form-control', 'type'=>'select','label'=>false));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('qs4', array('class' => 'form-control', 'type'=>'select','label'=>false));?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('qs5', array('class' => 'form-control', 'type'=>'select','label'=>false));?>
                </div>

                <?php echo $this->Form->end() ?>
                                 
                                </div>
                                <!-- /.col-lg-6 (nested) -->




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


