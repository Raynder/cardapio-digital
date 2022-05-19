<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('img/developer.jpg') }}" width="100%">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
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

               <li class="nav-item">
                    <a href="{{ route('perfil'); }}" class="nav-link">
                    <i class="fas fa-user"></i>
                    <p>
                        Perfil
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                    <i class="fas fa-solid fa-folder-plus"></i>
                        <p>
                            Grupos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @php
                            $grupos = App\Models\Grupo::all();
                        @endphp
                        @foreach($grupos as $grupo)
                        <li class="nav-item">
                            <a href="{{ route('grupos.show', $grupo->id) }}" class="nav-link {{ Request::is('grupos/'.$grupo->id) ? 'active' : '' }}">
                                <i class="fas fa-folder-open"></i>
                                <p>{{ $grupo->nome }}</p>
                            </a>
                        </li>
                        @endforeach
                        <li class="nav-item">
                            <a href="{{ route('grupos') }}" class="nav-link {{ Request::is('grupos') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Novo grupo</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            teste
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>