

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1><?php echo app('translator')->get('site.slider'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li><a href="<?php echo e(route('dashboard.slider.index')); ?>"> <?php echo app('translator')->get('site.slider'); ?></a></li>
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

                    <form action="<?php echo e(route('dashboard.slider.store')); ?>" method="post" enctype="multipart/form-data">

                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('post')); ?>


                       <div class="form-group col-md-12">


                                <label><?php echo app('translator')->get('site.choose_slider_type'); ?></label>&nbsp;&nbsp;
                                <input type="radio" name="type" class="type" value="course"> <?php echo app('translator')->get('site.course'); ?> &nbsp;&nbsp;
                                <input type="radio" name="type" class="type" value="consultant"> <?php echo app('translator')->get('site.consultant'); ?>&nbsp;&nbsp;
                                <input type="radio" name="type" class="type" value="package"> <?php echo app('translator')->get('site.packages'); ?>&nbsp;&nbsp;
                                <input type="radio" name="type" class="type" value="external_link"> <?php echo app('translator')->get('site.external_link'); ?>&nbsp;&nbsp;
                                <input type="radio" name="type" class="type" value="ask_for_your_advice_here"> <?php echo app('translator')->get('site.ask_for_your_advice_here'); ?>&nbsp;&nbsp;
                                <input type="radio" name="type" class="type" value="our_courses"> <?php echo app('translator')->get('site.our_courses'); ?>&nbsp;&nbsp;
                                <input type="radio" name="type" class="type" value="analyze_your_personality"> <?php echo app('translator')->get('site.analyze_your_personality'); ?>&nbsp;&nbsp;
                                <input type="radio" name="type" class="type" value="show_only" checked> <?php echo app('translator')->get('site.show_only'); ?>&nbsp;&nbsp;
                        </div>

                        <div class="form-group course typebox col-md-12" style="display:none">

                                <label><?php echo app('translator')->get('site.course'); ?></label>

                                <select id="course_id" name="course_id" class="form-control" >
                                    <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>">
                                        <?php echo e($course); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                        </div>
                        <div class="form-group consultant typebox col-md-12" style="display:none">

                                <label><?php echo app('translator')->get('site.consultants'); ?></label>

                                <select id="consultant_id" name="consultant_id" class="form-control" >
                                    <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                                    <?php $__currentLoopData = $consultants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $consultant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>">
                                        <?php echo e($consultant); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                        </div>

                        <div class="form-group package typebox col-md-12" style="display:none">

                            <label><?php echo app('translator')->get('site.packages'); ?></label>

                            <select id="package_id" name="package_id" class="form-control" >
                                <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>">
                                    <?php echo e($package); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group external_link typebox col-md-12" style="display:none">

                                <label><?php echo app('translator')->get('site.url'); ?></label>

                                <input type="text" name="url" class="form-control"value="<?php echo e(old('url')); ?>">
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

                                <label><?php echo app('translator')->get('site.en.description'); ?></label>

                                <textarea name="description_en" class="form-control"> <?php echo e(old('description_en')); ?></textarea>
                        </div>
                        <div class="form-group col-md-6">

                                <label><?php echo app('translator')->get('site.ar.description'); ?></label>

                                <textarea name="description_ar" class="form-control"><?php echo e(old('description_ar')); ?></textarea>
                        </div>

                        <div class="form-group col-md-6">

                                <label><?php echo app('translator')->get('site.image'); ?></label>

                                 <input type="file" name="image" id="image" class="form-control image" accept="image/*">
                        </div>
                        <div class="form-group col-md-12">
                            <img src="<?php echo e(asset('public/uploads/courses_files/default.png')); ?>"  style="width: 100px"
                                class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo app('translator')->get('site.add'); ?></button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->
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

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Slider/Resources/views/slider/create.blade.php ENDPATH**/ ?>