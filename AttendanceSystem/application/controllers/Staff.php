<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// use Restserver\Libraries\REST_Controller;
class Staff extends CI_Controller 
{
    function __construct() {
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('file');
            $this->load->model('Staff_model');
            $this->load->model('Student_model');
    }

    /* 
    Name:       Load Staff Index Page
    Function: 
                This function shall load student page.
                Session 'tokens' such as 
                Login_Email, Login_ID, Staff_Type is required to load 
     */
    public function index()
    {
        if($this->session->userdata('Login_Email') === null || $this->session->userdata('Login_ID') === null || $this->session->userdata('Staff_Type') === null)
        {
            redirect('');
        }
        else if(!strpos($this->session->userdata('Login_Email'), "@anglia"))
        {
            redirect('');
        }
        else
        {
            //Set Staff ID
            $this->Staff_model->setStaff_ID($this->session->userdata('Login_ID'));
            //Get Staff Module
            $staffDetails['staff_details'] = $this->Staff_model->get_staff_details();
            //Set Details
            $this->fName = $staffDetails['staff_details'][0]->First_Name;
            $this->lName = $staffDetails['staff_details'][0]->Last_Name;
            $headerData = array('fName' => $staffDetails['staff_details'][0]->First_Name,
                    'lName' => $staffDetails['staff_details'][0]->Last_Name);
            // var_dump($data['upcoming_module']);

            if($this->session->userdata('Staff_Type') == 1)
            {
                $page_name = 'AdminPage';
                if ( ! file_exists(APPPATH.'views/pages/'.$page_name.'.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }
                $this->load->view('templates/staffHeader',$headerData);
                $this->load->view('pages/'.$page_name);
                $this->load->view('templates/staffFooter');
            }
            else
            {
                /*
                =========================================================================================
                |    This section shall wait for group members:                                          |
                |    ARUN KUMAR and SWATHI TOTHA                                                         |
                |    To join their respective codes                                                      |
                |                                                                                        |
                |    This will redirect to Lecturer Page OR Manager Page                                 |
                =========================================================================================
                */
                
            }
        }
    }


     /* 
    Name:       Load Staff Index Page
    Function: 
                This function shall load student page.
                Session 'tokens' such as 
                Login_Email, Login_ID, Staff_Type is required to load 
     */
    public function manageStudent()
    {
        if($this->session->userdata('Login_Email') === null || $this->session->userdata('Login_ID') === null || $this->session->userdata('Staff_Type') === null)
        {
            redirect('');
        }
        else if(!strpos($this->session->userdata('Login_Email'), "@anglia"))
        {
            redirect('');
        }
        else
        {
            //Set Staff ID
            $this->Staff_model->setStaff_ID($this->session->userdata('Login_ID'));
            //Get Staff Module
            $staffDetails['staff_details'] = $this->Staff_model->get_staff_details();
            //Set Details
            $this->fName = $staffDetails['staff_details'][0]->First_Name;
            $this->lName = $staffDetails['staff_details'][0]->Last_Name;
            $headerData = array('fName' => $staffDetails['staff_details'][0]->First_Name,
                    'lName' => $staffDetails['staff_details'][0]->Last_Name);
            // var_dump($data['upcoming_module']);

            if($this->session->userdata('Staff_Type') == 1)
            {
                $page_name = 'manageStudent';
                if ( ! file_exists(APPPATH.'views/pages/'.$page_name.'.php'))
                {
                        // Whoops, we don't have a page for that!
                        show_404();
                }
                $this->load->view('templates/staffHeader',$headerData);
                $this->load->view('pages/'.$page_name);
                $this->load->view('templates/staffFooter');
            }
            else
            {
                //Load Lecturer, Manager Page
            }
        }
    }


    /* 
    Name:       Search Student Controller
    Function: 
                This function shall search student with the input data from Search Bar.
     */
    public function searchStudent()
    {
        $rawData = json_decode(file_get_contents('php://input'), true);
        $cleanData = $this->security->xss_clean($rawData);

        if($cleanData['course'] != '')
        {
            //Set Student and Course
            $this->Staff_model->setStudent_ID($cleanData['searchStudentID']);
            $this->Staff_model->setCourseName( $cleanData['course']);
            
            $result = $this->Staff_model->get_search_studentCourse();
        }
        else
        {
            $this->Staff_model->setStudent_ID($cleanData['searchStudentID']);
            $result = $this->Staff_model->get_search_student();
        }
        //Set Student ID to search

        if($result)
        {
            echo json_encode($result);
        }
        else
        {
            echo json_encode(false);
        }
    }

     /* 
    Name:       View all students
    Function: 
                This function shall retrieve all student.
     */
    public function viewAllStudent()
    {
        $rawData = json_decode(file_get_contents('php://input'), true);
        $cleanData = $this->security->xss_clean($rawData);

        if($cleanData[0]['course'] != '')
        {
            // Set Course
            $this->Staff_model->setCourseName($cleanData[0]['course']);
            $result = $this->Staff_model->get_all_studentCourse();  
        }
        else
        {
            $result = $this->Staff_model->get_all_student();  
        }
                
        if($result)
        {
            echo json_encode($result);
        }
        else
        {
            echo json_encode(false);
        }
    }

     /* 
    Name:       Get Student's Module
    Function: 
                This function shall get all student's registered modules.
     */
    public function getStudentModule()
    {
        $rawData = json_decode(file_get_contents('php://input'), true);
        $cleanData = $this->security->xss_clean($rawData);

        $this->checkTrimester();
        // $this->Student_model->setTrimester_Period(2);


        //Read current Trimester Date
        $File = file_get_contents("C:/xampp/htdocs/AttendanceSystem/application/helpers/trimester.txt");
        $stringarr = preg_split('/\s+/', $File);
        $this->Student_model->setStartDate($stringarr[0]);
        $this->Student_model->setEndDate($stringarr[1]);

        

        //Set Student ID on Student model
        $this->Student_model->setStudent_ID($cleanData['sID']);
        //Get Student Module
        $data['student_module'] = $this->Student_model->get_all_student_module();
        $data['class_module'] = $this->Student_model->getTimetable();

        for($i = 0; $i < count($data['student_module']); $i++)
        {
            $attendance[$i] = $this->Student_model->get_module_attendance($data['student_module'][$i]->Module_ID);
        }
        $data['attendance'] =  $this->module_attendance($attendance);
        echo json_encode($data);

    }

     /* 
    Name:       Get Student's Attendance
    Function: 
                This function shall get all student's attendance .
     */
    public function getAttendanceList()
    {
        $rawData = json_decode(file_get_contents('php://input'), true);
        $cleanData = $this->security->xss_clean($rawData);

        //Set Student ID in Staff_model
        $this->Staff_model->setStudent_ID($cleanData['sID']);
        

        $result = $this->Staff_model->get_attendance_list();

        echo json_encode($result);
    }

    /* 
    Name:       Get All Announcements
    Function: 
                This function shall get all Announcements .
     */
    public function getAnnouncement()
    {
        $result = $this->Staff_model->get_announcement();

        echo json_encode($result);
    }

     /* 
    Name:       Add Announcements
    Function: 
                This function shall  add new announcement.
     */
    public function addAnnouncement()
    {
        $rawData = json_decode(file_get_contents('php://input'), true);
        $cleanData = $this->security->xss_clean($rawData);
        //today Date
        $date = date('jS F Y');

        $this->Staff_model->setAnnouncement_Title($cleanData['anncoucementTitle']);
        $this->Staff_model->setAnnouncement_Description($cleanData['anncoucementDesc']);
        $this->Staff_model->setAnncDate_($date);

        $result = $this->Staff_model->add_announcement();

        echo json_encode($result);
    }

     /* 
    Name:       Delete Announcements
    Function: 
                This function shall  delete selected announcement.
     */
    public function dltAnnouncement()
    {
        $rawData = json_decode(file_get_contents('php://input'), true);
        $cleanData = $this->security->xss_clean($rawData);

        //Set Annoucment ID
        $this->Staff_model->setAnnouncement_ID($cleanData['anncID']);

        $result = $this->Staff_model->dlt_announcement();

        echo json_encode($result);
    }
   
    /* 
    Name:       Add Attendance
    Function: 
                This function shall  add selected attendance.
     */
    public function addAttendance()
    {
        $rawData = json_decode(file_get_contents('php://input'), true);
        $cleanData = $this->security->xss_clean($rawData);
        $date =  str_replace("/","",$cleanData['setDate']);

        $this->Staff_model->setStudent_ID($cleanData['sID']);
        $this->Staff_model->setClass_ID($cleanData['selectModule']);
        $this->Staff_model->setWeek_ID($cleanData['week']);
        $this->Staff_model->setDate_($date);

        $result = $this->Staff_model->add_student_attendance();

        echo json_encode($result);
    }

     /* 
    Name:       Delete Attendance
    Function: 
                This function shall  delete selected attendance.
     */
    public function dltAttendance()
    {
        $rawData = json_decode(file_get_contents('php://input'), true);
        $cleanData = $this->security->xss_clean($rawData);

        $this->Staff_model->setAttendance_ID($cleanData['aID']);

        $result = $this->Staff_model->delete_student_attendance();

        echo json_encode($result);
    }


     /* 
    Name:      Read Dates
    Function: 
                This function shall read dates from trimester.txt file
     */
    public function readDates()
    {
        $File = file_get_contents("C:/xampp/htdocs/AttendanceSystem/application/helpers/trimester.txt");
        $stringarr = preg_split('/\s+/', $File);
        $startDate = substr($stringarr[0], -8, -6)."/".substr($stringarr[0], -6, -4)."/".substr($stringarr[0], -4);
        $endDate = substr($stringarr[1], -8, -6)."/".substr($stringarr[1], -6, -4)."/".substr($stringarr[1], -4);
        $data[] = array('startTrimester' =>  $startDate, 'endTrimester' =>  $endDate);

        echo json_encode($data);
    }

     /* 
    Name:      Write Dates
    Function: 
                This function shall write dates to trimester.txt file
     */
    public function writeDates()
    {
        $rawData = json_decode(file_get_contents('php://input'), true);
        
        $startDateClean =  str_replace("/","",$rawData['startDate']);
        $endDateClean =  str_replace("/","",$rawData['endDate']);
     
        $currentTrimester = $startDateClean." ".$endDateClean;

        $filePath ="C:/xampp/htdocs/AttendanceSystem/application/helpers/trimester.txt";

        file_put_contents($filePath, $currentTrimester);
        
        echo json_encode(true);
    }

     /* 
    Name:      Module's Attendance
    Function: 
                This function shall calculate the attendance of each module
     */
    public function module_attendance($array)
    {
        $totalAtt = 0;
        
        for($i = 0; $i < count($array); $i++)
        {
            $attendancePercentage[$i] = number_format((($array[$i][0]->Attendance_Num / $array[$i][0]->Max_Attendance) * 100),1);
        }

        for($i = 0; $i < count($attendancePercentage); $i++)
        {
            $totalAtt += $attendancePercentage[$i];
        }

        $average = $totalAtt / count($attendancePercentage);
        $average = number_format($average, 1);
        return $resultArray = array('module' => $array, 'attendancePercentage' => $attendancePercentage, 'aveAttendance' => $average);
    }

     /* 
    Name:      Check Trimester
    Function: 
                This function shall check the current trimester period by month
                Trimester 1 = August - December
                Trimester 2 = January - April
                Trimester 3 = May - July
     */
    public function checkTrimester()
    {
            if((date('m') >= 8) && (date('m') <= 12))
            {
                    $this->Student_model->setTrimester_Period(1);
            }
            else if((date('m') >= 1) && (date('m') <= 4))
            {
                    $this->Student_model->setTrimester_Period(2);
            }
            else
            {
                    $this->Student_model->setTrimester_Period(3);
            }
    }

}