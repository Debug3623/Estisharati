

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.contactus'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li class="active"><a href="<?php echo e(route('dashboard.contactus.index')); ?>"> <?php echo app('translator')->get('site.contactus'); ?></a></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px"><?php echo app('translator')->get('site.contactus'); ?> <small><?php echo e($messages->total()); ?></small></h3>
                    
                </div><!-- end of box header -->

                <div class="box-body">

                    <?php if($messages->count() > 0): ?>
                       <button type="button" class="btn3d btn btn-default btn-sm" id="download"><span class="glyphicon glyphicon-download-alt"></span> Download</button><br><br>                    


                        <table class="table table-hover" id="exporttbl">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('site.name'); ?></th>
                                <th><?php echo app('translator')->get('site.email'); ?></th>
                                <th><?php echo app('translator')->get('site.phone'); ?></th>
                                <th><?php echo app('translator')->get('site.message_type'); ?></th>
                                <th><?php echo app('translator')->get('site.created_at'); ?></th>
                                
                                <?php if(auth()->user()->hasPermission('update_categories','delete_categories')): ?>

                                <th><?php echo app('translator')->get('site.action'); ?></th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr <?php if( $message->status == 0): ?> echo style="background-color:#d7d6d6"; <?php endif; ?>>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($message->name); ?></td>  
                                     <td><?php echo e($message->email); ?></td>    
                                    <td><?php echo e($message->phone); ?></td>                                    
                                                                   
                                    <td><?php echo e($types[$message->message_type]); ?></td> 
                                    <td><?php echo e(date('d-m-Y',strtotime($message->created_at))); ?></td> 
                                    
                                    <td>
                                        <a href="<?php echo e(route('dashboard.contactus.show', $message->id)); ?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> <?php echo app('translator')->get('site.show'); ?></a>
                                        <a href="<?php echo e(route('dashboard.contactus.reply', $message->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-paper-plane" aria-hidden="true"></i> &nbsp;Reply</a>
                                        <?php if(auth()->user()->hasPermission('delete_categories')): ?>
                                            <form action="<?php echo e(route('dashboard.contactus.destroy', $message->id)); ?>" method="post" style="display: inline-block">
                                                <?php echo e(csrf_field()); ?>

                                                <?php echo e(method_field('delete')); ?>

                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> <?php echo app('translator')->get('site.delete'); ?></button>
                                            </form><!-- end of form -->
                                        
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table><!-- end of table -->
                        
                        <?php echo e($messages->appends(request()->query())->links()); ?>

                        
                    <?php else: ?>
                        
                        <h2><?php echo app('translator')->get('site.no_data_found'); ?></h2>
                        
                    <?php endif; ?>

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->
<script type="text/javascript" src="<?php echo e(asset('public/plugins/libs/FileSaver/FileSaver.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/plugins/libs/js-xlsx/xlsx.core.min.js')); ?> "></script>
<script type="text/javascript" src="<?php echo e(asset('public/plugins/libs/jsPDF/jspdf.min.js')); ?> "></script>
<script type="text/javascript" src="<?php echo e(asset('public/plugins/libs/jsPDF-AutoTable/jspdf.plugin.autotable.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/plugins/libs/pdfmake/pdfmake.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/plugins/libs/pdfmake/vfs_fonts.js')); ?> "></script>
<script type="text/javascript" src="<?php echo e(asset('public/plugins/tableExport.min.js')); ?> "></script>
<script type="text/javaScript">

  $(document).ready(function()
  {
    
$('#download').click(function() {
      $('#exporttbl').tableExport({
       type: 'csv',
       escape: false,
       exportDataType: 'all',       
       refreshOptions: {
         exportDataType: 'all'
       },
     
       fileName: "ContactusReport",
                        
                     
     });
  });
});
  </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/resources/views/dashboard/contactus/index.blade.php ENDPATH**/ ?>