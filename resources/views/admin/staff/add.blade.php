@extends('admin.main')


@section('content')

<form action="" method="POST">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="product">Tên Nhân viên</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>
            </div>
            <!-- col -->
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="product">Chức vụ</label>
                    <input type="text" name="position" value="{{ old('position') }}" class="form-control">
                </div>
            </div>
            <!-- col -->
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="product">Số điện thoại</label>
                    <input type="number" name="phone" value="{{ old('phone') }}" class="form-control">
                </div>
            </div>
            <!-- col -->
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="product">Địa chỉ</label>
                    <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                </div>
            </div>
            <!-- col -->
        </div>
        <!-- row -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="product">Email</label>
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                </div>
            </div>
            <!-- col -->
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="product">Lương</label>
                    <input type="number" name="wage" value="{{ old('wage') }}" class="form-control">
                </div>
            </div>
            <!-- col -->
        </div>
        <!-- row -->
        <div class="form-group">
            <label for="menu">Ảnh Nhân viên</label><br>
            <label for=""><input type="file" id="upload" name="upload"></label>
            <div id="image_show">

            </div>
            <input type="hidden" name="thumb" id="thumb">
        </div>


    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm Nhân viên</button>
    </div>
    @csrf
</form>
@endsection