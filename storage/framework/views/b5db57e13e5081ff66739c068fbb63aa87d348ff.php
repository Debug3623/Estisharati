<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.offers'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.offers'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px"><?php echo app('translator')->get('site.offer'); ?> (<small><?php echo e($offers->total()); ?></small>)</h3>

                    <form action="<?php echo e(route('dashboard.offers.create')); ?>" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->get('site.search'); ?>" value="<?php echo e(request()->search); ?>">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo app('translator')->get('site.search'); ?></button>
                               
                                    <a href="<?php echo e(route('dashboard.offers.create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo app('translator')->get('site.add'); ?></a>
                                
                              
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body table-responsive no-padding on-overflow-x minHeight">

                    <?php if($offers->count() > 0): ?>

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>                                
                                <th><?php echo app('translator')->get('site.course'); ?>/<?php echo app('translator')->get('site.consultant'); ?> / <?php echo app('translator')->get('site.package'); ?></th>
                                <th><?php echo app('translator')->get('site.type'); ?></th>
                                <th><?php echo app('translator')->get('site.discount_rate'); ?></th>
                                <th><?php echo app('translator')->get('site.start_date'); ?></th>
                                <th><?php echo app('translator')->get('site.end_date'); ?></th>
                                <th><?php echo app('translator')->get('site.status'); ?></th>
                                

                                

                                <th><?php echo app('translator')->get('site.action'); ?></th>
                               
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                         
                                    <td><?php echo e($index + 1); ?></td>                                    
                                    <td>
                                        
                                  
                                        <?php if(isset($offer->course_id)): ?>
                                        
                                            <?php if(strlen($courses[$offer->course_id]) > 25): ?> 
                                              
                                                <?php echo e(substr($courses[$offer->course_id], 0, 25) . '...'); ?>

                                              
                                            <?php else: ?> 
                                              
                                                <?php echo e($courses[$offer->course_id]); ?>

                                              
                                            <?php endif; ?>
                                   
                                        
                                        <?php endif; ?>
                                        </td>
                                    <td><?php echo e($offer->type); ?></td>
                                    <td><?php echo e($offer->discount_rate); ?></td>
                                    <td><?php echo e(date('Y-m-d',strtotime($offer->start_date))); ?></td>
                                    <td><?php echo e(date('Y-m-d',strtotime($offer->end_date))); ?> </td>
                                     <?php if( $offer->status==0): ?>
                                    <td style="margin: 5px;" class="badge bg-red"><?php echo app('translator')->get('site.inactive'); ?></td>
                                    <?php elseif( $offer->status==1): ?>
                                    <td style="margin: 5px;" class="badge bg-green"><?php echo app('translator')->get('site.active'); ?></td>
                                    <?php endif; ?>
                                    <td>

                                      
                                            
                                                <a href="<?php echo e(route('dashboard.offers.edit', $offer->id)); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></a>
                                                
                                             
                                                    <form action="<?php echo e(route('dashboard.offers.destroy', $offer->id)); ?>" method="post" style="display: inline-block">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('delete')); ?>

                                                        <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                                                    </form><!-- end of form -->
                                                
                                                
                                                 <form action="<?php echo e(route('dashboard.offers.block', $offer->id)); ?>" method="post" style="display: inline-block">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('POST')); ?>

                                                        
                                                        <?php if( $offer->status==1): ?>
                                                        <button type="submit" class="btn btn-warning update btn-sm">
                                                            <i class="fa fa-ban"></i>
                                                        </button>    
                                                        <?php elseif( $offer->status==0): ?>
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
                            <?php echo e($offers->appends(request()->query())->links()); ?>

                        </div>
                        
                    <?php else: ?>
                        
                        <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                        
                    <?php endif; ?>

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/apptdhaz/public_html/estisharati/Modules/Offers/Resources/views/offer/index.blade.php ENDPATH**/ ?>