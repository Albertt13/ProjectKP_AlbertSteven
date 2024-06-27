<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Tour</title>
    <link rel="stylesheet" href='{{ asset('template/assets/css/pages/home.css') }}'>
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
                        <span class="user-name">Selamat Datang, Admin</span>
                        
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
                
                <div class="card">
                    <h1>Edit Data Tour</h1>
                    <form class="data-form" action="{{ route('riwayattour.update', $riwayattour->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group">
                                <label for="mr_mrs">Mr/Mrs</label>
                                <select id="mr_mrs" name="mr_mrs">
                                    <option value="Mr" {{ $riwayattour->mr_mrs == 'Mr' ? 'selected' : '' }}>Mr (Mister)</option>
                                    <option value="Mrs" {{ $riwayattour->mr_mrs == 'Mrs' ? 'selected' : '' }}>Mrs (Mistress)</option>
                                    <option value="CHD" {{ $riwayattour->mr_mrs == 'CHD' ? 'selected' : '' }}>CHD (Children)</option>
                                    <option value="INF" {{ $riwayattour->mr_mrs == 'INF' ? 'selected' : '' }}>INF (Infant)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fullname">FULL NAME</label>
                                <input type="text" id="fullname" name="fullname" value="{{ $riwayattour->fullname }}" placeholder="Full Name" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nik">NIK KTP</label>
                                <input type="text" id="nik" name="nik" value="{{ $riwayattour->nik }}" placeholder="01234567890" maxlength="16" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">GENDER</label>
                                <select id="gender" name="gender">
                                    <option value="Male" {{ $riwayattour->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $riwayattour->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="place_birth">PLACE OF BIRTH</label>
                                <input type="text" id="place_birth" name="place_birth" value="{{ $riwayattour->place_birth }}" placeholder="City of Birth" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="date_birth">DATE OF BIRTH</label>
                                <input type="date" id="date_birth" name="date_birth" value="{{ $riwayattour->date_birth }}" required>
                            </div>
                            <div class="form-group">
                                <label for="no_passport">NO. PASSPORT</label>
                                <input type="text" id="no_passport" name="no_passport" value="{{ $riwayattour->no_passport }}" placeholder="012345" maxlength="8" required>
                            </div>
                            <div class="form-group">
                                <label for="date_issued">DATE OF ISSUED</label>
                                <input type="date" id="date_issued" name="date_issued" value="{{ $riwayattour->date_issued }}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="date_expired">DATE OF EXPIRED</label>
                                <input type="date" id="date_expired" name="date_expired" value="{{ $riwayattour->date_expired }}" required>
                            </div>
                            <div class="form-group">
                                <label for="issuing_office">ISSUING OFFICE</label>
                                <input type="text" id="issuing_office" name="issuing_office" value="{{ $riwayattour->issuing_office }}" placeholder="City of Issuing Office" required>
                            </div>
                            <div class="form-group">
                                <label for="plane_number">PLANE NUMBER</label>
                                <input type="text" id="plane_number" name="plane_number" value="{{ $riwayattour->plane_number }}" placeholder="123456" maxlength="6" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="paket">PAKET</label>
                                <input type="text" id="paket" name="paket"  value="{{ $riwayattour->paket }}"placeholder="Silver, Gold, Diamond, etc." required>
                            </div>
                            <div class="form-group">
                                <label for="price">PRICE</label>
                                <input type="text" id="price" name="price" value="{{ $riwayattour->price }}" placeholder="Rp 29.000.000,00" type-currency="IDR" required>
                            </div>
                            {{-- <div class="form-group">
                                <label for="diskon">DISCOUNT (%)</label>
                                <input type="text" id="diskon" name="diskon" value="{{ $riwayattour->diskon }}" placeholder="%" required>
                            </div> --}}
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="dp">DP</label>
                                <input type="text" id="dp" name="dp" value="{{ $riwayattour->dp }}" placeholder="Rp 29.000.000,00" type-currency="IDR" required>
                            </div>
                            <div class="form-group">
                                <label for="sisa_pembayaran">SISA PEMBAYARAN</label>
                                <input type="text" id="sisa_pembayaran" value="{{ $riwayattour->sisa_pembayaran }}" name="sisa_pembayaran" type-currency="IDR" readonly>
                            </div>
                            <div class="form-group">
                                <label for="sales_by">SALES BY</label>
                                <input type="text" id="sales_by" name="sales_by" value="{{ $riwayattour->sales_by }}" placeholder="Sales Name" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="keterangan">KETERANGAN</label>
                                <textarea id="keterangan" name="keterangan" value="{{ $riwayattour->keterangan }}" placeholder="Add on like jacket, hat, bag, etc." required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="save-btn">Update</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <script>
        document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
        element.addEventListener('keyup', function(e) {
        let cursorPostion = this.selectionStart;
        let value = parseInt(this.value.replace(/[^,\d]/g, ''));
        let originalLenght = this.value.length;
            if (isNaN(value)) {
                this.value = "";
            } else {    
                this.value = value.toLocaleString('id-ID', {
                currency: 'IDR',
                style: 'currency',
                minimumFractionDigits: 0
            });
            cursorPostion = this.value.length - originalLenght + cursorPostion;
            this.setSelectionRange(cursorPostion, cursorPostion);
            }
        });
    });

    // Perhitungan Price
    document.addEventListener('DOMContentLoaded', function() {
        function calculateSisaPembayaran() {
            const price = parseFloat(document.getElementById('price').value.replace(/[^,\d]/g, '')) || 0;
            //const diskon = parseFloat(document.getElementById('diskon').value.replace(/[^,\d]/g, '')) || 0;
            const dp = parseFloat(document.getElementById('dp').value.replace(/[^,\d]/g, '')) || 0;

            //const discountedPrice = price - (price * (diskon / 100));
            const sisaPembayaran = price - dp;

            document.getElementById('sisa_pembayaran').value = sisaPembayaran.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

            document.getElementById('price').addEventListener('input', calculateSisaPembayaran);
            //document.getElementById('diskon').addEventListener('input', calculateSisaPembayaran);
            document.getElementById('dp').addEventListener('input', calculateSisaPembayaran);
    });
    </script>
</body>
</html>