<?php
require_once ('../controlador/controlador.php');

$a= new controlador();
$products=$a->obtenerEquipos();

$Rondas=$a->obtenerRondas();

?>
<style>
   tr.group, tr.group:hover {
        background-color: #d0ffd3 !important;
    }

</style>

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
                <th style="width: 10%;"> Num </th>
                <th style="width: 15%;"> Ronda </th>
                <th style="width: 60%;"> Partidos </th>
                <th style="width: 20%;"> Acciones </th>
                </thead>

                <tbody>

                 
                </tbody>
            </table>
            
            </div>
        </div>
        <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto">
                <button type="button" id="nuevo" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo Encuentro</button>
            </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Encuentro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <div class="form">
                        <div class="row ">
                            <div class="form col-md-12 " id="form" >


                            <div class="col-md-12" style="margin-top: 3%;">
                            <div class="form-group">
                            <div class="col-md-2">Ronda</div>
                                <div class="col-md-10">
                                    <input type="hidden" id="IdPartido">
                                <select id="Ronda" name="Ronda" class="form-control">
                                    <option value="0">Seleccione</option>
                                            <?php
                                            foreach($Rondas as $product) : ?>
                                                <option equipo1="<?php echo $product['Ronda']; ?>"  value="<?php echo $product['CodRonda']; ?>"><?php echo $product['Ronda']; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                </div>
                            </div>
                            </div>
                            
                            <div class="col-md-12" style="margin-top: 3%;">
                            <div class="form-group">
                            <div class="col-md-2">Equipo 1</div>
                                <div class="col-md-10">
                                <select id="Equipo1" name="Equipo1" class="form-control">
                                    <option value="0">Seleccione</option>
                                            <?php
                                            foreach($products as $product) : ?>
                                                <option equipo1="<?php echo $product['ind_nombre_equipo']; ?>"  value="<?php echo $product['pk_num_equipo']; ?>"><?php echo $product['ind_nombre_equipo']; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                </div>
                            </div>
                            </div>

                            <div class="col-md-12" style="margin-top: 3%;">
                            <div class="form-group">
                            <div class="col-md-2">Equipo 2</div>
                                <div class="col-md-10">
                                <select id="Equipo2" name="Equipo2" class="form-control">
                                <option value="0">Seleccione</option>
                                            <?php
                                            foreach($products as $product) : ?>
                                                <option equipo1="<?php echo $product['ind_nombre_equipo']; ?>"  value="<?php echo $product['pk_num_equipo']; ?>"><?php echo $product['ind_nombre_equipo']; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                </div>
                            </div>
                            </div>

                            <div class="col-md-12" style="margin-top: 3%;">
                            <div class="form-group">
                            <div class="col-md-2">Equipo 3</div>
                                <div class="col-md-10">
                                <select id="Equipo3" name="Equipo3" class="form-control">
                                <option value="0">Seleccione</option>
                                            <?php
                                            foreach($products as $product) : ?>
                                                <option equipo1="<?php echo $product['ind_nombre_equipo']; ?>"  value="<?php echo $product['pk_num_equipo']; ?>"><?php echo $product['ind_nombre_equipo']; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 3%;">
                            <div class="form-group">
                            <div class="col-md-2">Equipo 4</div>
                                <div class="col-md-10">
                                <select id="Equipo4" name="Equipo4" class="form-control">
                                <option value="0">Seleccione</option>
                                            <?php
                                            foreach($products as $product) : ?>
                                                <option equipo1="<?php echo $product['ind_nombre_equipo']; ?>"  value="<?php echo $product['pk_num_equipo']; ?>"><?php echo $product['ind_nombre_equipo']; ?></option>
                                            <?php endforeach; ?>

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
            data: {'caso': 'obtenerEncuentro'}
        },
        columns: [

            { data: 'Id' },
            { data: 'Ronda' },
            { data: 'Partido' },
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
        ],
        columnDefs: [{ visible: false, targets: 1 }],
        order: [[1, 'asc']],
        displayLength: 25,
        drawCallback: function (settings) {
            var api = this.api();
            var rows = api.rows({ page: 'current' }).nodes();
            var last = null;
 
            api
                .column(1, { page: 'current' })
                .data()
                .each(function (group, i) {
                    if (last !== group) {
                        $(rows)
                            .eq(i)
                            .before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
 
                        last = group;
                    }
                });
        },
        
    });

        $('#nuevo').click( function () {
            
            $('#IdPartido').val('');
            $('#Ronda').val('0');
            $('#Equipo1').val('0');
            $('#Equipo2').val('0');
            $('#Equipo3').val('0');
            $('#Equipo4').val('0');
        });

        $('#guardar').click( function () {


            var IdPartido = $('#IdPartido').val();
            var Ronda = $('#Ronda').val();
            var Equipo1 = $('#Equipo1').val();
            var Equipo2 = $('#Equipo2').val();
            var Equipo3 = $('#Equipo3').val();
            var Equipo4 = $('#Equipo4').val();
            if((Ronda!=null && Ronda.trim()!="") && (Equipo1!=null && Equipo1.trim()!="") && (Equipo2!=null && Equipo2.trim()!=""))
            {

            if (IdPartido!=""){
                var caso = "editarEncuentro";
                var datos= {'IdPartido':IdPartido, 'Ronda':Ronda, 'Equipo1': Equipo1, 'Equipo2':Equipo2, 'Equipo3':Equipo3, 'Equipo4': Equipo4,'caso': caso};
            }else {
                var caso = "guardarEncuentro";
                var datos= {'Ronda':Ronda, 'Equipo1': Equipo1, 'Equipo2':Equipo2, 'Equipo3':Equipo3, 'Equipo4': Equipo4,'caso': caso};

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

    function showData(Id) {
        var caso="verEncuentro";

            $.ajax({
                type: "POST",
                url: '../controlador/enrutador.php',
                data: {'Id':Id, 'caso': caso},//capturo array
                success: function(data){


                    var IdPartido = $('#IdPartido').val(data.dato.Id);
                    var Ronda = $('#Ronda').val(data.dato.CodRonda);
                    var Equipo1 = $('#Equipo1').val(data.dato.Equipo1);
                    var Equipo2 = $('#Equipo2').val(data.dato.Equipo2);
                    var Equipo3 = $('#Equipo3').val(data.dato.Equipo3);
                    var Equipo4 = $('#Equipo4').val(data.dato.Equipo4);

                },
                error: function (request, status, error) {
                    swal("Error!", "ha ocurrido un problema con el servidor.", "error");
                }
            }); 
        }


        function DeleteData(Id) {
        var caso="EliminarEncuentro";
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
                data: {'Id':Id, 'caso': caso},//capturo array
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

