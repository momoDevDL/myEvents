$(document).ready(function(){

    $(".nav-link").each(function(){
        $(this).on('mouseover',function(){
            $(this).css({
                "transition": "background-color 1s",
                "transition-timing-function": "ease",
                "border-radius": "50px",
                "text-align": "center",
                "background-color": "#343a40"})
        });

        $(this).on('mouseout',function(){
            $(this).css({
                "transition": "background-color 1s",
                "transition-timing-function": "ease",
                "border-radius": "50px",
                "text-align": "center",
                "background-color": "transparent"})
        });

    })
    
    $('body').on('click',"#AllEvents",function(e){
        e.preventDefault();
        console.log($(this).css("background-color"));
        $(".nav-link").each(function(){
            $(this).attr("data-active","false");
            $(this).css("background-color","transparent");  
        });
        $(this).attr("data-active","true");
        $(this).css("background-color","white");
            $.ajax({
                    url : "fetch_Evenements_Acceuil.php",
                    method : "POST",
                    dataType: "text",
                    success:function(data){
                    $("#Users-Content").html(data);
                    },
                    complete:function(data){
                        console.log(data);
                    },
                    error: function(data){
                            console.log('error');
                            console.log(data);
                    }
                    
            });               
    });
    


    $('body').on('click',"#YourEvents",function(e){
        e.preventDefault();
        console.log($(this).css("background-color"));
        $(".nav-link").each(function(){
            $(this).attr("data-active","false");
            $(this).css("background-color","transparent");  
        });
        $(this).attr("data-active","true");
        $(this).css("background-color","white"); 
            $.ajax({
                    url : "fetch_events_user.php",
                    method : "POST",
                    dataType: "text",
                    success:function(data){
                        if(data !== "<div class='row'> </div>"){
                            console.log(data);
                            $("#Users-Content").html(data);
                            }else{
                                let html = "<div id='NoUserEvents'><p>Vous n'avez aucun evenements actuellement Veuillez consulter nos evenements dans l'ongler 'ALL EVENTS'</p></div>";
                                $("#Users-Content").html(html);
                                console.log(html);
                            }
                    },
                    complete:function(data){

                    },
                    error: function(data){
                            console.log('error');
                            console.log(data);
                    }
                    
            });               
    });

    $("body").on('submit',".InscriptionForm",function(e){
        e.preventDefault();
        var obj = $(this);
        var formData = 'inscriptionButtonID=' + $(this).find(">:first").val();
        console.log(formData);
            $.ajax({
                    url : "inscription_events.php",
                    method : "POST",
                    data :formData,
                    dataType: "text",
                    success:function(data){
                        console.log("retour de script : "+data);
                        if(data != "INSCRIT"){
                        obj.append(data);
                        alert("VOUS ETES DEJA INSCRIT A CET EVENEMENT");
                        }else{
                        obj.find("input[name='inscriptionButton']").val(data) ;
                            }
                        },
                    complete:function(data){
                        console.log(data);
                    },
                    error: function(data){
                            console.log('error');
                            console.log(data);
                    }
                    
            });
    });



    $("body").on('submit',".DesinscriptionForm",function(e){
        e.preventDefault();
        var obj = $(this);
        var formData = 'DesinscriptionButtonID=' + $(this).find(">:first").val();
        console.log(formData);
            $.ajax({
                    url : "desinscription_events.php",
                    method : "POST",
                    data :formData,
                    dataType: "text",
                    success:function(data){
                    console.log("retour de script : "+data);
                    if(data !== "<div class='row'> </div>"){
                        console.log(data);
                        $("#Users-Content").html(data);
                        }else{
                            let html = "<div id='NoUserEvents'><p>Vous n'avez aucun evenements actuellement Veuillez consulter nos evenements dans l'ongler 'ALL EVENTS'</p></div>";
                            $("#Users-Content").html(html);
                            console.log(html);
                        }

                    },
                    complete:function(data){
                        console.log(data);
                    },
                    error: function(data){
                            console.log('error');
                            console.log(data);
                    }
                    
            });
    });
    
    
        

       
$('body').on('click',"#showMore",function(){
    let rows = document.querySelectorAll(".row[style='display :none;']");
    rows[0].removeAttribute("style");
    /*rows[1].removeAttribute("style");*/
});

    $(".nav-link[data-active='true']").css("background-color","white");   
});
