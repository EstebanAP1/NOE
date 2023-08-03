<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= media() ?>/images/logo_icon.svg" alt="NOE Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">NOE</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- SidebarSearch Form -->
        <div class="form-inline mt-3 d-flex">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search"
                    name="sidebarSearch">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>" class="nav-link nav-home-link">
                        <i class="nav-icon fas fa-house"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item nav-equipos-item">
                    <a href="#" class="nav-link nav-equipos-link">
                        <i class="nav-icon fas fa-microchip"></i>
                        <p>
                            Equipos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>/computadores" class="nav-link nav-computadores-link">
                                <i class=" nav-icon fas fa-desktop"></i>
                                <p>Computadores</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>/mantenimientos" class="nav-link nav-mantenimientos-link">
                                <i class="nav-icon fas fa-gear"></i>
                                <p>Mantenimientos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>/funcionarios" class="nav-link nav-funcionarios-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>Funcionarios</p>
                    </a>
                </li>
                <li class="nav-item nav-administracion-item">
                    <a href="#" class="nav-link nav-administracion-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Administración
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>/usuarios" class="nav-link nav-usuarios-link">
                                <i class=" nav-icon fas fa-user"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>/roles" class="nav-link nav-roles-link">
                                <i class="nav-icon fas fa-user-tag"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>