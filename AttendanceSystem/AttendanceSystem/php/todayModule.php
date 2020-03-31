<?php

    //Current Month
    $month = date('M');
    //current Year
    $year = date('Y');

    //Next Date
    $nextDate = date('d', strtotime(' +1 day'));
    $nextDay = date('D', strtotime(' +1 day'));
    $nextDayNum = date("w", mktime(0,0,0,date("n", time()),date("j",time())+ 1 ,date("Y", time()))) + 1;

    foreach($upcoming_module as $key)
    {
        if($key->Day_ID == $nextDayNum)
        {
            if($key->Class_Type == 1)
            {
                $Class_Type = "Lecture";
            }
            else if($key->Class_Type == 2)
            {
                $Class_Type = "Practical";
            }
            echo "
            <div class=\"card shadow\" style=\"margin:0.6rem 0rem 0.5rem 0rem; padding:0.5rem;\">
                <p style=\"font-size:0.9rem;\">$key->Module_Name | $key->Start_Time - $key->End_Time</p>
                <p style=\"font-size:0.9rem; margin:0px !important;\">$key->Room_Building $key->Room_Number | $Class_Type</p>
            </div> ";
        }
    }
?>