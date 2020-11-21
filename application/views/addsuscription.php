<?php
$preList = $result[0]->user_preferences;
$AppList = $result[0]->user_Application_subs;

$newconStr = explode(',', $preList);
$newAppStr = explode(',', $AppList);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel-group smart-accordion-default" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title" style="margin-bottom: 12px;">
                                    <img style="position: absolute; float: left; top: 12px;" src="<?php echo base_url(); ?>asset/img/feedIcon/settings.png" alt=""/>
                                    <a data-toggle="collapse" data-parent="#accordion" href="#pro-pass" class="collapsed" aria-expanded="false"> 
                                        <i class="fa fa-lg fa-angle-down pull-right"></i> 
                                        <i class="fa fa-lg fa-angle-up pull-right"></i> 
                                        <span>Application Channel</span>
                                        <span class="countCheck"><?php echo COUNT($newAppStr); ?> checked out of 3</span>

                                    </a>
                                    <div class="material-switch cusTomChec">
                                        <input id="AppChannel" class="AppChannelChk" value="AppChannel" type="checkbox"/>
                                        <label for="AppChannel" class="label-success"></label>

                                    </div>
                                </h4>
                            </div>
                            <div id="pro-pass" class="panel-collapse collapse in" aria-expanded="true">
                                <div class="panel-body no-padding">
                                    <div class="col-md-12 form-group">
                                        <form name="applicationSubscription" id="applicationSubscription" action="profile/update_secondmail" method="POST">
                                            <ul class="list-group" style="margin-top: 15px;">

                                                <li class="list-group-item">
                                                    Chat
                                                    <div class="material-switch pull-right">
                                                        <input id="chatMsg" class="appTLen AppChannelChk" name="npName[]" value="chatMsg" <?php
                                                        if (in_array("chatMsg", $newAppStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="chatMsg" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Tag Notification
                                                    <div class="material-switch pull-right">
                                                        <input id="notification" class="appTLen AppChannelChk" name="npName[]" value="notification" <?php
                                                        if (in_array("notification", $newAppStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="notification" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    Comment Notification
                                                    <div class="material-switch pull-right">
                                                        <input id="comment" class="appTLen AppChannelChk" name="npName[]" value="comment" <?php
                                                        if (in_array("comment", $newAppStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="comment" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">

                                                    <div class="form-group row"  >
                                                        <div class="col-md-4"><label class="control-label">Refresh in Second(s)</label></div>
                                                        <div class="col-md-8">


                                                            <input value="<?php echo $feedinterval->refreshfeed; ?>" type="number"  class="form-control" id="selectInterval" placeholder="How many Second ?" name="selectInterval">

                                                        </div>

                                                    </div>
                                                </li>


                                            </ul>
                                        </form>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-md-offset-5">
                                            <button type="button" class="btn btn-primary" onClick="sendApplicationSubscripto()" style="margin-bottom: 10px;">Save Changes</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title" style="margin-bottom: 12px;">
                                    <i class="fa fa-fw fa-newspaper-o pti"  style="margin-left: 1%;margin-right: 1%;"></i>
                                    <a data-toggle="collapse" data-parent="#accordion" href="#pro-email" aria-expanded="false" class="collapsed"> 
                                        <i class="fa fa-lg fa-angle-down pull-right"></i> 
                                        <i class="fa fa-lg fa-angle-up pull-right"></i> 
                                        <span>Newspaper Channel</span>
                                        <span class="countCheck"><?php echo COUNT($newconStr); ?> checked out of 23</span>


                                    </a>
                                    <div class="material-switch cusTomChec">
                                        <input id="NewsChannel" value="NewsChannel" class="NewsChannelChk" type="checkbox"/>
                                        <label for="NewsChannel" class="label-success"></label>
                                    </div>

                                </h4>
                            </div>
                            <div id="pro-email" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body no-padding">
                                    <div class="col-md-12 form-group">
                                        <form name="subscriptionForm" id="subscriptionForm" action="" >
                                            <ul class="list-group" style="margin-top: 15px;">
                                                <li class="list-group-item customChannel">Daily</li>
                                                <li class="list-group-item customChannelPadding">
                                                    New York Times
                                                    <div class="material-switch pull-right">
                                                        <input id="NYTimes" class="newsTLen NewsChannelChk" name="npName[]" <?php
                                                        if (in_array("the-new-york-times", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> value="the-new-york-times" type="checkbox"/>
                                                        <label for="NYTimes" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannelPadding">
                                                    Daily Mail
                                                    <div class="material-switch pull-right">
                                                        <input id="Mail" class="newsTLen NewsChannelChk" name="npName[]" value="daily-mail" <?php
                                                        if (in_array("daily-mail", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="Mail" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannelPadding">
                                                    BBC News
                                                    <div class="material-switch pull-right">
                                                        <input id="BBC" class="newsTLen NewsChannelChk" name="npName[]" value="bbc-news" <?php
                                                        if (in_array("bbc-news", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="BBC" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannelPadding">
                                                    CNN
                                                    <div class="material-switch pull-right">
                                                        <input id="CNN" class="newsTLen NewsChannelChk" name="npName[]" value="cnn" <?php
                                                        if (in_array("cnn", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="CNN" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannelPadding">
                                                    Time
                                                    <div class="material-switch pull-right">
                                                        <input id="Time" class="newsTLen NewsChannelChk" name="npName[]" value="time" <?php
                                                        if (in_array("time", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="Time" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannelPadding">
                                                    The Guardian
                                                    <div class="material-switch pull-right">
                                                        <input id="Guardian" class="newsTLen NewsChannelChk" name="npName[]" value="the-guardian-uk" <?php
                                                        if (in_array("the-guardian-uk", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="Guardian" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannelPadding">
                                                    Sky News
                                                    <div class="material-switch pull-right">
                                                        <input id="SNews" class="newsTLen NewsChannelChk" name="npName[]" value="sky-news" <?php
                                                        if (in_array("sky-news", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="SNews" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannelPadding">
                                                    Independent 
                                                    <div class="material-switch pull-right">
                                                        <input id="Independent" class="newsTLen NewsChannelChk" name="npName[]" value="independent" <?php
                                                        if (in_array("independent", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="Independent" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannel">Business</li>
                                                <li class="list-group-item customChannelPadding">
                                                    CNBC 
                                                    <div class="material-switch pull-right">
                                                        <input id="cnbc" class="newsTLen NewsChannelChk" name="npName[]" value="cnbc" <?php
                                                        if (in_array("cnbc", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="cnbc" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannelPadding">
                                                    Business Insider 
                                                    <div class="material-switch pull-right">
                                                        <input id="business-insider" class="newsTLen NewsChannelChk" name="npName[]" value="business-insider" <?php
                                                        if (in_array("business-insider", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="business-insider" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannelPadding">
                                                    Financial Times
                                                    <div class="material-switch pull-right">
                                                        <input id="financial-times" class="newsTLen NewsChannelChk" name="npName[]" value="financial-times" <?php
                                                        if (in_array("financial-times", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="financial-times" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannelPadding">
                                                    The Economist
                                                    <div class="material-switch pull-right">
                                                        <input id="the-economist" class="newsTLen NewsChannelChk" name="npName[]" value="the-economist" <?php
                                                        if (in_array("the-economist", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="the-economist" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannel">Sports</li>
                                                <li class="list-group-item customChannelPadding">
                                                    ESPN Cric Info 
                                                    <div class="material-switch pull-right">
                                                        <input id="ESPNCI" class="newsTLen NewsChannelChk" name="npName[]" value="espn-cric-info" <?php
                                                        if (in_array("espn-cric-info", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="ESPNCI" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannelPadding">
                                                    ESPN 
                                                    <div class="material-switch pull-right">
                                                        <input id="ESPN" class="newsTLen NewsChannelChk" name="npName[]" value="espn" <?php
                                                        if (in_array("espn", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="ESPN" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannelPadding">
                                                    Fox Sports  
                                                    <div class="material-switch pull-right">
                                                        <input id="FSports" class="newsTLen NewsChannelChk" name="npName[]" value="fox-sports" <?php
                                                        if (in_array("fox-sports", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="FSports" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannel">Technology And Neature</li>
                                                <li class="list-group-item customChannelPadding">
                                                    National Geographic 
                                                    <div class="material-switch pull-right">
                                                        <input id="national-geographic" class="newsTLen NewsChannelChk" name="npName[]" value="national-geographic" <?php
                                                        if (in_array("national-geographic", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="national-geographic" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannelPadding">
                                                    Engadget 
                                                    <div class="material-switch pull-right">
                                                        <input id="engadget" class="newsTLen NewsChannelChk" name="npName[]" value="engadget" <?php
                                                        if (in_array("engadget", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="engadget" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannelPadding">
                                                    TechCrunch
                                                    <div class="material-switch pull-right">
                                                        <input id="techcrunch" class="newsTLen NewsChannelChk" name="npName[]" value="techcrunch" <?php
                                                        if (in_array("techcrunch", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="techcrunch" class="label-success"></label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item customChannelPadding">
                                                    New Scientist
                                                    <div class="material-switch pull-right">
                                                        <input id="new-scientist" class="newsTLen NewsChannelChk" name="npName[]" value="new-scientist" <?php
                                                        if (in_array("new-scientist", $newconStr)) {
                                                            echo "checked";
                                                        }
                                                        ?> type="checkbox"/>
                                                        <label for="new-scientist" class="label-success"></label>
                                                    </div>
                                                </li>
<!--                                                <li class="list-group-item customChannelPadding">
                                                  
                                                      <div class="form-group row"  >
                                                          <div class="col-md-4"><label for="selectNewsInterval" class="control-label">News Refresh Timer</label></div>
                                                        <div class="col-md-8">

                                                            <input  type="number"  class="form-control" id="selectNewsInterval" placeholder="How many Second ?" name="selectNewsInterval">

                                                        </div>

                                                    </div>
                                                    
                                                </li>-->
                                            </ul>
                                        </form>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-md-offset-5">
                                            <button type="button" class="btn btn-primary" onClick="sendFile()" style="margin-bottom: 10px;">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <i class="fa fa-fw fa-globe pti" style="margin-left: 1%;margin-right: 1%;"></i>
                                    <a data-toggle="collapse" data-parent="#accordion" href="#pro-social" aria-expanded="false" class="collapsed"> 
                                        <i class="fa fa-lg fa-angle-down pull-right"></i> 
                                        <i class="fa fa-lg fa-angle-up pull-right"></i> 
                                        Social Networking</a>

                                </h4>
                            </div>
                            <div id="pro-social" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body no-padding">
                                    <div class="col-md-12 form-group">
                                        <form name="emailForm" action="profile/update_secondmail" method="POST">
                                            <ul class="list-group" style="margin-top: 15px;">

                                                <li class="list-group-item">
                                                    <a class="btn btn-block btn-social btn-facebook" onClick="OnRequestPermission()" style="margin-bottom: 10px;"><span class="fa fa-facebook"></span> Sync Facebook Timeline</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <div id="gConnect" class="button">
                                                        <!-- <button class="g-signin"
                                                            data-scope="email"
                                                            data-clientid="1059533327847-3m6mpp644fjfihlqb6rvqk7oaqrt2us3.apps.googleusercontent.com"
                                                            data-callback="onSignInCallback"
                                                            data-theme="dark">
                                                        </button>   -->
                                                    </div>
                                                </li>	
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>           
                </div>
            </div>
        </div>
        <script>
            /**
             * This is the bootstrap / app script
             */
            // wait for DOM and facebook auth
            var docReady = $.Deferred();
            var facebookReady = $.Deferred();
            //$(document).ready(docReady.resolve);
            
            // window.fbAsyncInit = function() {
                
            // };


            function OnRequestPermission(){
                $(".close").trigger('click');
                FB.init({
                  appId      : '231141677365713',
                  channelUrl : '//conor.lavos.local/channel.html',
                  status     : true,
                  cookie     : true,
                  xfbml      : true
                });

                docReady.resolve();
                facebookReady.resolve();
            }

            $.when(docReady, facebookReady).then(function(e) {
                getFeeds(function( feeds ) {
                    console.log( feeds );
                });
            });
            
            // call facebook script
            (function(d){
             var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
             js = d.createElement('script'); js.id = id; js.async = true;
             js.src = "http://connect.facebook.net/en_US/all.js";
             d.getElementsByTagName('head')[0].appendChild(js);
            }(document));
        </script>

        <script type="text/javascript">
            var len = $(".appTLen").length;
            var Newslen = $(".newsTLen").length;

            var checklen = $('.appTLen:checked').length;
            var Newschecklen = $('.newsTLen:checked').length;

            if (checklen === len) {
                $("#AppChannel").prop("checked", true);
            }

            if (Newschecklen === Newslen) {
                $("#NewsChannel").prop("checked", true);
            }

            function sendFile() {

                //var formData = new FormData($('#subscriptionForm')[0]);
                var formData = new FormData(document.getElementsByName('subscriptionForm')[0]);

                $.ajax({
                    url: '<?php echo base_url(); ?>projects/addsubscription',
                    type: "post",
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "JSON",
                    success: function (data) {
                        if (data.updateResponse == true) {
                            $(".close").trigger('click');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown);

                    }
                });
            }

            function sendApplicationSubscripto() {

                //var formData = new FormData($('#subscriptionForm')[0]);
                var formData = new FormData(document.getElementsByName('applicationSubscription')[0]);

                $.ajax({
                    url: '<?php echo base_url(); ?>projects/addApplicationsubscription',
                    type: "post",
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "JSON",
                    success: function (data) {
                        if (data.updateResponse == true) {
                            $(".close").trigger('click');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown);

                    }
                });
            }
            $(".AppChannelChk").click(function (e) {
                if (e.currentTarget.value == 'AppChannel') {
                    if (e.currentTarget.checked) {
                        $('.AppChannelChk').each(function () {
                            $(this).prop("checked", true);
                        });
                    } else {
                        $('.AppChannelChk').each(function () {
                            $(this).prop("checked", false);
                        });
                    }
                }
            });

            $(".NewsChannelChk").click(function (e) {
                if (e.currentTarget.value == 'NewsChannel') {
                    if (e.currentTarget.checked) {
                        $('.NewsChannelChk').each(function () {
                            $(this).prop("checked", true);
                        });
                    } else {
                        $('.NewsChannelChk').each(function () {
                            $(this).prop("checked", false);
                        });
                    }
                }
            });

            $(".appTLen").click(function (e) {
                if (e.currentTarget.checked) {
                    var newlen = $(".appTLen").length;
                    var newchecklen = $('.appTLen:checked').length;
                    if (newchecklen === newlen) {
                        $("#AppChannel").prop("checked", true);
                    }

                } else {
                    var newlen = $(".appTLen").length;
                    var newchecklen = $('.appTLen:checked').length;
                    if (newchecklen != newlen) {
                        $("#AppChannel").prop("checked", false);
                    }
                }
            });


            $(".newsTLen").click(function (e) {
                if (e.currentTarget.checked) {
                    var newslen = $(".newsTLen").length;
                    var newschecklen = $('.newsTLen:checked').length;
                    if (newschecklen === newslen) {
                        $("#NewsChannel").prop("checked", true);
                    }

                } else {
                    var newslen = $(".newsTLen").length;
                    var newschecklen = $('.newsTLen:checked').length;
                    if (newschecklen != newslen) {
                        $("#NewsChannel").prop("checked", false);
                    }
                }
            });


            function getInterval_data() {}

            function login( callback ) {
                FB.login(function(response) {
                    if (response.authResponse) {
                        console.log('Welcome!  Fetching your information.... ');
                        console.log(response);
                        if (callback) {
                            callback(response);
                        }
                    } else {
                        console.log('User cancelled login or did not fully authorize.');
                    }
                },{scope: 'user_posts'} );
            }

            function makeFacebookPostURL( id ) {
                return 'https://www.facebook.com/' + id;
            }

            function getPost( callback ){
                $("#facebookNewsFeed").fadeOut(300);
                $("#facebookNewsFeed").html("");
                FB.api(
                    '/me/feed',
                    {fields: 'id,story,likes,comments,updated_time'},
                    function(feedResponse) {
                        //console.log( ' got albums ' );
                        if (callback) {
                            callback(feedResponse);
                        }
                        var i,facebookFeed, feed, deferreds = {}, listOfDeferreds = [];
                        
                        for (i = 0; i < feedResponse.data.length; i++) {
                            
                            facebookFeed = feedResponse.data[i];
                            if(facebookFeed.story != undefined){
                                var resSplit = facebookFeed.id.split("_");
                                
                                str = ' <div class="panel panel-default news onscroll">';
                                str += '    <div class="panel-body status">';
                                //str += '            <span class="top-title" style="color: #053368;">' + facebookFeed.story + ' on ' + moment(value.date).format('ddd, D MMM, gggg') + '</span>';
                                str += '        <div class="who clearfix" style="margin-top: -26px;margin-bottom: -26px;">';
                                str += '            <span class="name" onclick="goLink(\'' + makeFacebookPostURL(resSplit[1])+ '\')" style="float: left;">' + facebookFeed.story + '<span style="color: #686868;font-size: 10px;margin-left:5px;">on ' + moment(facebookFeed.updated_time).format('lll') + '</span>';
                                str += '<span class="name" style="float: left;">';
                                if(facebookFeed.likes != undefined){
                                    str += '<i class="fa fa-thumbs-up" aria-hidden="true" style="color: #4c7fde;"></i> '+facebookFeed.likes.data.length+' ';
                                }  
                                if(facebookFeed.comments != undefined){
                                    str += '<i class="fa fa-comment" aria-hidden="true" style="color: #4c7fde;"></i> '+facebookFeed.comments.data.length+' ';
                                } 
                                str += '        </span>';
                                str += '        </div>';
                                str += '    </div>';
                                str += '</div>';

                                $("#facebookNewsFeed").append(str);
                            }
                        }

                        $("#facebookNewsFeed").fadeIn(300);

                        //$("#hr3").trigger('click');
                        $('.nav-tabs a[href="#hr4"]').tab('show');
                    }
                );
            }

            function getFeeds( callback ) {
                var allPhotos = [];
                var user_id = 0;
                var accessToken = '';
                FB.getLoginStatus(function(response) {
                  //console.log(response);
                  if(response.status == 'unknown'){
                    login(function(loginResponse) {
                        accessToken = loginResponse.authResponse.accessToken || '';
                        user_id = loginResponse.authResponse.userID || '0';
                        getPost(function(feedResponse) {
                            console.log(feedResponse);
                        });
                    });

                  }else{
                    getPost(function(feedResponse) {
                        console.log(feedResponse);
                    });
                  }
                }, true);

                
            }
        </script>
        <script src = "https://plus.google.com/js/client:platform.js" async></script>
        <script src = "https://plus.google.com/js/client:plusone.js" async defer></script>
        <script>
            //var apiKey = 'AIzaSyAvlQxg0JpsgPNbUqi6b-gkZikUvYAjFaQ';
            /**
            * Handler for the signin callback triggered after the user selects an account.
            */
            function onSignInCallback(resp) {
                gapi.client.load('plus', 'v1', apiClientLoaded);
            }

            /**
            * Sets up an API call after the Google API client loads.
            */
            function apiClientLoaded() {
                gapi.client.plus.people.get({userId: 'me'}).execute(handleEmailResponse);
            }

            /**
            * Response callback for when the API client receives a response.
            *
            * @param resp The API response object with the user email and profile information.
            */
            function handleEmailResponse(resp) {
                console.log(resp.id);
                $(".close").trigger('click');
                $("#facebookNewsFeed").fadeOut(300);
                $("#facebookNewsFeed").html("");
                start(resp.id,'AIzaSyAvlQxg0JpsgPNbUqi6b-gkZikUvYAjFaQ');
            }

            function start(plusId,apiKey){
                gapi.client.plus.activities.list({
                    userId: plusId,
                    collection: 'public',
                    maxResults: 100
                }).execute(function(resp){
                    if( resp && resp.items && resp.items.length > 0 ){
                        for( var co=0; co<resp.items.length; co++ ){
                            $('#facebookNewsFeed').append('<div class="post"><div id="posts-'+co+'"></div></div>');
                            var url = resp.items[co].object.url;
                            gapi.post.render('posts-'+co, {url:url});
                        }
                        $('.nav-tabs a[href="#hr4"]').tab('show');
                        $("#facebookNewsFeed").fadeIn(300);
                    } else {
                        console.log('invalid resp', resp);
                    }
                });
            }
        </script>
    </body>
</html>
