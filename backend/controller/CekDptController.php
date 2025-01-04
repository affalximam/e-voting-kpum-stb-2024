<?php
if ($keyComponent != "0XqbM5W36QWG0NPXy0xSlCmtnjKBWOaGBH7gkV9cWb6Qsvyo") {
    header("Location: /?403");
    exit();
}
?>

<?php



if ($pageName == "cekDptHome") {

    if ($_SERVER["REQUEST_METHOD"] === 'POST') {

        $voterIdentityNumber = $_POST['voter_identity_number'];
        header("Location: /result?s=" . urlencode($voterIdentityNumber));
        exit();

    }
} elseif ($pageName == "cekDptResult") {

    if((isset($_GET['s'])) ) {
        $voterIdentityNumber = $_GET['s'];
        $query = "SELECT * FROM voters WHERE voter_identity_number = ? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $voterIdentityNumber);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        if ($result->num_rows > 0) {
            $showdata = 1;
            $voter = $result->fetch_assoc();
        } else {
            $showdata = 0;
        }
    } else {
        header("/");
        exit();
    }
    
}
