

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

    <section class="content-header">

        <h1><?php echo app('translator')->get('site.courses'); ?></h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a>
            </li>
            <li><a href="<?php echo e(route('dashboard.courses.index')); ?>"> <?php echo app('translator')->get('site.courses'); ?></a></li>
            <li class="active"><?php echo app('translator')->get('site.add'); ?></li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title"><?php echo app('translator')->get('site.add'); ?></h3>
            </div><!-- end of box header -->
            <div class="box-body row">
                <div id="errors" class="alert alert-danger" hidden>
                </div>
                <?php echo $__env->make('partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form id="courseform" action="<?php echo e(route('dashboard.courses.store')); ?>" method="post" enctype="multipart/form-data">

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('post')); ?>

                   <div class="col-md-12">
                        <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group col-md-6">
                                <?php if(count(config('translatable.locales'))>1): ?> 
                                    <label><?php echo app('translator')->get('site.' . $locale . '.name'); ?></label>
                                <?php else: ?>
                                <label><?php echo app('translator')->get('site.name'); ?></label>
                                <?php endif; ?>
                                <input type="text" name="<?php echo e($locale); ?>[name]" class="form-control required" value="<?php echo e(old($locale . '.name')); ?>" required> 
                            </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                      <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group col-md-6">
                                <?php if(count(config('translatable.locales'))>1): ?> 
                                    <label><?php echo app('translator')->get('site.' . $locale . '.description'); ?></label>
                                <?php else: ?>
                                <label><?php echo app('translator')->get('site.description'); ?></label>
                                <?php endif; ?>
                                <textarea name="<?php echo e($locale); ?>[description]" class="form-control required" required><?php echo e(old($locale . '.description')); ?></textarea>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="form-group col-md-3">
                            <label><?php echo app('translator')->get('site.category'); ?></label>
                            <select id="category_id" name="category_id" class="form-control required" required>
                                <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>">
                                    <?php echo e($value); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label><?php echo app('translator')->get('site.period'); ?></label>
                             <select id="period" name="period" class="form-control required" required>
                                <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                                <option value="One time" ><?php echo app('translator')->get('site.one_time'); ?></option>
                                <option value="One month" ><?php echo app('translator')->get('site.one_month'); ?></option>
                                <option value="Six months"><?php echo app('translator')->get('site.six_months'); ?></option>
                                <option value="Yearly")  ><?php echo app('translator')->get('site.yearly'); ?></option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label><?php echo app('translator')->get('site.price'); ?></label>
                            <input min="0" max="10000" step="1" type="number" name="price" class="form-control required" value="<?php echo e(old('price')); ?>"required>
                        </div>
                        <div class="form-group col-md-3">
                            <label><?php echo app('translator')->get('site.course_duration'); ?></label>
                            <input type="text" name="course_duration" class="form-control required" value="<?php echo e(old('duration')); ?>"required>
                        </div>

                        <!-- <div class="form-group col-md-6" >
                            <label><?php echo app('translator')->get('site.effective_date'); ?></label>
                            <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="effective_date" class="form-control pull-right" id="datepicker" value="<?php echo e(old('effective_date')); ?>" required>
                            </div>
                        </div> -->
                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('site.image'); ?></label>
                            <input type="file" name="image" id="image" class="form-control image" accept="image/*">
                        </div>
                        <div class="form-group col-md-6">
                            <img src="<?php echo e(asset('public/uploads/courses_files/default.png')); ?>"  style="width: 100px"
                                class="img-thumbnail image-preview" alt="">
                        </div>
                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('site.preview_video'); ?></label>
                            <input type="file" name="preview_video" id="preview_video" class="form-control video" accept="video/*">
                        </div>
                       <!-- <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('site.select_consultants'); ?></label>

                            <select class="form-control selectpicker" multiple data-live-search="true" name="consultants[]">
                                  
                                        <?php $__currentLoopData = $consultants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>">
                                            <?php echo e($value); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                        </div> -->
                        
                    

                    
                    <div hidden class="form-group col-md-12" style="text-align: center;">
                        <button id="add_course" type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            <?php echo app('translator')->get('site.add'); ?></button>
                    </div>

                </form><!-- end of form -->
                <div class="form-group col-md-12" style="text-align: center;">
                    <button  id="check_course" type="submit" class="btn btn-primary"> <?php echo app('translator')->get('site.add'); ?></button>
                </div>
            </div><!-- end of box body -->

        </div><!-- end of box -->

    </section><!-- end of content -->

</div><!-- end of content wrapper -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> -->
<script src="http://malsup.github.com/jquery.form.js"></script>

<!-- Initialize the plugin: -->
<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>
<script>
         
        // $('.textarea').ckeditor(); // if class is prefered.
  
         $( document ).ready( function() {
           $("textarea").ckeditor();
        } );

</script>

    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Courses/Resources/views/course/create.blade.php ENDPATH**/ ?>