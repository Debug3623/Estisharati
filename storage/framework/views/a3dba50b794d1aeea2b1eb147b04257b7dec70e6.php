
<div style="padding: 5px;">
  <div style="width: 100%; display: block">
    <h2 style="font-size: 20px;border-bottom: 1px solid #eee;padding-bottom: 20px;"> <?php echo app('translator')->get('site.purchase_id'); ?># <?php echo e($sale->id); ?> <span style="
    background-color: #3c8dbc;
    display: inline;
    padding: .2em .6em .3em;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;
    font-size:14px !important;
    position: relative;
    top: -2px;
    margin: 0 5px;
    display: none;
    "> Pending</span> <small style="font-size: 14px;float: right;padding-right: 12px;margin-top: 6px;"><?php echo app('translator')->get('site.purchase_on'); ?>: <?php echo e(date('d/m/Y', strtotime($sale->date_subscribed))); ?></small> </h2>
  </div>
  
  <!-- info row -->
  <div style="display: display: block;width: 100%;padding: 0 0 20px;">
    <div style="display: inline-block; width:32%"> <strong><?php echo app('translator')->get('site.customer_info'); ?>:</strong>
      <address>
      <span style="text-transform: capitalize;"><?php echo e($sale->username); ?></span><br>
       <?php echo e($sale->email); ?>  <br>
        <?php echo e($sale->phone); ?>

      </address>
    </div>   
    
    <!-- /.col --> 
  </div>
  <!-- /.row --> 
  
  <!-- Table row -->
  <table class="table table-striped" style="width: 100%;background-color: transparent;margin: 15px 0 15px;">
    <thead>
      <tr>
        <th align="center" ><?php echo app('translator')->get('site.quantity'); ?></th>
        <th align="center"><?php echo app('translator')->get('site.product_name'); ?></th>
        <th align="center"><?php echo app('translator')->get('site.valid_to'); ?></th>
        <th align="center"><?php echo app('translator')->get('site.price'); ?></th>
      </tr>
    </thead>
    <tbody style="text-transform: capitalize;font-size: 12px;">
     <tr>
                    <td>1</td>             
                    <td  width="30%"><?php echo e($sale->type); ?>&nbsp; - &nbsp;<?php echo e($sale->product_name); ?><br></td>
                    <td> <?php echo e(date('d/m/Y', strtotime($sale->valid_to))); ?> <br></td>
                    <td>AED <?php echo e($sale->subtotal); ?><br></td>
                 </tr>
      
    </tbody>
  </table>
  
  <!-- /.row -->
  
  <div style="display: block;"> 
    <!-- accepted payments column -->
    <div style="float:left;width: 64%;padding-right: 4%;">
      <p class="lead" style="margin-bottom: 0;font-size: 18px;font-weight: bold;"><?php echo app('translator')->get('site.payment_method'); ?>:</p>
      <p style="text-transform:capitalize; border: 1px solid #e3e3e3; padding: 10px;border-radius: 4px;background-color: #f5f5f5;margin-top: 5px;"> <?php echo e(str_replace('_',' ', $sale->payment_method_name)); ?> </p>
      
      <?php if(!empty($sale->coupon_code)): ?>
     
      <table style="text-align: center; width: 80%;
    border-radius: 3px;     margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;">
        <tr>
          <th style="text-align: center; border-top: 1px solid #f4f4f4;     padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;"><?php echo app('translator')->get('site.code'); ?></th>
          <th style="text-align: center; border-top: 1px solid #f4f4f4;     padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;"><?php echo app('translator')->get('site.discount'); ?></th>
        </tr>
    
     
        <tr>
          <td style="text-align: center; border-top: 1px solid #e3e3e3;     padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;"><?php echo e($sale->coupon_code); ?></td>
    
          <td style="text-align: center; border-top: 1px solid #e3e3e3;     padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;"><?php echo e($sale->discount); ?>

            
           
           </td>
        </tr>
     
        
      </table>
      
      <?php endif; ?>
      
    </div>
    <!-- /.col -->
    <div style=" float: right; width:30%"> 
      
        <table style="width: 100%;padding: 38px 0;">
          <tr>
            <th style="width:50%;padding: 10px 0; border-top: 1px solid #f4f4f4;" align="left"><?php echo app('translator')->get('site.subtotal'); ?>:</th>
            <td align="right" style="border-top: 1px solid #f4f4f4;"> AED <?php echo e($sale->subtotal); ?></td>
          </tr>
          
          
          <?php if(!empty($sale->coupon_code)): ?>
          <tr>
            <th style="width:50%;padding: 10px 0; border-top: 1px solid #f4f4f4;" align="left"><?php echo app('translator')->get('site.coupon_discount'); ?>:</th>
            <td align="right" style="border-top: 1px solid #f4f4f4;">AED <?php echo e($sale->discount); ?></td>
          </tr>
          <?php endif; ?>
          <tr>
            <th style="width:50%;padding: 10px 0; border-top: 1px solid #f4f4f4;" align="left"><?php echo app('translator')->get('site.total'); ?>:</th>
            <td align="right" style="border-top: 1px solid #f4f4f4;">AED <?php echo e($sale->amount); ?></td>
          </tr>
        </table>
        
    </div>
    
    <!-- /.col --> 
  </div>
  <!-- /.row --> 
  
  <!-- /.content --> 
</div>
<?php /**PATH /home/superservers/public_html/estisharati/resources/views/dashboard/sales/purchasemail.blade.php ENDPATH**/ ?>