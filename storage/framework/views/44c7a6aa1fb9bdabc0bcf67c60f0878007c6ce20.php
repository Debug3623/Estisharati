 
                    



<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1><?php echo app('translator')->get('site.report'); ?></h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('dashboard.welcome')); ?>"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></a></li>
                <li><a href="<?php echo e(route('dashboard.reports.subscribers')); ?>"> <?php echo app('translator')->get('site.report'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('site.add'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title"><?php echo app('translator')->get('site.purchased_courses'); ?></h3>
                </div><!-- end of box header -->
                <div class="box-body">
                    <form action="" method="post" id="search-form">

                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('post')); ?>

                    <div class="col-md-12">
                    <div class="form-group col-md-4">
                           
                               <label><?php echo app('translator')->get('site.start_date'); ?></label>
                       
                               <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" name="from_date" class="form-control pull-right datepicker"  value="<?php echo e(old('start_at')); ?>" required>
                                </div>
                    </div>
                    <div class="form-group col-md-4">
                           
                                <label><?php echo app('translator')->get('site.valid_to'); ?></label>
                       
                                <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" name="to_date" class="form-control pull-right datepicker" value="<?php echo e(old('valid_to')); ?>" required>
                                </div>
                    </div>
                  
                    <div class="form-group col-md-4" style="margin-top: 30px;">                        
                            <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
                </form>
                     <?php echo $dataTable->table(['class' => 'datatable table table-bordered', 'cellspacing'=>"0", 'width'=>"100%"]); ?>



                     <?php echo $dataTable->scripts(); ?>

                </div>
            </div>
        </section>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />

<script>
    $( document ).ready(function() {
        $(".datepicker").datepicker({
            autoclose: true,
            todayBtn: "linked",
            language: "ar",
            todayHighlight: true,
            format: 'dd-mm-yyyy'

        });
    });
</script>

<script type="text/javascript">
   
    $('#search-form').on('submit', function(e) {
        //oTable.draw();
        var oTable = $('.datatable').DataTable({        
        processing: true,
        serverSide: true,
        ajax: {
            url: "<?php echo e(route('dashboard.reports.purchased_courses')); ?>",
            data: function (d) {
                d.from_date = $('input[name=from_date]').val();
                d.to_date = $('input[name=to_date]').val();
            }
        },
        columns: [           
            {data: 'course_name', name: 'course_name'},
            {data: 'fname', name: 'username'},
            {data: 'amount', name: 'amount'},
            {data: 'coupon_code', name: 'coupon_code'},
            {data: 'discount', name: 'discount'},
            {data: 'payment_reference_no', name: 'payment_reference_no'},
            {data: 'payment_method', name: 'payment_method'},
            {data: 'date_subscribed', name: 'date_subscribed'},
            {data: 'valid_to', name: 'valid_to'},
            

        ],
        "bDestroy": true,
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel','print','reset', 'reload'
        ]
    });
        e.preventDefault();
    });

</script>
     
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/Modules/Reports/Resources/views/report/purchasedcourses.blade.php ENDPATH**/ ?>