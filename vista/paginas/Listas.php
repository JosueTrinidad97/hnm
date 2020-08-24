<div class="container">

    <div class="row">
        <div class="col-md-6 col-12">
            <form action="" method="post">

                <div class="row">
                    <div class="form-group col-8">
                        <label for="idAsistente">Id Asistente</label>
                        <input id="idAsistente" class="form-control" type="text" placeholder="Escanea el idAsistente" autofocus name="idAsistente">
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary float-right" name="btnListaAgregarPresente">Registrar</button>
                        </div>

                    </div>

                    <div class="col-4 mb-5">
                        <br>
                        <button type="button" class="btn btn-warning mt-2" data-toggle="modal" data-target="#mdlBuscarAsistente">Buscar asistente</button>
                    </div>


                </div>






                <?php $listaAgregarAsistentes = new AsistenteControlador();
                $listaAgregarAsistentes->ctrAgregarListaPresentes();
                ?>
            </form>
        </div>

        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-light tablas">
                    <thead>
                        <td>Id Asistente</td>
                        <td>Nombre</td>
                        <td>Fecha</td>
                        <td>Tema</td>
                        <td>Acciones</td>
                    </thead>
                    <tbody>

                        <?php $listarPresentes = AsistenteModelo::mdlListarAsistentes();

                        foreach ($listarPresentes as $key => $value) :

                        ?>

                            <tr>

                                <td><?php echo $value['idAsistente']  ?></td>
                                <td><?php echo $value['nombre']  ?></td>
                                <td><?php echo $value['fecha']  ?></td>
                                <td><?php echo $value['tema'] ?></td>
                                <td>
                                <a class="btn btn-warning" href="http://localhost/HNM%20avance5/lib/reportes/pagos/constancia.php?idAsistente=<?php echo $value['idAsistente'] ?>" target="_blank"><i class="fas fa-file-pdf"></i></a>
                                    <button class="btn btn-danger btnEliminarListaAsistente" idAsistente="<?php echo $value['idAsistente'] ?>"><i class="fas fa-trash"></i></button>
                                    <button class="btn btn-success btnEliminarListaAsistente" idAsistente="<?php echo $value['idAsistente'] ?>"><i class="nav-icon fas fa-mail-bulk"></i></button>
                                   
                                </td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <td>Id Asistente</td>
                        <td>Nombre</td>
                        <td>Tema</td>
                        <td>Fecha</td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>






<div class="modal fade" id="mdlBuscarAsistente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buscar asistente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-light tablas">
                        <thead>
                            <th>Id asistente</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Agregar</th>
                        </thead>
                        <tbody>
                            <?php
                            $listAsistente = AsistenteModelo::mdlObtenerAsistentesTodos();
                            foreach ($listAsistente as $key => $value) :
                            ?>
                                <tr>

                                    <td><?php echo $value['idAsistente'] ?></td>
                                    <td><?php echo $value['nombre'] ?></td>
                                    <td><?php echo $value['correo'] ?></td>
                                    <td><button class="btn btn-primary btnListaAgregarPresente" idAsistente= "<?php echo $value['idAsistente'] ?>" ><i class="fas fa-plus"></i></button></td>


                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                    
                </div>
                

            </div>
            

        </div>
    </div>
</div>
<div class="">
                  <button class="btn btn-primary">Enviar correo <i class="nav-icon fas fa-mail-bulk"></i></button>
  </div>
