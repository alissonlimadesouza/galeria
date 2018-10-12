/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function validaCamposJogadores(formulario) {


    var n = document.getElementById(formulario).nome.value;
    var r = document.getElementById(formulario).rg.value;
    var d = document.getElementById(formulario).nascimento.value;



    if (n == "") {
        alert("Campo nome vazio");
        document.getElementById(formulario).nome.focus();

    } else if (r == "") {
        alert("Campo rg vazio");
        document.getElementById(formulario).rg.focus();
    } else if (d == "") {
        alert("Campo data de nascimento vazio");
        document.getElementById(formulario).nascimento.focus();
    } else {
        document.getElementById(formulario).submit();
    }



}




function validaCamposTimes(formulario) {


    var n = document.getElementById(formulario).nome.value;




    if (n == "") {
        alert("Campo time não selecionado");
        document.getElementById(formulario).nome.focus();

    } else {
        document.getElementById(formulario).submit();
    }



}


function validaCamposElenco(formulario) {


    var n = document.getElementById(formulario).time.value;




    if (n == "") {
        alert("Time não selecionado!");
        document.getElementById(formulario).time.focus();

    } else {
        document.getElementById(formulario).submit();
    }



}



function validaTimesCalendario(formulario) {


    var aTime = document.getElementById(formulario).timeA.value;
    var bTime = document.getElementById(formulario).timeB.value;
    var d = document.getElementById(formulario).data.value;
    var t = document.getElementById(formulario).torneio.value;
    var h = document.getElementById(formulario).hora.value;


    if (t == "") {
        alert("Selecione o nome do torneio!");
        document.getElementById(formulario).torneio.focus();
    } else if (h == "") {
        alert("Selecione a hora do torneio!");
        document.getElementById(formulario).hora.focus();
    } else if (d == "") {
        alert("Campo data da partida não foi selecionado!");
        document.getElementById(formulario).data.focus();
    } else if (aTime == "") {

        alert('Selecione O primeiro time!');


        aTime = document.getElementById(formulario).timeA.value = "";
        document.getElementById(formulario).timeA.focus();
    } else if (bTime == "") {

        alert('Selecione O segundo time!');


        bTime = document.getElementById(formulario).timeB.value = "";
        document.getElementById(formulario).timeB.focus();
    } else if (aTime == bTime) {

        alert('Não é possivel escolher o mesmo time para uma só partida!');

        bTime = document.getElementById(formulario).timeB.value = "";
        aTime = document.getElementById(formulario).timeA.value = "";
        document.getElementById(formulario).timeA.focus();
    } else if (aTime == bTime) {

        alert('Não é possivel escolher o mesmo time para uma só partida!');

        bTime = document.getElementById(formulario).timeB.value = "";
        aTime = document.getElementById(formulario).timeA.value = "";
        document.getElementById(formulario).timeA.focus();
    } else {
        document.getElementById(formulario).submit();
    }


}

function validaSumulaTimes(formulario) {


    var aTime = document.getElementById(formulario).timeA.value;
    var bTime = document.getElementById(formulario).timeB.value;




    if (aTime == "") {

        alert('Selecione O primeiro time!');


        aTime = document.getElementById(formulario).timeA.value = "";
        document.getElementById(formulario).timeA.focus();
    } else if (bTime == "") {

        alert('Selecione O segundo time!');


        bTime = document.getElementById(formulario).timeB.value = "";
        document.getElementById(formulario).timeB.focus();
    } else if (aTime == bTime) {

        alert('Não é possivel escolher o mesmo time para uma só partida!');

        bTime = document.getElementById(formulario).timeB.value = "";
        aTime = document.getElementById(formulario).timeA.value = "";
        document.getElementById(formulario).timeA.focus();
    } else {
        document.getElementById(formulario).submit();
    }




}

/*
 * Funções da página 6
 * valida cartões
 * 
 * 
 */

function validaCartoes() {


    var amarelos = document.frmSumulaJogador.elements['amarelos[]'];
    var vermelhos = document.frmSumulaJogador.elements['vermelhos[]'];

    for (i = 0; i < amarelos.length; i++) {

        if (amarelos[i].value == 2) {
            vermelhos[i].value = 1;
            vermelhos[i].focus();
        }
     
    }




    var amarelosB = document.frmSumulaJogador.elements['amarelosB[]'];
    var vermelhosB = document.frmSumulaJogador.elements['vermelhosB[]'];

    for (i = 0; i < amarelosB.length; i++) {

        if (amarelosB[i].value == 2) {
            vermelhosB[i].value = 1;
            vermelhosB[i].focus();
        }
       

    }






}






function teste() {
    alert('teste');
}