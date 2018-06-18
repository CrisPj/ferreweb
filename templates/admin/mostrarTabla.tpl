{include file="admin/header.tpl"}
{include file="admin/aside.tpl"}
    <!-- Content Header (Page header) -->
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
                    <div class="box-header with-border">
                        <h3 class="box-title">{if $tipo == "marcas" }Marcas
                            {elseif $tipo == "productos"}Productos
                            {elseif $tipo == "proveedores"}Proveedores
                            {elseif $tipo == "usuarios"}Usuarios
                            {elseif $tipo == "roles"}Roles
                            {elseif $tipo == "rolUsuario"}Roles del Usuario
                            {elseif $tipo == "privilegios"}Privilegios
                            {elseif $tipo == "carrito"}Carrito
                            {/if}</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-responsive ">
                                    <thead>
                                    <tr>
                                        {foreach $nombrecolumnas as $titulo}
                                            <th>{$titulo}</th>
                                        {/foreach}
                                        <th >Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {section name=registro loop=$datos}
                                        <tr>
                                            {foreach from=$datos[registro] item=dato key=name}
                                                {if $name eq "foto" or $name eq "imagen"}
                                                    <td><img src="{$dato}" alt=""></td>
                                                {else}
                                                    <td>{$dato}</td>
                                                {/if}
                                            {/foreach}
                                            <td>
                                                {if $tipo != "rolUsuario" && $tipo!="privilegios"}
                                                    <a class="btn btn-info"
                                                                    {if $tipo == "marcas" }
                                                                {if in_array('actualizar_marca', $smarty.session['privilegios']) || in_array('administrar_todo', $smarty.session['privilegios'])}
                                                                    href="index.php?ruta=actualizar&id={$datos[registro]['id_marca']}&que=marca"
                                                                {/if}
                                                                    {elseif $tipo == "productos"}
                                                                {if in_array('actualizar_producto', $smarty.session['privilegios']) || in_array('administrar_todo', $smarty.session['privilegios'])}
                                                                    href="index.php?ruta=actualizar&id={$datos[registro]['id_producto']}&que=producto"
                                                                {/if}
                                                                    {elseif $tipo == "proveedores"}
                                                                {if in_array('actualizar_proveedor', $smarty.session['privilegios']) || in_array('administrar_todo', $smarty.session['privilegios'])}
                                                                    href="index.php?ruta=actualizar&id={$datos[registro]['id_proveedor']}&que=proveedor"
                                                                {/if}
                                                                    {elseif $tipo == "usuarios"}
                                                                {if in_array('administrar_todo', $smarty.session['privilegios'])}
                                                                    href="index.php?ruta=actualizar&id={$datos[registro]['id_usuario']}&que=usuario"
                                                                {/if}
                                                            {elseif $tipo == "roles"}
                                                        {if in_array('administrar_todo', $smarty.session['privilegios'])}
                                                            href="index.php?ruta=privilegios&id={$datos[registro]['id_rol']}&que=rol"
                                                        {/if}
                                                                    {/if}><i class="fa fa-pencil-square-o"></i> Editar</a>
                                                {/if}
                                                            {if $tipo == "usuarios"}
                                                                <a class="btn btn-warning" href="index.php?ruta=rolusuario&id={$datos[registro]['id_usuario']}"><i class="fa fa-users"></i> Roles</a>
                                                            {/if}
                                                            <a class="btn btn-danger"
                                                                    {if $tipo == "marcas" }
                                                                {if in_array('borrar_marca', $smarty.session['privilegios']) || in_array('administrar_todo', $smarty.session['privilegios'])}
                                                                    href="index.php?ruta=eliminar&id={$datos[registro]['id_marca']}&que=marca"
                                                                {/if}
                                                                    {elseif $tipo == "productos"}
                                                                {if in_array('borrar_producto', $smarty.session['privilegios']) || in_array('administrar_todo', $smarty.session['privilegios'])}
                                                                    href="index.php?ruta=eliminar&id={$datos[registro]['id_producto']}&que=producto"
                                                                {/if}
                                                                    {elseif $tipo == "proveedores"}
                                                                {if in_array('borrar_proveedor', $smarty.session['privilegios']) || in_array('administrar_todo', $smarty.session['privilegios'])}
                                                                    href="index.php?ruta=eliminar&id={$datos[registro]['id_proveedor']}&que=proveedor"
                                                                {/if}
                                                                    {elseif $tipo == "usuarios"}
                                                                {if in_array('administrar_todo', $smarty.session['privilegios'])}
                                                                    href="index.php?ruta=eliminar&id={$datos[registro]['id_usuario']}&que=usuario"
                                                                {/if}
                                                                    {elseif $tipo == "rolUsuario"}
                                                                {if in_array('administrar_todo', $smarty.session['privilegios'])}
                                                                    href="index.php?ruta=eliminar&id={$datos[registro]['id_rol']}&user={$campos['id']}&que=rolusuario"
                                                                {/if}
                                                                    {elseif $tipo == "privilegios"}
                                                                {if in_array('administrar_todo', $smarty.session['privilegios'])}
                                                                    href="index.php?ruta=eliminar&id={$datos[registro]['id_privilegio']}&privilegio={$campos['id']}&que=privilegio"
                                                                {/if}
                                                                    {/if}><i class="fa fa-trash"></i> Borrar</a>

                                                    </td>

                                        </tr>
                                    {/section}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {if isset($nombForm)}
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">
                                {$nombForm}
                            </h3>
                        </div>
                        <div class="box-body">
                            <form class="form" action="index.php?ruta=guardar" method='post' enctype='multipart/form-data' accept-charset='utf-8'>
                                <fieldset>
                                    {if isset($campos)}
                                        {foreach from=$campos item=valor key=nombre}
                                            {if $nombre eq "precio"}
                                                <label>{$valor}</label>
                                                <input name={$nombre} type="number" min="0" class="form-control" placeholder={$valor}>
                                            {elseif $nombre eq "pass"}
                                                <label>{$valor}</label>
                                                <input name={$nombre} type="password" min="0" class="form-control" placeholder={$valor}>
                                            {elseif $nombre eq "id"}
                                                <input name={$nombre} value="{$valor}" type="number" min="0" class="form-control hidden" placeholder={$valor}>
                                            {else}
                                                <label>{$valor}</label>
                                                <input name={$nombre} type="text" class="form-control" placeholder={$valor}>
                                            {/if}
                                        {/foreach}
                                    {/if}

                                    {if isset($combos)}
                                        <label for="{$select}">{$nomb}</label>
                                        <select class="form-control" name="{$select}">
                                            {foreach from=$combos key=num item=valor}
                                                <option value="{$num}">{$valor}</option>
                                            {/foreach}
                                        </select>
                                    {/if}
                                    <br />
                                    <button class="btn btn-success">Agregar</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            {/if}
        </div>
</div>

{include file="admin/footer.tpl"}