<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Spright.</title>

    <!-- Bootstrap Core CSS -->
    <link href="/cafmworks/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/cafmworks/css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Data Tables -->

    <link href="/cafmworks/css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/cafmworks/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/cafmworks/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">



        <!-- Page Content -->

        <!-- /#page-wrapper -->

        <?php echo $this->fetch('content'); ?>

 
    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="/cafmworks/js/jquery.chained.remote.js" ></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/cafmworks/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/cafmworks/js/plugins/metisMenu/metisMenu.min.js"></script>


    <!-- DataTables JavaScript -->
    <script src="/cafmworks/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/cafmworks/js/plugins/dataTables/dataTables.bootstrap.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="/cafmworks/js/sb-admin-2.js"></script>
    <script src="/cafmworks/js/typeahead.bundle.min.js"></script>


    <!-- Cascade dropdowns -->
    




        <script>








$(function(){

/*
 * Raise a job
 */

//The room input should  be disabled until a building is elect
$("#JobRoomId").prop('disabled', true);







var bestPictures = new Bloodhound({
datumTokenizer: Bloodhound.tokenizers.obj.whitespace('fullname'),
queryTokenizer: Bloodhound.tokenizers.whitespace,
prefetch: '/cafmworks/users/getNames.json',
remote: '/cafmworks/users/getNames.json?q=%QUERY'
});
 
bestPictures.initialize();
 
$('#JobFullname').typeahead(null, {
name: 'fullname',
displayKey: 'fullname',
highlight:true,
hint: true,
minLength: 3,
source: bestPictures.ttAdapter(),

});


jQuery('#JobFullname').on('typeahead:selected', function (e, datum) {
    $("#JobEmail").val(datum['email']);
    $("#JobPhone").val(datum['phone']);
}).on('typeahead:autocompleted', function (e, datum) {
    console.log(datum);
});


 $("#JobRoomId").remoteChained("#JobBuildingId", "/cafmworks/rooms/getrooms.json");


  $("#JobQs2").remoteChained("#JobQs1", "/cafmworks/questions/getquestion.json");
  $("#JobQs3").remoteChained("#JobQs2", "/cafmworks/questions/getquestion.json");
  $("#JobQs4").remoteChained("#JobQs3", "/cafmworks/questions/getquestion.json");
  $("#JobQs5").remoteChained("#JobQs4", "/cafmworks/questions/getquestion.json");


})


                          
</script>

    <script>
var table = $('#example').dataTable({
    "bProcessing": true,
    "bServerSide": true,
    
 "aoColumns": [
        {mData:"Job.id"},
        {mData:"Job.fullname"},
        {mData:"Building.code"},
        {mData:"Room.code"},
        {mData:"Statustype.code"}
    ],    "sAjaxSource": "/cafmworks/jobs/getJobs.json",
    "fnCreatedRow": function(nRow, aData, iDataIndex){
        $('td:eq(0)', nRow).html('<a href="/<?php echo basename(dirname(APP));?>/jobs/view/'+aData.Job.id+'">WO'+aData.Job.id+'</a>');
    }
});

setInterval( function () {
    table.api().ajax.reload();
}, 30000 );

    </script>

<style>

.twitter-typeahead{ float:left; width:100%}

.tt-dropdown-menu {
position: absolute;
top: 100%;
left: 0;
z-index: 1000;
display: none;
float: left;
min-width: 160px;
padding: 5px 0;
margin: 2px 0 0;
list-style: none;
font-size: 14px;
background-color: #ffffff;
border: 1px solid #cccccc;
border: 1px solid rgba(0, 0, 0, 0.15);
border-radius: 4px;
-webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
background-clip: padding-box;
}
.tt-suggestion > p {
display: block;
padding: 3px 20px;
clear: both;
font-weight: normal;
line-height: 1.428571429;
color: #333333;
white-space: nowrap;
}
.tt-suggestion > p:hover,
.tt-suggestion > p:focus,
.tt-suggestion.tt-cursor p {
color: #ffffff;
text-decoration: none;
outline: 0;
background-color: #428bca;
}

</style>



</body>

</html>

