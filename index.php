<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        td,th{
            border: solid 1px black;
            width: auto;
            height: 20px;
        }
        td{
            color:black;
        }
        #ini{
            border-radius: 50px;
            border: solid 1px;
            background-color: #01C1FA;
            cursor: pointer;
            color: white;
            width: 80px; 
            height: 40px;
        }
        button{
            border-radius: 50px;
            border: solid 1px;
            background-color: #01C1FA;
            color: white;
            cursor: pointer;
            width: 80px; 
            height: 40px;
        }
    </style>

    <title>Datos</title>
</head>
<body style="background-color: #89BEF0 ; font-family: arial;">

    <center>

        <h1 style="color: #032F59; font-size:50px">Juego de caballos</h1>
        <div id="inicio">
            <div id="caballos">
                <table id="nomca" style="background-color: aqua ; color: blue;">
                    <thead>
                        <th>Número</th>
                        <th>Nombre</th>
                    </thead>
                </table>
            </div>
        <br><br>
        <div id="ingresar">
            <label for="">Ingrese a los caballos que participaran en la carrera:</label>
            <br>
            <table >
                <tr>
                    <td>
                    <input type="number" readonly="readonly" value="1" id="num">
                    </td>
                    <td>
                        <input type="text" placeholder="Nombre" id="nom" >
                    </td>
                </tr>
            </table>
            <br>
            <button onclick="agregar()">Agregar</button>
        </div>
        <br><br>
            <form action="juego.php" method="POST">
                <input type="text"name="nom" id="caja_valor" value="" readonly="readonly" style="display: none;">
                <label for="">Ingrese el número de distancia de la carrera:</label>
                <br>
                <input type="number" min="1" value="5" id="dc"  name="d" min="5">
                <br><br>
                <input type="submit" value="Jugar" id="ini">
            </form>
        </div>
    </center>

    <script>
        var i=0;
        var n
        var nc=[];
        var cd;
        var tableRef = document.getElementById("nomca");
        var r=1;
        function agregar(){
            n=document.getElementById("nom").value;
            if(n!=""){
                nc[i]= n;
                var newRow  = tableRef.insertRow(r);
                var num  = newRow.insertCell(0);
                var no  = newRow.insertCell(1);
                var nt1  = document.createTextNode(i+1);
                var nt2  = document.createTextNode(n);
                num.appendChild(nt1);
                no.appendChild(nt2);
                i++;
                document.getElementById("nom").value="";
                document.getElementById("num").value=i+1;
                document.getElementById("caja_valor").value = nc;
                r++;
            }
        }
    </script>
</body>
</html>

