<div class="alert fade in feed" id="feed-wid">
    <header>
        <div class="widget-toolbar pull-left feedVIewButton">
            <!-- add: non-hidden - to disable auto hide -->
            <!--<span style="color: #c5c5c5;"><a data-toggle="lightbox" data-title="Channel Subscription" href="<?php echo base_url(); ?>projects/openSubscription"><i class="fa fa-cogs" style="color: #999;font-size: 18px;"></i></a></span>-->
            <span style="color: #c5c5c5;"><a data-toggle="lightbox" data-title="Channel Subscription" href="<?php echo base_url(); ?>projects/openSubscription">
                    <img src="<?php echo base_url(); ?>asset/img/feedIcon/settings.png" alt=""/>
                </a></span>
            <!-- <ul class="dropdown-menu pull-right js-status-update">
                    <div class="arrow-top-right"></div>
                    <li><a href="javascript:void(0);" onclick="hideFeed('viewall')"><i class="fa fa-check"></i> View all</a></li>
                    <li><a href="javascript:void(0);" onclick="hideFeed('directchat')"><i class="fa fa-check"></i> Direct Chat</a></li>
                    <li><a href="javascript:void(0);" onclick="hideFeed('directchat')"><i class="fa fa-check"></i> Group Chat</a></li>
                    <li><a href="javascript:void(0);" onclick="hideFeed('notifation')"><i class="fa fa-check"></i> Notification</a></li>
                    <li><a href="javascript:void(0);" onclick="hideFeed('news')"><i class="fa fa-check"></i> News</a></li>
                    <li></li>
            </ul> -->
        </div>
        <div id="updateRefresh" class="widget-toolbar pull-left mytextwithicon" style="font-size: 17px; cursor: pointer;" onclick="feddUpdate()">
            <span><i  class="fa fa-refresh" aria-hidden="true"></i></span>            
        </div>


        <div class="widget-title">My Feed </div>
        <div class="widget-toolbar pull-right mytextwithicon" style="display: none;" id="feddcollaspe" onclick="CollaspeFeed();">
            <span><i class="fa fa-rotate-135 fa-long-arrow-right" aria-hidden="true"></i></span>
        </div>
        <div class="widget-toolbar pull-right mytextwithicon" style="display: block;" id="feedexpand"  onclick="ExpandFeed();">
            <span><i class="fa fa-rotate-45 fa-long-arrow-right" aria-hidden="true"></i></span>
        </div>
        <div class="widget-toolbar pull-right mytextwithicon" style="display: block;" id="feedeclose"  onclick="close_feed();">
            <span><i class="fa fa-times" aria-hidden="true"></i></span>
        </div>
    </header>
    <!-- widget div-->
    <div class="row">
        <ul id="widget-tab-1" class="nav nav-tabs pull-left tabNavFeed">
            <li class="active">
                <a data-toggle="tab" href="#hr1"><span class="hidden-mobile hidden-tablet"> Notifications </span><em id="appNotNumber" style="display: none;right: 14px !important;">0</em></a>
            </li>
            <li onclick="chatmsgNotDelete()">
                <a data-toggle="tab" href="#hr3"><span class="hidden-mobile hidden-tablet"> Chat </span><em id="chatNotNumer" style="display: none;right: 35px !important;">0</em></a>
            </li>
            <li>
                <a data-toggle="tab" href="#hr2"><span class="hidden-mobile hidden-tablet"> News </span></a>
            </li>
            <li style="display: none;">
                <a data-toggle="tab" href="#hr4"><span class="hidden-mobile hidden-tablet"> News Feed </span></a>
            </li>
        </ul>

        <div class="tab-content padding-10">
            <div class="tab-pane fade in active" id="hr1" style="height: 571px;">
                <div class="fixedContent" id="feedContent" style="position: absolute;background: #FFF;margin-left: -12px;margin-right: 0px;margin-top: 8%;">
                </div>

            </div>
            <div class="tab-pane fade" id="hr2" style="height: 571px;">
                <div class="fixedContent" id="feedContentNews" style="position: absolute;background: #FFF;margin-left: -12px;margin-right: 0px;margin-top: 8%;">

                </div>
                <span id="loading"><img src="<?php echo base_url('asset/img/loading2.gif'); ?>"/></span>
            </div>
            <div class="tab-pane fade" id="hr3" style="height: 571px;">
                <div class="fixedContent" id="feedContentChat" style="position: absolute;background: #FFF;margin-left: -12px;margin-right: 0px;margin-top: 8%;">

                </div>
                <!-- <span id="loading"><img src="<?php echo base_url('asset/img/loading2.gif'); ?>"/></span> -->
            </div>
            <div class="tab-pane fade" id="hr4" style="height: 571px;">
                <div class="fixedContent" id="facebookNewsFeed" style="position: absolute;background: #FFF;margin-left: -12px;margin-right: 0px;margin-top: 8%;">

                </div>
                <!-- <span id="loading"><img src="<?php echo base_url('asset/img/loading2.gif'); ?>"/></span> -->
            </div>
        </div>

    </div>
</div>