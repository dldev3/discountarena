<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

if (isset($_SESSION['username'])) {

    #database connection
    include 'app/db.conn.php';
    include 'app/helpers/user.php';
    include 'app/helpers/conversations.php';
    include 'app/helpers/timeAgo.php';
    include 'app/helpers/last_chat.php';

    #getting user data
    $user = getUser($_SESSION['username'], $conn);

    try {
        $conversations = getConversation($user['user_id'], $conn);
    } catch (\Throwable $th) {
        //throw $th;
    }

    #getting user conversations


    // echo "<pre>";
    // print_r($user);
    // echo "</pre>";
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/fontawesome.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
        <title>DiscountArena - User chat</title>
    </head>

    <body>

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb d-flex justify-content-center align-items-center" style="margin-top:3rem;">
            <ol class="breadcrumb" style="background-color:  #fff; ">
                <li class="breadcrumb-item"><a href="http://localhost/DiscountArena/homepagenew.html">Home</a></li>
                <li class="breadcrumb-item"><a href="http://localhost/DiscountArena/newsfeed/kesh.php">Newfeed</a></li>
                <li class="breadcrumb-item"><a href="http://localhost/DiscountArena/Customer/LoginandRegistration/logout-user.php">Logout</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Chat</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <main class="d-flex justify-content-center align-items-center vh-100">

            <div class="p-2 w-400 rounded shadow">
                <div class="d-flex justify-content-center align-items-center mb-3 p-3 bg-light">
                    <div class="d-flex align-items-center">
                        <h3 class="fs-xs m-2">I'm<?php echo $_SESSION['name'] ?></h3>
                    </div>
                    <!-- <a href="logout.php" class="btn btn-dark">Logout</a> -->
                </div>

                <div class="input-group mb-3">
                    <input type="text" placeholder="Search Seller Here..." class="form-control" id="searchText">
                    <button class="btn btn-primary"><i class="fa fa-search" id="searchBtn"></i> </button>
                </div>

                <ul id="chatList" class="list-group mvh-50 overflow-auto">
                    <?php if (!empty($conversations)) { ?>
                        <?php foreach ($conversations as $conversation) { ?>
                            <li class="list-group-item">
                                <a href="chat.php?user=<?=
                                                        $conversation['username']; ?>" class="d-flex justify-content-center align-items-center p-2 ">
                                    <div class="d-flex align-items-center">
                                        <h3 class="fs-xs m-2">
                                            <?= $conversation['name']; ?> <br>
                                            <small>Last seen:
                                                <?= $conversation['last_seen'] ?>
                                            </small>
                                        </h3>
                                    </div>
                                    <?php if (last_seen($conversation['last_seen']) == "Active") { ?>
                                        <div title="online">
                                            <div class="online">

                                            </div>
                                        </div>
                                    <?php } ?>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="alert alert-info text-center">
                            <i class="fa fa-comments d-block fs-big "></i>
                            No messages yet, Start the conversation
                        </div>
                    <?php } ?>
                </ul>

            </div>

            <script type="text/javascript" src="js/jq.min.js"></script>

            <script>
                $(document).ready(function() {

                    //search
                    $("#searchText").on("input", function() {
                        var searchText = $(this).val();

                        if (searchText == "") return;

                        $.post('app/ajax/search.php', {
                            key: searchText
                        }, function(data, status) {
                            $("#chatList").html(data);
                        });
                    });

                    //search by button
                    $("#searchBtn").on("click", function() {
                        var searchText = $("#searchText").val();
                        if (searchText == "") return;
                        $.post('app/ajax/search.php', {
                            key: searchText
                        }, function(data, status) {
                            $("#chatList").html(data);
                        });
                    });



                    //auto update lase seen for logged in user
                    let lastSeenUpdate = function() {
                        $.get("app/ajax/update_last_seen.php")
                    };

                    lastSeenUpdate();

                    // auto update last seen every 10 seconds
                    setInterval(lastSeenUpdate, 10000);


                });
            </script>


        </main>
    </body>

    </html>



<?php

} else {
    header("Location: index.php");
    exit;
}

?>