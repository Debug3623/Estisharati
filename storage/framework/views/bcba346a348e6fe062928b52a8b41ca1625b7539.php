

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

    <section class="content-header">

        <h1><?php echo app('translator')->get('site.courses'); ?></h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a>
            </li>
            <li><a href="<?php echo e(route('dashboard.courses.index')); ?>"> <?php echo app('translator')->get('site.courses'); ?></a></li>
            <li class="active"><?php echo app('translator')->get('site.edit'); ?></li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title"><?php echo app('translator')->get('site.edit'); ?></h3>
            </div><!-- end of box header -->
            <div class="box-body row">
                <div id="errors" class="alert alert-danger" hidden>
                </div>
                <?php echo $__env->make('partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="tabbable-panel">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs ">
                        <li class="active">
                            <a href="#tab_default_1" data-toggle="tab"><?php echo app('translator')->get('site.course'); ?></a>
                        </li>
                        <li>
                            <a href="#tab_default_2" id="resourses_tab" data-toggle="tab"><?php echo app('translator')->get('site.chapters'); ?> </a>
                        </li> 
                        <li>
                            <a href="#tab_default_3" id="lessons_tab" data-toggle="tab"><?php echo app('translator')->get('site.lessons'); ?> </a>
                        </li> 
                                              
          
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_default_1">
                            <p>
                            <form id="courseform" action="<?php echo e(route('dashboard.courses.update', $course->id)); ?>" method="post" enctype="multipart/form-data">

                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('put')); ?>

                                       <div class="col-md-12">
                                             <input id="course_id" hidden type="text" name="course_id" value="<?php echo e($course->id); ?>" required>

                                           <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-group col-md-6">
                                                    <?php if(count(config('translatable.locales'))>1): ?> 
                                                        <label><?php echo app('translator')->get('site.' . $locale . '.name'); ?></label>
                                                    <?php else: ?>
                                                    <label><?php echo app('translator')->get('site.name'); ?></label>
                                                    <?php endif; ?>
                                                    <input type="text" name="<?php echo e($locale); ?>[name]" class="form-control required" value="<?php echo e($course->translate($locale)->name); ?>" required> 
                                                  
                                                </div>
                                                
                                               

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                           <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-group col-md-6">
                                                    <?php if(count(config('translatable.locales'))>1): ?> 
                                                        <label><?php echo app('translator')->get('site.' . $locale . '.description'); ?></label>
                                                    <?php else: ?>
                                                    <label><?php echo app('translator')->get('site.name'); ?></label>
                                                    <?php endif; ?>
                                                    <textarea name="<?php echo e($locale); ?>[description]" class="form-control required" required> <?php echo e($course->translate($locale)->description); ?> </textarea>
                                                </div>
                                                
                                               

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <div class="form-group col-md-3">
                                                <label><?php echo app('translator')->get('site.category'); ?></label>
                                                <select id="category_id" name="category_id" class="form-control required" required>
                                                    <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($key); ?>"    <?php if($course->category_id==$key): ?> selected     <?php endif; ?>>
                                                              
                                                        <?php echo e($value); ?>

                                                    </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-md-3">
                                                <label><?php echo app('translator')->get('site.period'); ?></label>
                                                <select id="period" name="period" class="form-control required" required>
                                                    <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                                                    <option value="One time"  <?php if($course->period=="One time"): ?> selected     <?php endif; ?>><?php echo app('translator')->get('site.one_time'); ?></option>
                                                    <option value="One month"  <?php if($course->period=="One month"): ?> selected     <?php endif; ?>><?php echo app('translator')->get('site.one_month'); ?></option>
                                                    <option value="Six months"  <?php if($course->period=="Six months"): ?> selected     <?php endif; ?>><?php echo app('translator')->get('site.six_months'); ?></option>
                                                    <option value="Yearly")  <?php if($course->period=="Yearly"): ?> selected     <?php endif; ?>><?php echo app('translator')->get('site.yearly'); ?></option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label><?php echo app('translator')->get('site.price'); ?></label>
                                                <input min="0" max="10000" step="1" type="number" name="price" class="form-control required" value="<?php echo e($course->price); ?>"required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label><?php echo app('translator')->get('site.course_duration'); ?></label>
                                                <input type="text" name="course_duration" class="form-control required" value="<?php echo e($course->course_duration); ?>"required>
                                            </div>

                                           
                                            <div class="form-group col-md-6">
                                                <label><?php echo app('translator')->get('site.image'); ?></label>
                                                <input type="file" name="image" id="image" class="form-control image" accept="image/*">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <img src="<?php echo e(asset('public/uploads/courses_files/'.$course->image)); ?>"  style="width: 100px; height: 100px;"
                                                    class="img-thumbnail image-preview" alt="">
                                            </div>
                                             <div class="form-group col-md-12 row">
                                                <div class="form-group col-md-6">
                                                    <label><?php echo app('translator')->get('site.preview_video'); ?></label>
                                                    <input type="file" name="preview_video" id="preview_video" class="form-control video" accept="video/*">
                                           
                                                </div>
                                                
                                                <?php if(!empty($course->preview_video )): ?>
                                                <div class="form-group col-md-6">
                                          
                                                 <!-- Button HTML (to Trigger Modal) -->
                                                     <a href="#view_preview_video_modal" class="btn btn-primary btn-sm " style="margin-top: 30px;" data-toggle="modal"> <?php echo app('translator')->get('site.preview_video'); ?></a>
                                                 </div>
                                                 
                                                <?php endif; ?> 
                                            </div>    
                                          </div>
                                          <div class="form-group col-md-12" style="text-align: center;">
                                <button  id="check_course" type="submit" class="btn btn-primary"> <?php echo app('translator')->get('site.save_course'); ?></button>
                            </div>
                            </form><!-- end of form -->
                              
                            </p>
                            
                        </div>
                      
                       <div class="tab-pane" id="tab_default_2" >                           
                            <div class="box-body" style="min-height:200px;">                        
                               <a href="<?php echo e(route('dashboard.courses.addchapter', $course->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-add"> <i class="fa fa-plus" aria-hidden="true"></i> <?php echo app('translator')->get('site.add_chapter'); ?> </i></a>                               
         

                                <div class="box-body" style="min-height:200px;">
                                        <!-- // Table to add course resources  -->

                                       
                                        <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><?php echo app('translator')->get('site.chapter_title'); ?></th>
                                                <th><?php echo app('translator')->get('site.action'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if($chapters->count()>0): ?>
                                        <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                 
                                        
                                                <tr>
                                                    <td style="width:5%;"><?php echo e($key+1); ?></td>
                                                    <td style="width:65%;"><?php echo e($value->chapter_title); ?></td>
                                                    <td style="width:30%;"> 
                                                        <?php if(auth()->user()->hasPermission('update_courses')): ?>
                                                         <a href="<?php echo e(route('dashboard.courses.editchapter', $value->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></a>
                                              
                                                        <?php endif; ?>   
                                                        <?php if(auth()->user()->hasPermission('delete_courses')): ?>
                                                        <a href="" id="<?php echo e($value->id); ?>" class="<?php echo e($key); ?> deleteCourseResource btn btn-danger btn-circle btn-sm" >
                                                            <i class="fa fa-trash"> <?php echo app('translator')->get('site.delete'); ?></i>
                                                        </a>

                                                  
                                                    <?php endif; ?>
                              

                                                    </td>
                                                </tr>
                                        
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <?php endif; ?>
                                      </table>                                       

                                      

                              



                                </div>
                            </div>
                        </div>

                      

                       <div class="tab-pane" id="tab_default_3" >
                        <div class="box-body" style="min-height:200px;">
                            <a href="<?php echo e(route('dashboard.courses.addlesson', $course->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>  <?php echo app('translator')->get('site.add_lesson'); ?></a>
                            <?php if($chapters->count()>0): ?>                                
                                <?php $__currentLoopData = $chapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <h4 class="text-danger" style="padding-top: 20px;"><b><?php echo e($key+1); ?>. <?php echo e($value->chapter_title); ?></b></h4>
                                <?php if(!empty($value['lessons'])): ?>
                                    <table id="" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th><?php echo app('translator')->get('site.lesson_title'); ?></th>
                                                        <th><?php echo app('translator')->get('site.action'); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <?php $__currentLoopData = $value['lessons']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $lessons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                
                                                        <tr>
                                                            <td style="width:5%;"><?php echo e($key2+1); ?></td>
                                                            <td style="width:65%;"> <?php if($lessons->ext=='mp4'): ?>
                                                                        <i class="fa fa-video-camera"></i>

                                                                    <?php elseif($lessons->ext=='jpeg' || $lessons->ext=='jpg' |$lessons->ext=='png'): ?>
                                                                        <i class="fa fa-image"></i>
                                                                    <?php elseif($lessons->ext=='pdf' || $lessons->ext=='doc' || $lessons->ext=='docx'): ?>
                                                                        <i class="fa fa-file"></i>
                                                                    <?php else: ?>
                                                                        <i class="fa fa-question"></i>

                                                                    <?php endif; ?>

                                                                    &nbsp;&nbsp;<?php echo e($lessons->title); ?>

                                                            </td>
                                                            <td style="width:30%;">
                                                                <div class="d-flex justify-content-between">
                                                                <a href="<?php echo e(route('dashboard.courses.editlesson', $lessons->id)); ?>" class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></a>
                                                                <a href="" id="<?php echo e($lessons->id); ?>" class="<?php echo e($key); ?> deletelesson btn btn-danger  btn-sm" >
                                                                <i class="fa fa-trash"></i>
                                                                <?php echo app('translator')->get('site.delete'); ?>
                                                                </a>
                                                                <a href="<?php echo e(asset('public/uploads/courses_files/'.$lessons->filename)); ?>" class="<?php echo e($key); ?> editItem btn btn-success btn-sm" target="_blank">
                                                                <i class="fa fa-eye"></i>
                                                                <?php echo app('translator')->get('site.view_file'); ?>
                                                                </a>
                                                            </div>
                                                            </td>
                                                         </tr>
                                                
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                    </table>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                       </div>                
                  
               
            </div><!-- end of box body -->
           

        </div><!-- end of box -->
        
       

    </section><!-- end of content -->


<!--Video Preview Modal HTML -->
    <div id="view_preview_video_modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo app('translator')->get('site.preview_video'); ?></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="show_preview_video" class="embed-responsive-item" width="560" height="315" src="<?php echo e(asset('public/uploads/courses_files/'.$course->preview_video)); ?>" allowfullscreen></iframe>
                  </div>
                </div>
            </div>
        </div>
    </div>


                        </div>
           
                    </div>
                </div>
            </div>
               
                        
                    


<!-- End Edit Chapter Model -->

</div><!-- end of content wrapper -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> -->
<script src="http://malsup.github.com/jquery.form.js"></script>
 <script>
    //redirect to specific tab
    $(document).ready(function () {
    var tab="<?php echo e(old('tab')); ?>";
    if(tab!=""){
        $("#<?php echo e(old('tab')); ?>").trigger("click");
    }
    
        
    });

    //DELETE Chapter.......
    $(".deleteCourseResource").click(function(e){
    e.preventDefault();
    var id = $(this).attr("id"); 
    var token = $("meta[name='csrf-token']").attr("content");
    var path='<?php echo e(url("dashboard/coursesresource")); ?>/'+id;
    $tr = $(this).closest("tr");
    $.ajax(
    {
        url: path,
        type: 'DELETE',
        data: {
            "id": id,
               '_token': '<?php echo e(csrf_token()); ?>',
        },
        success: function (data){
             
             $tr.find('td').fadeOut(700,function() {
                    $tr.remove();
            });
        }
    });
   });


    $(".deletelesson").click(function(e){
        e.preventDefault();
    var id = $(this).attr("id"); 
    var token = $("meta[name='csrf-token']").attr("content");
    var path='<?php echo e(url("dashboard/lessons")); ?>/'+id;
    $tr = $(this).closest("tr");
    $.ajax(
    {
        url: path,
        type: 'DELETE',
        data: {
            "id": id,
               '_token': '<?php echo e(csrf_token()); ?>',
        },
        success: function (data){
            
             $tr.find('td').fadeOut(700,function() {
                    $tr.remove();
            });
        }
    });
   });







     var url = $("#show_preview_video").attr('src');
    // $('#show_preview_video')[0].pause();
    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#view_preview_video_modal").on('hide.bs.modal', function(){
       // console.log("closed");
        $("#show_preview_video").attr('src', '');
        $iframe = $(this).find("iframe");
        $iframe.attr("src", $iframe.attr("src"));
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#view_preview_video_modal").on('show.bs.modal', function(){
        // console.log("open");
        $("#show_preview_video").attr('src', url);
    });
   



    </script>


<script>
         
       //  $('.textarea').ckeditor(); // if class is prefered.
  
         $( document ).ready( function() {
           $("textarea").ckeditor();
        } );



</script>



<!--<script type="text/javascript">
    
    $(document).ready(function () {
                $(document).on('mouseenter', '.buttons', function () {
                    $(this).find(":button").show();                    
                }).on('mouseleave', '.buttons', function () {
                    $(this).find(":button").hide();
                });
            });
</script> -->
<!-- <script type="text/javascript">
    
    $(document).ready(function(){

    $("#category_id").change(function(){
        var category_id = $(this).val();
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: "<?php echo e(route('dashboard.courses.getConsultants')); ?>",
            type: 'get',
           // data: {category_id:category_id},
            data: {
            "category_id": category_id,
               '_token': '<?php echo e(csrf_token()); ?>',
            },
            dataType: 'json',
            success:function(response){
               var len = response.length;

               $(".consultants").empty();
               for( var i = 0; i<len; i++){
                    var id = response[i]['id'];
                    var name = response[i]['name'];
                    
                    $(".consultants").html("<option value='"+id+"'>"+name+"</option>");

                } 
               // alert(response.html);exit;
               // $('.consultants').html(response.html);
                
                
            }
        });
    });

});
</script> -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Courses/Resources/views/course/edit.blade.php ENDPATH**/ ?>