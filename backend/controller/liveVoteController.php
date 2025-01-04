<?php 

    if (empty($keyComponent) || $keyComponent !== "0XqbM5W36QWG0NPXy0xSlCmtnjKBWOaGBH7gkV9cWb6Qsvyo") { header('Location: /'); exit; }
    include __DIR__ ."/../db/connect.php";

    switch($pageName) {
        case "live_vote":
            $heading1 = "LIVE VOTE";

            $query = "SELECT * FROM candidates ORDER BY candidate_no ASC";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $candidates = [];
            $stmt->close();
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $candidates[] = $row;
                }
            }

        break;
    }