

<?php $__env->startSection('content'); ?>
<style type="text/css">
    .major th{
        width: 20%;text-align: right;
    }
</style>
 <div class="content-wrapper">

    <section class="content-header">

        <h1><?php echo app('translator')->get('site.course'); ?></h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a>
            </li>
            <li><a href="<?php echo e(route('dashboard.courses.index')); ?>"> <?php echo app('translator')->get('site.courses'); ?></a></li>
            <li class="active"><?php echo app('translator')->get('site.add'); ?></li>
        </ol>
    </section>
    <div class="content">
        
                
                <div class="tabbable-panel">
				<div class="tabbable-line">
                    <div class="box box-primary">
                    <div class="box-body">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#tab_default_1" data-toggle="tab">
                            Course Details </a>
						</li>
						<li>
							<a href="#tab_default_2" data-toggle="tab">
                            Comments & Rating </a>
						</li>
					
					</ul>
                </div></div>
            
         <div class="box box-primary" style="border-top-color: #fff;">
            <div class="box-body">

					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
							
                      <table class="table major">
                                <tbody>
                                    
                     <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                                <?php if(count(config('translatable.locales'))>1): ?> 
                                       <th> <label><?php echo app('translator')->get('site.' . $locale . '.name'); ?></label></th>
                                <?php else: ?>
                                        <th><label><?php echo app('translator')->get('site.name'); ?></label></th>
                                <?php endif; ?>
                                        <td><?php echo $course->translate($locale)->name; ?></td>  
                                               
                     </tr>          
                   
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                  
                     <!-- Description -->

                     <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                                <?php if(count(config('translatable.locales'))>1): ?> 
                                       <th> <label><?php echo app('translator')->get('site.' . $locale . '.description'); ?></label></th>
                                <?php else: ?>
                                       <th> <label><?php echo app('translator')->get('site.name'); ?></label></th>
                                <?php endif; ?>
                                        <td><?php echo $course->translate($locale)->description; ?></td>   
                                               
                               
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- Title Ar Field -->
                    <tr>
                        <th><label><?php echo app('translator')->get('site.category'); ?></label></th>
                        <td><?php echo e($categories[$course->category_id]); ?></td>
                    </tr>


                    <tr>
                        <th><label><?php echo app('translator')->get('site.period'); ?></label></th>
                        <td><?php echo e($course->period); ?></td>
                    </tr>

                    <tr>
                        <th><label><?php echo app('translator')->get('site.price'); ?></label></th>
                        <td><?php echo e($course->price); ?></td>
                    </tr>
                    <?php if($offer_status): ?>
                    <tr>
                        <th><label><?php echo app('translator')->get('site.offerprice'); ?></label></th>
                        <td><?php echo e($offerprice); ?> ( <?php echo e($offer_percent); ?>)</td>
                    </tr>
                    <?php endif; ?>

                    <tr>
                        <th><label><?php echo app('translator')->get('site.course_duration'); ?></label></th>
                        <td><?php echo e($course->course_duration); ?></td>
                    </tr>

                    <tr>
                        <th><label><?php echo app('translator')->get('site.image'); ?></label></th>
                        <td><a href="<?php echo e(asset('public/uploads/courses_files/'.$course->image)); ?>" target="_blank"><img src="<?php echo e(asset('public/uploads/courses_files/'.$course->image)); ?>"  style="width: 100px; height: 100px;"
                                class="img-thumbnail image-preview" alt=""></a></td>
                   </tr>

                   <tr>
                        <th><label><?php echo app('translator')->get('site.preview_video'); ?></label></th>
                        <td> <?php if(isset($course->preview_video )): ?>
                            <a href="#view_preview_video_modal" class="btn btn-primary btn-sm " style="margin-top: 30px;" data-toggle="modal">Launch Preview Video</a>
                            <?php endif; ?>

                        </td>
                  </tr>

                   <tr>
                        <th><label><?php echo app('translator')->get('site.consultants'); ?></label></th>
                        <td><ul><?php $__currentLoopData = $user_courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <li><?php echo e($consultants[$value]); ?></li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                       </td>
                   </tr>
                   <tr>
                        <th><label><?php echo app('translator')->get('site.chapters'); ?></label></th>
                       <td><div class="panel-group" id="accordion" style="max-width:98%">          
                       <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($key); ?>"><span class="glyphicon glyphicon-book">
                                </span>&nbsp;&nbsp; <?php echo e($key+1); ?> . <?php echo e($chapter->chapter_title); ?></a>
                            </h4>
                          </div>
                         
                         
                          <div id="collapse<?php echo e($key); ?>" class="panel-collapse collapse">
                            <?php $__currentLoopData = $chapter['lessons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2=>$lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
                            <div class="list-group">
                              <a href="#" class="list-group-item">
                                <h4 class="list-group-item-heading"><?php echo e($lesson->title); ?></h4>                  
                              </a>
                            </div>  
                            
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                         
                        </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div></td>
                </tr>
                  
                </tbody>
            </table></div>
                
							
						<div class="tab-pane" id="tab_default_2">
							<p>
                                 
                                 <div class="rating">
                                    Average Rating :&nbsp;&nbsp;(<?php echo e($avg_rating); ?>) 
                                    <?php for($i = 0; $i < $avg_rating; $i++): ?>
                                        <span><i class="fa fa-star-o"></i></span>
                                    <?php endfor; ?>
                                </div>
							</p>
							<p>
							<div class="box-body table-responsive no-padding on-overflow-x minHeight">

                    <?php if($comments->count() > 0): ?>

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th style="text-align">#</th>
                                <th><?php echo app('translator')->get('site.users'); ?></th>
                                <th><?php echo app('translator')->get('site.comments'); ?></th>
                                <th><?php echo app('translator')->get('site.reviews'); ?></th>
                                <th><?php echo app('translator')->get('site.commented_on'); ?></th>
                                <?php if(auth()->user()->hasPermission('update_courses','delete_courses')): ?>

                                <th><?php echo app('translator')->get('site.action'); ?></th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($users[$comment->user_id]); ?></td>
                                    <td><?php echo e($comment->comment); ?></td>
                                    <td><?php echo e($comment->review); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($comment->created_at)->format('d/m/Y')); ?></td>
                                     <td>
                                    <div class="btn-group" role="group" aria-label="Basic example"> 
                                          
                                                <?php if(auth()->user()->hasPermission('delete_courses')): ?>
                                                    <form action="<?php echo e(route('dashboard.courses.destroy', $comment->id)); ?>" method="post" style="display: inline-block">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('delete')); ?>

                                                        <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i></button>
                                                    </form><!-- end of form -->
                                                
                                                <?php endif; ?>

                                       
                                       </div>
                                    </td>
                                </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table><!-- end of table -->
                        <div style="text-align:center;">
                            <?php echo e($comments->appends(request()->query())->links()); ?>

                        </div>
                        
                    <?php else: ?>
                        
                        <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                        
                    <?php endif; ?>

                </div><!-- end of box body -->
							</p>

						</div>
				    </div>
				</div></div>
                
            </div>
        </div>
    </div>

</div>

<!--Video Preview Modal HTML -->
    <div id="view_preview_video_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Course Preview Video</h5>
                    <button type="button" class="close" data-dismiss="modal" id="close">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="show_preview_video" class="embed-responsive-item" width="560" height="315" src="<?php echo e(asset('public/uploads/courses_files/'.$course->preview_video)); ?>" allowfullscreen></iframe>
                  </div>
                </div>
            </div>
        </div>
    </div>
 <script>
 
$("#close").click(function(){
  $("#show_preview_video")[0].pause();
});
    


//  var url = $("#show_preview_video").attr('src');
//  $("#view_preview_video_modal").on('hide.bs.modal', function(){
//       // console.log("closed");
//         $("#show_preview_video").attr('src', '');
//         $iframe = $(this).find("iframe");
//         $iframe.attr("src", $iframe.attr("src"));
//     });
    
//     /* Assign the initially stored url back to the iframe src
//     attribute when modal is displayed again */
//     $("#view_preview_video_modal").on('show.bs.modal', function(){
//         // console.log("open");
//         $("#show_preview_video").attr('src', url);
//     });
 </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Courses/Resources/views/course/show.blade.php ENDPATH**/ ?>