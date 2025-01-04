<?php
    $keyComponent = "0XqbM5W36QWG0NPXy0xSlCmtnjKBWOaGBH7gkV9cWb6Qsvyo";
    $pageName = "cekDptResult";
    include __DIR__ . '/backend/db/connect.php';
    include __DIR__ . '/backend/controller/CekDptController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>CEK DPT</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <nav class="navbar px-xl-3 pt-3 z-3">
        <div class="container-fluid d-flex flex-nowrap">
            <a class=" navbar-brand" href="#">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <img src="/assets/images/Logo_Kampus_Merdeka_Kemendikbud.webp" alt="Bootstrap">
                    </div>
                    <div class="col-6">
                        <img src="/assets/images/LOGO-STIMIK.webp" alt="Bootstrap">
                    </div>
                </div>
            </a>
            <h1 class="text-center poppins-bold"> KOMISI PEMILIHAN UMUM MAHASISWA <br> STIMIK TUNAS BANGSA BANJARNEGARA
            </h1>
            <a class=" navbar-brand" href="#">
                <img src="/assets/images/SECONDARY-LOGO.webp" alt="Bootstrap">
                <img src="/assets/images/LOGO-BEM.webp" alt="Bootstrap">
            </a>
        </div>
    </nav>

    <div class="jumbotron-login d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="card p-lg-5 p-3 mx-auto border border-0 shadow rounded rounded-3">
                <h2 class="poppins-black text-center">CEK DPT PEMILIHAN PRESIDEN <br> DAN WAKIL PRESIDEN MAHASISWA</h2>
                <?php if ($showdata == 1): ?>
                    <div class="row py-4 font-monospace">
                        <div class="row">
                            <div class="col-6 fs-5 col-xl-3 offset-xl-3">NAMA</div>
                            <div class="col-6 fs-5">: <?= htmlspecialchars($voter['voter_name'], ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fs-5 col-xl-3 offset-xl-3">NIM</div>
                            <div class="col-6 fs-5">:
                                <?= htmlspecialchars($voter['voter_identity_number'], ENT_QUOTES, 'UTF-8'); ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6 fs-5 col-xl-3 offset-xl-3">PRODI / KELAS</div>
                            <div class="col-6 fs-5">: <?= htmlspecialchars($voter['voter_prodi'], ENT_QUOTES, 'UTF-8'); ?> /
                                <?= htmlspecialchars($voter['voter_kelas'], ENT_QUOTES, 'UTF-8'); ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6 fs-5 col-xl-3 offset-xl-3">KATEGORI</div>
                            <div class="col-6 fs-5">:
                                <?= htmlspecialchars($voter['voter_kategori'], ENT_QUOTES, 'UTF-8'); ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6 fs-5 col-xl-3 offset-xl-3">TAHUN MASUK</div>
                            <div class="col-6 fs-5">:
                                <?= htmlspecialchars($voter['voter_angkatan'], ENT_QUOTES, 'UTF-8'); ?></div>
                        </div>
                        <div class="row">
                            <div class="col-6 fs-5 col-xl-3 offset-xl-3">JENIS VOTE</div>
                            <div class="col-6 fs-5">:
                                <?= htmlspecialchars($voter['voter_jenis_vote'], ENT_QUOTES, 'UTF-8'); ?></div>
                        </div>
                    </div>
                <?php elseif ($showdata == 0): ?>
                    <div class="row py-4 font-monospace text-center">
                        <h3>DATA TIDAK DITEMUKAN</h3>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-6">
                        <a href="/"
                            class="btn btn-md btn-danger text-center text-white mt-4 py-2 w-100 montserrat-bold fs-3">KEMBALI</a>
                    </div>
                    <div class="col-md-6">
                        <a href="/perbaiki-data"
                            class="btn btn-md btn-danger text-center text-white mt-4 py-2 w-100 montserrat-bold fs-3">PERBAIKI
                            KESALAHAN DATA</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>