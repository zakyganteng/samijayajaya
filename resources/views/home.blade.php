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
                <li class="sidebar-item active my-1" style="border-radius: 50px 0 0 50px;">
                    <a href="#" class="sidebar-link py-3"  style="text-decoration:none">
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
                            <a href="{{ route('produks.index')}}" class="sidebar-link"  style="text-decoration:none">Daftar Barang</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('produks.create')}}" class="sidebar-link"  style="text-decoration:none">Tambah Barang</a>
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
                {{-- <li class="sidebar-item my-1" style="border-radius: 50px 0 0 50px;">
                    <a href="{{ route('profile')}}" class="sidebar-link py-3"  style="text-decoration:none">
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
                <div class="container-fluid">
                    <div class="mb-3">
                        <h5 class="fw-bold text-center mb-4">Samijaya Admin Rules</h3>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <div class="card border-0 shadow-sm" style="width: 1200px">
                                        <div class="card-body py-4">
                                            <h6 class="mb-2">
                                                - Perhatian
                                            </h6>
                                            <p class="mb-2 fw-light">
                                                1. Admin dapat menambahkan produk baru ke dalam database. <br>
                                                2. Setiap entri produk harus memiliki data yang lengkap, termasuk Nama Produk, Kode Produk, Gambar, Harga, dan Unit. <br>
                                                3. Kode produk harus unik dan tidak boleh duplikat. <br>
                                                4. Admin dapat mengunggah gambar produk dengan format yang telah ditentukan. <br>
                                                5. Harga harus dalam format yang benar dan valid.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card border-0 shadow-sm mt-2" style="width: 1200px">
                                        <div class="card-body py-4">
                                            <h6 class="mb-2">
                                                - Aturan Produk
                                            </h6>
                                            <p class="mb-2 fw-light">
                                                1. Validasi harus mencakup format harga, keunikan Kode Produk, keberadaan gambar, dan keabsahan unit yang dipilih. <br>
                                                2. Akses ke fitur CRUD harus dibatasi hanya untuk admin yang berwenang. <br>
                                                3. Tindakan yang diizinkan harus disesuaikan dengan peran admin, dengan admin memiliki hak penuh untuk menambah, mengubah, dan menghapus produk. <br>
                                                4. Sistem dashboard dapat diintegrasikan dengan sistem eksternal, misalnya, sistem manajemen dalam Database. <br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>



                            {{-- <div class="row justify-content-center mt-4">
                                <div class="col-12 col-md-3 my-2">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body justify-content-between">
                                            <h6 class="fw-bold">
                                                Jumlah Keseluruhan
                                            </h6>
                                            <div class="d-flex mt-2">
                                                <i class="bi bi-box me-3" style="font-size: 2em;"></i>
                                                <h2 class="mb-2 fw-bold mt-1">
                                                    221 Unit
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                    </div>
                </div>
            </main>



            {{-- <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h5 class="fw-bold text-center mb-4">Jumlah Stock Barang</h3>
                            <div class="row">
                                <div class="col-12 col-md-3 my-2">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body py-4">
                                            <h6 class="mb-2">
                                                Stok Pigura
                                            </h6>
                                            <h1 class="mb-2 fw-bold">
                                                45
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 my-2">
                                    <div class="card  border-0 shadow-sm">
                                        <div class="card-body py-4">
                                            <h6 class="mb-2">
                                                Stok Gambar
                                            </h6>
                                            <h1 class="mb-2 fw-bold">
                                                34
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 my-2">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body py-4">
                                            <h6 class="mb-2">
                                                Stok Pasir
                                            </h6>
                                            <h1 class="mb-2 fw-bold">
                                                44
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 my-2">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body py-4">
                                            <h6 class="mb-2">
                                                Jumlah Baterai
                                            </h6>
                                            <h1 class="mb-2 fw-bold">
                                                98
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row justify-content-center mt-4">
                                <div class="col-12 col-md-3 my-2">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body justify-content-between">
                                            <h6 class="fw-bold">
                                                Jumlah Keseluruhan
                                            </h6>
                                            <div class="d-flex mt-2">
                                                <i class="bi bi-box me-3" style="font-size: 2em;"></i>
                                                <h2 class="mb-2 fw-bold mt-1">
                                                    221 Unit
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </main> --}}

        </div>
    </div>


    



    @vite('resources/js/app.js')

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
