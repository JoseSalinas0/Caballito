<?php
$nombres=explode(",",$_POST["nom"]);
$long = count($nombres);
$dis=$_POST["d"];
$ind=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrera</title>
    <style>
        table{
            border: solid 1px;
            width: auto;
            height: 50px;
        }
        button{
            margin:20px;
            border-radius: 10px;
            border: solid 1px;
            background-color: #01C1FA;
            color: white;
            cursor: pointer;
            width: 80px; 
            height: 30px;
        }

    </style>
</head>
<body style="background-color: #89BEF0 ; font-family: arial;">
    <center>
        <h1 style="color: #032F59; font-size:50px">Juego de los Caballos</h1>
        <?php
            echo "<h2>Tamaño de la carrera: ".$dis."</h2>";
        ?>
        <hr>
        <div>
            <h3>Caballos:</h3>
            <table>
                <thead>
                    <th>Número</th>
                    <th>Nombre</th>
                </thead>
                <tbody>
                <?php
                    for($i=0;$i<$long;$i++){
                ?>
                    <tr>
                    <td><?php echo $i+1?></td>
                    <td><?php echo $nombres[$i]?></td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
        <br>

        <a href="index.php">««« Regresar</a>

        <br>
        <button onclick="jugar()" id="btn" style="position:fixed;">Iniciar</button>
        <br><br>
        <button onclick="recargar()" id="rec" style="display: none;">Jugar de Nuevo</button>
        <hr>
    <h4>Carrera:</h4>
    </center>
    <h3><span id="t">Tiro numero: 0</span></h3>
    <table id="tab">
        <?php
            for($i=0;$i<$long;$i++){
        ?>
            <tr id="">
                <?php
                    for($j=0;$j<$dis;$j++){
                ?>
                <td style="background-color: white; <?php if($j==$dis-1){ ?>background-image: url('lm.png');<?php } ?>">__<?php echo $j+1 ?>__</td>
                <?php
                    }
                ?>
            </tr><br>
        <?php
            }
        ?>
    </table>
    <div id="juego">
    </div>



    <script>
        var nombres=[<?php for($i=0;$i<$long;$i++){ if($i<$long-1){ echo "'".$nombres[$i]."',"; }else{ echo "'".$nombres[$i]."'"; }} ?>];
        var colores=["red","blue","aqua","blueviolet","burlywood","peru","yellow","green","coral","pink","gold","brown","chocolate","darkslateblue","darkslategray"];
        var cc=[];
        var numero=<?php echo $long ?>;
        var distancia=<?php echo $dis?>;
        console.log("Nombres de los caballitos: "+nombres);
        console.log("Numero de caballitos: "+numero);
        console.log("Distancia de la carrera: "+distancia);
        var pasos=[];
        var ganar=false;
        var tiro=1;
        var min = 1;
        var max = 6;
        var pg=0;
        var btn =document.getElementById("btn");
        var rec =document.getElementById("rec");
        var d = document.getElementById("juego");
        for(let i=0;i<numero;i++){
            pasos[i]=0;
        }
        for(let i=0;i<numero;i++){
            var nr = Math.floor(Math.random()*(colores.length-0+1)+0);
            cc[i]=colores[nr];
        }
        console.log("Pasos de cada caballo:");
        console.log(pasos);

        function recargar(){
            location.reload()
        }

        function jugar(){
            if(ganar!=true){
                btn.textContent="Tirar de nuevo";
                document.getElementById("t").textContent="Tiro número "+tiro;
                document.getElementById("tab").remove();
                var tabla  = document.createElement("table");
                var tblBody = document.createElement("tbody");
                for (var i = 0; i < numero; i++) {
                    var hilera = document.createElement("tr");
                    var x = Math.floor(Math.random()*(max-min+1)+min);
                    console.log(x);
                    var pa=pasos[i];
                    pasos[i]+=x;
                    if(pasos[i]>=distancia){
                        if(pg==0){
                            ganar=true;
                            console.log("El caballo ganador ha sido: "+nombres[i]);
                            alert("El caballo ganador ha sido: "+nombres[i]);
                            pg++;
                            rec.style.display="block";
                        }
                    }
                    for (var j = 0; j <= distancia; j++) {
                        var celda = document.createElement("td");
                        var l=j;
                        if(j==0){
                            var textoCelda = document.createTextNode(nombres[i]);
                        }else{
                            var textoCelda = document.createTextNode("__"+l+"__");
                        }
                        celda.appendChild(textoCelda);
                        celda.style.height="35px";
                        if(l<pasos[i]){
                            celda.style.backgroundColor=cc[i];
                        }else if(l==distancia){
                            celda.style.backgroundImage="url('lm.png')";
                        }else if(l==pasos[i]||l>=distancia){
                            celda.style.backgroundImage="url('c.png')";
                            celda.style.backgroundSize="cover";
                        }else{
                            celda.style.backgroundColor="white";
                        }
                        hilera.appendChild(celda);
                    }
                    tblBody.appendChild(hilera);
                }
                tabla.appendChild(tblBody);
                d.appendChild(tabla);
                tabla.setAttribute("border", "2");
                tabla.setAttribute("id", "tab");
                tiro++;
                console.log("Pasos de cada caballo:");
                console.log(pasos);
            }
        }
    </script>
</body>
</html>