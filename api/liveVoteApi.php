<?php
header("Content-Type: application/json");

include __DIR__ . "/../backend/db/connect.php";

    if(empty($_GET['candidate_id'])) {
        $query = "SELECT * FROM candidates ORDER BY candidate_no ASC";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $candidates = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $row['vote_count'] = 0; // Tambahkan default jumlah vote
                $candidates[] = $row;
            }
        }

        $stmt->close();

        foreach ($candidates as &$candidate) {
            $candidate_id = $candidate['candidate_id'];
            $query = "SELECT COUNT(*) AS total_votes FROM voting WHERE voting_candidate_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $candidate_id);
            $stmt->execute();
            $stmt->bind_result($total_votes);
            $stmt->fetch();
            $stmt->close();
            $candidate['vote_count'] = $total_votes;
        }

        echo json_encode([
            'status' => 'success',
            'data' => $candidates
        ]);

    } elseif (isset($_GET['candidate_id'])) {

        
        $candidate_id = $_GET['candidate_id'];

        // Total votes for the candidate
        $queryCandidateVotes = "SELECT COUNT(*) AS total_votes FROM voting WHERE voting_candidate_id = ?";
        $stmtCandidateVotes = $conn->prepare($queryCandidateVotes);
        $stmtCandidateVotes->bind_param("i", $candidate_id);
        $stmtCandidateVotes->execute();
        $stmtCandidateVotes->bind_result($candidate_votes);
        $stmtCandidateVotes->fetch();
        $stmtCandidateVotes->close();

        // Total votes across all candidates
        $queryTotalVotes = "SELECT COUNT(*) AS total_all_votes FROM voting";
        $resultTotalVotes = $conn->query($queryTotalVotes);
        $total_all_votes = $resultTotalVotes->fetch_assoc()['total_all_votes'];

        // Calculate percentage
        $percentage = $total_all_votes > 0 ? ($candidate_votes / $total_all_votes) * 100 : 0;

        // Response
        echo json_encode([
            'status' => 'success',
            'data' => [
                'candidate_id' => $candidate_id,
                'vote_count' => $candidate_votes,
                'total_votes' => $total_all_votes,
                'percentage' => round($percentage, 2)
            ]
        ]);
    }