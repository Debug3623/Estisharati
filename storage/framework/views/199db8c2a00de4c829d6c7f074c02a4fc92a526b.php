<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1><?php echo app('translator')->get('site.offer'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li><a href="<?php echo e(route('dashboard.slider.index')); ?>"> <?php echo app('translator')->get('site.offer'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.edit'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title"><?php echo app('translator')->get('site.edit'); ?></h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    <?php echo $__env->make('partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <form action="<?php echo e(route('dashboard.offers.update',$offer->id)); ?>" method="post">

                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('put')); ?>

                      <div class="col-md-12">
                        <div class="form-group col-md-12">
                           
                                <label><?php echo app('translator')->get('site.type'); ?></label> &nbsp;&nbsp;
                               
                                <input type="radio" name="type" class="type" value="course" <?php if($offer->type=="course"): ?> checked  <?php endif; ?>>  &nbsp; <?php echo app('translator')->get('site.course'); ?> &nbsp;&nbsp;
                                <input type="radio" name="type" class="type" value="package"  <?php if($offer->type=="package"): ?> checked  <?php endif; ?>>&nbsp;&nbsp; <?php echo app('translator')->get('site.package'); ?>
                        </div>
                        
                       <div class="form-group course typebox col-md-6" <?php if($offer->type!="course"): ?> style="display:none" <?php endif; ?>>
                           
                                <label><?php echo app('translator')->get('site.course'); ?></label>
                       
                                <select id="course_id" name="course_id" data-live-search="true" class="form-control" >
                                    <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php if($offer->course_id==$key): ?> selected  <?php endif; ?>>
                                        <?php echo e($course); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                        </div>
                        
                        <div class="form-group package typebox col-md-6" <?php if($offer->type!="package"): ?> style="display:none" <?php endif; ?>>
                           
                                 <label><?php echo app('translator')->get('site.packages'); ?></label>
                       
                                <select id="subscription_id" name="subscription_id" data-live-search="true" class="form-control" >
                                    <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>" <?php if($offer->subscription_id==$key): ?> selected  <?php endif; ?>>
                                        <?php echo e($package); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                        </div>
                        <div class="form-group col-md-6" >
                            <label><?php echo app('translator')->get('site.price'); ?></label>
                            <input type="text" class="form-control" name="price" id="price" readonly="">
                        </div>
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.discount_rate'); ?></label>
                       
                                <input type="text" name="discount_rate" id="discount_rate"  class="form-control" value="<?php echo e($offer->discount_rate); ?>">
                        </div>
                        <div class="form-group col-md-6" >
                             <label><?php echo app('translator')->get('site.offerprice'); ?></label>
                            <input type="text" class="form-control" name="offerprice" id="offerprice" readonly="">
                        </div>
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.start_date'); ?></label>
                       
                               <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" name="start_date" class="form-control pull-right datepicker"  value="<?php echo e(date('d-m-Y',strtotime($offer->start_date))); ?> "  required>
                                </div>
                               </div>
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.end_date'); ?></label>
                       
                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" name="end_date" class="form-control pull-right datepicker" value="<?php echo e(date('d-m-Y',strtotime($offer->end_date))); ?>" required>
                                </div>
                               </div>
                           

                        <div class="form-group col-md-6">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.update'); ?></button>
                        </div>
                       </div>
                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>
<script>
    $( document ).ready(function() {
        $(".datepicker").datepicker({
            autoclose: true,
            todayBtn: "linked",
            language: "ar",
            todayHighlight: true,
            format: 'dd-mm-yyyy'

        });
    });
</script>
<script>
$(document).ready(function(){
    $('.type').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".typebox").not(targetBox).hide();
        $('select#'+inputValue+'_id').prop('selectedIndex', 0);
        $(targetBox).show();
    });

    var type= "<?php echo e($offer->type); ?>"; 
    if(type == "consultant"){
         $("#consultant_id").trigger("change");
    }
    else if(type == "course"){
        $("#course_id").trigger("change");
    }
    else
    {
        $("#subscription_id").trigger("change");
    }
    
    
});

$("#consultant_id").on('change',function(){
    var id= $('#consultant_id').val();   
    var token = $("meta[name='csrf-token']").attr("content");
    var path='<?php echo e(url("dashboard/offers/get_consulatant_price")); ?>/'+id;
    $.ajax(
    {
        url: path,
        type: 'GET',
        data: {
            "id": id,
               '_token': '<?php echo e(csrf_token()); ?>',
        },
        success: function (data){
             $('#price').val(data);

             var discount=$("#discount_rate").val();
             if(discount>0){
                var offerprice= data - (data * discount )/100;
                $("#offerprice").val(offerprice);
             }
             
        }
    });
   });
$("#course_id").on('change',function(){
    var id= $('#course_id').val();    
    var token = $("meta[name='csrf-token']").attr("content");
    var path='<?php echo e(url("dashboard/offers/get_course_price")); ?>/'+id;
    $.ajax(
    {
        url: path,
        type: 'GET',
        data: {
            "id": id,
               '_token': '<?php echo e(csrf_token()); ?>',
        },
        success: function (data){
           $('#price').val(data); 
           var discount=$("#discount_rate").val();
             if(discount>0){
                var offerprice= data - (data * discount )/100;
                $("#offerprice").val(offerprice);
             }  
        }
    });
   });
   
$("#subscription_id").on('change',function(){
    var id= $('#subscription_id').val();    
    var token = $("meta[name='csrf-token']").attr("content");
    var path='<?php echo e(url("dashboard/offers/get_package_price")); ?>/'+id;
    $.ajax(
    {
        url: path,
        type: 'GET',
        data: {
            "id": id,
               '_token': '<?php echo e(csrf_token()); ?>',
        },
        success: function (data){
           $('#price').val(data); 
           var discount=$("#discount_rate").val();
             if(discount>0){
                var offerprice= data - (data * discount )/100;
                $("#offerprice").val(offerprice);
             }  
        }
    });
   });
$("#discount_rate").on('input', function(){
    var price=$('#price').val(); 
           var discount=$("#discount_rate").val();
             if(discount>0){
                var offerprice= price -(price * discount )/100;
                $("#offerprice").val(offerprice);
             } 
             else{
                $("#offerprice").val(0);
             } 

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Offers/Resources/views/offer/edit.blade.php ENDPATH**/ ?>