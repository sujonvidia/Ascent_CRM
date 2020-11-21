<?php
$page_style = $this->db->select("crm_user_preferences")
        ->get_where("crm_users", array("ID" => $id))
        ->result();
$page_style_result = $page_style[0]->crm_user_preferences;
?>
<!DOCTYPE html>
<html lang="en" class="<?php echo ($page_style_result == 0) ? "hidden-menu-mobile-lock" : ""; ?>">
    <head>

        <title><?php echo $page_title; ?></title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="FPS School Manager Pro - FreePhpSoftwares" />
        <meta name="author" content="FreePhpSoftwares" />
        <?php $this->load->view('template/includes_top'); ?>
    </head>

    <body class="<?php echo ($page_style_result == 0) ? "hidden-menu" : ""; ?>">

        <!-- HEADER -->
        <div class="chat-wid-back customChat"></div>
        <header id="header">
            <?php $this->load->view('template/header.php'); ?>
        </header>
        <!-- END HEADER -->

        <!-- Left panel : Navigation area -->
        <!-- Note: This width of the aside area can be adjusted through LESS variables -->
        <aside id="left-panel">
            <?php $this->load->view('template/left_panel.php'); ?>
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
                <style type="text/css">
                    .form-control{
                        border-radius: 6px !important;
                        border: 2px solid #cecbcb;
                    }
                </style>
                <section id="widget-grid" class="">
                    <div class="row" id="widget-grid-row">
                        <div class="col-lg-12">
                            <div class="widget-body">
                                <ul id="myTab1" class="nav nav-tabs bordered">
                                    <li class="active">
                                        <a href="#s1" data-toggle="tab" aria-expanded="true">Settings</a>
                                    </li>
                                    <li class="">
                                        <a href="#s2" data-toggle="tab" aria-expanded="false">Profile</a>
                                    </li>
                                </ul>

                                <div id="myTabContent2" class="tab-content padding-10">
                                    <div class="tab-pane fade active in" id="s1">
                                        <div class="tab-pane active" id="tab_1">
                                            <div class="panel-group smart-accordion-default" id="accordion">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-fw fa-envelope pti"></i>
                                                            <!--															<a data-toggle="collapse" data-parent="#accordion" href="#pro-email" aria-expanded="false" class="collapsed"> -->
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#pro-email" aria-expanded="true" class="collapsed"> 
                                                                <i class="fa fa-lg fa-angle-down pull-right"></i> 
                                                                <i class="fa fa-lg fa-angle-up pull-right"></i> 
                                                                Email Address </a>
                                                        </h4>
                                                    </div>
                                                    <div id="pro-email" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body no-padding">
                                                            <div class="col-md-12 form-group">
                                                                <form name="emailForm" action="profile/update_secondmail" method="POST">
                                                                    <table width="100%">
                                                                        <tbody><tr><td class="col-md-6"><label>Primary Email address</label></td><td>&nbsp;</td></tr>
                                                                            <tr><td class="col-md-6"><input class="form-control" value="<?php echo $crm_users_data[0]->email; ?>" disabled="" type="text"></td><td>&nbsp;</td></tr>
                                                                            <tr><td class="col-md-6"><label>Secondary Email address</label></td><td>&nbsp;</td></tr>
                                                                            <tr><td class="col-md-6"><input name="email2" value="<?php echo $crm_users_data[0]->email2; ?>" class="form-control" placeholder="tes@ad.com" type="email"></td>
                                                                                <td></td></tr>
                                                                            <tr><td class="col-md-6"><br><button type="submit" class="btn btn-flat" >Update Email</button></td><td></td></tr>
                                                                        </tbody></table>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-fw fa-unlock-alt pti"></i>
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#pro-pass" class="collapsed" aria-expanded="false">

                                                                <i class="fa fa-lg fa-angle-down pull-right"></i> 
                                                                <i class="fa fa-lg fa-angle-up pull-right"></i> 
                                                                Password </a>
                                                        </h4>
                                                    </div>
                                                    <div id="pro-pass" class="panel-collapse collapse" aria-expanded="false">

                                                        <div class="panel-body">
                                                            <form name="passForm" action="<?php echo base_url("profile/change_pass"); ?>" method="POST">
                                                                <table width="100%">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="col-md-6"><label>Current Password</label></td>
                                                                            <td class="col-md-6">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6"><input name="cur_pass" onkeyup="check_cur_pass(this)" class="form-control" required="" type="password"></td>
                                                                            <td class="col-md-6 text-red" id="cur_pass_msg"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6"><label>New Password</label></td>
                                                                            <td class="col-md-6">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6"><input name="new_pass" id="new_pass" onkeyup="check_new_pass(this)" class="form-control" required type="password"></td>
                                                                            <td class="col-md-6 text-red" id="new_pass_msg"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6"><label>Confirm Password</label></td>
                                                                            <td class="col-md-6">&nbsp;</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6"><input name="con_pass" onkeyup="check_con_pass(this)" class="form-control" required type="password"></td>
                                                                            <td class="col-md-6 text-red" id="con_pass_msg"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="col-md-6"><br><button type="submit" class="btn btn-primary tn-flat">Update Password</button></td>
                                                                            <td class="col-md-6">&nbsp;</td>
                                                                        </tr>
                                                                    </tbody></table>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-fw fa-calendar pti"></i>
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#pro-timezone" class="collapsed" aria-expanded="false"> 
                                                                <i class="fa fa-lg fa-angle-down pull-right"></i> 
                                                                <i class="fa fa-lg fa-angle-up pull-right"></i> 
                                                                Timezone </a>
                                                        </h4>
                                                    </div>
                                                    <div id="pro-timezone" class="panel-collapse collapse" aria-expanded="false">
                                                        <div class="panel-body">
                                                            <label>Navigate Connect uses your timezone to send summary and notification emails, for times in your activity feeds, and for reminders.</label>
                                                            <div class="col-md-6 form-group">
                                                                <select class="form-control">
                                                                    <option timezoneid="1" gmtadjustment="GMT-12:00" usedaylighttime="0" value="-12">(GMT-12:00) International Date Line West</option>
                                                                    <option timezoneid="2" gmtadjustment="GMT-11:00" usedaylighttime="0" value="-11">(GMT-11:00) Midway Island, Samoa</option>
                                                                    <option timezoneid="3" gmtadjustment="GMT-10:00" usedaylighttime="0" value="-10">(GMT-10:00) Hawaii</option>
                                                                    <option timezoneid="4" gmtadjustment="GMT-09:00" usedaylighttime="1" value="-9">(GMT-09:00) Alaska</option>
                                                                    <option timezoneid="5" gmtadjustment="GMT-08:00" usedaylighttime="1" value="-8">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                                                    <option timezoneid="6" gmtadjustment="GMT-08:00" usedaylighttime="1" value="-8">(GMT-08:00) Tijuana, Baja California</option>
                                                                    <option timezoneid="7" gmtadjustment="GMT-07:00" usedaylighttime="0" value="-7">(GMT-07:00) Arizona</option>
                                                                    <option timezoneid="8" gmtadjustment="GMT-07:00" usedaylighttime="1" value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                                                    <option timezoneid="9" gmtadjustment="GMT-07:00" usedaylighttime="1" value="-7">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                                                    <option timezoneid="10" gmtadjustment="GMT-06:00" usedaylighttime="0" value="-6">(GMT-06:00) Central America</option>
                                                                    <option timezoneid="11" gmtadjustment="GMT-06:00" usedaylighttime="1" value="-6">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                                                    <option timezoneid="12" gmtadjustment="GMT-06:00" usedaylighttime="1" value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                                                    <option timezoneid="13" gmtadjustment="GMT-06:00" usedaylighttime="0" value="-6">(GMT-06:00) Saskatchewan</option>
                                                                    <option timezoneid="14" gmtadjustment="GMT-05:00" usedaylighttime="0" value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                                                    <option timezoneid="15" gmtadjustment="GMT-05:00" usedaylighttime="1" value="-5">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                                                    <option timezoneid="16" gmtadjustment="GMT-05:00" usedaylighttime="1" value="-5">(GMT-05:00) Indiana (East)</option>
                                                                    <option timezoneid="17" gmtadjustment="GMT-04:00" usedaylighttime="1" value="-4">(GMT-04:00) Atlantic Time (Canada)</option>
                                                                    <option timezoneid="18" gmtadjustment="GMT-04:00" usedaylighttime="0" value="-4">(GMT-04:00) Caracas, La Paz</option>
                                                                    <option timezoneid="19" gmtadjustment="GMT-04:00" usedaylighttime="0" value="-4">(GMT-04:00) Manaus</option>
                                                                    <option timezoneid="20" gmtadjustment="GMT-04:00" usedaylighttime="1" value="-4">(GMT-04:00) Santiago</option>
                                                                    <option timezoneid="21" gmtadjustment="GMT-03:30" usedaylighttime="1" value="-3.5">(GMT-03:30) Newfoundland</option>
                                                                    <option timezoneid="22" gmtadjustment="GMT-03:00" usedaylighttime="1" value="-3">(GMT-03:00) Brasilia</option>
                                                                    <option timezoneid="23" gmtadjustment="GMT-03:00" usedaylighttime="0" value="-3">(GMT-03:00) Buenos Aires, Georgetown</option>
                                                                    <option timezoneid="24" gmtadjustment="GMT-03:00" usedaylighttime="1" value="-3">(GMT-03:00) Greenland</option>
                                                                    <option timezoneid="25" gmtadjustment="GMT-03:00" usedaylighttime="1" value="-3">(GMT-03:00) Montevideo</option>
                                                                    <option timezoneid="26" gmtadjustment="GMT-02:00" usedaylighttime="1" value="-2">(GMT-02:00) Mid-Atlantic</option>
                                                                    <option timezoneid="27" gmtadjustment="GMT-01:00" usedaylighttime="0" value="-1">(GMT-01:00) Cape Verde Is.</option>
                                                                    <option timezoneid="28" gmtadjustment="GMT-01:00" usedaylighttime="1" value="-1">(GMT-01:00) Azores</option>
                                                                    <option timezoneid="29" gmtadjustment="GMT+00:00" usedaylighttime="0" value="0">(GMT+00:00) Casablanca, Monrovia, Reykjavik</option>
                                                                    <option timezoneid="30" gmtadjustment="GMT+00:00" usedaylighttime="1" value="0">(GMT+00:00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
                                                                    <option timezoneid="31" gmtadjustment="GMT+01:00" usedaylighttime="1" value="1">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                                                    <option timezoneid="32" gmtadjustment="GMT+01:00" usedaylighttime="1" value="1">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                                                    <option timezoneid="33" gmtadjustment="GMT+01:00" usedaylighttime="1" value="1">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                                                    <option timezoneid="34" gmtadjustment="GMT+01:00" usedaylighttime="1" value="1">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                                                                    <option timezoneid="35" gmtadjustment="GMT+01:00" usedaylighttime="1" value="1">(GMT+01:00) West Central Africa</option>
                                                                    <option timezoneid="36" gmtadjustment="GMT+02:00" usedaylighttime="1" value="2">(GMT+02:00) Amman</option>
                                                                    <option timezoneid="37" gmtadjustment="GMT+02:00" usedaylighttime="1" value="2">(GMT+02:00) Athens, Bucharest, Istanbul</option>
                                                                    <option timezoneid="38" gmtadjustment="GMT+02:00" usedaylighttime="1" value="2">(GMT+02:00) Beirut</option>
                                                                    <option timezoneid="39" gmtadjustment="GMT+02:00" usedaylighttime="1" value="2">(GMT+02:00) Cairo</option>
                                                                    <option timezoneid="40" gmtadjustment="GMT+02:00" usedaylighttime="0" value="2">(GMT+02:00) Harare, Pretoria</option>
                                                                    <option timezoneid="41" gmtadjustment="GMT+02:00" usedaylighttime="1" value="2">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
                                                                    <option timezoneid="42" gmtadjustment="GMT+02:00" usedaylighttime="1" value="2">(GMT+02:00) Jerusalem</option>
                                                                    <option timezoneid="43" gmtadjustment="GMT+02:00" usedaylighttime="1" value="2">(GMT+02:00) Minsk</option>
                                                                    <option timezoneid="44" gmtadjustment="GMT+02:00" usedaylighttime="1" value="2">(GMT+02:00) Windhoek</option>
                                                                    <option timezoneid="45" gmtadjustment="GMT+03:00" usedaylighttime="0" value="3">(GMT+03:00) Kuwait, Riyadh, Baghdad</option>
                                                                    <option timezoneid="46" gmtadjustment="GMT+03:00" usedaylighttime="1" value="3">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                                                    <option timezoneid="47" gmtadjustment="GMT+03:00" usedaylighttime="0" value="3">(GMT+03:00) Nairobi</option>
                                                                    <option timezoneid="48" gmtadjustment="GMT+03:00" usedaylighttime="0" value="3">(GMT+03:00) Tbilisi</option>
                                                                    <option timezoneid="49" gmtadjustment="GMT+03:30" usedaylighttime="1" value="3.5">(GMT+03:30) Tehran</option>
                                                                    <option timezoneid="50" gmtadjustment="GMT+04:00" usedaylighttime="0" value="4">(GMT+04:00) Abu Dhabi, Muscat</option>
                                                                    <option timezoneid="51" gmtadjustment="GMT+04:00" usedaylighttime="1" value="4">(GMT+04:00) Baku</option>
                                                                    <option timezoneid="52" gmtadjustment="GMT+04:00" usedaylighttime="1" value="4">(GMT+04:00) Yerevan</option>
                                                                    <option timezoneid="53" gmtadjustment="GMT+04:30" usedaylighttime="0" value="4.5">(GMT+04:30) Kabul</option>
                                                                    <option timezoneid="54" gmtadjustment="GMT+05:00" usedaylighttime="1" value="5">(GMT+05:00) Yekaterinburg</option>
                                                                    <option timezoneid="55" gmtadjustment="GMT+05:00" usedaylighttime="0" value="5">(GMT+05:00) Islamabad, Karachi, Tashkent</option>
                                                                    <option timezoneid="56" gmtadjustment="GMT+05:30" usedaylighttime="0" value="5.5">(GMT+05:30) Sri Jayawardenapura</option>
                                                                    <option timezoneid="57" gmtadjustment="GMT+05:30" usedaylighttime="0" value="5.5">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                                                    <option timezoneid="58" gmtadjustment="GMT+05:45" usedaylighttime="0" value="5.75">(GMT+05:45) Kathmandu</option>
                                                                    <option timezoneid="59" gmtadjustment="GMT+06:00" usedaylighttime="1" value="6">(GMT+06:00) Almaty, Novosibirsk</option>
                                                                    <option timezoneid="60" gmtadjustment="GMT+06:00" usedaylighttime="0" value="6" selected="">(GMT+06:00) Astana, Dhaka</option>
                                                                    <option timezoneid="61" gmtadjustment="GMT+06:30" usedaylighttime="0" value="6.5">(GMT+06:30) Yangon (Rangoon)</option>
                                                                    <option timezoneid="62" gmtadjustment="GMT+07:00" usedaylighttime="0" value="7">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                                                    <option timezoneid="63" gmtadjustment="GMT+07:00" usedaylighttime="1" value="7">(GMT+07:00) Krasnoyarsk</option>
                                                                    <option timezoneid="64" gmtadjustment="GMT+08:00" usedaylighttime="0" value="8">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                                                    <option timezoneid="65" gmtadjustment="GMT+08:00" usedaylighttime="0" value="8">(GMT+08:00) Kuala Lumpur, Singapore</option>
                                                                    <option timezoneid="66" gmtadjustment="GMT+08:00" usedaylighttime="0" value="8">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                                                    <option timezoneid="67" gmtadjustment="GMT+08:00" usedaylighttime="0" value="8">(GMT+08:00) Perth</option>
                                                                    <option timezoneid="68" gmtadjustment="GMT+08:00" usedaylighttime="0" value="8">(GMT+08:00) Taipei</option>
                                                                    <option timezoneid="69" gmtadjustment="GMT+09:00" usedaylighttime="0" value="9">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                                                    <option timezoneid="70" gmtadjustment="GMT+09:00" usedaylighttime="0" value="9">(GMT+09:00) Seoul</option>
                                                                    <option timezoneid="71" gmtadjustment="GMT+09:00" usedaylighttime="1" value="9">(GMT+09:00) Yakutsk</option>
                                                                    <option timezoneid="72" gmtadjustment="GMT+09:30" usedaylighttime="0" value="9.5">(GMT+09:30) Adelaide</option>
                                                                    <option timezoneid="73" gmtadjustment="GMT+09:30" usedaylighttime="0" value="9.5">(GMT+09:30) Darwin</option>
                                                                    <option timezoneid="74" gmtadjustment="GMT+10:00" usedaylighttime="0" value="10">(GMT+10:00) Brisbane</option>
                                                                    <option timezoneid="75" gmtadjustment="GMT+10:00" usedaylighttime="1" value="10">(GMT+10:00) Canberra, Melbourne, Sydney</option>
                                                                    <option timezoneid="76" gmtadjustment="GMT+10:00" usedaylighttime="1" value="10">(GMT+10:00) Hobart</option>
                                                                    <option timezoneid="77" gmtadjustment="GMT+10:00" usedaylighttime="0" value="10">(GMT+10:00) Guam, Port Moresby</option>
                                                                    <option timezoneid="78" gmtadjustment="GMT+10:00" usedaylighttime="1" value="10">(GMT+10:00) Vladivostok</option>
                                                                    <option timezoneid="79" gmtadjustment="GMT+11:00" usedaylighttime="1" value="11">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
                                                                    <option timezoneid="80" gmtadjustment="GMT+12:00" usedaylighttime="1" value="12">(GMT+12:00) Auckland, Wellington</option>
                                                                    <option timezoneid="81" gmtadjustment="GMT+12:00" usedaylighttime="0" value="12">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                                                    <option timezoneid="82" gmtadjustment="GMT+13:00" usedaylighttime="0" value="13">(GMT+13:00) Nuku'alofa</option>
                                                                </select>
                                                                <br>
                                                                <button class="btn gridStyle3" disabled="">Update Time zone</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-fw fa-language pti"></i>
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#pro-language" aria-expanded="false" class="collapsed"> 
                                                                <i class="fa fa-lg fa-angle-down pull-right"></i> 
                                                                <i class="fa fa-lg fa-angle-up pull-right"></i> 
                                                                Language </a>
                                                        </h4>
                                                    </div>
                                                    <div id="pro-language" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body no-padding">
                                                            <div class="col-md-6 form-group">
                                                                <label>Language</label>
                                                                <select class="form-control">
                                                                    <option>English</option>
                                                                </select>
                                                                <br>
                                                                <button class="btn gridStyle3 tn-flat" disabled="">Update Language</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-fw fa-cogs pti"></i>
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#pro-intro" aria-expanded="false" class="collapsed"> 
                                                                <i class="fa fa-lg fa-angle-down pull-right"></i> 
                                                                <i class="fa fa-lg fa-angle-up pull-right"></i> 
                                                                Intro Page </a>
                                                        </h4>
                                                    </div>
                                                    <div id="pro-intro" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body no-padding">
                                                            <div class="col-md-6 form-group">
                                                                <form action="http://172.16.0.64/yeezy/yzy-maintenence/users/update_intro" method="POST">
                                                                    <label>Want to skip?</label>
                                                                    <select name="intro" class="form-control">
                                                                        <option value="0">Disable Intro Page</option>
                                                                        <option value="1">Enable Intro Page</option>
                                                                    </select>
                                                                    <br>
                                                                    <button type="submit" class="btn gridStyle3 tn-flat">Update Intro</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>												
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="s2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-3">
                                                    <form onsubmit="propicupload()" id="propicupload" enctype="multipart/form-data" method="POST" style="text-align: center;">
                                                        <img src="<?php echo base_url("asset/img/avatars/" . $user_img); ?>" width="50%" height="50%" style="border-radius: 10px" alt="User Image"> <br /><br />
                                                        <input id="propic" name="propic" type="file">
                                                    </form>
                                                </div>
                                                <div class="col-md-9">
                                                    <form id="proForm">
                                                        <table width="100%">
                                                            <tbody><tr>
                                                                    <td class="col-md-6"><label>Full Name</label></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-6"><input name="full_name" value="<?php echo $crm_users_data[0]->full_name; ?>" class="form-control" required="" onkeyup="data_validation(this.value, 'full_name_feedback')" type="text">
                                                                        <p>Help your colleagues recognize you</p><br>
                                                                    </td>
                                                                    <td valign="top">
                                                                        <span id="full_name_feedback">Full name is required.</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-6"><label>Mobile Number</label></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-6"><input name="phone_mobile" value="<?php echo $crm_users_data[0]->phone_mobile; ?>" onkeyup="data_validation(this.value, 'mobile')" pattern="[-+\d ]*" class="form-control" type="text">
                                                                        <p>Help your colleagues contact you by phone</p><br>
                                                                    </td>
                                                                    <td valign="top">
                                                                        <span id="mobile_11">Mobile number should contain atleast 11 digits<br></span>
                                                                        <span id="mobile_0_9">Only digits, please.<br></span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-6"><label>Designation</label></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-6"><input name="designation" value="<?php echo $crm_users_data[0]->designation; ?>" class="form-control" type="text">
                                                                        <p>Let your colleagues know what you do. e.g. Web Designer</p><br>
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-6"><label>Address</label></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-6"><input name="address_city" value="<?php echo $crm_users_data[0]->address_city; ?>" class="form-control" type="text">
                                                                        <p>Let your colleagues find you on the map!</p><br>
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-6"><label>Date of Birth</label></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-6"><input name="dob" id="dob" value="<?php echo $crm_users_data[0]->dob; ?>" class="date-picker form-control hasDatepicker" type="text">
                                                                        <p>Let your colleagues wish you happy birthday!</p><br>
                                                                    </td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-6"><button type="button" onclick="checkNsubmit()" class="btn btn-warning">Update Profile</button></td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                            </tbody></table>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


        <!-- PAGE FOOTER -->
        <?php $this->load->view('template/footer.php'); ?>


        <!--================================================== -->
        <?php $this->load->view('template/includes_bottom.php'); ?>
        <?php if (isset($profile_msg_title) AND $profile_msg_title != "") { ?>
            <script type="text/javascript">
                swal({
                    title: "<?php echo $profile_msg_title; ?>",
                    text: "<?php echo $profile_msg_body; ?>",
                    type: "<?php echo $profile_msg_type; ?>"
                }).then(function () {
                    window.location.assign("<?php echo base_url("profile") ?>");
                });

            </script>
        <?php } ?>
        <script type="text/javascript">
            var val = getCookie("openprofilepage");
            if (val) {
                $('.nav-tabs a[href="#s2"]').tab('show');
                setCookie("openprofilepage", 0, 0);
            }

            $("#propic").fileinput({
                allowedFileExtensions: ['jpg', 'png', 'gif'],
                showCaption: false,
                maxImageWidth: 128,
                maxImageHeight: 128,
                showRemove: false,
                uploadAsync: true,
                overwriteInitial: false,
                resizeImage: true,
                removeFromPreviewOnError: true,
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
            });


            function check_cur_pass(e) {
                if (e.value == "") {
                    $("#cur_pass_msg").html("Current Password is required.");
                } else {
                    var request = $.ajax({
                        url: "<?php echo base_url("Profile/check_cur_pass"); ?>",
                        method: "POST",
                        data: {uid: user_id, cur_pass: e.value},
                        dataType: "json"
                    });
                    request.done(function (res) {
                        if (res === false) {
                            $("#cur_pass_msg").html("Current Password doesn't match!!!");
                        } else {
                            $("#cur_pass_msg").html("");
                        }
                    });
                }
            }

            function check_new_pass(e) {
                var new_pass = e.value;
                if (new_pass == "")
                    $("#new_pass_msg").html("New Password is required.");
                else if (new_pass.length < 6)
                    $("#new_pass_msg").html("Password must be minimum 6 characters in length.");
                else
                    $("#new_pass_msg").html("");
            }

            function check_con_pass(e) {
                var con_pass = e.value;
                if (con_pass == "")
                    $("#con_pass_msg").html("Confirm Password is required.");
                else if (con_pass.length > 0 && con_pass != $("#new_pass").val())
                    $("#con_pass_msg").html("Password doesn't match.");
                else
                    $("#con_pass_msg").html("");
            }

            function propicupload() {
                var formData = new FormData($('#propicupload')[0]);
                var request = $.ajax({
                    url: "<?php echo base_url("profile/uploadprofileimg") ?>",
                    method: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json"
                });
                request.done(function (res) {
                    setCookie("openprofilepage", 1, 1);
                    location.reload();
                });
            }


            function checkNsubmit() {
                if ($("#full_name_feedback").is(":visible") || $("#mobile_11").is(":visible") || $("#mobile_0_9").is(":visible")) {
                    swal("Please complete the form properly...", "", "warning");
                } else {
                    var proForm = new FormData($('#proForm')[0]);
                    var request = $.ajax({
                        url: "<?php echo site_url("profile/updateprofile"); ?>",
                        method: "POST",
                        data: proForm,
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: "json"
                    });
                    request.done(function (res) {
                        if (res) {
                            setCookie("openprofilepage", 1, 1);
                            location.reload();
                        }
                    });
                    request.fail(function (e) {
                        swal("Please complete the form properly...", "", "warning");
                    });
                }

            }

            function data_validation(s, id) {
                switch (id) {
                    case "full_name_feedback":
                        (s == "") ? $("#full_name_feedback").show() : $("#full_name_feedback").hide();
                        break;
                    case "mobile":
                        (!$.isNumeric(s)) ? $("#mobile_0_9").show() : $("#mobile_0_9").hide();
                        (s.length < 11) ? $("#mobile_11").show() : $("#mobile_11").hide();
                        break;
                }
            }


            flatpickr("#dob", {
                enableTime: false,
                dateFormat: 'M-d-Y',
                clickOpens: true
            });
        </script>
    </body>
</html>