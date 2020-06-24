$(document).ready(() => {

    
    $.ajax({

        url: "getModules.php",
        method: "POST",
        data:{userId : $("#module-list").attr('data')},
        dataType: "text",
        async: false,
        success: function (html){
            
            if (html != ""){

                $("#module-list").html(html);
                
            } 
            else 
            {
                //display error
                $("#module-list").html("Error loading modules");
               
            }
        }
        
    });

    $('div.card').click(function(){
        console.log("hi")
        $(this).children("div.card-body").toggleClass("bg-primary text-white").toggleClass("")
    });
   

   
});



