$(document).ready(function() {
    $(".close-box").click(function() {
        $("#error_msg").fadeOut()
    });
});

$(document).ready(function(){
  $('.bxslider').bxSlider();
});

$(document).ready(function() {
  $( "#dialog-confirm-task" ).dialog({
    autoOpen:false,
    resizable: false,
    height:140,
    modal: true,
    buttons: {
      "Delete Task": function() {
        var task_id = $(".opener-task").attr("id");
        var file = "delete_task.php?task_id=";
        var file_w_query_param = file.concat(task_id);
        $(location).attr('href', file_w_query_param);
        $( this ).dialog( "close" );
      },
      Cancel: function() {
        $( this ).dialog( "close" );
      }
    }
  });
  $( ".opener-task" ).click(function() {
    $( "#dialog-confirm-task" ).dialog( "open" );
  });
});

// $(document).ready(function() {
//   $( "#dialog-confirm-proj" ).dialog({
//     autoOpen:false,
//     resizable: false,
//     height:140,
//     modal: true,
//     buttons: {
//       "Delete Project": function() {
//         var proj_id = $(".opener-proj").attr("id");
//         var file = "delete_proj.php?proj_id=";
//         var file_w_query_param = file.concat(proj_id);
//         $(location).attr('href', file_w_query_param);
//         $( this ).dialog( "close" );
//       },
//       Cancel: function() {
//         $( this ).dialog( "close" );
//       }
//     }
//   });
//   $( ".opener-proj" ).click(function() {
//     $( "#dialog-confirm-proj" ).dialog( "open" );
//   });
// });
