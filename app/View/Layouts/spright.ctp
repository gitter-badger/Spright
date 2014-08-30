<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="A fresh approach in facilities management">
    <meta name="author" content="Ashley Smith">

    <title>Spright.</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">

    <!-- MetisMenu CSS -->
    <link href="/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Data Tables -->

    <link href="/css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/sb-admin-2.css" rel="stylesheet">
    <link href="/css/spright.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    
    <link rel="stylesheet" href="/css/jqtree.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">


        <?php echo $this->Element('navigation'); ?>

        <!-- Page Content -->

        <!-- /#page-wrapper -->

        <?php echo $this->fetch('content'); ?>

 
    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <script type="text/javascript" src="/js/jquery.chained.remote.js" ></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/js/plugins/metisMenu/metisMenu.min.js"></script>


    <script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
<script src="/js/tree.jquery.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/js/sb-admin-2.js"></script>
    <script src="/js/typeahead.bundle.min.js"></script>


        <script src="/js/spright.js"></script>

<script>

$('#tree1').tree({
    dragAndDrop: true,
        closedIcon: $('<i class="fa fa-arrow-circle-right"></i>'),
    openedIcon: $('<i class="fa fa-arrow-circle-down"></i>')
});


$(function(){



    
    /* Here we will store all data */
    var myArguments = {};   
    
    function assembleData(object,arguments)
    {       
        var data = $(object).sortable('toArray'); // Get array data 
        var step_id = $(object).attr("id"); // Get step_id and we will use it as property name



        var arrayLength = data.length; // no need to explain
        
        /* Create step_id property if it does not exist */
        if(!arguments.hasOwnProperty(step_id)) 
        { 
            arguments[step_id] = new Array();
        }   
        
        /* Loop through all items */
        for (var i = 0; i < arrayLength; i++) 
        {
            var image_id = data[i]; 
            /* push all image_id onto property step_id (which is an array) */
            arguments[step_id].push(image_id);          
        }
        return arguments;
    }   
   
    /* Sort images */ 

var rotation = 0;

jQuery.fn.rotate = function(degrees) {
    $(this).css({'-webkit-transform' : 'rotate('+ degrees +'deg)',
                 '-moz-transform' : 'rotate('+ degrees +'deg)',
                 '-ms-transform' : 'rotate('+ degrees +'deg)',
                 'transform' : 'rotate('+ degrees +'deg)'});
};

    $('.step').sortable({

        connectWith: '.step',
  
        /* That's fired first */    
        start : function( event, ui ) {

                rotation += 5;
    ui.item.rotate(rotation);

        var text = $.trim(ui.item.text());
        ui.item.removeClass("image"); 
        ui.item.addClass("image2"); 
       ui.item.startHtml = ui.item.html();
       
       ui.item.html('<div style="width:30px;font-size:14px;display: inline-block;" class="rf-ind-drag default drag">DROP ME</div>');

            myArguments = {}; /* Reset the array*/  
        },      
            over : function(){
         $(this).addClass('valid');
     },
     out : function(){
          $(this).removeClass('valid');
     },
        /* That's fired second */
        remove : function( event, ui ) {
            /* Get array of items in the list where we removed the item */          
            myArguments = assembleData(this,myArguments);
            console.log(ui.item.index());
        },      
        /* That's fired thrird */       
        receive : function( event, ui ) {
            /* Get array of items where we added a new item */  
           
            myArguments = assembleData(this,myArguments);       
            console.log(ui.item.index());
        },
        update: function(e,ui) {
            if (this === ui.item.parent()[0]) {
                 /* In case the change occures in the same container */ 
                 if (ui.sender == null) {
                    myArguments = assembleData(this,myArguments);       
                } 
            }
        },      
        /* That's fired last */         
        stop : function( event, ui ) {     

        console.log(ui.item);             
            /* Send JSON to the server */

                          rotation -= 5;
    ui.item.rotate(rotation);
ui.item.addClass("image"); 
ui.item.removeClass("image2"); 
             ui.item.html(ui.item.startHtml);
            $("#result").html("Send JSON to the server:<pre>"+JSON.stringify()+"</pre>");  


$.ajax({
            type: "POST",
            url: "/jobs/schedule",
            
            data    :
                    {
                    sort:JSON.stringify(myArguments)
                    },
            success: function() {
                console.log('sent to server');
            }               
        });

        },  
    });
});




$('#tree1').tree({
    closedIcon: $('<i class="fa fa-arrow-circle-right"></i>'),
    openedIcon: $('<i class="fa fa-arrow-circle-down"></i>')
});




var bestPictures = new Bloodhound({
datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
queryTokenizer: Bloodhound.tokenizers.whitespace,
prefetch: '/users/getNames.json',
remote: '/users/getNames.json?q=%QUERY'
});
 
bestPictures.initialize();
 
$('#JobFullname').typeahead(null, {
name: 'best-pictures',
displayKey: 'fullname',
source: bestPictures.ttAdapter()
});








</script>







</body>

</html>

