<div class="form-group col-4">
    <label for="my-select">Seleccionar Tipo de Doumento</label>
    <select id="seleccionDocumento" class="form-control" name="seleccionDocumento">
        <option value="">⏬</option>
        <option value="R">Reconocimiento</option>
        <option value="C">Constancia</option>
    </select>

</div>


<div class="row">
    <div class="col-md-8 col-12">
        <iframe src="http://localhost/HNM%20avance5/lib/reportes/pagos/constancia_conf.php" width="100%" height="700" frameborder="0"></iframe>

    </div>
    <?php

    $documento = DocumentoModelo::mdlObtnerTipoDocumento('CONSTANCIA');
    //var_dump($documento);
    ?>
    <div class="col-md-4 col-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="my-input">Titulo</label>
                <input id="my-input" class="form-control" type="text" value="<?php echo $documento['titulo'] ?>" name="titulo">
                <input type="hidden" value="CONSTANCIA" name="tipo">

            </div>
            <div class="form-group">
                <label for="my-input">Conector/Sujeto</label>
                <input id="my-input" class="form-control" type="text" value="<?php echo $documento['sujeto'] ?>" name="sujeto">

            </div>
            <div class="form-group">
                <label for="my-input">Descripción</label>
                <input id="my-input" class="form-control" type="text" value="<?php echo $documento['descripcion'] ?>" name="descripcion">

            </div>

            <div class="form-group">
                <label for="my-input">Frase</label>
                <input id="my-input" class="form-control" type="text" value="<?php echo $documento['frase'] ?>" name="frase">

            </div>
            <div class="form-group mt-5">
                <div class="alert alert-dark" role="alert">

                    <div class="form-group">
                        Firma 1 <br>
                        <label for="nombref1">Nombre</label>
                        <input id="nombref1" class="form-control" type="text" name="nombref1">

                    </div>
                    <div class="form-group">

                        <label for="puestof1">Pesto 1</label>
                        <input id="puestof1" class="form-control" type="text" name="puestof1">

                    </div>
                    <div class="form-group">

                        <label for="institucionf1">Institucion 1</label>
                        <input id="institucionf1" class="form-control" type="text" name="institucionf1">

                    </div>
                    <input type="file" name="firma-img-1" id="firma-img-1"> <br>

                    <div class="form-group">
                        Firma 2 <br>
                        <label for="nombref2">Nombre</label>
                        <input id="nombref2" class="form-control" type="text" name="nombref2">
                    </div>
                    <div class="form-group">

                        <label for="puestof2">Pesto 2</label>
                        <input id="puestof2" class="form-control" type="text" name="puestof2">

                    </div>
                    <div class="form-group">

                        <label for="institucionf2">Institucion 2</label>
                        <input id="institucionf2" class="form-control" type="text" name="institucionf2">

                    </div>
                    <input type="file" name="firma-img-2" id="firma-img-2"> <br>

                    <div class="form-group">
                        Firma 3 <br>
                        <label for="nombref3">Nombre</label>
                        <input id="nombref3" class="form-control" type="text" name="nombref3">
                    </div>
                    <div class="form-group">

                        <label for="puestof3">Pesto 3</label>
                        <input id="puestof3" class="form-control" type="text" name="puestof3">

                    </div>
                    <div class="form-group">

                        <label for="institucionf3">Institucion 3</label>
                        <input id="institucionf3" class="form-control" type="text" name="institucionf3">

                    </div>
                    <input type="file" name="firma-img-3" id="firma-img-3"> <br>




                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right mb-5" name='btnActualizarDocumento'>Guardar</button>

            </div>


            <?php $editarDocumento = new DocumentoControlador();
            $editarDocumento->ctrEditarDocumento();
            ?>
        </form>
    </div>
</div>