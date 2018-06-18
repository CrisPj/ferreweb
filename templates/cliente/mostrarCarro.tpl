{include file="header.tpl"}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{if $tipo == "carrito"}Carrito
                            {/if}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-responsive ">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        {foreach $nombrecolumnas as $titulo}
                                            <th>{$titulo}</th>
                                        {/foreach}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {section name=registro loop=$datos}
                                        <tr>
                                            <td><a href="index.php?ruta=eliminarCarro&id_producto={$datos[registro]['id_producto']}&id_cliente={$datos[registro]['id_cliente']}&id_carrito={$datos[registro]['id_carrito']}"><i class="fa fa-trash" aria-controls="true"></i></a></td>
                                            {foreach from=$datos[registro] item=dato key=name}
                                                {if $name eq "foto"}
                                                    <td><img src="{$dato}" alt=""></td>
                                                {else}
                                                    <td>{$dato}</td>
                                                {/if}
                                            {/foreach}
                                        </tr>
                                    {/section}
                                    </tbody>
                                </table>
                                <a href="index.php?ruta=comprarCarrito&id_cliente={$id_cliente}" class="btn btn-success">Comprar</a>
                                <a href="index.php?ruta=vaciarCarrito&id_cliente={$id_cliente}" class="btn btn-danger">Vaciar Carro </a>
                            </div>
                            <div class="col-md-2 col-md-offset-6">
                                <p>Total : {$total}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

{include file="footer.tpl"}