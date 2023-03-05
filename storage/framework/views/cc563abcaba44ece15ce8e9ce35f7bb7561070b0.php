

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

                 <form method="post" action="<?php echo e(route('dashboard.courses.update_chapter')); ?>" >

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('post')); ?>

                   <input type="hidden" name="chapter_id" value=<?php echo e($id); ?>>
                   <div class="col-md-12" style="margin-top: 3%;"> 
                        
                        <div class="form-group col-md-3" style="text-align: right;">
                            <label><?php echo app('translator')->get('site.chapter_title'); ?></label>    
                        </div>
                        <div class="form-group col-md-9">             
                            <input type="text" name="chapter_name" class="form-control" value="<?php echo e($chapter->chapter_title); ?>" required />
                        </div>
                        
                </form><!-- end of form -->
                <div class="form-group col-md-12" style="text-align: center;">
                    <button  id="check_course" type="submit" class="btn btn-primary"> <i class="fa fa-edit" aria-hidden="true"></i> <?php echo app('translator')->get('site.edit'); ?></button>
                </div>
            </div><!-- end of box body -->

        </div><!-- end of box -->

    </section><!-- end of content -->

</div><!-- end of content wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/apptdhaz/public_html/estisharati/Modules/Courses/Resources/views/course/editchapter.blade.php ENDPATH**/ ?>