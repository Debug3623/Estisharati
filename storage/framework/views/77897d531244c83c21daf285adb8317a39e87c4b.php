<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1><?php echo app('translator')->get('site.survey'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li><a href="<?php echo e(route('dashboard.surveys.index')); ?>"> <?php echo app('translator')->get('site.survey'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.add'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title"><?php echo app('translator')->get('site.add'); ?></h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    <?php echo $__env->make('partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <form action="<?php echo e(route('dashboard.surveys.store')); ?>" method="post" enctype="multipart/form-data">

                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('post')); ?>


                        <div class="form-group col-md-12">
                           
                                <label><?php echo app('translator')->get('site.type'); ?></label>
                                <input type="radio" name="user_type" class="type" value="consultant"> Consultant
                                <input type="radio" name="user_type" class="type" value="user" checked> User

                        </div>

                       
                        
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.en.title'); ?></label>
                       
                                <input type="text" name="title_en" class="form-control" value="<?php echo e(old('title_en')); ?>">
                        </div>
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.ar.title'); ?></label>
                       
                                <input type="text" name="title_ar" class="form-control" value="<?php echo e(old('title_ar')); ?>">
                        </div>
                         <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.en.description'); ?></label>
                       
                                <textarea name="description_en" class="textarea form-control"><?php echo e(old('description_en')); ?> </textarea>
                        </div>
                         <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.ar.description'); ?></label>
                       
                                <textarea name="description_ar" class="textarea form-control"><?php echo e(old('description_ar')); ?> </textarea>
                        </div>
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.image'); ?></label>
                       
                                 <input type="file" name="image" id="image" class="form-control image" accept="image/*">
                        </div>
                        <div class="form-group col-md-6">
                            <img src="<?php echo e(asset('public/uploads/courses_files/default.png')); ?>"  style="width: 100px"
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
                            <div class="form-group col-md-5">                           
                                    
                                    <textarea name="answer_en[]" class="outcome_text form-control"><?php echo e(old('description_en')); ?> </textarea>
                            </div>
                            
                             <div class="form-group col-md-5">
                               
                                    <textarea name="answer_ar[]" class="outcome_text form-control"><?php echo e(old('description_ar')); ?> </textarea>
                            </div>  

                            <div class="form-group col-md-2">
                                    <button class="btn btn-success" type="button"  onclick="add_more_options();"><i class="fa fa-plus"></i> </button>
                            </div>
                        </div>
                        </div>
                                           
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> <?php echo app('translator')->get('site.add'); ?></button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

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
           
           
        } );

</script>

<script>
         
        // $('.textarea').ckeditor(); // if class is prefered.
  
         $( document ).ready( function() {
           $("textarea").ckeditor();
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

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Surveys/Resources/views/survey/create.blade.php ENDPATH**/ ?>