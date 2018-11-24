<?php
session_start();
include 'conexion2.php';
$fecha = "";
$numOficio = "";
$numExpediente = "";
$concepto = "";
$fechaPago = "";
$monto = "";

if (isset($_SESSION['fecha'])) {
    $fecha = $_SESSION['fecha'];
}
if (isset($_SESSION['numOficio'])) {
    $numOficio = $_SESSION['numOficio'];
}
if (isset($_SESSION['numExpediente'])) {
    $numExpediente = $_SESSION['numExpediente'];
}
if (isset($_SESSION['concepto'])) {
    $concepto = $_SESSION['concepto'];
}
if (isset($_SESSION['fechaPago'])) {
    $fechaPago = $_SESSION['fechaPago'];
}
if (isset($_SESSION['monto'])) {
    $monto = $_SESSION['monto'];
}
//echo "<pre>";
//    print_r($_SESSION);
//     echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Registro de Egresos</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="row-fluid">
                <div class="col-md-12">
                    <h2><span class="glyphicon glyphicon-edit"></span> EGRESOS 2018 CUNA JARDIN UNSA</h2>
                    <hr>
                    <form action="modelo.php" method="post" class="form-horizontal" role="form" id="datos_cotizacion">
                        <div class="form-group row">
                            <label for="atencion" class="col-md-1 control-label">FECHA:</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="fecha" placeholder="Fecha" name="fecha" value="<?php echo $fecha; ?>">
                            </div>
                            <label for="tel1" class="col-md-1 control-label">Nro DE OFICIO:</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="numOficio" placeholder="Numero de Oficio" name="numOficio" value="<?php echo $numOficio; ?>"> 
                            </div>
                            <label for="tel2" class="col-md-1 control-label">Nro DE EXPEDIENTE:</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="numExpediente" placeholder="Numero de Expediente" name="numExpediente" value="<?php echo $numExpediente; ?>">
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="tel2" class="col-md-1 control-label">CONCEPTO:</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="concepto" placeholder="Concepto" name="concepto" value="<?php echo $concepto; ?>">
                            </div>
                            <label for="tel2" class="col-md-1 control-label">FECHA DE PAGO:</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="fechaPago" placeholder="Fecha de Pago" name="fechaPago" value="<?php echo $fechaPago; ?>">
                            </div>
                            <label for="tel2" class="col-md-1 control-label">MONTO:</label>
                            <div class="col-md-2">
                                <input type="text" class="form-control" id="monto" placeholder="Monto" name="monto" value="<?php echo $monto; ?>">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="crud_table">
                                <tr>
                                    <th width="30%">Comprobante</th>
                                    <th width="10%">Fecha</th>
                                    <th width="45%">Razon Social</th>
                                    <th width="10%">Concepto</th>
                                    <th width="10%">Importe</th>
                                    <th width="5%"></th>
                                </tr>
                                <tr>
                                    <td contenteditable="true" class="item_comprobante"></td>
                                    <td contenteditable="true" class="item_fecha"></td>
                                    <td contenteditable="true" class="item_razonSocial"></td>
                                    <td contenteditable="true" class="item_concepto"></td>
                                    <td contenteditable="true" class="item_importe"></td>
                                    <td></td>
                                </tr>
                            </table>
                            <div align="right">
                                <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
                            </div>
                            <div align="center">
                                <button type="button" name="save" id="save" class="btn btn-info">Save</button>
                            </div>
                            <br />
                            <div id="inserted_item_data"></div>
                        </div>
                        <input type="submit" name="operacion" value="agregar">

                    </form>

                </div>
                <br><br>
                <div id="resultados" class='col-md-12'></div><!-- Carga los datos ajax -->

                <!-- Modal -->
                <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Buscar productos</h4>
                            </div>
                            <div class="modal-body">

                                <div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
                                <div class="outer_div" ></div><!-- Datos ajax Final -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

                            </div>
                        </div>
                    </div>
                </div>

            </div>	
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/VentanaCentrada.js"></script>
    <script>
        $(document).ready(function () {
            var count = 1;
            $('#add').click(function () {
                count = count + 1;
                var html_code = "<tr id='row" + count + "'>";
                html_code += "<td contenteditable='true' class='item_comprobante'></td>";
                html_code += "<td contenteditable='true' class='item_fecha'></td>";
                html_code += "<td contenteditable='true' class='item_razonSocial'></td>";
                html_code += "<td contenteditable='true' class='item_concepto' ></td>";
                html_code += "<td contenteditable='true' class='item_importe' ></td>";
                html_code += "<td><button type='button' name='remove' data-row='row" + count + "' class='btn btn-danger btn-xs remove'>-</button></td>";
                html_code += "</tr>";
                $('#crud_table').append(html_code);
            });

            $(document).on('click', '.remove', function () {
                var delete_row = $(this).data("row");
                $('#' + delete_row).remove();
            });

            $('#save').click(function () {
                var item_comprobante = [];
                var item_fecha = [];
                var item_razonSocial = [];
                var item_concepto = [];
                var item_importe = [];
                $('.item_comprobante').each(function () {
                    item_comprobante.push($(this).text());
                });
                $('.item_fecha').each(function () {
                    item_fecha.push($(this).text());
                });
                $('.item_razonSocial').each(function () {
                    item_razonSocial.push($(this).text());
                });
                $('.item_concepto').each(function () {
                    item_concepto.push($(this).text());
                });
                $('.item_importe').each(function () {
                    item_importe.push($(this).text());
                });
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: {item_comprobante: item_comprobante, item_fecha: item_fecha, item_razonSocial: item_razonSocial, item_concepto: item_concepto,item_importe: item_importe},
                    success: function (data) {
                        alert(data);
                        $("td[contentEditable='true']").text("");
                        for (var i = 2; i <= count; i++)
                        {
                            $('tr#' + i + '').remove();
                        }
                        fetch_item_data();
                    }
                });
            });

            function fetch_item_data()
            {
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    success: function (data)
                    {
                        $('#inserted_item_data').html(data);
                    }
                })
            }
            fetch_item_data();

        });
    </script>
</body>
</html>