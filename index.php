<?php
$keyComponent = "0XqbM5W36QWG0NPXy0xSlCmtnjKBWOaGBH7gkV9cWb6Qsvyo";
?>

<?php
session_start();
$pageName = "eVoteVoting";
include __DIR__ . '/backend/db/connect.php';
include __DIR__ . '/backend/controller/authSessionController.php';
include __DIR__ . '/backend/controller/voteController.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="jumbotron-vote">
        <div class="vote-banner-desktop pt-5 pb-2 position-relative">
            <div class="row">
                <div class="col-2 bg-white rounded-end-4">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 text-center">
                            <img src="/assets/images/Logo_Kampus_Merdeka_Kemendikbud.webp" class="mx-auto"
                                alt="Bootstrap">
                        </div>
                        <div class="col-6 text-center">
                            <img src="/assets/images/LOGO-STIMIK.webp" class="mx-auto" alt="Bootstrap">
                        </div>
                    </div>
                </div>
                <div class="col-8 text-center text-white poppins-bold">
                    <h1>SURAT SUARA DIGITAL</h1>
                    <h2>PEMILIHAN UMUM <br>
                        PRESIDEN DAN WAKIL PRESIDEN MAHASISWA <br>
                        STIMIK TUNAS BANGSA BANJARNEGARA <br>
                        TAHUN 2024</h2>
                </div>
                <div class="col-2 bg-white rounded-start-4">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 text-center">
                            <img src="/assets/images/SECONDARY-LOGO.webp" class="mx-auto" alt="Bootstrap">
                        </div>
                        <div class="col-6 text-center">
                            <img src="/assets/images/LOGO-BEM.webp" class="mx-auto" alt="Bootstrap">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="vote-banner-mobile pt-3 py-5 pb-2 position-relative">
            <div class="row">
                <div class="col-4 bg-white rounded-end-4">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 text-center">
                            <img src="/assets/images/Logo_Kampus_Merdeka_Kemendikbud.webp" class="mx-auto"
                                alt="Bootstrap">
                        </div>
                        <div class="col-6 text-center">
                            <img src="/assets/images/LOGO-STIMIK.webp" class="mx-auto" alt="Bootstrap">
                        </div>
                    </div>
                </div>
                <div class="col-4 offset-4 bg-white rounded-start-4">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 text-center">
                            <img src="/assets/images/SECONDARY-LOGO.webp" class="mx-auto" alt="Bootstrap">
                        </div>
                        <div class="col-6 text-center">
                            <img src="/assets/images/LOGO-BEM.webp" class="mx-auto" alt="Bootstrap">
                        </div>
                    </div>
                </div>
                <div class="col-12 pt-3 text-center text-white poppins-bold">
                    <h1>SURAT SUARA DIGITAL</h1>
                    <h2>PEMILIHAN UMUM <br>
                        PRESIDEN DAN WAKIL PRESIDEN MAHASISWA <br>
                        STIMIK TUNAS BANGSA BANJARNEGARA <br>
                        TAHUN 2024</h2>
                </div>
            </div>
        </div>

        <div class="vote-paslon pb-5 position-relative">
            <div class="container">
                <div class="row pt-5">
                    <?php foreach ($Candidates as $index => $candidate): ?>
                        <div class="col-lg-4 py-2">
                            <div class="card p-4 border border-3 border-black z-3">
                                <div class="row">
                                    <h3 class="text-center">
                                        <?= htmlspecialchars($candidate['candidate_no'], ENT_QUOTES, "UTF-8"); ?>
                                    </h3>
                                </div>
                                <div class="row py-2">
                                    <img src="<?= htmlspecialchars($candidate['candidate_foto_paslon'], ENT_QUOTES, "UTF-8"); ?>"
                                        alt="" srcset="">
                                </div>
                                <div class="row">
                                    <h4>Calon Presiden :</h4>
                                    <h5> <?= htmlspecialchars($candidate['candidate_nama_capresma'], ENT_QUOTES, "UTF-8"); ?>
                                    </h5>
                                    <h4 class="mt-2">Calon Wakil Presiden :</h4>
                                    <h5> <?= htmlspecialchars($candidate['candidate_nama_cawapresma'], ENT_QUOTES, "UTF-8"); ?>
                                    </h5>
                                </div>
                                <div class="row py-3">
                                    <form method="POST" class="voteForm">
                                        <input type="hidden" name="candidate_id"
                                            value="<?= htmlspecialchars($candidate['candidate_id'], ENT_QUOTES, "UTF-8"); ?>">
                                        <button type="button"
                                            class="btn w-100 btn-danger btg-lg text-white text-center bg-870025 fs-3 voteCandidate">
                                            Vote
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <?php include __DIR__ . '/components/sweetalert.php'; ?>

</body>

</html>