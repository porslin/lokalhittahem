$(function() {
    $(".delbutton").click(function(){

     var element = $(this);
  
     var del_id = element.attr("id");
   
     var info = 'id=' + del_id;
     if(confirm("Det går inte att ångra detta steg. Vill du verkligen ta bort objektet?")) {
        $.ajax({
         type: "GET",
         url: "delete-object.php",
         data: info,
         success: function(data){ 
         alert("Objektet har raderats.");
         }
      });
      $(this).parents("#data_objects").animate({ backgroundColor: "#fbc7c7" }, "fast")
        .animate({ opacity: "hide" }, "slow");
      }
     return false;
    });
    });