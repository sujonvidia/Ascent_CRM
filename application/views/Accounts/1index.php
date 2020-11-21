<?php $this->load->view('Partial/pageHeader'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
          <h1>
            Projects
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">All Projects</li>
          </ol> -->
        <div class="row">
        	<section>
        		<div class="col-lg-12">
	        		<div class="col-lg-2">
		        		<div class="tabs">
					    <div class="tab tab-1">
					      <div>
					        <p class="turnBoxButton turnBoxNext"><i class="fa fa-search" title="Search"></i></p>
					      </div>
					      
					    </div>
					    <div class="tab tab-2">
					      <div>
					        <p class="turnBoxButton turnBoxNext"><i class="fa fa-plus"></i></p>
					      </div>
					      
					    </div>
					    
					    <!-- <div class="tab tab-3">
					      <div>
					        <p class="turnBoxButton turnBoxNext">TAB3</p>
					      </div>
					      
					    </div> -->
					  </div>
		        	</div>
		        	<?php $this->load->view('Partial/widget'); ?>
	        	</div>
        	</section>
        	
        </div>
        <div class="content-box">
	    	
	    	<div class="row">
				<div class="col-lg-12">
					<!-- Main content -->
					<?php $this->load->view('Accounts/Partial/TabAccInfo'); ?>			
				</div>
			</div>
	    	<div class="row">
				<div class="col-lg-12">
					<?php $this->load->view('Accounts/Partial/TabNewAcc'); ?>	
				</div><!-- /.col -->
			</div>
	    	<div class="row">
					<div class="col-lg-12">
						<!-- Main content -->
					</div>
			</div>
	    </div>

        
      </div><!-- /.content-wrapper -->
	  
	 <?php $this->load->view('Partial/pageFooter'); ?>	
	<script type="text/javascript">
		$(document).ready(function ($) {
		    // delegate calls to data-toggle="lightbox"
		    $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
		        event.preventDefault();
		        return $(this).ekkoLightbox({
		            onShown: function() {
		                if (window.console) {
		                        return console.log('Checking our the events huh?');
		                }
		            },
		            onNavigate: function(direction, itemIndex) {
		                if (window.console) {
		                        return console.log('Navigating '+direction+'. Current item: '+itemIndex);
		                }
		            }
		        });
		    });
		});
	</script>
<!-- /Lightbox -->
