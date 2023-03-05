<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1><?php echo app('translator')->get('site.faq'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li><a href="<?php echo e(route('dashboard.offers.index')); ?>"> <?php echo app('translator')->get('site.faq'); ?></a></li>
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

                    <form action="<?php echo e(route('dashboard.faqs.store')); ?>" method="post">

                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('post')); ?>


                        <div class="form-group">
                           
                                <label><?php echo app('translator')->get('site.type'); ?></label>
                                <input type="radio" name="type" class="type" value="consultant"> consultant
                                <input type="radio" name="type" class="type" value="user" checked> User

                        </div>

                       
                        
                        <div class="form-group">
                           
                                <label><?php echo app('translator')->get('site.en.title'); ?></label>
                       
                                <input type="text" name="title_en" class="form-control" value="<?php echo e(old('title_en')); ?>">
                        </div>
                        <div class="form-group">
                           
                                <label><?php echo app('translator')->get('site.ar.title'); ?></label>
                       
                                <input type="text" name="title_ar" class="form-control" value="<?php echo e(old('title_ar')); ?>">
                        </div>
                         <div class="form-group">
                           
                                <label><?php echo app('translator')->get('site.en.description'); ?></label>
                       
                                <textarea name="description_en" class="form-control"><?php echo e(old('description_en')); ?> </textarea>
                        </div>
                         <div class="form-group">
                           
                                <label><?php echo app('translator')->get('site.ar.description'); ?></label>
                       
                                <textarea name="description_ar" class="form-control"><?php echo e(old('description_ar')); ?> </textarea>
                        </div>
                                           
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo app('translator')->get('site.add'); ?></button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Faqs/Resources/views/faq/create.blade.php ENDPATH**/ ?>