@extends('admin.main')


@section('content')

<form action="" method="POST">
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="product">Tiêu đề</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                </div>
            </div>
            <!-- col -->
            <div class="col-md-6">
                <div class="form-group ">
                    <label for="product">Đường dẫn</label>
                    <input type="text" name="url" value="{{ old('url') }}" class="form-control">
                </div>
            </div>
            <!-- col -->
        </div>
        <!-- row -->

        <div class="form-group">
            <label for="menu">Ảnh Sản Phẩm</label><br>
            <label for=""><input type="file" id="upload" name="upload"></label>
            <div id="image_show">

            </div>
            <input type="hidden" name="thumb" id="thumb">
        </div>

        <div class="form-group ">
            <label>Sắp xếp</label>
            <input type="number" name="sort_by" value="1" class="form-control" placeholder="">
        </div>

        <div class="form-group">
            <label>Kích Hoạt</label>

            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="active" value="active" name="active">
                <label for="active" class="custom-control-label">Có</label>
            </div>

            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="noactive" name="active">
                <label for="noactive" class="custom-control-label">Không</label>
            </div>

        </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Thêm Slider</button>
    </div>
    @csrf
</form>
@endsection