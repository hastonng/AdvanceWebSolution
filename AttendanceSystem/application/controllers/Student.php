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
                else if(!strpos($this->session->userdata('Login_Email'), "@studentanglia"))
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

                        if($studentModule != false)
                        {
                                for($i = 0; $i < count($studentModule); $i++)
                                {
                                        $attendance[$i] = $this->Student_model->get_module_attendance($studentModule[$i]->Module_ID);

                                }

                                $result['attendance'] = $this->module_attendance($attendance);
                                
                        }
                        else
                        {
                                //No Modules
                                $result['attendance'] = array('aveAttendance' => '0.00','module' => []);
                        }

                        $result['triNum'] = $this->getTrimester();
                        $result['headerData'] = $headerData;
                        
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
                 $this->checkTrimester();
                // $this->Student_model->setTrimester_Period(2);

                 //Get Timetable
                 $data['timetable'] = $this->Student_model->getTimetable();

                 echo json_encode($data['timetable']);
        }

        public function readDates()
        {
                $File = file_get_contents("C:/xampp/htdocs/AttendanceSystem/application/helpers/trimester.txt");
                $stringarr = preg_split('/\s+/', $File);
                $this->Student_model->setStartDate($stringarr[0]);
                $this->Student_model->setEndDate($stringarr[1]);
        }

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

        public function getTrimester()
        {
                if((date('m') >= 8) && (date('m') <= 12))
                {
                        return 1;
                }
                else if((date('m') >= 1) && (date('m') <= 4))
                {
                        return 2;
                }
                else
                {
                        return 3;
                }
        }

        public function getStudentDetails()
        {
                //Set Student ID
                $this->Student_model->setStudent_ID($this->session->userdata('Login_ID'));
                //Get Student Details
                $studentDetails['student_details'] = $this->Student_model->get_student_details();
                $data = array('fName' => $studentDetails['student_details'][0]->First_Name,
                        'lName' => $studentDetails['student_details'][0]->Last_Name,
                        'courseName' => $studentDetails['student_details'][0]->Course_Prog." ".$studentDetails['student_details'][0]->Course_Name,
                        'email' => $studentDetails['student_details'][0]->Student_Email,
                        'sID' => $studentDetails['student_details'][0]->Student_ID);

                return $data;
        }

        public function getStudentModule()
        {
                //read trimester dates
                $this->readDates();
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
                $this->checkTrimester();
                // $this->Student_model->setTrimester_Period(2);

                //Get Student Module
                $data = $this->Student_model->getTimetable();

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

        public function getAnnouncement()
        {
                $result = $this->Student_model->get_announcement();

                echo json_encode($result);
        }


        public function uploadImage() 
        {
                $image_path = realpath(APPPATH."../assets/sImage");

                // echo json_encode($image_path);
                $config['upload_path'] = $image_path;
                $config['overwrite'] = TRUE;
                $config['file_name'] = $this->session->userdata('Login_ID')."_userImg";
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = 2000;
                $config['max_width'] = 1500;
                $config['max_height'] = 1500;
                
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('profile_image')) {
                        // $error = array('error' => $this->upload->display_errors());

                        echo json_encode("false");
                        // $this->load->view('files/upload_form', $error);
                } else {
                        $data = array('img_data' => $this->upload->data());
                        
                        $fileName = $data['img_data']['file_name'];
                        echo json_encode($fileName);
                        // $this->load->view('files/upload_result', $data);
                }
        }

        
}