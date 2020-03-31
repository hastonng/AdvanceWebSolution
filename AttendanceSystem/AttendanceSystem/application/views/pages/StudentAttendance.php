
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

        <!-- Bootstrap v4.4.1 -->
        <link href="<?=base_url();?>css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style>
            .progress-ring__circle 
            {
                transition: 0.35s stroke-dashoffset;
                transform: rotate(-90deg);
                transform-origin: 50% 50%;
            }
        </style>
    </head>
    <body>
        <h2 class="text-center border-bottom" style="margin:1rem 13rem 1rem 13rem; padding:0.4rem;"> Attendance </h2>
        <div class="container">
            <div class="row">
                <svg class="progress-ring rounded-circle shadow" width="300" height="300" style="margin:1rem;">
                    <circle class="progress-ring__circle shadow-lg" stroke="#061D49" stroke-width="17" fill="transparent" r="145" cx="150" cy="150"/>
                    <text x="50%" y="50%" text-anchor="middle" stroke-width="1" stroke="#061D49" fill="#061D49" dy=".3em" font-size="3em"><?php echo $attendance['aveAttendance']; ?>%</text>
                </svg>
                <div class="card shadow" style="width:22rem; height:15rem;  background-color:#061D49 !important; margin:1rem;">
                    <div class="align-self-start" >
                        <h5 class="card-text" style="margin:1rem; color:#ffffff">Dear, Haston Ng</h5>
                    </div>
                    <hr style="background-color: #fff !important; margin:0rem 1rem 0rem 1rem;"/>
                    <p class="card-text" style="margin:1rem 0rem 0rem 1rem; font-size:1.1rem; color:#fff">Your latest attendance report is ready to download.</p>
                    <button class="btn" style="margin:2rem; background-color:#ffd101; color:#061D49;" onClick="downloadBtn()"><strong>Download</strong></button>
                </div>
                <div class="card shadow" style="width:24rem; height:15rem; margin:1rem;">
                    <div class="align-self-start">
                        <h5 class="card-text" style="margin:1rem;">Personal Tutor</h5>
                    </div>
                    <hr style="background-color: #fff !important; margin:0rem 1rem 0rem 1rem;"/>
                    <div class="row" style="margin:1.5rem;">
                        <div class="personalTutor rounded-circle border" style="border-width:2px !important; border-color:#061D49 !important;"></div>
                        <div class="col">
                            <p><strong><?php echo $personalTutor[0]->First_Name," ",$personalTutor[0]->Last_Name ?></strong></p>
                            <p><?php echo $personalTutor[0]->Staff_Email?></p>
                            <p><?php echo $personalTutor[0]->PhoneNo?></p>
                        </div>
                    </div>
                </div>
                <p class="card-text" style="margin:1rem 0rem 0rem 1rem; font-size:1.5rem;">Your Average attendance so far this Trimester 2, <?php echo date('Y'); ?> is <strong><?php echo $attendance['aveAttendance']; ?>%</strong>.</p>
                <p class="card-text" style="margin:1rem 0rem 0rem 1rem; font-size:1.1rem;"><strong>*</strong> You are required to get at least <strong>80%</strong> attendance for each module to pass this trimester.</p>
                <p class="card-text" style="margin:1rem 0rem 0rem 1rem; font-size:1.1rem;"><strong>*</strong> Please make sure you're in regular contact with your Personal Tutor and Module Leader so that they can support you through your studies.</p>
                <div class="border-bottom" style="width:100%; margin:1rem 0rem 1rem 0rem;"></div>
            </div>
                <div class="card shadow" style="width:100%; height:20rem; margin:1rem;">
                    <div class="align-self-start" >
                        <h5 class="card-text" style="margin:1rem;">Modules Attendance</h5>
                    </div>
                    <hr style=" margin:0rem 1rem 0rem 1rem;"/>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <ul class="list-group list-group-horizontal-sm" style=" width: 100%; overflow-x: auto !important; overflow-y:hidden;">
                                    <?php include_once( $_SERVER['DOCUMENT_ROOT']."/AttendanceSystem/php/ModuleAttendance.php")?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <button type="button" class="btn shadow align-self-center" style="width:20rem; height:3rem; background-color:#061D49 !important; color:#fff; margin:0.3rem;" onClick="test()"> Test</button> -->
            </div>
        </div>
    </body>

    <script>
        var circle = document.querySelector('circle');
        var radius = circle.r.baseVal.value;
        var circumference = radius * 2 * Math.PI;

        circle.style.strokeDasharray = `${circumference} ${circumference}`;
        circle.style.strokeDashoffset = `${circumference}`;

        function setProgress(percent) 
        {
            const offset = circumference - percent / 100 * circumference;
            circle.style.strokeDashoffset = offset;
        }

        var ave = <?php echo $attendance['aveAttendance']; ?>; 
        setProgress(ave);
    </script>
    
    <script>
//    function reqListener () {
//       console.log(this.responseText);
//     }

//     var oReq = new XMLHttpRequest(); // New request object
//     oReq.onload = function() {
//         // This is where you handle what to do with the response.
//         // The actual data is found on this.responseText
//         alert(this.responseText); // Will alert: 42
//     };
//     oReq.open("POST", "attendance", true);
//     //                               ^ Don't block the rest of the execution.
//     //                                 Don't wait until the request finishes to
//     //                                 continue.
//     oReq.send();

    function downloadBtn()
    {
        var modAtt = <?php 
                        for($i = 0; $i < count($attendance['module']); $i++)
                        {
                            $modArray[$i] = array("ModuleCode" => $attendance['module'][$i][0]->Module_Code, 
                            "ModuleName" => $attendance['module'][$i][0]->Module_Name, 
                            "attPercentage" => $attendance['attendancePercentage'][$i]);
                        }
                        echo json_encode($modArray); 
                    ?>;

        var array =  [{ 
                    "fname":"<?php echo $fName?>",
                    "lname":"<?php echo $lName?>",
                    "date":"<?php echo date('j F Y');?>",
                    "averageAtt":"<?php echo $attendance['aveAttendance'];?>",
                    "modAtt": modAtt
                }]

        $.ajax
        ({
            type: "POST",
            url: "https://api.reporting.cloud/v1/document/merge?returnFormat=PDF&templateName=AttendanceReportTem.docx",
            dataType: "json",
            async: false,
            cache: false,
            headers: 
            {
                "Authorization": "ReportingCloud-APIKey WYg4pkp527TrGlsAym74TsXgh2jZKyQyjzGmqnDzM8"
            },
            data: 
            {
                "mergeData": array,
                "template": null,
                "mergeSettings": null
            },
            success: function (response) 
            {
                downloadDocument(JSON.stringify(response, null, "\t"));
            },
            error: function (response) 
            {
                alert(response[0]);
            }
        });
    }

    function downloadDocument(response) 
    {
        var documents = JSON.parse(response);
        download("report_"+"<?php echo $lName?>"+".pdf", documents[0]);
    }

    function download(filename, blob) {
        var element = document.createElement('A');
        element.setAttribute('href', 'data:application/octet-stream;base64,' + blob);
        element.setAttribute('download', filename);

        element.style.display = 'none';
        document.body.appendChild(element);

        element.click();

        document.body.removeChild(element);
    }
    </script>
</html>