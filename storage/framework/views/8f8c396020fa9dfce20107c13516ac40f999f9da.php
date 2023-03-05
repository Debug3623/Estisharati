

<?php $__env->startSection('content'); ?>
 <div class="content-wrapper">

    <section class="content-header">

        <h1><?php echo app('translator')->get('site.user_details'); ?></h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a>
            </li>
             <li><a href="<?php echo e(route('dashboard.manage_users.index')); ?>"> <?php echo app('translator')->get('site.users'); ?></a></li>
            <li class="active"><?php echo app('translator')->get('site.show'); ?></li>
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
                            <?php echo app('translator')->get('site.user_details'); ?>  </a>
						</li>
						<?php if($user->type == 'User'): ?>
						<li>
							<a href="#tab_default_2" data-toggle="tab">
                             <?php echo app('translator')->get('site.course_details'); ?></a>
						</li>
						<li>
							<a href="#tab_default_3" data-toggle="tab">
                             <?php echo app('translator')->get('site.consultation_details'); ?></a>
						</li>
					
                        <li>
                          <a href="#tab_default_4" data-toggle="tab">
                               <?php echo app('translator')->get('site.package_details'); ?></a>
                        </li>
                        <?php endif; ?>
					
					</ul>
					</div>
					</div>
					<div class="box box-primary" style="border-top-color: #fff;">
					<div class="box-body">
					    
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
						    
						    <table class="table table-hover">
						        <tbody>
						                       <tr>
                                       <th><?php echo app('translator')->get('site.name'); ?>: </th>
                                       <td><?php echo e($user->fname); ?> <?php echo e($user->lname); ?></td>
                                       
                                       <th><?php echo app('translator')->get('site.type'); ?>: </th>
                                       <td><?php echo e($user->lname); ?></td>
                                    </tr>
                                     <tr>
                                       <th><?php echo app('translator')->get('site.email'); ?>: </th>
                                       <td><?php echo e($user->email); ?></td>
                                       
                                       <th><?php echo app('translator')->get('site.phone'); ?>: </th>
                                       <td><?php echo e($user->phone); ?></td>
                                    </tr>
                                    <tr>
                                       <th><?php echo app('translator')->get('site.created_at'); ?>: </th>
                                       <td><?php echo e(date('d-m-Y',strtotime($user->created_at))); ?></td>
                                       
                                       <th><?php echo app('translator')->get('site.status'); ?>: </th>
                                       <td><?php if( $user->status==0): ?>
                                             <?php echo app('translator')->get('site.inactive'); ?>
                                           <?php elseif( $user->status==1): ?>
                                             <?php echo app('translator')->get('site.active'); ?>
                                          <?php endif; ?></td>
                                     </tr>
                                     
                                    
                                    
                                       
						            
						        </tbody>
						        
						        
						    </table>
						   
						</div>
						<?php if($user->type == 'User'): ?>
						<div class="tab-pane" id="tab_default_2">
						<?php if($courses->count() > 0): ?>

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('site.name'); ?></th>
                                <th><?php echo app('translator')->get('site.type'); ?></th>
                                <th><?php echo app('translator')->get('site.price'); ?></th>
                                <th><?php echo app('translator')->get('site.period'); ?></th>
                                <th><?php echo app('translator')->get('site.course_duration'); ?></th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td style="cursor: pointer;" >
                                        <span class="flex text-info" data-toggle="tooltip" data-placement="top" title="
                                            <?php if(!empty($course->description)): ?> <?php echo e($course->description); ?> <?php endif; ?>
                                            <?php if(!empty($course->tag_id)): ?> <?php echo e($tags[$course->tag_id]); ?> <?php endif; ?>
                                        ">
                                             
                                            
                                              <?php if(strlen($course->name) > 30): ?> 
                                              
                                                <?php echo e(substr($course->name, 0, 30) . '...'); ?>

                                              
                                              <?php else: ?> 
                                              
                                                <?php echo e($course->name); ?>

                                              
                                              <?php endif; ?>
                                        </span>
                                    </td>

                                    <td><?php echo e($categories[$course->category_id]); ?></td>
                                     <td><?php echo e($course->price); ?></td>
                                    <td><?php echo e($course->period); ?></td>
                                     <td><?php echo e($course->course_duration); ?> <?php echo app('translator')->get('site.hours'); ?></td>
                                   
                                </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table><!-- end of table -->
                       
                        
                        <?php else: ?>
                            
                            <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                            
                        <?php endif; ?>

						</div>
						<div class="tab-pane" id="tab_default_3">
						<?php if($consultants->count() > 0): ?>

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('site.image'); ?></th>
                                <th><?php echo app('translator')->get('site.name'); ?></th>
                                <th><?php echo app('translator')->get('site.phone'); ?></th>
                                <th><?php echo app('translator')->get('site.email'); ?></th>
                                <th><?php echo app('translator')->get('site.consultant_cost'); ?></th>
                                
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php $__currentLoopData = $consultants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$consultant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><img src="<?php echo e(asset('public/uploads/user_images/'. $consultant->image)); ?> " style="width: 50px;height: 50px;" class="img-thumbnail" alt=""></td>
                                    <td><?php echo e($consultant->fname); ?> <?php echo e($consultant->lname); ?></td>
                                    <td><?php echo e($consultant->phone); ?></td>
                                    <td><?php echo e($consultant->email); ?></td>
                                    <td><?php echo e($consultant->price); ?></td>
                                </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table><!-- end of table -->
                       
                        
                        <?php else: ?>
                            
                            <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                            
                        <?php endif; ?>

						</div>
                        <div class="tab-pane" id="tab_default_4">
            <?php if($packages->count() > 0): ?>

                        <table class="table table-hover">
                    <tbody>
                       <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <tr>
                                       <th><?php echo app('translator')->get('site.name'); ?>: </th>
                                       <td><?php echo e($package->name); ?></td>
                                       
                                       <th><?php echo app('translator')->get('site.price'); ?>: </th>
                                       <td><?php echo e($package->price); ?></td>
                                    </tr>
                                    <tr>
                                       <th><?php echo app('translator')->get('site.valid_to'); ?>: </th>
                                       <td><?php echo e(date('Y-m-d',strtotime($package->valid_to))); ?></td>
                                       
                                       <th><?php echo app('translator')->get('site.price'); ?>: </th>
                                       <td><?php echo e($package->price); ?></td>
                                    </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
                                     
                                    
                                    
                                       
                        
                    </tbody>
                    
                    
                </table>
                       
                        
                        <?php else: ?>
                            
                            <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                            
                        <?php endif; ?>

            </div>
                        <?php endif; ?>
					</div>
				    </div>
				   </div>
				</div>
				</div>
                
            </div>
        

</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/UserManagement/Resources/views/manage_users/show.blade.php ENDPATH**/ ?>