<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1><?php echo app('translator')->get('site.coupon'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li><a href="<?php echo e(route('dashboard.coupons.index')); ?>"> <?php echo app('translator')->get('site.coupon'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.add'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title"><?php echo app('translator')->get('site.add'); ?></h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    <?php echo $__env->make('partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <form action="<?php echo e(route('dashboard.coupons.store')); ?>" method="post">

                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('post')); ?>

                    <div class="col-md-12">
                        <div class="form-group col-md-6">                           
                                <label><?php echo app('translator')->get('site.en.title'); ?></label>
                                <input type="text" name="title_en" class="form-control" value=" <?php echo e(old('title_en')); ?>"> 
                        </div>
                        <div class="form-group col-md-6">                           
                                <label><?php echo app('translator')->get('site.ar.title'); ?></label>
                                <input type="text" name="title_ar" class="form-control" value=" <?php echo e(old('title_ar')); ?>"> 
                        </div>
                        <div class="form-group col-md-6">                           
                                <label><?php echo app('translator')->get('site.en.description'); ?></label>
                                <textarea name="description_en" class="form-control"><?php echo e(old('description_en')); ?> </textarea> 
                        </div>
                        <div class="form-group col-md-6">                           
                                <label><?php echo app('translator')->get('site.ar.description'); ?></label>
                                <textarea name="description_ar" class="form-control"><?php echo e(old('description_ar')); ?> </textarea> 
                        </div>
                        <div class="form-group col-md-6">                           
                                <label><?php echo app('translator')->get('site.code'); ?></label>

                                <div class="input-group col-md-12">
                                    <input type="text" name="code" id="code" class="form-control" value=" <?php echo e(old('code')); ?>"> 
                                    <span class="input-group-btn">
                                       <button type="button" onclick="getpromocode()"  class="btn btn-success" style="height: 45px;">Generate</button>
                                    </span>
                                </div>                  
          
                        </div>
                        
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.discount_rate'); ?></label>
                       
                                <input type="text" name="discount_rate" class="form-control" value="<?php echo e(old('discount_rate')); ?>">
                        </div>
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.count'); ?></label>
                       
                                <input type="text" name="count" class="form-control" value="<?php echo e(old('count')); ?>">
                        </div>
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.start_date'); ?></label>
                       
                               <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" name="start_at" class="form-control pull-right datepicker"  value="<?php echo e(old('start_at')); ?>" required>
                                </div>
                               </div>
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.valid_to'); ?></label>
                       
                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" name="valid_to" class="form-control pull-right datepicker" value="<?php echo e(old('valid_to')); ?>" required>
                                </div>
                               </div>
                        </div>                        
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo app('translator')->get('site.add'); ?></button>
                        </div>
                    </form>
                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />

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
});
</script>
 <script type="text/javascript">
   
     function getpromocode() {
         var length = 8;
       $.ajax({    
      url: "<?php echo e(route('dashboard.coupons.get_coupon')); ?>",
     method: 'get',
    // data: {type:'coupon_action',length: length},
     dataType: 'html',
     success: function(response){
       response=response.replace(/(\r\n|\n|\r)/gm,"");
         $('#code').val(response);
          
     }
     });
  }
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Coupons/Resources/views/coupon/create.blade.php ENDPATH**/ ?>