<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Phim;
// use App\Models\User;
use App\Models\userPhim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\Validator;

class CustomerController extends Controller
{
    public function viewRegister()
    {
        return view('client.login_register.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            // unique:users: duy nhất trong bảng user
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        // tạo một đối tượng mới, gán name, email khi yêu cầu
        $user->password = Hash::make($request->password);
        // Hash::make: băm mật khẩu

        $user->save();

        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }

    public function viewLogin()
    {
        return view('client.login_register.login');
    }

    public function postLogin(Request $request)
    {
        // Kiểm tra thông tin đăng nhập sử dụng Auth::attempt
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('');
        }
        return redirect()->back()->with('error', 'X Nhập Sai');
    }
    public function viewLogout()
    {
        Auth::logout();
        return redirect('');
    }
    public function viewProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = UserPhim::join('phims', 'user_phims.id_phim', '=', 'phims.id')
            ->where('user_phims.id_user', '=', $id)
            ->paginate(5);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('client.page.profile.profile_partial', ['data' => $data])->render()
            ]);
        }

        return view('client.page.profile.profile', ['data' => $data]);
        // Nếu yêu cầu không phải là AJAX, trả về view chính
    }

    public function postProfile(Request $request)
    {

        $id              = Auth::user()->id;
        $id_phim         = $request->get('id_phim');
        $khung_gio_chieu = $request->get('khung_gio_chieu');
        $rap_chieu       = $request->get('rap_chieu');
        $phong_chieu     = $request->get('phong_chieu');
        $gia_tien        = $request->get('gia_tien');
        $so_ghe          = $request->get('so_ghe');
        // Chuyển mảng thành chuỗi sử dụng dấu phẩy làm ký tự ngăn cách
        $chuoi_ghe = implode(',', $so_ghe);

        // var_dump($myString); exit;

        userPhim::create([
            'id_user'         => $id,
            'id_phim'         => $id_phim,
            'khung_gio_chieu' => $khung_gio_chieu,
            'so_ghe'          => $chuoi_ghe,
            'rap_chieu'       => $rap_chieu,
            'phong_chieu'     => $phong_chieu,
            'gia_tien'        => $gia_tien,
            // 'ten_ghe' => $gia_tien,
        ]);
        // var_dump($so_ghe); exit;

        return redirect()->route('profile');
    }
}
