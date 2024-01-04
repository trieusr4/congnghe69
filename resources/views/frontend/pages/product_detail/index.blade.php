@extends('layouts.app_master_frontend')
@section('css')
    <style>
        <?php $style = file_get_contents('css/product_detail_insights.min.css');echo $style;?>
    </style>
@stop
@section('content')
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li>
                    <a itemprop="url" href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                </li>
                <li>
                    <a itemprop="url" href="{{ route('get.product.list') }}" title="Sản phẩm"><span
                            itemprop="title">Sản phẩm</span></a>
                </li>

                <li>
                    <a itemprop="url" href="{{  route('get.category.list', $product->category->c_slug.'-'.$product->category->id) }}" title="{{isset($product->category) ? $product->category->c_name : ''}}"><span itemprop="title">{{isset($product->category) ? $product->category->c_name : ''}}</span></a>
                </li>

            </ul>
        </div>
        <div class="card">
            <div class="card-body info-detail">
                <div class="left">

                    <a href="{{ route('get.product.detail',$product->pro_slug . '-'.$product->id ) }}" title=""
                       class="">
                        <img alt="" style="max-width: 100%" src="{{ pare_url_file($product->pro_avatar) }}"
                             class="lazyload">
                    </a>
                </div>
                <div class="right" id="product-detail" data-id="{{ $product->id }}">
                    <h1>{{  $product->pro_name }}</h1>
                    <div class="right__content">
                        <div class="info">

                            <div class="prices">
                                @if ($product->pro_sale)
                                    <p>Giá niêm yết:
                                        <span class="value">{{ number_format($product->pro_price,0,',','.') }} đ</span>
                                    </p>
                                    @php
                                        $price = ((100 - $product->pro_sale) * $product->pro_price)  /  100 ;
                                    @endphp
                                    <p>
                                        Giá bán: <span
                                            class="value price-new">{{  number_format($price,0,',','.') }} đ</span>
                                        <span class="sale">-{{  $product->pro_sale }}%</span>
                                    </p>
                                @else
                                    <p>
                                        Giá bán: <span class="value price-new">{{  number_format($product->pro_price,0,',','.') }} đ</span>
                                    </p>
                                @endif
                                <p>
                                    <span>View :&nbsp</span>
                                    <span>{{ $product->pro_view }}</span>
                                </p>
                                <p>
                                    <span>Số lượng còn :&nbsp</span>
                                    <span style="font-weight: bold; font-size: large;">{{ $product->pro_number }}</span>
                                </p>
                            </div>
                            @if($product->attributes->count() > 0)
                                @foreach($types as $type)
                                    @if (checkHas($type->id, $product->attributes) && $type->t_is_multi_choice)
                                        <div>
                                            <div style="margin-bottom: 10px">
                                                <div style="float: left; width: 30%; line-height: 36px;">
                                                    Chọn {{$type->t_name}} :
                                                </div>
                                                <div>
                                                    <select name="size" id="product-size" class="form-control">
                                                        <option value="">Chọn {{$type->t_name}}</option>
                                                        @foreach($product->attributes as $attribute)
                                                            @if($attribute->atb_type_id == $type->id)
                                                                <option value="{{ $attribute->atb_name }}" >{{ $attribute->atb_name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                            <!-- <div>
                                <div style="float: left; width: 30%; line-height: 36px;">
                                    Giới tính :
                                </div>
                                <div>
                                    <label for="gender-male" style="line-height: 40px;"><input type="radio" name="gender" value="1" id="gender-male">&nbsp; Nam</label> &nbsp; &nbsp;
                                    <label for="gender-female"><input type="radio" name="gender" value="2" id="gender-female">&nbsp; Nữ</label>
                                </div>
                            </div> -->
                            <div style="clear: both;"></div>
                            <div class="btn-cart" style="margin-top: 10px;">
                                @if ($product->pro_number > 0 && $product->pro_active )
                                    <a href="{{ route('get.shopping.add', $product->id) }}" title=""
                                    class="muangay" id="buy-now-btn">
                                        <span>Mua ngay</span>
                                        <span>Hotline: 0961080094</span>
                                    </a>
                                @else
                                    <a title=""
                                    style="background-color: #fe0000;color: #fff" id="buy-now-btn">
                                        <span>Hết hàng</span>
                                        <span>Hotline: 0961080094</span>
                                    </a>
                                @endif
                                <a href="{{ route('ajax_get.user.add_favourite', $product->id) }}"
                                   title="Thêm sản phẩm yêu thích"
                                   class="muatragop  {{ !\Auth::id() ? 'js-show-login' : 'js-add-favourite' }}" id="buy-now-btn">
                                    <span>Yêu thích</span>
                                    <span>Sản phẩm</span>
                                </a>
                            </div>
                            <div class="infomation">
                                <h2 class="infomation__title">Thông số kỹ thuật</h2>
                                <div class="infomation__group">

                                    <div class="item">
                                        <p class="text1">Danh mục:</p>
                                        <h3 class="text2">
                                            @if (isset($product->category->c_name))
                                                <a href="{{  route('get.category.list', $product->category->c_slug).'-'.$product->pro_category_id }}">{{ $product->category->c_name }}</a>
                                            @else
                                                "[N\A]"
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="ads">
                            <a href="#" title="Giam giá" target="_blank"><img alt="Hoan tien" style="width: 100%"
                                                                              src="{{ url('images/banner/banner_01.jpg') }}"></a>
                        </div>
                    </div>
                </div>
            </div>
            @include('frontend.pages.product_detail.include._inc_content')
            @include('frontend.pages.product_detail.include._inc_ratings')
            <div class="comments">
                <div class="form-comment">
                    <form action="{{ route('ajax_post.comment') }}" method="POST">
                        <input type="hidden" name="productId" value="{{ $product->id }}">
                        <div class="form-group">
                            <textarea placeholder="Mời bạn để lại bình luận ..." name="comment" class="form-control" id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="footer">
                            <p>
                                {{--<a href=""><i class="la la-camera"></i> Gửi ảnh</a>--}}
                                <a href="#">Quy định đăng bình luận</a>
                            </p>
                            <button type="submit" class=" {{ \Auth::id() ? 'js-save-comment' : 'js-show-login' }}">Gửi bình luận</button>
                        </div>
                    </form>
                </div>
                @include('frontend.pages.product_detail.include._inc_list_comments')
            </div>

        </div>
        <div class="card-body product-des">
            <div class="left">
                <div class="tabs">
                    <div class="tabs__content">
                        <div class="product-five">
                            <div class="bot js-product-5 owl-carousel owl-theme owl-custom">
                                @foreach($productsSuggests as $product)
                                    <div class="item">
                                        @include('frontend.components.product_item',['product' => $product])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <a href="#" title="Giam giá" target="_blank">
                    <img alt="Hoan tien" style="width: 100%" src="{{ url('images/banner/banner_02.png') }}">
                </a>
            </div>
        </div>
    </div>
    {{--@if ($isPopupCaptcha >= 2)--}}
        {{--@include('frontend.pages.product_detail.include._inc_popup_captcha')--}}
    {{--@endif--}}
@stop
@section('script')
    <script>
		var ROUTE_COMMENT = '{{ route('ajax_post.comment') }}';
		var CSS = "{{ asset('css/product_detail.min.css') }}";


    </script>
    <script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/product_detail.js') }}" type="text/javascript"></script>
    <script>
       $(function () {
    $('.muangay').click(function (event) {
        event.preventDefault();

        var size = $('#product-size').val();
        var color = $('#product-color').val();
        // var gender = $('input[name=gender]:checked').val() !== undefined ? $('input[name=gender]:checked').val() : '';

        // Kiểm tra xem các trường đã được chọn hay chưa
        if (size === '' || color === '') {
            // Nếu bất kỳ trường nào chưa được chọn, hiển thị thông báo hoặc thực hiện hành động phù hợp ở đây
            alert('Vui lòng chọn size, màu trước khi mua hàng.');
        } else {
            // Tất cả các trường đã được chọn, thực hiện yêu cầu AJAX
            var link = $(this).attr('href');
            
            $.ajax({
                url: link,
                type: 'GET',
                data: {
                    size: size,
                    // gender: gender,
                    color: color,
                }
            }).done(function (result) {
                // Hoàn thành yêu cầu AJAX, có thể thực hiện hành động khác ở đây nếu cần
                window.location = window.location.href;
            });
        }
    });
});

    </script>
@stop
