<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.payment_methods'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.payment_methods'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px"><?php echo app('translator')->get('site.payment_methods'); ?> (<small><?php echo e($payment_methods->total()); ?></small>)</h3>
                    

                </div><!-- end of box header -->

                <div class="box-body table-responsive no-padding on-overflow-x minHeight">

                    <?php if($payment_methods->count() > 0): ?>

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('site.payment_methods'); ?></th>
                                <th><?php echo app('translator')->get('site.en.title'); ?></th>
                                <th><?php echo app('translator')->get('site.ar.title'); ?></th>
                                <th><?php echo app('translator')->get('site.status'); ?></th>
                                

                                

                                <th><?php echo app('translator')->get('site.action'); ?></th>
                               
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$payment_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>  
                                    <td><?php echo e($payment_method->payment_method); ?></td>
                                    <td><?php echo e($payment_method->title_en); ?></td>
                                    <td><?php echo e($payment_method->title_ar); ?></td>
                                    <?php if( $payment_method->status==0): ?>
                                    <td style="margin: 5px;" class="badge bg-red"><?php echo app('translator')->get('site.inactive'); ?></td>
                                    <?php elseif( $payment_method->status==1): ?>
                                    <td style="margin: 5px;" class="badge bg-green"><?php echo app('translator')->get('site.active'); ?></td>
                                    <?php endif; ?>
                                    <td>

                                      
                                            
                                                <a href="<?php echo e(route('dashboard.payments.edit', $payment_method->id)); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></a>
                                                
                                             
                                               
                                                 <form action="<?php echo e(route('dashboard.payments.block', $payment_method->id)); ?>" method="post" style="display: inline-block">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('POST')); ?>

                                                        
                                                        <?php if( $payment_method->status==1): ?>
                                                        <button type="submit" class="btn btn-warning update btn-sm">
                                                            <i class="fa fa-ban"></i>
                                                        </button>    
                                                        <?php elseif( $payment_method->status==0): ?>
                                                        <button type="submit" class="btn btn-default update btn-sm">
                                                            <i class="fa fa-check-square-o"></i> 
                                                        </button>
                                                        <?php endif; ?>
                                                        
                                                    </form><!-- end of form -->

                                            <!-- </div>
                                        </div> -->

                                    </td>
                                </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table><!-- end of table -->
                        
                        <div style="text-align:center;">
                            <?php echo e($payment_methods->appends(request()->query())->links()); ?>

                        </div>
                        
                    <?php else: ?>
                        
                        <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                        
                    <?php endif; ?>

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Payments/Resources/views/payment/index.blade.php ENDPATH**/ ?>