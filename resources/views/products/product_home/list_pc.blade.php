<div id="featured-product" class="container-product">
    <div style="position:relative;">
        <h2 class="new-product-title">
            PC MAXIMUS - MIỄN PHÍ GIAO HÀNG TOÀN QUỐC
        </h2>
        <a class="maximus-new-products-hot-view-all" href="/danh-muc/13-pc.html">
            Xem tất cả <i class="fa fa-chevron-right"></i>
        </a>
    </div>
</div>
<div class="p-t-23" id="background-product">
    <div class="container">
        <div class="row">

            @foreach($products_pc as $product)

            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0" id="border-product">
                        <a href="/san-pham/{{ $product->id }}-{{\Str::slug($product->name, '-')}}.html"><img src="{{ $product->thumb }}" alt="IMG-PRODUCT"></a>

                        <!-- <a href="/san-pham/{{ $product->id }}-{{\Str::slug($product->name, '-')}}.html" class="block2-btn flex-c-m stext-103 cl5 size-102 bg2 bor2 hov-btn1
                         p-lr-15 trans-04 js-show-modal1">
                            Đặt hàng
                        </a> -->
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <div style="height: 55.84px;">
                                <a href="/san-pham/{{ $product->id }}-{{\Str::slug($product->name, '-')}}.html" class="stext-104 cl5 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $product->name }}
                                </a>
                            </div>
                            <div class="row">
                                <div id="del" style="margin-left: 15px;">{!! \App\Helpers\Helper::price($product->price, $product->price_sale) !!}</div>
                            </div>

                            <div class="row" style="margin-left: -1px;">
                                <span class="stext-105 cl3">
                                    {!! \App\Helpers\Helper::price_sale($product->price, $product->price_sale) !!}
                                </span>
                            </div>
                            {!! \App\Helpers\Helper::pro($product->price, $product->price_sale) !!}
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</div>