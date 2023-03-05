
<style type="text/css">
   img{ max-width:100%;}
   .inbox_people {
   background: #f8f8f8 none repeat scroll 0 0;
   float: left;
   overflow: hidden;
   width: 40%; border-right:1px solid #c4c4c4;
   }
   .inbox_msg {
   border: 1px solid #c4c4c4;
   clear: both;
   overflow: hidden;
   }
   .top_spac{ margin: 20px 0 0;}
   .recent_heading {float: left; width:40%;}
   .srch_bar {
   display: inline-block;
   text-align: right;
   width: 60%; padding:
   }
   .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}
   .recent_heading h4 {
   color: #05728f;
   font-size: 21px;
   margin: auto;
   }
   .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
   .srch_bar .input-group-addon button {
   background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
   border: medium none;
   padding: 0;
   color: #707070;
   font-size: 18px;
   }
   .srch_bar .input-group-addon { margin: 0 0 0 -27px;}
   .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
   .chat_ib h5 span{ font-size:13px; float:right;}
   .chat_ib p{ font-size:14px; color:#989898; margin:auto}
   .chat_img {
   float: left;
   width: 11%;
   }
   .chat_ib {
   float: left;
   padding: 0 0 0 15px;
   width: 88%;
   }
   .chat_people{ overflow:hidden; clear:both;}
   .chat_list {
   border-bottom: 1px solid #c4c4c4;
   margin: 0;
   padding: 18px 16px 10px;
   }
   .inbox_chat { height: 550px; overflow-y: scroll;}
   .active_chat{ background:#ebebeb;}
   .incoming_msg_img {
   display: inline-block;
   width: 6%;
   }
   .received_msg_img{
      display: inline-block;
   width: 6%;  
   margin-right:2px;
   padding-left:5px;
   float:right;
   }
   .received_msg {
   display: inline-block;
   padding: 0 0 0 10px;
   vertical-align: top;
   width: 92%;
   }
   .received_withd_msg p {
   background: #ebebeb none repeat scroll 0 0;
   border-radius: 3px;
   color: #646464;
   font-size: 14px;
   margin: 0;
   padding: 5px 10px 5px 12px;
   width: 100%;
   }
   .time_date {
   color: #747474;
   display: block;
   font-size: 12px;
   margin: 8px 0 0;
   }
   .received_withd_msg { width: 57%;}
   .mesgs {
   float: left;
   padding: 30px 15px 0 25px;
   width: 60%;
   }
   .sent_msg p {
   background: #05728f none repeat scroll 0 0;
   border-radius: 3px;
   font-size: 14px;
   margin: 0; color:#fff;
   padding: 5px 10px 5px 12px;
   width:100%;
   }
   .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
   .sent_msg {
   float: right;
   width: 46%;
   }
   .input_msg_write input {
   background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
   border: medium none;
   color: #4c4c4c;
   font-size: 15px;
   min-height: 48px;
   width: 100%;
   }
   .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
   .msg_send_btn {
   background: #05728f none repeat scroll 0 0;
   border: medium none;
   border-radius: 50%;
   color: #fff;
   cursor: pointer;
   font-size: 17px;
   height: 33px;
   position: absolute;
   right: 0;
   top: 11px;
   width: 33px;
   }
   .messaging { padding: 0 0 50px 0;}
   .msg_history {
   min-height: 516px;
   overflow-y: auto;
   }
</style>
<?php $__env->startSection('content'); ?>
<style type="text/css">
   .major th{
   width: 20%;text-align: right;
   }
</style>
<div class="content-wrapper">
   <section class="content-header">
      <h1><?php echo app('translator')->get('site.chatting'); ?></h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a>
         </li>
         <li><a href="<?php echo e(route('dashboard.courses.index')); ?>"> <?php echo app('translator')->get('site.chatting'); ?></a></li>
         <li class="active"><?php echo app('translator')->get('site.show'); ?></li>
      </ol>
   </section>
   <div class="content">
      <div class="box box-primary" style="border-top-color: #fff;">
         <div class="box-body">
            <h3 class=" text-center"> <?php echo app('translator')->get('site.messaging'); ?> </h3>
            <div class="messaging">
               <div class="inbox_msg">
                  <div class="mesgs">
                     <div class="msg_history">
                         
                       <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                       <?php if($chat->sender_id == $sender ): ?>
                        <div class="incoming_msg">
                           <div class="incoming_msg_img">  <img src="<?php echo e(asset('public/uploads/user_images/'. $images[$chat->sender_id])); ?>" alt="sunil"></div>
                           <div class="received_msg">
                              <div class="received_withd_msg">
                                 <p><?php if(!empty($chat->message)): ?>
                                    <?php echo e($chat->message); ?>

                                    <?php endif; ?>
                                    <?php if(!empty($chat->attachment)): ?> 
                                    <a href="<?php echo e(asset('public/uploads/chat_files/'. $chat->attachment)); ?>" target="_blank"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment</a>
                                    <?php endif; ?>
                                 </p>
                                 <span class="time_date"><?php echo e($users[$chat->sender_id]); ?> | <?php echo e(date("F j, Y, g:i a",strtotime($chat->created_at))); ?></span>
                              </div>
                           </div>
                        </div>
                       <?php else: ?>
                        <div class="outgoing_msg">
                           <div class="received_msg_img"> <img src="<?php echo e(asset('public/uploads/user_images/'. $images[$chat->sender_id])); ?>" alt="sunil"> </div>    
                           <div class="sent_msg">
                              <p><?php if(!empty($chat->message)): ?>
                                    <?php echo e($chat->message); ?>

                                    <?php endif; ?>
                                    <?php if(!empty($chat->attachment)): ?> 
                                    <a href="<?php echo e(asset('public/uploads/chat_files/'. $chat->attachment)); ?>" style="color:#FFFFFF" target="_blank"><i class="fa fa-paperclip" aria-hidden="true"></i> View Attachment</a>
                                    <?php endif; ?>
                              </p>
                              <span class="time_date"><?php echo e($users[$chat->sender_id]); ?> | <?php echo e(date("F j, Y, g:i a",strtotime($chat->created_at))); ?></span> 
                           </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end of box body -->
   </div>
</div>
</div></div>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Chatting/Resources/views/chat/show.blade.php ENDPATH**/ ?>