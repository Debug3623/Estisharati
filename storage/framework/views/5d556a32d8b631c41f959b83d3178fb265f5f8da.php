

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">
        <section class="content-header">
            <h1><?php echo app('translator')->get('site.testimonials'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li><a href="<?php echo e(route('dashboard.offers.index')); ?>"> <?php echo app('translator')->get('site.testimonials'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.testimonials'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-body">

                    <?php echo $__env->make('partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <table class="table table-filter">
								<tbody>
                                    <?php $__currentLoopData = $testmonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testmonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>																			
										<td>
											<div>												
												<div id="<?php echo e($testmonial->id); ?>">													
													<h5>
														<?php echo e($testmonial->user->fname ?? ''); ?>	<?php echo e($testmonial->user->lname ?? ''); ?>	
                                                        <?php echo e(date('d/m/Y H:i A ',strtotime($testmonial->created_at))); ?>											
													</h5>
                                                    <h5 class="text-danger">
                                                        <?php echo e($testmonial->course ? $testmonial->course->name :''); ?>

                                                        <?php echo e($testmonial->consultant ? $testmonial->consultant->fname :''); ?>

                                                        &nbsp;<?php echo e($testmonial->category ? $testmonial->category->name :''); ?>

                                                    </h5>
													<p><?php echo e(\Illuminate\Support\Str::limit($testmonial->experience, 200)); ?></p>
                                                    <form action="<?php echo e(route('dashboard.testimonials.destroy', $testmonial->id)); ?>" method="post" style="display: inline-block">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('delete')); ?>

                                                        <button type="submit" class="btn btn-danger delete btn-xs"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                                                    </form><!-- end of form -->
                                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#testmonial_<?php echo e($testmonial->id); ?>">
                                                           View More
                                                    </button>
												</div>
											</div>
                                            <!-- Button trigger modal -->
                                                        
                                            
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="testmonial_<?php echo e($testmonial->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">   
                                                            <div class="modal-header">
                                                                <h3 class="modal-title"> <?php echo app('translator')->get('site.testimonials'); ?></h3>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>                                                         
                                                            <div class="modal-body">
                                                                <?php echo e($testmonial->experience); ?>

                                                                <hr/>
                                                                <div class="panel-heading">
                                                                    
                                                                    <h3 class="panel-title">
                                                                    <i class="fa fa-comment"></i> Comments</h3>
                                                                </div>
                                                                <?php $__currentLoopData = $testmonial->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                

                                                                <div class="panel-body" id="divcomment_<?php echo e($comment->id); ?>">
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item">
                                                                            <div class="row">
                                                                                <div class="col-xs-2 col-md-1">
                                                                                    <img src="" class="img-circle img-responsive" alt="" /></div>
                                                                                <div class="col-xs-10 col-md-11">
                                                                                    <div>
                                                                                        <div class="mic-info">
                                                                                            By: <a href="#"><?php echo e($comment->user->fname ?? ''); ?></a> on <?php echo e(date('d/m/Y H:i A',strtotime($comment->created_at))); ?>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="comment-text">
                                                                                       <?php echo e($comment->comment); ?>

                                                                                    </div>
                                                                                    <button class="btn btn-danger btn-sm pull-right " onclick="delete_testmonial_comment(<?php echo e($comment->id); ?>)"><i class="fa fa-trash"></i></button>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    
                                                                    </ul>
                
                                                                </div>

                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                                                
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
										</td>
									</tr>
									
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									
									
								</tbody>
							</table>

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->


</div><!-- end of content wrapper -->
<script type="text/javascript">
 
    
function delete_testmonial_comment(id){
    
            $.ajax({
                    processing: true,
                    serverSide: true, 
                    type:'POST',
                    url:"delete_testmonial_comment/"+id, 
                    data: {"_token": "<?php echo e(csrf_token()); ?>"},
                    success:function(data){                        
                        if(data){                        
                            $('#divcomment_'+id).hide();
                            new Noty({
    type: 'success',
    layout: 'topRight',
    text: 'Some notification text'
}).show();
                           
                        }                                                
                        
                    }
                    });
        }

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/resources/views/dashboard/testmonials/index.blade.php ENDPATH**/ ?>