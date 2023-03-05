

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
                    <div class="box box-widget">
                        <div class="box-header with-border">
                          <div class="user-block">
                            <img class="img-circle" src="<?php echo e($post->user->image_path ?? ''); ?>" alt="User Image">
                            <span class="username"><a href="#"><?php echo e($post->user->fname); ?></a></span>
                            <span class="description"><?php echo e($post->created_at); ?></span>
                          </div>
                          <!-- /.user-block -->
                          <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                              <i class="fa fa-circle-o"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <!-- post text -->
                          <p><?php echo e($post->content ?? ''); ?></p>

                          <span class="text-muted pull-right">
                                <form action="<?php echo e(route('dashboard.userpost.destroy', $post->id)); ?>" method="post" style="display: inline-block">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('delete')); ?>

                                    <button type="submit" class="btn btn-danger delete btn-xs"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                                </form><!-- end of form -->
                          </span>
                          <br>
                          <br>
            
                          
                          <!-- /.attachment-block -->
            
                          <!-- Social sharing buttons -->                         
                          <span class="pull-right text-muted"><?php echo e($post->comments->count()); ?> comments</span>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer box-comments">
                          <div class="box-comment">
                            <!-- User image -->
                            <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img class="img-circle img-sm" src="<?php echo e($comment->user->image_path ?? ''); ?>" alt="User Image">
                            
                            <div class="comment-text">
                                  <span class="username">
                                    <?php echo e($comment->user->fname ?? ''); ?> 
                                    <span class="text-muted pull-right"><?php echo e($comment->created_at); ?></span>
                                  </span><!-- /.username -->
                              <?php echo e($comment->comment); ?>

                              <span class="text-muted pull-right">
                                   <form action="<?php echo e(route('dashboard.userpostcomment.destroy', $comment->id)); ?>" method="post" style="display: inline-block">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('delete')); ?>

                                        <button type="submit" class="btn btn-danger delete btn-xs"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                                    </form><!-- end of form -->
                              </span><br><br>
                            </div>
                           
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <!-- /.comment-text -->
                          </div>
                          <!-- /.box-comment -->                          
                        </div>
                        <!-- /.box-footer -->
                        
                        <!-- /.box-footer -->
                      </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/UserPost/Resources/views/posts/show.blade.php ENDPATH**/ ?>