<?php


$detalleEvento = EventoModelo::mdlConsultarEvento($rutas[1]);

//echo "<pre>", print_r($detalleEvento), "</pre>";


$detallePonente = PonenteModelo::mldConsultarPonenteEvento($detalleEvento['idEventos']);

//echo "<pre>", print_r($detallePonente), "</pre>";

?>

<style>
    .img_portada {
        border: 4px solid #C82F9F;
        border-radius: 100%;
        padding: 15px;
        background-color: #fff;
        margin-top: -90px;

    }

    .box-tema{
        width: 500px;
        border: 2px dashed #8B2473;
      
    }

    @media (max-width:767px) {

        .img_portada {
            margin-top: -370px;
            width: 150px;
            height: 150px;
        }

    }
</style>
<body style="background-color:#E9EBEE ;">


    


<div class="row justify-content-center">

    <div class="col-auto mt-5">
        <img src="<?php echo $url ?>vista/img/plantilla/hnm_colores.png" width="200px" alt="">



       

    </div>

</div>
<div class="row justify-content-center">

    <div class="col-auto mt-5">
      



        <h4 class="text-center mt-4 box-tema">
            <?php echo strtoupper($detalleEvento['tema']); ?>
        </h4>

    </div>

</div>


<div class="container mt-5">


    <div class="row">
        <div class="col-md-4 col-12">
            <div class="card">
                <h5 class="card-header">Ponentes</h5>
                <div class="card-body">


                    <?php

                    foreach ($detallePonente as $key => $ponente) {
                        echo "<p>Nombre: <strong> " . $ponente['gradoEstudios'] . " " .  $ponente['nombre'] . "</strong> </p>";
                        echo "<p>Tema: <strong> " . $ponente['tema'] . "</strong> </p>";
                        echo "<p>Descripción: <strong> " . $ponente['descripcion'] . "</strong> </p> <hr>";
                    }


                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            

        </div>
        <div class="col-md-4 col-12">
        <div class="card">
                <h5 class="card-header">Detalle del evento</h5>
                <div class="card-body">


                    <?php

                
                        echo "<p>Fecha de inicio: <strong> " . $detalleEvento['fecha'] . "</strong> </p>";
                        echo "<p>Ubicación: <strong> " . $detalleEvento['ubicacion'] . "</strong> </p>";
                        echo "<p>Descripción: <strong> " . $detalleEvento['descripcion'] . "</strong> </p>";
                        echo "<p>Capacidad: <strong> " . $detalleEvento['capacidad'] . "</strong> </p>";

                    


                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
</body>