<?php 
    error_reporting(E_ALL ^ E_WARNING);
    
    if(!isset($_SESSION)) {
        $showdate = date("Y-m-d");
        date_default_timezone_set('Asia/Manila');
        $showtime = date("h:i:a");
        $_SESSION['storedate'] = $showdate;
        $_SESSION['storetime'] = $showdate;
        session_start();
    }

    //include('autoloader.php');
    require('classes/main.class.php');
    $eusebia->login();

   
?>

<!DOCTYPE html> 
<html> 
    <head> 
        <title> Eusebia Paz Arroyo National High School </title>
        <!-- responsive tags for screen compatibility -->
        <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">
        <!-- custom css --> 
        <link href="../BarangaySystem/css/index.css" rel="stylesheet" type="text/css">
        <!-- bootstrap css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"> 
        <!-- fontawesome icons --> 
        <script src="https://kit.fontawesome.com/67a9b7069e.js" crossorigin="anonymous"></script>
        <!-- fontawesome icons --> 
        <script src="../BarangaySystem/customjs/main.js" type="text/javascript"></script>

        <style> 
            body {
                background-image: url(icons/barangay.jpg);
                background-color: #110d44 !important;
            }
            .container-fluid {
                margin-top: 50px;
            }
            .input-container {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            width: 100%;
            margin-bottom: 10px;
            }

            .icon {
            padding: 15px;
            background: dodgerblue;
            color: white;
            min-width: 50px;
            text-align: center;
            }

            .input-field {
            width: 100%;
            padding: 10px;
            outline: none;
            }
          .header-content {
    display: flex;
    align-items: center;      /* Vertically centers the logo with the text */
    justify-content: center;   /* Centers the whole group on the screen */
    margin-bottom: 20px;       /* Adds space above the login card */
}

.login-logo {
    width: 100px;               /* Adjust size as needed */
    height: auto;
    margin-right: 10px;        /* Adds space between logo and the word */
}

.system-title {
    color: white;
    font-size: 24px;
    margin: 0;                 /* Removes default heading margins */
    font-weight: bold;
}

.sub-title {
    color: white;
    font-size: 14px;
    margin: 0;
    letter-spacing: 1px;
}
            .input-field:focus {
            border: 2px solid dodgerblue;
            }

            /* Set a style for the submit button */
            .btn {
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
            }

            .btn:hover {
            opacity: 1;
            }
        </style>

    </head>



    <body>


        <!-- This is the heading and card section --> 
        <section class="main-section"> 
        <div class="container-fluid"> 
           <div class="header-content">
    <img src="icons/eusebia.png" class="login-logo" alt="Logo">
    <div class="header-text">
        <h2 class="system-title">Eusebia Paz Arroyo National High School</h2>
        <p class="sub-title">Buluang, Baao </p>
    </div>
</div>
            <div class="row">
                <div class="col-sm"></div>
                    <div class="col-sm"> 
                        <div class="card main-card mtop"> 
                            <div class="card-body"> 
                                <form method="post"> 

                                    <label> Email </label>
                                    <div class="input-container">
                                        <i class="fa fa-envelope icon"></i>
                                        <input class="input-field" type="email" placeholder="Enter Email" name="email" required>
                                    </div>

                                    <label> Password </label>
                                    <div class="input-container">
                                        <i class="fa fa-key icon"></i>
                                        <input class="input-field" type="password" placeholder="Enter Password" id="myInput" name="password" required>
                                    </div>

                                    <br>

                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" onclick="myFunction()" class="custom-control-input" id="switch1">
                                        <label class="custom-control-label" for="switch1">Show Password</label>
                                    </div>

                                    <br>
                                    
                                    <button class="btn btn-primary login-button" type="submit" name="login"> Log-in </button>
                                
                                </form>

                                <hr>

                                <div class="registration-section"> 
                                    <p1> <strong> Haven't registered yet? </strong> </p1> 

                                    <br>

                                    <p1> Hindi ka pa rehistrado? </p1> 

                                    <br>

                                    <button class="btn btn-success create-button" onclick="trying();"> Create Account </button> 
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-sm"></div>
            </div>
                          
        </div>

        </section>
        <script>
            function myFunction() {
                var x = document.getElementById("myInput");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                }
            }

            function trying() {
                window.location.href = "resident_registration.php";
            }
        </script>

    </body>
</html>