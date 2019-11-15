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




$(document).ready(function(){

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
        

                

});
