<?php

session_start();

#check if the user is logged in
if (isset($_SESSION['name'])) {
    #database connection file
    include '../db.conn.php';

    #get the logged in user's username from session
    $id = $_SESSION['user_id'];

    $sql = "UPDATE sellernew SET last_seen = NOW() WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);
} else {
    header("Location: ../../index.php");
    exit;
}
