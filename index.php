    <?php
    $keyComponent = "0XqbM5W36QWG0NPXy0xSlCmtnjKBWOaGBH7gkV9cWb6Qsvyo";
    $pageName = "live_vote";
    include __DIR__ . '/backend/db/connect.php';
    include __DIR__ . '/backend/controller/liveVoteController.php';

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LIVE VOTE</title>
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/font.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body>

        <nav class="navbar px-xl-3 pt-3 position-relative z-3">
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

        <div class="jumbotron-live-vote d-flex justify-content-center align-items-center px-lg-5">
            <div class="container-fluid px-lg-5">
                <div class="card px-lg-5 p-3 mx-auto border border-0 shadow rounded rounded-3">
                    <h2 class="poppins-black text-center">LIVE VOTING PEMILIHAN PRESIDEN <br> DAN WAKIL PRESIDEN MAHASISWA</h2>
                    <div class="row" id="candidates-container">
                        <?php if(!empty($candidates)) : ?>
                            <?php foreach($candidates as $candidatesIndex => $candidatesValue) : ?>
                                <?php 
                                    $candidate_id = $candidatesValue['candidate_id'];
                                ?>
                                <div class="col-xl-4 mb-4 candidate-card" data-candidate-id="<?= htmlspecialchars($candidate_id, ENT_QUOTES, 'UTF-8'); ?>">
                                    <div class="card border-0 bg-transparent w-100">
                                        <h1 class="text-center poppins-black-italic pt-3"><?= htmlspecialchars($candidatesValue['candidate_no'], ENT_QUOTES, "UTF-8"); ?></h1>
                                        <img
                                        src="<?= htmlspecialchars($candidatesValue['candidate_foto_paslon'], ENT_QUOTES, "UTF-8"); ?>"
                                        class="img-fluid rounded-top"
                                        alt=""
                                        />
                                        <div class="px-4 py-2">
                                            <div class="progress w-100 bg-dark rounded rounded-3" style="height: 40px;" role="progressbar" aria-label="Example with label">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated rounded rounded-3 bg-870025" style="width: 0%;" id="progress-<?= htmlspecialchars($candidate_id, ENT_QUOTES, 'UTF-8'); ?>">0%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <h3 class="poppins-bold text-center" id="countdown-timer" class="text-center my-3">Refreshing in 10 seconds...</h3>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="/assets/js/bootstrap.bundle.min.js"></script>
        <script>
            let refreshInterval = 10; // Refresh interval in seconds
            let countdown = refreshInterval;

            function fetchLiveVotes() {
                $('.candidate-card').each(function() {
                    const candidateId = $(this).data('candidate-id');
                    const progressBar = $('#progress-' + candidateId);

                    // Fetch votes for the candidate
                    $.get(`/api/liveVoteApi?candidate_id=${candidateId}`, function(response) {
                        if (response.status === 'success' && response.data) {
                            const percentage = response.data.percentage; // Get percentage from API response
                            progressBar.css('width', percentage + '%'); // Update progress bar width
                            progressBar.text(percentage.toFixed(1) + '%'); // Update progress bar text
                        }
                    }).fail(function() {
                        console.error(`Failed to fetch data for candidate ID: ${candidateId}`);
                    });
                });

                // Reset countdown
                countdown = refreshInterval;
            }

            // Countdown timer
            function updateCountdown() {
                if (countdown > 0) {
                    $('#countdown-timer').text(`Refreshing in ${countdown} seconds...`);
                    countdown--;
                }
            }

            // Start refresh interval and countdown
            setInterval(fetchLiveVotes, refreshInterval * 1000); // Refresh data
            setInterval(updateCountdown, 1000); // Update countdown display

            // Initial fetch
            fetchLiveVotes();
        </script>

    </body>

</html>