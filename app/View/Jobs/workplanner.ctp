
<style>
   
.container{
overflow-x: scroll;

}

    .image {
        background-color:#ffcb05;

        cursor:move;
    }

        .valid {
       background-color:#dff0d8;

        cursor:move;
    }

        .image2 {
        background-color:#dff0d8;
        width:200px !important;
        cursor:move;
    }
    .step {
        background-color:#e7e7e7e7;

    
    }


    .drag { 
    border-radius:2px;  
  
    color:#777777; 
    font-size: 10px
}
.rf-ind-drag.default {

    background-color: red;  
}
    </style>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Work Planner</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
<div class="container1">
<div class="row container">
      

        <div class="col-xs-6 col-md-4 panel panel-default">
         <div class="panel-body step" id="001">
            <div class="image" id="image_21">Image 21</div>
            <div class="image" id="image_22">Image 22</div>
            <div class="image" id="image_23">Image 23</div>
            </div>
        </div>
        <div class="col-xs-6 col-md-4 panel panel-default">
         <div class="panel-body step" id="003">
            <div class="image" id="image_31">Image 31</div>
            <div class="image" id="image_32">Image 32</div>
            <div class="image" id="image_33">Image 33</div>
            </div>
        </div>
     <div class="col-xs-6 col-md-4 panel panel-default">
         <div class="panel-body step" id="003">
            <div class="image" id="image_31">Image 31</div>
            <div class="image" id="image_32">Image 32</div>
            <div class="image" id="image_33">Image 33</div>
            </div>
        </div>


      </div>

<style>


html {
overflow: -moz-scrollbars-vertical !important;
overflow-y: scroll !important;
}

.scroll{
    overflow: -moz-scrollbars-vertical; 
overflow-y: scroll;
width:80%;

}



</style>
      <div class="container">----</div>

      <div class="container step scroll" style="background-color:#666;height:300px" id="unscheduled">
  
<?php foreach ($jobs as $job): ?>



        <div class="image" id="wo_<?php echo $job['Job']['id']; ?>">WO<?php echo $job['Job']['id']; ?></div>

<?php endforeach; ?>

      </div>

      </div>



            


<div id="result">
</div>

        </div>
        <!-- /#page-wrapper -->

