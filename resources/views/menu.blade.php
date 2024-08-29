@extends('main')

@section('content')
<div class="bg0 m-t-23 p-b-140 p-t-80">
    <div class="container">

        <div>
            <div style="color: black;">
                <h1>{{ $title }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="bread-crumb " style="width: 30%;height: 40px; ; margin-left: 15px;">
                <span>Bạn đang ở: </span>
                <a href="/" class="stext-109a cl8 hov-cl2 trans-04">
                    Trang chủ
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>
                <span class="stext-109b">
                    {{ $title }}
                </span>
            </div>

            <div class="flex-w flex-c-m1 m-tb-10">
                <div class="flex-c-m stext-106 cl5 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl5 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl5 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Sắp xếp
                </div>
            </div>
        </div>


        <!-- Filter -->
        <div class="dis-none panel-filter w-full p-t-10">
            <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                <div class="filter-col1 p-r-15 p-b-27">
                    <div class="mtext-102 cl5 p-b-15">
                        Giá
                    </div>

                    <ul>
                        <li class="p-b-6">
                            <a href="{{ request()->url() }}" class="filter-link stext-106 trans-04">
                                Sản phẩm nổi bật
                            </a>
                        </li>

                        <li class="p-b-6">
                            <a href="{{ request()->fullUrlWithQuery(['price_sale' => 'asc']) }}" class="filter-link stext-106 trans-04" style="font-family: 'Roboto' , sans-serif;">
                                Giá : Tăng dần
                            </a>
                        </li>

                        <li class="p-b-6">
                            <a href="{{ request()->fullUrlWithQuery(['price_sale' => 'desc']) }}" class="filter-link stext-106 trans-04" style="font-family: 'Roboto' , sans-serif;">
                                Giá : Giảm dần
                            </a>
                        </li>
                    </ul>

                </div>



                <div class="filter-col1 p-r-15 p-b-27">
                    <div class="mtext-102 cl5 p-b-15">
                        ㅤㅤ
                    </div>

                    <ul>
                        <li class="p-b-6">
                            <a href="{{ request()->url() }}" class="filter-link stext-106 trans-04">
                                Sản phẩm bán chạy
                            </a>
                        </li>

                        <li class="p-b-6">
                            <a href="{{ request()->fullUrlWithQuery(['price' => 'asc']) }}" class="filter-link stext-106 trans-04" style="font-family: 'Roboto' , sans-serif;">
                                Mới nhất
                            </a>
                        </li>

                        <li class="p-b-6">
                            <a href="{{ request()->fullUrlWithQuery(['price' => 'desc']) }}" class="filter-link stext-106 trans-04" style="font-family: 'Roboto' , sans-serif;">
                                Cũ nhất
                            </a>
                        </li>
                    </ul>



                </div>
            </div>
        </div>

        @include('products.list')
        <div class="pagination-block" style="text-align: center;">
            {{ $products->links('layouts.paginationlinks') }}
        </div>
    </div>
</div>
@endsection