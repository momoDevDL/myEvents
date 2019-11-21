$("#searchForm").on('submit',function(e){
        e.preventDefault();
        var formData = 'search_content=' + $('input[name=search_content]').val();   
        console.log(formData);
            $.ajax({
                    url : "search.php",
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


   /* $(".row").each(function(){
        $(this).on('submit','.InscriptionForm',function(e){
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
                            if(data != "VOUS ETES INSCRIT"){
                            obj.append(data);
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
    })*/

        $("#MyRows").on('submit',".InscriptionForm",function(e){
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
                            if(data != "VOUS ETES INSCRIT"){
                            obj.append(data);
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
            center: ol.proj.fromLonLat([3.876716,43.610769]),
            zoom : 14
        })
    });
    
var markerId = document.getElementById("markerProto");
    
map.addOverlay(new ol.Overlay(
            {
                position : ol.proj.fromLonLat([3.876716,43.610769]),
                element : markerId
            }
        )
    );


$(document).ready(function(){

        $("#accordion").accordion({collapsible: true , heightStyle:'fill'});

        $('body').on('click',"#checkEvents",function(){
                scrollTo( $("#search_bar") );                
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
        function showMoreRows(counter){
                return function(){
                console.log( ":clicked" + counter);
                rows[counter++].removeAttribute("style");
                rows[counter++].removeAttribute("style");
                }
        }
        var rows = document.querySelectorAll(".row");
        var cpt = 2;        
        $('body').on('click',"#showMore",showMoreRows(cpt));      

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
        console.log($("#markerProto"));
         
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
