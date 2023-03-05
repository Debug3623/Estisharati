

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.subscriptions'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.subscriptions'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px"><?php echo app('translator')->get('site.subscriptions'); ?> (<small><?php echo e($subscriptions->total()); ?></small>)</h3>

                    <form action="<?php echo e(route('dashboard.subscriptions.index')); ?>" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->get('site.search'); ?>" value="<?php echo e(request()->search); ?>">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo app('translator')->get('site.search'); ?></button>
                                <?php if(auth()->user()->hasPermission('create_subscriptions')): ?>
                                    <a href="<?php echo e(route('dashboard.subscriptions.create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo app('translator')->get('site.add'); ?></a>
                                
                                <?php endif; ?>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body table-responsive no-padding on-overflow-x minHeight">

                    <?php if($subscriptions->count() > 0): ?>

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>Id</th>
                                <th><?php echo app('translator')->get('site.name'); ?></th>
                                <th><?php echo app('translator')->get('site.price'); ?></th>
                                <th><?php echo app('translator')->get('site.type'); ?></th>
                                <th><?php echo app('translator')->get('site.period'); ?></th>
                                
                                <th><?php echo app('translator')->get('site.status'); ?></th>
                                <?php if(auth()->user()->hasPermission('update_subscriptions','delete_subscriptions')): ?>

                                <th><?php echo app('translator')->get('site.action'); ?></th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($subscription->id); ?></td>
                                    <td style="cursor: pointer;" >
                                       
                                        <a href="<?php echo e(route('dashboard.subscriptions.show', $subscription->id)); ?>">    <?php echo e($subscription->name); ?></a></span>
                                    </td>
                                    <td><?php echo e($subscription->price); ?></td>
                                    <td><?php echo e($subscription->type); ?></td>
                                    <td><?php echo e($subscription->period); ?></td>
                                    
                                    <?php if( $subscription->status==0): ?>
                                    <td style="margin: 5px;" class="badge bg-red"><?php echo app('translator')->get('site.inactive'); ?></td>
                                    <?php elseif( $subscription->status==1): ?>
                                    <td style="margin: 5px;" class="badge bg-green"><?php echo app('translator')->get('site.active'); ?></td>
                                    <?php endif; ?>
                                    
                                    <td>
                                        
                                        <?php if(auth()->user()->hasPermission('update_subscriptions')): ?>
                                            <a href="<?php echo e(route('dashboard.subscriptions.edit', $subscription->id)); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></a>
                                        
                                        <?php endif; ?>

                                        <?php if(auth()->user()->hasPermission('update_subscriptions')): ?>
                                            <form action="<?php echo e(route('dashboard.subscriptions.block', $subscription->id)); ?>" method="post" style="display: inline-block">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('POST')); ?>

                                                
                                                <?php if( $subscription->status==1): ?>
                                                <button type="submit" class="btn btn-warning update btn-sm">
                                                    <i class="fa fa-ban"></i> <?php echo app('translator')->get('site.block'); ?>
                                                </button>    
                                                <?php elseif( $subscription->status==0): ?>
                                                <button type="submit" class="btn btn-default update btn-sm">
                                                    <i class="fa fa-check-square-o"></i> <?php echo app('translator')->get('site.activate'); ?>
                                                </button>
                                                <?php endif; ?>
                                                
                                            </form><!-- end of form -->
                                        
                                        <?php endif; ?>

                                        <?php if(auth()->user()->hasPermission('delete_subscriptions')): ?>
                                            <form action="<?php echo e(route('dashboard.subscriptions.destroy', $subscription->id)); ?>" method="post" style="display: inline-block">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('delete')); ?>

                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                                            </form><!-- end of form -->
                                        
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table><!-- end of table -->
                        <div style="text-align:center;">
                            <?php echo e($subscriptions->appends(request()->query())->links()); ?>

                        </div>
                        
                    <?php else: ?>
                        
                        <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                        
                    <?php endif; ?>

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/apptdhaz/public_html/estisharati/Modules/Subscriptions/Resources/views/subscription/index.blade.php ENDPATH**/ ?>