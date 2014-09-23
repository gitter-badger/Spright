$(document).ready(function() {
  $('.assetForm')
  .bootstrapValidator({
    excluded: [':disabled'],
    feedbackIcons: {
      valid: 'glyphicon glyphicon-ok',
      invalid: 'glyphicon glyphicon-remove',
      validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
      'data[Code][code]': {
        message: 'Please supply a unique asset code',
        validators: {
          remote: {
            message: 'Asset code already in use',
            url: '/codes/validAsset.json',
            data: {
              type: 'code'
            }
          }
        }
      },
      'data[Code][status]': {
        validators: {
          notEmpty: {
            message: 'An asset must have a status'
          }
        }
      },
      city: {
        validators: {
          notEmpty: {
            message: 'The city is required'
          }
        }
      }
    }
  })
        // Called when a field is invalid
        .on('error.field.bv', function(e, data) {
            // data.element --> The field element

            var $tabPane = data.element.parents('.tab-pane'),
            tabId    = $tabPane.attr('id');

            $('a[href="#' + tabId + '"][data-toggle="tab"]')
            .parent()
            .find('i')
            .removeClass('fa-check')
            .addClass('fa-times');
          })
        // Called when a field is valid
        .on('success.field.bv', function(e, data) {
            // data.bv      --> The BootstrapValidator instance
            // data.element --> The field element

            var $tabPane = data.element.parents('.tab-pane'),
            tabId    = $tabPane.attr('id'),
            $icon    = $('a[href="#' + tabId + '"][data-toggle="tab"]')
            .parent()
            .find('i')
            .removeClass('fa-check fa-times');

            // Check if the submit button is clicked
            if (data.bv.getSubmitButton()) {
                // Check if all fields in tab are valid
                var isValidTab = data.bv.isValidContainer($tabPane);
                $icon.addClass(isValidTab ? 'fa-check' : 'fa-times');
              }
            });
      }); 


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
  console.log($select);
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
        $select.append('<option data-parentid="'+val.id+'"id="' +val.id + '">' + val.code + '</option>');
      })
    }else{
      checkForDuplicates(selectName,node);
    }
  }
  )
}

$(function(){
  if($('#page-wrapper').is('.createJob')){

  

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
    $select.append('<option data-parentid="'+val.id+'"id="' +val.id + '">' + val.code + '</option>');
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

}
  })



/* 
 *
 * LOCATION MANAGEMANT 
 *
 */

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


/*
*
*
* ASSET MANAGEMENT
*
*
*/
/*
** Dependant drop downs
*/

$(function(){
  if($('#page-wrapper').is('.assetCreate')){

  jsonURL = '/codes/buildLocations.json';
  container = '#chooseLocation';

$('#BuildingCode, #FloorCode, #RoomCode').prop('disabled', true);

var $selectSite = $('#SiteCode');
//first level
$.getJSON(jsonURL, function(data){
  $.each(data, function(key, val){
    $selectSite.append('<option data-parentid="'+val.id+'"id="' +val.id + '">' + val.code + '</option>');
  })
});
//QS1 Start
$("#SiteCode").change(function() {
  QSdependantList('#SiteCode',1,jsonURL,container);
})
$("#BuildingCode").change(function() {
  QSdependantList('#BuildingCode',2,jsonURL,container);
})
$("#FloorCode").change(function() {
  QSdependantList('#FloorCode',3,jsonURL,container);
})
$("#RoomCode").change(function() {
  QSdependantList('#RoomCode',4,jsonURL,container);
})

  }

});


//Edit Asset
$( ".btnViewMode" ).click(function() {

$(this).toggleClass( "btn-success" );

   if($(this).is(".btn-success")){

        $( ".btnCanMode" ).toggle();
        $( ".btnDecomission" ).toggle();
        $("#CodeAssetviewForm *").prop("disabled", false).not('#CodeCode');

        $(this).prop('type', 'submit');
        $(this).html('Save');
    }else {
      //  $("#CodeAssetviewForm *").prop("disabled", true);
        $( ".btnCanMode" ).toggle();
        $( ".btnDecomission" ).toggle();
        $( "#CodeAssetviewForm" ).submit();

        $(this).html('Saving!');
    }

});

//Cancel Changes Asset
$( ".btnCanMode" ).click(function() {
   location.reload(true); //true force page to reload and not use cache
});

//Delete Attachment Confirmation
$( ".btnDelAttach" ).click(function() {

  var node = this.id;

bootbox.confirm("Are you sure?", function(result) {

  

  console.log(node);

    $.ajax({
      type: "GET",
      url: "/codes/deleteCode/",
      data: { node: node}
    })   
  })


}); 





