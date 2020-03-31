<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// use Restserver\Libraries\REST_Controller;
class Student extends CI_Controller 
{
        function __construct() {
                parent::__construct();
                $this->load->helper('url');
                $this->load->helper('file');
                $this->load->model('Student_model');
        }

        public function index()
        {
                if($this->session->userdata('Login_Email') === null && $this->session->userdata('Login_ID') === null)
                {
                    redirect('');
                }
                else
                {
                        $this->readDates();
                        $page_name = 'StudentHomePage';
                        if ( ! file_exists(APPPATH.'views/pages/'.$page_name.'.php'))
                        {
                                // Whoops, we don't have a page for that!
                                show_404();
                        }
                        //Get student's module
                        $data['student_module'] = $this->getStudentModule();
                        //Get student's upcoming modules
                        $data['upcoming_module'] = $this->getUpcomingModule();
                        //Get student's details
                        $headerData = $this->getStudentDetails();

                        $this->load->view('templates/header',$headerData);
                        $this->load->view('pages/'.$page_name,$data);
                        $this->load->view('templates/footer');
                }
        }


        public function attendance()
        {
                if($this->session->userdata('Login_Email') === null && $this->session->userdata('Login_ID') === null)
                {
                    redirect('');
                }
                else
                {
                        $this->readDates();
                        $page_name = 'StudentAttendance';
                        if ( ! file_exists(APPPATH.'views/pages/'.$page_name.'.php'))
                        {
                                // Whoops, we don't have a page for that!
                                show_404();
                        }

                        $headerData = $this->getStudentDetails();
                        $studentModule = $this->getStudentModule();
                        $result['personalTutor'] = $this->personalTutor();

                        for($i = 0; $i < count($studentModule); $i++)
                        {
                                $attendance[$i] = $this->Student_model->get_module_attendance($studentModule[$i]->Module_ID);
                        }

                        $result['attendance'] = $this->module_attendance($attendance);
                        $result['headerData'] = $headerData;

                        // echo json_encode($result);
                        // var_dump($result['attendance']['module']);
                        
                        $this->load->view('templates/header',$headerData);
                        $this->load->view('pages/'.$page_name,$result);
                        $this->load->view('templates/footer');
                }
        }


        public function timetable()
        {
                if($this->session->userdata('Login_Email') === null && $this->session->userdata('Login_ID') === null)
                {
                    redirect('');
                }
                else
                {
                        $this->readDates();
                        $page_name = 'Timetable';
                        if ( ! file_exists(APPPATH.'views/pages/'.$page_name.'.php'))
                        {
                                // Whoops, we don't have a page for that!
                                show_404();
                        }

                        $headerData = $this->getStudentDetails();
                        
                        $this->load->view('templates/header',$headerData);
                        $this->load->view('pages/'.$page_name);
                        $this->load->view('templates/footer2');
                }
        }

        public function getTimetable()
        {
                 //Set Student ID
                 $this->Student_model->setStudent_ID($this->session->userdata('Login_ID'));
                 //Get Timetable
                 $data['timetable'] = $this->Student_model->getTimetable();

                 echo json_encode($data['timetable']);
        }

        public function readDates()
        {
                $File = file_get_contents("C:/xampp/htdocs/AttendanceSystem/application/helpers/trimester.txt");
                $stringarr = preg_split('/\s+/', $File);
                
                // echo $stringarr[0]," ",$stringarr[1];
                $this->Student_model->setStartDate($stringarr[0]);
                $this->Student_model->setEndDate($stringarr[1]);
        }

        public function getStudentDetails()
        {
                //Set Student ID
                $this->Student_model->setStudent_ID($this->session->userdata('Login_ID'));
                //Get Student Details
                $studentDetails['student_details'] = $this->Student_model->get_student_details();
                $data = array('fName' => $studentDetails['student_details'][0]->First_Name,
                        'lName' => $studentDetails['student_details'][0]->Last_Name);

                return $data;
        }

        public function getStudentModule()
        {
                //Set Student ID
                $this->Student_model->setStudent_ID($this->session->userdata('Login_ID'));
                //Get Student Module
                $data = $this->Student_model->get_student_module();

                return $data;
        }

        public function getUpcomingModule()
        {
                //Set Student ID
                $this->Student_model->setStudent_ID($this->session->userdata('Login_ID'));
                //Get Student Module
                $data = $this->Student_model->get_upcoming_module();

                return $data;
        }

        public function personalTutor()
        {
                //Set Student ID
                $this->Student_model->setStudent_ID($this->session->userdata('Login_ID'));
                //Get Student Module
                $data = $this->Student_model->get_personalTutor();

                return $data;
        }

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
        
}