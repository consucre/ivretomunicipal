<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include "../config/conexion.php"; // or the path relative to database.php
	class modelo{

        private $pdo;
        private $equipo;
        private $actividad;
        private $disciplina;
        private $partida;
        private $medallero;




        public function __construct(){
            try
            {
                $this->pdo = Database::StartUp();
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }/*
            $this->equipo=array();
            $this->actividad=array();
            $this->disciplina=array();
            $this->partida=array();
            $this->medallero=array();*/

	    }

        public function obtenerPregunta(){

            $Preguntas = $this->pdo->query(
                "SELECT * FROM preguntas");
            $Preguntas->setFetchMode(PDO::FETCH_ASSOC);
            return $Preguntas->fetchAll();

	    }

        public function obtenerPreguntaRonda($ronda){

            $Preguntas = $this->pdo->query(
                "SELECT * FROM preguntas where Ronda=".$ronda);
            $Preguntas->setFetchMode(PDO::FETCH_ASSOC);
            return $Preguntas->fetchAll();

        }

        public function obtenerRondas(){

            $Rondas = $this->pdo->query(
                "SELECT * FROM rondas");
            $Rondas->setFetchMode(PDO::FETCH_ASSOC);
            return $Rondas->fetchAll();

	    }

        public function obtenerEquipos(){

            $Equipos = $this->pdo->query(
                "SELECT * FROM equipos");
            $Equipos->setFetchMode(PDO::FETCH_ASSOC);
            return $Equipos->fetchAll();

        }


        public function obtenerEncuentro(){

            $Partidos = $this->pdo->query(
                "SELECT 
                E.Id,
                R.Ronda,
                CASE
                    WHEN E.Equipo4 > 0 THEN CONCAT(Eq1.ind_nombre_equipo,' vs ' ,Eq2.ind_nombre_equipo,' vs ' ,Eq3.ind_nombre_equipo,' vs ' ,Eq4.ind_nombre_equipo,' ')
                            WHEN E.Equipo3 > 0 THEN CONCAT(Eq1.ind_nombre_equipo,' vs ' ,Eq2.ind_nombre_equipo,' vs ' ,Eq3.ind_nombre_equipo,' ')
                    ELSE CONCAT(Eq1.ind_nombre_equipo,' vs ' ,Eq2.ind_nombre_equipo,' ')
                        END
                  as Partido 
                 FROM encuentros AS E
                INNER JOIN rondas R ON (E.CodRonda=R.CodRonda)
                INNER JOIN equipos Eq1 ON (E.Equipo1=Eq1.pk_num_equipo)
                INNER JOIN equipos Eq2 ON (E.Equipo2=Eq2.pk_num_equipo)
                LEFT JOIN equipos Eq3 ON (E.Equipo3=Eq3.pk_num_equipo)
                LEFT JOIN equipos Eq4 ON (E.Equipo4=Eq4.pk_num_equipo)
                ORDER BY E.Id ASC
                ");
            $Partidos->setFetchMode(PDO::FETCH_ASSOC);
            return $Partidos->fetchAll();

        }

        public function verEncuentro($id){
                require_once ('../config/conexion.php');
                $ver = $this->pdo->query('SELECT * from encuentros where Id='.$id);
                $ver->setFetchMode(PDO::FETCH_ASSOC);
                    return $ver->fetch();
            }

        public function obtenerParrillaPartidos(){

            $ciudad = $this->pdo->query(
                "SELECT pk_num_partida,d.ind_nombre_disciplina, partido.ind_partida,
a.ind_nombre_equipo as equipo1, a.ind_foto as foto1, partido.num_puntos_equipo1, partido.num_puntos_equipo2, e.ind_nombre_equipo as esquipo2, e.ind_foto as foto2, 
 CONCAT(a.ind_nombre_equipo,' vs ' ,e.ind_nombre_equipo,' ') as ind_partido,
 CONCAT(a.ind_nombre_equipo,' ',partido.num_puntos_equipo1,' - ' ,partido.num_puntos_equipo2,' ',e.ind_nombre_equipo,' ') as ind_resultado,
 partido.num_estatus, partido.flag_ejecucion
 FROM partido
INNER JOIN equipo  a on (partido.fk_num_equipo1=a.pk_num_equipo)
INNER JOIN equipo  e on (partido.fk_num_equipo2=e.pk_num_equipo)
INNER JOIN disciplina d on (partido.fk_num_disciplina=d.pk_num_disciplina)
ORDER BY pk_num_partida ASC
 ");
            $ciudad->setFetchMode(PDO::FETCH_ASSOC);
            return $ciudad->fetchAll();

        }

        public function obtenerPartidoEjecucion(){

            $ciudad = $this->pdo->query(
                "SELECT pk_num_partida,
 d.ind_nombre_disciplina,a.ind_nombre_equipo as equipo1, a.ind_foto as foto1, num_puntos_equipo1 ,e.ind_nombre_equipo as equipo2, e.ind_foto as foto2,num_puntos_equipo2  FROM partido
INNER JOIN equipo  a on (partido.fk_num_equipo1=a.pk_num_equipo)
INNER JOIN equipo  e on (partido.fk_num_equipo2=e.pk_num_equipo)
INNER JOIN disciplina d on (partido.fk_num_disciplina=d.pk_num_disciplina) 
where flag_ejecucion = 1 and num_estatus=1

ORDER BY pk_num_partida ASC
 ");
            $ciudad->setFetchMode(PDO::FETCH_ASSOC);
            return $ciudad->fetchAll();

        }
        public function obtenerPosiciones(){
            $ciudad = $this->pdo->query(
                "SELECT equipo.ind_nombre_equipo, medallero.num_puntos, equipo.ind_foto 
                            FROM medallero 
                            INNER JOIN equipo on (medallero.fk_num_equipo=equipo.pk_num_equipo) 
                            ORDER BY num_puntos DESC");
            $ciudad->setFetchMode(PDO::FETCH_ASSOC);
            return $ciudad->fetchAll();

        }
        public function obtenerActividades(){
            $a = $this->pdo->query(
                "SELECT * FROM cronograma ");
            $a->setFetchMode(PDO::FETCH_ASSOC);
            return $a->fetchAll();

        }

        public function listaActividad($hora){
           // var_dump("SELECT * from cronograma where ind_hora >'$hora'");
            $ver = $this->pdo->query("SELECT * from cronograma where ind_hora >'$hora'");

            $ver->setFetchMode(PDO::FETCH_ASSOC);
            return $ver->fetchAll();
        }


        /***********************
         * @param $equipo
         * @return mixed
         */
        public function guardarEquipo($equipo,$num_estatus){
            $guardar = $this->pdo->prepare('INSERT INTO equipos set ind_nombre_equipo=:ind_nombre_equipo, num_estatus=:num_estatus');
            $guardar->execute(array(
                'ind_nombre_equipo' => $equipo,
                'num_estatus' => $num_estatus
            ));
             $idEquipo= $this->pdo->lastInsertId();

             return $idEquipo;
        }
        public function EliminarEquipo($id){
            require_once ('../config/conexion.php');
            try {
            $guardar = $this->pdo->prepare("DELETE FROM  equipos 
                            WHERE pk_num_equipo=:pk_num_equipo");
            $guardar->execute(array(
                'pk_num_equipo' => $id
            ));
            return $id;
            echo "Record deleted successfully";
                }
            catch(PDOException $e)
                {
                echo $guardar . "
            " . $e->getMessage();
                }
        }
        public function editarEquipo($equipo,$id,$num_estatus){
            require_once ('../config/conexion.php');
            $guardar = $this->pdo->prepare("UPDATE equipos set  
                            ind_nombre_equipo=:ind_nombre_equipo,
                            num_estatus=:num_estatus
                            WHERE pk_num_equipo='$id'");
            $guardar->execute(array(
                'ind_nombre_equipo' => $equipo,
                'num_estatus' => $num_estatus

            ));
            return $id;
        }
        public function saltarTurno($equipo,$encuentro){
            require_once ('../config/conexion.php');
            $guardar2 = $this->pdo->prepare("UPDATE turnos set  
                            CantTurnos=CantTurnos+1
                            WHERE IdEquipo=".$equipo." AND Encuentro=".$encuentro);
            $guardar2->execute();
            return 1;
        }
        public function verEquipo($id){
            require_once ('../config/conexion.php');
            $ver = $this->pdo->query('SELECT * from equipos where pk_num_equipo='.$id);
            $ver->setFetchMode(PDO::FETCH_ASSOC);
                return $ver->fetch();
        }

        /***********************
         * @param $actividad
         * @return mixed
         */
        public function guardarActividad($datos){

            $guardar = $this->pdo->prepare('INSERT INTO cronograma set 
                                        ind_actividad=:ind_actividad,
                                        ind_hora=:ind_hora');
            $guardar->execute(array(
                'ind_actividad' => $datos['Nombre'],
                'ind_hora' => $datos['hora']
            ));
            return $this->pdo->lastInsertId();
        }
        public function editarActividad($actividad,$hora,$id){
            require_once ('../config/conexion.php');
            $guardar = $this->pdo->prepare("UPDATE cronograma set 
                                        ind_actividad=:ind_actividad,
                                        ind_hora=:ind_hora
                            WHERE pk_num_actividad='$id'");
            $guardar->execute(array(
                'ind_actividad' => $actividad,
                'ind_hora' => $hora,
            ));
            return $id;
        }
        public function verActividad($id){
            require_once ('../config/conexion.php');
            $ver = $this->pdo->query('SELECT * from cronograma where pk_num_actividad='.$id);
            $ver->setFetchMode(PDO::FETCH_ASSOC);
            return $ver->fetch();
        }

        /***********************
         * @param $disciplina
         * @return mixed
         */
        public function guardarPregunta($pregunta){
            $guardar = $this->pdo->prepare('INSERT INTO preguntas set 
                                        Pregunta=:Pregunta,
                                        OpcionA=:OpcionA,
                                        OpcionB=:OpcionB,
                                        OpcionC=:OpcionC,
                                        OpcionD=:OpcionD,
                                        Respuesta=:Respuesta,
                                        Puntos=:Puntos,
                                        Ronda=:Ronda,
                                        Estatus=1'
                                    );
            $guardar->execute(array(
                'Pregunta' => $pregunta['Pregunta'],
                'OpcionA' => $pregunta['OpcionA'],
                'OpcionB' => $pregunta['OpcionB'],
                'OpcionC' => $pregunta['OpcionC'],
                'OpcionD' => $pregunta['OpcionD'],
                'Respuesta' => $pregunta['Respuesta'],
                'Puntos' => $pregunta['Puntos'],
                'Ronda' => $pregunta['Ronda']

            ));
            return $this->pdo->lastInsertId();
        }
        public function editarPregunta($pregunta,$id){
            require_once ('../config/conexion.php');
            $guardar = $this->pdo->prepare("UPDATE preguntas set 
                                        Pregunta=:Pregunta,
                                        OpcionA=:OpcionA,
                                        OpcionB=:OpcionB,
                                        OpcionC=:OpcionC,
                                        OpcionD=:OpcionD,
                                        Respuesta=:Respuesta,
                                        Puntos=:Puntos,
                                        Ronda=:Ronda
                            WHERE Id='$id'");
            $guardar->execute(array(
                'Pregunta' => $pregunta['Pregunta'],
                'OpcionA' => $pregunta['OpcionA'],
                'OpcionB' => $pregunta['OpcionB'],
                'OpcionC' => $pregunta['OpcionC'],
                'OpcionD' => $pregunta['OpcionD'],
                'Respuesta' => $pregunta['Respuesta'],
                'Puntos' => $pregunta['Puntos'],
                'Ronda' => $pregunta['Ronda']
                        ));
            return $id;
        }
        public function AnularPregunta($id){
            require_once ('../config/conexion.php');
            $guardar = $this->pdo->prepare("UPDATE preguntas set 
                                       Estatus=0
                            WHERE Id='$id'");
            $guardar->execute();
            return $id;
        }
        public function verPregunta($id){
            require_once ('../config/conexion.php');
            $ver = $this->pdo->query('SELECT * from preguntas where Id='.$id);
            $ver->setFetchMode(PDO::FETCH_ASSOC);
            return $ver->fetch();
        }
        public function eliminarUltimaPregunta($id){
            require_once ('../config/conexion.php');
            $ver = $this->pdo->query('SELECT * from historial where Encuentro='.$id.' order by Id ASC LIMIT 1');
            $ver->setFetchMode(PDO::FETCH_ASSOC);

            $resp= $ver->fetch();

            if($resp['Id'] > 0){

            try {
                $guardar = $this->pdo->prepare("DELETE FROM  historial 
                            WHERE Id=:Id");
                $guardar->execute(array(
                    'Id' => $resp['Id']
                ));

                $guardar2 = $this->pdo->prepare("UPDATE turnos set  
                            CantTurnos=CantTurnos-1
                            WHERE IdEquipo=". $resp['Equipo']." AND Encuentro=".$resp['Encuentro']);
                $guardar2->execute();
                return $resp['Id'];
                echo "Record deleted successfully";
            }
            catch(PDOException $e)
            {
                echo $guardar . "
            " . $e->getMessage();
            }
        }
        }

        public function EliminarPregunta($id){
            require_once ('../config/conexion.php');
            try {
            $guardar = $this->pdo->prepare("DELETE FROM  preguntas 
                            WHERE Id=:Id");
            $guardar->execute(array(
                'Id' => $id
            ));
            return $id;
            echo "Record deleted successfully";
                }
            catch(PDOException $e)
                {
                echo $guardar . "
            " . $e->getMessage();
                }
        }

        /***********************
         * @param $partido
         * @return mixed
         */
        public function guardarPartido($disciplina){
$guardar = $this->pdo->prepare('INSERT INTO partido set 
                                        ind_partida=:ind_partida,
                                        fk_num_disciplina=:fk_num_disciplina,
                                        fk_num_equipo1=:fk_num_equipo1,
                                        fk_num_equipo2=:fk_num_equipo2,
                                        num_puntos_equipo1=0,
                                        num_puntos_equipo2=0,
                                        num_estatus=1,
                                        flag_ejecucion=0
                                        ');
            $guardar->execute(array(
                'ind_partida' => $disciplina['ind_partida'],
                'fk_num_disciplina' => $disciplina['fk_num_disciplina'],
                'fk_num_equipo1' => $disciplina['fk_num_equipo1'],
                'fk_num_equipo2' => $disciplina['fk_num_equipo2']
            ));
            return $this->pdo->lastInsertId();
        }
        public function editarPartido($disciplina,$id){
            $guardar = $this->pdo->prepare("UPDATE partido set 
                                        ind_partida=:ind_partida,
                                        fk_num_disciplina=:fk_num_disciplina,
                                        fk_num_equipo1=:fk_num_equipo1,
                                        fk_num_equipo2=:fk_num_equipo2
                            WHERE pk_num_partida='$id'");
            $guardar->execute(array(
                'ind_partida' => $disciplina['ind_partida'],
                'fk_num_disciplina' => $disciplina['fk_num_disciplina'],
                'fk_num_equipo1' => $disciplina['fk_num_equipo1'],
                'fk_num_equipo2' => $disciplina['fk_num_equipo2']
            ));
            return $id;
        }
        public function puntosxPartido($disciplina,$id){

            if ($disciplina['info']=="FINAL" and $disciplina['num_estatus']==0 ){
                $guardar1 = $this->pdo->prepare("UPDATE partido set 
                                        num_puntos_equipo1=:num_puntos_equipo1,
                                        num_puntos_equipo2=:num_puntos_equipo2,
                                        num_estatus=:num_estatus,
                                        flag_ejecucion=1
                            WHERE pk_num_partida='$id'");
                $guardar1->execute(array(
                    'num_estatus' => $disciplina['num_estatus'],
                    'num_puntos_equipo1' => $disciplina['num_puntos_equipo1'],
                    'num_puntos_equipo2' => $disciplina['num_puntos_equipo2']
                ));
                $ver = $this->pdo->query('SELECT * from medallero where fk_num_equipo='.$disciplina['ganador']);
                $ver->setFetchMode(PDO::FETCH_ASSOC);
                $data= $ver->fetch();

                $pk= $data['pk_num_medallero'];
                $puntos= $data['num_puntos']+10;
                $guardar = $this->pdo->prepare("UPDATE medallero set
                                        num_puntos=:num_puntos                                       
                            WHERE fk_num_equipo='$pk'");
                $guardar->execute(array(
                    'num_puntos' => $puntos

                ));
                return $id;
            }else{
                $guardar1 = $this->pdo->prepare("UPDATE partido set 
                                        num_puntos_equipo1=:num_puntos_equipo1,
                                        num_puntos_equipo2=:num_puntos_equipo2,
                                        num_estatus=:num_estatus,
                                        flag_ejecucion=1
                            WHERE pk_num_partida='$id'");
                $guardar1->execute(array(
                    'num_estatus' => $disciplina['num_estatus'],
                    'num_puntos_equipo1' => $disciplina['num_puntos_equipo1'],
                    'num_puntos_equipo2' => $disciplina['num_puntos_equipo2']
                ));
                return $id;

            }
        }
        public function agregarPuntos($disciplina,$id){
            $ver = $this->pdo->query('SELECT * from medallero where fk_num_equipo='.$id);
            $ver->setFetchMode(PDO::FETCH_ASSOC);
            $data= $ver->fetch();
            var_dump($data);
      /*      $guardar = $this->pdo->prepare("UPDATE medallero set
                                        num_puntos=:num_puntos
                            WHERE fk_num_equipo='$id'");
            $guardar->execute(array(
                'num_puntos' => $disciplina['num_puntos']

            ));
            return $id;*/
        }
        public function verPartido($id){
            $ver = $this->pdo->query('SELECT * from partido where pk_num_partida='.$id);
            $ver->setFetchMode(PDO::FETCH_ASSOC);
            return $ver->fetch();
        }

        public function ObtenerEncuentroDisponible(){
            $ver = $this->pdo->query('
                SELECT E.*, 
                       Eq1.ind_nombre_equipo NameEquipo1, 
                       Eq2.ind_nombre_equipo NameEquipo2, 
                       Eq3.ind_nombre_equipo NameEquipo3, 
                       Eq4.ind_nombre_equipo NameEquipo4 
                from encuentros E
                INNER JOIN equipos Eq1 ON (E.Equipo1=Eq1.pk_num_equipo)
                INNER JOIN equipos Eq2 ON (E.Equipo2=Eq2.pk_num_equipo)
                LEFT JOIN equipos Eq3 ON (E.Equipo3=Eq3.pk_num_equipo)
                LEFT JOIN equipos Eq4 ON (E.Equipo4=Eq4.pk_num_equipo)
                         where Estatus=1 order by Id ASC LIMIT 1');
            $ver->setFetchMode(PDO::FETCH_ASSOC);
            return $ver->fetch();
        }


        public function guardarEncuentro($Encuentro){
                $guardar = $this->pdo->prepare('INSERT INTO encuentros set 
                CodRonda=:CodRonda,
                Ganador=0,
                Equipo1=:Equipo1,
                Equipo2=:Equipo2,
                Equipo3=:Equipo3,
                Equipo4=:Equipo4,
                Estatus=1
                ');
            $guardar->execute(array(
                'CodRonda' => $Encuentro['Ronda'],
                'Equipo1' => $Encuentro['Equipo1'],
                'Equipo2' => $Encuentro['Equipo2'],
                'Equipo3' => $Encuentro['Equipo3'],
                'Equipo4' => $Encuentro['Equipo4']
            ));
             $idEncuentro= $this->pdo->lastInsertId();

            if($Encuentro['Equipo1']){
                $turno1 = $this->pdo->prepare('INSERT INTO turnos set 
                CodRonda=:CodRonda,
                IdEquipo=:IdEquipo,
                CantTurnos=0,
                Encuentro=:Encuentro
                ');
                $turno1->execute(array(
                    'IdEquipo' => $Encuentro['Equipo1'],
                    'CodRonda' => $Encuentro['Ronda'],
                    'Encuentro' => $idEncuentro
                ));
                $idturno1= $this->pdo->lastInsertId();
            }
            if($Encuentro['Equipo2']){
                $turno2 = $this->pdo->prepare('INSERT INTO turnos set 
                CodRonda=:CodRonda,
                IdEquipo=:IdEquipo,
                CantTurnos=0,
                Encuentro=:Encuentro
                ');
                $turno2->execute(array(
                    'IdEquipo' => $Encuentro['Equipo2'],
                    'CodRonda' => $Encuentro['Ronda'],
                    'Encuentro' => $idEncuentro
                ));
                $idturno2= $this->pdo->lastInsertId();
            }
            if($Encuentro['Equipo3']){
                $turno3 = $this->pdo->prepare('INSERT INTO turnos set 
                CodRonda=:CodRonda,
                IdEquipo=:IdEquipo,
                CantTurnos=0,
                Encuentro=:Encuentro
                ');
                $turno3->execute(array(
                    'IdEquipo' => $Encuentro['Equipo3'],
                    'CodRonda' => $Encuentro['Ronda'],
                    'Encuentro' => $idEncuentro
                ));
                $idturno3= $this->pdo->lastInsertId();
            }
            if($Encuentro['Equipo4']){
                $turno4 = $this->pdo->prepare('INSERT INTO turnos set 
                CodRonda=:CodRonda,
                IdEquipo=:IdEquipo,
                CantTurnos=0,
                Encuentro=:Encuentro
                ');
                $turno4->execute(array(
                    'IdEquipo' => $Encuentro['Equipo4'],
                    'CodRonda' => $Encuentro['Ronda'],
                    'Encuentro' => $idEncuentro
                ));
                $idturno4= $this->pdo->lastInsertId();
            }



             
             return $idEncuentro;
        }
        public function EliminarEncuentro($id){
            require_once ('../config/conexion.php');
            try {
            $guardar = $this->pdo->prepare("DELETE FROM  encuentros 
                            WHERE Id=:Id");
            $guardar->execute(array(
                'Id' => $id
            ));
            return $id;
            echo "Record deleted successfully";
                }
            catch(PDOException $e)
                {
                echo $guardar . "
            " . $e->getMessage();
                }
        }
        public function editarEncuentro($Encuentro){
            require_once ('../config/conexion.php');
            $guardar = $this->pdo->prepare("UPDATE encuentros set  
                            CodRonda=:CodRonda,
                            Equipo1=:Equipo1,
                            Equipo2=:Equipo2,
                            Equipo3=:Equipo3,
                            Equipo4=:Equipo4
                            WHERE Id=".$Encuentro['IdPartido']);
            $guardar->execute(array(
                'CodRonda' => $Encuentro['Ronda'],
                'Equipo1' => $Encuentro['Equipo1'],
                'Equipo2' => $Encuentro['Equipo2'],
                'Equipo3' => $Encuentro['Equipo3'],
                'Equipo4' => $Encuentro['Equipo4']

            ));
            return $Encuentro['IdPartido'];
        }



        public function finalizarEncuentro($Encuentro){
            require_once ('../config/conexion.php');
            $guardar = $this->pdo->prepare("UPDATE encuentros set  
                            Estatus=0,
                            Ganador=".$Encuentro['EquipoGanador']."
                            WHERE Id=".$Encuentro['IdPartido']." ");
            $guardar->execute();
            return $Encuentro['IdPartido'];
        }

        public function ResetJuego(){
            require_once ('../config/conexion.php');
            try {
            $sql = " TRUNCATE TABLE resultados; ";
            $sql =$sql. " TRUNCATE TABLE historial; ";
            $sql =$sql. " TRUNCATE TABLE estadistica; ";
            $sql =$sql. " TRUNCATE TABLE turnos; ";
            $sql =$sql. " TRUNCATE TABLE encuentros; ";
            $sql =$sql. " TRUNCATE TABLE equipos; ";
            $sql =$sql. " UPDATE preguntas set Estatus=1; ";
            //Prepare la consulta SQL.
            $reset =  $this->pdo->prepare($sql);
            //Ejecute la instrucción.
            $reset->execute();

            return 1;

        }
        catch(PDOException $e)
            {
                
            echo $guardar . "
        " . $e->getMessage();
        return 0;
            }
        }

        public function guardarRespuesta($Respuesta){
            $guardar = $this->pdo->prepare("UPDATE preguntas set  
                            Estatus=0
                            WHERE Id=".$Respuesta['IdPregunta']);
            $guardar->execute();

            $historial = $this->pdo->prepare('INSERT INTO historial set 
                Equipo=:Equipo,
                Pregunta=:Pregunta,
                Encuentro=:Encuentro,
                FlagAcierto=:FlagAcierto,
                FlagValido=1,
                Respuesta=:Respuesta
                ');
            $historial->execute(array(
                'Equipo' => $Respuesta['TurnoEquipo'],
                'Pregunta' => $Respuesta['IdPregunta'],
                'Encuentro' => $Respuesta['IdEncuentro'],
                'FlagAcierto' => $Respuesta['Acierto'],
                'Respuesta' => $Respuesta['Seleccion']

            ));

            $idEncuentro= $this->pdo->lastInsertId();

            $guardar2 = $this->pdo->prepare("UPDATE turnos set  
                            CantTurnos=CantTurnos+1
                            WHERE IdEquipo=".$Respuesta['TurnoEquipo']." AND Encuentro=".$Respuesta['IdEncuentro']);
            $guardar2->execute();



            return $idEncuentro;


        }




        public function ObtenerSiguienteTurno($Encuentro){
            $ver = $this->pdo->query('
                SELECT			
						*
            FROM
                turnos 
            WHERE
                Encuentro ='.$Encuentro.'  order by CantTurnos,Id ASC LIMIT 1 ');
            $ver->setFetchMode(PDO::FETCH_ASSOC);
            return $ver->fetch();


        }

            public function ObtenerTurnos($Encuentro){
            $ver = $this->pdo->query('
                SELECT			
						*
            FROM
                turnos 
            WHERE
                Encuentro ='.$Encuentro.'  ');
            $ver->setFetchMode(PDO::FETCH_ASSOC);
            return $ver->fetchAll();

        }


        public function ObtenerTurnosFinalizar($Encuentro){
            $ver = $this->pdo->query('
                SELECT COUNT(IdEquipo) numEquipo from turnos
            WHERE
                Encuentro ='.$Encuentro.'  ');
            $ver->setFetchMode(PDO::FETCH_ASSOC);
            $num = $ver->fetch();


            $ver1 = $this->pdo->query('
                SELECT MAX(CantTurnos) CantTurnos from turnos
            WHERE
                Encuentro ='.$Encuentro.'  ');
            $ver1->setFetchMode(PDO::FETCH_ASSOC);
            $numTurn = $ver1->fetch();


            $ver2 = $this->pdo->query('
                SELECT COUNT(IdEquipo) numEquipo from turnos
            WHERE
                Encuentro ='.$Encuentro.' AND  CantTurnos='.$numTurn['CantTurnos'].' ');
            $ver2->setFetchMode(PDO::FETCH_ASSOC);
            $numEquipo = $ver2->fetch();

            if($num['numEquipo'] == $numEquipo['numEquipo']){
                return 1;
            }else{
                return 0;
            }

        }

        public function Obtenerpuntos($Encuentro){
            $ver = $this->pdo->query('
               SELECT			
						SUM(FlagAcierto) puntos, Equipo
            FROM
                historial 
			WHERE		
                Encuentro ='.$Encuentro.'  GROUP BY Equipo');
            $ver->setFetchMode(PDO::FETCH_ASSOC);
            return $ver->fetchAll();


        }
        public function ObtenerDelantera($Encuentro){
            $ver = $this->pdo->query('
               SELECT			
						 Equipo, COUNT(Equipo) C
            FROM
                historial 
								WHERE 
								FlagAcierto=1
								and Encuentro ='.$Encuentro.'
								group by Equipo having C >0 ORDER BY C DESC LIMIT 1		
                  ');
            $ver->setFetchMode(PDO::FETCH_ASSOC);
            return $ver->fetch();


        }


        public function ObtenerEncuentroFinalizado($Encuentro){
            $ver = $this->pdo->query('
               SELECT 
                E.*, 
                Eq1.ind_nombre_equipo NameEquipo1, 
                Eq2.ind_nombre_equipo NameEquipo2, 
                Eq3.ind_nombre_equipo NameEquipo3, 
                Eq4.ind_nombre_equipo NameEquipo4  
                FROM encuentros AS E
                INNER JOIN equipos Eq1 ON (E.Equipo1=Eq1.pk_num_equipo)
                INNER JOIN equipos Eq2 ON (E.Equipo2=Eq2.pk_num_equipo)
                LEFT JOIN equipos Eq3 ON (E.Equipo3=Eq3.pk_num_equipo)
                LEFT JOIN equipos Eq4 ON (E.Equipo4=Eq4.pk_num_equipo)
                WHERE E.Id='.$Encuentro.'
                  ');
            $ver->setFetchMode(PDO::FETCH_ASSOC);
            return $ver->fetch();


        }




    }

	?>