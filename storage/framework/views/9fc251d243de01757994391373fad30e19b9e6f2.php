

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <?php echo app('translator')->get('site.view_purchase'); ?> <small> <?php echo app('translator')->get('site.view_purchase'); ?>...</small> </h1>
    <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li><a href="<?php echo e(route('dashboard.slider.index')); ?>"> <?php echo app('translator')->get('site.view_purchase'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.view_purchase'); ?></li>
            </ol>
  </section>

  <!-- Main content -->
  <section class="invoice" style="margin: 15px;">
      <!-- title row -->
      <?php if(session()->has('message')): ?>
       <div class="col-xs-12">
       <div class="row">
        <div class="alert alert-success alert-dismissible">
           <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
           <h4><i class="icon fa fa-check"></i> <?php echo e(trans('labels.Successlabel')); ?></h4>
            <?php echo e(session()->get('message')); ?>

        </div>
        </div>
        </div>
        <?php endif; ?>
        <?php if(session()->has('error')): ?>
        <div class="col-xs-12">
        <div class="row">
          <div class="alert alert-warning alert-dismissible">
               <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
               <h4><i class="icon fa fa-warning"></i> <?php echo e(trans('labels.WarningLabel')); ?></h4>
                <?php echo e(session()->get('error')); ?>

            </div>
          </div>
         </div>
        <?php endif; ?>
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header" style="padding-bottom: 25px; margin-top:0;">
            <?php echo app('translator')->get('site.purchase_id'); ?># <?php echo e($sale->id); ?>

            <small style="display: inline-block"><?php echo app('translator')->get('site.purchase_on'); ?>: <?php echo e(date('d/m/Y', strtotime($sale->date_subscribed))); ?></small>
            <a href="" target="_blank"  class="btn btn-default pull-right btnprn"><i class="fa fa-print"></i> <?php echo app('translator')->get('site.print'); ?></a>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
          <?php echo app('translator')->get('site.customer_info'); ?>: <br><br>
          <address>
            <strong><?php echo e($sale->username); ?></strong><br>
            <?php echo e($sale->email); ?> <br>
            <?php echo e($sale->phone); ?>

          </address>
        </div>        
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>       
        <th align="center" ><?php echo app('translator')->get('site.quantity'); ?></th>
        <th align="center"><?php echo app('translator')->get('site.product_name'); ?></th>
        <th align="center"><?php echo app('translator')->get('site.valid_to'); ?></th>
        <th align="center"><?php echo app('translator')->get('site.price'); ?></th>
        </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>             
                    <td  width="30%"><?php echo e($sale->type); ?>&nbsp; - &nbsp;<?php echo e($sale->product_name); ?><br></td>
                    <td> <?php echo e(date('d/m/Y', strtotime($sale->valid_to))); ?> <br></td>
                    <td>AED <?php echo e($sale->subtotal); ?><br></td>
                 </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-7">
          <p class="lead" style="margin-bottom:10px"><?php echo app('translator')->get('site.payment_method'); ?>:</p>
          <p class="text-muted well well-sm no-shadow" style="text-transform:capitalize">
            <?php echo e(str_replace('_',' ', $sale->payment_method_name)); ?>

          </p>
          <p class="lead" style="margin-bottom:10px"><?php echo app('translator')->get('site.payment_reference_number'); ?>:</p>
          <p class="text-muted well well-sm no-shadow" style="text-transform:capitalize">
            <?php echo e($sale->payment_reference_no); ?>

          </p>
          <?php if(!empty($sale->coupon_code)): ?>
              <p class="lead" style="margin-bottom:10px"><?php echo app('translator')->get('site.coupon'); ?>:</p>
                <table class="text-muted well well-sm no-shadow stripe-border table table-striped" style="text-align: center; ">
                  <tr>
                        <th style="text-align: center; "><?php echo app('translator')->get('site.code'); ?></th>
                        <th style="text-align: center; "><?php echo app('translator')->get('site.discount'); ?></th>
                    </tr>
                  
                      <tr>
                          <td><?php echo e($sale->coupon_code); ?></td>
                            <td><?php echo e($sale->discount); ?>


                               
                            </td>
                        </tr>
                  
        </table>
               <!-- <?php echo e($data['orders_data'][0]->coupon_code); ?>-->

          <?php endif; ?>
          <!-- <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">-->

      
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
          <!--<p class="lead"></p>-->

          <div class="table-responsive ">
            <table class="table order-table">
              <tr>
                <th style="width:50%"><?php echo app('translator')->get('site.subtotal'); ?>:</th>
                <td>
                   AED <?php echo e($sale->subtotal); ?>

                  </td>
              </tr>
                     
              <?php if(!empty($sale->coupon_code)): ?>
              <tr>
                <th><?php echo app('translator')->get('site.coupon_discount'); ?>:</th>
                <td>                  
                  AED <?php echo e($sale->discount); ?></td>
              </tr>
              <?php endif; ?>
              <tr>
                <th><?php echo app('translator')->get('site.total'); ?>:</th>
                <td>
                  AED <?php echo e($sale->amount); ?> </td>
                  </td>
              </tr>
            </table>
          </div>

        </div>
    
        
        <!-- /.col -->
      </div>
      <!-- /.row -->


    </section>
  <!-- /.content -->
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('.btnprn').click(function() {
        window.print();
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/resources/views/dashboard/sales/show.blade.php ENDPATH**/ ?>