{include file ="header.tpl" tipo=$tipo}
<ol class="breadcrumb">
    <li {if $tipo != "productos"}class="active"{/if}>{$tipo}</li>
    {if $tipo == "productos"}
        <li><a href="index.php?ruta=categorias">Categorias</a></li>
        <li class="active">Todos</li>
    {/if}
</ol>
<div class="container">
    <div class="panel panel-default panel-table">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="panel-title">{if $tipo == "marcas" }Marcas
                        {elseif $tipo == "Categorias"}Productos
                        {elseif $tipo == "proveedores"}Proveedores
                        {/if}</h3>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-bordered table-list table-responsive" style="width: auto; margin-left:auto; margin-right: auto;">
                <thead>
                <tr>
                    {foreach $nombrecolumnas as $titulo}
                        <th>{$titulo}</th>
                    {/foreach}
                </tr>
                </thead>
                <tbody>
                {section name=registro loop=$datos}
                    <tr>
                        {foreach from=$datos[registro] item=dato key=name}
                            {if $name eq "foto"}
                                <td><img src="{$dato}" alt=""></td>
                            {else}
                             <td>{$dato}</td>
                            {/if}
                        {/foreach}
                        {if $tipo eq "productos"}

                                <td><a href="index.php?ruta=producto&id={$datos[registro]['id']}" class="btn btn-default">Detalles</a></td>
                        {/if}
                    </tr>
                {/section}
                </tbody>
            </table>
        </div>
    </div>
    </div>
{include file="footer.tpl"}