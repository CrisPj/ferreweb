{include file="header.tpl"}
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Mis datos</h3>
                    </div>
                    <div class="panel-body">
                        <h5>Nombre: </h5><span>{$datos['nombre']}</span>
                        <h5>Apellido Paterno: </h5><span>{$datos['apaterno']}</span>
                        <h5>Apellido Materno: </h5><span>{$datos['amaterno']}</span>
                        <h5>Fecha de Nacimiento:</h5> <span>{$datos['nacimiento']}</span>
                        <h5>Foto: </h5> <img src="{$datos['foto']}" alt="">
                    </div>
                    <hr>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cambiar Mis datos</h3>
                    </div>
                    <div class="panel-body">

                        <form role="form" class="form" action="index.php?ruta=cambiarDatos" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input class="form-control" placeholder="Nombre" name="nombre" type="text" value="{$datos['nombre']}" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="apaterno">Apellido Paterno</label>
                                    <input class="form-control" placeholder="Apellido Paterno" name="apaterno" type="text" value="{$datos['apaterno']}">
                                </div>
                                <div class="form-group">
                                    <label for="amaterno">Apellido Materno</label>
                                    <input class="form-control" placeholder="Apellido Materno" name="amaterno" type="text" value="{$datos['amaterno']}">
                                </div>
                                <div class="form-group">
                                    <label for="nacimiento">Fecha de Nacimiento: </label>
                                    <input class="form-control" placeholder="Fecha de Nacimiento" name="nacimiento" type="date" value="{$datos['nacimiento']}">
                                </div>
                                <div class="row">
                                    <div class="col-xs-9" id="result">
                                        <label for="foto">Foto: </label>
                                        <input  class="form-control" placeholder="Foto" name="foto" type="text" value="{$datos['foto']}">
                                    </div>
                                    <div class="col-xs-3">
                                        <a class="btn btn-info" href="javascript:Webcam.attach( '#my_camera' );">Nueva Foto</a>
                                        <a class="btn btn-default " href="javascript:void(take_snapshot())">Tomar Foto</a>
                                    </div>

                                </div>
                                <div class="row">
                                    <div id="my_camera" style="width:320px; height:240px;" class="col-xs-4 col-xs-offset-1"></div>
                                    <div id="resulti" style="width:320px; height:240px;" class="col-xs-4 col-xs-offset-1"></div>
                                </div>
                                <script type="text/javascript" src="js/webcamjs.min.js"></script>
                                <script language="JavaScript">
                                    function take_snapshot() {
                                        Webcam.snap( function(data_uri) {
                                            document.getElementById('result').innerHTML = '<input  class="form-control" placeholder="Foto" name="foto" type="text" value="'+data_uri+'"/>';
                                            document.getElementById('resulti').innerHTML = '<img  src="'+data_uri+'"/>';
                                        } );
                                    }
                                </script>
                                <input href="index.html" class="btn btn-lg btn-success btn-block" value="Cambiar" type="submit"/>
                            </fieldset>
                        </form>
                    </div>
                </div>

        </div>
    </div>
</div>
<hr>

{include file="admin/footer.tpl"}
