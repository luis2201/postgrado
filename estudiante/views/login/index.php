<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="Sitio" content="Sitio web oficial del Postgrado ITSUP" />
        <meta name="author" content="ITSUP 2024" />
        <!-- Título de la Página -->
        <title>Login - Postgrado ITSUP</title>
        <!-- FontAwesome -->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- JQueryConfirm CSS -->
        <link href="<?php echo LOCAL; ?>public/jquery-confirm/dist/jquery-confirm.min.css" rel="stylesheet">
        <!-- Estilos del Sitio -->
        <link href="<?php echo LOCAL; ?>public/css/styles.css" rel="stylesheet" />
    </head>
    <body style="background-color:#c69c4e;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <?php //echo Main::encryption(''); ?>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header img-responsive"><img src="<?php echo LOCAL; ?>public/img/logo.png" style="width:100%" alt="postgrado-itsup"></div>
                                    <div class="card-body">
                                        <form class="needs-validation" action="<?php echo DIR; ?>login/validate" method="post" data-action="login" enctype="multipart/form-data" autocomplete="off" novalidate>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="NumeroIdentificacion" name="NumeroIdentificacion" type="text" placeholder="name@example.com" aria-describedby="inputGroupPrepend" required/>
                                                <label for="NumeroIdentificacion">Número de Identificación</label>
                                                <div class="invalid-feedback">Ingrese número de Identificación</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="Contrasena" name="Contrasena" type="password" placeholder="Password" aria-describedby="inputGroupPrepend" required/>
                                                <label for="Contrasena">Contraseña</label>
                                                <div class="invalid-feedback">Ingrese contraseña</div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary" style="background-color:#c69c4e;border-color:#c69c4e;width:100%;">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; ITSUP 2024</div>
                            <div>
                                <a href="#">Política de Privacidad</a>
                                &middot;
                                <a href="#">Términos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- JQuery 3.7.1 -->
        <script src="<?php echo LOCAL; ?>public/js/jquery.min.js"></script>
        <!-- BootStrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <!-- JQUery JS -->
        <script src="<?php echo LOCAL; ?>public/jquery-confirm/dist/jquery-confirm.min.js"></script>
        <!-- JS del Sitio -->
        <script src="<?php echo LOCAL; ?>public/js/scripts.js?v=1.0.0"></script>
        <script src="<?php echo DIR; ?>functions/main.js?v=1.1.3"></script>
    </body>
</html>
