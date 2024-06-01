<?php

namespace App\Http\Controllers;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Phim;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;

class PhimController extends Controller
{

    public function phim()
    {
        $data_phim = Phim::orderBy('created_at', 'desc')->get(); // Phân trang với mỗi trang có tối đa 10 phim

        return view('admin.page.phim.phim',['data_phim' => $data_phim]);

    }
    public function postphim(Request $request)
    {

        $ten_phim           = $request->input('ten_phim');
        $slug_phim          = $request->input('slug_phim');
        $hinh_anh           = $request->input('hinh_anh');
        $dao_dien           = $request->input('dao_dien');
        $dien_vien          = $request->input('dien_vien');
        $the_loai           = $request->input('the_loai');
        $thoi_luong         = $request->input('thoi_luong');
        $ngon_ngu           = $request->input('ngon_ngu');
        $rated              = $request->input('rated');
        $trailer            = $request->input('trailer');
        $bat_dau            = $request->input('bat_dau');
        $ket_thuc           = $request->input('ket_thuc');
        $trang_thai         = $request->input('trang_thai');
        $mo_ta              = $request->input('mo_ta');

        phim::create([
            'ten_phim'           => $ten_phim,
            'slug_phim'          => $slug_phim,
            'hinh_anh'           => $hinh_anh,
            'dao_dien'           => $dao_dien,
            'dien_vien'          => $dien_vien,
            'the_loai'           => $the_loai,
            'thoi_luong'         => $thoi_luong,
            'ngon_ngu'           => $ngon_ngu,
            'rated'              => $rated,
            'trailer'            => $trailer,
            'bat_dau'            => $bat_dau,
            'ket_thuc'           => $ket_thuc,
            'trang_thai'         => $trang_thai,
            'mo_ta'              => $mo_ta
        ]);
        // Toastr::success('Data has been saved successfully!', 'Success');

        return redirect()->route('phim')->with('success', 'Thêm mới phim thành công');
    }
    public function delPhim($id)
    {
        $item = phim::findOrFail($id);
        $item->delete();

        return redirect()->route('phim')->with('error', 'Xóa Phim thành công');
    }

    public function edit($id){

        $edit  = Phim::find($id);

        if($edit){
            return view('admin.page.phim.edit',['edit' => $edit]);
        }else{
            return view('admin.page.phim.found');
        }


        // return view('admin.page.phim.edit',['edit' => $edit]);
    }
     public function update(Request $request,string $id)
    {
        $validateDate = $request->validate([
            'ten_phim'           => 'required',
            'slug_phim'          => 'required',
            'hinh_anh'           => 'required',
            'dao_dien'           => 'required',
            'dien_vien'          => 'required',
            'the_loai'           => 'required',
            'thoi_luong'         => 'required',
            'ngon_ngu'           => 'required',
            'rated'              => 'required',
            'trailer'            => 'required',
            'bat_dau'            => 'required',
            'ket_thuc'           => 'required',
            'trang_thai'         => 'required',
            'mo_ta'              => 'required',

        ]);
        $update = Phim::find($id);
        $update->update($validateDate);

        // return redirect()->route('phim')->with('success', 'Thêm mới thành công');
        return redirect()->route('phim')->with('success', 'Chỉnh sửa phim thành công');

    }

}

