<?php
include '../conexion.php';

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
    ?>
    <div class="table-responsive">
        <table class="table">
            <tr  class="warning">
                <th><span class="pull-right">Descripcion</span></th>
                <th><span class="pull-right">Cantidad</span></th>
                <th><span class="pull-right">Precio Unitario</span></th>
                <th><span class="pull-right">Monto Total</span></th>-->
                <th style="width: 36px;"></th>
            </tr>

            <tr>

                <td class='col-xs-1'>
                    <div class="pull-right">
                        <input type="text" class="form-control" style="text-align:right" id="EgresosDescripcion"  value="1" >
                    </div>
                </td>
                <td class='col-xs-2'><div class="pull-right">
                        <input type="text" class="form-control" style="text-align:right" id="EgresosCantidad"  value="<?php echo $precio_venta; ?>" >
                    </div>
                </td>
                <td class='col-xs-2'><div class="pull-right">
                        <input type="text" class="form-control" style="text-align:right" id="EgresosPrecioUnitario"  value="<?php echo $precio_venta; ?>" >
                    </div>
                </td>
                <td class='col-xs-2'><div class="pull-right">
                        <input type="text" class="form-control" style="text-align:right" id="EgresosTotal"  value="<?php echo $precio_venta; ?>" >
                    </div>
                </td>
                <td ><span class="pull-right"><a href="#" onclick="agregar('<?php echo $id_producto ?>')"><i class="glyphicon glyphicon-plus"></i></a></span></td>
                <td><a href="page-registrar-boleta.php?voucher=<?php echo $id_producto ?>"><span class="task-cat cyan">Agregar</span></a></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td colspan=5><span class="pull-right"><?
                    echo paginate($reload, $page, $total_pages, $adjacents);
                    ?></span></td>
        </tr>
        </ta                                                                                                                                                                                  ble>
</div>
<?php
?>