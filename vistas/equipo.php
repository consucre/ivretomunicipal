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

<body>
<div class="container">

    <div class="row ">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto table" id="table" style="margin-top: 10%;">
            <table class="table table-bordered table-hovered table-striped" id="productTable">
                <thead>
                <th style="width: 10%;"> Numero </th>
                <th style="width: 75%;"> Equipo </th>
                <th style="width: 15%;"> Acciones </th>
                </thead>

                <tbody>

                 
                </tbody>
            </table>
            
            </div>
        </div>
        <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto">
                <button type="button" id="nuevo" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo Equipo</button>
            </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Equipos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <div class="form">
                        <div class="row ">
                            <div class="form col-md-12 " id="form" >

                            <div class="col-md-12" style="margin-top: 3%;">
                            <div class="form-group">
                            <div class="col-md-2">Equipo</div>
                                <div class="col-md-10">
                                <input type="hidden" id="pk_num_equipo" name="pk_num_equipo">
                                    <input id="fname" name="name" type="text" placeholder="Nombre del Equipo" class="form-control">
                                </div>
                            </div>
                            </div>


                            <div class="col-md-12" style="margin-top: 3%;">
                            <div class="form-group">
                            <div class="col-md-2">Estatus</div>
                                <div class="col-md-10">
                                    <select name="num_estatus" id="num_estatus" class="form-control">
                                    <option value="">Seccione</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                
                                    </select>
                                </div>
                            </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="guardar" class="btn btn-primary">Save changes</button>
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
            data: {'caso': 'obtenerEquipo'}
        },
        columns: [

            { data: 'pk_num_equipo' },
            { data: 'ind_nombre_equipo' },
            {
        data: null,
        "bSortable": false,
        "mRender": function(data, type, value) {
            return '<div class="d-flex justify-content-around"><div><button id="btnActivar" onclick="showData('+value["pk_num_equipo"]+');" class=" btn btn-default btn-block act_'+value["pk_num_equipo"]+' btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" axn='+value["pk_num_equipo"]+' idc='+value["pk_num_equipo"]+'><span><i class="fa fa-edit"></i></span></button></div><div><button id="btnActivar" onclick="DeleteData('+value["pk_num_equipo"]+');" class=" btn btn-default btn-block act_'+value["pk_num_equipo"]+' btn btn-danger btn-lg"  axn='+value["pk_num_equipo"]+' idc='+value["pk_num_equipo"]+'><span><i class="fa fa-trash"></i></span></button></div></div>';
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
            $('#fname').val('');
        });

        $('#guardar').click( function () {

            var equipo= $('#fname').val();
            var estatus= $('#num_estatus').val();
            if(equipo!=null && equipo.trim()!="" && estatus!=null && estatus.trim()!="")
            {

            var id= $('#pk_num_equipo').val();
            if (id!=""){
                var caso = "editarEquipo";
                var datos= {'equipo':equipo, 'num_estatus':estatus, 'pk_num_equipo': id,'caso': caso};
            }else {
                var caso = "guardarEquipo";
                var datos= {'equipo':equipo, 'num_estatus':estatus, 'caso': caso};

            }
            $.ajax({
                type: "POST",
                url: '../controlador/enrutador.php',
                data: datos,//capturo array
                success: function(data){
                if(data.estatus=="ok"){
                    swal("Exito!", "se han guardado los datos.", "success");
                    location.reload();
                }else{
                    swal("Error!", "ha ocurrido un problema con el servidor.", "error");

                }
                }
            });
        }else{
            swal("Advertencia!", "Debe completar los datos en el formulario.", "warning");

        }
        });



       

    });

    function showData(pk_num_equipo) {
        var caso="verEquipo";

            $.ajax({
                type: "POST",
                url: '../controlador/enrutador.php',
                data: {'pk_num_equipo':pk_num_equipo, 'caso': caso},//capturo array
                success: function(data){
                    var equipo= $('#fname').val(data.dato.ind_nombre_equipo);
                    var pk_num_equipo= $('#pk_num_equipo').val(data.dato.pk_num_equipo);
                    var num_estatus= $('#num_estatus').val(data.dato.num_estatus);

                },
                error: function (request, status, error) {
                    swal("Error!", "ha ocurrido un problema con el servidor.", "error");
                }
            }); 
        }


        function DeleteData(pk_num_equipo) {
        var caso="EliminarEquipo";
        swal({
                title: "Estas Seguro?",
                text: "Quieres eliminar esté equipo",
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
                data: {'pk_num_equipo':pk_num_equipo, 'caso': caso},//capturo array
                success: function(data){
                    swal("Exito!", "Equipo se ha eliminado de manera exitosa.", "success");
                    location.reload();
                },
                error: function (request, status, error) {
                    swal("Error!", "ha ocurrido un problema con el servidor.", "error");
                }
            }); 
              } 
            });

           
        }

</script>

