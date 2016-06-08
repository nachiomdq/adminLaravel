
<nav id="sidebar">
    <!-- Sidebar Scroll Container -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
        <div class="sidebar-content">
            <!-- Side Header -->
            <div class="side-header side-content bg-white-op">
                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times"></i>
                </button>

                <a class="h5 text-white" href="index.html">
                    <i class="fa fa-circle-o-notch text-primary"></i> <span class="h4 font-w600 sidebar-mini-hide">Admin</span>
                </a>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="side-content">
                <ul class="nav-main">
                    <li>
                        <a href="index.html"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Menú</span></li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-layers"></i><span class="sidebar-mini-hide">Productos</span></a>
                        <ul>
                            <li>
                                <a href="{{url('products/list')}}">Listado</a>
                            </li>

                            <li>
                                <a href="{{url('products/new')}}">Crear nuevo</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-list"></i><span class="sidebar-mini-hide">Categorías</span></a>
                        <ul>
                            <li>
                                <a href="{{url('categories/list')}}">Listado de categorías</a>
                            </li>

                            <li>
                                <a href="{{url('categories/new')}}">Crear nueva categoría</a>
                            </li>
                            <li>
                                <a href="{{url('subcategories/list')}}">Listado de subcategorías</a>
                            </li>

                            <li>
                                <a href="{{url('subcategories/new')}}">Crear nueva subcategorías</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-newspaper-o"></i><span class="sidebar-mini-hide">Noticias</span></a>
                        <ul>
                            <li>
                                <a href="{{url('news/list')}}">Listado</a>
                            </li>

                            <li>
                                <a href="{{url('news/new')}}">Crear nueva</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-pointer"></i><span class="sidebar-mini-hide">Países</span></a>
                        <ul>
                            <li>
                                <a href="{{url('countries/list')}}">Listado</a>
                            </li>

                            <li>
                                <a href="{{url('countries/new')}}">Crear nuevo</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-envelope"></i><span class="sidebar-mini-hide">Contactos</span></a>
                        <ul>
                            <li>
                                <a href="{{url('contacts/list')}}">Listado</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-book-open"></i><span class="sidebar-mini-hide">Secciones</span></a>
                        <ul>
                            <li>
                                <a href="{{url('sections/list')}}">Listado</a>
                            </li>

                            <li>
                                <a href="{{url('sections/new')}}">Crear nueva</a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-hide">Apps</span></li>
                    <li>
                        <a href="frontend_home.html"><i class="si si-rocket"></i><span class="sidebar-mini-hide">Frontend</span></a>
                    </li>
                </ul>
            </div>
            <!-- END Side Content -->
        </div>
        <!-- Sidebar Content -->
    </div>
    <!-- END Sidebar Scroll Container -->
</nav>
<!-- END Sidebar -->
