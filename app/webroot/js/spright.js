 




$(document).ready(function(){
    $(window).resize(function() {

        ellipses1 = $("#bc1 :nth-child(2)")
        if ($("#bc1 a:hidden").length >0) {ellipses1.show()} else {ellipses1.hide()}
        
        ellipses2 = $("#bc2 :nth-child(2)")
        if ($("#bc2 a:hidden").length >0) {ellipses2.show()} else {ellipses2.hide()}
        
    })
    
}); 


/*
 * Raise a job
 */

//The room input should  be disabled until a building is elect
$("#JobRoomId").prop('disabled', true);







//Date time attribute 
$('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });

$('.form_datetime').datetimepicker('update', new Date());



/*
* Typehead JS
*/

jQuery('#JobFullname').on('typeahead:selected', function (e, datum) {
    $("#JobEmail").val(datum['email']);
    $("#JobPhone").val(datum['phone']);
}).on('typeahead:autocompleted', function (e, datum) {
    console.log(datum);
});

/*
* remoteChained / Dependant select boxes 
*/


 $("#JobRoomId").remoteChained("#JobBuildingId", "/rooms/getrooms.json");

/*
  $("#JobQs2").remoteChained("#JobQs1", "/questions/getquestion.json");
  $("#JobQs3").remoteChained("#JobQs2", "/questions/getquestion.json");
  $("#JobQs4").remoteChained("#JobQs3", "/questions/getquestion.json");
  $("#JobQs5").remoteChained("#JobQs4", "/questions/getquestion.json");


*/


/*
** Dependant drop downs
*/

$('#JobQs2').prop('disabled', true);
$('#JobQs3').prop('disabled', true);
$('#JobQs4').prop('disabled', true);
$('#JobQs5').prop('disabled', true);


var $select = $('#JobQs1');


    //first level
    $.getJSON('/questions/buildQuestion.json', function(data){
    
      $.each(data, function(key, val){
        $select.append('<option data-parentid="'+val.id+'"id="' +val.id + '">' + val.label + '</option>');
      })
});


$( "#JobQs1" ).change(function() {

    var $select = $('#JobQs2');
    
   
    $('#JobQs1ID').val($(this).children(":selected").attr("id"));

    var node = $(this).find(':selected').data('parentid')
    
          $('#JobQs2,#JobQs3,#JobQs4,#JobQs5').empty().prop('disabled', true);
          $('#JobQs2ID,#JobQs3ID,#JobQs4ID,#JobQs5ID').val("");
    
    
    
    
    $.getJSON('/questions/buildQuestion.json?node='+node, function(data){

       if(data.length != 0){
          $('#JobQs2').empty().append('<option>--</option>');
          $('#JobQs2').prop('disabled', false);

              $.each(data, function(key, val){
              $select.append('<option data-parentid="'+val.id+'"id="' +val.id + '">' + val.label + '</option>');
              })
      
       }
    });

});


$( "#JobQs2" ).change(function() {
    var $select = $('#JobQs3');

$('#JobQs2ID').val($(this).children(":selected").attr("id"));
    var node = $(this).find(':selected').data('parentid');
    

          $('#JobQs3,#JobQs4,#JobQs5').empty().prop('disabled', true);
          $('#JobQs3ID,#JobQs4ID,#JobQs5ID').val("");
    
    
    
    $.getJSON('/questions/buildQuestion.json?node='+node, function(data){

       if(data.length != 0){
          $('#JobQs3').empty().append('<option>--</option>');
          $('#JobQs3').prop('disabled', false);

              $.each(data, function(key, val){
               $select.append('<option data-parentid="'+val.id+'"id="' +val.id + '">' + val.label + '</option>');
              })
      
       }
    });

});

$( "#JobQs3" ).change(function() {
    var $select = $('#JobQs4');

$('#JobQs3ID').val($(this).children(":selected").attr("id"));
    var node = $(this).find(':selected').data('parentid');
          $('#JobQs4,#JobQs5').empty().prop('disabled', true);
          $('#JobQs4ID,#JobQs5ID').val("");
    
      
    
    $.getJSON('/questions/buildQuestion.json?node='+node, function(data){

       if(data.length != 0){
          $('#JobQs4').empty().append('<option>--</option>');
          $('#JobQs4').prop('disabled', false);

              $.each(data, function(key, val){
              $select.append('<option value="'+val.id+'" data-parentid="'+val.id+'"id="' +val.id + '">' + val.label + '</option>');
              })
      
       }
    });

});
 

$( "#JobQs4" ).change(function() {
    var $select = $('#JobQs5');

$('#JobQs4ID').val($(this).children(":selected").attr("id"));
    var node = $(this).find(':selected').data('parentid');
   
    
    
    
    $.getJSON('/questions/buildQuestion.json?node='+node, function(data){

       if(data.length != 0){
          $('#JobQs5').empty().append('<option>--</option>');
          $('#JobQs5').prop('disabled', false);

              $.each(data, function(key, val){
              $select.append('<option data-parentid="'+val.id+'"id="' +val.label + '">' + val.label + '</option>');
              })
      
       }
    });

});



