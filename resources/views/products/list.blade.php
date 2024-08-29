<div class="row isotope-grid">
    @foreach($products as $key => $product)
    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
            <div class="block2-pic hov-img0" id="border-product">
                <a href="/san-pham/{{ $product->id }}-{{\Str::slug($product->name, '-')}}.html"><img src="{{ $product->thumb }}" alt="IMG-PRODUCT"></a>

            </div>

            <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l " style="height: 107.66px;">
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