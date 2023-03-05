
<style type="text/css">
 
.progress-bar-success {
background-color: #0AA699;
background-image: none;
}
.progress-bar-info {
background-color: #0090D9;
background-image: none;
}
.progress-bar-warning {
background-color: #FDD01C;
background-image: none;
}
.progress-bar-danger {
background-color: #F35958;
background-image: none;
}
.progress-bar-primary {
background-color: #85C1E9 ;
background-image: none;
}
.progress-bar-dark  {
background-color: #2C3E50;
background-image: none;
}
.progress-bar-secondary  {
background-color: #7DCEA0;
background-image: none;
}
</style>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
   <section class="content-header">
      <h1><?php echo app('translator')->get('site.survey'); ?></h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
         <li><a href="<?php echo e(route('dashboard.surveys.index')); ?>"> <?php echo app('translator')->get('site.survey'); ?></a></li>
         <li class="active"><?php echo app('translator')->get('site.show'); ?></li>
      </ol>
   </section>
   <section class="content">
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title"><?php echo app('translator')->get('site.show'); ?></h3>
         </div>
         <!-- end of box header -->
         <div class="box-body">           
   <h3>Survey Report</h3>           
   <?php $__currentLoopData = $survey->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
   <div class="row col-md-12">
      <div class="col-md-12">
                  
                  <p> <?php echo e($item->question_en); ?></p>
                  <br>
                  <div class="col-md-11">
                    <?php $__currentLoopData = $item->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h6><?php echo e($option->name_en); ?> ( <?php echo e($percent[$option->id]); ?> )</h6>                    
                    <div class="progress">
                      <div data-percentage="0%" style="width: <?php echo e($percent[$option->id]); ?>" class="progress-bar <?php echo e($colors[$key2]); ?>" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
   </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
                     <!-- end of form -->
                  </div>                  
              
         <!-- end of box body -->
      </div>
</div>
<!-- end of box -->
</section><!-- end of content -->
</div><!-- end of content wrapper -->
<script>
   // $('.textarea').ckeditor(); // if class is prefered.
   
    $( document ).ready( function() {
      $("textarea").ckeditor();
      var tab="<?php echo e(old('tab')); ?>";
      if(tab!=""){
            $("#<?php echo e(old('tab')); ?>").trigger("click");
        }
   } );
   
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Surveys/Resources/views/survey/show.blade.php ENDPATH**/ ?>