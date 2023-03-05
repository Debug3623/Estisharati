

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

    <section class="content-header">

        <h1><?php echo app('translator')->get('site.send_email'); ?></h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a>
            </li>
            <li><a href="<?php echo e(route('dashboard.courses.index')); ?>"> <?php echo app('translator')->get('site.send_email'); ?></a></li>
            <li class="active"><?php echo app('translator')->get('site.send_email'); ?></li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title"><?php echo app('translator')->get('site.send_email'); ?></h3>
            </div><!-- end of box header -->
            <div class="box-body row">
                <div id="errors" class="alert alert-danger" hidden>
                </div>
                <?php echo $__env->make('partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form id="courseform" action="<?php echo e(route('dashboard.emails.store')); ?>" method="post">

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('post')); ?>

                    
                   
                   <div class="col-md-12">
                       
                           <div class="form-group col-md-12">
                           
                                <label><?php echo app('translator')->get('site.email_to'); ?> </label>&nbsp;&nbsp;
                                <input type="radio" name="type" class="type" value="all_users"> All Users &nbsp;&nbsp;
                                <input type="radio" name="type" class="type" value="selected_users" checked> Selected Users

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
                            <div class="form-group col-md-12">
                                <label><?php echo app('translator')->get('site.en.title'); ?></label>
                                <input type="text" name="subject" class="form-control" value="<?php echo e(old('subject')); ?>">
                            </div>                           
                     
                            <div class="form-group col-md-12">
                               
                                <label><?php echo app('translator')->get('site.body'); ?></label>
                                
                                <textarea name="body" class="form-control required" required><?php echo e(old('body')); ?></textarea>
                            </div>                            
                    
                   <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> <?php echo app('translator')->get('site.send_email'); ?></button>
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
        $("textarea").ckeditor();
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
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/resources/views/dashboard/emails/index.blade.php ENDPATH**/ ?>