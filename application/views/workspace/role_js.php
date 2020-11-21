	<div class="callcuspopcss"></div>
  <script type="text/javascript" src="<?php echo base_url("asset/js/plugin/orgChart/jquery.orgchart.js"); ?>" ></script>
  <script type="text/javascript">
    <?php echo "var jsroles = ". json_encode($roles) . ";\n"; ?>
    <?php echo "var jsprofileList = ". json_encode($profileList) . ";\n"; ?>

      var testData = [
          <?php echo $datavalue; ?>
      ];
      var site_url = "<?php echo site_url(); ?>";
      // $(function(){
          org_chart = $('#orgChart').orgChart({
              data: testData,
              showControls: true,
              allowEdit: true,
              onAddNode: function(node){ 
                  set_profile_list(node,'n');
                  $("#addNode").modal();
              },
              onDeleteNode: function(node){
                  // console.log('Deleted node '+node.data.id);
                  child = true;
                  for(var i=0; i<jsroles.length; i++){
                    if(node.data.id == jsroles[i].reports_to){
                      child = false; break;
                    }
                  }
                  if(child){
                    $.ajax({
                      url: '<?php echo site_url(); ?>workspace/delete_role/'+node.data.id,
                      type: 'POST',
                    });
                    org_chart.deleteNode(node.data.id);
                  }
                  else
                    alert("Please delete the child first");
              },
              onClickNode: function(node){
                  set_profile_list(node,'e');
                  $("#addNode").modal();
              }
          });
          // console.log(org_chart.opts.data);
      // });

      // just for example purpose
      function log(text){
          $('#consoleOutput').append('<p>'+text+'</p>')
      }
  </script>

  <script type="text/javascript">
    function set_profile_list(node, type){
      $("#addNode_type").val(type);
      if(type == "e"){
        $.each(jsroles, function(kk,vv){
          if(vv.id == node.data.parent){
            $("#addNode_report_to").val(vv.role_name);
            $("#addrole_name").val(node.data.name);
            return false;
          }
        });
      }else{
        $("#addNode_report_to").val(node.data.name);
      }
      $("#addNode_report_to_id").val(node.data.id);

      taggleup('u');
    }

    function callcuspop(e, name){
      var x = $("#img"+e).offset();
      // alert("Top position: " + x.top + " Left position: " + x.left);
      var design = "<div class=>";
      design += name;
      design += "</div>";
      $(".callcuspopcss").css({top: (x.top + 50), left: x.left});
      $(".callcuspopcss").show();
      $(".callcuspopcss").html(design);
      // console.log($(e).position());
    }
    function callcuspop2(){
      $(".callcuspopcss").hide();
      $(".callcuspopcss").html("");
    }

    function taggleup(s){
      $(".priORuser").hide();
      if(s == "u"){
        $(".title_of_list").html("User lists");
        var html = "";
        $("#addNode .new_role_lists").html(html);
        // console.log(jsmembers);
        $.each(jsmembers, function(k,v){
          html += '<div class="col col-4">'+
                    '<label class="checkbox">'+
                     '<input type="checkbox" name="role_assign_to_users[]" value="'+v.ID+'" class="ratu'+v.ID+'"><i></i>'+v.full_name+
                    '</label>'+
                  '</div>';
        });
        $("#addNode .new_role_lists").html(html);
      } else if(s == "p") {
        $(".title_of_list").html("Privilege lists");
        var html = "";
        $("#addNode .new_role_lists").html(html);
        $.each(jsprofileList, function(k,v){
          html += '<div class="col col-4">'+
                    '<label class="checkbox">'+
                      '<input type="checkbox" name="profile[]" value="'+v.id+'">'+
                      '<i></i>'+v.profile_name+'</label>'+
                  '</div>';
        });
        $("#addNode .new_role_lists").html(html);
      }
      $(".priORuser").show("slow");
    }
  </script>

  <div class="modal fade" id="addNode" tabindex="-1" role="dialog" aria-labelledby="addNodeLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="<?php echo site_url()."workspace/save_role"; ?>" method="POST">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              ×
            </button>
            <h4 class="modal-title" id="addNodeLabel">Add Role</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input type="text" name="role_name" id="addrole_name" class="form-control" placeholder="Title" required="">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="addNode_report_to" disabled>
                </div>
                <div class="smart-form">
                  <section>
                    <div class="inline-group">
                      <label class="radio">
                        <input type="radio" name="rinline" onclick="taggleup('u')" checked>
                        <i></i>User List</label>
                      <!-- <label class="radio">
                        <input type="radio" name="rinline" onclick="taggleup('p')">
                        <i></i>Privilege Lists</label> -->
                    </div>
                  </section>
                </div>
              </div>
            </div>
            <div class="row priORuser">
              <div class="col-md-12"><b class="title_of_list"></b></div>
              <div class="col-md-12">&nbsp;</div>
              <div class="smart-form new_role_lists"></div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="posttype" id="addNode_type">
            <input type="hidden" class="form-control" name="reports_to" id="addNode_report_to_id">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Add Role</button>
          </div>
        </form>
      </div>
    </div>
  </div>