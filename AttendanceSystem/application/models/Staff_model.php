<?php
class Staff_model extends CI_Model
{
    public $Login_Email;
    public $Username;
    public $Login_Password;
    public $Staff_ID;
    public $Student_ID;
    public $Course_Name;
    public $Class_ID;
    public $Week_ID;
    public $Date_;
    public $Attendance_ID;
    public $Announcement_ID;
    public $Announcement_Title;
    public $Announcement_Description;
    public $anncDate_;
    



    public function setLoginEmail($email)
    {
        $this->Login_Email = $email;
    }

    public function setPassword($pass)
    {
        $this->Login_Password = $pass;
    }

    public function setStaff_ID($sId)
    {
        $this->Staff_ID = $sId;
    }

    public function setStudent_ID($sId)
    {
        $this->Student_ID = $sId;
    }

    public function setCourseName($cName)
    {
        $this->Course_Name = $cName;
    }

    public function setClass_ID($cID)
    {
        $this->Class_ID = $cID;
    }

    public function setWeek_ID($wID)
    {
        $this->Week_ID = $wID;
    }

    public function setDate_($d)
    {
        $this->Date_ = $d;
    }

    public function setAttendance_ID($aID)
    {
        $this->Attendance_ID = $aID;
    }

    public function setAnnouncement_ID($anncID)
    {
        $this->Announcement_ID = $anncID;
    }

    public function setAnnouncement_Title($anncT)
    {
        $this->Announcement_Title = $anncT;
    }

    public function setAnnouncement_Description($anncDesc)
    {
        $this->Announcement_Description = $anncDesc;
    }

    public function setAnncDate_($anncDate)
    {
        $this->anncDate_ = $anncDate;
    }

    /* 
    Name:       Staff Login
    Function: 
                This function require to set 
                Login_Email and Login_Password
                to be pass the parameters to the DB using DB Class ConnectDatabase function.
                Prepare statement to query Login Credentials with hashing Passwords.
     */
    public function staff_login()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT login_details.Login_Email,
		login_details.Login_Password,
		staff_details.Staff_ID,
        staff_details.Staff_Type
		FROM login_details
		INNER JOIN staff_details ON login_details.Login_ID = staff_details.Login_ID
		WHERE login_details.Login_Email = :Login_Email
		AND login_details.Login_Password = :Login_Password");
        $pdo->execute(array(
            ':Login_Email' => $this->Login_Email,
            ':Login_Password' => MD5($this->Login_Password)));
        
		$result = $pdo->fetchAll(PDO::FETCH_CLASS, 'Staff_model');
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

    /* 
    Name:       Get Staff Information
    Function: 
                This function require to set 
                Staff ID 
                to be pass the parameters to the DB using DB Class ConnectDatabase function.
     */

    public function get_staff_details()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT * FROM `staff_details` WHERE `Staff_ID`= :Staff_ID");

        $pdo->execute(array(':Staff_ID' => $this->Staff_ID));
        
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

    
    /* 
    Name:       Search Student
    Function: 
                This function require to set 
                Student ID 
                to be pass the parameters to the DB using DB Class ConnectDatabase function.
     */
    public function get_search_student()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT `First_Name`,`Last_Name`,`Student_ID`,`Student_Email`,`Course_Prog`,`Course_Name` 
        FROM `student_details` 
        WHERE `Student_ID`= :Student_ID");

        $pdo->execute(array(
            ':Student_ID' => $this->Student_ID));
        
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

     /* 
    Name:       Search Student By Course
    Function: 
                This function require to set 
                Student ID , Course_Name 
                to be pass the parameters to the DB using DB Class ConnectDatabase function.
     */
    public function get_search_studentCourse()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT `First_Name`,`Last_Name`,`Student_ID`,`Student_Email`,`Course_Prog`,`Course_Name` 
        FROM `student_details` 
        WHERE `Student_ID`= :Student_ID
        AND `Course_Name`= :Course_Name;");

        $pdo->execute(array(
            ':Student_ID' => $this->Student_ID,
            ':Course_Name' => $this->Course_Name));
        
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

    /* 
    Name:       Get all students
    Function: 
                This function does not require to set parameters
                to be pass the parameters to the DB using DB Class ConnectDatabase function.
                Prepare statement to query Login Credentials with hashing Passwords.
     */
    public function get_all_student()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT `First_Name`,`Last_Name`,`Student_ID`,`Student_Email`,`Course_Prog`,`Course_Name` 
        FROM `student_details`;");

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

    
    /* 
    Name:       Get all students by Course
    Function: 
                This function require to set 
                Student ID , Course_Name to the DB using DB Class ConnectDatabase function.
                Prepare statement to query Login Credentials with hashing Passwords.
     */
    public function get_all_studentCourse()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT `First_Name`,`Last_Name`,`Student_ID`,`Student_Email`,`Course_Prog`,`Course_Name` 
        FROM `student_details`
        WHERE `Course_Name`= :Course_Name;");

        $pdo->execute(array(
            ':Course_Name' => $this->Course_Name));
        
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

    /* 
    Name:       Add student's attendance
    Function: 
                This function require to set 
                Student ID, Class_ID, Week_ID and Date_
                to be pass the parameters to the DB using DB Class ConnectDatabase function.
     */
    public function add_student_attendance()
    {
        $pdo = DB::connectDatabase()->prepare("INSERT INTO `attendance`(`Attendance_ID`, `Student_ID`, `Class_ID`, `Week_ID`, `Date_`) 
        VALUES ('', :Student_ID, :Class_ID, :Week_ID, :Date_);");

        $pdo->execute(array(
            ':Student_ID' => $this->Student_ID,
            ':Class_ID'=> $this->Class_ID,
            ':Week_ID'=> $this->Week_ID,
            ':Date_'=> $this->Date_));
        
        if($pdo)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

     /* 
    Name:      Delete student's attendance
    Function: 
                This function require to set 
                Attendance_ID 
                to be pass the parameters to the DB using DB Class ConnectDatabase function.
     */
    public function delete_student_attendance()
    {
        $pdo = DB::connectDatabase()->prepare("DELETE FROM `attendance` WHERE `Attendance_ID`= :Attendance_ID;");

        $pdo->execute(array(
            ':Attendance_ID' => $this->Attendance_ID));
        
        if($pdo)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /* 
    Name:      Get Attendance List by Class
    Function: 
                This function require to set 
                Student_ID and Class_ID
                to be pass the parameters to the DB using DB Class ConnectDatabase function.
     */
    public function get_attendance_listByClass()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT attendance.Attendance_ID,
        attendance.Week_ID,
        attendance.Date_,
        class_module.Module_ID,
        module_details.Module_Name
        FROM `attendance`
        INNER JOIN class_module ON attendance.Class_ID = class_module.Class_ID
        RIGHT JOIN module_details ON class_module.Module_ID = module_details.Module_ID
        WHERE `Student_ID`= :Student_ID
        AND attendance.Class_ID = :Class_ID;");

        $pdo->execute(array(
            ':Student_ID' => $this->Student_ID,
            ':Class_ID'=> $this->Class_ID));
        
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

    /* 
    Name:      Get Attendance List by Student ID
    Function: 
                This function require to set 
                Student_ID , Class_ID 
                to be pass the parameters to the DB using DB Class ConnectDatabase function.
     */
    public function get_attendance_list()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT attendance.Attendance_ID,
        attendance.Week_ID,
        attendance.Date_,
        class_module.Module_ID,
        class_module.Class_Type,
        module_details.Module_Name
        FROM `attendance`
        INNER JOIN class_module ON attendance.Class_ID = class_module.Class_ID
        INNER JOIN module_details ON class_module.Module_ID = module_details.Module_ID
        WHERE `Student_ID`= :Student_ID
        ORDER BY attendance.Attendance_ID DESC;");
    // ORDER BY STR_TO_DATE(attendance.Date_, '%d %m %Y') DESC;
        $pdo->execute(array(
            ':Student_ID' => $this->Student_ID));
        
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

    /* 
    Name:      Get Annoucenements
    Function: 
                This function does not require to set parameters
                to be pass the parameters to the DB using DB Class ConnectDatabase function.
                Prepare statement to query Login Credentials with hashing Passwords.
     */
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

    /* 
    Name:      Delete Annoucements
    Function: 
                This function require to set 
                Announcement_ID
                to be pass the parameters to the DB using DB Class ConnectDatabase function.
     */
    public function dlt_announcement()
    {
        $pdo = DB::connectDatabase()->prepare("DELETE FROM `announcement` WHERE `Announcement_ID` = :Announcement_ID;");
        
        $pdo->execute(array(
            ':Announcement_ID' => $this->Announcement_ID));
        
		if ($pdo)
		{
            return true;
        }	
		else
		{
            return false;
            // throw new Exception("No module found.", 204);
        }	
    }

     /* 
    Name:      Add Annoucements
    Function: 
                This function does not require to set parameters
                to be pass the parameters to the DB using DB Class ConnectDatabase function.
                Prepare statement to query Login Credentials with hashing Passwords.
     */
    public function add_announcement()
    {
        $pdo = DB::connectDatabase()->prepare("INSERT INTO `announcement`(`Announcement_ID`, `Announcement_Title`, `Announcement_Description`, `Date_`) 
        VALUES ('', :Announcement_Title, :Announcement_Description, :Date_);");
        
        $pdo->execute(array(
            ':Announcement_Title' => $this->Announcement_Title,
            ':Announcement_Description' => $this->Announcement_Description,
            ':Date_' =>  $this->anncDate_));
        
		if ($pdo)
		{
            return true;
        }	
		else
		{
            return false;
            // throw new Exception("No module found.", 204);
        }	
    }
}
