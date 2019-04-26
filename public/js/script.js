$(document).ready(function(){
    $(".hideShow").hide();
  $("#gridRadios1").click(function(){
    $(".hideShow").hide();
  });
  $("#gridRadios2").click(function(){
    $(".hideShow").show();
  });

  $("#dataTable2").DataTable();
});