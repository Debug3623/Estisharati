<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.surveys'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.surveys'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px"><?php echo app('translator')->get('site.surveys'); ?> (<small><?php echo e($surveys->total()); ?></small>)</h3>

                    <form action="<?php echo e(route('dashboard.surveys.create')); ?>" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->get('site.search'); ?>" value="<?php echo e(request()->search); ?>">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo app('translator')->get('site.search'); ?></button>
                               
                                    <a href="<?php echo e(route('dashboard.surveys.create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo app('translator')->get('site.add'); ?></a>
                                
                              
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body table-responsive no-padding on-overflow-x minHeight">

                    <?php if($surveys->count() > 0): ?>

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('site.image'); ?></th>
                                <th><?php echo app('translator')->get('site.en.title'); ?></th>
                                <th><?php echo app('translator')->get('site.ar.title'); ?></th>
                                <th><?php echo app('translator')->get('site.status'); ?></th>                                
                                <th><?php echo app('translator')->get('site.action'); ?></th>                              
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php $__currentLoopData = $surveys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$survey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><img src="<?php echo e(url($survey->image_path)); ?>" height='50px' width='50px' class='img img-thumbnail' /></td>
                                    <td><?php echo e($survey->title_en); ?></td>
                                    <td><?php echo e($survey->title_ar); ?></td>
                                    <?php if( $survey->status==0): ?>
                                    <td style="margin: 5px;" class="badge bg-red"><?php echo app('translator')->get('site.inactive'); ?></td>
                                    <?php elseif( $survey->status==1): ?>
                                    <td style="margin: 5px;" class="badge bg-green"><?php echo app('translator')->get('site.active'); ?></td>
                                    <?php endif; ?>
                                    <td>

                                      
                                            
                                                <a href="<?php echo e(route('dashboard.surveys.show', $survey->id)); ?>" class="btn btn-success btn-sm"><i class="fa fa-bar-chart"></i>Report</a>
                                                <a href="<?php echo e(route('dashboard.surveys.edit', $survey->id)); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></a>
                                                
                                             
                                                    <form action="<?php echo e(route('dashboard.surveys.destroy', $survey->id)); ?>" method="post" style="display: inline-block">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('delete')); ?>

                                                        <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                                                    </form><!-- end of form -->
                                                
                                                
                                                 <form action="<?php echo e(route('dashboard.surveys.block', $survey->id)); ?>" method="post" style="display: inline-block">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('POST')); ?>

                                                        
                                                        <?php if( $survey->status==1): ?>
                                                        <button type="submit" class="btn btn-warning update btn-sm">
                                                            <i class="fa fa-ban"></i>
                                                        </button>    
                                                        <?php elseif( $survey->status==0): ?>
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
                            <?php echo e($surveys->appends(request()->query())->links()); ?>

                        </div>
                        
                    <?php else: ?>
                        
                        <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                        
                    <?php endif; ?>

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/apptdhaz/public_html/estisharati/Modules/Surveys/Resources/views/survey/index.blade.php ENDPATH**/ ?>