

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

    <section class="content-header">

        <h1><?php echo app('translator')->get('site.chapter'); ?></h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a>
            </li>
            <li><a href="<?php echo e(route('dashboard.courses.index')); ?>"> <?php echo app('translator')->get('site.chapter'); ?></a></li>
            <li class="active"><?php echo app('translator')->get('site.edit'); ?></li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo app('translator')->get('site.edit'); ?></h3>
            </div><!-- end of box header -->
            <div class="box-body row">
                <div id="errors" class="alert alert-danger" hidden>
                </div>
                <?php echo $__env->make('partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  

                  <form id="courseform" method="post" action="<?php echo e(route('dashboard.courses.update_lesson')); ?>" enctype="multipart/form-data">

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('post')); ?>

                   <div class="col-md-12">
                   
                        <div class="form-group col-md-3" style="text-align: right;">
                          <label><?php echo app('translator')->get('site.select_chapter'); ?></label>
                        </div>
                        <div class="form-group col-md-9" style="text-align: left;">
                            <input type="hidden" name="lesson_id" value=<?php echo e($id); ?>>
                            <select id="chapter_id" name="chapter_id" class="form-control"required>
                                <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                                <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>"  <?php if($lesson->chapter_id==$key): ?> selected  <?php endif; ?>>
                                   <?php echo e($chapter); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            
                        </div>  
                        <div class="form-group col-md-3" style="text-align: right;">
                            <label><?php echo app('translator')->get('site.lesson_title'); ?></label>
                        </div>
                        <div class="form-group col-md-9" style="text-align: left;">
                            <input type="text" name="lesson_name" class="form-control" value="<?php echo e($lesson->title); ?>" required/>
                        </div>  
                        <div class="form-group col-md-3" style="text-align: right;">
                            <label><?php echo app('translator')->get('site.lesson_file'); ?></label>
                        </div>
                        <div class="form-group col-md-7" style="text-align: left;">
                            <input type="file" name="lesson_file" id="lesson_file" class="form-control" />
                        </div>  
                        <div class="form-group col-md-2" style="text-align: left;">
                        <a href="<?php echo e(asset('public/uploads/courses_files/'.$lesson->filename)); ?>" class="<?php echo e($key); ?> editItem btn btn-primary btn-circle btn-sm" target="_blank">
                                                                    <i class="fa fa-eye"> <?php echo app('translator')->get('site.preview_file'); ?></i>
                                                             </a>
                        </div>
                </form><!-- end of form -->
                <div class="form-group col-md-12" style="text-align: center;">
                    <button type="submit" class="btn btn-primary"> <i class="fa fa-edit" aria-hidden="true"></i> <?php echo app('translator')->get('site.edit'); ?></button>
                </div>
            </div><!-- end of box body -->

        </div><!-- end of box -->

    </section><!-- end of content -->

</div><!-- end of content wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/apptdhaz/public_html/estisharati/Modules/Courses/Resources/views/course/editlesson.blade.php ENDPATH**/ ?>