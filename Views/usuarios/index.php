<?php
require_once('../../Config/sesiones.php');
if (isset($_SESSION['Usuario_IdRoles'])) {
?>
    <!doctype html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="es"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="es"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9" lang="es"> <![endif]-->
    <!--[if gt IE 8]><!-->
    <html class="no-js" lang="es">
    <!--<![endif]-->

    <head>
        <title>Usuarios</title>
        <?php require_once('../Html/head.php') ?>
    </head>

    <body>
        <!-- Left Panel -->
        <?php require_once('../Html/menu.php') ?>
        <!-- /#left-panel -->
        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            <!-- Header-->
            <?php require_once('../Html/header.php') ?>
            <!-- /#header -->
            <!-- Content -->
            <div class="content">
                <!-- Animated -->
                <div class="animated fadeIn">
                    <!-- Widgets  -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-1">
                                            <i class="pe-7s-cash"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text">$<span class="count">23569</span></div>
                                                <div class="stat-heading">Revenue</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-2">
                                            <i class="pe-7s-cart"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text"><span class="count">3435</span></div>
                                                <div class="stat-heading">Sales</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-3">
                                            <i class="pe-7s-browser"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text"><span class="count">349</span></div>
                                                <div class="stat-heading">Templates</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-4">
                                            <i class="pe-7s-users"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text"><span class="count">2986</span></div>
                                                <div class="stat-heading">Clients</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Widgets -->

                    <div class="clearfix"></div>
                    <!-- Orders -->
                    <div class="content">
                        <div class="animated fadeIn">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="box-title">Usuarios </h4>
                                            <hr>
                                            <button class="btn btn-outline-success" data-toggle='modal' data-target='#modalUsuarios' onclick="cargaCombo()">Nuevo Usuario</button>
                                        </div>
                                        <div class="table-stats order-table ov-h">


                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="serial">#</th>
                                                        <th>Nombre</th>
                                                        <th>Apellido</th>
                                                        <th>Correo</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id='tablaUsuarios'>
                                                    <!--   <tr>
                                                    <td class="serial">1.</td>
                                                    <td class="avatar">
                                                        <div class="round-img">
                                                            <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td> #5469 </td>
                                                    <td>  <span class="name">Louis Stanley</span> </td>
                                                    <td> <span class="product">iMax</span> </td>
                                                    <td><span class="count">231</span></td>
                                                    <td>
                                                        <span class="badge badge-complete">Complete</span>
                                                    </td>
                                                </tr>-->



                                                </tbody>
                                            </table>
                                        </div> <!-- /.table-stats -->
                                    </div>
                                </div> <!-- /.card -->
                            </div> <!-- /.col-lg-8 -->


                        </div>
                    </div>
                    <!-- /.orders -->
                    <!-- To Do and Live Chat -->

                </div>
                <!-- .animated -->
            </div>
            <!-- /.content -->
            <div class="clearfix"></div>
            <!-- Footer -->
            <?php require_once('../Html/footer.php') ?>
            <!-- /.site-footer -->
        </div>
        <!-- /#right-panel -->


        <!-- Ventana Modal -->

        <div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="titulomodal">Insertar Usuario</h5>
                    </div>
                    <form method="post" id="usuarios_form">
                        <div class="modal-body">
                            <input type="hidden" name="Usuarios_Id" id="Usuarios_Id">
                            <div class="form-group">
                                <label class="form-control-label">Nombres</label>
                                <input type="text" name="Usuarios_Nombres" id="Usuarios_Nombres" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Apellidos</label>
                                <input type="text" name="Usuarios_Apellidos" id="Usuarios_Apellidos" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Rol</label>
                                <select name="Usuario_IdRoles" id="Usuario_IdRoles" class="form-control">
                                    <option value="0">Seleccion un Rol</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Correo</label>
                                <input type="text" name="Usuarios_Correo" id="Usuarios_Correo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Contraseña</label>
                                <input type="password" name="Usuarios_Contrasenia" id="Usuarios_Contrasenia" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <?php require_once('../Html/scripts.php'); ?>
        <script src="home.js"></script>
        <script src="usuarios.js"></script>

    </body>

    </html>
<?php
} else {
    header('Location:../../index.php');
}

?>