<!-- ==============================
    Project:        Attendance System
    Version:        1.0
    Author:         Haston Ng
    Date Modified:  23/Feb/2020
================================== -->

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Student Home Page">
        <meta name="generator" content="Jekyll v3.8.6">
        <title>Attendance System | Manage Student</title>

        <link href="<?=base_url();?>css/stylesheets.css?" rel="stylesheet" type="text/css">
        <link href="<?=base_url();?>css/all.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url();?>css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
        <link href="<?=base_url();?>css/bootstrap-datepicker.css" rel="stylesheet"> 
        <script src="<?=base_url();?>js/bootstrap-datepicker.js"></script>
        <!-- SweetAlert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 

    </head>

    <body>
    <h2 class="text-center border-bottom" style=" margin:1rem 13rem 1rem 13rem; padding:0.4rem;"> Search Students </h2>
    <div class="container">
        <div class="row">
           <div class="col">
           <div class="card m-3 shadow" style=" background-color:#660099 !important;">
                <div class="col-10">
                    <h5 class="card-text text-white" style="margin:1.5rem 1rem 0rem 1rem;">Search Students</h5>
                </div>
                <hr class="m-3 border-white" style=" height:3px;"/>
                <form id="searchStudentForm" >
                    <div class="row  m-3">
                        <div class="col-2" style="max-width:140px;">
                            <p class="m-1 font-weight-light text-white" style="font-size:1.2rem;">Student ID: </p>
                        </div>
                        <div class="col-5">
                            <input name="searchStudentID" class="form-control mb-4" id="tableSearch" type="text"placeholder="Enter Student ID">
                        </div>
                        <div class="col-3">
                            <button id="searchBtn" type="submit" class="btn btn-warning shadow col">
                                <span style="font-size:1rem; margin:5px;"><i class="fas fa-search"></i></span> 
                                Search
                            </button>
                        </div>
                        <div class="col-2" style="max-width:140px;">
                            <button id="viewAllStudent" type="submit" class="btn btn-secondary shadow col">
                                <span style="font-size:1rem; margin:5px;"><i class="fas fa-eye"></i></span> 
                                All
                            </button>
                        </div>
                    </div>
                    <div class="row m-3">
                        <div class="col-2" style="max-width:140px;">
                            <p class="m-1 font-weight-light text-white" style="font-size:1.2rem;">Course: </p>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <select id="courseSelect" name="course" class="selectpicker form-control">
                                    <option value="" selected hidden>Please select</option>
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="Christian Theology">Christian Theology</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            </div>
           </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card m-3 shadow">
                    <div class="col-10">
                        <h5 class="card-text" style="margin:1.5rem 1rem 0rem 1rem;">Search Results</h5>
                    </div>
                    <hr class="m-3" style=" height:3px;"/>
                    <div class="col ">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Student ID</th>
                                        <th>Student Email</th>
                                        <th>Course Programme</th>
                                        <th>Course Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="searchStudents"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="studentCollapseDiv" class="container collapse multi-collapse">
        <hr style=" margin:2rem;"/>
        <div class="row">
            <div class="col">
                <div class="card  m-3 shadow" style=" background-color:#660099 !important;" >
                    <div class="row">
                        <div id="studentImage" class="editHeaderImage rounded-circle " style="margin:2rem 1rem 0rem 3rem !important;"></div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <h5 id="StudentName" class="text-white font-weight-light" style="margin:2rem 1rem 0rem 0rem !important; font-size:1.5rem;"></h5>
                                    <p id="StudentID"class="mt-3 font-weight-light text-white" style="font-size:1.2rem;" ></p>
                                </div>
                            </div>
                            <div class="row text-white ">
                                <div class="col">
                                    <p id="StudentEmail" class="font-weight-light" style="font-size:1.2rem;"></p>
                                </div>
                                <div class="col">
                                    <p id="CourseName" class="font-weight-light" style="font-size:1.2rem;"></p>
                                </div>
                                <div class="col">
                                    <p id="CourseProg" class=" font-weight-light" style="font-size:1.2rem;"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="m-3 border-white" style=" height:3px;"/>
                    <div class="card m-2">
                        <div class="card shadow-sm m-3">
                            <div class="row">
                                <div class="col ">
                                    <h5 class="card-text" style="margin:1.5rem 2rem 0rem 2rem;">Modules</h5>
                                </div>
                            </div>
                            <hr class="m-3" style=" height:3px;"/>
                            <div class="row">
                                <div class="col justify-center">
                                    <ul id="studentModules" class="list-group  m-4 align-self-center" style="overflow-x:hidden;">
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card shadow-sm m-3">
                            <div class="row">
                                <div class="col ">
                                    <h5 class="card-text" style="margin:1.5rem 2rem 0rem 2rem;">Attendance</h5>
                                </div>
                                <div id="addModuleBtn" class="col-2" >
                                    <button class="btn btn-success col-sm-10 ml-4" type="button" data-toggle="collapse" data-target="#addModuleCollapse" aria-expanded="false" aria-controls="addModuleCollapse" style="margin:1.5rem 1rem 0rem 0rem;  ">
                                    <span style="font-size:1rem; margin:5px;"><i class="fas fa-plus"></i></span>    
                                    <strong>Add</strong>
                                    </button>
                                </div>
                                <div class="col-2">
                                    <button  id="showMoreBtn" class="btn btn-secondary col-sm-8" type="button" data-toggle="collapse" data-target="#moreAttendance,#modDivCol" aria-expanded="false" aria-controls="moreAttendance modDivCol" style="margin:1.5rem 1rem 0rem 0rem;  ">
                                    <span style="font-size:1rem; margin:5px;"><i id="modChevron" class="fas fa-chevron-down "></i></span>    
                                    <strong id="modMore">More</strong>
                                    </button>
                                </div>
                            </div>
                            <hr class="m-3" style=" height:3px;"/>
                            <div class="row">
                                <div class="col" >
                                    <ul class="list-group card shadow-sm m-4" style="margin-left:2rem !important; overflow:hidden; max-height:800px;">
                                        <div id="moreAttendance" class="collapse multi-collapse"> </div>
                                        <div id="modDivCol" class="row border-bottom border-top collapse multi-collapse"></div>
                                        <div class="row border-bottom">
                                            <div class="col text-center " style="background-color:#660099 !important; ">
                                                <h5 class="card-text text-center text-white m-4">Overall Attendance (%)</h5>
                                            </div>
                                            <div class="col text-center ">
                                                <h5  class="m-4" ><strong id="aveAtt"></strong></h5>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                                <div id="addModuleCollapse" class="collapse multi-collapse col-6">
                                    <div class="card m-4 shadow-sm">
                                        <div class='row'>
                                            <div class="col">
                                                <p class="font-weight-light m-3" style="font-size:1.2rem; "><strong>Add Attendance</strong></p>
                                                <hr class="m-2" style=" height:3px;"/>
                                                <form id="addAttendanceForm">
                                                <p class="m-3"><strong>Class:</strong></p>  
                                                <div class="form-group m-3">
                                                    <select id="selectModule" name="selectModule" class="selectpicker form-control" ></select>
                                                </div>
                                                <p class="m-3"><strong>Week: </strong></p>  
                                                <div class="form-group m-3">
                                                    <select id="weekNum" name="week" class="selectpicker form-control" >
                                                        <option value="" selected hidden>Please select</option>
                                                        <option value="1">Week 1</option>
                                                        <option value="2">Week 2</option>
                                                        <option value="3">Week 3</option>
                                                        <option value="4">Week 4</option>
                                                        <option value="5">Week 5</option>
                                                        <option value="6">Week 6</option>
                                                        <option value="7">Week 7</option>
                                                        <option value="8">Week 8</option>
                                                        <option value="9">Week 9</option>
                                                        <option value="10">Week 10</option>
                                                        <option value="11">Week 11</option>
                                                        <option value="12">Week 12</option>
                                                    </select>
                                                </div>
                                                <p class="m-3"><strong>Date:</strong></p>  
                                                <div class="m-3" id="sandbox-container2">
                                                    <div class="input-group date">
                                                        <input id="setDate" name="setDate" type="text" class="form-control" readonly><span class="input-group-addon" style="font-size:1.3rem;"><i class="fas fa-calendar-alt"></i></span>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <button id="addAttenBtn" type="submit" class="btn btn-success m-3 shadow col-4" disabled >
                                                    <span style="font-size:1rem; margin:5px;"><i class="fas fa-check-circle"></i></span>        
                                                        Done
                                                    </button>
                                                    <button type="button" class="btn btn-danger m-3 col-3 shadow" data-toggle="collapse" data-target="#addModuleCollapse" aria-expanded="false" aria-controls="collapseDiv textCollapse">Cancel</button>
                                                </div>
                                                <input id="sID" name="sID" type="hidden"  value=""/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="m-2" style=" height:3px;"/> -->
                        <div class="card shadow-sm m-3" >
                            <div class="row">
                                <div class="col ">
                                    <h5 class="card-text" style="margin:2rem 2rem 0rem 2rem;">Attendance List</h5>
                                </div>
                                <div class="col-2">
                                    <button  id="attListBtn" class="btn btn-secondary col-sm-10" type="button" data-toggle="collapse" data-target=".allCollpase" aria-expanded="false" aria-controls="attendanceListCol attParagraph" style="margin:1.5rem 1rem 0rem 0rem;  ">
                                    <span style="font-size:1rem; margin:5px;"><i id="attChevron" class="fas fa-chevron-down "></i></span>    
                                    <strong id="seeList">See List</strong>
                                    </button>
                                </div>
                            </div>
                            <hr class="m-3" style=" height:3px;"/>
                            <div class="row">
                                <div id="attParagraph" class="col allCollpase show collapse multi-collapse">
                                    <p class="font-weight-light" style="margin:0rem 2rem 1rem 2rem; font-size:1.2rem;">Click 'See List' to view all Attendance List of student.</p>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div id="attendanceListCol" class="col allCollpase collapse multi-collapse">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Module Name</th>
                                                        <th>Date</th>
                                                        <th>Week</th>
                                                        <th>Class</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="attendanceList"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr style=" margin:2rem 13rem 3rem 13rem;"/>


<script type="text/javascript">

const serialize_form = form => JSON.stringify(
    Array.from(new FormData(form).entries())
    .reduce((m, [ key, value ]) => Object.assign(m, { [key]: value }), {})
);

$(document).ready(function() {
    $("#StudentNameField").val( $("#StudentName").text());
    $("#StudentIDField").val( $("#StudentID").text());
    $('#sandbox-container2 .input-group.date').datepicker({
        format: "dd/mm/yyyy",
        keyboardNavigation: false,
    });
    $('#setDate, #selectModule, #weekNum').change(function(){
        if($('#setDate').val() === '' || $('#selectModule').val() === '' || $('#weekNum').val() === '')
        {
            $('#addAttenBtn').attr('disabled',true)
        } 
        else{
        $('#addAttenBtn').attr('disabled',false);
        }
    });
    $("#attListBtn").click(function () {
        $(this).find('#attChevron').toggleClass('fas fa-chevron-down  fas fa-chevron-up ');
        $('#seeList').text(function(i, text){
          return text === "See List" ? "Hide List" : "See List";
        });
    }); 
    $("#showMoreBtn").click(function () {
        $(this).find('#modChevron').toggleClass('fas fa-chevron-down  fas fa-chevron-up ');
        $('#modMore').text(function(i, text){
          return text === "More" ? "Less" : "More";
           
        });
    });
});


$('#viewAllStudent').on('click',function(event) {
    event.preventDefault();
    $('#searchStudents tr').remove();
    $('#viewAllStudent').attr('disabled',true);

    var selectedCourse = $('#courseSelect').val();
    var json = [{"course":selectedCourse}];

    $.ajax({
        type: 'POST',
        url: "<?=base_url("Staff/viewAllStudent");?>",
        headers: 
            {
                'Content-Type':'application/json'
            },
        dataType: 'json',
        data: JSON.stringify(json),
        contentType: 'application/json',
        success: function(response)
        {
            $('#viewAllStudent').attr('disabled',false);

            if(response)
            {
                for(var i=0; i < response.length; i++)
                {
                    var mod = $('<tr>'+
                    '<td id=\"name_'+i+'\">'+response[i]['First_Name']+' '+response[i]['Last_Name']+'</td>'+
                    '<td id=\"sID_'+i+'\">'+response[i]['Student_ID']+'</td>'+
                    '<td id=\"sEmail_'+i+'\">'+response[i]['Student_Email']+'</td>'+
                    '<td id=\"sCP_'+i+'\">'+response[i]['Course_Prog']+'</td>'+
                    '<td id=\"sCN_'+i+'\">'+response[i]['Course_Name']+'</td>'+
                    '<td><button id=\"viewSBtn_'+i+'\" type=\"button\" class=\"btn btn-info col shadow\" onClick=\"setViewStudent('+i+')\" data-toggle=\"collapse\" data-target=\"#studentCollapseDiv\" aria-expanded=\"false\" aria-controls=\"studentCollapseDiv \" >'+
                    '<span style=\"font-size:1rem; margin:3px;\">'+
                    '<i class=\"far fa-eye\"></i></span> View</button>'+
                    '</td></tr>');        
                    
                    mod.appendTo("#searchStudents");
                }
            }
            else
            {
                Swal.fire({
                icon: 'error',
                title: 'No Student found',
                text: 'No student record found. Please try again.'
                })
            }
        }
    });
});

$('#searchStudentForm').on('submit', function(event) {
    event.preventDefault();
    const json = serialize_form(this);
    $('#searchStudents tr').remove();
    $('#searchBtn').attr('disabled',true);
    

    $.ajax({
        type: 'POST',
        url: "<?=base_url("Staff/searchStudent");?>",
        headers: 
            {
                'Content-Type':'application/json'
            },
        dataType: 'json',
        data: json,
        contentType: 'application/json',
        success: function(response)
        {
            $('#searchBtn').attr('disabled',false);
            if(response)
            {
                for(var i=0; i < response.length; i++)
                {
                    var mod = $('<tr>'+
                    '<td id=\"name_'+i+'\">'+response[i]['First_Name']+' '+response[i]['Last_Name']+'</td>'+
                    '<td id=\"sID_'+i+'\">'+response[i]['Student_ID']+'</td>'+
                    '<td id=\"sEmail_'+i+'\">'+response[i]['Student_Email']+'</td>'+
                    '<td id=\"sCP_'+i+'\">'+response[i]['Course_Prog']+'</td>'+
                    '<td id=\"sCN_'+i+'\">'+response[i]['Course_Name']+'</td>'+
                    '<td><button id=\"viewSBtn_'+i+'\" type=\"button\" class=\"btn btn-info col shadow\" onClick=\"setViewStudent('+i+')\" data-toggle=\"collapse\" data-target=\"#studentCollapseDiv\" aria-expanded=\"false\" aria-controls=\"studentCollapseDiv \" >'+
                    '<span style=\"font-size:1rem; margin:3px;\">'+
                    '<i class=\"far fa-eye\"></i></span> View</button>'+
                    '</td></tr>');        
                    
                    mod.appendTo("#searchStudents");
                }
            }
            else
            {
                Swal.fire({
                icon: 'error',
                title: 'No Student found',
                text: 'No student record found. Please try again.'
                })
            }
        }
    });
});

function setViewStudent(currElement)
{
    getAttendanceList(currElement);
    var radius = 55;
    var circumference = radius * 2 * Math.PI;
    var offset = circumference - 75.0 / 100 * circumference;
    var imageUrl = "<?=base_url();?>assets/sImage/"+$("#sID_"+currElement).text()+"_userImg.png";

    $('#studentModules').empty();
    $('#selectModule').empty();
    $('#moreAttendance').empty();
    $('#aveAtt').text('');
    $('#studentImage').css('background-image', 'url("' + imageUrl + '?'+<?php echo time();?>+'")');
    $('#StudentName').text($("#name_"+currElement).text());
    $('#StudentID').text($("#sID_"+currElement).text());
    $('#sID').val($("#sID_"+currElement).text());
    $('#StudentEmail').text($("#sEmail_"+currElement).text());
    $('#CourseProg').text($("#sCP_"+currElement).text());
    $('#CourseName').text($("#sCN_"+currElement).text());

    var json = {"sID":$("#sID_"+currElement).text()};

    $.ajax({
    type: 'POST',
    url: "<?=base_url("Staff/getStudentModule");?>",
    headers: 
    {
        'Content-Type':'application/json'
    },
    dataType: 'json',
    data: JSON.stringify(json),
    contentType: 'application/json',
    success: function(response)
    {
        if(response)
        {
            $('#studentModules').empty();
            $('#selectModule').empty();
            $('#moreAttendance').empty();
            $('#aveAtt').text('');
            $('#aveAtt').text(response['attendance']['aveAttendance']+"%");

            var modHeader = $('<a id=\"moduleHeader\" class=\"list-group-item text-white\" style=\" background-color:#660099 !important;\">'+
                                    '<strong>All Modules </strong>'+
                                    '<span id=\"totalModuleBadge\" class=\"badge badge-light ml-2\"></span>'+
                                '</a>')
            modHeader.appendTo("#studentModules");           

            for(var i=0; i < response['student_module'].length; i++)
            {
                var mod = $('<li class=\"list-group-item list-group-item-action\">'+response['student_module'][i]['Module_Code']+' - '+response['student_module'][i]['Module_Name']+'</li>');        
                mod.appendTo("#studentModules");
            }
            $('#totalModuleBadge').text(response['student_module'].length); 


            //Select modules to add
            var selectModHead = $('<option value=\"\" selected hidden>Please select</option>');
            selectModHead.appendTo("#selectModule");

            for(var i=0; i < response['class_module'].length; i++)
            {
                var classType;
                if(response['class_module'][i]['Class_Type'] == 1)
                {
                    classType = "Lecture";
                }
                else
                {
                    classType = "Practical";
                }
                var selectMod = $('<option value=\"'+response['class_module'][i]['Class_ID']+'\">'+response['class_module'][i]['Module_Code']+' - '+response['class_module'][i]['Module_Name']+' | <p><strong>'+classType+'</strong></p></option>');
                selectMod.appendTo("#selectModule");
            }


            for(var i=0; i < response['attendance']['attendancePercentage'].length; i++)
            {
                var moduleAttendance = $('<div class=\"row border-bottom\">'+
                                    '<div class=\"col text-center" style=\"background-color:#660099 !important;\">'+
                                        '<p class=\"card-text text-center text-white m-3\">'+response['attendance']['module'][i][0]['Module_Name']+'</p>'+
                                    '</div>'+
                                    '<div class=\"col text-center\">'+
                                        '<p class=\"m-3\"><strong>'+response['attendance']['attendancePercentage'][i]+'%</strong></p>'+
                                    '</div>'+
                                '</div>');
                moduleAttendance.appendTo("#moreAttendance");
            }
        }
        else
        {
            Swal.fire({
            icon: 'error',
            title: 'No Module found',
            text: 'No student record found. Please try again.'
            })
        } 
    }
    });
}


function getAttendanceList(currElement)
{
    $('#attendanceList tr').remove();
    var json = {"sID":$("#sID_"+currElement).text()};

    $.ajax({
    type: 'POST',
    url: "<?=base_url("Staff/getAttendanceList");?>",
    headers: 
    {
        'Content-Type':'application/json'
    },
    dataType: 'json',
    data: JSON.stringify(json),
    contentType: 'application/json',
        success: function(response)
        {
            if(response)
            {
                for(var i=0; i < response.length; i++)
                {
                    var classType;
                    if(response[i]['Class_Type'] == 1)
                    {
                        classType = "Lecture";
                    }
                    else
                    {
                        classType = "Practical";
                    }

                    var attendanceTD = $('<tr>'+
                    '<td id=\"id_'+i+'\" hidden>'+response[i]['Attendance_ID']+'</td>'+
                    '<td id=\"no_'+i+'\">'+(i+1)+'.</td>'+
                    '<td id=\"moduleName_'+i+'\">'+response[i]['Module_Name']+'</td>'+
                    '<td id=\"date_'+i+'\">'+toDate(response[i]['Date_'])+'</td>'+
                    // '<td id=\"date_'+i+'\">'+response[i]['Date_']+'</td>'+
                    '<td id=\"week_'+i+'\">'+response[i]['Week_ID']+'</td>'+
                    '<td id=\"class_'+i+'\">'+classType+'</td>'+
                    '<td><button id=\"viewSBtn_'+i+'\" type=\"button\" class=\"btn btn-danger col-8 shadow ml-3\" onClick=\"deleteAttendance('+response[i]['Attendance_ID']+')\">'+
                    '<span style=\"font-size:1rem; margin:3px;\">'+
                    '<i class=\"far fa-trash-alt\"></i></span> Delete</button>'+
                    '</td></tr>');

                    attendanceTD.appendTo("#attendanceList");

                }   
            }
        }
    });
}

$('#addAttendanceForm').on('submit', function(event) {
    event.preventDefault();
    const json = serialize_form(this);
    $('#addAttenBtn').attr('disabled',true);


    $.ajax({
    type: 'POST',
    url: "<?=base_url("Staff/addAttendance");?>",
    headers: 
    {
        'Content-Type':'application/json'
    },
    dataType: 'json',
    data: json,
    contentType: 'application/json',
    success: function(response)
    {
        $('#addAttenBtn').attr('disabled',false);

        Swal.fire({
        title: 'Success',
        text: "Attendance successfully updated.",
        icon: 'success',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ok'
        }).then((result) => {
        if (result.value) {
            location.reload();
        }
        });
    }
    });
});


function deleteAttendance(aId)
{
    var json = {"aID":aId};

    Swal.fire({
    title: 'Confirm Delete?',
    text: "Are you sure to delete Attendance?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Confirm'
    }).then((result) => {
        if (result.value) 
        {
            $.ajax({
            type: 'POST',
            url: "<?=base_url("Staff/dltAttendance");?>",
            headers: 
            {
                'Content-Type':'application/json'
            },
            dataType: 'json',
            data: JSON.stringify(json),
            contentType: 'application/json',
            success: function(response)
            {
                Swal.fire({
                title: 'Success',
                text: "Attendance successfully Deleted.",
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
                }).then((result) => {
                if (result.value) {
                    location.reload();
                }
                });
            }
            });
        }
    });
}

function toDate(dateStr) {
  var year = dateStr.substr(-4);
  var month = dateStr.substr(-6, 2);
  var date = dateStr.substr(-8, 2);
  return (date+"/"+month+"/"+year);
}
</script>