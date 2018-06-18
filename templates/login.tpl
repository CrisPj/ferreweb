{include file="header.tpl"}
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Ingresar al sistema</h2>
                </div>
                <div class="panel-body">
                    <form role="form" action="index.php?ruta=logeo" method="post">
                        <fieldset>
                            <div class="form-group">
                                <label for="email">Cuenta de correo</label>
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <input href="index.html" class="btn btn-lg btn-success btn-block" value="Login" type="submit"/>
                        </fieldset>
                    </form>
                </div>
                <div class="panel-footer">
                    <p class="text-center">¿Problemas para entrar?
                        <a href="index.php?ruta=recuperarPassword">Recuperar Password</a>
                    </p>
                    <p class="text-center">¿Nuevo en Ferreweb? <a href="index.php?ruta=nueva">Crea una cuenta</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
{include file="footer.tpl"}
