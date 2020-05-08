var moduleArray,filename;
$(document).ready(function() {
    var imageUrl = "https://webservices.anglia.ac.uk/Photo/StaffPhoto/CL19/5729DDD04734D81D8B8149329F74BA30/140";
    $('#tutorImage').css('background-image', 'url("' + imageUrl + '")');
    
});

function setArray(array,name)
{
    moduleArray = array;
    filename = name;
} 

function load(ave)
{
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
    setProgress(ave);

    

}

function downloadBtn()
    {
        
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
                "mergeData": this.moduleArray,
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
        download(filename+".pdf", documents[0]);
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