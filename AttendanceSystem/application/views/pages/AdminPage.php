
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

        <link href="<?=base_url();?>css/stylesheets.css?" rel="stylesheet" type="text/css">
        <link href="<?=base_url();?>css/all.css" rel="stylesheet" type="text/css">
        <link href="<?=base_url();?>css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />
        <link href="<?=base_url();?>css/bootstrap-datepicker.css" rel="stylesheet"> 
        <script src="<?=base_url();?>js/bootstrap-datepicker.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
        
</head>
<body>
<h2 class="text-center border-bottom" style=" margin:1rem 13rem 1rem 13rem; padding:0.4rem;"> Dashboard </h2>
<div class="container">
    <div class="row">
        <div class="card shadow m-3 col ">
            <div class="row">
                <div class="col-10">
                    <h5 class="card-text" style="margin:1.5rem 1rem 0rem 1rem;">Announcement Board</h5>
                </div>
                <div class="col-2">
                    <button class="btn btn-warning col-sm-10" type="button" data-toggle="collapse" data-target=".anncCol" aria-expanded="false" aria-controls="anncCollapseDiv anncTableCol" style="margin:0.8rem 1rem 0rem 0rem; ">
                            <span style="font-size:1rem; margin:5px;"><i class="fas fa-plus"></i></span>    
                            <strong>Add</strong>
                    </button>
                </div>
            </div>
            <hr class="m-3" style=" height:3px;"/>
            <div class="row">
                <div class="col" >
                    <div class="card shadow-sm" style="max-height:25rem; background-color:#660099 !important; margin-bottom:1rem;">
                        <div class="row">
                            <div class="col">
                                <p class=" font-weight-light text-white" style="font-size:1.2rem; margin:1.5rem 1rem 0rem 1rem;">
                                <span style="font-size:1rem; margin:5px;"><i class="far fa-newspaper"></i></span>    
                                <strong>Latest Announcements</strong></p>
                            </div>
                        </div>
                        <hr class="m-3 border-white" style="height:3px;"/>
                        <div class="row">
                            <div id="anncTableCol" class="col anncCol show m-3 collapse multi-collapse">
                                <div class="table-responsive card" style="max-height:270px; background-color:#fff !important; overflow-x:hidden;">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Title</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="annoucementList"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="m-3" style="height:3px;"/>
                <div class="row">
                    <div id="anncCollapseDiv" class="col anncCol collapse multi-collapse">
                        <div class="col card shadow-sm mb-3 mr-4" style="background-color:#660099 !important;">
                            <h4 class="mt-3 ml-2 mr-2 mb-2 text-center text-white" style="font-size:1.3rem;">
                            <span style="font-size:1.3rem; margin:5px;"><i class="fas fa-bullhorn"></i></span>
                            <strong>Create Announcement</strong></h4>
                            <hr class="m-2 border-white" style=" height:3px;"/>
                            <form id="newAnnoucementForm">
                                <div class="form-group m-3">
                                    <div class="col">
                                        <label for="anncoucementTitle" class="font-weight-light text-white" style="font-size:1.2rem;">Announcements Title:</label>
                                        <textarea name="anncoucementTitle" class="form-control" id="anncoucementTitle" placeholder="Enter Title here.." rows="1" ></textarea>
                                    </div>
                                    <div class="col mt-3">
                                        <label for="anncoucementDesc"  class="font-weight-light text-white" style="font-size:1.2rem;">Announcements Description:</label>
                                        <textarea name="anncoucementDesc" class="form-control" id="anncoucementDesc" placeholder="Enter announcement details here.." rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <button id="postAnncBtn" type="submit" class="btn btn-success m-3 shadow col-4" disabled>
                                    <span style="font-size:1rem; margin:5px;"><i class="fas fa-share"></i></span>        
                                    Post
                                    </button>
                                    <button type="button" class="btn btn-secondary m-3 col-3 shadow" data-toggle="collapse" data-target=".anncCol" aria-expanded="false" aria-controls="anncCollapseDiv anncTableCol" >
                                    Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card shadow m-3 col" >
                <div class="row">
                    <div class="col-10">
                        <h5 class="card-text" style="margin:1.5rem 1rem 0rem 1rem; ">Trimester Settings</h5>          
                    </div>
                    <div class="col-2">
                        <button class="btn btn-warning col-sm-10" type="button" data-toggle="collapse" data-target=".triCol" aria-expanded="false" aria-controls="triCollapseDiv textCollapse" style="margin:0.8rem 1rem 0rem 0rem;  ">
                        <span style="font-size:1rem; margin:5px;"><i class="fas fa-cog"></i></span>    
                        <strong>Settings</strong>
                        </button>
                    </div>
                </div>    
                <hr class="m-3" style="height:3px;"/>
                <div class="row">
                    <div class="card col shadow" style="max-height:11rem; max-width:800px; margin:0rem 2rem 1rem 2rem; background-color:#660099 !important;">
                        <div class="row">
                            <p class="text-white font-weight-light m-3" style="font-size:1.2rem;"><strong>Current Trimester</strong></p>
                        </div>
                            <hr class="border-white" style="margin: 0rem !important;"/>
                            <div id="currentTrimester " class="row">
                                <div class="col">
                                    <div class="row m-3">
                                        <p class="text-white font-weight-light ml-3" style="font-size:1.2rem;"><strong>Start Date:</strong></p>
                                        <p id="startDate" class="text-white font-weight-light ml-3" style="font-size:1.2rem;">N/A</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row m-3">
                                        <p class="text-white font-weight-light ml-3" style="font-size:1.2rem;"><strong>End Date:</strong></p>
                                        <p id="endDate" class="text-white font-weight-light ml-3" style="font-size:1.2rem;">N/A</p>
                                    </div>
                                </div>
                            </div>
                            <div id="textCollapse" class="row triCol collapse multi-collapse" >
                                <p class="text-white font-weight-light ml-3 col"> &nbsp; &nbsp; Set the Start and End Date for the current Trimester.</p>
                            </div>
                            </div>
                            <div id="triCollapseDiv" class="col-4 triCol card shadow collapse multi-collapse mb-4 mr-4 p-3">
                                <p class="font-weight-light text-center" style="font-size:1.2rem; margin:0rem !important;"><strong>Edit Trimester</strong></p>
                                <hr class="m-2" style=" height:3px;"/>
                                <p class="m-1" style="margin:0rem 0rem 0rem 0rem !important;"><strong>Start Date:</strong></p>  
                                <div class="m-1" id="sandbox-container" >
                                    <div class="input-group date">
                                        <input id="setStartDate" type="text" class="form-control" readonly><span class="input-group-addon" style="font-size:1.3rem;"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                                <p class="m-1" style="margin:1rem 0rem 0rem 0rem !important;"><strong>End Date:</strong></p>  
                                <div class="m-1" id="sandbox-container2">
                                    <div class="input-group date">
                                        <input id="setEndDate" type="text" class="form-control" readonly><span class="input-group-addon" style="font-size:1.3rem;"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <button id="setTrimesterDone" type="submit" class="btn btn-success m-3 shadow col-4" disabled >Done</button>
                                    <button type="button" class="btn btn-secondary m-3 col-3 shadow" data-toggle="collapse" data-target=".triCol" aria-expanded="false" aria-controls="triCollapseDiv textCollapse">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>    
    </div>
    <hr style=" margin:5rem 13rem 3rem 13rem;"/>

    <!-- Modals -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color:#660099 !important;">
                    <div class="col">
                        <h4 class="modal-title text-white " id="annoucementTitle"></h4>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">×</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="row shadow-sm">
                    <div class="col">
                        <label id="annoucementDate" class="modal-title ml-3 mt-1 mb-3 font-weight-light"  style="font-size:1.3rem;"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div style="margin:0.3rem 0rem 0rem 0rem;">
                            <textarea class="col" id="annoucementDescription" style="min-height:500px; min-width:770px; border:none !important;" readonly></textarea>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">

    var annoucementDesc = [];
    const serialize_form = form => JSON.stringify(
    Array.from(new FormData(form).entries())
    .reduce((m, [ key, value ]) => Object.assign(m, { [key]: value }), {})
    );

$(document).ready(function() {


    $("#manageStudent").click(function () {
        window.location.href ="<?=base_url();?>Staff/manageStudent";
    });
    $("#setTrimesterDone").click(function () {
        callAlt();
    });
    $('#sandbox-container .input-group.date').datepicker({
        format: "dd/mm/yyyy",
        keyboardNavigation: false,
    });
    $('#sandbox-container2 .input-group.date').datepicker({
        format: "dd/mm/yyyy",
        keyboardNavigation: false,
    });
    $('#annoucementDateDiv .input-group.date').datepicker({
        format: "dd/mm/yyyy",
        keyboardNavigation: false,
    });
    $('#setStartDate, #setEndDate').change(function(){
    if($('#setStartDate').val() === '' || $('#setEndDate').val() === '' ){
        $('#setTrimesterDone').attr('disabled',true)
    } 
    else{
    $('#setTrimesterDone').attr('disabled',false);
    }
    });

    $('#anncoucementTitle, #anncoucementDesc').bind('input propertychange',function(){
    if($('#anncoucementTitle').val() === '' || $('#anncoucementDesc').val() === '' ){
        $('#postAnncBtn').attr('disabled',true)
    } 
    else{
    $('#postAnncBtn').attr('disabled',false);
    }
    });



var oReq = new XMLHttpRequest(); // New request object
oReq.onload = function() {
    // This is where you handle what to do with the response.
    // The actual data is found on this.responseText
    var result = JSON.parse(this.responseText);
    $('#startDate').text( result[0]['startTrimester']);
    $('#endDate').text( result[0]['endTrimester']);
}

oReq.open("POST", "readDates", true);
//                               ^ Don't block the rest of the execution.
//                                 Don't wait until the request finishes to
//                                 continue.
oReq.send();


var loadAnnoucement = new XMLHttpRequest();

loadAnnoucement.onload = function() {
    var response = JSON.parse(this.responseText);
        

    for(var i=0; i < response.length; i++)
    {
        var annoucement = $('<tr>'+
        '<td id=\"annDate_'+i+'\" class=\"font-weight-light\" style=\"font-size:1.1rem; white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:40px;\">'+response[i]['Date_']+'</td>'+
        '<td id=\"annTitle_'+i+'\" class=\"font-weight-light\" style=\"font-size:1.1rem; white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:150px;\">'+response[i]['Announcement_Title']+'</td>'+
        '<td style=\"white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:80px;\"><div class=\"row\"><div class=\"col\" style=\"max-width:150px;\">'+
        '<button id=\"viewAnncBtn_'+i+'\" type=\"button\" onClick=\"seeAnnoucement('+i+')\" class=\"btn btn-secondary shadow\" data-toggle=\"modal\" data-target=\".bd-example-modal-lg\">'+
        '<span style=\"font-size:1rem; margin:3px;\">'+
        '<i class=\"far fa-eye\"></i></span> View Full</button></div>'+
        '<div class=\"col-4\"><button id=\"dltAnncBtn_'+i+'\" type=\"button\" onClick=\"deleteAnnc('+response[i]['Announcement_ID']+')\" class=\"btn btn-danger shadow\">'+
        '<span style=\"font-size:1rem; margin:3px;\">'+
        '<i class=\"far fa-trash-alt\"></i></span> Remove </button>'+
        '</div></div></td></tr>');
                            
        annoucementDesc[i] = response[i]['Announcement_Description'];
        annoucement.appendTo("#annoucementList");
    }
}

loadAnnoucement.open("GET", "getAnnouncement", true);

loadAnnoucement.send();
    
});

function callAlt()
{
    var array =  { "startDate":$('#setStartDate').val(), "endDate": $('#setEndDate').val()};

    $.ajax({
    type: 'POST',
    url: "<?=base_url("Staff/writeDates");?>",
    headers: 
        {
            'Content-Type':'application/json'
        },
    dataType: 'json',
    data: JSON.stringify(array),
    contentType: 'application/json',
    success: function(response)
    {
        if(response == true)
        {
            Swal.fire({
            title: 'Success',
            text: "Current Trimester successfully updated.",
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.value) {
                location.reload();
            }
            })
        }
    }
    });
}

function seeAnnoucement(annRow)
{
    $('#annoucementTitle').text('');
    $('#annoucementDate').text('');
    $('#annoucementDescription').text('');
    $('#annoucementTitle').text($('#annTitle_'+annRow).text());
    $('#annoucementDate').text($('#annDate_'+annRow).text());
    $('#annoucementDescription').text(annoucementDesc[annRow]);
}

function deleteAnnc(annId)
{
    var json = {"anncID" : annId};

    Swal.fire({
    title: 'Confirm Delete?',
    text: "Are you sure to delete Announcement?",
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
            url: "<?=base_url("Staff/dltAnnouncement");?>",
            headers: 
            {
                'Content-Type':'application/json'
            },
            dataType: 'json',
            data: JSON.stringify(json),
            contentType: 'application/json',
            success: function(response)
            {
                if(response == true)
                {
                    Swal.fire({
                    title: 'Success',
                    text: "Announcement successfully deleted.",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                    }).then((result) => {
                    if (result.value) {
                        location.reload();
                    }
                    })
                }
            }
            });
        }
    });
}

$('#newAnnoucementForm').on('submit', function(event) {
    event.preventDefault();
    const json = serialize_form(this);

    $('#postAnncBtn').attr('disabled',true);

    $.ajax({
    type: 'POST',
    url: "<?=base_url("Staff/addAnnouncement");?>",
    headers: 
    {
        'Content-Type':'application/json'
    },
    dataType: 'json',
    data: json,
    contentType: 'application/json',
    success: function(response)
    {
        if(response)
        {
            $('#postAnncBtn').attr('disabled',false);

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
    }
    });
});

</script>
</html>