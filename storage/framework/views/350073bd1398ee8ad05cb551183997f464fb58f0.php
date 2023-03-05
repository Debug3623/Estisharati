

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.pages'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li><a href="<?php echo e(route('dashboard.pages.index')); ?>"> <?php echo app('translator')->get('site.pages'); ?></a></li>
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

                    <form action="<?php echo e(route('dashboard.pages.update', $page->id)); ?>" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="page_id" class="form-control"  value="<?php echo e($page->id); ?>">

                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('put')); ?>

                        <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group">
                                <?php if(count(config('translatable.locales'))>1): ?>
                                    <label><?php echo app('translator')->get('site.' . $locale . '.name'); ?></label>
                                <?php else: ?>
                                    <label><?php echo app('translator')->get('site.name'); ?></label>
                                <?php endif; ?>
                                <input type="text" name="<?php echo e($locale); ?>[name]" class="form-control"  value="<?php echo e($page->translate($locale)->name); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group">
                                <?php if(count(config('translatable.locales'))>1): ?>
                                    <label><?php echo app('translator')->get('site.' . $locale . '.title'); ?></label>
                                <?php else: ?>
                                    <label><?php echo app('translator')->get('site.title'); ?></label>
                                <?php endif; ?>
                                <input type="text" name="<?php echo e($locale); ?>[title]" class="form-control"  value="<?php echo e($page->translate($locale)->title); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group">
                                <?php if(count(config('translatable.locales'))>1): ?>
                                    <label><?php echo app('translator')->get('site.' . $locale . '.content'); ?></label>
                                <?php else: ?>
                                    <label><?php echo app('translator')->get('site.content'); ?></label>
                                <?php endif; ?>
                                <textarea class="textarea ckeditor" name="<?php echo e($locale); ?>[content]" row="5"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo e(strip_tags( $page->translate($locale)->content)); ?></textarea>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group">
                            <label><?php echo app('translator')->get('site.slug'); ?></label>
                            <input type="text" name="slug" class="form-control" value="<?php echo e($page->slug); ?>"  readonly>
                        </div>


                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

<?php $__env->stopSection(); ?>
<script>
    // $(document).ready(function() {
    //     $('.textarea').summernote({
    //         // set editor height
    //         minHeight: 300,             // set minimum height of editor
    //         // maxHeight: 300,
    //     });
    // });
</script>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Pages/Resources/views/pages/edit.blade.php ENDPATH**/ ?>