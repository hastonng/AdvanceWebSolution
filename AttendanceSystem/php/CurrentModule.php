<?php
foreach($student_module as $key)
{
    
    echo"
        <div class=\"card shadow\" style=\"margin:0.4rem; padding:0.3rem;\">
            <p style=\"font-size:1rem;\">$key->Module_Code - $key->Module_Name</p>
        </div> 
    ";
}
?>

