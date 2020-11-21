<?php 
	$page_style =  $this->db->select("crm_user_preferences")
							->get_where("crm_users", array("ID"=>$id))
							->result();
	$page_style_result = $page_style[0]->crm_user_preferences;

	if($id == 0){
		$contacts = $this->db->get("crm_users")->result();
		echo '<script>var contacts = '.json_encode($contacts).';</script>';
	}
	
	if($id > 0)
		$db_file_lists = $this->db->get_where("crm_docs",array("user_id"=>$id))->result(); 
	else
		$db_file_lists = $this->db->get("crm_docs")->result(); 
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
				<div class="ribbon-page-name"><?php echo $page_title; ?></div>
			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				
				<!-- widget grid -->
				<section id="widget-grid" class="">
					<div class="row" id="widget-grid-row">
						<div class="col-lg-12 mf-search">
							<div class="col-md-4 col-md-offset-4">
								<input class="file-filter" onfocus="this.placeholder = ''" onblur="this.placeholder = 'search'" placeholder="search" type="text">
								<button class="advance-file-filter" onclick="$('#mf-advance-search').show('slow');">
									<i class="glyphicon glyphicon-play"></i>
								</button>
								<div id="mf-advance-search">
									<div class="col-md-12" style="background: #FFF;">
										<button class="pull-right" style="background: none;border: none;" onclick="$('#mf-advance-search').hide('slow');">X</button>
									</div>
									<form class="col-md-12 form-horizontal">
										<div class="form-group">
											<label class="col-md-4 control-label">Type</label>
											<div class="col-md-8">
												<select class="form-control">
													<option>Any</option>
													<option>PDF</option>
													<option>Document</option>
													<option>Excel</option>
													<option>Image</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Date Modified</label>
											<div class="col-md-8">
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Item Name</label>
											<div class="col-md-8">
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Has the words</label>
											<div class="col-md-8">
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Owner</label>
											<div class="col-md-8">
												<select class="form-control">
													<option>Any</option>
													<option>PDF</option>
													<option>Document</option>
													<option>Excel</option>
													<option>Image</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Shared with</label>
											<div class="col-md-8">
												<input type="text" class="form-control">
											</div>
										</div>
										<div class="form-group">
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
										</div>
										<div class="form-group">
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
										</div>

									</form>
								</div>
							</div>
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
<?php include("my_files_script.php"); ?>
<script type="text/javascript">
	var shared_name = "<?php echo $shared_file_name; ?>";
</script>
<script type="text/javascript">
	function shared_scanjs(dir){
		// console.log(dir);
		$("#fx-body").html("");
		var request = $.ajax({
			url: "<?php echo site_url("myfiles/shared_scan"); ?>",
			method: "POST",
			data: {dir: dir, shared_name: shared_name},
			dataType: "json"
		});
		request.done(function(data){
			console.log(data[0].pass);
			if(data[0].pass != false){
				swal({ 
					title: 'Enter your password',
					input: 'password',
					inputValue: '',
					showCancelButton: true,
					confirmButtonText: 'Go',
					showLoaderOnConfirm: true,
					preConfirm: function (e) {
						return new Promise(function (resolve, reject) {
							setTimeout(function() {
								if (e == data[0].pass) {
									resolve();
								} else {
									reject('Password incorrect!!!');
								}
							}, 1000)
						})
					},
					allowOutsideClick: false
				}).then(function (e) {
					$.each(data, function(k,v){
						if(v.type == "file"){
							rander_file(v.name, v.display_name, v.relative_path, v.size, v.date, v.path, v.favourite, v.has_shared, v.pass);
						}else{
							shared_rander_folder(v.name, v.display_name, v.relative_path+"/"+v.name, v.size, v.date, v.path, v.favourite, v.has_shared, v.pass);
						}
					});
					shared_rander_site_map(dir);
				});
			}else{
				$.each(data, function(k,v){
					if(v.type == "file"){
						rander_file(v.name, v.display_name, v.relative_path, v.size, v.date, v.path, v.favourite, v.has_shared, v.pass);
					}else{
						shared_rander_folder(v.name, v.display_name, v.relative_path+"/"+v.name, v.size, v.date, v.path, v.favourite, v.has_shared, v.pass);
					}
				});
				shared_rander_site_map(dir);
			}
		});
		request.fail(function(e){
            console.log("Scanjs error...");
            console.log(e.responseText);
        });
	}

	function scanjs_inside(dir){
		// console.log(dir);
		$("#fx-body").html("");
		var request = $.ajax({
			url: "<?php echo site_url("myfiles/scanjs_inside"); ?>",
			method: "POST",
			data: {dir: dir},
			dataType: "json"
		});
		request.done(function(data){
			// console.log(data);
			$.each(data, function(k,v){
				if(v.type == "file"){
					rander_file(v.name, v.display_name, v.relative_path, v.size, v.date, v.path, v.favourite, v.has_shared, v.pass);
				}else{
					shared_rander_folder(v.name, v.display_name, v.relative_path+"/"+v.name, v.size, v.date, v.path, v.favourite, v.has_shared, v.pass);
				}
			});
			shared_rander_site_map(dir);
			//Object.keys(v).length
		});
		request.fail(function(e){
            console.log("Scanjs error...");
            console.log(e.responseText);
        });
	}


	function shared_rander_site_map(dir){
		clean_list();
		$("#site-map").html("");
		var design = '<span><a href="<?php echo site_url("myfiles"); ?>">My Files</a></span>';
		var listofdir = dir.split("/");
		var url = '';
		for(var i = 0; i<listofdir.length; i++){
			url += listofdir[i];

			if(i<listofdir.length-1){
				if(url.indexOf(shared_name) == -1)
					design += '<span onclick="scanjs(\''+url+'\')">'+get_display_name(listofdir[i])+'</span>';
				else
					design += '<span onclick="scanjs_inside(\''+url+'\')">'+get_display_name(listofdir[i])+'</span>';
				url += "/";
			}
			else{
				design += '<span>'+get_display_name(listofdir[i])+'</span>';
			}
		}
		$("#site-map-val").val(url);
		$("#site-map").html(design);
	}

	

	

	function shared_rander_folder(fn, dn, path, size, date, spath, favourite, has_shared, pass){
		var shared_url = base_url + "myfiles/shared_file/" + btoa(path);
		var url = "myfiles/download_dir/" + fn + "/" + btoa(path);
		var design= '<tr>'+
						'<td width="50" onclick="scanjs_inside(\''+path+'\')"><i class="fa fa-folder-o"></i></td>'+
						'<td onclick="scanjs_inside(\''+path+'\')">'+dn+'</td>';
			design += 	'<td class="mftdaction"><ul class="mf-ff-action">'+
						'<li onclick="favourite(\''+fn+'\', \''+path+'\')">';
							if(favourite == "N")
								design += '<img src="'+base_url+'/asset/img/icons/Star.png"></li>';
							else
								design += '<img src="'+base_url+'/asset/img/icons/Stared2.png"></li>';
			if(has_shared)
			design += 	'<li><img src="'+base_url+'/asset/img/icons/Profiles.png" onclick="qtipSharedBox(this, \''+fn+'\', \''+shared_url+'\', \''+pass+'\')"></li>';
			else
			design += 	'<li><img src="'+base_url+'/asset/img/icons/Profile.png" onclick="qtipSharedBox(this, \''+fn+'\', \''+shared_url+'\', \'\')"></li>';
			design +=	'<li class="mf-ff-action-settings">'+
							'<a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="" aria-expanded="true">'+
								'<img src="'+base_url+'/asset/img/icons/Details_Properties.png">'+
							'</a>'+
							'<ul class="dropdown-menu">'+
								'<div class="arrow-top-right"></div>'+
								'<li><a href="#" onclick="detailsinfo(\''+spath+'\', \''+fn+'\')"><i class="fa fa-info"></i> Details</a></li>'+
								'<li><a href="#" onclick="renamethis(\''+fn+'\',\''+dn+'\')"><i class="fa fa-pencil"></i> Rename</a></li>'+
								'<li><a href="'+base_url+url+'"><i class="fa fa-cloud-download"></i> Download</a></li>'+
								'<li><a href="#" onclick="deletethis(\''+path+'\')"><i class="fa fa-trash"></i> Delete</a></li>'+
							'</ul>'+
						'</li>'+
						'</ul></td>'+
						'<td>'+bytesToSize(size)+'</td>'+
						'<td>'+timeConverter(date)+'</td>'+
					'</tr>';
		$("#fx-body").append(design);

	}
</script>
<?php 
	echo '<script>shared_scanjs("'.$page_body.'");</script>';
?>

</body>
</html>