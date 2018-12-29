<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;

class SlideController extends Controller
{
    //
    public function getDanhsach(){
    	$slide=slide::all();
    	return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    public function getThem(){
    	return view('admin.slide.them');
    }
    public function getpostThem(Request $Request){
    	$this->validate($Request,[
    	'Ten'=>'required',
    	'NoiDung'=>'required|min:3|max:100',
    	'Hinh'=>'required',
    	],[
    	'Ten.required'=>'Bạn Chưa nhập Tên Slide',
    	'NoiDung.request'=>'Bạn chưa nhập nội dung',
    	'NoiDung.min'=>'Nội dung chứa ít nhất từ 3 đến 1000 ký tự',
    	'NoiDung.max'=>'Nội dung chứa ít nhất từ 3 đến 1000 ký tự',
    	'Hinh.required'=>'Bạn Chưa chọn file Hình',
    	]);

    	$slide=new slide();
    	$slide->Ten=$Request->Ten;
    	$slide->NoiDung=$Request->NoiDung;
    	$slide->link=$Request->Link;

    	$file=$Request->file('Hinh');
	    	$duoi=$file->getClientOriginalExtension();
	    		if($duoi!='jpg'&& $duoi!='png' && $duoi!='jpeg'){
	    			return redirect('admin/slide/them')->with('loi','Bạn chỉ được nhập những file có đuôi là: *jpg, *png,*jpeg');
	    		}
	    	$name=$file->getClientOriginalName();
	    	$hinh=str_random(4)."_".$name;
	    	$file->move("upload/slide",$hinh);
	    $slide->Hinh=$hinh;
	    $slide->save();
	    return redirect('admin/slide/danhsach')->with('thongbao','Đã thêm thành công!');
    }

    public function getSua($id){
    	$slide=slide::find($id);
    	return view('admin.slide.sua',['slide'=>$slide]);
    }
    public function getpostSua(Request $Request, $id){
    	$this->validate($Request,[
    	'Ten'=>'required',
    	'NoiDung'=>'required|min:3|max:100',
    	'Hinh'=>'required',
    	],[
    	'Ten.required'=>'Bạn Chưa nhập Tên Slide',
    	'NoiDung.request'=>'Bạn chưa nhập nội dung',
    	'NoiDung.min'=>'Nội dung chứa ít nhất từ 3 đến 1000 ký tự',
    	'NoiDung.max'=>'Nội dung chứa ít nhất từ 3 đến 1000 ký tự',
    	'Hinh.required'=>'Bạn Chưa chọn file Hình',
    	]);

    	$slide=slide::find($id);
    	$slide->Ten=$Request->Ten;
    	$slide->NoiDung=$Request->NoiDung;
    	$slide->link=$Request->Link;

    	$file=$Request->file('Hinh');
	    	$duoi=$file->getClientOriginalExtension();
	    		if($duoi!='jpg'&& $duoi!='png' && $duoi!='jpeg'){
	    			return redirect('admin/slide/them')->with('loi','Bạn chỉ được nhập những file có đuôi là: *jpg, *png,*jpeg');
	    		}
	    	$name=$file->getClientOriginalName();
	    	$hinh=str_random(4)."_".$name;
	    	$file->move("upload/slide",$hinh);
	    $slide->Hinh=$hinh;
	    $slide->save();

	    return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công!');
    }

    public function getXoa($id){
    	$slide=slide::find($id);
    	$slide->delete();
    	return redirect('admin/slide/danhsach')->with('thongbao','Xóa Thành Công');
    }
}
