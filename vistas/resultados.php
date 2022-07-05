<?php
require_once ('../controlador/controlador.php');

$a= new controlador();
$products=$a->obtenerEquipos();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../lib/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="../lib/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../lib/css/sweetalert.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../lib/fonta/css/all.css" type="text/css" />

    <script type="text/javascript" language="javascript" src="../lib/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="../lib/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="../lib/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript" src="../lib/js/comunes.js"></script>

    <script type="text/javascript" language="javascript" src="../lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="../lib/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="../lib/js/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="../lib/js/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="../lib/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="../lib/js/sweetalert.js"></script>

</head>
<style>
    .pregunta{
        background-color: #38b4e7;
        margin-top:  2%;
        margin-bottom:  2%;
        margin-right:  5%;
        margin-left:  5%;
        height: 15rem;
        border-radius: 20px;
        font-weight: bold;
        font-size: 14pt;
    }

    .ganador{
        background-color: #051C48;
        color: #fff;
        -webkit-text-stroke: 2px #FFD700;
        margin-top:  2%;
        margin-bottom:  2%;
        margin-right:  5%;
        margin-left:  5%;
        height: 9rem;
        border-radius: 20px;
        font-weight: bold;
        font-size: 14pt;
    }
    body {
        background-image: url("../lib/imagenes/fondoReto-nuevo.jpg");
        padding: 25px;
        background-color: #cccccc;
        background-position: center; /* Center the image */
        background-repeat: no-repeat; /* Do not repeat the image */
        background-size: 100% 100%; /* Resize the background image to cover the entire container */
    }
    .opciones{
        background-color: #38b4e7;
        margin: 5%;
        height: 7rem;
        border-radius: 30px;
        font-weight: bold;
        width: 300px;
        align-items: center;
        justify-items: center;
        justify-content: center;
        text-align: center;
    }

    .teams{
        background-color: #a2a2a291;
        margin: 1%;
        height: 4rem;
        border-radius: 30px;
        font-weight: bold;
        width: 450px;
        align-items: center;
        justify-items: center;
        justify-content: center;
        text-align: center;
    }

    .teamsTurns{
        background-color: #051C48;
        color: #fff;
        margin: 1%;
        height: 4rem;
        border-radius: 30px;
        font-weight: bold;
        width: 450px;
        align-items: center;
        justify-items: center;
        justify-content: center;
        text-align: center;
    }



    .opcionCorrecta{
        background-color: #b1ffd0;
        margin: 5%;
        height: 7rem;
        border-radius: 30px;
        font-weight: bold;
        width: 300px;
        align-items: center;
        justify-items: center;
        justify-content: center;
        text-align: center;
    }

    .btn-options{
        color: #000;
        background-color: #f9fcff;
        border-color: #b4b4b4;
    }

    .opcionErrada{
        background-color: #ffa3a3;
        margin: 5%;
        height: 7rem;
        border-radius: 30px;
        font-weight: bold;
        width: 300px;
        align-items: center;
        justify-items: center;
        justify-content: center;
        text-align: center;
    }

    .titleOpciones{
        margin-left: 10%;
        font-weight: bold;
        font-size: 14pt;

    }

    .animacion {
        /*position: absolute;*/

        animation-name: parpadeo;
        animation-duration: 1s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;

        -webkit-animation-name:parpadeo;
        -webkit-animation-duration: 1s;
        -webkit-animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;
    }

    @-moz-keyframes parpadeo{
        0% { opacity: 0.3; }
        50% { opacity: 0.7; }
        100% { opacity: 0.3; }
    }

    @-webkit-keyframes parpadeo {
        0% { opacity: 0.3; }
        50% { opacity: 0.7; }
        100% { opacity: 0.3; }
    }

    @keyframes parpadeo {
        0% { opacity: 0.3; }
        50% { opacity: 0.7; }
        100% { opacity: 0.3; }
    }
</style>
<body>
<div class="container">
    <div id="ELIMINATORIA" style="display: none;">
        <div class="col-12"><span style="font-weight: bold; font-size: 18pt; color: #051c48;">ELIMINATORIAS</span></div>
    </div>
    <div id="SEMI-FINAL" style="display: none;">
        <div class="col-12"><span style="font-weight: bold; font-size: 18pt; color: #051c48;">SEMI-FINAL</span></div>

    </div>
    <div id="FINAL" style="display: none;">
        <div class="col-12"><span style="font-weight: bold; font-size: 18pt; color: #051c48;">FINAL</span></div>

    </div>






</div>
</body>
<script>
    $(document).ready( function () {


        var caso="obtenerResultados";

$.ajax({
    type: "POST",
    url: '../controlador/enrutador.php',
    data: {'caso': caso},//capturo array
    success: function(data){
        var numEliminatoria = 0;
        var numSemi = 0;
        data.data.map(function (item){
            var divEncuentro = '<div id="encuentro'+item.Id+'" class="d-flex justify-content-around"></div>'

            var textPartida ='';
            var divEquipo1='';
            var divEquipo2='';
            var divEquipo3='';
            var divEquipo4='';
            if (item.Ronda == 'ELIMINATORIA'){
                numEliminatoria++;
                textPartida='<div class="col-12"><span style="font-weight: bold; font-size: 14pt; color: #051c48;"> ENCUENTRO '+numEliminatoria+'</span></div>';
                $("#ELIMINATORIA").append(textPartida)

                $("#ELIMINATORIA").css('display','')
                $("#ELIMINATORIA").append(divEncuentro)
                if(parseInt(item.Equipo1) > 0){
                    divEquipo1='<div class="teams" id="Resultteam_'+item.Id+'_'+item.Equipo1+'"><div  style="margin-top: 2%;"'+item.Equipo1+'">'+item.NameEquipo1+'</div><div  ><span id="ResultPuntosEquipo'+item.Equipo1+'">'+item.PuntosEquipo1+'</span></div></div></div>';
                    $("#encuentro"+item.Id).append(divEquipo1)
                }
                if(parseInt(item.Equipo2) > 0){
                    divEquipo2='<div class="teams" id="Resultteam_'+item.Id+'_'+item.Equipo2+'"><div  style="margin-top: 2%;"'+item.Equipo2+'">'+item.NameEquipo2+'</div><div  ><span id="ResultPuntosEquipo'+item.Equipo2+'">'+item.PuntosEquipo2+'</span></div></div></div>';
                    $("#encuentro"+item.Id).append(divEquipo2)

                }
                if(parseInt(item.Equipo3) > 0){
                    divEquipo3='<div class="teams" id="Resultteam_'+item.Id+'_'+item.Equipo3+'"><div  style="margin-top: 2%;"'+item.Equipo3+'">'+item.NameEquipo3+'</div><div  ><span id="ResultPuntosEquipo'+item.Equipo3+'">'+item.PuntosEquipo3+'</span></div></div></div>';
                    $("#encuentro"+item.Id).append(divEquipo3)

                }
                if(parseInt(item.Equipo4) > 0){
                    divEquipo4='<div class="teams" id="Resultteam_'+item.Id+'_'+item.Equipo4+'"><div style="margin-top: 2%;"'+item.Equipo4+'">'+item.NameEquipo4+'</div><div  ><span id="ResultPuntosEquipo'+item.Equipo4+'">'+item.PuntosEquipo4+'</span></div></div></div>';
                    $("#encuentro"+item.Id).append(divEquipo4)

                }
                $("#Resultteam_"+item.Id+"_"+item.Ganador).removeClass('teams')
                $("#Resultteam_"+item.Id+"_"+item.Ganador).addClass('teamsTurns')

            }else if(item.Ronda == 'FINAL'){
                $("#FINAL").css('display','')
                $("#FINAL").append(divEncuentro)

                if(parseInt(item.Equipo1) > 0){
                    divEquipo1='<div class="teams" id="Resultteam_'+item.Id+'_'+item.Equipo1+'"><div  style="margin-top: 2%;"'+item.Equipo1+'">'+item.NameEquipo1+'</div><div  ><span id="ResultPuntosEquipo'+item.Equipo1+'">'+item.PuntosEquipo1+'</span></div></div></div>';
                    $("#encuentro"+item.Id).append(divEquipo1)
                }
                if(parseInt(item.Equipo2) > 0){
                    divEquipo2='<div class="teams" id="Resultteam_'+item.Id+'_'+item.Equipo2+'"><div  style="margin-top: 2%;"'+item.Equipo2+'">'+item.NameEquipo2+'</div><div  ><span id="ResultPuntosEquipo'+item.Equipo2+'">'+item.PuntosEquipo2+'</span></div></div></div>';
                    $("#encuentro"+item.Id).append(divEquipo2)

                }
                if(parseInt(item.Equipo3) > 0){
                    divEquipo3='<div class="teams" id="Resultteam_'+item.Id+'_'+item.Equipo3+'"><div  style="margin-top: 2%;"'+item.Equipo3+'">'+item.NameEquipo3+'</div><div  ><span id="ResultPuntosEquipo'+item.Equipo3+'">'+item.PuntosEquipo3+'</span></div></div></div>';
                    $("#encuentro"+item.Id).append(divEquipo3)

                }
                if(parseInt(item.Equipo4) > 0){
                    divEquipo4='<div class="teams" id="Resultteam_'+item.Id+'_'+item.Equipo4+'"><div style="margin-top: 2%;"'+item.Equipo4+'">'+item.NameEquipo4+'</div><div  ><span id="ResultPuntosEquipo'+item.Equipo4+'">'+item.PuntosEquipo4+'</span></div></div></div>';
                    $("#encuentro"+item.Id).append(divEquipo4)

                }
                $("#Resultteam_"+item.Id+"_"+item.Ganador).removeClass('teams')
                $("#Resultteam_"+item.Id+"_"+item.Ganador).addClass('teamsTurns')
            }else{
                numSemi++;
                textPartida='<div class="col-12"><span style="font-weight: bold; font-size: 14pt; color: #051c48;"> ENCUENTRO '+numSemi+'</span></div>';
                $("#SEMI-FINAL").append(textPartida)

                $("#SEMI-FINAL").css('display','')
                $("#SEMI-FINAL").append(divEncuentro)

                if(parseInt(item.Equipo1) > 0){
                    divEquipo1='<div class="teams" id="Resultteam_'+item.Id+'_'+item.Equipo1+'"><div  style="margin-top: 2%;"'+item.Equipo1+'">'+item.NameEquipo1+'</div><div  ><span id="ResultPuntosEquipo'+item.Equipo1+'">'+item.PuntosEquipo1+'</span></div></div></div>';
                    $("#encuentro"+item.Id).append(divEquipo1)
                }
                if(parseInt(item.Equipo2) > 0){
                    divEquipo2='<div class="teams" id="Resultteam_'+item.Id+'_'+item.Equipo2+'"><div  style="margin-top: 2%;"'+item.Equipo2+'">'+item.NameEquipo2+'</div><div  ><span id="ResultPuntosEquipo'+item.Equipo2+'">'+item.PuntosEquipo2+'</span></div></div></div>';
                    $("#encuentro"+item.Id).append(divEquipo2)

                }
                if(parseInt(item.Equipo3) > 0){
                    divEquipo3='<div class="teams" id="Resultteam_'+item.Id+'_'+item.Equipo3+'"><div  style="margin-top: 2%;"'+item.Equipo3+'">'+item.NameEquipo3+'</div><div  ><span id="ResultPuntosEquipo'+item.Equipo3+'">'+item.PuntosEquipo3+'</span></div></div></div>';
                    $("#encuentro"+item.Id).append(divEquipo3)

                }
                if(parseInt(item.Equipo4) > 0){
                    divEquipo4='<div class="teams" id="Resultteam_'+item.Id+'_'+item.Equipo4+'"><div style="margin-top: 2%;"'+item.Equipo4+'">'+item.NameEquipo4+'</div><div  ><span id="ResultPuntosEquipo'+item.Equipo4+'">'+item.PuntosEquipo4+'</span></div></div></div>';
                    $("#encuentro"+item.Id).append(divEquipo4)

                }

                $("#Resultteam_"+item.Id+"_"+item.Ganador).removeClass('teams')
                $("#Resultteam_"+item.Id+"_"+item.Ganador).addClass('teamsTurns')
            }

        })
       $('.container').css('height',screen.height);

    },
    error: function (request, status, error) {
        swal("Error!", "ha ocurrido un problema con el servidor.", "error");
    }
}); 

    });

   

</script>

