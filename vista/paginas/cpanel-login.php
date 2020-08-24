

<div class="login-page fondo">
  <div class="login-box">
    <div class="login-logo">
      <img src="https://pngimage.net/wp-content/uploads/2019/05/usuarios-logo-png-4.png" width="200px" alt="">
      <br />
      <a href="#"><b>Admin</b>HNM</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Iniciar Sesión</p>

        <form action="#" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="adminCorreo" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="adminClave" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block" name="btnIngresar"><strong>Iniciar sesión</strong></button>
            </div>
            <!-- /.col -->
          </div>
          <div class="text-center">




            <?php


            $iniciarSesion = new AdministradorControlador();
            $iniciarSesion->ctringresarPanel();
            ?>

          </div>
        </form>


        <!-- /.social-auth-links -->


      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
</div>