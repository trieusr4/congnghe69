<?php $__env->startSection('css'); ?>
    <style>
		<?php $style = file_get_contents('css/product_insights.min.css');echo $style;?>
        .filter-tab .active a {
            color: red;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="product-list">
            <div class="left">
                <?php echo $__env->make('frontend.pages.product.include._inc_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="right">
                <div class="breadcrumb">
                    <ul>
                        <li >
                            <a itemprop="url" href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                        </li>
                    </ul>
                </div>
                
                <div class="order-tab">
                    <span class="total-prod">Tổng số: <?php echo e($products->total()); ?> sản phẩm</span>
                    <div class="sort">
                        <div class="item">
                            <span class="title js-show-sort">Sắp xếp <i class="fa fa-caret-down"></i></span>
                            <ul>
                                <li><a class="<?php echo e(Request::get('sort') == 'desc' ? "active" : ""); ?>" href="<?php echo e(request()->fullUrlWithQuery(['sort'=> 'desc'])); ?>">Mới nhất</a></li>
                                <li><a class="<?php echo e(Request::get('sort') == 'asc' ? "active" : ""); ?>" href="<?php echo e(request()->fullUrlWithQuery(['sort'=> 'asc'])); ?>">Cũ nhất</a></li>
                                <li><a class="<?php echo e(Request::get('sort') == 'price_desc' ? "active" : ""); ?>" href="<?php echo e(request()->fullUrlWithQuery(['sort'=> 'price_desc'])); ?>">Giá giảm dần</a></li>
                                <li><a class="<?php echo e(Request::get('sort') == 'price_asc' ? "active" : ""); ?>" href="<?php echo e(request()->fullUrlWithQuery(['sort'=> 'price_asc'])); ?>">giá tăng dần</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="group">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('frontend.components.product_item', ['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div style="display: block;">
                    <?php echo $products->appends($query ?? [])->links(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
		var CSS = "<?php echo e(asset('css/product_search.min.css')); ?>";
    </script>
    <script type="text/javascript" src="<?php echo e(asset('js/product_search.js')); ?>">
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Acer\Downloads\web-ban-hang\cong-nghe-69\resources\views/frontend/pages/product/index.blade.php ENDPATH**/ ?>