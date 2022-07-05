<?php
header('Content-Type: application/json; charset=utf-8');
error_reporting(E_ALL);
ini_set('display_errors', '1');
include ('controlador.php');
$con= new controlador();
$data = array();
if (isset($_POST['caso']) && !empty($_POST['caso'])){
    $caso=$_POST['caso'];
    switch ($caso) {
        /************
         * INICIO SWITCH EQUIPO
         */
        case 'verEquipo':
            $resp = $con->verEquipo($_POST['pk_num_equipo']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['dato'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'guardarEquipo':
            $resp = $con->guardarEquipo($_POST['equipo'], $_POST['num_estatus']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'EliminarEquipo':
            $resp = $con->EliminarEquipo($_POST['pk_num_equipo']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'editarEquipo':
            $resp = $con->editarEquipo($_POST['equipo'], $_POST['pk_num_equipo'], $_POST['num_estatus']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        /************
         * INICIO SWITCH PARTIDO
         */
        case 'guardarPartido':
            $resp = $con->guardarPartido($_POST);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'puntosxPartido':
            $resp = $con->puntosxPartido($_POST, $_POST['pk_num_partido']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'agregarPuntos':
            $resp = $con->agregarPuntos($_POST, $_POST['pk_num_partido']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'editarPartido':
            $resp = $con->editarPartido($_POST, $_POST['pk_num_partido']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'verPartido':
            $resp = $con->verPartido($_POST['pk_num_equipo']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['dato'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        /************
         * INICIO SWITCH DISCIPLINA
         */
        case 'guardarPregunta':
            $resp = $con->guardarPregunta($_POST);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;

            }
        case 'editarPregunta':
            $resp = $con->editarPregunta($_POST, $_POST['Id']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'verPregunta':
            $resp = $con->verPregunta($_POST['Id']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['dato'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }

        case 'EliminarPregunta':
            $resp = $con->EliminarPregunta($_POST['Id']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'AnularPregunta':
            $resp = $con->AnularPregunta($_POST['Id']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'AnularPreguntaAnterior':
            $resp = $con->eliminarUltimaPregunta($_POST['Id']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        /************
         * INICIO SWITCH ACTIVIDADES
         */
        case 'guardarActividad':
            $resp = $con->guardarActividad($_POST);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;

            }
        case 'editarActividad':
            $resp = $con->editarActividad($_POST['disciplina'], $_POST['pk_num_disciplina']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'verDisciplina':
            $resp = $con->verActividad($_POST['pk_num_equipo']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['dato'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'listaActividades':
            $resp = $con->listarActividad($_POST['hora']);
            $data['dato'] = $resp;
            echo json_encode($data);
            break;
        case 'obtenerPartidoEjecucion':
            $resp = $con->obtenerPartidoEjecucion();
            $data['dato'] = $resp;
            echo json_encode($data);
            break;

        case 'obtenerEquipo':
            $resp = $con->obtenerEquipos();
            $data['data'] = $resp;
            echo json_encode($data);
            break;


        case 'obtenerPreguntas':

            $resp2 = $con->ObtenerEncuentroDisponible();
            $data['encuentro'] = $resp2;

            if ($resp2) {
                $resp = $con->obtenerPreguntaRonda($resp2['CodRonda']);
                $data['data'] = $resp;
                $resp3 = $con->ObtenerTurnos($resp2['Id']);
                $data['turnos'] = $resp3;
                $resp4 = $con->ObtenerSiguienteTurno($resp2['Id']);
                $data['proximoturno'] = $resp4;
                $resp5 = $con->Obtenerpuntos($resp2['Id']);
                $data['puntos'] = $resp5;
                $resp6 = $con->ObtenerDelantera($resp2['Id']);
                $data['delantera'] = $resp6;
                echo json_encode($data);
                break;
            } else {
                echo json_encode($data);
                break;
            }


        case 'obtenerListaPreguntas':
            $resp = $con->obtenerPregunta();
            $data['data'] = $resp;
            echo json_encode($data);
            break;


        case 'obtenerResultados':
            $resp = $con->obtenerPregunta();
            $data['data'] = $resp;
            echo json_encode($data);
            break;


        case 'obtenerEncuentro':
            $resp = $con->obtenerEncuentro();
            $data['data'] = $resp;
            echo json_encode($data);
            break;

        case 'guardarEncuentro':
            $resp = $con->guardarEncuentro($_POST);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }

        case 'EliminarEncuentro':
            $resp = $con->EliminarEncuentro($_POST['Id']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }


        case 'verEncuentro':
            $resp = $con->verEncuentro($_POST['Id']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['dato'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'editarEncuentro':
            $resp = $con->editarEncuentro($_POST);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'SaltarTurno':
            $resp = $con->saltarTurno($_POST['Equipo'],$_POST['Encuentro']);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
        case 'finalizarEncuentro':
            $check = $con->ObtenerTurnosFinalizar($_POST['IdPartido']);
            if ($check > 0) {
            $resp = $con->finalizarEncuentro($_POST);
            if ($resp != 0) {
                $data['estatus'] = "ok";
                $data['id'] = $resp;
                $resp2 = $con->ObtenerEncuentroFinalizado($_POST['IdPartido']);
                $data['data'] = $resp;
                $data['encuentro'] = $resp2;
                $resp5 = $con->Obtenerpuntos($_POST['IdPartido']);
                $data['puntos'] = $resp5;

                $respGanador = $con->verEquipo($resp2['Ganador']);
                $data['Ganador'] = $respGanador;

                echo json_encode($data);
                break;
            } else {
                $data['estatus'] = "fallo";
                echo json_encode($data);
                break;
            }
            }else{
                $data['estatus'] = "fallo";
                $data['accion'] = 0;
                echo json_encode($data);
                break;
            }
    
        case 'ResetJuego':
            $resp=   $con->ResetJuego();
            $data['data']=$resp;
            echo json_encode($data);
            break;


        case 'guardarRespuesta':
            $resp = $con->guardarRespuesta($_POST);
            if ($resp!=0)
            {
                $data['estatus']="ok";
                $data['id']=$resp;
                $resp4=   $con->ObtenerSiguienteTurno($_POST['IdEncuentro']);
                $data['proximoturno']=$resp4;
                $resp5=   $con->Obtenerpuntos($_POST['IdEncuentro']);
                $data['puntos']=$resp5;
                $resp3=   $con->ObtenerTurnos($_POST['IdEncuentro']);
                $data['turnos']=$resp3;
                $resp6=   $con->ObtenerDelantera($_POST['IdEncuentro']);
                $data['delantera']=$resp6;
                echo json_encode($data);
                break;
            }else{
                $data['estatus']="fallo";
                echo json_encode($data);
                break;

            }
        
    }
}

