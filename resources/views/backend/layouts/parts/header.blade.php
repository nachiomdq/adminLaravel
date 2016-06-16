<header id="header-navbar" class="content-mini content-mini-full">
    <!-- Header Navigation Right -->
    <ul class="nav-header pull-right">
        <li>
            <div class="btn-group">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button">
                    {{Auth::user()->name}}
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">


                    <li class="divider"></li>

                    <li>
                        <a tabindex="-1" href="/logout">
                            <i class="si si-logout pull-right"></i>Cerrar sesión
                        </a>
                    </li>
                </ul>
            </div>
        </li>

    </ul>
    <!-- END Header Navigation Right -->

    <!-- Header Navigation Left -->
    <ul class="nav-header pull-left">
        <li class="hidden-md hidden-lg">
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                <i class="fa fa-navicon"></i>
            </button>
        </li>

    </ul>
    <!-- END Header Navigation Left -->
</header>
