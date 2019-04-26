$(document).ready(function(){
    $(".hideShow").hide();
    
  $("#gridRadios1").click(function(){
    $(".hideShow").hide();
  });


  $("#gridRadios2").click(function(){
    $(".hideShow").show();
  });
    
  $("#gridRadios3").click(function(){
    $(".hideShow").hide();
  });

  $("#gridRadios4").click(function(){
    $(".groupHideShow").hide();
    $(".hideShow").show();
  });

// collective action

$(document).ready(function(){
  $(".groupHideShow").hide()
});
  
$("#showGroup").click(function(){
  $(".hideShow").hide();
  $(".groupHideShow").show();
});


$("#hideGroup").click(function(){
  $(".groupHideShow").hide();
  $(".hideShow").show();
});

  $('#dataTable2').DataTable();
});


// remove icon side bar replace another
$(document).ready(function(){
  $("#tlogo1").hide();

  $("#sidebarToggle").click(function(){
    $("#tlogo").toggle();
    $("#tlogo1").toggle();

  });

});