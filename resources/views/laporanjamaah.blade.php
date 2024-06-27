<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pendaftaran Jamaah</title>
    <link rel="stylesheet" href='{{ asset('template/assets/css/pages/laporanjamaah.css') }}'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <aside class="sidebar" style="">
            <div class="profile">
                <a href='/home'><img src="{{ asset('template/assets/images/logo/logoUmrahSako.jpeg') }}" alt="UmrahSako Logo"></a>
                <p>Sales Report Jamaah Sako Tour</p>
            </div>
            <nav>
                <ul>
                    <li><a href="/home">Daftar Jamaah</a></li>
                    <li><a href="/tour">Daftar Tour</a></li>
                    <li><a href="/riwayat">List Pendaftaran Jamaah</a></li>
                    <li><a href="/riwayattour">List Pendaftaran Tour</a></li>
                    <li><a href="/laporanjamaah" class="active">Laporan Jamaah</a></li>
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
                    <input type="text" id="search-input" class="search-button" placeholder="Search" />
                    <button id="search-button" class="btn btn-search">Search</button>
                </div>
                <div class="convert">
                    <button onclick="window.location.href='{{ route('downloadjamaah.pdf') }}'" class="btn btn-success custom-btn">Convert to PDF</button>
                    <button onclick="window.location.href='{{ route('laporanjamaah.exportExcel') }}'" class="btn btn-success custom-btn">Convert to Excel</button>
                </div>
                <div class="card">
                    <h1>Laporan Pendaftaran Jamaah</h1>
                    <table id="tablejamaah" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Mr/Mrs</th>
                                <th>FULL NAME</th>
                                <th>NIK</th>
                                <th>GENDER</th>
                                <th>PLACE BIRTH</th>
                                <th>DATE BIRTH</th>
                                <th>No PASSPORT</th>
                                <th>DATE ISSUED</th>
                                <th>DATE EXPIRED</th>
                                <th>ISSUING OFFICE</th>
                                <th>PLANE NUMBER</th>
                                <th>PAKET</th>
                                <th>PRICE</th>
                                {{-- <th>DISKON</th> --}}
                                <th>DP</th>
                                <th>SISA PEMBAYARAN</th>
                                <th>SALES BY</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody id="data-table-body">
                            @foreach ($laporanjamaah as $lj)
                            <tr>
                                <td>{{ $lj->mr_mrs }}</td>
                                <td>{{ $lj->fullname }}</td>
                                <td>{{ $lj->nik }}</td>
                                <td>{{ $lj->gender }}</td>
                                <td>{{ $lj->place_birth }}</td>
                                <td>{{ $lj->date_birth }}</td>
                                <td>{{ $lj->no_passport }}</td>
                                <td>{{ $lj->date_issued }}</td>
                                <td>{{ $lj->date_expired }}</td>
                                <td>{{ $lj->issuing_office }}</td>
                                <td>{{ $lj->plane_number }}</td>
                                <td>{{ $lj->paket }}</td>
                                <td>{{ $lj->price }}</td>
                                <td>{{ $lj->dp }}</td>
                                {{-- <td>{{ $lj->diskon }}</td> --}}
                                <td>{{ $lj->sisa_pembayaran }}</td>
                                <td>{{ $lj->sales_by }}</td>
                                <td>{{ $lj->keterangan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#search-input').on('keyup', function() {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('laporanjamaah.search') }}",
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
