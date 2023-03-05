

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.contactus'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li class="active"><a href="<?php echo e(route('dashboard.contactus.index')); ?>"> <?php echo app('translator')->get('site.contactus'); ?></a></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

               

                <div class="box-body">
                    <?php if($message->count() > 0): ?> 
                    <div class="row">
                            <div class="col-md-12">
                                <img alt="" src="<?php echo e(asset('public/uploads/user_images/default.png')); ?>" style="width: 50px;height: 50px;" class="img-thumbnail" >
                            
                                <span><strong><?php echo e($message->name); ?></strong>&nbsp;[ <?php echo e($message->email); ?> ]</span>
                                to
                                <strong>me [<?php echo e(date('d-m-Y',strtotime($message->created_at))); ?>]</strong>
                            </div>
                    </div><br>
                    <div class="row">
                            <div class="col-md-12">
                               <?php echo nl2br($message->message); ?> 
                            </div>
                    </div>
                    <br>
                    <div class="row">
                            <div class="col-md-12">
                               <a href="<?php echo e(route('dashboard.contactus.reply', $message->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp;Reply</a>
                            </div>
                    </div>
                            
                                                                   
                   
                   
                    
                        
                    <?php else: ?>
                        
                        <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                        
                    <?php endif; ?>

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/resources/views/dashboard/contactus/show.blade.php ENDPATH**/ ?>