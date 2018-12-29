<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use Illuminate\Support\Facades\Auth;
class TheloaiController extends Controller
{
    //
    public function getDanhsach(){
    	$theloai=theloai::all();
    	return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }
    public function getThem(){
    	return view('admin.theloai.them');
    }
    public function getpostThem(Request $Request){
    	$this->validate($Request,[
    		'Ten'=>'required|unique:theloai,Ten|min:3|max:100'
    	],[
    		'Ten.required'=>'bạn chưa nhập tên thể loại',
    		'Ten.unique'=>'Tên thể loãi đã tồn tại',
    		'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    		'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự'
    	]);
    	$theloai= new theloai();
    	$theloai->Ten=$Request->Ten;
    	$theloai->TenKhongDau =changeTitle($Request->Ten);
    	$theloai->save();
        return redirect('admin/theloai/them')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getSua($id){
    	$theloai=theloai::find($id);
    	return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    public function getpostSua(Request $Request,$id){
    	$theloai = theloai::find($id);
    	$this->validate($Request,[
    		'Ten'=>'required|unique:theloai,Ten|min:3|max:100'
    	],[
    		'Ten.required'=>'Bạn chưa nhập tên thể loại',
    		'Ten.unique'=>'Tên thể loại đã tồn tại',
    		'Ten.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự',
    		'Ten.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 ký tự'
    	]);
    	$theloai->Ten=$Request->Ten;
        $theloai->TenKhongDau=changeTitle($Request->Ten);
    	$theloai->save();

    	return redirect('admin/theloai/sua/'.$id)->with('thongbao','sửa thành công');
    }
    public function getXoa($id){
    	$theloai = theloai::find($id);
    	$theloai->delete();

    	return redirect('admin/theloai/danhsach')->with('thongbao','xoa thành công');
    }
}
