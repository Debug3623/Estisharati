

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1><?php echo app('translator')->get('site.settings'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li><a href="<?php echo e(route('dashboard.offers.index')); ?>"> <?php echo app('translator')->get('site.settings'); ?></a></li>
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

                    <form action="<?php echo e(route('dashboard.settings.store')); ?>" method="post" enctype="multipart/form-data">

                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('post')); ?>  
                        <h3><?php echo app('translator')->get('site.general_settings'); ?></h3>
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.project_title'); ?></label>
                       
                                <input type="text" name="project_title" class="form-control" value="<?php echo e($settings['project_title']); ?>">
                        </div>
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.app_url'); ?></label>
                       
                                <input type="text" name="app_url" class="form-control" value="<?php echo e($settings['app_url']); ?>">
                        </div>
                         <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.contact_number'); ?></label>
                       
                                 <input type="text" name="contact_number" class="form-control" value="<?php echo e($settings['contact_number']); ?>">
                        </div>
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.contact_email'); ?></label>
                       
                                <input type="text" name="contact_email" class="form-control" value="<?php echo e($settings['contact_email']); ?>">
                        </div>
                        <div class="clearfix"></div>

                        <h3><?php echo app('translator')->get('site.email_settings'); ?></h3>      
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.sender_name'); ?></label>
                       
                                <input type="text" name="sender_name" class="form-control" value="<?php echo e($settings['sender_name']); ?>">
                        </div>
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.mail_address'); ?></label>
                       
                                <input type="text" name="mail_address" class="form-control" value="<?php echo e($settings['mail_address']); ?>">
                        </div>
                         <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.mail_driver'); ?> (mail,smtp)</label>
                       
                                 <input type="text" name="mail_driver" class="form-control" value="<?php echo e($settings['mail_driver']); ?>">
                        </div>
                        <div class="form-group col-md-6">
                           
                                <label><?php echo app('translator')->get('site.mail_port'); ?> (545)</label>
                       
                                <input type="text" name="mail_port" class="form-control" value="<?php echo e($settings['mail_port']); ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('site.mail_user_name'); ?></label>
                       
                                <input type="text" name="mail_user_name" class="form-control" value="<?php echo e($settings['mail_user_name']); ?>">
                        </div>    
                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('site.mail_password'); ?></label>  

                                <div class="input-group" id="show_hide_password">
                                  <input class="form-control" type="password" name="mail_password" value="<?php echo e($settings['mail_password']); ?>">
                                  <div class="input-group-addon">
                                    <a href="" style="color:#333"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                  </div>
                                </div>
                        </div>     
                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('site.mail_encryption'); ?></label>
                       
                                <input type="text" name="mail_encryption" class="form-control" value="<?php echo e($settings['mail_encryption']); ?>">
                        </div>  
                        
                        <div class="clearfix"></div>

                        <h3><?php echo app('translator')->get('site.selling'); ?></h3> 
                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('site.individual_consultant_selling_chat_seconds'); ?> <h6>(<?php echo app('translator')->get('site.applicable_consultation'); ?>)</h6></label>
                       
                                <input type="text" name="individual_consultant_selling_chat_seconds" class="form-control" value="<?php echo e($settings['individual_consultant_selling_chat_seconds']); ?>">
                        </div>   
                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('site.individual_consultant_selling_audio_seconds'); ?> <h6>(<?php echo app('translator')->get('site.applicable_consultation'); ?>)</h6></label>
                       
                                <input type="text" name="individual_consultant_selling_audio_seconds" class="form-control" value="<?php echo e($settings['individual_consultant_selling_audio_seconds']); ?>">
                        </div>    
                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('site.individual_consultant_selling_video_seconds'); ?> <h6>(<?php echo app('translator')->get('site.applicable_consultation'); ?>)</h6></label>
                       
                                <input type="text" name="individual_consultant_selling_video_seconds" class="form-control" value="<?php echo e($settings['individual_consultant_selling_video_seconds']); ?>">
                        </div> 
                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('site.maximum_consultations_per_month'); ?> <h6>(<?php echo app('translator')->get('site.applicable_all_types(courses,consultations & subscriptions)'); ?></h6></label>
                       
                                <input type="text" name="maximum_consultations_per_month" class="form-control" value="<?php echo e($settings['maximum_consultations_per_month']); ?>">
                        </div> 
                        <div class="clearfix"></div>

                        <h3><?php echo app('translator')->get('site.referrals'); ?></h3> 
                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('site.discount_per_share'); ?></label>
                       
                                <input type="text" name="discount_per_share" class="form-control" value="<?php echo e($settings['discount_per_share']); ?>">
                        </div>  
                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('site.discount_with_shared_link'); ?></label>
                       
                                <input type="text" name="discount_with_shared_link" class="form-control" value="<?php echo e($settings['discount_with_shared_link']); ?>">
                        </div>  
                          <div class="clearfix"></div>
                        <h3><?php echo app('translator')->get('site.for_ios_developer'); ?></h3>
                        <div class="form-group col-md-6">
                            <label><?php echo app('translator')->get('site.on_review'); ?></label>
                             <input class="form-check-input" type="checkbox" id="check1" name="on_review" value="1" <?php if($settings['on_review']==1): ?> checked <?php endif; ?>>
                        </div>

                              
                                           
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> <?php echo app('translator')->get('site.edit'); ?></button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

<script>
         
       //  $('.textarea').ckeditor(); // if class is prefered.
  
         $( document ).ready( function() {
           $("textarea").ckeditor();


           $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
        } );



</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/apptdhaz/public_html/estisharati/resources/views/dashboard/settings/index.blade.php ENDPATH**/ ?>