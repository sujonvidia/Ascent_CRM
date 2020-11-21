<style>
  
  .modal-dialog{
    /*min-width: 700px !important;*/
        top: 20px;    
  }
 
</style>

<script>
	var ci_baseurl="<?php echo base_url(); ?>";
</script>
<button type="button" style="display:none" id="close_discountpop" data-dismiss="modal" aria-hidden="true">×</button>
<form id="form_pop_discount" action="">
  <h4>Set Discount for: <?php echo ($srvnum2); ?></h4>

  <!-- <div class="row" style="margin-bottom: 5px;">
    <div class="col-md-12">
      <input onchange="fun_change_chkstatus(this)" type="checkbox" name="radiodiscount" id="zero_discount" > Zero Discount
    </div>
  </div> -->
  <div class="row" style="margin-bottom: 5px;">
    <div class="col-md-6">
      <input onchange="fun_change_chkstatus(this)" type="checkbox" name="radiodiscount" id="percent_discount">  % of Price
    </div>

    <div class="col-md-3">
      <input type="number" size="2" min="0" max="100" oninput="fun_now_discount(this)" id="discount_percentage_val" name="discount_percentage_val" value="0" style="width:100%">
    </div>

    <div class="col-md-3">
      <input type="number" size="2" min="0" max="100" readonly="" id="discount_percentage_val_ical" name="discount_percentage_val_ical" value="0" style="width:100%">
    </div>
  </div>

  <div class="row" style="margin-bottom: 5px;">
    <div class="col-md-6">
      <input onchange="fun_change_chkstatus(this)" type="checkbox" name="radiodiscount" id="direct_discount">  Direct Price Reduction
    </div>
    <div class="col-md-3">
      <input type="number" size="2" min="0" max="<?php echo ($srvnum2); ?>" oninput="fun_now_discount(this)" id="direct_discount_val" name="direct_discount_val" value="0" style="width:100%">
    </div>
    <div class="col-md-3">
      <input type="number" size="2" min="0" max="<?php echo ($srvnum2); ?>" id="direct_discount_val_ical" readonly name="direct_discount_val_ical" value="0" style="width:100%">
    </div>
  </div>
  <input class="btn btn-primary btn-xs btn-updateandexit size-family-sidebar" type="button" data-rowid="<?php echo ($srvnum); ?>" id="cal_discount" value="OK">
   <input class="btn btn-danger btn-xs btn-updateandexit size-family-sidebar" type="button" data-rowid="<?php echo ($srvnum); ?>" id="cancel_discount" value="CANCEL">
</form>

<script type="text/javascript">
  var dctid=<?php echo ($srvnum); ?>;
  var serviceprice=<?php echo ($srvnum2); ?>;
  var servicetype="<?php echo ($srvtype); ?>";
  var servicedisval_percent=<?php echo ($srvdisval_percent); ?>;
  var servicedisval_direct=<?php echo ($srvdisval_direct); ?>;

  var dcttype;var dctval;

  // $('#cal_discount').attr('data-quoteid',$('#row'+dctid).data('data-quoteid'));

  $('#form_pop_discount').on('focus','input',function(e){
        
        $( e.currentTarget ).select();
    });
  
  function fun_change_chkstatus(element){
    if($(element).attr('id')=="zero_discount"){
      if($(element).is(':checked')){
        $('#percent_discount').prop('checked',false);
        $('#direct_discount').prop('checked',false);
      }
    }else{
      $('#zero_discount').prop('checked',false);
    }
  }
  function fun_now_discount(element){
    if(item_max_validation(element)=='invalid') {alert('invalid');return;}

    $('#discount_percentage_val_ical').val(Number(serviceprice)*Number($("#discount_percentage_val").val()) / 100);

    $('#direct_discount_val_ical').val(Number($("#direct_discount_val").val()) );
  }

  //$(function () {
    var newprice;
    if(servicetype=="zero"){
     $("#percent_discount").prop("checked", false);
     
     $("#direct_discount").prop("checked", false);
    }
    if(servicetype=="percent"){
      $("#percent_discount").prop("checked", true);
      $("#discount_percentage_val").val(servicedisval_percent);
    }
    if(servicetype=="direct"){
      $("#direct_discount").prop("checked", true);
      $("#direct_discount_val").val(servicedisval_direct);
    }
    if(servicetype=="both"){
     $("#percent_discount").prop("checked", true);
     $("#discount_percentage_val").val(servicedisval_percent);
     $("#direct_discount").prop("checked", true);
     $("#direct_discount_val").val(servicedisval_direct);
   }
    $('#discount_percentage_val_ical').val(Number(serviceprice)*Number($("#discount_percentage_val").val()) / 100);

    $('#direct_discount_val_ical').val(Number($("#direct_discount_val").val()) );
    
    $( "#cancel_discount" ).click(function() {
      // newprice=0;
        $("#discount_type"+dctid).val("zero");
        $("#close_discountpop").trigger("click");
        //dctval=0;
    });
    
    $( "#cal_discount" ).click(function() {

      // if ($("#zero_discount").is(':checked')){
      //   newprice=0;
      //   $("#discount_type"+dctid).val("zero");
      //   dctval=0;
      // }
      if ($("#percent_discount").is(':checked')){
       //newprice+=Number(serviceprice*$("#discount_percentage_val").val()/100);
      
       $("#discount_type"+dctid).val("percent");
       $("#discount_val_percent"+dctid).val($("#discount_percentage_val").val());

     }
     if ($("#direct_discount").is(':checked')){

       //newprice+=Number($("#direct_discount_val").val());
       $("#discount_type"+dctid).val("direct");
       $("#discount_val_direct"+dctid).val($("#direct_discount_val").val());
     }

     if($("#percent_discount").is(':checked') && $("#direct_discount").is(':checked')){
      
        $("#discount_type"+dctid).val("both");
      
     }
     if(!$("#percent_discount").is(':checked') && !$("#direct_discount").is(':checked')){
        //newprice=0;
        $("#discount_type"+dctid).val("zero");
        //dctval=0;
     }

    // $("#total_discount"+dctid).val(newprice);
     //$("#total_afterdiscount"+dctid).html(serviceprice-newprice);

     // if($("#load_tax_vat"+dctid).val() !=""){data_vat=$("#load_tax_vat"+dctid).val();}else{data_vat=null;}
     // if($("#load_tax_sales"+dctid).val() !=""){data_sales=$("#load_tax_sales"+dctid).val();}else{data_sales=null;}
     // if($("#load_tax_service"+dctid).val() !=""){data_service=$("#load_tax_service"+dctid).val();}else{data_service=null;}
     
     // $('#open_tax'+dctid).attr("href",''+ci_baseurl+'yzy-accounts/index/popuptax/'+dctid+'/'+data_vat+'/'+data_sales+'/'+data_service+'/'+$("#total_afterdiscount"+dctid).html()+'');

    // $("#netprice"+dctid).html(serviceprice-newprice);

     

    //  var js_net_total=0;

    //  $('.cls_nettotal').each(function(i, obj) {
    //   js_net_total+=Number( $( this ).text());
    // });

    //  $("#net_total").html(js_net_total);

     $("#close_discountpop").trigger("click");

   //});



  });

</script>