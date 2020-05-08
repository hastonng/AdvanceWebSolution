<?php
class Student_model extends CI_Model
{
    public $Login_Email;
    public $Username;
    public $Login_Password;
    public $Student_ID;
    public $startDate;
    public $endDate;
    public $Trimester_Period;


    public function setLoginEmail($email)
    {
        $this->Login_Email = $email;
    }

    public function setPassword($pass)
    {
        $this->Login_Password = $pass;
    }

    public function setStudent_ID($sId)
    {
        $this->Student_ID = $sId;
    }

    public function setStartDate($sDate)
    {
        $this->startDate = $sDate;
    }

    public function setEndDate($eDate)
    {
        $this->endDate = $eDate;
    }

    public function setTrimester_Period($tP)
    {
        $this->Trimester_Period = $tP;
    }


    /* 
    Name:       Student Login
    Function: 
                Login students from the Login Page. This function require to set 
                Login_Email and Login_Password
                to be pass the parameters to the DB using DB Class ConnectDatabase function.
                Prepare statement to query Login Credentials with hashing Passwords.
     */
    public function student_login()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT login_details.Login_Email,
		login_details.Login_Password,
		student_details.Student_ID
		FROM login_details
		INNER JOIN student_details ON login_details.Login_ID = student_details.Login_ID
		WHERE login_details.Login_Email = :Login_Email
		AND login_details.Login_Password = :Login_Password");
        $pdo->execute(array(
            ':Login_Email' => $this->Login_Email,
            ':Login_Password' => MD5($this->Login_Password)));
        
		$result = $pdo->fetchAll(PDO::FETCH_CLASS, 'Student_model');
		if (count($result) > 0)
		{

            if($result[0]->Login_Email === $this->Login_Email && $result[0]->Login_Password === MD5($this->Login_Password))
            {
                return $result;
                // echo json_encode($result[0]->Login_Email);
            }
        }	
		else
		{
            return false;
            // throw new Exception("No module found.", 204);
        }	
    }


    public function get_student_module()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT module_details.Module_ID,
        module_details.Module_Code,
        module_details.Module_Name
		FROM module_details
		INNER JOIN student_module ON module_details.Module_ID = student_module.Module_ID
		WHERE student_module.Student_ID = :Student_ID
        AND student_module.Start_Date = :startDate
        AND student_module.End_Date = :endDate");

        $pdo->execute(array(
            ':Student_ID' => $this->Student_ID,
            ':startDate' => $this->startDate,
            ':endDate' => $this->endDate,
        ));
        
		$result = $pdo->fetchAll(PDO::FETCH_CLASS, 'Student_model');
		if (count($result) > 0)
		{
            return $result;
        }	
		else
		{
            return false;
            // throw new Exception("No module found.", 204);
        }	
    }

    public function get_all_student_module()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT module_details.Module_ID,
        module_details.Module_Code,
        module_details.Module_Name
		FROM module_details
		INNER JOIN student_module ON module_details.Module_ID = student_module.Module_ID
		WHERE student_module.Student_ID = :Student_ID;");

        $pdo->execute(array(
            ':Student_ID' => $this->Student_ID));
        
		$result = $pdo->fetchAll(PDO::FETCH_CLASS, 'Student_model');
		if (count($result) > 0)
		{
            return $result;
        }	
		else
		{
            return false;
            // throw new Exception("No module found.", 204);
        }	
    }

    // public function get_upcoming_module()
    // {
    //     $pdo = DB::connectDatabase()->prepare("SELECT class_module.Class_ID,
    //     class_module.Class_Type,
	// 	class_module.Start_Time,
    //     class_module.End_Time,
	// 	module_details.Module_Name,
    //     module_details.Module_Code,
    //     day_details.Day_ID,
    //     day_details.Day_Name,
    //     room_details.Room_Number,
    //     room_details.Room_Building
	// 	FROM class_module
    //     INNER JOIN class_student ON class_module.Class_ID = class_student.Class_ID
    //     INNER JOIN module_details ON class_module.Module_ID = module_details.Module_ID
    //     INNER JOIN day_details ON class_module.Day_ID = day_details.Day_ID
    //     INNER JOIN room_details ON class_module.Room_ID = room_details.Room_ID
    //     WHERE class_student.Student_ID = :Student_ID;");

    //     $pdo->execute(array(':Student_ID' => $this->Student_ID));
        
	// 	$result = $pdo->fetchAll(PDO::FETCH_CLASS, 'Student_model');
	// 	if (count($result) > 0)
	// 	{
    //         return $result;
    //     }	
	// 	else
	// 	{
    //         return false;
    //         // throw new Exception("No module found.", 204);
    //     }	
    // }

    public function getTimetable()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT class_module.Class_ID,
        class_module.Class_Type,
		class_module.Start_Time,
        class_module.End_Time,
		module_details.Module_Name,
        module_details.Module_Code,
        day_details.Day_ID,
        day_details.Day_Name,
        room_details.Room_Number,
        room_details.Room_Building
		FROM class_module
        INNER JOIN class_student ON class_module.Class_ID = class_student.Class_ID
        INNER JOIN module_details ON class_module.Module_ID = module_details.Module_ID
        INNER JOIN day_details ON class_module.Day_ID = day_details.Day_ID
        INNER JOIN room_details ON class_module.Room_ID = room_details.Room_ID
        WHERE class_student.Student_ID = :Student_ID
        AND class_module.Trimester_Period = :Trimester_Period
        ORDER BY day_details.Day_Name ASC, STR_TO_DATE(class_module.Start_Time, '%l:%i %p') ASC");

        $pdo->execute(array(':Student_ID' => $this->Student_ID,
        ':Trimester_Period' => $this->Trimester_Period));
        
		$result = $pdo->fetchAll(PDO::FETCH_CLASS, 'Student_model');
		if (count($result) > 0)
		{
            return $result;
        }	
		else
		{
            return false;
        }	
    }

    public function get_student_details()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT * FROM `student_details` WHERE `Student_ID`= :Student_ID");

        $pdo->execute(array(':Student_ID' => $this->Student_ID));
        
		$result = $pdo->fetchAll(PDO::FETCH_CLASS, 'Student_model');
		if (count($result) > 0)
		{
            return $result;
        }	
		else
		{
            return false;
            // throw new Exception("No module found.", 204);
        }	
    }

    public function get_module_attendance($Module_ID)
    {
        $pdo = DB::connectDatabase()->prepare("SELECT COUNT(`Attendance_ID`)  AS 'Attendance_Num',
        module_details.Module_Name,
        module_details.Module_Code,
        module_details.Max_Attendance
        FROM `attendance` 
        INNER JOIN class_module ON attendance.Class_ID = class_module.Class_ID
        INNER JOIN module_details ON class_module.Module_ID = module_details.Module_ID
        WHERE `Student_ID`= :Student_ID
        AND module_details.Module_ID = :Module_ID;");

        $pdo->execute(array(':Student_ID' => $this->Student_ID,
        ':Module_ID' => $Module_ID));
        
		$result = $pdo->fetchAll(PDO::FETCH_CLASS, 'Student_model');
		if (count($result) > 0)
		{
            return $result;
        }	
		else
		{
            return false;
            // throw new Exception("No module found.", 204);
        }	
    }

    public function get_personalTutor()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT staff_details.First_Name,
        staff_details.Last_Name,
        staff_details.Staff_Email,
        staff_details.PhoneNo
        FROM `student_tutor`
        JOIN staff_details ON student_tutor.Staff_ID = staff_details.Staff_ID
        WHERE Student_ID = :Student_ID");

        $pdo->execute(array(':Student_ID' => $this->Student_ID));
        
		$result = $pdo->fetchAll(PDO::FETCH_CLASS, 'Student_model');
		if (count($result) > 0)
		{
            return $result;
        }	
		else
		{
            return false;
            // throw new Exception("No module found.", 204);
        }	
    }

    public function get_announcement()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT * FROM `announcement`
        ORDER BY STR_TO_DATE( announcement.Date_, '%D %M %Y') DESC , announcement.Announcement_ID DESC;");
        
        $pdo->execute();
        
		$result = $pdo->fetchAll(PDO::FETCH_CLASS, 'Staff_model');
		if (count($result) > 0)
		{
            return $result;
        }	
		else
		{
            return false;
            // throw new Exception("No module found.", 204);
        }	
    }
}
