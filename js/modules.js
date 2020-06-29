$(document).ready(() => {
    //get name of program
    $.ajax({

        url: "getProgramName.php",
        method: "POST",
        data:{programId : $("#module-list").attr('data')},
        dataType: "text",
        async: false,
        success: function (html){
            
            if (html != ""){

                $("#programName").html(html);
                
            } 
            else 
            {
                //display error
                $("#programName").html("");
               
            }
        }
        
    });
    
    //get required modules
    $.ajax({

        url: "getModules.php",
        method: "POST",
        data:{
            programId : $("#module-list").attr('data'),
            UID : $("#module-list").attr('student')
        },
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
      
        action = $(this).parents("div#module-card").attr('data-completed');

        $.ajax({

            url: "updatePassedModules.php",
            method: "POST",
            data:{
                UID : $("#module-list").attr('student'),
                MID : $(this).parents("div#module-card").attr('data-id'),
                action : $(this).parents("div#module-card").attr('data-completed')
            },
            dataType: "text",
            async: false,
            
            
        });
        
        $(this).parents("div#module-card").removeAttr('data-completed');

        if(action == 0){
            $(this).parents("div#module-card").attr("data-completed","1");
            $(this).find("span").html("<b>Passed</b>");
        }else
        if(action == 1){
            $(this).parents("div#module-card").attr("data-completed","0");
            $(this).find("span").html("To Do");
        }
        
        
        $(this).children("div.card-body").toggleClass("bg-primary text-white").toggleClass("");

    });

    
   

   
});



