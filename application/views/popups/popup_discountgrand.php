<style>
  
  .modal-dialog{
    /*min-width: 700px !important;*/
        top: 20px;    
  }
 
</style>
<button type="button" style="display:none" id="close_discountgrand" data-dismiss="modal" aria-hidden="true">×</button>
<form id="form_pop_discountgrand" action="">
  <h4>Set Discount for: <?php echo ($pdis_for); ?></h4>
  <!-- <div class="row" style="margin-bottom: 5px;">
    <div class="col-md-12">
      <input onchange="fun_change_chkstatus_grand(this)" name="radiodiscountgrand" type="checkbox" id="zero_discount_grand" > Zero Discount<br>
    </div>
  </div> -->
  <div class="row" style="margin-bottom: 5px;">
    <div class="col-md-6">
      <input name="radiodiscountgrand" type="checkbox" id="percent_discount_grand">  % of Price
    </div>
    <div class="col-md-3">
    <input type="number" size="2" min="0" max="100" oninput="fun_now_discount_grand(this)" id="discount_percentage_val_grand" value="0" style="width:100%">
    </div>
    <div class="col-md-3">
      <input readonly type="number" size="2" min="0" max="100" id="discount_percentage_val_grand_cal" value="0" style="width:100%">
    </div>
  </div>
  <div class="row" style="margin-bottom: 5px;">
    <div class="col-md-6">
      <input name="radiodiscountgrand" type="checkbox" id="direct_discount_grand">  Direct Price Reduction
    </div>
    <div class="col-md-3">
      <input type="number" size="2" min="0" max="<?php echo ($pdis_for); ?>" oninput="fun_now_discount_grand(this)" id="direct_discount_val_grand" value="0" style="width:100%">
    </div>
    <div class="col-md-3">
      <input type="number" size="2" min="0" max="<?php echo ($pdis_for); ?>" id="direct_discount_val_grand_cal" value="0" readonly style="width:100%">
    </div>
  </div>

  <input type="button" class="btn btn-primary btn-xs btn-updateandexit size-family-sidebar" data-serial="<?php echo ($dis_serial); ?>" id="cal_discount_grand" value="OK">
  <input type="button" class="btn btn-danger btn-xs btn-updateandexit size-family-sidebar" data-serial="<?php echo ($dis_serial); ?>" id="cancel_discount_grand" value="CANCEL">
</form>

<script type="text/javascript">
  var jdis_type="<?php echo ($pdis_type); ?>";
  var jdis_for=<?php echo ($pdis_for); ?>;
  var jdis_value_percent=<?php echo ($pdis_value_percent); ?>;
  var jdis_value_direct=<?php echo ($pdis_value_direct); ?>;
  var jdis_serial="<?php echo ($dis_serial); ?>";

  var dcttype;var dctval;

  $('#form_pop_discountgrand').on('focus','input',function(e){
        
        $( e.currentTarget ).select();
    });

  // function fun_change_chkstatus_grand(element){
  //   if($(element).attr('id')=="zero_discount_grand"){
  //     if($(element).is(':checked')){
  //       $('#percent_discount_grand').prop('checked',false);
  //       $('#direct_discount_grand').prop('checked',false);
  //     }
  //   }else{
  //     $('#zero_discount_grand').prop('checked',false);
  //   }
  // }

  function fun_now_discount_grand(element){

    if(item_max_validation(element)=='invalid') {alert('invalid');return;}

    $('#discount_percentage_val_grand_cal').val(Number($("#net_total"+jdis_serial).html())*Number($("#discount_percentage_val_grand").val()) / 100);

    $('#direct_discount_val_grand_cal').val(Number($("#direct_discount_val_grand").val()) );
  }


  var newprice;

   $( "#cancel_discount_grand" ).click(function() {
      var calculated_discount_grand;

    $("#discount_type_grand"+jdis_serial).val("zero");

    
    $("#net_totalafterdisgrand").html('');
    
    fun_cal_grandtotal(jdis_serial);
    $("#close_discountgrand").trigger("click", [true]);
    });

  if(jdis_type=="zero"){
    $("#percent_discount_grand").prop("checked", false);
    $("#direct_discount_grand").prop("checked", false);
  }
  if(jdis_type=="percent"){
    $("#percent_discount_grand").prop("checked", true);
    $("#discount_percentage_val_grand").val(jdis_value_percent);
  }
  if(jdis_type=="direct"){
    $("#direct_discount_grand").prop("checked", true);
    $("#direct_discount_val_grand").val(jdis_value_direct);
  }
  if(jdis_type=="both"){
    $("#percent_discount_grand").prop("checked", true);
    $("#direct_discount_grand").prop("checked", true);
    $("#discount_percentage_val_grand").val(jdis_value_percent);
    $("#direct_discount_val_grand").val(jdis_value_direct);
  }
  $('#discount_percentage_val_grand_cal').val(Number($("#net_total"+jdis_serial).html())*Number($("#discount_percentage_val_grand").val()) / 100);

  $('#direct_discount_val_grand_cal').val(Number($("#direct_discount_val_grand").val()) );


</script>