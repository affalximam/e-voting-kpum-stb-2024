<?php
if ($keyComponent != "0XqbM5W36QWG0NPXy0xSlCmtnjKBWOaGBH7gkV9cWb6Qsvyo") {
    header("Location: /?403");
    exit();
}
?>

<?php

if($pageName == "eVoteLogin") {

    if (isset($_SESSION["voter"])) {
        header("Location: /");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] === 'POST') {

        if (isset($_POST["voter_login"])) {

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
                    $voterIdentityNumber = $_POST['voter_identity_number'];
                    $voterToken = $_POST['voter_token'];
                    $query = "SELECT * FROM voters WHERE voter_identity_number = ? LIMIT 1";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s", $voterIdentityNumber);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $storedVoterToken = $row['voter_token'];
                        if ($voterToken == $storedVoterToken) {
                            $storedVoterStatus = $row['voter_status'];
                            if ($storedVoterStatus == "no_vote") {
                                $storedVoterJenisVote = $row['voter_jenis_vote'];
                                if($storedVoterJenisVote == "online") {
                                    $_SESSION['voter'] = $row['voter_id'];
                                    header("Location: /");
                                    exit();
                                } elseif ($storedVoterJenisVote == "offline") {
                                    if (!isset($_SESSION['login_gagal'])) {
                                        $_SESSION['login_gagal'] = [
                                            'icon' => 'error',
                                            'title' => 'Login Gagal',
                                            'text' => "Anda tidak di izinkan melakukan voting secara online, silahkan vote secara offline",
                                        ];
                                    }
                                }
                            } else {
                                if (!isset($_SESSION['login_gagal'])) {
                                    $_SESSION['login_gagal'] = [
                                        'icon' => 'error',
                                        'title' => 'Login Gagal',
                                        'text' => "Anda hanya bisa melakukan voting sekali saja",
                                    ];
                                }
                            }
                        } else {
                            if (!isset($_SESSION['login_gagal'])) {
                                $_SESSION['login_gagal'] = [
                                    'icon' => 'error',
                                    'title' => 'Login Gagal',
                                    'text' => "NIM dan Token salah",
                                ];
                            }
                        }
                    } else {
                        if (!isset($_SESSION['login_gagal'])) {
                            $_SESSION['login_gagal'] = [
                                'icon' => 'error',
                                'title' => 'Login Gagal',
                                'text' => "NIM dan Token salah",
                            ];
                        }
                    }
                } else {
                    if (!isset($_SESSION['voting_ditutup'])) {
                        $_SESSION['voting_ditutup'] = [
                            'icon' => 'error',
                            'title' => 'Login Gagal',
                            'text' => "Waktu Voting Telah Ditutup",
                        ];
                    }
                }
            } 
        }
    }
}
