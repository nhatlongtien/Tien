<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TheLoai;
use App\slide;
use App\TinTuc;
use App\LoaiTin;

class PagesController extends Controller
{
    //
    function __construct(){
    	$theloai=theloai::all();
    	$slide=slide::all();
    	view()->share('theloai',$theloai);
    	view()->share('slide',$slide);
    	
    }

    public function TrangChu(){
    	
    	return view('pages.trangchu');
    }
    public function LienHe(){
    	
    	return view('pages.lienhe');
    }
    public function GioiThieu(){
    	return view('pages.gioithieu');
    }
    public function LoaiTin($id, $TenKhongDau){
    	$loaitin=loaitin::find($id);
    	$tintuc=tintuc::where('idLoaiTin','=',$id)->orderBy('id', 'desc')->paginate(5);
    	return view('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }

    public function TinTuc($id, $TieuDeKhongDau){
    	$tintuc=tintuc::find($id);
    	$tinnoibat=tintuc::where('NoiBat','=',1)->take(4)->get();
    	$tinlienquan=tintuc::where('idLoaiTin','=',$tintuc->idLoaiTin)->take(4)->get();
    	return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan ]);
    }

    public function getTimKiem(Request $Request){
        $tukhoa=$Request->TuKhoa;

        $tintuc=tintuc::where('TieuDe','like',"%$tukhoa%")->orwhere('TomTat','like',"%$tukhoa%")->orwhere('NoiDung','like',"%$tukhoa%")->take(30)->paginate(5);

        return view('pages.timkiem',['tukhoa'=>$tukhoa, 'tintuc'=>$tintuc]);
    }
}
