
<aside class="main-sidebar">
    <section style="height: auto;" class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="Image">
            </div>
            <div class="pull-left info">
                <p>{$smarty.session['email']}</p>
            </div>
        </div>
        <br>
        <ul class="sidebar-menu">
            <li class="header">Control</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Catalogos</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="index.php?ruta=marcas"><i class="fa fa-circle-o"></i> Marcas</a></li>
                    <li class="active"><a href="index.php?ruta=todosproductos"><i class="fa fa-circle-o"></i> Productos</a></li>
                    <li class="active"><a href="index.php?ruta=proveedores"><i class="fa fa-circle-o"></i> Proveedores</a></li>
                </ul>
            </li>
            {if in_array('administrar_todo',$smarty.session['privilegios'])}
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Control de usuario</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="index.php?ruta=usuarios"><i class="fa fa-circle-o"></i>Usuarios</a></li>
                        <li><a href="index.php?ruta=roles"><i class="fa fa-circle-o"></i> Roles</a></li>
                    </ul>
                </li>
            {/if}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>