@extends('admin.main')


@section('content')

<form action="" method="POST">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="product">Tên Nhân viên</label>
                    <input type="text" name="name" value="{{ $staff->name }}" class="form-control">
                </div>
            </div>
            <!-- col -->
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="product">Chức vụ</label>
                    <input type="text" name="position" value="{{ $staff->position }}" class="form-control">
                </div>
            </div>
            <!-- col -->
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="product">Số điện thoại</label>
                    <input type="number" name="phone" value="{{ $staff->phone }}" class="form-control">
                </div>
            </div>
            <!-- col -->
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="product">Địa chỉ</label>
                    <input type="text" name="address" value="{{ $staff->address }}" class="form-control">
                </div>
            </div>
            <!-- col -->
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="product">Email</label>
                    <input type="text" name="email" value="{{ $staff->email }}" class="form-control">
                </div>
            </div>
            <!-- col -->
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="product">Lương</label>
                    <input type="number" name="wage" value="{{ $staff->wage }}" class="form-control">
                </div>
            </div>
            <!-- col -->
        </div>
        <!-- row -->

        <div class="form-group">
            <label for="menu">Ảnh Nhân viên</label><br>
            <label for=""><input type="file" id="upload" name="upload"></label>
            <div id="image_show">
                <a href="{{ $staff->thumb }}">
                    <img src="{{ $staff->thumb }}" width="100px">
                </a>
            </div>
            <input type="hidden" name="thumb" value="{{ $staff->thumb }}" id="thumb">
        </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Cập Nhật Nhân viên</button>
    </div>
    @csrf
</form>
@endsection