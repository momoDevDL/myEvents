var contributeur = document.getElementById('contrib');
var visiteur = document.getElementById('visit');
var formVisit = document.getElementById('formulaireVisiteur');
var formContrib = document.getElementById('formulaireContributeur');
var mainTitle = document.getElementById("main-title");
contributeur.addEventListener("click",function(){
    
        /*formVisit.style.visibility = "hidden";
        section.style.visibility = "visible";
        formContrib.style.visibility = "visible";
        contributeur.style.visibility = "hidden";*/
        section.toggle();
        formContrib.toggle();
        
   
})

visiteur.addEventListener("click",function(){
    if(formVisit.style.visibility === "hidden"){
        formVisit.style.visibility = "visible";
    }else{
        formVisit.style.visibility = "hidden";
    }
})