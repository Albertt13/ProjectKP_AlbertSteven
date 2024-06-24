<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Pendaftaran Tour</title>
    <link rel="stylesheet" href='{{ asset('template/assets/css/pages/riwayattour.css') }}'>
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
                    <li><a href="/riwayat">List Pendaftaran Jamaah</a></li>
                    <li><a href="/riwayattour" class="active">List Pendaftaran Tour</a></li>
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
                    <h1>List Pendaftaran Tour</h1>
                    <table>
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
                            @foreach ($riwayattour as $rt)
                            <tr>
                                <td>{{ $rt->mr_mrs }}</td>
                                <td>{{ $rt->fullname }}</td>
                                <td>{{ $rt->gender }}</td>
                                <td>{{ $rt->paket }}</td>
                                <td>{{ $rt->price }}</td>
                                <td>{{ $rt->plane_number }}</td>
                                <td>{{ $rt->sales_by }}</td>
                                <td>{{ $rt->keterangan }}</td>
                                <td>
                                    <div class="action-buttons">
                                     <a href="{{ route('riwayattour.edit', $rt->id) }}" class="btn btn-primary btn-edit">Edit</a> 
                                     <form action="{{ route('riwayattour.destroy', $rt->id) }}" method="POST" style="display:inline;">
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
                <div class="pagination-button">
                    {{ $riwayattour->links() }}
                </div>
            </main>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#search-input').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('riwayattour.search') }}",
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
