<?php session_start();




?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
  <!--  All snippets are MIT license http://bootdey.com/license -->
  <title>profile with data and skills - Bootdey.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>


  <link rel="stylesheet" href="botstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


</head>

<body>


  <div class="container">
    <div class="main-body">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb" style="background-color:  #fff; ">
          <li class="breadcrumb-item"><a href="http://localhost/DiscountArena/homepagenew.html">Home</a></li>
          <li class="breadcrumb-item"><a href="http://localhost/DiscountArena/newsfeed/kesh.php">Newfeed</a></li>
          <li class="breadcrumb-item"><a href="http://localhost/DiscountArena/Customer/LoginandRegistration/logout-user.php">Logout</a></li>
          <li class="breadcrumb-item active" aria-current="page">User Profile</li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->

      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="<?php echo $_SESSION['image'] ?>" alt="Image" width="150">
                <div class="mt-3">
                  <h4><?php echo "Hi  " ?> <?php echo $_SESSION['name'] ?></h4>

                  <p class="text-muted font-size-sm"><?php echo $_SESSION['address'] ?></p>


                </div>
              </div>
            </div>
          </div>
          <div class="card mt-3">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <button class="btn btn-outline-primary" style="width: 100%;"><a href="chatbot.html">Message</a></button>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <button class="btn btn-outline-primary" style="width: 100%;"><a href="chatbot.html">Rate Sellers !</a></button>
              </li>

              <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                <button class="btn btn-outline-primary" style="width: 100%;"><a href="../../chat/home.php">Chat with Sellers</a></button>
              </li>

              </li>
            </ul>
          </div>
        </div>

        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $_SESSION['name'] ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $_SESSION['email'] ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $_SESSION['number'] ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Date of Birth</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $_SESSION['dob'] ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $_SESSION['address'] ?>
                </div>
              </div>
              <hr>

            </div>
          </div>

          <div class="row gutters-sm">
            <div class="col-sm-6 mb-3">

              <div class="wrapper">
                <div class="title">Having any trouble? Ask me !</div>
                <div class="form">
                  <div class="bot-inbox inbox">
                    <div class="icon">
                      <i class="fas fa-user"></i>
                    </div>
                    <div class="msg-header">
                      <p>Hello there, how can I help you?</p>
                    </div>
                  </div>
                </div>
                <div class="typing-field">
                  <div class="input-data">
                    <input id="data" type="text" placeholder="Type something here.." required>
                    <button id="send-btn">Send</button>
                  </div>
                </div>
              </div>



              <script>
                $(document).ready(function() {
                  $("#send-btn").on("click", function() {
                    $value = $("#data").val();
                    $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
                    $(".form").append($msg);
                    $("#data").val('');

                    // start ajax code
                    $.ajax({
                      url: 'message.php',
                      type: 'POST',
                      data: 'text=' + $value,
                      success: function(result) {
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                      }
                    });
                  });
                });
              </script>

            </div>
          </div>



        </div>
      </div>

    </div>
  </div>

  <style type="text/css">
    body {
      margin-top: 20px;
      color: #1a202c;
      text-align: left;
      background-color: #FBABE4;
    }

    .main-body {
      padding: 15px;
    }

    .card {
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 0 solid rgba(0, 0, 0, .125);
      border-radius: .25rem;
    }

    .card-body {
      flex: 1 1 auto;
      min-height: 1px;
      padding: 1rem;
    }

    .gutters-sm {
      margin-right: -8px;
      margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
      padding-right: 8px;
      padding-left: 8px;
    }

    .mb-3,
    .my-3 {
      margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
      background-color: #FBABE4;
    }

    .h-100 {
      height: 100% !important;
    }

    .shadow-none {
      box-shadow: none !important;
    }

    .breadcrumb:before {
      color: #fff;
    }

    .breadcrumb,
    .breadcrumb:last-child {
      color: #fff;
    }
  </style>

  <script type="text/javascript">

  </script>
</body>

</html>