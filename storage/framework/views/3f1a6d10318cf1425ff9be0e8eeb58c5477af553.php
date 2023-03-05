

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.sales'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.sales'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px"><?php echo app('translator')->get('site.sales'); ?> <small><?php echo e($sales->total()); ?></small></h3>
                    
                </div><!-- end of box header -->

                <div class="box-body">

                    <?php if($sales->count() > 0): ?>

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('site.type'); ?></th>
                                <th><?php echo app('translator')->get('site.user'); ?></th>
                                <th><?php echo app('translator')->get('site.amount'); ?></th>
                                <th><?php echo app('translator')->get('site.date'); ?></th>
                                
                                <?php if(auth()->user()->hasPermission('update_categories','delete_categories')): ?>

                                <th><?php echo app('translator')->get('site.action'); ?></th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($sale->type); ?></td>  
                                     <td><?php echo e($users[$sale->user_id]); ?></td>    
                                    <td><?php echo e($sale->amount); ?></td>                               
                                    <td><?php echo e(date('Y-m-d',strtotime($sale->date_subscribed))); ?></td> 
                                    
                                    <td>
                                        <a href="<?php echo e(route('dashboard.sales.show', $sale->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo app('translator')->get('site.view_invoice'); ?></a>
                                        
                                    </td>
                                </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table><!-- end of table -->
                        
                        <?php echo e($sales->appends(request()->query())->links()); ?>

                        
                    <?php else: ?>
                        
                        <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                        
                    <?php endif; ?>

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/resources/views/dashboard/sales/index.blade.php ENDPATH**/ ?>