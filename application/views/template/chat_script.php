<script type="text/javascript">
var imgurl = "<?php echo base_url('asset/img/avatars/'); ?>";
var allgrouplist = <?php echo (isset($gcontacts)?json_encode($gcontacts):"'0'"); ?>;
var gnpcontacts = <?php echo (isset($gnpcontacts)?json_encode($gnpcontacts):"'0'"); ?>;
var sendNowId = [];
var projectchatmember = "";
//document.emojiSource = './asset/js/plugin/summernote/pngs/';
/* Send a message */
function sendMsg(){
    if($("#fid").val() != ""){
        // $("#msg").blur();
        // var tempmsg = $("#msg").html();
        var tempmsg = $("#msg").summernote('code');
        tempmsg = tempmsg.replace(/<p><br><\/p>/gi, '');
        if(tempmsg == ''){
            $("#msg").summernote('reset');
        }
        else{
            // console.log($("#msg").html());
            var url = "<?php echo site_url("chat/newMsg"); ?>";
            // var msg = $("#msg").html();
            var msg = $("#msg").summernote('code');
            // console.log(msg);
            msg = msg.slice(0, -11);
            $("#hidmsg").val(msg);
            var request = $.ajax({
                url: url,
                method: "POST",
                data: $('#messenger').serialize(), 
                dataType: "json"
            });

            request.done(function(rsp){
                // console.log(rsp);
                if(rsp.length>0){
                    // console.log(rsp);
                    // $("#msg").html("");
                    $("#msg").summernote('reset');
                    $.each(rsp, function(keyId, keyValue){
                        if($.inArray(keyValue.msgid, globalMsgArray)<0) { //add to array 
                            globalMsgArray.push((keyValue.msgid).toString());
                            allMsg.push(keyValue.msg);
                            if(keyValue.type == 'right'){
                                sendNowId.push((keyValue.msgid).toString());
                                var gtlist = $(".dateGroup");
                                var flag = true;
                                $.each(gtlist, function(k,v){
                                    if(($(v).text().trim()).indexOf("Today") > -1){
                                        flag = false;
                                        return false;
                                    }
                                });
                                if(flag) drawDate(keyValue.time);
                                drawSendMsg(keyValue.time, keyValue.msg,keyValue.msgid, keyValue.msgtype, keyValue.msglike, 1);
                            }
                        }
                    });
                    $('.fixedContent').scrollTop($('#cstream').height());
                }
            });
            request.fail(function(e){
                console.log("Send message error...");
                console.log(e.responseText);
            });
        }
        
        // $("#msg").html(tempmsg);
        // $("#msg").focus();
        $("#msg").summernote('focus');
    }
    return false;
}

/* Search old message */
function searchMsg(mid, fid, fname, page){
    sendNowId = [];
    /*
        setCookie & getCookie function defination are "includes_bottom.php"
        setCookie("feed_div_width") set from index page.
    */
    var width = getCookie("feed_div_width") * 2;
    var height = $(window).height() - 350;
    
    // if(page == 'dashboard'){
    //     // height = $("#myprojectList").innerHeight() - 175;
    // }
    // else if(page == 'projects'){
    //     width = ($(".projectListDiv").innerWidth() - 35)*2;
    //     // height = $(".projectListDiv").innerHeight() - 180;
    //     // $("#wid-id-4").hide();
    //     $(".projectListDiv").css("background", "#EEE");
    // }
    // else if(page == 'calendar'){
    //     // height = $(".calendarDiv").innerHeight() - 160;
    // }
    // else{
    //     // height = height - 280;
    // }
    // swal("chat width", width, "success");
    $("#chat-wid").width(width);
    $("#chat-wid .widget-body").css("height", height);

    var request = $.ajax({
        url: "<?php echo site_url("chat/searchMsg"); ?>",
        method: "POST",
        data: { mid : mid, fid : fid },
        dataType: "json"
    });
    request.done(function(res){
        if(res.status === true){
            var dateGroup = "";
            $.each(res.data, function(keyId, keyValue){
                if($.inArray(keyValue.msgid, globalMsgArray)<0) { //add to array
                    globalMsgArray.push(keyValue.msgid);
                    allMsg.push(keyValue.msg);
                    if(dateGroup != (moment(keyValue.time).calendar().split(" at"))[0]){
                        dateGroup = (moment(keyValue.time).calendar().split(" at"))[0];
                        drawDate(keyValue.time);
                    }
                    if(keyValue.type == 'right')
                        drawSendMsg(keyValue.time, keyValue.msg,keyValue.msgid, keyValue.msgtype, keyValue.msglike, keyValue.msg_status);
                    else if(keyValue.type == 'left')
                        drawReceiveMsg(keyValue.time, keyValue.msg, keyValue.msgid, fname, keyValue.fimg, keyValue.fname, keyValue.msgtype, keyValue.msglike, keyValue.msg_status);
                }
            });
        }
    });
    request.complete(function(){
        $(".chat-wid-back").show();
        $("#chat-wid").show();
        $('#msg').summernote({
            minHeight: 50,
            callbacks: {
                onChange: function(contents) {
                    // console.log(contents);
                    var t = $(contents).find("p");
                    $("#emailsendtoname").val(t.prevObject[0].textContent);
                }
            },
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['mybutton', ['emo', 'attach']]
            ],
            buttons: {
                emo: '<button type="button" class="note-btn btn btn-default btn-sm chatEmo" tabindex="-1" title="Emoji" onclick="callemo()"><i class="fa fa-smile-o" style="cursor: pointer;font-size: 16px;top:4px;"></i></button>',
                attach: '<button type="button" class="note-btn btn btn-default btn-sm chatLightboxAttachment" tabindex="-1" title="" data-title="Attachment" data-toggle="lightbox" title="Attachment" href="<?php echo site_url("chat/openfile"); ?>"><i class="fa fa-paperclip" style="cursor: pointer;font-size: 16px;top:4px;"></i></button>'
            },
            placeholder: 'Type a message...',
            callbacks: {
                onKeyup: function(e) {
                    if(e.keyCode == 13){
                        if (!e.shiftKey)
                            sendMsg();
                    }
                }
            }
        });
        


        $(".chat-settings").attr("title", "Chat Settings");
        $('.exp_col_ChatBtn').attr("onclick","collaspeChat()");
        $('.exp_col_ChatBtn').attr("title","Collaspe Chat");
        $('.exp_col_ChatBtn').html('<i class="fa fa-rotate-135 fa-long-arrow-right"></i>');
        
        $('.fixedContent').scrollTop($('#cstream').height());
        if($("#chat-title span").width()>237){
            $(".edit-title").css("left",270);
        }else{
            $(".edit-title").css("left",$("#chat-title span").width()+40);
        }
        // $("#msg").focus();
        $("#msg").summernote('focus');

    });
    request.fail(function(e){
        console.log("Seach message error...");
        console.log(e.responseText);
    });
    
    $("div").click(function() {
        if($(".widget-toolbar").hasClass("open")){
            $(".chat-settings").attr("title", "Chat Settings");
        }
        else{
            $(".chat-settings").attr("title", "");
        }
    });   
}

function callemo(){
    if($("#emojidiv").is(":visible"))
        $("#emojidiv").hide();
    else{
        $("#emojidiv").css("left", this.event.pageX - 353);
        $("#emojidiv").show();
    }
}
/* When a chat window is open, search for new message */
function searchNewMsg(mid, fid, fname){
    var request = $.ajax({
        url: "<?php echo site_url("chat/searchNewMsg"); ?>",
        method: "POST",
        data: { mid : mid, fid : fid },
        dataType: "json"
    });
    request.done(function(res){
        if(res.length>0){
            $.each(res, function(keyId, keyValue){
                if($.inArray(keyValue.msgid, globalMsgArray)<0) { //add to array
                    globalMsgArray.push(keyValue.msgid);
                    allMsg.push(keyValue.msg);
                    if(keyValue.type == 'right')
                        drawSendMsg(keyValue.time, keyValue.msg,keyValue.msgid, keyValue.msgtype, keyValue.msglike, keyValue.msg_status);
                    else if(keyValue.type == 'left')
                        drawReceiveMsg(keyValue.time, keyValue.msg, keyValue.msgid, fname, keyValue.fimg, keyValue.fname, keyValue.msgtype, keyValue.msglike, keyValue.msg_status);
                }
            });
            $('.fixedContent').scrollTop($('#cstream').height());
        }
    });
    request.fail(function(e){
        console.log("Seach running new message error...");
        console.log(e.responseText);
    });
}

/****
Check for recently send message.
And if seen, change the status delivered
*/
function seenSendMsg(msgidarray){
    if(msgidarray.length>0){
        var request = $.ajax({
            url: "<?php echo site_url("chat/seenSendMsg"); ?>",
            method: "POST",
            data: { msgidarray : msgidarray },
            dataType: "json"
        });
        request.done(function(res){
            if(res.length>0){
                $.each(res, function(keyId, keyValue){
                    if(keyValue.status == 0)
                        $("#msgStatus"+keyValue.id).attr("src", base_url+"asset/img/icons/delivered.gif");
                });
            }
        });
        request.fail(function(e){
            console.log("seenSendMsg error...");
            console.log(e.responseText);
        });
    }
}


/*****
Check for new message. 
And if, show a notification in contact name right side 
*/
function newMsgNotify(){
    var request = $.ajax({
        url: "<?php echo site_url("chat/checkMsgForNotify"); ?>",
        method: "POST",
        data: { mid : '<?php echo (isset($user_email)?$user_email:""); ?>' },
        dataType: "json"
    });
    
    request.done(function(rsp) {
        if(rsp.length == 0){
            $("span[id^=newMsg_]").html("");
            $("span[id^=newMsg_]").removeClass("newMsgNot");
        }
        else if(parseInt(rsp[0].noOfSms) > 0){
            $("span[id^=newMsg_]").html("");
            $("span[id^=newMsg_]").removeClass("newMsgNot");
            $.each(rsp, function(keyId, keyValue){
                if(has_mute(keyValue.sender_id)){
                    $('#newMsg_'+keyValue.id).addClass("newMsgNot");
                    $('#newMsg_'+keyValue.id).html(parseInt(keyValue.noOfSms));
                }
            });
        }
    });
    
    request.fail(function(e){
        console.log("New MsgNotify error...");
        console.log(e.responseText);
    });
}

function is_online(){
    var person_id = "<?php echo (isset($id)?$id:''); ?>";
    var clr = "";
    var request = $.ajax({
        url: "<?php echo base_url("chat/checkOnlineOffline"); ?>",
        method: "POST",
        dataType: "json"
    });
    
    request.done(function(rsp) {
        $.each(rsp, function(keyId, keyValue){
            $(".cha"+keyValue.user_id).attr("data-chat-status", "online");
        });
        // console.log(rsp);
    });
    
    request.fail(function(e){
        console.log("is_online error...");
        // console.log(e.responseText);
    });
}

/* star any selected message */
function starselected(){
    if($(".dropdown input[type='checkbox']:checked").length > 0){
        var listofmsgid = [];
        $.each($(".dropdown input[type='checkbox']:checked"), function(k,v){
            listofmsgid.push($(v).val());
        });
        // console.log(listofmsgid);
        var request = $.ajax({
            url: "<?php echo site_url("chat/addStarMsg"); ?>",
            method: "POST",
            data: { msgid : listofmsgid },
            dataType: "json"
        });
        request.done(function(res){
            if(res){
                $.each(listofmsgid, function(k,v){
                    if($("#msgdivid"+v).hasClass('msgt-fa-star')){
                        $("#msgdivid"+v).removeClass('msgt-fa-star');
                        $("#msgdivid"+v).addClass('msgt-fa-star-o');
                        $("#starico"+v).removeClass('fa-star');
                        $("#starico"+v).addClass('fa-star-o');
                    }
                    else if($("#msgdivid"+v).hasClass('msgt-fa-star-o')){
                        $("#msgdivid"+v).removeClass('msgt-fa-star-o');
                        $("#msgdivid"+v).addClass('msgt-fa-star');
                        $("#starico"+v).removeClass('fa-star-o');
                        $("#starico"+v).addClass('fa-star');
                    }
                });
                $(".dropdown input[type='checkbox']").prop("checked", false);
                if(listofmsgid.length>1)
                    selectmsg();
            }
        });
        request.fail(function(e){
            console.log(e.responseText);
            console.log("Fail to starselected...");
        });
    }else{
        swal("Error Notice", "No message selected for star", "error");
    }
}

/* like any selected message */
function likeselected(){
    if($(".dropdown input[type='checkbox']:checked").length > 0){
        var listofmsgid = [];
        $.each($(".dropdown input[type='checkbox']:checked"), function(k,v){
            listofmsgid.push($(v).val());
        });
        // console.log(listofmsgid);
        var request = $.ajax({
            url: "<?php echo site_url("chat/addLikeMsg"); ?>",
            method: "POST",
            data: { msgid : listofmsgid },
            dataType: "json"
        });
        request.done(function(res){
            if(res){
                $.each(listofmsgid, function(k,v){
                    if($("#msgdivid"+v).hasClass('msgt-fa-thumbs-up')){
                        $("#msgdivid"+v).removeClass('msgt-fa-thumbs-up');
                        $("#msgdivid"+v).addClass('msgt-fa-thumbs-o-up');
                        $("#likeico"+v).removeClass('fa-thumbs-up');
                        $("#likeico"+v).addClass('fa-thumbs-o-up');
                    }
                    else if($("#msgdivid"+v).hasClass('msgt-fa-thumbs-o-up')){
                        $("#msgdivid"+v).removeClass('msgt-fa-thumbs-o-up');
                        $("#msgdivid"+v).addClass('msgt-fa-thumbs-up');
                        $("#likeico"+v).removeClass('fa-thumbs-o-up');
                        $("#likeico"+v).addClass('fa-thumbs-up');
                    }
                });
                $(".dropdown input[type='checkbox']").prop("checked", false);
                if(listofmsgid.length>1)
                    selectmsg();
            }
        });
        request.fail(function(e){
            console.log(e.responseText);
            console.log("Fail to likeselected...");
        });
    }else{
        swal("Error Notice", "No message selected for like", "error");
    }
}


/* delete any selected message */
function deleteselected(){
    if($(".dropdown input[type='checkbox']:checked").length > 0){
        swal({
                title: "Are you sure?",
                text: $(".dropdown input[type='checkbox']:checked").length + " selected messages will be deleted permanently ???",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
        }).then(function(isConfirm){
                if (isConfirm) {
                    var listofmsgid = [];
                    $.each($(".dropdown input[type='checkbox']:checked"), function(k,v){
                        listofmsgid.push($(v).val());
                    });
                    var request = $.ajax({
                        url: "<?php echo site_url("chat/deleteMsg"); ?>",
                        method: "POST",
                        data: { msgid : listofmsgid },
                        dataType: "json"
                    });
                    request.done(function(res){
                        if(res){
                            $.each(listofmsgid, function(k,v){
                                $("#msgid"+v)[0].checked = false;
                                $("#msgid"+v).prop("checked", false);
                                $("#msgdivid"+v).hide();
                            });
                            if(listofmsgid.length>1)
                                selectmsg();
                        }
                    });
                    request.fail(function(){
                        console.log("error in delete query");
                    });
                    // swal("Deleted!", "Message delete successfully.", "success");
                }
            });
    }
    else{
        swal("Error Notice", "No message selected for delete","error");
    }
}

/* clear all messages */
function clearrecent(){
    swal({
        title: "Are you sure?",
        text: "All messages will be deleted permanently ???",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
    }).then(function(isConfirm){
        if (isConfirm) {
            var listofmsgid = [];
            $.each($(".dropdown input[type='checkbox']"), function(k,v){
                listofmsgid.push($(v).val());
            });
            var request = $.ajax({
                url: "<?php echo site_url("chat/deleteMsg"); ?>",
                method: "POST",
                data: { msgid : listofmsgid },
                dataType: "json"
            });
            request.done(function(res){
                if(res){
                    $.each(listofmsgid, function(k,v){
                        $("#msgdivid"+v).hide();
                    });
                    $("#cstream").html("");
                }
            });
            request.fail(function(){
                console.log("error in clearrecent");
            });
        }
    });
}

function blockuser(e){
    var fid = $("#fid").val();
    var bub = $(e).text();//block unblock
    var request = $.ajax({
    url: "<?php echo site_url("chat/blockcontact"); ?>",
        method: "POST",
        data: {mid: $("#mid").val(), fid: fid, type: bub},
        dataType: "json"
    });
    request.done(function( rsp ) {
        // console.log(blockuser_list);
        if(rsp){
            if(bub == "Block"){
                do_block("Unblock","no-drop","This user block successfully");
                blockuser_list.push({mid:$("#mid").val(), fid:fid});
            }
            else{
                do_block("Block","pointer","This user unblock successfully");
                $.each(blockuser_list, function(k,v){
                    if(v.mid == $("#mid").val() && v.fid == fid)
                        blockuser_list.splice(k,1);
                });
            }
        }
        // console.log(blockuser_list);
    });
    request.fail(function(e){
        swal("Error Notice", "This user is already blocked", "error");
    });
}

function muteuser(mutefor, e){
    var mid = $("#mid").val();
    var fid = $("#fid").val();
    $(e).closest("ul").css("display","none");
    var request = $.ajax({
        url: "<?php echo site_url("chat/muteuser"); ?>",
        method: "POST",
        data: {mid: mid, fid: fid, mutefor: mutefor},
        dataType: "json"
    });
    request.done(function(res){
        muteuserlist = res;
        swal("Confirm Notice", "This user mute for next "+mutefor+" minutes", "warning");
    });
}

function unmuteuser(e){
    var mid = $("#mid").val();
    var fid = $("#fid").val();
    $(e).closest("ul").css("display","none");
    var request = $.ajax({
        url: "<?php echo site_url("chat/unmuteuser"); ?>",
        method: "POST",
        data: {mid: mid, fid: fid},
        dataType: "json"
    });
    request.done(function(res){
        swal("Confirm Notice", "Unmute successfully...", "success").then(function(){
            location.reload();
        });
    });
}

function has_mute(fid){
    var result = true;
    $.each(muteuserlist, function(k,v){
        if(v.fid == fid){
            result = false;
            var lupt = new Date(v.last_update);
            var mutetime = lupt.getTime() + v.mute_for * 60000;

            var currentdate = new Date();
            var currenttime = currentdate.getTime();

            if(currenttime > mutetime){
                var r = $.ajax({
                    url: "<?php echo site_url("chat/muteuserdelete"); ?>",
                    method: "POST",
                    data: {sl: v.sl},
                    dataType: "json"
                });
                r.done(function(rres){
                    var unmuteuser = muteuserlist.indexOf(fid);
                    muteuserlist.splice(unmuteuser,1);
                });
            }
            return false;
        }
    });
    return result;
}


function submitcreatenewgroup(chatboxfor){
    if(chatboxfor == "group"){
        var request = $.ajax({
            url: "<?php echo site_url("chat/updateGroupMember"); ?>",
            method: "POST",
            data: {member: $("#select_project_chat_member").val(), mid: $("#mid").val(), group_id: $("#fid").val()},
            dataType: "json"
        });
        request.done(function( rsp ) {
            if(rsp.result){
                $("img.editgroupmember").attr("src", "<?php echo base_url("asset/img/icons/Add Member.png"); ?>");
                cancelGroupUpdating();
            }
            // console.log(rsp);
        });
        request.fail(function(e){
            console.log(e.responseText);
        });
        $("img.editgroupmember").attr("src", "<?php echo base_url("asset/img/icons/Add Member.png"); ?>");
        cancelGroupUpdating();
    }else{
        // var group_id = Date.now() + Math.floor((Math.random() * 10000) + 1);
        // console.log($('#chat-title').html());
        var die = false;
        var allgrocon = $(".grocon");
        if(allgrocon.length>0){
            for(var ii = 0; ii< allgrocon.length; ii++){
                if($(allgrocon[ii]).attr("data-chat-dname") == $('#chat-title span').html()){
                    die = true; break;
                }
            }
        }
        if(!die){
            var request = $.ajax({
                url: "<?php echo site_url("chat/createGroup"); ?>",
                method: "POST",
                data: {member: $("#select_project_chat_member").val(), mid: $("#mid").val(), group_id: $("#fid").val(), group_name: $('#chat-title span').html() },
                dataType: "json"
            });

            request.done(function( rsp ) {
                if(rsp.result){
                    var gpname = rsp.group_name;
                    var gpid = rsp.group_id;
                    if(rsp.result == "new"){
                        $(".tempusr").hide();
                        var html = '<a onclick="startChat(this)" href="#" class="usr guser'+gpid+'" data-chat-page="<?php echo $this->uri->segment(1); ?>" data-chat-id="cha'+gpid+'" data-chat-dname="'+gpname+'" data-chat-email="'+gpid+'" data-chat-img="group_message.png" data-chat-status="online" data-chat-alertshow="false" data-rel="popover-hover" data-placement="right" data-html="true" data-content="<div class=\'usr-card\'><img src=\'<?php echo base_url(); ?>asset/img/avatars/male.png\' alt=\''+gpname+'\'><div class=\'usr-card-content\'><h3>'+gpname+'</h3><p>'+gpname+'</p></div></div>"> <i class="fa fa-circle-thin"></i> '+gpname+'</a>';
                        $('#group-contacts').append(html);
                        // $(".guser"+gpid).trigger("click");
                        printgroupmembers(gpid);
                        $("#cstream").html("");
                        globalMsgArray = [];
                        allMsg = [];
                        $("img.editgroupmember").attr("src", "<?php echo base_url("asset/img/icons/Add Member.png"); ?>");
                        cancelGroupUpdating();
                        searchMsg($("#mid").val(), gpid, gpname);
                    }
                    else{
                        $(".guser"+gpid).trigger("click");
                    }
                }
            });
            request.fail(function(e){
                console.log(e.responseText);
                console.log("Fail to submitcreatenewgroup...");
            });
        }
        else{
            swal({
                title: "Opps!!!",
                text: "Group name already exists",
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ok",
                // cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }).then(function(e){
                hideChat();
            });
        }
    }

    return false;
}

function openmessageinfo(msgid){
    var request = $.ajax({
        url: "<?php echo site_url("chat/messageinfo"); ?>",
        method: "POST",
        data: {msgid: msgid},
        dataType: "json"
    });
    request.done(function(res){
        var receiver = res[0].receiver_id;

        /* this if statement for group message info*/
        if($.isNumeric(res[0].receiver_id)){
            var request2 = $.ajax({
                url: "<?php echo site_url("chat/searchGroupMember"); ?>",
                method: "POST",
                data: {group_id: res[0].receiver_id},
                dataType: "json"
            });
            request2.done(function(res2){
                receiver = ""; var count = 1; var s = "";
                $.each(res2.data, function(k,v){
                    if(v != res[0].sender_id){
                        // this block manage the left mergine
                        if(count>1){
                            receiver += "<p class='messageinfo-level'>&nbsp;</p>";
                            s += "<p class='messageinfo-level'>&nbsp;</p>";
                        }

                        receiver += count + ". " + v + "<br>";

                        if((res[0].status).indexOf(v) == -1)
                            s += count + ". " + v + "(Delevered) <br>";
                        else
                            s += count + ". " + v + "(Pending) <br>";

                        count++;
                    }
                });
                
                var design= '<div class="messageinfo alert alert-info fade in">'+
                                '<button class="close" data-dismiss="alert">×</button>'+
                                '<i class="fa-fw fa fa-info"></i>'+
                                '<strong>Message Info!</strong>'+
                                '<br><p class="messageinfo-level">Message: </p>'+window.atob(res[0].msg)+
                                '<br><p class="messageinfo-level">Sender Email: </p>'+res[0].sender_id+
                                '<br><p class="messageinfo-level">Receiver Email: </p>'+receiver+
                                '<br><p class="messageinfo-level">Delivery Time: </p>'+res[0].time+
                                '<br><p class="messageinfo-level">Status: </p>'+s+
                            '</div>';
                $("body").append(design);
            });
        }
        /* this block for single message info */
        else{
            if(res[0].status == 1)
                var s = "Pending";
            else
                var s = "Delevered";

            var design= '<div class="messageinfo alert alert-info fade in">'+
                            '<button class="close" data-dismiss="alert">×</button>'+
                            '<i class="fa-fw fa fa-info"></i>'+
                            '<strong>Message Info!</strong>'+
                            '<br><p class="messageinfo-level">Message: </p>'+window.atob(res[0].msg)+
                            '<br><p class="messageinfo-level">Sender Email: </p>'+res[0].sender_id+
                            '<br><p class="messageinfo-level">Receiver Email: </p>'+receiver+
                            '<br><p class="messageinfo-level">Delivery Time: </p>'+res[0].time+
                            '<br><p class="messageinfo-level">Status: </p>'+s+
                        '</div>';
            $("body").append(design);
        }
    });
}

function forwardmsg(e,n,img){
    var m = $("#mid").val();
    var listofmsgid = [];
    $.each($(".dropdown input[type='checkbox']:checked"), function(k,v){
        listofmsgid.push($(v).val());
    });
    var request = $.ajax({
        url: "<?php echo site_url("chat/forwardmsg"); ?>",
        method: "POST",
        data: { msgid : listofmsgid, fid: e, mid: m },
        dataType: "json"
    });
    request.done(function(res){
        if(res){
            swal("Confirm Notice", "Messages forward completed.", "success");
            $(".dropdown input[type='checkbox']").prop("checked", false);
            $("#noofselected").text("0");
            $(".message-forward .close").trigger("click");
            if(listofmsgid.length>1)
                selectmsg();
        }
    });
    request.fail(function(e){
        console.log(e.responseText);
        console.log("Fail to forwardmsg...");
    });
}

function leaveme(gid, email){
    var request = $.ajax({
        url: "<?php echo site_url("chat/leaveConversation"); ?>",
        method: "POST",
        data: { gid : gid, email : email },
        dataType: "json"
    });
    request.done(function(res){
        if(res){
            location.reload();
        }
    });
    request.fail(function(e){
        console.log(e.responseText);
        console.log("Fail to leaveme...");
    });
}

function appendgroupname(id){
    var txtgn =  $('#txtgroupname'+id).val();
    if(txtgn == "") {
        txtgn = "New Group";
        $('#txtgroupname'+id).val(txtgn);
    }
    var html = '<a onclick="startChat(this)" href="#" class="usr guser'+id+' tempusr" data-chat-page="<?php echo $this->uri->segment(1); ?>" data-chat-id="cha'+id+'" data-chat-dname="'+txtgn+'" data-chat-email="'+id+'" data-chat-img="group_message.png" data-chat-status="online"><i class="fa fa-circle-thin"></i> '+txtgn+'</a>';
    $('#group-contacts').append(html);
    $("a[data-chat-email="+id+"]").attr("data-chat-email",Date.now() + Math.floor((Math.random() * 10000) + 1));
}

function savenewname(id){
    var txtgn = $('#txtgroupname'+id).val();
    if(txtgn == "") {
        txtgn = "New Group";
        $('#txtgroupname'+id).val(txtgn);
    }
    var die = false;
    var allgrocon = $(".grocon");
    if(allgrocon.length>0){
        for(var ii = 0; ii< allgrocon.length; ii++){
            // console.log(allgrocon[ii]);
            if($(allgrocon[ii]).attr("data-chat-dname") == txtgn){
                die = true; break;
            }
        }
    }

    if(!die){
        $("a[data-chat-email="+id+"]").attr("data-chat-email",Date.now() + Math.floor((Math.random() * 10000) + 1));
    
        var request = $.ajax({
            url: "<?php echo site_url("chat/editGroupName"); ?>",
            method: "POST",
            data: {pid: id, GroupNameText: txtgn},
            dataType: "json"
        });

        request.done(function( rsp ) {
            if(rsp.result){
                $('.guser'+id).attr("data-chat-dname", txtgn);
                $('.guser'+id).html('<i class="fa fa-circle-thin"></i> '+txtgn+' <span id="newMsg_'+id+'" class=""></span>');
                $('#chat-title span').html(txtgn);
            }else{
                $('#chat-title span').html(txtgn);
            }
            $("#chat-wid #chat-title").attr("onclick","editgroupname('"+id+"')");
            // $(".chat-settings").show();
            editgroupmember(id);
            $("#select_project_chat_member").select2({width: '85%'}).focus(function () {
                $(this).select2('focus');
            });
        });
        request.fail(function(e){
            console.log(e.responseText);
            console.log("Fail to savenewname...");
        });
    }else{
        swal({
            title: "Opps!!!",
            text: "Group name already exists",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ok",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then(function(e){
            hideChat();
        });
    }
}


function deletegroup(gid){
    swal({
        title: "Are you sure?",
        text: "You want to delete this group permanently ???",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
    }).then(function(isConfirm){
        if (isConfirm) {
            $(".guser"+gid).hide();
            var request = $.ajax({
                url: "<?php echo site_url("chat/deleteGroup"); ?>",
                method: "POST",
                data: { gid : gid },
                dataType: "json"
            });
            request.done(function(res){
                if(res){
                    location.reload();
                }
            });
            request.fail(function(e){
                console.log(e.responseText);
                console.log("Fail to deletegroup...");
            });
            location.reload();
        }
    });

}

function editgroupmember(gid){
    if(! $(".select2-container").is(":visible")){
        $("img.editgroupmember").attr("src", "<?php echo base_url("asset/img/icons/Add Member2.png"); ?>");
        var request = $.ajax({
            url: "<?php echo site_url("chat/searchGroupMember"); ?>",
            method: "POST",
            data: {group_id: gid},
            dataType: "json"
        });
        request.done(function( rsp ) {
            $("#select_project_chat_member").select2({
                placeholder: "Create new group",
                width: '85%',
                closeOnSelect: false,
            });
            // $(".chat-settings").hide();
            if(rsp.result){
                // $(".updategroup").show();
                var elements = document.getElementById("select_project_chat_member").options;
                for(var i = 0; i < elements.length; i++){
                  elements[i].selected = false;
                }
                $.each(rsp.data, function (k, v) {
                    $('#select_project_chat_member option[value="' + v + '"]').prop("selected", "selected");
                });
                $("#select_project_chat_member").trigger("change", [true]);
            }
            else{
                $(".newgroup").show();
                var elements = document.getElementById("select_project_chat_member").options;
                for(var i = 0; i < elements.length; i++){
                  elements[i].selected = false;
                }
                $("#select_project_chat_member").trigger("change", [true]);
                $("#select_project_chat_member").select2("open");
            }
        });
        request.fail(function(e){
            console.log(e.responseText);
            console.log("Fail to editgroupmember...");
        });
    }else{
        $("img.editgroupmember").attr("src", "<?php echo base_url("asset/img/icons/Add Member.png"); ?>");
        cancelGroupUpdating();
        // swal("Problem","Line 810","success");
        // $("#chat-wid .select2-container").show();
        // $("#select_project_chat_member").select2("open");
    }
}

function printgroupmembers(gid){
    var request = $.ajax({
        url: "<?php echo site_url("chat/showGroupMembersName"); ?>",
        method: "POST",
        data: {group_id: gid},
        dataType: "json"
    });
    request.done(function( rsp ) {
        $('.project-member-name').html("");
        if(rsp.result){
            $.each(rsp.data, function (k, v) {
                $('.project-member-name').append(v.full_name+", ");
            });
        }
    });
    request.fail(function(e){
        $('.project-member-name').html("");
        console.log(e.responseText);
        console.log("Fail to printgroupmembers...");
    });
}



function add2todo(msg){
    var request = $.ajax({
        url: base_url+"todo/addTodoEntryHD",
        method: 'POST',
        data: {entry_name: msg,pid: 0},
        dataType: 'JSON'
    });
    request.done(function(response){
        swal("Completed", "Added to quick list successfully...", "success");
    });
    request.fail(function(response){
        console.log(response);
    });
}



$("#select_project_chat_member").on("select2:close", function (e){
    var id = $("#fid").val();
    if(($("#select_project_chat_member").val() != null)){
        if($('.guser'+id).length == 0)
            submitcreatenewgroup('new');
        else
            submitcreatenewgroup('group');
    }
});

function applySentenceCase(element, event) {
    var char = event.which || event.keyCode;
    var str = $(element).html();
    // if(char == 16){
    //     qtiptagbox(element);
    // }

    if(char == 32){
        var newStr = "";
        str = str.trim();
        str = str.replace(/\!\s/g,"##!. "); 
        str = str.replace(/\?\s/g,"##?. ");
        str = str.replace(/<br>/g,"##br. ");
        
        var listofstr = str.split(". ");
        var numberofline = listofstr.length;
        // console.log(numberofline);
        // 190 = .
        // 110 = .
        // 191 = ?
        // 32 = space
        if(char < 33 || char > 46){
            $.each(listofstr, function(k,txt){
                txt = txt.trim();
                /*if(txt.charAt(0) == " ")
                    newStr += txt.charAt(1).toUpperCase() + txt.substr(2).toLowerCase() + ". ";
                else
                    newStr += txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase() + ". ";*/
                if(numberofline == k+1){
                    if(txt.charAt(0) == " ")
                        newStr += txt.charAt(1).toUpperCase() + txt.substr(2) + ". ";
                    else
                        newStr += txt.charAt(0).toUpperCase() + txt.substr(1) + ". ";
                }else{
                    newStr += txt + ". ";
                }
                
            });
            newStr = newStr.substr(0, newStr.length-2);
            if(/\si&nbsp;/g.test(newStr))
                newStr = newStr.replace(/\si&nbsp;/g," I&nbsp;");
            else
                newStr = newStr.replace(/\si\s/g," I ");    
        
            var newStr = newStr.replace(/\##\?\./gm, "?");  
            var newStr = newStr.replace(/\##\!\./gm, "!");
            var newStr = newStr.replace(/\##br\. /gm, "<br>");
            
            $("#msg").html(newStr);
            var el = document.getElementById("msg");
            placeCaretAtEnd(el);
        }
    }
}


function placeCaretAtEnd(el) {
    el.focus();
    if (typeof window.getSelection != "undefined"
            && typeof document.createRange != "undefined") {
        var range = document.createRange();
        range.selectNodeContents(el);
        range.collapse(false);
        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(range);
    } else if (typeof document.body.createTextRange != "undefined") {
        var textRange = document.body.createTextRange();
        textRange.moveToElementText(el);
        textRange.collapse(false);
        textRange.select();
    }
}

function hasGroup(id, name){
    var request = $.ajax({
        url: "<?php echo site_url("chat/hasGroup"); ?>",
        type: "POST",
        data: {id: id, name: name},
        dataType: "JSON"
    });
    request.done(function(res){
        // console.log(res);
    });
    request.fail(function(response){
        console.log(response);
    });
}
function addupdategroupmember(id){
    // console.log(contacts);
    var request = $.ajax({
        url: "<?php echo site_url("chat/addupdategroupmember"); ?>",
        type: "POST",
        data: {id: id, contacts:contacts, mid: $("#mid").val()},
        dataType: "JSON"
    });
    request.done(function(res){
        console.log(res);
    });
    request.fail(function(response){
        console.log(response);
    });
}
// function expanChatdiv(){
//     $("#msg").css("min-height",70);
//     var heightOfChatbody = $("#chat-wid .widget-body").height();
//     // $("#chat-wid .widget-body").height(heightOfChatbody-68);
//     $(".chatEmo").css("top", 73);
//     $(".chatLightboxAttachment").css("top", 73);
//     $('.fixedContent').scrollTop($('#cstream').height());
// }
// function closeChatdiv(){
//     $("#msg").css("min-height",70);
//     var heightOfChatbody = $("#chat-wid .widget-body").height();
//     // $("#chat-wid .widget-body").height(heightOfChatbody+68);
//     $(".chatEmo").css("top", 4);
//     $(".chatLightboxAttachment").css("top", 4);
// }

function viewmorecon(e, str){
    var el = $("."+str);
    if($(e).text() == "View More"){
        $.each(el, function(k,v){
            $(v).removeClass("hidden");
        });
        $(e).text("View Less");
    }else{
        $.each(el, function(k,v){
            if(k > 4)
                $(v).addClass("hidden");
        });
        $(e).text("View More");
    }
}

// function returnthisname(v){
//     $("#msg").html($("#msg").html() + " " + v + ", ");
// }

// function qtiptagbox(element){
        
//         var qtc='';
//         $.each(contacts, function(k,v){
//             qtc += "<h4 class='unametaglist' onclick='returnthisname(\'"+v.full_name+"\')'>"+v.full_name+"</h4>";
//         });

//         $(element).qtip({
//             content: {
//                 text: qtc
//             },
//             show: {
//                 when:false,
//                 ready:true,
//             },
//             hide: 'click',
//             position: {
//                 at: 'top left',  
//                 my: 'left bottom', 
//             },
//             style: {
//                 classes: 'qtip-green',
//                 width: '300'
//             },

//         });
//     }


    function chattocreateproject(str){
        var request = $.ajax({
            url: base_url+"Projects/saveproject",
            method: 'POST',
            data: {pName: str,description: ''},
            dataType: 'JSON'
        });
        request.done(function(response){
            if(response.prioTask > 0){
                setCookie('project',response.prioTask,1);
                setCookie('ClickType','Comment',1);
                window.location.href = base_url+"projects";
            }
        });
        request.fail(function(response){
            console.log(response);
        });
    }

    function chattocreatetask(msgid, pid){
        var k = $.inArray(msgid, globalMsgArray);
        var str = allMsg[k];
        var request = $.ajax({
            url: base_url+"Projects/savePopTaskNew",
            method: 'POST',
            data: {taskName: str,pid: pid},
            dataType: 'JSON'
        });
        request.done(function(response){
            if(response.projecttaskid > 0){
                setCookie('project', pid,1);
                setCookie('ClickType','Comment',1);
                window.location.href = base_url+"projects";
            }
        });
        request.fail(function(response){
            console.log(response);
        });
    }

    function chattoevent(msgid){
        var k = $.inArray(msgid, globalMsgArray);
        var str = allMsg[k];
        if($(str).text() == "")
            calendarNewEntryModal(str);
        else
            calendarNewEntryModal($(str).text());
        // $("#calendar").fullCalendar( 'select', moment());
        // $("#entryname").val($(str).text());
        // setCookie('chateventname', str, 0.00003);
        // window.location.href = base_url+"calendar/calendarview";
    }

    function gotoslack(){
        // var request = require('request');
        // request.get('https://slack.com/api/channels.list', {
        //     json: true,
        //     qs: { token: #{"xoxp-214175186881-215808428951-219929650309-ca96d2965ea91c472d68814eb18e91d5"}, exclude_archived: 1 }
        // }, function(err, resp, body) {
        //         if (err) {
        //             return next(err);
        //         }
        //         if (body.ok) {
        //             next(null, body.channels);
        //         } else {
        //             next(new Error(body.error));
        //         }
        //     }
        // );


        var request = $.ajax({
            url: 'https://slack.com/api/users.list?token=xoxp-214175186881-215808428951-219929650309-ca96d2965ea91c472d68814eb18e91d5&pretty=1',
            dataType: 'JSON'
        });
        request.done(function(response){
            console.log(response);
        });
        request.fail(function(response){
            console.log(response);
        });
    }
</script>