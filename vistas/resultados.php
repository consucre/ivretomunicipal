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






</div>
</body>
<script>
    $(document).ready( function () {


        var caso="verEquipo";

$.ajax({
    type: "POST",
    url: '../controlador/enrutador.php',
    data: {'pk_num_equipo':'1', 'caso': caso},//capturo array
    success: function(data){
       $('.container').html(data.dato.ind_nombre_equipo);
       

    },
    error: function (request, status, error) {
        swal("Error!", "ha ocurrido un problema con el servidor.", "error");
    }
}); 

    });

   

</script>

