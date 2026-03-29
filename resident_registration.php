<?php 
     require('classes/resident.class.php');
    $residenteusebia->create_resident();
     //$data = $bms->get_userdata();

     
?>

<!DOCTYPE html> 
<html> 
    <head> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <style>
        
        .field-icon {
        margin-left: 74%;
        margin-top: -8%;
        position: absolute;
        z-index: 2;
        }
    </style>
    
    <body >

        <!-- eto yung navbar -->
        <nav class="navbar navbar-dark bg-primary sticky-top">
            <a class="navbar-brand" style="color: white;">EUSEBIA PAZ ARROYO NATIONAL HIGH SCHOOL</a>
        </nav>

        <div class="container-fluid"  style="margin-top: 4em;">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">Registration Form</h1>
                    <br>
                </div>
            </div>

            <div class="row margin mtop"> 
                <div class="col-sm"> </div>

                <div class="col-sm-8">   
                    <div class="card mbottom" style="margin-bottom: 3em;">
                        <div class="card-body" >
                            <form method="post" enctype='multipart/form-data' class="was-validated">

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label> Last Name: </label>
                                            <input type="text" class="form-control" name="lname"  placeholder="Enter Last Name" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mtop" >First Name: </label>
                                            <input type="text" class="form-control" name="fname"  placeholder="Enter First Name" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col"> 
                                        <div class="form-group">
                                            <label class="mtop"> Middle Name: </label>
                                            <input type="text" class="form-control" name="mi" placeholder="Enter Middle Name" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row"> 
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mtop">Contact Number:</label>
                                            <input type="tel" class="form-control" name="contact" maxlength="11" pattern="[0-9]{11}" placeholder="Enter Contact Number" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label>Email: </label>
                                            <input type="email" class="form-control" name="email"  placeholder="Enter Email" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" class="form-control" id="password-field" name="password" placeholder="Enter Password" required>
                                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label> House No: </label>
                                            <input type="text" class="form-control" name="houseno"  placeholder="Enter House No." required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label> Street: </label>
                                            <input type="text" class="form-control" name="street"  placeholder="Enter Street" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label> Barangay: </label>
                                            <input type="text" class="form-control" name="brgy"  placeholder="Enter Barangay" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label> Municipality: </label>
                                            <input type="text" class="form-control" name="municipal" placeholder="Enter Municipality" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mtop">Birth Date: </label>
                                            <input type="date" class="form-control" name="bdate" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mtop">Birth Place </label>
                                            <input type="text" class="form-control" name="bplace"  placeholder="Enter Birth Place" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label class="mtop">Nationality: </label>
                                            <input type="text" class="form-control" name="nationality"  placeholder="Enter Nationality" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col"> 
                                        <div class="form-group">
                                            <label>Status: </label>
                                            <select class="form-control" name="status" id="status" required>
                                                <option value="">Choose your Status</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Widowed">Widowed</option>
                                                <option value="Divorced">Divorced</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="number" class="form-control" name="age" placeholder="Enter Age" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                    <div class="col rb">
                                        <div class="form-group">
                                            <label class="mtop">Sex</label>
                                            <select class="form-control" name="sex" id="sex" required>
                                                <option value="">Choose your Sex</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>         
                                </div>

                                <div class="row">
                                  
                                    <div class="col"> 
                                        <div class="form-group">
                                            <label>Are you a registered voter? </label>
                                            <select class="form-control" name="voter" id="regvote" required>
                                                <option value="">...</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>                                    
                                    <div class="col"> 
                                        <div class="form-group">
                                            <label>Are you head of the family? </label>
                                            <select class="form-control" name="family_role" id="famhead" required>
                                                <option value="">...</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>

                                </div>

                                <br>
                                    
                                <input type="hidden" class="form-control" name="role" value="resident">
                                <a style="width: 130px; margin-left:35%;" class="btn btn-danger" href="index.php"> Back to Login</a>
                                <button style="width: 130px;" class="btn btn-primary" type="submit" name="add_resident"> Submit </button>
                                
                            </form>
                        </div>
                    </div> 
                </div>
                <div class="col-sm"> </div>
            </div>
        </div>
       
        <script>
            $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
            input.attr("type", "text");
            } else {
            input.attr("type", "password");
            }
            });
        </script>

        <script src="../BarangaySystem/bootstrap/js/bootstrap.bundle.js" type="text/javascript"> </script>
    </body>
</html>

