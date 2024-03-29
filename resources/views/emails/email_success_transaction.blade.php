<div style="width: 100%;max-width: 600px;margin:0 auto">
    <div style="height: 55px;background: #3a2615;padding: 10px">
        <div style="width: 50%">
            <a href="">
                <img style="height: 55px" src="http://tranining.previewcode.net/images/logo_doconghe.png">
            </a>
        </div>
        <div style="width: 50%"></div>
    </div>
    <div style="background: white;padding: 15px;border:1px solid #dedede;">
        <h2 style="margin:10px 0;border-bottom: 1px solid #dedede;padding-bottom: 10px; text-align: center;">Danh Sách Sản Phẩm Bạn Đã Đặt</h2>
        <div>
            @foreach($shopping as $key => $item)
                <div style="border-bottom: 1px solid #dedede;padding-bottom: 10px;padding-top: 10px;">
                    <div class="" style="width: 15%;float: left;">
                        <a href="">
                            <img style="max-width: 100%;width: 100px;height: 100px" src="http://tranining.previewcode.net{{ pare_url_file($item->options->image) }}">
                        </a>
                    </div>
                    <div style="width: 80%;float: right;">
                        <h4 style="margin:10px 0">{{ $item->name }}</h4>
                        <p style="margin: 4px 0;font-size: 14px;">Giá <span>{{  number_format($item->price,0,',','.') }} đ</span></p>
                        @if ($item->options->price_old)
                            <p style="margin: 4px 0;font-size: 14px;">
                                <span style="text-decoration: line-through;">{{  number_format(number_price($item->options->price_old),0,',','.') }} đ</span>
                                <span class="sale">- {{ $item->options->sale }} %</span>
                            </p>
                        @endif
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <p>Ngày đặt hàng: {{ date('d-m-Y H:i') }}</p>
                <p>Ngày giao hàng dự kiến: 2-4 ngày kể từ ngày đặt hàng</p>
            @endforeach
            <h2>Tổng tiền thanh toán: <b>{{ \Cart::subtotal(0) }}</b></h2>
        </div>
        <div class="text-center">
            <p>Đây là email tự động, vui lòng không trả lời vào email này</p>
            <p>Chúc bạn có trải nghiệm hài lòng cùng với đồ công nghệ 69!</p>
        </div>
    </div>
    <div style="background: #f4f5f5;box-sizing: border-box;padding: 15px" class="text-center">
        <p>Nếu có vấn đề cần giải quyết vui lòng liên hệ chúng tôi qua thông tin bên dưới</p>
        <p style="margin:2px 0;color: #333">Email : congnghe69@gmail.com</p>
        <p style="margin:2px 0;color: #333">Phone : 0961080094</p>
    </div>
</div>