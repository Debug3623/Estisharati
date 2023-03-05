

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.pages'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.pages'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px"><?php echo app('translator')->get('site.pages'); ?> <small><?php echo e($pages->total()); ?></small></h3>

                    <form action="<?php echo e(route('dashboard.pages.index')); ?>" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->get('site.search'); ?>" value="<?php echo e(request()->search); ?>">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo app('translator')->get('site.search'); ?></button>
                              

                                    <a href="<?php echo e(route('dashboard.pages.create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo app('translator')->get('site.add'); ?></a>
                                
                             
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    <?php if($pages->count() > 0): ?>

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('site.name'); ?></th>
                                <th><?php echo app('translator')->get('site.slug'); ?></th>
                                <th><?php echo app('translator')->get('site.active'); ?></th>
                                <?php if(auth()->user()->hasPermission('update_pages','delete_pages')): ?>

                                <th><?php echo app('translator')->get('site.action'); ?></th>
                                <?php endif; ?>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($value->name); ?></td>
                                    <td><?php echo e($value->slug); ?></td>
                                    <td>    <form action="<?php echo e(route('dashboard.pages.status', $value->id)); ?>" method="post" style="display: inline-block">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field('POST')); ?>


                                            <?php if( $value->active==1): ?>
                                                <button type="submit" class="btn btn-success update btn-sm">
                                                    <i class="fa fa-check"></i> <?php echo app('translator')->get('site.active'); ?>
                                                </button>
                                            <?php elseif( $value->active==0): ?>
                                                <button type="submit" class="btn btn-danger update btn-sm">
                                                    <i class="fa fa-close"></i> <?php echo app('translator')->get('site.in_active'); ?>
                                                </button>
                                            <?php endif; ?>

                                        </form><!-- end of form -->
                                    </td>
                                    <td>
                                     
                                            <a href="<?php echo e(route('dashboard.pages.edit', $value->id)); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></a>
                                        
                                      
                                            <form action="<?php echo e(route('dashboard.pages.destroy', $value->id)); ?>" method="post" style="display: inline-block">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('delete')); ?>

                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                                            </form><!-- end of form -->
                                        
                                    </td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table><!-- end of table -->

                        <?php echo e($pages->appends(request()->query())->links()); ?>


                    <?php else: ?>

                        <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>

                    <?php endif; ?>

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/apptdhaz/public_html/estisharati/Modules/Pages/Resources/views/pages/index.blade.php ENDPATH**/ ?>