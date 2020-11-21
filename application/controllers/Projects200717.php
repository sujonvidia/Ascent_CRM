<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 *  @author : ITL
 *  04 Dec, 2016 
 */

class Projects extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->model('Common_model');
        $this->load->model('calendarmodel');
        $this->load->model("Crud_model");
        $this->load->model('Modulemodel'); // load Module model
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2020 05:00:00 GMT");
    }

    public function delEntry() {
            if ($this->session->userdata('yeezyCRM')) {
                
                $sessionData = $this->session->userdata('yeezyCRM');
                
                $createdBY = 'CreatedBy';
                $creator = $this-> db
                                -> get_where('crm_activity',array('Id'=>$this->input->post('serial')))
                                -> row()->$createdBY;
                $vlu['isDelete'] = '0';
                if($creator == $sessionData['user_id']){
                    if($this->Modulemodel->updateOneData('crm_activity',$vlu , array('Id'=>$_POST['serial'] ))){
                        $array['msg'] = "Done";
                    }else{
                        $array['msg'] = "Fail";
                    }
                }else{
                    $array['msg'] = "Fail";
                }
                
                
            } else {
                redirect('login', 'refresh');
            }

            header('Content-Type: application/json');
            echo json_encode($array);
    }

    public function undoEntry() {
        if ($this->session->userdata('yeezyCRM')) {
            
            $sessionData = $this->session->userdata('yeezyCRM');
            
            $createdBY = 'CreatedBy';
            $creator = $this-> db
                            -> get_where('crm_activity',array('Id'=>$this->input->post('serial')))
                            -> row()->$createdBY;
            $vlu['isDelete'] = '1';
            if($creator == $sessionData['user_id']){
                if($this->Modulemodel->updateOneData('crm_activity',$vlu , array('Id'=>$_POST['serial'] ))){
                    $array['msg'] = "Done";
                }else{
                    $array['msg'] = "Fail";
                }
            }else{
                $array['msg'] = "Fail";
            }
            
            
        } else {
            redirect('login', 'refresh');
        }

        header('Content-Type: application/json');
        echo json_encode($array);
    }


    public function index() {
        if ($this->session->userdata('admin_login') == 1) {
            $sessionData = $this->session->userdata('yeezyCRM');

            $page_data['acessType'] = $sessionData['accessType'];
            $page_data['id'] = $sessionData['user_id'];
            $page_data['org_id'] = $sessionData['org_id'];
            $page_data['username'] = $sessionData['username'];
            $page_data['user_img'] = $sessionData['user_img'];
            $page_data['user_email'] = $sessionData['user_email'];

            $page_data['page_name'] = 'projects';
            $page_data['page_title'] = 'Navcon :: Projects';

            $page_data['DashboardEvents'] = $this->calendarmodel->getDashboardCalendar($page_data['id'], $page_data['org_id'], 'Event');
            $page_data['projectGroup'] = $this->Modulemodel->getAll("crm_project_group", array('org_id' => $page_data['org_id']));
            $page_data['client'] = $this->Modulemodel->getAll("crm_contactdetails");
            $page_data['allprojectANDTask'] = $this->db->select('Id,Title')->get_where('crm_activity',array("Workspaces"=>$sessionData['org_id']))->result_array();

            $page_data['projectstatus'] = $this->Modulemodel->getAll("crm_projectstatus", array('picklist_valueid' => '0'));
            $page_data['projecttasktype'] = $this->Modulemodel->getAll("crm_projecttasktype");
            $page_data['ticketpriorities'] = $this->Modulemodel->getAll("crm_ticketpriorities");
            $page_data['projecttaskprogress'] = $this->Modulemodel->getAll("crm_projecttaskprogress");
            //$page_data['users'] = $this->Modulemodel->getAllUsersWithoutMe($page_data['id']);
            $page_data['users'] = $this->Modulemodel->getWorkspaceUsersWithoutMe($page_data['id'], $page_data['org_id']);
            $page_data['alluser'] = $this->Modulemodel->getWorkspaceUsers($page_data['id'], $page_data['org_id']);
            $page_data['allusers'] = $this->db->select('ID, full_name,img')->get('crm_users')->result_array();



            $page_data['allprojects'] = $this->Modulemodel->getAllprojects($page_data['org_id'], $page_data['id']);
            $this->load->view('projects', $page_data);
        } else {
            $this->load->view('login');
        }
    }

    public function thisos() {
        
    }

    // added by sujon @ 1/3/2017

    public function Invquoteitemupdate() {
        try {

            $newvlu['subject'] = $_POST['qname'];
            $newvlu['invoicestatus'] = $_POST['qstage'];

            $this->Modulemodel->updateInvQuoteList($newvlu, $_POST['invid']);

            //}
        } catch (Exception $e) {
            file_put_contents("8.1.16.txt", $e);
        }
    }

    // sujon @ 8/16/16
    public function changeQuoteCurrency($qid = 0) {

        $vlu['name'] = $_POST['sel_currency'][0];

        $vlu['type_name'] = "Currency";
        $vlu['type'] = "Quote";
        $vlu['type_value'] = $_POST['optcurtype'];
        $vlu['type_id'] = 0;

        $this->Modulemodel->deleteItem("crm_currency_units", array('type_name' => "Currency", 'type' => "Quote", 'type_id' => 0));
        $this->Modulemodel->insertData("crm_currency_units", $vlu);




        // $this->Modulemodel->updateOneData('crm_quotes',$vlu , array('quoteid'=>$qid ));
        // if(isset($_POST['currencyLink'])){
        //    $this->Modulemodel->updateOneData('crm_quotes', $vlu, array('type'=>"invoice_quote",'type_id'=>$qid ));
        //    $this->Modulemodel->convertCurrencyLinks($vlu['currency_value'],$qid);
        // }
    }

    // added by sujon @ 8/10/16
    public function Invoicequoteitemupdate() {
        try {

            $newvlu['subject'] = $_POST['qname'];
            $newvlu['quotestage'] = $_POST['qstage'];

            $this->Modulemodel->updateInvoiceQuoteList($newvlu, $_POST['qid']);

            //}
        } catch (Exception $e) {
            file_put_contents("8.1.16.txt", $e);
        }
    }

    // show complete task by sujon @ 6/22/16
    public function updateShowComplete() {
        if ($this->session->userdata('yeezyCRM')) {

            $this->Modulemodel->updateOneData("crm_project", array(
                "show_complete" => $_POST["ustatus"]), array('projectid' => $_POST["uid"]));
        } else {
            redirect('login', 'refresh');
        }
    }

    // update serial by sujon @ 7-20-2016
    public function updateSerial() {
        $ara = array();
        $sessionData = $this->session->userdata('yeezyCRM');

        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['username'] = $sessionData['username'];
        $data['org_id'] = $sessionData['org_id'];


        $inputdata = array(
            "projecttaskcode" => $_POST["ptcode"]
        );

        $ara['status'] = $this->Modulemodel->updateOneData("crm_projecttask", $inputdata, array('projecttaskid' => $_POST["ptid"]));

        header('Content-Type: application/json');
        echo json_encode($ara);
    }

    // added by sujon
    public function insertInvoices($quoteid = 0, $pro_id = 0, $taskid = 0) {
        if ($this->session->userdata('yeezyCRM')) {

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

            $vlu['terms_conditions'] = " - Unless otherwise agreed in writing by the supplier all invoices are payable within thirty (30) days of the date of invoice, in the currency of the invoice, drawn on a bank based in India or by such other method as is agreed in advance by the Supplier.
				
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

            if ($quoteid != 0) {
                //$this->Modulemodel->duplicate_iqrows($quoteid,$data["invoiceid"],false,0);
            }
            header('Content-Type: application/json');
            echo json_encode($data);
            //}
        } else {

            redirect('login', 'refresh');
        }
    }

    public function getTaskQouteList() {

        $data = array();
        $pid = $_POST['pid'];

        if ($_POST['get_status'] == 1) {
            $data['updated_quotes'] = $this->Modulemodel->getAllQuotes($Vid);
        } else {
            $data['updated_quotes'] = $this->Modulemodel->getUserQuotes($Vid, $user_id);
        }
        $data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Currency", 'type' => "Quote", 'type_id' => 0));
        $data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Unit", 'type' => "Quote", 'type_selected' => 1, 'type_status' => 1));


        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getInvoiceList() {

        $data = array();
        $pid = $_POST['pid'];
        if ($_POST['get_status'] == 1) {
            $data['allInvoiceList'] = $this->Modulemodel->getAll("crm_invoice", array('pro_id' => $pid));
        } else {
            $data['allInvoiceList'] = $this->Modulemodel->getAll("crm_invoice", array('pro_id' => $pid, 'creator' => $_POST['user_id']));
        }
        $data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Currency", 'type' => "Quote", 'type_id' => 0));
        $data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Unit", 'type' => "Quote", 'type_selected' => 1, 'type_status' => 1));
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function viewAddInvoices($quoteid = 0, $pro_id = 0, $taskid = 0) {

        if ($this->session->userdata('yeezyCRM')) {

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

            if ($quoteid == 0) {
                $this->load->view('Accounts/add_invoices', $data);
            } else {

                $this->load->view('Accounts/add_invoices_task', $data);
            }
        } else {

            redirect('login', 'refresh');
        }
    }

    public function invoiceQuotesDetail($invid, $qid) {

        //$Vid = $this->input->post('taskID');

        $data['invoice_quotes'] = $this->Modulemodel->getAllQuotesByInvoice($invid, $qid);
        // $data['updated_items'] = $this->Modulemodel->getAllTaskItem($qid);
        // $data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Currency",'type'=>"Quote",'type_id'=>$qid));
        // $data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name'=>"Unit",'type'=>"Quote",'type_id'=>$qid,'type_selected'=>1,'type_status'=>1));

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function invoiceQuotesItemDetail($qid, $typeid = 0) {

        $data['updated_quotes'] = $this->Modulemodel->getAllQuotesById($qid);
        $data['updated_items'] = $this->Modulemodel->getInvoiceQuoteItem($qid);

        $data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Currency", 'type' => "Quote", 'type_id' => 0));

        $data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Unit", 'type' => "Quote", 'type_selected' => 1, 'type_status' => 1));

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function quotesItemDelete() {


        $this->Modulemodel->delQuotesById($_POST["qid"]);
        $data['status'] = 'ok';
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    // sujon @ 8/11/16
    public function invoiceItemDelete() {


        $this->Modulemodel->delInvoiceById($_POST["invid"]);
        $data['status'] = 'ok';
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function taskitemupdate($qid = 0, $tid = 0, $lid = 0, $invid = 0) {
        try {

            if ($qid == 0) { // from quotation tab
                $this->Modulemodel->deleteItem("crm_service_items", array('type_id' => $_POST['quoteitemid']));
            } else { // from invoice tab
                $this->Modulemodel->deleteItem("crm_service_items", array('type_id' => $qid));
            }

            foreach ($_POST['sel_servicename_item'] as $key => $value) {

                $assign_item['item_name'] = $_POST['sel_servicename_item'][$key];
                if ($qid == 0) {
                    $assign_item['type_id'] = $_POST['quoteitemid'];
                    $assign_item['typeof_item'] = "quotes";
                } else {
                    $assign_item['type_id'] = $qid;
                    $assign_item['typeof_item'] = "invoice_quote";
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

                $assign_item["item_tax_vat"] = ($_POST['load_tax_vat'][$key] == "null") ? null : $_POST['load_tax_vat'][$key];
                $assign_item["item_tax_sales"] = ($_POST['load_tax_sales'][$key] == "null") ? null : $_POST['load_tax_sales'][$key];
                $assign_item["item_tax_service"] = ($_POST['load_tax_service'][$key] == "null") ? null : $_POST['load_tax_service'][$key];

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

            if ($qid == 0) {
                $this->Modulemodel->updateQuoteList($newvlu, $_POST['quoteitemid']);
            } else {

                $this->Modulemodel->updateQuoteList($newvlu, $qid);
            }

            if ($lid == 0) {
                
            } else {
                $newvlu['quotestage'] = 'Revised';
                $this->Modulemodel->updateQuoteList($newvlu, $qid);

                $newvlu['new_quoteid'] = $this->Modulemodel->revision_iqrows($qid, $tid, $lid, $invid);
                $newvlu['old_quoteid'] = $qid;
                $newvlu['old_invid'] = $invid;
            }
            $newvlu['default'] = true;
            header('Content-Type: application/json');
            echo json_encode($newvlu);
        } catch (Exception $e) {
            file_put_contents("8.1.16.txt", $e);
        }
    }

    public function quoteitemupdate() {
        try {

            $newvlu['subject'] = $_POST['qname'];
            $newvlu['quotestage'] = $_POST['qstage'];

            $this->Modulemodel->updateQuoteList($newvlu, $_POST['qid']);

            //}
        } catch (Exception $e) {
            file_put_contents("8.1.16.txt", $e);
        }
    }

    public function getQuoteUnits() {

        $data = array();
        $data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Unit", 'type' => "Quote"));

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function popupQuoteSettings($qid = 0) {
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

    public function curlQuoteCurrency() {

        $response = read_file('require/http/currency.json');
        $data['NewCurrencyName'] = 'File opened!';
        $data['NewCurrencyValue'] = ($response);

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

        $data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Currency", 'type' => "Quote", 'type_id' => 0));

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function popupdiscount($id, $id2, $dis_type, $dis_value_percent, $dis_value_direct) {
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

    public function popupdiscountgrand($dis_type, $dis_for, $dis_value_percent, $dis_value_direct, $dis_serial = '') {
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

    public function popuptax($p_id, $p_vat, $p_sales, $p_service, $p_afterdis, $currency_symbol = false) {
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

            $data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Currency", 'type' => "Quote", 'type_id' => 0));

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

    public function popuptaxshiphand($p_vat, $p_sales, $p_service, $p_afterdis, $p_serial = '') {
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
    public function readStickyNote() {
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
    public function readStickyNoteSub() {
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
    public function updatetaskNew() {
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

        $ara['allTask'] = $this->Modulemodel->updateOneData("crm_projecttask", $inputdata, array('projecttaskid' => $_POST["utaskid"]));

        header('Content-Type: application/json');
        echo json_encode($ara);
    }

    // update sub sticky note by sujon
    public function updateStickyNoteSub() {
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

        $ara['allTask'] = $this->Modulemodel->updateOneData("crm_projectSubTask", $inputdata, array('projecttaskid' => $_POST["tid"]));

        header('Content-Type: application/json');
        echo json_encode($ara);
    }

    // complete task by sujon @ 6/22/16
    public function updatechecked() {
        if ($this->session->userdata('yeezyCRM')) {

            $inputdata = array(
                "checked" => $_POST["uchecked"],
            );
            if ($_POST["utable"] == "SUBTASK") {
                $this->Modulemodel->updateOneData("crm_projectSubTask", $inputdata, array('projecttaskid' => $_POST["uid"]));
            }
            if ($_POST["utable"] == "TASK") {
                $this->Modulemodel->updateOneData("crm_projecttask", $inputdata, array('projecttaskid' => $_POST["uid"]));

                $this->Modulemodel->updateOneData("crm_projectSubTask", $inputdata, array('parenttaskID' => $_POST["uid"]));
            }
            if ($_POST["ustatus"] == "ACTIVE") {
                $this->Modulemodel->updateOneData("crm_projecttask", array(
                    "task_status" => $_POST["ustatus"]), array('projecttaskid' => $_POST["uid"]));
                $this->Modulemodel->updateOneData("crm_projectSubTask", array(
                    "status" => $_POST["ustatus"]), array('parenttaskID' => $_POST["uid"]));
            }
        } else {
            redirect('login', 'refresh');
        }
    }

    // update sticky note by sujon
    public function addStickyNote() {
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
    public function delStickyNote() {
        $ara = array();
        $sessionData = $this->session->userdata('yeezyCRM');

        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['username'] = $sessionData['username'];
        $data['org_id'] = $sessionData['org_id'];

        $data['status'] = $this->Modulemodel->deleteItem("crm_stickynotes", array('id' => $_POST['noteid'], 'user_id' => $sessionData['user_id']));

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function updateStickyNote() {
        $ara = array();
        $sessionData = $this->session->userdata('yeezyCRM');

        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['username'] = $sessionData['username'];
        $data['org_id'] = $sessionData['org_id'];

        $data['status'] = $this->Modulemodel->updateOneData("crm_stickynotes", array('stickynote' => $_POST["stickynote"]), array('id' => $_POST["noteid"]));



        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function viewAddQuotes($taskid = 0, $pro_id = 0) {
        if ($this->session->userdata('yeezyCRM')) {

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

            if ($taskid == 0) {
                $this->load->view('Accounts/add_quotes', $data);
            } else {
                $this->load->view('Accounts/add_quotes_task', $data);
            }
        } else {

            redirect('login', 'refresh');
        }
    }

    public function quotesItemDetail($qid, $taskid = 0) {

        $data['updated_quotes'] = $this->Modulemodel->getAllQuotesById($qid);
        $data['updated_items'] = $this->Modulemodel->getAllTaskItem($qid);
        $data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Currency", 'type' => "Quote", 'type_id' => 0));

        $data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Unit", 'type' => "Quote", 'type_selected' => 1, 'type_status' => 1));

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function insertQuotes($status = 0, $pro_id = 0) {
        if ($this->session->userdata('yeezyCRM')) {

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


            $vlu['terms_conditions'] = "- Unless otherwise agreed in writing by the supplier all invoices are payable within thirty (30) days of the date of invoice, in the currency of the invoice, drawn on a bank based in India or by such other method as is agreed in advance by the Supplier.
				
				- All prices are not inclusive of VAT which shall be payable in addition by the Customer at the applicable rate.";

            $data["quoteid"] = $this->Modulemodel->insertData("crm_quotes", $vlu);


            $this->Modulemodel->update_qtlink($data["quoteid"]);

            $vlu_bill['quotebilladdressid'] = $data['quoteid'];
            $vlu_bill['bill_street'] = $_POST['bill_street_new'];
            $data["quotebilladdressid"] = $this->Modulemodel->insertData("crm_quotesbillads", $vlu_bill);

            $vlu_ship['quoteshipaddressid'] = $data['quoteid'];
            $vlu_ship['ship_street'] = $_POST['ship_street_new'];
            $data["quoteshipaddressid"] = $this->Modulemodel->insertData("crm_quotesshipads", $vlu_ship);

            if ($status == 0) {

                if ($_POST['sharedQt_userid_new']) {
                    foreach ($_POST['sharedQt_userid_new'] as $key => $value) {
                        $assign['type'] = "quotes";
                        $assign['userteamid'] = $value;
                        $assign["relatedto"] = $data["quoteid"];
                        if ($_POST["sharedtypeQt_new"] == "U") {

                            $assign['idtype'] = "userid";
                        } elseif ($_POST["sharedtypeQt_new"] == "G") {

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
        } else {

            redirect('login', 'refresh');
        }
    }

    public function getproject() {

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

        $array['projects'] = $this->Modulemodel->getAllprojects($data['org_id'], $data['id']);

        foreach ($array['projects'] as $key => $value) {
            $TaskResult = $this->Modulemodel->getAllMyTaskLatestThree($data['id'], $value->Id);
            $TotalTask = $this->Modulemodel->getAllMyTaskLatest($data['id'], $value->Id);
            $PendingTask = $this->Modulemodel->getAllMyTaskLatestPending($data['id'], $value->Id);
            $unsennsommnet = $this->Modulemodel->getUnseenComment($value->Id, $data['id'], 'Project');
            $unsennFile = $this->Modulemodel->getUnseenComment($value->Id, $data['id'], 'File');

            array_push($array['tasklist'], $TaskResult);
            array_push($array['projectIDlist'], $value->Id);
            array_push($array['TotalTask'], $TotalTask);
            array_push($array['PendingTask'], $PendingTask);
            array_push($array['unsennsommnet'], $unsennsommnet);
            array_push($array['unsennFile'], $unsennFile);
        }




        //$array['tag'] = $this->Modulemodel->getAll("crm_tag", array('type'=>'task', 'relatedto'=>$id));

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function saveproject($id = FALSE) {
        if ($this->session->userdata('yeezyCRM')) {

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
                "HasParentId" => 0,
                "Workspaces" => $data['org_id']
            );

            $data["activityid"] = $this->Modulemodel->insertData("crm_activity", $inputdata);

            $inputInsertData = array(
                'type' => 'Project',
                'type_id' => $data["activityid"],
                'relatedTo' => '',
                'org_id' => $data['org_id'],
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
            
            // $structure = "./ProjectFolder/";
            // $folder_name = $data['id'] . "_" . time();
            // $structure .= $folder_name;
            // mkdir($structure, 0777, true);
            $array["notreq"] = $this->mkdir4Project($data['id'], $_POST["pName"], "Project", $data["activityid"]);

            header('Content-Type: application/json');
            echo json_encode($array);
        } else {

            redirect('login', 'refresh');
        }
    }

    public function getProDetail() {
        $proArray = array();

        $project_ID = $_POST["projectID"];

        $proArray['proDetail'] = $this->Modulemodel->getAll("crm_project", array('projectid' => $project_ID));
        $proArray['tag'] = $this->Modulemodel->getAllTag($project_ID, 'project');

        $proArray['createdBy'] = $this->Modulemodel->get_type_name_by_id('crm_users', $proArray['proDetail'][0]->createdBy);
        //$proArray['createdBy'] = $proArray['proDetail'][0]->createdBy;
        header('Content-Type: application/json');
        echo json_encode($proArray);
    }

    public function updateProject() {
        if (isset($_POST['projecteid'])) {
            $this->load->helper('date');

            $date = date('Y-m-d H:i:s');
            $sessionData = $this->session->userdata('yeezyCRM');

            $data['acessType'] = $sessionData['accessType'];
            $data['id'] = $sessionData['user_id'];
            $data['org_id'] = $sessionData['org_id'];
            $url = $data['org_id'] . ".com/yzy-projects/index/projects";



            if ($_POST['togPopTitle'] != "") {
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

            if ($_POST['relatedTo'] != "" && $_POST['relatedtoVal'] != "") {
                if ($_POST['relatedTo'] == 'A') {
                    $vlu['relatedto'] = 'Account';
                    $vlu['relatedToVal'] = $_POST['relatedtoVal'];
                } elseif ($_POST['relatedTo'] == 'C') {
                    $vlu['relatedto'] = 'Contact';
                    $vlu['relatedToVal'] = $_POST['relatedtoVal'];
                }
            }


            if (isset($_POST['member']) && $_POST['type'] == "OP") {
                $vlu['project_type'] = "MP";
            } else {
                $vlu['project_type'] = $_POST['type'];
            }

            array_splice($assignArray, 0, 1);

            $margeArray = array_merge($assignArray, $_POST['member']);

            // print_r($margeArray);
            if (isset($_POST['assignto']) && $_POST['assignto'] != "") {
                $ul = $this->Modulemodel->findInviteUser4project($_POST['projecteid'], 0);
                if ($ul !== FALSE) {
                    //file_put_contents("errorfilename.txt", $k);
                    foreach ($ul as $k => $v) {
                        if (array_search($v->userteamid, $_POST["assignto"]) === FALSE) {
                            //if($this->sendEmail2($v->email, $_POST["togPopTitle"]) === 'done')
                            echo "Successfully";
                            // file_put_contents("filename.txt", $v->email);
                        } else
                            echo "error";
                        // file_put_contents("errorfilename.txt", $k);
                    }
                }
            }

            if (isset($_POST['member']) && $_POST['member'] != "") {
                $ul = $this->Modulemodel->findInviteUser4project($_POST['projecteid'], 1);
                if ($ul !== FALSE) {
                    //file_put_contents("errorfilename.txt", $k);
                    foreach ($ul as $k => $v) {
                        if (array_search($v->userteamid, $_POST["member"]) === FALSE) {
                            //if($this->sendEmail2($v->email, $_POST["togPopTitle"]) === 'done')
                            echo "Successfully";
                            // file_put_contents("filename.txt", $v->email);
                        } else
                            echo "error";
                        // file_put_contents("errorfilename.txt", $k);
                    }
                }
            }

            $this->Modulemodel->updateOneData("crm_project", $vlu, array('projectid' => $_POST["projecteid"]));
            if (isset($_POST['member']) && $_POST['member'] != "") {

                $this->Modulemodel->deleteItem("crm_tag", array('relatedto' => $this->input->post('projecteid'), 'type' => 'project'));
                $sta = 1;
                $count = count($assignArray);
                foreach ($margeArray as $key => $value) {

                    if ($count > 0) {
                        $sta = 0;
                    } else {
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

                if ($this->Modulemodel->insertbatchinto("crm_tag", $inputdata)) {
                    //redirect($url, 'refresh');           
                }
            } else {
                //redirect($url, 'refresh');  
            }

            if ((isset($_POST['member']) && $_POST['member'] != "") || isset($_POST['assignto']) && $_POST['assignto'] != "") {
                $this->Modulemodel->deleteItem("crm_notification", array('type' => 'project', 'type_id' => $this->input->post('projecteid')));

                $margeForNotify = array_merge($_POST['assignto'], $_POST['member']);

                $projectDivIDArray = $this->Modulemodel->selectOneData("crm_project", array('projectid' => $this->input->post('projecteid')));

                $body = "You are tagged in project. Project Name: <a href='#'>" . $vlu['projectname'] . "</a>";
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
        } else {
            redirect('Projects', 'refresh');
        }
    }

    public function copyProject() {
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
        $tagArray['insertTagID'] = $this->Modulemodel->copyProjectTag($project_ID, $tagArray['insertID']);
        $this->Modulemodel->updateOneData("crm_project", $vlu, array('projectid' => $tagArray['insertID']));
        $tagArray['projects'] = $this->Modulemodel->getAllprojects($data['org_id'], $data['id']);
        header('Content-Type: application/json');
        echo json_encode($tagArray);
    }

    public function deleteProject() {
        $tagArray = array();
        $sessionData = $this->session->userdata('yeezyCRM');

        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['org_id'] = $sessionData['org_id'];

        if ($this->Modulemodel->deleteItem("crm_project", array('projectid' => $this->input->post('projectId'), 'createdBy' => $data['id'])) === TRUE) {
            $this->Modulemodel->deleteItem("crm_tag", array('relatedto' => $this->input->post('projectId'), 'type' => 'project'));
            $tagArray['projects'] = $this->Modulemodel->getAllprojects($data['org_id'], $data['id']);
            $tagArray['msg'] = "DONE";
        } else {
            $tagArray['msg'] = "FAIL";
        }

        header('Content-Type: application/json');
        echo json_encode($tagArray);
    }

    // sujon @3-14-2017
    public function getTag() {
        $tagArray = array();
        $project_ID = $_POST["project_ID"];
        $tagArray['tag'] = $this->Modulemodel->getProjectUsers($project_ID, '2');
        $tagArray['status'] = $this->Modulemodel->getProjectStatus($project_ID);
        //$tagArray['totalTask'] = $this->Modulemodel->countTask(array('projectid'=>$project_ID));
        header('Content-Type: application/json');
        echo json_encode($tagArray);
    }

    public function getTASKTagCO() {
        $tagArray = array();
        $project_ID = $_POST["project_ID"];
        $tagArray['tag'] = $this->Modulemodel->getTaskCO($project_ID, '1');
        $tagArray['status'] = $this->Modulemodel->getProjectStatus($project_ID);
        //$tagArray['totalTask'] = $this->Modulemodel->countTask(array('projectid'=>$project_ID));
        header('Content-Type: application/json');
        echo json_encode($tagArray);
    }

    // save task by sujon
    public function savePopTaskNew() {
        if ($this->session->userdata('yeezyCRM')) {

            $ara = array();
            $ara['allAdmin'] = array();
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
                "Startdate" => '0000-00-00 00:00:00',
                "Enddate" => '0000-00-00 00:00:00',
                "Duration" => '1',
                "Status" => 'none',
                "CreatedBy" => $data['id'],
                "CreatedDate" => $date,
                "HasGroup" => '',
                "HasClient" => '',
                "HasParentId" => $_POST["pid"],
                "Workspaces" => $data['org_id']
            );

            $ara["taskInsertID"] = $this->Modulemodel->insertData("crm_activity", $inputdata);
            $ara["startDate"] = $date;
            $ara["Id"] = $ara["taskInsertID"];
            $ara["Status"] = 'none';
            $ara["HasParentId"] = $_POST["pid"];

            $createdBY = 'CreatedBy';

            $creator = $this->db
                            ->get_where('crm_activity', array('Id' => $_POST["pid"]))
                            ->row()->$createdBY;

            $ara['allAdmin'] = $this->Modulemodel->getAllprojectAdmin($_POST["pid"], $creator);
            //array_push($ara['allAdmin'],array('userid' => $creator[0]));
            $ara['creator'] = $creator;
            
            if ($creator !== $data['id']) {
                //$ara['creator'] = $creator[0];
                $inputcreator = array(
                    'RelatedTo' => $ara["taskInsertID"],
                    'UserStatus' => '1',
                    'TagDate' => $date,
                    'Type' => 'Task',
                    'userid' => $creator,
                    'assignBy' => $data['id']
                );
                $this->Modulemodel->insertData("crm_tagHD", $inputcreator);
            }

            if (COUNT($ara['allAdmin']) > 0) {
                foreach ($ara['allAdmin'] as $key => $value) {
                    $inputHDdata[] = array(
                        'RelatedTo' => $ara["taskInsertID"],
                        'UserStatus' => '1',
                        'TagDate' => $date,
                        'Type' => 'Task',
                        'userid' => $value->userid,
                        'assignBy' => $data['id']
                    );
                }
                $this->Modulemodel->insertbatchinto("crm_tagHD", $inputHDdata);
            }


            $inputInsertData = array(
                'type' => 'Task',
                'type_id' => $ara["taskInsertID"],
                'relatedTo' => $_POST["pid"],
                'org_id' => $data['org_id'],
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

    public function savetempdata_item() {
        $sessionData = $this->session->userdata('yeezyCRM');
        $id = $sessionData['user_id'] . time();
        if ($_POST['etype'] == 'invoice') {
            $vlud['uid'] = "inv-" . $_POST['eid'];
        } elseif ($_POST['etype'] == 'quotation') {
            if ($_POST['estatus'] == 'mail') {
                $vlud['uid'] = $_POST["taskid"] . "-" . $_POST['eid'];
            } else {
                $vlud['uid'] = $_POST["taskid"];
            }
        }
        $vlud['tempdata'] = $_POST["htmldata"];

        $this->Modulemodel->deleteItem("crm_savetempdata", array('uid' => $vlud['uid']));

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

        if ($taskType == 'UnCat') {
            $data['dataList'] = $this->Modulemodel->getUnCatTaskDetails($Vid);
        } else {
            $data['dataList'] = $this->Modulemodel->getTaskDetails($Vid);
        }

        $data['docList'] = $this->Modulemodel->getDocList($Vid);
        $data['commentList'] = $this->Modulemodel->getComment($Vid, $type);
        $data['feedbackList'] = $this->Modulemodel->getFeedback($Vid);
        $data['tasklistName'] = $this->Modulemodel->getAll("crm_tasklist", array('inputDiv' => $taskLsitID));

        $data['tasktag'] = $this->Modulemodel->getAll("crm_taskTag", array('task_id' => $Vid));
        $data['tag'] = $this->Modulemodel->getAllTag($projectID, 'task', $Vid);
        $data['tagFollow'] = $this->Modulemodel->getAllFollow($projectID, 'task', $Vid);

        $data['updated_items'] = $this->Modulemodel->getAllTaskItem($Vid);
        // updated by sujon @ 10-06-16

        if ($_POST['get_status'] == 1) {
            $data['updated_quotes'] = $this->Modulemodel->getAllQuotes($Vid);
            $data['task_invoices'] = $this->Modulemodel->getTaskInvoices($Vid);
        } else {
            $data['updated_quotes'] = $this->Modulemodel->getUserQuotes($Vid, $user_id);
            $data['task_invoices'] = $this->Modulemodel->getUserInvoices($Vid, $user_id);
        }


        header('Content-Type: application/json');
        echo json_encode($data);
    }

    // added by sujon @ 8/21/16
    public function updateQuoteUnit() {
        try {

            $vlu['type_selected'] = $_POST['status'];

            $this->Modulemodel->updateOneData("crm_currency_units", $vlu, array('type_name' => "Unit", 'type' => "Quote", 'id' => $_POST['did']));

            $data = array();
            $data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Unit", 'type' => "Quote"));

            header('Content-Type: application/json');
            echo json_encode($data);

            //}
        } catch (Exception $e) {
            file_put_contents("8.1.16.txt", $e);
        }
    }

    // added by sujon @ 8/18/16
    public function delQuoteUnit() {
        try {

            $this->Modulemodel->deleteItem("crm_currency_units", array('type_name' => "Unit", 'type' => "Quote", 'id' => $_POST['did']));

            $data = array();
            $data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Unit", 'type' => "Quote"));

            header('Content-Type: application/json');
            echo json_encode($data);

            //}
        } catch (Exception $e) {
            file_put_contents("8.1.16.txt", $e);
        }
    }

    // sujon @ 8/16/16
    public function addQuoteUnitDyn() {

        // $this->Modulemodel->deleteItem("crm_currency_units",array('type_name'=>"Unit",'type'=>"Quote",'type_id'=>$qid));

        $vlu['type'] = "Quote";
        $vlu['type_name'] = "Unit";
        $vlu['type_id'] = $_POST['qid'];
        $vlu['name'] = $_POST['unitname'];
        $vlu['type_selected'] = 1;
        $vlu['type_status'] = $_POST['status'];
        $this->Modulemodel->insertUnitData("crm_currency_units", $vlu);

        $data = array();
        $data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Unit", 'type' => "Quote"));

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    // sujon @ 8/23/16
    public function addAllUnitsPer() {

        $vlu['type_status'] = 1;
        $this->Modulemodel->updateOneData('crm_currency_units', $vlu, array('type_name' => "Unit", 'type' => "Quote"));
    }

    // sujon @ 8/23/16
    public function delTempUnits() {

        $this->Modulemodel->deleteItem("crm_currency_units", array('type_name' => "Unit", 'type' => "Quote", 'type_status' => 0));
    }

    // sujon @ 8/16/16
    public function getQuoteCurrency() {

        $data = array();
        $data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Currency", 'type' => "Quote", 'type_id' => 0));


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
        $vlu['type_selected'] = 0;
        $this->Modulemodel->updateOneData('crm_currency_units', $vlu, array('type_name' => "Unit", 'type' => "Quote"));
    }

    public function getQouteList() {

        $data = array();
        $pid = $_POST['pid'];
        if ($_POST['get_status'] == 1) {

            $data['allQouteList'] = $this->Modulemodel->getAll("crm_quotes", array('pro_id' => $pid));
        } else {

            $data['allQouteList'] = $this->Modulemodel->getAll("crm_quotes", array('pro_id' => $pid, 'creator' => $_POST['user_id']));
        }

        $data['currencyList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Currency", 'type' => "Quote", 'type_id' => 0));
        $data['UnitList'] = $this->Modulemodel->getAll("crm_currency_units", array('type_name' => "Unit", 'type' => "Quote", 'type_selected' => 1, 'type_status' => 1));
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    // sujon @ 8/17/16
    public function convertQuoteCurrency() {

        $amount = 1;
        $from = $_POST['currency_from'];
        $to = $_POST['currency_to'];

        $url = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
        // $data['NewURL']=$url;
        // file_put_contents("googleConverted.txt", $url);
        $datac = file_get_contents($url);

        preg_match("/<span class=bld>(.*)<\/span>/", $datac, $converted);
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

        $data['NewCurrencyValue'] = $converted;
        $data['NewCurrencyName'] = $url;
        file_put_contents("filenameccccc.txt", $url);

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    // sujon @ 9/5/16
    public function uploadInvoiceLogo() {
        if ($_FILES['input_image']['name'] != "") {

            $temp = explode(".", $_FILES["input_image"]["name"]);
            $newimagename = 'inv-logo-' . $_POST['in_eid'] . '.' . end($temp);
            $image_location = "uploads/contactImages/" . $newimagename;
            unlink($image_location);
            move_uploaded_file($_FILES["input_image"]["tmp_name"], $image_location);
        }
    }

    public function userListTag() {

        $Vid = $this->input->post('taskID');
        $projectID = $this->input->post('projectID');
        $type = $this->input->post('type');

        $data = array();

        $data['tasktag'] = $this->Modulemodel->getAll("crm_taskTag", array('task_id' => $Vid));
        $data['tag'] = $this->Modulemodel->getAllTag($projectID, $type, $Vid);
        $data['tagFollow'] = $this->Modulemodel->getAllFollow($projectID, 'task', $Vid);

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function updateTask() {

        if (isset($_POST['taskID'])) {
            $this->load->helper('date');

            $date = date('Y-m-d H:i:s');

            $sessionData = $this->session->userdata('yeezyCRM');

            $data['acessType'] = $sessionData['accessType'];
            $data['id'] = $sessionData['user_id'];
            $data['org_id'] = $sessionData['org_id'];
            $url = "/yzy-projects/index/newPro/" . $_POST['taskListID'] . "/" . $_POST['projecteid'];

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

            if ($_POST["this_type"] == "task") {
                $table = 'crm_projecttask';
                $type = 'task';
            } elseif ($_POST["this_type"] == "Subtask") {
                $table = 'crm_projectSubTask';
                $type = 'Subtask';
            }


            $this->Modulemodel->updateOneData($table, $vlu, array('projecttaskid' => $_POST["taskID"]));




            if (isset($_POST['assignto']) && $_POST['assignto'] != "") {
                $ul = $this->Modulemodel->findInviteUser($_POST['projecteid'], $_POST['taskID'], 0);
                if ($ul !== FALSE) {
                    foreach ($ul as $k => $v) {
                        if (array_search($v->userteamid, $_POST["assignto"]) === FALSE) {
                            if ($this->sendEmail($v->email, $_POST["tasknametitle"]) === 'done')
                                echo "Successfully";
                            // file_put_contents("filenameassignto.txt", $v->email);
                        } else
                            echo "error";
                        // file_put_contents("errorfilenameassignto.txt", $k);
                    }
                }

                // To access this task, share the project autometically 
                $this->Modulemodel->deleteItem("crm_tag", array('type' => "project", 'relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'user_status' => 0));

                $this->Modulemodel->deleteItem("crm_tag", array('type' => $type, 'relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'user_status' => 0));
                foreach ($_POST['assignto'] as $key => $value) {
                    $inputdata1[] = array('type' => $type, 'relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'idtype' => 'userid', 'userteamid' => $value, 'user_status' => 0);
                    $inputdata1[] = array('type' => "project", 'relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'idtype' => 'userid', 'userteamid' => $value, 'user_status' => 0);
                }
                $this->Modulemodel->insertbatchinto("crm_tag", $inputdata1);
            }

            if (isset($_POST['member']) && $_POST['member'] != "") {
                $ul = $this->Modulemodel->findInviteUser($_POST['projecteid'], $_POST['taskID'], 1);
                if ($ul !== FALSE) {
                    foreach ($ul as $k => $v) {
                        if (array_search($v->userteamid, $_POST["member"]) === FALSE) {
                            //if($this->sendEmail($v->email, $_POST["tasknametitle"]) === 'done')
                            echo "Successfully";
                            // file_put_contents("filename.txt", $v->email);
                        } else
                            echo "error";
                        // file_put_contents("errorfilename.txt", $k);
                    }
                }

                // To access this task, share the project autometically 
                $this->Modulemodel->deleteItem("crm_tag", array('relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'type' => "project", 'user_status' => 1));

                $this->Modulemodel->deleteItem("crm_tag", array('relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'type' => $type, 'user_status' => 1));
                foreach ($_POST['member'] as $key => $value) {
                    $inputdata2[] = array('type' => $type, 'relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'idtype' => 'userid', 'userteamid' => $value, 'user_status' => 1);
                    $inputdata2[] = array('type' => "project", 'relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'idtype' => 'userid', 'userteamid' => $value, 'user_status' => 1);
                }
                $this->Modulemodel->insertbatchinto("crm_tag", $inputdata2);
            }

            if (isset($_POST['followers']) && $_POST['followers'] != "") {
                $this->Modulemodel->deleteItem("crm_taskfollower", array('relateTask' => $this->input->post('taskID'), 'type' => $type));
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

            if (isset($_POST['tag']) && $_POST['tag'] != "") {
                $this->Modulemodel->deleteItem("crm_taskTag", array('task_id' => $this->input->post('taskID')));
                if (isset($_POST['tag']) && $_POST['tag'] != "") {
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

            if ((isset($_POST['member']) && $_POST['member'] != "") || (isset($_POST['assignto']) && $_POST['assignto'] != "")) {

                $this->Modulemodel->deleteItem("crm_notification", array('type' => $type, 'type_id' => $this->input->post('projecteid'), 'relatedTo' => $this->input->post('taskID')));

                $margeForNotify = array_merge($_POST['assignto'], $_POST['member']);

                $body = "You are tagged in Task. Task Name: " . $vlu['projecttaskname'];

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
        } else {
            redirect($url, 'refresh');
        }
    }

    public function updateProjectDate() {

        $sessionData = $this->session->userdata('yeezyCRM');

        $data = array();

        $data['id'] = $sessionData['user_id'];
        $data['org_id'] = $sessionData['org_id'];
        
        $vlu['Startdate'] = $this->input->post("startdate");
        $vlu['Enddate'] = $this->input->post("enddate");

        $parentenddate = date('Y-m-d', strtotime($this->input->post("startdate")));
        $taskenddate = date('Y-m-d', strtotime($this->input->post("enddate")));
        $data['vlu'] = $vlu;
        $row = $this->db->query("SELECT MAX(id) AS `maxid` FROM `crm_updateStatus` WHERE `typeID` = '" . $this->input->post("TypeID") . "'")->row();
        if ($row) {
            $maxid = $row->maxid;
        }

        if (strtotime($parentenddate) <= strtotime($taskenddate)) {
            $data['msg'] = $this->Modulemodel->updateOneData('crm_activity', $vlu, array('Id' => $this->input->post("TypeID")));

            $title = $this->db->select("Title,HasParentId,Type")->get_where("crm_activity", array("Id" => $_POST["TypeID"]))->result();
                
            $inputnot = array(
                'type' => $title[0]->Type."Datechange",
                'type_id' => $this->input->post('TypeID'),
                'relatedTo' => $title[0]->HasParentId,
                'org_id' => $data['org_id'],
                'user_id' => $data['id'],
                'notification_for' => '1',
                'status' => '0',
                'title' => $title[0]->Title,
                'body' => $_POST["startdate"]." to ".$taskenddate,
                'replay_msg' => '',
                'createdby' => $data['id']
            );

            $this->Modulemodel->insertData("crm_notification", $inputnot);

            $data['tag'] = $this->Modulemodel->getAlltagforproject($this->input->post('TypeID'));

            if (count($data['tag']) > 0) {

                foreach ($data['tag'] as $key => $value) {
                    array_push($TagArray, $value->userid);
                }

                array_push($TagArray, $this->Modulemodel->get_created_by_id('crm_activity', $this->input->post('TypeID')));

                foreach ($TagArray as $key => $value) {

                    if ($value == $data['id']) {
                        //do nothing
                    } else {
                        $temp_tbl[] = array(
                            'parent' => $this->input->post('TypeID'),
                            'parentType' => $title[0]->Type."Datechange",
                            'typeid' => $title[0]->HasParentId,
                            'userid' => $value
                        );
                    }
                }

                $this->Modulemodel->insertbatchinto("crm_temp_tbl", $temp_tbl);
            }


            $vluStory['name'] = $sessionData['username'];
            $vluStory['action'] = 'changed start date:' . $vlu['Startdate'] . ' and end date: ' . $vlu['Enddate'];
            $vluStory['detail'] = '';
            $vluStory['parentid'] = $maxid;
            $vluStory['typeid'] = $this->input->post("TypeID");
            $data['aa'] = $this->calendarmodel->insertData("crm_story", $vluStory);
        } else {
            $data['msg'] = "TIMELESS";
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function updateTaskDate() {

        if (isset($_POST['taskID'])) {
            $sessionData = $this->session->userdata('yeezyCRM');
            
            $data = array();
            $TagArray = array();
            $data['id'] = $sessionData['user_id'];
            $data['org_id'] = $sessionData['org_id'];

           

            $vlu['Startdate'] = $_POST["startdate"];
            $vlu['Enddate'] = $_POST["enddate"];

            $TaskparentID = $this->db
                            ->get_where('crm_activity', array('Id' => $_POST["taskID"]))
                            ->row()->HasParentId;

            if ($_POST['this_type'] == 'todo') {
                $Enddate = $this->db
                                ->get_where('crm_activity', array('Id' => $_POST["taskID"]))
                                ->row()->Startdate;
            } else {
                $Enddate = $this->db
                                ->get_where('crm_activity', array('Id' => $TaskparentID))
                                ->row()->Startdate;
            }

            $parentenddate = date('Y-m-d', strtotime($Enddate));
            $taskenddate = date('Y-m-d', strtotime($_POST["enddate"]));

            if (strtotime($parentenddate) <= strtotime($taskenddate)) {
                $data['msg'] = $this->Modulemodel->updateOneData('crm_activity', $vlu, array('Id' => $_POST["taskID"]));

                $title = $this->db->select("Title,HasParentId,Type")->get_where("crm_activity", array("Id" => $_POST["taskID"]))->result();
                
                $inputnot = array(
                    'type' => $title[0]->Type."Datechange",
                    'type_id' => $this->input->post('taskID'),
                    'relatedTo' => $title[0]->HasParentId,
                    'org_id' => $data['org_id'],
                    'user_id' => $data['id'],
                    'notification_for' => '1',
                    'status' => '0',
                    'title' => $title[0]->Title,
                    'body' => $_POST["startdate"]." to ".$taskenddate,
                    'replay_msg' => '',
                    'createdby' => $data['id']
                );

                $this->Modulemodel->insertData("crm_notification", $inputnot);

                $data['tag'] = $this->Modulemodel->getAlltagforproject($this->input->post('taskID'));

                if (count($data['tag']) > 0) {

                    foreach ($data['tag'] as $key => $value) {
                        array_push($TagArray, $value->userid);
                    }

                    array_push($TagArray, $this->Modulemodel->get_created_by_id('crm_activity', $this->input->post('taskID')));

                    foreach ($TagArray as $key => $value) {

                        if ($value == $data['id']) {
                            //do nothing
                        } else {
                            $temp_tbl[] = array(
                                'parent' => $this->input->post('taskID'),
                                'parentType' => $title[0]->Type."Datechange",
                                'typeid' => $title[0]->HasParentId,
                                'userid' => $value
                            );
                        }
                    }

                    $this->Modulemodel->insertbatchinto("crm_temp_tbl", $temp_tbl);
                }




            } else {
                $data['msg'] = "TIMELESS";
            }
            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }

    public function updateTaskhr() {

        if (isset($_POST['taskID'])) {

            $sessionData = $this->session->userdata('yeezyCRM');
            
            $data = array();
            $data['id'] = $sessionData['user_id'];
            $data['org_id'] = $sessionData['org_id'];
            
            $TagArray = array();

            $vlu['hour'] = $_POST["valu"];

            if ($_POST["type"] == 'task') {

                $this->db->select('SUM(hour) as tHour');
                $this->db->where('HasParentId', $_POST["taskID"]);
                $q = $this->db->get('crm_activity');
                $row = $q->row();
                $score = $row->tHour;

                if ($score > $vlu['hour']) {
                    $data['msg'] = "TIMELESS";
                } else {
                    
                    $data['msg'] = $this->Modulemodel->updateOneData('crm_activity', $vlu, array('Id' => $_POST["taskID"]));

                    $title = $this->db->select("Title,HasParentId,Type")->get_where("crm_activity", array("Id" => $_POST["taskID"]))->result();
                
                    $inputnot = array(
                        'type' => $title[0]->Type."Hourchange",
                        'type_id' => $this->input->post('taskID'),
                        'relatedTo' => $title[0]->HasParentId,
                        'org_id' => $data['org_id'],
                        'user_id' => $data['id'],
                        'notification_for' => '1',
                        'status' => '0',
                        'title' => $title[0]->Title,
                        'body' => $_POST["valu"],
                        'replay_msg' => '',
                        'createdby' => $data['id']
                    );


                    $this->Modulemodel->insertData("crm_notification", $inputnot);

                    $data['tag'] = $this->Modulemodel->getAlltagforproject($this->input->post('taskID'));

                    if (count($data['tag']) > 0) {

                        foreach ($data['tag'] as $key => $value) {
                            array_push($TagArray, $value->userid);
                        }

                        array_push($TagArray, $this->Modulemodel->get_created_by_id('crm_activity', $this->input->post('taskID')));

                        foreach ($TagArray as $key => $value) {

                            if ($value == $data['id']) {
                                //do nothing
                            } else {
                                $temp_tbl[] = array(
                                    'parent' => $this->input->post('taskID'),
                                    'parentType' => $title[0]->Type."Hourchange",
                                    'typeid' => $title[0]->HasParentId,
                                    'userid' => $value
                                );
                            }
                        }

                        $this->Modulemodel->insertbatchinto("crm_temp_tbl", $temp_tbl);
                    }
                }
            } else {

                $TaskparentID = $this->db
                                ->get_where('crm_activity', array('Id' => $_POST["taskID"]))
                                ->row()->HasParentId;


                $this->db->select('SUM(hour) as tHour');
                $array = array('ID !=' => $_POST["taskID"], 'HasParentId = ' => $TaskparentID);
                $this->db->where($array);
                $q = $this->db->get('crm_activity');
                $row = $q->row();

                $score = $row->tHour;
                $newTotal = $score + $vlu['hour'];

                // $taskHour = $this-> db
                // 				 -> get_where('crm_activity',array('Id'=>$TaskparentID))
                // 				 -> row()->hour;

                $data['msg1'] = $this->Modulemodel->updateOneData('crm_activity', array('hour' => $newTotal), array('Id' => $TaskparentID));
                $data['msg'] = $this->Modulemodel->updateOneData('crm_activity', $vlu, array('Id' => $_POST["taskID"]));
            }


            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }

    public function updateTaskNoDueDate() {

        if (isset($_POST['taskID'])) {

            $data = array();

            $vlu['Enddate'] = $_POST["enddate"];

            $data['msg'] = $this->Modulemodel->updateOneData('crm_activity', $vlu, array('Id' => $_POST["taskID"]));

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
            $file_size = round($_FILES["fileinput"]["size"][$key] / 1024, 2);
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

        $getTaskDetail = $this->Modulemodel->selectOneData("crm_projecttask", array('projecttaskid' => $_POST["taskid2"], 'this_type' => 'task'));

        $getAllFornotification = $this->Modulemodel->getAllUserFromNoti($_POST["taskid2"], $_POST["proID"]);

        $body = "New file uploaded on task: " . $getTaskDetail[0]->projecttaskname;

        if (!empty($getAllFornotification)) {
            $this->Modulemodel->deleteItem("crm_notification", array('type' => 'comment', 'type_id' => $_POST["proID"], 'relatedTo' => $_POST["taskid2"]));
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
        $projectID = $_POST["projectID"];
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
        $getTaskDetail = $this->Modulemodel->selectOneData("crm_projecttask", array('projecttaskid' => $_POST["taskId"], 'this_type' => 'task'));

        $getAllFornotification = $this->Modulemodel->getAllUserFromNoti($_POST["taskId"], $projectID);

        $body = "New comment on task: " . $getTaskDetail[0]->projecttaskname;

        if (!empty($getAllFornotification)) {
            $this->Modulemodel->deleteItem("crm_notification", array('type' => 'comment', 'type_id' => $projectID, 'relatedTo' => $_POST["taskId"]));
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

            $body = "<br><br><b>Task Name: " . $getTaskDetail[0]->projecttaskname . "</b> has new comment. Please check if any is your concern.";
            $body .= "<br><b>Project ID:</b> " . $projectID;
            $body .= "<br><b>Task Name:</b> " . $getTaskDetail[0]->projecttaskname;
            $body .= "<br><b>Comment:</b> " . $_POST["comment"];

            $listOfTag = $this->Modulemodel->getAllTag($projectID, "task", $_POST['taskId']);
            $body .= "<br><b>Supervisor:</b>";
            $nameemail = "";
            foreach ($listOfTag as $k => $v) {
                if ($v->user_status == 0)
                    $nameemail .= $v->full_name . " (" . $v->email . ") <br>";
            }
            $body .= $nameemail;

            $body .= "<br><b>Members:</b>";
            $nameemail = "";
            foreach ($listOfTag as $k => $v) {
                if ($v->user_status == 1)
                    $nameemail .= $v->full_name . " (" . $v->email . ") <br>";
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

    public function getTaskList() {

        $tagArray = array();
        $id = $_POST['projectid'];
        $tagArray['docList'] = $this->Modulemodel->getAllDocList($id);

        $tagArray['nty_chat'] = $this->db->query("SELECT COUNT(Id) FROM crm_tagHD WHERE ( type = 'Task' OR type = 'Todo' ) AND RelatedTo = '" . $id . "'")->result_array();
        ;
        $tagArray['taskList'] = $this->Modulemodel->getAll("crm_tasklist", array('related_to' => $id), 'enddate');


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

    public function updateTasklist() {
        $proArray = array();
        $project_ID = $_POST["pid"];
        $taskListName = $_POST["tasklistName"];
        $taskinput = $_POST["inputDiv"];

        $proArray['update'] = $this->Modulemodel->updateOneData("crm_tasklist", array('name' => $taskListName), array('related_to' => $project_ID, 'inputDiv' => $taskinput));

        header('Content-Type: application/json');
        echo json_encode($proArray);
    }

    public function saveTaskList() {
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

        if ($_POST["pAssign"] != "N" && $_POST["assigntype"] != "N") {
            if ($_POST["assigntype"] == "U") {
                $assign['userteamid'] = $_POST["pAssign"];
                $assign['idtype'] = "userid";
            } elseif ($_POST["assigntype"] == "T") {
                $assign['userteamid'] = $_POST["pAssign"];
                $assign['idtype'] = "teamid";
            }
            if ($tagArray['insertID'] > 0) {
                $assign["relatedto"] = $tagArray['insertID'];
                $this->Modulemodel->insertData("crm_taskList_tag", $assign);
            }
        }




        header('Content-Type: application/json');
        echo json_encode($tagArray);
    }

    public function deleteReply() {
        $array = array();

        if ($this->input->post('table') == 'file') {
            $cusTbl = 'modcomments';
            $this->Modulemodel->deleteItem('crm_file', array('id' => $this->input->post('id')));
        } else {
            $cusTbl = $this->input->post('table');
        }

        $table = 'crm_' . $cusTbl;

        if ($this->Modulemodel->deleteItem($table, array('id' => $this->input->post('commentid')))) {
            $array['dltmsg'] = "DONE";
        } else {
            $array['dltmsg'] = "FAIL";
        }

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function updateReply() {
        $array = array();
        $string = $this->input->post('val');
        $str = preg_replace('/(<br>)+$/', '', $string);
        if ($this->Modulemodel->updateOneData("crm_" . $this->input->post('table'), array('comment' => $str), array('id' => $this->input->post('id'))) > 0) {
            $array['msg'] = "DONE";
        } else {
            $array['msg'] = "FAIL";
        }

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function movetask() {
        $data = array();
        $taskid = $_POST["taskid"];

        $old_pid = $_POST["old_pid"]; // no need
        $old_tlid = $_POST["old_tlid"]; // no need

        $new_pid = $_POST["new_pid"];
        $new_tlid = $_POST["new_tlid"];



        if ($this->Modulemodel->updateOneData("crm_projecttask", array('projectid' => $new_pid, 'projecttaskcode' => $new_tlid, 'tasklistID' => $new_tlid), array('projecttaskid' => $taskid)))
            if ($this->Modulemodel->updateOneData("crm_tag", array('relatedto' => $new_pid), array('relateTask' => $taskid))) {
                $data['msg'] = "Success";
                header('Content-Type: application/json');
                echo json_encode($data);
            }
    }

    // save subtask by sujon
    public function saveSubTaskNew() {
        if ($this->session->userdata('yeezyCRM')) {

            $ara = array();
            $sessionData = $this->session->userdata('yeezyCRM');

            $data['acessType'] = $sessionData['accessType'];
            $data['id'] = $sessionData['user_id'];
            $data['username'] = $sessionData['username'];
            $data['org_id'] = $sessionData['org_id'];
            $date = date('Y-m-d H:i:s');

            $createdBY = 'CreatedBy';
            $Taskparent = 'HasParentId';

            $TaskparentID = $this->db
                            ->get_where('crm_activity', array('Id' => $_POST["taskId"]))
                            ->row()->$Taskparent;

            $ara["TaskparentID"] = $TaskparentID;

            $creator = $this->db
                            ->get_where('crm_activity', array('Id' => $TaskparentID))
                            ->row()->$createdBY;

            $this->db->select('SUM(hour) as tHour');
            $this->db->where('HasParentId', $_POST["taskId"]);
            $q = $this->db->get('crm_activity');
            $row = $q->row();
            $score = $row->tHour;

            $taskHour = $this->db
                            ->get_where('crm_activity', array('Id' => $_POST["taskId"]))
                            ->row()->hour;

            $ara["score"] = $score;
            $ara["taskHour"] = $taskHour;

            $hour = $taskHour - $score;

            $inputdata = array(
                "Type" => 'SubTask',
                "Title" => $_POST["taskName"],
                "Description" => "",
                "Startdate" => '0000-00-00 00:00:00',
                "Enddate" => '0000-00-00 00:00:00',
                "Duration" => '1',
                "hour" => $hour,
                "Status" => 'none',
                "CreatedBy" => $data['id'],
                "CreatedDate" => $date,
                "HasGroup" => '',
                "HasClient" => '',
                "HasParentId" => $_POST["taskId"],
                "Workspaces" => $data['org_id']
            );

            $this->Modulemodel->updateOneData("crm_activity", array('Status' => 'in progress'), array('Id' => $_POST["taskId"]));

            $ara["insertID"] = $this->Modulemodel->insertData("crm_activity", $inputdata);

            $ara['allAdmin'] = $this->Modulemodel->getAllprojectAdmin($_POST["taskId"], $creator);




            $ara["creator"] = $creator;

            if ($creator[0] !== $data['id']) {
                $inputcreator = array(
                    'RelatedTo' => $ara["insertID"],
                    'UserStatus' => '1',
                    'TagDate' => $date,
                    'Type' => 'SubTask',
                    'userid' => $creator
                );

                $this->Modulemodel->insertData("crm_tagHD", $inputcreator);
            }

            if (COUNT($ara['allAdmin']) > 0) {
                foreach ($ara['allAdmin'] as $key => $value) {
                    $inputHDdata[] = array(
                        'RelatedTo' => $ara["insertID"],
                        'UserStatus' => '1',
                        'TagDate' => $date,
                        'Type' => 'SubTask',
                        'userid' => $value->userid
                    );
                }

                $this->Modulemodel->insertbatchinto("crm_tagHD", $inputHDdata);
            }

            $ara["projecttaskid"] = $ara["insertID"];
            $ara["Id"] = $ara["insertID"];
            $ara["Title"] = $_POST["taskName"];
            $ara["Startdate"] = $date;
            $ara["Enddate"] = $date;
            $ara["Duration"] = '1';
            $ara["Status"] = 'none';
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
    public function subtaskDetail() {

        $Vid = $this->input->post('taskID');
        $projectID = $this->input->post('projectID');
        $taskLsitID = $this->input->post('taskLsitID');
        $result = substr($taskLsitID, 0, -3);

        $taskType = $this->input->post('taskType');
        $type = $this->input->post('type');

        $data = array();

        if ($taskType == 'UnCat') {
            $data['dataList'] = $this->Modulemodel->getUnCatSubTaskDetails($Vid);
        } else {
            $data['dataList'] = $this->Modulemodel->getSubTaskDetails($Vid);
        }

        $data['docList'] = $this->Modulemodel->getDocList($Vid);
        //$data['tagList'] = $this ->  Categorymodel -> getTagMembers($post_id);
        $data['commentList'] = $this->Modulemodel->getComment($Vid, $type);
        $data['feedbackList'] = $this->Modulemodel->getFeedback($Vid);
        $data['tasklistName'] = $this->Modulemodel->getAll("crm_tasklist", array('inputDiv' => $taskLsitID));
        $data['tasktag'] = $this->Modulemodel->getAll("crm_taskTag", array('task_id' => $Vid));
        $data['tag'] = $this->Modulemodel->getAllTag($projectID, 'Subtask', $Vid);
        $data['tagFollow'] = $this->Modulemodel->getAllFollow($projectID, 'Subtask', $Vid);
        //$data['filelist'] =  $this->Taskmodel->getFileList($Vid);
        //data['postCreator'] = $this -> Categorymodel -> postCreator($post_id);

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function updateSubTask() {

        if (isset($_POST['taskID'])) {
            $this->load->helper('date');

            $date = date('Y-m-d H:i:s');

            $sessionData = $this->session->userdata('yeezyCRM');

            $data['acessType'] = $sessionData['accessType'];
            $data['id'] = $sessionData['user_id'];
            $data['org_id'] = $sessionData['org_id'];
            $url = "/yzy-projects/index/newPro/" . $_POST['taskListID'] . "/" . $_POST['projecteid'];

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

            if ($_POST["this_type"] == "task") {
                $table = 'crm_projecttask';
                $type = 'task';
            } elseif ($_POST["this_type"] == "Subtask") {
                $table = 'crm_projectSubTask';
                $type = 'Subtask';
            }


            $this->Modulemodel->updateOneData($table, $vlu, array('projecttaskid' => $_POST["taskID"]));




            if (isset($_POST['assignto']) && $_POST['assignto'] != "") {
                $ul = $this->Modulemodel->findInviteUser($_POST['projecteid'], $_POST['taskID'], 0);
                if ($ul !== FALSE) {
                    foreach ($ul as $k => $v) {
                        if (array_search($v->userteamid, $_POST["assignto"]) === FALSE) {
                            if ($this->sendEmail($v->email, $_POST["tasknametitle"]) === 'done')
                                echo "Successfully";
                            // file_put_contents("filenameassignto.txt", $v->email);
                        } else
                            echo "error";
                        // file_put_contents("errorfilenameassignto.txt", $k);
                    }
                }

                // To access this task, share the project autometically 
                $this->Modulemodel->deleteItem("crm_tag", array('type' => "project", 'relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'user_status' => 0));

                $this->Modulemodel->deleteItem("crm_tag", array('type' => $type, 'relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'user_status' => 0));
                foreach ($_POST['assignto'] as $key => $value) {
                    $inputdata1[] = array('type' => $type, 'relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'idtype' => 'userid', 'userteamid' => $value, 'user_status' => 0);
                    $inputdata1[] = array('type' => "project", 'relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'idtype' => 'userid', 'userteamid' => $value, 'user_status' => 0);
                }
                $this->Modulemodel->insertbatchinto("crm_tag", $inputdata1);
            }

            if (isset($_POST['member']) && $_POST['member'] != "") {
                $ul = $this->Modulemodel->findInviteUser($_POST['projecteid'], $_POST['taskID'], 1);
                if ($ul !== FALSE) {
                    foreach ($ul as $k => $v) {
                        if (array_search($v->userteamid, $_POST["member"]) === FALSE) {
                            if ($this->sendEmail($v->email, $_POST["tasknametitle"]) === 'done')
                                echo "Successfully";
                            // file_put_contents("filename.txt", $v->email);
                        } else
                            echo "error";
                        // file_put_contents("errorfilename.txt", $k);
                    }
                }

                // To access this task, share the project autometically 
                $this->Modulemodel->deleteItem("crm_tag", array('relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'type' => "project", 'user_status' => 1));

                $this->Modulemodel->deleteItem("crm_tag", array('relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'type' => $type, 'user_status' => 1));
                foreach ($_POST['member'] as $key => $value) {
                    $inputdata2[] = array('type' => $type, 'relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'idtype' => 'userid', 'userteamid' => $value, 'user_status' => 1);
                    $inputdata2[] = array('type' => "project", 'relatedto' => $this->input->post('projecteid'), 'relateTask' => $this->input->post('taskID'), 'idtype' => 'userid', 'userteamid' => $value, 'user_status' => 1);
                }
                $this->Modulemodel->insertbatchinto("crm_tag", $inputdata2);
            }

            if (isset($_POST['followers']) && $_POST['followers'] != "") {
                $this->Modulemodel->deleteItem("crm_taskfollower", array('relateTask' => $this->input->post('taskID'), 'type' => $type));
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

            if (isset($_POST['tag']) && $_POST['tag'] != "") {
                $this->Modulemodel->deleteItem("crm_taskTag", array('task_id' => $this->input->post('taskID')));
                if (isset($_POST['tag']) && $_POST['tag'] != "") {
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

            if ((isset($_POST['member']) && $_POST['member'] != "") || (isset($_POST['assignto']) && $_POST['assignto'] != "")) {
                $this->Modulemodel->deleteItem("crm_notification", array('type' => $type, 'type_id' => $this->input->post('projecteid'), 'relatedTo' => $this->input->post('taskID')));
                $margeForNotify = array_merge($_POST['assignto'], $_POST['member']);

                $body = "You are tagged in Task. Task Name: " . $vlu['projecttaskname'];
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
        } else {
            redirect($url, 'refresh');
        }
    }

    public function getFileList() {

        $data = array();
        $pid = $_POST['pid'];
        $data['allFileList'] = $this->Modulemodel->getAll("crm_file", array('proID' => $pid));
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function TaskMakeComplete() {

        $data = array();

        $taskID = $this->input->post('tid');
        $type = $this->input->post('type');
        $sessionData = $this->session->userdata('yeezyCRM');

        if ($this->Modulemodel->updateOneData("crm_activity", array('Status' => $type), array('Id' => $taskID)) === TRUE) {
            $data['msg'] = "Done";
        } else {
            $data['msg'] = "Fail";
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function TaskMakeCompleteWS() {

        $data = array();

        $taskID = $this->input->post('tid');
        $type = $this->input->post('type');
        $sessionData = $this->session->userdata('yeezyCRM');

        if ($this->Modulemodel->updateOneData("crm_activity", array('Status' => $type), array('Id' => $taskID)) === TRUE) {
            $data['msg'] = "Done";
        } else {
            $data['msg'] = "Fail";
        }

        $maxid = 0;
        $row = $this->db->query("SELECT MAX(id) AS `maxid` FROM `crm_updateStatus` WHERE `typeID` = '" . $taskID . "'")->row();
        if ($row) {
            $maxid = $row->maxid;
        }

        $vlu['name'] = $sessionData['username'];
        $vlu['action'] = 'marked as "' . $type . '"';
        $vlu['detail'] = '';
        $vlu['parentid'] = $maxid;
        $vlu['typeid'] = $taskID;

        $data['aa'] = $this->calendarmodel->insertData("crm_story", $vlu);

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function SubTaskMakeComplete() {

        $data = array();

        $taskID = $this->input->post('tid');
        $type = $this->input->post('type');
        $sessionData = $this->session->userdata('yeezyCRM');

        if ($this->Modulemodel->updateOneData("crm_activity", array('Status' => $type), array('HasParentId' => $taskID)) === TRUE) {
            $data['msg'] = "Done";
        } else {
            $data['msg'] = "Fail";
        }



        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getNotificationStatusAll() {
        $array = array();
        $projectArray = array();

        $sessionData = $this->session->userdata('yeezyCRM');

        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['org_id'] = $sessionData['org_id'];
        $data['user_email'] = $sessionData['user_email'];

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
        $array['changedDateListP'] = array();
        $array['changedDateListT'] = array();
        $array['TaskHourchange'] = array();
        $array['ProjectAttachment'] = array();
        $array['TaskAttachment'] = array();
        $array['getAllChatMsg'] = array();
        $array['getAllStatusUpdate'] = array();

        $array['projects'] = $this->Modulemodel->getAllprojects($data['org_id'], $data['id']);

        foreach ($array['projects'] as $key => $value) {

            $getAllTypeList = $this->Modulemodel->allNotifList(1, $value->Id, 'Project');
            $changedDateListP = $this->Modulemodel->allNotifList(1, $value->Id, 'ProjectDatechange');
            $commentList1 = $this->Modulemodel->allNotifList(1, $value->Id, 'ProjectCmnt');
            $ProjectAttachment = $this->Modulemodel->allNotifList(1, $value->Id, 'ProjectAttachment');
            $getAllStatusUpdate = $this->Modulemodel->allNotifList(1, $value->Id, 'ProjectCmntStatusUpdate');
            
            array_push($array['getAllTypeList'], $getAllTypeList);
            array_push($array['changedDateListP'], $changedDateListP);
            array_push($array['commentList'], $commentList1);
            array_push($array['ProjectAttachment'], $ProjectAttachment);
            array_push($array['getAllStatusUpdate'], $getAllStatusUpdate);

            $array['allTask'] = $this->Modulemodel->getAllprojectTasks($data['org_id'], $data['id'], $value->Id, 'DESC');

            foreach ($array['allTask'] as $k => $v) {
                $getAllTypeTask = $this->Modulemodel->allNotifList(1, $v->Id, 'Task');
                $commentList2 = $this->Modulemodel->allNotifList(1, $v->Id, 'TaskCmnt');
                $changedDateListT = $this->Modulemodel->allNotifList(1, $v->Id, 'TaskDatechange');
                $TaskHourchange = $this->Modulemodel->allNotifList(1, $v->Id, 'TaskHourchange');
                $TaskAttachment = $this->Modulemodel->allNotifList(1, $v->Id, 'TaskAttachment');
                //$commentList3 = $this->Modulemodel->allNotifList(1,$v->Id,'Todo');
                array_push($array['getAllTypeTask'], $getAllTypeTask);
                array_push($array['changedDateListT'], $changedDateListT);
                array_push($array['commentList'], $commentList2);
                array_push($array['TaskHourchange'], $TaskHourchange);
                array_push($array['TaskAttachment'], $TaskAttachment);
            }
        }

        $array['getAllProjectUnTag'] = $this->Modulemodel->getAll("crm_notification", array('user_id' => $data['id'], 'type' => 'ProjectTagRemove', 'org_id' => $data['org_id'], 'notification_for' => '1'));
        $array['getAllProjectTag'] = $this->Modulemodel->getAll("crm_notification", array('user_id' => $data['id'], 'type' => 'ProjectTagAss', 'org_id' => $data['org_id'], 'notification_for' => '1'));

        $array['getAllTaskTag'] = $this->Modulemodel->getAll("crm_notification", array('user_id' => $data[
            'id'], 'type' => 'TaskTagAss', 'org_id' => $data['org_id'], 'notification_for' => '1'));
        $array['getAllTaskUnTag'] = $this->Modulemodel->getAll("crm_notification", array('user_id' => $data['id'], 'type' => 'TaskTagRemove', 'org_id' => $data['org_id'], 'notification_for' => '1'));


        $array['getAllTodoTag'] = $this->Modulemodel->getAll("crm_notification", array('user_id' => $data['id'], 'type' => 'TodoTagAss', 'org_id' => $data['org_id'], 'notification_for' => '1'));
        $array['getAllTodoUnTag'] = $this->Modulemodel->getAll("crm_notification", array('user_id' => $data['id'], 'type' => 'TodoTagRemove', 'org_id' => $data['org_id'], 'notification_for' => '1'));
        $array['getUnreadNot'] = $this->db->select("parent,typeid")->get_where("crm_temp_tbl", array("userid" => $data['id']))->result();
        $array['getTotalNot'] = $this->db->where('userid',$data['id'])
                                         ->where('parentType !=', 'chatMsg')
                                         ->count_all_results('crm_temp_tbl');

        $array['getTotalChat'] = $this->db->where('userid',$data['id'])
                                         ->where('parentType', 'chatMsg')
                                         ->count_all_results('crm_temp_tbl');

        // $array['getAllChatMsg'] = $this->Modulemodel->getAll("crm_notification",array('user_id'=>$data['id'],'type'=>'chatMsg','org_id'=>$data['org_id'], 'notification_for'=>'1'));



        $allChtmsg = $this->db->where('type', 'chatMsg')
                ->where('org_id', $data['org_id'])
                ->where('notification_for', '1')
                ->where('user_id', $data['id'])
                ->where('org_id', $data['org_id'])
                ->or_where("user_id >", 1400000000)
                ->or_where("user_id >", 99999999)
                ->get("crm_notification")
                ->result();
        
        $where = "(FIND_IN_SET('".$data['user_email']."', `group_member`) OR createdby = '".$data['user_email']."')";
        $this->db->where($where);

        $gcontacts = $this->db->get("crm_message_group")->result();
        $array['gcontacts'] = $gcontacts;
        $array['allChtmsg'] = $allChtmsg;
        foreach($allChtmsg as $v):
            foreach($gcontacts as $ck=>$cv):
                if($cv->group_id === $v->user_id ){
                    array_push($array['getAllChatMsg'], $v);  
                }

            endforeach;

            if($v->user_id === $data['id']){
                array_push($array['getAllChatMsg'], $v);  
            }
        endforeach;
        
        // file_put_contents("temp/filename2841.txt", $allChatMsg);
        $array['getAllNotListLastday'] = $this->Modulemodel->getAllNotListAll(1, $data['id']);

        $array['getAlltodo'] = $this->Modulemodel->getAlltodo($data['org_id'], $data['id']);

        foreach ($array['getAlltodo'] as $key => $value) {
            $commentList3 = $this->Modulemodel->allNotifList(1, $value->Id, 'Todo');
            array_push($array['commentList'], $commentList3);
        }

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function saveProjectSet() {
        $array = array();
        $projectArray = array();
        $sessionData = $this->session->userdata('yeezyCRM');

        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['org_id'] = $sessionData['org_id'];
        $username = $data['username'] = $sessionData['username'];

        $currrentDate = date('Y-m-d H:i:s');
        $parentID = $this->input->post('parentid');
        $creatorid = $this->input->post('creatorid');
        $projectname = 'Title';

        $Title = $this->db
                        ->get_where('crm_activity', array('Id' => $parentID))
                        ->row()->$projectname;

        $inputdata = array(
            "Type" => 'Project',
            "Title" => $Title,
            "Description" => $this->input->post('projectDescription'),
            "Startdate" => $this->input->post('projectStartdate'),
            "Enddate" => $this->input->post('projectEnddate'),
            "Duration" => $this->input->post('projectDuration'),
            "Status" => $this->input->post('projectStatus'),
            //"CreatedBy" => $data['id'],
            "CreatedDate" => $currrentDate,
            "HasGroup" => $this->input->post('projectGroup'),
            "HasClient" => $this->input->post('projectCLient'),
                //"HasParentId" => $parentID
        );


        //$array['newid'] = $this->Modulemodel->insertData("crm_activity", $inputdata);

        if ($this->Modulemodel->updateOneData('crm_activity', $inputdata, array('Id' => $parentID))) {
            $array['newid'] = $parentID;

            // toast
            $array['proTask'] = $this->db->select("*")->get_where("crm_activity", array("HasParentId" => $parentID))->result();

            if (COUNT($array['proTask']) > 0) {
                foreach ($array['proTask'] as $key => $val) {
                    // for task
                    if (new DateTime($val->Enddate) > new DateTime($_POST['projectEnddate'])) {
                        if ($val->CreatedBy != $data['id']) {
                            $inputInsertData = array(
                                'type' => "ProjectToast",
                                'type_id' => $val->Id,
                                'relatedTo' => $parentID,
                                'org_id' => $data['org_id'],
                                'user_id' => $val->CreatedBy,
                                'notification_for' => '1',
                                'status' => '0',
                                'title' => "Project Due Date Change",
                                'body' => "Project: <b>{$Title}</b>, Task: <b>{$val->Title}</b> due date has been changed by <b>{$username}</b>",
                                'createdby' => $data['id']
                            );

                            $arr['notification_for_task'] = $this->Modulemodel->insertData("crm_notification", $inputInsertData);
                        } else {

                            $array['upstatus'][$key] = $this->Modulemodel->updateOneData("crm_activity", array('Enddate' => $_POST['projectEnddate']), array('Id' => $val->Id));
                        }
                    }
                    // for subtask
                    $array['proSubtask'] = $this->db->select("*")->get_where("crm_activity", array("HasParentId" => $val->Id))->result();

                    if (COUNT($array['proSubtask']) > 0) {
                        foreach ($array['proSubtask'] as $keysub => $valsub) {

                            if (new DateTime($valsub->Enddate) > new DateTime($_POST['projectEnddate'])) {

                                if ($valsub->CreatedBy != $data['id']) {

                                    $inputInsertData = array(
                                        'type' => "ProjectToast",
                                        'type_id' => $valsub->Id,
                                        'relatedTo' => $parentID,
                                        'org_id' => $data['org_id'],
                                        'user_id' => $valsub->CreatedBy,
                                        'notification_for' => '1',
                                        'status' => '0',
                                        'title' => "Project Due Date Change",
                                        'body' => "Project: <b>{$Title}</b>, Task: <b>{$val->Title}</b>, Subtask: <b>{$valsub->Title}</b> due date has been changed by <b>{$username}</b>",
                                        'createdby' => $data['id']
                                    );

                                    $arr['notification_for_subtask'] = $this->Modulemodel->insertData("crm_notification", $inputInsertData);
                                } else {

                                    $array['upstatus_sub'][$key] = $this->Modulemodel->updateOneData("crm_activity", array('Enddate' => $_POST['projectEnddate']), array('Id' => $valsub->Id));
                                }
                            }
                        }
                    }
                }
            }
        } else {
            $array['newid'] = 0;
        }

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function getNewProjectdetails() {
        $array = array();

        $array['detail'] = $this->Modulemodel->getAll("crm_activity", array('Id' => $this->input->post('projectID')));
        $array['tagAdmin'] = $this->Modulemodel->getAll("crm_tagHD", array('RelatedTo' => $this->input->post('projectID'), 'UserStatus' => '1'));
        $array['tagMember'] = $this->Modulemodel->getAll("crm_tagHD", array('RelatedTo' => $this->input->post('projectID'), 'UserStatus' => '2'));


        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function getUsersForProject() {
        $sessionData = $this->session->userdata('yeezyCRM');

        $array = array();

        $this->db->select('ID, full_name');
        $this->db->where('org_id', $sessionData['org_id']);
        $array['users'] = $this->db->get('crm_users')->result();

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function TagAjax() {
        $array = array();

        $array['programid'] = $this->input->post('programid');

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function insertCmnt() {
        $array = array();
        $TagArray = array();
        $ty = '';
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

        $title = $this->db->select("Title")->get_where("crm_activity", array("Id" => $this->input->post('projectID')))->result();


        if ($this->input->post('type') == 'ProjectCmnt') {
            $pid = $_POST['projectID'] + 99999999;
            $member = $this->db->query("SELECT group_concat(cusr.email separator ',') as member  FROM crm_tagHD cthd left join crm_users cusr on cusr.ID=cthd.userid where cthd.RelatedTo='" . $_POST['projectID'] . "'")->result();
            $createdby = $this->db->query("SELECT u.email FROM crm_users u, crm_activity a WHERE a.CreatedBy = u.ID AND a.Id = '" . $_POST['projectID'] . "'")->result();
            $allmember = $member[0]->member . "," . $createdby[0]->email;
            $result = $this->db->get_where("crm_message_group", array("group_id" => $pid))->result();
            
            if (count($result) > 0) {
                $this->db->update("crm_message_group", array("group_name" => $title[0]->Title, "group_member" => $allmember), array("group_id" => $pid));
            } else {
                $this->db->insert("crm_message_group", array("group_id" => $pid, "group_name" => $title[0]->Title, "group_member" => $allmember, "pid" => $_POST['projectID']));
            }
            
            $msg = base64_encode($_POST["comment"]);
            
            $data_array = array(
                'sender_id' => $sessionData['user_email'],
                'receiver_id' => $pid,
                'msg' => $msg,
                'status' => $allmember,
                'time' => date('Y-m-d H:i:s'));

            $this->db->insert("crm_message", $data_array);
            
            $inputnot = array(
                'type' => $this->input->post('type'),
                'type_id' => $this->input->post('projectID'),
                'relatedTo' => '',
                'org_id' => $data['org_id'],
                'user_id' => $data['id'],
                'notification_for' => '1',
                'status' => '0',
                'title' => 'commented on Project : ' . $title[0]->Title,
                'body' => $this->input->post('comment'),
                'replay_msg' => '',
                'createdby' => $data['id']
            );
            $this->Modulemodel->insertData("crm_notification", $inputnot);

            // end
        } else if ($this->input->post('type') == 'TaskCmnt') {
            $ty = 'Task';
            $parentID = $this->db->select("HasParentId,Title")->get_where("crm_activity", array("Id" => $this->input->post('projectID')))->result();
            $Parenttitle = $this->db->select("Title")->get_where("crm_activity", array("Id" => $parentID[0]->HasParentId))->result();
            $inputnot = array(
                'type' => $this->input->post('type'),
                'type_id' => $this->input->post('projectID'),
                'relatedTo' => $parentID[0]->HasParentId,
                'org_id' => $data['org_id'],
                'user_id' => $data['id'],
                'notification_for' => '1',
                'status' => '0',
                'title' => 'commented on ' . $ty . ' : ' . $title[0]->Title,
                'body' => $this->input->post('comment'),
                'replay_msg' => $Parenttitle[0]->Title,
                'createdby' => $data['id']
            );
            $this->Modulemodel->insertData("crm_notification", $inputnot);
        } else {
            $ty = $this->input->post('type') . 'Cmnt';
            $inputnot = array(
                'type' => $this->input->post('type'),
                'type_id' => $this->input->post('projectID'),
                'relatedTo' => $array["activityid"],
                'org_id' => $data['org_id'],
                'user_id' => $data['id'],
                'notification_for' => '1',
                'status' => '0',
                'title' => 'commented on ' . $ty . ' : ' . $title[0]->Title,
                'body' => $this->input->post('comment'),
                'createdby' => $data['id']
            );
            $this->Modulemodel->insertData("crm_notification", $inputnot);
        }

        if ($this->input->post('type') != 'Todo') {

            $array['tag'] = $this->Modulemodel->getAlltagforproject($this->input->post('projectID'));

            if (count($array['tag']) > 0) {

                foreach ($array['tag'] as $key => $value) {
                    array_push($TagArray, $value->userid);
                }

                array_push($TagArray, $this->Modulemodel->get_created_by_id('crm_activity', $this->input->post('projectID')));


                foreach ($TagArray as $key => $value) {

                    if ($value == $data['id']) {
                        //do nothing
                    } else {
                        $temp_tbl[] = array(
                            'parent' => $this->input->post('projectID'),
                            'parentType' => $this->input->post('type'),
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

    public function insertCmntStatus() {
        $array = array();
        $TagArray = array();
        $ty = '';
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

        $array["activityid"] = $this->Modulemodel->insertData("crm_updateStatus", $inputdata);

        $title = $this->db->select("Title")->get_where("crm_activity", array("Id" => $this->input->post('projectID')))->result();


        if ($this->input->post('type') == 'ProjectCmnt') {

            $pid = $_POST['projectID'] + 99999999;
            $member = $this->db->query("SELECT group_concat(cusr.email separator ',') as member  FROM crm_tagHD cthd left join crm_users cusr on cusr.ID=cthd.userid where cthd.RelatedTo='" . $_POST['projectID'] . "'")->result();
            $createdby = $this->db->query("SELECT u.email FROM crm_users u, crm_activity a WHERE a.CreatedBy = u.ID AND a.Id = '" . $_POST['projectID'] . "'")->result();
            $allmember = $member[0]->member . "," . $createdby[0]->email;
            
            $inputnot = array(
                'type' => $this->input->post('type').'StatusUpdate',
                'type_id' => $this->input->post('projectID'),
                'relatedTo' => $this->input->post('projectID'),
                'org_id' => $data['org_id'],
                'user_id' => $data['id'],
                'notification_for' => '1',
                'status' => '0',
                'title' => $title[0]->Title,
                'body' => $this->input->post('comment'),
                'replay_msg' => '',
                'createdby' => $data['id']
            );
            $this->Modulemodel->insertData("crm_notification", $inputnot);

            // end
        } else if ($this->input->post('type') == 'TaskCmnt') {
            $ty = 'Task';
            $parentID = $this->db->select("HasParentId,Title")->get_where("crm_activity", array("Id" => $this->input->post('projectID')))->result();
            $Parenttitle = $this->db->select("Title")->get_where("crm_activity", array("Id" => $parentID[0]->HasParentId))->result();
            $inputnot = array(
                'type' => $this->input->post('type').'StatusUpdate',
                'type_id' => $this->input->post('projectID'),
                'relatedTo' => $parentID[0]->HasParentId,
                'org_id' => $data['org_id'],
                'user_id' => $data['id'],
                'notification_for' => '1',
                'status' => '0',
                'title' => 'commented on ' . $ty . ' : ' . $title[0]->Title,
                'body' => $this->input->post('comment'),
                'replay_msg' => $Parenttitle[0]->Title,
                'createdby' => $data['id']
            );
            $this->Modulemodel->insertData("crm_notification", $inputnot);
        } else {
            $ty = $this->input->post('type') . 'Cmnt';
            $inputnot = array(
                'type' => $this->input->post('type').'StatusUpdate',
                'type_id' => $this->input->post('projectID'),
                'relatedTo' => $array["activityid"],
                'org_id' => $data['org_id'],
                'user_id' => $data['id'],
                'notification_for' => '1',
                'status' => '0',
                'title' => 'commented on ' . $ty . ' : ' . $title[0]->Title,
                'body' => $this->input->post('comment'),
                'createdby' => $data['id']
            );
            $this->Modulemodel->insertData("crm_notification", $inputnot);
        }

        if ($this->input->post('type') != 'Todo') {

            $array['tag'] = $this->Modulemodel->getAlltagforproject($this->input->post('projectID'));

            if (count($array['tag']) > 0) {

                foreach ($array['tag'] as $key => $value) {
                    array_push($TagArray, $value->userid);
                }

                array_push($TagArray, $this->Modulemodel->get_created_by_id('crm_activity', $this->input->post('projectID')));


                foreach ($TagArray as $key => $value) {

                    if ($value == $data['id']) {
                        //do nothing
                    } else {
                        $temp_tbl[] = array(
                            'parent' => $this->input->post('projectID'),
                            'parentType' => $this->input->post('type'),
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


    public function insertUpdateStatus() {
        $array = array();
        $TagArray = array();
        $ty = '';
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

        $array["activityid"] = $this->Modulemodel->insertData("crm_updateStatus", $inputdata);

        $title = $this->db->select("Title")->get_where("crm_activity", array("Id" => $this->input->post('projectID')))->result();


        if ($this->input->post('type') == 'ProjectCmnt') {
            $pid = $_POST['projectID'] + 99999999;
            $member = $this->db->query("SELECT group_concat(cusr.email separator ',') as member  FROM crm_tagHD cthd left join crm_users cusr on cusr.ID=cthd.userid where cthd.RelatedTo='" . $_POST['projectID'] . "'")->result();
            $createdby = $this->db->query("SELECT u.email FROM crm_users u, crm_activity a WHERE a.CreatedBy = u.ID AND a.Id = '" . $_POST['projectID'] . "'")->result();
            $allmember = $member[0]->member . "," . $createdby[0]->email;


            $result = $this->db->get_where("crm_message_group", array("group_id" => $pid))->result();
            if (count($result) > 0) {
                $this->db->update("crm_message_group", array("group_name" => $title[0]->Title, "group_member" => $allmember), array("group_id" => $pid));
            } else {
                $this->db->insert("crm_message_group", array("group_id" => $pid, "group_name" => $title[0]->Title, "group_member" => $allmember, "pid" => $_POST['projectID']));
            }
            $msg = base64_encode($_POST["comment"]);
            $data_array = array(
                'sender_id' => $sessionData['user_email'],
                'receiver_id' => $pid,
                'msg' => $msg,
                'status' => $allmember,
                'time' => date('Y-m-d H:i:s'));

            $this->db->insert("crm_message", $data_array);

            $inputnot = array(
                'type' => $this->input->post('type'),
                'type_id' => $this->input->post('projectID'),
                'relatedTo' => '',
                'org_id' => $data['org_id'],
                'user_id' => $data['id'],
                'notification_for' => '1',
                'status' => '0',
                'title' => 'commented on Project : ' . $title[0]->Title,
                'body' => $this->input->post('comment'),
                'replay_msg' => '',
                'createdby' => $data['id']
            );
            $this->Modulemodel->insertData("crm_notification", $inputnot);
            // end
        } else if ($this->input->post('type') == 'TaskCmnt') {
            $ty = 'Task';
            $parentID = $this->db->select("HasParentId,Title")->get_where("crm_activity", array("Id" => $this->input->post('projectID')))->result();
            $Parenttitle = $this->db->select("Title")->get_where("crm_activity", array("Id" => $parentID[0]->HasParentId))->result();
            $inputnot = array(
                'type' => $this->input->post('type'),
                'type_id' => $this->input->post('projectID'),
                'relatedTo' => $parentID[0]->HasParentId,
                'org_id' => $data['org_id'],
                'user_id' => $data['id'],
                'notification_for' => '1',
                'status' => '0',
                'title' => 'commented on ' . $ty . ' : ' . $title[0]->Title,
                'body' => $this->input->post('comment'),
                'replay_msg' => $Parenttitle[0]->Title,
                'createdby' => $data['id']
            );
            $this->Modulemodel->insertData("crm_notification", $inputnot);
        } else {
            $ty = $this->input->post('type') . 'Cmnt';
            $inputnot = array(
                'type' => $this->input->post('type'),
                'type_id' => $this->input->post('projectID'),
                'relatedTo' => $array["activityid"],
                'org_id' => $data['org_id'],
                'user_id' => $data['id'],
                'notification_for' => '1',
                'status' => '0',
                'title' => 'commented on ' . $ty . ' : ' . $title[0]->Title,
                'body' => $this->input->post('comment'),
                'createdby' => $data['id']
            );
            $this->Modulemodel->insertData("crm_notification", $inputnot);
        }

        if ($this->input->post('type') != 'Todo') {

            $array['tag'] = $this->Modulemodel->getAlltagforproject($this->input->post('projectID'));

            if (count($array['tag']) > 0) {

                foreach ($array['tag'] as $key => $value) {
                    array_push($TagArray, $value->userid);
                }

                array_push($TagArray, $this->Modulemodel->get_created_by_id('crm_activity', $this->input->post('projectID')));


                foreach ($TagArray as $key => $value) {

                    if ($value == $data['id']) {
                        //do nothing
                    } else {
                        $temp_tbl[] = array(
                            'parent' => $this->input->post('projectID'),
                            'parentType' => $this->input->post('type'),
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

    public function getCommentForProjects() {
        $array = array();
        if ($this->session->userdata('admin_login') == 1) {
            $sessionData = $this->session->userdata('yeezyCRM');
            $data['acessType'] = $sessionData['accessType'];
            $data['id'] = $sessionData['user_id'];
            $data['org_id'] = $sessionData['org_id'];
            $mid = $sessionData['user_email'];    
        }else{
            $data['id'] = $_POST['user_id'];
            $data['org_id'] = $_POST['org_id'];
            $mid = $_POST['user_email'];
        }
        $fid = $_POST["projectID"] + 99999999;

        $array['title'] = $this->db->select("*")->get_where("crm_activity", array("Id" => $this->input->post('projectID')))->result();
        // $array['allComm'] = $this->Modulemodel->getAllcommentforproject($this->input->post('projectID'));
        $array['allComm'] = array();
        // add by 902770
        // $where = "crm_message.receiver_id = '$fid' AND FIND_IN_SET('$mid', `crm_message_group`.`group_member`)";
        //          $this->db->from('crm_message');
        //          $this->db->join('crm_message_group', 'crm_message.receiver_id = crm_message_group.group_id');
        //          $this->db->where($where);
        //          $this->db->order_by('id');
        $array['allComm'] = $this->db->query("SELECT * FROM crm_message join crm_message_group on `crm_message`.`receiver_id` = `crm_message_group`.`group_id` join `crm_users` on `crm_message`.`sender_id` = `crm_users`.`email` where `crm_message`.`receiver_id` = '$fid' AND FIND_IN_SET('$mid', `crm_message_group`.`group_member`) order by `crm_message`.`id`")->result();
        
        $array['tag'] = $this->Modulemodel->getAlltagforproject($this->input->post('projectID'));
        $array['creator'] = $this->Modulemodel->getcreatorproject($this->input->post('projectID'));

        $this->Modulemodel->deleteItem("crm_temp_tbl", array('parent' => $this->input->post('projectID'), 'userid' => $data['id'], 'parentType' => 'Project'));

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function getCommentForProjectsTask() {
        $array = array();
        $sessionData = $this->session->userdata('yeezyCRM');

        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['org_id'] = $sessionData['org_id'];

        $array['allComm'] = $this->Modulemodel->getAllcommentforproject($this->input->post('projectID'));
        $array['tag'] = $this->Modulemodel->getAlltagforproject($this->input->post('projectID'));
        $array['creator'] = $this->Modulemodel->getcreatorproject($this->input->post('projectID'));

        $this->Modulemodel->deleteItem("crm_temp_tbl", array('parent' => $this->input->post('projectID'), 'userid' => $data['id'], 'parentType' => 'Task'));

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function deleteFileUnseen() {
        $array = array();
        $sessionData = $this->session->userdata('yeezyCRM');

        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['org_id'] = $sessionData['org_id'];

        $this->Modulemodel->deleteItem("crm_temp_tbl", array('parent' => $this->input->post('projectID'), 'userid' => $data['id'], 'parentType' => 'File'));

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function tagUser() {

        $array = array();
        $array['allTask'] = array();
        $array['allSubTask'] = array();

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
            'userid' => $tagList,
            'assignBy' => $data['id']
        );



        if ($this->Modulemodel->insertData("crm_tagHD", $inputdata)) {
            $array['msg'] = 'Done';
            $title = $this->db->select("Title,HasParentId")->get_where("crm_activity", array("Id" => $projectID))->result();
            $inputInsertData = array(
                'type' => $type . 'TagAss',
                'type_id' => $projectID,
                'relatedTo' => $title[0]->HasParentId,
                'org_id' => $data['org_id'],
                'user_id' => $tagList,
                'notification_for' => '1',
                'status' => '0',
                'title' => 'You have been assigned to the ' . $type,
                'body' => $title[0]->Title,
                'createdby' => $data['id']
            );

            $this->Modulemodel->insertData("crm_notification", $inputInsertData);
        } else {
            $array['msg'] = 'Fail';
        }

        if ($type == 'Project') {
            $array['allTask'] = $this->Modulemodel->getAllprojectTasks($data['org_id'], $data['id'], $projectID, 'ASC');
            if (COUNT($array['allTask']) > 0) {
                foreach ($array['allTask'] as $key => $value) {
                    $inputHDdata[] = array(
                        'RelatedTo' => $value->Id,
                        'UserStatus' => '1',
                        'TagDate' => $currrentDate,
                        'Type' => 'Task',
                        'userid' => $tagList,
                        'assignBy' => $data['id']
                    );

                    $array['allSubTask'] = $this->Modulemodel->getAllprojectSubTasks($data['org_id'], $data['id'], $value->Id, 'ASC');

                    if (COUNT($array['allSubTask']) > 0) {
                        foreach ($array['allSubTask'] as $ke => $val) {
                            $inputHDdata1[] = array(
                                'RelatedTo' => $val->Id,
                                'UserStatus' => '1',
                                'TagDate' => $currrentDate,
                                'Type' => 'SubTask',
                                'userid' => $tagList,
                                'assignBy' => $data['id']
                            );
                        }
                        $this->Modulemodel->insertbatchinto("crm_tagHD", $inputHDdata1);
                    }
                }

                $this->Modulemodel->insertbatchinto("crm_tagHD", $inputHDdata);
            }
        }

        if ($type == 'Task') {

            $Taskparent = 'HasParentId';
            $task = 'Id';
            $TaskparentID = $this->db
                            ->get_where('crm_activity', array('Id' => $projectID))
                            ->row()->$Taskparent;


            $alreadyHas = $this->db
                            ->get_where('crm_tagHD', array('RelatedTo' => $TaskparentID, "userid" => $tagList))
                            ->row()->$task;
            if ($alreadyHas == NULL) {
                $inputcreator = array(
                    'RelatedTo' => $TaskparentID,
                    'UserStatus' => '2',
                    'TagDate' => $currrentDate,
                    'Type' => 'Project',
                    'userid' => $tagList,
                    'assignBy' => $data['id']
                );

                $this->Modulemodel->insertData("crm_tagHD", $inputcreator);
            }
        }

        if ($type == 'SubTask') {

            $createdBY = 'HasParentId';
            $Taskparent = 'HasParentId';
            $task = 'Id';

            $TaskparentID = $this->db
                            ->get_where('crm_activity', array('Id' => $projectID))
                            ->row()->$Taskparent;

            $creator = $this->db
                            ->get_where('crm_activity', array('Id' => $TaskparentID))
                            ->row()->$createdBY;

            $alreadyHas = $this->db
                            ->get_where('crm_tagHD', array('RelatedTo' => $creator, "userid" => $tagList))
                            ->row()->$task;
            if ($alreadyHas == NULL) {
                $inputcreator = array(
                    'RelatedTo' => $creator,
                    'UserStatus' => '2',
                    'TagDate' => $currrentDate,
                    'Type' => 'Project',
                    'userid' => $tagList,
                    'assignBy' => $data['id']
                );

                $this->Modulemodel->insertData("crm_tagHD", $inputcreator);
            }
        }

        $array['inputdata'] = $inputdata;

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function tagUserWithStory() {

        $array = array();
        $array['allTask'] = array();
        $array['allSubTask'] = array();

        $sessionData = $this->session->userdata('yeezyCRM');
        $currrentDate = date('Y-m-d H:i:s');

        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['org_id'] = $sessionData['org_id'];

        $tagList = $this->input->post('tagList');
        $type = $this->input->post('type');
        $projectID = $this->input->post('projectID');
        $UserStatus = $this->input->post('UserStatus');

        if ($UserStatus == '2') {
            $userSS = 'member';
        }

        if ($UserStatus == '1') {
            $userSS = 'co-owners';
        }

        $inputdata = array(
            'RelatedTo' => $projectID,
            'UserStatus' => $UserStatus,
            'TagDate' => $currrentDate,
            'Type' => $type,
            'userid' => $tagList,
            'assignBy' => $data['id']
        );

        if ($type == 'Project') {
            $titleNot = 'You have been assigned as a co-owner to the '. $type;
        }

        if ($type == 'Task') {
            $titleNot = 'You have been assigned to the ' . $type;
        }

        if ($type == 'SubTask') {
            $titleNot = 'You have been assigned to the ' . $type;
        }

        if ($type == 'Todo') {
            $titleNot = 'You have been assigned to the ' . $type;
        }

        if ($this->Modulemodel->insertData("crm_tagHD", $inputdata)) {
            $array['msg'] = 'Done';
            $title = $this->db->select("Title,HasParentId")->get_where("crm_activity", array("Id" => $projectID))->result();

            $inputInsertData = array(
                'type' => $type . 'TagAss',
                'type_id' => $projectID,
                'relatedTo' => $title[0]->HasParentId,
                'org_id' => $data['org_id'],
                'user_id' => $tagList,
                'notification_for' => '1',
                'status' => '0',
                'title' => $titleNot,
                'body' => $title[0]->Title,
                'createdby' => $data['id']
            );

            $this->Modulemodel->insertData("crm_notification", $inputInsertData);
        } else {
            $array['msg'] = 'Fail';
        }

        if ($type == 'Project') {
            $array['allTask'] = $this->Modulemodel->getAllprojectTasks($data['org_id'], $data['id'], $projectID, 'ASC');
            if (COUNT($array['allTask']) > 0) {
                foreach ($array['allTask'] as $key => $value) {
                    $inputHDdata[] = array(
                        'RelatedTo' => $value->Id,
                        'UserStatus' => '1',
                        'TagDate' => $currrentDate,
                        'Type' => 'Task',
                        'userid' => $tagList,
                        'assignBy' => $data['id']
                    );

                    $array['allSubTask'] = $this->Modulemodel->getAllprojectSubTasks($data['org_id'], $data['id'], $value->Id, 'ASC');

                    if (COUNT($array['allSubTask']) > 0) {
                        foreach ($array['allSubTask'] as $ke => $val) {
                            $inputHDdata1[] = array(
                                'RelatedTo' => $val->Id,
                                'UserStatus' => '1',
                                'TagDate' => $currrentDate,
                                'Type' => 'SubTask',
                                'userid' => $tagList,
                                'assignBy' => $data['id']
                            );
                        }
                        $this->Modulemodel->insertbatchinto("crm_tagHD", $inputHDdata1);
                    }
                }

                $this->Modulemodel->insertbatchinto("crm_tagHD", $inputHDdata);
            }
        }

        if ($type == 'Task') {

            $Taskparent = 'HasParentId';
            $task = 'Id';
            $TaskparentID = $this->db
                            ->get_where('crm_activity', array('Id' => $projectID))
                            ->row()->$Taskparent;


            $alreadyHas = $this->db->get_where('crm_tagHD', array('RelatedTo' => $TaskparentID,'Type' => 'Project',"userid" => $tagList))->result();

            if (COUNT($alreadyHas) == 0 ) {
                $inputcreator = array(
                    'RelatedTo' => $TaskparentID,
                    'UserStatus' => '2',
                    'TagDate' => $currrentDate,
                    'Type' => 'Project',
                    'userid' => $tagList,
                    'assignBy' => $data['id']
                );

                $this->Modulemodel->insertData("crm_tagHD", $inputcreator);
            }

            $array['alreadyHas'] = $alreadyHas;
            $array['TaskparentID'] = $TaskparentID;
        }

        if ($type == 'SubTask') {

            $createdBY = 'HasParentId';
            $Taskparent = 'HasParentId';
            $task = 'Id';

            $TaskparentID = $this->db
                            ->get_where('crm_activity', array('Id' => $projectID))
                            ->row()->$Taskparent;

            $creator = $this->db
                            ->get_where('crm_activity', array('Id' => $TaskparentID))
                            ->row()->$createdBY;

            $alreadyHas = $this->db
                            ->get_where('crm_tagHD', array('RelatedTo' => $creator, "userid" => $tagList))
                            ->row()->$task;

            if ($alreadyHas == NULL) {
                $inputcreator = array(
                    'RelatedTo' => $creator,
                    'UserStatus' => '2',
                    'TagDate' => $currrentDate,
                    'Type' => 'Project',
                    'userid' => $tagList,
                    'assignBy' => $data['id']
                );

                $this->Modulemodel->insertData("crm_tagHD", $inputcreator);
            }
        }

        $maxid = 0;
        $row = $this->db->query("SELECT MAX(id) AS `maxid` FROM `crm_updateStatus` WHERE `typeID` = '" . $projectID . "'")->row();
        if ($row) {
            $maxid = $row->maxid;
        }

        $vlu['name'] = $sessionData['username'];
        $vlu['action'] = 'add ';
        $vlu['detail'] = $userSS . ' to this task';
        $vlu['parentid'] = $maxid;
        $vlu['typeid'] = $projectID;

        $array['sto'] = $this->calendarmodel->insertData("crm_story", $vlu);

        $array['inputdata'] = $inputdata;

        $temp_tbl = array(
                    'parent' => $projectID,
                    'parentType' => $type.'TagAss',
                    'typeid' => $projectID,
                    'userid' => $tagList
                );
        
        $this->db->insert("crm_temp_tbl", $temp_tbl);

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function tagUserWithStoryForTask() {

        $array = array();
        $array['allTask'] = array();
        $array['allSubTask'] = array();

        $sessionData = $this->session->userdata('yeezyCRM');
        $currrentDate = date('Y-m-d H:i:s');

        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['org_id'] = $sessionData['org_id'];

        $tagList = $this->input->post('tagList');
        $type = $this->input->post('type');
        $projectID = $this->input->post('projectID');
        $UserStatus = $this->input->post('UserStatus');

        if ($UserStatus == '2') {
            $userSS = 'member';
        }

        if ($UserStatus == '1') {
            $userSS = 'co-owners';
        }

        $checkUser = $this->db->get_where('crm_tagHD', array('RelatedTo' => $projectID,'Type' => 'Task',"userid" => $tagList))->result();

        if (COUNT($checkUser) == 0 ) {
            $inputdata = array(
                'RelatedTo' => $projectID,
                'UserStatus' => $UserStatus,
                'TagDate' => $currrentDate,
                'Type' => $type,
                'userid' => $tagList,
                'assignBy' => $data['id']
            );



            if ($this->Modulemodel->insertData("crm_tagHD", $inputdata)) {
                $array['msg'] = 'Done';
                $title = $this->db->select("Title,HasParentId")->get_where("crm_activity", array("Id" => $projectID))->result();
                $inputInsertData = array(
                    'type' => $type . 'TagAss',
                    'type_id' => $projectID,
                    'relatedTo' => $title[0]->HasParentId,
                    'org_id' => $data['org_id'],
                    'user_id' => $tagList,
                    'notification_for' => '1',
                    'status' => '0',
                    'title' => 'You have been assigned to the ' . $type,
                    'body' => $title[0]->Title,
                    'createdby' => $data['id']
                );

                $this->Modulemodel->insertData("crm_notification", $inputInsertData);
            } else {
                $array['msg'] = 'Fail';
            }

            if ($type == 'Project') {
                $array['allTask'] = $this->Modulemodel->getAllprojectTasks($data['org_id'], $data['id'], $projectID, 'ASC');
                if (COUNT($array['allTask']) > 0) {
                    foreach ($array['allTask'] as $key => $value) {
                        $inputHDdata[] = array(
                            'RelatedTo' => $value->Id,
                            'UserStatus' => '1',
                            'TagDate' => $currrentDate,
                            'Type' => 'Task',
                            'userid' => $tagList,
                            'assignBy' => $data['id']
                        );

                        $array['allSubTask'] = $this->Modulemodel->getAllprojectSubTasks($data['org_id'], $data['id'], $value->Id, 'ASC');

                        if (COUNT($array['allSubTask']) > 0) {
                            foreach ($array['allSubTask'] as $ke => $val) {
                                $inputHDdata1[] = array(
                                    'RelatedTo' => $val->Id,
                                    'UserStatus' => '1',
                                    'TagDate' => $currrentDate,
                                    'Type' => 'SubTask',
                                    'userid' => $tagList,
                                    'assignBy' => $data['id']
                                );
                            }
                            $this->Modulemodel->insertbatchinto("crm_tagHD", $inputHDdata1);
                        }
                    }

                    $this->Modulemodel->insertbatchinto("crm_tagHD", $inputHDdata);
                }
            }

            if ($type == 'Task') {

                $Taskparent = 'HasParentId';
                $task = 'Id';
                $TaskparentID = $this->db
                                ->get_where('crm_activity', array('Id' => $projectID))
                                ->row()->$Taskparent;


                $alreadyHas = $this->db->get_where('crm_tagHD', array('RelatedTo' => $TaskparentID,'Type' => 'Project',"userid" => $tagList))->result();

                if (COUNT($alreadyHas) == 0 ) {
                    $inputcreator = array(
                        'RelatedTo' => $TaskparentID,
                        'UserStatus' => '2',
                        'TagDate' => $currrentDate,
                        'Type' => 'Project',
                        'userid' => $tagList,
                        'assignBy' => $data['id']
                    );

                    $this->Modulemodel->insertData("crm_tagHD", $inputcreator);
                }

                $array['alreadyHas'] = $alreadyHas;
                $array['TaskparentID'] = $TaskparentID;
            }

            if ($type == 'SubTask') {

                $createdBY = 'HasParentId';
                $Taskparent = 'HasParentId';
                $task = 'Id';

                $TaskparentID = $this->db
                                ->get_where('crm_activity', array('Id' => $projectID))
                                ->row()->$Taskparent;

                $creator = $this->db
                                ->get_where('crm_activity', array('Id' => $TaskparentID))
                                ->row()->$createdBY;

                $alreadyHas = $this->db
                                ->get_where('crm_tagHD', array('RelatedTo' => $creator, "userid" => $tagList))
                                ->row()->$task;

                if ($alreadyHas == NULL) {
                    $inputcreator = array(
                        'RelatedTo' => $creator,
                        'UserStatus' => '2',
                        'TagDate' => $currrentDate,
                        'Type' => 'Project',
                        'userid' => $tagList,
                        'assignBy' => $data['id']
                    );

                    $this->Modulemodel->insertData("crm_tagHD", $inputcreator);
                }
            }

            $maxid = 0;
            $row = $this->db->query("SELECT MAX(id) AS `maxid` FROM `crm_updateStatus` WHERE `typeID` = '" . $projectID . "'")->row();
            if ($row) {
                $maxid = $row->maxid;
            }

            $vlu['name'] = $sessionData['username'];
            $vlu['action'] = 'add ';
            $vlu['detail'] = $userSS . ' to this task';
            $vlu['parentid'] = $maxid;
            $vlu['typeid'] = $projectID;

            $array['sto'] = $this->calendarmodel->insertData("crm_story", $vlu);
            $array['inputdata'] = $inputdata;
        }else{
            $array['inputdata'] = 'Fail';
        }

        

        

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function deltagUser() {
        $array = array();
        $ara['allTask'] = array();
        $ara['allSubTask'] = array();
        $sessionData = $this->session->userdata('yeezyCRM');
        $currrentDate = date('Y-m-d H:i:s');

        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['org_id'] = $sessionData['org_id'];

        $tagList = $this->input->post('tagList');
        $type = $this->input->post('type');
        $projectID = $this->input->post('projectID');
        $UserStatus = $this->input->post('UserStatus');

        $createdBY = $this->Modulemodel->chekUserPrefarence($projectID, $data['id'], $type, $tagList);

        $array['createdBY'] = COUNT($createdBY);

        if (COUNT($createdBY) > 0) {
            if ($this->Modulemodel->deleteItem("crm_tagHD", array('RelatedTo' => $projectID, 'userid' => $tagList, 'Type' => $type))) {
                $array['msg'] = 'Done';
                $title = $this->db->select("Title,HasParentId")->get_where("crm_activity", array("Id" => $projectID))->result();
                $inputInsertData = array(
                    'type' => $type . 'TagRemove',
                    'type_id' => $projectID,
                    'relatedTo' => $title[0]->HasParentId,
                    'org_id' => $data['org_id'],
                    'user_id' => $tagList,
                    'notification_for' => '1',
                    'status' => '0',
                    'title' => 'You have been unassigned from the ' . $type,
                    'body' => $title[0]->Title,
                    'createdby' => $data['id']
                );

                $this->Modulemodel->insertData("crm_notification", $inputInsertData);

                if ($type == 'Project') {
                    $ara['allTask'] = $this->Modulemodel->getAllprojectTasks($data['org_id'], $data['id'], $projectID, 'ASC');
                    if (COUNT($ara['allTask']) > 0) {
                        foreach ($ara['allTask'] as $key => $value) {

                            $this->Modulemodel->deleteItem("crm_tagHD", array('RelatedTo' => $value->Id, 'userid' => $tagList, 'Type' => 'Task'));

                            $ara['allSubTask'] = $this->Modulemodel->getAllprojectSubTasks($data['org_id'], $data['id'], $value->Id, 'ASC');

                            if (COUNT($ara['allSubTask']) > 0) {
                                foreach ($ara['allSubTask'] as $ke => $val) {
                                    $this->Modulemodel->deleteItem("crm_tagHD", array('RelatedTo' => $val->Id, 'userid' => $tagList, 'Type' => 'SubTask'));
                                }
                            }
                        }
                    }
                }
            } else {
                $array['msg'] = 'Fail';
            }
        } else {
            $array['msg'] = 'YRNC';
        }


        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function deltagUserWithstory() {
        $array = array();
        $ara['allTask'] = array();
        $ara['allSubTask'] = array();
        $ara['allSubTask'] = array();
        $ara['allSubTask'] = array();
        $array['getTagHistory'] = array();
        $sessionData = $this->session->userdata('yeezyCRM');
        $currrentDate = date('Y-m-d H:i:s');
        $countForProjectTag = 0;

        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['org_id'] = $sessionData['org_id'];

        $tagList = $this->input->post('tagList');
        $type = $this->input->post('type');
        $projectID = $this->input->post('projectID');
        $parentid = $this->input->post('parentid');
        $UserStatus = $this->input->post('UserStatus');

        if ($UserStatus == '2') {
            $userSS = 'member';
        }

        if ($UserStatus == '1') {
            $userSS = 'co-owners';
        }

        if ($type == 'Project') {
            $titleNot = 'Your access has been revoked as a co-owner from the '. $type;         
        }
        if ($type == 'Task') {
            $titleNot = 'You have been unassigned from the ' . $type;         
        }


        $createdBY = $this->Modulemodel->chekUserPrefarence($projectID, $data['id'], $type, $tagList);

        $array['createdBY'] = COUNT($createdBY);

        if (COUNT($createdBY) > 0) {
            if ($this->Modulemodel->deleteItem("crm_tagHD", array('RelatedTo' => $projectID, 'userid' => $tagList, 'Type' => $type,'UserStatus' => $UserStatus))) {
                $array['msg'] = 'Done';
                $title = $this->db->select("Title,HasParentId")->get_where("crm_activity", array("Id" => $projectID))->result();
                $inputInsertData = array(
                    'type' => $type . 'TagRemove',
                    'type_id' => $projectID,
                    'relatedTo' => $title[0]->HasParentId,
                    'org_id' => $data['org_id'],
                    'user_id' => $tagList,
                    'notification_for' => '1',
                    'status' => '0',
                    'title' => $titleNot,
                    'body' => $title[0]->Title,
                    'createdby' => $data['id']
                );

                $this->Modulemodel->insertData("crm_notification", $inputInsertData);

                if ($type == 'Project') {
                    
                	$inputdataTag = array(
			            'RelatedTo' => $projectID,
			            'UserStatus' => '2',
			            'TagDate' => $currrentDate,
			            'Type' => 'Project',
			            'userid' => $tagList,
			            'assignBy' => $data['id']
			        );

					$this->Modulemodel->insertData("crm_tagHD", $inputdataTag);

                    $ara['allTask'] = $this->Modulemodel->getAllprojectTasks($data['org_id'], $data['id'], $projectID, 'ASC');
                    if (COUNT($ara['allTask']) > 0) {
                        foreach ($ara['allTask'] as $key => $value) {

                            $this->Modulemodel->deleteItem("crm_tagHD", array('RelatedTo' => $value->Id, 'userid' => $tagList, 'Type' => 'Task','UserStatus' => $UserStatus));

                            $ara['allSubTask'] = $this->Modulemodel->getAllprojectSubTasks($data['org_id'], $data['id'], $value->Id, 'ASC');

                            if (COUNT($ara['allSubTask']) > 0) {
                                foreach ($ara['allSubTask'] as $ke => $val) {
                                    $this->Modulemodel->deleteItem("crm_tagHD", array('RelatedTo' => $val->Id, 'userid' => $tagList, 'Type' => 'SubTask','UserStatus' => $UserStatus));
                                }
                            }
                        }
                    }
                }

                if($type == 'Task'){
                    $ara['allTask'] = $this->Modulemodel->getAllprojectTasks($data['org_id'], $data['id'], $parentid, 'ASC');
                    if (COUNT($ara['allTask']) > 0) {
                        foreach ($ara['allTask'] as $key => $value) {
                            $getTagHistory = $this->db->select("userid")->get_where("crm_tagHD", array("RelatedTo" => $value->Id, "userid"=> $tagList, "Type"=> "Task"))->result();
                            if (COUNT($getTagHistory) > 0) {
                                $countForProjectTag++;
                            }

                            //array_push($array['getTagHistory'], $getTagHistory);
                            array_push($array['getTagHistory'], COUNT($getTagHistory));
                        }
                    }

                    if($countForProjectTag == 0){
                        $this->Modulemodel->deleteItem("crm_tagHD", array('RelatedTo' => $parentid, 'userid' => $tagList, 'Type' => 'Project','UserStatus' => '2'));
                    }

                    $array['type'] = $type;
                    $array['countForProjectTag'] = $countForProjectTag;
                    
                }


            } else {
                $array['msg'] = 'Fail';
            }

            $maxid = 0;
            $row = $this->db->query("SELECT MAX(id) AS `maxid` FROM `crm_updateStatus` WHERE `typeID` = '" . $projectID . "'")->row();
            if ($row) {
                $maxid = $row->maxid;
            }

            $vlu['name'] = $sessionData['username'];
            $vlu['action'] = 'delete ';
            $vlu['detail'] = $userSS . ' from this task';
            $vlu['parentid'] = $maxid;
            $vlu['typeid'] = $projectID;
            $this->calendarmodel->insertData("crm_story", $vlu);

            $temp_tbl = array(
                    'parent' => $projectID,
                    'parentType' => $type.'TagRemove',
                    'typeid' => $projectID,
                    'userid' => $tagList
                );
        
            $this->db->insert("crm_temp_tbl", $temp_tbl);

        } else {
            $array['msg'] = 'YRNC';
        }


        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function newProjectFile() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');
        


        $data = array();
        $TagArray = array();

        $data['id'] = $sessionData['user_id'];
        $data['org_id'] = $sessionData['org_id'];
        $id = $sessionData['user_id'];

        $result = $this->db->get_where('crm_docs', array("parentID" => $this->input->post('parentID'), 'original_name' => $_FILES["fileToUpload"]["name"][0]))->result();

        if (count($result) > 0) {
            $array['msg'] = 'Already';
        } else {
            
            $projectName = $this->input->post('projectName');
            $parentType = $this->input->post('parentType');
            $parentID = $this->input->post('parentID');
            $dirname = $this->input->post('dirname');

            $array['projectName'] = $projectName;

            $folderName = $this->Modulemodel->selectOneData("crm_docs", array("parentID" => $this->input->post('parentID'), 'parentType' => $parentType . 'Folder'));

            $array['folderName'] = $folderName;

            if ($folderName != false) {
                $target_dir = "./$dirname/" . $folderName[0]->name;
                
            } else {
                if ($this->input->post('parentID') == '') {
                    $target_dir = $this->mkdirForProject($id, $projectName, $parentType, $parentID, $dirname);
                    
                } else {
                    $target_dir = $this->mkdirForProject($id, $projectName, $parentType, $parentID, $dirname, $this->input->post('parentID'));
                   
                }
            }

            

            $array['target_dir'] = $target_dir;
            $array['projectName'] = $projectName;
            $array['pttmsg'] = array();

            foreach ($_FILES["fileToUpload"]["tmp_name"] as $key => $value) {
                $file_origin_name = basename($_FILES["fileToUpload"]["name"][$key]);

                $file_ext = pathinfo("$target_dir/" . $file_origin_name, PATHINFO_EXTENSION);

                $file_new_name = $id . "_" . $key . time() . "." . $file_ext;

                $target_file = "$target_dir/" . $file_new_name;
                $fileSize = round(($_FILES['fileToUpload']['size'][$key]) / 1024, 2);
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
                    $target_dirNew = substr($target_dir,2);
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $target_file)) {
                        $this->db->insert("crm_docs", array("name" => $file_new_name, "original_name" => $file_origin_name,"path"=>$target_dirNew, "type" => 'file', "user_id" => $id, "parentType" => $parentType, "parentID" => $parentID, "size" => $fileSize));

                        $array['insert_id'] = $this->db->insert_id();
                        $msg .= $file_origin_name;
                        $array['file_new_name'] = $file_new_name;
                        $array['size'] = $fileSize;
                        if (isset($_POST["crm_modcomments"])) {
                            if ($parentType != "Project") {
                                $inputdata = array(
                                    "comment" => "<a href='" . base_url(substr($target_file, 2)) . "' target='_blank'>" . $file_origin_name . "<a>",
                                    "img" => "",
                                    "name" => "",
                                    "type" => $parentType,
                                    "typeID" => $parentID,
                                    "user" => $id,
                                    "date" => date('Y-m-d H:i:s')
                                );
                                $this->db->insert("crm_modcomments", $inputdata);
                            } else {
                                $pid = $parentID + 99999999;
                                $member = $this->db->query("SELECT group_concat(cusr.email separator ',') as member  FROM crm_tagHD cthd left join crm_users cusr on cusr.ID=cthd.userid where cthd.RelatedTo='" . $parentID . "'")->result();
                                $createdby = $this->db->query("SELECT u.email FROM crm_users u, crm_activity a WHERE a.CreatedBy = u.ID AND a.Id = '" . $parentID . "'")->result();
                                $allmember = $member[0]->member . "," . $createdby[0]->email;


                                $result = $this->db->get_where("crm_message_group", array("group_id" => $pid))->result();
                                if (count($result) > 0) {
                                    $this->db->update("crm_message_group", array("group_name" => $projectName, "group_member" => $allmember), array("group_id" => $pid));
                                } else {
                                    $this->db->insert("crm_message_group", array("group_id" => $pid, "group_name" => $projectName, "group_member" => $allmember, "pid" => $parentID));
                                }
                                $msg = base64_encode("<a href='" . base_url(substr($target_file, 2)) . "' target='_blank'>" . $file_origin_name . "<a>");
                                $data_array = array(
                                    'sender_id' => $sessionData['user_email'],
                                    'receiver_id' => $pid,
                                    'msg' => $msg,
                                    'status' => $allmember,
                                    'time' => date('Y-m-d H:i:s'));

                                $this->db->insert("crm_message", $data_array);
                            }

                            array_push($array['pttmsg'], "<a href='" . base_url(substr($target_file, 2)) . "' target='_blank'>" . $file_origin_name . "<a>");
                        }

                        $title = $this->db->select("Title,HasParentId,Type")->get_where("crm_activity", array("Id" => $this->input->post('parentID')))->result();
                
                        $inputnot = array(
                            'type' => $title[0]->Type."Attachment",
                            'type_id' => $this->input->post('parentID'),
                            'relatedTo' => $title[0]->HasParentId,
                            'org_id' => $data['org_id'],
                            'user_id' => $data['id'],
                            'notification_for' => '1',
                            'status' => '0',
                            'title' => $title[0]->Title,
                            'body' => '',
                            'replay_msg' => '',
                            'createdby' => $data['id']
                        );

                        $this->Modulemodel->insertData("crm_notification", $inputnot);

                        $data['tag'] = $this->Modulemodel->getAlltagforproject($this->input->post('parentID'));

                        if (count($data['tag']) > 0) {

                            foreach ($data['tag'] as $key => $value) {
                                array_push($TagArray, $value->userid);
                            }

                            array_push($TagArray, $this->Modulemodel->get_created_by_id('crm_activity', $this->input->post('parentID')));

                            foreach ($TagArray as $key => $value) {

                                if ($value == $data['id']) {
                                    //do nothing
                                } else {
                                    $temp_tbl[] = array(
                                        'parent' => $this->input->post('parentID'),
                                        'parentType' => $title[0]->Type."Attachment",
                                        'typeid' => $title[0]->HasParentId,
                                        'userid' => $value
                                    );
                                }
                            }

                            $this->Modulemodel->insertbatchinto("crm_temp_tbl", $temp_tbl);


                        }

                    } else {
                        $msg .= "Sorry, there was an error uploading your file.\n\r";
                    }
                }
            }

            if ($this->input->post('parentType') != 'Todo') {

                $array['tag'] = $this->Modulemodel->getAlltagforproject($parentID);

                if (count($array['tag']) == 0) {
                    
                } else {

                    foreach ($array['tag'] as $key => $value) {
                        array_push($TagArray, $value->userid);
                    }

                    array_push($TagArray, $this->Modulemodel->get_created_by_id('crm_activity', $parentID));


                    foreach ($TagArray as $key => $value) {

                        if ($value == $id) {
                            //do nothin
                        } else {
                            $inputInsertData[] = array(
                                'parentType' => 'File',
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
            $array['inputnot'] = $inputnot;

            $array['parentfolder'] = $this->Modulemodel->selectOneData('crm_docs', array("parentType" => "ProjectFolder", "parentID" => $parentID));
        }
        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function mkdirForProject($uid, $projectName, $parentType, $parentID, $dirname, $rootID = false) {

        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $structure = "./$dirname/";
        $target_dirNew = "$dirname";
        $folder_name = $uid . "_" . time();
        $structure .= $folder_name;

        if (!mkdir($structure, 0777, true)) {
            $msg = false;
        } else {
            if ($parentType == 'Task') {
                $this->db->insert("crm_docs", array("name" => $folder_name, "original_name" => $projectName, "type" => 'folder', "path"=>$target_dirNew,"user_id" => $uid, "parentType" => "ProjectFolder", "parentID" => $rootID));
            } else {
                $this->db->insert("crm_docs", array("name" => $folder_name, "original_name" => $projectName, "type" => 'folder', "path"=>$target_dirNew,"user_id" => $uid, "parentType" => $parentType . "Folder", "parentID" => $parentID));
            }

            $msg = $structure;
        }

        // file_put_contents("projectfolder.txt", $msg);

        return $msg;
    }

    public function mkdir4Project($uid, $projectName, $parentType, $parentID) {
        $structure = "./ProjectsFiles/";
        $target_dirNew = "ProjectsFiles";
        $folder_name = $uid . "_" . time();
        $structure .= $folder_name;

        if (!mkdir($structure, 0777, true)) {
            $msg = false;
        } else {
            
            $this->db->insert("crm_docs", array("name" => $folder_name, "original_name" => $projectName, "type" => 'folder', "path"=>$target_dirNew,"user_id" => $uid, "parentType" => $parentType . "Folder", "parentID" => $parentID));
            $msg = $structure;
        }
        return $msg;
    }

    public function getAllAttachData() {
        $array = array();

        $array['allFiles'] = $this->Modulemodel->getAll("crm_docs", array("parentType" => $this->input->post("parentType"), "parentID" => $this->input->post("parentID")));

        if ($this->input->post("rootID") == "0") {
            $array['parentfolder'] = $this->Modulemodel->selectOneData('crm_docs', array("parentType" => $this->input->post("parentFolder"), "parentID" => $this->input->post("parentID")));
        } else {
            $array['parentfolder'] = $this->Modulemodel->selectOneData('crm_docs', array("parentType" => $this->input->post("parentFolder"), "parentID" => $this->input->post("rootID")));
        }

        $array['rootID'] = $this->input->post("rootID");
        $array['parentID'] = $this->input->post("parentID");
        $array['parentFolder2'] = $this->input->post("parentFolder");
        $array['parentType'] = $this->input->post("parentType");



        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function fileRename() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');
        $currrentDate = date('Y-m-d H:i:s');

        $id = $sessionData['user_id'];

        $parentID = $this->input->post('docid');

        $vlu['original_name'] = $this->input->post('name');
        $vlu['LastUpdate'] = $currrentDate;

        if ($this->Modulemodel->updateOneData('crm_docs', $vlu, array('id' => $parentID))) {
            $array['msg'] = "Done";
        } else {
            $array['msg'] = "Fail";
        }


        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function makeStar() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');
        $parentID = $this->input->post('docid');
        $currrentDate = date('Y-m-d H:i:s');

        $vlu['HasStar'] = $this->input->post('status');
        $vlu['LastUpdate'] = $currrentDate;

        if ($this->Modulemodel->updateOneData('crm_docs', $vlu, array('id' => $parentID))) {
            $array['msg'] = "Done";
        } else {
            $array['msg'] = "Fail";
        }


        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function fileDelete() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');
        $parentID = $this->input->post('docid');
        $currrentDate = date('Y-m-d H:i:s');

        if ($this->Modulemodel->deleteItem("crm_docs", array('id' => $parentID))) {
            $array['msg'] = "Done";
        } else {
            $array['msg'] = "Fail";
        }


        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function deleteItem() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');
        $parentID = $this->input->post('ID');
        $currrentDate = date('Y-m-d H:i:s');
        $createdBY = 'CreatedBy';
        $creator = $this->db
                        ->get_where('crm_activity', array('Id' => $this->input->post('ID')))
                        ->row()->$createdBY;

        if ($creator == $sessionData['user_id']) {
            if ($this->Modulemodel->deleteItem("crm_activity", array('Id' => $parentID))) {

                $this->db->where('RelatedTo', $parentID);
                $this->db->delete('crm_tagHD');

                $array['msg'] = "Done";
            } else {
                $array['msg'] = "Fail";
            }
        } else {
            $array['msg'] = "Fail";
        }

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function updateprojectName() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');
        $json = $this->Modulemodel->updateOneData("crm_activity", array('Title' => $_POST['todoname']), array('Id' => $_POST['todoserial']));


        header('Content-type: application/json');
        echo json_encode($json);
    }

    public function userListTagHD() {

        $projectID = $this->input->post('projectID');

        $data = array();

        $data['tag'] = $this->Modulemodel->getAlltagforproject($projectID);


        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function userListTagHD2() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');
        $projectID = $this->input->post('projectID');

        $data = array();
        $array = array();
        $TagArray = array();

        $data['tag'] = $this->Modulemodel->getWorkspaceUsers($sessionData['user_id'], $sessionData['org_id']);

        $array['tag'] = $this->Modulemodel->getAlltagforproject($this->input->post('projectID'));

        if (count($array['tag']) > 0) {
            foreach ($array['tag'] as $key => $value) {
                array_push($TagArray, $value->userid);
            }
        }

        $createBy = $this->Modulemodel->get_created_by_id('crm_activity', $this->input->post('projectID'));
        //array_push($TagArray, $createBy);
        
        //$tagPos = array_search($createBy, $data['tag']);
        //$pos = array_search($createBy, $TagArray);

        //unset($data['tag'][$tagPos]);
        //unset($TagArray[$pos]);

        $data['taggedList'] = $TagArray;
        $data['createBy'] = $createBy;

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function userListTagHD2CO() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');
        $projectID = $this->input->post('projectID');

        $data = array();
        $array = array();
        $TagArray = array();

        $data['tag'] = $this->Modulemodel->getWorkspaceUsers($sessionData['user_id'], $sessionData['org_id']);

        $array['tag'] = $this->Modulemodel->getAlltagforprojectCO($this->input->post('projectID'));

        if (count($array['tag']) > 0) {

            foreach ($array['tag'] as $key => $value) {
                array_push($TagArray, $value->userid);
            }
        }

        array_push($TagArray, $this->Modulemodel->get_created_by_id('crm_activity', $this->input->post('projectID')));

        $data['taggedList'] = $TagArray;

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function SpecificUserist() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');
        $projectID = $this->input->post('projectID');

        $data = array();
        $array = array();
        $TagArray = array();

        $data['tag'] = $this->Modulemodel->getWorkspaceUsers($sessionData['user_id'], $sessionData['org_id']);

        $array['tag'] = $this->Modulemodel->getSpecificUser($this->input->post('projectID'),$this->input->post('UserStatus'));

        if (count($array['tag']) > 0) {

            foreach ($array['tag'] as $key => $value) {
                array_push($TagArray, $value->userid);
            }
        }

        array_push($TagArray, $this->Modulemodel->get_created_by_id('crm_activity', $this->input->post('projectID')));

        $data['taggedList'] = $TagArray;

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    /* Mahfuz */
    /*  Open file transfer window  */

    public function comattach($type, $ptid, $dir) {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');
        $data['id'] = $sessionData['user_id'];
        $data['user_email'] = $sessionData['user_email'];
        $data["type"] = $type;
        $data["ptid"] = $ptid;
        $title = $this->db->select("Title")->get_where("crm_activity", array("Id" => $ptid))->result();
        $data["title"] = $title[0]->Title;
        $data["dir"] = $dir;
        $data["crm_modcomments"] = true;
        $this->load->view('upload_com_file', $data);
    }

    public function deletePTTComment() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($this->db->delete('crm_message', array('id' => $_POST["id"]))) {
            $array = true;
        } else {
            $array = false;
        }
        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function delComment() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        if ($this->db->delete('crm_modcomments', array('id' => $_POST["id"]))) {
            $array = true;
        } else {
            $array = false;
        }
        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function qtipUser() {
        $array = array();

        $array['user_detail'] = $this->Modulemodel->getAll("crm_users", array("ID" => $this->input->post("user_id")));

        header('Content-Type: application/json');
        echo json_encode($array);
    }
    public function getTaskByUser() {
        $array = array();

        if ($this->input->post('type_id') == 0) {

            $array['task_detail'] = $this->Modulemodel->selectTaskByAdmin($this->input->post('pro_id'), $this->input->post('user_id'));

            $array['user_detail'] = $this->Modulemodel->getAll("crm_users", array("ID" => $this->input->post("user_id")));
        } elseif ($this->input->post('type_id') == 3) {
            $userids = explode(",", $_POST["user_id"]);

            foreach ($userids as $userid) {
                $array['task_detail'][$userid] = $this->Modulemodel->selectTaskByUser($this->input->post('pro_id'), $userid);
                $array['user_detail'][$userid] = $this->Modulemodel->getAll("crm_users", array("ID" => $userid));
            }
        } else {
            $array['task_detail'] = $this->Modulemodel->selectTaskByUser($this->input->post('pro_id'), $this->input->post('user_id'));

            $array['user_detail'] = $this->Modulemodel->getUserDetailForAssign($this->input->post("user_id"), $this->input->post("pro_id"));
        }

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    // sujon @ 3/15/2017
    public function convertSubtask() {
        if ($this->session->userdata('yeezyCRM')) {

            $arr = $this->db->get_where("crm_activity", array("Id" => $this->input->post('pid')))->row();


            $this->Modulemodel->updateOneData("crm_activity", array(
                "HasParentId" => $_POST["pid"], "Enddate" => $arr->Enddate), array('Id' => $_POST["subid"]));

            header('Content-Type: application/json');
            echo json_encode($arr);
        } else {
            redirect('login', 'refresh');
        }
    }

    // sujon @ 3/15/2017
    public function updateDueDate() {
        if ($this->session->userdata('yeezyCRM')) {
            $sessionData = $this->session->userdata('yeezyCRM');

            $data['acessType'] = $sessionData['accessType'];
            $data['id'] = $sessionData['user_id'];
            $username = $data['username'] = $sessionData['username'];
            $data['org_id'] = $sessionData['org_id'];

            $relatedTo = $_POST['parentID'];
            $type_id = $_POST['type_id'];
            $ChangeType = $_POST['ChangeType'];
            $DueDateNew = $_POST['DueDate'];


            $row_parent = $this->db->get_where("crm_activity", array("Id" => $relatedTo))->row();

            $row_rel = $this->db->get_where("crm_activity", array("Id" => $type_id))->row();

            if ($ChangeType == "SubTask") {

                $row_pro = $this->db->get_where("crm_activity", array("Id" => $row_parent->HasParentId))->row();

                $msgbody = "Project: <b>{$row_pro->Title}</b>, Task: <b>{$row_parent->Title}</b>, Subtask: <b>{$row_rel->Title}</b> due date has been changed by <b>{$username}</b>";
            } elseif ($ChangeType == "Task") {
                $msgbody = "Project: <b>{$row_parent->Title}</b>, Task: <b>{$row_rel->Title}</b> due date has been changed by <b>{$username}</b>";

                // check subtasks
                $array['taskSubtask'] = $this->db->select("*")->get_where("crm_activity", array("HasParentId" => $row_rel->Id))->result();

                if (COUNT($array['taskSubtask']) > 0) {
                    foreach ($array['taskSubtask'] as $keysub => $valsub) {

                        if (new DateTime($valsub->Enddate) > new DateTime($DueDateNew)) {

                            if ($valsub->CreatedBy != $data['id']) {

                                $inputInsertData = array(
                                    'type' => "TaskToastSub",
                                    'type_id' => $valsub->Id,
                                    'relatedTo' => $valsub->HasParentId,
                                    'org_id' => $data['org_id'],
                                    'user_id' => $valsub->CreatedBy,
                                    'notification_for' => '1',
                                    'status' => '0',
                                    'title' => "Task Due Date Change",
                                    'body' => "Project: <b>{$row_parent->Title}</b>, Task: <b>{$row_rel->Title}</b>, Subtask: <b>{$valsub->Title}</b> due date has been changed by <b>{$username}</b>",
                                    'createdby' => $data['id']
                                );

                                $arr['notification_for_subtask'] = $this->Modulemodel->insertData("crm_notification", $inputInsertData);
                            } else {

                                $array['upstatus_sub'][$key] = $this->Modulemodel->updateOneData("crm_activity", array('Enddate' => $DueDateNew), array('Id' => $valsub->Id));
                            }
                        }
                    }
                }
            }

            if (new DateTime($row_parent->Enddate) < new DateTime($DueDateNew)) {

                if ($_POST['CreatedBy'] != $data['id']) {

                    $inputInsertData = array(
                        'type' => "{$ChangeType}Toast",
                        'type_id' => $type_id,
                        'relatedTo' => $relatedTo,
                        'org_id' => $data['org_id'],
                        'user_id' => $_POST['CreatedBy'],
                        'notification_for' => '1',
                        'status' => '0',
                        'title' => "{$ChangeType} Due Date Change",
                        'body' => "$msgbody",
                        'createdby' => $data['id']
                    );

                    $arr['notification_for'] = $this->Modulemodel->insertData("crm_notification", $inputInsertData);
                } else {

                    $arr['upstatus'] = $this->Modulemodel->updateOneData("crm_activity", array('Enddate' => $DueDateNew), array('Id' => $relatedTo));
                }
            }

            header('Content-Type: application/json');
            echo json_encode($arr);
        } else {
            redirect('login', 'refresh');
        }
    }

    public function getToasts() {
        if ($this->session->userdata('yeezyCRM')) {
            $sessionData = $this->session->userdata('yeezyCRM');

            $data = array();
            $data['acessType'] = $sessionData['accessType'];
            $userid = $data['id'] = $sessionData['user_id'];
            $data['username'] = $sessionData['username'];
            $data['org_id'] = $sessionData['org_id'];

            $qry = "select * from crm_notification where (`type` LIKE '%Toast%') and user_id='$userid' and status=0";

            $data['Toasts'] = $this->db->query($qry)->result();


            //$data['Toasts'] = $this->Modulemodel->getAll("crm_notification", array('type ='=>"Toast",'user_id'=>$data['id'],'status'=>0));

            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }

    public function approveToasts() {
        if ($this->session->userdata('yeezyCRM')) {
            $sessionData = $this->session->userdata('yeezyCRM');

            $data = array();
            $data['acessType'] = $sessionData['accessType'];
            $data['id'] = $sessionData['user_id'];
            $data['username'] = $sessionData['username'];
            $data['org_id'] = $sessionData['org_id'];

            $tid = $_POST['tid'];

            $toastrow = $this->db->
            get_where('crm_notification', array('ID' => $tid))->row();

            $row_typeid = $this->db->
            get_where("crm_activity", array("Id" => $toastrow->type_id))->row();

            $row_related = $this->db->
            get_where("crm_activity", array("Id" => $toastrow->relatedTo))->row();
            
            try {                
                if ($toastrow->type == 'ProjectToast') {

                // update task
                    $this->Modulemodel->updateOneData("crm_activity", array('Enddate' => $row_related->Enddate), array('Id' => $row_typeid->Id));

                // update subtasks
                    $this->Modulemodel->updateOneData("crm_activity", array('Enddate' => $row_related->Enddate), array('HasParentId' => $row_typeid->Id, 'Type' => 'SubTask'));
                } elseif ($toastrow->type == 'TaskToast') {

                    $this->Modulemodel->updateOneData("crm_activity", array('Enddate' => $row_typeid->Enddate), array('Id' => $row_related->Id));
                } elseif ($toastrow->type == 'TaskToastSub') {

                    $this->Modulemodel->updateOneData("crm_activity", array('Enddate' => $row_related->Enddate), array('Id' => $row_typeid->Id));
                } elseif ($toastrow->type == 'SubTaskToast') {

                    $this->Modulemodel->updateOneData("crm_activity", array('Enddate' => $row_typeid->Enddate), array('Id' => $row_related->Id));
                }
            } catch (Exception $e) {
                $data['response_error']=$e->getMessage();
            }

            $data['response2'] = $this->Modulemodel->updateOneData("crm_notification", array("status" => 1), array('ID' => $tid));


            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }

    public function rejectToasts() {
        if ($this->session->userdata('yeezyCRM')) {
            $sessionData = $this->session->userdata('yeezyCRM');

            $data = array();
            $data['acessType'] = $sessionData['accessType'];
            $data['id'] = $sessionData['user_id'];
            $data['username'] = $sessionData['username'];
            $data['org_id'] = $sessionData['org_id'];

            $tid = $_POST['tid'];

            $toastrow = $this->db->
                            get_where('crm_notification', array('ID' => $tid))->row();

            $row_typeid = $this->db->
                            get_where("crm_activity", array("Id" => $toastrow->type_id))->row();

            $row_related = $this->db->
                            get_where("crm_activity", array("Id" => $toastrow->relatedTo))->row();

            if ($toastrow->type == 'ProjectToast') {

                // update task
                $this->Modulemodel->updateOneData("crm_activity", array('Enddate' => $row_typeid->Enddate), array('Id' => $row_related->Id));

                // update subtasks
                $this->Modulemodel->updateOneData("crm_activity", array('Enddate' => $row_typeid->Enddate), array('HasParentId' => $row_related->Id, 'Type' => 'SubTask'));
            } elseif ($toastrow->type == 'TaskToast') {

                $this->Modulemodel->updateOneData("crm_activity", array('Enddate' => $row_related->Enddate), array('Id' => $row_typeid->Id));
            } elseif ($toastrow->type == 'TaskToastSub') {

                $this->Modulemodel->updateOneData("crm_activity", array('Enddate' => $row_typeid->Enddate), array('Id' => $row_related->Id));
            } elseif ($toastrow->type == 'SubTaskToast') {

                $this->Modulemodel->updateOneData("crm_activity", array('Enddate' => $row_related->Enddate), array('Id' => $row_typeid->Id));
            }

            $data['response2'] = $this->Modulemodel->updateOneData("crm_notification", array("status" => 1), array('ID' => $tid));

            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }

    public function openSubscription($uid = FALSE, $notiid = FALSE) {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');

        $data['id'] = $sessionData['user_id'];
        $data['user_email'] = $sessionData['user_email'];
        $data['numOfFiles'] = 10;

        $data['result'] = $this->db->select("*")->get_where("crm_users", array("ID" => $data['id']))->result();

        $data['feedinterval'] = $this->Crud_model->refreshFeedIntervl($data['id']);


        $this->load->view('addsuscription', $data);
    }

    public function addsubscription() {

        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');
        $data['id'] = $sessionData['user_id'];
        $data['user_email'] = $sessionData['user_email'];

        $out = array();
        $subsList = $this->input->post('npName');

        if ($subsList != "") {
            foreach ($subsList as $name => $value) {
                array_push($out, $value);
            }
        }

        $newconStr = implode(',', $out);

        $data['List'] = $newconStr;

        $data['updateResponse'] = $this->Modulemodel->updateOneData("crm_users", array(
            "user_preferences" => $newconStr), array('ID' => $data['id']));

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function addApplicationsubscription() {

        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        $sessionData = $this->session->userdata('yeezyCRM');
        $data['id'] = $sessionData['user_id'];
        $data['user_email'] = $sessionData['user_email'];

        $out = array();
        $subsList = $this->input->post('npName');
        $selectInterval = $this->input->post('selectInterval');
        

        if ($subsList != "") {
            foreach ($subsList as $name => $value) {
                array_push($out, $value);
            }
        }


        $newconStr = implode(',', $out);

        $data['List'] = $newconStr;

        $data['updateResponse'] = $this->Modulemodel->updateOneData("crm_users", array(
            "user_Application_subs" => $newconStr, "refreshfeed" => $selectInterval), array('ID' => $data['id']));

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    //  public function import_file(){
    //      if ($this->session->userdata('yeezyCRM')) {
    //          $qstring = array();
    //          $sessionData = $this->session->userdata('yeezyCRM');
    // $data['acessType'] = $sessionData['accessType'];
    // $data['id'] = $sessionData['user_id'];
    // $data['org_id'] = $sessionData['org_id'];
    // $data['username'] = $sessionData['username'];
    // $data['user_img'] = $sessionData['user_img'];
    //          $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
    //          if(!empty($_FILES['file']['name'])){
    //              if(is_uploaded_file($_FILES['file']['tmp_name'])){
    //                  if($_FILES['file']['type'] == 'text/csv'){
    //                      //open uploaded csv file with read only mode
    //                      $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
    //                      // skip first line
    //                      // if your csv file have no heading, just comment the next line
    //                      fgetcsv($csvFile);
    //                      //parse data from csv file line by line
    //                      while(($line = fgetcsv($csvFile)) !== FALSE){
    //                          $inputdata = array(
    //                              "Type" => 'Project',
    // 					"Title" => $line[0],
    // 					"Description" => $line[1],
    // 					"Startdate" => $line[2],
    // 					"Enddate" => $line[3],
    // 					"CreatedBy" => $data['id'],
    // 					"CreatedDate" => $currrentDate,
    // 					"HasParentId" => 0,
    // 					"Workspaces" => $data['org_id']
    //                          );
    //                          $this->m_project->insertData('project_summary',$inputdata);
    //                      }
    //                      //close opened csv file
    //                      fclose($csvFile);
    //                      $qstring["status"] = 'Success';
    //                  }else if($_FILES['file']['type'] == 'application/excel' || $_FILES['file']['type'] == 'application/vnd.ms-excel' || $_FILES['file']['type'] == 'application/vnd.msexcel' || $_FILES['file']['type'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'){
    //                      $objPHPExcel = PHPExcel_IOFactory::load($_FILES['file']['tmp_name']);
    //                      foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    //                          $worksheetTitle     = $worksheet->getTitle();
    //                          $highestRow         = $worksheet->getHighestRow(); // e.g. 10
    //                          $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
    //                          $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    //                          $nrColumns = ord($highestColumn) - 64;
    //                          for ($row = 2; $row <= $highestRow; ++ $row) {
    //                              $val=array();
    //                              for ($col = 0; $col < $highestColumnIndex; ++ $col) {
    //                                  $cell = $worksheet->getCellByColumnAndRow($col, $row);
    //                                  $val[] = $cell->getValue();
    //                              }
    //                              $sql="Insert into project_summary (pro_id,level,type, thickness,qty,area,cost_effiency_rate) values('".$this->input->post('ProID')."','".$this->input->post('Level')."', '".$val[0]."', '".$val[1]."', '".$val[2]."', '".$val[3]."', '".$val[4]."')";
    //                                  $res = $this->db->query($sql);
    //                                  $qstring['header'] = $res;
    //                          }
    //                      }
    //                  }
    //              }else{
    //                  $qstring["status"] = 'Error';
    //              }
    //          }else{
    //              $qstring["status"] = 'Invalid file';
    //          }
    //          header("Content-Type: application/json; charset=utf-8", true);
    //          echo json_encode($qstring);
    //      }else{
    //          $this->load->view('auth/v_admin_login');
    //      }
    //  }

    public function selectIntervalData() {
        $this->load->model("Crud_model");
        $data = $this->Crud_model->refreshFeedIntervl($_POST['user_id']);
        echo json_encode($data);
    }


    /*public function shareWithOther(){
        if ($this->session->userdata('admin_login') == 1) {
            $sessionData = $this->session->userdata('yeezyCRM');
            
            //Is this activity type shared or not
            $this->isShared($this->input->post('activity_id'));

            $sub = $_POST["inviteTitle"];
            $name = $_POST["inviteFullName"];
            $salutation = explode(" ", $_POST["emailsendtoname"]);
            foreach($_POST["inviteEmail"] as $k=>$to){
                $already_user = $this->db->get_where("crm_users", array("email"=>$to))->result();
                if(count($already_user)==0){
                    // New guest user
                    $crm_users_data = array(
                        "user_name"=>$to,
                        "user_password"=>'notset',
                        "full_name"=>$name[$k],
                        "display_name"=>$salutation[$k+1],
                        "org_id"=>$sessionData["org_id"],
                        "email"=>$to,
                        "access_type"=>"GUEST",
                        "status"=>"ACTIVE");
                    $this->db->insert("crm_users", $crm_users_data);
                    $uid = $this->db->insert_id();

                    $this->db->insert("crm_workspace", array("user_id"=>$uid, "workspace"=>$sessionData["org_id"]));
                    $this->db->insert("crm_notification_setup", array("user_id"=>$uid));
                    
                }
                else{
                    $uid = $already_user[0]->ID;
                }

                $this->isActivityShare($this->input->post('activity_id'), $uid);

                $link_str = strrev(base64_encode($uid."/".$sessionData['org_id']."/".$name[$k]."/".$to."/".$_POST["activity_id"]."/".$_POST["activity_type"]));
            
                $link = base_url()."projects/share_projects/".$link_str;
                $replace = '<a href="'.$link.'" target="_blank" class="Inviteetitle">'.$_POST["linkTitle"].'</a>';

                $msg_body = str_replace($_POST["linkTitle"], $replace, $_POST["emailbody"]);
                
                

                switch ($_POST["activity_type"]) {
                    case 'Sub Task':
                        $task_id = $this->db->select("HasParentId")->get_where("crm_activity", array("Id"=>$_POST["activity_id"]))->result();
                        $project_id = $this->db->select("HasParentId")->get_where("crm_activity", array("Id"=>$task_id[0]->HasParentId))->result();
                        $page_data["share_subtask_id"] = $_POST["activity_id"];
                        $page_data["share_task_id"] = $task_id[0]->HasParentId;
                        $page_data["share_project_id"] = $project_id[0]->HasParentId;
                        break;
                    case 'Task':
                        $project_id = $this->db->select("HasParentId")->get_where("crm_activity", array("Id"=>$_POST["activity_id"]))->result();
                        $page_data["share_subtask_id"] = 0;
                        $page_data["share_task_id"] = $_POST["activity_id"];
                        $page_data["share_project_id"] = $project_id[0]->HasParentId;
                        break;
                }

                $pid = $page_data["share_project_id"];
                $hasTag = $this->db->get_where("crm_tagHD", array("RelatedTo"=>$pid, "userid"=>$uid))->result();
                if(count($hasTag) == 0){
                    $this->db->insert("crm_tagHD", array("RelatedTo"=>$pid, "UserStatus"=>5, "Type"=>"Porject", "userid"=>$uid, "assignBy"=>$sessionData["user_id"]));
                }

                if($this->Email_model->do_email($to, $salutation[$k+1], $sub, $msg_body,'', false, $salutation[0]))
                    $data["result"][] = true;
            }
            if(count($data["result"]) == count($_POST["inviteEmail"]))
                echo json_encode($data);
            else
                echo json_encode(false);
        }
    }

    function isShared($activityID){
        
        $projectname = 'isShared';
        $sharedValue = $this->db
                            ->get_where('crm_activity', array('Id' => $activityID))
                            ->row()->$projectname;
        if($sharedValue == 0){
            $this->Modulemodel->updateOneData('crm_activity', array("isShared" => '1') , array('Id'=>$activityID ));
        }

    }

    function isActivityShare($aid, $uid){
        $yes = $this->db->get_where("crm_activityShare", array("activityID"=>$aid, "user_id"=>$uid))->result();
        if(count($yes) < 1){
            $this->db->insert("crm_activityShare", array("activityID"=>$aid, "user_id"=>$uid));
        }
    }

    public function share_projects($base_encode) {
            $raw_url = explode("/", base64_decode(strrev($base_encode)));
            $page_data['id'] = $raw_url[0];
            $page_data['org_id'] = $raw_url[1];
            $page_data['username'] = $raw_url[2];
            $page_data['user_email'] = $raw_url[3];
            $page_data['shared_activity_id'] = $raw_url[4];
            $page_data['type'] = $raw_url[5];
            switch ($raw_url[5]) {
                case 'Sub Task':
                    $task_id = $this->db->select("HasParentId")->get_where("crm_activity", array("Id"=>$raw_url[4]))->result();
                    $project_id = $this->db->select("HasParentId")->get_where("crm_activity", array("Id"=>$task_id[0]->HasParentId))->result();
                    $page_data["share_subtask_id"] = $raw_url[4];
                    $page_data["share_task_id"] = $task_id[0]->HasParentId;
                    $page_data["share_project_id"] = $project_id[0]->HasParentId;
                    break;
                case 'Task':
                    $project_id = $this->db->select("HasParentId")->get_where("crm_activity", array("Id"=>$raw_url[4]))->result();
                    $page_data["share_subtask_id"] = 0;
                    $page_data["share_task_id"] = $raw_url[4];
                    $page_data["share_project_id"] = $project_id[0]->HasParentId;
                    break;
            }
            $newdata = array(
                'username'  => $page_data['username'],
                'org_id' => $page_data['org_id'],
                'user_email' => $page_data['user_email'],
                'user_img' => 'male.png',
                'user_id' => $page_data['id']
            );
            $this->session->sess_destroy();
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('yeezyCRM',$newdata);

            $page_data['user_img'] = "male.png";

            $page_data['page_name'] = 'projects';
            $page_data['page_title'] = 'Projects Dashboard';

            $page_data['DashboardEvents'] = $this->calendarmodel->getDashboardCalendar($page_data['id'], $page_data['org_id'], 'Event');
            $page_data['projectGroup'] = $this->Modulemodel->getAll("crm_project_group", array('org_id' => $page_data['org_id']));
            $page_data['client'] = $this->Modulemodel->getAll("crm_contactdetails");


            $page_data['projectstatus'] = $this->Modulemodel->getAll("crm_projectstatus", array('picklist_valueid' => '0'));
            $page_data['projecttasktype'] = $this->Modulemodel->getAll("crm_projecttasktype");
            $page_data['ticketpriorities'] = $this->Modulemodel->getAll("crm_ticketpriorities");
            $page_data['projecttaskprogress'] = $this->Modulemodel->getAll("crm_projecttaskprogress");
            //$page_data['users'] = $this->Modulemodel->getAllUsersWithoutMe($page_data['id']);
            $page_data['users'] = $this->Modulemodel->getWorkspaceUsersWithoutMe($page_data['id'], $page_data['org_id']);
            $page_data['alluser'] = $this->Modulemodel->getWorkspaceUsers($page_data['id'], $page_data['org_id']);
            $page_data['allusers'] = $this->db->select('ID, full_name,img')->get('crm_users')->result_array();



            $page_data['allprojects'] = $this->Modulemodel->getAllprojects($page_data['org_id'], $page_data['id']);
            
            $this->load->view('projects', $page_data);
    }

    public function get_share_projects($uid, $pid) {
        $array = array();
        $projectArray = array();
        $array['tasklist'] = array();
        $array['projectIDlist'] = array();
        $array['TotalTask'] = array();
        $array['PendingTask'] = array();
        $array['unsennsommnet'] = array();
        $array['unsennFile'] = array();
        $array["id"] = $uid;
        $array['projects'] = $this->db->query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as display_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp WHERE cp.Id ='".$pid."'")->result();

        foreach ($array['projects'] as $key => $value) {
            $TaskResult = $this->Modulemodel->getAllMyTaskLatestThree($array["id"], $value->Id);
            $TotalTask = $this->Modulemodel->getAllMyTaskLatest($array["id"], $value->Id);
            $PendingTask = $this->Modulemodel->getAllMyTaskLatestPending($array["id"], $value->Id);
            $unsennsommnet = $this->Modulemodel->getUnseenComment($value->Id, $array["id"], 'Project');
            $unsennFile = $this->Modulemodel->getUnseenComment($value->Id, $array["id"], 'File');

            array_push($array['tasklist'], $TaskResult);
            array_push($array['projectIDlist'], $value->Id);
            array_push($array['TotalTask'], $TotalTask);
            array_push($array['PendingTask'], $PendingTask);
            array_push($array['unsennsommnet'], $unsennsommnet);
            array_push($array['unsennFile'], $unsennFile);
        }

        header('Content-Type: application/json');
        echo json_encode($array);
    }*/

    public function taskListNew() {
        $ara = array();

        $ara['nty_chat'] = array();
        $ara['unsennsommnet'] = array();
        $ara['unsennFile'] = array();
        $ara['allTask'] = array();
        $ara['totalSubTask'] = array();

        if ($this->session->userdata('admin_login') == 1){
            $sessionData = $this->session->userdata('yeezyCRM');
            $data['acessType'] = $sessionData['accessType'];
            $data['id'] = $sessionData['user_id'];
            $data['username'] = $sessionData['username'];
            $data['org_id'] = $sessionData['org_id'];
            $share_task_id = 0;
        }else{
            $data['id'] = $_POST["id"];
            $data['org_id'] = $_POST["org_id"];
            $share_task_id = $_POST["tid"];
        }

        $pro_id = $_POST["pro_id"];
        $order = $_POST["order"];
        $status = $_POST["status"];

        if($share_task_id > 0){
            $ara['allTask'] = $this->db->query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as creator_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp WHERE cp.Id = '".$share_task_id."'")->result();
        }
        else if ($status == 'Completed Tasks') {
            $ara['allTask'] = $this->Modulemodel->getAllprojectTaskscomplete($data['org_id'], $data['id'], $pro_id, $order);
        } else if ($status == 'Incomplete Tasks') {
            $ara['allTask'] = $this->Modulemodel->getAllprojectTasksincomplete($data['org_id'], $data['id'], $pro_id, $order);
        } else if ($status == 'Completed Sub Tasks') {
            $ara['checkTask'] = $this->Modulemodel->getAllprojectTasks($data['org_id'], $data['id'], $pro_id, $order);
            foreach ($ara['checkTask'] as $key => $value) {
                if ($this->Modulemodel->hassubtask($value->Id) == TRUE) {
                    $gettask = $this->Modulemodel->getTaskDtl($value->Id);
                    array_push($ara['allTask'], $gettask[0]);
                }
            }
        } else if ($status == 'Incomplete Sub Tasks') {
            $ara['checkTask'] = $this->Modulemodel->getAllprojectTasks($data['org_id'], $data['id'], $pro_id, $order);

            foreach ($ara['checkTask'] as $key => $value) {
                if ($this->Modulemodel->hassubtask($value->Id) == TRUE) {
                    $gettask = $this->Modulemodel->getTaskDtl($value->Id);
                    array_push($ara['allTask'], $gettask[0]);
                }
            }
        } else {
            $ara['allTask'] = $this->Modulemodel->getAllprojectTasksEnd($data['org_id'], $data['id'], $pro_id, $order);
        }


        foreach ($ara['allTask'] as $key => $value) {
            $TaskUser = $this->Modulemodel->haseuser($value->Id);
            $unsennsommnet = $this->Modulemodel->getUnseenComment($value->Id, $data['id'], 'Task');
            $unsennFile = $this->Modulemodel->getUnseenComment($value->Id, $data['id'], 'File');
            $totalSubTask = $this->Modulemodel->countTotalSubtask($value->Id);

            array_push($ara['nty_chat'], $TaskUser);
            array_push($ara['unsennsommnet'], $unsennsommnet);
            array_push($ara['unsennFile'], $unsennFile);
            array_push($ara['totalSubTask'], $totalSubTask[0]);
        }

        $ara['allTaskTag'] = $this->Modulemodel->getAll('crm_taskTag');
        $ara['allAttach'] = $this->Modulemodel->getAll('crm_file', array('proID' => $pro_id));
        $ara['allTasklist'] = $this->Modulemodel->getAllprojectTasks($data['org_id'], $data['id'], $pro_id, $order);
        $ara['alldate'] = $this->Modulemodel->alldate($pro_id);
        $ara['get_comptable'] = $this->Modulemodel->getProCompData($pro_id);

        //$ara['countsubtask'] = $this->Modulemodel->getnoofsubtaskintask($pro_id);
        $ara['creator'] = $this->Modulemodel->getcreatorproject($pro_id);
        $ara['proStatus'] = $this->Modulemodel->getAll('crm_projectstatus', array('picklist_valueid' => $pro_id));
        $ara['proTime'] = $this->Modulemodel->getAll('crm_activity', array('Id' => $_POST["pro_id"]));
        
        header('Content-Type: application/json');
        echo json_encode($ara);
    }

    public function subtaskListNew() {
        $ara = array();
        $ara['nty_chat'] = array();
        if ($this->session->userdata('admin_login') == 1){
            $sessionData = $this->session->userdata('yeezyCRM');
            $data['acessType'] = $sessionData['accessType'];
            $data['id'] = $sessionData['user_id'];
            $data['username'] = $sessionData['username'];
            $data['org_id'] = $sessionData['org_id'];
            $subtaskid= 0;
        }else{
            $data['id'] = $_POST["id"];
            $data['org_id'] = $_POST["org_id"];
            $subtaskid = $_POST["stid"];
        }        
        $ara['taskID'] = $this->input->post('taskID');
        $ara['id'] = $data['id'];
        
        if($subtaskid>0 AND isset($_POST["stid"]))
            $ara['allSubTask'] = $this->db->query("SELECT cp.*, (SELECT full_name FROM crm_users WHERE ID = CreatedBy) as creator_name, (SELECT img FROM crm_users WHERE ID = CreatedBy) as img, (SELECT img FROM crm_users WHERE ID = CreatedBy) as createdBy_img FROM crm_activity as cp WHERE cp.Id = '".$subtaskid."' AND isDelete = '1'")->result();
        else
            $ara['allSubTask'] = $this->Modulemodel->getSubtasksNew($data['id'], $this->input->post('taskID'));

        foreach ($ara['allSubTask'] as $key => $value) {
            $TaskUser = $this->Modulemodel->haseuser($value->Id);
            array_push($ara['nty_chat'], $TaskUser);
        }

        $ara['proTime'] = $this->Modulemodel->getAll('crm_activity', array('Id' => $this->input->post('proid')));

        $ara['taskTime'] = $this->Modulemodel->getAll('crm_activity', array('Id' => $this->input->post('taskID')));

        header('Content-Type: application/json');
        echo json_encode($ara);
    }

    /*public function getSharedUserList(){
        $aid = $_POST["aid"];
        $data["status"] = false;
        $data["all_activity_share_list"] = $this->db->select("cas.*, cu.full_name, cu.email, cu.img")
                                            ->from("crm_activityShare as cas")
                                            ->join("crm_users as cu","cu.ID = cas.user_id")
                                            ->where("cas.activityID", $aid)
                                            ->get()
                                            ->result();
        if(count($data["all_activity_share_list"])){
            $data["status"] = true;
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function findNsetShareList(){
        $data["old_share_list"] = $this->db->get_where("activity_share_user", array("activityID"=>$_POST["aid"]))->result();
        header('Content-Type: application/json');
        echo json_encode($data);   
    }*/

    
    public function import_file(){
        if ($this->session->userdata('yeezyCRM')) {
            
            $sessionData = $this->session->userdata('yeezyCRM');
            $data['acessType'] = $sessionData['accessType'];
            $data['id'] = $sessionData['user_id'];
            $data['org_id'] = $sessionData['org_id'];
            $data['username'] = $sessionData['username'];
            $data['user_img'] = $sessionData['user_img'];
            $data['assData'] = array();
            
            $currrentDate = date('Y-m-d H:i:s');

            $array = array();
            $arr_pro = array();
            $qstring = array();
            $proData = array();

            $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
            if(!empty($_FILES['file']['name'])){
                
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    //open uploaded csv file with read only mode
                    
                    $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                    // skip first line
                    // if your csv file have no heading, just comment the next line
                    
                    fgetcsv($csvFile);
                    //parse data from csv file line by line
                    
                    while(($line = fgetcsv($csvFile)) != FALSE){
                        
                        if (in_array($line[9], $proData)){
                          // Nothing;
                        }else{
                            array_push($proData, $line[9]);
                            
                            if($line[9] !=""){
                                $inputdata = array(
                                    "Type" => 'Project',
                                    "Title" => $line[9],
                                    "Description" => '',
                                    "Startdate" => $currrentDate,
                                    "Enddate" => $currrentDate,
                                    "CreatedBy" => $data['id'],
                                    "CreatedDate" => $currrentDate,
                                    "HasParentId" => 0,
                                    "Workspaces" => $data['org_id'],
                                    "importLevel" => '1',
                                    );

                                $data["activityid"] = $this->Modulemodel->insertData("crm_activity", $inputdata);

                                $arr_pro[$data["activityid"]] = $line[9];

                                $inputInsertData = array(
                                    'type' => 'Project',
                                    'type_id' => $data["activityid"],
                                    'relatedTo' => '',
                                    'org_id' => $data['org_id'],
                                    'user_id' => 0,
                                    'notification_for' => '1',
                                    'status' => '0',
                                    'title' => 'New Project',
                                    'body' => $line[9],
                                    'createdby' => $data['id']
                                );

                                $this->Modulemodel->insertData("crm_notification", $inputInsertData);
                            }
                        }



                        $date = date('Y-m-d H:i:s');

                        if($line[9]==""){
                                // create todo
                            $inputdatatodo = array(
                                "Type" => 'Todo',
                                "Title" => $line[4],
                                "Description" => $line[8],
                                "Startdate" => $date,
                                "Enddate" => ($line[6] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($line[6])),
                                "Duration" => '1',
                                "Status" => 'initiated',
                                "Priority" => 'Medium',
                                "CreatedBy" => $data['id'],
                                "CreatedDate" => ($line[1] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($line[1])),
                                "CompletedAt" => ($line[2] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($line[2])),
                                "LastModified" => ($line[3] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($line[3])),
                                "HasGroup" => '',
                                "HasClient" => '',
                                "HasParentId" => 0,
                                "Workspaces" => $data['org_id'],
                                "importLevel" => '1'
                                );

                            $data['new_todoid'] = $this->Modulemodel->insertData("crm_activity", $inputdatatodo);
                        }else{
                            
                            if($line[10] == "") $taskname=$line[4];
                            else $taskname=$line[10];

                            $taskcheck = $this->db->query("SELECT * FROM crm_activity WHERE Title = '".$taskname."' AND HasParentId = '".array_search($line[9],$arr_pro)."'");

                            if($taskcheck->num_rows()==0){
                                // create task 

                                $inputdatatask = array(
                                    "Type" => 'Task',
                                    "Title" => $taskname,
                                    "Description" => $line[8],
                                    "Startdate" => $date,
                                    "Enddate" => ($line[6] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($line[6])),
                                    "Duration" => '1',
                                    "Status" => 'none',
                                    "CreatedBy" => $data['id'],
                                    "CreatedDate" => ($line[1] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($line[1])),
                                    "CompletedAt" => ($line[2] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($line[2])),
                                    "LastModified" => ($line[3] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($line[3])),
                                    "HasGroup" => '',
                                    "HasClient" => '',
                                    "HasParentId" => array_search($line[9],$arr_pro),
                                    "Workspaces" => $data['org_id'],
                                    "importLevel" => '1'
                                    );


                                $data["taskInsertID"] = $this->Modulemodel->insertData("crm_activity", $inputdatatask);
                            }else{
                                $data["taskInsertID"] = $taskcheck->row()->Id;
                            }

                            if($line[10] != ""){

                                $inputdatasub = array(
                                    "Type" => 'SubTask',
                                    "Title" => $line[4],
                                    "Description" => $line[8],
                                    "Startdate" => $date,
                                    "Enddate" => ($line[6] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($line[6])),
                                    "Duration" => '1',
                                    "hour" => '',
                                    "Status" => 'none',
                                    "CreatedBy" => $data['id'],
                                    "CreatedDate" => ($line[1] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($line[1])),
                                    "CompletedAt" => ($line[2] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($line[2])),
                                    "LastModified" => ($line[3] =="") ? "0000-00-00 00:00:00" :  date('Y-m-d H:i:s', strtotime($line[3])),
                                    "HasGroup" => '',
                                    "HasClient" => '',
                                    "HasParentId" => $data["taskInsertID"],
                                    "Workspaces" => $data['org_id'],
                                    "importLevel" => '1'
                                    );

                                $data["insertID"] = $this->Modulemodel->insertData("crm_activity", $inputdatasub);
                            }
                        }

                        $inputHDdata1 = array();

                        if($line[9] != "" && $line[10] != ""){
                            $tagparent= $data["insertID"];
                            $tagtype= 'SubTask';
                        }elseif ($line[9] == "") {

                            $tagparent= $data['new_todoid'];
                            $tagtype= 'Todo';
                            
                        }
                        else {
                            $tagparent= $data["taskInsertID"];
                            $tagtype= 'Task';
                        }

                        $arr_assg=explode(",", $line[5]);

                        array_push($data['assData'], $arr_assg);
                        foreach ($arr_assg as $ke => $val) {

                            $usercheck = $this->db->query("SELECT * FROM crm_users WHERE display_name = '".$val."'");

                            if($usercheck->num_rows() > 0){
                                $inputHDdata1[] = array(
                                    'RelatedTo' => $tagparent,
                                    'UserStatus' => '2',
                                    'TagDate' => $date,
                                    'Type' => $tagtype,
                                    'userid' => $usercheck->row()->ID,
                                    'assignBy' => $data['id']
                                    );
                            }
                        }
                        if($line[5] !=""){
                            $this->Modulemodel->insertbatchinto("crm_tagHD", $inputHDdata1);
                        }

                    }

                    //close opened csv file
                    fclose($csvFile);
                    $qstring["status"] = $proData;
                
                }else{
                    $qstring["status"] = 'Error';
                }
            }else{
                $qstring["status"] = 'Invalid file';
            }
            
            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($qstring);

        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function updateStatus(){
        if ($this->session->userdata('yeezyCRM')) {
            
            $array = array();
            $vlu = array(
                "comment" => $this->input->post("comment")
            );

            if ($this->Modulemodel->updateOneData('crm_modcomments', $vlu, array('id' => $this->input->post("comid")))) {
                $array['msg'] = "Done";
            } else {
                $array['msg'] = "Fail";
            }

            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($array);

        }else{
            $this->load->view('auth/v_admin_login');
        }
    }

    public function deleteNotification(){
        if ($this->session->userdata('yeezyCRM')) {
            $sessionData = $this->session->userdata('yeezyCRM');
            $data['acessType'] = $sessionData['accessType'];
            $data['id'] = $sessionData['user_id'];
            $data['org_id'] = $sessionData['org_id'];
            $array = array();
            
            $where = "(parent = '".$this-> input->post('typeid')."' OR typeid = '".$this-> input->post('typeid')."')  AND userid = '".$data['id']."'";
            $this->db->where($where);

            $array['MSG'] =$this->db->delete('crm_temp_tbl');
            
            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($array);

        }else{
            $this->load->view('auth/v_admin_login');
        }
        
    } 



    public function getfeedUpdte(){
        $array = array();
        $projectArray = array();

        $sessionData = $this->session->userdata('yeezyCRM');

        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['org_id'] = $sessionData['org_id'];

        $array['getTotalNot'] = $this->db->where('userid',$data['id'])
                                         ->where('parentType !=', 'chatMsg')
                                         ->count_all_results('crm_temp_tbl');

        $array['getTotalChat'] = $this->db->where('userid',$data['id'])
                                         ->where('parentType', 'chatMsg')
                                         ->count_all_results('crm_temp_tbl');
        header("Content-Type: application/json; charset=utf-8", true);
        echo json_encode($array);
    }

    public function deletechatmsgNot(){
        $sessionData = $this->session->userdata('yeezyCRM');
        $array = array();
        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['org_id'] = $sessionData['org_id']; 
        
        $where = "parentType = 'chatMsg' AND userid = '".$data['id']."'";
        $this->db->where($where);
        $array['MSG'] =$this->db->delete('crm_temp_tbl');
        header("Content-Type: application/json; charset=utf-8", true);
        echo json_encode($array);
    }

    public function deleteNotOnscroll(){
        $sessionData = $this->session->userdata('yeezyCRM');
        $array = array();
        $data['acessType'] = $sessionData['accessType'];
        $data['id'] = $sessionData['user_id'];
        $data['org_id'] = $sessionData['org_id']; 
        $limit = $this->input->post('limit');
        
        $where = "parentType != 'chatMsg' AND userid = '".$data['id']."' LIMIT ".$limit;
        $this->db->where($where);
        $array['MSG'] =$this->db->delete('crm_temp_tbl');
        header("Content-Type: application/json; charset=utf-8", true);
        echo json_encode($array);
    }

    // sujon @ 7/3/2017
    public function addNewContactType(){

        if ($this->session->userdata('yeezyCRM')) {
            $sessionData = $this->session->userdata('yeezyCRM');
            $currrentDate = date('Y-m-d H:i:s');

            $inputdata = array(
                "contacttype" => $_POST['isNew'],
                "CreatedDate" => $currrentDate,
                "CreatedBy" => $sessionData['user_id'],
                "Workspaces" => $sessionData['org_id']
                );

            $data["id"] = $this->Modulemodel->insertData("crm_contacttype", $inputdata);

            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($data);

        }else{
            $this->load->view('auth/v_admin_login');
        }

    }

    public function addNewProContact(){

        if ($this->session->userdata('yeezyCRM')) {
            $sessionData = $this->session->userdata('yeezyCRM');
            $currrentDate = date('Y-m-d H:i:s');
            if($_POST['mode']=='edit'){

                $ContactPic = 'ContactPic';
                $attachment_new=$fileold = $this-> db
                -> get_where('crm_activity_contacts',array('Id'=>$this->input->post('js_contact_id')))
                -> row()->$ContactPic;
            }else{
                $attachment_new = "";
            }
            
            if(!empty($_FILES['theFile']["name"]) ){
                if($_POST['mode']=='edit'){
                    
                   unlink("./uploads/contactImages/".$fileold);  
                }
                
                if (!is_dir("./uploads/contactImages/")) {
                    mkdir('./uploads/contactImages', 0777, TRUE);
                }

                $path_parts = pathinfo($_FILES["theFile"]["name"]);
                $extension = $path_parts['extension'];

                $attachment_new = ("CI_" . $sessionData['user_id'] . "_". time(). "." . $extension);
                
                $config['upload_path'] = "./uploads/contactImages";
                $config['allowed_types'] = 'JPEG|jpg|png';
                $config['file_name'] = $attachment_new;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload("theFile")) {
                    $data["upload"]=true;
                    
                } else {
                    $data["upload"]=false;
                }
            }else{
                
            }

            $inputdata = array(
                "FullName" => $_POST['FullName'],
                "Company" => $_POST['Company'],
                "JobTitle" => $_POST['JobTitle'],
                "Email" => $_POST['js_newcon_email'],
                "Email2" => $_POST['js_newcon_email2'],
                "Email3" => $_POST['js_newcon_email3'],
                "Number_Assistant" => $_POST['js_newphn_assistant'],
                "Number_Business" => $_POST['js_newphn_business'],
                "Number_Business2" => $_POST['js_newphn_business2'],
                "Number_BusinessFax" => $_POST['js_newphn_businessfax'],
                "Number_Callback" => $_POST['js_newphn_callback'],
                "Number_Car" => $_POST['js_newphn_car'],
                "Number_Company" => $_POST['js_newphn_company'],
                "Number_Home" => $_POST['js_newphn_home'],
                "Number_Home2" => $_POST['js_newphn_home2'],
                "Number_HomeFax" => $_POST['js_newphn_homefax'],
                "Number_ISDN" => $_POST['js_newphn_isdn'],
                "Number_Mobile" => $_POST['js_newphn_mobile'],
                "Number_Other" => $_POST['js_newphn_other'],
                "Number_OtherFax" => $_POST['js_newphn_otherfax'],
                "Number_Pager" => $_POST['js_newphn_pager'],
                "Number_Primary" => $_POST['js_newphn_primary'],
                "Number_Radio" => $_POST['js_newphn_radio'],
                "Number_Telex" => $_POST['js_newphn_telex'],
                "Number_TTYTDD" => $_POST['js_newphn_ttytdd'],
                "Address_Business" => $_POST['js_newaddr_business'],
                "Address_Home" => $_POST['js_newaddr_home'],
                "Address_Other" => $_POST['js_newaddr_other'],
                "Address_Mailing" => $_POST['js_newaddr_mailing'],
                "ContactPic" => $attachment_new,
                "Details_Department" => $_POST['Details_Department'],
                "Details_Office" => $_POST['Details_Office'],
                "Details_Profession" => $_POST['Details_Profession'],
                "Details_ManagersName" => $_POST['Details_ManagersName'],
                "Details_AssistantsName" => $_POST['Details_AssistantsName'],
                "Details_Nickname" => $_POST['Details_Nickname'],
                "Details_Title" => $_POST['Details_Title'],
                "Details_Suffix" => $_POST['Details_Suffix'],
                "Details_Spouse" => $_POST['Details_Spouse'],
                "CreatedBy" => $sessionData['user_id'],
                "CreatedDate" => $currrentDate,
                "Workspaces" => $sessionData['org_id'],
                "ContactTypeId" => $_POST['contacttypeid'],
                "ParentId" => $_POST['projectID'],
                "Selections" => $_POST['json_mySelections']
                );

            if($_POST['mode']=='add'){
                $data["id"] = $this->Modulemodel->insertData("crm_activity_contacts", $inputdata);
            }else{

               

               $data["id"] = $this->Modulemodel->updateOneData('crm_activity_contacts',$inputdata , array('Id'=>$_POST['js_contact_id'] ));
            }
            

            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($data);

        }else{
            $this->load->view('auth/v_admin_login');
        }

    }

    public function del_ProContact() {
        if ($this->session->userdata('yeezyCRM')) {

            $sessionData = $this->session->userdata('yeezyCRM');

            $createdBY = 'CreatedBy';
            $creator = $this-> db
            -> get_where('crm_activity_contacts',array('Id'=>$this->input->post('conid')))
            -> row()->$createdBY;

            if($creator == $sessionData['user_id']){
                if($this->Modulemodel->deleteItem("crm_activity_contacts",array('Id'=>$_POST['conid']))){

                    $array['msg'] = "Done";
                }else{
                    $array['msg'] = "Failed";
                }
            }else{
                $array['msg'] = "Denied";
            }


        } else {
            redirect('login', 'refresh');
        }

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    public function del_ProConType() {
        if ($this->session->userdata('yeezyCRM')) {

            $sessionData = $this->session->userdata('yeezyCRM');

            $createdBY = 'CreatedBy';
            $creator = $this-> db
            -> get_where('crm_contacttype',array('contacttypeid'=>$this->input->post('contypeid')))
            -> row()->$createdBY;

            if($creator == $sessionData['user_id']){
                if($this->Modulemodel->deleteItem("crm_contacttype",array('contacttypeid'=>$_POST['contypeid']))){

                    $array['msg'] = "Done";
                }else{
                    $array['msg'] = "Failed";
                }
            }else{
                $array['msg'] = "Denied";
            }


        } else {
            redirect('login', 'refresh');
        }

        header('Content-Type: application/json');
        echo json_encode($array);
    }

    // load project contacts
    public function getProContactDB(){

        if ($this->session->userdata('yeezyCRM')) {
            $sessionData = $this->session->userdata('yeezyCRM');
            

            $data['crm_activity_contacts'] =  $this->Modulemodel->getContactProDB($this->input->post('projectID'));
            

            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($data);

        }else{
            $this->load->view('auth/v_admin_login');
        }

    }

    // edit project contacts
    public function getEditContactDB(){

        if ($this->session->userdata('yeezyCRM')) {
            $sessionData = $this->session->userdata('yeezyCRM');
            
            $data['crm_activity_contacts'] = $this-> db
                            -> get_where('crm_activity_contacts',array('Id'=>$this->input->post('conid')))
                            -> row();
             $data['crm_contacttype'] = $this-> db
                            -> get('crm_contacttype')
                            -> result();

            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($data);

        }else{
            $this->load->view('auth/v_admin_login');
        }

    }

    public function getNewContactDB(){

        if ($this->session->userdata('yeezyCRM')) {
            $sessionData = $this->session->userdata('yeezyCRM');
            
            $data['crm_contacttype'] = $this-> db
                            -> get('crm_contacttype')
                            -> result();

            header("Content-Type: application/json; charset=utf-8", true);
            echo json_encode($data);

        }else{
            $this->load->view('auth/v_admin_login');
        }

    }
}
