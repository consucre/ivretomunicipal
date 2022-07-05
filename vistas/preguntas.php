<?php
require_once ('../controlador/controlador.php');


$a= new controlador();
$products=$a->obtenerPregunta();
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

<body>
<div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto">
            <button type="button" id="nuevo" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Nueva Pregunta</button>
        </div>
    <div class="row ">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto table" id="table" style="margin-top: 10%;">
            <table class="table table-bordered table-hovered table-striped" id="productTable">
                <thead>

               <!-- <th style="width: 25%;"> Numero </th>-->
                <th style="width: 25%;"> Pregunta </th>
                <th style="width: 15%;"> Opcion A </th>
                <th style="width: 15%;"> Opcion B </th>
                <th style="width: 15%;"> Opcion C </th>
                <th style="width: 15%;"> Opcion D </th>
               <!-- <th style="width: 15%;"> Respuesta </th>-->
                <th style="width: 15%;"> Acciones </th>
                </thead>

                <tbody>

                 
                </tbody>
            </table>
            
            </div>
        </div>



    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registros Preguntas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <div class="form">
                        <div class="row ">
                            <div class="form col-md-12 " id="form">
                            <div class="col-md-12" style="margin-top: 3%;">
                            <div class="form-group">
                            <div class="col-md-2">Pregunta</div>
                                <div class="col-md-10">
                                <input id="IdPregunta" type="hidden" >
                                <input id="Pregunta" name="name" type="text" class="form-control">
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 3%;">
                            <div class="form-group" >
                            <div class="col-md-2">Opción A</div>
                                <div class="col-md-10">
                                    <input id="OpcionA" name="name" type="text"  class="form-control">
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 3%;">
                            <div class="form-group">
                            <div class="col-md-2">Opción B</div>
                                <div class="col-md-10">
                                    <input id="OpcionB" name="name" type="text"  class="form-control">
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 3%;">
                            <div class="form-group">
                            <div class="col-md-2">Opción C</div>
                                <div class="col-md-10">
                                    <input id="OpcionC" name="name" type="text"  class="form-control">
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 3%;">
                            <div class="form-group">
                            <div class="col-md-2">Opción D</div>
                                <div class="col-md-10">
                                    <input id="OpcionD" name="name" type="text"  class="form-control">
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 3%;">
                            <div class="form-group">
                            <div class="col-md-2">Respuesta</div>
                                <div class="col-md-10">
                                    <select name="name" id="Respuesta" class="form-control">
                                    <option value="">Seccione</option>
                                    <option value="A">Opcion A</option>
                                    <option value="B">Opcion B</option>
                                    <option value="C">Opcion C</option>
                                    <option value="D">Opcion D</option>

                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 3%;">
                            <div class="form-group">
                            <div class="col-md-2">Ronda</div>
                                <div class="col-md-10">
                                    <select name="name" id="Ronda" class="form-control">
                                        <option value="">Seccione</option>
                                        <option value="1">Eliminatoria</option>
                                        <option value="2">Semi-Final</option>
                                        <option value="3">Final</option>

                                    </select>
                                </div>
                            </div>
                            </div>

                            <div class="col-md-12" style="margin-top: 3%;">
                            <div class="form-group">
                            <div class="col-md-2">Puntos</div>
                                <div class="col-md-10">
                                    <input id="Puntos" name="name" onkeyup="validaSoloNumeros(this.id)" type="number"  class="form-control">
                                </div>
                            </div>
                            </div>
                            
                            
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                <button type="button" id="guardar" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>



</div>
</body>
<script>
    $(document).ready( function () {

        $('#productTable').DataTable({
        processing: true,

        ajax: {
            url: '../controlador/enrutador.php',
            type: 'POST',
            data: {'caso': 'obtenerListaPreguntas'}
        },
        columns: [

            { data: 'Pregunta' },
            { data: 'OpcionA' },
            { data: 'OpcionB' },
            { data: 'OpcionC' },
            { data: 'OpcionD' },
          //  { data: 'Respuesta' },
            {
        data: null,
        "bSortable": false,
        "mRender": function(data, type, value) {
            return '<div class="d-flex justify-content-around"><div><button id="btnActivar" onclick="showData('+value["Id"]+');" class=" btn btn-default btn-block act_'+value["Id"]+' btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" axn='+value["Id"]+' idc='+value["Id"]+'><span><i class="fa fa-edit"></i></span></button></div><div><button id="btnActivar" onclick="DeleteData('+value["Id"]+');" class=" btn btn-default btn-block act_'+value["Id"]+' btn btn-danger btn-lg"  axn='+value["Id"]+' idc='+value["Id"]+'><span><i class="fa fa-trash"></i></span></button></div></div>';
        } }
        ], 
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
        
    });


        $('#nuevo').click( function () {
            $('#Pregunta').val('');
           $('#OpcionA').val('');
            $('#OpcionB').val('');
            $('#OpcionC').val('');
            $('#OpcionD').val('');
            $('#Respuesta').val('');
            $('#Puntos').val('');
            $('#Ronda').val('');
            $('#IdPregunta').val('');
        });

        $('#guardar').click( function () {
            var Pregunta= $('#Pregunta').val();
            var OpcionA= $('#OpcionA').val();
            var OpcionB= $('#OpcionB').val();
            var OpcionC= $('#OpcionC').val();
            var OpcionD= $('#OpcionD').val();
            var Respuesta= $('#Respuesta').val();
            var Puntos= $('#Puntos').val();
            var Ronda= $('#Ronda').val();
            var Id= $('#IdPregunta').val();
            if (Id!=""){
                var caso = "editarPregunta";
                var datos= {'Id':Id, 'Pregunta':Pregunta, 'OpcionA':OpcionA, 'OpcionB':OpcionB, 'OpcionC':OpcionC, 'OpcionD': OpcionD,'Respuesta': Respuesta, 'Puntos': Puntos,'Ronda': Ronda, 'caso': caso};
            }else {
                var caso="guardarPregunta";
                var datos= {'Pregunta':Pregunta, 'OpcionA':OpcionA, 'OpcionB':OpcionB, 'OpcionC':OpcionC, 'OpcionD': OpcionD,'Respuesta': Respuesta, 'Puntos': Puntos,'Ronda': Ronda, 'caso': caso};

            }
            $.ajax({
                type: "POST",
                url: '../controlador/enrutador.php',
                data: datos,//capturo array
                success: function(data){
                    if(data.estatus=="ok"){
                        swal("Exito!", "Equipo se ha eliminado de manera exitosa.", "success");
                        location.reload();
                    }else{
                        swal("Error!", "ha ocurrido un problema con el servidor.", "error");

                    }
                }
            });

        });


    });

    function showData(pk_num_equipo) {
        var caso="verPregunta";

            $.ajax({
                type: "POST",
                url: '../controlador/enrutador.php',
                data: {'Id':pk_num_equipo, 'caso': caso},//capturo array
                success: function(data){
                    $('#Pregunta').val(data.dato.Pregunta);
                    $('#OpcionA').val(data.dato.OpcionA);
                    $('#OpcionB').val(data.dato.OpcionB);
                    $('#OpcionC').val(data.dato.OpcionC);
                    $('#OpcionD').val(data.dato.OpcionD);
                    $('#Respuesta').val(data.dato.Respuesta);
                    $('#Puntos').val(data.dato.Puntos);
                    $('#Ronda').val(data.dato.Ronda);
                    $('#IdPregunta').val(data.dato.Id);

                },
                error: function (request, status, error) {
                    swal("Error!", "ha ocurrido un problema con el servidor.", "error");
                }
            }); 
        }

        function DeleteData(Id) {
        var caso="EliminarPregunta";
        swal({
                title: "Estas Seguro?",
                text: "Quieres Eliminar esta pregunta",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger btn-sm",
                confirmButtonText: "Confirmar",
                cancelButtonText: "Cancelar",
                closeOnConfirm: true,
                closeOnCancel: true
            },
            function(isConfirm) {
          
              if (isConfirm) {
                $.ajax({
                type: "POST",
                url: '../controlador/enrutador.php',
                data: {'Id':Id, 'caso': caso},//capturo array
                success: function(data){
                    swal("Exito!", "la Pregunta se ha eliminado de manera exitosa.", "success");
                   // location.reload();
                },
                error: function (request, status, error) {
                    swal("Error!", "ha ocurrido un problema con el servidor.", "error");
                }
            }); 
              } 
            });

           
        }
</script>

