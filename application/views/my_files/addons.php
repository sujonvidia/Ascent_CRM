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
	<script src="https://static.filestackapi.com/v3/filestack.js"></script>
	<!-- <script src="https://api.filestackapi.com/filestack.js"></script> -->
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
				<div class="ribbon-page-name"><?php echo $page_title; ?></div>
			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				
				<!-- widget grid -->
				<section id="widget-grid" class="">
					<div class="row" id="widget-grid-row">
						<div class="col-lg-12 mf-search">
							
						</div>
						
						<div class="col-lg-12">
							<a href="<?php echo site_url("myfiles/onedrive"); ?>"><img src="<?php echo base_url("asset/img/onedrive.jpg"); ?>" style="margin: 10% 0 0 10%;"></a>
							<a href="<?php echo site_url("myfiles/addons"); ?>"><img src="<?php echo base_url("asset/img/dropbox.jpg"); ?>" style="margin: 10% 0 0 2%;"></a>
							<a href="<?php echo site_url("myfiles/google_drive"); ?>"><img src="<?php echo base_url("asset/img/google.jpg"); ?>" style="margin: 10% 0 0 2%;"></a>
							<img src="<?php echo base_url("asset/img/box.jpg"); ?>" onclick="filestack_pick_ongoing()" style="margin: 10% 0 0 2%;">
							<img src="<?php echo base_url("asset/img/filestack.png"); ?>" onclick="filestack_pick()" style="margin: 10% 0 0 2%;cursor: pointer;">
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
<script type="text/javascript">
	function filestack_pick(){
		var policy = "eyJleHBpcnkiOjE1MzE4MDA1NjQsImNhbGwiOiJyZWFkIiwiaGFuZGxlIjoiQVpIWGRFdjVuU2c2Y2ZVTXBtS2RVeiJ9";
		var signature = "3df5e83ce3e3d8a9b86511cd3f3a223e161f211cb92a0f2af27cb73cca589b0f";
		var client = filestack.init('AZHXdEv5nSg6cfUMpmKdUz', { policy: policy, signature: signature });
		client.pick({
		  disableThumbnails: true,
		  fromSources: ['local_file_system','imagesearch','facebook','instagram','googledrive','dropbox',
		  				'url','evernote','flickr','box','github','picasa','onedrive','clouddrive','customsource'],
		  accept: ['image/*'],
		  storeTo: {
		    location: 's3',
		    // path: 'http://27.147.195.222:2241/nc27/filestack/',
		    container: 'user-photos' ,
		    region: 'us-east-1',
		    access: 'public'
		  }
		}).then(function(result) {
			console.log(result.filesUploaded);
		});
	}


	function filestack_pick_ongoing(){
		// var filestackHandle = 'AZHXdEv5nSg6cfUMpmKdUz';

		// var policy = "eyJleHBpcnkiOjE1MzE4MDA1NjQsImNhbGwiOiJyZWFkIiwiaGFuZGxlIjoiQVpIWGRFdjVuU2c2Y2ZVTXBtS2RVeiJ9";
		// var signature = "3df5e83ce3e3d8a9b86511cd3f3a223e161f211cb92a0f2af27cb73cca589b0f";
		// var client = filestack.init(filestackHandle, { policy: policy, signature: signature });
			

		// var log = function(result) {
		// 	console.log(JSON.stringify(result))
		// }

		// var secret = 'UYN6XG5LGFE53OZB3EDRTRWJEM';

		// client.retrieve(filestackHandle, { metadata: true }).then(log);

		// https://www.filestackapi.com/api/file/3Ow27kmGQgSq1uWQec7A?signature=3df5e83ce3e3d8a9b86511cd3f3a223e161f211cb92a0f2af27cb73cca589b0f&policy=eyJleHBpcnkiOjE1MzE4MDA1NjQsImNhbGwiOiJyZWFkIiwiaGFuZGxlIjoiQVpIWGRFdjVuU2c2Y2ZVTXBtS2RVeiJ9
	}
</script>
</body>
</html>