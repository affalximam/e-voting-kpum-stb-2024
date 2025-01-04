<!DOCTYPE html>
<html lang="en">

<head>    
    <title>PERBAIKI DATA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        html {
            max-width: 100vw !important;
        }
        iframe {
            width: 100vw;
            min-height: 80vh;
        }
    </style>
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

    <div class="pt-5">
        <iframe id="formGoogleFrame" src="https://docs.google.com/forms/d/e/1FAIpQLSeE9fgN5M5Lp_pBeIGAuPC9GNb0qtjE4YvaTAAwDaoWSjcimQ/viewform?embedded=true" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
    </div>
    
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script>
        const iframe = document.getElementById('myIframe');

        iframe.onload = function () {
            const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
            const iframeHeight = iframeDocument.documentElement.scrollHeight;
            iframe.style.height = iframeHeight + 'px';
        };
    </script>
</body>
</html>