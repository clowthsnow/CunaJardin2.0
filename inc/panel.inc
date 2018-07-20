<?php
include 'conexion.php';
if ('1' == $_SESSION['permisos']) {
    ?>
    <p class="caption">Accesos Directos</p>

    <div class="divider"></div>
    <div id="basic-card" class="section">
        <div class="row">
            <div class="col s6 m4 l4">
                <div class="card  light-blue">
                    <div class="card-content white-text">
                        <span class="card-title">Usuarios</span>
                        <p>Crea u observa los usuarios que van a usar el sistema</p>
                    </div>
                    <div class="card-action">
                        <a href="page-crear-usuario.php" class="lime-text text-accent-1">Crear Usuario</a>
                        <a href="page-ver-usuarios.php" class="lime-text text-accent-1">Ver Usuarios</a>
                        <a href="page-datos-alumno.php" class="lime-text text-accent-1">Datos Alumnos</a>
                    </div>
                </div>
            </div>

            <div class="col s6 m4 l4">
                <div class="card  light-blue">
                    <div class="card-content white-text">
                        <span class="card-title">Director</span>
                        <p>Crea u observa al director de la escuela.</p>
                    </div>
                    <div class="card-action">
                        <a href="page-crear-director.php" class="lime-text text-accent-1">Crear Director</a>
                        <a href="page-ver-director.php" class="lime-text text-accent-1">Ver Director</a>
                    </div>
                </div>
            </div>


            <div class="col s6 m4 l4">
                <div class="card  light-blue">
                    <div class="card-content white-text">
                        <span class="card-title">Secretaria</span>
                        <p>Crea u observa a la secretaria de la escuela.</p>
                    </div>
                    <div class="card-action">
                        <a href="page-crear-secretaria.php" class="lime-text text-accent-1">Crear Secretaria</a>
                        <a href="page-ver-secretaria.php" class="lime-text text-accent-1">Ver Secretaria</a>
                    </div>
                </div>
            </div>

            <div class="col s6 m4 l4">
                <div class="card  light-blue">
                    <div class="card-content white-text">
                        <span class="card-title">Escuela</span>
                        <p>Crea u observa a la escuela.</p>
                    </div>
                    <div class="card-action">
                        <a href="page-crear-escuela.php" class="lime-text text-accent-1">Crear Escuela</a>
                        <a href="page-ver-escuela.php" class="lime-text text-accent-1">Ver Escuela</a>
                    </div>
                </div>
            </div>

            <div class="col s6 m4 l4">
                <div class="card  light-blue">
                    <div class="card-content white-text">
                        <span class="card-title">Aula</span>
                        <p>Crea u observa al aula.</p>
                    </div>
                    <div class="card-action">
                        <a href="page-crear-aula.php" class="lime-text text-accent-1">Crear Aula</a>
                        <a href="page-ver-aula.php" class="lime-text text-accent-1">Ver Aula</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <?php
} else {
    ?>


    <?php if ('2' == $_SESSION['permisos']) { ?>
        <p class="caption">Accesos Directos</p>

        <div class="divider"></div>


    <?php } ?>
    <?php if ('3' == $_SESSION['permisos']) { ?>

        <p class="caption">Accesos Directos</p>

        <div class="divider"></div>

    <?php } ?>
    <?php if ('4' == $_SESSION['permisos']) { ?>
        <p class="caption">Comunicados</p>

        <div class="divider"></div>
        <div id="basic-card" class="section">
            <div class="row">


                <?php
                $userid = $_SESSION['usuario'];
                $buscar = "SELECT comunicadoestado.*, comunicado.* FROM comunicadoestado 
LEFT JOIN comunicado on comunicadoestado.ComunicadoEstadoIdComunicado=comunicado.ComunicadoId
WHERE comunicadoestado.ComunicadoEstadoPadre='$userid'";
                $resultado = $conexion->query($buscar);
                while ($fila = $resultado->fetch_assoc()) {
                    ?>
                    <div class="col s6 m4 l4">
                        <div class="card  purple lighten-4">
                            <div class="card-content white-text">
                                <span class="card-title">Comunicado N° <?php echo $fila['ComunicadoEstadoIdComunicado'] ?></span>
                                <p><?php echo $fila['ComunicadoDescripcion'] ?></p>
                            </div>

                        </div>
                    </div>

                    <?php
                }
                ?>


            </div>
        </div>

    <?php } ?>


    <?php
}
?>
