<!-- ==============================
    Project:        Attendance System
    Version:        1.0
    Author:         Haston Ng
    Date Modified:  23/Feb/2020
================================== -->
<html>
        <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="Student Home Page">
                <meta name="generator" content="Jekyll v3.8.6">
                 <!-- Custom Stylesheets -->
                <link href="<?=base_url();?>css/stylesheets.css?" rel="stylesheet" type="text/css">

                <!-- Jquery -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
                <!-- Bootstrap v4.4.1 -->
                <link href="<?=base_url();?>css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

                <script type="text/javascript" src="<?=base_url();?>js/bootstrap.js"></script>

                <!--load Font-Awesome Styles -->
                <link href="<?=base_url();?>css/all.css" rel="stylesheet">
        </head>
        <body>
        <div style="width:100%; height:5rem; background:url(<?=base_url();?>assets/arulogo2.png) no-repeat 15rem 15px;"></div>
        <nav class="navbar navbar-expand-lg  navbar-dark bg-light mt-3" style="height:3.5rem; background-color:#061D49 !important;">
                <a class="navbar-brand" style="color:#fff !important; text-align:right; padding:0.8rem 1rem 1rem 13rem; "><?php echo $fName?> <?php echo $lName?></a>
                <div style="width:12rem; background-color:#061D49 !important; border-radius:20px; position:absolute; left:60rem; bottom:-2rem; ">
                        <div class="headerImage rounded-circle border border-white dropdown "id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position: absolute;right:-10rem; bottom:3rem; border-width:2px !important;" onclick="dropdown()">
                                <div class="dropdown-menu justify-content-center" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">View Profile</a>
                                        <a class="dropdown-item" href="#">Modules</a>
                                        <a class="dropdown-item" href="#">Logout</a>
                                </div>          
                        </div>
                </div>
                <button class="navbar-toggler navbar-dark" style="background-color:#061D00 !important;" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                                <li class="nav-item">
                                        <a class="nav-link border-left" style="margin:2rem 0rem 2rem 0rem; padding-left : 1.5rem; border-width:1.5px !important;" href="<?=base_url();?>" >Home <span class="sr-only">(current)</span></a>
                                </li>
                        </ul>
                </div>
        </nav>
                
                
                
               