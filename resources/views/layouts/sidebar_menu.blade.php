<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Menú principal</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-home"></i> Pedidos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('pedidos')}}">Marketplace</a></li>
                    <li><a href="{{ url('pedidos-especiales')}}">Especiales</a></li>
                </ul>
            </li>
            <li><a href="{{ url('productos') }}"><i class="fa fa-home"></i> Productos <span class=""></span></a>
            </li>
            <li><a href="{{ url('usuarios')}}"><i class="fa fa-desktop"></i>Usuarios<span class=""></span></a>
        </ul>
    </div>
</div>