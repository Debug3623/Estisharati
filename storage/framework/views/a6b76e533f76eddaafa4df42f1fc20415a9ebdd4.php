

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

    <section class="content-header">

        <h1><?php echo app('translator')->get('site.chapter'); ?></h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a>
            </li>
            <li><a href="<?php echo e(route('dashboard.courses.index')); ?>"> <?php echo app('translator')->get('site.chapter'); ?></a></li>
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

                 <form method="post" action="<?php echo e(route('dashboard.courses.store_chapter_title')); ?>" enctype="multipart/form-data">

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('post')); ?>

                   <input type="hidden" name="course_id" value=<?php echo e($id); ?>>
                   <div class="col-md-12" style="margin-top: 3%;"> 
                        
                        <div class="form-group col-md-3" style="text-align: right;">
                            <label><?php echo app('translator')->get('site.chapter_title'); ?></label>    
                        </div>
                        <div class="form-group col-md-9">             
                            <input type="text" name="chapter_title" id="chapter_title" class="form-control" required />
                        </div>
                        
                </form><!-- end of form -->
                <div class="form-group col-md-12" style="text-align: center;">
                    <button  id="check_course" type="submit" class="btn btn-primary"> <i class="fa fa-floppy-o" aria-hidden="true"></i>  <?php echo app('translator')->get('site.add'); ?></button>
                </div>
            </div><!-- end of box body -->

        </div><!-- end of box -->

    </section><!-- end of content -->

</div><!-- end of content wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Courses/Resources/views/course/addchapter.blade.php ENDPATH**/ ?>