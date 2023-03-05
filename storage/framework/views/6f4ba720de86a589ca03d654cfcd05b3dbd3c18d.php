
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
   <section class="content-header">
      <h1><?php echo app('translator')->get('site.survey'); ?></h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
         <li><a href="<?php echo e(route('dashboard.surveys.index')); ?>"> <?php echo app('translator')->get('site.survey'); ?></a></li>
         <li class="active"><?php echo app('translator')->get('site.edit'); ?></li>
      </ol>
   </section>
   <section class="content">
      <div class="box box-primary">
         <div class="box-header">
            <h3 class="box-title"><?php echo app('translator')->get('site.edit'); ?></h3>
         </div>
         <!-- end of box header -->
         <div class="box-body">
            <div class="tabbable-line">
               <ul class="nav nav-tabs " id="tabMenu">
                  <li class="active">
                     <a href="#tab_default_1" data-toggle="tab">
                     Survey Details </a>
                  </li>
                  <li>
                     <a href="#tab_question" data-toggle="tab">
                     Survey Questions </a>
                  </li>
               </ul>
               <div class="tab-content">
                  <div class="tab-pane active" id="tab_default_1">
                     <?php echo $__env->make('partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                     <form action="<?php echo e(route('dashboard.surveys.update' , $survey->id)); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('put')); ?>                               
                        <div class="form-group col-md-12">
                           <label><?php echo app('translator')->get('site.type'); ?></label> &nbsp;&nbsp;
                           <input type="radio" name="user_type" class="type" value="consultant"  <?php if($survey->user_type=='consultant'): ?> checked <?php endif; ?>> &nbsp;Consultant &nbsp;&nbsp;
                           <input type="radio" name="user_type" class="type" value="user"  <?php if($survey->user_type=='user'): ?> checked <?php endif; ?>> &nbsp;User
                        </div>
                        <div class="form-group col-md-6">
                           <label><?php echo app('translator')->get('site.en.title'); ?></label>
                           <input type="text" name="title_en" class="form-control" value="<?php echo e($survey->title_en); ?>">
                        </div>
                        <div class="form-group col-md-6">
                           <label><?php echo app('translator')->get('site.ar.title'); ?></label>
                           <input type="text" name="title_ar" class="form-control" value="<?php echo e($survey->title_ar); ?>">
                        </div>
                        <div class="form-group col-md-6">
                           <label><?php echo app('translator')->get('site.en.description'); ?></label>
                           <textarea name="description_en" class="form-control"><?php echo e($survey->description_en); ?> </textarea>
                        </div>
                        <div class="form-group col-md-6">
                           <label><?php echo app('translator')->get('site.ar.description'); ?></label>
                           <textarea name="description_ar" class="form-control"><?php echo e($survey->description_ar); ?> </textarea>
                        </div>
                        <div class="form-group col-md-6">
                           <label><?php echo app('translator')->get('site.image'); ?></label>
                           <input type="file" name="image" id="image" class="form-control image" accept="image/*">
                        </div>
                        <div class="form-group col-md-6">
                           <img src="<?php echo e(url($survey->image_path)); ?>"  style="width: 100px"
                              class="img-thumbnail image-preview" alt="">
                        </div>
                         

                        <div class="form-group col-md-12"><h3><?php echo app('translator')->get('site.outcomes'); ?></h3></div>
                            <div class="form-group row col-md-12">
                                <div class="form-group col-md-5"> 
                                   <?php echo app('translator')->get('site.en.outcomes'); ?>
                                </div>
                                <div class="form-group col-md-5">
                                    <?php echo app('translator')->get('site.ar.outcomes'); ?> 
                                </div>
                                <div class="form-group col-md-2">
                                    <?php echo app('translator')->get('site.action'); ?> 
                                </div>
                            </div>
                            
                        <div id="addoptions">
                            <div class="form-group row col-md-12">
                              

                                <?php for($i=1;$i<=10;$i++): ?>
                                 <div class="form-group removeclass<?php echo e($i); ?>">
                                 <?php
                                    $en='answer'.$i.'_en';
                                    $ar='answer'.$i.'_ar';
                                 ?>
                                    <?php if(!empty($survey->$en)): ?>
                                       
                                         <div class="form-group col-md-5">                           
                                    
                                                <textarea name="answer_en[]" class="outcome_text form-control"><?php echo e($survey->$en); ?></textarea>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(!empty($survey->$ar)): ?>
                                         <div class="form-group col-md-5">                           
                                    
                                                <textarea name="answer_ar[]" class="outcome_text form-control"><?php echo e($survey->$ar); ?></textarea>
                                        </div>
                                    <?php endif; ?>

                                    <?php if($i==1): ?>

                                    <div class="form-group col-md-2">
                                    <button class="btn btn-success" type="button"  onclick="add_more_options();"><i class="fa fa-plus"></i> </button>
                                    </div>
                                    <?php else: ?>
                                       <?php if(!empty($survey->$en) || !empty($survey->$ar)): ?>
                                       <div class="form-group col-md-2">
                                             <button class="btn btn-danger" type="button" onclick="remove_options(<?php echo e($i); ?>);"><i class="fa fa-minus"></i> </button>
                                       </div>
                                       <?php endif; ?>
                                    <?php endif; ?>

                                 </div>
                               <?php endfor; ?>                       
                           

                            
                        </div>
                        </div>
                                           
                        <div class="form-group col-md-12">
                           <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></button>
                        </div>
                     </form>
                     <!-- end of form -->
                  </div>
                  <div class="tab-pane " id="tab_question">
                     <a href="<?php echo e(route('dashboard.surveys.addquestion', $survey->id)); ?>" class="btn btn-success btn-sm"><i class="fa fa-add">Add Question</i></a>
                     <br><br>
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th><?php echo app('translator')->get('site.questions'); ?></th>
                              <th></th>
                              <th></th>
                           </tr>
                        </thead>
                        <?php $__currentLoopData = $survey->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tbody>
                           <tr>
                              <td><?php echo e($key+1); ?></td>
                              <td><?php echo e($item->question_en); ?></td>
                              <td><a href="<?php echo e(route('dashboard.surveys.editquestion', $item->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a></td>
                              <td><a href="<?php echo e(route('dashboard.surveys.deletequestion', $item->id)); ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                           </tr>
                           <tr>
                              <td></td>
                              <td>
                                 <table class="table table-borderless">
                                    <?php $__currentLoopData = $item->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                       <td><?php echo e($option->name_en); ?> </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </table>
                  </div>
               </div>
            </div>
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
      $('textarea').ckeditor(function() {
        }, { toolbar : [
            ['Undo','Redo'],
            ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
        ], toolbarCanCollapse:false, height: '100px', scayt_sLang: 'pt_PT', uiColor : '#EBEBEB' } );
      var tab="<?php echo e(old('tab')); ?>";
      if(tab!=""){
            $("#<?php echo e(old('tab')); ?>").trigger("click");
        }
   } );
   
</script>
<script>
         
        // $('.textarea').ckeditor(); // if class is prefered.
  
         $( document ).ready( function() {
           $("textarea").ckeditor();
           $('#tabMenu a[href="#<?php echo e(old('tab')); ?>"]').tab('show')
        } );


        var room = 1;
        function add_more_options() {
         
            room++;
            var objTo = document.getElementById('addoptions')
            var divtest = document.createElement("div");
            divtest.setAttribute("class", "form-group removeclass"+room);
            var rdiv = 'removeclass'+room;
            var code=' <div class="form-group col-md-3">ff</div>';
            

            
            divtest.innerHTML = '<div class="form-group row col-md-12"><div class="form-group col-md-5"><textarea name="answer_en[]" class="outcome_text form-control"></textarea></div><div class="form-group col-md-5"><textarea name="answer_ar[]" class="outcome_text form-control"></textarea></div><button class="btn btn-danger" type="button"  onclick="remove_options('+ room +');"><i class="fa fa-minus"></i> </button></div></div>';
            
            objTo.appendChild(divtest);
            $('textarea').ckeditor(function() {
        }, { toolbar : [
            ['Undo','Redo'],
            ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
        ], toolbarCanCollapse:false, height: '100px', scayt_sLang: 'pt_PT', uiColor : '#EBEBEB' } );
        }
           function remove_options(rid) {
               $('.removeclass'+rid).remove();
           }

           $('#add_images').on('click', add_input_file);

           function add_input_file(){
            
            if($("#add_images").prop('checked') == true){
                var text='<div class="form-group col-md-2"><input type="file" name="options_image[]" id="image" class="form-control image" accept="image/*" required ></div>';
            }
            else{
                var text='';
            }
            $('.newfile_input').html(text);

           }

         

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Surveys/Resources/views/survey/edit.blade.php ENDPATH**/ ?>