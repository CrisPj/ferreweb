{include file="admin/head.tpl"}
<body>
<div class="wrapper">
    <header class="main-header">
        <a href="index.php?ruta=admin" class="logo">
            <span class="logo-mini"><b>Ferre</b>Web</span>
            <span class="logo-lg"><b>Ferre</b>Web</span>
        </a>

        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a aria-expanded="false" href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">Usuario</span>
                        </a>
                        <ul class="dropdown-menu">

                            <li class="user-footer">
                                <a href="index.php?ruta=datosEmpleado" class="">Mis datos</a>
                                <a href="index.php?ruta=cambia" class="">Cambiar Contraseña</a>
                                <a href="index.php?ruta=logout" class="">Salir</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <div style="min-height: 916px;" class="content-wrapper">
    {if isset($sucess)}
        <div class="alert alert-success" role="alert">{$sucess}</div>
    {elseif isset($info)}
        <div class="alert alert-info" role="alert">{$info}</div>
    {elseif isset($warning)}
        <div class="alert alert-warning" role="alert">{$warning}</div>
    {elseif isset($danger)}
        <div class="alert alert-danger" role="alert">{$danger}</div>
    {/if}



