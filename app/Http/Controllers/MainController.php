<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;

    public function __construct(SliderService $slider, MenuService $menu, ProductService $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;

        if (Auth::check()) {
            view()->share('nguoidung', Auth::user());
        }
    }

    public function index()
    {
        return view('home', [
            'title' => ' Maximus - Máy Tính Cao Cấp & Thiết Bị Chơi Game Hàng Đầu Việt Nam',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            'products_laptop' => $this->product->get(12),
            'products_pc' => $this->product->get1(13),
            'products_cpu' => $this->product->get1(21),
            'products_screen' => $this->product->get(32),
            'products_ram' => $this->product->get1(20),

        ]);
    }
    public function showcontact()
    {
        return view('contact', [
            'title' => 'Maximus - Liên Lạc'
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function login()
    {
        return view('user.login', [
            'title' => 'trang đăng nhập'
        ]);
    }
    public function store(Request $request)
    {


        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember'))) {

            return redirect('/');
        }

        Session::flash('error', 'Email hoặc Password không đúng!!!');
        return redirect()->back();
    }
    public function profile()
    {
        return view('user.profile', [
            'title' => 'trang thông tin người dùng'
        ]);
    }
    public function singup()
    {
        return view('user.singup', [
            'title' => 'trang đăng ký'
        ]);
    }
    public function create(Request $request)
    {
        User::create([
            'name' => (string)$request->input('name'),
            'email' => (string)$request->input('email'),
            'phone' => (string)$request->input('phone'),
            'address' => (string)$request->input('address'),
            'password' => bcrypt((string)$request->input('password'))

        ]);
        return redirect('/users/login');
    }

    public function search(Request $request)
    {
        if (isset($_GET['query'])) {
            $search_text = $_GET['query'];
            $pro = DB::table('products')->where('name', 'LIKE', '%' . $search_text . '%')->paginate(3);
            $pro->appends($request->all());
            return view('search', [
                'pro' => $pro,
                'title' => 'Kết quả tìm kiếm'
            ]);
        } else {
            return view('search', [
                'title' => 'Kết quả tìm kiếm'
            ]);
        }
    }
}
