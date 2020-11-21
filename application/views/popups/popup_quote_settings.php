<style type="text/css">
  .modal-content{
    width: 700px;
  }
  .select2-dropdown{
    z-index: 10510000000 !important;
  }
  .modal-dialog{
    /*min-width: 700px !important;*/
        top: 20px;    
  }
</style>

<button type="button" style="display:none" id="close_quotepopSettings" data-dismiss="modal" aria-hidden="true">×</button>

<form id="form_currency" name="form_currency" method="POST" action="<?php echo base_url(); ?>Projects/changeQuoteCurrency/<?php echo $quoteid ?>">
  <div style="border: 1px solid lightgray;border-radius: 5px;padding: 5px;">

    <div class="container-fluid" style="border: 1px solid lightgray;border-radius: 5px;padding: 5px;">


      <div class="row">
        <div class="col-lg-12">
          <label>Currency Conversion:</label>
        </div>
      </div>
      <div class="col-lg-2">
        <div class="radio">
          <label><input value="auto" onclick="fun_cur_toggle(this)" type="radio" name="optcurtype">Automatic</label>
        </div>
        <div class="radio">
          <label><input value="manual" onclick="fun_cur_toggle(this)" type="radio" name="optcurtype">Manual</label>
        </div>
      </div>

      <div style="display: none" id="curdiv_sel" class="col-lg-8">
        <label>Select Currency:
          <select id="sel_currency" name="sel_currency[]">

          </select>
        </label>
      </div>


    </div>


    <div class="container-fluid" style="border: 1px solid lightgray;border-radius: 5px;padding: 5px;margin-top: 10px">



      <label>Unit Conversion:</label>
      <div class="col-lg-12" style="">
        <select id="sel_units" name="sel_units[]" multiple="" style="width:100%">


        </select>
      </div>




      <div class="col-lg-4 pull-right"  style="margin-top: 5px;">
        <button onclick="delTempUnits()" type="button" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar" style="width:100%;">CANCEL</button>
        <button onclick="addAllUnits()" type="submit" class="btn btn-primary btn-xs pull-right btn-updateandexit size-family-sidebar" style="width:100%;">OK</button>
      </div>

    </div>

  </div>

</form>

<script type="text/javascript">
  var currency_from,currency_to;
  var js_qid=<?php echo $quoteid ?>;
  //curlCurrencyItem();
  
  $('.ekko-lightbox').removeAttr("tabindex");
  
  function fun_cur_toggle(element){
    $('#curdiv_sel').show();
    
  }
  function addAllUnits(){
    $.ajax({
      url: '<?php echo site_url(); ?>Projects/addAllUnitsPer',
      type: 'POST',
    //async: false,
    data: {
      qid: <?php echo $quoteid ?>
    },
    //dataType: "JSON",

    success: function (data, textStatus) {

      var selvals=$('#sel_units').select2("val");


      $('.sel-qty-unit').each(function(i,val){
        var cursel=this;
        var defopt=($(cursel).val());
        $(cursel).empty();

        $(selvals).each(function(i,val){
          $(cursel).append($("<option></option>").attr("value",val).text(val));
        });
        $(cursel).val(defopt);

      });

      js_unitList=[];
      js_unitList=selvals;
      $('#close_quotepopSettings').click();

    },
    error: function (jqXHR, textStatus, errorThrown) {

    }
  });
    
  }

  var findOne = function (haystack, arr) {
    return arr.some(function (v) {
      return haystack.indexOf(v) >= 0;
    });
  };

  function delTempUnits(){
   $.ajax({
    url: '<?php echo site_url(); ?>Projects/delTempUnits',
    type: 'POST',

    data: {
      qid: <?php echo $quoteid ?>
    },


    success: function (data, textStatus) {

     $('#close_quotepopSettings').click();


   },
   error: function (jqXHR, textStatus, errorThrown) {
    console.log(jqXHR);
    console.log(textStatus);
    console.log(errorThrown);


  }
});


   
 }

 function formatState (opt) {
  if (!opt.id) {
    return opt.text;
  }               
  var optimage = $(opt.element).val(); 
  optimage=(optimage.match(/.{2}/g).toString().toLowerCase());
  if(!optimage){
    return opt.text;
  } else {                    
    var $opt = 
    '<span><img src="http://caches.space/flags/' + optimage + '.png" width="23px" /> ' + opt.text + '</span>';


    return $($opt);

  }

}
function templateResult(item) {
  if(!item.id) {
    return item.text;
  }
  var $opt = 
    '<span>' + item.text + '<i data-text="'+item.text+'" data-id="'+$(item.element).attr('data-id')+'"style="color:red;float:right" class="fa fa-times"></span>';

  return $($opt);
}


$.ajax({
  url: '<?php echo site_url(); ?>Projects/getQuoteCurrency',
  type: 'POST',
    //async: false,
    data: {
      qid: <?php echo $quoteid ?>
    },
    dataType: "JSON",

    success: function (data, textStatus) {
      console.log('getQuoteCurrency');
      console.log(data);
      $('#sel_currency').html(loadCurrencyOptions());
      $.each(data.currencyList, function (key, value) {

        $('#sel_currency option[value="'+value.name+'"').prop('selected','selected');
        $('[name="optcurtype"][value="'+value.type_value+'"').prop('checked','checked');
      });

      $('#sel_currency').select2({ 
        width: '100%',
        placeholder: 'Select',
        
        templateResult: formatState,
        templateSelection: formatState
      });

      // $('#sel_currency_from').select2({ width: '100%',placeholder: 'Select' });
      // $('#sel_currency_to').select2({ width: '100%',placeholder: 'Select' });

      currency_from=($('#sel_currency').val());
      //$('#currencyValue').val(data.currencyList[0].currency_value);

    },
    error: function (jqXHR, textStatus, errorThrown) {

    }
  });



function initSelect2(UnitList){
  var selopts="";


  $.each(UnitList, function (key, value) {


    if(value.type_selected==1){
      $('#sel_units').append($("<option></option>").attr("value",value.name).text(value.name).prop('selected','selected').attr("data-id",value.id));
      
    }else{
     $('#sel_units').append($("<option></option>").attr("value",value.name).text(value.name).attr("data-id",value.id));
   }


 });

          $('#sel_units').select2({ 
            tags: true,
            width: '100%',
            multiple: true,
            placeholder: 'Select units to add',
        
        templateResult: templateResult,
         
         
        }).on("select2:select", function(e) {
        
        update_Quote_Unit($(e.params.data.element).attr('data-id'),1);

 }).on("select2:unselecting", function (e) { 
 
  var arrSelUnits=[];
  arrSelUnits.push(e.params.args.data.text);
  
  
  $.ajax({
    url: '<?php echo site_url(); ?>Projects/getQuoteItemUnits',
    type: 'POST',
    async:false,
    data: {
      qid: <?php echo $quoteid ?>
    },


    success: function (data, textStatus) {

     var arrDBUnits = [];
     $(data.ItemUnitList).each(function(i,val){
      arrDBUnits.push(val.item_unit);
    });


     if(findOne(arrDBUnits,arrSelUnits)){
      alert('Unable to remove. Unit is in use !!!');
      e.preventDefault();
    }else{

     update_Quote_Unit($(e.params.args.data.element).attr('data-id'),0);

   }


 },
 error: function (jqXHR, textStatus, errorThrown) {


 }
});

  
}).on("change", function(e) {
  
  var isNew = $(this).find('[data-select2-tag="true"]');
  if(isNew.length){
        
        add_Quote_Unit(isNew.val());

      }
    });

}
$.ajax({
  url: '<?php echo site_url(); ?>Projects/getQuoteUnits',
  type: 'POST',
    //async: false,
    data: {
      qid: <?php echo $quoteid ?>
    },
    dataType: "JSON",

    success: function (data, textStatus) {

      console.log(data);

      initSelect2(data.UnitList);

    },
    error: function (jqXHR, textStatus, errorThrown) {

    }
  });

function add_Quote_Unit(unitname){
 $.ajax({
  url: '<?php echo site_url(); ?>Projects/addQuoteUnitDyn',
  type: 'POST',
      //async: false,
      data: {
        unitname: unitname,
        qid: <?php echo $quoteid ?>,
        status:0
      },
      dataType: "JSON",

      success: function (data, textStatus) {

       console.log("data added new");
       console.log(data);
       $('#sel_units').empty();
       $('#sel_units').select2().unbind();
       $('#sel_units').select2('destroy');
       // $('#currencyValue').val(data.NewCurrencyValue);
       // $('#btn_submit_currency').removeAttr('disabled');
       initSelect2(data.UnitList);
       $('#sel_units').select2("open");
       
     },
     error: function (jqXHR, textStatus, errorThrown) {

     }
   });
}
function delete_Quote_Unit(quoteid){

  $.ajax({
    url: '<?php echo site_url(); ?>Projects/delQuoteUnit',
    type: 'POST',
      //async: false,
      data: {
        did: quoteid,
        qid: <?php echo $quoteid ?>

      },
      dataType: "JSON",

      success: function (data, textStatus) {
        $('#sel_units').empty();
        $('#sel_units').select2().unbind();
        $('#sel_units').select2('destroy');
        initSelect2(data.UnitList);


      },
      error: function (jqXHR, textStatus, errorThrown) {

      }
    });

}
function update_Quote_Unit(quoteid,status){

  $.ajax({
    url: '<?php echo site_url(); ?>Projects/updateQuoteUnit',
    type: 'POST',
      //async: false,
      data: {
        did: quoteid,
        qid: <?php echo $quoteid ?>,
        status:status

      },
      dataType: "JSON",

      success: function (data, textStatus) {
        $('#sel_units').empty();
        $('#sel_units').select2().unbind();
        $('#sel_units').select2('destroy');
        initSelect2(data.UnitList);



      },
      error: function (jqXHR, textStatus, errorThrown) {

      }
    });

}
$(document).on('mouseup', '.select2-results__options .fa-times', function (e) {
    

    var arrSelUnits=[];
    arrSelUnits.push($(e.currentTarget).attr('data-text'));


    $.ajax({
      url: '<?php echo site_url(); ?>Projects/getQuoteItemUnits',
      type: 'POST',
      async:false,
      data: {
        qid: <?php echo $quoteid ?>
      },


      success: function (data, textStatus) {

       var arrDBUnits = [];
       $(data.ItemUnitList).each(function(i,val){
        arrDBUnits.push(val.item_unit);
      });
       

       if(findOne(arrDBUnits,arrSelUnits)){
          //alert('Unable to delete. Unit is in use !!!');
          e.preventDefault();
        }else{

           //update_Quote_Unit($(e.params.args.data.element).attr('data-id'),0);
           delete_Quote_Unit($(e.currentTarget).attr('data-id'));

         }


       },
       error: function (jqXHR, textStatus, errorThrown) {


       }
     });

  });



$('form[name=form_currency]').submit(function (e) {

  e.preventDefault();
  var formData = new FormData($(this)[0]);
  
  var thisform=this;
  $.ajax({
    url: this.action,
    type: this.method,
    data: formData,
      // dataType: "JSON",
      contentType: false,
      processData: false,
      success: function (data) {
        $('#quote_details_body tr[data-level="1"][data-quoteid="'+js_qid+'"] .cls-open-items').click();
        $('#quote_details_body tr[data-level="1"][data-quoteid="'+js_qid+'"] .cls-open-items').click();

      },error: function (jqXHR, textStatus, errorThrown) {

        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
      }
      
    });



});



</script>