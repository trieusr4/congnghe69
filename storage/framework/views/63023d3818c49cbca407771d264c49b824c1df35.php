
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Trang quản trị hệ thống website xây dựng website bán hàng</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số đơn hàng</span>
                        <span class="info-box-number"><?php echo e($totalTransactions); ?><small><a href="<?php echo e(route('admin.transaction.index')); ?>">(Chi tiết)</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Thành viên</span>
                        <span class="info-box-number"><?php echo e($totalUsers); ?> <small><a href="<?php echo e(route('admin.user.index')); ?>">(Chi tiết)</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-gear-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Sản phẩm</span>
                        <span class="info-box-number"><?php echo e($totalProducts); ?> <small><a href="<?php echo e(route('admin.product.index')); ?>">(Chi tiết)</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-google-plus"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đánh giá</span>
                        <span class="info-box-number"><?php echo e($totalRatings); ?> <small><a href="<?php echo e(route('admin.rating.index')); ?>">(Chi tiết)</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="box-title" style="margin-bottom:15px">
            <form class="form-inline">
                <label for="start_date" style="margin-right:5px">Từ</label>
                <input id="start_date" class="form-control" type="date" name="start_date" value="<?php echo e(Request::get('start_date')); ?>"/>
                <label for="end_date" style="margin:0 5px">Đến</label>
                <input id="end_date" class="form-control" type="date" name="end_date" value="<?php echo e(Request::get('end_date')); ?>"/>
                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Tìm kiếm</button>
            </form>
        </div>

    <!-- /.row -->
    <div class="row" style="margin-bottom: 15px;">
        <div class="col-sm-8">
            <figure class="highcharts-figure">
                <div id="container2" data-list-day="<?php echo e($listDay); ?>" data-money-default=<?php echo e($arrRevenueTransactionMonthDefault); ?> data-money=<?php echo e($arrRevenueTransactionMonth); ?>>

                    
                </div>
            </figure>
        </div>
        <div class="col-sm-4">
            <figure class="highcharts-figure">
                <div id="container" data-json="<?php echo e($statusTransaction); ?>"></div>
            </figure>
        </div>
    </div>
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách đơn hàng <?php echo e(!!sizeof($transactions) ? '('.sizeof($transactions).' đơn hàng)' : ''); ?></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Thông tin</th>
                                    <th>Tổng tiền</th>
                                    <th>Account</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!sizeof($transactions)): ?>
                                    <tr>
                                        <td colspan="6" style="text-align:center;padding: 20px">Không có đơn hàng nào</div>
                                    </tr>
                                <?php endif; ?>
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($transaction->id); ?></td>
                                        <td>
                                            <ul>
                                                <li>Name: <?php echo e($transaction->tst_name); ?></li>
                                                <li>Email: <?php echo e($transaction->tst_email); ?></li>
                                                <li>Phone: <?php echo e($transaction->tst_phone); ?></li>
                                            </ul>
                                        </td>
                                        <td><?php echo e(number_format($transaction->tst_total_money,0,',','.')); ?> đ</td>
                                        <td>
                                            <?php if($transaction->tst_user_id): ?>
                                                <span class="label label-success">Thành viên</span>
                                            <?php else: ?>
                                                <span class="label label-default">Khách</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="label label-<?php echo e($transaction->getStatus($transaction->tst_status)['class']); ?>">
                                                <?php echo e($transaction->getStatus($transaction->tst_status)['name']); ?>

                                            </span>
                                        </td>
                                        <td><?php echo e($transaction->created_at); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="<?php echo e(route('admin.transaction.index')); ?>" class="btn btn-sm btn-info btn-flat pull-right">Danh sách đơn hàng</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
            <!-- PRODUCT LIST -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Top sản phẩm bán chạy</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php if(!sizeof($topPayProducts)): ?>
                        <div style="text-align:center;padding:20px">Không có sản phẩm nào</div>
                    <?php endif; ?>
                    <ul class="products-list product-list-in-box">
                        <?php $__currentLoopData = $topPayProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="item">
                            <div class="product-img">
                                <img src="<?php echo e(pare_url_file($item->pro_avatar)); ?>" alt="Product Image">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">
                                    <?php echo e($item->pro_pay); ?> Lượt mua
                                <span class="label label-warning pull-right"><?php echo e(number_format($item->pro_price,0,',','.')); ?> đ</span>
                                </a>
                                <span class="product-description"><?php echo e($item->pro_name); ?></span>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
            <!-- PRODUCT LIST -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Top sản phẩm xem nhiều</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                        <?php $__currentLoopData = $topViewProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="item">
                            <div class="product-img">
                                <img src="<?php echo e(pare_url_file($item->pro_avatar)); ?>" alt="Product Image">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">
                                    <?php echo e($item->pro_view); ?> <i class="fa fa-eye"></i>
                                <span class="label label-warning pull-right"><?php echo e(number_format($item->pro_price,0,',','.')); ?> đ</span>
                                </a>
                                <span class="product-description"><?php echo e($item->pro_name); ?></span>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    
    
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
        let dataTransaction = $("#container").attr('data-json');
        dataTransaction  =  JSON.parse(dataTransaction);

        let listday = $("#container2").attr("data-list-day");
        listday = JSON.parse(listday);

        let listMoneyMonth = $("#container2").attr('data-money');
        listMoneyMonth = JSON.parse(listMoneyMonth);
        
        let listMoneyMonthDefault = $("#container2").attr('data-money-default');
        listMoneyMonthDefault = JSON.parse(listMoneyMonthDefault);

        Highcharts.chart('container', {

            chart: {
                styledMode: true
            },

            title: {
                text: 'Thống kê trạng thái đơn hàng'
            },

            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr']
            },

            series: [{
                type: 'pie',
                allowPointSelect: true,
                keys: ['name', 'y', 'selected', 'sliced'],
                data: dataTransaction,
                showInLegend: true
            }]
        });

        Highcharts.chart('container2', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Biểu đồ doanh thu'
            },
            xAxis: {
                categories: listday
            },
            yAxis: {
                title: {
                    text: 'Temperature'
                },
                labels: {
                    formatter: function () {
                        return this.value + '°';
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [
            	{
                    name: 'Hoàn tất giao dịch',
                    marker: {
                        symbol: 'square'
                    },
                    data: listMoneyMonth
                },
                {
                    name: 'Tiếp nhận',
                    marker: {
                        symbol: 'square'
                    },
                    data: listMoneyMonthDefault
                }
            ]
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HOC\PHP\xampp\htdocs\Hapi2hand_Finally\resources\views/admin/statistical/index.blade.php ENDPATH**/ ?>