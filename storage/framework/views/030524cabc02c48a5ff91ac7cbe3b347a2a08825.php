

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.categories'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.categories'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px"><?php echo app('translator')->get('site.categories'); ?> <small><?php echo e($categories->total()); ?></small></h3>

                    <form action="<?php echo e(route('dashboard.categories.index')); ?>" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->get('site.search'); ?>" value="<?php echo e(request()->search); ?>">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo app('translator')->get('site.search'); ?></button>
                                <?php if(auth()->user()->hasPermission('create_categories')): ?>

                                    <a href="<?php echo e(route('dashboard.categories.create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo app('translator')->get('site.add'); ?></a>
                                
                                <?php endif; ?>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">
                    <?php echo $__env->make('partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    <?php if($categories->count() > 0): ?>

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('site.name'); ?></th>
                                
                                <?php if(auth()->user()->hasPermission('update_categories','delete_categories')): ?>

                                <th><?php echo app('translator')->get('site.action'); ?></th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="clickable" data-toggle="collapse" id="row1" data-target=".<?php echo e($index); ?>">
                                    <td><i class="fa fa-chevron-circle-down btn-sm btn-primary" aria-hidden="true"></i></td>
                                    <td><?php echo e($category->name); ?></td>
                                    
                                    <td>
                                        <?php if(auth()->user()->hasPermission('update_categories')): ?>
                                            <a href="<?php echo e(route('dashboard.categories.edit', $category->id)); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></a>
                                        
                                        <?php endif; ?>
                                        <?php if(auth()->user()->hasPermission('delete_categories')): ?>
                                            <form action="<?php echo e(route('dashboard.categories.destroy', $category->id)); ?>" method="post" style="display: inline-block">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('delete')); ?>

                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                                            </form><!-- end of form -->
                                        
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                 
                                 <?php $__currentLoopData = $category->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index2=>$sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="clickable collapse <?php echo e($index); ?>" data-toggle="collapse" id="row3" data-target=".row3">
                                    <td>|__</td>
                                    <td><?php echo e($sub->name); ?></td>
                                    
                                    <td>
                                        <?php if(auth()->user()->hasPermission('update_categories')): ?>
                                            <a href="<?php echo e(route('dashboard.categories.edit', $sub->id)); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></a>
                                        
                                        <?php endif; ?>
                                        <?php if(auth()->user()->hasPermission('delete_categories')): ?>
                                            <form action="<?php echo e(route('dashboard.categories.destroy', $sub->id)); ?>" method="post" style="display: inline-block">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('delete')); ?>

                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                                            </form><!-- end of form -->
                                        
                                        <?php endif; ?>
                                    </td>
                               </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table><!-- end of table -->
                        
                        <?php echo e($categories->appends(request()->query())->links()); ?>

                        
                    <?php else: ?>
                        
                        <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                        
                    <?php endif; ?>

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/resources/views/dashboard/categories/index.blade.php ENDPATH**/ ?>