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

    <script type="text/javascript" src="../lib/inc/TimeCircles.js"></script>
    <link rel="stylesheet" href="../lib/inc/TimeCircles.css" />
    <link rel="stylesheet" href="../lib/animated/animate.css" />
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
    <div class="d-flex justify-content-around" id="Equipos" >    </div>
    <div class="d-flex justify-content-around" id="Equipos2" >    </div>

    <div class="d-flex justify-content-center align-items-center text-center pregunta" id="pregunta" >
    </div>
    <input type="hidden" id="IdPregunta">
    <input type="hidden" id="Correcta">
    <input type="hidden" id="Seleccion">
    <input type="hidden" id="IdEncuentro">
    <input type="hidden" id="TurnoEquipo">
    <input type="hidden" id="EquipoDelantera" value="">

    <input type="hidden" id="IdEquipo1" value="0">
    <input type="hidden" id="IdEquipo2" value="0">
    <input type="hidden" id="IdEquipo3" value="0">
    <input type="hidden" id="IdEquipo4" value="0">


    <input type="hidden" id="EnCurso" value="0">
    <div class="d-flex justify-content-around" id="Opciones" >
        <div >
            <span class="titleOpciones">OPCION A</span>
            <div class="opciones d-flex justify-content-center align-items-center text-center" id="OpcionA" onclick="selectedOption(this.id);" class="d-flex justify-content-center align-items-center"></div>
            <span class="titleOpciones">OPCION C</span>
            <div class="opciones d-flex justify-content-center align-items-center text-center" id="OpcionC" onclick="selectedOption(this.id);" class="d-flex justify-content-center align-items-center"></div>

        </div>
        <div class="timmer" style="width: 20%;">
            <div id="CountDownTimer" data-timer="31" style="width: 250px; height: 250px;"></div>
            <div class="text-center" style="width: 250px; margin-left: -5px;">
                <button class="btn btn-success startTimer" style="width: 49%;">Iniciar</button>
                <button class="btn btn-danger stopTimer" style="width: 49%;">Parar</button>
                <button class="btn mt-2 col-12 btn-primary" id="enviar">Responder</button></div>
            </div>

        <div>
            <span class="titleOpciones">OPCION B</span>
            <div class="opciones d-flex justify-content-center align-items-center text-center" id="OpcionB" onclick="selectedOption(this.id);" class="d-flex justify-content-center align-items-center" ></div>
            <span class="titleOpciones">OPCION D</span>
            <div class="opciones d-flex justify-content-center align-items-center text-center" id="OpcionD" onclick="selectedOption(this.id);" class="d-flex justify-content-center align-items-center"></div>


        </div>
    </div>

    <div id="numpregunta"  style="margin-left: 7%; margin-right: 5%;">
    </div>
    <div class="text-center col-12" style="font-size: 10pt;">
        <button class="btn btn-options" style="width: 20%;" onclick="SaltarTurno();">Saltar turno</button>

        <button class="btn btn-options" id="btnAnterior" style="width: 20%;" onclick="AnularAnterior();">Anular Pregunta Anterior</button>
        <button class="btn btn-options" style="width: 20%;" onclick="AnularActual();">Anular Pregunta Actual</button>
        <button class="btn btn-danger" style="width: 15%;" onclick="checkFinalizar();">Finalizar</button></div>

</div>

<div class="vacio" style="display: none;">
    <div class="d-flex justify-content-center align-items-center text-center pregunta"  style="display: none;" id="msjVacio" >
        <H1>NO EXISTEN ENCUENTROS DEFINIDOS</H1>
    </div>


</div>

<div class="resultado" style="display: none; padding: 7%;">

    <div class="d-flex justify-content-around" id="EquiposResultado" >    </div>
    <div class="d-flex justify-content-around" id="EquiposResultado2" >    </div>

    <div class="text-center ganador" id="Ganador" >
        <div class="col-12"><H1>GANADOR</H1></div>
        <div class="col-12"><H1 id="NameGanador"></H1></div>
    </div>
</div>

</body>
<script>
    $("#CountDownTimer").TimeCircles({ time: { Days: { show: false }, Hours: { show: false }, Minutes: { show: false } }});

    $(document).ready( function () {
        const musicfondo = new Audio('../lib/sonido/fondo1.mp3');
        musicfondo.play();
        $("#IdPregunta").val('')
        $("#btnAnterior").attr('disabled','disabled')
        // Start and stop are methods applied on the public TimeCircles instance
        $(".startTimer").click(function() {
            $("#CountDownTimer").TimeCircles().start();
            $("#pregunta").removeClass('animate__animated');
            $("#pregunta").removeClass('animate__bounceInLeft');
            $(".opciones").removeClass('animate__animated');
            $(".opciones").removeClass('animate__bounceInLeft');
            $(".titleOpciones").removeClass('animate__animated');
            $(".titleOpciones").removeClass('animate__bounceInLeft');
        });
        $(".stopTimer").click(function() {
            $("#CountDownTimer").TimeCircles().stop();
        });


        $("#enviar").click(function() {
            console.log(".....")
            var IdPregunta = $("#IdPregunta").val();
            var Correcta = $("#Correcta").val();
            var Seleccion = $("#Seleccion").val();
            if (Seleccion != ""){
                $("#enviar").attr('disabled',true);
                $("#EnCurso").val('0')
                console.log(IdPregunta, ".....", Seleccion, Correcta)

            if (Correcta.trim() == Seleccion.trim()) {
                $("#Opcion" + Correcta).addClass('opcionCorrecta')
                $("#Opcion" + Correcta).removeClass('opciones')

                const musicCorrecta = new Audio('../lib/sonido/aplausos.mp3');
                musicCorrecta.play();

            } else {
                $("#Opcion" + Correcta).addClass('opcionCorrecta')
                $("#Opcion" + Seleccion).addClass('opcionErrada')
                $("#Opcion" + Correcta).removeClass('opciones')
                $("#Opcion" + Seleccion).removeClass('opciones')
                $("#Opcion" + Correcta).addClass('animacion')
                const musicErrada = new Audio('../lib/sonido/fin.mp3');
                musicErrada.play();
            }
                $("#CountDownTimer").TimeCircles().restart();
                $("#CountDownTimer").TimeCircles().stop();

                GuardarRespuesta();


        }else{
                swal('Advertencia','Debe Seleccionar una opción','warning');
            }



        });


        $("#CountDownTimer").TimeCircles().stop();
        var caso="obtenerPreguntas";

        $.ajax({
            type: "POST",
            url: '../controlador/enrutador.php',
            data: { 'caso': caso},//capturo array
            success: function(data){
                console.log(data.encuentro)
                if(data.encuentro == false){

                        $(".container").css('display','none');
                        $(".vacio").css('display','');
                        $(".vacio").css('height',screen.height);


                }else{
                    var count= 0;
                    data.data.map(function (value){
                        var button="";
                        count++;
                        if(value.Estatus > 0)
                            button='<button  class="text-center btn" id="pregunta_'+value.Id+'" onclick="mostrarpregunta('+value.Id+')" style="margin: 5px;width: 50px; background-color: #051c48; color: #fff;">'+count+'</button>';
                        else
                            button='<button  class="text-center btn btn-secondary" disabled="disabled" id="pregunta_'+value.Id+'" onclick="mostrarpregunta('+value.Id+')" style="margin: 5px;width: 50px;">'+count+'</button>';

                        $('#numpregunta').append(button);
                    })





                    if(data.encuentro.Id > 0){
                        console.log(data.encuentro)
                        var divEquipo1='';
                        var divEquipo2='';
                        var divEquipo3='';
                        var divEquipo4='';
                        $("#IdEncuentro").val(data.encuentro.Id)
                        if(parseInt(data.encuentro.Equipo1) > 0){
                            $("#IdEquipo1").val(data.encuentro.Equipo1)
                            divEquipo1='<div class="teams" id="team_'+data.encuentro.Equipo1+'"><div class="col-12 text-center " id="NameEquipo'+data.encuentro.Equipo1+'">'+data.encuentro.NameEquipo1+'</div><div class="row"><div  class="col-6 text-center " >Turnos: <span id="TurnoEquipo'+data.encuentro.Equipo1+'">0</span></div><div  class="col-6 text-center ">Puntos: <span id="PuntosEquipo'+data.encuentro.Equipo1+'">0</span></div></div></div>';
                            $("#Equipos").append(divEquipo1)
                        }else{
                            $("#IdEquipo1").val(0)
                        }
                        if(parseInt(data.encuentro.Equipo2) > 0){
                            $("#IdEquipo2").val(data.encuentro.Equipo2)
                            divEquipo2='<div class="teams" id="team_'+data.encuentro.Equipo2+'"><div class="col-12 text-center " id="NameEquipo'+data.encuentro.Equipo2+'">'+data.encuentro.NameEquipo2+'</div><div class="row"><div  class="col-6 text-center " >Turnos: <span id="TurnoEquipo'+data.encuentro.Equipo2+'">0</span></div><div  class="col-6 text-center ">Puntos: <span id="PuntosEquipo'+data.encuentro.Equipo2+'">0</span></div></div></div>';
                            $("#Equipos").append(divEquipo2)

                        }else{
                            $("#IdEquipo2").val(0)
                        }
                        if(parseInt(data.encuentro.Equipo3) > 0){
                            $("#IdEquipo3").val(data.encuentro.Equipo3)
                            divEquipo3='<div class="teams" id="team_'+data.encuentro.Equipo3+'"><div class="col-12 text-center " id="NameEquipo'+data.encuentro.Equipo3+'">'+data.encuentro.NameEquipo3+'</div><div class="row"><div  class="col-6 text-center " >Turnos: <span id="TurnoEquipo'+data.encuentro.Equipo3+'">0</span></div><div  class="col-6 text-center ">Puntos: <span id="PuntosEquipo'+data.encuentro.Equipo3+'">0</span></div></div></div>';
                            $("#Equipos2").append(divEquipo3)

                        }else{
                            $("#IdEquipo3").val(0)
                        }
                        if(parseInt(data.encuentro.Equipo4) > 0){
                            $("#IdEquipo4").val(data.encuentro.Equipo4)
                            divEquipo4='<div class="teams" id="team_'+data.encuentro.Equipo4+'"><div class="col-12  text-center " id="NameEquipo'+data.encuentro.Equipo4+'">'+data.encuentro.NameEquipo4+'</div><div class="row"><div  class="col-6 text-center " >Turnos: <span id="TurnoEquipo'+data.encuentro.Equipo4+'">0</span></div><div  class="col-6 text-center ">Puntos: <span id="PuntosEquipo'+data.encuentro.Equipo4+'">0</span></div></div></div>';
                            $("#Equipos2").append(divEquipo4)

                        }else{
                            $("#IdEquipo4").val(0)
                        }

                    }



                    if(data.puntos.length > 0){
                        data.puntos.map(function (item){
                            $("#PuntosEquipo"+item.Equipo).html(item.puntos);
                        })
                    }
                    if(data.turnos.length > 0){
                        data.turnos.map(function (item){
                            console.log(parseInt(item.CantTurnos) > 0)
                            if(parseInt(item.CantTurnos) > 0)
                            {
                                $("#btnAnterior").removeAttr('disabled');
                            }
                            $("#TurnoEquipo"+item.IdEquipo).html(item.CantTurnos);
                        })
                    }
                    if(parseInt(data.delantera.Equipo) > 0){
                        $("#EquipoDelantera").val(data.delantera.Equipo)

                    }
                    if(parseInt(data.proximoturno.Id) > 0){
                        console.log('#team_'+data.proximoturno.IdEquipo)
                        $("#TurnoEquipo").val(data.proximoturno.IdEquipo)
                        $("#team_"+data.proximoturno.IdEquipo).removeClass('teams');
                        $("#team_"+data.proximoturno.IdEquipo).addClass('teamsTurns');
                    }
                }

            },
            error: function (request, status, error) {
                swal("Error!", "ha ocurrido un problema con el servidor.", "error");
            }
        });

    });
    function limpiarOpciones(){
        $("#enviar").attr('disabled',false);
        $("#Seleccion").val('')
        $("#OpcionA").removeClass('opcionCorrecta')
        $("#OpcionA").removeClass('opcionErrada')
        $("#OpcionA").addClass('opciones')

        $("#OpcionB").removeClass('opcionCorrecta')
        $("#OpcionB").removeClass('opcionErrada')
        $("#OpcionB").addClass('opciones')

        $("#OpcionC").removeClass('opcionCorrecta')
        $("#OpcionC").removeClass('opcionErrada')
        $("#OpcionC").addClass('opciones')

        $("#OpcionD").removeClass('opcionCorrecta')
        $("#OpcionD").removeClass('opcionErrada')
        $("#OpcionD").addClass('opciones')
    }

    function mostrarpregunta(id) {
        if ($("#EnCurso").val() == 0 || $("#EnCurso").val() == '0') {
        var caso = "verPregunta";
        limpiarOpciones()
        $("#EnCurso").val('1')
        const musicPregunta = new Audio('../lib/sonido/pregunta.mp3');
        musicPregunta.play();
        $.ajax({
            type: "POST",
            url: '../controlador/enrutador.php',
            data: {'Id': id, 'caso': caso},//capturo array
            success: function (data) {
                endAnimation()
                $("#pregunta_" + id).attr('disabled', 'disabled')
                $("#pregunta_" + id).removeClass('btn-outline-secondary')
                $("#pregunta_" + id).addClass('btn-secondary')
                $('#IdPregunta').val(data.dato.Id);
                $('#Correcta').val(data.dato.Respuesta);
                $('#pregunta').html(data.dato.Pregunta);
                $('#OpcionA').html(data.dato.OpcionA);
                $('#OpcionB').html(data.dato.OpcionB);
                $('#OpcionC').html(data.dato.OpcionC);
                $('#OpcionD').html(data.dato.OpcionD);


                $("#pregunta").addClass('animate__animated');
                $("#pregunta").addClass('animate__bounceInLeft');


                $(".opciones").addClass('animate__animated');
                $(".opciones").addClass('animate__bounceInLeft');
                $(".titleOpciones").addClass('animate__animated');
                $(".titleOpciones").addClass('animate__bounceInLeft');


                if (data.dato.OpcionA.length > 115)
                    $('#OpcionA').css('font-size', '10pt');
                else if (data.dato.OpcionA.length > 100)
                    $('#OpcionA').css('font-size', '11pt');
                else
                    $('#OpcionA').css('font-size', '12pt');

                if (data.dato.OpcionB.length > 115)
                    $('#OpcionB').css('font-size', '10pt');
                else if (data.dato.OpcionB.length > 100)
                    $('#OpcionB').css('font-size', '11pt');
                else
                    $('#OpcionB').css('font-size', '12pt');

                if (data.dato.OpcionC.length > 115)
                    $('#OpcionC').css('font-size', '10pt');
                else if (data.dato.OpcionC.length > 100)
                    $('#OpcionC').css('font-size', '11pt');
                else
                    $('#OpcionC').css('font-size', '12pt');

                if (data.dato.OpcionD.length > 115)
                    $('#OpcionD').css('font-size', '10pt');
                else if (data.dato.OpcionD.length > 100)
                    $('#OpcionD').css('font-size', '11pt');
                else
                    $('#OpcionD').css('font-size', '12pt');


                $("#CountDownTimer").TimeCircles().restart();
                $("#CountDownTimer").TimeCircles().stop();


            },
            error: function (request, status, error) {
                swal("Error!", "ha ocurrido un problema con el servidor.", "error");
            }
        });
    }else{
            swal('Advertencia','Existe una pregunta en juego','warning');

        }
    }

    function selectedOption(id)
    {
        var IdPregunta= $("#IdPregunta").val();
        endAnimation()

        if(IdPregunta !="" && IdPregunta != "0")
            initAnimation(id);
        else
            swal('Advertencia','Debe Seleccionar una pregunta','warning');

    }

    function GuardarRespuesta() {
        var IdPregunta = $('#IdPregunta').val();
        var IdEncuentro = $('#IdEncuentro').val();
        var Correcta = $('#Correcta').val();
        var Seleccion = $('#Seleccion').val();
        var TurnoEquipo = $('#TurnoEquipo').val();

        var Acierto = 0;
        if(Seleccion==Correcta)
            Acierto = 1;

        var caso = "guardarRespuesta";
        var datos= {'IdPregunta':IdPregunta, 'IdEncuentro':IdEncuentro, 'TurnoEquipo':TurnoEquipo, 'Seleccion':Seleccion, 'Acierto':Acierto, 'caso': caso};

            $.ajax({
                type: "POST",
                url: '../controlador/enrutador.php',
                data: datos,//capturo array
                success: function(data){
                    if(data.estatus=="ok"){
                        //location.reload();
                        if(parseInt(data.proximoturno.Id) > 0){
                            $("#TurnoEquipo").val(data.proximoturno.IdEquipo)
                            $('#team_'+TurnoEquipo).removeClass('teamsTurns');
                            $('#team_'+TurnoEquipo).addClass('teams');

                            setTimeout(function () {
                                $('#team_'+data.proximoturno.IdEquipo).removeClass('teams');
                                $('#team_'+data.proximoturno.IdEquipo).addClass('teamsTurns');
                            },1000)




                        }

                        if(data.puntos.length > 0){
                            data.puntos.map(function (item){
                                $("#PuntosEquipo"+item.Equipo).html(item.puntos);
                            })
                        }
                        if(data.turnos.length > 0){
                            data.turnos.map(function (item){
                                console.log(parseInt(item.CantTurnos) > 0)
                                if(parseInt(item.CantTurnos) > 0)
                                {
                                    $("#btnAnterior").removeAttr('disabled');
                            }
                                $("#TurnoEquipo"+item.IdEquipo).html(item.CantTurnos);
                            })
                        }
                        if(parseInt(data.delantera.Equipo) > 0){
                            $("#EquipoDelantera").val(data.delantera.Equipo)

                        }
                    }
                }
            });
    }

    function initAnimation(id){
        $("#"+id).addClass('animacion')
        $("#Seleccion").val(id.charAt(id.length - 1))
    }

    function endAnimation(){
        $(".opciones").removeClass('animacion');
        $("#pregunta").removeClass('animate__animated');
        $("#pregunta").removeClass('animate__bounceInLeft');
        $(".opciones").removeClass('animate__animated');
        $(".opciones").removeClass('animate__bounceInLeft');
        $(".titleOpciones").removeClass('animate__animated');
        $(".titleOpciones").removeClass('animate__bounceInLeft');
    }

    function checkFinalizar() {
        var IdEquipo1 = $("#IdEquipo1").val()
        var IdEquipo2 = $("#IdEquipo2").val()
        var IdEquipo3 = $("#IdEquipo3").val()
        var IdEquipo4 = $("#IdEquipo4").val()
        var maxPuntuacion= 0;
        var numMax = 0;
        var Equipo1 = $("#PuntosEquipo"+IdEquipo1).text()
        var Equipo2 = $("#PuntosEquipo"+IdEquipo2).text()
        var Equipo3 = $("#PuntosEquipo"+IdEquipo3).text()
        var Equipo4 = $("#PuntosEquipo"+IdEquipo4).text()

        if(Equipo1 > maxPuntuacion)
            maxPuntuacion = Equipo1
        if(Equipo2 > maxPuntuacion)
            maxPuntuacion = Equipo2
        if(Equipo3 > maxPuntuacion)
            maxPuntuacion = Equipo3
        if(Equipo4 > maxPuntuacion)
            maxPuntuacion = Equipo4

        if(Equipo1 == maxPuntuacion)
            numMax++;
        if(Equipo2 == maxPuntuacion)
            numMax++;
        if(Equipo3 == maxPuntuacion)
            numMax++;
        if(Equipo4 == maxPuntuacion)
            numMax++;

    if(numMax == 1)
            {
                finalizar()
            }else{
                swal("Advertencia!", "Existen equipos con la misma cantidad de puntos.", "warning");
            }

    }

    function finalizar() {
        var caso="finalizarEncuentro";
        var IdEncuentro = $('#IdEncuentro').val();
        var EquipoGanador = $('#EquipoDelantera').val();

        var datos= {'IdPartido':IdEncuentro, 'EquipoGanador':EquipoGanador, 'caso': caso};
        swal({
            title: "Estas Seguro?",
            text: "Quieres finalizar esté encuentro",
            type: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        type: "POST",
                        url: '../controlador/enrutador.php',
                        data: datos,//capturo array
                        success: function(data){
                            if(data.estatus=="ok"){
                                swal("Exito!", "se ha finalizado el encuentro.", "success");
                                $(".container").css('display','none');
                                $(".resultado").css('display','')
                                if(data.encuentro.Id > 0){
                                    console.log(data.encuentro)
                                    var divEquipo1='';
                                    var divEquipo2='';
                                    var divEquipo3='';
                                    var divEquipo4='';
                                    $("#IdEncuentro").val(data.encuentro.Id)
                                    if(parseInt(data.encuentro.Equipo1) > 0){
                                        divEquipo1='<div class="teams" id="Resultteam_'+data.encuentro.Equipo1+'"><div class="col-12 text-center " id="ResultNameEquipo'+data.encuentro.Equipo1+'">'+data.encuentro.NameEquipo1+'</div><div class="row"><div  class="col-6 text-center " >Turnos: <span id="ResultTurnoEquipo'+data.encuentro.Equipo1+'">0</span></div><div  class="col-6 text-center ">Puntos: <span id="ResultPuntosEquipo'+data.encuentro.Equipo1+'">0</span></div></div></div>';
                                        $("#EquiposResultado").append(divEquipo1)
                                    }
                                    if(parseInt(data.encuentro.Equipo2) > 0){
                                        divEquipo2='<div class="teams" id="Resultteam_'+data.encuentro.Equipo2+'"><div class="col-12 text-center " id="ResultNameEquipo'+data.encuentro.Equipo2+'">'+data.encuentro.NameEquipo2+'</div><div class="row"><div  class="col-6 text-center " >Turnos: <span id="ResultTurnoEquipo'+data.encuentro.Equipo2+'">0</span></div><div  class="col-6 text-center ">Puntos: <span id="ResultPuntosEquipo'+data.encuentro.Equipo2+'">0</span></div></div></div>';
                                        $("#EquiposResultado").append(divEquipo2)

                                    }
                                    if(parseInt(data.encuentro.Equipo3) > 0){
                                        divEquipo3='<div class="teams" id="Resultteam_'+data.encuentro.Equipo3+'"><div class="col-12 text-center " id="ResultNameEquipo'+data.encuentro.Equipo3+'">'+data.encuentro.NameEquipo3+'</div><div class="row"><div  class="col-6 text-center " >Turnos: <span id="ResultTurnoEquipo'+data.encuentro.Equipo3+'">0</span></div><div  class="col-6 text-center ">Puntos: <span id="ResultPuntosEquipo'+data.encuentro.Equipo3+'">0</span></div></div></div>';
                                        $("#EquiposResultado2").append(divEquipo3)

                                    }
                                    if(parseInt(data.encuentro.Equipo4) > 0){
                                        divEquipo4='<div class="teams" id="Resultteam_'+data.encuentro.Equipo4+'"><div class="col-12  text-center " id="ResultNameEquipo'+data.encuentro.Equipo4+'">'+data.encuentro.NameEquipo4+'</div><div class="row"><div  class="col-6 text-center " >Turnos: <span id="ResultTurnoEquipo'+data.encuentro.Equipo4+'">0</span></div><div  class="col-6 text-center ">Puntos: <span id="ResultPuntosEquipo'+data.encuentro.Equipo4+'">0</span></div></div></div>';
                                        $("#EquiposResultado2").append(divEquipo4)

                                    }

                                }

                                if(data.Ganador.pk_num_equipo > 0){
                                        $("#NameGanador").html(data.Ganador.ind_nombre_equipo);
                                }
                                if(data.puntos.length > 0){
                                    data.puntos.map(function (item){
                                        $("#ResultPuntosEquipo"+item.Equipo).html(item.puntos);
                                    })
                                }
                                if(data.turnos.length > 0){
                                    data.turnos.map(function (item){
                                        console.log(parseInt(item.CantTurnos) > 0)
                                        $("#ResultTurnoEquipo"+item.IdEquipo).html(item.CantTurnos);
                                    })
                                }
                                $(".resultado").css('height',screen.height);
                            }else{
                                if(data.accion == 0 || data.accion == '0')
                                {
                                    swal("Advertencia!", "los equipos no poseen la misma cantidad de turnos.", "warning");
                                }else
                                swal("Error!", "ha ocurrido un problema con el servidor.", "error");

                            }
                        }
                    });

                }
            });


            }

    function AnularActual() {
        var caso="AnularPregunta";
        var IdPregunta = $('#IdPregunta').val();

        if(IdPregunta != '' && IdPregunta!= 0 && IdPregunta != '0'){
            var datos= {'Id':IdPregunta, 'caso': caso};
            swal({
                title: "Estas Seguro?",
                text: "Quieres anular la pregunta actual",
                type: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            type: "POST",
                            url: '../controlador/enrutador.php',
                            data: datos,//capturo array
                            success: function(data){
                                console.log(data)
                                if(data.estatus=="ok"){
                                    $("#EnCurso").val(0)
                                    swal("Exito!", "Se elimino la pregunta actual!", "success");
                                    setTimeout(function () {
                                        location.reload();
                                    },1500)

                                }else{
                                    swal("Error!", "ha ocurrido un problema con el servidor.", "error");

                                }
                            }
                        });

                    }
                });
        }else{
            swal('Advertencia','Debe existir una pregunta seleccionada para generar esta acción','warning');
        }




    }

    function AnularAnterior() {
        var caso="AnularPreguntaAnterior";
        var IdEncuentro = $('#IdEncuentro').val();

        var datos= {'Id':IdEncuentro, 'caso': caso};
        swal({
            title: "Estas Seguro?",
            text: "Quieres anular la pregunta anterior",
            type: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        type: "POST",
                        url: '../controlador/enrutador.php',
                        data: datos,//capturo array
                        success: function(data){
                            console.log(data)
                            $("#EnCurso").val(0)
                            if(data.estatus=="ok"){
                                swal("Exito!", "Se elimino la pregunta anterior!", "success");
                                setTimeout(function () {
                                   location.reload();
                                },1500)
                            }else{
                                swal("Error!", "ha ocurrido un problema con el servidor.", "error");
                            }
                        }
                    });

                }
            });


    }

    function SaltarTurno() {
        var caso="SaltarTurno";
        var Equipo = $('#TurnoEquipo').val();
        var Encuentro = $('#IdEncuentro').val();

        var datos= {'Encuentro':Encuentro, 'Equipo':Equipo, 'caso': caso};
        swal({
            title: "Estas Seguro?",
            text: "Quieres saltar el turno actual",
            type: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        type: "POST",
                        url: '../controlador/enrutador.php',
                        data: datos,//capturo array
                        success: function(data){
                            console.log(data)
                            $("#EnCurso").val(0)
                            if(data.estatus=="ok"){
                                swal("Exito!", "Se salto el turno del equipo "+$("#NameEquipo"+Equipo).text()+"!", "success");
                                setTimeout(function () {
                                    location.reload();
                                },1500)
                            }else{
                                swal("Error!", "ha ocurrido un problema con el servidor.", "error");
                            }
                        }
                    });

                }
            });


    }


   

</script>

