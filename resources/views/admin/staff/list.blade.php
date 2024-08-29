@extends('admin.main')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Nhân viên </th>
            <th>Chức vụ</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>Lương</th>
            <th>Ảnh</th>
            <th>Cập Nhật</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($staffs as $key => $staff)
        <tr>
            <td>{{ $staff->id }}</td>
            <td>{{ $staff->name }}</td>
            <td>{{ $staff->position}}</td>
            <td>{{ $staff->phone }}</td>
            <td>{{ $staff->address}}</td>
            <td>{{ $staff->email }}</td>
            <td>{{ $staff->wage}}</td>
            <td><a href="{{ $staff->thumb }}" target="_blank">
                    <img src="{{ $staff->thumb }}" height="40px" width="40px">
                </a>
            </td>
            <td>{{ $staff->updated_at }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="/admin/staffs/edit/{{ $staff->id }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="btn btn-danger btn-sm" onclick="removeRow({{ $staff->id }} ,'/admin/staffs/destroy')">
                    <i class="fas fa-trash"></i>
                </a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

<div class="card-footer clearfix">
    {!! $staffs->links('layouts.paginationlinks') !!}
</div>
@endsection