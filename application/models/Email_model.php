<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {
	
	function __construct()
    {
        parent::__construct();
    }

	function signup_email($to, $name, $uname, $pass, $mob, $code){
    	
		$msgbody  = "<br><br>You are now successfully registered in our system.";
		$msgbody .= "<br><br><b>User Name: ". $uname;
		$msgbody .= "<br>Password: ". $pass ."</b>";
		$msgbody .= "<br>Registered Email: ". $to;
		$msgbody .= "<br>Registered Mobile: ". $mob;
		$msgbody .= "<br><br>Please click on the button to active your account and enjoy the unlimited facality.";
		$msgbody .= '<p style="text-align:center"><a href="'.base_url().'confirmation/confirmation.php?passkey='.$code.'"><img src="http://27.147.195.222:2241/yeezy/require/img/clickhere.jpg" border="0" width=150px height=30px></a></p>';
		$msgbody .= '<p style="text-align:center">Note:- If the above button does not work, please navigate to </p>';
		$msgbody .= base_url()."confirmation/confirmation.php?passkey=".$code;
		
		$sub = "Login Credentials of Navigate Connect";

		return $this->do_email($to,$name,$sub,$msgbody);
	}

	function calendar_email($to, $name, $uname, $pass, $mob, $code){
    	
		$msgbody  = "<br><br>You are now successfully registered in our system.";
		$msgbody .= "<br><br><b>User Name: ". $uname;
		$msgbody .= "<br>Password: ". $pass ."</b>";
		$msgbody .= "<br>Registered Email: ". $to;
		$msgbody .= "<br>Registered Mobile: ". $mob;
		$msgbody .= "<br><br>Please click on the button to active your account and enjoy the unlimited facality.";
		$msgbody .= '<p style="text-align:center"><a href="'.base_url().'confirmation/confirmation.php?passkey='.$code.'"><img src="http://27.147.195.222:2241/yeezy/require/img/clickhere.jpg" border="0" width=150px height=30px></a></p>';
		$msgbody .= '<p style="text-align:center">Note:- If the above button does not work, please navigate to </p>';
		$msgbody .= base_url()."confirmation/confirmation.php?passkey=".$code;
		
		$sub = "Login Credentials of Navigate Connect";

		return $this->do_email($to,$name,$sub,$msgbody);
	}
	
	function signup_invited_user($to, $name, $uname, $pass, $mob){

		$msgbody  = "<br><br>Your email verification is completed. And you are now successfully registered in our Navigate Connect.";
		$msgbody .= "<br><br><b>User Name: ". $uname;
		$msgbody .= "<br>Password: ". $pass ."</b>";
		$msgbody .= "<br>Registered Email: ". $to;
		$msgbody .= "<br>Registered Mobile: ". $mob;
		$msgbody .= "<br><br>Please click on the button to login.";
		$msgbody .= '<p style="text-align:center"><a href="'.base_url().'"><img src="http://27.147.195.222:2241/yeezy/require/img/clickhere.jpg" border="0" width=150px height=30px></a></p>';
		$msgbody .= '<p style="text-align:center">Note:- If the above button does not work, please navigate to </p>';
		$msgbody .= base_url();
		
		$sub = "Login Credentials of Navigate Connect";

		return $this->do_email($to,$name,$sub,$msgbody);
	}
	
	function workspace_invitation_listed_user($to, $name, $sendername, $senderemail, $org){
		$msg  = "<br><br>".$sendername." (".$senderemail.") invited you to collaborate using Navigate Connect in the ". $org . " workspace.";
        $msg .= "<br><br>You join the workspace from your workspace list.";
		$sub = "Join a workspace at Navigate Connect";
		return $this->do_email($to,$name,$sub,$msg);
	}	
	
	function workspace_invitation_nonlisted_user($to, $name, $sendername, $senderemail, $org, $code){
    	
		$msg  = "<br><br>".$sendername." (".$senderemail.") invited you to collaborate using Navigate Connect in the ". $org . " workspace.";
        $msg .= "<br><br><b>User Name: ". $name;
        $msg .= "<br>Registered Email: ". $to;
        $msg .= "<br><br>To join the workspace, please click on button.";
        $msg .= '<p style="text-align:center"><a href="'.base_url().'confirmation/emailverify/'.$code.'"><img src="http://27.147.195.222:2241/yeezy/require/img/clickhere.jpg" border="0" width=150px height=30px></a></p>';
        $msg .= '<p style="text-align:center">Note:- If the above button does not work, please navigate to </p>';
        $msg .= base_url().'confirmation/emailverify/'.$code;
		
		$sub = "Join a workspace at Navigate Connect";

		return $this->do_email($to,$name,$sub,$msg);
	}
	
	function sendlinkinviteuser($to,$linkurl,$shareby,$share_plain_pass,$exp_date){
		$sub = "Share a link to you.";
		$sessionData = $this->session->userdata('yeezyCRM');
		$msg  = "<p>".$sessionData['username']." one of the Navigate Connect User send you a link for your concern.</p>";
        $msg .= "<p>Please find the link bellow</p>";
        $msg .= "<p>".$linkurl."</p>";
        $msg .= "<p>Password: ".$share_plain_pass."<br>";
        $msg .= "<p>You can access this link until ".$exp_date."</p>";
		return $this->do_email($to,$to,$sub,$msg);
	}
	
	/***custom email sender****/
	function do_email($to, $name, $sub, $msg_body, $cc = '', $attachment=FALSE, $salutation='')
	{
		
		$config = array();
        $config['protocol']		= "smtp";
        $config['smtp_host']	= "27.147.195.222";
        $config['smtp_port']	= 2525;
        $config['smtp_user']	= "webmaster@imaginebd.com";
        $config['smtp_pass']	= "WM123";
        $config['mailtype']		= 'html';
        $config['charset']		= 'utf-8';
        // $config['charset']		= 'iso-8859-1';
        $config['newline']		= "\r\n";
        $config['wordwrap']		= TRUE;

        $this->load->library('email');

      
        $this->email->initialize($config);
        $this->email->clear(TRUE);

		$this->email->from('webmaster@imaginebd.com', 'Navigate Connect Developer Team');
		$this->email->to($to);
		$this->email->cc($cc);
		$this->email->subject($sub);
		
		$msg  = '	<!doctype html>';
		$msg .= '		<head>';
		$msg .= '			<meta name="viewport" content="width=device-width">';
		$msg .= '			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
		$msg .= '			<title>Navigate Connect</title>';
		$msg .= '			<style>';
		$msg .= '			.emailtitle{}';
		$msg .= '			.inviteeName{}';
		$msg .= '			.Inviteetitle{}';
		$msg .= '			.AppName{}';
		$msg .= '			.deVName{}';
		$msg .= '			.uname{}';
		$msg .= '			</style>';
		$msg .= '		</head>';
		$msg .= '		<body style="max-width: 600px; background:#e6e7e7;">';
		$msg .= '			<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; width: 100%;">';
		$msg .= '			    <tr>';
		$msg .= '               	<td style="background:#d2d0d0;text-align:center;"><img src="http://27.147.195.222:2241/yeezy/require/img/logo-navcon.png" border="0"></td>';
		$msg .= '			    <tr>';
		$msg .= '			    	<td style="padding:10px;">';
		if($salutation != ""){
			$msg .= '		    		<p>'.$salutation.' '.$name.'</p>';
			$msg .= '			        <p>'.$msg_body.'</p>';
		}
		else{
			$msg .= '		    		<p><b>Dear '.$name.',</b></p>';
			$msg .= '			        <p>'.$msg_body.'</p>';
			$msg .= '		        	<p>Thank you, <br><strong>Navigate Connect Team</strong></p>';
		}
		$msg .= '					</td>';
		$msg .= '				</tr>';
		// $msg .= '			    <tr>';
		// $msg .= '			    	<td style="padding:10px;">';
		// $msg .= '			          <div style="clear: both; padding-top: 10px; text-align: center; width: 100%;">';
		// $msg .= '			            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">';
		// $msg .= '			              <tr>';
		// $msg .= '			                <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-top: 10px; padding-bottom: 10px; font-size: 12px; color: #999999; text-align: center;" valign="top" align="center">';
		// $msg .= '			                  <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Navigate Connect</span>';
		// $msg .= '			                  <br> You got this mail beacuse of your notification is on.Don\'t like this mail? ';
		// $msg .= '			                    <a href="" style="text-decoration: underline; color: #999999; font-size: 12px; text-align: center;">Unsubscribe</a>';
		// $msg .= '			                  </td>';
		// $msg .= '			              </tr>';
		// $msg .= '			              <tr>';
		// $msg .= '			                  <td class="content-block powered-by" style="font-family: sans-serif; vertical-align: top; padding-top: 10px; padding-bottom: 10px; font-size: 12px; color: #999999; text-align: center;" valign="top" align="center">';
		// $msg .= '			                    Powered by <a href="http://yeezy" style="color: #999999; font-size: 12px; text-align: center; text-decoration: none;">Navigate Connect</a>.';
		// $msg .= '			                  </td>';
		// $msg .= '			              </tr>';
		// $msg .= '			            </table>';
		// $msg .= '			          </div>';
		// $msg .= '			    	</td>';
		// $msg .= '				</tr>';
		$msg .= '			</table>';
		$msg .= '		</body>';
		$msg .= '	</html>';
		$this->email->message($msg);

		if($attachment != FALSE){
			file_put_contents("temp/filenameattachmail.txt", $attachment);
			$this->email->attach($attachment);
		}
		
		if (!$this->email->send(FALSE)) {
	        return die(show_error($this->email->print_debugger())); 
	    }else {
	        return $this->email->print_debugger();
	    }
	}
}

