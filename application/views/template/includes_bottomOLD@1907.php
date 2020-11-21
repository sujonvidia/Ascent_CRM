<div id="emodivforqrc"><?php
    $emo_url = base_url("asset/emotion");
    $emotionImg = array("smile.png", "smile-big.png", "sad.png", "crying.png", "tongue.png", "shock.png", "angry.png", "confused.png", "wink.png", "embarrassed.png", "disapointed.png", "sick.png", "shut-mouth.png", "sleepy.png", "eyeroll.png", "thinking.png", "lying.png", "glasses-nerdy.png", "teeth.png", "angel.png", "bye.png", "clap.png", "hug-left.png", "hug-right.png", "good.png", "bad.png", "highfive.png", "love.png", "love-over.png", "tv.png", "mail.png", "rain.png", "pizza.png", "coffee.png", "computer.png", "beer.png", "drink.png", "cat.png", "dog.png", "sun.png", "star.png", "clock.png", "present.png", "mobile.png", "musical-note.png", "boy.png", "girl.png", "cake.png", "car.png");
    foreach ($emotionImg as $v):
        ?> 
        <img onclick="" class="emo emoforqrc" src="<?php echo $emo_url . "/" . $v; ?>"> <?php endforeach; ?>
</div>
<div id="fb-root"></div>
<!-- POPOver -->
<div id="popTopBox"></div>
<!-- workspaceModal -->
<div class="modal fade" id="workspaceModal" tabindex="-1" role="dialog" aria-labelledby="workspaceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="workspaceModalLabel">Add new workspace</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" id="createWStext" class="form-control" placeholder="Title" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cancel
                </button>
                <button type="button" onclick="createWS($('#createWStext').val())" class="btn btn-primary" data-dismiss="modal">
                    Open workspace
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- workspaceModal -->
<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    var user_id = "<?php echo (isset($id) ? $id : ''); ?>";
    var user_name = "<?php echo (isset($username) ? $username : ''); ?>";
    var thisprojectstatus = [];
</script>
<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php echo base_url(); ?>asset/js/plugin/pace/pace.min.js"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    if (!window.jQuery) {
        document.write('<script src="<?php echo base_url(); ?>asset/js/libs/jquery-2.1.1.min.js"><\/script>');
    }
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="https://cdn.rawgit.com/digitalBush/jquery.maskedinput/1.4.1/dist/jquery.maskedinput.min.js"></script>

<script>
    if (!window.jQuery.ui) {
        document.write('<script src="<?php echo base_url(); ?>asset/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
    }
</script>

<script src="<?php echo base_url(); ?>asset/js/plugin/jquery-ui-month-picker/demo/MonthPicker.min.js"></script>

<!-- IMPORTANT: APP CONFIG -->
<script src="<?php echo base_url(); ?>asset/js/app.config.js"></script>

<script src="<?php echo base_url(); ?>asset/js/plugin/jquery.key.js"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="<?php echo base_url(); ?>asset/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

<!-- BOOTSTRAP JS -->
<script src="<?php echo base_url(); ?>asset/js/bootstrap/bootstrap.min.js"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="<?php echo base_url(); ?>asset/js/notification/SmartNotification.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="<?php echo base_url(); ?>asset/js/smartwidgets/jarvis.widget.min.js"></script>

<!-- EASY PIE CHARTS -->
<script src="<?php echo base_url(); ?>asset/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

<!-- SPARKLINES -->
<script src="<?php echo base_url(); ?>asset/js/plugin/sparkline/jquery.sparkline.min.js"></script>

<!-- JQUERY VALIDATE -->
<script src="<?php echo base_url(); ?>asset/js/plugin/jquery-validate/jquery.validate.min.js"></script>

<!-- JQUERY MASKED INPUT -->
<script src="<?php echo base_url(); ?>asset/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="<?php echo base_url(); ?>asset/js/plugin/select2/select2.full.js?v=<?php echo time(); ?>"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="<?php echo base_url(); ?>asset/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

<!-- Bootstrap datepicker -->
<!-- <script src="<?php echo base_url(); ?>asset/js/plugin/bootstrap-datepicker/bootstrap-datepicker.js"></script> -->

<!-- browser msie issue fix -->
<script src="<?php echo base_url(); ?>asset/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

<!-- FastClick: For mobile devices -->
<script src="<?php echo base_url(); ?>asset/js/plugin/fastclick/fastclick.min.js"></script>

<!-- MAIN APP JS FILE -->
<script src="<?php echo base_url(); ?>asset/js/app.min.js"></script>

<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
<!-- Voice command : plugin -->
<script src="<?php echo base_url(); ?>asset/js/speech/voicecommand.min.js"></script>

<!-- Lightbox -->
<script src='<?php echo base_url(); ?>asset/js/plugin/lightbox/dist/ekko-lightbox.js'></script>
<!-- Bootbox -->
<script src="<?php echo base_url('asset/js/bootbox.js'); ?>" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>asset/js/plugin/icheck/icheck.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugin/checkBo/js/checkBo.min.js"></script>

<script src="<?php //echo base_url('asset/js/chosen.jquery.min.js');          ?>" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/js/plugin/jquery.validate.min.js"></script>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugin/summernote/summernote.min.js"></script>
<script type="text/javascript">
    function bootbox_alert(title, msg, reload) {
        bootbox.dialog({
            size: "small",
            className: "customBootBox",
            message: msg,
            title: title,
            buttons: {
                success: {
                    label: "Ok",
                    className: "btn-success",
                    callback: function () {
                        if (typeof reload !== 'undefined' || reload) {
                            location.reload();
                        }
                    }
                }
            }
        });
    }
</script>

<!-- bootstrap color picker -->
<script src="<?php echo base_url('asset/js/colorpicker/bootstrap-colorpicker.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('asset/js/bootstrap-modal-popover.js'); ?>" type="text/javascript"></script>

<style>.clickable{cursor: pointer;}</style>
<script type="text/javascript">
    $(document).ready(function ($) {
        // delegate calls to data-toggle="lightbox"
        $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function (event) {
            event.preventDefault();
            return $(this).ekkoLightbox({
                onShown: function () {
                    if (window.console) {
                        return console.log('Checking our the events huh?');
                    }
                },
            });
        });
    });
</script>
<!-- SmartChat UI : plugin -->
<!-- <script src="<?php echo base_url(); ?>asset/js/smart-chat-ui/smart.chat.ui.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/smart-chat-ui/smart.chat.manager.min.js"></script> -->

<!-- ITL Chat : plugin -->
<script src="<?php echo base_url(); ?>asset/js/itl-chat/itl-chat-manager.js"></script>

<?php include("chat_script.php"); ?>
<script type="text/javascript">
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
</script>


<!-- PAGE RELATED PLUGIN(S) -->

<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
<script src="<?php echo base_url(); ?>asset/js/plugin/flot/jquery.flot.cust.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugin/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugin/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugin/flot/jquery.flot.tooltip.min.js"></script>

<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
<script src="<?php echo base_url(); ?>asset/js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugin/vectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- Fileinput plugin -->
<!-- <script src="<?php echo base_url(); ?>asset/js/plugin/fileinput/fileinput.js"></script> -->
<script src="<?php echo base_url(); ?>asset/js/plugin/fileinput/fileinput_custom.js"></script>

<!-- Full Calendar -->
<script src="<?php echo base_url(); ?>asset/js/plugin/moment/moment.min.js"></script> 
<script src="<?php echo base_url(); ?>asset/js/plugin/moment/moment-weekday-calc.min.js"></script> 
<script src="<?php echo base_url(); ?>asset/js/plugin/moment/moment-recur.min.js"></script> 
<!-- <script src="<?php echo base_url(); ?>asset/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script> -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/js/plugin/fullcalendar-2.3.1/fullcalendar.min.css">
<script src="<?php echo base_url(); ?>asset/js/plugin/fullcalendar-2.3.1/fullcalendar.min.js"></script>


<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo base_url(); ?>asset/js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugin/datatables/dataTables.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo base_url(); ?>asset/js/plugin/summernote/summernote.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugin/markdown/markdown.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugin/markdown/to-markdown.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugin/markdown/bootstrap-markdown.min.js"></script>

<!-- datetimepicker PLUGIN(S) -->
<script src="<?php echo base_url(); ?>asset/js/plugin/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>

<!-- flatpickr -->
<script src="<?php echo base_url(); ?>asset/js/plugin/flatpickr-gh-pages/bower_components/flatpickr/dist/flatpickr.js"></script>

<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/es6-promise/latest/es6-promise.auto.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/plugin/bootstrap-sweetalert/dist/sweetalert2.min.js"></script>

<!-- qtip -->
<script src="<?php echo base_url(); ?>asset/js/plugin/jquery.qtip.custom/jquery.qtip.min.js"></script>
<script src="<?php echo base_url("asset/js/plugin/timer/abtimer.js"); ?>"></script>

<!-- Old toast -->
<script src="<?php echo base_url('asset/js/plugin/toast/jquery.toaster.js'); ?>?v=<?php echo time(); ?>" type="text/javascript"></script>
<!-- New toast -->
<link href="<?php echo base_url('asset/css/toastr.css')?>" rel="stylesheet"/>
<script src="<?php echo base_url('asset/js/toastr.js'); ?>?v=<?php echo time(); ?>" type="text/javascript"></script>

<script type="text/javascript">
    var userName = '<?php echo (isset($username) ? $username : ""); ?>';
    var user_img = '<?php echo (isset($user_img) ? $user_img : ""); ?>';
    var id = '<?php echo (isset($id) ? $id : ''); ?>';
    var crm_emp = <?php echo (isset($allusers) ? json_encode($allusers) : "'0'"); ?>;
    var newUser = [];
    var parentID = [];
    var typeID = [];
</script>
<!-- tags
<script src="<?php echo base_url('asset/js/plugin/tags/jquery.tagsinput.min.js'); ?>" type="text/javascript"></script>
 -->
<script type="text/javascript">
    function open_feed(page) {
        if ($("#feed-wid").css("display") == "block" && page != "dashboard") {
            close_feed();
        } else {
            if ($("#chat-wid").css("display") == "block") {
                $("#chat-wid").hide();
                $(".chat-wid-back").hide();
            }
            if (page != "dashboard") {
                $("#feed-wid").css("left", "0");
                $("#feed-wid").addClass("feed-slide-in");
                $(".chat-wid-back").show();
            }
            $("#feed-wid").show();
            var width = getCookie("feed_div_width");

            $("#feed-wid").width(width);
            
            if (page == "dashboard") {
                $("#feedeclose").hide();
                $("#feedexpand").css("margin-right", "1px");
                $("#feddcollaspe").css("margin-right", "1px");
            } else if (page == "projects") {
                $("#feedeclose").show();
                $("#feed-wid").width($(".projectListDiv").innerWidth() - 35);
                $(".fixedContent").height($(".projectListDiv").innerHeight() - 55);
                $("#feedexpand").css("margin-right", "30px");
                $("#feddcollaspe").css("margin-right", "30px");
            } else {
                $("#feedeclose").show();
                $("#feedexpand").css("margin-right", "30px");
                $("#feddcollaspe").css("margin-right", "30px");
            }
            // swal("myprojectList",$("#feed-wid").width(),"success");
        }
    }
    function close_feed() {
        if ("<?php echo $page_name; ?>" == "dashboard") {
            $("#feed-wid").hide();
        } else {
            $("#feed-wid").removeClass("feed-slide-in").addClass("feed-slide-out");
        }
        $(".chat-wid-back").hide(function () {
            $('.backDivPro').remove();
            $('.backDivPro').fadeOut(300, function () {
                $(this).remove();
            });
            $("#feed-wid").hide();
            $("#feed-wid").removeClass("feed-slide-out").addClass("feed-slide-in");
        });
        if ($(".projectListDiv").length > 0) {
            $("#wid-id-4").show();
            //$(".projectListDiv").css("background", "#5d5c5c");
        }
    }

    function ExpandFeed() {
        $('#feedexpand').css('display', 'none');
        $('#feddcollaspe').css('display', 'block');
        // swal("expand feed", getCookie("feed_div_width"), "success");
        $("#feed-wid").width(($("#feed-wid").width() * 2));
    }

    function CollaspeFeed() {
        $('#feedexpand').css('display', 'block');
        $('#feddcollaspe').css('display', 'none');
        // swal("collaspe feed", $("#feed-wid").width() / 2, "success");
        $("#feed-wid").width(($("#feed-wid").width() / 2));
    }

    function hideFeed(value) {
        if (value == 'viewall') {
            $('.directchat').show('slow');
            $('.notifation').show('slow');
        }

        if (value == 'directchat') {
            $('.notifation').hide('slow');
            $('.news').hide('slow');
            $('.directchat').show('slow');
        }

        if (value == 'notifation') {
            $('.news').hide('slow');
            $('.directchat').hide('slow');
            $('.notifation').show('slow');
        }

        if (value == 'news') {
            $('.directchat').hide('slow');
            $('.notifation').hide('slow');
            $('.news').show('slow');
        }
    }


</script>

<script type="text/javascript">

    // DO NOT REMOVE : GLOBAL FUNCTIONS!

    $(document).ready(function () {

        
        /*
         * MARKDOWN EDITOR
         */

        $("#mymarkdown").markdown({
            autofocus: false,
            savable: true
        })


    })

</script>

<script>
    $(document).ready(function () {

        // DO NOT REMOVE : GLOBAL FUNCTIONS!
        pageSetUp();

        /*
         * PAGE RELATED SCRIPTS
         */

        $(".js-status-update a").click(function () {
            var selText = $(this).text();
            var $this = $(this);
            $this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
            $this.parents('.dropdown-menu').find('li').removeClass('active');
            $this.parent().addClass('active');
        });

        /*
         * TODO: add a way to add more todo's to list
         */

        // initialize sortable
        $(function () {
            $("#sortable1, #sortable2").sortable({
                handle: '.handle',
                connectWith: ".todo",
                update: countTasks
            }).disableSelection();
        });

        // check and uncheck
        $('.todo .checkbox > input[type="checkbox"]').click(function () {
            var $this = $(this).parent().parent().parent();

            if ($(this).prop('checked')) {
                $this.addClass("complete");

                // remove this if you want to undo a check list once checked
                //$(this).attr("disabled", true);
                $(this).parent().hide();

                // once clicked - add class, copy to memory then remove and add to sortable3
                $this.slideUp(500, function () {
                    $this.clone().prependTo("#sortable3").effect("highlight", {}, 800);
                    $this.remove();
                    countTasks();
                });
            } else {
                // insert undo code here...
            }

        })
        // count tasks
        function countTasks() {

            $('.todo-group-title').each(function () {
                var $this = $(this);
                $this.find(".num-of-tasks").text($this.next().find("li").size());
            });

        }

        /*
         * RUN PAGE GRAPHS
         */

        /* TAB 1: UPDATING CHART */
        // For the demo we use generated data, but normally it would be coming from the server

        var data = [], totalPoints = 200, $UpdatingChartColors = $("#updating-chart").css('color');

        function getRandomData() {
            if (data.length > 0)
                data = data.slice(1);

            // do a random walk
            while (data.length < totalPoints) {
                var prev = data.length > 0 ? data[data.length - 1] : 50;
                var y = prev + Math.random() * 10 - 5;
                if (y < 0)
                    y = 0;
                if (y > 100)
                    y = 100;
                data.push(y);
            }

            // zip the generated y values with the x values
            var res = [];
            for (var i = 0; i < data.length; ++i)
                res.push([i, data[i]])
            return res;
        }


        // setup control widget
        var updateInterval = 1500;
        $("#updating-chart").val(updateInterval).change(function () {

            var v = $(this).val();
            if (v && !isNaN(+v)) {
                updateInterval = +v;
                $(this).val("" + updateInterval);
            }

        });

        // setup plot
        var options = {
            yaxis: {
                min: 0,
                max: 100
            },
            xaxis: {
                min: 0,
                max: 100
            },
            colors: [$UpdatingChartColors],
            series: {
                lines: {
                    lineWidth: 1,
                    fill: true,
                    fillColor: {
                        colors: [{
                                opacity: 0.4
                            }, {
                                opacity: 0
                            }]
                    },
                    steps: false

                }
            }
        };

        var plot = $.plot($("#updating-chart"), [getRandomData()], options);

        /* live switch */
        $('input[type="checkbox"]#start_interval').click(function () {
            if ($(this).prop('checked')) {
                $on = true;
                updateInterval = 1500;
                update();
            } else {
                clearInterval(updateInterval);
                $on = false;
            }
        });
        
        function update() {
            if ($on == true) {
                plot.setData([getRandomData()]);
                plot.draw();
                setTimeout(update, updateInterval);

            } else {
                clearInterval(updateInterval)
            }

        }

        var $on = false;

        /*end updating chart*/

        /* TAB 2: Social Network  */

        $(function () {
            // jQuery Flot Chart
            var twitter = [[1, 27], [2, 34], [3, 51], [4, 48], [5, 55], [6, 65], [7, 61], [8, 70], [9, 65], [10, 75], [11, 57], [12, 59], [13, 62]], facebook = [[1, 25], [2, 31], [3, 45], [4, 37], [5, 38], [6, 40], [7, 47], [8, 55], [9, 43], [10, 50], [11, 47], [12, 39], [13, 47]], data = [{
                    label: "Twitter",
                    data: twitter,
                    lines: {
                        show: true,
                        lineWidth: 1,
                        fill: true,
                        fillColor: {
                            colors: [{
                                    opacity: 0.1
                                }, {
                                    opacity: 0.13
                                }]
                        }
                    },
                    points: {
                        show: true
                    }
                }, {
                    label: "Facebook",
                    data: facebook,
                    lines: {
                        show: true,
                        lineWidth: 1,
                        fill: true,
                        fillColor: {
                            colors: [{
                                    opacity: 0.1
                                }, {
                                    opacity: 0.13
                                }]
                        }
                    },
                    points: {
                        show: true
                    }
                }];

            var options = {
                grid: {
                    hoverable: true
                },
                colors: ["#568A89", "#3276B1"],
                tooltip: true,
                tooltipOpts: {
                    //content : "Value <b>$x</b> Value <span>$y</span>",
                    defaultTheme: false
                },
                xaxis: {
                    ticks: [[1, "JAN"], [2, "FEB"], [3, "MAR"], [4, "APR"], [5, "MAY"], [6, "JUN"], [7, "JUL"], [8, "AUG"], [9, "SEP"], [10, "OCT"], [11, "NOV"], [12, "DEC"], [13, "JAN+1"]]
                },
                yaxes: {

                }
            };

            var plot3 = $.plot($("#statsChart"), data, options);
        });

        // END TAB 2

        // TAB THREE GRAPH //
        /* TAB 3: Revenew  */

        $(function () {

            var trgt = [[1354586000000, 153], [1364587000000, 658], [1374588000000, 198], [1384589000000, 663], [1394590000000, 801], [1404591000000, 1080], [1414592000000, 353], [1424593000000, 749], [1434594000000, 523], [1444595000000, 258], [1454596000000, 688], [1464597000000, 364]], prft = [[1354586000000, 53], [1364587000000, 65], [1374588000000, 98], [1384589000000, 83], [1394590000000, 980], [1404591000000, 808], [1414592000000, 720], [1424593000000, 674], [1434594000000, 23], [1444595000000, 79], [1454596000000, 88], [1464597000000, 36]], sgnups = [[1354586000000, 647], [1364587000000, 435], [1374588000000, 784], [1384589000000, 346], [1394590000000, 487], [1404591000000, 463], [1414592000000, 479], [1424593000000, 236], [1434594000000, 843], [1444595000000, 657], [1454596000000, 241], [1464597000000, 341]], toggles = $("#rev-toggles"), target = $("#flotcontainer");

            var data = [{
                    label: "Target Profit",
                    data: trgt,
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 30 * 30 * 60 * 1000 * 80
                    }
                }, {
                    label: "Actual Profit",
                    data: prft,
                    color: '#3276B1',
                    lines: {
                        show: true,
                        lineWidth: 3
                    },
                    points: {
                        show: true
                    }
                }, {
                    label: "Actual Signups",
                    data: sgnups,
                    color: '#71843F',
                    lines: {
                        show: true,
                        lineWidth: 1
                    },
                    points: {
                        show: true
                    }
                }]

            var options = {
                grid: {
                    hoverable: true
                },
                tooltip: true,
                tooltipOpts: {
                    //content: '%x - %y',
                    //dateFormat: '%b %y',
                    defaultTheme: false
                },
                xaxis: {
                    mode: "time"
                },
                yaxes: {
                    tickFormatter: function (val, axis) {
                        return "$" + val;
                    },
                    max: 1200
                }

            };

            plot2 = null;

            function plotNow() {
                var d = [];
                toggles.find(':checkbox').each(function () {
                    if ($(this).is(':checked')) {
                        d.push(data[$(this).attr("name").substr(4, 1)]);
                    }
                });
                if (d.length > 0) {
                    if (plot2) {
                        plot2.setData(d);
                        plot2.draw();
                    } else {
                        plot2 = $.plot(target, d, options);
                    }
                }

            }
            ;

            toggles.find(':checkbox').on('change', function () {
                plotNow();
            });
            plotNow()

        });

        /*
         * VECTOR MAP
         */

        data_array = {
            "US": 4977,
            "AU": 4873,
            "IN": 3671,
            "BR": 2476,
            "TR": 1476,
            "CN": 146,
            "CA": 134,
            "BD": 100
        };

        $('#vector-map').vectorMap({
            map: 'world_mill_en',
            backgroundColor: '#fff',
            regionStyle: {
                initial: {
                    fill: '#c4c4c4'
                },
                hover: {
                    "fill-opacity": 1
                }
            },
            series: {
                regions: [{
                        values: data_array,
                        scale: ['#85a8b6', '#4d7686'],
                        normalizeFunction: 'polynomial'
                    }]
            },
            onRegionLabelShow: function (e, el, code) {
                if (typeof data_array[code] == 'undefined') {
                    e.preventDefault();
                } else {
                    var countrylbl = data_array[code];
                    el.html(el.html() + ': ' + countrylbl + ' visits');
                }
            }
        });

        
        $.filter_input = $('#filter-chat-list');
        $.chat_users_container = $('#chat-container > .chat-list-body')
        $.chat_users = $('#chat-users')
        $.chat_list_btn = $('#chat-container > .chat-list-open-close');
        $.chat_body = $('#chat-body');

        /*
         * LIST FILTER (CHAT)
         */

        // custom css expression for a case-insensitive contains()
        jQuery.expr[':'].Contains = function (a, i, m) {
            return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
        };

        function listFilter(list) {// header is any element, list is an unordered list
            // create and add the filter form to the header

            $.filter_input.change(function () {
                var filter = $(this).val();
                if (filter) {
                    // this finds all links in a list that contain the input,
                    // and hide the ones not containing the input while showing the ones that do
                    $.chat_users.find("a:not(:Contains(" + filter + "))").parent().slideUp();
                    $.chat_users.find("a:Contains(" + filter + ")").parent().slideDown();
                } else {
                    $.chat_users.find("li").slideDown();
                }
                return false;
            }).keyup(function () {
                // fire the above change event after every letter
                $(this).change();

            });

        }

        // on dom ready
        listFilter($.chat_users);

        // open chat list
        $.chat_list_btn.click(function () {
            $(this).parent('#chat-container').toggleClass('open');
        })

        $.chat_body.animate({
            scrollTop: $.chat_body[0].scrollHeight
        }, 500);

    });



</script>

<script type="text/javascript">
    $('.cur-time').html(moment().format('dddd MMMM DD'));
    // var DashboardEvents = <?php //echo json_encode($DashboardEvents);          ?>;
    // console.log(DashboardEvents);
    // $(DashboardEvents).each(function(i,eventdata) {

    // });
</script>
<script type="text/javascript">

//$( ".datepicker" ).datepicker();

</script>
<script type="text/javascript">
    /***
     This two function are required for hidden-menu view or lock
     */

    function toggleClass() {
        // swal("HTML", getCookie("hidden-menu-mobile-lock"), "success");
        if ($("#logoToggle").hasClass('fa-caret-left')) {
            $("#logoToggle").removeClass('fa-caret-left').addClass('fa-reorder');
            $("#logoToggle").css('margin-left', '-0.5%');
            $("#logoToggle").css('font-size', '20px');
            $("#logoToggle").css('margin-top', '0.7%');
            $("#logoToggle").css('position', 'absolute');
            $("#logoToggle").css('color', '#ffffff');
            // setCookie("hidden-menu-mobile-lock", "0", 7);
            setPreferences(0);
        } else {
            $("#logoToggle").removeClass('fa-reorder').addClass('fa-caret-left');
            $("#logoToggle").css('margin-left', '-0.5%');
            $("#logoToggle").css('font-size', '32px');
            $("#logoToggle").css('margin-top', '0.4%');
            
            $("#logoToggle").css('color', '#ffffff');
            // setCookie("hidden-menu-mobile-lock", "1", 7);
            setPreferences(1);
        }
    }

    function setPreferences(v) {
        var request = $.ajax({
            url: "<?php echo site_url("dashboard/setPreferences"); ?>",
            method: "POST",
            data: {leftMenu: v},
            dataType: "json"
        });
        request.done(function (res) {
            //console.log(res);
        });
        request.fail(function (e) {
            console.log("Send message error...");
            console.log(e.setPreferences);
        });
    }

    /***
     End of two function which required for hidden-menu view or lock
     */
</script>

<script type="text/javascript">

    function convertMysqldate(dateStr) {    // Assuming input:2014-01-30 16:21:09
        var t = dateStr.split(/[- :]/);
        var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var year = t[0];
        var month = monthNames[parseInt(t[1]) - 1];
        var day = t[2];
        var hourTmp = t[3];
        var minute = t[4];
        var seconds = t[5];

        if (parseInt(hourTmp) > 12) {
            var hour = parseInt(parseInt(hourTmp) - 12) + ":" + minute + ":" + seconds + " PM";
        } else if (parseInt(hourTmp) === 12) {
            hour = parseInt(hourTmp) + ":" + minute + ":" + seconds + " PM";
        } else {
            hour = parseInt(hourTmp) + ":" + minute + ":" + seconds + " AM";
        }
        return (hour + " on " + day + " " + month + " " + year);
    }

    $(".open_newpro1").click(function () {

        $("#new_project_name").val("");
        $("#brief_note_new").val("");
        $('#DescShow').hide();
        $('#openNewProject_s1').modal('show');
        //$('#openNewProject_s2').modal('hide');
    });

    function drawCommentGroupTime(time) {
        var ltime = moment(time).calendar().split(" at");
        var design = '		<div class="panel panel-default commentgt">';
        if (ltime.length > 1)
            design += ltime[0];
        else
            design += moment(time).format("LL");
        design += '		</div>';
        return design;
    }

    function openCommentsForFeed(projectID, attr, data) {

        var floatingDiv = ' <div class="backDiv"  data-attr="' + attr + projectID + '" id="backDiv' + attr + projectID + '"><div id="Pro' + projectID + '" class="floting_box">';
        floatingDiv += '    <div class="panel panel-default" style="border: none;">';
        floatingDiv += '        <div class="panel-heading" style="height:60px;">';
        floatingDiv += '            <span class="col-lg-11 proDivname">';
        floatingDiv += '                <span style="width:100%;float: left;line-height: 1.5;text-overflow: ellipsis;margin-top: -18px;" class="project-text-prop" id="comProname' + projectID + '"></span>';
        floatingDiv += '                <span style="width:100%;float: left;font-size: 14px;margin-top: 0px;" id="comCrename"></span>';
        floatingDiv += '            </span>';
        floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
        floatingDiv += '        </div>';
        floatingDiv += '        <div class="panel-body">' + projectCommentsDesign(data, projectID) + '</div>';
        floatingDiv += '     </div>';
        floatingDiv += ' </div></div>';


        $("#projectBody").append(floatingDiv);

        $("#attachListDivCommnet").animate({scrollTop: $('#attachListDivCommnet').prop("scrollHeight")}, 1000);

        //setProjecttag(data,projectID);

        $("#comProname" + projectID).text(data.title[0].Title);

        $("#newTaskInput").attr('data-projectid', projectID);

        $.each(alluser, function (key, value) {
            var userID = data.title[0].CreatedBy;
            var CreatedDate = data.title[0].CreatedDate;
            if (value.ID == userID) {
                $("#comCrename").html('<span class="todo-createdby">Created By: ' + value.full_name + ' On: ' + moment(CreatedDate).format('MMM DD YYYY HH:mm:ss') + '</span>');
            }
        });
    }


    function projectCommentsDesign(data, projectsid) {
        //console.log("here we are 2");
        var tabDetail =  '  <div class="row">';
            tabDetail += '    <div class="col-lg-12 projectfilefDiv" style="padding: 0% 4% 0% 4%;">';
            tabDetail += '  </div>';
            tabDetail += '  <div class="row attachListDiv" id="attachListDivCommnet" style="min-height: 510px;">';

        var daterow = "";
        if (data.allComm.length > 0) {
            $.each(data.allComm, function (k, v) {
                var time = data.allComm[k].time;
                if (daterow == "") {
                    daterow = moment(time).format('L');
                    tabDetail += drawCommentGroupTime(time);
                } else if (daterow != moment(time).format('L')) {
                    daterow = moment(time).format('L');
                    tabDetail += drawCommentGroupTime(time);
                }

                var matches = data.allComm[k].full_name.match(/\b(\w)/g);
                var acronym = matches.join('');

                // console.log(v);

                tabDetail +='       <div class="panel panel-default proComm ptt'+data.allComm[k].id+'">';
                tabDetail +='           <div class="panel-body status">';
                tabDetail +='               <div class="who clearfix">';
                tabDetail +='                   <span class="comment_imghover">';
                
                tabDetail +='                   <span style="    margin-right: 2px;margin-top: 1px;float: left;" href="javascript:void(0);" class="btn btn-primary btn-circle customBtnClr">'+acronym+'</span>';
                tabDetail +='                   <span class="from" style="    width: 89%;float: left;margin-left: 2%;"><span class="CusUsrNm">'+data.allComm[k].full_name+'</span><span class="CusUsrTm"> '+moment(time).format('MMM D, YYYY [at] h:mm A z')+'</span></span>';
                tabDetail +='                   <span class="from" style="width: 87%;float: left;margin-left: 2%;font-size: 14px;margin-top: 10px;    line-height: 1.2em;color: #000000;">'+atob(data.allComm[k].msg)+'</span>';
                tabDetail +='                   <div class="name dropdown"><b></b>'+
                                                    '<a data-toggle="dropdown" class="dropdown-toggle" title="Settings">'+
                                                        '<i class="fa fa-chevron-down pull-right" style="color:#686868;"></i>'+
                                                    '</a>'+
                                                    '<ul class="dropdown-menu pull-right">'+
                                                        '<div class="arrow-top-right"></div>'+
                                                        '<li><a onclick="">Msg Info</a></li>'+
                                                        '<li><a onclick="delComment(\''+data.allComm[k].id+'\')">Delete</a></li>'+
                                                        // '<li><a onclick="">Forward</a></li>'+
                                                    '</ul>'+
                                                    //'<i class="fa fa-star-o pull-right" onclick=""></i>'+
                                                '</div>';
                tabDetail +='               </div>';
                tabDetail +='           </div>';
                tabDetail +='       </div>';
                
            });

        }else{
            tabDetail += '          <button onclick="$(\'#commentinput\').focus();" style="left:38% !important;" class="css3button"> Start Converstation</button><img src="'+base_url+'icons/nocomment.png" id="nocommentImg" class="nocommentImg">';
        }
        tabDetail += '    </div>';
        tabDetail += '	 <div class="projectInput" style="width: 97.1%;left: 13px;height: 50px;">';
        tabDetail += '	 		<div id="commentinput" onfocus="if($(this).html() == \'Type a message...\') $(this).html(\'\');expanComDiv();" onblur="if($(this).html() == \'\') $(this).html(\'Type a message...\');closeComDiv();" contenteditable data-status="ProjectCmnt" class="form-control commentinput">Type a message...</div>';
        tabDetail += '	 		<input multiple="multiple" type="file" id="com_attch" style="display: none">';
        tabDetail += '	 		<a data-title="Attachment" data-toggle="lightbox" title="Attachment" href="' + base_url + '/projects/comattach/Project/' + $("#newTaskInput").attr('data-projectid') + '/ProjectsFiles">';
        tabDetail += '	 			<img src="icons/attach.png" id="input_img2" style="right: 15px !important;">';
        tabDetail += '	 		</a>';
        tabDetail += '	 		<img src="icons/emo.png" onclick="on_off_com_emo_popup()" id="input_img1">';
        tabDetail += '			<div class="comment_emo_popup">'
                + '<h3 class="popover-title" style="margin:-5px -5px 5px -5px;">Emotion<span class=chatemopopx onclick="on_off_com_emo_popup()">×</span></h3>'
                + '<?php
                    $emo_url = base_url("asset/emotion");
                    $emotionImg = array("smile.png", "smile-big.png", "sad.png", "crying.png", "tongue.png", "shock.png", "angry.png", "confused.png", "wink.png", "embarrassed.png", "disapointed.png", "sick.png", "shut-mouth.png", "sleepy.png", "eyeroll.png", "thinking.png", "lying.png", "glasses-nerdy.png", "teeth.png", "angel.png", "bye.png", "clap.png", "hug-left.png", "hug-right.png", "good.png", "bad.png", "highfive.png", "love.png", "love-over.png", "tv.png", "mail.png", "rain.png", "pizza.png", "coffee.png", "computer.png", "beer.png", "drink.png", "cat.png", "dog.png", "sun.png", "star.png", "clock.png", "present.png", "mobile.png", "musical-note.png", "boy.png", "girl.png", "cake.png", "car.png");
                    foreach ($emotionImg as $v):
                        echo '<img onclick="sendComEmo(this)" src="' . $emo_url . "/" . $v . '">';
                    endforeach;
                    ?>'
                + '</div>';
        tabDetail += '    </div>';
        tabDetail += ' </div>';


        return tabDetail;
        
    }


    $("body").on("keydown", ".commentinput", function (e) {
        
        if (e.originalEvent.keyCode == 13) {
            e.stopImmediatePropagation();
            var valuee = $("#commentinput").html();
            // var valuee = $('.summernote').summernote('code');
            var type = $("#commentinput").attr('data-status');
            
            valuee = valuee.replace(/[<]br[^>]*[>]/gi,"");
            var taskID = $("#taskid").val();
            var projectID = $("#newTaskInput").attr('data-projectid');
            // console.log(valuee+"<><>"+type);
            // alert(taskID);
            if (type == 'TaskCmnt' || type == 'Todo') {
                var typeid = taskID;
                setCookie('selectedTask', taskID, 1);
            } else {
                typeid = projectID;
            }

            $.ajax({
                url: '<?php echo base_url(); ?>projects/insertCmnt',
                type: 'POST',
                data: {type: type, comment: valuee, projectID: typeid},
                dataType: 'JSON',
                success: function (updated_id) {
                    // console.log(updated_id);
                    $("#nocommentImg").remove();
                    $(".css3button").remove();
                    var projectsid = updated_id.activityid;
                    var tabDetail = '';
                    var gtlist = $(".commentgt");
                    $.each(gtlist, function (k, v) {
                        if (($(v).text().trim()).indexOf("Today") > -1) {
                            tabDetail = "alreadytoday";
                            return false;
                        }
                    });
                    if (tabDetail == "alreadytoday")
                        tabDetail = "";
                    else
                        tabDetail = drawCommentGroupTime($.now());

                    var matches = user_name.match(/\b(\w)/g);
                    var acronym = matches.join('');


                    tabDetail +='       <div class="panel panel-default proComm SA ptt'+projectsid+'">';
                    tabDetail +='           <div class="panel-body status">';
                    tabDetail +='               <div class="who clearfix">';
                    tabDetail +='                   <span class="comment_imghover">';
                    
                    // tabDetail +='                       <img src="'+base_url+'asset/img/avatars/'+data.allComm[k].img+'" alt="img" class="comment-img">';
                    tabDetail +='                   <span style="    margin-right: 2px;margin-top: 1px;float: left;" href="javascript:void(0);" class="btn btn-primary btn-circle customBtnClr">'+acronym+'</span>';
                    tabDetail +='                   <span class="from" style="    width: 89%;float: left;margin-left: 2%;"><span class="CusUsrNm">'+user_name+'</span><span class="CusUsrTm"> '+moment().format('MMM D, YYYY [at] h:mm A z')+'</span></span>';
                    tabDetail +='                   <span class="from" style="width: 87%;float: left;margin-left: 2%;font-size: 14px;margin-top: 10px;    line-height: 1.2em;color: #000000;">'+valuee+'</span>';
                    tabDetail +='                   <div class="name dropdown"><b></b>'+
                                                        '<a data-toggle="dropdown" class="dropdown-toggle" title="Settings">'+
                                                            '<i class="fa fa-chevron-down pull-right"></i>'+
                                                        '</a>'+
                                                        '<ul class="dropdown-menu pull-right">'+
                                                            '<div class="arrow-top-right"></div>'+
                                                            '<li><a onclick="">Msg Info</a></li>'+
                                                            '<li><a onclick="delComment(\''+projectsid+'\')">Delete</a></li>'+
                                                            // '<li><a onclick="">Forward</a></li>'+
                                                        '</ul>'+
                                                        //'<i class="fa fa-star-o pull-right" onclick=""></i>'+
                                                    '</div>';
                    tabDetail +='               </div>';
                    tabDetail +='           </div>';
                    tabDetail +='       </div>';

                    $("#attachListDivCommnet").prepend(tabDetail);
                    $("#attachListDivCommnet").animate({scrollBottom: $('#attachListDivCommnet').prop("scrollHeight","0px")}, 1000);

                    $("#commentinput").html("");
                    // $('.note-editor').hide();
                    // $("#commentinput").show();
                    $(".note-editable").text('');
                    if (type == 'Todo') {
                        updateNotyCommenthd(typeid, 'update');
                    }

                },
                error: function (e) {
                    console.log("Line 1204");
                    console.log(e.responseText);
                }
            });


        }
    });

    function projectAttachDesign(typeid, location, nowid = 0) {
        var tabDetail = '  <div class="row">';
            tabDetail += '    <div class="col-lg-12 projectfilefDiv" style="padding: 0% 4% 0% 4%;">';
            tabDetail += '    <input multiple="multiple" type="file" id="icsupload" style="display: none">';
            tabDetail += '         <a data-title="Attachment" data-toggle="lightbox" title="Attachment" href="' + base_url + 'todo/openattach/' + typeid + '/' + location + '/' + nowid + '" style="margin-right: 2px;background-color: #686868;" class="btn btn-primary btn-circle attacheBTN" id="fileinputAttach"><i class="fa fa-plus"></i></a><span onclick="$(\'#fileinputAttach\').trigger(\'click\');" class="attachSpan"> Add Files</span>';
            tabDetail += '			<div class="filterDiv">';
            tabDetail += '     	  		<span class="dropdown-toggle pull-right filter" data-toggle="dropdown">Filter <i class="fa fa-caret-down"></i></span>';
            tabDetail += '				<ul class="dropdown-menu pull-right filterUpdate">';
            tabDetail += '					<div class="arrow-top-right"></div>';
            tabDetail += '					<li onclick="filter(\'SA\')"><a href="javascript:void(0);"><i class="fa fa-circle-o MAIN" id="SA"></i> Select All</a></li>';
            tabDetail += '		  		</ul>';
            tabDetail += '			</div>';
            tabDetail += '			<div class="ViewDiv">';
            tabDetail += '     	  		<span class="dropdown-toggle pull-right view" data-toggle="dropdown">View <i class="fa fa-caret-down"></i></span>';
            tabDetail += '				<ul class="dropdown-menu pull-right viewUpdate">';
            tabDetail += '					<div class="arrow-top-right"></div>';
            tabDetail += '					<li onclick="filter(\'RMY\')"><a href="javascript:void(0);"> Recently Modified</a></li>';
            tabDetail += '					<li onclick="filter(\'YES\')"><a href="javascript:void(0);"> Starred</a></li>';
            tabDetail += '					<li onclick="filter(\'SA\')"><a href="javascript:void(0);"> All</a></li>';
            //tabDetail +='					<li onclick="filter(\'FT\')"><a href="javascript:void(0);"> File type</a></li>';
            tabDetail += '		  		</ul>';
            tabDetail += '			</div>';
            tabDetail += '     </div>';
            tabDetail += '     <div style="    border-top: 1px solid #e0dddd;margin-top: 4.5%;width: 96%; margin-left: 2%;" id="btop" >&nbsp;</div>';
            tabDetail += '     <div class="row attachListDiv" id="attachListDiv">';
            tabDetail += '	  </div>';
            tabDetail += ' </div>';
        return tabDetail;
    }

    $(window).load(function () {

        var min = 0;
        var max = (typeof res != 'undefined')? res.length - 1 : 0;
        var random = Math.floor(Math.random() * (max - min + 1)) + min;
        
        <?php if(! isset($shared_activity_id)) { ?>
        getNewsFeed(random);
        loadResults('10');
        <?php } ?>
        var pathArray = window.location.pathname.split('/');
        if (pathArray[2] == 'dashboard') {
            $('#glyphicon-home').css('color', '#fff !important');
        }

        var pathArray = window.location.pathname.split('/');
        if (pathArray[2] == 'myfiles') {
            $("div#updateRefresh").css('margin-top','0px');
            $("div#feedexpand").css('padding-top','2%');
            $("div#feedeclose").css('padding-top','2%');
        }
        //viewAllNotification();
    });


    function viewAllNotification() {
        $.ajax({
            url: '<?php echo site_url(); ?>projects/getNotificationStatusAll',
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                // console.log("***************************************");
                // console.log(data);
                // console.log("***************************************");

                $("#menu_notification").removeClass('menuNo').addClass('notMenu');
                $("#viewAllNotification").css('display', 'none');
                $("#hideAllNotification").css('display', 'block');

                $.each(data.getAlltodo, function (key, value) {
                    strTodo = ' <div class="panel panel-default notifation">';
                    strTodo += '	<div class="panel-body status">';
                    strTodo += '		<div class="who clearfix">';
                    strTodo += '			<span class="name"><b>To Do</b> ' + data.getAlltodo[key].projecttaskname + '</span>';
                    strTodo += '		</div>';
                    strTodo += '	</div>';
                    strTodo += '</div>';

                    $("#feedContent").prepend(strTodo);
                });

                $.each(data.getAllTypeList, function (key, value) {

                    //console.log(data.getAllTypeList);
                    var color = '';

                    if (data.getAllTypeList[key].checked == 1) {
                        color = 'rgba(128, 128, 128, 0.11)';
                    } else if (data.getAllTypeList[key].checked == 0) {
                        color = 'rgba(255, 192, 203, 0.41)';
                    }

                    var regex = /<h4[^>]*>([^<]+)<\/h4>/gi;
                    var input = data.getAllTypeList[key].body;
                    
                    // console.log(input);

                    if (regex.test(input)) {
                        var matches = input.match(regex);

                        var ts = $(matches[0]).filter('h4').text()

                        str = ' <div class="panel panel-default notifation">';
                        str += '	<div class="panel-body status">';
                        str += '		<div class="who clearfix">';
                        str += '			<span class="name"><b>Notification</b> ' + ts + '</span>';
                        str += '		</div>';
                        str += '	</div>';
                        str += '</div>';
                    } else {
                        str = ' <div class="panel panel-default notifation">';
                        str += '	<div class="panel-body status">';
                        str += '		<div class="who clearfix">';
                        str += '			<span class="name"><b>Notification</b> ' + data.getAllTypeList[key].body + '</span>';
                        str += '		</div>';
                        str += '	</div>';
                        str += '</div>';
                    }
                    $("#feedContent").prepend(str);
                });

                var limitStart = $(".notifation").length;

            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

</script>
<?php $user_preferences = $this->db->select("user_preferences,user_Application_subs")->get_where("crm_users", array("ID" => (isset($id) ? $id : '0')))->result(); ?>
<script type="text/javascript">

    var feedArray = [];
    var lowlimit = 0;
    var highlimit = 0;
    var total = 0;
    var user_preferences = '<?php echo json_encode($user_preferences[0]->user_preferences); ?>';
    var user_Applist = '<?php echo json_encode($user_preferences[0]->user_Application_subs); ?>';

    var sourceArray = [];
    var sourceArray2 = [];

    var res = user_preferences.split(",");
    var applistSubs = user_Applist.split(",");
    var appArray = [];

    $.each(applistSubs, function (k, v) {
        var vs = v.replace(/"/g, '');
        appArray.push(vs.trim());
    });

    $.each(res, function (k, v) {
        var vs = v.replace(/"/g, '');
        sourceArray.push(vs.trim());
    });



    function getNewsFeed(random) {
        $.ajax({
            url: "https://newsapi.org/v1/articles?source=" + sourceArray[random] + "&sortBy=top&apiKey=33caf66ca5514a4ebee6b87aa6222b22",
            dataType: "json",
            timeout: 3000,
            beforeSend: function () {
                //console.log("Emptying");
                $("#loading").show();
                $("#feedContentNews").html("");
                feedArray.length = 0;
            },
            success: function (data) {
                if (data.articles.length > 0) {
                    $.each(data.articles, function (k, v) {
                        str = ' <div class="panel panel-default news onscroll">';
                        str += '    <div class="panel-body status">';
                        str += '            <span class="top-title" style="color: #053368;">' + sourceArray[random].replace('-', ' ').toUpperCase() + ' on ' + moment(v.publishedAt).format('ddd, D MMM, gggg') + '</span>';
                        str += '        <div class="who clearfix" style="margin-top: -26px;margin-bottom: -26px;">';
                        str += '            <span class="name" onclick="goLink(\'' + v.url + '\')" style="float: left;">' + v.description + '   <span style="color: #686868;font-size: 10px;margin-left:5px;"> by ' + v.author + '</span></span>';
                        str += '        </div>';
                        str += '    </div>';
                        str += '</div>';

                        $("#feedContentNews").append(str);
                    });

                    $("#loading").hide();
                } 

                $(document).ready(function(){
                    $('#appear-nav').css('display', 'none');
                    $(window).on('scroll', function () {
                    // set distance user needs to scroll before we fadeIn navbar
                        if ($(this).scrollTop() > 500) {
                            $('#appear-nav').fadeIn(300);
                        } else {
                            $('#appear-nav').fadeOut(100);
                        }
                    });
                });

                $(document).ready(function(){
                    $(function () {
                       $('#appear-tech', '#appear-about').on('click', function() {
                           $('#appear-nav').fadeIn(50);
                       });
                    });
                });
                // loadResults('10');
            }
        });
    }


    $('#feedContent').scroll(function (e) {
        // console.log(e);
        var ttV = parseInt($("#appNotNumber").text());
        //var newttV = ttV - 1;
        if(parseInt($("#appNotNumber").text()) > 0 ){

            var request = $.ajax({
                url: base_url + "projects/deleteNotOnscroll",
                method: 'POST',
                data: {
                    limit: '1'
                },
                dataType: 'json'
            });
            request.done(function (response) {
                $('.unread').fadeOut(300);
                var notVal = parseInt($("#appNotNumber").text()) - 1;
                if(parseInt($("#appNotNumber").text()) > 0){
                    $("#appNotNumber").text(notVal);
                }

                if(notVal == 0){
                    $("#appNotNumber").fadeOut(300);
                }
            });
            request.fail(function (response) {
                console.log(response);
            });
        }

        if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
                
                var limitStart = $(".onscroll").length;
                highlimit = limitStart + 20;

                $.each(feedArray, function (key, value) {
                    //console.log(value);
                    if (key > limitStart && key < highlimit && highlimit < total) {
                        //console.log(key);
                        if (jQuery.inArray(value.type, appArray) !== -1) {
                            if (value.type == 'notification') {
                                var notType = value.typeCat.match(/[A-Z][a-z]+/g);
                                str = ' <div class="panel panel-default notifation onscroll">';
                                str += '    <div class="panel-body status">';
                                // <i class="fa fa-circle" aria-hidden="true" style="color: #a90329; position: absolute; right: 23px;"></i>
                                str += '        <div class="who clearfix"><span class="title">'+notType[0]+' Notification On '+ moment(value.date).format('ddd, ll')+':</span>';
                                if (value.sp == undefined) {
                                    if (value.relatedTo == undefined) {
                                        str += '            <span class="name" onclick="goPro(' + value.typeid + ', '+ value.relatedTo + ',\''+value.typeCat+'\')" style="float: left;">' + value.detail + '  <span style="color: #686868;font-size: 10px;margin-left:5px;"> @ ' + moment(value.date).format('LLLL') + ' by ' + name + '</span></span> ';
                                    } else {
                                        str += '            <span class="name" onclick="goPro(' + value.relatedTo + ', '+ value.relatedTo + ',\''+value.typeCat+'\')" style="float: left;">' + value.detail + '   <span style="color: #686868;font-size: 10px;margin-left:5px;"> @ ' + moment(value.date).format('LLLL') + ' by ' + name + '</span></span>';
                                    }
                                } else {
                                   str += '            <span class="name" onclick="goPro(' + value.typeid + ', '+ value.relatedTo + ',\''+value.typeCat+'\')" style="float: left;">' + value.detail + '  <span style="color: #686868;font-size: 10px;margin-left:5px;"> @ ' + moment(value.date).format('LLLL') + ' by ' + name + '</span></span> ';
                                }

                                str += '        </div>';
                                str += '    </div>';
                                str += '</div>';

                                $("#feedContent").append(str);
                            } else if (value.type == 'comment') {
                                strTodo = ' <div class="panel panel-default directchat onscroll">';
                                strTodo += '    <div class="panel-body status">';
                                strTodo += '        <div class="who clearfix">';
                                strTodo += '            <span class="name" style="float: left;"><b>Notification </b>' + name + ' ' + value.title + '  @ <my style="color: #686868;font-size: 10px;margin-left:5px;">' + moment(value.date).format('LLLL') + '</my></span>';
                                strTodo += '            <span  class="from">' + value.detail + '</span>';
                                strTodo += '            <span class="name quicklink" onclick="openC(' + value.typeid + ')">Quick Reply</span>';
                                strTodo += '        </div>';
                                strTodo += '    </div>';
                                strTodo += '</div>';

                                $("#feedContentChat").append(strTodo);
                                strTodo = "";

                                
                            } else if (value.type == 'chatMsg') {
                                // This is a group message
                                if (value.recever_id > 1400000000) {
                                    var groupName = "";
                                    $.each(gnpcontacts, function (kg, vg) {
                                        if (vg.group_id == value.recever_id) {
                                            groupName = vg.group_name;
                                        }
                                    });
                                    strTodo = ' <div class="panel panel-default directchat onscroll">';
                                    strTodo += '        <div class="panel-body status">';
                                    strTodo += '            <span class="top-title">Group Chat Notification on ' + moment(value.date).format('ddd, D MMM, gggg') + '</span>';
                                    strTodo += '            <div class="who clearfix">';
                                    strTodo += '                <span class="name" style="float: left;"><span class="cqrName" onClick="triggerGroupChat(\'' + value.recever_id + '\')">' + groupName + '</span> ' + name + ' send a group message</span>';
                                    if (value.replay_msg && value.replay_msg !== 'null' && value.replay_msg !== 'undefined') {
                                        strTodo += "            <span class='from uReply" + value.ID + "'>" + name + ": " + value.replay_msg + "</span>";
                                    } else {
                                        strTodo += '            <span  class="from">' + name + ': ' + value.detail + '</span>';
                                        strTodo += "            <span class='from uReply" + value.ID + "'></span>";
                                    }
                                    strTodo += '                <div class="col-lg-12">';
                                    strTodo += '                    <div class="cqrMsgCSS cqrMsg' + value.ID + '" onkeyup="quicksubmit(\'' + value.recever_id + '\', \'' + value.ID + '\', event)" contenteditable onfocus="if($(this).html() == \'Reply a message\') $(this).html(\'\');" onblur="if($(this).html() == \'\') $(this).html(\'Reply a message\');">Reply a message</div>';
                                    strTodo += '                    <i data-title="Attachment" data-toggle="lightbox" title="Attachment" href="<?php echo site_url("chat/openfile/"); ?>' + value.recever_id + '/' + value.ID + '" class="fa fa-paperclip rightico' + value.ID + ' cqrMsgRightIcon"></i>';
                                    strTodo += '                    <i class="fa fa-smile-o rightico' + value.ID + ' cqrMsgRightIcon" onClick="qrcemo(' + value.ID + ', \'' + value.recever_id + '\')"></i>';
                                    strTodo += '                </div><img class="quicksubmitsent" id="quicksubmit' + value.recever_id + '" src="' + base_url + "asset/img/icons/send.gif" + '">';

                                    strTodo += '            </div>';
                                    strTodo += '            <div class="qrc-popover-content" id="qrc-popover-content' + value.ID + '">';
                                    strTodo += $("#emodivforqrc").html();
                                    strTodo += '            </div>';
                                    strTodo += '        </div>';
                                    strTodo += '    </div>';
                                } else {
                                    strTodo = ' <div class="panel panel-default directchat onscroll">';
                                    strTodo += '        <div class="panel-body status">';
                                    strTodo += '            <div class="who clearfix">';
                                    strTodo += '                <span class="name" style="float: left;"><b>' + value.title + ' </b><span class="cqrName" onClick="triggerChat(\'' + value.who + '\')">' + name + '</span> send you a message <my style="color: #686868;font-size: 10px;margin-left:5px;">' + moment(value.date).format('LLLL') + '</my></span>';
                                    strTodo += '                <span  class="from">' + name + ': ' + value.detail + '</span>';
                                    if (value.replay_msg && value.replay_msg !== 'null' && value.replay_msg !== 'undefined') {
                                        strTodo += "            <span class='from uReply" + value.ID + "'>You replied: " + value.replay_msg + "</span>";
                                    } else {
                                        strTodo += "            <span class='from uReply" + value.ID + "'></span>";
                                        strTodo += '            <div class="col-lg-12">';
                                        strTodo += '                <div class="cqrMsgCSS cqrMsg' + value.ID + '" onkeyup="quicksubmit(\'' + value.who + '\', \'' + value.ID + '\', event)" contenteditable onfocus="if($(this).html() == \'Reply a message\') $(this).html(\'\');" onblur="if($(this).html() == \'\') $(this).html(\'Reply a message\');">Reply a message</div>';
                                        strTodo += '                <i data-title="Attachment" data-toggle="lightbox" title="Attachment" href="<?php echo site_url("chat/openfile/"); ?>' + value.who + '/' + value.ID + '" class="fa fa-paperclip rightico' + value.ID + ' cqrMsgRightIcon"></i>';
                                        strTodo += '                <i class="fa fa-smile-o rightico' + value.ID + ' cqrMsgRightIcon" onClick="qrcemo(' + value.ID + ', \'' + value.who + '\')"></i>';
                                        strTodo += '            </div><img class="quicksubmitsent" id="quicksubmit' + value.who + '" src="' + base_url + "asset/img/icons/send.gif" + '">';
                                    }
                                    strTodo += '            </div>';
                                    strTodo += '            <div class="qrc-popover-content" id="qrc-popover-content' + value.ID + '">';
                                    strTodo += $("#emodivforqrc").html();
                                    strTodo += '            </div>';
                                    strTodo += '        </div>';
                                    strTodo += '    </div>';
                                }
                                $("#feedContentChat").append(strTodo);
                                strTodo = "";
                            }
                        }
                    }
                });
            }
    });
    function goTodo(taskID) {
        // swal(taskID);
        //setCookie('todoID',taskID,1);
        window.location.href = base_url + "todo/todoview";
    }

    function loadResults(limitStart) {

        var allprojectANDTask = <?php echo json_encode($allprojectANDTask); ?>;
        

        $.ajax({
            url: "<?php echo site_url(); ?>projects/getNotificationStatusAll",
            type: "post",
            dataType: "json",
            data: {
                limitStart: limitStart
            },
            success: function (data) {
                $.each(data.getUnreadNot, function (key, value) {
                    parentID.push(value.parent);
                    typeID.push(value.typeid);
                });

                if(data.getTotalNot != 0){
                   $("#appNotNumber").text(data.getTotalNot); 
                   $("#appNotNumber").show();
                }

                if(data.getTotalChat != 0){
                   $("#chatNotNumer").text(data.getTotalChat);
                   $("#chatNotNumer").show();
                }

                if (data.getAllChatMsg.length != 0) {
                    $.each(data.getAllChatMsg, function (key, value) {
                        feedArray.push({
                            "type": 'chatMsg',
                            "typeid": value.type_id,
                            "recever_id": value.user_id,
                            "who": value.createdby,
                            "title": value.title,
                            "detail": value.body,
                            "date": value.not_fire_time,
                            "ID": value.ID,
                            "replay_msg": value.replay_msg
                        });
                    });
                }

                $.each(data.commentList, function (key, value) {

                    if (data.commentList.length != 0) {
                        $.each(value, function (k, v) {
                            feedArray.push({
                                "type": 'comment',
                                "typeCat": v.type,
                                "typeid": v.type_id,
                                "relatedTo": v.relatedTo,
                                "replay_msg": v.replay_msg,
                                "who": v.createdby,
                                "title": v.title,
                                "detail": v.body,
                                "date": v.not_fire_time
                            });
                        });
                    }
                });

                $.each(data.getAllProjectUnTag, function (key, value) {
                    if (data.getAllProjectUnTag.length != 0) {
                        feedArray.push({
                            "type": 'notification',
                            "sp": 'UnTag',
                            "typeCat": data.getAllProjectUnTag[key].type,
                            "relatedTo": data.getAllProjectUnTag[key].relatedTo,
                            "typeid": data.getAllProjectUnTag[key].type_id,
                            "who": data.getAllProjectUnTag[key].createdby,
                            "detail": data.getAllProjectUnTag[key].title + ' <span style="font-weight:bold;">' + data.getAllProjectUnTag[key].body+'</span>',
                            "date": data.getAllProjectUnTag[key].not_fire_time
                        });
                    }

                });

                $.each(data.getAllProjectTag, function (key, value) {
                    if (data.getAllProjectTag.length != 0) {
                        feedArray.push({
                            "type": 'notification',
                            "typeCat": data.getAllProjectTag[key].type,
                            "relatedTo": data.getAllProjectTag[key].relatedTo,
                            "sp": 'Tag',
                            "typeid": data.getAllProjectTag[key].type_id,
                            "who": data.getAllProjectTag[key].createdby,
                            "detail": data.getAllProjectTag[key].title + ' <span style="font-weight:bold;">' + data.getAllProjectTag[key].body+'</span>',
                            "date": data.getAllProjectTag[key].not_fire_time
                        });
                    }

                });

                $.each(data.getAllTodoTag, function (key, value) {
                    if (data.getAllTodoTag.length != 0) {
                        feedArray.push({
                            "type": 'notification',
                            "typeCat": data.getAllTodoTag[key].type,
                            "relatedTo": data.getAllTodoTag[key].relatedTo,
                            "sp": 'Tag',
                            "typeid": data.getAllTodoTag[key].type_id,
                            "who": data.getAllTodoTag[key].createdby,
                            "detail": data.getAllTodoTag[key].title + " : " + data.getAllTodoTag[key].body,
                            "date": data.getAllTodoTag[key].not_fire_time
                        });
                    }

                });

                $.each(data.getAllTodoUnTag, function (key, value) {
                    if (data.getAllTodoUnTag.length != 0) {
                        feedArray.push({
                            "type": 'notification',
                            "typeCat": data.getAllTodoUnTag[key].type,
                            "relatedTo": data.getAllTodoUnTag[key].relatedTo,
                            "sp": 'UnTag',
                            "typeid": data.getAllTodoUnTag[key].type_id,
                            "who": data.getAllTodoUnTag[key].createdby,
                            "detail": data.getAllTodoUnTag[key].title + " : " + data.getAllTodoUnTag[key].body,
                            "date": data.getAllTodoUnTag[key].not_fire_time
                        });
                    }

                });

                $.each(data.getAllTaskTag, function (key, value) {
                    if (data.getAllTaskTag.length != 0) {
                        var projectaName ="";
                        $.each(allprojectANDTask, function (e, v) {
                            if (v.Id == data.getAllTaskTag[key].relatedTo) {
                                projectaName = v.Title;
                            }
                        });
                        feedArray.push({
                            "type": 'notification',
                            "typeCat": data.getAllTaskTag[key].type,
                            "relatedTo": data.getAllTaskTag[key].relatedTo,
                            "sp": 'Tag',
                            "typeid": data.getAllTaskTag[key].type_id,
                            "who": data.getAllTaskTag[key].createdby,
                            "detail": data.getAllTaskTag[key].title + " : " + data.getAllTaskTag[key].body,
                            "detail": data.getAllTaskTag[key].title + ' <span style="font-weight:bold;">' + data.getAllTaskTag[key].body+'</span> under project <span style="font-weight:bold;">'+projectaName+'</span>',
                            "date": data.getAllTaskTag[key].not_fire_time
                        });
                    }

                });

                $.each(data.getAllTaskUnTag, function (key, value) {
                    if (data.getAllTaskUnTag.length != 0) {
                        var projectaName ="";
                        $.each(allprojectANDTask, function (e, v) {
                            if (v.Id == data.getAllTaskUnTag[key].relatedTo) {
                                projectaName = v.Title;
                            }
                        });
                        feedArray.push({
                            "type": 'notification',
                            "typeCat": data.getAllTaskUnTag[key].type,
                            "relatedTo": data.getAllTaskUnTag[key].relatedTo,
                            "sp": 'UnTag',
                            "typeid": data.getAllTaskUnTag[key].type_id,
                            "who": data.getAllTaskUnTag[key].createdby,
                            "detail": data.getAllTaskUnTag[key].title + ' <span style="font-weight:bold;">' + data.getAllTaskUnTag[key].body+'</span> under project <span style="font-weight:bold;">'+projectaName+'</span>',
                            "date": data.getAllTaskUnTag[key].not_fire_time
                        });
                    }

                });

                $.each(data.getAllTypeList, function (key, value) {
                    if (value[key] != undefined) {
                        if (value[key].length != 0) {

                            feedArray.push({
                                "type": 'notification',
                                "typeCat": value[key].type,
                                "relatedTo": value[key].relatedTo,
                                "typeid": value[key].type_id,
                                "who": value[key].createdby,
                                "detail": value[key].title + " : " + value[key].body,
                                "date": value[key].not_fire_time
                            });
                        }
                    }

                });

                $.each(data.changedDateListP, function (key, valu) {
                    
                    if (data.changedDateListP[key].length != 0) {
                        $.each(valu, function(kk,value){
                            feedArray.push({
                                "type": 'notification',
                                "typeCat": value.type,
                                "relatedTo": value.relatedTo,
                                "typeid": value.type_id,
                                "who": value.createdby,
                                "detail": 'Due date has been changed from  '+value.body + ' for project <span style="font-weight:bold;"> ' + value.title+'</span>',
                                "date": value.not_fire_time
                            });
                        });
                    }

                });

                $.each(data.getAllStatusUpdate, function (key, valu) {
                    
                    if (data.getAllStatusUpdate[key].length != 0) {
                        $.each(valu, function(kk,value){
                            var projectaName ="";
                            // console.log(allprojectANDTask);
                            // console.log(value.relatedTo);
                            $.each(allprojectANDTask, function (e, v) {
                                if (v.Id == value.relatedTo) {
                                    projectaName = v.Title;
                                }
                            });

                            feedArray.push({
                                "type": 'notification',
                                "typeCat": value.type,
                                "typeid": value.type_id,
                                "relatedTo": value.relatedTo,
                                "who": value.createdby,
                                "status": value.body,
                                "detail": 'Following status update has been added for project  <span style="font-weight:bold;">'+projectaName+ '</span>',
                                "date": value.not_fire_time
                            });
                        });

                    }
                });

                $.each(data.getAllTypeTask, function (key, value) {
                    if (value[key] != undefined) {
                        if (value[key].length != 0) {
                            var projectaName ="";
                            $.each(allprojectANDTask, function (e, v) {
                                if (v.Id == value[key].relatedTo) {
                                    projectaName = v.Title;
                                }
                            });
                            feedArray.push({
                                "type": 'notification',
                                "typeCat": value[key].type,
                                "typeid": value[key].type_id,
                                "relatedTo": value[key].relatedTo,
                                "who": value[key].createdby,
                                "detail": value[key].title + ' <span style="font-weight:bold;">' + value[key].body+'</span> added under project <span style="font-weight:bold;">'+projectaName+'</span>',
                                "date": value[key].not_fire_time
                            });
                        }
                    }


                });

                $.each(data.changedDateListT, function (key, valu) {
                    
                    if (data.changedDateListT[key].length != 0) {
                        $.each(valu, function(kk,value){
                            var projectaName ="";
                            $.each(allprojectANDTask, function (e, v) {
                                if (v.Id == value.relatedTo) {
                                    projectaName = v.Title;
                                }
                            });
                            feedArray.push({
                                "type": 'notification',
                                "typeCat": value.type,
                                "typeid": value.type_id,
                                "relatedTo": value.relatedTo,
                                "who": value.createdby,
                                "detail": 'Due date has been changed from <span style="font-weight:bold;">'+value.body + '</span> for task <span style="font-weight:bold;">' + value.title+'</span> under project <span style="font-weight:bold;">'+projectaName+'</span>',
                                "date": value.not_fire_time
                            });
                        });
                    }
                });

                $.each(data.ProjectAttachment, function (key, valu) {
                    
                    if (data.ProjectAttachment[key].length != 0) {
                        $.each(valu, function(kk,value){
                            feedArray.push({
                                "type": 'notification',
                                "typeCat": value.type,
                                "typeid": value.type_id,
                                "relatedTo": value.relatedTo,
                                "who": value.createdby,
                                "detail": 'New file has been attached under project <span style="font-weight:bold;">'+value.title + '</span> for task <span style="font-weight:bold;">' + value.title+'</span>',
                                "date": value.not_fire_time
                            });
                        });
                    }
                });

                $.each(data.TaskAttachment, function (key, valu) {
                    
                    if (data.TaskAttachment[key].length != 0) {
                        
                        $.each(valu, function(kk,value){
                            var projectaName ="";
                            $.each(allprojectANDTask, function (e, v) {
                                if (v.Id == value.relatedTo) {
                                    projectaName = v.Title;
                                }
                            });
                            feedArray.push({
                                "type": 'notification',
                                "typeCat": value.type,
                                "typeid": value.type_id,
                                "relatedTo": value.relatedTo,
                                "who": value.createdby,
                                "detail": 'New file has been attached under task <span style="font-weight:bold;">'+value.title + '</span> under project <span style="font-weight:bold;">'+projectaName+'</span>',
                                "date": value.not_fire_time
                            });
                        });
                    }
                });

                $.each(data.TaskHourchange, function (key, valu) {
                    
                    if (data.TaskHourchange[key].length != 0) {
                        $.each(valu, function(kk,value){
                            var projectaName ="";
                            $.each(allprojectANDTask, function (e, v) {
                                if (v.Id == value.relatedTo) {
                                    projectaName = v.Title;
                                }
                            });
                            feedArray.push({
                                "type": 'notification',
                                "typeCat": value.type,
                                "typeid": value.type_id,
                                "relatedTo": value.relatedTo,
                                "who": value.createdby,
                                "detail": 'You have been allocated <span style="font-weight:bold;">'+value.body + ' Hours</span> for task <span style="font-weight:bold;">' + value.title+'</span> under project <span style="font-weight:bold;">'+projectaName+'</span>',
                                "date": value.not_fire_time
                            });
                        });
                    }
                });

                $.each(data.getAlltodo, function (key, value) {
                    if (data.getAlltodo[key] != undefined) {
                        if (data.getAlltodo[key].length != 0) {
                            feedArray.push({
                                "type": 'notification',
                                "typeCat": data.getAlltodo[key].type,
                                "id": data.getAlltodo[key].Id,
                                "who": data.getAlltodo[key].CreatedBy,
                                "detail": data.getAlltodo[key].Title,
                                "date": data.getAlltodo[key].CreatedDate
                            });
                        }
                    }
                });

                feedArray.sort(function (a, b) {
                    var c = new Date(a.date);
                    var d = new Date(b.date);
                    return c - d;
                });

                feedArray.reverse();

                total = feedArray.length;

                if (total == 0) {
                    design =  '<div class="panel panel-default proDiv" style="overflow-x: hidden;height: 537px;">';
                    design += ' <span style="width: 100%;float: left; margin-left: 6%; margin-top: 47%;font-size: 15px;color: #686868;">Hi ' + userName + ', </span>';
                    design += ' <span style="    width: 87%;float: left;margin-left: 6%;text-align: justify;margin-top: 2%;font-size: 15px;color: #686868;"> This is your live feed section where you will receive all your alerts, notifications and posts on all your own or associated projects, to-do, calendar and events.</span>';
                    design += ' <span style="width: 100%;float: left; margin-left: 6%; margin-top: 2%;font-size: 15px;color: #686868;">Cheers, </span>';
                    design += ' <span style="width: 100%;float: left; margin-left: 6%; margin-top: 2%;font-size: 15px;color: #686868;">Navigate Connect Team </span>';
                    design += '</div>'

                    $("#feedContent").append(design);
                }

                
                // for (var i = 0; i < feedArray.length;  i++) {
                // console.log(feedArray[0]);
                // }
                console.log(total);
                // var feedJson = JSON.parse(feedArray);
                jQuery.each(feedArray, function (key, value) {
                    
                    var name = '';
                    var img = '';

                    $.each(crm_emp, function (e, v) {
                        if (v.ID == value.who) {
                            name = v.full_name;
                            img = v.img;
                        }
                    });

                    if (key < 100) {
                        if (jQuery.inArray(value.type, appArray) !== -1) {

                            if (value.type == 'notification') {
                                if(jQuery.inArray(value.typeid,parentID) == -1){
                                    var unread = '';
                                }else{
                                    var unread = '<i class="fa fa-circle unread" aria-hidden="true" style="color: #a90329; position: absolute; right: 23px;"></i>';
                                }
                                
                                var notType = value.typeCat.match(/[A-Z][a-z]+/g);
                                str = ' <div class="panel panel-default notification onscroll">';
                                str += '	<div class="panel-body status">'+unread;
                                str += '		<div class="who clearfix"><span class="title">'+notType[0]+' Notification On '+ moment(value.date).format('ddd, ll')+':</span>'
                                if (value.sp == undefined) {
                                    if (value.relatedTo == undefined) {
                                        str += '<span class="name" onclick="goPro('+ value.typeid +','+ value.relatedTo +',\''+value.typeCat+'\')" style="float: left;">' + value.detail + ' <span style="color: #686868;font-size: 13px;margin-left:5px;">by ' + name + '</span></span> ';
                                    } else {
                                        str += '<span class="name" onclick="goPro('+ value.typeid +','+ value.relatedTo +',\''+value.typeCat+'\')" style="float: left;">' + value.detail + ' <span style="color: #686868;font-size: 13px;margin-left:5px;">by ' + name + '</span></span>';
                                    }
                                } else {
                                    str += '<span class="name" onclick="goPro('+ value.typeid +','+ value.relatedTo +',\''+value.typeCat+'\')" style="float: left;">' + value.detail + ' <span style="color: #686868;font-size: 13px;margin-left:5px;">by ' + name + '</span></span> ';
                                    //str += '			<span class="name" style="float: left;">' + value.detail + '   <span style="color: #686868;font-size: 13px;margin-left:5px;"> by ' + name + '</span></span>';
                                }
                                if (value.status !== 'null' && value.status !== undefined) {
                                    str += "            <span class='from uReply" + value.ID + "'>" + value.status + "</span>";
                                }
                                str += '		</div>';
                                str += '	</div>';
                                str += '</div>';

                                $("#feedContent").append(str);
                            } else if (value.type == 'comment') {
                                
                                var cmnType;
                                var crner;
                                var color;
                                var splitTitle = value.title.split(':');
                                
                                switch (value.typeCat) {
                                    case 'ProjectCmnt':
                                        cmnType = 'Project Chat';
                                        crner = 'noteP';
                                        color = '#1FEA9C';

                                        break;
                                    case 'TaskCmnt':
                                        cmnType = 'Task Chat';
                                        crner = 'noteT';
                                        color = '#73787F';
                                        break;
                                    default:
                                        cmnType = 'Todo Chat';
                                        crner = 'noteTo';
                                        color = '#6EA7F2';
                                }

                                strTodo = ' <div class="panel panel-default directchat onscroll">';
                                strTodo += '	<div class="panel-body status">';
                                strTodo += '			<span class="top-title" style="color: #152940;">' + cmnType + ' Notification on ' + moment(value.date).format('ddd, D MMM, gggg') + '</span>';
                                strTodo += '		<div class="who clearfix" style="margin-top: -5%;">';
                                //strTodo += '			<img src="<?php echo base_url(); ?>asset/img/avatars/'+img+'" alt="img" class="online">';
                                if (value.typeCat == 'ProjectCmnt') {
                                    strTodo += '			<span onclick="goPro(' + value.typeid + ',\'' + splitTitle[1].trim() + '\',' + value.relatedTo + ')" class="name" style="float: left;"> ' + splitTitle[1] + '</span>';
                                } else if (value.typeCat == 'TaskCmnt') {
                                    strTodo += '			<span class="name" style="float: left;"> <span onclick="goPro(' + value.relatedTo + ',\'' + value.replay_msg + '\')">' + value.replay_msg + '</span>/<span onclick="goPro(' + value.relatedTo + ',\'' + splitTitle[1].trim() + '\',' + value.typeid + ')">' + splitTitle[1].trim() + '</span></span>';
                                } else {
                                    strTodo += '			<span onclick="goPro(' + value.typeid + ',\'' + splitTitle[1].trim() + '\',' + value.relatedTo + ')" class="name" style="float: left;"> ' + splitTitle[1] + '</span>';
                                }
                                strTodo += '			<span  class="from" ><sp style="color:' + color + ';">' + name + '</sp> : ' + value.detail + '</span>';
                                strTodo += '			<span class="name quicklink" onclick="openC(' + value.typeid + ')">Quick Reply</span>';
                                strTodo += '		</div>';
                                strTodo += '	</div>';
                                strTodo += '</div>';

                                $("#feedContent").append(strTodo);
                                strTodo = "";
                            } 
                            else if (value.type == 'chatMsg') {

                                // This is a group message
                                if (value.recever_id > 1400000000 ) {
                                    var groupName = "";
                                    
                                    $.each(gnpcontacts, function (kg, vg) {
                                        if (vg.group_id == value.recever_id) {
                                            groupName = vg.group_name;
                                        }
                                    });

                                    strTodo = '	<div class="panel panel-default directchat onscroll">';
                                    strTodo += '		<div class="panel-body status">';
                                    strTodo += '			<div class="who clearfix"><span class="title">Group Chat Notification On '+ moment(value.date).format('ddd, ll')+':</span>';
                                    strTodo += '				<span class="name" style="float: left;"> <span class="cqrName" onClick="triggerGroupChat(\'' + value.recever_id + '\')" >' + name + '</span> wrote under group <span style="font-weight:bold;">' + groupName + '</span></span>';
                                    if (value.replay_msg && value.replay_msg !== 'null' && value.replay_msg !== 'undefined') {
                                        strTodo += "			<span class='from uReply" + value.ID + "'>" + value.replay_msg + "</span>";
                                    } else {
                                        strTodo += '			<span  class="from">' + value.detail + '</span>';
                                        strTodo += "			<span class='from uReply" + value.ID + "'></span>";
                                    }
                                    strTodo += '				<div class="col-lg-12">';
                                    strTodo += '					<div class="cqrMsgCSS cqrMsg' + value.ID + '" onkeyup="quicksubmit(\'' + value.recever_id + '\', \'' + value.ID + '\', event)" contenteditable onfocus="if($(this).html() == \'Reply a message\') $(this).html(\'\');" onblur="if($(this).html() == \'\') $(this).html(\'Reply a message\');">Reply a message</div>';
                                    strTodo += '					<i data-title="Attachment" data-toggle="lightbox" title="Attachment" href="<?php echo site_url("chat/openfile/"); ?>' + value.recever_id + '/' + value.ID + '" class="fa fa-paperclip rightico' + value.ID + ' cqrMsgRightIcon"></i>';
                                    strTodo += '					<i class="fa fa-smile-o rightico' + value.ID + ' cqrMsgRightIcon" onClick="qrcemo(' + value.ID + ', \'' + value.recever_id + '\')"></i>';
                                    strTodo += '				</div><img class="quicksubmitsent" id="quicksubmit' + value.recever_id + '" src="' + base_url + "asset/img/icons/send.gif" + '">';
                                    strTodo += '            <span class="from openThred" onClick="triggerGroupChat(\'' + value.recever_id + '\')">Open full conversation thread</span>';
                                    strTodo += '			</div>';
                                    strTodo += '			<div class="qrc-popover-content" id="qrc-popover-content' + value.ID + '">';
                                    strTodo += $("#emodivforqrc").html();
                                    strTodo += '			</div>';
                                    strTodo += '		</div>';
                                    strTodo += '	</div>';
                                } else if(value.recever_id > 99999999 && value.recever_id < 1400000000 ) {
                                    // console.log(1981);
                                    var ProjectName = "";
                                    $.each(gnpcontacts, function (kg, vg) {
                                        if (vg.group_id == value.recever_id) {
                                            ProjectName = vg.group_name;
                                        }
                                    });
                                    // console.log(gnpcontacts);
                                    strTodo = '	<div class="panel panel-default directchat onscroll">';
                                    strTodo += '		<div class="panel-body status">';
                                    strTodo += '			<div class="who clearfix"><span class="title">Project Chat Notification On '+ moment(value.date).format('ddd, ll')+':</span>';
                                    strTodo += '				<span class="name" style="float: left;"><span class="cqrName" onClick="triggerGroupChat(\'' + value.recever_id + '\')">' + name + '</span> wrote under project <span style="font-weight:bold;">'+ProjectName+'</span></span>';
                                    strTodo += '				<span  class="from">' + value.detail + '</span>';
                                    if (value.replay_msg && value.replay_msg !== 'null' && value.replay_msg !== 'undefined') {
                                        strTodo += "			<span class='from uReply" + value.ID + "'>You replied: " + value.replay_msg + "</span>";
                                    } else {
                                        strTodo += "			<span class='from uReply" + value.ID + "'></span>";
                                        strTodo += '			<div class="col-lg-12">';
                                        strTodo += '				<div class="cqrMsgCSS cqrMsg' + value.ID + '" onkeyup="quicksubmit(\'' + value.who + '\', \'' + value.ID + '\', event)" contenteditable onfocus="if($(this).html() == \'Reply a message\') $(this).html(\'\');" onblur="if($(this).html() == \'\') $(this).html(\'Reply a message\');">Reply a message</div>';
                                        strTodo += '				<i data-title="Attachment" data-toggle="lightbox" title="Attachment" href="<?php echo site_url("chat/openfile/"); ?>' + value.who + '/' + value.ID + '" class="fa fa-paperclip rightico' + value.ID + ' cqrMsgRightIcon"></i>';
                                        strTodo += '				<i class="fa fa-smile-o rightico' + value.ID + ' cqrMsgRightIcon" onClick="qrcemo(' + value.ID + ', \'' + value.who + '\')"></i>';
                                        strTodo += '			</div><img class="quicksubmitsent" id="quicksubmit' + value.who + '" src="' + base_url + "asset/img/icons/send.gif" + '">';
                                        strTodo += '            <span  class="from openThred"  onClick="triggerGroupChat(\'' + value.recever_id + '\')">Open full conversation thread</span>';
                                    }
                                    strTodo += '			</div>';
                                    strTodo += '			<div class="qrc-popover-content" id="qrc-popover-content' + value.ID + '">';
                                    strTodo += $("#emodivforqrc").html();
                                    strTodo += '			</div>';
                                    strTodo += '		</div>';
                                    strTodo += '	</div>';
                                } else {
                                    strTodo = ' <div class="panel panel-default directchat onscroll">';
                                    strTodo += '        <div class="panel-body status">';
                                    strTodo += '            <div class="who clearfix"><span class="title">Chat Notification On '+ moment(value.date).format('ddd, ll')+':</span>';
                                    strTodo += '                <span class="name" style="float: left;"><span class="cqrName" onClick="triggerChat(\'' + value.who + '\')">' + name + '</span> has been send you a message</span>';
                                    strTodo += '                <span  class="from">' + value.detail + '</span>';
                                    if (value.replay_msg && value.replay_msg !== 'null' && value.replay_msg !== 'undefined') {
                                        strTodo += "            <span class='from uReply" + value.ID + "'>You replied: " + value.replay_msg + "</span>";
                                    } else {
                                        strTodo += "            <span class='from uReply" + value.ID + "'></span>";
                                        strTodo += '            <div class="col-lg-12">';
                                        strTodo += '                <div class="cqrMsgCSS cqrMsg' + value.ID + '" onkeyup="quicksubmit(\'' + value.who + '\', \'' + value.ID + '\', event)" contenteditable onfocus="if($(this).html() == \'Reply a message\') $(this).html(\'\');" onblur="if($(this).html() == \'\') $(this).html(\'Reply a message\');">Reply a message</div>';
                                        strTodo += '                <i data-title="Attachment" data-toggle="lightbox" title="Attachment" href="<?php echo site_url("chat/openfile/"); ?>' + value.who + '/' + value.ID + '" class="fa fa-paperclip rightico' + value.ID + ' cqrMsgRightIcon"></i>';
                                        strTodo += '                <i class="fa fa-smile-o rightico' + value.ID + ' cqrMsgRightIcon" onClick="qrcemo(' + value.ID + ', \'' + value.who + '\')"></i>';
                                        strTodo += '            </div><img class="quicksubmitsent" id="quicksubmit' + value.who + '" src="' + base_url + "asset/img/icons/send.gif" + '">';
                                        strTodo += '            <span  class="from openThred"  onClick="triggerChat(\'' + value.who + '\')">Open full conversation thread</span>';
                                    }
                                    strTodo += '            </div>';
                                    strTodo += '            <div class="qrc-popover-content" id="qrc-popover-content' + value.ID + '">';
                                    strTodo += $("#emodivforqrc").html();
                                    strTodo += '            </div>';
                                    strTodo += '        </div>';
                                    strTodo += '    </div>';
                                }
                                $("#feedContentChat").append(strTodo);
                                strTodo = "";
                            }

                        } else {
                            if (value.type == 'NEWS') {
                                // noteN
                                str = ' <div class="panel panel-default news onscroll">';
                                str += '	<div class="panel-body status">';
                                str += '			<span class="top-title" style="color: #053368;">' + value.source + ' on ' + moment(value.date).format('ddd, D MMM, gggg') + '</span>';
                                str += '		<div class="who clearfix" style="margin-top: -26px;margin-bottom: -26px;">';
                                str += '			<span class="name" onclick="goLink(\'' + value.url + '\')" style="float: left;">' + value.description + '   <span style="color: #686868;font-size: 10px;margin-left:5px;"> by ' + value.author + '</span></span>';
                                str += '		</div>';
                                str += '	</div>';
                                str += '</div>';

                                $("#feedContentNews").append(str);

                            }
                        }
                    }
                });
            }
        });
    }
    

    function goLink(url) {
        window.open(url, '_blank');
    }

    var request = $.ajax({
        url: "<?php echo site_url("Projects/selectIntervalData"); ?>",
        method: "POST",
        data: {user_id: user_id},
        dataType: "json"
    });
    request.done(function (res) {
        setInterval(function () {
            feddUpdate()
        }, res.refreshfeed * 1000);
        $('#selectInterval').val(5);
    });
    request.fail(function (e) {
        console.log("Send message error...");
        console.log(e.setPreferences);
    });


    function feddUpdate() {
        //alert('refresh');
        var min = 0;
        var max = res.length - 1;
        var random = Math.floor(Math.random() * (max - min + 1)) + min;
        getNewsFeed(random);
    }

    function openC(projectID) {

        var param2 = 'comments';
        
        $.ajax({
            url: '<?php echo base_url(); ?>projects/getCommentForProjects', // URL to the local file
            type: 'POST', // POST or GET
            data: {projectID: projectID}, // Data to pass along with your request
            success: function (data, status) {
                console.log(data);
                $("#tipT" + projectID).text("");
                if (data.title[0].Type == 'Project') {
                    openCommentsForFeed(projectID, param2, data);
                } else if (data.title[0].Type == 'Task') {
                    qtipCommentForFeed(this, data.title[0]);
                } else if (data.title[0].Type == 'Todo') {
                    qtipCommentTodoForFeed(this, data.title[0]);
                }


            }
        });
    }

    function qtipCommentForFeed(element, data) {

        var projectID = data.Id;
        var attr = 'comments';
        $.ajax({
            url: base_url + 'projects/getCommentForProjectsTask', // URL to the local file
            type: 'POST', // POST or GET
            data: {projectID: projectID}, // Data to pass along with your request
            success: function (resp, status) {
                //console.log(resp);
                var creBy = '';
                $("#tipTT" + projectID).text("");
                $.each(alluser, function (key, value) {
                    if (value.ID == resp.creator[0].createdBy) {
                        creBy = value.full_name;
                        creBy += " On: ";
                        creBy += moment(resp.creator[0].CreatedDate).format('MMM-DD-YYYY HH:mm:ss');
                    }
                });


                var floatingDiv = ' <div class="backDiv"  data-attr="' + attr + projectID + '" id="backDiv' + attr + projectID + '"><div id="Pro' + projectID + '" class="floting_box">';
                floatingDiv += '    <div class="panel panel-default" style="border: none;">';
                floatingDiv += '        <div class="panel-heading" style="height:60px;">';
                floatingDiv += '            <span class="col-lg-11 proDivname">';
                floatingDiv += '                <span style="width:100%;float: left;line-height: 1.5;text-overflow: ellipsis;margin-top: -18px;" class="project-text-prop" id="comProname' + projectID + '">' + data.Title + '</span>';
                floatingDiv += '                <span style="width:100%;float: left;font-size: 14px;margin-top: 0px;" id="comCrename">Created By: ' + creBy + '</span>';
                floatingDiv += '            </span>';
                floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
                floatingDiv += '        </div>';
                floatingDiv += '        <div class="panel-body">' + TaskCommentsDesignFrFeed(resp, projectID) + '</div>';
                floatingDiv += '     </div>';
                floatingDiv += ' </div></div>';


                $("#projectBody").append(floatingDiv);
                $("#taskid").val(projectID);
                $("#attachListDivCommnet").animate({scrollTop: $('#attachListDivCommnet').prop("scrollHeight")}, 1000);
                //setProjecttag(resp,projectID);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Some code to debbug e.g.:               
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

    function TaskCommentsDesignFrFeed(data, projectsid) {
        var tabDetail = '  <div class="row">';
        tabDetail += '           <div class="col-lg-12 projectfilefDiv" style="padding: 3% 4% 1% 4%;">';
        tabDetail += '               <span class="pull-left col-lg-11 comtag" id="tagBtnDiv' + projectsid + '" style="margin-top: 0px;"></span>';
        tabDetail += '               <div class="col-lg-1 col-sm-1 col-md-1">'
                  +  '                  <li class="ddm-com-set" style="display:inline">'
                  +  '                      <a class="dropdown-toggle dt-com-set" data-toggle="dropdown"><img class="" src="' + base_url + 'icons/Settings.png"></a>'
                  +  '                      <ul class="dropdown-menu dropdown-com-set">'
                  +  '                          <div class="arrow-position-view"></div>'
                  +  '                          <li><a>Clear</a></li>'
                  +  '                          <li><a>Starred</a></li>'
                  +  '                          <li><a>Select</a></li>'
                  +  '                      </ul>'
                  +  '                  </li>'
                  +  '                </div>';
        tabDetail += '           </div>';
        tabDetail += '    <div style="border-top: 1px solid #e0dddd;margin-top: 10.5%;width: 96%;margin-left: 2%;">&nbsp;</div>';
        tabDetail += '    <div class="row attachListDiv" id="attachListDivCommnet">';

        var daterow = "";
        $.each(data.allComm, function (k, v) {
            var time = data.allComm[k].CreatedDate;
            if (daterow == "") {
                daterow = moment(time).format('L');
                tabDetail += drawCommentGroupTime(time);
            } else if (daterow != moment(time).format('L')) {
                daterow = moment(time).format('L');
                tabDetail += drawCommentGroupTime(time);
            }

            tabDetail += '       <div class="panel panel-default proComm ptt' + data.allComm[k].Id + '">';
            tabDetail += '           <div class="panel-body status">';
            tabDetail += '               <div class="who clearfix">';
            tabDetail += '                   <span class="comment_imghover">';
            tabDetail += '                       <img src="' + base_url + 'asset/img/avatars/' + data.allComm[k].img + '" alt="img" class="comment-img">';
            tabDetail += '                       <div class="show_user_details">' + data.allComm[k].full_name + '<br>' + moment(data.allComm[k].CreatedDate).format('lll') + '</div>';
            tabDetail += '                   </span>';
            tabDetail += '                   <span class="from">' + data.allComm[k].Description + '</span>';
            tabDetail += '                   <div class="name dropdown"><b></b>' +
                         '                      <a data-toggle="dropdown" class="dropdown-toggle" title="Settings">' +
                         '                          <i class="fa fa-chevron-down pull-right"></i>' +
                         '                      </a>' +
                         '                      <ul class="dropdown-menu pull-right">' +
                         '                          <div class="arrow-top-right"></div>' +
                         '                          <li><a onclick="">Msg Info</a></li>' +
                         '                          <li><a onclick="deletePTTComment(\'' + data.allComm[k].Id + '\')">Clear</a></li>' +
                         '                      </ul>' +
                         '                      <i class="fa fa-star-o pull-right" onclick=""></i>' +
                         '                  </div>';
            tabDetail += '               </div>';
            tabDetail += '           </div>';
            tabDetail += '       </div>';
        });

        tabDetail += '    <div class="taskComments">';
        tabDetail += '           <div id="commentinput" onfocus="if($(this).html() == \'Type a message...\') $(this).html(\'\');" onblur="if($(this).html() == \'\') $(this).html(\'Type a message...\');" contenteditable data-status="TaskCmnt" class="form-control commentinput">Type a message...</div>';
        tabDetail += '           <input type="hidden" id="taskid" data-status="Task" class="form-control taskid" value="' + projectsid + '"/>';
        tabDetail += '           <img src="' + base_url + 'icons/emo.png" onclick="on_off_com_emo_popup()" id="input_img1">';
        tabDetail += '           <a data-title="Attachment" data-toggle="lightbox" title="Attachment" href="' + base_url + '/projects/comattach/Task/' + projectsid + '/ProjectsFiles">';
        tabDetail += '               <img src="' + base_url + 'icons/attach.png" id="input_img2">';
        tabDetail += '           </a>';
        tabDetail += '           <div class="comment_emo_popup">'
                + '<?php
                    $emo_url = base_url("asset/emotion");
                    $emotionImg = array("smile.png", "smile-big.png", "sad.png", "crying.png", "tongue.png", "shock.png", "angry.png", "confused.png", "wink.png", "embarrassed.png", "disapointed.png", "sick.png", "shut-mouth.png", "sleepy.png", "eyeroll.png", "thinking.png", "lying.png", "glasses-nerdy.png", "teeth.png", "angel.png", "bye.png", "clap.png", "hug-left.png", "hug-right.png", "good.png", "bad.png", "highfive.png", "love.png", "love-over.png", "tv.png", "mail.png", "rain.png", "pizza.png", "coffee.png", "computer.png", "beer.png", "drink.png", "cat.png", "dog.png", "sun.png", "star.png", "clock.png", "present.png", "mobile.png", "musical-note.png", "boy.png", "girl.png", "cake.png", "car.png");
                    foreach ($emotionImg as $v):
                        echo '<img onclick="sendComEmo(this)" src="' . $emo_url . "/" . $v . '">';
                    endforeach;
                    ?>'
                + '</div>';
        tabDetail += '    </div>';
        tabDetail += ' </div>';

        return tabDetail;
    }

    function qtipCommentTodoForFeed(element, data) {
        var projectID = data.Id;
        var attr = 'comments';
        $.ajax({
            url: base_url + 'todo/getCommentForTodo', // URL to the local file
            type: 'POST', // POST or GET
            data: {projectID: projectID}, // Data to pass along with your request
            success: function (resp, status) {

                var creBy = '';

                $("#tipTT" + data.Id).text("");
                $.each(alluser, function (key, value) {
                    if (value.ID == resp.creator[0].createdBy) {
                        creBy = value.full_name;
                        creBy += " On: ";
                        creBy += moment(resp.creator[0].CreatedDate).format('MMM-DD-YYYY HH:mm:ss');
                    }
                });


                var floatingDiv = ' <div class="backDiv"  data-attr="' + attr + projectID + '" id="backDiv' + attr + projectID + '"><div id="Pro' + projectID + '" class="floting_box">';
                floatingDiv += '    <div class="panel panel-default" style="border: none;">';
                floatingDiv += '        <div class="panel-heading" style="height:60px;">';
                floatingDiv += '            <span class="col-lg-11 proDivname">';
                floatingDiv += '                <span style="width:100%;float: left;line-height: 1.5;text-overflow: ellipsis;margin-top: -18px;" class="project-text-prop" id="comProname' + projectID + '">' + data.Title + '</span>';
                floatingDiv += '                <span style="width:100%;float: left;font-size: 14px;margin-top: 0px;" id="comCrename">Created By: ' + creBy + '</span>';
                floatingDiv += '            </span>';
                floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
                floatingDiv += '        </div>';
                floatingDiv += '        <div class="panel-body">' + todoCommentsDesign(resp, projectID) + '</div>';
                floatingDiv += '     </div>';
                floatingDiv += ' </div></div>';


                $("#projectBody").append(floatingDiv);

                $("#attachListDivCommnet").animate({scrollTop: $('#attachListDivCommnet').prop("scrollHeight")}, 1000);
                $("#taskid").val(projectID);
                //setProjecttag(resp,projectID);
                updateNotyCommenthd(projectID, 'reset');
                $('.comment-badge' + projectID).text('');
                $('.comment-badge' + projectID).next().removeClass('active-icon');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Some code to debbug e.g.:               
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }



    function filter(val) {
        //console.log(val);
        $(".MAIN").css('color', '#333;');
        $("#" + val).css('color', '#09ffff');
        $(".SA").hide();
        $("." + val).show();
    }

    function showDetail(filename, filesize, createby, createate) {

        var name = "";

        $.each(alluser, function (key, value) {
            var userID = parseInt(createby);
            if (value.ID == userID) {
                name = value.full_name;
            }
        });

        swal({
            title: '<i>Project Name: </i> <u>' + $("#pronameSpan").text() + '</u>',
            type: 'info',
            html:
                    '<p class="forMarLeft">File Name: ' + filename + '</p>' +
                    '<p class="forMarLeft">File Size: ' + filesize + ' KB</p>' +
                    '<p class="forMarLeft">Create Date: ' + moment(createate).format('LLLL') + '</p>' +
                    '<p class="forMarLeft">Created By: ' + name + '</p>',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText:
                    '<i class="fa fa-thumbs-up"></i> Great!',
            cancelButtonText:
                    'Cancel'
        })
    }


    function renameDetail(filename, filesize, createby, docid) {

        var name = "";

        $.each(alluser, function (key, value) {
            var userID = parseInt(createby);
            if (value.ID == userID) {
                name = value.full_name;
            }
        });

        swal({
            title: 'Rename File',
            input: 'text',
            text: 'Original File extension won\'t change',
            inputValue: filename,
            showCancelButton: true,
            confirmButtonText: 'Submit',
            showLoaderOnConfirm: true,
            preConfirm: function (email) {
                return new Promise(function (resolve, reject) {
                    setTimeout(function () {
                        if (email == '') {
                            reject('This email is already taken.')
                        } else {
                            resolve()
                        }
                    }, 2000)
                })
            },
            allowOutsideClick: false
        }).then(function (email) {

            renameFileName(email, docid);
        })
    }

    function deleteFile(docid) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function () {
            yesDelete(docid);
        })
    }

    function yesDelete(docid) {

        var request = $.ajax({
            url: '<?php echo site_url('Projects/fileDelete'); ?>',
            method: "POST",
            data: {
                docid: docid
            },
            //async: false,
            dataType: "json"
        });
        request.done(function (status) {
            //console.log(status);
            $("#fileWholeDiv007" + docid).remove();
        });

        request.fail(function (jqXHR, textStatus) {
            console.log('jqXHR');
            console.log(jqXHR);
            console.log(textStatus);
        });
    }

    function renameFileName(email, docid) {
        var request = $.ajax({
            url: '<?php echo site_url('Projects/fileRename'); ?>',
            method: "POST",
            data: {
                name: email,
                docid: docid
            },
            //async: false,
            dataType: "json"
        });
        request.done(function (status) {
            //console.log(status);
            //$("#onclkid007"+docid).attr('data-filename',email);
            $("#onclkid007" + docid).data('filename', email);
            $("#fileoriname007" + docid).text(email);
        });

        request.fail(function (jqXHR, textStatus) {
            console.log('jqXHR');
            console.log(jqXHR);
            console.log(textStatus);
        });
    }

    function msToTime(duration) {
        var milliseconds = parseInt((duration % 1000) / 100)
                , seconds = parseInt((duration / 1000) % 60)
                , minutes = parseInt((duration / (1000 * 60)) % 60)
                , hours = parseInt((duration / (1000 * 60 * 60)) % 24);

        hours = (hours < 10) ? "0" + hours : hours;
        minutes = (minutes < 10) ? "0" + minutes : minutes;
        seconds = (seconds < 10) ? "0" + seconds : seconds;
        var newmin = (hours * 60) + minutes;
        return newmin;
    }
    function userListShowOnlick(element, projectID) {
        $(element).qtip({
            show: {
                ready: true
            },
            hide: 'click unfocus',
            content: {
                text: 'Loading...'

            },
            events: {
                hide: function () {
                    $(this).qtip('destroy');
                },
                show: function (event, api) {

                    $(window).bind('keydown', function (e) {
                        if (e.keyCode === 27) {
                            api.hide(e);
                        }
                    });

                    $.ajax({
                        url: '<?php echo site_url(); ?>Projects/userListTagHD',
                        type: 'POST',
                        data: {
                            projectID: projectID
                        },
                        dataType: "JSON",
                        beforeSend: function () {
                            //console.log("Emptying");
                        },
                        success: function (data, textStatus) {
                            var taskDetailStr = "";

                            taskDetailStr += '<ul class="qtipUL">';
                            taskDetailStr += '<div class="arrow-top-right"></div>';

                            if (data.tag.length > 0) {
                                var SC = 0;
                                var MC = 0;

                                $.each(data.tag, function (key, value) {
                                    //console.log(data.tag[key].UserStatus);
                                    if (data.tag[key].UserStatus == '1') {
                                        SC++;

                                        if (SC < 2 && SC > 0) {
                                            taskDetailStr += '<li style="background-color: #333;font-size: 12px;" class="dropdown-menu-header">Supervisor(s)</li>';
                                        }

                                        taskDetailStr += '<li ><a href="#"><i class="fa fa-check"></i> ' + data.tag[key].full_name + '</a></li>';
                                    }


                                    if (data.tag[key].UserStatus == '2') {
                                        MC++;

                                        if (MC < 2 && MC > 0) {
                                            taskDetailStr += '<li style="background-color: #333;font-size: 12px;" class="dropdown-menu-header">Member(s)</li>';
                                        }

                                        taskDetailStr += '<li ><a href="#"><i class="fa fa-check"></i> ' + data.tag[key].full_name + '</a></li>';
                                    }

                                });

                                taskDetailStr += '<li class="dropdown-menu-footer" style="margin-bottom: -5px;">&nbsp;&nbsp;&nbsp;</li>';
                                taskDetailStr += '</ul>';

                                api.set('content.text', taskDetailStr);


                            } else {

                                taskDetailStr += '<li class="dropdown-menu-header">&nbsp;&nbsp;&nbsp;</li>';
                                taskDetailStr += '<li><a href="#"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No member found!!!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>';
                                taskDetailStr += '<li class="dropdown-menu-footer" style="margin-bottom: -5px;">&nbsp;&nbsp;&nbsp;</li>';

                                api.set('content.text', taskDetailStr);

                            }



                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            // Some code to debbug e.g.:               
                            console.log(jqXHR);
                            console.log(textStatus);
                            console.log(errorThrown);
                        }
                    });

                },

            },
            position: {

                my: 'right center',
                at: 'left center',
                viewport: $(window),
                adjust: {
                    method: 'none shift'
                },
                effect: false


            },
            style: {
                classes: 'qtip-light userLIStt',
                width: '800',
                tip: {
                    corner: true,
                    width: 40,
                    height: 40,
                    //offset: -220
                }
            },

        });
    }
</script>


<script type="text/javascript">
    $(".chat-user-filter").on("keyup", function (e) {
        if (e.target.value != "") {
            $(".contacts").hide();
            var filterkey = (e.target.value).toLowerCase();
            $.each($(".contacts"), function (k, v) {
                var searchkey = (($(v).text()).toLowerCase()).trim();
                if (searchkey.indexOf(filterkey) != -1) {
                    // console.log(searchkey);
                    $(v).show();
                }
            });
        } else {
            $(".contacts").show();
        }
    });
</script>


<!-- Modal -->
<div  id="openNewProject_s1" class="modal" role="dialog" data-backdrop="false">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="width: 750px; margin-top:0px; border-radius: 0.5em;">
            <div class="modal-header" style="background-color: #eeeeee;">
                <button type="button" class="close" data-dismiss="modal"> <span style="color: #5d5c5c; font-size: 43px; top: -14px; position: relative;font-weight:100">&times;</span>
                        <!-- <img src="<?php echo base_url(); ?>require/images/delete-icon.png" /> -->
                </button>
                <!-- <img style="width: 30px; margin-left: -12px; margin-top: -1px;" src="<?php echo base_url(); ?>asset/img/project-icon2.png" /> -->

                <span class="modal-title" style="margin-left: 3%;word-spacing: 3px;font-weight: 500;font-size: 21px;">

                    CREATE A NEW PROJECT
                </span>
            </div>
            <div class="modal-body">



                <form role="form" id="newProjectForm">
                    <div style="margin-right: 15px; margin-left: 15px;">
                        <div class="form-group">
                            <label for="new_project_name" style="word-spacing: 3px;"></label>					
                            <input id="new_project_name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" placeholder="Title"  type="text" class="form-control input-lg" style="font-size:30px">
                        </div>
                        <div class="form-group">													
                            <label for="new_project_name" style="word-spacing: 3px;font-size:30px"></label>											
                            <p style="font-size: 18px;" id="desTextClick">Description:
                                <a class="btn default" id="DesClick2">
                                    <span class="glyphicon glyphicon-triangle-bottom"></span> 
                                </a>
                            </p>
                        </div>
                        <div class="form-group" id="DescShow">
                            <label for="brief_note_new" style="word-spacing: 3px;"></label>
                            <textarea placeholder="Description" class="form-control placeholderHide" rows="5" id="brief_note_new"></textarea>
                        </div>
                        <div class="form-group">
                            <button id="open_newpro2" type="button" class="btn btn-modal-newpro" style="font-weight: 300;font-size: 30px;">CREATE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#task_pen").css('display', 'none');

    $("#newTaskInput").click(function () {

        $('#task_pen').show();
    });
    $("#newTaskInput").blur(function () {

        $('#task_pen').hide();
    });
</script>

<script type="text/javascript">
    function makeStar(docid, status) {
        var newStatus = '';

        if (status == 'YES') {
            newStatus = 'NO';
            var src = base_url + 'icons/Star.png';
        } else {
            newStatus = 'YES';
            src = base_url + 'icons/YStar.png';
        }

        var request = $.ajax({
            url: '<?php echo site_url('Projects/makeStar'); ?>',
            method: "POST",
            data: {
                docid: docid,
                status: newStatus
            },
            //async: false,
            dataType: "json"
        });
        request.done(function (data) {

            //console.log(data);
            //console.log(newStatus);
            $("#fileWholeDiv007" + docid).removeClass(status).addClass(newStatus);
            $("#MakeStatus007" + docid).data('status', newStatus);
            $("#MakeStatus007" + docid).attr('src', src);
        });

        request.fail(function (jqXHR, textStatus) {
            console.log('jqXHR');
            console.log(jqXHR);
            console.log(textStatus);
        });
    }
</script>

<script type="text/javascript">
    function CloseFlotDiv() {
        $('.backDiv').remove();
        $('#myProjectDivList').css('z-index', '0');
        $('.noBorder').removeClass('border');
    }


    function on_off_com_emo_popup() {
        if ($(".comment_emo_popup").is(":visible"))
            $(".comment_emo_popup").hide();
        else
            $(".comment_emo_popup").show();
    }

    function sendComEmo(e) {
        var lll = ($(e).attr("src")).split("/");
        var emoImg = lll[6];
        var path = base_url + "asset/emotion";
        var fulPathEmoImg = '<img class="emo" alt="' + emoImg + '" src="' + path + "/" + emoImg + '" style="width:22px; height:22px;" />';
        if ($("#commentinput").html() == "Type a message...")
            $("#commentinput").html(fulPathEmoImg);
        else
            $("#commentinput").html($("#commentinput").html() + fulPathEmoImg);
    }
    
    function qtipHideAll() {

        $('.qtip').qtip('hide');
    }

    function performClick(elemId) {

        var elem = document.getElementById(elemId);
        if (elem && document.createEvent) {
            var evt = document.createEvent("MouseEvents");
            evt.initEvent("click", true, false);
            elem.dispatchEvent(evt);
        }
        //$("#"+elemId).trigger('click');
    }

    // Delete Project Task Todo Comment
    function deletePTTComment(id) {
        var request = $.ajax({
            url: '<?php echo site_url('Projects/deletePTTComment'); ?>',
            method: "POST",
            data: {id: id},
            dataType: "json"
        });
        request.done(function (data) {
            $(".ptt" + id).hide();
        });
        request.fail(function (e) {
            console.log(e.responseText);
        });
    }

    function delComment(id) {
        var request = $.ajax({
            url: '<?php echo site_url('Projects/delComment'); ?>',
            method: "POST",
            data: {id: id},
            dataType: "json"
        });
        request.done(function (data) {

            $(".ptt" + id).remove();

        });
        request.fail(function (e) {
            console.log(e.responseText);
        });
    }

    $(document).mouseup(function (e) {
        var emopopupcontainer = $(".comment_emo_popup");

        if (!emopopupcontainer.is(e.target) && emopopupcontainer.has(e.target).length === 0) {
            $(".comment_emo_popup").hide("slow");
        }
        var emopopupcontainer1 = $(".qrc-popover-content");
        if (!emopopupcontainer1.is(e.target) && emopopupcontainer1.has(e.target).length === 0) {
            $(".qrc-popover-content").hide("slow");
        }
        
        var chat_container_backup = $(".chat-wid-back");
        if (chat_container_backup.is(e.target) && chat_container_backup.has(e.target).length == 0) {
            if ($("#chat-wid").is(":visible")) {
                hideChat();
            }
            if ($("#feed-wid").is(":visible")) {
                var pathArray = window.location.pathname.split('/');
                if (pathArray[2] != 'dashboard') {
                    close_feed();
                }
            }
        }

        var container11 = $('.dropdownCus-content');
        if (!container11.is(e.target) && container11.has(e.target).length === 0) {
            container11.hide();
        }

        // var containerSt = $('.sendForSaveSubTask');
        // if (!containerSt.is(e.target) && containerSt.has(e.target).length === 0) {
        //     if($(".sendForSaveSubTask").is(':visible')){
        //         $(".SIDIV").hide('slow');
        //     }
            
        // }

        var container13 = $('.duarationClass');
        if (!container13.is(e.target) && container13.has(e.target).length === 0) {
            //$('.backDivPro').remove();
            $('.hideMSpanduration').removeClass('Onlieline2');
            $('.hideMSpanhrduration').removeClass('Onlieline2');
            $('.duarationClass').css('font-size', '12px');
            $('.hideMSpanduration').hide();
            $('.hideMSpanhrduration').hide();
        }
    });
</script>
<script type="text/javascript">
    $(".chat-users>a").click(function (e) {
        if ($(e.target).hasClass("projectchatULDiv")) {
            if ($("#projectchatULDiv").is(":visible")) {
                $("#projectchatULDiv").hide();
                $("#projectchatULcaret").removeClass('fa-caret-down').addClass('fa-caret-right');
            } else {
                $("#projectchatULDiv").show();
                $("#projectchatULcaret").removeClass('fa-caret-right').addClass('fa-caret-down');
            }
        }
    });

    $(document).keyup(function (e) {
        if (e.keyCode === 27) {
            $('.backDiv').remove();
            $('.noBorder').removeClass('border');
            $('#openNewProject_s1').modal('hide');
            var pathArray = window.location.pathname.split('/');
            if (pathArray[2] != 'dashboard') {
                $('#feed-wid').css('display', 'none');
            }
            hideChat();

            openInput($("#subtaskinid").val());
            $('.backDivPro').remove();
            $('.clickontitle').trigger('blur');

            $('.span3').removeClass('open');
            $('.btngrp').removeClass('open');
        }
    });

    $.fn.select2.amd.require(['select2/selection/search'], function (Search) {
        Search.prototype.searchRemoveChoice = function (decorated, item) {
            this.trigger('unselect', {
                data: item
            });

            this.$search.val('');
            this.handleSearch();
        };
    });
</script>


<script type="text/javascript">
    function quicksubmit(fid, nid, e) {
        var char = e.which || e.keyCode;
        if (char == 13) {
            e.preventDefault();
            var req = $.ajax({
                url: "<?php echo site_url("chat/quickMsgRep"); ?>",
                type: "POST",
                data: {fid: fid, msg: $(e.target).html(), nid: nid},
                dataType: "JSON"
            });
            req.done(function (res) {
                if (res) {
                    $(".uReply" + nid).html("<span class='left'>You replied: </span>" + $(e.target).html());
                    $(e.target).hide();
                    $('.rightico' + nid).hide();
                    $("#quicksubmit" + fid).show();
                }
            });
        }

    }

    /* Call to Emotion popover */
    function qrcemo(did, uid) {
        $(".emoforqrc").attr("onClick", 'appendqrcemo(' + did + ', this)');
        $("#qrc-popover-content" + did).show();
    }
    function appendqrcemo(nid, e) {
        var str = $(".cqrMsg" + nid).html();
        if (str == "Reply a message") {
            str = "<img class='emo' src='" + $(e).attr("src") + "'>";
        } else {
            str = str + "<img class='emo' src='" + $(e).attr("src") + "'>";
        }
        $(".cqrMsg" + nid).html(str);
        $("#qrc-popover-content" + nid).hide("slow");
    }

    function triggerChat(id) {
        $(".cha" + id).trigger("click");
    }

    function triggerGroupChat(id) {
        $(".guser" + id).trigger("click");
    }

</script>

<script type="text/javascript">
    
    setInterval(function () { getfeedUpdte() }, 7000);
    
    function getfeedUpdte() {
        //do your AJAX stuff here
        var request = $.ajax({
            url: base_url + "projects/getfeedUpdte",
            method: 'POST',
            dataType: 'JSON'
        });

        request.done(function (rsp) {
            if(rsp.getTotalNot > 0 ){
                if($("#appNotNumber").is(':visible')){
                    $("#appNotNumber").text(rsp.getTotalNot);
                }else{
                    $("#appNotNumber").css('display','block');
                    $("#appNotNumber").text(rsp.getTotalNot);
                }
            }
            
            if(rsp.getTotalChat > 0){
                if($("#chatNotNumer").is(':visible')){
                    $("#chatNotNumer").text(rsp.getTotalChat);
                }else{
                    $("#chatNotNumer").css('display','block');
                    $("#chatNotNumer").text(rsp.getTotalChat);
                }
            }
        });
    }

    getToast();
    function getToast() {
        //do your AJAX stuff here
        var request = $.ajax({
            url: base_url + "projects/getToasts",
            method: 'POST',
            dataType: 'JSON'
        });

        request.done(function (rsp) {
            $('.badge-notify-toast').text((rsp.Toasts.length > 0 ? rsp.Toasts.length:''));
            $.each(rsp.Toasts, function (k, v) {
                $.toaster({priority: 'warning', title: v.title, message: v.body, tid: v.ID, proid: v.type_id, taskid: v.relatedTo});
            })

        });
    }

    function toggleToastDisplay(){
        $('#toaster').toggle();
    }

    function chatmsgNotDelete(){
        var request = $.ajax({
            url: base_url + "projects/deletechatmsgNot",
            method: 'POST',
            dataType: 'JSON'
        });

        request.done(function (rsp) {
            if(rsp.MSG == true){
                $("#chatNotNumer").css('display','none');
            }
            
        });
    }

    function toastApprove(element) {
        var tid = ($(element).closest('.tid').find('.title').attr('data-tid'));
        var proid = ($(element).closest('.tid').find('.title').attr('data-proid'));
        var taskid = ($(element).closest('.tid').find('.title').attr('data-taskid'));

        var request = $.ajax({
            url: base_url + "projects/approveToasts",
            method: 'POST',
            dataType: 'JSON',
            data: {
                tid: tid,
                proid: proid,
                taskid: taskid
            }, // Data to pass along with your 

        });

        request.done(function (rsp) {
           
        });

        request.fail(function (rsp) {

            console.log(rsp)

        });

         var badgeNum=Number($('.badge-notify-toast').text())-1;
            $('.badge-notify-toast').text((badgeNum>0 ? badgeNum:''));



    }

    function toastApproveAll(element) {

        var request = $.ajax({
            url: base_url + "projects/getToasts",
            method: 'POST',
            dataType: 'JSON'
        });

        request.done(function (rsp) {
            $('#toaster').remove();
            $('.badge-notify-toast').text('');
           
            $.each(rsp.Toasts, function (k, v) {
                console.log('getToastv.ID',v.ID);

                var request2 = $.ajax({
                    url: base_url + "projects/approveToasts",
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        tid: v.ID,
                        proid: v.type_id,
                        taskid: v.relatedTo
                    }, // Data to pass along with your 

                });

                request2.done(function (rsp) {

                    

                });

                request2.fail(function (rsp) {

                    console.log(rsp)

                });
            })

        });
    }

    function toastRejectAll(element) {

        var request = $.ajax({
            url: base_url + "projects/getToasts",
            method: 'POST',
            dataType: 'JSON'
        });

        request.done(function (rsp) {
             $('#toaster').remove();
             $('.badge-notify-toast').text('');
           
            $.each(rsp.Toasts, function (k, v) {
                console.log('getToastv.ID',v.ID);

                var request2 = $.ajax({
                    url: base_url + "projects/rejectToasts",
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        tid: v.ID,
                        proid: v.type_id,
                        taskid: v.relatedTo
                    }, // Data to pass along with your 

                });

                request2.done(function (rsp) {

                  console.log('toastRejectAll',rsp);

                });

                request2.fail(function (rsp) {

                    console.log(rsp)

                });
            })

        });
    }

    function toastReject(element) {
        var tid = ($(element).closest('.tid').find('.title').attr('data-tid'));
        var proid = ($(element).closest('.tid').find('.title').attr('data-proid'));
        var taskid = ($(element).closest('.tid').find('.title').attr('data-taskid'));

        var request = $.ajax({
            url: base_url + "projects/rejectToasts",
            method: 'POST',
            dataType: 'JSON',
            data: {
                tid: tid,
                proid: proid,
                taskid: taskid
            }, // Data to pass along with your 

        });

        request.done(function (rsp) {

           

        });

        request.fail(function (rsp) {

            console.log(rsp)

        });

         var badgeNum=Number($('.badge-notify-toast').text())-1;
            $('.badge-notify-toast').text((badgeNum>0 ? badgeNum:''));
       

    }
</script>

<script type="text/javascript">
    $(document).key('ctrl+/', function () {
        if ($('#chat-wid').css('display') == "block") {

            if ($('#msg').hasClass('todo-searchmode')) {
                $('#msg').removeClass('todo-searchmode').removeClass('border-rad');
                $('.directchat').show();
            } else {
                $('#msg').addClass('todo-searchmode').addClass('border-rad');
                $('#msg').focus();
            }

        } else {
            // for task
            if ($('#newTaskInput').hasClass('todo-searchmode')) {
                $('#newTaskInput').removeClass('todo-searchmode');
                $('.taskDetailDive').show();
                $('.subtaskDetailDive').show();
                $('.TaskListDiv').removeHighlight();
            } else {
                $('#newTaskInput').addClass('todo-searchmode');
                $('#newTaskInput').focus();
            }

            // for todo
            if ($('#newTodoInput').hasClass('todo-searchmode')) {
                $('#newTodoInput').removeClass('todo-searchmode');
                $('.dropdown-change-view').find('.active').click();
            } else {
                $('#newTodoInput').addClass('todo-searchmode');
                $('#newTodoInput').focus();
            }
        }
    });

    $(document).delegate("#clearBtn1", "click", function() {
        if ($('#newTaskInput').hasClass('todo-searchmode')) {
            $('#newTaskInput').removeClass('todo-searchmode');
            $('.taskDetailDive').show();
            $('.subtaskDetailDive').show();
            $('.TaskListDiv').removeHighlight();
        } else {
            $('#newTaskInput').addClass('todo-searchmode');
            $('#newTaskInput').focus();
        }
    });



    function expanComDiv() {
        $(".attachListDiv").css("min-height", 435);
        $(".projectInput").css("height", 100);
        $("#commentinput").css("height", 90);
        $("#input_img1").css("top", 73);
        $("#input_img2").css("top", 70);
        $("#input_img2122").css("top", 70);
        $("#attachListDivCommnet").animate({scrollTop: $('#attachListDivCommnet').prop("scrollHeight")}, 1000);
    }
    function closeComDiv() {
        $(".attachListDiv").css("min-height", 465);
        $(".projectInput").css("height", 50);
        $("#commentinput").css("height", 40);
        $("#input_img1").css("top", 13);
        $("#input_img2").css("top", 10);
        $("#input_img2122").css("top", 10);
    }
    function expanTaskDiv() {
        $(".attachListDiv").css("min-height", "390px");
        // console.log($(".attachListDiv").css("min-height"));
        $(".attachListDiv").css("margin-bottom", '1%');
        // $(".attachListDiv").css("padding-bottom", '2%');
        $(".taskComments").css("height", 100);
        $("#commentinput").css("height", 90);
        $("#commentinput").css("border-color", "#999999");
        $("#input_img1").css("top", 73);
        $("#input_img2").css("top", 70);
        $("#input_img2122").css("top", 70);
        $("#attachListDivCommnet").animate({scrollBottom: $('#attachListDivCommnet').prop("scrollHeight","0px")}, 1000);
    }
    function closeTaskDiv() {
        $(".attachListDiv").css("min-height", "440px");
        $(".attachListDiv").css("margin-bottom", '1%');
        $(".attachListDiv").css("padding-bottom", '2%');
        $(".taskComments").css("height", 50);
        $("#commentinput").css("height", 40);
        $("#commentinput").css("border-color", "#ededed");
        $("#input_img1").css("top", 13);
        $("#input_img2").css("top", 10);
        $("#input_img2122").css("top", 10);
    }

    function expanTaskDivNEW() {
        $(".attachListDiv").css("min-height", "300px");
        // console.log($(".attachListDiv").css("min-height"));
        $(".attachListDiv").css("margin-bottom", '1%');
        // $(".attachListDiv").css("padding-bottom", '2%');
        $(".taskComments").css("height", 110);
        $("#commentinput").css("height", 100);
        $("#commentinput").css("border-color", "#999999");
        $("#input_img1").css("top", 73);
        $("#input_img2").css("top", 70);
        $("#input_img2122").css("top", 70);
        $("#attachListDivCommnet").animate({scrollTop: $('#attachListDivCommnet').prop("scrollHeight")}, 1000);
    }
    function closeTaskDivNEW() {
        $(".attachListDiv").css("min-height", "350px");
        $(".attachListDiv").css("margin-bottom", '1%');
        $(".attachListDiv").css("padding-bottom", '2%');
        $(".taskComments").css("height", 50);
        $("#commentinput").css("height", 40);
        $("#commentinput").css("border-color", "#fafafa");
        $("#input_img1").css("top", 13);
        $("#input_img2").css("top", 10);
        $("#input_img2122").css("top", 10);
    }

</script>

<script type="text/javascript">
    function export_project_csv(proid) {

        var request = $.ajax({
            url: base_url + "report/getProjectCSV",
            method: 'POST',
            data: {
                proid: proid

            },
            dataType: 'json'
        });
        request.done(function (response) {

            document.location.href = '<?php echo base_url(); ?>temp/project_' + response + '.csv';

        });
        request.fail(function (response) {
            console.log(response);

        });
    }


   
</script>
