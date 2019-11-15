var contributeur = document.getElementById('contrib');
var visiteur = document.getElementById('visit');
var formVisit = document.getElementById('formulaireVisiteur');
var formContrib = document.getElementById('formulaireContributeur');
var mainTitle = document.getElementById('main-SignUp-title');
var container_C = document.getElementById('container-signUpC');
var container_V = document.getElementById('container-signUpV');


contributeur.addEventListener("click",function(){
    container_C.style.display = "block";
    formContrib.style.display = "block";
    contributeur.style.display= "none";
    visiteur.style.display= "none";
           
})

visiteur.addEventListener("click",function(){
    container_V.style.display = "block";
    formVisit.style.display = "block";
    contributeur.style.display= "none";
    visiteur.style.display= "none";
})
