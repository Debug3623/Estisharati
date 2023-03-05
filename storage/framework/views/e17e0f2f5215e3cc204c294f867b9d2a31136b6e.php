

<?php $__env->startSection('content'); ?>

    <div class="content-wrapper">

        <section class="content-header">

            <h1><?php echo app('translator')->get('site.dashboard'); ?></h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> <?php echo app('translator')->get('site.dashboard'); ?></li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

                
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo e($courses_count); ?></h3>

                            <p><?php echo app('translator')->get('site.courses'); ?></p>
                        </div>
                        <div class="icon">
                             <i class="fa fa-book"></i>
                        </div>
                        <a href="<?php echo e(route('dashboard.courses.index')); ?>" class="small-box-footer"><?php echo app('translator')->get('site.read'); ?> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3><?php echo e($users_count); ?></h3>

                            <p><?php echo app('translator')->get('site.users'); ?></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="<?php echo e(route('dashboard.manage_users.index')); ?>" class="small-box-footer"><?php echo app('translator')->get('site.read'); ?> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3><?php echo e($consultants_count); ?></h3>

                            <p><?php echo app('translator')->get('site.consultants'); ?></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <a href="<?php echo e(route('dashboard.manage_employees.index')); ?>" class="small-box-footer"><?php echo app('translator')->get('site.read'); ?> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?php echo e($subscriptions_count); ?></h3>

                            <p><?php echo app('translator')->get('site.subscriptions'); ?></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-tasks"></i>
                        </div>
                        <a href="<?php echo e(route('dashboard.subscriptions.index')); ?>" class="small-box-footer"><?php echo app('translator')->get('site.read'); ?> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>


            </div><!-- end of row -->

            
    <div class="row">
        <div class="col-lg-12">
            <section class="content-header">
                <h1 class="pull-left"><?php echo app('translator')->get('site.today_subscription'); ?></h1><br>
                <h1 class="pull-right"> </h1>
            </section>
            <div class="content">
                <div class="clearfix"></div>
                
                <div class="box box-d4d">
                    <div class="box-body">
                        <table class="table table-striped table-bordered dataTable no-footer " id="table" role="grid" aria-describedby="dataTableBuilder_info" style="width: 100%;">
                            <thead>
                                <tr>
                                    <td><?php echo app('translator')->get('site.username'); ?></td>
                                    <td><?php echo app('translator')->get('site.product'); ?></td>
                                    <td><?php echo app('translator')->get('site.payment_method'); ?></td>
                                    <td><?php echo app('translator')->get('site.total_cost'); ?></td>
                                </tr>
                            </thead>
                            <?php $__currentLoopData = $today_subs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tbody>
                                <tr>
                                    <td><?php echo e($value->fname); ?></td>
                                    <td><?php echo e($value->name); ?></td>
                                    <td><?php echo e($value->title); ?></td>
                                    <td><?php echo e($value->amount); ?></td>
                                </tr>
                            </tbody>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <section class="content-header">
                <h1 class="pull-left"><?php echo app('translator')->get('site.subscription_per_month'); ?></h1><br>
                <h1 class="pull-right"> </h1>
            </section>
            <div class="content">
                <div class="clearfix"></div>
                
                <div class="box box-d4d">
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="areaChart" style="height: 149px; width: 470px;" height="149" width="470"></canvas>
                        </div>
                    </div>
            
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <section class="content-header">
                <h1 class="pull-left"><?php echo app('translator')->get('site.user_registration_per_month'); ?> </h1><br>
                <h1 class="pull-right"> </h1>
            </section>
            <div class="content">
                <div class="clearfix"></div>
                
                <div class="box box-d4d">
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="areaChart2" style="height: 149px; width: 470px;" height="149" width="470"></canvas>
                        </div>
                    </div>
            
                </div>
            </div>
        </div>
        
       
    </div>
    
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <section class="content-header">
                <h1 class="pull-left"><?php echo app('translator')->get('site.consultation_per_month'); ?></h1><br>
                <h1 class="pull-right"> </h1>
            </section>
            <div class="content">
                <div class="clearfix"></div>
                
                <div class="box box-d4d">
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="areaChart3" style="height: 149px; width: 470px;" height="149" width="470"></canvas>
                        </div>
                    </div>
            
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <section class="content-header">
                <h1 class="pull-left"><?php echo app('translator')->get('site.courses_per_month'); ?> </h1><br>
                <h1 class="pull-right"> </h1>
            </section>
            <div class="content">
                <div class="clearfix"></div>
                
                <div class="box box-d4d">
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="areaChart4" style="height: 149px; width: 470px;" height="149" width="470"></canvas>
                        </div>
                    </div>
            
                </div>
            </div>
        </div>
        
       
    </div>
    


        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    
    <script>
        $(function () {
            /* ChartJS
            * -------
            * Here we will create a few charts using ChartJS
            */

            //--------------
            //- AREA CHART -
            //--------------

           

            var data = <?php echo json_encode($y); ?>;
            
            if(data[data.length-1] > 0){
                for(var i = 0; i < data[data.length-1] ; i++){
                    data.push(i);
                }
            }

            var areaChartData = {
                labels  : <?php echo json_encode($x); ?>,
                datasets: [
                    {
                        label                      : 'Subscriptions',
                        data                       : data,
                        backgroundColor            : "#46BFBD",
                        pointBackgroundColor       : "#FDB45C",
                        pointBorderColor           : "#F7464A",
                        pointHoverBackgroundColor  : "#666",
                        pointHoverBorderColor      : "#666",
                        borderColor                : "#FDB45C",
                    }
                ]
            }
            
            //user joined
            
            var data2 = <?php echo json_encode($y2); ?>;
            
            if(data2[data2.length-1] > 0){
                for(var i = 0; i < data2[data2.length-1] ; i++){
                    data2.push(i);
                }
            }

            var areaChartData2 = {
                labels  : <?php echo json_encode($x2); ?>,
                datasets: [
                    {
                        label                      : 'Users Joined',
                        data                       : data2,
                        backgroundColor            : "#FDB45C",
                        pointBackgroundColor       : "#FDB45C",
                        pointBorderColor           : "#F7464A",
                        pointHoverBackgroundColor  : "#666",
                        pointHoverBorderColor      : "#666",
                        borderColor                : "#46BFBD",
                    }
                ]
            }
            
            
             //consultations
            
            var data3 = <?php echo json_encode($y3); ?>;
            
            if(data3[data3.length-1] > 0){
                for(var i = 0; i < data3[data3.length-1] ; i++){
                    data3.push(i);
                }
            }

            var areaChartData3 = {
                labels  : <?php echo json_encode($x3); ?>,
                datasets: [
                    {
                        label                      : 'Consultations',
                        data                       : data3,
                        backgroundColor            : "#FDB45C",
                        pointBackgroundColor       : "#FDB45C",
                        pointBorderColor           : "#F7464A",
                        pointHoverBackgroundColor  : "#666",
                        pointHoverBorderColor      : "#666",
                        borderColor                : "#46BFBD",
                    }
                ]
            }
            
            
             //courses
            
            var data4 = <?php echo json_encode($y4); ?>;
            
            if(data4[data4.length-1] > 0){
                for(var i = 0; i < data4[data4.length-1] ; i++){
                    data4.push(i);
                }
            }

            var areaChartData4 = {
                labels  : <?php echo json_encode($x4); ?>,
                datasets: [
                    {
                        label                      : 'Courses',
                        data                       : data4,
                        backgroundColor            : "#F7464A",
                        pointBackgroundColor       : "#FDB45C",
                        pointBorderColor           : "#F7464A",
                        pointHoverBackgroundColor  : "#666",
                        pointHoverBorderColor      : "#666",
                        borderColor                : "#46BFBD",
                    }
                ]
            }

            var areaChartOptions = {
                //Boolean - If we should show the scale at all
                showScale               : true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines      : false,
                //String - Colour of the grid lines
                scaleGridLineColor      : "#666",
                //Number - Width of the grid lines
                scaleGridLineWidth      : 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines  : true,
                //Boolean - Whether the line is curved between points
                bezierCurve             : true,
                //Number - Tension of the bezier curve between points
                bezierCurveTension      : 0.3,
                //Boolean - Whether to show a dot for each point
                pointDot                : false,
                //Number - Radius of each point dot in pixels
                pointDotRadius          : 4,
                //Number - Pixel width of point dot stroke
                pointDotStrokeWidth     : 1,
                //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                pointHitDetectionRadius : 10,
                //Boolean - Whether to show a stroke for datasets
                datasetStroke           : true,
                //Number - Pixel width of dataset stroke
                datasetStrokeWidth      : 2,
                //Boolean - Whether to fill the dataset with a color
                datasetFill             : true,
                //String - A legend template
                legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
                //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
                maintainAspectRatio     : true,
                //Boolean - whether to make the chart responsive to window resizing
                responsive              : true,
                text                    : 'Orders / Month'
            }

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
            // This will get the first returned node in the jQuery collection.
            var areaChart       = new Chart(areaChartCanvas, {
                                                                type: "line",
                                                                data: areaChartData,
                                                                options:  areaChartOptions
                                                            });

            
            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas2 = $('#areaChart2').get(0).getContext('2d')
            // This will get the first returned node in the jQuery collection.
            var areaChart2       = new Chart(areaChartCanvas2, {
                                                                type: "line",
                                                                data: areaChartData2,
                                                                options:  areaChartOptions
                                                            });
                                                            
            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas3 = $('#areaChart3').get(0).getContext('2d')
            // This will get the first returned node in the jQuery collection.
            var areaChart3       = new Chart(areaChartCanvas3, {
                                                                type: "line",
                                                                data: areaChartData3,
                                                                options:  areaChartOptions
                                                            });

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas4 = $('#areaChart4').get(0).getContext('2d')
            // This will get the first returned node in the jQuery collection.
            var areaChart4       = new Chart(areaChartCanvas4, {
                                                                type: "line",
                                                                data: areaChartData4,
                                                                options:  areaChartOptions
                                                            });


           

            //hide top pagination & show number row in today orders table
            $("#table_length").css('display', 'none');
            $("#table_paginate").css('display', 'none');

            //hide top pagination & show number row in closing campaigns table
            $("#table2_length").css('display', 'none');
            $("#table2_paginate").css('display', 'none');
        });

        

       
    </script>




<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/superservers/public_html/estisharati/resources/views/dashboard/welcome.blade.php ENDPATH**/ ?>