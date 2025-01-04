<script>
    <?php
    if ($keyComponent != "0XqbM5W36QWG0NPXy0xSlCmtnjKBWOaGBH7gkV9cWb6Qsvyo") {
        header("Location: /?403");
        exit();
    }
    ?>

document.addEventListener('DOMContentLoaded', function() {
    const voteCandidateButtons = document.querySelectorAll('.voteCandidate');

    voteCandidateButtons.forEach((button) => {
        button.addEventListener('click', function() {
            const voteCandidateForm = this.closest('.voteForm'); // Ambil form terdekat
            Swal.fire({
                title: 'Konfirmasi Pilihan',
                text: "Apakah Anda yakin ingin memilih kandidat ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Pilih!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log("Form will be submitted");
                    voteCandidateForm.submit(); // Submit form setelah konfirmasi
                }
            });
        });
    });
});



    <?php
    if (isset($_SESSION['login_gagal']) && is_array($_SESSION['login_gagal'])):
        $sweetalertLoginGagal = $_SESSION['login_gagal'];
        unset($_SESSION['login_gagal']);
    ?>
        let sweetalertLoginGagal = <?php echo json_encode($sweetalertLoginGagal); ?>;

        Swal.fire({
            icon: sweetalertLoginGagal.icon,
            title: sweetalertLoginGagal.title,
            text: sweetalertLoginGagal.text,
            confirmButtonText: 'OK'
        });
    <?php elseif (isset($_SESSION['vote_gagal']) && is_array($_SESSION['vote_gagal'])):
        $sweetalertVoteGagal = $_SESSION['vote_gagal'];
        unset($_SESSION['vote_gagal']);
    ?>
        let sweetalertVoteGagal = <?php echo json_encode($sweetalertVoteGagal); ?>;

        Swal.fire({
            icon: sweetalertVoteGagal.icon,
            title: sweetalertVoteGagal.title,
            text: sweetalertVoteGagal.text,
            confirmButtonText: 'OK'
        }).then((result) => {
            window.location.href = '/logout.php';
        });
    <?php elseif (isset($_SESSION['vote_berhasil']) && is_array($_SESSION['vote_berhasil'])):
        $sweetalertVoteBerhasil = $_SESSION['vote_berhasil'];
        unset($_SESSION['vote_berhasil']);
    ?>
        let sweetalertVoteBerhasil = <?php echo json_encode($sweetalertVoteBerhasil); ?>;

        Swal.fire({
            icon: sweetalertVoteBerhasil.icon,
            title: sweetalertVoteBerhasil.title,
            text: sweetalertVoteBerhasil.text,
            confirmButtonText: 'OK',
            timer: 5000
        }).then((result) => {
            window.location.href = '/logout.php';
        });
        
    <?php elseif (isset($_SESSION['bukan_pemilih']) && is_array($_SESSION['bukan_pemilih'])):
        $sweetalertBukanPemilih = $_SESSION['bukan_pemilih'];
        unset($_SESSION['bukan_pemilih']);
    ?>
        let sweetalertBukanPemilih = <?php echo json_encode($sweetalertBukanPemilih); ?>;

        Swal.fire({
            icon: sweetalertBukanPemilih.icon,
            title: sweetalertBukanPemilih.title,
            text: sweetalertBukanPemilih.text,
            confirmButtonText: 'OK',
            timer: 5000
        }).then((result) => {
            window.location.href = '/logout.php';
        });
    <?php elseif (isset($_SESSION['voting_ditutup']) && is_array($_SESSION['voting_ditutup'])):
        $sweetalertVotingDitutup = $_SESSION['voting_ditutup'];
        unset($_SESSION['voting_ditutup']);
    ?>
        let sweetalertVotingDitutup = <?php echo json_encode($sweetalertVotingDitutup); ?>;

        Swal.fire({
            icon: sweetalertVotingDitutup.icon,
            title: sweetalertVotingDitutup.title,
            text: sweetalertVotingDitutup.text,
            confirmButtonText: 'OK',
        });
    <?php endif; ?>
</script>