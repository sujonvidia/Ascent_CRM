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
						
						<div id="result" class="col-lg-12">
							
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

    // The Browser API key obtained from the Google API Console.
    // Replace with your own Browser API key, or your own key.
    var developerKey = 'AIzaSyC16wNorl9viF1GyVDgMRjpBPFDRrlqSlc';

    // The Client ID obtained from the Google API Console. Replace with your own Client ID.
    var clientId = "652980607756-4ms67pk79c3fb8mun03krmqvdvpu10ee.apps.googleusercontent.com"

    // Replace with your own project number from console.developers.google.com.
    // See "Project number" under "IAM & Admin" > "Settings"
    var appId = "coherent-window-172711";

    // Scope to use to access user's Drive items.
    var scope = ['https://www.googleapis.com/auth/photos.upload'];

    var pickerApiLoaded = false;
    var oauthToken;

    // Use the Google API Loader script to load the google.picker script.
    function loadPicker() {
      gapi.load('auth', {'callback': onAuthApiLoad});
      gapi.load('picker', {'callback': onPickerApiLoad});
    }

    function onAuthApiLoad() {
      window.gapi.auth.authorize(
          {
            'client_id': clientId,
            'scope': scope,
            'immediate': false
          },
          handleAuthResult);
    }

    function onPickerApiLoad() {
      pickerApiLoaded = true;
      createPicker();
    }

    function handleAuthResult(authResult) {
      if (authResult && !authResult.error) {
        oauthToken = authResult.access_token;
        createPicker();
      }
    }

    // Create and render a Picker object for searching images.
    function createPicker() {
      if (pickerApiLoaded && oauthToken) {
        var view_files = new google.picker.View(google.picker.ViewId.DOCS);
        var view_folder = new google.picker.View(google.picker.ViewId.FOLDERS);
        var view_albums = new google.picker.View(google.picker.ViewId.PHOTO_ALBUMS);
        // view_files.setMimeTypes("image/png,image/jpeg,image/jpg");
        var picker = new google.picker.PickerBuilder()
            // .enableFeature(google.picker.Feature.NAV_HIDDEN)
            .enableFeature(google.picker.Feature.MULTISELECT_ENABLED)
            .setAppId(appId)
            .setOAuthToken(oauthToken)
            .addView(view_files)
            .addView(new google.picker.DocsUploadView())
            // .addView(view_folder)
            // .addView(view_albums)
            .setDeveloperKey(developerKey)
            .setCallback(pickerCallback)
            .build();
         picker.setVisible(true);
      }
    }

    // A simple callback implementation.
    function pickerCallback(data) {
      var url = 'nothing';
      if (data[google.picker.Response.ACTION] == google.picker.Action.PICKED) {
        var doc = data[google.picker.Response.DOCUMENTS][0];
        url = doc[google.picker.Document.URL];
      }
      var message = 'You picked: ' + url;
      if(url != "nothing")
        // document.getElementById('result').innerHTML = message;
      {
        window.open(url);
        location.reload();
      }
    }
    </script>
    <script type="text/javascript" src="https://apis.google.com/js/api.js?onload=loadPicker"></script>
</body>
</html>