$("#searchForm").on('submit',function(e){
        e.preventDefault();
        var formData = 'search_content=' + $('input[name=search_content]').val();   
        console.log(formData);
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
    });

    $("body").on('click',"#popUpClose",function(e){
        e.preventDefault();
        document.getElementById("eventInfoContent").innerHTML= "<div id='popUpClose'>+</div><div id='circle'>  </div>";
        if(document.getElementById("eventInfo").style.display == "block" ){
                document.getElementById("eventInfo").style.display = "none";
        }
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
                        alert("VOUS NE POUVEZ PAS VOUS INSCRIRE SANS AUTHENTIFICATION");
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



function scrollTo( target ) {
if( target.length ) {
        $("html, body").stop().animate( { scrollTop: target.offset().top }, 1500);
}
}

var map = new ol.Map({
        target:'map',
        layers:[
            new ol.layer.Tile({
                source: new ol.source.OSM()
            })
        ],
        view : new ol.View({
            center: ol.proj.fromLonLat([0.33333,46.583328]),
            zoom : 14
        })
    });
  


    $(document).ready(function(){

        $("#accordion").accordion({collapsible: true , heightStyle:'fill'});

        $("#RoleEventSurferButton").css({
                "backgroundColor":"red",
                "color":"white",
                "border-radius":"20px",
                "padding-top":"5px",
                "padding-bottom":"5px",
        });    
        $("#RoleContribButton").css({
                "backgroundColor":"white",
                "color":"black",
                "border-radius":"20px",
                "padding-top":"5px",
                "padding-bottom":"5px",
        });

        $('body').on('click',"#checkEvents",function(){
                scrollTo( $("#search_bar") );                
        }); 

        $('body').on('click',"#RoleContribButton",function(){
                $("#signUpForm input[type='hidden']").val("CONTRIBUTEUR");

                $("#RoleEventSurferButton").css({
                        "backgroundColor":"white",
                        "color":"black",
                        "border-radius":"20px",
                        "padding-top":"5px",
                        "padding-bottom":"5px",
                });    

                $("#RoleContribButton").css({
                        "backgroundColor":"red",
                        "color":"white",
                        "border-radius":"20px",
                        "padding-top":"5px",
                        "padding-bottom":"5px",
                });
        });

        $('body').on('click',"#RoleEventSurferButton",function(){
                $("#signUpForm input[type='hidden']").val("VISITEUR");
                $("#RoleContribButton").css({
                        "backgroundColor":"white",
                        "color":"black",
                        "border-radius":"20px",
                        "padding-top":"5px",
                        "padding-bottom":"5px",
                });
                $("#RoleEventSurferButton").css({
                        "backgroundColor":"red",
                        "color":"white",
                        "border-radius":"20px",
                        "padding-top":"5px",
                        "padding-bottom":"5px",
                });                
        });

        $('body').on('click',"#logIn",function(){
                console.log(document.getElementById("popUp-bg").style.display == "none");
                document.getElementById("popUp-bg").style.display = "block";
                document.getElementById("logInForm").style.display = "block";
                
        });

        $('body').on('click',"#signUp",function(){
                console.log(document.getElementById("popUp-bg").style.display == "none");
                document.getElementById("popUp-bg").style.display = "block";
                document.getElementById("signUpForm").style.display = "block";
                
});
        
        $('body').on('click',"#popUpClose",function(){
                if(document.getElementById("logInForm").style.display == "block" ){
                        document.getElementById("logInForm").style.display = "none";
                }
                if(document.getElementById("signUpForm").style.display == "block" ){
                        document.getElementById("signUpForm").style.display = "none";
                }
                document.getElementById("popUp-bg").style.display = "none";
        });
        /*------------------------------------------------------------------ */
       
            
        $('body').on('click',"#showMore",function(){
                let rows = document.querySelectorAll(".row[style='display :none;']");
                rows[0].removeAttribute("style");
                rows[1].removeAttribute("style");

        });      

        arrayOfMarkers = [];

        function initializeArrayOfMarkers(){
                $('#accordion input[type=checkbox]').each(function(){
                let image = $('#markerProto').clone();
                    image.attr("id","marker"+$(this).val());
                    image.attr("class",$(this).val());
                    image.attr("style","display:none");
                    $('#Map').append(image);

                arrayOfMarkers[$(this).val()] = new ol.Overlay(
                        {
                                position:ol.proj.fromLonLat([$(this).attr("data-lon"),$(this).attr("data-lat")]),
                                element : document.getElementById("marker"+$(this).val())
                        }
                );
                });
        }

        initializeArrayOfMarkers();
        console.log(arrayOfMarkers);
         
       // console.log($("#marker! ANNULÉ ! ATELIERS LES PETITES POUSSES    - Mon jardin portatif.marker'"));
        /*------------------------------------------------------------------ */
        $('#accordion').on('change',"input[type=checkbox]",function(){
                let valeur = $(this).val();
               map.addOverlay(arrayOfMarkers[valeur]);
                
                if($(this).is(':checked')){
                        console.log(document.getElementById("marker"+valeur));
                        document.getElementById("marker"+valeur).style.display = "block";
                }else{
                        console.log(valeur);
                        document.getElementById("marker"+valeur).style.display = "none";
                }
        });
                
});
