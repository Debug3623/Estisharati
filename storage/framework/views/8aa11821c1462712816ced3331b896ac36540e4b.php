

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

    <section class="content-header">

        <h1><?php echo app('translator')->get('site.subscriptions'); ?></h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a>
            </li>
            <li><a href="<?php echo e(route('dashboard.subscriptions.index')); ?>"> <?php echo app('translator')->get('site.subscriptions'); ?></a></li>
            <li class="active"><?php echo app('translator')->get('site.edit'); ?></li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title"><?php echo app('translator')->get('site.edit'); ?></h3>
            </div><!-- end of box header -->

            <div class="box-body">

                <?php echo $__env->make('partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form action="<?php echo e(route('dashboard.subscriptions.update', $subscription->id)); ?>" method="post"
                    enctype="multipart/form-data" novalidate>

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('put')); ?>

                    <input id="subscription_id" hidden type="text" name="subscription_id" value="<?php echo e($subscription->id); ?>" >
                    <div class="form-group row"><div class="form-group col-md-6">
                        <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group col-md-12">
                            <?php if(count(config('translatable.locales'))>1): ?>
                                <label><?php echo app('translator')->get('site.' . $locale . '.name'); ?></label>
                        <?php else: ?>
                        <label><?php echo app('translator')->get('site.name'); ?></label>
                        <?php endif; ?>
                                <input type="text" name="<?php echo e($locale); ?>[name]" class="form-control" value="<?php echo e($subscription->translate($locale)->name); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group col-md-12">
                        <?php if(count(config('translatable.locales'))>1): ?>
                            <label><?php echo app('translator')->get('site.' . $locale . '.description'); ?></label>
                        <?php else: ?>
                        <label><?php echo app('translator')->get('site.description'); ?></label>
                        <?php endif; ?>
                                <input type="text" name="<?php echo e($locale); ?>[description]" class="form-control" value="<?php echo e($subscription->translate($locale)->description); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    <div class="form-group col-md-12">
                        <label><?php echo app('translator')->get('site.type'); ?></label>
                        <select id="type" name="type" class="form-control">
                            <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                            <option value="consultation" <?php if($subscription->type=="consultation"): ?> selected     <?php endif; ?>><?php echo app('translator')->get('site.consultation'); ?></option>
                            <option value="courses" <?php if($subscription->type=="courses"): ?> selected     <?php endif; ?>><?php echo app('translator')->get('site.courses'); ?></option>
                            <option value="Both" <?php if($subscription->type=="Both"): ?> selected     <?php endif; ?>><?php echo app('translator')->get('site.both'); ?></option>
                        </select>
                    </div>

                    <div class="form-group col-md-12" id='course_type_group' style="display: none">
                        <label><?php echo app('translator')->get('site.course_type'); ?></label>
                        <select id="course_type" class="form-control" >
                            <option value=" " disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                            <option value="full" <?php if($subscription->course_type=="full"): ?> selected     <?php endif; ?>><?php echo app('translator')->get('site.full'); ?></option>
                            <option value="individual" <?php if($subscription->course_type=="individual"): ?> selected     <?php endif; ?>><?php echo app('translator')->get('site.individual'); ?></option>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label><?php echo app('translator')->get('site.tag'); ?></label>
                        <select id="tag_id" name="tag_id" class="form-control" >
                            <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>">
                                <?php echo e($value); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.select_color_code'); ?></label>
                        <input type="color" name="color_code" class="form-control" value="<?php echo e($subscription->color_code); ?>" style="width:50%;">
                    </div>
                    <div class="form-group col-md-12">
                        <label><?php echo app('translator')->get('site.price'); ?></label>
                        <input min="0" max="10000" step="1" type="number" name="price" class="form-control" value="<?php echo e($subscription->price); ?>">
                    </div>

                    <div class="form-group col-md-12" >
                        <label><?php echo app('translator')->get('site.effective_date'); ?></label>
                        <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="effective_date" class="form-control pull-right" id="datepicker" value="<?php echo e(date('d-m-yy', strtotime($subscription->effective_date) )); ?>" >
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="form-group col-md-12">
                        <label><?php echo app('translator')->get('site.period'); ?></label>
                        <select id="period" name="period" class="form-control">
                            <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                            <option value="One time"><?php echo app('translator')->get('site.one_time'); ?></option>
                            <option value="One month"><?php echo app('translator')->get('site.one_month'); ?></option>
                            <option value="Six months"><?php echo app('translator')->get('site.six_months'); ?></option>
                            <option value="Yearly")><?php echo app('translator')->get('site.yearly'); ?></option>
                        </select>
                    </div>

                    

                    <div class="form-group col-md-12" id="consultant_list" style="display:none">
                            <label><?php echo app('translator')->get('site.select_consultants'); ?></label>

                            <select class="form-control selectpicker" multiple data-live-search="true" name="consultants[]">
                                   <!--   <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option> -->
                                        <?php $__currentLoopData = $consultants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php if(in_array( $key,$subscription_consultants)): ?> selected     <?php endif; ?>>
                                            <?php echo e($value); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                    </div>
                    

                    <div class="form-group col-md-12" id="course_list" style="display:none">
                            <label><?php echo app('translator')->get('site.select_courses'); ?></label>

                            <select class="form-control selectpicker" multiple data-live-search="true" name="courses[]">
                                   <!--   <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option> -->
                                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php if(in_array( $key,$subscription_courses)): ?> selected     <?php endif; ?>>
                                            <?php echo e($value); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                    </div>
                    </div>
                    <div class="col-md-6" id="features_list">
                        <div class="box box-primary">
                            <div class="box-header">
                            <h3 class="box-title"><?php echo app('translator')->get('site.features'); ?></h3>
                            </div>

                            <div class="box-body">
                                <div class="form-group " id='form_features'>
                                    <input type="text" id="features" name="features" value="<?php echo e(json_encode($subscription->features)); ?>" hidden >
                                    <div class="icheck-primary row" id="written_feature">
                                        <div class="col-md-12 col-lg-8">
                                            <input type="checkbox" name="written_checkbox" class ="cls_checkbox" id="written_checkbox">
                                            <label for="written_checkbox"><?php echo app('translator')->get('site.written'); ?> (<?php echo app('translator')->get('site.in_characters'); ?>)</label>
                                        </div>

                                        <input disabled type="number" name="written_time" id="written_time"  placeholder="<?php echo app('translator')->get('site.minutes'); ?>" min="60" max="300000" step="1"
                                                class="clsInpts_written_checkbox col-md-4 col-lg-4 form-control" value="<?php echo e(old('written_time')); ?>" >
                                    </div>

                                    <div class="icheck-primary row" id="audio_feature">
                                        <div class="col-md-12 col-lg-8">
                                            <input type="checkbox" class ="cls_checkbox" name="audio_checkbox" id="audio_checkbox">
                                            <label for="audio_checkbox" ><?php echo app('translator')->get('site.audio'); ?> (<?php echo app('translator')->get('site.in_minutes'); ?>)</label>
                                        </div>

                                        <input disabled type="number" id="audio_time" name="audio_time" placeholder="<?php echo app('translator')->get('site.minutes'); ?>"  min="60" max="300000" step="1"
                                                class="clsInpts_audio_checkbox col-md-4 col-lg-4 form-control" value="<?php echo e(old('audio_time')); ?>" >
                                    </div>

                                    <div class="icheck-primary row" id="video_feature">
                                        <div class="col-md-12 col-lg-8">
                                            <input type="checkbox" class ="cls_checkbox" id="video_checkbox" name="video_checkbox">
                                            <label for="video_checkbox"><?php echo app('translator')->get('site.video'); ?> (<?php echo app('translator')->get('site.in_minutes'); ?>)</label>
                                        </div>

                                        <input disabled type="number" id="video_time" placeholder="<?php echo app('translator')->get('site.minutes'); ?>"  name="video_time" min="60" max="300000" step="1"
                                                class="clsInpts_video_checkbox col-md-4 col-lg-4 form-control" value="<?php echo e(old('video_time')); ?>" >
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>




                    <div class="form-group col-md-12">
                        <button id="edit_subscription" type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>
                            <?php echo app('translator')->get('site.edit'); ?></button>
                    </div>


                </form><!-- end of form -->

            </div><!-- end of box body -->

        </div><!-- end of box -->

    </section><!-- end of content -->

</div><!-- end of content wrapper -->

<!-- bootstrap datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />

<script>
    $( document ).ready(function() {
        //Fill Select  , period value="<?php echo e($subscription->type); ?>

        $("#type").val("<?php echo e($subscription->type); ?>").change();
        $("#tag_id").val("<?php echo e($subscription->tag_id); ?>");
        $("#period").val("<?php echo e($subscription->period); ?>");

        //fill Old Date
        var objFeatures={};
        objFeatures=<?php echo json_encode($subscription->features, 15, 512) ?>;
        featuresArr=['written' , 'audio','video'];
        featuresArr.forEach(feature => {
            if(objFeatures){
                if(objFeatures[feature]!= undefined){
                    $("#"+feature+"_checkbox").attr("checked",true);
                    $('.clsInpts_'+feature+"_checkbox").removeAttr("disabled");
                   // $("#"+feature+"_no").val(objFeatures[feature]['no']);
                    $("#"+feature+"_time").val(objFeatures[feature]['time']);
                }
            }
        });

        //Fill Course_Type If It Added
        if(objFeatures){
            if(objFeatures['course_type']!=undefined) {
                $("#course_type").val(objFeatures['course_type']);
              //  $("#course_type_group").show();$("#video_feature").hide();
              $("#type").val("<?php echo e($subscription->type); ?>").change();
            }
        }


        // function of create New One

        $('#type').change( function() {
            if($(this).val() == 'courses'){
                $("#course_type_group").show();  $("#features_list").hide();
                $("#written_time").val(0);
                $("#video_time").val(0);
                $("#audio_time").val(0);

            }
            else if($(this).val() == 'Both'){
                $("#course_type_group").hide();  $("#features_list").show();

            }
            else if ($(this).val() == 'consultation') {
                $("#course_type_group").hide();   $("#features_list").show();
            }
        });

        $('#datepicker').datepicker({
            autoclose: true,
            todayBtn: "linked",
            language: "ar",
            todayHighlight: true,
            format: 'dd-mm-yyyy'

        });



        $(".cls_checkbox").on('change',function(){
            if(this.checked){
                $('.clsInpts_'+this.id).removeAttr("disabled");
            }else{
                $('.clsInpts_'+this.id).attr("disabled","disabled");
                $('.clsInpts_'+this.id).val('');
            }
        });


        function addInputFeatures(feature){
            objFeatures[feature]={};
           //  objFeatures[feature]["no"]=$("#"+feature+"_no").val();
             objFeatures[feature]["time"]=$("#"+feature+"_time").val();
        }

        $("#edit_subscription").on('click',(e)=>{
            //add featrues
        //    e.preventDefault();

         if(($('#type').val()=="Both") || ($('#type').val()=="consultation") )
         {
            featuresArr=['written' , 'audio','video'];
            featuresArr.forEach(feature => {
                if($("#"+feature+"_checkbox").is(":checked"))
                {
                    addInputFeatures(feature);

                }
                else
                {
                  //  delete objFeatures[feature]
                 //  objFeatures[feature]="0";

                  objFeatures[feature]={};
                  objFeatures[feature]["time"]="0";

                }
            });
            console.log(objFeatures);
            //if subsctiption is cource add to feature course Type
            if($('#type').val() == 'courses'){

                objFeatures["course_type"]=$("#course_type").val();
            }
            else
            {
               objFeatures["course_type"]="";
            }
            $("#features").val( JSON.stringify(objFeatures) );
            //console.log(objFeatures);
         }
         else{

             objFeatures["written"]={};
             objFeatures["written"]["time"]="0";
             objFeatures["audio"]={};
             objFeatures["audio"]["time"]="0";
             objFeatures["video"]={};
             objFeatures["video"]["time"]="0";
             objFeatures["course_type"]=$("#course_type").val();
             $("#features").val( JSON.stringify(objFeatures) );
            // alert(objFeatures);
         }

        });

    });
     $('#type').on('change',function(){
            if($(this).val() == 'courses'){
                $("#course_type_group").show();   $("#features_list").hide();
                $('#course_list').show();
                $('#consultant_list').hide();
            }
            else if($(this).val() == 'Both'){
                $("#course_type_group").hide(); $("#features_list").show();
                $('#course_list').show();
                $('#consultant_list').show();
            }
            else if ($(this).val() == 'consultation') {
                $("#course_type_group").hide();   $("#features_list").show();
                $('#course_list').hide();
                $('#consultant_list').show();
            }
        });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/apptdhaz/public_html/estisharati/Modules/Subscriptions/Resources/views/subscription/edit.blade.php ENDPATH**/ ?>