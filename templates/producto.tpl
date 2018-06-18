{include file="header.tpl"}
<ol class="breadcrumb">
    <li><a href="#">Productos</a></li>
    <li><a href="#">Categoria</a></li>
    <li class="active">{$datos['nombre']}({$datos['marca']})</li>
</ol>

<div class="container">
    <h3 class="h3 text-center">{$datos['nombre']}({$datos['marca']})</h3>
    <div class="row">

        <div class="col-md-8">
            {$datos['descripcion']}
        </div>
        <div class="col-md-4">
            <img src="{$datos['foto']}" alt="">
            <p> Precio: ${$datos['precio']}</p>
            <form method="post" action="index.php?ruta=agregarProducto&id={$datos['id_producto']}">
                <div class="form-group">
                    <input class="form-control" name="cantidad" type="number" placeholder="cantidad">
                    <input href="" type="submit" class="btn btn-default" value="Agregar al carrito">
                </div>

            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p>Calificacion</p>
            <input id="input-id" type="text" class="rating" data-size="lg" value="{$datos['calificacion']}" >
        </div>

        <div class="col-md-12">
            <p>Comentarios</p>
            {foreach $comentarios as $comentario}
                <div class="well">
                    <img src="{$comentario['foto']}" alt="">
                    <p>{$comentario['nombre']}</p>
                    <p>{$comentario['comentario']}</p>
                </div>

            {/foreach}
        </div>

    </div>

</div>
{include file="footer.tpl"}