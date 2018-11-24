<?php 
    if(!empty($_POST['agregar'])){
        $_POST['cantidad_lineas']=$_POST['cantidad_lineas']+1;
        $i=$_POST['cantidad_lineas'];
        $_POST['visible'.$i]=1;
    }
    if(!empty($_POST['Eliminar'])){
        $_POST['visible'.$_POST['Eliminar']]=0;
    }
    if(!empty($_POST['guardar'])){
        
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Registro de Egresos</title>
    </head>
    <body>
        <h1>EGRESOS 2018 CUNA JARDIN UNSA</h1>
        <form action="page-registrar-egresos3.php" method="POST">
            <?php
            //primer formulario
            echo "<div class='formularios'";
                echo "<table id='fomulario'>";
                    echo '<tr>';
                        echo "<td align='left'>FECHA:</td>";
                        echo "<td align='left'><input type='text' name='EgresosFecha' value='".$_POST['EgresosFecha']."'>FECHA:</td>";
                    echo '</tr>';
                    echo '<tr>';
                        echo "<td align='left'>FECHA:</td>";
                        echo "<td align='left'><input type='text' name='EgresosFecha' value='".$_POST['EgresosNroOficio']."'>FECHA:</td>";
                    echo '</tr>';
                    echo '<tr>';
                        echo "<td align='left'>FECHA:</td>";
                        echo "<td align='left'><input type='text' name='EgresosFecha' value='".$_POST['EgresosNroExpediente']."'>FECHA:</td>";
                    echo '</tr>';
                    echo '<tr>';
                        echo "<td align='left'>FECHA:</td>";
                        echo "<td align='left'><input type='text' name='EgresosFecha' value='".$_POST['EgresosConcepto']."'>FECHA:</td>";
                    echo '</tr>';
                    echo '<tr>';
                        echo "<td align='left'>FECHA:</td>";
                        echo "<td align='left'><input type='text' name='EgresosFecha' value='".$_POST['EgresosFechaPago']."'>FECHA:</td>";
                    echo '</tr>';
                    echo '<tr>';
                        echo "<td align='left'>FECHA:</td>";
                        echo "<td align='left'><input type='text' name='EgresosFecha' value='".$_POST['EgresosMonto']."'>FECHA:</td>";
                    echo '</tr>';
                echo "</table>";   
            echo "</div>";  
            
            echo "<div class='formularios'";
                echo "<table id='fomulario' border='1'>";
                    echo "<tr style='background-color:blue;color:white;'>"; 
                        echo "<td align='center' width='20%'>COMPROBANTE:</td>";
                        echo "<td align='center' width='20%'>FECHA:</td>";
                        echo "<td align='center' width='20%'>RAZON SOCIAL:</td>";
                        echo "<td align='center' width='20%'>CONCEPTO:</td>";
                        echo "<td align='center' width='20%'>CANTIDAD:</td>";
                        echo "<td align='center' width='20%'>PRECIO:</td>";
                        echo "<td align='center' width='20%'>IMPORTE:</td>";
                        echo "<td align='center' width='20%'>ELIMINAR:</td>";
                    echo '</tr>';
                    
                    for($i=1;$i<=$_POST['cantidad_lineas'];$i++){
//                        if(S_POST['visible'.$i]==1){
//                            echo "<tr style='color:black;'>"; 
//                                echo "<td align='center'><input name='EgresosFecha".$i."' value='".$_POST['EgresosMonto'.$i]."' style='width='90%'></td>";
//                                echo "<td align='center'><input name='EgresosFecha".$i."' value='".$_POST['EgresosMonto'.$i]."' style='width='90%'></td>";
//                                echo "<td align='center'><input name='EgresosFecha".$i."' value='".$_POST['EgresosMonto'.$i]."' style='width='90%'></td>";
//                                echo "<td align='center'><input name='EgresosFecha".$i."' value='".$_POST['EgresosMonto'.$i]."' style='width='90%'></td>";
//                                echo "<td align='center'><button name='Eliminar' value='".$i."'>Eliminar</button></td>";
//                            echo '</tr>';
//                            
//                            $subtotal+=$_POST['valor'.$i];
//                        }
//                        echo "<input type='hidden' name='visible".$i."' value='".$_POST['visible'.$i]."'>";
                    }
                    echo "<tr style='background-color:blue;color:white;'>"; 
                        echo "<td align='center' >:</td>";
                        echo "<td align='center' >:</td>";
                        echo "<td align='center' >Subtotal:</td>";
                        echo "<td align='center' >".$subtotal."</td>";
                        echo "<td align='center' >:</td>";
                        
                    echo '</tr>';
                echo "</table>";  
            echo "<br><br>";
            echo "<button name='agregar' value='agregar'>Agregar Linea</button>";
            echo "</div>";
            
            echo "<div style='margin:0 auto; text-align:center; width:400px;'>";
            echo "<button name='guardar' value='guardar'>GUardar los registros en la bd</button>";
            echo "</div>";
            
            echo "<input type='hidden' name='cantidad_lineas' values='".$_POST['cantidad_lineas']."'>";
            
            ?>
        </form>
    </body>
</html>

