<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Services\Staff\StaffService;

class StaffController extends Controller
{
    protected $staff;

    public function __construct(StaffService $staff)
    {
        $this->staff = $staff;
    }

    public function create()
    {
        return view('admin.staff.add', [
            'title' => 'Thêm Nhân viên mới'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
        ]);

        $this->staff->insert($request);

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.staff.list', [
            'title' => 'Danh Sách Staff Mới Nhất',
            'staffs' => $this->staff->get()
        ]);
    }

    public function show(Staff $staff)
    {
        return view('admin.staff.edit', [
            'title' => 'Chỉnh Sửa Staff',
            'staff' => $staff
        ]);
    }

    public function update(Request $request, Staff $staff)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
        ]);

        $result = $this->staff->update($request, $staff);
        if ($result) {
            return redirect('/admin/staffs/list');
        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->staff->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Staff'
            ]);
        }

        return response()->json(['error' => true]);
    }
}
