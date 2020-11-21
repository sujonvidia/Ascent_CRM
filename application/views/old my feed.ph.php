<div class="jarviswidget jarviswidget-color-blue feed" id="wid-id-4" data-widget-colorbutton="false"
	data-widget-editbutton="false"
	data-widget-togglebutton="false"
	data-widget-deletebutton="false"
	data-widget-fullscreenbutton="false"
	data-widget-custombutton="false"
	data-widget-collapsed="false"
	data-widget-sortable="false">

	<header>
		<div class="widget-toolbar pull-left feedVIewButton">
			<!-- add: non-hidden - to disable auto hide -->
			<span class="dropdown-toggle" data-toggle="dropdown" style="color: #c5c5c5;">View</span>
			<ul class="dropdown-menu pull-right js-status-update">
				<div class="arrow-top-right"></div>
				<li><a href="javascript:void(0);" onclick="hideFeed('viewall')"><i class="fa fa-check"></i> View all</a></li>
				<li><a href="javascript:void(0);" onclick="hideFeed('directchat')"><i class="fa fa-check"></i> Direct Chat</a></li>
				<li><a href="javascript:void(0);" onclick="hideFeed('directchat')"><i class="fa fa-check"></i> Group Chat</a></li>
				<li><a href="javascript:void(0);" onclick="hideFeed('notifation')"><i class="fa fa-check"></i> Notification</a></li>
			</ul>
		</div>
		<div class="widget-toolbar pull-left myfeedButton">
			<span>My Feed</span>
		</div>
		<!-- <div class="widget-toolbar pull-right">
			<span><i class="fa fa-close"></i></span>
		</div> -->
		<div class="widget-toolbar pull-right mytextwithicon" style="display: none;" id="feddcollaspe" onclick="CollaspeFeed();">
			<span><i class="fa fa-rotate-135 fa-long-arrow-right" aria-hidden="true"></i></span>
		</div>
		<div class="widget-toolbar pull-right mytextwithicon" style="display: block;" id="feedexpand"  onclick="ExpandFeed();">
			<span><i class="fa fa-rotate-45 fa-long-arrow-right" aria-hidden="true"></i></span>
		</div>
	</header>
	<!-- widget div-->
	<div>
		<div class="widget-body no-padding smart-form fixedContent">
			<!-- your contents here -->
			<div class="panel panel-default directchat">
				<div class="panel-body status">
					<div class="who clearfix">
						<img src="<?php echo base_url(); ?>asset/img/avatars/5.png" alt="img" class="online">
						<span class="name"><b>Karrigan Mean</b> </span>
						<span class="name">Today <?php echo date('Y-m-d H:i:s'); ?></span>
						<span  class="from">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span>
						<div class="col-lg-12">&nbsp</div>
						<input type="text" class="form-control" placeholder="Send Message">
					</div>
				</div>
			</div>

			<div class="panel panel-default notifation">
				<div class="panel-body status noteR">
					<div class="who clearfix">
						<span class="name"><b>Notification </b> shared a photo</span>
					</div>
				</div>
			</div>

			<div class="panel panel-default notifation">
				<div class="panel-body status noteB">
					<div class="who clearfix">
						<span class="name"><b>Notification</b> shared a photo</span>
					</div>
				</div>
			</div>

			<div class="panel panel-default directchat">
				<div class="panel-body status">
					<div class="who clearfix">
						<img src="<?php echo base_url(); ?>asset/img/avatars/5.png" alt="img" class="online">
						<span class="name"><b>Karrigan Mean</b> </span>
						<span class="name">Today @ 2.15pm </span>
						<span  class="from">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</span>
						<div class="col-lg-12">&nbsp</div>
						<input type="text" class="form-control" placeholder="Send Message">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>