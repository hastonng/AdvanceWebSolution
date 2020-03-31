
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Student Home Page">
        <meta name="generator" content="Jekyll v3.8.6">
        <title>Attendance System | Attendance</title>
        <!-- Custom Stylesheets -->
        <link href="<?=base_url();?>css/stylesheets.css?" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Bootstrap v4.4.1 -->
        <link href="<?=base_url();?>css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
        
        <script src="<?=base_url();?>js/timetable.js"></script>
    </head>
    <body>
        <h2 class="text-center border-bottom" style="margin:1rem 13rem 1rem 13rem; padding:0.4rem;"> Timetable </h2>
        <div class="container">
            <div class="row" style="margin-bottom:2rem;">
                <div class="col-3">
                    <div class="row" style="margin:0rem 3rem 0rem 3rem;">
                        <div class="square" style="background-color: #061D49;"></div>
                        <p style="margin-top:0.8rem !important;">Lecture</p>
                    </div>
                    <div class="row" style="margin:0rem 3rem 0rem 3rem;">
                        <div class="square" style="background-color: #ffd101;"></div>
                        <p  style="margin-top:0.8rem !important; font-size:15px">Practical</p>
                    </div>
                </div>
                <div class="col" style="margin:0rem 3rem 0rem 3rem;">
                    <p class="card-text" style="margin:1rem 0rem 1rem 1rem; font-size:1.1rem;"><strong>*</strong> Please be informed that all timetables are subject to changes.</p>
                    <p class="card-text" style="margin:1rem 0rem 1rem 1rem; font-size:1.1rem;"><strong>*</strong> This time table is only valid for Trimester 2, 2020.</p>
                </div>
            </div>
            <div class="card shadow" >
                <div class="row" style="margin:0rem 0.5rem 0rem 0.5rem;">
                    <div class="col border-right">
                        <div class="rounded-circle border text-center shadow" style="width:5.5rem; height:5.5rem; background-color:#061D49 !important; margin:1rem;">
                            <p class="bold" style="color:#fff; padding-top:1.8rem; font-size:1rem; margin:0px !important;">Monday</p>
                        </div>  
                    </div>
                    <div class="col-10 cont">
                        <div id="monClass" class="horizontal-scroll-wrapper" ></div>
                    </div>
                </div>
                <div class="row border-top" style="margin:0rem 0.5rem 0rem 0.5rem;">
                    <div class="col border-right">
                        <div class="rounded-circle border text-center shadow" style="width:5.5rem; height:5.5rem; background-color:#061D49 !important; margin:1rem;">
                            <p class="bold" style="color:#fff; padding-top:1.8rem; font-size:1rem; margin:0px !important;">Tuesday</p>
                        </div>  
                    </div>
                    <div class="col-10 cont">
                        <div id="tuesClass" class="horizontal-scroll-wrapper" ></div>
                    </div>
                </div>
                <div class="row border-top" style="margin:0rem 0.5rem 0rem 0.5rem;">
                    <div class="col border-right">
                        <div class="rounded-circle border text-center shadow" style="width:5.5rem; height:5.5rem; background-color:#061D49 !important; margin:1rem;">
                            <p class="bold" style="color:#fff; padding-top:1.8rem; font-size:0.9rem; margin:0px !important;">Wednesday</p>
                        </div>  
                    </div>
                    <div class="col-10 cont">
                        <div id="wedClass" class="horizontal-scroll-wrapper" ></div>
                    </div>
                </div>
                <div class="row border-top" style="margin:0rem 0.5rem 0rem 0.5rem;">
                    <div class="col border-right">
                        <div class="rounded-circle border text-center shadow" style="width:5.5rem; height:5.5rem; background-color:#061D49 !important; margin:1rem;">
                            <p class="bold" style="color:#fff; padding-top:1.8rem; font-size:1rem; margin:0px !important;">Thursday</p>
                        </div>  
                    </div>
                    <div class="col-10 cont">
                        <div id="thursClass" class="horizontal-scroll-wrapper" ></div>
                    </div>
                </div>
                <div class="row border-top" style="margin:0rem 0.5rem 0rem 0.5rem;">
                    <div class="col border-right">
                        <div class="rounded-circle border text-center shadow" style="width:5.5rem; height:5.5rem; background-color:#061D49 !important; margin:1rem;">
                            <p class="bold" style="color:#fff; padding-top:1.8rem; font-size:1rem; margin:0px !important;">Friday</p>
                        </div>  
                    </div>
                    <div class="col-10 cont">
                        <div id="friClass" class="horizontal-scroll-wrapper"> 
                        </div>
                    </div>
                </div>
                <div class="row border-top" style="margin:0rem 1rem 0rem 1rem;">
                    <div class="col">
                        <!-- <div class="rounded-circle border text-center shadow" style="width:5.5rem; height:5.5rem; background-color:#061D49 !important; margin:1rem;">
                            <p class="bold" style="color:#fff; padding-top:1.8rem; font-size:1rem; margin:0px !important;">Friday</p>
                        </div>   -->
                    </div>
                    <div class="col-10 cont">
                        <div class="horizontal-scroll-wrapper" style=" width:400px !important; max-height:1200px !important; height:1200px !important;">
                            <div class="modules">
                                <div class="card shadow border-top">
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <hr style="background-color: #fff !important; margin:5rem 1rem 3rem 1rem;"/>
        </div>
    </body>
</html>