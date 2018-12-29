<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;

class LoaitinController extends Controller
{
    //
    public function getDanhsach(){
    	$loaitin=loaitin::all();
    	return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }
    public function getThem(){
    	$theloai = theloai::all();
    	return view('admin.loaitin.them',['theloai'=>$theloai]);
    }
    public function getpostThem(Request $Request){
    	$this->validate($Request,[
    		'Ten'=>'required|unique:loaitin,Ten|min:3|max:100',
    		'TheLoai'=>'required',
    	],[
    		'Ten.required'=>'Bạn chưa nhập tên loại tin',
    		'Ten.unique'=>'Tên loại tin đã tồn tại',
    		'Ten.min'=>'Tên loại tin phải có độ dài từ 3 đến 100 ký tự',
    		'Ten.min'=>'Tên loại tin phải có độ dài từ 3 đến 100 ký tự',
    		'TheLoai.required'=>'Bạn chưa chọn tên thể loại',
    	]);

    	$loaitin= new loaitin();
    	$loaitin->Ten=$Request->Ten;
    	$loaitin->TenKhongDau=changeTitle($Request->Ten);
    	$loaitin->idTheLoai=$Request->TheLoai;
    	$loaitin->save();

    	return redirect('admin/loaitin/them')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getSua($id){
    	$loaitin =loaitin::find($id);
    	$theloai=theloai::all();
    	return view('admin.loaitin.sua',['loaitin'=>$loaitin,'theloai'=>$theloai,'id'=>$id]);
    }
    public function getpostSua(Request $Request,$id){
    	$this->validate($Request,[
    		'Ten'=>'required|unique:loaitin,Ten|min:3|max:100',
    		'TheLoai'=>'required',
    	],[
    		'Ten.required'=>'Bạn chưa nhập tên loại tin',
    		'Ten.unique'=>'Tên loại tin đã tồn tại',
    		'Ten.min'=>'Tên loại tin phải có độ dài từ 3 đến 100 ký tự',
    		'Ten.min'=>'Tên loại tin phải có độ dài từ 3 đến 100 ký tự',
    		'TheLoai.required'=>'Bạn chưa chọn tên thể loại',
    	]);
    	$loaitin=loaitin::find($id);
    	$loaitin->Ten=$Request->Ten;
    	$loaitin->TenkhongDau=changeTitle($Request->Ten);
    	$loaitin->idTheLoai=$Request->TheLoai;
    	$loaitin->save();

    	return redirect('admin/loaitin/sua/'.$id)->with('thongbao','Sửa Thành Công');

    }

    public function getXoa($id){
    	$loaitin=loaitin::find($id);
    	$loaitin->delete();

    	return redirect('admin/loaitin/danhsach')->with('thongbao', 'Xóa Thành Công');
    }
}
