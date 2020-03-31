var oReq = new XMLHttpRequest(); // New request object
oReq.onload = function() {
    // This is where you handle what to do with the response.
    // The actual data is found on this.responseText
var result = JSON.parse(this.responseText);

for(var i=0; i < result.length; i++)
{
    var mod = $('<div class=\"modules \">'+
        '<div id=\"'+i+'\" class=\"card shadow border-top\" style=\"width:20rem; height:6rem; margin:1.5rem; border-top-color:#'+classColor(result[i]['Class_Type'])+'!important; border-top-width:5px !important;\">'+
        '<p  style=\"margin:0.5rem !important; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;\"><strong>'+result[i]['Module_Code']+'</strong> '+result[i]['Module_Name']+'<br>'+
        result[i]['Start_Time']+' - '+result[i]['End_Time']+'<br>'+
        result[i]['Room_Building']+' '+result[i]['Room_Number']+' ('+classType(result[i]['Class_Type'])+') '+'</p>'+
        '</div>'+
        '</div>');
        
    if(result[i]['Day_ID'] === "2")
    {
        mod.appendTo("#monClass");
    }
    else if(result[i]['Day_ID'] === "3")
    {
        mod.appendTo("#tuesClass");
    }
    else if(result[i]['Day_ID'] === "4")
    {
        mod.appendTo("#wedClass");
    }
    else if(result[i]['Day_ID'] === "5")
    {
        mod.appendTo("#thursClass");
    }
    else if(result[i]['Day_ID'] === "6")
    {
        mod.appendTo("#friClass");
    }
}
};
oReq.open("POST", "getTimetable", true);
//                               ^ Don't block the rest of the execution.
//                                 Don't wait until the request finishes to
//                                 continue.
oReq.send();

function classType(type)
{
    if(type == 1)
    {
        // border-top-color:;
        return "Lecture";
    }
    else if(type == 2)
    {
        return "Practical";
    }
}

function classColor(type)
{
    if(type == 1)
    {
        return '061D49';
    }
    else if (type ==2)
    {
        return 'ffd101';
    }
}