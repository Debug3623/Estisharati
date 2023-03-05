<aside class="main-sidebar">

    <section class="sidebar ">

        <div class="user-panel overflow-auto">
            <div class="pull-left image">
                <img src="<?php echo e(asset(auth()->user()->getImagePathAttribute())); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo app('translator')->get('site.title'); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            
            <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i><span><?php echo app('translator')->get('site.dashboard'); ?></span></a></li>
            <li class="treeview" >
                <a href="#">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span><?php echo app('translator')->get('site.settings'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display:none;width:100%">    
                    <?php if(auth()->user()->hasPermission('read_categories')): ?>
                        <li><a href="<?php echo e(route('dashboard.categories.index')); ?>"><i class="fa fa-th"></i><span><?php echo app('translator')->get('site.category'); ?></span></a></li>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasPermission('read_tags')): ?>
                    <li><a href="<?php echo e(route('dashboard.tags.index')); ?>"><i class="fa fa-tag"></i><span><?php echo app('translator')->get('site.tag'); ?></span></a></li>
                    <?php endif; ?>
                    <li><a href="<?php echo e(route('dashboard.countries.index')); ?>"><i class="fa fa-flag-o"></i><span><?php echo app('translator')->get('site.countries'); ?></span></a></li>
                    <li><a href="<?php echo e(route('dashboard.cities.index')); ?>"><i class="fa fa-building-o"></i><span><?php echo app('translator')->get('site.cities'); ?></span></a></li>
                    <li><a href="<?php echo e(route('dashboard.pages.index')); ?>"><i class="fa fa-newspaper-o"></i><span><?php echo app('translator')->get('site.pages'); ?></span></a></li>
                    <li><a href="<?php echo e(route('dashboard.slider.index')); ?>"><i class="fa fa-sliders"></i><span><?php echo app('translator')->get('site.sliders'); ?></span></a></li>
                    <li><a href="<?php echo e(route('dashboard.payments.index')); ?>"><i class="fa fa-money"></i><span><?php echo app('translator')->get('site.payment_methods'); ?></span></a></li>
                    <li><a href="<?php echo e(route('dashboard.settings.index')); ?>"><i class="fa fa-wrench" aria-hidden="true"></i><span><?php echo app('translator')->get('site.basic_settings'); ?></span></a></li>
                </ul>
            </li>
             

           
           
        
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span><?php echo app('translator')->get('site.persons'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display:none">
                    <?php if(auth()->user()->hasPermission('read_roles')): ?>
                        <li><a href="<?php echo e(route('dashboard.roles.index')); ?>"><i class="fa fa-sliders"></i><span><?php echo app('translator')->get('site.roles'); ?></span></a></li>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasPermission('read_admins')): ?>
                        <li><a href="<?php echo e(route('dashboard.users.index')); ?>"><i class="fa fa-cogs"></i><span><?php echo app('translator')->get('site.admins'); ?></span></a></li>
                    <?php endif; ?>
                    <?php if(auth()->user()->hasPermission('read_users')): ?>
                        <li><a href="<?php echo e(route('dashboard.manage_users.index')); ?>"><i class="fa fa-users"></i><span><?php echo app('translator')->get('site.users'); ?></span></a></li>
                    <?php endif; ?>
                    
                    <?php if(auth()->user()->hasPermission('read_employees')): ?>
                        <li><a href="<?php echo e(route('dashboard.manage_employees.index')); ?>"><i class="fa fa-user"></i><span><?php echo app('translator')->get('site.employees'); ?></span></a></li>
                    <?php endif; ?>
                </ul>
            </li>

            <li class="treeview" >
                <a href="#">
                    <i class="fa fa-files-o" aria-hidden="true"></i>
                    <span><?php echo app('translator')->get('site.subscriptions'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="width:100%;">                    
                    <li><a href="<?php echo e(route('dashboard.subscriptions.create')); ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i><?php echo app('translator')->get('site.add_new_subscription'); ?></a></li>
                    <?php if(auth()->user()->hasPermission('read_subscriptions')): ?>
                    <li><a href="<?php echo e(route('dashboard.subscriptions.index')); ?>" ><i class="fa fa-list" aria-hidden="true"></i><?php echo app('translator')->get('site.all_subscriptions'); ?></a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <li class="treeview" >
                <a href="#">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    <span><?php echo app('translator')->get('site.courses'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="width:100%;">                    
                    <li><a href="<?php echo e(route('dashboard.courses.create')); ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i><?php echo app('translator')->get('site.add_new_course'); ?></a></li>
                     <?php if(auth()->user()->hasPermission('read_courses')): ?>
                    <li><a href="<?php echo e(route('dashboard.courses.index')); ?>"><i class="fa fa-list" aria-hidden="true"></i><?php echo app('translator')->get('site.all_courses'); ?></a></li>
                     <?php endif; ?>
                </ul>
            </li>
            <li class="treeview" >
                <a href="#">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                    <span><?php echo app('translator')->get('site.offers'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="width:100%;">                    
                    <li><a href="<?php echo e(route('dashboard.offers.create')); ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i><?php echo app('translator')->get('site.add_new_offer'); ?></a></li>
                    <?php if(auth()->user()->hasPermission('read_offers')): ?>
                    <li><a href="<?php echo e(route('dashboard.offers.index')); ?>" ><i class="fa fa-list" aria-hidden="true"></i><?php echo app('translator')->get('site.all_offers'); ?></a></li>
                    <?php endif; ?>
                </ul>
            </li>
           
            <li class="treeview" >
                <a href="#">
                    <i class="fa fa-question-circle" aria-hidden="true"></i>
                    <span><?php echo app('translator')->get('site.faqs'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display:none;width:100%">                    
                    <li><a href="<?php echo e(route('dashboard.faqs.index')); ?>"> <i class="fa fa-question-circle" aria-hidden="true"></i><span><?php echo app('translator')->get('site.faqs_user'); ?></span></a></li>
                    <li><a href="<?php echo e(route('dashboard.faqs.instructor')); ?>" ><i class="fa fa-question-circle" aria-hidden="true"></i><span><?php echo app('translator')->get('site.faqs_instructor'); ?></span></a></li>
                   
                </ul>
            </li>
            <li class="treeview" >
                <a href="#">
                    <i class="fa fa-signal" aria-hidden="true"></i>
                    <span><?php echo app('translator')->get('site.surveys'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="width:100%;">                    
                    <li><a href="<?php echo e(route('dashboard.surveys.create')); ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i><?php echo app('translator')->get('site.add_new_survey'); ?></a></li>
                    <?php if(auth()->user()->hasPermission('read_surveys')): ?>
                    <li><a href="<?php echo e(route('dashboard.surveys.index')); ?>" ><i class="fa fa-list" aria-hidden="true"></i><?php echo app('translator')->get('site.all_surveys'); ?></a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <li class="treeview" >
                <a href="#">
                    <i class="fa fa-file" aria-hidden="true"></i>
                    <span><?php echo app('translator')->get('site.posts'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="width:100%;">                    
                    <li><a href="<?php echo e(route('dashboard.posts.create')); ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i><?php echo app('translator')->get('site.add_new_post'); ?></a></li>
                   <?php if(auth()->user()->hasPermission('read_posts')): ?>
                    <li><a href="<?php echo e(route('dashboard.posts.index')); ?>"><i class="fa fa-list" aria-hidden="true"></i><?php echo app('translator')->get('site.all_posts'); ?></a></li>
                   <?php endif; ?> 
                </ul>
            </li>
            <li class="treeview" >
                <a href="#">
                    <i class="fa fa-ticket"></i>
                    <span><?php echo app('translator')->get('site.coupons'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="width:100%;">                    
                    <li><a href="<?php echo e(route('dashboard.coupons.create')); ?>"><i class="fa fa-plus-square-o" aria-hidden="true"></i><?php echo app('translator')->get('site.add_new_coupon'); ?></a></li>
                   
                    <li><a href="<?php echo e(route('dashboard.coupons.index')); ?>"><i class="fa fa-list" aria-hidden="true"></i><?php echo app('translator')->get('site.all_coupons'); ?></a></li>
                   
                </ul>
            </li>
            <li><a href="<?php echo e(route('dashboard.sales.index')); ?>"><i class="fa fa-file-text" aria-hidden="true"></i><span><?php echo app('translator')->get('site.sales'); ?></span></a></li>
            <li class="treeview" >
                <a href="#">
                    <i class="fa fa-file"></i>
                    <span><?php echo app('translator')->get('site.reports'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display:none;width:100%">                    
                    <li><a href="<?php echo e(route('dashboard.reports.subscribers')); ?>" ><i class="fa fa-file"></i><span><?php echo app('translator')->get('site.subscribers_report'); ?></span></a></li>
                    <li><a href="<?php echo e(route('dashboard.reports.purchased_courses')); ?>" ><i class="fa fa-file"></i><span><?php echo app('translator')->get('site.course_sale'); ?></span></a></li>
                    <li><a href="<?php echo e(route('dashboard.reports.purchased_consultants')); ?>" ><i class="fa fa-file"></i><span><?php echo app('translator')->get('site.consultantion_sale'); ?></span></a></li>
                     <li><a href="<?php echo e(route('dashboard.reports.purchased_packages')); ?>" ><i class="fa fa-file"></i><span><?php echo app('translator')->get('site.packages_sale'); ?></span></a></li>
                </ul>
            </li> 
            <li><a href="<?php echo e(route('dashboard.chatting.index')); ?>"><i class="fa  fa-comments font-18"></i><span><?php echo app('translator')->get('site.chatting'); ?></span></a></li>
            <li class="treeview" >
                <a href="#">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span><?php echo app('translator')->get('site.messaging'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display:none;width:100%">                    
                    <li><a href="<?php echo e(route('dashboard.notifications.index')); ?>"><i class="fa fa-envelope" aria-hidden="true"></i><span><?php echo app('translator')->get('site.notifications'); ?></span></a></li>
                    <li><a href="<?php echo e(route('dashboard.emails.index')); ?>"><i class="fa fa-envelope" aria-hidden="true"></i><span><?php echo app('translator')->get('site.send_emails'); ?></span></a></li>
                    <li><a href="<?php echo e(route('dashboard.contactus.index')); ?>"><i class="fa fa-envelope" aria-hidden="true"></i><span><?php echo app('translator')->get('site.contactus'); ?></span></a></li>
                </ul>
            </li>
            <li><a href="<?php echo e(route('dashboard.testimonials.index')); ?>"><i class="fa fa-pagelines"></i><span><?php echo app('translator')->get('site.testimonials'); ?></span></a></li>
            <li><a href="<?php echo e(route('dashboard.userpost.index')); ?>"><i class="fa fa-file"></i><span><?php echo app('translator')->get('site.user_posts'); ?></span></a></li>


        </ul>

    </section>

</aside>

<?php /**PATH /home/superservers/public_html/estisharati/resources/views/layouts/dashboard/_aside.blade.php ENDPATH**/ ?>