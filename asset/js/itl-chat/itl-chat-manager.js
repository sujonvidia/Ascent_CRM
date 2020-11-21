
var globalMsgArray = [];
var allMsg = [];

function chatboxShow(d, a){
    $(".chatLightboxAttachment").attr("href", base_url+"chat/openfile");
    if($.isNumeric(a.email)){
        if(a.email > 99999999 && a.email < 1400000000){
            hasGroup(a.email, a.display_name);
            $(".chatLightboxAttachment").attr("href", base_url+"projects/comattach/Project/"+(a.email - 99999999)+"/ProjectsFiles");
        }
        else if(a.email > 99900000 && a.email < 1400000000){
            addupdategroupmember(a.email);
        }
    }
    
    // if($("#feed-wid").css("display") == "block")
    //     $("#feed-wid").hide();
    
    if(a.status == "online")
        $("#chat-wid .widget-icon").addClass("ionline");
    else
        $("#chat-wid .widget-icon").removeClass("ionline");
    
    $("#fimg").val(a.img);
    $("#chat-wid #chat-title span").html(a.display_name);
    $("#chat-wid #fid").val(a.email);

    $("#fmobile").val(a.mobile)
    $(".editgroupmember").attr("onclick", "editgroupmember('"+a.email+"')");

    if($.isNumeric(a.email)) {
        $("#chat-title").css("font-size", "18px");
        $(".menu-group-setting").show();
        // Group settings menue
        $(".leaveme").attr("onclick", "leaveme("+a.email+", '"+$("#mid").val()+"')");
        $(".editgroupname").attr("onclick", "editgroupname("+a.email+")");
        $(".edit-title").css("display", "");
        
        if(a.display_name == "Everyone"){
            $(".edit-title").hide();
            $("#chat-wid #chat-title").attr("onclick", "");
            $(".editgroupmember").attr("onclick", "");
            $(".editgroupname").attr("onclick", "");
            $(".leaveme").attr("onclick", "");
            $(".deletegroup").attr("onclick", "");
            $(".blockuser").attr("onclick", "");
        }
        else
            $("#chat-wid #chat-title").attr("onclick","editgroupname('"+a.email+"')");
        // $(".editgroupmember").trigger("click");
        $(".deletegroup").attr("onclick", "deletegroup("+a.email+")");
        $('.project-member-name').show();
        
    }
    else{
        $("#chat-title").css("font-size", "20px");
        $('.project-member-name').hide();
        $(".menu-group-setting").hide();
        $(".edit-title").hide();
        $.each(blockuser_list, function(k,v){
            if(v.mid == a.email || v.fid == a.email){
                if(v.mid == $("#mid").val()) {
                    do_block("Unblock","no-drop","This user already block");
                    return false;
                }
                else if(v.mid == a.email) {
                    do_block("Block","no-drop",a.display_name+" blocked you.");
                    return false;
                }
            }
            else{
                do_block("Block","pointer","");
            }
        });
    }



    if(d == "newGroup"){
        $("#fcrm_id").val(a.email);
        cancelGroupUpdating();
    }else{
        var fcrm_id = d.substr(3);
        $("#fcrm_id").val(fcrm_id);
        cancelGroupUpdating();
        // Chat settings buttons
        $(".selectmsg").attr("onclick", "selectmsg()");
    }
    if(a.chat_type){
        $(".deletegroup").hide();
        $(".leaveme").hide();
        $(".menu-group-setting.editgroupname").hide();
        $(".menu-group-setting.editgroupmember").hide();
        $("#chat-title").addClass("prochathead");
        $("#chat-title").attr("onclick", "goPro("+(a.email - 99999999)+",'"+a.display_name+"')");
        $(".edit-title").css("color","#999");
    }else{
        $(".edit-title").css("color","#000");
        $("#chat-title").removeClass("prochathead");
    }
}

function do_block(t,c,a){
    $(".blockuser").html(t);
    $("#messenger-fset .fa-smile-o").css("cursor", c);
    $("#messenger-fset .fa-paperclip").css("cursor", c);
    
    if(t == "Unblock"){
        $("#msg").removeAttr("contenteditable");
        if(a != "") swal("Confirm Notice", a, "warning");
    }
    else{
        $("#msg").attr("contenteditable", true);
        if(a != "") swal("Confirm Notice", a, "success");
    }
    
}

function expandChat(){
    $('.exp_col_ChatBtn').attr("onclick","collaspeChat()");
    $('.exp_col_ChatBtn').attr("title","Collaspe Chat");
    $('.exp_col_ChatBtn').html('<i class="fa fa-rotate-135 fa-long-arrow-right"></i>');
    var width = $("#chat-wid").outerWidth();
    $("#chat-wid").css("width", (width * 2));
    $(".chat-settings").attr("title", "Chat Settings");
    // swal("expandChat",(width * 2),"success");
}

function collaspeChat(){
    $('.exp_col_ChatBtn').attr("onclick","expandChat()");
    $('.exp_col_ChatBtn').attr("title","Expan Chat");
    $('.exp_col_ChatBtn').html('<i class="fa fa-rotate-45 fa-long-arrow-right" aria-hidden="true"></i>');
    var width = $("#chat-wid").outerWidth();
    $("#chat-wid").css("width", (width / 2));
    $(".chat-settings").attr("title", "Chat Settings");
    // swal("expandChat",(width / 2),"success");
}

function hideChat(){
    $(".select2-dropdown").hide();$("#chat-wid .select2-container").hide();
    $(".close").trigger("click");
    $("#chat-wid").attr("class","alert alert-success fade in feed chat-slide-out");
    $(".chat-wid-back").hide(function(){
        $("#chat-wid").hide();
        $("#chat-wid").attr("class","alert alert-success fade in feed chat-slide-in");
    });
    if($(".projectListDiv").length>0){
        $("#wid-id-4").show();
        $(".projectListDiv").css("background", "#5d5c5c");
    }
    // if($("#feed-wid").css("display") != "block" && $("#myprojectList").css("display") == "block")
    //     $("#feed-wid").show();
}

function selectmsg(){
    if($("input[id^=msgid]").css("display") == "block"){
        $("input[id^=msgid]").hide();
        $("input[id^=msgid]").attr('checked', false);
        $(".selectmsgdiv").hide();
        $("#messenger").show();
    }else{
        $("input[id^=msgid]").show();
        $("input[id^=msgid]").attr('checked', false);

        $("#messenger").hide();
        $("#noofselected").text("0");
        $(".selectmsgdiv").show();
    }
}

$("div").delegate(".dropdown input[type='checkbox']", "click", function(e){
    e.stopImmediatePropagation();
    $("#noofselected").html($(".dropdown input[type='checkbox']:checked").length);
});

function singlemsgaction(msgid, action){
    $("#msgid"+msgid).show();
    $("#msgid"+msgid)[0].checked = true;
    $("#msgid"+msgid).prop("checked", true);
    if(action == "star") starselected();
    else if(action == "like") likeselected();
    else if(action == "delete") deleteselected();
    else if(action == "forward") forwardselected();
    $("input[id^=msgid]").hide();
}


function forwardselected(){
    if($(".dropdown input[type='checkbox']:checked").length > 0){
        var design= '<div class="message-forward alert alert-success fade in">'+
                        '<button class="close" data-dismiss="alert">×</button>'+
                        // '<i class="fa-fw fa fa-info"></i>'+
                        '<strong>Message Forward to</strong>';
        $.each(contacts, function(k,v){
            design += '<p onclick="forwardmsg(\''+v.email+'\', \''+v.full_name+'\', \''+v.img+'\')">';
            design += '<img src="'+imgurl+v.img+'" width=30px height=30px>';
            design += v.full_name+'</p>';
        });
        design +=   '</div>';
        $("body").append(design);
    }
    else{
        swal("Error Notice", "No message selected for forward", "error");
    }
}

function drawDate(time){
    var ltime = moment(time).calendar().split(" at");
    var design= '<div class="panel panel-default directchat">'+
                    '<div class="panel-body dateGroup">';
                        if(ltime.length>1)
                            design += ltime[0];
                        else
                            design += moment(time).format("LL");
                    design += '</div>'+
                '</div>';
    $("#cstream").append(design);
}

function drawSendMsg(time, msg, msgid, msgtype, msglike, msg_status){
    var img = base_url+"asset/img/avatars/"+$("#myimg").val();
    var myname = $("#myname").val();
    if(msgtype == "fa-star")
        var display_value = "display:block";
    else
        var display_value = "";
    if(msglike == "fa-thumbs-up")
        var display_like = "display:block";
    else
        var display_like = "";
    var design= '<div id="msgdivid'+msgid+'" class="panel panel-default directchat msgt-'+msgtype+' msgt-'+msglike+'">'+
                    '<img src="'+img+'" alt="img" class="chatimg chatimgright">'+
                    '<div class="boxdiv boxdivright">'+
                        '<div class="chat-right-settings">'+
                            '<div class="name dropdown"><b></b>'+
                                '<i class="fa fa-trash pull-right blurtohide" onclick="singlemsgaction('+msgid+', \'delete\')" title="Delete"></i>'+
                                '<a data-toggle="dropdown" class="dropdown-toggle" title="Settings"><i class="fa fa-th-list pull-right blurtohide" title="Add to"></i></a>'+
                                '<ul class="dropdown-menu pull-right cute'+msgid+'">'+
                                    '<div class="arrow-top-right"></div>'+
                                    '<li><a onclick="sendtodo(\''+msgid+'\', 1)">Quick List</a></li>'+
                                    '<li><a onclick="chattoevent(\''+msgid+'\')">Event</a></li>'+
                                    // '<li><a onclick="sendtodo(\''+msgid+'\', 2)">Project</a></li>'+
                                    '<li class="dropdown-submenu"><a >Project</a>'+
                                        '<ul class="dropdown-menu asdfasdf" style="margin-left: -300px;top:-35px;max-width:200px;">';
                                            $.each(jspchat, function(pk,pv){
                                                design+= '<li><a onclick="chattocreatetask(\''+msgid+'\', \''+pv.Id+'\')" title="'+pv.Title+'" style="overflow:hidden;white-space: nowrap;text-overflow: ellipsis;">'+pv.Title+'</a></li>';
                                            });
        design +=                       '</ul>'+
                                    '</li>'+
                                '</ul>'+
                                '<i class="fa fa-share pull-right blurtohide" onclick="singlemsgaction('+msgid+', \'forward\')" title="Forward"></i>'+
                                '<i class="fa '+msglike+' pull-right blurtohide" id="likeico'+msgid+'" onclick="changelikelinktext('+msgid+')" style="'+display_like+'"></i>'+
                                '<i class="fa '+msgtype+' pull-right blurtohide" id="starico'+msgid+'" onclick="changestarlinktext('+msgid+')" style="'+display_value+'"></i>'+
                                '<input type="checkbox" class="pull-right" id="msgid'+msgid+'" name="msgid" value="'+msgid+'">'+
                            '</div>'+
                        '</div>'+
                        '<div class="msgcon"><b>'+myname+ "</b> @ " + moment(time).format("hh:mmA") + '&nbsp;' +
                        '<br>'+messagedraw(msg)+'</div>'+
                    '</div>'+
                '</div>';
    $("#cstream").append(design);
}

function drawReceiveMsg(time, msg, msgid, fname, guserimg, gusername, msgtype, msglike, status){
    if (typeof guserimg === 'undefined' || !guserimg){
        var img = base_url+"asset/img/avatars/"+$("#fimg").val();
    }else{
        var img = base_url+"asset/img/avatars/"+guserimg;
        fname = gusername;
    }
    if(msgtype == "fa-star")
        var display_value = "display:block";
    else
        var display_value = "";
    if(msglike == "fa-thumbs-up")
        var display_like = "display:block";
    else
        var display_like = "";
    var design= '<div id="msgdivid'+msgid+'" class="panel panel-default directchat msgt-'+msgtype+' msgt-'+msglike+'">'+
                    '<img src="'+img+'" alt="img" class="chatimg chatimgright">'+
                    '<div class="boxdiv boxdivright">'+
                        '<div class="chat-right-settings">'+
                            '<div class="name dropdown"><b></b>'+
                                
                                '<i class="fa fa-trash pull-right blurtohide" onclick="singlemsgaction('+msgid+', \'delete\')" title="Delete"></i>'+
                                '<a data-toggle="dropdown" class="dropdown-toggle" title="Settings"><i class="fa fa-th-list pull-right blurtohide" title="Add to"></i></a>'+
                                '<ul class="dropdown-menu pull-right cute'+msgid+'">'+
                                    '<div class="arrow-top-right"></div>'+
                                    '<li><a onclick="sendtodo(\''+msgid+'\', 1)">Quick List</a></li>'+
                                    '<li><a onclick="chattoevent(\''+msgid+'\')">Event</a></li>'+
                                    // '<li><a onclick="sendtodo(\''+msgid+'\', 2)">Project</a></li>'+
                                    '<li class="dropdown-submenu"><a class="">Project</a>'+
                                        '<ul class="dropdown-menu asdfasdf" style="margin-left: -300px;top:-35px;max-width:200px;">';
                                            $.each(jspchat, function(pk,pv){
                                                design+= '<li><a onclick="chattocreatetask(\''+msgid+'\', \''+pv.Id+'\')" title="'+pv.Title+'" style="overflow:hidden;white-space: nowrap;text-overflow: ellipsis;">'+pv.Title+'</a></li>';
                                            });
        design +=                       '</ul>'+
                                    '</li>'+
                                '</ul>'+
                                '<i class="fa fa-share pull-right blurtohide" onclick="singlemsgaction('+msgid+', \'forward\')" title="Forward"></i>'+
                                '<i class="fa '+msglike+' pull-right blurtohide" id="likeico'+msgid+'" onclick="changelikelinktext('+msgid+')" style="'+display_like+'"></i>'+
                                '<i class="fa '+msgtype+' pull-right blurtohide" id="starico'+msgid+'" onclick="changestarlinktext('+msgid+')" style="'+display_value+'"></i>'+
                                '<input type="checkbox" class="pull-right" id="msgid'+msgid+'" name="msgid" value="'+msgid+'">'+
                            '</div>'+
                        '</div>'+
                        '<div class="msgcon"><b>'+fname+ "</b> @ " + moment(time).format("hh:mmA") +'&nbsp;'+
                        '<br>'+messagedraw(msg)+'</div>'+
                    '</div>'+
                '</div>';
    $("#cstream").append(design);
}

function sendEmo(emoImg){
    var path = base_url+"asset/emotion";
    var fulPathEmoImg = '<img class="emo" alt="' + emoImg + '" src="' + path + "/" + emoImg + '" style="width:22px; height:22px;" />';
    // if($("#msg").html() == "Type a message...")
    //     $("#msg").html(fulPathEmoImg);
    // else
    //     $("#msg").html($("#msg").html() + fulPathEmoImg);
    $('#msg').summernote('editor.insertImage', path + "/" + emoImg);
    $("#emojidiv").hide();
}

/*function sendEmo(emoImg){
    var emotionImgSymble = [":)", ":D", ":(", ":'(", ":p", ":o", ":@", ":s", ";)", ":$", ":|", "+o(", ":-#", "|-)", "8-)", ":\\", ":--)", "8-|", "8o|", "(A)", "(bye)", "(clap)", "({)", "(})", "(Y)", "(N)", "(hi5)", "<3", "(U)", "(tv)", "(mail)", "(rain)", "(pi)", "(C)", "(comp)", "(B)", "(D)", "(@)", "(&)", "(#)", "(*)", "(O)", "(G)", "(mp)", "-8", "(Z)", "(X)", "(^)", "(car)"];
    var emotionName = ["smile.png", "smile-big.png", "sad.png", "crying.png", "tongue.png", "shock.png", "angry.png", "confused.png", "wink.png", "embarrassed.png", "disapointed.png", "sick.png", "shut-mouth.png", "sleepy.png", "eyeroll.png", "thinking.png", "lying.png", "glasses-nerdy.png", "teeth.png", "angel.png", "bye.png", "clap.png", "hug-left.png", "hug-right.png", "good.png", "bad.png", "highfive.png", "love.png", "love-over.png", "tv.png", "mail.png", "rain.png", "pizza.png", "coffee.png", "computer.png", "beer.png", "drink.png", "cat.png", "dog.png", "sun.png", "star.png", "clock.png", "present.png", "mobile.png", "musical-note.png", "boy.png", "girl.png", "cake.png", "car.png"];
    var getpos = emotionName.indexOf(emoImg);
    var res = emotionImgSymble[getpos];
    $("#msg").html($("#msg").html() + res);
    $("#msg").focus();
}*/


function editgroupname(id){
    $("#chat-wid #chat-title").attr("onclick","");
    var gnt = $.trim($("#chat-title span").text()); // group name text = gnt
    if(gnt == "New Group") gnt = "";
    var design = '<div class="input-group input-group-sm">'+
                '<input type="text" style="width:300px;max-width: 70%;border-radius:6px !important;margin-top:0px;font-size:18px;height:30px;" onkeyup="savethisnamebykey(event, '+id+')" onblur="savethisnamebyblur('+id+')" id="txtgroupname'+id+'" value="'+gnt+'" class="form-control">'+
                // '<span class="input-group-btn">'+
                // '<button onclick="savenewname('+id+')" class="btn btn-info btn-flat" type="button" style="margin:0px;">Go!</button>'+
                // '</span>'+
                '</div>';
    $("#chat-title span").html(design);
    $('#txtgroupname'+id).focus();
}

function savethisnamebykey(event, id){
    var char = event.which || event.keyCode;
    if(char == 13){
        // Append the group name temporarily
        // if($('.guser'+id).length == 0){
        //     appendgroupname(id);
        // }
        $('#txtgroupname'+id).blur();
        savenewname(id);
    }
}

function savethisnamebyblur(id){
    // Append the group name temporarily
    // if($('.guser'+id).length == 0){
    //     appendgroupname(id);
    // }
    savenewname(id);
}


function cancelGroupUpdating(){
    $("#chat-wid .select2-container").hide();
    $(".newgroup").hide();
    $(".updategroup").hide();
    // $(".chat-settings").show();
}

function changestarlinktext(id){
    if($("#starico"+id).hasClass("fa-star"))
        $("#starico"+id).css("display","");
    else
        $("#starico"+id).css("display","block");
    singlemsgaction(id,'star');
}

function changelikelinktext(id){
    if($("#likeico"+id).hasClass("fa-thumbs-up"))
        $("#likeico"+id).css("display","");
    else
        $("#likeico"+id).css("display","block");
    singlemsgaction(id,'like');
}

function toggle_inside_chat(div, e){
    if(div == 'star'){
        if($(e).html() == "View Star Message"){
            $(".msgt-fa-star-o").hide();
            $(e).html("View All Message");
        }
        else if($(e).html() == "View All Message"){
            $(".msgt-fa-star-o").show();
            $(e).html("View Star Message");
        }
        $('.fixedContent').scrollTop($('#cstream').height());
    }
}

function hasNewMsg(){
    if($("#chat-wid").css("display") == "block"){
        searchNewMsg($("#mid").val(),$("#fid").val(),$("#chat-title span").text());
        seenSendMsg(sendNowId);
    }
}

setInterval(function(){
    hasNewMsg();
}, 1000);

setInterval(function(){
    is_online();
    newMsgNotify();
}, 5000);

// setInterval(function(){
//     $(".status-new").removeClass("status-new");
// }, 10000);

function startChat(event) {
    var c = $(event),
        d = c.attr("data-chat-id"),
        e = c.attr("data-chat-dname"),
        f = c.attr("data-chat-email"),
        m = c.attr("data-chat-mobile"),
        g = c.attr("data-chat-status") || "online",
        h = c.attr("data-chat-alertmsg"),
        i = c.attr("data-chat-alertshow") || !1,
        j = c.attr("data-chat-img") || "male.png",
        k = c.attr("data-chat-page");

    if($("#chat-wid").css("display") == "block" && f == $("#fid").val()){
        hideChat();
    }else{
        chatboxShow(d, {
            "title": "username" + d,
            "display_name": e,
            "email": f,
            "mobile": m,
            "status": g,
            "alertmsg": h,
            "alertshow": i,
            "img": j,
            "page" : k,
            "chat_type": $(c).hasClass("procon")
        });
        $("#cstream").html("");
        globalMsgArray = [];
        allMsg = [];
        searchMsg($("#mid").val(), f, e, k);
    }
}

/* Call to Emotion popover */
$(function(){
    $('[rel="popover"]').popover({
        container: 'body',
        html: true,
        content: function () {
            var clone = $($(this).data('popover-content')).clone(true).removeClass('hide');
            return clone;
        }
    }).click(function(e) {
        e.preventDefault();
    });

    is_online();
});
$(document).on("click", ".popover", function(e) {
    if($(e.target).hasClass("chatemopopx")){
        $('[rel="popover"]').trigger("click");
    }else{
        e.stopPropagation();
    }
});
function messagedraw(msg){
    if(checkEmo(msg)) {
        // console.log(msg);
        return msg;
    } else if(isUrlValid(msg)) {
        if(checkImgURL(msg)){
            return '<a href="'+msg+'" target="_blank" style="font-size: 70px;vertical-align: top;"><img src="'+msg+'" style="vertical-align: top;width:120px;height:100px;border-radius: 0px;"></a>';
        } else if(checkPdfURL(msg)){
            return '<a href="'+msg+'" target="_blank" style="font-size: 70px;vertical-align: top;"><img src="'+base_url+'asset/img/pdf.png" style="vertical-align: top;width:80px;height:75px;border-radius: 10px;"></a>';
        } else if(checkXlsURL(msg)){
            return '<a href="'+msg+'" target="_blank" style="font-size: 70px;vertical-align: top;"><img src="'+base_url+'asset/img/xls.png" style="vertical-align: top;width:80px;height:75px;border-radius: 10px;"></a>';
        } else if(checkDocURL(msg)){
            return '<a href="'+msg+'" target="_blank" style="font-size: 70px;vertical-align: top;"><img src="'+base_url+'asset/img/doc.png" style="vertical-align: top;width:80px;height:75px;border-radius: 10px;"></a>';
        } 
        else {
            // var msglist = msg.split("&nbsp;");
            // var newmsg = "";
            // $.each(msglist, function(k,v){
            //     if(isUrlValid(v)){
            //         var morefiltar = v.split(" ");
            //         $.each(morefiltar, function(kk,vv){
            //             if(isUrlValid(vv)){
            //                 newmsg += "<a href='"+vv+"' target='_blank'>"+vv+"</a> ";
            //             }
            //             else{
            //                 newmsg += vv+" ";
            //             }
            //         });
            //     }else{
            //         newmsg += v + " ";
            //     }
            // });
            // return newmsg;
            return msg.replace('a href', 'a target="_blank" href');
        }
    } else if(msg.indexOf("afd06959fc6d01175318aded40cb00df") != -1){
        return "Missed call !!!";
    } else {
        return msg;
    }
}

function isUrlValid(url) {
    var patt = new RegExp("http://|https://|ftp://");
    return patt.test(url);
}
function checkTxtFile(url) {
    return(url.match(/\.(txt|TXT)$/) != null);
}
function checkImgURL(url) {
    return(url.match(/\.(jpeg|JPEG|jpg|JPG|gif|GIF|png|PNG|bmp|BMP)$/) != null);
}

function checkPdfURL(url) {
    return(url.match(/\.(pdf)$/) != null);
}

function checkXlsURL(url) {
    return(url.match(/\.(xls|xlsx)$/) != null);
}
function checkDocURL(url) {
    return(url.match(/\.(doc|docx)$/) != null);
}
function checkEmo(str){
    return (str.match(/\/asset\/emotion\//g) != null);
}

function sendtodo(msgid, type){
    var k = $.inArray(msgid, globalMsgArray);
    if(type == 1)
        add2todo(allMsg[k]);
    else if(type == 2)
        chattocreateproject(allMsg[k]);
}
 
function searchthismsg(e){
    var str = $(e).val();
    str = str.trim().toLowerCase();
    $.each(allMsg, function(k,v){
        v = v.trim().toLowerCase();
        var id = globalMsgArray[k];
        if(v.indexOf(str) == -1){
            $("#msgdivid"+id).hide();
        }else{
            $("#msgdivid"+id).show();
        }
    });
}

$('.dropdown-submenu a.mute').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
});

function openme(id){
    $("#cute"+id).show();
    $(".asdfasdf").show();
}

$('#msg').on('keydown', function(event) {
    if (event.keyCode == 13)
        if (!event.shiftKey) $('#messenger').submit();
});