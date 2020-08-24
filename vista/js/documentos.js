$("#seleccionDocumento").on("change", function () {

    var tipoD = $(this).val();

    if (tipoD == "R") {
        window.location.href = "documentos-Reconocimiento"
        
    } else {
        window.location.href = "documentos-Constancia"
        
    }

})