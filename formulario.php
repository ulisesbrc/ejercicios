<?php
include("config/config.php");
?>
<!doctype html>
<html lang="es">
    <head>
        <title>Naiades - Ejercicio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
        <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
        <link rel="stylesheet" href="assets/stylesheets/bootstrap.min.css" />
        <script src="assets/javascripts/modernizr.min.js"></script>
    </head>
    <body>
        <div class="container">
            <section>
                <h1 class="text-center" style="background:#000;padding:20px;">
                    <img src="assets/images/logo.png" alt="Naiades" />
                </h1>
                <form id="formulario" method="post" action="ax/formulario.php">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="nombre" class="control-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" value="" maxlength="100" id="nombre">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="apellido" class="control-label">Apellido</label>
                            <input type="text" class="form-control" name="apellido" value="" maxlength="100" id="apellido">
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="apellido" class="control-label">Fecha</label>
                            <input type="date" class="form-control" name="fecha" value="" id="fecha">
                        </div>
                        <div class="form-group col-sm-12">
                            <button  name="btnEnviar" type="submit" class="btn btn-success btn-lg btn-submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
        <script src="assets/javascripts/jquery.min.js"></script>
        <script src="assets/javascripts/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
    $("#formulario").bind("submit",function(){
        // Capturamnos el boton de envío
        if($("#nombre").val()=='' || $("#apellido").val()=='' ){
            alert('Complete los datos')
            return false;
        }
        var btnEnviar = $("#btnEnviar");
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data:$(this).serialize(),
            beforeSend: function(){
            
                /*
                * Esta función se ejecuta durante el envió de la petición al
                * servidor.
                * */
                // btnEnviar.text("Enviando"); Para button 
                btnEnviar.val("Enviando"); // Para input de tipo button
                btnEnviar.attr("disabled","disabled");
            },
            complete:function(data){
                /*
                * Se ejecuta al termino de la petición
                * */
                btnEnviar.val("Enviar formulario");
                btnEnviar.removeAttr("disabled");
            },
            success: function(data){
                /*
                * Se ejecuta cuando termina la petición y esta ha sido
                * correcta
                * */
                location.href = 'vista.php';
            },
            error: function(data){
                /*
                * Se ejecuta si la peticón ha sido erronea
                * */
                alert("Problemas al tratar de enviar el formulario");
            }
        });
        // Nos permite cancelar el envio del formulario
        return false;
    });
});
        </script>
    </body>
</html>
