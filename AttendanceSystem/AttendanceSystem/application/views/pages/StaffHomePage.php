
<!-- ==============================
    Project:        Attendance System
    Version:        1.0
    Author:         Haston Ng
    Date Modified:  23/Feb/2020
================================== -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Student Home Page">
        <meta name="generator" content="Jekyll v3.8.6">
        <title>Attendance System | Home Page</title>
        <!-- Custom Stylesheets -->
        <link href="<?=base_url();?>css/stylesheets.css" rel="stylesheet" type="text/css">

        <!-- Bootstrap v4.4.1 -->
        <link href="<?=base_url();?>css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
        
        <!--load Font-Awesome Styles -->
        <link href="<?=base_url();?>css/all.css" rel="stylesheet"> 
        
    </head>
    <body>
        <h2 class="text-center border-bottom" style="margin:1rem; margin:1rem 13rem 1rem 13rem; padding:0.4rem;"> Dashboard </h2>
        <div class="col text-center">
            <button  type="button" class="btn shadow" style="width:20rem; height:3rem; background-color:#061D49 !important; color:#fff; margin:0.3rem;">Manage Student</button>
            <button id="attendance" type="button" class="btn shadow" style="width:20rem; height:3rem; background-color:#061D49 !important; color:#fff; margin:0.3rem;">Attendance</button>
        </div>
        <div class="container">
            <div class="row">
               
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    document.getElementById("attendance").onclick = function () {
        window.location.href ="<?=base_url();?>Staff/Attendance";
    };
</script>