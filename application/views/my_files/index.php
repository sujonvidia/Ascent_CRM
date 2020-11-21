<?php 
	$page_style =  $this->db->select("crm_user_preferences")
							->get_where("crm_users", array("ID"=>$id))
							->result();
	$page_style_result = $page_style[0]->crm_user_preferences;


	if($id > 0){
		$db_file_lists = $this->db->get("crm_docs")->result(); 
		$ulist = $this->db->select("ID, full_name, email")->get_where("crm_users", array("org_id"=>$org_id))->result();
	}
	else{
		$db_file_lists = $this->db->get("crm_docs")->result();
		$ulist = array();
	}
	echo '<script>var id = '.json_encode($id).';</script>';
	echo '<script>var dbFileLists = '.json_encode($db_file_lists).';</script>';
?>
<!DOCTYPE html>
<html lang="en" class="<?php echo ($page_style_result == 0)?"hidden-menu-mobile-lock":""; ?>">
<head>
	
	<title><?php echo $page_title;  ?></title>
    
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="FPS School Manager Pro - FreePhpSoftwares" />
	<meta name="author" content="FreePhpSoftwares" />
	<?php $this->load->view('template/includes_top'); ?>
</head>
	
<body class="<?php echo ($page_style_result == 0)?"hidden-menu":""; ?>">

		<!-- HEADER -->
		<div class="chat-wid-back customChat"></div>
		<header id="header">
			<?php 	$data["page_style_result"]= $page_style_result; 
					$this->load->view('template/header.php', $data);?>
		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">
			<?php $this->load->view('template/left_panel.php');?>
		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">
				<div class="ribbon-page-name"><?php echo "My Files"; ?></div>
			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				
				<!-- widget grid -->
				<section id="widget-grid" class="">
					<div class="row" id="widget-grid-row">
						<div class="col-lg-12 mf-search">
							<?php if($page_body != "menu") { ?>
							<div class="col-md-4 col-md-offset-4">
								<input class="file-filter" onkeyup="searchforfile(this, event)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'search'" placeholder="search" type="text">
								<button class="advance-file-filter" onclick="$('#mf-advance-search').show('slow');">
									<i class="glyphicon glyphicon-play"></i>
								</button>
								<div id="mf-advance-search">
									<div class="col-md-12" style="background: #AAA;">
										<button class="pull-right" style="background: none;border: none;" onclick="$('#mf-advance-search').hide('slow');">X</button>
									</div>
									<form class="col-md-12 form-horizontal myfile_search_form">
										<div class="form-group">
											<label class="col-md-4 control-label">Type</label>
											<div class="col-md-8">
												<select id="search_file_type" class="form-control">
													<option value="">Select</option>
													<option value="all">Any</option>
													<option value="pdf">PDF</option>
													<option value="doc">Document</option>
													<option value="xls">Excel</option>
													<option value="jpg">Image</option>
													<option value="zip">ZIP</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Date Modified</label>
											<div class="col-md-8">
												<input type="text" id="search_file_modified" class="form-control flatpickr">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Item Name</label>
											<div class="col-md-8">
												<input type="text" id="search_file_name" class="form-control">
											</div>
										</div>
										<!-- <div class="form-group">
											<label class="col-md-4 control-label">Has the words</label>
											<div class="col-md-8">
												<input type="text" class="form-control">
											</div>
										</div> -->
										<div class="form-group">
											<label class="col-md-4 control-label">Owner</label>
											<div class="col-md-8">
												<select id="search_file_owner" class="form-control">
													<option value="">Select</option>
													<?php foreach($ulist as $k=>$v) {
													echo '<option value="'.$v->ID.'">'.$v->full_name.'</option>';
													}?>
												</select>
											</div>
										</div>
										<!-- <div class="form-group">
											<label class="col-md-4 control-label">Shared with</label>
											<div class="col-md-8">
												<input type="text" class="form-control">
											</div>
										</div> -->
										<!-- <div class="form-group">
											<label class="col-md-4 control-label">Located in</label>
											<div class="col-md-8">
												<select class="form-control">
													<option>Any</option>
													<option>PDF</option>
													<option>Document</option>
													<option>Excel</option>
													<option>Image</option>
												</select>
											</div>
										</div> -->
										<!-- <div class="form-group">
											<label class="col-md-4 control-label">Follow up</label>
											<div class="col-md-8">
												<select class="form-control">
													<option>Any</option>
													<option>PDF</option>
													<option>Document</option>
													<option>Excel</option>
													<option>Image</option>
												</select>
											</div>
										</div> -->
										<div class="form-group">
											<div class="col-md-6" style="text-align: right">
												<input type="button" class="btn btn-success" value="Go" onclick="gotosearch()">
											</div>
											<div class="col-md-6" style="text-align: left">
												<input type="button" class="btn" onclick="$('#mf-advance-search').hide('slow');" value="Cancel">
											</div>
										</div>
									</form>
								</div>
							</div>
							<?php } ?>
						</div>
						
						<div class="col-lg-12">
							<?php 
							if($page_body == "menu")
								include("my_files_menu.php");
							else
								include("my_explorer.php");
							?>
						</div>
					</div>
				</section>
				<!-- end widget grid -->			
			</div>
				

		</div>
		<!-- END MAIN CONTENT -->


		<!-- PAGE FOOTER -->
		<?php $this->load->view('template/footer.php');?>
		

<!--================================================== -->
<?php $this->load->view('template/includes_bottom.php');?>
<?php //include APPPATH.'views/template/includes_bottom.php';?>
<?php include("my_files_script.php"); ?>
<?php 
	if($page_body == "personal") 
		echo '<script>scanjs("PersonalFiles");</script>';
	elseif($page_body == "project") 
		echo '<script>scanjs("ProjectsFiles");</script>';
	elseif($page_body == "todo") 
		echo '<script>scanjs("TodoFiles");</script>';
	elseif($page_body == "favorite")
		echo '<script>scanintodb("favorite");</script>';
?>
</body>
</html>