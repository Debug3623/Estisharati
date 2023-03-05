

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.users'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.users'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px"><?php echo app('translator')->get('site.users'); ?> (<small><?php echo e($users->total()); ?></small>)</h3>

                    <form action="<?php echo e(route('dashboard.manage_users.index')); ?>" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->get('site.search'); ?>" value="<?php echo e(request()->search); ?>">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo app('translator')->get('site.search'); ?></button>
                                <?php if(auth()->user()->hasPermission('create_users')): ?>
                                    <a href="<?php echo e(route('dashboard.manage_users.create')); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo app('translator')->get('site.add'); ?></a>
                                
                                <?php endif; ?>
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body table-responsive no-padding on-overflow-x minHeight">

                    <?php if($users->count() > 0): ?>

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('site.name'); ?></th>
                                <th><?php echo app('translator')->get('site.phone'); ?></th>
                                <th><?php echo app('translator')->get('site.email'); ?></th>
                                <!-- <th><?php echo app('translator')->get('site.image'); ?></th> -->
                                <th><?php echo app('translator')->get('site.view'); ?> <?php echo app('translator')->get('site.subscription'); ?></th>
                                <th><?php echo app('translator')->get('site.status'); ?></th>
                                <?php if(auth()->user()->hasPermission('update_users','delete_users')): ?>

                                <th><?php echo app('translator')->get('site.action'); ?></th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td>
                                        <?php if(!empty($userMetas[$user->id])): ?>
                                            <span style="cursor: pointer;" class="flex text-info" data-toggle="tooltip" data-placement="top" 
                                                title="
                                                    <?php if(!empty($userMetas[$user->id]['city'])): ?> <?php echo e($userMetas[$user->id]['city']); ?> <?php endif; ?>
                                                    <?php if(!empty($userMetas[$user->id]['contact'])): ?> <?php echo e($userMetas[$user->id]['contact']); ?> <?php endif; ?>
                                                ">
                                            <?php echo e($user->fname); ?> <?php echo e($user->lname); ?>

                                            </span>
                                        <?php else: ?> <?php echo e($user->fname); ?> <?php echo e($user->lname); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($user->phone); ?></td>
                                    <td><?php echo e($user->email); ?></td>

                                    <!-- <td><img src="<?php echo e($user->image_path); ?>" style="width: 50px;height: 50px;" class="img-thumbnail" alt=""></td> -->
                                    <?php if(!empty($subscription[$user->id])): ?>
                                        <th style="cursor: pointer;" class="flex text-info">
                                            <?php if(in_array('consultation',$subscription[$user->id])): ?> <?php echo app('translator')->get('site.consultation'); ?> <?php endif; ?>
                                            <br>
                                            <?php if(in_array('courses',$subscription[$user->id])): ?> <?php echo app('translator')->get('site.courses'); ?> <?php endif; ?>
                                           
                                        </th>
                                    <?php else: ?>  <th><?php echo app('translator')->get('site.free_user'); ?></th>
                                    <?php endif; ?>
                                    
                                    <?php if( $user->status==0): ?>
                                    <td style="margin: 5px;" class="badge bg-red"><?php echo app('translator')->get('site.inactive'); ?></td>
                                    <?php elseif( $user->status==1): ?>
                                    <td style="margin: 5px;" class="badge bg-green"><?php echo app('translator')->get('site.active'); ?></td>
                                    <?php endif; ?>
                                    
                                    <td>
                                    <div class="dropdown">
                                            <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink4" 
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-cog"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <?php if(auth()->user()->hasPermission('read_users')): ?>
                                            <a href="<?php echo e(route('dashboard.manage_users.show', $user->id)); ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i><?php echo app('translator')->get('site.show'); ?></a>
                                                <br>   
                                             <?php endif; ?>
                                            <?php if(auth()->user()->hasPermission('update_users')): ?>
                                                <a href="<?php echo e(route('dashboard.manage_users.edit', $user->id)); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></a>
                                            
                                            <?php endif; ?>

                                                <br>

                                            <?php if(auth()->user()->hasPermission('update_users')): ?>
                                                <form action="<?php echo e(route('dashboard.manage_users.block', $user->id)); ?>" method="post" style="display: inline-block">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field('POST')); ?>

                                                    
                                                    <?php if( $user->status==1): ?>
                                                    <button type="submit" class="btn btn-warning update btn-sm">
                                                        <i class="fa fa-ban"></i> <?php echo app('translator')->get('site.block'); ?>
                                                    </button>    
                                                    <?php elseif( $user->status==0): ?>
                                                    <button type="submit" class="btn btn-default update btn-sm">
                                                        <i class="fa fa-user"></i> <?php echo app('translator')->get('site.activate'); ?>
                                                    </button>
                                                    <?php endif; ?>
                                                    
                                                </form><!-- end of form -->
                                            
                                            <?php endif; ?>

                                                <br>
                                                
                                            <?php if(auth()->user()->hasPermission('delete_users')): ?>
                                                <form action="<?php echo e(route('dashboard.manage_users.destroy', $user->id)); ?>" method="post" style="display: inline-block">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo e(method_field('delete')); ?>

                                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                                                </form><!-- end of form -->
                                            
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table><!-- end of table -->
                        <div style="text-align:center;">
                            <?php echo e($users->appends(request()->query())->links()); ?>

                        </div>
                        
                    <?php else: ?>
                        
                        <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                        
                    <?php endif; ?>

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/apptdhaz/public_html/estisharati/Modules/UserManagement/Resources/views/manage_users/index.blade.php ENDPATH**/ ?>