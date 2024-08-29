@extends('main')

@section('content')

<form action="/updateProfile" method="POST" style="margin-top: 90px;">

    <div class="card-body mt-5">

        <div class="form-group">

            <label for="menu">Họ Và Tên</label>
            <input type="text" name="fullname" value="{{Auth::user()->name}}" class="form-control" placeholder="Nhập họ và tên">
        </div>


        <div class="form-group">
            <label for="menu">Email</label>
            <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="Nhập Email">
        </div>
        <div class="form-group">
            <label for="menu">Địa chỉ</label>
            <input type="text" name="address" value="{{Auth::user()->address}}" class="form-control" placeholder="Nhập Địa chỉ">
        </div>
        <div class="form-group">
            <label for="menu">Số điện thoại</label>
            <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" placeholder="Nhập Số điện Thoại">
        </div>




        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Lưu Lại</button>
        </div>

        @csrf

</form>

@endsection