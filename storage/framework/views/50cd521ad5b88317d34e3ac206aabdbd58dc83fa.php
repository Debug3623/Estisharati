

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.user_posts'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.user_posts'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px"><?php echo app('translator')->get('site.user_posts'); ?> (<small><?php echo e($posts->total()); ?></small>)</h3>

                    <form action="<?php echo e(route('dashboard.userpost.index')); ?>" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->get('site.search'); ?>" value="<?php echo e(request()->search); ?>">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo app('translator')->get('site.search'); ?></button>
                              
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body table-responsive no-padding on-overflow-x minHeight">

                    <?php if($posts->count() > 0): ?>

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('site.content'); ?></th>                                
                                <th><?php echo app('translator')->get('site.status'); ?></th>                                
                                <th><?php echo app('translator')->get('site.action'); ?></th>                              
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e((strlen($post->content) <=50) ? $post->content : substr($post->content, 0, 50) . '...'); ?></td>                                    
                                    <?php if( $post->status==0): ?>
                                    <td style="margin: 5px;" class="badge bg-red"><?php echo app('translator')->get('site.inactive'); ?></td>
                                    <?php elseif( $post->status==1): ?>
                                    <td style="margin: 5px;" class="badge bg-green"><?php echo app('translator')->get('site.active'); ?></td>
                                    <?php endif; ?>
                                    <td>

                                        <a href="<?php echo e(route('dashboard.userpost.show', $post->id)); ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> <?php echo app('translator')->get('site.show'); ?></a>
                                            
                                                    <form action="<?php echo e(route('dashboard.userpost.destroy', $post->id)); ?>" method="post" style="display: inline-block">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('delete')); ?>

                                                        <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                                                    </form><!-- end of form -->
                                                
                                                
                                                 <form action="<?php echo e(route('dashboard.userpost.block', $post->id)); ?>" method="post" style="display: inline-block">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('POST')); ?>

                                                        
                                                        <?php if( $post->status==1): ?>
                                                        <button type="submit" class="btn btn-warning update btn-sm">
                                                            <i class="fa fa-ban"></i><?php echo app('translator')->get('site.block'); ?>
                                                        </button>    
                                                        <?php elseif( $post->status==0): ?>
                                                        <button type="submit" class="btn btn-default update btn-sm">
                                                            <i class="fa fa-check-square-o"></i> <?php echo app('translator')->get('site.unblock'); ?>
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
                            <?php echo e($posts->appends(request()->query())->links()); ?>

                        </div>
                        
                    <?php else: ?>
                        
                        <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                        
                    <?php endif; ?>

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/apptdhaz/public_html/estisharati/Modules/UserPost/Resources/views/posts/index.blade.php ENDPATH**/ ?>