<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.chats'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.chats'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px"><?php echo app('translator')->get('site.chats'); ?> (<small><?php echo e($chats->total()); ?></small>)</h3>

                   

                </div><!-- end of box header -->

                <div class="box-body table-responsive no-padding on-overflow-x minHeight">

                    <?php if($chats->count() > 0): ?>

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('site.sender'); ?></th>
                                <th><?php echo app('translator')->get('site.receiver'); ?></th>
                                <th><?php echo app('translator')->get('site.message'); ?></th>
                                

                                <th><?php echo app('translator')->get('site.action'); ?></th>
                                
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>                                   
                                    <td><a href="<?php echo e(route('dashboard.manage_users.show', $chat->sender_id)); ?>"><?php echo e($users[$chat->sender_id]); ?></a></td>
                                    <td><a href="<?php echo e(route('dashboard.manage_users.show', $chat->receiver_id)); ?>"><?php echo e($users[$chat->receiver_id]); ?></a></td>
                                    <td>    <?php if(!empty($chat->message)): ?>
                                                <?php if(strlen($chat->message) > 35): ?> 
                                              
                                                <?php echo e(substr($chat->message, 0, 35) . '...'); ?>

                                              
                                              <?php else: ?> 
                                              
                                                <?php echo e($chat->message); ?>

                                              
                                              <?php endif; ?>
                                            <?php else: ?>
                                               <i class="fa fa-paperclip" aria-hidden="true"></i> Attachment
                                            <?php endif; ?>
                                    </td>
                                    <td>
                                      
                                            
                                            <a href="<?php echo e(route('dashboard.chatting.show', $chat->id)); ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> <?php echo app('translator')->get('site.show'); ?> </a>  
                                            
                                              

                                    </td>
                                </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table><!-- end of table -->
                        
                        <div style="text-align:center;">
                            <?php echo e($chats->appends(request()->query())->links()); ?>

                        </div>
                        
                    <?php else: ?>
                        
                        <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                        
                    <?php endif; ?>

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Chatting/Resources/views/chat/index.blade.php ENDPATH**/ ?>