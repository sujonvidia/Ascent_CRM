<style>
  
  .modal-dialog{
    /*min-width: 700px !important;*/
        top: 20px;    
  }
 
</style>
<button type="button" style="display:none" id="close_taxpopsh" data-dismiss="modal" aria-hidden="true">×</button>
<form id="form_pop_taxsh" action="">
  <h4>Set S&H Tax for: <?php echo ($taxafterdis); ?></h4>
  <div class="row" id="div_vat_sh">
    <div class="col-md-4">
     <label><input type="number" step="0.01" min="0" id="percent_vat_sh" max="100" onkeyup="item_max_validation(this)" />%</label>

   </div>
   <div class="col-md-4">VAT</div>
   <div class="col-md-4">
    <input type="number" readonly="" id="value_vat_sh" style="width:100%">
  </div>
</div>

<div class="row" id="div_sales_sh">
  <div class="col-md-4">
    <label>
     <input type="number" step="0.01" min="0" id="percent_sales_sh"  max="100" onkeyup="item_max_validation(this)" />%</label>

   </div>
   <div class="col-md-4">   Sales </div>
   <div class="col-md-4">
    <input type="number" readonly id="value_sales_sh" style="width:100%">

  </div>
</div>

<div class="row" id="div_service_sh">
  <div class="col-md-4">
   <label>
     <input type="number" step="0.01" min="0" id="percent_service_sh" max="100" onkeyup="item_max_validation(this)" />     %   </label>

   </div>
   <div class="col-md-4">   Service </div>
   <div class="col-md-4">
    <input type="number" readonly id="value_service_sh" style="width:100%">

  </div>
</div>
<input type="button" class="btn btn-primary btn-xs btn-updateandexit size-family-sidebar" data-serial="<?php echo ($p_serial); ?>" id="cal_tax_shiphand" value="OK">
<input type="button" class="btn btn-danger btn-xs btn-updateandexit size-family-sidebar" data-serial="<?php echo ($p_serial); ?>" id="cancel_tax_shiphand" value="CANCEL">
</form>

<script type="text/javascript">

  var taxafterdis_sh=<?php echo ($taxafterdis); ?>;
  var taxvat_sh=<?php echo ($taxvat); ?>;
  var taxsales_sh=<?php echo ($taxsales); ?>;
  var taxservice_sh=<?php echo ($taxservice); ?>;
  var serial="<?php echo ($p_serial); ?>";
  
$('#form_pop_taxsh').on('focus','input',function(e){
        
        $( e.currentTarget ).select();
    });


  //$(function () {
    var newprice;
    
    $("#percent_vat_sh").val(taxvat_sh);
    $("#value_vat_sh").val((taxafterdis_sh*taxvat_sh/100).toFixed(2));
    $("#percent_sales_sh").val(taxsales_sh);
    $("#value_sales_sh").val((taxafterdis_sh*taxsales_sh/100).toFixed(2));
    
    $("#percent_service_sh").val(taxservice_sh);
    $("#value_service_sh").val((taxafterdis_sh*taxservice_sh/100).toFixed(2));
    

    $( document ).on( "keyup change", "#percent_vat_sh", function() {
      
      
      $("#value_vat_sh").val((taxafterdis_sh*$(this).val()/100).toFixed(2));
      $("#load_tax_vat_sh"+serial).val($(this).val());
      
      
    });
    $( document ).on( "keyup change", "#percent_sales_sh", function() {
      
      
      $("#value_sales_sh").val((taxafterdis_sh*$(this).val()/100).toFixed(2));
      $("#load_tax_sales_sh"+serial).val($(this).val());
      
      
    });
    $( document ).on( "keyup change", "#percent_service_sh", function() {
      
      
      $("#value_service_sh").val((taxafterdis_sh*$(this).val()/100).toFixed(2));
      $("#load_tax_service_sh"+serial).val($(this).val());
      
      
    });

     $( "#cancel_tax_shiphand" ).click(function() {
      $("#load_tax_vat_sh"+serial).val(0);
      $("#load_tax_sales_sh"+serial).val(0);
      $("#load_tax_service_sh"+serial).val(0);
      fun_cal_sh_tax(serial);
    fun_cal_grandtotal(serial);
    $("#close_taxpopsh").trigger("click", [true]);

     });
    
 //    $( "#cal_tax" ).click(function() {

 //      var calculated_tax= Number($("#value_vat").val())+ Number($("#value_sales").val())+Number($("#value_service").val());
 //      $("#total_aftertax"+taxnum).html(calculated_tax.toFixed(2));

 //      var tot_after_dis= Number($("#total_afterdiscount"+taxnum).html());
 //      var tot_after_tax=Number($("#total_aftertax"+taxnum).html());

 //      $("#netprice"+taxnum).html((tot_after_dis+tot_after_tax).toFixed(2));

 //   // $("#total_discount"+dctid).val(newprice);
 //   // $("#total_afterdiscount"+dctid).html(serviceprice-newprice);
 //   // $("#netprice"+dctid).html(serviceprice-newprice);

 //   // $("#discount_type"+dctid).val(dcttype);
 //   // $("#discount_val"+dctid).val(dctval);

 //   var js_net_total=0;

 //   $('.cls_nettotal').each(function(i, obj) {
 //    js_net_total+=Number( $( this ).text());
 //  });

 //   $("#net_total").html(js_net_total);
 //   $("#close_taxpop").trigger("click");

 // });



  //});
</script>