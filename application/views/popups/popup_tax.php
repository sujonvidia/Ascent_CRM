<style>
  
  .modal-dialog{
    /*min-width: 700px !important;*/
        top: 20px;    
  }
 
</style>
<button type="button" style="display:none" id="close_taxpop" data-dismiss="modal" aria-hidden="true">×</button>
<form id="form_pop_tax" action="">
  <h4>Set Tax for: <?php echo ($taxafterdis); ?></h4>
  <div class="row" style="    margin-bottom: 15px;">
    <div class="col-md-4">
     <span> Calculation:</span>
     <select style="height: 32px" class="form-control sel_tax_cal" name="fyear" id="fyear" onchange="ChangeRate(this.value);">
      <option value="standard">Standard</option>
      <option value="truncated">Truncated</option> 
    </select>
    
  </div>
  <div id="div_truncated" class="col-md-8" style="display: none">
    <span>Service List : </span>
    
    <div id="div_tax_std" style="display: none">
      <select id="sel_tax_std" style="height: 32px" name="state" class="form-control">


      </select>
    </div>
    <div id="div_tax_trun" style="display: none">
     <select id="sel_tax_trun" style="height: 32px" name="state" class="form-control">


     </select>
   </div>
   
   
 </div>
</div>
<div class="row" id="div_vat">
  <div class="col-md-4">
   <label><input type="number" step="0.01" min="0" id="percent_vat" max="100" onkeyup="item_max_validation(this)" />%</label>

 </div>
 <div class="col-md-4">VAT</div>
 <div class="col-md-4">
  <input type="number"  readonly=""  id="value_vat" style="width:100%">
</div>
</div>

<div class="row" id="div_sales">
  <div class="col-md-4">
    <label>
     <input type="number" step="0.01" min="0" id="percent_sales" max="100" onkeyup="item_max_validation(this)"  />%</label>

   </div>
   <div class="col-md-4">   Sales </div>
   <div class="col-md-4">
    <input type="number" readonly  id="value_sales" style="width:100%">

  </div>
</div>

<div class="row" id="div_service">
  <div class="col-md-4">
   <label>
     <input type="number" step="0.01" min="0" id="percent_service" max="100" onkeyup="item_max_validation(this)"  />%</label>

   </div>
   <div class="col-md-4">   Service </div>
   <div class="col-md-4">
    <input type="number" readonly id="value_service" style="width:100%">

  </div>
</div>
<input type="button" class="btn btn-primary btn-xs btn-updateandexit size-family-sidebar" data-rowid="<?php echo ($taxnum); ?>" id="cal_tax" value="OK">
<input type="button" class="btn btn-danger btn-xs btn-updateandexit size-family-sidebar" data-rowid="<?php echo ($taxnum); ?>" id="cancel_tax" value="CANCEL">
</form>

<script type="text/javascript">
  var taxnum=<?php echo ($taxnum); ?>;
  var taxafterdis=<?php echo ($taxafterdis); ?>;
  var taxvat=<?php echo ($taxvat); ?>;
  var taxsales=<?php echo ($taxsales); ?>;
  var taxservice=<?php echo ($taxservice); ?>;
  var currency_symbol="<?php echo ($currency_symbol); ?>";

  

  var dcttype;var dctval;

  $('#form_pop_tax').on('focus','input',function(e){

    $( e.currentTarget ).select();
  });

  function ChangeRate(val){
    if(val=='standard'){
      $('#div_truncated').hide('slow');
      $('#div_tax_trun').hide('slow');
    }else{
      $('#div_truncated').show('slow');
      $('#div_tax_trun').show('slow');
    }
  }

  function addTaxStd(cat_item,cat_val){
   $('#sel_tax_std').append($('<option>', { 
    value: cat_val,
    text : cat_item 
  }));
 }

 function addTaxTrun(cat_item,cat_val){
   $('#sel_tax_trun').append($('<option>', { 
    value: cat_val,
    text : cat_item 
  }));
 }


  //$(function () {
    var newprice;
    if(taxvat !=null){
      $("#div_vat").show();
      $("#percent_vat").val(taxvat);
      $("#value_vat").val((taxafterdis*taxvat/100).toFixed(2));

    }else{ $("#div_vat").hide();}

    if(taxsales !=null){
      $("#div_sales").show();
      $("#percent_sales").val(taxsales);
      $("#value_sales").val((taxafterdis*taxsales/100).toFixed(2));

    }else{ $("#div_sales").hide();}

    if(taxservice !=null){
      $("#div_service").show();
      $("#percent_service").val(taxservice);
      $("#value_service").val((taxafterdis*taxservice/100).toFixed(2));
    }else{ $("#div_service").hide();}

    $( document ).on( "keyup change", "#percent_vat", function() {


      $("#value_vat").val((taxafterdis*$(this).val()/100).toFixed(2));
      $("#load_tax_vat"+taxnum).val($(this).val());


    });
    $( document ).on( "keyup change", "#percent_sales", function() {


      $("#value_sales").val((taxafterdis*$(this).val()/100).toFixed(2));
      $("#load_tax_sales"+taxnum).val($(this).val());


    });
    $( document ).on( "keyup change", "#percent_service", function() {


      $("#value_service").val((taxafterdis*$(this).val()/100).toFixed(2));
      $("#load_tax_service"+taxnum).val($(this).val());


    });
    $( "#cancel_tax" ).click(function() {

      $("#load_tax_vat"+taxnum).val(0);
      $("#load_tax_sales"+taxnum).val(0);
      $("#load_tax_service"+taxnum).val(0);
      $("#close_taxpop").trigger("click");

    // fun_cal_discount(taxnum);
    // fun_cal_nettotal();
    // fun_cal_grandtotal();
    // $("#total_aftertax"+taxnum).html('');
    //  var tot_after_dis= Number($("#total_afterdiscount"+taxnum).html());
    //  $("#netprice"+taxnum).html((tot_after_dis).toFixed(2));

  });
    $( "#cal_tax" ).click(function() {
      $("#load_tax_vat"+taxnum).val(Number($("#percent_vat").val()));
      $("#load_tax_sales"+taxnum).val(Number($("#percent_sales").val()));
      $("#load_tax_service"+taxnum).val(Number($("#percent_service").val()));

  // var calculated_tax= Number($("#value_vat").val())+ Number($("#value_sales").val())+Number($("#value_service").val());

  //  $("#total_aftertax"+taxnum).html(calculated_tax.toFixed(2));

  //  var tot_after_dis= Number($("#total_afterdiscount"+taxnum).html());
  //  var tot_after_tax=Number($("#total_aftertax"+taxnum).html());

  //  $("#netprice"+taxnum).html((tot_after_dis+tot_after_tax).toFixed(2));

//fun_cal_nettotal();
  //  var js_net_total=0;

  //  $('.cls_nettotal').each(function(i, obj) {
  //   js_net_total+=Number( $( this ).text());
  // });

  //  $("#net_total").html(js_net_total);
  $("#close_taxpop").trigger("click");

});


 /* $.ajax({
                    url: '<?php echo site_url(); ?>yzy-settings/index/getTaxByCountry',
                    type: 'POST',
                    data: {
                        countryname: currency_symbol

                    },
                    dataType: "JSON",
                    success : function(data) {
                      
                        console.log('getTaxByCountry');
                        console.log(data);
                        
                        if(data.countrystandard.length>0){
                         $(data.countrystandard).each(function(i,val){
                          addTaxStd(val.cat_item,val.cat_val)
                          
                         });
                       }else{
                        addTaxStd("VAT","4.5");
                        addTaxStd("Sales","10");
                        addTaxStd("Service","12.5");

                      }

            
                        if(data.countrytruncated.length>0){

                         $(data.countrytruncated).each(function(i,val){
                          addTaxTrun(val.cat_item,val.cat_val)
                             
                         });
                     }else{
                         if(currency_symbol=='BD'){

                          addTaxTrun('IT Enabled Services - ITES',4.5);
                          addTaxTrun('Motor Car Garage and Workshop',7.5);
                         addTaxTrun('Dockyard',7.5);
                         addTaxTrun('Construction Firm',7.5);
                         addTaxTrun('Land Development Firm',3);
                         addTaxTrun('Furniture (Manufacturing)',6);
                         addTaxTrun('Furniture (Trading-having VAT Challan)',4);
                         addTaxTrun('Procurement Provider',4);
                         addTaxTrun('Transport Contractor - Petroleum',2.25);
                         addTaxTrun('Transport Contractor Non-Petroleum',7.5);
                         addTaxTrun('Purchaser of Auctioned Goods',4);
                         addTaxTrun('Sponsorship Service',7.5);
                         addTaxTrun('Building Construction Firm(1-1100 sq. ft.)',1.5);
                         addTaxTrun('Building Construction Firm(1101-1600 sq. ft.)',2.5);
                         addTaxTrun('Building Construction Firm(>1601  sq. ft. & above)',4.5);


                      }else{

                     //    for (i = 0; i < 5; i++) {
                     //     addNewTax();
                     // }

                 }

             }


         }

     });
     */

  //});
</script>