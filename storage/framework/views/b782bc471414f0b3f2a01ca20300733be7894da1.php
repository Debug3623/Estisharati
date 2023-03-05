

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

    <section class="content-header">

        <h1><?php echo app('translator')->get('site.subscriptions'); ?></h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a>
            </li>
            <li><a href="<?php echo e(route('dashboard.subscriptions.index')); ?>"> <?php echo app('translator')->get('site.subscriptions'); ?></a></li>
            <li class="active"><?php echo app('translator')->get('site.add'); ?></li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title"><?php echo app('translator')->get('site.add'); ?></h3>
            </div><!-- end of box header -->

            <div class="box-body row">

                <?php echo $__env->make('partials._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form action="<?php echo e(route('dashboard.subscriptions.store')); ?>" method="post" enctype="multipart/form-data">

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('post')); ?>


                    <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group col-md-6">
                        <?php if(count(config('translatable.locales'))>1): ?>
                            <label><?php echo app('translator')->get('site.' . $locale . '.name'); ?></label>
                    <?php else: ?>
                    <label><?php echo app('translator')->get('site.name'); ?></label>
                    <?php endif; ?>
                            <input type="text" name="<?php echo e($locale); ?>[name]" class="form-control" value="<?php echo e(old($locale . '.name')); ?>">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = config('translatable.locales'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group col-md-6">
                    <?php if(count(config('translatable.locales'))>1): ?>
                        <label><?php echo app('translator')->get('site.' . $locale . '.description'); ?></label>
                    <?php else: ?>
                    <label><?php echo app('translator')->get('site.description'); ?></label>
                    <?php endif; ?>
                            <textarea type="text" name="<?php echo e($locale); ?>[description]" class="form-control" value="<?php echo e(old($locale . '.description')); ?>"></textarea>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.type'); ?></label>
                        <select id="type" name="type" class="form-control" required>
                        <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                            <option value="consultation"><?php echo app('translator')->get('site.consultation'); ?></option>
                            <option value="courses")><?php echo app('translator')->get('site.courses'); ?></option>
                            <option value="both")><?php echo app('translator')->get('site.both'); ?></option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.tag'); ?></label>
                        <select id="tag_id" name="tag_id" class="form-control" required>
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
                        <input type="color" name="color_code" class="form-control" value="" style="width:50%;">
                    </div>

                    <div class="form-group col-md-6" id='course_type_group' hidden>
                        <label><?php echo app('translator')->get('site.course_type'); ?></label>
                        <select id="course_type" class="form-control" >
                        <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                            <option value="full"><?php echo app('translator')->get('site.full'); ?></option>
                            <option value="individual")><?php echo app('translator')->get('site.individual'); ?></option>
                        </select>
                    </div>


                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.price'); ?></label>
                        <input min="0" max="10000" step="1" type="number" name="price" class="form-control" value="<?php echo e(old('price')); ?>"required>
                    </div>

                    <div class="form-group col-md-6" >
                        <label><?php echo app('translator')->get('site.effective_date'); ?></label>
                        <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" autocomplete="off" name="effective_date" class="form-control pull-right" id="datepicker" value="<?php echo e(old('effective_date')); ?>" required>
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.period'); ?></label>
                        <select id="period" name="period" class="form-control">
                            <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                            <option value="One time"><?php echo app('translator')->get('site.one_time'); ?></option>
                            <option value="One month"><?php echo app('translator')->get('site.one_month'); ?></option>
                            <option value="Six months"><?php echo app('translator')->get('site.six_months'); ?></option>
                            <option value="Yearly")><?php echo app('translator')->get('site.yearly'); ?></option>
                        </select>
                    </div>
                    

                    <div class="form-group col-md-6" id="consultant_list" style="display:none">
                            <label><?php echo app('translator')->get('site.select_consultants'); ?></label>

                            <select class="form-control selectpicker" multiple data-live-search="true" name="consultants[]">
                                   <!--   <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option> -->
                                        <?php $__currentLoopData = $consultants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>">
                                            <?php echo e($value); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                    </div>
                    

                    <div class="form-group col-md-6" id="course_list" style="display:none">
                            <label><?php echo app('translator')->get('site.select_courses'); ?></label>

                            <select class="form-control selectpicker" multiple data-live-search="true" name="courses[]">
                                   <!--   <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option> -->
                                        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>">
                                            <?php echo e($value); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                    </div>

                    <div class="col-md-6" id="features_list">
                        <div class="box box-primary">
                            <div class="box-header">
                            <h3 class="box-title"><?php echo app('translator')->get('site.features'); ?></h3>
                            </div>

                            <div class="box-body">
                                <div class="form-group " id='form_features'>
                                    <input type="text" id="features" name="features" hidden>
                                    <div class="icheck-primary row">
                                        <div class="col-md-3 col-lg-3">
                                            <input type="checkbox" class ="cls_checkbox" id="written_checkbox">
                                            <label for="written_checkbox"><?php echo app('translator')->get('site.written'); ?> (<?php echo app('translator')->get('site.in_characters'); ?>)</label>
                                        </div>
                                       <!-- <input disabled type="number" id="written_no" placeholder="<?php echo app('translator')->get('site.number'); ?>" min="1" max="10000" step="1"
                                                class="clsInpts_written_checkbox col-md-3 col-lg-3 form-control" value="<?php echo e(old('written_no')); ?>" required> -->
                                        <input disabled type="number" id="written_time"  placeholder="<?php echo app('translator')->get('site.minutes'); ?>" min="60" max="10000" step="1"
                                                class="clsInpts_written_checkbox col-md-4 col-lg-4 form-control" value="<?php echo e(old('written_time')); ?>" required>
                                    </div>

                                    <div class="icheck-primary row">
                                        <div class="col-md-3 col-lg-3">
                                            <input type="checkbox" class ="cls_checkbox" id="audio_checkbox">
                                            <label for="audio_checkbox" ><?php echo app('translator')->get('site.audio'); ?></label>
                                        </div>
                                       <!-- <input disabled type="number" id="audio_no" placeholder="<?php echo app('translator')->get('site.number'); ?>" min="1" max="10000" step="1"
                                                class="clsInpts_audio_checkbox col-md-3 col-lg-3 form-control" value="<?php echo e(old('audio_no')); ?>" required> -->
                                        <input disabled type="number" id="audio_time" placeholder="<?php echo app('translator')->get('site.minutes'); ?>"  min="60" max="10000" step="1"
                                                class="clsInpts_audio_checkbox col-md-4 col-lg-4 form-control" value="<?php echo e(old('audio_time')); ?>" required>
                                    </div>

                                    <div class="icheck-primary row" id="video_feature">
                                        <div class="col-md-3 col-lg-3">
                                            <input type="checkbox" class ="cls_checkbox" id="video_checkbox" >
                                            <label for="video_checkbox"><?php echo app('translator')->get('site.video'); ?></label>
                                        </div>
                                        <!-- <input disabled type="number" id="video_no" placeholder="<?php echo app('translator')->get('site.number'); ?>"  min="1" max="10000" step="1"
                                                class="clsInpts_video_checkbox col-md-3 col-lg-3 form-control" value="<?php echo e(old('video_no')); ?>" required> -->
                                        <input disabled type="number" id="video_time" placeholder="<?php echo app('translator')->get('site.minutes'); ?>"  min="60" max="10000" step="1"
                                                class="clsInpts_video_checkbox col-md-4 col-lg-4 form-control" value="<?php echo e(old('video_time')); ?>" required>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="form-group col-md-12">
                        <button id="add_subscription" type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            <?php echo app('translator')->get('site.add'); ?></button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of box body -->

        </div><!-- end of box -->

    </section><!-- end of content -->

</div><!-- end of content wrapper -->

<!-- date-range-picker -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script> -->
<!-- bootstrap datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />

<script>
    $( document ).ready(function() {

        $('#type').change( function() {
            if($(this).val() == 'courses'){
                $("#course_type_group").show();   $("#video_feature").hide();
            }
            else if($(this).val() == 'both'){
                $("#course_type_group , #video_feature").show();
            }
            else if ($(this).val() == 'consultation') {
                $("#course_type_group").hide();   $("#video_feature").show();
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

        var objFeatures={};
        function addInputFeatures(feature){
            objFeatures[feature]={};
            // objFeatures[feature]["no"]=$("#"+feature+"_no").val();
             objFeatures[feature]["time"]=$("#"+feature+"_time").val();
        }

        $("#add_subscription").on('click',function(){
            //add featrues
            featuresArr=['written' , 'audio','video'];
            featuresArr.forEach(feature => {
                if($("#"+feature+"_checkbox").is(":checked"))
                {
                    addInputFeatures(feature);

                }
                else
                {
                    //delete objFeatures[feature]

                  objFeatures[feature]={};
                  objFeatures[feature]["time"]="0";
                }
            });

            //if subsctiption is cource add to feature course Type
            if($('#type').val() == 'courses'){
                objFeatures["course_type"]=$("#course_type").val();

            }
            $("#features").val( JSON.stringify(objFeatures) );
        });
    });

    $('#type').on('change',function(){
            if($(this).val() == 'courses'){
                $("#course_type_group").show();   $("#features_list").hide();
                $('#course_list').show();
                $('#consultant_list').hide();
            }
            else if($(this).val() == 'both'){
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

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Subscriptions/Resources/views/subscription/create.blade.php ENDPATH**/ ?>