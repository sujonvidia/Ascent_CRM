 <?php 
	$page_style =  $this->db->select("crm_user_preferences")
							->get_where("crm_users", array("ID"=>$id))
							->result();
	$page_style_result = $page_style[0]->crm_user_preferences;
?>
<!DOCTYPE html>
<html lang="en" class="<?php echo ($page_style_result == 0)?"hidden-menu-mobile-lock":""; ?>">
<head>
	
	<title><?php echo $page_title; ?></title>
    
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="FPS School Manager Pro - FreePhpSoftwares" />
	<meta name="author" content="FreePhpSoftwares" />
	<?php $this->load->view('template/includes_top'); ?>

	<style type="text/css">
		#myTabContent1{
			height: auto;
			min-height: 500px;
		}
		.iebody{display: none;}
	</style>
</head>
	
<body class="<?php echo ($page_style_result == 0)?"hidden-menu":""; ?>">

		<!-- HEADER -->
		<div class="chat-wid-back customChat"></div>
		<header id="header">
			<?php $this->load->view('template/header.php');?>
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
				<ol class="breadcrumb">
					<li>
						<span class="dFont"><?php echo $page_title; ?></span>
						<p style="font-size: 17px;width: 100%;height: 25px;position: relative;right: 0%;margin-left: 1%;text-align: right;">
						</p>
					</li>
				</ol>
			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">
				<style type="text/css">
					.form-control{
						border-radius: 6px !important;
						border: 2px solid #cecbcb;
					}
				</style>
				<section id="widget-grid" class="">
					<div class="row" id="widget-grid-row">
						<div class="col-lg-12">
							<ul id="myTab1" class="nav nav-tabs bordered">
								<li class="active"><a href="#s1" data-toggle="tab" aria-expanded="true">Backup</a></li>
								<li class=""><a href="#s2" data-toggle="tab" aria-expanded="false">Restore</a></li>
							</ul>
							<div id="myTabContent1" class="tab-content padding-10">
								<div class="tab-pane fade active in" id="s1">
									Backup System Coming Soon...
								</div>
								<div class="tab-pane fade" id="s2">
									Restore System Coming Soon...
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		
		<!-- PAGE FOOTER -->
		<?php $this->load->view('template/footer.php');?>
		

<!--================================================== -->
<?php $this->load->view('template/includes_bottom.php');?>

</body>
</html>