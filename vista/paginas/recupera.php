<div class="hold-transition login-page">
  <div class="login-box">
  <div class="login-logo">
    <img src="https://mis.viaticost.com/img/essential/lock.png" width="200px" alt="">
    <b>Recuperar</b>Password
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Para recuperar la contraseña coloque el correo predeterminado y propiedad del Hospital del Niño</p>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="emailUser" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="btnRecupera">Requerir mi nueva contraseña</button>
          </div>
          <!-- /.col -->
        </div>

        <?php 

        $recupera = new AdministradorControlador();
        $recupera -> ctrRecuperaClave();

        ?>

      </form>

     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</div>
