{include file="header.tpl"}
<br/>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Recuperar Password</h3>
                </div>

            <div class="panel-body">
                <p>Debes de tener tu bandeja de correos vacia :v</p>
                <form role="form" action="index.php?ruta=mensaje" method="post">
                    <fieldset>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="email">
                        </div>
                        <input class="btn btn-lg btn-success btn-block" value="Recuperar" type="submit"/>
                    </fieldset>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
{include file="footer.tpl"}