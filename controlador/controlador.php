<?php
	require_once("../modelo/modelo.php");

	class controlador
    {

        private $caso;
        private $model;
        private $func;

        public function  __construct()
        {
            $this->model = new modelo();


        }
        public function obtenerPartidos(){

            return $this->model->obtenerPartidos();

        }
        public function ObtenerEncuentroDisponible(){

            return $this->model->ObtenerEncuentroDisponible();

        }
        public function obtenerParrillaPartidos(){

        return $this->model->obtenerParrillaPartidos();

    }
        public function obtenerPartidoEjecucion(){

            return $this->model->obtenerPartidoEjecucion();

        }
        public function ObtenerSiguienteTurno($Id){

            return $this->model->ObtenerSiguienteTurno($Id);

        }
        public function ObtenerTurnos($Id){

            return $this->model->ObtenerTurnos($Id);

        }
        public function Obtenerpuntos($Id){

            return $this->model->Obtenerpuntos($Id);

        }

        public function ObtenerDelantera($Id){

            return $this->model->ObtenerDelantera($Id);

        }
        public function obtenerEquipos(){

        return $this->model->obtenerEquipos();

        }
        public function obtenerActividades(){

            return $this->model->obtenerActividades();

        }
        public function obtenerPregunta(){

            return $this->model->obtenerPregunta();

        }
        public function obtenerPreguntaRonda($ronda){

            return $this->model->obtenerPreguntaRonda($ronda);

        }
        public function obtenerPosiciones(){

            return $this->model->obtenerPosiciones();

        }
    
        public function obtenerEncuentro(){

            return $this->model->obtenerEncuentro();

        }

        public function obtenerRondas(){

            return $this->model->obtenerRondas();

        }

        /**  EQUIPO
         * @param $equipo
         * @return mixed
         */
    public function guardarEquipo($equipo,$num_estatus){

            $resp= $this->model->guardarEquipo($equipo,$num_estatus);
            return $resp;
    }
    public function EliminarEquipo($equipo){

        $resp= $this->model->EliminarEquipo($equipo);
        return $resp;
}
        public function editarEquipo($equipo,$id,$num_estatus){

            $resp= $this->model->editarEquipo($equipo,$id,$num_estatus);
            return $resp;
        }
        public function verEquipo($equipo){
            $resp= $this->model->verEquipo($equipo);
            return $resp;
        }


        /** DISCIPLINA
         * @param $dato
         */
        public function guardarPregunta($dato){
            $resp = $this->model->guardarPregunta($dato);
            return $resp;

        }
        public function editarPregunta($equipo,$id){
            $resp= $this->model->editarPregunta($equipo,$id);
            return $resp;
        }
        public function verPregunta($equipo){
            $resp= $this->model->verPregunta($equipo);
            return $resp;
        }
        public function EliminarPregunta($id){

            $resp= $this->model->EliminarPregunta($id);
            return $resp;
    }
        public function AnularPregunta($id){

            $resp= $this->model->AnularPregunta($id);
            return $resp;
        }
        public function eliminarUltimaPregunta($id){

            $resp= $this->model->eliminarUltimaPregunta($id);
            return $resp;
        }
        /** PARTIDO
         * @param $dato
         */
        public function guardarPartido($dato){
            $resp = $this->model->guardarPartido($dato);
            return $resp;
        }
        public function editarPartido($dato,$id){
            $resp= $this->model->editarPartido($dato,$id);
            return $resp;
        }
        public function puntosxPartido($dato,$id){
            $resp= $this->model->puntosxPartido($dato,$id);
            return $resp;
        }
        public function agregarPuntos($dato,$id){
        $resp= $this->model->agregarPuntos($dato,$id);
        return $resp;
    }
        public function verPartido($dato){
            $resp= $this->model->verPartido($dato);
            return $resp;
        }
        /** CRONOGRAMA
         * @param $dato
         */
        public function guardarActividad($dato){

            #ajusto el formato de las horas
            $hora = substr($dato['hora'],0,2);
            $min = substr($dato['hora'],3,2);
            $am_pm = substr($dato['hora'],6,1);
            if($am_pm=='p'){
                $hora = $hora + 12;
            }
            if(!is_numeric($hora) OR !is_numeric($min)){
                $dato['hora'] = 'error';
            }
            $dato['hora'] = $hora.":".$min.":00";

            $resp = $this->model->guardarActividad($dato);
            return $resp;
        }
        public function editarActividad($dato,$id){
            $resp= $this->model->editarActividad($dato,$id);
            return $resp;
        }
        public function verActividad($dato){
            $resp= $this->model->verActividad($dato);
            return $resp;
        }
        public function listarActividad($dato){
            #ajusto el formato de las horas
               $hora = substr($dato,0,2);
               $min = substr($dato,3,2);
               $am_pm = substr($dato,6,1);
               if($am_pm=='p'){
                   $hora = $hora + 12;
               }if ($min <10){
                   $min="0".$min;
            }
               if(!is_numeric($hora) OR !is_numeric($min)){
                   $dato = 'error';
               }
               $a="";
               $dato = $hora.":".$min;
              $resp= $this->model->listaActividad($dato);
              $cont =count($resp);
              $i=1;
              foreach ($resp as $item){
                  $hora = substr($item['ind_hora'],0,2);
                  $min = substr($item['ind_hora'],3,2);
                  if($hora > 12){
                      $hora=$hora-12;
                      $e=" pm";
                  }else{
                      $e=" am";
                  }
                  $item['ind_hora']=$hora.":".$min.''.$e;
                  $a .=$item['ind_actividad']. '  '. $item['ind_hora'];
                  if($i<$cont){
                      $a .='  -  ';
                      $i++;
                  }
              }
              return $a;

           }

           public function verEncuentro($dato){
            $resp= $this->model->verEncuentro($dato);
            return $resp;
        }

        public function guardarEncuentro($Encuentro){

            $resp= $this->model->guardarEncuentro($Encuentro);
            return $resp;
        }
        public function EliminarEncuentro($Encuentro){
        
        $resp= $this->model->EliminarEncuentro($Encuentro);
        return $resp;
        }
        public function editarEncuentro($Encuentro){
        
            $resp= $this->model->editarEncuentro($Encuentro);
            return $resp;
        }
        public function saltarTurno($equipo,$encuentro){

            $resp= $this->model->saltarTurno($equipo,$encuentro);
            return $resp;
        }
        public function finalizarEncuentro($Encuentro){

            $resp= $this->model->finalizarEncuentro($Encuentro);
            return $resp;
        }

        public function ObtenerTurnosFinalizar($Encuentro){

            $resp= $this->model->ObtenerTurnosFinalizar($Encuentro);
            return $resp;
        }

        public function ObtenerEncuentroFinalizado($Encuentro){

            $resp= $this->model->ObtenerEncuentroFinalizado($Encuentro);
            return $resp;
        }

        public function ResetJuego(){
        
            $resp= $this->model->ResetJuego();
            return $resp;
        }

        public function guardarRespuesta($dato){
            $resp = $this->model->guardarRespuesta($dato);
            return $resp;

        }
    }



?>