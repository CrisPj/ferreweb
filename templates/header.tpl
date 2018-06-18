{include file="head.tpl"}
<body>
<div class="container" id="contenido">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php?ruta=index" class="pull-left"><img src="img/header.png" alt=""></a>
                <a class="navbar-brand" href="index.php?ruta=index"> FerreWEB</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catalogos<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?ruta=marcas">Marcas
                            <span class="sr-only">(current)</span></a></li>
                    <li><a href="index.php?ruta=categorias">Productos</a>
                    </li>
                    <li ><a href="index.php?ruta=proveedores">Proveedores</a>
                    </li>
                                </ul>
                </li>

                </ul>
                <form class="navbar-form navbar-right" action="index.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="buscar" placeholder="Buscar Productos">
                    </div>
                    <button type="submit" class="btn btn-default">Buscar</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    {if isset($smarty.session['roles'])}
                        {if in_array('Cliente',$smarty.session['roles'])}
                            <li><a href="index.php?ruta=carrito"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    (0) </a></li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{$smarty.session['email']} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?ruta=datosCliente"><i class="fa fa-wrench" aria-hidden="true"></i>Mis datos</a></li>
                                    <li><a href="index.php?ruta=compras"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                            Mis compras</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="index.php?ruta=logout"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                            Salir</a></li>
                                </ul>
                            </li>
                        {/if}
                    {else}

                    <li>
                        <a href="index.php?ruta=login">Login</a>
                    </li>
                        <li>
                            <a href="index.php?ruta=nueva">Registrarse</a>
                        </li>
                    {/if}
                </ul>
            </div>
        </div>
    </nav>
    {if isset($sucess)}
        <div class="alert alert-success" role="alert">{$sucess}</div>
    {elseif isset($info)}
        <div class="alert alert-info" role="alert">{$info}</div>
    {elseif isset($warning)}
        <div class="alert alert-warning" role="alert">{$warning}</div>
    {elseif isset($danger)}
        <div class="alert alert-danger" role="alert">{$danger}</div>
    {/if}