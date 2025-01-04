    <?php
    $keyComponent = "0XqbM5W36QWG0NPXy0xSlCmtnjKBWOaGBH7gkV9cWb6Qsvyo";
    $pageName = "cekDptHome";
    include __DIR__ . '/backend/db/connect.php';
    include __DIR__ . '/backend/controller/CekDptController.php';

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CEK DPT</title>
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
                    <form method="POST">
                        <div class="input-group mt-5 flex-nowrap">
                            <input type="text" name="voter_identity_number"
                                class="form-control text-center bg-transparent border border-2 py-2 border-black poppins-black-italic"
                                placeholder="NIM" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>
                        <button type="submit" name="cek_data"
                            class="btn btn-md btn-danger text-center text-white mt-4 py-2 w-100 montserrat-bold fs-3">CEK
                            DATA</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="/assets/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>