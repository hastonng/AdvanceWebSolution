
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
        <title>Attendance System | Home</title>
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
            <button id="checkAttendance" type="button" class="btn shadow" style="width:20rem; height:3rem; background-color:#061D49 !important; color:#fff; margin:0.3rem;">Check Attendance</button>
            <button id="timetable" type="button" class="btn shadow" style="width:20rem; height:3rem; background-color:#061D49 !important; color:#fff; margin:0.3rem;">Timetable</button>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card shadow mt-5" style="width: 30rem; height:20rem;  background-color:#061D49 !important">
                    <div class="align-self-start" >
                        <h5 class="card-text" style="margin:1rem; color:#ffffff">Current Modules</h5>
                    </div>
                        <hr style="background-color: #fff !important; margin:0rem 1rem 0rem 1rem;"/>
                            <div class="card-body d-flex flex-column">
                                <ul class="list-group" style="overflow:auto; -webkit-overflow-scrolling: touch;">
                                    <?php include_once( $_SERVER['DOCUMENT_ROOT']."/AttendanceSystem/php/CurrentModule.php") ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mt-5" style="width: 38rem; height:20rem; background-color:#fff !important">
                    <div class="align-self-start" >
                        <h5 class="card-text" style="margin:1rem; ">Upcoming Modules</h5>
                    </div>
                        <hr style="background-color: #fff !important; margin:0rem 1rem 0rem 1rem;"/>
                            <div class="card-body d-flex flex-column" style="padding:0.5rem !important;">
                                <ul class="list-group list-group-flush" style="overflow:auto; -webkit-overflow-scrolling: touch;">
                                    <div class="container" style="margin:0rem 0rem 0.8rem 0rem;">
                                        <div class="row">
                                            <div class="col-sm-3 d-flex justify-content-center">
                                                <div class="rounded-circle text-center shadow" style="width:5.5rem; height:5.5rem; background-color:#061D49 !important; margin-top:1rem; margin-left:0.5rem;">
                                                    <p class="bold" style="color:#fff; padding-top:1.2rem; font-size:1.1rem; margin:0px !important;"><strong><?php echo date('d');?></strong><?php echo date('S');?></p>
                                                    <p class="bold" style="color:#fff; font-size:1.3rem; margin:0px !important;"><?php echo date('M');?></p>
                                                </div>
                                            </div>
                                            <div class="col-sm" style="margin-right:1rem; padding:0.7rem;">
                                                <h5><?php echo date('l');?></h5>
                                                <div class="container border-top">
                                                    <?php include_once( $_SERVER['DOCUMENT_ROOT']."/AttendanceSystem/php/UpcomingModule.php")?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container" style="margin:0rem 0rem 0.8rem 0rem;">
                                        <div class="row">
                                            <div class="col-sm-3 d-flex justify-content-center">
                                                <div class="rounded-circle border text-center shadow" style="width:5.5rem; height:5.5rem; background-color:#061D49 !important; margin-top:1rem; margin-left:0.5rem;">
                                                    <p class="bold" style="color:#fff; padding-top:1.2rem; font-size:1.1rem; margin:0px !important;">
                                                        <?php echo date("dS", mktime(0,0,0,date("n", time()),date("j",time())+ 1 ,date("Y", time())))?>
                                                    </p>
                                                    <p class="bold" style="color:#fff; font-size:1.3rem; margin:0px !important;">
                                                        <?php echo date("M", mktime(0,0,0,date("n", time()),date("j",time())+ 1 ,date("Y", time())));?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm" style="margin-right:1rem; padding:0.7rem; ">
                                                <h5><?php echo date("l", mktime(0,0,0,date("n", time()),date("j",time())+ 1 ,date("Y", time())));?></h5>
                                                <div class="border-top">
                                                    <?php include_once( $_SERVER['DOCUMENT_ROOT']."/AttendanceSystem/php/todayModule.php")?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    document.getElementById("checkAttendance").onclick = function () {
        window.location.href ="<?=base_url();?>Student/attendance";
    };

    document.getElementById("timetable").onclick = function () {
        window.location.href ="<?=base_url();?>Student/timetable";
    };
</script>