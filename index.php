
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Reto al Conocimiento</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="./lib/css/mm_entertainment2.css" type="text/css" />
    <link href="./lib/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="./lib/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="./lib/css/sweetalert.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./lib/fonta/css/all.css" type="text/css" />

    <script type="text/javascript" language="javascript" src="./lib/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="./lib/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="./lib/js/dataTables.bootstrap5.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript" src="./lib/js/comunes.js"></script>

    <script type="text/javascript" language="javascript" src="./lib/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="./lib/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="./lib/js/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="./lib/js/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="./lib/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="./lib/js/sweetalert.js"></script>

</head>
<body bgcolor="">
<br  />
<div class="bordeTablaBanner">
    <div class="sidebarHeader">
        <img src="lib/imagenes/bannerRetoII.jpg" width="1024" height="155" />
    </div>
    <div id="dateformat">

        <div class="p-5 d-flex justify-content-between ">
        <div class="col-sm-2" style="text-align: center;">
            <a onclick="window.open('vistas/preguntas.php', 'formulario', 'toolbar=no, menubar=no, location=no, scrollbars=yes, height=800, width=1050, left=0, top=0, resizable=no')" href="javascript:;">
                <div class="col-lg-12" >
                <img src="lib/imagenes/preguntas.png" alt="" width="110" height="110" border="0" />
                </div>
                    <div class="col-lg-12" >
                <span >Lista de Preguntas</span>
                    </div>
            </a>

        </div>
            <div class="col-sm-2" style="text-align: center;">
                <a onclick="window.open('vistas/equipo.php', 'formulario', 'toolbar=no, menubar=no, location=no, scrollbars=yes, height=800, width=1050, left=0, top=0, resizable=no')" href="javascript:;">
                    <div class="col-lg-12" >
                        <img src="lib/imagenes/equipos.png" alt="" width="110" height="110" border="0" />
                    </div>
                    <div class="col-lg-12" >
                        <span >Equipos a Jugar</span>
                    </div>
                </a>

            </div>
            <div class="col-sm-2" style="text-align: center;">
                <a onclick="window.open('vistas/encuentros.php', 'formulario', 'toolbar=no, menubar=no, location=no, scrollbars=yes, height=800, width=1050, left=0, top=0, resizable=no')" href="javascript:;">
                    <div class="col-lg-12" >
                        <img src="lib/imagenes/encuentros.png" alt="" width="110" height="110" border="0" />
                    </div>
                    <div class="col-lg-12" >
                        <span >Definir Encuentros</span>
                    </div>
                </a>

            </div>
            <div class="col-sm-2" style="text-align: center;">
                <a onclick="window.open('vistas/resultados.php', 'formulario', 'toolbar=no, menubar=no, location=no, scrollbars=yes, height=800, width=1050, left=0, top=0, resizable=no')" href="javascript:;">
                    <div class="col-lg-12" >
                        <img src="lib/imagenes/resultados.png" alt="" width="110" height="110" border="0" />
                    </div>
                    <div class="col-lg-12" >
                        <span >Ver Resultados</span>
                    </div>
                </a>

            </div>

        </div>

        <div class="p-3 d-flex justify-content-around">
            <div class="col-sm-2" style="text-align: center;">
                <a onclick="window.open('vistas/jugar.php', 'formulario', 'toolbar=no, menubar=no, location=no, scrollbars=yes, height=800, width=1050, left=0, top=0, resizable=no')" href="javascript:;">
                    <div class="col-lg-12" >
                        <img src="lib/imagenes/jugar.png" alt="" width="110" height="110" border="0" />
                    </div>
                    <div class="col-lg-12" >
                        <span >Jugar</span>
                    </div>
                </a>

            </div>
            <div class="col-sm-2" style="text-align: center;">
                <a onclick="ResetJuego();">
                    <div class="col-lg-12" >
                        <img src="lib/imagenes/nuevo.png" alt="" width="110" height="110" border="0" />
                    </div>
                    <div class="col-lg-12" >
                        <span >Juego Nuevo </span>
                    </div>
                </a>

            </div>
            <div class="col-sm-2" style="display:none; text-align: center;">
                <a onclick="window.open('archivos/preguntas.php?accion=LISTAR&limit=0', 'formulario', 'toolbar=no, menubar=no, location=no, scrollbars=yes, height=800, width=1050, left=0, top=0, resizable=no')" href="javascript:;">
                    <div class="col-lg-12" >
                        <img src="lib/imagenes/parametros.png" alt="" width="110" height="110" border="0" />
                    </div>
                    <div class="col-lg-12" >
                        <span >Parámetros del Juego</span>
                    </div>
                </a>

            </div>
        </div>

    </div>

</div>
<br />
</body>
<script>
    function ResetJuego() {
        var caso="ResetJuego";

        swal({
            title: "Estas Seguro?",
            text: "Esta acción eliminiara todos los datos del partido actual",
            type: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {

                $.ajax({
                type: "POST",
                url: './controlador/enrutador.php',
                data: { 'caso': caso},//capturo array
                success: function(data){
                    swal("Exito!", "Juego reseteado de manera exitosa.", "success");
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
</html>
