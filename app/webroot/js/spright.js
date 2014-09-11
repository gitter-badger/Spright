//Plugin to allow you to select multiple elements via the eq feature;
//Source: http://stackoverflow.com/questions/16213158/use-jquery-to-select-multiple-elements-with-eq

$.fn.eqAnyOf = function (arrayOfIndexes) {
    return this.filter(function(i) {
        return $.inArray(i, arrayOfIndexes) > -1;
    });
};




$(document).ready(function(){
    $(window).resize(function() {

        ellipses1 = $("#bc1 :nth-child(2)")
        if ($("#bc1 a:hidden").length >0) {ellipses1.show()} else {ellipses1.hide()}
        
        ellipses2 = $("#bc2 :nth-child(2)")
        if ($("#bc2 a:hidden").length >0) {ellipses2.show()} else {ellipses2.hide()}
        
    })
    
}); 


/* 
 *
 * Raise a Work Order
 *
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

 $("#JobRoomId").remoteChained("#JobBuildingId", "/rooms/getrooms.json");






function checkForDuplicates(qs,id){
    
        var room_id = $('#JobRoomId').val();

        $.getJSON('/jobs/checkForDuplicates.json?node='+id+'&qs='+qs+'&room_id='+room_id, 
    

            function(data) {
        
        if(data.length != 0){
        bootbox.dialog({
          message: "A job has already been logged against this location for this type of job. Do you still want to raise a job?",
          title: "Possible Duplicate!",
          buttons: {
            danger: {
              label: "Yes",
              className: "btn-danger",
              callback: function() {
            
            }
            },
            success: {
              label: "No",
              className: "btn-success",
              callback: function() {
                window.location.href = "/";
              }
            }
          }
        });
            
        }
            }
    
    
    );
 
    
}  


function QSdependantList(name,level,source,div){
    
    var currentLevel = level;
    var nextLevel = level + 1;
    var feature = div;
    var $select = $(feature+' select:eq('+level+')');
    var selectName = $(this).attr('name');
    var selected = level - 1;
    
    switch(level) {
    case 1:
 var $selectItems = $(feature + 'select').eqAnyOf([1, 2, 3,4]);
        break;
    case 2:
var $selectItems = $(feature + 'select').eqAnyOf([2, 3,4]);
        break;
     case 3:
var $selectItems = $(feature + 'select').eqAnyOf([3,4]);
        break;  
      case 4:
var $selectItems = $(feature + 'select').eqAnyOf([4]);
        break;         

}
    $(name+'ID').val($(feature+' select:eq('+selected+')').children(":selected").attr("id"));

    var node = $(feature+' select:eq('+selected+')').find(':selected').data('parentid')
    $selectItems.empty().prop('disabled', true);
    $selectItems.val("");

    $.getJSON(source+'?node='+node, function(data){

       if(data.length != 0){
    
          $select.empty().append('<option>--</option>');
          $select.prop('disabled', false);

              $.each(data, function(key, val){
              $select.append('<option data-parentid="'+val.id+'"id="' +val.id + '">' + val.label + '</option>');
              })
      
       }else{
       checkForDuplicates(selectName,node);  
       }
       }
       )

}


/*
** Dependant drop downs
*/
$('#JobQs1').prop('disabled', true);
$('#JobQs2').prop('disabled', true);
$('#JobQs3').prop('disabled', true);
$('#JobQs4').prop('disabled', true);
$('#JobQs5').prop('disabled', true);

//Enable when a room has been selected
$('#JobRoomId').change(function() {
    $('#JobQs1').prop('disabled', false);
})
 

var $select = $('#JobQs1');
    //first level
    $.getJSON('/questions/buildQuestion.json', function(data){
    
      $.each(data, function(key, val){
        $select.append('<option data-parentid="'+val.id+'"id="' +val.id + '">' + val.label + '</option>');
      })
});


//QS1 Start
$("#JobQs1").change(function() {
    var source = '/questions/buildQuestion.json';
    var div = '#helpwith';
    QSdependantList('#JobQs1',1,source,div);
})

$("#JobQs2").change(function() {
    var source = '/questions/buildQuestion.json';
    var div = '#helpwith';
    QSdependantList('#JobQs2',2,source,div);
})

$("#JobQs3").change(function() {
    var source = '/questions/buildQuestion.json';
    var div = '#helpwith';
    QSdependantList('#JobQs3',3,source,div);
})

$("#JobQs4").change(function() {
    var source = '/questions/buildQuestion.json';
    var div = '#helpwith';
    QSdependantList('#JobQs1',4,source,div);
})

//QS1 End

/*
$( "#JobQs2" ).change(function() {
    var $select = $('#JobQs3');
    var selectName = $(this).attr('name');

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
      
       }else{
           checkForDuplicates(selectName,node);  
       }
       }
    )}

)
//QS2 End
 
// QS3 Start
$( "#JobQs3" ).change(function() {
    var $select = $('#JobQs4');
    var selectName = $(this).attr('name');

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
       }else{ 
       checkForDuplicates(selectName,node);  
       }
       }
    )}

)
// QS3 End

//QS4 Start
$( "#JobQs4" ).change(function() {
    var $select = $('#JobQs5');
    var selectName = $(this).attr('name');

$('#JobQs4ID').val($(this).children(":selected").attr("id"));
    var node = $(this).find(':selected').data('parentid');

    $.getJSON('/questions/buildQuestion.json?node='+node, function(data){

       if(data.length != 0){
          $('#JobQs5').empty().append('<option>--</option>');
          $('#JobQs5').prop('disabled', false);

              $.each(data, function(key, val){
              $select.append('<option data-parentid="'+val.id+'"id="' +val.label + '">' + val.label + '</option>');
              })
      
       }else{

       checkForDuplicates(selectName,node);  
       }
       }
    )}

)
//QS4 End

*/


/*********************************************************************
* 
*
* LOCATION MANAGEMANT 
*
*
* 
**********************************************************************/

//Disable the add,edit, delete buttons until it is selected in the bind event below
function disableLocButtons(){
    $("#locationAdd").prop('disabled', true);
    $("#locationEdit").prop('disabled', true);
    $("#locationDelete").prop('disabled', true);
}

function enableLocButtons(){
    $("#locationAdd").prop('disabled', false);
    $("#locationEdit").prop('disabled', false);
    $("#locationDelete").prop('disabled', false);
}

 function getLocationData(node,level){
 
 $('#LocationForm').trigger("reset");

    $.getJSON('/codes/viewLocations/'+node+'.json', 
    

    function(data) {
    
    
switch(level) {
    case 2:
        locationType = 'Site';
        $(".building,.floor,.room").hide();
        $(".site").show();
        break;
    case 3:
        locationType = 'Building';
        $(".site,.floor,.room").hide();
         $(".building").show();
        break;
     case 4:
        locationType = 'Floor';
        break;  
     case 5:
        locationType = 'Room';
        break;
}
    
        $('#SiteDescription').val(data[0].description);
        $('#SiteAddress').val(data[0].address);
    
    }
    
    
    );
 
 

 
 
 }


disableLocButtons();

$('#tree1').tree({
    dragAndDrop: false,
        closedIcon: $('<i class="fa fa-arrow-circle-right"></i>'),
    openedIcon: $('<i class="fa fa-arrow-circle-down"></i>')
});

$('#tree2').tree({
    dragAndDrop: false,
        closedIcon: $('<i class="fa fa-arrow-circle-right"></i>'),
    openedIcon: $('<i class="fa fa-arrow-circle-down"></i>')
});


//hide all attributes at first
$(".site,.building").hide();

$('#tree2').bind(
    'tree.select',
    function(event) {
        if (event.node) {
            // node was selected

            enableLocButtons();

            
   var treeName = $('#tree2');
  var node = treeName.tree('getSelectedNode');
  var nodeLevel = $('#tree2').tree('getNodeById',node.id);
  var level = nodeLevel.getLevel();
  
  getLocationData(node.id,level);

        }
        else {
        disableLocButtons();
            // event.node is null
            // a node was deselected
            // e.previous_node contains the deselected node
        }
    }
);






$( "#locationEdit" ).click(function() {


var treeName = $('#tree2');
var selected = treeName.tree('getSelectedNode');



});


$( "#locationDelete" ).click(function() {


bootbox.confirm("Are you sure you want to delete this location?", function(result) {
  
  
   if(result){
    var treeName = $('#tree2');
  var node = treeName.tree('getSelectedNode');

  treeName.tree('removeNode', node);
  
  $.ajax({
      type: "GET",
      url: "/codes/deleteCode/",
      data: { node:node.id}
    })   
  
  
  }
  
}); 

});


$( "#locationAdd" ).click(function() {

  var treeName = $('#tree2');
  var node = treeName.tree('getSelectedNode');
  
  var nodeLevel = $('#tree2').tree('getNodeById',node.id);
  var level = nodeLevel.getLevel();
  
  switch(level) {
    case 1:
        locationType = 'Site';
        break;
    case 2:
        locationType = 'Building';
        break;
     case 3:
        locationType = 'Floor';
        break;  
     case 4:
        locationType = 'Room';
        break;
}
  
  
  bootbox.dialog({
                title: "Create a " + locationType,
                message: '<div class="row">  ' +
                    '<div class="col-md-12"> ' +
                    '<form class="form-horizontal"> ' +
                    '<div class="form-group" id="locationAtt"> ' +
                    '<label class="col-md-4 control-label" for="location">Name *</label> ' +
                    '<div class="col-md-6"> ' +
                    '<input id="location" name=location" type="text" class="form-control input-md"> ' +
                    '<span class="help-block">This must be unique</span> </div> ' +
                    '</div> ' +
                                    '<div class="col-md-12"> ' +
                    '<form class="form-horizontal"> ' +
                    '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="description">Description</label> ' +
                    '<div class="col-md-6"> ' +
                    '<textarea id="description" name=description" type="text" class="form-control input-md"> </textarea>' +
                    '</div> ' +
                    '</form> </div>  </div>',
                buttons: {
                    success: {
                        label: "Save",
                        className: "btn-success",
                        callback: function () {
                        
                        var location = $('#location').val();
                        
                          if (!location){ 
                 $('#locationAtt').attr('class', 'has-error'); 
                return false; 
                          }
                        
                        
          $.ajax({
                 type: "GET",
                url: "/codes/saveCode/",
                  data: { location: location, parent_id:node.id},
                  success: function(data) {
          savedNowAppend(node.id,location,data);

            }
    })  
                        }
                    }
                }
            }
        );

  
  



});


function savedNowAppend(parent,name,id){

 var treeName = $('#tree2');
 var parent_node = treeName.tree('getNodeById', parent);
 
  
 
 
 
 treeName.tree('openNode', parent_node);

  treeName.tree(
  
    'appendNode',
    {
        label: name,
        id: id
    },
    parent_node
   
);

var new_node = treeName.tree('getNodeById', id);
treeName.tree('addToSelection', new_node);

}




