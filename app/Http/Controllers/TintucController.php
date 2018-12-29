<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\TheLoai;
use App\LoaiTin;
use App\Comment;
use App\Users;

class TintucController extends Controller
{
    //
    public function getDanhsach(){
    	$tintuc=tintuc::orderBy('id','DESC')->get();
    	return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }
    public function getThem(){
    	$theloai=theloai::all();
    	$loaitin=loaitin::all();
    	return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    public function getpostThem(Request $Request){
        $this->validate($Request,[
            'LoaiTin'=>'required',
            'TieuDe'=>'required|min:3|max:1000',
            'TomTat'=>'required',
            'NoiDung'=>'required',
        ],[
            'LoaiTin.required'=>'Bạn Chưa chọn loại tin',
            'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'TieuDe.min'=>'Tiêu đề chứa ít nhất từ 3 đến 1000 ký tự',
            'TieuDe.max'=>'Tiêu đề chứa ít nhất từ 3 đến 1000 ký tự',
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
            'TomTat.required'=>'Bạn chưa nhập tóm tắt',
        ]);

        $tintuc = new tintuc();
        $tintuc->Tieude=$Request->TieuDe;
        $tintuc->TieuDeKhongDau=changeTitle($Request->TieuDe);
        $tintuc->NoiBat=$Request->NoiBat;
        $tintuc->TomTat=$Request->TomTat;
        $tintuc->NoiDung=$Request->NoiDung;
        $tintuc->idLoaiTin=$Request->LoaiTin;
        $tintuc->SoLuotXem="0";
        if($Request->hasFile('Hinh')){
            $file=$Request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png' && $duoi!='jpeg'){
                return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được nhập những file có đuôi là: *jpg, *png,*jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            $file->move("upload/tintuc",$Hinh);
            $tintuc->Hinh=$Hinh;
        }else{
            $tintuc->Hinh="";
        }
        $tintuc->save();
        return redirect('admin/tintuc/danhsach')->with('thongbao','Bạn đã thêm thành công');
    }
    public function getXoa($id){
        $tintuc = tintuc::find($id);
        $tintuc->delete();

        return redirect('admin/tintuc/danhsach')->with('thongbao','Xóa thành công');
    }
    public function getSua($id){
        $theloai = theloai::all();
        $loaitin = loaitin::all();
        $comment=comment::all();
        $tintuc=tintuc::find($id);
        return view('admin.tintuc.sua',['theloai'=>$theloai,'loaitin'=>$loaitin,'tintuc'=>$tintuc, 'comment'=>$comment]);
    }
    public function getpostSua(Request $Request, $id){
        $this->validate($Request,[
           'LoaiTin'=>'required',
            'TieuDe'=>'required|min:3|max:1000',
            'TomTat'=>'required',
            'NoiDung'=>'required', 
        ],[
            'LoaiTin.required'=>'Bạn Chưa chọn loại tin',
            'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'TieuDe.min'=>'Tiêu đề chứa ít nhất từ 3 đến 1000 ký tự',
            'TieuDe.max'=>'Tiêu đề chứa ít nhất từ 3 đến 1000 ký tự',
            'NoiDung.required'=>'Bạn chưa nhập nội dung',
            'TomTat.required'=>'Bạn chưa nhập tóm tắt',
        ]);

        $tintuc=tintuc::find($id);
        $tintuc->Tieude=$Request->TieuDe;
        $tintuc->TieuDeKhongDau=changeTitle($Request->TieuDe);
        $tintuc->NoiBat=$Request->NoiBat;
        $tintuc->TomTat=$Request->TomTat;
        $tintuc->NoiDung=$Request->NoiDung;
        $tintuc->idLoaiTin=$Request->LoaiTin;
        if($Request->hasFile('Hinh')){
            $file=$Request->Hinh;
            $duoi=$file->getClientOriginalExtension();
            if($duoi!='jpg'&&$duoi!='png'&&$duoi!='jpeg'){
                return redirect('admin/tintuc/sua/'.$id)->with('loi','Bạn chỉ được nhập những file có đuôi là: *jpg, *png,*jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh=str_random(4)."_".$name;
            $file->move("upload/tintuc",$Hinh);
        }else{
            $tintuc->Hinh="";
        }
        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa thành công');
    }
}
