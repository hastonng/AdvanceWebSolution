<?php

$radius = 55;
$circumference = $radius * 2 * pi();

for($i=0; $i < count($attendance['module']); $i++)
{
    $offset = $circumference - $attendance['attendancePercentage'][$i] / 100 * $circumference;
    
    echo"
        <div style=\"display: inline-block; float: none;\">
            <div class=\"card shadow-sm\" style=\"width:20rem; height:13rem; margin:1rem;\">
                <svg class=\"progress-ring rounded-circle shadow align-self-center\" width=\"100\" height=\"100\" style=\"margin:1rem;\">
                    <circle class=\"progress-ring__circle shadow-lg\" stroke=\"#061D49\" stroke-width=\"17\" fill=\"transparent\" r=\"55\" cx=\"50\" cy=\"50\" stroke-dasharray=\"",$circumference," ",$circumference,"\"  stroke-dashoffset=\"",$offset,"\"/>
                    <text x=\"50%\" y=\"50%\" text-anchor=\"middle\" stroke-width=\"0.5\" stroke=\"#061D49\" fill=\"#061D49\" dy=\".3em\" font-size=\"1rem\">",$attendance['attendancePercentage'][$i],"%</text>
                </svg>
                <p class=\"text-center\">",$attendance['module'][$i][0]->Module_Code,"<br>",$attendance['module'][$i][0]->Module_Name,"</p>
            </div>
        </div>
    ";
}
?>