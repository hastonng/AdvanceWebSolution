$(document).ready(function(){
   

    $("#logoutBtn").click(function () {

        Swal.fire({
            title: 'Leaving already?',
            text: "Are you sure to Logout?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.value) 
                {
                    window.location.href ="http://localhost/AttendanceSystem/LoginController/logout";
                }
            });
    });

    $('#uploadImageForm').on('submit', function(event) {
        event.preventDefault();
        // var data = $('#profile_image').prop('files');

        $.ajax({
            type: 'POST',
            url: "http://localhost/AttendanceSystem/Student/uploadImage",
            data: new FormData(this) ,
            enctype: 'multipart/form-data',
            processData: false,  // Important!
            contentType: false,
            cache: false,
            success: function(response)
            {
                if(response != "false")
                {
                    $('#userProImg').css('background-image', 'url("http://localhost/AttendanceSystem/assets/sImage/' + JSON.parse(response) + '?")');
                }
            }
        });
    });


    $('#saveUplaodedBtn').click(function () {
        window.location.reload();
    });
});

