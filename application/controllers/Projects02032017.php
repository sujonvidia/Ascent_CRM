<?php
	if (!defined('BASEPATH'))
    exit('No direct script access allowed');
	
	/*  
		*  @author : ITL
		*  04 Dec, 2016
	*/
	
	class Projects extends CI_Controller
	{
		function __construct() {
	        parent::__construct();
	        $this->load->model('crud_model');
	        $this->load->database();
	        $this->load->library('session');
	        $this->load->helper('form');
			$this->load->helper('file');
	        $this->load->model('Common_model');
			$this->load->model('calendarmodel');
			$this->load->model('Modulemodel'); // load Module model
	        /* cache control */
	        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
	        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	        $this->output->set_header('Pragma: no-cache');
	        $this->output->set_header("Expires: Mon, 26 Jul 2020 05:00:00 GMT");
		}
		
	    public function index() {
	        if ($this->session->userdata('admin_login') == 1){
	            $sessionData = $this->session->userdata('yeezyCRM');
				
				$page_data['acessType'] = $sessionData['accessType'];
				$page_data['id'] = $sessionData['user_id'];
				$page_data['org_id'] = $sessionData['org_id'];
				$page_data['username'] = $sessionData['username'];
				$page_data['user_img'] = $sessionData['user_img'];
				$page_data['user_email'] = $sessionData['user_email'];
				
				$page_data['page_name']  = 'projects';
				$page_data['page_title'] = 'Navcon :: Projects';
				
				$page_data['DashboardEvents'] = $this->calendarmodel->getDashboardCalendar($page_data['id'],$page_data['org_id'],'Event');
				$page_data['projectGroup'] = $this->Modulemodel->getAll("crm_project_group",array('org_id'=>$page_data['org_id']));
				$page_data['client'] = $this->Modulemodel->getAll("crm_contactdetails");
				
				
				$page_data['projectstatus'] = $this->Modulemodel->getAll("crm_projectstatus");
	        	$page_data['projecttasktype'] = $this->Modulemodel->getAll("crm_projecttasktype");
	        	$page_data['ticketpriorities'] = $this->Modulemodel->getAll("crm_ticketpriorities");
	        	$page_data['projecttaskprogress'] = $this->Modulemodel->getAll("crm_projecttaskprogress");
				//$page_data['users'] = $this->Modulemodel->getAllUsersWithoutMe($page_data['id']);
				$page_data['users'] = $this->Modulemodel->getWorkspaceUsersWithoutMe($page_data['id'],$page_data['org_id']);
				$page_data['alluser'] = $this->Modulemodel->getWorkspaceUsers($page_data['id'],$page_data['org_id']);
				$page_data['allusers'] =$this->db->select('ID, full_name,img')->get('crm_users')->result_array();

				

				$page_data['allprojects'] = $this->Modulemodel->getAllprojects($page_data['org_id'],$page_data['id']);
	            $this->load->view('projects',$page_data);
			}else{
	            $this->load->view('login');
			}
			
	        
		}
		
	    // added by sujon @ 1/3/2017
		
		public function Invquoteitemupdate() {
			try{
				
				$newvlu['subject'] = $_POST['qname'];
				$newvlu['invoicestatus'] = $_POST['qstage'];
				
				$this->Modulemodel->updateInvQuoteList($newvlu,$_POST['invid']);
				
				//}
				}catch (Exception $e) {
				file_put_contents("8.1.16.txt", $e);
			}
			
		}
		// sujon @ 8/16/16
		public function changeQuoteCurrency($qid=0){
			
			$vlu['name'] = $_POST['sel_currency'][0];
			
			$vlu['type_name'] = "Currency";
			$vlu['type'] = "Quote";
			$vlu['type_value'] = $_POST['optcurtype'];
			$vlu['type_id'] = 0;
			
			$this->Modulemodel->deleteItem("crm_currency_units",array('type_name'=>"Currency",'type'=>"Quote",'type_id'=>0));       
			$this->Modulemodel->insertData("crm_currency_units", $vlu);
			
			
			
			
			// $this->Modulemodel->updateOneData('crm_quotes',$vlu , array('quoteid'=>$qid ));
			
			// if(isset($_POST['currencyLink'])){
			//    $this->Modulemodel->updateOneData('crm_quotes', $vlu, array('type'=>"invoice_quote",'type_id'=>$qid ));
			//    $this->Modulemodel->convertCurrencyLinks($vlu['currency_value'],$qid);
			// }
		}
		// added by sujon @ 8/10/16
		public function Invoicequoteitemupdate() {
			try{
				
				$newvlu['subject'] = $_POST['qname'];
				$newvlu['quotestage'] = $_POST['qstage'];
				
				$this->Modulemodel->updateInvoiceQuoteList($newvlu,$_POST['qid']);
				
				//}
				}catch (Exception $e) {
				file_put_contents("8.1.16.txt", $e);
			}
			
		}
		// show complete task by sujon @ 6/22/16
		public function updateShowComplete() {
			if ($this->session->userdata('yeezyCRM')) {
				
				$this->Modulemodel->updateOneData("crm_project", array(
                "show_complete" => $_POST["ustatus"]), array('projectid'=>$_POST["uid"]));
				
				} else {
				redirect('login', 'refresh');
			}
		}
		// update serial by sujon @ 7-20-2016
		public function updateSerial(){
			$ara = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['username'] = $sessionData['username'];
			$data['org_id'] = $sessionData['org_id'];
			
			
			$inputdata = array(
            "projecttaskcode" => $_POST["ptcode"]
            );
			
			$ara['status'] = $this->Modulemodel->updateOneData("crm_projecttask",$inputdata,array('projecttaskid'=>$_POST["ptid"]));
			
			header('Content-Type: application/json');
			echo json_encode($ara);
		}
		// added by sujon
		public function insertInvoices($quoteid=0,$pro_id=0,$taskid=0) {
			if($this-> session -> userdata('yeezyCRM')){
				
				$date = date('Y-m-d H:i:s'); 
				
				$array = array();
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$data['acessType'] = $sessionData['accessType'];
				$data['id'] = $sessionData['user_id'];
				$data['org_id'] = $sessionData['org_id'];
				$data['username'] = $sessionData['username'];
				$data['user_img'] = $sessionData['user_img'];
				
				//$data['users'] = $this->Modulemodel->getAll("users");
				$data['users'] = $this->Modulemodel->getAllUsersWithoutMe($data['id']);
				$data['groups'] = $this->Modulemodel->getAll("crm_groups");
				
				$vlu['subject'] = $_POST["inv_subject_new"];
				$vlu['accountid'] = $_POST["inv_accountid_new"];
				
				$vlu['org_id'] = $data['org_id'];
				$vlu['creator'] = $data['id'];
				$vlu['star_type'] = false;
				$vlu['lastUpdate'] = $date;
				$vlu['createdate'] = date('Y-m-d H:i:s');
				$vlu['Divid'] = time();
				$vlu['contactid'] = 0; 
				$vlu['description'] = $_POST["newDescription"];
				$vlu['invoicestatus'] = "Opened";
				
				$vlu['invoice_discount_type'] = "zero";
				$vlu['invoice_discount_amount'] = 0;
				$vlu['sh_vat'] = 4.5;
				$vlu['sh_sales'] = 10;
				$vlu['sh_service'] = 12.5;
				
				$vlu['quoteid'] = $quoteid;
				$vlu['pro_id'] = $pro_id;
				$vlu['taskid'] = $taskid;
				
				$vlu['terms_conditions']= " - Unless otherwise agreed in writing by the supplier all invoices are payable within thirty (30) days of the date of invoice, in the currency of the invoice, drawn on a bank based in India or by such other method as is agreed in advance by the Supplier.
				
				- All prices are not inclusive of VAT which shall be payable in addition by the Customer at the applicable rate.";
				
				$data["invoiceid"] = $this->Modulemodel->insertData("crm_invoice", $vlu);
				
				$data['task_invoices'] = $this->Modulemodel->getInvoiceByID($data["invoiceid"]);
				
				$vlu_bill['invoicebilladdressid'] = $data['invoiceid'];
				$vlu_bill['bill_street'] = $_POST['inv_bill_street_new'];
				$data["invoicebilladdressid"] = $this->Modulemodel->insertData("crm_invoicebillads", $vlu_bill);
				
				$vlu_ship['invoiceshipaddressid'] = $data['invoiceid'];
				$vlu_ship['ship_street'] = $_POST['inv_ship_street_new'];
				$data["invoiceshipaddressid"] = $this->Modulemodel->insertData("crm_invoiceshipads", $vlu_ship);
				
				
				// if($_POST['inv_shared_userid_new']){
				// 	foreach ($_POST['inv_shared_userid_new'] as $key => $value) {
				// 		$assign['type'] = "invoice";
				// 		$assign['userteamid'] = $value;
				// 		$assign["relatedto"] = $data["invoiceid"];
				// 		if($_POST["inv_sharedtype_new"] == "U") { 
				
				// 			$assign['idtype'] = "userid"; 
				// 		}
				// 		elseif($_POST["inv_sharedtype_new"] == "G") { 
				
				// 			$assign['idtype'] = "teamid"; 
				// 		}
				
				// 		$this->insertmodule->insertData("crm_tag", $assign);
				
				// 	}
				// }
				//$data['NotificationList'] = $this->calendarmodel->getNotificationList($data['id']);
				$data['menuName'] = "Invoices List";
				$data['subMenuName'] = '';
				$data['message'] = "Successfully Invoices save";
				
				
				// 	redirect('yzy-invoices/index/invoice/account', 'refresh');
				
				if($quoteid != 0){
					//$this->Modulemodel->duplicate_iqrows($quoteid,$data["invoiceid"],false,0);
				}
				header('Content-Type: application/json');
				echo json_encode($data);
				//}
				
				
				}else{
				
				redirect('login', 'refresh');
				
			}
		}
		
		public function getTaskQouteList(){
			
			$data = array();
			$pid = $_POST['pid'];
			
			if($_POST['get_status']==1){
				$data['updated_quotes'] = $this->Modulemodel->getAllQuotes($Vid);
				
				}else{
				$data['updated_quotes'] = $this->Modulemodel->getUserQuotes($Vid,$user_id);
				
			}
			$data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Currency",'type'=>"Quote",'type_id'=>0));
			$data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Unit",'type'=>"Quote",'type_selected'=>1,'type_status'=>1));
			
			
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		public function getInvoiceList(){
			
			$data = array();
			$pid = $_POST['pid'];
			if($_POST['get_status']==1){
				$data['allInvoiceList'] = $this->Modulemodel->getAll("crm_invoice", array('pro_id'=>$pid));
				}else{
				$data['allInvoiceList'] = $this->Modulemodel->getAll("crm_invoice", array('pro_id'=>$pid,'creator'=>$_POST['user_id']));
			}
			$data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Currency",'type'=>"Quote",'type_id'=>0));
			$data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Unit",'type'=>"Quote",'type_selected'=>1,'type_status'=>1));
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		
		public function viewAddInvoices($quoteid=0,$pro_id=0,$taskid=0) {
			
			if($this-> session -> userdata('yeezyCRM')){
				
				$date = date('Y-m-d H:i:s'); 
				
				$array = array();
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$data['acessType'] = $sessionData['accessType'];
				$data['id'] = $sessionData['user_id'];
				$data['org_id'] = $sessionData['org_id'];
				$data['username'] = $sessionData['username'];
				$data['user_img'] = $sessionData['user_img'];
				
				//$data['users'] = $this->Modulemodel->getAll("users");
				$data['users'] = $this->Modulemodel->getAllUsersWithoutMe($data['id']);
				$data['groups'] = $this->Modulemodel->getAll("crm_groups");
				
				//$data['NotificationList'] = $this->calendarmodel->getNotificationList($data['id']);
				$data['menuName'] = "Invoice List";
				$data['subMenuName'] = '';
				
				$data['quoteid'] = $quoteid;
				$data['pro_id'] = $pro_id;
				$data['taskid'] = $taskid;
				
				if($quoteid==0){
					$this->load->view('Accounts/add_invoices',$data);
					}else{
					
					$this->load->view('Accounts/add_invoices_task',$data);
					
				}
				}else{
				
				redirect('login', 'refresh');
				
			}
		}
		
		public function invoiceQuotesDetail($invid,$qid) {
			
			//$Vid = $this->input->post('taskID');
			
			$data['invoice_quotes'] = $this->Modulemodel->getAllQuotesByInvoice($invid,$qid);
			// $data['updated_items'] = $this->Modulemodel->getAllTaskItem($qid);
			// $data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Currency",'type'=>"Quote",'type_id'=>$qid));
			// $data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Unit",'type'=>"Quote",'type_id'=>$qid,'type_selected'=>1,'type_status'=>1));
			
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		public function invoiceQuotesItemDetail($qid,$typeid=0) {
			
			$data['updated_quotes'] = $this->Modulemodel->getAllQuotesById($qid);
			$data['updated_items'] = $this->Modulemodel->getInvoiceQuoteItem($qid);
			
			$data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Currency",'type'=>"Quote",'type_id'=>0));
			
			$data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Unit",'type'=>"Quote",'type_selected'=>1,'type_status'=>1));
			
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		public function quotesItemDelete() {
			
			
			$this->Modulemodel->delQuotesById($_POST["qid"]);
			$data['status']='ok';
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		
		// sujon @ 8/11/16
		public function invoiceItemDelete() {
			
			
			$this->Modulemodel->delInvoiceById($_POST["invid"]);
			$data['status']='ok';
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		public function taskitemupdate($qid=0,$tid=0,$lid=0,$invid=0) {
			try{
				
				if($qid==0){ // from quotation tab
					$this->Modulemodel->deleteItem("crm_service_items",array('type_id'=>$_POST['quoteitemid']));
					}else{ // from invoice tab
					$this->Modulemodel->deleteItem("crm_service_items",array('type_id'=>$qid));
				}
				
				foreach ($_POST['sel_servicename_item'] as $key => $value) {
					
					$assign_item['item_name']=$_POST['sel_servicename_item'][$key];
					if($qid==0){
						$assign_item['type_id']=$_POST['quoteitemid'];
						$assign_item['typeof_item']="quotes";
						}else{
						$assign_item['type_id']=$qid;
						$assign_item['typeof_item']="invoice_quote";
					}
					
					$assign_item['serviceid'] = 0;
					$assign_item['quantity'] = $_POST['qty'][$key];
					
					$assign_item['item_unit'] = $_POST['sel_qty_unit'][$key];
					$assign_item["listprice"] = str_replace(',', '', $_POST['listPrice'][$key]);
					$assign_item["total_discount"] = $_POST['total_discount'][$key];
					$assign_item["total_tax"] = $_POST['total_tax'][$key];
					$assign_item["total_afterdiscount"] = $_POST['total_afterdiscount'][$key];
					$assign_item["netprice"] = $_POST['netprice'][$key];
					$assign_item["discount_type"] = $_POST['discount_type'][$key];
					
					$assign_item["item_tax_vat"] = ($_POST['load_tax_vat'][$key]=="null") ? null : $_POST['load_tax_vat'][$key];
					$assign_item["item_tax_sales"] = ($_POST['load_tax_sales'][$key]=="null") ? null : $_POST['load_tax_sales'][$key];
					$assign_item["item_tax_service"] = ($_POST['load_tax_service'][$key]=="null") ? null : $_POST['load_tax_service'][$key];
					
					$assign_item["discount_percent"] = $_POST['discount_val_percent'][$key];
					$assign_item["discount_amount"] = $_POST['discount_val_direct'][$key];
					
					$assign_item["item_currency"] = $_POST['sel_currency'][$key];
					$assign_item["item_currency_value"] = $_POST['item_cur_value'][$key];
					//$assign_item['item_unit_value'] = $_POST['item_unit_value'][$key];
					
					$this->Modulemodel->insertData("crm_service_items", $assign_item);
					
				}
				// if(isset($_POST['sel_servicename_item'])){
				$newvlu['quotes_discount_type'] = $_POST['discount_type_grand'];
				$newvlu['quotes_discount_amount'] = $_POST['discount_val_grand_direct'];
				$newvlu['quotes_discount_percent'] = $_POST['discount_val_grand_percent'];
				
				$newvlu['sh_vat'] = $_POST['load_tax_vat_sh'];
				$newvlu['sh_sales'] = $_POST['load_tax_sales_sh'];
				$newvlu['sh_service'] = $_POST['load_tax_service_sh'];
				$newvlu['s_h_amount'] = $_POST['in_shiphandlecharge'];
				
				$newvlu['net_total'] = $_POST['net_total'];
				$newvlu['net_totalafterdisgrand'] = $_POST['net_totalafterdisgrand'];
				$newvlu['taxtotal_shiphandle'] = $_POST['taxtotal_shiphandle'];
				$newvlu['grand_total'] = $_POST['grand_total_hval'];
				$newvlu['currency_name'] = $_POST['grand_total_currency'];
				
				$newvlu['adjustment_type'] = isset($_POST['sel_adjustmentType']) ? $_POST['sel_adjustmentType'] : null;
				
				$newvlu['adjustment'] = isset($_POST['in_adjustment']) ? $_POST['in_adjustment'] : null;
				
				if($qid==0){
					$this->Modulemodel->updateQuoteList($newvlu,$_POST['quoteitemid']);
					}else{
					
					$this->Modulemodel->updateQuoteList($newvlu,$qid);
				}
				
				if($lid==0){
					
					}else{
					$newvlu['quotestage']='Revised';
					$this->Modulemodel->updateQuoteList($newvlu,$qid);
					
					$newvlu['new_quoteid']=$this->Modulemodel->revision_iqrows($qid,$tid,$lid,$invid);
					$newvlu['old_quoteid']=$qid;
					$newvlu['old_invid']=$invid;
					
				}
				$newvlu['default']=true;
				header('Content-Type: application/json');
				echo json_encode($newvlu);
				
				
				}catch (Exception $e) {
				file_put_contents("8.1.16.txt", $e);
			}
			
		}
		
	    public function quoteitemupdate() {
			try{
				
				$newvlu['subject'] = $_POST['qname'];
				$newvlu['quotestage'] = $_POST['qstage'];
				
				$this->Modulemodel->updateQuoteList($newvlu,$_POST['qid']);
				
				//}
				}catch (Exception $e) {
				file_put_contents("8.1.16.txt", $e);
			}
			
		}
		public function getQuoteUnits() {
			
			$data = array();
			$data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Unit",'type'=>"Quote"));
			
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		
		public function popupQuoteSettings($qid=0) {
		    if ($this->session->userdata('yeezyCRM')) {
				
		        $sessionData = $this->session->userdata('yeezyCRM');
				
		        $data['acessType'] = $sessionData['accessType'];
		        $data['id'] = $sessionData['user_id'];
		        $data['username'] = $sessionData['username'];
		        $data['user_img'] = $sessionData['user_img'];
				
		        $data['menuName'] = "Settings";
		        $data['subMenuName'] = '';
		        $data['quoteid'] = $qid;
		        
		        $this->load->view('popups/popup_quote_settings', ($data));
				} else {
				
		        redirect('login', 'refresh');
			}
		}
		
		public function curlQuoteCurrency(){
			
			$response = read_file('require/http/currency.json');
            $data['NewCurrencyName']= 'File opened!';
            $data['NewCurrencyValue']= ($response);
			
			//     $url = "http://www.mycurrency.net/service/rates"; 
			//     $request = curl_init(); 
			
			//     $timeOut = 0; 
			//     curl_setopt ($request, CURLOPT_URL, $url); 
			//     curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1); 
			//     curl_setopt ($request, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
			//     curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, $timeOut); 
			//     //curl_setopt($request, CURLOPT_HTTPHEADER, array('Accept: application/json'));
			//     $response = curl_exec($request); 
			//     //fwrite($fp, $response);
			
			//     $httpCode = curl_getinfo($request,CURLINFO_HTTP_CODE);
			//     $data['httpCode']=$httpCode;
			
			//     // if ( $httpCode != 200 ) {
			//     //     $data['NewCurrencyStatus']= 'Unable to get the url';
			//     //     $response = read_file('require/http/currency.json');
			//     //     $data['NewCurrencyName']= 'File opened!';
			//     //     $data['NewCurrencyValue']= ($response);
			
			//     // }else{
			//         if ( !  write_file('require/http/currency.json', $response,'w'))
			//         {
			//             $data['NewCurrencyStatus']= 'Unable to write the file';
			//             $response = read_file('require/http/currency.json');
			//             $data['NewCurrencyName']= 'File opened!';
			//             $data['NewCurrencyValue']= ($response);
			//         }
			//         else
			//         {
			//             $data['NewCurrencyName']= 'File written!';
			//             $response = read_file('require/http/currency.json');
			//             $data['NewCurrencyValue']= ($response);
			//         }
			//    // }
			
			// //     $httpCode = curl_getinfo($request, CURLINFO_HTTP_CODE);
			// //     if ( $httpCode == 404 ) {
			
			// // } else {
			
			
			// // }
			// curl_close($request); 
			
			
			//     $data['NewCurrencyName']= $url;
			
			$data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Currency",'type'=>"Quote",'type_id'=>0));
			
			header('Content-Type: application/json');
			echo json_encode($data);
			
		}
		
	    public function popupdiscount($id,$id2,$dis_type,$dis_value_percent,$dis_value_direct) {
			if ($this->session->userdata('yeezyCRM')) {
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$data['acessType'] = $sessionData['accessType'];
				$data['id'] = $sessionData['user_id'];
				$data['username'] = $sessionData['username'];
				$data['user_img'] = $sessionData['user_img'];
				$data['srvnum'] = $id;
				$data['srvnum2'] = $id2;
				$data['srvtype'] = $dis_type;
				$data['srvdisval_percent'] = $dis_value_percent;
				$data['srvdisval_direct'] = $dis_value_direct;
				$data['menuName'] = "discount";
				$data['subMenuName'] = '';
				$this->load->view('popups/popup_discount', $data);
				} else {
				
				redirect('login', 'refresh');
			}
		}
		public function popupdiscountgrand($dis_type,$dis_for,$dis_value_percent,$dis_value_direct,$dis_serial='') {
			if ($this->session->userdata('yeezyCRM')) {
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$data['acessType'] = $sessionData['accessType'];
				$data['id'] = $sessionData['user_id'];
				$data['username'] = $sessionData['username'];
				$data['user_img'] = $sessionData['user_img'];
				
				$data['pdis_type'] = $dis_type;
				$data['pdis_for'] = $dis_for;
				$data['pdis_value_percent'] = $dis_value_percent;
				$data['pdis_value_direct'] = $dis_value_direct;
				$data['dis_serial'] = $dis_serial;
				
				$data['menuName'] = "discount";
				$data['subMenuName'] = '';
				$this->load->view('popups/popup_discountgrand', $data);
				} else {
				
				redirect('login', 'refresh');
			}
		}
		public function popuptax($p_id,$p_vat,$p_sales,$p_service,$p_afterdis,$currency_symbol=false) {
			if ($this->session->userdata('yeezyCRM')) {
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$data['acessType'] = $sessionData['accessType'];
				$data['id'] = $sessionData['user_id'];
				$data['username'] = $sessionData['username'];
				$data['user_img'] = $sessionData['user_img'];
				$data['taxnum'] = $p_id;
				$data['taxvat'] = $p_vat;
				$data['taxsales'] = $p_sales;
				$data['taxservice'] = $p_service;
				$data['taxafterdis'] = $p_afterdis;
				
				$data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Currency",'type'=>"Quote",'type_id'=>0));
				
				$data['currency_symbol'] = substr_replace($data['currencyList'][0]->name, "", -1);
				
				// $data['countrystandard'] = $this->Modulemodel->getAll("crm_tax_calculation",array('country' => $data['currency_symbol'],'calculation' => 'standard'),'id');
				
				
				// $data['countrytruncated'] = $this->Modulemodel->getAll("crm_tax_calculation",array('country' => $data['currency_symbol'],'calculation' => 'truncated'),'id');
				
				$data['menuName'] = "tax";
				$data['subMenuName'] = '';
				$this->load->view('popups/popup_tax', $data);
				} else {
				
				redirect('login', 'refresh');
			}
		}
		public function popuptaxshiphand($p_vat,$p_sales,$p_service,$p_afterdis,$p_serial='') {
			if ($this->session->userdata('yeezyCRM')) {
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$data['acessType'] = $sessionData['accessType'];
				$data['id'] = $sessionData['user_id'];
				$data['username'] = $sessionData['username'];
				$data['user_img'] = $sessionData['user_img'];
				
				$data['taxvat'] = $p_vat;
				$data['taxsales'] = $p_sales;
				$data['taxservice'] = $p_service;
				$data['taxafterdis'] = $p_afterdis;
				$data['p_serial'] = $p_serial;
				
				$data['menuName'] = "tax";
				$data['subMenuName'] = '';
				$this->load->view('popups/popup_tax_shiphand', $data);
				} else {
				
				redirect('login', 'refresh');
			}
		}
		
	    // get sticky note by sujon
		public function readStickyNote(){
			$ara = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['username'] = $sessionData['username'];
			$data['org_id'] = $sessionData['org_id'];
			
			$ara['notes'] = $this->Modulemodel->getStickyNote($_POST["tid"]);
			
			header('Content-Type: application/json');
			echo json_encode($ara);
		}
		// get sub sticky note by sujon
		public function readStickyNoteSub(){
			$ara = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['username'] = $sessionData['username'];
			$data['org_id'] = $sessionData['org_id'];
			
			
			$ara['note'] = $this->Modulemodel->getStickyNoteSub($_POST["tid"]);
			
			header('Content-Type: application/json');
			echo json_encode($ara);
		}
		public function document($taskID) {
			$sessionData = $this->session->userdata('yeezyCRM');
			$data['allFolder'] = $this->Taskmodel->getFolderName();
			$data['id'] = $sessionData['user_id'];
			$data['taskID'] = $taskID;
			$this->load->view('Tasks/document', $data);
		}
		
		// update task by sujon
		public function updatetaskNew(){
			$ara = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['username'] = $sessionData['username'];
			$data['org_id'] = $sessionData['org_id'];
			
			
			$inputdata = array(
            "tasklistID" => $_POST["utasklistid"],
            "projecttaskname" => $_POST["utask_name"],
            "projecttaskhours" => $_POST["uduration"],
            "startdate" => $_POST["ustart_date"], 
            "enddate" => $_POST["uend_date"],
            );
			
			$ara['allTask'] = $this->Modulemodel->updateOneData("crm_projecttask",$inputdata,array('projecttaskid'=>$_POST["utaskid"]));
			
			header('Content-Type: application/json');
			echo json_encode($ara);
		}
		// update sub sticky note by sujon
		public function updateStickyNoteSub(){
			$ara = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['username'] = $sessionData['username'];
			$data['org_id'] = $sessionData['org_id'];
			
			
			$inputdata = array(
            "stickynote" => $_POST["note"],
            "notepopup" => $_POST["popup"]
            
            );
			
			$ara['allTask'] = $this->Modulemodel->updateOneData("crm_projectSubTask",$inputdata,array('projecttaskid'=>$_POST["tid"]));
			
			header('Content-Type: application/json');
			echo json_encode($ara);
		}
		// complete task by sujon @ 6/22/16
		public function updatechecked() {
			if ($this->session->userdata('yeezyCRM')) {
				
				$inputdata = array(
                "checked" => $_POST["uchecked"],
				);
				if($_POST["utable"]=="SUBTASK"){
					$this->Modulemodel->updateOneData("crm_projectSubTask", $inputdata, array('projecttaskid'=>$_POST["uid"]));
				}
				if($_POST["utable"]=="TASK"){
					$this->Modulemodel->updateOneData("crm_projecttask", $inputdata, array('projecttaskid'=>$_POST["uid"]));
					
					$this->Modulemodel->updateOneData("crm_projectSubTask", $inputdata, array('parenttaskID'=>$_POST["uid"]));
				}
				if($_POST["ustatus"]=="ACTIVE"){
					$this->Modulemodel->updateOneData("crm_projecttask", array(
					"task_status" => $_POST["ustatus"]), array('projecttaskid'=>$_POST["uid"]));
					$this->Modulemodel->updateOneData("crm_projectSubTask", array(
					"status" => $_POST["ustatus"]), array('parenttaskID'=>$_POST["uid"]));
					
				}
				
				
				} else {
				redirect('login', 'refresh');
			}
		}
		
		// update sticky note by sujon
		public function addStickyNote(){
			$ara = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['username'] = $sessionData['username'];
			$data['org_id'] = $sessionData['org_id'];
			
			$inputdata = array(
			"user_id" => $sessionData['user_id'],
            "stickynote" => $_POST["note"],
            "createdate" => date("Y-m-d H:i:s", time()),
            "updatedate" => date("Y-m-d H:i:s", time()),
            "link_id" => $_POST["tid"]
            
            );
			
			
			$ara['newid'] = $this->Modulemodel->insertData("crm_stickynotes", $inputdata);
			$this->db->select('*'); 
			$this->db->from('crm_stickynotes');
			$this->db->join('crm_users', 'crm_users.ID = crm_stickynotes.user_id');   
			$this->db->where('crm_stickynotes.id', $ara['newid']);
			$ara['newnote'] = $this->db->get()->result();
			
			//$ara['newnote'] = $this->Modulemodel->getAll("crm_stickynotes",array("id" => $ara['newid']));
			
			//$ara['allTask'] = $this->Modulemodel->updateOneData("crm_projecttask",$inputdata,array('projecttaskid'=>$_POST["tid"]));
			
			header('Content-Type: application/json');
			echo json_encode($ara);
		}
		
		// update sticky note by sujon
		public function delStickyNote(){
			$ara = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['username'] = $sessionData['username'];
			$data['org_id'] = $sessionData['org_id'];
			
			$data['status']=$this->Modulemodel->deleteItem("crm_stickynotes",array('id'=>$_POST['noteid'],'user_id'=>$sessionData['user_id']));
			
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		
		public function updateStickyNote(){
			$ara = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['username'] = $sessionData['username'];
			$data['org_id'] = $sessionData['org_id'];
			
			$data['status'] = $this->Modulemodel-> updateOneData("crm_stickynotes", array('stickynote'=>$_POST["stickynote"]), array('id'=>$_POST["noteid"]));
			
			
			
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		
		public function viewAddQuotes($taskid=0,$pro_id=0) {
			if($this-> session -> userdata('yeezyCRM')){
				
				$date = date('Y-m-d H:i:s'); 
				
				$array = array();
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$data['acessType'] = $sessionData['accessType'];
				$data['id'] = $sessionData['user_id'];
				$data['org_id'] = $sessionData['org_id'];
				$data['username'] = $sessionData['username'];
				$data['user_img'] = $sessionData['user_img'];
				
				//$data['users'] = $this->Modulemodel->getAll("users");
				$data['users'] = $this->Modulemodel->getAllUsersWithoutMe($data['id']);
				$data['groups'] = $this->Modulemodel->getAll("crm_groups");
				
				//$data['NotificationList'] = $this->calendarmodel->getNotificationList($data['id']);
				$data['menuName'] = "Quotes List";
				$data['subMenuName'] = '';
				
				$data['taskid'] = $taskid;
				$data['pro_id'] = $pro_id;
				
				if($taskid == 0){
					$this->load->view('Accounts/add_quotes',$data);
				}else{$this->load->view('Accounts/add_quotes_task',$data);}
				
				}else{
				
				redirect('login', 'refresh');
				
			}
		}
		
		public function quotesItemDetail($qid,$taskid=0) {
			
			$data['updated_quotes'] = $this->Modulemodel->getAllQuotesById($qid);
			$data['updated_items'] = $this->Modulemodel->getAllTaskItem($qid);
			$data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Currency",'type'=>"Quote",'type_id'=>0));
			
			$data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Unit",'type'=>"Quote",'type_selected'=>1,'type_status'=>1));
			
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		
		public function insertQuotes($status=0,$pro_id=0) {
			if($this-> session -> userdata('yeezyCRM')){
				
				$date = date('Y-m-d H:i:s'); 
				
				$array = array();
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$data['acessType'] = $sessionData['accessType'];
				$data['id'] = $sessionData['user_id'];
				$data['org_id'] = $sessionData['org_id'];
				$data['username'] = $sessionData['username'];
				$data['user_img'] = $sessionData['user_img'];
				
				//$data['users'] = $this->Modulemodel->getAll("users");
				$data['users'] = $this->Modulemodel->getAllUsersWithoutMe($data['id']);
				$data['groups'] = $this->Modulemodel->getAll("crm_groups");
				
				$data['subject'] = $vlu['subject'] = $_POST["Qt_Subject_new"];
				//$data['quotename'] = $vlu['subject'];
				$vlu['accountid'] = $_POST["accountid_qtnew"];
				$data['quotestage'] = $vlu['quotestage'] = $_POST["quotestage"];
				
				//$data['quotestage'] = $_POST["quotestage"];
				date_default_timezone_set("Asia/Dhaka");
				$data['createdate'] = $vlu['createdate'] = date('Y-m-d H:i:s');
				//$data['createdate']=$vlu['createdate'];
				
				$vlu['org_id'] = $data['org_id'];
				$vlu['creator'] = $data['id'];
				$vlu['star_type'] = false;
				$vlu['lastUpdate'] = $date;
				$vlu['Divid'] = time();
				$vlu['taskid'] = $_POST["taskid"]; 
				$vlu['contactid'] = 0; 
				$vlu['description'] = $_POST["newDescription"];
				// defaults 
				$vlu['quotes_discount_type'] = "zero";
				$vlu['quotes_discount_amount'] = 0;
				$vlu['sh_vat'] = 4.5;
				$vlu['sh_sales'] = 10;
				$vlu['sh_service'] = 12.5;
				$vlu['s_h_amount'] = 0;
				$vlu['adjustment_type'] = 'add';
				$vlu['adjustment'] = 0;
				
				$vlu['pro_id'] = $pro_id;
				
				$vlu['currency_name'] = $this->Modulemodel->getDefCur();
				
				
				$vlu['terms_conditions']= "- Unless otherwise agreed in writing by the supplier all invoices are payable within thirty (30) days of the date of invoice, in the currency of the invoice, drawn on a bank based in India or by such other method as is agreed in advance by the Supplier.
				
				- All prices are not inclusive of VAT which shall be payable in addition by the Customer at the applicable rate.";
				
				$data["quoteid"] = $this->Modulemodel->insertData("crm_quotes", $vlu);
				
				
				$this->Modulemodel->update_qtlink($data["quoteid"]);
				
				$vlu_bill['quotebilladdressid'] = $data['quoteid'];
				$vlu_bill['bill_street'] = $_POST['bill_street_new'];
				$data["quotebilladdressid"] = $this->Modulemodel->insertData("crm_quotesbillads", $vlu_bill);
				
				$vlu_ship['quoteshipaddressid'] = $data['quoteid'];
				$vlu_ship['ship_street'] = $_POST['ship_street_new'];
				$data["quoteshipaddressid"] = $this->Modulemodel->insertData("crm_quotesshipads", $vlu_ship);
				
				if($status==0){
					
					if($_POST['sharedQt_userid_new']){
						foreach ($_POST['sharedQt_userid_new'] as $key => $value) {
							$assign['type'] = "quotes";
							$assign['userteamid'] = $value;
							$assign["relatedto"] = $data["quoteid"];
							if($_POST["sharedtypeQt_new"] == "U") { 
								
								$assign['idtype'] = "userid"; 
							}
							elseif($_POST["sharedtypeQt_new"] == "G") { 
								
								$assign['idtype'] = "teamid"; 
							}
							
							$this->Modulemodel->insertData("crm_tag", $assign);
							
						}
					}
				}
				//$data['NotificationList'] = $this->calendarmodel->getNotificationList($data['id']);
				$data['menuName'] = "Quotes List";
				$data['subMenuName'] = '';
				$data['message'] = "Successfully Quotes save";
				
				
				// if($status==0){
				// 	redirect('yzy-quotes/index/quote/account', 'refresh');
				
				// }else{
				header('Content-Type: application/json');
				echo json_encode($data);
				//}
				}else{
				
				redirect('login', 'refresh');
				
			}
		}
		
	    public function getproject(){
	        
	        $array = array();
	        $projectArray = array();
	        $array['tasklist'] = array();
	        $array['projectIDlist'] = array();
	        $array['TotalTask'] = array();
	        $array['PendingTask'] = array();
	        $array['unsennsommnet'] = array();
	        $array['unsennFile'] = array();
	        
	        $sessionData = $this->session->userdata('yeezyCRM');
	        
	        $data['acessType'] = $sessionData['accessType'];
	        $data['id'] = $sessionData['user_id'];
	        $data['org_id'] = $sessionData['org_id'];
	        $array['sessionUId'] = $data['id'];
	        
	        $array['projects'] = $this->Modulemodel->getAllprojects($data['org_id'],$data['id']);
	        
	        foreach ($array['projects'] as $key => $value) {
	        	$TaskResult = $this->Modulemodel->getAllMyTaskLatestThree($data['id'],$value->Id);
	        	$TotalTask = $this->Modulemodel->getAllMyTaskLatest($data['id'],$value->Id);
	        	$PendingTask = $this->Modulemodel->getAllMyTaskLatestPending($data['id'],$value->Id);
	        	$unsennsommnet = $this->Modulemodel->getUnseenComment($value->Id,$data['id'],'Project');
	        	$unsennFile = $this->Modulemodel->getUnseenComment($value->Id,$data['id'],'File');
	        	
	        	array_push($array['tasklist'],$TaskResult);
	        	array_push($array['projectIDlist'],$value->Id);
	        	array_push($array['TotalTask'],$TotalTask);
	        	array_push($array['PendingTask'],$PendingTask);
	        	array_push($array['unsennsommnet'],$unsennsommnet);
	        	array_push($array['unsennFile'],$unsennFile);
			}

			
	        
	        
	        //$array['tag'] = $this->Modulemodel->getAll("crm_tag", array('type'=>'task', 'relatedto'=>$id));
	        
	        header('Content-Type: application/json');
	        echo json_encode($array);
		}
		
	    public function saveproject($id = FALSE)
	    {
	        if($this-> session -> userdata('yeezyCRM')){
				
	            $array = array();
	            $sessionData = $this->session->userdata('yeezyCRM');
				
	            $data['acessType'] = $sessionData['accessType'];
	            $data['id'] = $sessionData['user_id'];
	            $data['org_id'] = $sessionData['org_id'];
	            $data['username'] = $sessionData['username'];
	            $data['user_img'] = $sessionData['user_img'];
				
				$currrentDate = date('Y-m-d H:i:s');
				
				$inputdata = array(
					"Type" => 'Project',
	            	"Title" => $_POST["pName"],
	            	"Description" => $_POST["description"],
	            	"Startdate" => $currrentDate,
	            	"Enddate" => $currrentDate,
	            	"CreatedBy" => $data['id'],
	            	"CreatedDate" => $currrentDate,
	            	"HasParentId" => 0
	            );

				$data["activityid"] = $this->Modulemodel->insertData("crm_activity", $inputdata);
	            
	            $inputInsertData = array(
					'type' => 'Project',
					'type_id' => $data["activityid"],
					'relatedTo' => '',
					'user_id' => 0,
					'notification_for' => '1',
					'status' => '0',
					'title' => 'New Project',
					'body' => $_POST["pName"],
					'createdby' => $data['id']
                );
                
                $this->Modulemodel->insertData("crm_notification", $inputInsertData);
	            
	            $data['menuName'] = "Project List";
	            $data['subMenuName'] = '';
	            $data['message'] = "Successfully project save";
				
	            
	            $array['prioTask'] = $data["activityid"];
				
	            header('Content-Type: application/json');
	            echo json_encode($array);
	        }else{
				
				redirect('login', 'refresh');
			
			}
			
		}
		
	    public function getProDetail(){
	        $proArray = array();
	        
	        $project_ID = $_POST["projectID"];
	        
	        $proArray['proDetail'] = $this->Modulemodel->getAll("crm_project", array('projectid'=>$project_ID));
	        $proArray['tag'] = $this->Modulemodel->getAllTag($project_ID,'project');
			
	        $proArray['createdBy'] = $this->Modulemodel->get_type_name_by_id('crm_users',$proArray['proDetail'][0]->createdBy);
	        //$proArray['createdBy'] = $proArray['proDetail'][0]->createdBy;
	        header('Content-Type: application/json');
	        echo json_encode($proArray);
		}
		
	    public function updateProject(){
	        if (isset($_POST['projecteid'])) {
	            $this->load->helper('date');
				
	            $date = date('Y-m-d H:i:s'); 
	            $sessionData = $this->session->userdata('yeezyCRM');
				
	            $data['acessType'] = $sessionData['accessType'];
	            $data['id'] = $sessionData['user_id'];
	            $data['org_id'] = $sessionData['org_id'];
	            $url = $data['org_id'].".com/yzy-projects/index/projects";
	            
	            
	            
	            if($_POST['togPopTitle'] != ""){
	                $vlu['projectname'] = $_POST["togPopTitle"];
				}
	            
	            $vlu['startdate'] = $_POST["startdate"];
	            $vlu['targetenddate'] = $_POST["targetdate"];
	            $vlu['actualenddate'] = $_POST["actualdate"];
	            $vlu['targetbudget'] = $_POST['targetbudget'];
	            $vlu['projecturl'] = $_POST['url'];
	            $vlu['projectstatus'] = $_POST['ProjectType'];
	            $vlu['proCurSta'] = $_POST['projectstatus'];
	            $vlu['projectpriority'] = $_POST['ticketpriorities'];
	            $vlu['project_type'] = $_POST['projecttasktype'];
	            $vlu['progress'] = $_POST['projecttaskprogress'];
	            $vlu['description'] = $_POST['description'];
	            $vlu['lastUpdate'] = $date;
	            
	            $assignArray = $_POST['assignto'];
	            
	            $vlu['assignTo'] = $assignArray[0];
	            
	            if($_POST['relatedTo'] != "" && $_POST['relatedtoVal'] != ""){
	                if($_POST['relatedTo'] == 'A'){
	                    $vlu['relatedto']= 'Account';
	                    $vlu['relatedToVal']= $_POST['relatedtoVal'];
						
						}elseif($_POST['relatedTo'] == 'C'){
	                    $vlu['relatedto']= 'Contact';
	                    $vlu['relatedToVal']= $_POST['relatedtoVal'];
					}
				}
	            
	            
	            if(isset($_POST['member']) && $_POST['type'] == "OP"){
	                $vlu['project_type'] = "MP";
					}else{
	                $vlu['project_type'] = $_POST['type'];
				}
	            
	            array_splice($assignArray, 0, 1);
	            
	            $margeArray = array_merge($assignArray,$_POST['member']);
				
	            // print_r($margeArray);
	            if (isset($_POST['assignto']) && $_POST['assignto'] != "" ) {
	                $ul = $this->Modulemodel->findInviteUser4project($_POST['projecteid'], 0);
	                if($ul !== FALSE){
	                    //file_put_contents("errorfilename.txt", $k);
	                    foreach ($ul as $k=>$v) {
	                        if(array_search($v->userteamid, $_POST["assignto"]) === FALSE){
	                            //if($this->sendEmail2($v->email, $_POST["togPopTitle"]) === 'done')
								echo "Successfully";
								// file_put_contents("filename.txt", $v->email);
							}
	                        else
							echo "error";
							// file_put_contents("errorfilename.txt", $k);
						}
					}
				}
	            
	            if (isset($_POST['member']) && $_POST['member'] != "" ) {
	                $ul = $this->Modulemodel->findInviteUser4project($_POST['projecteid'], 1);
	                if($ul !== FALSE){
	                    //file_put_contents("errorfilename.txt", $k);
	                    foreach ($ul as $k=>$v) {
	                        if(array_search($v->userteamid, $_POST["member"]) === FALSE){
	                            //if($this->sendEmail2($v->email, $_POST["togPopTitle"]) === 'done')
								echo "Successfully";
								// file_put_contents("filename.txt", $v->email);
							}
	                        else
							echo "error";
							// file_put_contents("errorfilename.txt", $k);
						}
					}
				}
	            
	            $this->Modulemodel-> updateOneData("crm_project", $vlu, array('projectid'=>$_POST["projecteid"]));
	            if (isset($_POST['member']) && $_POST['member'] != "") {
	                
	                $this->Modulemodel->deleteItem("crm_tag",array('relatedto'=>$this->input->post('projecteid'),'type'=>'project'));
	                $sta = 1;
	                $count = count($assignArray);
	                foreach ($margeArray as $key => $value) {
						
						if($count > 0){
							$sta = 0;
							}else{
							$sta = 1;
						}
						
						$inputdata[] = array(
						'type' => 'project',
						'relatedto' => $this->input->post('projecteid'),
						'idtype' => 'userid',
						'userteamid' => $value,
						'user_status' => $sta
	                    );
	                    
	                    $count--;
					}
	                
	                if($this->Modulemodel->insertbatchinto("crm_tag", $inputdata)) {
	                    //redirect($url, 'refresh');           
					}
					}else{
	                //redirect($url, 'refresh');  
				}
				
	            if((isset($_POST['member']) && $_POST['member'] != "") || isset($_POST['assignto']) && $_POST['assignto'] != "" ){
	                $this->Modulemodel->deleteItem("crm_notification",array('type'=>'project','type_id'=>$this->input->post('projecteid')));
	                
					$margeForNotify = array_merge($_POST['assignto'],$_POST['member']);
	                
					$projectDivIDArray = $this->Modulemodel->selectOneData("crm_project",array('projectid'=>$this->input->post('projecteid')));
					
					$body = "You are tagged in project. Project Name: <a href='#'>".$vlu['projectname']."</a>";
	                foreach ($margeForNotify as $key => $value) {
						
						$inputInsertData[] = array(
						'type' => 'project',
						'type_id' => $this->input->post('projecteid'),
						'relatedTo' => '',
						'user_id' => $value,
						'notification_for' => '1',
						'status' => '0',
						'title' => 'Tagged in project',
						'body' => $body,
						'createdby' => $data['id']
	                    );
					}
	                
	                $this->Modulemodel->insertbatchinto("crm_notification", $inputInsertData);
					
				}
	            
	            // This is for development time
	            // Only developer team can receive this email notification
	            // if($_POST['projecteid'] == 329){ //  Project ID 329 = YeezY Development 
	            //     $body = "<br><br><b>Navigate Connect Development</b> project properties is updated. Please check if any is your concern.";
	            //     $body .= "<br><b>Start Date:</b>".$_POST["startdate"];
	            //     $body .= "<br><b>Target Date:</b>".$_POST["targetdate"];
	            //     $body .= "<br><b>Actual Date:</b>".$_POST["actualdate"];
	            //     $body .= "<br><b>Current Status:</b>".$_POST["projectstatus"];
	            //     $body .= "<br><b>Priorities:</b>".$_POST["ticketpriorities"];
	            //     $body .= "<br><b>Progress:</b>".$progress."%";
	            //     $body .= "<br><b>Description:</b>".$_POST["description"];
	            //     $body .= "<br><b>Last Update:</b>".$vlu['lastUpdate'];
	            //     $body .= "<br><b>Supervisor:</b>";
	            //     $ls = $this->Insertmodule->selectNameEmail($_POST['assignto'][0]);
	            //     $body .= $ls[0]->full_name." (".$ls[0]->email.") <br>";
				
	            //     $listOfTag = $this->Modulemodel->getAllTag($_POST["projecteid"], "project");
				
	            //     $body .= "<br><b>Coordinator:</b>";
	            //     $nameemail = "";
	            //     foreach($listOfTag as $k => $v){
	            //         if($v->user_status == 0)
	            //             $nameemail .= $v->full_name." (".$v->email.") <br>";
	            //     }
	            //     $body .= $nameemail;
				
	            //     $body .= "<br><b>Members:</b>";
	            //     $nameemail = "";
	            //     foreach($listOfTag as $k => $v){
	            //         if($v->user_status == 1)
	            //             $nameemail .= $v->full_name." (".$v->email.") <br>";
	            //     }
	            //     $body .= $nameemail;
				
	            //     foreach ($listOfTag as $k => $v) {
	            //         $this->sendEmailNotification($v->email, $body);
	            //     }
	            //     $this->sendEmailNotification($ls[0]->email, $body);
	            //     // file_put_contents("devproject.txt", $body);
	            // } 
				}else{
	            redirect('Projects', 'refresh');
			}
		}
	    public function copyProject(){
			$tagArray = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['org_id'] = $sessionData['org_id'];
			$this->load->helper('date');
			$date = NOW(); 
			$project_ID = $_POST["projectId"];
			
			$vlu['projectDivid'] = $date;
			$vlu['project_type'] = 'OP';
			
			$tagArray['insertID'] = $this->Modulemodel->copyProject($project_ID);
			$tagArray['insertTagID'] = $this->Modulemodel->copyProjectTag($project_ID,$tagArray['insertID']);
			$this->Modulemodel-> updateOneData("crm_project", $vlu, array('projectid'=>$tagArray['insertID']));
			$tagArray['projects'] = $this->Modulemodel->getAllprojects($data['org_id'],$data['id']);
			header('Content-Type: application/json');
			echo json_encode($tagArray);
	        
		}
		
	    public function deleteProject(){
			$tagArray = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['org_id'] = $sessionData['org_id'];
			
			if($this->Modulemodel->deleteItem("crm_project",array('projectid'=>$this->input->post('projectId'),'createdBy'=>$data['id'])) === TRUE){
	            $this->Modulemodel->deleteItem("crm_tag",array('relatedto'=>$this->input->post('projectId'),'type'=>'project'));
				$tagArray['projects'] = $this->Modulemodel->getAllprojects($data['org_id'],$data['id']);
	            $tagArray['msg']="DONE";
				}else{
	        	$tagArray['msg']="FAIL";
			}
			
			header('Content-Type: application/json');
			echo json_encode($tagArray);
	        
		}
		
	    public function getTag(){
			$tagArray = array();
			$project_ID = $_POST["project_ID"];
			$tagArray['tag'] = $this->Modulemodel->getProjectUsers($project_ID,'2');
			//$tagArray['totalTask'] = $this->Modulemodel->countTask(array('projectid'=>$project_ID));
			header('Content-Type: application/json');
			echo json_encode($tagArray);
	        
		}
		
	    public function taskListNew(){
		    $ara = array();

		    $ara['nty_chat'] = array();
		    $ara['unsennsommnet'] = array();
		    $ara['unsennFile'] = array();

		    $sessionData = $this->session->userdata('yeezyCRM');
			
		    $data['acessType'] = $sessionData['accessType'];
		    $data['id'] = $sessionData['user_id'];
		    $data['username'] = $sessionData['username'];
		    $data['org_id'] = $sessionData['org_id'];
			
		    $pro_id = $_POST["pro_id"];
		    $order = $_POST["order"];
		    $status = $_POST["status"];
		    // $ara['allTask'] = $this->Modulemodel->getAlltasks($data['org_id'],$data['id'],$inputID);
		    
		    if($status == 'Completed Tasks'){
		    	$ara['allTask'] = $this->Modulemodel->getAllprojectTaskscomplete($data['org_id'],$data['id'],$pro_id,$order);
		    }else if($status == 'Incompleted Tasks'){
		    	$ara['allTask'] = $this->Modulemodel->getAllprojectTasksincomplete($data['org_id'],$data['id'],$pro_id,$order);
		    }else{
		    	$ara['allTask'] = $this->Modulemodel->getAllprojectTasks($data['org_id'],$data['id'],$pro_id,$order);
		    }
		    
		    
		    foreach ($ara['allTask'] as $key => $value) {
	        	$TaskUser = $this->Modulemodel->haseuser($value->Id);
	        	$unsennsommnet = $this->Modulemodel->getUnseenComment($value->Id,$data['id'],'Task');
	        	$unsennFile = $this->Modulemodel->getUnseenComment($value->Id,$data['id'],'File');
	        	
	        	array_push($ara['nty_chat'],$TaskUser);
	        	array_push($ara['unsennsommnet'],$unsennsommnet);
	        	array_push($ara['unsennFile'],$unsennFile);
			}

		    //$ara['allSubTask'] = $this->Modulemodel->getAllSubtasksNew($data['org_id'],$data['id'],$pro_id);
		    $ara['allTaskTag'] = $this->Modulemodel->getAll('crm_taskTag');
		    $ara['allAttach'] = $this->Modulemodel->getAll('crm_file',array('proID'=>$pro_id));
		    $ara['allTasklist'] = $this->Modulemodel->getAllprojectTasks($data['org_id'],$data['id'],$pro_id,$order);
		    $ara['alldate'] = $this->Modulemodel->alldate($pro_id);
		    $ara['get_comptable'] = $this->Modulemodel->getProCompData($pro_id);
		    
		    $ara['countsubtask'] = $this->Modulemodel->getnoofsubtaskintask($pro_id);
		    $ara['creator'] = $this->Modulemodel->getcreatorproject($pro_id);
			// taskid, nosubtask
		    
		    header('Content-Type: application/json');
		    echo json_encode($ara);
		}
		
		// save task by sujon
	    public function savePopTaskNew(){
	        if ($this->session->userdata('yeezyCRM')) {
				
	            $ara = array();
	            $sessionData = $this->session->userdata('yeezyCRM');
				
	            $data['acessType'] = $sessionData['accessType'];
	            $data['id'] = $sessionData['user_id'];
	            $data['username'] = $sessionData['username'];
	            $data['org_id'] = $sessionData['org_id'];

	            $date = date('Y-m-d H:i:s');
				
				
	            $inputdata = array(
					"Type" => 'Task',
	            	"Title" => $_POST["taskName"],
	            	"Description" => '',
	            	"Startdate" => $date,
	            	"Enddate" => '0000-00-00 00:00:00',
	            	"Duration" => '1',
	            	"Status" => 'live',
	            	"CreatedBy" => $data['id'],
	            	"CreatedDate" => $date,
	            	"HasGroup" => '',
	            	"HasClient" => '',
	            	"HasParentId" => $_POST["pid"]
	            );

				$ara["taskInsertID"] = $this->Modulemodel->insertData("crm_activity", $inputdata);
				
				$inputInsertData = array(
					'type' => 'Task',
					'type_id' => $ara["taskInsertID"],
					'relatedTo' => $_POST["pid"],
					'user_id' => 0,
					'notification_for' => '1',
					'status' => '0',
					'title' => 'New Task',
					'body' => $_POST["taskName"],
					'createdby' => $data['id']
                );
                
                $this->Modulemodel->insertData("crm_notification", $inputInsertData);
				
	            $ara["projecttaskid"] = $ara["taskInsertID"];
	            
	            
				
	            header('Content-Type: application/json');
	            echo json_encode($ara);
				
			}
		}
		
	    public function savetempdata_item(){
			$sessionData = $this->session->userdata('yeezyCRM');
			$id = $sessionData['user_id'].time();
			if($_POST['etype']=='invoice'){
				$vlud['uid'] = "inv-".$_POST['eid'];
			}
			elseif($_POST['etype']=='quotation'){
				if($_POST['estatus']=='mail'){
					$vlud['uid'] = $_POST["taskid"]."-".$_POST['eid'];
					}else{
					$vlud['uid'] = $_POST["taskid"];
				}
			}
			$vlud['tempdata'] = $_POST["htmldata"];
			
			$this->Modulemodel->deleteItem("crm_savetempdata",array('uid'=>$vlud['uid']));
			
			$this->Modulemodel->insertData("crm_savetempdata", $vlud);
			
			$json["tempid"] = 0;
			header('Content-Type: application/json');
			echo json_encode($json);
			// print_r($htmldata);
		}
		
	    public function taskDetail() {
			
	        $Vid = $this->input->post('taskID');
	        $projectID = $this->input->post('projectID');
	        $taskLsitID = $this->input->post('taskLsitID');
	        $taskType = $this->input->post('taskType');
	        $user_id = $this->input->post('user_id');
	        $type = $this->input->post('type');
			
	        $data = array();
	        
	        if($taskType == 'UnCat'){
	            $data['dataList'] = $this->Modulemodel->getUnCatTaskDetails($Vid);
				}else{
	            $data['dataList'] = $this->Modulemodel->getTaskDetails($Vid);
			}
	        
	        $data['docList'] = $this->Modulemodel->getDocList($Vid);
	        $data['commentList'] = $this->Modulemodel->getComment($Vid,$type);
	        $data['feedbackList'] = $this->Modulemodel->getFeedback($Vid);
	        $data['tasklistName'] = $this->Modulemodel->getAll("crm_tasklist", array('inputDiv' => $taskLsitID));
	        
	        $data['tasktag'] = $this->Modulemodel->getAll("crm_taskTag", array('task_id' => $Vid));
	        $data['tag'] = $this->Modulemodel->getAllTag($projectID,'task',$Vid);
	        $data['tagFollow'] = $this->Modulemodel->getAllFollow($projectID,'task',$Vid);
	        
	        $data['updated_items'] = $this->Modulemodel->getAllTaskItem($Vid);
	        // updated by sujon @ 10-06-16
			
	        if($_POST['get_status']==1){
	            $data['updated_quotes'] = $this->Modulemodel->getAllQuotes($Vid);
				$data['task_invoices'] = $this->Modulemodel->getTaskInvoices($Vid);
				}else{
	            $data['updated_quotes'] = $this->Modulemodel->getUserQuotes($Vid,$user_id);
				$data['task_invoices'] = $this->Modulemodel->getUserInvoices($Vid,$user_id);
			}
			
	        
	        header('Content-Type: application/json');
	        echo json_encode($data);
		}
		// added by sujon @ 8/21/16
		public function updateQuoteUnit() {
			try{
				
				$vlu['type_selected']=$_POST['status'];
				
				$this->Modulemodel-> updateOneData("crm_currency_units", $vlu, array('type_name'=>"Unit",'type'=>"Quote",'id'=>$_POST['did']));
				
				$data = array();
				$data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Unit",'type'=>"Quote"));
				
				header('Content-Type: application/json');
				echo json_encode($data);
				
				//}
				}catch (Exception $e) {
				file_put_contents("8.1.16.txt", $e);
			}
			
		}
		// added by sujon @ 8/18/16
		public function delQuoteUnit() {
			try{
				
				$this->Modulemodel->deleteItem("crm_currency_units",array('type_name'=>"Unit",'type'=>"Quote",'id'=>$_POST['did']));
				
				$data = array();
				$data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Unit",'type'=>"Quote"));
				
				header('Content-Type: application/json');
				echo json_encode($data);
				
				//}
				}catch (Exception $e) {
				file_put_contents("8.1.16.txt", $e);
			}
			
		}
		// sujon @ 8/16/16
		public function addQuoteUnitDyn(){
			
			// $this->Modulemodel->deleteItem("crm_currency_units",array('type_name'=>"Unit",'type'=>"Quote",'type_id'=>$qid));
			
			$vlu['type'] = "Quote";
			$vlu['type_name'] = "Unit";
			$vlu['type_id'] = $_POST['qid'];
			$vlu['name'] = $_POST['unitname'];
			$vlu['type_selected'] = 1;
			$vlu['type_status']=$_POST['status'];
			$this->Modulemodel->insertUnitData("crm_currency_units", $vlu);
			
			$data = array();
			$data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Unit",'type'=>"Quote"));
			
			header('Content-Type: application/json');
			echo json_encode($data);
			
			
		}
		// sujon @ 8/23/16
		public function addAllUnitsPer(){
			
			$vlu['type_status']=1;
			$this->Modulemodel-> updateOneData('crm_currency_units', $vlu, array('type_name'=>"Unit",'type'=>"Quote" ));
			
		}
		
		// sujon @ 8/23/16
		public function delTempUnits(){
			
			$this->Modulemodel->deleteItem("crm_currency_units",array('type_name'=>"Unit",'type'=>"Quote",'type_status'=>0));
			
			
		}
		
		// sujon @ 8/16/16
		public function getQuoteCurrency() {
			
			$data = array();
			$data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Currency",'type'=>"Quote",'type_id'=>0));
			
			
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		// sujon @ 8/22/16
		public function getQuoteItemUnits() {
			
			$data = array();
			$data['ItemUnitList'] = $this->Modulemodel->loadQuoteItemUnits($_POST['qid']);
			
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		
		// sujon @ 8/21/16
		public function removeAllUnits() {
			$vlu['type_selected']=0;
			$this->Modulemodel-> updateOneData('crm_currency_units', $vlu, array('type_name'=>"Unit",'type'=>"Quote" ));
			
		}
		public function getQouteList(){
			
			$data = array();
			$pid = $_POST['pid'];
			if($_POST['get_status']==1){
				
				$data['allQouteList'] = $this->Modulemodel->getAll("crm_quotes", array('pro_id'=>$pid));
				}else{
				
				$data['allQouteList'] = $this->Modulemodel->getAll("crm_quotes", array('pro_id'=>$pid,'creator'=>$_POST['user_id']));
			}
			
			$data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Currency",'type'=>"Quote",'type_id'=>0));
			$data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Unit",'type'=>"Quote",'type_selected'=>1,'type_status'=>1));
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		
		
		// sujon @ 8/17/16
		public function convertQuoteCurrency(){
			
			$amount=1;
			$from=$_POST['currency_from'];
			$to=$_POST['currency_to'];
			
			$url  = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
			// $data['NewURL']=$url;
			// file_put_contents("googleConverted.txt", $url);
			$datac = file_get_contents($url);
			
			preg_match("/<span class=bld>(.*)<\/span>/",$datac, $converted);
			$converted = preg_replace("/[^0-9.]/", "", $converted[1]);
			
			// $url = "http://www.google.com/finance/converter?a=$amount&from=$from&to=$to"; 
			//     $request = curl_init(); 
			//     $timeOut = 0; 
			//     curl_setopt ($request, CURLOPT_URL, $url); 
			//     curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1); 
			//     curl_setopt ($request, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
			//     curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, $timeOut); 
			//     $response = curl_exec($request); 
			//     curl_close($request); 
			
			// $regularExpression     = '#\<span class=bld\>(.+?)\<\/span\>#s';
			// preg_match($regularExpression, $response, $finalData);
			
			$data['NewCurrencyValue']= $converted;
			$data['NewCurrencyName']= $url;
			file_put_contents("filenameccccc.txt", $url);
			
			header('Content-Type: application/json');
			echo json_encode($data);
			
			
			
		}
		
		// sujon @ 9/5/16
		public function uploadInvoiceLogo(){
			if($_FILES['input_image']['name']!=""){
				
				$temp = explode(".", $_FILES["input_image"]["name"]);
				$newimagename = 'inv-logo-'.$_POST['in_eid'].'.'.end($temp);
				$image_location="uploads/contactImages/" . $newimagename;
				unlink($image_location);
				move_uploaded_file($_FILES["input_image"]["tmp_name"], $image_location);
			}
		}
		
	    public function userListTag(){
	    	
	    	$Vid = $this->input->post('taskID');
	        $projectID = $this->input->post('projectID');
	        $type = $this->input->post('type');
	        
	        $data = array();
			
	    	$data['tasktag'] = $this->Modulemodel->getAll("crm_taskTag", array('task_id' => $Vid));
	        $data['tag'] = $this->Modulemodel->getAllTag($projectID,$type,$Vid);
	        $data['tagFollow'] = $this->Modulemodel->getAllFollow($projectID,'task',$Vid);
	        
	        header('Content-Type: application/json');
	        echo json_encode($data);
		}
		
	    public function updateTask(){
			
		    if (isset($_POST['taskID'])) {
		        $this->load->helper('date');
				
		        $date = date('Y-m-d H:i:s');
				
		        $sessionData = $this->session->userdata('yeezyCRM');
				
		        $data['acessType'] = $sessionData['accessType'];
		        $data['id'] = $sessionData['user_id'];
		        $data['org_id'] = $sessionData['org_id'];
		        $url ="/yzy-projects/index/newPro/".$_POST['taskListID']."/".$_POST['projecteid'];
				
		        $vlu['projecttaskname'] = $_POST["tasknametitle"];
		        $vlu['projecttasktype'] = $_POST["projecttasktype"];
		        $vlu['projecttaskpriority'] = $_POST["ticketpriorities"];
		        $vlu['projecttaskprogress'] = $_POST["projecttaskprogress"];
		        $vlu['projectstatus'] = $_POST["projectstatus"];
		        $vlu['projecttaskhours'] = $_POST["workhour"];
		        $vlu['startdate'] = $_POST["startdate"];
		        $vlu['enddate'] = $_POST["duedate"];
		        $vlu['projectid'] = $_POST["projecteid"];
		        $vlu['description'] = $_POST["taskdescription"];
		        $vlu['label'] = $_POST["label"];
		        // $vlu['assignTO'] = $_POST["assignto"];
		        $vlu['lastupdate'] = $date;
				
		        if($_POST["this_type"]=="task"){
		            $table = 'crm_projecttask';
		            $type = 'task';
					
					}elseif($_POST["this_type"]=="Subtask"){
		            $table = 'crm_projectSubTask';
		            $type = 'Subtask';
				}
		        
				
		        $this->Modulemodel-> updateOneData($table, $vlu, array('projecttaskid'=>$_POST["taskID"]));
				
				
				
				
		        if (isset($_POST['assignto']) && $_POST['assignto'] != "" ) {
		            $ul = $this->Modulemodel->findInviteUser($_POST['projecteid'], $_POST['taskID'], 0);
		            if($ul !== FALSE){
		                foreach ($ul as $k=>$v) {
		                    if(array_search($v->userteamid, $_POST["assignto"]) === FALSE){
		                        if($this->sendEmail($v->email, $_POST["tasknametitle"]) === 'done')
								echo "Successfully";
								// file_put_contents("filenameassignto.txt", $v->email);
							}
		                    else
							echo "error";
							// file_put_contents("errorfilenameassignto.txt", $k);
						}
					}
					
		            // To access this task, share the project autometically 
		            $this->Modulemodel->deleteItem("crm_tag",array('type'=>"project", 'relatedto'=>$this->input->post('projecteid'), 'relateTask'=>$this->input->post('taskID'), 'user_status' => 0 ));
		            
		            $this->Modulemodel->deleteItem("crm_tag",array('type'=>$type, 'relatedto'=>$this->input->post('projecteid'), 'relateTask'=>$this->input->post('taskID'), 'user_status' => 0 ));
		            foreach ($_POST['assignto'] as $key => $value) {
		                $inputdata1[] = array('type' => $type,'relatedto' => $this->input->post('projecteid'),'relateTask' => $this->input->post('taskID'),'idtype' => 'userid','userteamid' => $value,'user_status' => 0);
		                $inputdata1[] = array('type' => "project",'relatedto' => $this->input->post('projecteid'),'relateTask' => $this->input->post('taskID'),'idtype' => 'userid','userteamid' => $value,'user_status' => 0);
					}
		            $this->Modulemodel->insertbatchinto("crm_tag", $inputdata1);
				}
				
		        if (isset($_POST['member']) && $_POST['member'] != "" ) {
		            $ul = $this->Modulemodel->findInviteUser($_POST['projecteid'], $_POST['taskID'], 1);
		            if($ul !== FALSE){
		                foreach ($ul as $k=>$v) {
		                    if(array_search($v->userteamid, $_POST["member"]) === FALSE){
		                        //if($this->sendEmail($v->email, $_POST["tasknametitle"]) === 'done')
								echo "Successfully";
								// file_put_contents("filename.txt", $v->email);
							}
		                    else
							echo "error";
							// file_put_contents("errorfilename.txt", $k);
						}
					}
		            
		            // To access this task, share the project autometically 
		            $this->Modulemodel->deleteItem("crm_tag",array('relatedto'=>$this->input->post('projecteid'), 'relateTask'=>$this->input->post('taskID'),'type'=>"project", 'user_status' => 1));
		            
		            $this->Modulemodel->deleteItem("crm_tag",array('relatedto'=>$this->input->post('projecteid'), 'relateTask'=>$this->input->post('taskID'),'type'=>$type, 'user_status' => 1));
		            foreach ($_POST['member'] as $key => $value) {
		                $inputdata2[] = array('type' => $type,'relatedto' => $this->input->post('projecteid'),'relateTask' => $this->input->post('taskID'),'idtype' => 'userid','userteamid' => $value,'user_status' => 1);
		                $inputdata2[] = array('type' => "project",'relatedto' => $this->input->post('projecteid'),'relateTask' => $this->input->post('taskID'),'idtype' => 'userid','userteamid' => $value,'user_status' => 1);
					}
		            $this->Modulemodel->insertbatchinto("crm_tag", $inputdata2);
				}
				
		        if (isset($_POST['followers']) && $_POST['followers'] != "" ) {
		            $this->Modulemodel->deleteItem("crm_taskfollower",array('relateTask'=>$this->input->post('taskID'),'type'=>$type));
		            foreach ($_POST['followers'] as $key => $value) {
		                $inputdata3[] = array(
		                'type' => $type,
		                'relatedto' => $this->input->post('projecteid'),
		                'relateTask' => $this->input->post('taskID'),
		                'idtype' => 'userid',
		                'userteamid' => $value
		                );
					}
					
		            $this->Modulemodel->insertbatchinto("crm_taskfollower", $inputdata3);
				}
				
		        if (isset($_POST['tag']) && $_POST['tag'] != "" ) {
		            $this->Modulemodel->deleteItem("crm_taskTag",array('task_id'=>$this->input->post('taskID')));
		            if(isset($_POST['tag']) && $_POST['tag'] != ""){
		                foreach ($_POST['tag'] as $key => $value) {
		                    $inputTagData[] = array(
		                    'type' => $type,
		                    'task_id' => $this->input->post('taskID'),
		                    'tag' => $value
		                    );
						}
		                $this->Modulemodel->insertbatchinto("crm_taskTag", $inputTagData);
					}
				}
				
		        if((isset($_POST['member']) && $_POST['member'] != "") || (isset($_POST['assignto']) && $_POST['assignto'] != "") ){
					
					$this->Modulemodel->deleteItem("crm_notification",array('type'=>$type,'type_id'=>$this->input->post('projecteid'),'relatedTo'=>$this->input->post('taskID')));
					
					$margeForNotify = array_merge($_POST['assignto'],$_POST['member']);
					
					$body = "You are tagged in Task. Task Name: ".$vlu['projecttaskname'];
					
					foreach ($margeForNotify as $key => $value) {
						
						$inputInsertData[] = array(
							'type' => $type,
							'type_id' => $this->input->post('projecteid'),
							'relatedTo' => $this->input->post('taskID'),
							'user_id' => $value,
							'notification_for' => '1',
							'status' => '0',
							'title' => 'Tagged in a Task!!!',
							'body' => $body,
							'createdby' => $data['id']
						);
					}
					
					$this->Modulemodel->insertbatchinto("crm_notification", $inputInsertData);
					
				}
				
				redirect($url, 'refresh');      
			}else{
		        redirect($url, 'refresh');
			}
		}
		
		public function updateTaskDate(){
			
		    if (isset($_POST['taskID'])) {
		        
		        $data = array();
				
		        $vlu['Startdate'] = $_POST["startdate"];
		        $vlu['Enddate'] = $_POST["enddate"];
		        
				
		        if($_POST["this_type"]=="task"){
		            $table = 'crm_activity';
		            $type = 'task';
					
					}elseif($_POST["this_type"]=="subtask"){
		            $table = 'crm_projectSubTask';
		            $type = 'Subtask';
				}
		        
				
		        $data['msg'] = $this->Modulemodel-> updateOneData('crm_activity', $vlu, array('Id'=>$_POST["taskID"]));
				
		        header('Content-Type: application/json');
	        	echo json_encode($data);
			}
		}
		
		public function fileUp() {
			
	        $sessionData = $this->session->userdata('yeezyCRM');
			
	        $data['acessType'] = $sessionData['accessType'];
	        $data['id'] = $sessionData['user_id'];
			
	        if (!is_dir("./uploads/tempUpload/fileupload")) {
	            mkdir('./uploads/tempUpload/fileupload', 0777, TRUE);
			}
			
			
	        $path = "./uploads/tempUpload/fileupload/";
			
	        $filevlu['folderName'] = "fileupload";
	        $filevlu['name'] = $_POST["commentFile"];
	        $filevlu['type'] = 'TASK';
	        $filevlu['typeID'] = $_POST["taskid2"];
	        $filevlu['proID'] = $_POST["proID"];
	        $filevlu['user'] = $data['id'];
	        $filevlu['user_id'] = $_POST["userName2"];
	        $filevlu['comment_id'] = $_POST["commentid"];
	        $filde = array();
	        foreach ($_FILES["fileinput"]["tmp_name"] as $key => $tmp_name) {
	            $attachment = $_FILES["fileinput"]["tmp_name"][$key];
	            $file_size = round($_FILES["fileinput"]["size"][$key]/1024, 2);
	            $attachment_path = $_FILES["fileinput"]["name"][$key];
	            $attachment_ext = pathinfo($attachment_path, PATHINFO_EXTENSION);
	            $attachment_new = (time() . $key . '.' . $attachment_ext);
	            if (is_uploaded_file($attachment)) {
	                if (move_uploaded_file($attachment, $path . $attachment_new)) {
	                    $filevlu['file_name'] = $attachment_new;
	                    $filevlu['file_size'] = $file_size;
	                    $filevlu['ori_name'] = $attachment_path;
	                    $data["fileID"] = $this->Modulemodel->insertData("crm_file", $filevlu);
	                    if ($data["fileID"] > 0) {
	                        $filde['filelist'] = $this->Modulemodel->getAll("crm_file", array('typeID' => $_POST["taskid2"], 'comment_id' => $_POST["commentid"]));
	                        $filde['fileID'] = $data["fileID"];
	                        $filde['file_name'] = $attachment_new;
	                        $filde['ori_name'] = $attachment_path;
	                        $filde['file_size'] = $file_size;
	                        $filde['file_title'] = $_POST["commentFile"];
						}
					}
				}
			}
	        
	        $getTaskDetail = $this->Modulemodel->selectOneData("crm_projecttask",array('projecttaskid'=>$_POST["taskid2"],'this_type'=>'task'));
			
	        $getAllFornotification = $this->Modulemodel->getAllUserFromNoti($_POST["taskid2"],$_POST["proID"]);
			
	        $body = "New file uploaded on task: ".$getTaskDetail[0]->projecttaskname;
			
	        if(!empty($getAllFornotification)){
	            $this->Modulemodel->deleteItem("crm_notification",array('type'=>'comment','type_id' =>$_POST["proID"],'relatedTo' => $_POST["taskid2"]));
				foreach ($getAllFornotification as $key => $value) {
					$inputInsertData[] = array(
					'type' => 'comment',
					'type_id' => $_POST["proID"],
					'relatedTo' => $_POST["taskid2"],
					'user_id' => $value->user_id,
					'notification_for' => '1',
					'status' => '0',
					'title' => 'File uploaded',
					'body' => $body,
					'createdby' => $data['id']
	                );
				}
	            
				$this->Modulemodel->insertbatchinto("crm_notification", $inputInsertData);
			}
			
	        header('Content-Type: application/json');
	        echo json_encode($filde);
		}
		
	    public function sendComment() {
	        $sessionData = $this->session->userdata('yeezyCRM');
			
	        $data['acessType'] = $sessionData['accessType'];
	        $data['id'] = $sessionData['user_id'];
	        $projectID= $_POST["projectID"];
	        $ara = array();
			
			
			
	        $vlu['comment'] = $_POST["comment"];
			
	        $baseURL = base_url("require/emotion/");
			
			
	        $vlu['img'] = $_POST["UserImg"];
	        $vlu['name'] = $_POST["userName"];
	        $vlu['type'] = $_POST["type"];
	        $vlu['typeID'] = $_POST["taskId"];
	        $vlu['user'] = $data['id'];
			
	        $data["flderID"] = $this->Modulemodel->insertData("crm_modcomments", $vlu);
			
	        $emotionImgSymble = array('data-commentid=""');
	        $emotionImg = array('data-commentid="' . $data["flderID"] . '"');
			
	        $vlu['comment'] = str_replace($emotionImgSymble, $emotionImg, $_POST["comment"]);
			
	        $data["upflderID"] = $this->Modulemodel->updateData("crm_modcomments", array('comment' => $vlu['comment']), $data["flderID"]);
	        $getTaskDetail = $this->Modulemodel->selectOneData("crm_projecttask",array('projecttaskid'=>$_POST["taskId"],'this_type'=>'task'));
			
	        $getAllFornotification = $this->Modulemodel->getAllUserFromNoti($_POST["taskId"],$projectID);
			
	        $body = "New comment on task: ".$getTaskDetail[0]->projecttaskname;
			
	        if(!empty($getAllFornotification)){
	            $this->Modulemodel->deleteItem("crm_notification",array('type'=>'comment','type_id' =>$projectID,'relatedTo' => $_POST["taskId"]));
				foreach ($getAllFornotification as $key => $value) {
					$inputInsertData[] = array(
					'type' => 'comment',
					'type_id' => $projectID,
					'relatedTo' => $_POST["taskId"],
					'user_id' => $value->user_id,
					'notification_for' => '1',
					'status' => '0',
					'title' => 'Comment',
					'body' => $body,
					'createdby' => $data['id']
	                );
				}
	            
				$this->Modulemodel->insertbatchinto("crm_notification", $inputInsertData);
			}
			
			
	        if ($data["upflderID"] > 0) {
				
				} elseif ($data["flderID"] > 0) {
	            
	            $body = "<br><br><b>Task Name: ".$getTaskDetail[0]->projecttaskname."</b> has new comment. Please check if any is your concern.";
	            $body .= "<br><b>Project ID:</b> ".$projectID;
	            $body .= "<br><b>Task Name:</b> ".$getTaskDetail[0]->projecttaskname;
	            $body .= "<br><b>Comment:</b> ".$_POST["comment"];
				
	            $listOfTag = $this->Modulemodel->getAllTag($projectID, "task", $_POST['taskId']);
	            $body .= "<br><b>Supervisor:</b>";
	            $nameemail = "";
	            foreach($listOfTag as $k => $v){
	                if($v->user_status == 0)
					$nameemail .= $v->full_name." (".$v->email.") <br>";
				}
	            $body .= $nameemail;
				
	            $body .= "<br><b>Members:</b>";
	            $nameemail = "";
	            foreach($listOfTag as $k => $v){
	                if($v->user_status == 1)
					$nameemail .= $v->full_name." (".$v->email.") <br>";
				}
	            $body .= $nameemail;
				
	            //$projectMem = $this->Modulemodel->getAll("crm_notification_setup",array('user_id'=>$data['id']));
	            
				
	            // foreach ($listOfTag as $k => $v) {
				
				
	            //     $projectMem[$k] = $this->Modulemodel->selectOneData("crm_notification_setup",array('user_id' => $v->ID));
	            //     //$body .= $projectMem[$k][0]->assignToMe;
	            //     if($projectMem[$k][0]->commentOnTask == 1 ){
	            //         $this->sendEmailNotification($v->email, "Comment for Yeezy Project Task", $body);
	            //     }
				
	            //     $projectMem[] = 0;
				
	            // }
				
	            $ara['msg'] = $data["flderID"];
				} else {
	            $ara['msg'] = "FAIL";
			}
			
			
	        header('Content-Type: application/json');
	        echo json_encode($ara);
		}
	    public function getTaskList(){
			
			$tagArray = array();
			$id = $_POST['projectid'];
			$tagArray['docList'] = $this->Modulemodel->getAllDocList($id);
			
			$tagArray['nty_chat'] = $this->db->query("SELECT COUNT(Id) FROM crm_tagHD WHERE ( type = 'Task' OR type = 'Todo' ) AND RelatedTo = '".$id."'")->result_array();;
			$tagArray['taskList'] = $this->Modulemodel->getAll("crm_tasklist", array('related_to'=>$id),'enddate');
			

			header('Content-Type: application/json');
			echo json_encode($tagArray);
	        
		}
		
	    public function replyRetrive() {
			
	        $taskId = $this->input->post('taskID');
	        $typeId = $this->input->post('typeID');
			
	        $data = array();
			
	        //data['postCreator'] = $this -> Categorymodel -> postCreator($post_id);
	        $data['allReply'] = $this->Modulemodel->getAll("crm_reply", array('parent_comments' => $taskId, 'parent_typeid' => $typeId));
	        $data['getComment'] = $this->Modulemodel->getAll("crm_modcomments", array('id' => $taskId, 'typeID' => $typeId));
	        header('Content-Type: application/json');
	        echo json_encode($data);
		}
		
	    public function commentImage() {
			
	        if (!is_dir("./uploads/tempUpload/")) {
	            mkdir('./uploads/tempUpload', 0777, TRUE);
			}
			
	        $attachment = $_FILES["theFile"]["tmp_name"];
	        $attachment_path = $_POST['time'] . $_FILES["theFile"]["name"];
	        $attachment_ext = pathinfo($attachment_path, PATHINFO_EXTENSION);
	        $attachment_new = ("TEMP" . $attachment_path);
			
	        $config['upload_path'] = "./uploads/tempUpload";
	        $config['allowed_types'] = 'JPEG|jpg|png';
	        $config['file_name'] = $attachment_new;
	        $this->load->library('upload', $config);
			
	        $size = $_FILES["theFile"]["size"];
	        $fileDimension = "100:100";
			
	        if ($size / 1024 > 1024) {
	            $fileDimension = "iw/9:ih/9";
				} elseif ($size / 1024 > 800) {
	            $fileDimension = "iw/7:ih/7";
				} elseif ($size / 1024 < 600) {
	            $fileDimension = "iw/6:ih/6";
				} elseif ($size / 1024 < 500) {
	            $fileDimension = "iw/5:ih/5";
				} elseif ($size / 1024 < 400) {
	            $fileDimension = "iw/4:ih/4";
				} elseif ($size / 1024 < 300) {
	            $fileDimension = "iw/2:ih/2";
			}
			
			
	        list($width, $height) = getimagesize($attachment);
			
			if ($this->upload->do_upload("theFile")) {
	            if ($info = shell_exec('/usr/local/bin/ffmpeg -i /var/www/html/navcon/uploads/tempUpload/' . $attachment_new . ' -vf scale=' . $fileDimension . ' /var/www/html/navcon/uploads/tempUpload/' . $attachment_path . ' 2>&1')) {
					
	                echo var_dump($info);
	                unlink("./uploads/tempUpload/" . $attachment_new);
	                echo "UPLOAD DONE";
				}
				} else {
	            echo "UPLOAD FAIL";
			}
		}
		
	    public function sendReply() {
	        $sessionData = $this->session->userdata('yeezyCRM');
			
	        $data['acessType'] = $sessionData['accessType'];
	        $data['id'] = $sessionData['user_id'];
			
	        $araYezzy = array();
			
	        $val['comment'] = $this->input->post('comment');
	        $val['user_id'] = $data['id'];
	        $val['user_name'] = $this->input->post('userName');
	        $val['user_img'] = $this->input->post('userImg');
	        $val['parent_comments'] = $this->input->post('taskID');
	        $val['parent_typeid'] = $this->input->post('typeID');
	        $val['isReply'] = $this->input->post('isReply');
			
	        $data["flderID"] = $this->Modulemodel->insertData("crm_reply", $val);
			
	        if ($data["flderID"] > 0) {
	            $araYezzy['msg'] = "DONE";
	            $araYezzy['insertID'] = $data["flderID"];
				} else {
	            $araYezzy['msg'] = "FAIL";
			}
			
			
	        header('Content-Type: application/json');
	        echo json_encode($araYezzy);
		}
		
	    public function updateTasklist(){
	        $proArray = array();
	        $project_ID = $_POST["pid"];
	        $taskListName = $_POST["tasklistName"];
	        $taskinput = $_POST["inputDiv"];
	        
	        $proArray['update'] = $this->Modulemodel->updateOneData("crm_tasklist",array('name'=>$taskListName) ,array('related_to'=>$project_ID,'inputDiv'=>$taskinput));
	        
	        header('Content-Type: application/json');
	        echo json_encode($proArray);
		}
		
	    public function saveTaskList(){
	        $tagArray = array();
	        $this->load->helper('date');
			
	        $project_ID = $_POST["pid"];
	        $taskListName = $_POST["tasklistName"];
	        $taskinput = $_POST["inputDiv"];
			
	        $vlu['related_to'] = $project_ID;
	        $vlu['name'] = $taskListName;
	        $vlu['inputDiv'] = $taskinput;
	        $vlu['description'] = $_POST["pTaskDescri"];
	        $vlu['startDate'] = $_POST["startDate"];
	        $vlu['endDate'] = $_POST["endDate"];
			
	        
			
	        $tagArray['insertID'] = $this->Modulemodel->insertData("crm_tasklist", $vlu);
			
	        $assign['type'] = "taskList";
	        $assign['tagtime'] = date('Y-m-d H:i:s');
			
	        if ($_POST["pAssign"] != "N" && $_POST["assigntype"] != "N" ) {
	            if($_POST["assigntype"] == "U") { 
	                $assign['userteamid'] = $_POST["pAssign"]; 
	                $assign['idtype'] = "userid"; 
				}
	            elseif($_POST["assigntype"] == "T") { 
	                $assign['userteamid'] = $_POST["pAssign"]; 
	                $assign['idtype'] = "teamid"; 
				}
	            if($tagArray['insertID']>0){
					$assign["relatedto"] = $tagArray['insertID'];
					$this->Modulemodel->insertData("crm_taskList_tag", $assign);
				}
			}
	        
			
			
			
			header('Content-Type: application/json');
			echo json_encode($tagArray);
	        
		}
		
	    public function deleteReply(){
	        $array = array();
	        
	        if($this->input->post('table')=='file'){
	            $cusTbl = 'modcomments';
	            $this->Modulemodel->deleteItem('crm_file',array('id'=>$this->input->post('id')));
				}else{
				$cusTbl = $this->input->post('table');
			}
	        
	        $table = 'crm_'.$cusTbl;
	        
	        if($this->Modulemodel->deleteItem($table,array('id'=>$this->input->post('commentid')))){
	            $array['dltmsg'] = "DONE";
				}else{
	            $array['dltmsg'] = "FAIL";
			}
	        
	        header('Content-Type: application/json');
	        echo json_encode($array);
	        
		}
		
	    public function updateReply(){
	        $array = array();
	        $string = $this->input->post('val');
			$str = preg_replace('/(<br>)+$/', '', $string);
	        if($this->Modulemodel->updateOneData("crm_".$this->input->post('table'),array('comment'=>$str) ,array('id'=>$this->input->post('id'))) > 0){
	            $array['msg'] = "DONE";
				}else{
	            $array['msg'] = "FAIL";
			}
	        
	        header('Content-Type: application/json');
	        echo json_encode($array);
	        
		}
		
	    public function movetask(){
	        $data = array();
	        $taskid = $_POST["taskid"];
			
	        $old_pid = $_POST["old_pid"]; // no need
	        $old_tlid = $_POST["old_tlid"]; // no need
			
	        $new_pid = $_POST["new_pid"];
	        $new_tlid = $_POST["new_tlid"];
	        
	        
			
	        if($this->Modulemodel->updateOneData("crm_projecttask",array('projectid'=>$new_pid, 'projecttaskcode'=>$new_tlid, 'tasklistID'=>$new_tlid) ,array('projecttaskid'=>$taskid)))
			if($this->Modulemodel->updateOneData("crm_tag",array('relatedto'=>$new_pid) ,array('relateTask'=>$taskid))){
				$data['msg'] = "Success";
				header('Content-Type: application/json');
				echo json_encode($data);
			}
		}
		
	    // save subtask by sujon
		public function saveSubTaskNew(){
		    if ($this->session->userdata('yeezyCRM')) {
				
		        $ara = array();
		        $sessionData = $this->session->userdata('yeezyCRM');
				
		        $data['acessType'] = $sessionData['accessType'];
		        $data['id'] = $sessionData['user_id'];
		        $data['username'] = $sessionData['username'];
		        $data['org_id'] = $sessionData['org_id'];
				$date = date('Y-m-d H:i:s');
		        
		 
				
				$inputdata = array(
					"Type" => 'SubTask',
	            	"Title" => $_POST["taskName"],
	            	"Description" => "",
	            	"Startdate" => $date,
	            	"Enddate" => $date,
	            	"Duration" => '1',
	            	"Status" => 'live',
	            	"CreatedBy" => $data['id'],
	            	"CreatedDate" => $date,
	            	"HasGroup" => '',
	            	"HasClient" => '',
	            	"HasParentId" => $_POST["taskId"]
	            );

				$ara["insertID"] = $this->Modulemodel->insertData("crm_activity", $inputdata);
				
		        $ara["projecttaskid"] = $ara["insertID"];
		        $ara["Id"] = $ara["insertID"];
		        $ara["Title"] = $_POST["taskName"];
		        $ara["Startdate"] = $date;
		        $ara["Enddate"] = $date;
		        $ara["Duration"] = '1';
		        $ara["Status"] = 'live';
		        $ara["CreatedBy"] = $data['id'];
		        $ara["CreatedDate"] = $date;
		        $ara["HasParentId"] = $_POST["taskId"];

				$ara["Startdate"] = $date;
				$ara["Startdate"] = $date;
				
				
				header('Content-Type: application/json');
				echo json_encode($ara);
				
			}
		}
		
		// get subtask by sujon
		public function subtaskListNew(){
			$ara = array();
			$ara['nty_chat']= array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['username'] = $sessionData['username'];
			$data['org_id'] = $sessionData['org_id'];
			$ara['taskID'] = $this->input->post('taskID');
			$ara['id'] = $data['id'];
			$ara['allSubTask'] = $this->Modulemodel->getSubtasksNew($data['id'],$this->input->post('taskID'));

			foreach ($ara['allSubTask'] as $key => $value) {
	        	$TaskUser = $this->Modulemodel->haseuser($value->Id);
	        	array_push($ara['nty_chat'],$TaskUser);
			}
			
			header('Content-Type: application/json');
			echo json_encode($ara);


		}


		
		public function subtaskDetail() {
			
			$Vid = $this->input->post('taskID');
			$projectID = $this->input->post('projectID');
			$taskLsitID = $this->input->post('taskLsitID');
			$result = substr($taskLsitID, 0, -3);
			
			$taskType = $this->input->post('taskType');
			$type = $this->input->post('type');
			
			$data = array();
			
			if($taskType == 'UnCat'){
				$data['dataList'] = $this->Modulemodel->getUnCatSubTaskDetails($Vid);
				}else{
				$data['dataList'] = $this->Modulemodel->getSubTaskDetails($Vid);
			}
			
			$data['docList'] = $this->Modulemodel->getDocList($Vid);
			//$data['tagList'] = $this ->  Categorymodel -> getTagMembers($post_id);
			$data['commentList'] = $this->Modulemodel->getComment($Vid,$type);
			$data['feedbackList'] = $this->Modulemodel->getFeedback($Vid);
			$data['tasklistName'] = $this->Modulemodel->getAll("crm_tasklist", array('inputDiv' => $taskLsitID));
			$data['tasktag'] = $this->Modulemodel->getAll("crm_taskTag", array('task_id' => $Vid));
			$data['tag'] = $this->Modulemodel->getAllTag($projectID,'Subtask',$Vid);
			$data['tagFollow'] = $this->Modulemodel->getAllFollow($projectID,'Subtask',$Vid);
			//$data['filelist'] =  $this->Taskmodel->getFileList($Vid);
			//data['postCreator'] = $this -> Categorymodel -> postCreator($post_id);
			
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		
		
		public function updateSubTask(){
			
			if (isset($_POST['taskID'])) {
				$this->load->helper('date');
				
				$date = date('Y-m-d H:i:s');
				
				$sessionData = $this->session->userdata('yeezyCRM');
				
				$data['acessType'] = $sessionData['accessType'];
				$data['id'] = $sessionData['user_id'];
				$data['org_id'] = $sessionData['org_id'];
				$url ="/yzy-projects/index/newPro/".$_POST['taskListID']."/".$_POST['projecteid'];
				
				$vlu['projecttaskname'] = $_POST["tasknametitle"];
				$vlu['projecttasktype'] = $_POST["projecttasktype"];
				$vlu['projecttaskpriority'] = $_POST["ticketpriorities"];
				$vlu['projecttaskprogress'] = $_POST["projecttaskprogress"];
				$vlu['projectstatus'] = $_POST["projectstatus"];
				$vlu['projecttaskhours'] = $_POST["workhour"];
				$vlu['startdate'] = $_POST["startdate"];
				$vlu['enddate'] = $_POST["duedate"];
				$vlu['projectid'] = $_POST["projecteid"];
				$vlu['parenttaskID'] = $_POST["parentTaskid"];
				$vlu['description'] = $_POST["taskdescription"];
				$vlu['label'] = $_POST["label"];
				// $vlu['assignTO'] = $_POST["assignto"];
				$vlu['lastupdate'] = $date;
				
				if($_POST["this_type"]=="task"){
					$table = 'crm_projecttask';
					$type = 'task';
					
					}elseif($_POST["this_type"]=="Subtask"){
					$table = 'crm_projectSubTask';
					$type = 'Subtask';
				}
				
				
				$this->Modulemodel-> updateOneData($table, $vlu, array('projecttaskid'=>$_POST["taskID"]));
				
				
				
				
				if (isset($_POST['assignto']) && $_POST['assignto'] != "" ) {
					$ul = $this->Modulemodel->findInviteUser($_POST['projecteid'], $_POST['taskID'], 0);
					if($ul !== FALSE){
						foreach ($ul as $k=>$v) {
							if(array_search($v->userteamid, $_POST["assignto"]) === FALSE){
								if($this->sendEmail($v->email, $_POST["tasknametitle"]) === 'done')
	                            echo "Successfully";
	                            // file_put_contents("filenameassignto.txt", $v->email);
							}
							else
	                        echo "error";
	                        // file_put_contents("errorfilenameassignto.txt", $k);
						}
					}
					
					// To access this task, share the project autometically 
					$this->Modulemodel->deleteItem("crm_tag",array('type'=>"project", 'relatedto'=>$this->input->post('projecteid'), 'relateTask'=>$this->input->post('taskID'), 'user_status' => 0 ));
					
					$this->Modulemodel->deleteItem("crm_tag",array('type'=>$type, 'relatedto'=>$this->input->post('projecteid'), 'relateTask'=>$this->input->post('taskID'), 'user_status' => 0 ));
					foreach ($_POST['assignto'] as $key => $value) {
						$inputdata1[] = array('type' => $type,'relatedto' => $this->input->post('projecteid'),'relateTask' => $this->input->post('taskID'),'idtype' => 'userid','userteamid' => $value,'user_status' => 0);
						$inputdata1[] = array('type' => "project",'relatedto' => $this->input->post('projecteid'),'relateTask' => $this->input->post('taskID'),'idtype' => 'userid','userteamid' => $value,'user_status' => 0);
					}
					$this->Modulemodel->insertbatchinto("crm_tag", $inputdata1);
				}
				
				if (isset($_POST['member']) && $_POST['member'] != "" ) {
					$ul = $this->Modulemodel->findInviteUser($_POST['projecteid'], $_POST['taskID'], 1);
					if($ul !== FALSE){
						foreach ($ul as $k=>$v) {
							if(array_search($v->userteamid, $_POST["member"]) === FALSE){
								if($this->sendEmail($v->email, $_POST["tasknametitle"]) === 'done')
	                            echo "Successfully";
	                            // file_put_contents("filename.txt", $v->email);
							}
							else
	                        echo "error";
	                        // file_put_contents("errorfilename.txt", $k);
						}
					}
					
					// To access this task, share the project autometically 
					$this->Modulemodel->deleteItem("crm_tag",array('relatedto'=>$this->input->post('projecteid'), 'relateTask'=>$this->input->post('taskID'),'type'=>"project", 'user_status' => 1));
					
					$this->Modulemodel->deleteItem("crm_tag",array('relatedto'=>$this->input->post('projecteid'), 'relateTask'=>$this->input->post('taskID'),'type'=>$type, 'user_status' => 1));
					foreach ($_POST['member'] as $key => $value) {
						$inputdata2[] = array('type' => $type,'relatedto' => $this->input->post('projecteid'),'relateTask' => $this->input->post('taskID'),'idtype' => 'userid','userteamid' => $value,'user_status' => 1);
						$inputdata2[] = array('type' => "project",'relatedto' => $this->input->post('projecteid'),'relateTask' => $this->input->post('taskID'),'idtype' => 'userid','userteamid' => $value,'user_status' => 1);
					}
					$this->Modulemodel->insertbatchinto("crm_tag", $inputdata2);
				}
				
				if (isset($_POST['followers']) && $_POST['followers'] != "" ) {
					$this->Modulemodel->deleteItem("crm_taskfollower",array('relateTask'=>$this->input->post('taskID'),'type'=>$type));
					foreach ($_POST['followers'] as $key => $value) {
						$inputdata3[] = array(
						'type' => $type,
						'relatedto' => $this->input->post('projecteid'),
						'relateTask' => $this->input->post('taskID'),
						'idtype' => 'userid',
						'userteamid' => $value
						);
					}
					
					$this->Modulemodel->insertbatchinto("crm_taskfollower", $inputdata3);
				}
				
				if (isset($_POST['tag']) && $_POST['tag'] != "" ) {
					$this->Modulemodel->deleteItem("crm_taskTag",array('task_id'=>$this->input->post('taskID')));
					if(isset($_POST['tag']) && $_POST['tag'] != ""){
						foreach ($_POST['tag'] as $key => $value) {
							$inputTagData[] = array(
							'type' => $type,
							'task_id' => $this->input->post('taskID'),
							'tag' => $value
							);
						}
						$this->Modulemodel->insertbatchinto("crm_taskTag", $inputTagData);
					}
				}
				
				if((isset($_POST['member']) && $_POST['member'] != "") || (isset($_POST['assignto']) && $_POST['assignto'] != "") ){
	                $this->Modulemodel->deleteItem("crm_notification",array('type'=>$type,'type_id'=>$this->input->post('projecteid'),'relatedTo'=>$this->input->post('taskID')));
	                $margeForNotify = array_merge($_POST['assignto'],$_POST['member']);
	                
	                $body = "You are tagged in Task. Task Name: ".$vlu['projecttaskname'];
	                foreach ($margeForNotify as $key => $value) {
						
	                    $inputInsertData[] = array(
						'type' => $type,
						'type_id' => $this->input->post('projecteid'),
						'relatedTo' => $this->input->post('taskID'),
						'user_id' => $value,
						'notification_for' => '1',
						'status' => '0',
						'title' => 'Tagged in a Task!!!',
						'body' => $body,
						'createdby' => $data['id']
	                    );
					}
	                
	                $this->Modulemodel->insertbatchinto("crm_notification", $inputInsertData);
					
				}
				
				
				redirect($url, 'refresh');      
			}else{
				redirect($url, 'refresh');
			}
		}
		
		public function getFileList(){
			
			$data = array();
			$pid = $_POST['pid'];
			$data['allFileList'] = $this->Modulemodel->getAll("crm_file", array('proID'=>$pid));
			header('Content-Type: application/json');
			echo json_encode($data);
		}
		
		public function TaskMakeComplete(){
			
			$data = array();
			
			$taskID = $this->input->post('tid');
			$type = $this->input->post('type');
			$sessionData = $this->session->userdata('yeezyCRM');
			
			if($this->Modulemodel->updateOneData("crm_activity",array('Status'=>$type) ,array('Id'=>$taskID)) === TRUE){
				$data['msg'] = "Done";
				}else{
				$data['msg'] = "Fail";
			}
			
			header('Content-Type: application/json');
			echo json_encode($data);
			
		}
		
		public function getNotificationStatusAll(){
			$array = array();
			$projectArray = array();
			
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['org_id'] = $sessionData['org_id'];
			
			$limit = $this->input->post('limitStart');
			

			$array['getAllTypeList'] = array();
			$array['getAllProjectUnTag'] = array();
			$array['getAllProjectTag'] = array();
			$array['getAllTaskTag'] = array();
			$array['getAllTaskUnTag'] = array();
			$array['getAllTodoTag'] = array();
			$array['getAllTodoUnTag'] = array();
			$array['getAllTypeTask'] = array();
			$array['notifCommnet'] = array();
			$array['notifFile'] = array();
			$array['commentList'] = array();
	        
	        $array['projects'] = $this->Modulemodel->getAllprojects($data['org_id'],$data['id']);
	        
	        foreach ($array['projects'] as $key => $value) {
	        	
	        	$getAllTypeList = $this->Modulemodel-> allNotifList(1,$value->Id,'Project');
	        	$commentList1 = $this->Modulemodel->allNotifList(1,$value->Id,'ProjectCmnt');
	        	
	        	array_push($array['getAllTypeList'],$getAllTypeList);
	        	array_push($array['commentList'],$commentList1);

	        	$array['allTask'] = $this->Modulemodel->getAllprojectTasks($data['org_id'],$data['id'],$value->Id,'DESC');
		    	foreach ($array['allTask'] as $k => $v) {
		        	$getAllTypeTask = $this->Modulemodel-> allNotifList(1,$v->Id,'Task');
		        	$commentList2 = $this->Modulemodel->allNotifList(1,$v->Id,'TaskCmnt');
		        	//$commentList3 = $this->Modulemodel->allNotifList(1,$v->Id,'Todo');
		        	array_push($array['getAllTypeTask'],$getAllTypeTask);
		        	array_push($array['commentList'],$commentList2);
		        	//array_push($array['commentList'],$commentList3);
				}
			}
			
			$array['getAllProjectUnTag'] = $this->Modulemodel->getAll("crm_notification",array('user_id'=>$data['id'],'type'=>'ProjectTagRemove','notification_for'=>'1'));
			$array['getAllProjectTag'] = $this->Modulemodel->getAll("crm_notification",array('user_id'=>$data['id'],'type'=>'ProjectTagAss','notification_for'=>'1'));
			
			$array['getAllTaskTag'] = $this->Modulemodel->getAll("crm_notification",array('user_id'=>$data[
				'id'],'type'=>'TaskTagAss','notification_for'=>'1'));
			$array['getAllTaskUnTag'] = $this->Modulemodel->getAll("crm_notification",array('user_id'=>$data['id'],'type'=>'TaskTagRemove','notification_for'=>'1'));
			
			
			$array['getAllTodoTag'] = $this->Modulemodel->getAll("crm_notification",array('user_id'=>$data['id'],'type'=>'TodoTagAss','notification_for'=>'1'));
			$array['getAllTodoUnTag'] = $this->Modulemodel->getAll("crm_notification",array('user_id'=>$data['id'],'type'=>'TodoTagRemove','notification_for'=>'1'));
			
			$array['getAllNotListLastday'] = $this->Modulemodel-> getAllNotListAll(1,$data['id']);
			
			$array['getAlltodo'] = $this->Modulemodel-> getAlltodo($data['org_id'],$data['id']);

			foreach ($array['getAlltodo'] as $key => $value) {
	        	$commentList3 = $this->Modulemodel->allNotifList(1,$value->Id,'Todo');
	        	array_push($array['commentList'],$commentList3);
			}
			
			header('Content-Type: application/json');
			echo json_encode($array);
		}

		public function saveProjectSet(){
			$array = array();
			$projectArray = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['org_id'] = $sessionData['org_id'];

			$currrentDate = date('Y-m-d H:i:s');
			$parentID = $this->input->post('parentid');
			$projectname = 'Title';

			$Title = $this  -> db
							-> get_where('crm_activity',array('Id'=>$parentID))
							-> row()->$projectname;
			
			$inputdata = array(
				"Type" => 'Project',
            	"Title" => $Title,
            	"Description" => $this->input->post('projectDescription'),
            	"Startdate" => $this->input->post('projectStartdate'),
            	"Enddate" => $this->input->post('projectEnddate'),
            	"Duration" => $this->input->post('projectDuration'),
            	"Status" => $this->input->post('projectStatus'),
            	"CreatedBy" => $data['id'],
            	"CreatedDate" => $currrentDate,
            	"HasGroup" => $this->input->post('projectGroup'),
            	"HasClient" => $this->input->post('projectCLient'),
            	"HasParentId" => $parentID
            );
			
			
			//$array['newid'] = $this->Modulemodel->insertData("crm_activity", $inputdata);
			
			if($this->Modulemodel->updateOneData('crm_activity',$inputdata , array('Id'=>$parentID ))){
				$array['newid'] = $parentID;
			}else{
				$array['newid'] = 0;
			}
			
			header('Content-Type: application/json');
			echo json_encode($array);
		}

		public function getNewProjectdetails(){
			$array = array();

			$array['detail'] = $this->Modulemodel->getAll("crm_activity",array('Id'=>$this->input->post('projectID')));
			$array['tagAdmin'] = $this->Modulemodel->getAll("crm_tagHD",array('RelatedTo'=>$this->input->post('projectID'),'UserStatus'=>'1'));
			$array['tagMember'] = $this->Modulemodel->getAll("crm_tagHD",array('RelatedTo'=>$this->input->post('projectID'),'UserStatus'=>'2'));


			header('Content-Type: application/json');
			echo json_encode($array);
		}

		public function getUsersForProject(){
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$array = array();

			$this->db->select('ID, full_name');
			$this->db->where('org_id', $sessionData['org_id']);
			$array['users'] = $this->db->get('crm_users')->result();

			header('Content-Type: application/json');
			echo json_encode($array);
		}

		public function TagAjax(){
			$array = array();

			$array['programid'] = $this->input->post('programid');

			header('Content-Type: application/json');
			echo json_encode($array);
		}


		public function insertCmnt(){
			$array = array();
			$TagArray = array();
			$ty ='';
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['org_id'] = $sessionData['org_id'];
			$data['img'] = $sessionData['user_img'];
			$data['name'] = $sessionData['username'];
			
			$currrentDate = date('Y-m-d H:i:s');

			$inputdata = array(
					"comment" => $this->input->post('comment'),
	            	"img" => $data['img'],
	            	"name" => $data['name'],
	            	"type" => $this->input->post('type'),
	            	"typeID" => $this->input->post('projectID'),
	            	"user" => $data['id'],
	            	"date" => $currrentDate
	            );

			$array["activityid"] = $this->Modulemodel->insertData("crm_modcomments", $inputdata);
			
			$title = $this->db->select("Title")->get_where("crm_activity", array("Id"=>$this->input->post('projectID')))->result();
			
			if($this->input->post('type') == 'ProjectCmnt'){
				$ty  = 'Project';
			}else if($this->input->post('type') == 'TaskCmnt'){
				$ty  = 'Task';
			}else{
				$ty  = $this->input->post('type');
			}

			$inputnot = array(
                'type' => $this->input->post('type'),
                'type_id' => $this->input->post('projectID'),
                'relatedTo' => $array["activityid"],
                'user_id' => $data['id'],
                'notification_for' => '1',
                'status' => '0',
                'title' => 'commented on '.$ty.' : '.$title[0]->Title,
                'body' => $this->input->post('comment'),
                'createdby' => $data['id']
            );
                
            $this->Modulemodel->insertData("crm_notification", $inputnot);
            
            if($this->input->post('type') != 'Todo'){
            	
            	$array['tag'] = $this->Modulemodel->getAlltagforproject($this->input->post('projectID'));
            	
            	if(count($array['tag']) > 0){
					
					foreach ($array['tag'] as $key => $value) {
			        	array_push($TagArray,$value->userid);			
			        }

			        array_push($TagArray,$this->Modulemodel->get_created_by_id('crm_activity',$this->input->post('projectID')));


		            foreach ($TagArray as $key => $value) {
		                   
		               if($value == $data['id']){
		               		//do nothing
		               }else{
		               		$temp_tbl[] = array(
			           			'parent' => $this->input->post('projectID'),
			           			'parentType'=>$this->input->post('type'),
			                    'typeid' => $array["activityid"],
			                    'userid' => $value
			                );
		               }
		               
		            }
		            
		            $this->Modulemodel->insertbatchinto("crm_temp_tbl", $temp_tbl);
            	}
	            
            }
            

			header('Content-Type: application/json');
			echo json_encode($array);
		}

		public function getCommentForProjects(){
			$array = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['org_id'] = $sessionData['org_id'];
			
			$array['title'] = $this->db->select("*")->get_where("crm_activity", array("Id"=>$this->input->post('projectID')))->result();
			$array['allComm'] = $this->Modulemodel->getAllcommentforproject($this->input->post('projectID'));
			$array['tag'] = $this->Modulemodel->getAlltagforproject($this->input->post('projectID'));
			$array['creator'] = $this->Modulemodel->getcreatorproject($this->input->post('projectID'));
			
			$this->Modulemodel->deleteItem("crm_temp_tbl",array('parent'=>$this->input->post('projectID'),'userid'=>$data['id'],'parentType'=>'Project'));
			
			header('Content-Type: application/json');
			echo json_encode($array);
		}

		public function getCommentForProjectsTask(){
			$array = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['org_id'] = $sessionData['org_id'];
			
			$array['allComm'] = $this->Modulemodel->getAllcommentforproject($this->input->post('projectID'));
			$array['tag'] = $this->Modulemodel->getAlltagforproject($this->input->post('projectID'));
			$array['creator'] = $this->Modulemodel->getcreatorproject($this->input->post('projectID'));
			
			$this->Modulemodel->deleteItem("crm_temp_tbl",array('parent'=>$this->input->post('projectID'),'userid'=>$data['id'],'parentType'=>'Task'));
			
			header('Content-Type: application/json');
			echo json_encode($array);
		}



		public function deleteFileUnseen(){
			$array = array();
			$sessionData = $this->session->userdata('yeezyCRM');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['org_id'] = $sessionData['org_id'];
			
			$this->Modulemodel->deleteItem("crm_temp_tbl",array('parent'=>$this->input->post('projectID'),'userid'=>$data['id'],'parentType'=>'File'));
			
			header('Content-Type: application/json');
			echo json_encode($array);
		}


		public function tagUser(){
			
			$array = array();
			
			$sessionData = $this->session->userdata('yeezyCRM');
			$currrentDate = date('Y-m-d H:i:s');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['org_id'] = $sessionData['org_id'];

			$tagList = $this->input->post('tagList');
			$type = $this->input->post('type');
			$projectID = $this->input->post('projectID');
			$UserStatus = $this->input->post('UserStatus');

			$inputdata = array(
                    'RelatedTo' => $projectID,
                    'UserStatus' => $UserStatus,
                    'TagDate' => $currrentDate,
                    'Type' => $type,
                    'userid' => $tagList
                );
            
            if($this->Modulemodel->insertData("crm_tagHD", $inputdata)) {
                $array['msg'] = 'Done';
                $title = $this->db->select("Title")->get_where("crm_activity", array("Id"=>$projectID))->result();
	        	$inputInsertData = array(
					'type' => $type.'TagAss',
					'type_id' => $projectID,
					'relatedTo' => '',
					'user_id' => $tagList,
					'notification_for' => '1',
					'status' => '0',
					'title' => 'You have been assigned to a '.$type,
					'body' => $title[0]->Title,
					'createdby' => $data['id']
                );
                
                $this->Modulemodel->insertData("crm_notification", $inputInsertData);           
            }else{
            	$array['msg'] = 'Fail'; 
            }
			
			

			header('Content-Type: application/json');
			echo json_encode($array);
		}

		public function deltagUser(){
			$array = array();
			
			$sessionData = $this->session->userdata('yeezyCRM');
			$currrentDate = date('Y-m-d H:i:s');
			
			$data['acessType'] = $sessionData['accessType'];
			$data['id'] = $sessionData['user_id'];
			$data['org_id'] = $sessionData['org_id'];

			$tagList = $this->input->post('tagList');
			$type = $this->input->post('type');
			$projectID = $this->input->post('projectID');
			$UserStatus = $this->input->post('UserStatus');

			if($this->Modulemodel->deleteItem("crm_tagHD",array('RelatedTo'=>$projectID,'userid'=>$tagList,'Type'=> $type))) {
                $array['msg'] = 'Done';  
                $title = $this->db->select("Title")->get_where("crm_activity", array("Id"=>$projectID))->result();
	        	$inputInsertData = array(
					'type' => $type.'TagRemove',
					'type_id' => $projectID,
					'relatedTo' => '',
					'user_id' => $tagList,
					'notification_for' => '1',
					'status' => '0',
					'title' => 'You have been unassigned from the '.$type,
					'body' => $title[0]->Title,
					'createdby' => $data['id']
                );
                
                $this->Modulemodel->insertData("crm_notification", $inputInsertData);

            }else{
            	$array['msg'] = 'Fail'; 
            }
			
			header('Content-Type: application/json');
			echo json_encode($array);
		}

		public function newProjectFile(){
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');

			$sessionData = $this->session->userdata('yeezyCRM');

			$TagArray = array();
			$id = $sessionData['user_id'];
			
			$result = $this->db->get_where('crm_docs', array("parentID"=>$this->input->post('parentID'),'original_name' => $_FILES["fileToUpload"]["name"][0]))->result();

			if(count($result) > 0){
				$array['msg'] = 'Already';
			}else{
				$projectName = $this->input->post('projectName');
				$parentType = $this->input->post('parentType');
				$parentID = $this->input->post('parentID');
				$dirname = $this->input->post('dirname');
				
				$array['projectName'] = $projectName;
				
				$folderName = $this->Modulemodel->selectOneData("crm_docs",array("parentID"=>$this->input->post('parentID'),'parentType' => $parentType.'Folder'));
				
				$array['folderName'] = $folderName;
				
				if($folderName != false){
					$target_dir = "./$dirname/".$folderName[0]->name;
				}else{
					if($this->input->post('parentID') == ''){
						$target_dir = $this->mkdirForProject($id,$projectName,$parentType,$parentID,$dirname);
					}
					else{
						$target_dir = $this->mkdirForProject($id,$projectName,$parentType,$parentID,$dirname,$this->input->post('parentID'));
					}
				}
				
				$array['target_dir'] = $target_dir;
				$array['projectName'] = $projectName;
				$array['pttmsg'] = array();
				foreach($_FILES["fileToUpload"]["tmp_name"] as $key=>$value){	
					$file_origin_name = basename($_FILES["fileToUpload"]["name"][$key]);

					$file_ext = pathinfo("$target_dir/".$file_origin_name,PATHINFO_EXTENSION);

					$file_new_name = $id ."_". $key . time() .".". $file_ext;

					$target_file = "$target_dir/". $file_new_name;
					$fileSize = round(($_FILES['fileToUpload']['size'][$key])/1024,2);
					$uploadOk = 1;
					$msg = "";
					// Check if file already exists
					if (file_exists($target_file)) {
					    $msg .= "Sorry, file already exists.\n\r";
					    $uploadOk = 0;
					}
					if ($uploadOk == 0) {
						// Check if $uploadOk is set to 0 by an error
					    $msg .= "Sorry, your file was not uploaded.\n\r";
					    return false;
					} else {
						// if everything is ok, try to upload file
					    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $target_file)) {
					    	$this->db->insert("crm_docs", array("name"=>$file_new_name, "original_name"=>$file_origin_name, "type"=>'file', "user_id"=>$id,"parentType"=>$parentType,"parentID"=>$parentID,"size"=>$fileSize));

					    	$array['insert_id'] = $this->db->insert_id();
					        $msg .= $file_origin_name;
					        $array['file_new_name'] = $file_new_name;
					        $array['size'] = $fileSize;
					        if(isset($_POST["crm_modcomments"])){
					        	$inputdata = array(
									"comment" => "<a href='".base_url(substr($target_file, 2))."' target='_blank'>".$file_origin_name."<a>",
					            	"img" => "",
					            	"name" => "",
					            	"type" => $parentType,
					            	"typeID" => $parentID,
					            	"user" => $id,
					            	"date" => date('Y-m-d H:i:s')
					            );
					        	$this->db->insert("crm_modcomments", $inputdata);
					        	array_push($array['pttmsg'], "<a href='".base_url(substr($target_file, 2))."' target='_blank'>".$file_origin_name."<a>");
					        }
					    } else {
					        $msg .= "Sorry, there was an error uploading your file.\n\r";
					    }
					}
				}

				if($this->input->post('parentType') != 'Todo'){

					$array['tag'] = $this->Modulemodel->getAlltagforproject($parentID);
		            
		            if(count($array['tag']) == 0){

	            	}else{

			            foreach ($array['tag'] as $key => $value) {
				        	array_push($TagArray,$value->userid);			
				        }

				        array_push($TagArray,$this->Modulemodel->get_created_by_id('crm_activity',$parentID));


			            foreach ($TagArray as $key => $value) {
			                   
			               if($value == $id){
			               		//do nothin
			               }else{
			               		$inputInsertData[] = array(
			               			'parentType'=>'File',
				                    'parent' => $parentID,
				                    'typeid' => $array['insert_id'],
				                    'userid' => $value
				                );
			               }
			               
			            }
		            
			            $this->Modulemodel->insertbatchinto("crm_temp_tbl", $inputInsertData);
			        }
			    }
				
				$array['msg'] = $msg;
				$array['currrentDate'] = date('Y-m-d H:i:s');
				$array['createdby'] = $id;

				$array['parentfolder'] = $this->Modulemodel->selectOneData('crm_docs',array("parentType"=>"ProjectFolder","parentID"=>$parentID));
			}	
			header('Content-Type: application/json');
			echo json_encode($array);
		}

		public function mkdirForProject($uid,$projectName,$parentType,$parentID,$dirname,$rootID = false){
			
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');

    		$structure = "./$dirname/";
			$folder_name = $uid ."_". time();
			$structure .= $folder_name;
			
			if (!mkdir($structure, 0777, true)) {
			    $msg = false;
			}else{
				if($parentType == 'Task'){
					$this->db->insert("crm_docs", array("name"=>$folder_name, "original_name"=> $projectName, "type"=> 'folder', "user_id"=> $uid,"parentType"=>"ProjectFolder","parentID"=>$rootID));
				}else{
					$this->db->insert("crm_docs", array("name"=>$folder_name, "original_name"=> $projectName, "type"=> 'folder', "user_id"=> $uid,"parentType"=>$parentType."Folder","parentID"=>$parentID));
				}
				
				$msg = $structure;
			}

			// file_put_contents("filenameuptest.txt", $msg);

			return $msg;
    	}

    	public function getAllAttachData(){
			$array = array();

			$array['allFiles'] = $this->Modulemodel->getAll("crm_docs",array("parentType"=>$this->input->post("parentType"),"parentID"=>$this->input->post("parentID")));
			
			if($this->input->post("rootID") == "0"){
				$array['parentfolder'] = $this->Modulemodel->selectOneData('crm_docs',array("parentType"=>$this->input->post("parentFolder"),"parentID"=>$this->input->post("parentID")));
			}else{
				$array['parentfolder'] = $this->Modulemodel->selectOneData('crm_docs',array("parentType"=>$this->input->post("parentFolder"),"parentID"=>$this->input->post("rootID")));
			}

			$array['rootID'] = $this->input->post("rootID");
			$array['parentID'] = $this->input->post("parentID");
			$array['parentFolder2'] = $this->input->post("parentFolder");
			$array['parentType'] = $this->input->post("parentType");

			

			header('Content-Type: application/json');
			echo json_encode($array);
		}

		public function fileRename(){
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');

			$sessionData = $this->session->userdata('yeezyCRM');
			$currrentDate = date('Y-m-d H:i:s');
			
			$id = $sessionData['user_id'];
			
			$parentID = $this->input->post('docid');
			
			$vlu['original_name'] = $this->input->post('name');
			$vlu['LastUpdate'] = $currrentDate;

			if($this->Modulemodel->updateOneData('crm_docs',$vlu , array('id'=>$parentID))){
				$array['msg'] = "Done";
			}else{
				$array['msg'] = "Fail";
			}
			

			header('Content-Type: application/json');
			echo json_encode($array);

		}

		public function makeStar(){
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');

			$sessionData = $this->session->userdata('yeezyCRM');
			$parentID = $this->input->post('docid');
			$currrentDate = date('Y-m-d H:i:s');

			$vlu['HasStar'] = $this->input->post('status');
			$vlu['LastUpdate'] = $currrentDate;

			if($this->Modulemodel->updateOneData('crm_docs',$vlu , array('id'=>$parentID))){
				$array['msg'] = "Done";
			}else{
				$array['msg'] = "Fail";
			}
			

			header('Content-Type: application/json');
			echo json_encode($array);

		}

		public function fileDelete(){
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');

			$sessionData = $this->session->userdata('yeezyCRM');
			$parentID = $this->input->post('docid');
			$currrentDate = date('Y-m-d H:i:s');

			if($this->Modulemodel->deleteItem("crm_docs",array('id'=>$parentID))){
				$array['msg'] = "Done";
			}else{
				$array['msg'] = "Fail";
			}
			

			header('Content-Type: application/json');
			echo json_encode($array);

		}

		public function deleteItem(){
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');

			$sessionData = $this->session->userdata('yeezyCRM');
			$parentID = $this->input->post('ID');
			$currrentDate = date('Y-m-d H:i:s');

			if($this->Modulemodel->deleteItem("crm_activity",array('Id'=>$parentID))){
				
				$this->db->where('RelatedTo', $parentID);
				$this->db->delete('crm_tagHD');

				$array['msg'] = "Done";
			}else{
				$array['msg'] = "Fail";
			}
			

			header('Content-Type: application/json');
			echo json_encode($array);

		}

		public function updateprojectName(){
			if ($this->session->userdata('admin_login') != 1)
			redirect(base_url(), 'refresh');
			
			$sessionData = $this->session->userdata('yeezyCRM');
			$json = $this->Modulemodel->updateOneData("crm_activity", array('Title'=>$_POST['todoname'] ), array('Id'=>$_POST['todoserial']));
			
			
			header('Content-type: application/json');
			echo json_encode($json);
		}

		public function userListTagHD(){
	    	
	    	$projectID = $this->input->post('projectID');
	        
	        $data = array();
			
	    	$data['tag'] = $this->Modulemodel->getAlltagforproject($projectID);
	        
	        header('Content-Type: application/json');
	        echo json_encode($data);
		}

   	
   		/*Mahfuz*/
   		/*  Open file transfer window  */
	    public function comattach($type, $ptid, $dir){
	        if ($this->session->userdata('admin_login') != 1)
	           redirect(base_url(), 'refresh');
	        
	        $sessionData = $this->session->userdata('yeezyCRM');
	        $data['id'] = $sessionData['user_id'];
	        $data['user_email'] = $sessionData['user_email'];
	        $data["type"] = $type;
	        $data["ptid"] = $ptid;
	        $title = $this->db->select("Title")->get_where("crm_activity", array("Id"=>$ptid))->result();
	        $data["title"] = $title[0]->Title;
	        $data["dir"] = $dir;
	        $data["crm_modcomments"] = true;
	        $this->load->view('upload_com_file',$data);
	        
	    }


	    public function deletePTTComment(){
			if ($this->session->userdata('admin_login') != 1)
				redirect(base_url(), 'refresh');

			if($this->db->delete('crm_modcomments', array('id'=>$_POST["id"]))){
				$array = true;
			}else{
				$array = false;
			}
			header('Content-Type: application/json');
			echo json_encode($array);

		}
	}	