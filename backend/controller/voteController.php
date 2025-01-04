<?php
if ($keyComponent != "0XqbM5W36QWG0NPXy0xSlCmtnjKBWOaGBH7gkV9cWb6Qsvyo") {
    header("Location: /?403");
    exit();
}
?>

<?php

    if ($pageName = "eVoteVoting") {

        if (!isset($_SESSION["voter"])) {
            header("Location: /login");
            exit();
        }


        $query = "SELECT * FROM candidates ORDER BY candidate_no ASC";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $Candidates = [];
        $stmt->close();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $Candidates[] = $row;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            $voterId = $_SESSION['voter'];
            $ip_address = $_SERVER['REMOTE_ADDR'];
            $candidateId = $_POST['candidate_id'];

            $settingName = "online_voting";
            $query = "SELECT * FROM settings WHERE setting_name = ? LIMIT 1";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $settingName);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            if ($result->num_rows > 0) {

                $setting = $result->fetch_assoc();
                $settingValue = $setting['setting_value'];

                if ($settingValue == "on") {
                    $query = "SELECT * FROM voters WHERE voter_id = ? LIMIT 1";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $voterId);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $stmt->close();

                    if ($result->num_rows > 0) {
                        $voter = $result->fetch_assoc();
                        $voterStoredStatus = $voter['voter_status'];
                        $storedVoterIdentitiyNumber = $voter['voter_identity_number'];
                        $storedVoterJenisVote = $voter['voter_jenis_vote'];

                        if ($voterStoredStatus == "no_vote") {

                            $votingStatus = "voted";
                            $query = "INSERT INTO voting (voting_ip_address, voting_source, voting_tipe, voting_candidate_id, voting_status) VALUES (?, ?, ?, ?, ?)";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("sssis", $ip_address, $storedVoterIdentitiyNumber, $storedVoterJenisVote, $candidateId, $votingStatus);
                            $stmt->execute();
                            $stmt->close();

                            $voterStatus = "voted";
                            $query = "UPDATE voters SET voter_status = ? WHERE voter_id = ?";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("si", $voterStatus, $voterId);
                            $stmt->execute();
                            $stmt->close();

                            if (!isset($_SESSION['vote_berhasil'])) {
                                $_SESSION['vote_berhasil'] = [
                                    'icon' => 'success',
                                    'title' => 'Vote Berhasil',
                                    'text' => "Terimakasih karena sudah menggunakan hak pilih anda!!",
                                ];
                            }

                        } elseif ($voter['voter_status'] == "voted") {
                            if (!isset($_SESSION['vote_gagal'])) {
                                $_SESSION['vote_gagal'] = [
                                    'icon' => 'error',
                                    'title' => 'Vote Gagal',
                                    'text' => "Anda hanya bisa melakukan voting sekali saja",
                                ];
                            }
                        }
                    } else {
                        if (!isset($_SESSION['bukan_pemilih'])) {
                            $_SESSION['bukan_pemilih'] = [
                                'icon' => 'error',
                                'title' => 'Vote Gagal',
                                'text' => "Anda Tidak Terdaftar Sebagai Pemilih",
                            ];
                        }
                    }
                }
            }
        }
    }