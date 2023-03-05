

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.roles'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li><a href="<?php echo e(route('dashboard.roles.index')); ?>"> <?php echo app('translator')->get('site.roles'); ?></a></li>
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

                    <form action="<?php echo e(route('dashboard.roles.update', $role->id)); ?>" method="post" enctype="multipart/form-data">

                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('put')); ?>


                        <div class="form-group">
                            <label><?php echo app('translator')->get('site.name'); ?></label>
                            <input type="text" name="name" class="form-control" value="<?php echo e($role->name); ?>">
                        </div>

                        <div class="form-group">
                            <label><?php echo app('translator')->get('site.display_name'); ?></label>
                            <input type="text" name="display_name" class="form-control" value="<?php echo e($role->display_name); ?>">
                        </div>
                        <div class="form-group">
                            <label><?php echo app('translator')->get('site.description'); ?></label>
                            <input type="text" name="description" class="form-control" value="<?php echo e($role->description); ?>">
                        </div>


                        <div class="form-group">
                            <h3><?php echo app('translator')->get('site.permissions'); ?></h3>
                            <div class="form-group">

                                <ul class="nav ">
                                <table class="table table-hover table-bordered">

          
                                    <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                    <td>
                                          <li class="form-group <?php echo e($index == 0 ? 'active' : ''); ?>"><?php echo app('translator')->get('site.' . $model); ?></li>
                                          </td>
                                          <td>

                                        <div class="form-group <?php echo e($index == 0 ? 'active' : ''); ?>" id="<?php echo e($model); ?>">

                                            <?php $__currentLoopData = $maps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $map): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label><input type="checkbox" name="permissions[]" <?php echo e($role->hasPermission($map . '_' . $model) ? 'checked' : ''); ?> value="<?php echo e($map . '_' . $model); ?>"> <?php echo app('translator')->get('site.' . $map); ?></label>


                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </div>
                                            </td>

                                    </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                                </ul>
                                
                                <div class="tab-content">


                                </div><!-- end of tab content -->
                                
                            </div><!-- end of nav tabs -->
                            
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/resources/views/dashboard/roles/edit.blade.php ENDPATH**/ ?>