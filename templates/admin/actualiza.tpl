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
                    <form class="form" action="index.php?ruta=set" method='post' enctype='multipart/form-data' accept-charset='utf-8'>
                        <fieldset>
                            <legend>{$nombForm}</legend>
                            <input type="text" class="hidden" name="id" value="{$id}">
                            {if isset($campos)}
                                {foreach from=$campos item=valor key=nombre}
                                    {if $nombre eq "precio"}
                                        <label>{$valor}</label>
                                        <input name={$nombre} type="number" value="{$valores[$nombre]}" min="0" class="form-control" placeholder={$valor}>
                                    {elseif $nombre eq "pass"}
                                        <label>{$valor}</label>
                                        <input name={$nombre} type="password" min="0" class="form-control" placeholder={$valor}>
                                    {else}
                                        <label>{$valor}</label>
                                        <input name={$nombre} type="text" value="{$valores[$nombre]}" class="form-control" placeholder={$valor}>
                                    {/if}
                                {/foreach}
                            {/if}

                            {if isset($combos)}
                                <label for="{$select}">{$nomb}</label>
                                <select class="form-control" name="{$select}">
                                    {foreach from=$combos key=num item=valor}
                                        <option value="{$num}" {if $num==$selec}selected{/if}>{$valor}</option>
                                    {/foreach}
                                </select>
                            {/if}
                            <br />
                            <button class="btn btn-success">Actualizar</button>
                        </fieldset>
                    </form>
                </div>

            </div>

        </div>
    </div>
    </section>
</div>
<hr>

{include file="admin/footer.tpl"}