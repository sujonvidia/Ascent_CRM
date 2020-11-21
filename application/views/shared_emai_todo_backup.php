<script type="text/javascript">
	function SendInvite(type,typeID,selector){
        // if($(".propDiv").is(":visible")){
        //    closePropDiv();
        // }
        // else {
            $(".cusmar").hide();
            $(".inviteClose").show();

            $("#propdyn").html('');
            $("#propdyn").append(inviteFunction(type,typeID,selector));
            $('.todoDiv').animate({width: '55%'});
            $('.propDiv').animate({width: '45%'}).show();
            $('.todo-info-row').css({"marginLeft": "-6%", "width": "120%"});
            $('.todo-info-row *').addClass('small-font-size');


            $(".emailsendtoname").hide();
            $(".emailbody").hide();
            $('#inviteeTextare').summernote({
                minHeight: 400,
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
                    ['insert', ['picture', 'link', 'table', 'hr']]
                ]
            });
        //}
    }


 

    function inviteFunction(type,typeID,selector){ 
        var inviteDiv  = '          <div  id="inviteeDiv" style="position: relative;    top: 55px;    color: black;"> <div >'; 
            inviteDiv += '              <fieldset>';
            inviteDiv += '              <form id="inviteShareForm" method="POST">';
            inviteDiv += '                  <i class="fa fa-share-alt hvr-glow clasI" aria-hidden="true" id="" style="position: absolute; left: 23px; top: -35px;" data-hasqtip="676" oldtitle="Share This Task" title="" aria-describedby="qtip-676"></i>';
            inviteDiv += '                  <span class="toptitle">'+$("#"+selector+typeID).text()+'</span>';
            inviteDiv += '                  <span class="email_send_message">Email send successfully...</span>';
            inviteDiv += '                  <input type="hidden" value="Shared '+type+' for '+$("#"+selector+typeID).text()+'" id="inviteTitle" name="inviteTitle">';
            inviteDiv += '                  <input type="hidden" value="'+$("#"+selector+typeID).text()+'" name="linkTitle">';
            inviteDiv += '                  <input type="hidden" id="shared_activity_id" name="activity_id" value="'+typeID+'">';
            inviteDiv += '                  <input type="hidden" id="shared_activity_type" name="activity_type" value="'+type+'">';
            inviteDiv += '                  <input type="hidden" id="emailsendtoname" name="emailsendtoname">';
            inviteDiv += '                  <span class="add_shared_email_btn" onClick="addInviteEmail()">Add Email <i class="fa fa-plus"></i></span>';
            inviteDiv += '                  <hr style="border-top: 1px dashed #CCC;">';
            // inviteDiv += '                  <div class="form-group">'; 
            // inviteDiv += '                      <label class="col-md-2 control-label inviteeTitle">Title :</label>';
            // inviteDiv += '                      <div class="col-md-12 marginbtn" id="animateTitle">';
            // inviteDiv += '                          <span class="inviteeTitle">Title :</span><span id="add_pencileINT"><img src="'+base_url+'asset/img/animate_pencil/pencil.gif" id="imghide" alt="img" width="15px" height="25px"></span><input class="form-control" type="text" value="Shared '+type+' for '+$("#tasktext"+typeID).text()+'" id="inviteTitle"><span class="highlight"></span><label>Title</label>';
            // inviteDiv += '                      </div>';
            // inviteDiv += '                  </div>';
            inviteDiv += '                  <div class="row inviteInputDiv">';
            // inviteDiv += '                      <label class="col-md-2 control-label inviteeLevel">Invitee Email :</label>';
            // inviteDiv += '                      <div class="col-md-12 marginbtn" id="animateInvitee">';
            // inviteDiv += '                          <span class="inviteeLevel">Invitee Email :</span>';
            // inviteDiv += '                          <span id="add_pencileIN"><img src="'+base_url+'asset/img/animate_pencil/pencil.gif" id="imghide" alt="img" width="15px" height="25px"></span>';
            // // inviteDiv += '                          <input class="form-control" type="text" id="inviteeEmail">';
            // inviteDiv += '                          <input id="inviteeEmail" type="text" class="tags form-control" value="" />';
            // inviteDiv += '                          <span class="highlight"></span>';
            // inviteDiv += '                          <span class="bar"></span>';
            // inviteDiv += '                          <label>Invitee Email</label>';
            // inviteDiv += '                      </div>';
            // inviteDiv += '                      <div class="col-lg-6 inviteFullNameDiv"></div>';
            // inviteDiv += '                      <div class="col-lg-6 inviteEmailDiv"></div>';
            inviteDiv += '                  </div>';
            inviteDiv += '                  <div class="form-group ">';
            inviteDiv += '                      <div class="marginbtn" id="animateTextarea">';
            // inviteDiv += '                          <span class="inviteeTextarea">Email Body :</span><span id="add_pencileINText"><img src="'+base_url+'asset/img/animate_pencil/pencil.gif" id="imghide" alt="img" width="15px" height="25px"></span>';
            inviteDiv += '                          <span><h4>Email Body :</h4></span>';
            inviteDiv += '                              <div id="inviteeTextare">';
            inviteDiv += '                                  <p class="emailsendtoname"></p>';
            inviteDiv += '                                  <p class="emailbody"><span class="inviteeName"><?php echo $username; ?></span> has assigned you for the following task in <span class="inviteeName">Navigate Connect App.</span>';
            inviteDiv += '                                  Please click the task link to accept the invitation and start working on the task.<br><br>';
            inviteDiv += '                                  <span class="Inviteetitle">'+$("#"+selector+typeID).text()+'</span>';
            inviteDiv += '                                  <br><br>To know more about Navigate Connect App, please click the below link.<br><br>';
            inviteDiv += '                                  <a href="#" class="AppName">About Navigate Connect App</a>';
            inviteDiv += '                                  <br><br>Please contact <?php echo $username.' (<span class="uname">'.$user_email.'</span>)'; ?> for any queries and concerns.<br><br>Thank you,<br><span class="deVName">Navigate Connect Team</span><br></p>';
            inviteDiv += '                              </div>';
            inviteDiv += '                              <span class="highlight"></span><label>Email Body</label>';
            inviteDiv += '                      </div>';
            inviteDiv += '                  </div>';
            inviteDiv += '                  <input type="hidden" name="emailbody" id="emailbody">';
            inviteDiv += '              </form>';         
            inviteDiv += '              </fieldset>';         
            inviteDiv += '          </div>'; 
            // inviteDiv += '          <div class="smart-form customTextarea">';
            // inviteDiv += '              <footer>';
            // inviteDiv += '                  <button type="button" class="btn btn-primary" onClick="shareWithOther()">';
            // inviteDiv += '                      Send';
            // inviteDiv += '                  </button>';
            // inviteDiv += '                  <button type="button" class="btn btn-default" onclick="closeInvite(this)">';
            // inviteDiv += '                      Cancel';
            // inviteDiv += '                  </button>';
            // inviteDiv += '              </footer>';
            // inviteDiv += '          </div></div>';         
             
        
        return inviteDiv;        
    }

    function addInviteEmail(){
        var rownumber = $(".rownumber").length;
        if($("#rownumber"+rownumber+" .rownumber").val() != "" && $("#rownumber"+rownumber+" .rownumberemail").val() != ""){
            rownumber = rownumber + 1;
            var html  = '<div class="col-lg-12" id="rownumber'+rownumber+'" onmouseover="showDeleteBtn()">';
                html += '<div class="col-lg-6">';
                html += '<input name="inviteFullName[]" type="text" class="form-control rownumber" style="margin-bottom:10px;" placeholder="Enter Name" />';
                html += '</div>';
                html += '<div class="col-lg-6">';
                html += '<input name="inviteEmail[]" type="email" required class="form-control rownumberemail" style="margin-bottom:10px;" onkeyup="addNewRow(event)" onblur="salutation_print()" placeholder="Enter Email Address" />';
                html += '</div>';
                html += '<i class="fa fa-close" onClick="removeThisRow('+rownumber+')"></i>';
                html += '</div>';
            $(".inviteInputDiv").append(html);
            $("#rownumber"+rownumber+" .rownumber").focus();
        }
        else{
            swal("Alert","Please fill the name and email address, then add new field","warning");
        }
    }

    function removeThisRow(id){
        $("#rownumber"+id).remove();
        salutation_print();
    }

    function addNewRow(event){
        if(event.keyCode == 13){
            salutation_print();
            addInviteEmail();
        }
    }

    function salutation_print(){
        var html_title = "Hello ";
        var allrows = $("div[id^=rownumber]");
        $.each(allrows, function(k,v){
            var id = ($(v).attr("id")).substr(9);
            html_title += $("#rownumber"+id+" .rownumber").val() + ", ";
        });
        $(".emailsendtoname").html(html_title);
        if($(".rownumber").length >0){
            $(".emailsendtoname").show();
            $(".emailbody").show();
        }else{
            $(".emailsendtoname").hide();
            $(".emailbody").hide();
        }
    }

	function shareWithOther(){
        $(".emailsendtoname").remove();
        $("#emailbody").val($('#inviteeTextare').summernote('code'));
        $.ajax({
            url: base_url+"guest_users/shareWithOther",
            type: "POST",
            data: $('#inviteShareForm').serialize(),
            dataType: "JSON",
            success: function(res){
                $(".email_send_message").show();
            }
        });
    }

    function qtipSharedBox(element, aid){
        
        if($(element).qtip('api') == undefined){
            
            $(element).qtip({
                
                show: {
                    //event: 'click',
                    ready:true,
                    solo: true,
                },
                hide: {
                    event: 'click mouseleave',
                    
                },
                
                content: {text: 'Loading...' },
                
                position: {
                    at: 'bottom center',  
                    my: 'top center', 
                    viewport: $(window),
                    // adjust: {
                    //         method: 'none shift'
                    //     },
                    
                },
                style: {
                    classes: 'qtip-light qtip-rounded qtip-font',
                    //width: '300'
                },
                
                events: {
                    hide: function (event, api) {
                        
                        $(this).qtip('destroy');
                        $( 'body').unbind( "keydown.qtipTaskByUser" );
                    
                    },
                    show: function(event, api) {
                    
                        var requestass = $.ajax({
                            url: base_url+"guest_users/getSharedUserList",
                            method: 'POST',
                            data: {
                                "aid": aid
                            },
                            dataType: 'JSON'
                        });
                        
                        requestass.done(function(response){
                            var html = "";
                            if(response.status){
                                html+='<div style="padding:10px">'
                                $.each(response.all_activity_share_list, function(k,v){
                                html+='<h3 style="padding:3px;font-size:14px">'+v.full_name+'</h3>';
                                });
                                html+='</div>';
                            }else{
                                html+='<div style="padding:10px">'
                                html+='<h4>No Data Found</h4>';
                                html+='</div>';
                            }
                            api.set('content.text', html);
                        });
                    
                    },
                    render:function(event,api){
                        $('body').on('keydown.qtipTaskByUser', function(event) {
                            if(event.keyCode === 27) {
                                api.hide(event);
                            }
                        });
                    }
                    
                    
                }
            });
        }
    }

    function qtipSharedOnclick(type, aid, selector){
        // alert("Type = "+type+"<br>ID = "+aid+"<br>Selector = "+selector);  
        SendInvite(type, aid, selector);
        $(".emailsendtoname").show();
        $(".emailbody").show();
        $.ajax({
            url: base_url+"guest_users/findNsetShareList",
            type: "POST",
            data: {aid: aid},
            dataType: "JSON",
            success: function(res){
                $.each(res.old_share_list, function(k,v){
                    var rownumber = $(".rownumber").length;
                    $("#rownumber"+rownumber+" .rownumber").val(v.full_name);
                    $("#rownumber"+rownumber+" .rownumberemail").val(v.email);
                    //addInviteEmail();
                });
                salutation_print();
            },
            error: function(e){
                console.log(e);
            }
        });
    }
    // function qtipSharedOnclick(type, aid, selector){
    //     // alert("Type = "+type+"<br>ID = "+aid+"<br>Selector = "+selector);  
    //     SendInvite(type, aid, selector);
    //     $(".emailtitle").show();
    //     $(".emailbody").show();
    //     $.ajax({
    //         url: base_url+"projects/findNsetShareList",
    //         type: "POST",
    //         data: {aid: aid},
    //         dataType: "JSON",
    //         success: function(res){
    //             $.each(res.old_share_list, function(k,v){
    //                 addInviteEmail();
    //                 var rownumber = $(".rownumber").length;
    //                 $("#rownumber"+rownumber+" .rownumber").val(v.full_name);
    //                 $("#rownumber"+rownumber+" .rownumberemail").val(v.email);
    //             });
    //             salutation_print();
    //         },
    //         error: function(e){
    //             console.log(e);
    //         }
    //     });
    // }
</script>