<?php  require_once("MenuSuperior.php")  ?>

<div class="container">

    <!-- Fila Exterior -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5 ">
                <div class="card-body p-0">
                    <!-- Fila anidada dentro del cuerpo de la tarjeta -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h1 text-gray-900 mb-4">BIENVENIDO !</h1>
                                    <br>
                                </div>
                                <form class="user" action="<?php print RUTA; ?>InicioControlador/VerificaLogin/" method="POST">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Digita tu Correo Electronico..">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Digita tu Contraseña">
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <!-- <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div> -->
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Iniciar Sesion">
                                    <hr>
                                    <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a> -->
                                    <a href="index.html" class="btn btn-success btn-user btn-block">
                                        Contactar Un Asesor
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Olvidaste tu contraseña?</a>
                                </div>
                                
                                <!-- <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


<?php  require_once("FooterInferior.php")  ?>