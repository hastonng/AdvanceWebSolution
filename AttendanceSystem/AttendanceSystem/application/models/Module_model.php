<?php
class Module_model extends CI_Model
{
    public $Module_Name;
    public $Module_Code;
    // public function __construct()
    // {
    //     $this->load->database();       
    // }

    public function get_module()
    {
        $pdo = DB::connectDatabase()->prepare("SELECT `Module_Name`,`Module_Code` FROM module_details");
        $pdo->execute(array(
            ':Module_Name' => $this->Module_Name,
            ':Module_Code' => $this->Module_Code));
        
		$result = $pdo->fetchAll(PDO::FETCH_CLASS, 'Module_model');
		if (count($result) > 0)
			return $result;
		else
			throw new Exception("No module found.", 204);
    }
}
