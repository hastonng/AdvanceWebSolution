
<!-- ==============================
    Project:        Attendance System
    Version:        1.0
    Author:         Haston Ng
    Date Modified:  23/Feb/2020
================================== -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Custom Stylesheets -->
        <link href="<?=base_url();?>css/stylesheets.css" rel="stylesheet" type="text/css">

        <!-- Bootstrap v4.4.1 -->
        <link href="<?=base_url();?>css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
        
        <!--load Font-Awesome Styles -->
        <link href="<?=base_url();?>css/all.css" rel="stylesheet"> 
        
    </head>
    <body>
        <div id="main-area" class="jumbotron h-50">
            <div id="main-container" class="container">
                <div id="main-row" class="row justify-content-center">
                    <div id="main-col" class="col-sm">
                        <div id="main-profile-card" class="card" style="width: 18rem; height:18rem; text-align:center;">
                            <div id="profile-card" class="profile-circle rounded-circle border align-self-center" style="width: 8rem; height: 8rem; background-image: url(<?=base_url();?>assets/arulogo.png) !important; background-size: contain; background-repeat: no-repeat; background-position: 50% 50%; margin-top: 1rem;"></div>
                        <!-- <img src="<?=base_url();?>assets/arulogo.png" class="rounded-circle img-fluid" style="background:red; width:50%; height:50%"> -->
                            <div class="card-body d-flex flex-column">
                                <!-- <h5 class="card-title">Special title treatment</h5> -->
                                <!-- <i class="far fa-user fa-3x" style=" margin-top:5rem;"></i> -->
                                <p class="card-text">Profile</p>
                                <a href="#" class="btn btn-primary mt-auto stretched-link" style="background-color: #061D49 !important; border-color:#061D49 !important;">Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                    <div class="card"style="width: 18rem; height:18rem; text-align:center;">
                            <div class="card-body d-flex flex-column">
                                 <!-- <h5 class="card-title">Special title treatment</h5> -->
                                 <i class="fas fa-user-check fa-3x" style="margin:2rem;"></i>
                                <p class="card-text">View Your Attendance</p>
                                <a href="#2" class="btn btn-primary mt-auto stretched-link" style="background-color:#061D49 !important">Attendance</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                    <div class="card"style="width: 18rem; height:18rem; text-align:center;">
                            <div class="card-body d-flex flex-column">
                                 <!-- <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text" style="al">Home</p> -->
                                <a href="#2" class="btn btn-primary mt-auto stretched-link" style="background-color:#061D49 !important">Timetable</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            <!-- <h1>My First Bootstrap Page</h1>
            <p>Resize this responsive page to see the effect!</p>  -->
        </div>

        <div>
        <div class="container">
                <div class="row justify-content-center">
                <div class="col-sm">
                    <div id="main-profile-card" class="card" style="width: 27rem; height:18rem; text-align:center; margin:4rem 0rem 0rem 0rem; background-color:#061D49 !important">
                    <!-- style="width: 8rem; height: 8rem; background-image: url(<?=base_url();?>assets/arulogo.png) !important; background-size: contain; background-repeat: no-repeat; background-position: 50% 50%; margin-top: 1rem;"         -->
                    <div class="align-self-start" >
                        <h5 class="card-text" style="margin:1rem; color:#ffffff">All Modules</h5>
                    </div>
                        <!-- <img src="<?=base_url();?>assets/arulogo.png" class="rounded-circle img-fluid" style="background:red; width:50%; height:50%"> -->
                            <div class="card-body d-flex flex-column">
                                <?php include_once( $_SERVER['DOCUMENT_ROOT']."/AttendanceSystem/php/HomePagePHP.php") ?>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>      
    </body>
</html>