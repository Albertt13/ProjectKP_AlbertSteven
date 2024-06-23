<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pendaftaran Jamaah</title>
    <link rel="stylesheet" href='{{ asset('template/assets/css/pages/riwayat.css') }}'>
    <!-- DataTables CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> --}}
    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="profile">
                <a href='/home'><img src="{{ asset('template/assets/images/logo/logoUmrahSako.jpeg') }}" alt="UmrahSako Logo"></a>
                <p>Sales Report Jamaah Sako Tour</p>
            </div>
            <nav>
                <ul>
                    <li><a href="/home">Daftar Jamaah</a></li>
                    <li><a href="/tour">Daftar Tour</a></li>
                    <li><a href="/riwayat" class="active">List Pendaftaran Jamaah</a></li>
                    <li><a href="/riwayattour">List Pendaftaran Tour</a></li>
                    <li><a href="/laporanjamaah">Laporan Jamaah</a></li>
                    <li><a href="/laporantour">Laporan Tour</a></li>
                </ul>
            </nav>
        </aside>
        <div class="main-section">
            <header class="top-navbar">
                <div class="navbar-left">
                    <div class="user-info">
                        <span class="user-name">Selamat Datang, {{ $user_name }}</span>

                        <div class="user-avatar">A</div>
                    </div>
                </div>
                <div class="navbar-right">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="logout-btn">Log Out</button>
                    </form>
                </div>
            </header>
            <main class="main-content">
                <div class="search-bar">
                    {{-- <input class="form-control" id="search" name="search" placeholder="Search...">
                    <button type="submit" class="btn btn-primary">Search</button> --}}
                    <input type="text" id="search-input" class="search-button" placeholder="Search" />
                    <button id="search-button" class="btn btn-search">Search</button>
                </div>
                <div class="card">
                    <h1>List Pendaftaran Jamaah</h1>
                    <table id="tabeljamaah">
                        <thead>
                            <tr>
                                <th>Mr/Mrs</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Paket</th>
                                <th>Price</th>
                                <th>Plane Number</th>
                                <th>Sales By</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="data-table-body">
                            @foreach ($riwayat as $r)
                            <tr>
                                <td>{{ $r->mr_mrs }}</td>
                                <td>{{ $r->fullname }}</td>
                                <td>{{ $r->gender }}</td>
                                <td>{{ $r->paket }}</td>
                                <td>{{ $r->price }}</td>
                                <td>{{ $r->plane_number }}</td>
                                <td>{{ $r->sales_by }}</td>
                                <td>{{ $r->keterangan }}</td>
                                <td>
                                    <div class="action-buttons">
                                     <a href="{{ route('riwayat.edit', $r->id) }}" class="btn btn-primary btn-edit">Edit</a> 
                                     <form action="{{ route('riwayat.destroy', $r->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-delete" onclick="return confirm('Apakah Anda ingin menghapus data?')">Delete</button>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <!-- jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    <!-- Bootstrap JS -->
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script> --}}
    <!-- DataTables JS -->
    {{-- <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> --}}

    <script>
        $(document).ready(function() {
            // $('#tablejamaah').DataTable({
            // "pageLength": 25
            // });
            $('#search-input').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('riwayat.search') }}",
                    type: "GET",
                    data: {'search': query},
                    success: function(data) {
                        $('#data-table-body').html(data);
                    },
                    error: function() {
                        $('#data-table-body').html('<tr><td colspan="9">Data yang anda cari tidak ada.</td></tr>');
                    }
                });
            });
        });
    </script>
</body>
</html>
