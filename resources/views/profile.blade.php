<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>{{ $pageTitle }}</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @vite('resources/sass/app.scss')
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="expand">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="bi bi-menu-button-wide"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="{{route('home')}}" style="text-decoration:none"> SJ_ADMIN</a>
                </div>
            </div>
            <hr class="text-light">
            <ul class="sidebar-nav">
                <li class="sidebar-item my-1" style="border-radius: 50px 0 0 50px;">
                    <a href="{{ route('home')}}" class="sidebar-link py-3"  style="text-decoration:none">
                        <i class="bi bi-speedometer2" title="Dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            
                <li class="sidebar-item my-1" style="border-radius: 50px 0 0 50px;">
                    <a href="#" class="sidebar-link collapsed has-dropdown py-3"  style="text-decoration:none" data-bs-toggle="collapse"
                        data-bs-target="#barang-menu" aria-expanded="false" aria-controls="barang-menu">
                        <i class="bi bi-box-seam-fill" title="Barang"></i>
                        <span>Barang</span>
                    </a>
                    <ul id="barang-menu" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{route('produks.index')}}" class="sidebar-link"  style="text-decoration:none">Daftar Barang</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('produks.create')}}" class="sidebar-link"  style="text-decoration:none">Tambah Barang</a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="sidebar-item my-1" style="border-radius: 50px 0 0 50px;">
                    <a href="#" class="sidebar-link collapsed has-dropdown py-3"  style="text-decoration:none" data-bs-toggle="collapse"
                        data-bs-target="#manage" aria-expanded="false" aria-controls="manage">
                        <i class="bi bi-kanban" title="Manajemen"></i>
                        <span>Manajemen</span>
                    </a>
                    <ul id="manage" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link"  style="text-decoration:none">Kasir</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link"  style="text-decoration:none">Stok Barang</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link"  style="text-decoration:none">Penjualan</a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="sidebar-item my-1 active" style="border-radius: 50px 0 0 50px;">
                    <a href="#" class="sidebar-link py-3"  style="text-decoration:none">
                        <i class="bi bi-person-circle" title="Profil"></i>
                        <span>Profil</span>
                    </a>
                </li> --}}
    
            </ul>
            <div class="sidebar-footer mb-3">
                <a href="{{route('logout')}}" class="sidebar-link py-3"  style="text-decoration:none" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-left" title="Logout"></i>
                    <span class="fw-bold">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </aside>
        
        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3 shadow-sm">
                <h3 class="fw-bold fs-4 ms-3">{{$pageTitle}}</h3>
                
            </nav>




            <main class="content px-3 py-4">
                
            </main>

        </div>
    </div>





    @vite('resources/js/app.js')

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
