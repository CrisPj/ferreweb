{include file="header.tpl"}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Mis compras
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-responsive ">
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
                                    </tr>
                                {/section}
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
{include file="footer.tpl"}