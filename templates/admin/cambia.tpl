{include file="admin/header.tpl"}
{include file="admin/aside.tpl"}
    <section class="content-header">
        <h1>
            Ferreweb
            <small>Version 0.2</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <form role="form" action="index.php?ruta=cambiado" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Viejo Password" name="viejopass" type="password" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nuevo Password" name="nuevoPass" type="password">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Repetir Password" name="repepass" type="password" value="">
                                </div>
                                <input href="index.html" class="btn btn-lg btn-success btn-block" value="Cambiar" type="submit"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<hr>
{include file="footer.tpl"}