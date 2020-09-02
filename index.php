<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../website/img/coding-birds-online/coding-birds-online-favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../website/js/vendor/jquery-3.5.1.min.js"></script>
    <title>Check username availability in php using ajax - Selim Reza Swadhin</title>
    <!--==================CSS==================-->
    <link rel="stylesheet" href="../website/css/font-awesome.min.css">
    <link rel="stylesheet" href="../website/css/bootstrap.css">
    <link rel="stylesheet" href="../website/css/main.css">
    <!--==================CSS==================-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <center>
                        <img width="50 " src="../website/img/coding-birds-online/coding-birds-online-favicon.png" alt="no image">
                    </center>
                    <h5 class="card-title text-center">Check Username Availability</h5>
                    <?php
                    require_once 'config.php';

//                    if (isset($_POST['submit'])) {
//                        $username = $_POST['username'];
//                        $query = "SELECT * FROM bird_check_usernames WHERE username='$username'";
//                        $result = $connection->query($query);
//                        if ($result->num_rows > 0) {
//                            echo "<h2 style='color:red'>test^not available</h2>";
//                        }else{
//                            echo "<h2 style='color:green'>test^available</h2>";
//                        }
//
//                    }
                    ?>
                    <label>[ankit,manish,rohit not available]</label>
                    <form id="checkingForm" class="form-signin">
                        <div class="form-label-group">
                            <label for="inputEmail">Username<span style="color: #FF0000">*</span></label>
                            <input type="text" name="username" id="username" class="form-control" onkeyup="checkUsernameAvailablity();" placeholder="Start typing username" autocomplete="off" required>
                        </div> <br/>
                        <div class="form-label-group" id="usernameAvailabilityLoader" style="display: none">
                            <img src="loading-icon.gif"/>  <label for="inputEmail">Please Wait a moment...</label>
                        </div>
                        <div class="form-label-group" id="usernameAvailableLabel" style="display: none">
                            <img src="success-icon.png" width="20"/>  <label for="inputEmail">Username available</label>
                        </div>
                        <div class="form-label-group" id="usernameNotAvailableLabel" style="display: none">
                            <img src="error-icon.png" width="20"/>  <label for="inputEmail">Username not available </label>
                        </div>
<!--                        <div class="form-label-group">-->
<!--                            <label for="inputEmail"></label>-->
<!--                            <input type="submit" name="submit" id="username" class="form-control">-->
<!--                        </div>-->
                    </form>

                    <div class="row footer-bottom d-flex justify-content-between align-items-center">
                        <p class="col-lg-12 footer-text text-center">
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Designed & Developed <br> <i class="fa fa-heart-o" style="color: red" aria-hidden="true"></i> by <a href="https://selimrezaswadhin.com" target="_blank">Selim Reza Swadhin</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function checkUsernameAvailablity() {
        let username = $("#username").val();
        if (username !="") {
            $("#usernameAvailabilityLoader").show();
            $.post("availability-check-script.php",{key:"usernameCheck",username:username},function (response) {
                let data = response.split('^');
                if (data[1] == "available"){
                    $("#usernameAvailableLabel").show();
                    $("#usernameNotAvailableLabel").hide();
                }else if (data[1] == "notAvailable"){
                    $("#usernameNotAvailableLabel").show();
                    $("#usernameAvailableLabel").hide();
                }
                $("#usernameAvailabilityLoader").hide();
            });
        }else{
            $("#usernameAvailabilityLoader").hide();
            $("#usernameAvailableLabel").hide();
            $("#usernameNotAvailableLabel").hide();
        }
    }
</script>
<script src="../website/js/vendor/jquery-3.5.1.min.js"></script>
</body>
</html>
