<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Datus Analyticus</title>
    <link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body{
            margin:0;
            background-color:#d6d9e21a;
        }
        .nav-pills .nav-link.active, .nav-pills .nav-item.show .nav-link{
            background-color: #44444417 !important;
            color: black!important;
        }
    </style>
</head>
<body>
<!--nav-->
<nav class="navbar navbar-light justify-content-between" style="background: #0b5b9e78; margin-bottom: 15px; border-bottom: 2px solid #83a9caa8;">
    <a href="#" class="navbar-brand" style="font-family: Georgia, serif;">Datus Analyticus</a>
</nav>
<!--content-->
<div class="container">
    <div class="row">
        <div class=" col-3" style="padding: 23px; ">
            <div class="card" style="width: 216px; margin-left: 6px; border: 2px solid #1d1c1c14">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-profile" aria-selected="false">Updates</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-messages" aria-selected="false">Report</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#" role="tab" aria-controls="v-pills-settings" aria-selected="false">Constact us</a>
                </div>
            </div>
        </div>
        <div class="col-9" style="padding: 22px; ">
            <!--View post-->
            <div class="card" style="width: 45rem; padding: 10px; margin-bottom: 8px ;border: 2px solid #1d1c1c14">
                <div class="card-header" style="margin-bottom: 5px; text-align:center; background-color:#cfced4a8;">
                    <h5>Send us your suggestions</h5>
                </div>
                <img src="datsusimg.jpg" alt="" style="width: 100%; height: auto;">
                <label for="exampleTextarea"></label>
                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="What's on your mind?" style="height: 68px; margin-bottom: 5px; border-radius: 15px;"></textarea>
                <div class="form-check">
                    <input class="s" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Public
                    </label>
                </div>
                <div class="form-check">
                    <input class="" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                        Private
                    </label>
                </div>
                <div style="float: right;">
                    <button class="btn btn-primary" style="background-color: #0b5b9e; border: 2px solid #1d1e1f6b;height: 37px;width: 137px;border-radius: 17px">Post</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer-->
<footer style="background-color: #cec9c9eb; padding:40px;text-align: center;">
    <small>Datus Analyticus© 2018 by Leaf Org.</small>
</footer>
<script src="vendor/jquery/smooth-scroll.js"></script>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>