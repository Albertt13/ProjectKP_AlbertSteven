<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pendaftaran Jamaah</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10px;
            margin: 10px;
        }

        .header {
            display: flex;
            align-items: center;
            /* justify-content: flex-start; */
            margin-bottom: 20px;
        }
        .header img {
            width: 100px;
            height: auto;
            margin-right: 20px;
        }
        .header .text {
            text-align: left;
        }
        .header .text h1 {
            margin: 0;
            padding: 0;
            font-size: 24px;
        }
        .header .text p {
            margin: 0;
            padding: 0;
            font-size: 12px;
        }
        .content {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
            border: 1px solid #000;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .mr-mrs, .nik, .gender, .plane-number, .paket, .dp, .diskon, .sales-by {
            width: 5%;
        }
        .fullname, .place-birth, .issuing-office, .keterangan {
            width: 10%;
        }
        .date-birth, .date-issued, .date-expired {
            width: 8%;
        }
        .price, .sisa-pembayaran {
            width: 7%;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('images/logoUmrahSako.jpeg') }}" alt="UmrahSako Logo"></a>
        <div class="text">
            <h1>Laporan Pendaftaran Jamaah</h1>
            <p>PT. Sako Utama Wisata, Jl. Bukit Sangkal, Kec. Kalidoni, Kota Palembang, Sumatera Selatan</p>
        </div>
    </div>
    <div class="content">
    <table>
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
        <tbody>
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
</body>
</html>
