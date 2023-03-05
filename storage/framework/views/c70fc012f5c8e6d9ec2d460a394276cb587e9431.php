

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.courses'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.courses'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px"><?php echo app('translator')->get('site.courses'); ?> (<small><?php echo e($courses->total()); ?></small>)</h3>

                    <form action="<?php echo e(route('dashboard.courses.index')); ?>" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->get('site.search'); ?>" value="<?php echo e(request()->search); ?>">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo app('translator')->get('site.search'); ?></button>
                                <?php if(auth()->user()->hasPermission('create_courses')): ?>
                                    <a href="<?php echo e(route('dashboard.courses.create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo app('translator')->get('site.add'); ?></a>
                                
                                <?php endif; ?>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body table-responsive no-padding on-overflow-x minHeight">

                    <?php if($courses->count() > 0): ?>

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>Id</th>
                                <th><?php echo app('translator')->get('site.name'); ?></th>
                                <th><?php echo app('translator')->get('site.type'); ?></th>
                                <th><?php echo app('translator')->get('site.price'); ?></th>
                                <th><?php echo app('translator')->get('site.period'); ?></th>
                                <th><?php echo app('translator')->get('site.course_duration'); ?></th>
                                <th><?php echo app('translator')->get('site.effective_date'); ?></th>
                                <th><?php echo app('translator')->get('site.status'); ?></th>
                                <?php if(auth()->user()->hasPermission('update_courses','delete_courses')): ?>

                                <th><?php echo app('translator')->get('site.action'); ?></th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($course->id); ?></td>
                                    <td style="cursor: pointer;" >
                                        <span class="flex text-info" data-toggle="tooltip" data-placement="top" title="
                                            <?php if(!empty($course->description)): ?> <?php echo e($course->description); ?> <?php endif; ?>
                                            <?php if(!empty($course->tag_id)): ?> <?php echo e($tags[$course->tag_id]); ?> <?php endif; ?>
                                        ">
                                             
                                            
                                              <?php if(strlen($course->name) > 25): ?> 
                                              
                                                <?php echo e(substr($course->name, 0, 25) . '...'); ?>

                                              
                                              <?php else: ?> 
                                              
                                                <?php echo e($course->name); ?>

                                              
                                              <?php endif; ?>
                                        </span>
                                    </td>

                                    <td><?php echo e($categories[$course->category_id]); ?></td>
                                     <td><?php if(isset($offers[$course->id])): ?>
                                        <?php echo e(($course->price -($course->price * $offers[$course->id])/100)); ?><br>
                                         <span style="color:#fc4b4b;text-decoration: line-through;"> <?php echo e($course->price); ?> </span>
                                         <?php else: ?>
                                         <?php echo e($course->price); ?>

                                         <?php endif; ?> </td>
                                    <td><?php echo e($course->period); ?></td>
                                     <td><?php echo e($course->course_duration); ?> <?php echo app('translator')->get('site.hours'); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($course->effective_date)->format('d/m/Y')); ?></td>
                                    <?php if( $course->status==0): ?>
                                    <td style="margin: 5px;" class="badge bg-red"><?php echo app('translator')->get('site.inactive'); ?></td>
                                    <?php elseif( $course->status==1): ?>
                                    <td style="margin: 5px;" class="badge bg-green"><?php echo app('translator')->get('site.active'); ?></td>
                                    <?php endif; ?>
                                    
                                    <td>
                                    <div class="btn-group" role="group" aria-label="Basic example"> 
                                           
                                                <?php if(auth()->user()->hasPermission('read_courses')): ?>
                                                <a href="<?php echo e(route('dashboard.courses.show', $course->id)); ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
                                                <?php else: ?>
                                                    <a href="#" class="btn btn-info btn-sm disabled" id="close"><i class="fa fa-show"></i> <?php echo app('translator')->get('site.show'); ?></a> --}}
                                                <?php endif; ?>
                                                          <script>
                $("#close").click(function(){
  $("#show_preview_video")[0].pause();
});
</script>
                                                <?php if(auth()->user()->hasPermission('update_courses')): ?>
                                                <a href="<?php echo e(route('dashboard.courses.edit', $course->id)); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                <?php else: ?>
                                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></a> --}}
                                                <?php endif; ?>
                                              
                                                <?php if(auth()->user()->hasPermission('update_courses')): ?>
                                                    <form action="<?php echo e(route('dashboard.courses.block', $course->id)); ?>" method="post" style="display: inline-block">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('POST')); ?>

                                                        
                                                        <?php if( $course->status==1): ?>
                                                        <button type="submit" class="btn btn-warning update btn-sm">
                                                            <i class="fa fa-ban"></i>
                                                        </button>    
                                                        <?php elseif( $course->status==0): ?>
                                                        <button type="submit" class="btn btn-default update btn-sm">
                                                            <i class="fa fa-check-square-o"></i> 
                                                        </button>
                                                        <?php endif; ?>
                                                        
                                                    </form><!-- end of form -->
                                                <?php else: ?>
                                                <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i></button> --}}
                                                <?php endif; ?>

                                           
                                                
                                          
                                                <?php if(auth()->user()->hasPermission('delete_courses')): ?>
                                                    <form action="<?php echo e(route('dashboard.courses.destroy', $course->id)); ?>" method="post" style="display: inline-block">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('delete')); ?>

                                                        <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i></button>
                                                    </form><!-- end of form -->
                                                <?php else: ?>
                                                    <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> </button> --}}
                                                <?php endif; ?>

                                       
                                       </div>
                                    </td>
                                </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table><!-- end of table -->
                        <div style="text-align:center;">
                            <?php echo e($courses->appends(request()->query())->links()); ?>

                        </div>
                        
                    <?php else: ?>
                        
                        <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                        
                    <?php endif; ?>

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/apptdhaz/public_html/estisharati/Modules/Courses/Resources/views/course/index.blade.php ENDPATH**/ ?>