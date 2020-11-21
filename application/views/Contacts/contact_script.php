<style type="text/css">
    .dd-menu-contact{
        position: absolute;
    top: 30px;
    }
    .nopad-contacts{
        padding: 0px !important;

    }
    .contentdiv_contact{
        height: 542px;
            overflow-y: auto;
            overflow-x: hidden;
    }
    .frm-contacts button{
        margin: 5px;
    }

    .frm-contacts label , .frm-contacts .control-label{
        text-align: left ;
        color:black;
    }
    .frm-contacts .form-group{
        margin-bottom: 5px;
    }

    .frm-contacts #contactmenu1 .control-label,.frm-contacts #contactmenu1 .control-select{

        width: 22%;
    }
    .frm-contacts #contactmenu1 .rowcg1 .control-label{

        width: 29%;
    }

    .frm-contacts #contactmenu2 .control-label,.frm-contacts #contactmenu2 .control-select{

        width: 38%;
    }
    
    .frm-contacts .nav>li>a{
        padding: 3px;
    }

    #imageUpload
    {
        display: none;
    }

    #profileImage
    {
        cursor: pointer;
    }

    #profile-container {
        width: 140px;
        height: 140px;
        overflow: hidden;
      
    }

    #profile-container img {
        width: 100%;
        height: 100%;
    }
    .contact-section-top{
        margin-top: 5px;
        margin-bottom: 5px;
    }

    #tbl_contacts_load{
        table-layout:fixed;
        color: black;
       

    }
    #tbl_contacts_load td{
        text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;

    }

</style>
<script type="text/javascript">
    // init

   function initContactsJS(data=false){

        js_contact_id=data ? data.Id : 0;
        js_contacttypeid=data ? data.ContactTypeId : 0;

        js_newcon_fullname= data ? data.FullName : '';
        js_newcon_company= data ? data.Company :'';
        js_newcon_jobtitle= data ? data.JobTitle :'';
        js_newcon_imageurl= data ? data.ContactPic :'';

        js_newaddr_business= data ? data.Address_Business :'';
        js_newaddr_home= data ? data.Address_Home :'';
        js_newaddr_other= data ? data.Address_Other :'';
        js_newaddr_mailing= data ? data.Address_Mailing :'';

        js_newcon_email=data ? data.Email :'';
        js_newcon_email2=data ? data.Email2 :'';
        js_newcon_email3=data ? data.Email3 :'';

        js_newphn_assistant=data ? data.Number_Assistant :'';
        js_newphn_business=data ? data.Number_Business :'';
        js_newphn_business2=data ? data.Number_Business2 :'';
        js_newphn_businessfax=data ? data.Number_BusinessFax :'';
        js_newphn_callback=data ? data.Number_Callback :'';
        js_newphn_car=data ? data.Number_Car :'';
        js_newphn_company=data ? data.Number_Company :'';
        js_newphn_home=data ? data.Number_Home :'';
        js_newphn_home2=data ? data.Number_Home2 :'';
        js_newphn_homefax=data ? data.Number_HomeFax :'';
        js_newphn_isdn=data ? data.Number_ISDN :'';
        js_newphn_mobile=data ? data.Number_Mobile :'';
        js_newphn_other=data ? data.Number_Other :'';
        js_newphn_otherfax=data ? data.Number_OtherFax :'';
        js_newphn_pager=data ? data.Number_Pager :'';
        js_newphn_primary=data ? data.Number_Primary :'';
        js_newphn_radio=data ? data.Number_Radio :'';
        js_newphn_telex=data ? data.Number_Telex :'';
        js_newphn_ttytdd=data ? data.Number_TTYTDD :'';

        js_details_department=data ? data.Details_Department :'';
        js_details_office=data ? data.Details_Office :'';
        js_details_profession=data ? data.Details_Profession :'';
        js_details_managersname=data ? data.Details_ManagersName :'';
        js_details_assistantsname=data ? data.Details_AssistantsName :'';
        js_details_nickname=data ? data.Details_Nickname :'';
        js_details_title=data ? data.Details_Title :'';
        js_details_suffix=data ? data.Details_Suffix :'';
        js_details_spouse=data ? data.Details_Spouse :'';


    }
    
    

    function saveContactEmails(element){

        switch($('#newcon_email_opts').val()){
            case 'E-mail':
            js_newcon_email=$(element).val();

            break;
            case 'E-mail 2':
            js_newcon_email2=$(element).val();
            break;
            case 'E-mail 3':
            js_newcon_email3=$(element).val();
            break;

        }
        

    }

    function updateContactEmails(){
        switch($('#newcon_email_opts').val()){
            case 'E-mail':
            $('#newcon_email_val').val(js_newcon_email);
            break;
            case 'E-mail 2':
            $('#newcon_email_val').val(js_newcon_email2);
            break;
            case 'E-mail 3':
            $('#newcon_email_val').val(js_newcon_email3);
            break;

        }
    }

    function changeContactEmails(){
        updateContactEmails();
        $('#newcon_email_val').focus();

    }

    function saveContactAddress(element){

        switch($('#newcon_addr_opts').val()){
            case 'Business':
            js_newaddr_business=$('#newcon_addr_inp').val();
            break;
            case 'Home':
            js_newaddr_home=$('#newcon_addr_inp').val();
            break;
            case 'Other':
            js_newaddr_other=$('#newcon_addr_inp').val();
            break;

        }
        
    }

    function changeMailingAddr(element){
        if(element.checked){

            js_newaddr_mailing=$('#newcon_addr_opts').val();
        }else{

            js_newaddr_mailing='';
        }

    }

    function updateContactAddress(){
        switch($('#newcon_addr_opts').val()){
            case 'Business':
            $('#newcon_addr_inp').val(js_newaddr_business);
            if(js_newaddr_mailing=='Business') $('#newcon_mailaddr_chk').prop('checked',true);
            else $('#newcon_mailaddr_chk').prop('checked',false);
            break;
            case 'Home':
            $('#newcon_addr_inp').val(js_newaddr_home);
            if(js_newaddr_mailing=='Home') $('#newcon_mailaddr_chk').prop('checked',true);
            else $('#newcon_mailaddr_chk').prop('checked',false);
            break;
            case 'Other':
            $('#newcon_addr_inp').val(js_newaddr_other);
            if(js_newaddr_mailing=='Other') $('#newcon_mailaddr_chk').prop('checked',true);
            else $('#newcon_mailaddr_chk').prop('checked',false);
            break;

        }
    }

    function changeContactAddress(){

        
        updateContactAddress();
        $('#newcon_addr_inp').focus();

    }

    function saveContactNumbers(element,eid){

        switch($('#newcon_phn_opts'+eid).val()){
            case 'Assistant':
            js_newphn_assistant=$(element).val();
            break;
            case 'Business':
            js_newphn_business=$(element).val();
            break;
            case 'Business 2':
            js_newphn_business2=$(element).val();
            break;
            case 'Business Fax':
            js_newphn_businessfax=$(element).val();
            break;
            case 'Callback':
            js_newphn_callback=$(element).val();
            break;
            case 'Car':
            js_newphn_car=$(element).val();
            break;
            case 'Company':
            js_newphn_company=$(element).val();
            break;
            case 'Home':
            js_newphn_home=$(element).val();
            break;
            case 'Home 2':
            js_newphn_home2=$(element).val();
            break;
            case 'Home Fax':
            js_newphn_homefax=$(element).val();
            break;
            case 'ISDN':
            js_newphn_isdn=$(element).val();
            break;
            case 'Mobile':
            js_newphn_mobile=$(element).val();
            break;
            case 'Other':
            js_newphn_other=$(element).val();
            break;
            case 'Other Fax':
            js_newphn_otherfax=$(element).val();
            break;
            case 'Pager':
            js_newphn_pager=$(element).val();
            break;
            case 'Primary':
            js_newphn_primary=$(element).val();
            break;
            case 'Radio':
            js_newphn_radio=$(element).val();
            break;
            case 'Telex':
            js_newphn_telex=$(element).val();
            break;
            case 'TTY/TDD':
            js_newphn_ttytdd=$(element).val();
            break;

        }

    }



    function switchContactNumbers(eid){

        switch($('#newcon_phn_opts'+eid).val()){
            case 'Assistant':
            $('#newcon_phn_inp'+eid).val(js_newphn_assistant);
            break;
            case 'Business':
            $('#newcon_phn_inp'+eid).val(js_newphn_business);
            break;
            case 'Business 2':
            $('#newcon_phn_inp'+eid).val(js_newphn_business2);
            break;
            case 'Business Fax':
            $('#newcon_phn_inp'+eid).val(js_newphn_businessfax);
            break;
            case 'Callback':
            $('#newcon_phn_inp'+eid).val(js_newphn_callback);
            break;
            case 'Car':
            $('#newcon_phn_inp'+eid).val(js_newphn_car);
            break;
            case 'Company':
            $('#newcon_phn_inp'+eid).val(js_newphn_company);
            break;
            case 'Home':
            $('#newcon_phn_inp'+eid).val(js_newphn_home);
            break;
            case 'Home 2':
            $('#newcon_phn_inp'+eid).val(js_newphn_home2);
            break;
            case 'Home Fax':
            $('#newcon_phn_inp'+eid).val(js_newphn_homefax);
            break;
            case 'ISDN':
            $('#newcon_phn_inp'+eid).val(js_newphn_isdn);
            break;
            case 'Mobile':
            $('#newcon_phn_inp'+eid).val(js_newphn_mobile);
            break;
            case 'Other':
            $('#newcon_phn_inp'+eid).val(js_newphn_other);
            break;
            case 'Other Fax':
            $('#newcon_phn_inp'+eid).val(js_newphn_otherfax);
            break;
            case 'Pager':
            $('#newcon_phn_inp'+eid).val(js_newphn_pager);
            break;
            case 'Primary':
            $('#newcon_phn_inp'+eid).val(js_newphn_primary);
            break;
            case 'Radio':
            $('#newcon_phn_inp'+eid).val(js_newphn_radio);
            break;
            case 'Telex':
            $('#newcon_phn_inp'+eid).val(js_newphn_telex);
            break;
            case 'TTY/TDD':
            $('#newcon_phn_inp'+eid).val(js_newphn_ttytdd);
            break;

        }

    }

    function changeContactNumbers(element,eid){

        switchContactNumbers(eid);

        $('#newcon_phn_inp'+eid).focus();

    }

    function updateContactNumbers(){
        for (var i = 1; i <= 4; i++) {
           switchContactNumbers(i);
       }
   }



   function openContacts(projectID,attr){
    if($("#rarrow").is(":visible")){
        $('#rarrow').trigger('click');   

    }

    $.ajax({
        url: '<?php echo site_url('projects/getProContactDB'); ?>',
        type: 'POST',
        beforeSend: function() {

        },
        data: {
            projectID: projectID,

        },
        dataType: "JSON",
        success : function(data) {
            console.log('getProContactDB',data);

            drawContactList(data,projectID,attr);


        },
        complete: function (jqXHR, status) {


        },

        error: function (jqXHR, status, err) {
            console.log(jqXHR.responseText);console.log(status);console.log(err);
        }


    });


}

function drawContactList(data,projectID,attr){

    $('.contentdiv_contact').html('');

    var dr='';
    dr+='<table id="tbl_contacts_load" style="" class="table">';
        dr+='<thead>';
            dr+='<tr>';
                dr+='<th style="">Name</th>';
                dr+='<th style="">Type</th>';
                dr+='<th style="">Mobile</th>';
                dr+='<th style="">Email</th>';
                dr+='<th style="width:100px">Actions</th>';

            dr+='</tr>';

        dr+='</thead>';

        dr+='<tbody>';
            $.each(data.crm_activity_contacts, function (i, cd) {
                dr+='<tr id="proconrow_'+cd.Id+'">';
                    dr+='<td title="'+cd.FullName+'">'+cd.FullName+'</td>';
                    dr+='<td title="'+(cd.contacttype ? cd.contacttype : '') +'">'+(cd.contacttype ? cd.contacttype : '' )+'</td>';
                    dr+='<td title="'+cd.Number_Mobile+'">'+cd.Number_Mobile+'</td>';
                    dr+='<td title="'+cd.Email+'">'+cd.Email+'</td>';
                    dr+='<td>';
                    dr+='<i class="fa fa-pencil-square-o exportProject" onclick="edit_ProContact('+cd.Id+','+projectID+',\''+attr+'\')" style="color: green;cursor: pointer; padding-top: 5px;margin-right: 5px;"></i>';
                    dr+='<i class="fa fa-trash exportProject" onclick="del_ProContact('+cd.Id+')" style="color: red;cursor: pointer; padding-top: 5px;margin-right: 5px;"></i>';

                    dr+='</td>';


                dr+='</tr>';
            });
        dr+='</tbody>';

        dr+='<tfoot>';
            dr+='<tr>';
                dr+='<td style="text-align:center;font-size:15px;font-weight:bold" colspan="5">';
                    dr+='<p>No contacts were found.</p>';
                
                dr+='</td>';
                
            dr+='</tr>';

        dr+='</tfoot>';

    dr+='</table>';

    $(".contentdiv_contact").append(dr);
    $(".contentdiv_contact").closest('.panel-body').addClass('nopad-contacts');
    $(".contentdiv_prop").hide();
    $(".contentdiv_contact").show();


    if(data.crm_activity_contacts.length>0){
        $('#tbl_contacts_load tfoot').hide();
    }else{
        $('#tbl_contacts_load tfoot').show();
    }
    //<img src="'+base_url+"icons/icon-person-add.png"+'" /></td>

}

function del_ProContact(conid){

    swal({
        title: 'Are you sure?',

        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then(function () {

        var request = $.ajax({
            url: base_url+"projects/del_ProContact",
            method: 'POST',
            data: {
                conid: conid,

            },
        });
        request.done(function(response){

            if(response.msg == 'Denied'){
                swal({
                    title: 'Unable to delete',
                    text: "Please contact with creator",
                    type: 'info'
                });
            }else if(response.msg == 'Failed'){
                swal({
                    title: 'Unable to process',
                    text: "Please try again",
                    type: 'info'
                });
            }else if(response.msg == 'Done'){

                swal({
                    title: 'Success',
                    text: "Contact deleted",
                    type: 'success',
                }).then(function () {
                  $('#proconrow_'+conid).slideUp(300, function(){ $(this).remove();});
              });

            }
        });
        request.fail(function(response){
            console.log(response);
        });
    });
}

$(document).on('mouseup', '.select2-container--open .del_ProConType', function (e) {
    del_ProConType($(e.target).attr('data-id'));
});

function saveProContact(evt,projectID,attr,mode){
    
    evt.preventDefault();
    
    var mySelections = {
        Internet:[$('#newcon_email_opts').val()],
        Numbers:[$('#newcon_phn_opts1').val(),$('#newcon_phn_opts2').val(),$('#newcon_phn_opts3').val(),$('#newcon_phn_opts4').val()],
        Address:[$('#newcon_addr_opts').val()],

    };

    var json_mySelections = JSON.stringify(mySelections);
    console.log(json_mySelections);

    var fd = new FormData(document.getElementById("frmProNewContact"));
    fd.append('mode', mode);
    fd.append('json_mySelections', json_mySelections);
    fd.append('js_contact_id', js_contact_id);
    fd.append('contacttypeid', $('#con_typeOpts').val());
    fd.append('projectID', projectID);
    fd.append('js_newcon_email', js_newcon_email);
    fd.append('js_newcon_email2', js_newcon_email2);
    fd.append('js_newcon_email3', js_newcon_email3);

    fd.append('js_newphn_assistant', js_newphn_assistant);
    fd.append('js_newphn_business', js_newphn_business);
    fd.append('js_newphn_business2', js_newphn_business2);
    fd.append('js_newphn_businessfax', js_newphn_businessfax);
    fd.append('js_newphn_callback', js_newphn_callback);
    fd.append('js_newphn_car', js_newphn_car);
    fd.append('js_newphn_company', js_newphn_company);
    fd.append('js_newphn_home', js_newphn_home);
    fd.append('js_newphn_home2', js_newphn_home2);
    fd.append('js_newphn_homefax', js_newphn_homefax);
    fd.append('js_newphn_isdn', js_newphn_isdn);
    fd.append('js_newphn_mobile', js_newphn_mobile);
    fd.append('js_newphn_other', js_newphn_other);
    fd.append('js_newphn_otherfax', js_newphn_otherfax);
    fd.append('js_newphn_pager', js_newphn_pager);
    fd.append('js_newphn_primary', js_newphn_primary);
    fd.append('js_newphn_radio', js_newphn_radio);
    fd.append('js_newphn_telex', js_newphn_telex);
    fd.append('js_newphn_ttytdd', js_newphn_ttytdd);

    fd.append('js_newaddr_business', js_newaddr_business);
    fd.append('js_newaddr_home', js_newaddr_home);
    fd.append('js_newaddr_other', js_newaddr_other);
    fd.append('js_newaddr_mailing', js_newaddr_mailing);
    fd.append('theFile', $('#imageUpload')[0].files[0]);


    $.ajax({
        url: "<?php echo site_url(); ?>Projects/addNewProContact",
        type: "POST",
        data: fd,
        enctype: 'multipart/form-data',
        processData: false, // tell jQuery not to process the data
        contentType: false,   // tell jQuery not to set contentType
        beforeSend: function() {

        },

        dataType: "JSON",
        success : function(data) {
            if(mode=='add') swal('Contact added successfully');
            if(mode=='edit') swal('Contact updated successfully');
            
        },
        complete: function (jqXHR, status) {
            openContacts(projectID,attr);

        },

        error: function (jqXHR, status, err) {
            console.log(jqXHR.responseText);console.log(status);console.log(err);
        }


    });
};

function del_ProConType(contypeid){

    swal({
        title: 'Are you sure?',

        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then(function () {

        var request = $.ajax({
            url: base_url+"projects/del_ProConType",
            method: 'POST',
            data: {
                contypeid: contypeid,

            },
        });
        request.done(function(response){

            if(response.msg == 'Denied'){
                swal({
                    title: 'Unable to delete',
                    text: "Please contact with creator",
                    type: 'info'
                });
            }else if(response.msg == 'Failed'){
                swal({
                    title: 'Unable to process',
                    text: "Please try again",
                    type: 'info'
                });
            }else if(response.msg == 'Done'){

                $('#con_typeOpts option[value="'+contypeid+'"]').remove();

                swal({
                    title: 'Success',
                    text: "Contact Type deleted",
                    type: 'success',
                }).then(function () {
                    
                  

              });

            }
        });
        request.fail(function(response){
            console.log(response);
        });
    });
}

function drawConTypes(data){
    var dhtml='';
    $.each(data.crm_contacttype, function (i, ctype) {
        dhtml+='<option value="'+ctype.contacttypeid+'">'+ctype.contacttype+'</option>';
    });
    return dhtml;
}

function drawConTabGeneral(data,projectID,attr,mode){
    

    var floatingDiv=''
     // row of type+photo:
    +'<div class="row rowcg1">'

        +'<div class="col-lg-9">'

            +'<div class="form-group">'
                +   '<label  class="control-label col-sm-3" for="email">Contact Type:</label>'
                +   '<div class="col-sm-8">'
                        +'<select id="con_typeOpts" class="form-control">'

                        +  drawConTypes(data)

                        +'</select>'
                +   '</div>'
            +'</div>'

            +'<div class="form-group">'
                +   '<label  class="control-label col-sm-3" for="email">Full Name:</label>'
                +   '<div class="col-sm-8">'
                +       '<input value="'+js_newcon_fullname+'" type="text" class="form-control" name="FullName" >'
                +   '</div>'
            +'</div>'

            +'<div class="form-group">'
                +  '<label  class="control-label col-sm-3" for="pwd">Company:</label>'
                +   '<div class="col-sm-8"> '
                +    '<input value="'+js_newcon_company+'" type="text" class="form-control" name="Company" >'
                +   '</div>'
            + '</div>'

            +'<div class="form-group">'
                +  '<label  class="control-label col-sm-3" for="pwd">Job Title:</label>'
                +   '<div class="col-sm-8"> '
                    +    '<input value="'+js_newcon_jobtitle+'" type="text" class="form-control" name="JobTitle" >'
                +   '</div>'
            + '</div>'
        +'</div>'

        +'<div class="col-lg-3">'
            +'<div id="profile-container" class="form-group">'

                +'<img id="profileImage"  />'

                +'<input accept="image/*" id="imageUpload" type="file" name="profile_photo" placeholder="Photo">'
            +'</div>'
        +'</div>'
    +'</div>'

     // row of internet:
    +'<div class="row">'

        +'<div class="col-lg-12 contact-section-top">'
            +  '<label style="width: 10%;">Internet</label>'
            +  '<label style="color:#ccc;width: 88%;border-top: 1px solid;"></label>'
        + '</div>'

        +'<div class="col-lg-12">'

            +'<div class="form-group">'

            +   '<div class="col-sm-2 control-select"> '
                +       '<select onchange="changeContactEmails()" id="newcon_email_opts" class="form-control">'
                    +         '<option>E-mail</option>'
                    +         '<option>E-mail 2</option>'
                    +          '<option>E-mail 3</option>'
                +       '</select>'
            +   '</div>'

            +   '<div class="col-sm-9"> '
                +'<input value="'+js_newcon_email+'" onkeyup="saveContactEmails(this)" type="email" class="form-control" id="newcon_email_val" >'
            +   '</div>'

            + '</div>'
        + '</div>'
    + '</div>'

    // row of contact numbers:
    +'<div class="row">'
        // heading
        +'<div class="col-lg-12 contact-section-top">'
            +  '<label style="width: 16%;">Phone numbers</label>'
            +  '<label style="color:#ccc;width: 82%;border-top: 1px solid;"></label>'
        + '</div>'

        +'<div class="col-lg-12">'

            +'<div class="form-group">'

                +'<div class="col-sm-2 control-select"> '

                    +'<select onchange="changeContactNumbers(this,1)" id="newcon_phn_opts1" class="form-control">'
                        +        '<option>Assistant</option>'
                        +        '<option selected>Business</option>'
                        +        '<option>Business 2</option>'
                        +        '<option>Business Fax</option>'
                        +        '<option>Callback</option>'
                        +        '<option>Car</option>'
                        +        '<option>Company</option>'
                        +        '<option>Home</option>'
                        +        '<option>Home 2</option>'
                        +        '<option>Home Fax</option>'
                        +        '<option>ISDN</option>'
                        +        '<option>Mobile</option>'
                        +        '<option>Other</option>'
                        +        '<option>Other Fax</option>'
                        +        '<option>Pager</option>'
                        +        '<option>Primary</option>'
                        +        '<option>Radio</option>'
                        +        '<option>Telex</option>'
                        +        '<option>TTY/TDD</option>'
                    +'</select>'

                +'</div>'

                +'<div class="col-sm-9"> '
                    +'<input value="'+js_newphn_business+'" id="newcon_phn_inp1" onblur="updateContactNumbers()"   onkeyup="saveContactNumbers(this,1)" type="text" class="form-control" pattern="^[0-9\-\+\s\(\)]*$">'
                +'</div>'

            + '</div>'

            +'<div class="form-group">'

                +'<div class="col-sm-2 control-select"> '

                    +'<select id="newcon_phn_opts2" class="form-control" onchange="changeContactNumbers(this,2)">'
                        +        '<option>Assistant</option>'
                        +        '<option>Business</option>'
                        +        '<option>Business 2</option>'
                        +        '<option>Business Fax</option>'
                        +        '<option>Callback</option>'
                        +        '<option>Car</option>'
                        +        '<option>Company</option>'
                        +        '<option selected>Home</option>'
                        +        '<option>Home 2</option>'
                        +        '<option>Home Fax</option>'
                        +        '<option>ISDN</option>'
                        +        '<option>Mobile</option>'
                        +        '<option>Other</option>'
                        +        '<option>Other Fax</option>'
                        +        '<option>Pager</option>'
                        +        '<option>Primary</option>'
                        +        '<option>Radio</option>'
                        +        '<option>Telex</option>'
                        +        '<option>TTY/TDD</option>'
                    +'</select>'

                +'</div>'

                +'<div class="col-sm-9"> '
                    +'<input value="'+js_newphn_home+'" id="newcon_phn_inp2" onkeyup="saveContactNumbers(this,2)" onblur="updateContactNumbers()" type="text" pattern="^[0-9\-\+\s\(\)]*$" class="form-control" >'
                +'</div>'

            + '</div>'

            +'<div class="form-group">'
                +'<div class="col-sm-2 control-select"> '

                    +'<select id="newcon_phn_opts3" class="form-control" onchange="changeContactNumbers(this,3)">'
                        +        '<option>Assistant</option>'
                        +        '<option>Business</option>'
                        +        '<option>Business 2</option>'
                        +        '<option selected>Business Fax</option>'
                        +        '<option>Callback</option>'
                        +        '<option>Car</option>'
                        +        '<option>Company</option>'
                        +        '<option>Home</option>'
                        +        '<option>Home 2</option>'
                        +        '<option>Home Fax</option>'
                        +        '<option>ISDN</option>'
                        +        '<option>Mobile</option>'
                        +        '<option>Other</option>'
                        +        '<option>Other Fax</option>'
                        +        '<option>Pager</option>'
                        +        '<option>Primary</option>'
                        +        '<option>Radio</option>'
                        +        '<option>Telex</option>'
                        +        '<option>TTY/TDD</option>'
                    +'</select>'

                +'</div>'

                +'<div class="col-sm-9"> '
                    +'<input value="'+js_newphn_businessfax+'" type="text" pattern="^[0-9\-\+\s\(\)]*$" class="form-control" id="newcon_phn_inp3" onkeyup="saveContactNumbers(this,3)" onblur="updateContactNumbers()" >'
                +'</div>'

            + '</div>'

            +'<div class="form-group">'

                +'<div class="col-sm-2 control-select"> '

                    +'<select id="newcon_phn_opts4" class="form-control" onchange="changeContactNumbers(this,4)">'
                        +        '<option>Assistant</option>'
                        +        '<option>Business</option>'
                        +        '<option>Business 2</option>'
                        +        '<option>Business Fax</option>'
                        +        '<option>Callback</option>'
                        +        '<option>Car</option>'
                        +        '<option>Company</option>'
                        +        '<option>Home</option>'
                        +        '<option>Home 2</option>'
                        +        '<option>Home Fax</option>'
                        +        '<option>ISDN</option>'
                        +        '<option selected>Mobile</option>'
                        +        '<option>Other</option>'
                        +        '<option>Other Fax</option>'
                        +        '<option>Pager</option>'
                        +        '<option>Primary</option>'
                        +        '<option>Radio</option>'
                        +        '<option>Telex</option>'
                        +        '<option>TTY/TDD</option>'
                    +'</select>'

                +'</div>'

                +'<div class="col-sm-9"> '
                    +'<input value="'+js_newphn_mobile+'" type="text" class="form-control" id="newcon_phn_inp4" pattern="^[0-9\-\+\s\(\)]*$" onkeyup="saveContactNumbers(this,4)" onblur="updateContactNumbers()">'
                +'</div>'

            + '</div>'

        + '</div>'
    + '</div>'

     // row of address:
    +'<div class="row">'

        +'<div class="col-lg-12 contact-section-top">'
            +  '<label style="width: 10%;">Addresses</label>'
            +  '<label style="color:#ccc;width: 88%;border-top: 1px solid;"></label>'
        + '</div>'

        +'<div class="col-lg-12">'

            +'<div class="form-group">'

                +'<div class="col-sm-2 control-select"> '

                    +'<select id="newcon_addr_opts" class="form-control" onchange="changeContactAddress()" class="form-control">'
                        +           '<option>Business</option>'
                        +           '<option>Home</option>'
                        +           '<option>Other</option>'
                    +'</select>'

                    +'<div class="checkbox">'
                        +'<label><input id="newcon_mailaddr_chk" onchange="changeMailingAddr(this)" type="checkbox"> This is the mailing address</label>'
                    +'</div>'

                +'</div>'

                +'<div class="col-sm-9"> '
                    +    '<textarea value="" id="newcon_addr_inp" onchange="saveContactAddress(this)" rows="4" class="form-control">'
                            + js_newaddr_business
                    +    '</textarea>'
                +'</div>'

            + '</div>'

            +'<div class="form-group"> '
                + ' <div class="col-sm-12">'
                    +    '<button type="submit" class="btn btn-primary">Submit</button>'
                    +    '<button onclick="closeContactsDiv()" type="button" class="btn btn-danger">Cancel</button>'
                    
                +  '</div>'
            +'</div>'

        +'</div>'

    +'</div>'
    ;


    return floatingDiv;
}

function drawConTabMore(data,projectID,attr,mode){

    var floatingDiv=''
    +'<div class="row">'

        +'<div class="col-lg-6">'
            +'<div class="form-group">'
                +'<label  class="control-label col-sm-3" for="email">Department:</label>'
                +'<div class="col-sm-7">'
                    +'<input value="'+js_details_department+'" type="text" class="form-control" name="Details_Department" >'
                +'</div>'
            +'</div>'

            +'<div class="form-group">'
                +  '<label  class="control-label col-sm-3" for="pwd">Office:</label>'
                +   '<div class="col-sm-7"> '
                    +    '<input value="'+js_details_office+'" type="text" class="form-control" name="Details_Office" >'
                +   '</div>'
            + '</div>'


            +'<div class="form-group">'
                +  '<label  class="control-label col-sm-3" for="pwd">Profession:</label>'
                +   '<div class="col-sm-7"> '
                    +    '<input value="'+js_details_profession+'" type="text" class="form-control" name="Details_Profession" >'
                +   '</div>'
            + '</div>'
        +'</div>'

        +'<div class="col-lg-6">'
            +'<div class="form-group">'
                +   '<label  class="control-label col-sm-3" for="email">Manager\'s Name:</label>'
                +   '<div class="col-sm-7">'
                     +'<input value="'+js_details_managersname+'" type="text" class="form-control" name="Details_ManagersName" >'
                +   '</div>'
            +'</div>'

            +'<div class="form-group">'
                +  '<label  class="control-label col-sm-3" for="pwd">Assistant\'s Name:</label>'
                +   '<div class="col-sm-7"> '
                    +    '<input value="'+js_details_assistantsname+'" type="text" class="form-control" name="Details_AssistantsName" >'
                +   '</div>'
            + '</div>'


        +'</div>'

    +'</div>'

    +'<div class="row">'

        +'<div class="col-lg-12 contact-section-top">'

            +  '<label style="color:GREY;width: 100%;border-top: 1px solid;"></label>'
        + '</div>'

        +'<div class="col-lg-6">'
            +'<div class="form-group">'
                +   '<label  class="control-label col-sm-3" for="email">Nickname:</label>'
                +   '<div class="col-sm-7">'
                     +'<input value="'+js_details_nickname+'" type="text" class="form-control" name="Details_Nickname" >'
                +   '</div>'
            +'</div>'

            +'<div class="form-group">'

                +'<label  class="control-label col-sm-3" for="pwd">Title:</label>'

                +'<div class="col-sm-7"> '
                    +'<select id="condet_titleOpts" class="form-control" name="Details_Title">'
                        +'<option></option>'
                        +'<option>Dr.</option>'
                        +'<option>Miss</option>'
                        +'<option>Mr.</option>'
                        +'<option>Mrs.</option>'
                        +'<option>Ms.</option>'
                        +'<option>Prof.</option>'
                    +'</select>'
                +'</div>'

            + '</div>'


            +'<div class="form-group">'
                +'<label  class="control-label col-sm-3" for="pwd">Suffix:</label>'
                +'<div class="col-sm-7"> '
                    +'<select id="condet_suffixOpts" class="form-control" name="Details_Suffix">'
                        +'<option></option>'
                        +'<option>Jr.</option>'
                        +'<option>Sr.</option>'
                        +'<option>I</option>'
                        +'<option>II</option>'
                        +'<option>III</option>'

                    +'</select>'
                +'</div>'
            + '</div>'

            +'<div class="form-group"> '
                +'<div class="col-sm-12">'
                    +'<button type="submit" class="btn btn-primary">Submit</button>'
                    +'<button onclick="closeContactsDiv()" type="button" class="btn btn-danger">Cancel</button>'
                +'</div>'
            +'</div>'
        +'</div>'

        +'<div class="col-lg-6">'

            +'<div class="form-group">'
                +   '<label  class="control-label col-sm-3" for="email">Spouse/Partner:</label>'
                +   '<div class="col-sm-7">'
                        +'<input value="'+js_details_spouse+'" type="text" class="form-control" name="Details_Spouse" >'
                +   '</div>'
            +'</div>'

        +'</div>'

    + '</div>'

    ;


    return floatingDiv;
}


function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
       $('#profileImage').attr('src', 
        window.URL.createObjectURL(uploader.files[0]) );
   }
}

function addContactForm(projectID,attr){
    $(".contentdiv_contact").html('');

    
    $.ajax({
        url: '<?php echo site_url('projects/getNewContactDB'); ?>',
        type: 'POST',
        beforeSend: function() {
            
        },

        dataType: "JSON",
        success : function(data) {

            initContactsJS();
            

            var tabhtml='<ul class="nav nav-tabs">'

            +  '<li class="active"><a data-toggle="tab" href="#contactmenu1">General</a></li>'
            +  '<li><a data-toggle="tab" href="#contactmenu2">Details</a></li>'
            +'</ul>'
            +'<form onsubmit="saveProContact(event,'+projectID+',\''+attr+'\',\'add\')" id="frmProNewContact" class="form-horizontal frm-contacts">'
            +'<div class="tab-content" style="padding:10px">'

            +  '<div id="contactmenu1" class="tab-pane fade in active">'
            +    drawConTabGeneral(data,projectID,attr,'add')
            +  '</div>'

            +  '<div id="contactmenu2" class="tab-pane fade">'

            +    drawConTabMore(data,projectID,attr,'add')
            +  '</div>'

            +'</div>'
            +'</form>'
            ;

           $(".contentdiv_contact").append(tabhtml);
           $(".contentdiv_contact").closest('.panel-body').addClass('nopad-contacts');
           $(".contentdiv_prop").hide();
           $(".contentdiv_contact").show();
            

            setContactOpts(data.crm_activity_contacts,'add');
        },
        complete: function (jqXHR, status) {
        },

        error: function (jqXHR, status, err) {
            console.log(jqXHR.responseText);console.log(status);console.log(err);
        }
    });

}

function setCurrency (currency) {
    console.log(currency);
    if (currency.isNew) { 
        var $currency = $('<span>'+currency.text +'</span><i data-id="'+currency.id+'" style="color:orange" class="fa fa-plus pull-right"></i>');
    }else{
        var $currency = $('<span>'+currency.text +'</span><i data-id="'+currency.id+'" style="color:red" class="fa fa-trash pull-right del_ProConType"></i>');
    }
    return $currency;
};

function setContactOpts(data,mode){
    
    $('#condet_titleOpts').val(js_details_title);
    $('#condet_suffixOpts').val(js_details_suffix);
    $('#con_typeOpts').val(js_contacttypeid);
    if(mode=='edit') {
        if(data.ContactPic==""){
            $('#profileImage').attr("src",base_url+"asset/img/contacts_profilephoto.png");
        }else { 
            $('#profileImage').attr("src",base_url+"uploads/contactImages/"+js_newcon_imageurl);
        }
        var myLoadedObj = JSON.parse(data.Selections);
        console.log('myLoadedObj',myLoadedObj);

        $.each(myLoadedObj.Internet,function(i,obj){
            $('#newcon_email_opts').val(obj);
        });
        $.each(myLoadedObj.Numbers,function(i,obj){
            j=i+1; $('#newcon_phn_opts'+j).val(obj);
        });
        $.each(myLoadedObj.Address,function(i,obj){
            $('#newcon_addr_opts').val(obj);
        });

        updateContactEmails();
        updateContactNumbers();
        updateContactAddress();

    }else{
        $('#profileImage').attr("src",base_url+"asset/img/contacts_profilephoto.png");
    }


    $("#profileImage").click(function(e) {
        $("#imageUpload").click();
    });

    $("#imageUpload").change(function(){
        fasterPreview( this );
    });

    

    $("#newcon_email_opts").select2({
        width: '100%'
    }).on("select2:opening ", function(e) {
        var re = new RegExp(/\S+@\S+\.\S+/);
        var valu=$('#newcon_email_val').val();

        if(valu !=''){
            if(!re.test(valu)){
                e.preventDefault();
                swal('E-mail address not correct');
            } 
        }
        

    });

    $("#newcon_phn_opts1").select2({
        width: '100%'
    }).on("select2:opening ", function(e) {
        var re = new RegExp(/^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g);
        var valu=$('#newcon_phn_inp1').val();

        if(valu !=''){
            if(!re.test(valu)){
                e.preventDefault();
                swal('Phone Number not correct');
            }
        } 

    });

    $("#newcon_phn_opts2").select2({
        width: '100%'
    }).on("select2:opening ", function(e) {
        var re = new RegExp(/^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g);
        var valu=$('#newcon_phn_inp2').val();

        if(valu !=''){
            if(!re.test(valu)){
                e.preventDefault();
                swal('Phone Number not correct');
            }
        } 

    });

    $("#newcon_phn_opts3").select2({
        width: '100%'
    }).on("select2:opening ", function(e) {
        var re = new RegExp(/^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g);
        var valu=$('#newcon_phn_inp3').val();

        if(valu !=''){
            if(!re.test(valu)){
                e.preventDefault();
                swal('Phone Number not correct');
            }
        } 

    });

    $("#newcon_phn_opts4").select2({
        width: '100%'
    }).on("select2:opening ", function(e) {
        var re = new RegExp(/^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g);
        var valu=$('#newcon_phn_inp4').val();

        if(valu !=''){
            if(!re.test(valu)){
                e.preventDefault();
                swal('Phone Number not correct');
            }
        } 

    });

    $("#newcon_addr_opts").select2({width: '100%'});
    
    $("#con_typeOpts").select2({
        placeholder: "Select / add contact types",
        tags: true,
        templateResult: setCurrency,
        width: '100%',
        createTag: function (params) {
            var term = $.trim(params.term);

            if (term === '') return null;

            return {
                id: term,
                text: term,
                isNew: true, 
                
            }
        },
    }).on("select2:select", function(e) {

        if(e.params.data.isNew){

            var isNew = $(this).find('[data-select2-tag="true"]');

            $.ajax({
             url: '<?php echo site_url('projects/addNewContactType'); ?>',
             type: 'POST',
             beforeSend: function() {

             },
             data: {
                 isNew: e.params.data.text

             },
             dataType: "JSON",
             success : function(data) {
                 isNew.replaceWith('<option selected value="'+data.id+'">'+e.params.data.text+'</option>');

                 if($('#con_typeOpts option[value="'+data.id+'"]').length>1){
                    $('#con_typeOpts option[value="'+data.id+'"]')[0].remove();
                 }

             },
             complete: function (jqXHR, status) {


             },

             error: function (jqXHR, status, err) {
                 console.log(jqXHR.responseText);
                 console.log(status);
                 console.log(err);
             }


         });
        }
    });

       
}

function edit_ProContact(conid,projectID,attr){
   
    $(".contentdiv_contact").html('');

    $.ajax({
        url: '<?php echo site_url('projects/getEditContactDB'); ?>',
        type: 'POST',
        beforeSend: function() {
            
        },
        data: {
            conid: conid

        },
        dataType: "JSON",
        success : function(data) {
            console.log('getEditContactDB',data);

            initContactsJS(data.crm_activity_contacts);

            var tabhtml='<ul class="nav nav-tabs">'

            +  '<li class="active"><a data-toggle="tab" href="#contactmenu1">General</a></li>'
            +  '<li><a data-toggle="tab" href="#contactmenu2">Details</a></li>'
            +'</ul>'
            +'<form onsubmit="saveProContact(event,'+projectID+',\''+attr+'\',\'edit\')" id="frmProNewContact" class="form-horizontal frm-contacts">'
            +'<div class="tab-content" style="padding:10px">'

            +  '<div id="contactmenu1" class="tab-pane fade in active">'
            +    drawConTabGeneral(data,projectID,attr,'edit')
            +  '</div>'

            +  '<div id="contactmenu2" class="tab-pane fade">'

            +    drawConTabMore(data,projectID,attr,'edit')
            +  '</div>'

            +'</div>'
            +'</form>'
            ;

            $(".contentdiv_contact").append(tabhtml);
            $(".contentdiv_contact").closest('.panel-body').addClass('nopad-contacts');
            $(".contentdiv_prop").hide();
            $(".contentdiv_contact").show();

            setContactOpts(data.crm_activity_contacts,'edit');

        },
        complete: function (jqXHR, status) {
        },

        error: function (jqXHR, status, err) {
            console.log(jqXHR.responseText);console.log(status);console.log(err);
        }
    });

}

function closeContactsDiv(){
    $(".contentdiv_contact").closest('.panel-body').removeClass('nopad-contacts');
    $(".contentdiv_contact").hide();
    $(".contentdiv_prop").show();

}

</script>
