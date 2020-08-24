
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Cambiar contraseña</th>
    </tr>
  </thead>
  <tbody>
    <?php $usuarios = UsuarioModelo::mdlObtenerUsuarios();

        foreach ($usuarios as  $value) :
     ?>
     <tr>
       <td><?php echo $value['id_usuario']; ?></td>
       <td><?php echo $value['Nombre']; ?></td>
       <td><?php echo $value['correo']; ?></td>
       <td><button class="btn btn-dark btnCambiarPass" data-toggle="modal" email = "<?php echo $value['correo']; ?>" data-target="#exampleModal">Cambiar contraseña</button></td>
     </tr>
  
    <?php endforeach; ?>

  </tbody>
</table>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar Clave</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="POST">
        <div class="modal-body">
          <input type="hidden" required="" readonly="" name="emailUsuario" id="emailUsuario">
          <div class="form-group">
              <label for="">Nueva contraseña</label>
            <input type="password" id="nuevaClave" required="" name="nuevaClave" class="form-control" >
             <label for="">Confirma tu  contraseña</label>
            <input type="password" id="confirmaClave" required=""  name="confirmaClave" class="form-control" >
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="btnRecupera" id="btnRecupera" class="btn btn-primary">Guardar Cambios</button>
        </div>
        <?php 
              $recupera = new AdministradorControlador();
              $recupera -> ctrRecuperaClave();
         ?>
      </form>
    </div>
  </div>
</div>


