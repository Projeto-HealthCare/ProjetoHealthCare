
function tabs0() {
    document.querySelector(".active").classList.remove("active");
    document.querySelector(".user-post").classList.add("active");
    document.querySelector(".profile-grafico").style.display = "flex";
    document.querySelector(".profile-posts").style.display = "block";
    document.querySelector(".profile-setting").style.display = "none";
}

function tabs1() {
    document.querySelector(".active").classList.remove("active");
    document.querySelector(".user-setting").classList.add("active");
    document.querySelector(".profile-setting").style.display = "block";
    document.querySelector(".profile-posts").style.display = "none";
    document.querySelector(".profile-grafico").style.display = "none";
}

function mostrar(id){
    if(document.getElementById(id).style.display === 'block') {
        document.getElementById(id).style.display = 'none';
        document.getElementById('b'+id).value = "Mostrar";
    }
    else {
        document.getElementById(id).style.display = 'block';
        document.getElementById('b'+id).value = "Ocultar";
    }
}


function mudarEmail() {
   var pergunta = document.getElementById("texto");
   var mostrar = document.getElementById("mudarEmail");
   var btnMudarEmail = document.getElementById("btnMudarEmail");

   if(pergunta.style.display === "none"){
        pergunta.style.display = "inline";
        mostrar.style.display = "none";
        btnMudarEmail.innerHTML = "Mudar E-mail";
   }
   else {
    pergunta.style.display = "none";
    mostrar.style.display = "inline";
    btnMudarEmail.innerHTML = "Ocultar";
    }
}

function mudarTel() {
    var pergunta = document.getElementById("texto");
    var mostrar = document.getElementById("mudarTel");
    var btnMudarTel = document.getElementById("btnMudarTel");
 
    if(pergunta.style.display === "none"){
        pergunta.style.display = "inline";
        mostrar.style.display = "none";
        btnMudarTel.innerHTML = "Mudar Telefone";
    }
    else {
    pergunta.style.display = "none";
    mostrar.style.display = "inline";
    btnMudarTel.innerHTML = "Ocultar";
    }
}

 function mudarSenha() {
    var pergunta = document.getElementById("texto");
    var mostrar = document.getElementById("mudarSenha");
    var btnMudarSenha = document.getElementById("btnMudarSenha");
 
    if(pergunta.style.display === "none"){
        pergunta.style.display = "inline";
        mostrar.style.display = "none";
        btnMudarSenha.innerHTML = "Mudar Senha";
    }
    else {
    pergunta.style.display = "none";
    mostrar.style.display = "inline";
    btnMudarSenha.innerHTML = "Ocultar";
    }
}
