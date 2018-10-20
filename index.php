<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>galeria</title>
        <style>
            @import url('css/galeria.css');
        </style>
        <script>
            function img1() {
                document.getElementById('img1').style.visibility = "visible";
                //  document.getElementById('img2').style.visibility = "hidden";
                //  document.getElementById('img3').style.visibility = "hidden";
                document.getElementById("img1").style.transform = "rotateY(-360deg)";

            }
            function img2() {
                document.getElementById('img2').style.visibility = "visible";
                // document.getElementById('img1').style.visibility = "hidden";
                // document.getElementById('img3').style.visibility = "hidden";
                document.getElementById("img2").style.transform = "rotate(360deg)";
                document.getElementById("img2").style.marginLeft = "300px";
            }
            function img3() {
                document.getElementById("img3").style.transform = "rotate(360deg)";
                document.getElementById('img3').style.visibility = "visible";

                //  document.getElementById('img2').style.visibility = "hidden";
                document.getElementById("img3").style.marginLeft = "600px";


            }

            var valor;
            valor = 0;
            var recursiva = function () {

                setTimeout(recursiva, 1200);

                if (valor == 1) {



                    setTimeout(img1, 3000);
                    document.getElementById("img1").style.transform = "rotateY(360deg)";
                    document.getElementById("img1").style.borderRadius = "300px";

                } else if (valor == 2) {

                    setTimeout(img2, 3000);
                    document.getElementById("img2").style.transform = "rotate(-360deg)";
                    document.getElementById("img2").style.marginLeft = "900px";
                    document.getElementById("img3").style.marginLeft = "900px";
                    document.getElementById("img1").style.transform = "rotateX(360deg)";
                    document.getElementById("img2").style.borderRadius = "300px";

                } else if (valor == 3) {
                    document.getElementById("img3").style.transform = "rotate(-360deg)";
                    setTimeout(img3, 4000);
                    document.getElementById("img2").style.marginLeft = "0px";
                    document.getElementById("img1").style.transform = "rotateY(360deg)";
                    document.getElementById("img3").style.borderRadius = "300px";



                } else if (valor == 4) {
                    valor = 0;
                    document.getElementById("img1").style.borderRadius = "0px";
                    document.getElementById("img2").style.borderRadius = "0px";
                    document.getElementById("img3").style.borderRadius = "0px";
                }

                valor++;


            }
        </script>
    </head>
    <body onload="recursiva()">
        Nova atualização
        <input type="button" value="imagem 1" onclick="img1()" >
        <input type="button" value="imagem 2" onclick="img2()" >
        <input type="button" value="imagem 3" onclick="img3()" >
        <div id="img1">

        </div>
        <div id="img2">

        </div>
        <div id="img3">

        </div>
    </body>
</html>
