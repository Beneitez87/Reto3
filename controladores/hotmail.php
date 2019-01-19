<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hotmail extends CI_Controller{

 function __construct() 
    {/*
     * Load the models used by this controller
     */
        parent::__construct();
        $this->load->library('PHPMailer');
        $this->load->library('smtp');
    }
public function index()
	{
		
            $mail=new PHPMailer();
            $mail->SMTPSecure='tls';
            $mail->Host="smtp.live.com";
            $mail->Port=587;
            $mail->IsSMTP();
            $mail->SMTPAuth=true;
            
            $mail->Username="";  //
            $mail->Password="";             //
            
            $mail->AddAddress("iherran@fpzornotza.com");
            $mail->FromName="Name Surname";
            $mail->Subject="subject ( asunto)";
            $mail->Body="bla, bla, bla...";
            
            $mail->From=$mail->Username;
            $confirm=$mail->Send();
            
            if ($confirm)
            {
                echo "sent";
            }else{
                echo "error: ".$mail->ErrorInfo;
            }
            
            
            
            
            
	}

}
