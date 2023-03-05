

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

    <section class="content-header">

        <h1><?php echo app('translator')->get('site.notifications'); ?></h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a>
            </li>
            <li><a href="<?php echo e(route('dashboard.courses.index')); ?>"> <?php echo app('translator')->get('site.notifications'); ?></a></li>
            <li class="active"><?php echo app('translator')->get('site.send_push_notification'); ?></li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title"><?php echo app('translator')->get('site.send_push_notification'); ?></h3>
            </div><!-- end of box header -->
            <div class="box-body row">
                <div id="errors" class="alert alert-danger" hidden>
                </div>
                <?php echo $__env->make('partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form id="courseform" action="<?php echo e(route('dashboard.notifications.store')); ?>" method="post">

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('post')); ?>

                    
                   
                   <div class="col-md-12">
                       
                           <div class="form-group col-md-12">
                           
                                <label><?php echo app('translator')->get('site.notification_to'); ?> </label>&nbsp;&nbsp;
                                <input type="radio" name="type" class="type" value="all_users"> &nbsp;<?php echo app('translator')->get('site.all_users'); ?>  &nbsp;&nbsp;
                                <input type="radio" name="type" class="type" value="selected_users" checked>  &nbsp;<?php echo app('translator')->get('site.selected_users'); ?>

                           </div>  
                           <div class="form-group col-md-12 selected_users typebox" >
                           
                                <label><?php echo app('translator')->get('site.select_users'); ?></label>
                       
                                <select class="form-control selectpicker" multiple data-live-search="true" id="user_id" name="user_id[]">
                                    
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>">
                                        <?php echo e($user); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                           </div>
                            <div class="form-group col-md-6">
                                <label><?php echo app('translator')->get('site.en.title'); ?></label>
                                <input type="text" name="title_en" class="form-control" value="<?php echo e(old('title_en')); ?>">
                            </div>
                             <div class="form-group col-md-6">
                                <label><?php echo app('translator')->get('site.ar.title'); ?></label>
                                <input type="text" name="title_ar" class="form-control" value="<?php echo e(old('title_ar')); ?>">
                            </div>
                     
                            <div class="form-group col-md-6">
                               
                                <label><?php echo app('translator')->get('site.en.body'); ?></label>
                                
                                <textarea name="body_en" class="form-control required" required><?php echo e(old('body_en')); ?></textarea>
                            </div>
                             <div class="form-group col-md-6">
                               
                                <label><?php echo app('translator')->get('site.ar.body'); ?></label>
                                
                                <textarea name="body_ar" class="form-control required" required><?php echo e(old('body_ar')); ?></textarea>
                            </div>
                    
                   <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> <?php echo app('translator')->get('site.send_push_notification'); ?></button>
                   </div>

                </form><!-- end of form -->
               
            </div><!-- end of box body -->

        </div><!-- end of box -->

    </section><!-- end of content -->

</div><!-- end of content wrapper -->
<script src="http://malsup.github.com/jquery.form.js"></script>

<!-- Initialize the plugin: -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/resources/views/dashboard/notifications/index.blade.php ENDPATH**/ ?>