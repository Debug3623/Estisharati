

<?php $__env->startSection('content'); ?>

<div class="content-wrapper">

    <section class="content-header">

        <h1><?php echo app('translator')->get('site.users'); ?></h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a>
            </li>
            <li><a href="<?php echo e(route('dashboard.manage_users.index')); ?>"> <?php echo app('translator')->get('site.users'); ?></a></li>
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

                <form action="<?php echo e(route('dashboard.manage_users.store')); ?>" method="post" enctype="multipart/form-data">

                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('post')); ?>

                    <input id="type" hidden type="text" name="type" value="User" required>
                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.first_name'); ?></label>
                        <input type="text" name="fname" class="form-control" value="<?php echo e(old('fname')); ?>">
                    </div>

                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.last_name'); ?></label>
                        <input type="text" name="lname" class="form-control" value="<?php echo e(old('lname')); ?>">
                    </div>


                    <div class="form-group col-md-6">
                        <label><?php echo app('translator')->get('site.email'); ?></label>
                        <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>">
                    </div>

                    <div class="form-group col-md-6" >
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

                    <?php $__currentLoopData = $userMetaskey; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($key=='country'): ?>
                            <div class="form-group col-md-6">
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
                            <div class="form-group col-md-6">
                                <label><?php echo app('translator')->get('site.city'); ?></label>
                                <select id="city" name="city" class="form-control" required>
                                    <option value="" disabled selected hidden><?php echo app('translator')->get('site.pleaseChoose'); ?>  ... </option>
                                </select>
                            </div>
                        <?php else: ?>
                        <div class="form-group col-md-6">
                            <label><?php if($key!="fire_base_token"): ?><?php echo app('translator')->get('site.'.$key); ?><?php endif; ?></label>
                            <?php if($type =='textarea'): ?>
                                <textarea class="form-control" name="<?php echo e($key); ?>" rows="3" placeholder="Enter Breif ..."></textarea>
                            <?php else: ?>
                                <input class="form-control" type="<?php echo e($type); ?>" name="<?php echo e($key); ?>"  value="">
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
             

        })();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/UserManagement/Resources/views/manage_users/create.blade.php ENDPATH**/ ?>