$(document).ready(function(){

    $("body").on('click',"#popUpClose",function(e){
        e.preventDefault();
        document.getElementById("eventInfoContent").innerHTML= "<div id='popUpClose'>+</div><div id='circle'>  </div>";
        if(document.getElementById("eventInfo").style.display == "block" ){
                document.getElementById("eventInfo").style.display = "none";
        }
    });

    $("body").on('click',"#AjoutEventPopUpClose",function(e){
        e.preventDefault();
        //document.getElementById("popUp-bg").innerHTML= "<div id='popUpClose'>+</div>";
        if(document.getElementById("popUp-bg").style.display == "block" ){
                document.getElementById("popUp-bg").style.display = "none";
        }
    });


    $('body').on('click',"#ajoutEvent",function(){
        console.log(document.getElementById("popUp-bg").style.display == "none");
        document.getElementById("popUp-bg").style.display = "block";
        document.getElementById("logInForm").style.display = "block";
        
});
    

    $("#MyRows").on('click',".card-img-top",function(e){
        e.preventDefault();
        let obj = $(this);
        let formData = 'EventID=' + obj.parent().find("input[type='hidden']").val();
        console.log(formData);
        var eventInfo = document.getElementById("eventInfo");
        if( eventInfo.style.display == "none"){
                eventInfo.style.display = "block";
        }else{
                eventInfo.style.display = "none";
        }

     if(document.getElementById('YourEvents').getAttribute('data-active') == 'true'){
            $.ajax(
                {
                        url:"fetch_events_info_Unjoin.php",
                        method:"POST",
                        data:formData,
                        dataType:"text",
                        success:function(data){
                        $("#eventInfoContent").append(data);
                        },
                        error:function(data){
                        console.log("error"+ data);
                        }
                }
        );
        }else{
            $.ajax(
                {
                        url:"fetch_events_info.php",
                        method:"POST",
                        data:formData,
                        dataType:"text",
                        success:function(data){
                        $("#eventInfoContent").append(data);
                        },
                        error:function(data){
                        console.log("error"+ data);
                        }
                }
        );
            } 
        
        
    });
    $("#MyRows").on('click',".card-title",function(e){
        e.preventDefault();
        let obj = $(this);
        let formData = 'EventID=' + obj.parent().find("input[type='hidden']").val();
        console.log(formData);
        var eventInfo = document.getElementById("eventInfo");
        if( eventInfo.style.display == "none"){
                eventInfo.style.display = "block";
        }else{
                eventInfo.style.display = "none";
        }
        if(document.getElementById('YourEvents').getAttribute('data-active') == 'true'){
            $.ajax(
                {
                        url:"fetch_events_info_Unjoin.php",
                        method:"POST",
                        data:formData,
                        dataType:"text",
                        success:function(data){
                        $("#eventInfoContent").append(data);
                        },
                        error:function(data){
                        console.log("error"+ data);
                        }
                }
        );
        }else{
            $.ajax(
                {
                        url:"fetch_events_info.php",
                        method:"POST",
                        data:formData,
                        dataType:"text",
                        success:function(data){
                        $("#eventInfoContent").append(data);
                        },
                        error:function(data){
                        console.log("error"+ data);
                        }
                }
        );
        }
        
    });
    

    $("#searchForm").on('submit',function(e){
        
        e.preventDefault();
        var formData = 'search_content=' + $('input[name=search_content]').val();   
        console.log(formData);
        if($('#AllEvents').attr('data-active') == 'true'){
            $.ajax({
                url : "search_All_Events.php",
                method : "POST",
                data :formData,
                dataType: "text",
                success:function(data){
                console.log(data);
                $("#MyRows").html(data);
                },
                complete:function(data){
                    console.log(data);
                },
                error: function(data){
                        console.log('error');
                        console.log(data);
                }
                
        });
        }else{
            $.ajax({
                url : "search_User_Events.php",
                method : "POST",
                data :formData,
                dataType: "text",
                success:function(data){
                console.log(data);
                console.log('i am heeere yeey ');
                $("#MyRows").html(data);
                },
                complete:function(data){
                    console.log(data);
                },
                error: function(data){
                        console.log('error');
                        console.log(data);
                }
                
        });
        }
    });

    $("body").on('click',"#acceptRequest",function(){
        let response = confirm("Do you Really want to accept this request");
        if(response){
            let formData = "contrib_id=" + $(this).parent().parent().attr('id') ;
            console.log(formData);
            $.ajax({
                url : "accept_contrib_request.php",
                method : "POST",
                data :formData,
                dataType: "text",
                success:function(data){
                console.log(data);
                $("#MyRows").html(data);
                },
                complete:function(data){
                    console.log(data);
                },
                error: function(data){
                        console.log('error');
                        console.log(data);
                }
                
        });
        }

    });


    $("body").on('click',"#RefuseRequest",function(){
        let response = confirm("Do you Really want to reject this request");
        if(response){
            let formData = "contrib_id=" + $(this).parent().parent().attr('id') ;
            console.log(formData);
            $.ajax({
                url : "refuse_contrib_request.php",
                method : "POST",
                data :formData,
                dataType: "text",
                success:function(data){
                console.log(data);
                $("#MyRows").html(data);
                },
                complete:function(data){
                    console.log(data);
                },
                error: function(data){
                        console.log('error');
                        console.log(data);
                }
                
        });
        }

    });

    $(".nav-link").each(function(){
        let itemColor = $(this).css("color");
        let bg = $(this).css("backgroundColor");
        $(this).on('mouseenter',function(){
            if($(this).attr('data-active') == "false"){
            $(this).css({
                "transition": "background-color 1s",
                "transition-timing-function": "ease",
                "border-radius": "50px",
                "text-align": "center",
                "background-color": "#343a40",
                color: "goldenrod"})
            }
        });

        $(this).on('mouseleave',function(){
            if($(this).attr('data-active') == "false"){
            $(this).css({
                "transition": "background-color 1s",
                "transition-timing-function": "ease",
                "border-radius": "50px",
                "text-align": "center",
                "background-color": bg,
                "color": itemColor})
            }
        });
    })
    
    $('body').on('click',"#AllEvents",function(e){
        e.preventDefault();
        console.log($(this).css("background-color"));
        $(".nav-link").each(function(){
            $(this).attr("data-active","false");
            $(this).css({"background-color":"transparent",
            "color":"rgb(67, 130, 185)"});  
        });
        $(this).attr("data-active","true");
        $(this).css({"background-color":"goldenrod",
        "color":"white"}); 
        $("#search_bar").css("display","block");
            $.ajax({
                    url : "fetch_Evenements_Acceuil.php",
                    method : "POST",
                    dataType: "text",
                    success:function(data){
                    $("#MyRows").html(data);
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
    
    $('body').on('click',"#Contact",function(e){
        e.preventDefault();
        console.log($(this).css("background-color"));
        $(".nav-link").each(function(){
            $(this).attr("data-active","false");
            $(this).css({"background-color":"transparent",
            "color":"rgb(67, 130, 185)"});   
        });
        $(this).attr("data-active","true");
        $(this).css({"background-color":"goldenrod",
        "color":"white"}); 
        $("#search_bar").css("display","none");
            $.ajax({
                    url : "Contact.php",
                    method : "POST",
                    dataType: "text",
                    success:function(data){
                    $("#MyRows").html(data);
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
    
    $('body').on('click',"#AllContributors",function(e){
        e.preventDefault();
        console.log($(this).css("background-color"));
        $(".nav-link").each(function(){
            $(this).attr("data-active","false");
            $(this).css({"background-color":"transparent",
            "color":"rgb(67, 130, 185)"});   
        });
        $(this).attr("data-active","true");
        $(this).css({"background-color":"goldenrod",
        "color":"white"}); 
        $("#search_bar").css("display","none");
            $.ajax({
                    url : "fetch_contributors.php",
                    method : "POST",
                    dataType: "text",
                    success:function(data){
                    $("#MyRows").html(data);    
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
    
    $('body').on('click',"#ContributorsRequests",function(e){
        e.preventDefault();
        console.log($(this).css("background-color"));
        $(".nav-link").each(function(){
            $(this).attr("data-active","false");
            $(this).css({"background-color":"transparent",
            "color":"rgb(67, 130, 185)"});   
        });
        $(this).attr("data-active","true");
        $(this).css({"background-color":"goldenrod",
        "color":"white"}); 
            $.ajax({
                    url : "fetch_contributors_add_request.php",
                    method : "POST",
                    dataType: "text",
                    success:function(data){
                    $("#MyRows").html(data);
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
   
    $('body').on('click',"#OurContributors",function(e){
        e.preventDefault();
        console.log($(this).css("background-color"));
        $(".nav-link").each(function(){
            $(this).attr("data-active","false");
            $(this).css({"background-color":"transparent",
            "color":"rgb(67, 130, 185)"});   
        });
        $(this).attr("data-active","true");
        $(this).css({"background-color":"goldenrod",
        "color":"white"}); 
        $("#search_bar").css("display","none");
            $.ajax({
                    url : "fetch_contributors.php",
                    method : "POST",
                    dataType: "text",
                    success:function(data){
                     $("#MyRows").html(data);
                     },
                    complete:function(data){

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
            $(this).css({"background-color":"transparent",
            "color":"rgb(67, 130, 185)"}); 
        });
        $(this).attr("data-active","true");
        $(this).css({"background-color":"goldenrod",
        "color":"white"}); 
        $("#search_bar").css("display","block");
            $.ajax({
                    url : "fetch_events_user.php",
                    method : "POST",
                    dataType: "text",
                    success:function(data){
                        if(data !== "<div class='row'> </div>"){
                            console.log(data);
                            $("#MyRows").html(data);
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
        //document.getElementById("eventInfoContent").innerHTML= "<div id='popUpClose'>+</div>";
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
        document.getElementById("eventInfoContent").innerHTML= "<div id='popUpClose'>+</div>";
        document.getElementById('eventInfo').style.display = "none";
            $.ajax({
                    url : "desinscription_events.php",
                    method : "POST",
                    data :formData,
                    dataType: "text",
                    success:function(data){
                    console.log("retour de script : "+data);
                    if(data !== "<div class='row'> </div>"){
                        console.log(data);
                        $("#MyRows").html(data);
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
    
    
        $("body").on('submit',".SuppressionForm",function(e){
    e.preventDefault();
    var obj = $(this);
    var formData = 'SuppressionButtonID=' + $(this).find(">:first").val();
    document.getElementById("eventInfoContent").innerHTML= "<div id='popUpClose'>+</div><div id='circle'>  </div>";
    document.getElementById('eventInfo').style.display = "none";
    console.log(formData);
        $.ajax({
                url : "suppression_events.php",
                method : "POST",
                data :formData,
                dataType: "text",
                success:function(data){
                console.log("retour de script : "+data);
                if(data !== "<div class='row'> </div>"){
                    console.log(data);
                    $("#MyRows").html(data);
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

    $("body").on('submit',".SuppressionContributeurForm",function(e){
    e.preventDefault();
    var obj = $(this);
    var formData = 'SuppressionContributeurButtonID=' + $(this).find(">:first").val();
    console.log(formData);
        $.ajax({
                url : "suppression_Contributeur.php",
                method : "POST",
                data :formData,
                dataType: "text",
                success:function(data){
                console.log("retour de script : "+data);
                if(data !== "<div class='row'> </div>"){
                    console.log(data);
                    $("#MyRows").html(data);
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

    $(".nav-link[data-active='true']").css(
        {"background-color":"goldenrod",
        "color":"white"});   
});
