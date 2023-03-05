

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

    <section class="content-header">

        <h1><?php echo app('translator')->get('site.employees'); ?></h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a>
            </li>
            <li><a href="<?php echo e(route('dashboard.manage_employees.index')); ?>"> <?php echo app('translator')->get('site.users'); ?></a></li>
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

                <form action="<?php echo e(route('dashboard.manage_employees.store')); ?>" method="post" enctype="multipart/form-data">

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('post')); ?>

                    <input id="type" hidden type="text" name="type" value="Consultant" required>
                    <div class="form-group col-md-3">
                        <label><?php echo app('translator')->get('site.first_name'); ?></label>
                        <input type="text" name="fname" class="form-control" value="<?php echo e(old('fname')); ?>">
                    </div>

                    <div class="form-group col-md-3">
                        <label><?php echo app('translator')->get('site.last_name'); ?></label>
                        <input type="text" name="lname" class="form-control" value="<?php echo e(old('lname')); ?>">
                    </div>


                    <div class="form-group col-md-3">
                        <label><?php echo app('translator')->get('site.email'); ?></label>
                        <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>">
                    </div>

                    <div class="form-group col-md-3" >
                        <label><?php echo app('translator')->get('site.phone'); ?></label>
                        <div id="result">
                            <input id="phone" type="tel" name="phone" class="form-control" value="<?php echo e(old('phone')); ?>">
                            <span id="valid-msg" class="hide">✓ Valid</span>
                            <span id="error-msg" class="hide"></span>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.image'); ?></label>
                        <input type="file" name="image" class="form-control image">
                    </div>

                    <div class="form-group col-md-6">
                        <img src="<?php echo e(asset('public/uploads/user_images/default.png')); ?>" style="width: 100px"
                            class="img-thumbnail image-preview" alt="">
                    </div>

                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.password'); ?></label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.password_confirmation'); ?></label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <?php $i=1; ?>
                    <?php $__currentLoopData = $userMetaskey; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($i %3 ==0): ?>
                              <div class="clearfix"></div>
                        <?php endif; ?>
                        <?php if($key=='country'): ?>
                            <div class="form-group col-md-4">
                                <label><?php echo app('translator')->get('site.country'); ?></label>
                                <select id="country" name="country" class="form-control" required>
                                    <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($key); ?>">
                                        <?php echo e($value); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        <?php elseif($key=='city'): ?>
                            <div class="form-group col-md-4">
                                <label><?php echo app('translator')->get('site.city'); ?></label>
                                <select id="city" name="city" class="form-control" required>
                                    <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                                </select>
                            </div>

                        <?php elseif($key=="chat" || $key=="voice" || $key=="video"): ?>
                        <div class="row">
                        <div class="col-lg-6 mt-2"> <label><?php echo app('translator')->get('site.'.$key); ?></label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <input type="checkbox"  name="<?php echo e($key); ?>" class="<?php echo e($key); ?>_checkbox">
                                </span>
                            </div>
                            <div class="form-group col-md-4">
                                <label><?php echo app('translator')->get('site.'.$key.'_count'); ?></label>
                            <input type="text" class="form-control" id="<?php echo e($key); ?>_count" name="<?php echo e($key); ?>_count" value="<?php echo e(old($key.'_count')); ?>" disabled="disabled" >
                            </div>
                            <div class="form-group col-md-4">

                                <label><?php echo app('translator')->get('site.'.$key.'_fee'); ?></label>
                            <input type="text" class="form-control" id="<?php echo e($key); ?>_fee" name="<?php echo e($key); ?>_fee" value="<?php echo e(old($key.'_fee')); ?>" disabled="disabled" >
                            </div>
                            </div>
                            <!-- /input-group -->
                        </div>
                        </div>


                        <?php else: ?>
                        <?php if(($type !='hidden') && ($key != "chat_fee") && ($key != "voice_fee") && ($key != "video_fee")
                         && ($key != "chat_count") && ($key != "voice_count") && ($key != "video_count")): ?>
                                <div class="form-group col-md-4">
                                    <label><?php echo app('translator')->get('site.'.$key); ?></label>
                                    <?php if($type =='textarea'): ?>
                                        <textarea class="form-control" name="<?php echo e($key); ?>" rows="3" placeholder="Enter Breif ..."><?php echo e(old($key)); ?></textarea>
                                    <?php else: ?>
                                        <input class="form-control" type="<?php echo e($type); ?>" name="<?php echo e($key); ?>"  value="<?php echo e(old($key)); ?>" >
                                    <?php endif; ?>
                                </div>
                              <?php endif; ?>
                        <?php endif; ?>
                    <?php $i= $i+1; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">

                                <label><?php echo app('translator')->get('site.select_employee_consultation_category'); ?></label>

                                <select class="form-control selectpicker" data-actions-box="true" data-selected-text-format="count > 6" data-live-search="true" name="categories[]" multiple required>
                                   <!--   <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option> -->
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>">
                                            <?php echo e($value); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                        </div>

                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
                            <?php echo app('translator')->get('site.add'); ?></button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of box body -->

        </div><!-- end of box -->

    </section><!-- end of content -->

</div><!-- end of content wrapper -->
<script>
    (function() {

            var cities=<?php echo json_encode($cities, 15, 512) ?>;
            //fill city When Country Changed
            $("#country").change(function(){
                var country_id= $("#country").val();
                var options='';
                cities[country_id].forEach(element => {
                    options+='<option value="'+element['id']+'">'+element['name']+'</option>'
                });
                $("#city").html(options);
            });

            var input = document.querySelector("#phone"),
            errorMsg = document.querySelector("#error-msg"),
            validMsg = document.querySelector("#valid-msg");

            // here, the index maps to the error code returned from getValidationError - see readme
            var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

            // initialise plugin
            var iti = window.intlTelInput(input, {
                hiddenInput: "phone",
                nationalMode: true,
                initialCountry: 'ae',
                preferredCountries: ['ae','eg'],
                utilsScript: "../../../public/dashboard_files/plugins/intl-tel-input/build/js/utils.js?1585994360633"
            });

            var reset = function() {
            input.classList.remove("error");
            errorMsg.innerHTML = "";
            errorMsg.classList.add("hide");
            validMsg.classList.add("hide");
            };

            var handleChange = function() {
                var text = (iti.isValidNumber()) ? "International: " + iti.getNumber() : "Please enter a number below";
                var textNode = document.createTextNode(text);
                output.innerHTML = "";
                output.appendChild(textNode);
            };

            // on blur: validate
            input.addEventListener('blur', function() {
            reset();
            if (input.value.trim()) {
                if (iti.isValidNumber()) {
                validMsg.classList.remove("hide");
                } else {
                input.classList.add("error");
                var errorCode = iti.getValidationError();
                errorMsg.innerHTML = errorMap[errorCode];
                errorMsg.classList.remove("hide");
                }
            }
            });

            // on keyup / change flag: reset
            input.addEventListener('change', reset);
            input.addEventListener('keyup', reset);

            // try {
            //     //  var input = document.querySelector("#phone");
            //     window.intlTelInput(input, {
            //     initialCountry: "auto",
            //     geoIpLookup: function(callback) {
            //         $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
            //         var countryCode = (resp && resp.country) ? resp.country : "";
            //         callback(countryCode);
            //         });
            //     },
            //     utilsScript: "../../../../public/dashboard_files/plugins/intl-tel-input/build/js/utils.js?1590403638580" // just for formatting/placeholders etc
            //     });
            // } catch (error) {

            // }


            $(".chat_checkbox").click(function () {

                if ($(this).is(":checked")) {

                    $("#chat_count").removeAttr("disabled");
                    $("#chat_fee").removeAttr("disabled");
                    $("#chat_fee").focus();
                    $("#chat_count").focus();

                } else {
                    $("#chat_count").attr("disabled", "disabled");
                    $("#chat_fee").attr("disabled", "disabled");
                    // $("#chat_fee").val('');
                    // $("#chat_count").val('');

                }
            });

            $(".video_checkbox").click(function () {

                if ($(this).is(":checked")) {

                    $("#video_count").removeAttr("disabled");
                    $("#video_fee").removeAttr("disabled");
                    $("#video_fee").focus();
                    $("#video_count").focus();

                } else {
                    $("#video_count").attr("disabled", "disabled");
                    $("#video_fee").attr("disabled", "disabled");
                    // $("#video_fee").val('');
                    // $("#video_count").val('');

                }
            });

            $(".voice_checkbox").click(function () {

                if ($(this).is(":checked")) {

                    $("#voice_count").removeAttr("disabled");
                    $("#voice_fee").removeAttr("disabled");
                    $("#voice_fee").focus();
                    $("#voice_count").focus();

                } else {
                    $("#voice_count").attr("disabled", "disabled");
                    $("#voice_fee").attr("disabled", "disabled");
                    // $("#voice_fee").val('');
                    // $("#voice_count").val('');

                }
            });
        })();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/UserManagement/Resources/views/manage_employees/create.blade.php ENDPATH**/ ?>