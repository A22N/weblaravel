@extends('main')

@section('content')
<div class="container p-t-90">
    <div class="bread-crumb " style="width: 100%;height: 40px; ; margin-left: 15px;">
        <span>Bạn đang ở: </span>
        <a href="/" class="stext-109a cl8 hov-cl5 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        <a href="/carts" class="stext-109a cl8 hov-cl5 trans-04">
            Giỏ hàng
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
    </div>
</div>
<form class="bg0 p-t-10 p-b-85 " method="post">

    @include('admin.alert')
    @if( count($products) !=0)
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        @php $total = 0; @endphp
                        <table class="table-shopping-cart">
                            <tbody>
                                <tr class="table_head" style="text-align: center;">
                                    <th class="column-1">Sản Phẩm</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Giá Tiền</th>
                                    <th class="column-4"">Số lượng</th>
                                    <th class=" column-5">Tổng tiền</th>
                                    <th class="column-6">&nbsp;</th>
                                </tr>
                                @foreach($products as $key => $product)
                                @php
                                $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                $priceEnd = $price * $carts[$product->id];
                                $total += $priceEnd;
                                @endphp

                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="{{ $product -> thumb}}" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2">{{ $product -> name}}</td>
                                    <td class="column-3"> {{ number_format($price).'đ' }}</td>
                                    <td class="column-4">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num_product[{{ $product->id }}]" value="{{ $carts[$product->id] }}">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="column-5">{{ number_format($priceEnd).'đ' }}</td>
                                    <td class="p-r-15">
                                        <a href="/carts/delete/{{ $product->id }}" style="border-bottom: 1px solid rgb(108, 175, 123)">Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <input class="stext-104a cl5 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Mã giảm giá">

                            <div class="flex-c-m stext-101a cl5 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                Áp dụng Mã
                            </div>
                        </div>

                        <input type="submit" value="Cập Nhật Giỏ Hàng" formaction="/update-cart" class="flex-c-m stext-101a cl5 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                        @csrf

                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl5 p-b-30">
                        Tổng giỏ hàng
                    </h4>

                    <span class="stext-110 cl5">
                        Thông tin khách hàng
                    </span>
                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">

                        <div class="size-210b p-r-18 p-r-0-sm w-full-ssm">
                            <div class="bor8 bg0 m-b-12">
                                @if(!Auth::user())
                                <input class="stext-111 cl8 plh3 size-111a p-lr-15" type="text" name="name" placeholder="Tên Khách hàng" required>
                            </div>
                            <div class="bor8 bg0 m-b-12">
                                <input class="stext-111 cl8 plh3 size-111a p-lr-15" type="text" name="phone" placeholder="Số Điện Thoại" required>
                            </div>
                            <div class="bor8 bg0 m-b-12">
                                <input class="stext-111 cl8 plh3 size-111a p-lr-15" type="text" name="address" placeholder="Địa Chỉ Giao Hàng" required>
                            </div>

                            <div class="bor8 bg0 m-b-12">
                                <input class="stext-111 cl8 plh3 size-111a p-lr-15" type="text" name="email" placeholder="Email liên hệ" required>
                            </div>
                            <div class="bor8 bg0 m-b-12">
                                <textarea class="cl8 plh3 size-111 p-lr-15" name="content"></textarea>
                            </div>
                            @else
                            <input class="stext-111 cl8 plh3 size-111a p-lr-15" type="text" name="name" value="{{Auth::user()->name}}" placeholder="Tên Khách hàng" required>
                        </div>
                        <div class="bor8 bg0 m-b-12">
                            <input class="stext-111 cl8 plh3 size-111a p-lr-15" type="text" name="phone" value="{{Auth::user()->phone}}" placeholder="Số Điện Thoại" required>
                        </div>
                        <div class="bor8 bg0 m-b-12">
                            <input class="stext-111 cl8 plh3 size-111a p-lr-15" type="text" name="address" value="{{Auth::user()->address}}" placeholder="Địa Chỉ Giao Hàng" required>
                        </div>

                        <div class="bor8 bg0 m-b-12">
                            <input class="stext-111 cl8 plh3 size-111a p-lr-15" type="text" name="email" value="{{Auth::user()->email}}" placeholder="Email liên hệ" required>
                        </div>
                        <div class="bor8 bg0 m-b-12">
                            <textarea class="cl8 plh3 size-111 p-lr-15" name="content"></textarea>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="flex-w flex-t p-t-27 p-b-33">
                    <div class="size-208">
                        <span class="mtext-101a cl5">
                            Tổng tiền
                        </span>
                    </div>

                    <div class="size-209 p-t-1">
                        <span class="mtext-110 cl5">
                            {{ number_format($total) .'đ'}}
                        </span>
                    </div>
                </div>

                <button class="flex-c-m stext-101a cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                    Đặt Hàng
                </button>
            </div>
        </div>


    </div>
    </div>
    </div>
</form>
@else
<div class="text-center">
    <img src="/template/images/empty-cart.png">
</div>
@endif
@endsection