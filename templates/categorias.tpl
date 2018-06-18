{include file="header.tpl"}
<ol class="breadcrumb">
    <li><a href="#">Productos</a></li>
    <li class="active">Categoria</li>
</ol>

<div class="container">
    <div class="row">
        {foreach $datos as $dato}
            <div class="col-md-3">
                <div class="panel panel-default">
                    <a href="index.php?ruta=productos&categoria={$dato['categoria']}">
                        <div class="panel-body">
                            <img height="180" style="width: 210px;" src="{$dato['imagen']}" alt="">
                        </div>
                        <div class="panel-footer">{$dato['categoria']}</div>
                    </a>
                </div>
            </div>
        {/foreach}
    </div>
</div>

{include file="footer.tpl"}