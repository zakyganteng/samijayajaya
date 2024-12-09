<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <title>{{ $pageTitle }}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
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
                    <a href="{{ route('home') }}" style="text-decoration:none"> SJ_ADMIN</a>
                </div>
            </div>
            <hr class="text-light">
            <ul class="sidebar-nav">
                <li class="sidebar-item my-1" style="border-radius: 50px 0 0 50px;">
                    <a href="{{ route('home') }}" class="sidebar-link py-3" style="text-decoration:none">
                        <i class="bi bi-speedometer2" title="Dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="sidebar-item my-1 active" style="border-radius: 50px 0 0 50px;">
                    <a href="#" class="sidebar-link collapsed has-dropdown py-3" style="text-decoration:none"
                        data-bs-toggle="collapse" data-bs-target="#barang-menu" aria-expanded="false"
                        aria-controls="barang-menu">
                        <i class="bi bi-box-seam-fill" title="Barang"></i>
                        <span>Barang</span>
                    </a>
                    <ul id="barang-menu" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">
                        <li class="sidebar-item active" id="sidebar-down">
                            <a href="{{ route('produks.index') }}" class="sidebar-link fw-bold"
                                style="text-decoration:none">Daftar Barang</a>
                        </li>
                        <li class="sidebar-item " id="sidebar-down">
                            <a href="{{ route('produks.create') }}" class="sidebar-link"
                                style="text-decoration:none">Tambah Barang</a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="sidebar-item my-1" style="border-radius: 50px 0 0 50px;">
                    <a href="#" class="sidebar-link collapsed has-dropdown py-3" style="text-decoration:none"
                        data-bs-toggle="collapse" data-bs-target="#manage" aria-expanded="false" aria-controls="manage">
                        <i class="bi bi-kanban" title="Manajemen"></i>
                        <span>Manajemen</span>
                    </a>
                    <ul id="manage" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" style="text-decoration:none">Kasir</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" style="text-decoration:none">Stok Barang</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" style="text-decoration:none">Penjualan</a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="sidebar-item my-1" style="border-radius: 50px 0 0 50px;">
                    <a href="{{ route('profile') }}" class="sidebar-link py-3" style="text-decoration:none">
                        <i class="bi bi-person-circle" title="Profil"></i>
                        <span>Profil</span>
                    </a>
                </li> --}}
            </ul>
            <div class="sidebar-footer mb-3">
                <a href="{{ route('logout') }}" class="sidebar-link py-3" style="text-decoration:none"
                    onclick="event.preventDefault();
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
                <h3 class="fw-bold fs-4 ms-3">{{ $pageTitle }}</h3>

            </nav>




            <main class="content px-3 py-3">
                <div class="container-fluid">
                    <div class="row mb-0 justify-content-start">
                        <div class="col-lg-3 col-xl-2">
                            <div class="gap-2 d-flex justify-content-between" style="width:1200px">
                                <a href="{{ route('produks.create') }}" class="btn text-light px-4"
                                    id="btn-tambah-produk" title="Tambah Produk">
                                    <i class="bi bi-plus"></i><i class="bi bi-box-seam"></i>
                                </a>
                                <div class="d-flex justify-content-end mb-3">
                                    <button class="btn btn-primary" id="export-to-excel">Export to Excel</button>
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>


                    <div class="table-responsive border p-3 rounded-3">
                        <div class=" d-flex search-box justify-content-between my-3" style="vertical-align: middle">
                            <div class="pagination">
                                <select id="rows-per-page" onchange="updatePagination()" class="pe-2">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                                <p class="mt-2">entries per page</p>
                            </div>
                            <div class="d-flex">
                                <p class="me-2">Search :</p><input type="search" id="search-input" placeholder=""
                                    style="border: none;height:35px; border-radius:5px" class="shadow-sm">
                            </div>
                        </div>
                        <table class="table table-bordered table-hover table-striped mb-0 bg-white">
                            <thead>
                                <tr>
                                    <th onclick="sortTable(0)" style="cursor: pointer">Nama Produk</th>
                                    <th onclick="sortTable(1)" style="cursor: pointer">Kode Produk</th>
                                    <th onclick="sortTable(2)" style="cursor: pointer">Gambar</th>
                                    <th onclick="sortTable(3)" style="cursor: pointer">Harga</th>
                                    <th onclick="sortTable(4)" style="cursor: pointer">Unit</th>
                                    <th onclick="sortTable(5)" style="cursor: pointer">Kategori</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                @foreach ($produks as $produk)
                                    <tr>
                                        <td style="vertical-align: middle">{{ $produk->namaproduk }}</td>
                                        <td style="vertical-align: middle">{{ $produk->kodeproduk }}</td>
                                        <td style="vertical-align: middle" class="text-center"><img
                                                src="{{ asset('storage/gambar-produk/' . $produk->gambar) }}"
                                                alt="gambar-produk" style="width: 50px"></td>
                                        <td style="vertical-align: middle">{{ $produk->harga }}</td>
                                        <td style="vertical-align: middle">{{ $produk->unit }}</td>
                                        <td style="vertical-align: middle">{{ $produk->kategori->nama }}</td>
                                        <td style="vertical-align: middle">
                                            {{-- ACTIONS SECTION --}}
                                            <div class="d-flex">
                                                <a href="{{ route('produks.show', ['produk' => $produk->id]) }}"
                                                    class="btn btn-outline-dark btn-sm me-2"><i
                                                        class="bi-person-lines-fill"></i></a>
                                                <a href="{{ route('produks.edit', ['produk' => $produk->id]) }}"
                                                    class="btn btn-outline-dark btn-sm me-2"><i
                                                        class="bi-pencil-square"></i></a>
                                                <div>
                                                    <form
                                                        action="{{ route('produks.destroy', ['produk' => $produk->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            class="btn btn-outline-dark btn-sm me-2"
                                                            onclick="confirmation(event)"><i
                                                                class="bi-trash"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination justify-content-between px-4">
                        <span id="pagination-info"></span>
                        <div>
                            <button id="prev-page" onclick="prevPage()" style="border: none;">
                                << </button>
                                    <button id="page-numbers" style="border: none;"></button>
                                    <button id="next-page" onclick="nextPage()" style="border: none">>></button>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>



    @vite('resources/js/app.js')

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
    <script>
        document.getElementById('export-to-excel').addEventListener('click', function() {
            const table = document.getElementById('table-body');
            const rows = table.rows;
            const data = [];

            // Add column headers to the data array
            const headers = [];
            for (let i = 0; i < table.rows[0].cells.length; i++) {
                headers.push(table.rows[0].cells[i].innerText);
            }
            data.push(headers);

            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.cells;

                const rowData = [];

                for (let j = 0; j < cells.length; j++) {
                    const cell = cells[j];
                    rowData.push(cell.innerText);
                }

                data.push(rowData);
            }

            const ws = XLSX.utils.aoa_to_sheet(data);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
            XLSX.writeFile(wb, 'export.xlsx');
        });
    </script>
    <script>
        let currentPage = 1;
        let rowsPerPage = 5;
        let totalRows = document.getElementById('table-body').rows.length;
        let totalPages = Math.ceil(totalRows / rowsPerPage);


        function updatePagination() {
            rowsPerPage = parseInt(document.getElementById('rows-per-page').value);
            currentPage = 1;
            updateTable();
        }

        function updatePageNumbers() {
            let pageNumbersHTML = '';
            for (let i = 1; i <= totalPages; i++) {
                pageNumbersHTML += `<button onclick="gotoPage(${i})">${i}</button>`;
            }
            document.getElementById('page-numbers').innerHTML = pageNumbersHTML;
        }

        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                updateTable();
            }
        }

        function nextPage() {
            if (currentPage < Math.ceil(totalRows / rowsPerPage)) {
                currentPage++;
                updateTable();
            }
        }

        function gotoPage(pageNumber) {
            currentPage = pageNumber;
            updateTable();
        }

        function updateTable() {
            let startRow = (currentPage - 1) * rowsPerPage;
            let endRow = startRow + rowsPerPage;
            let rows = document.getElementById('table-body').rows;

            for (let i = 0; i < rows.length; i++) {
                if (i >= startRow && i < endRow) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }

            document.getElementById('pagination-info').innerHTML =
                `Showing ${startRow + 1} to ${endRow} of ${totalRows} entries`;
        }

        updatePageNumbers();

        updateTable();
    </script>
    <script>
        const searchInput = document.getElementById('search-input');
        const tableBody = document.querySelector('tbody');

        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            const rows = tableBody.rows;

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.cells;

                let match = false;
                for (let j = 0; j < cells.length; j++) {
                    const cell = cells[j];
                    const text = cell.textContent.toLowerCase();

                    if (text.includes(searchTerm)) {
                        match = true;
                        break;
                    }
                }

                if (match) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    </script>
    <script>
        function confirmation(ev) {
            ev.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this record!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // Get the form element
                        const form = ev.target.closest('form');
                        // Submit the form
                        form.submit();
                    }
                });
        }
    </script>
    <script>
        let sortDirection = [];
        for (let i = 0; i < 6; i++) {
            sortDirection.push(0); // 0 = ascending, 1 = descending
        }

        function sortTable(n) {
            let table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("table-body");
            switching = true;

            while (switching) {
                switching = false;
                rows = table.rows;

                for (i = 0; i < (rows.length - 1); i++) {
                    shouldSwitch = false;

                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];

                    if (sortDirection[n] === 0) {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }

                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }

            sortDirection[n] = 1 - sortDirection[n]; // toggle sort direction
        }
    </script>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
