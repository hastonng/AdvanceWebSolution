<?php
class Staff_model extends CI_Model
{
    public $Login_Email;
    public $Username;
    public $Login_Password;
    public $Staff_ID;


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


    /* 
    Name:       Staff Login
    Function: 
                Login Staff from the Login Page. This function require to set 
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

}
