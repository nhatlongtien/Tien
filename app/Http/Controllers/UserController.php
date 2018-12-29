<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    //
    public function getDanhsach(){
    	$user=user::all();
    	return view('admin.user.danhsach',['user'=>$user]);
    }
    public function getThem(){
    	return view('admin.user.them');

    }
    public function getpostThem(Request $Request){
    	$this->validate($Request,[
    		'Ten'=>'required|min:3|max:100',
    		'Email'=>'required|unique:users,email',
    		'Password'=>'required|min:6|max:32',
    		'PasswordAgain'=>'required|same:Password',

    	],[
    		'Ten.required'=>'Bạn chưa nhập tên',
    		'Ten.min'=>'Tên phải có độ dài từ 3 đến 100 ký tự',
    		'Ten.max'=>'Tên Phải có độ dài từ 3 đến 100 ký tự',
    		'Email.required'=>'Bạn chưa nhập email',
    		'Email.unique'=>'Email này đã tồn tại',
    		'Password.required'=>'Bạn chưa nhập Password',
    		'Password.min'=>'Password phải có độ dài từ 6 đến 32 ký tự',
    		'Password.max'=>'Password phải có độ dài từ 6 đến 32 ký tự',
    		'PasswordAgain.required'=>'Bạn chưa Nhập lại mật khẩu',
    		'PasswordAgain.same'=>'Password bạn xác nhận không đúng',

    	]);

    	$user= new User();
    	$user->name=$Request->Ten;
    	$user->email=$Request->Email;
    	$user->password=bcrypt($Request->Password);
    	$user->level=$Request->Level;
    	$user->save();

    	return redirect('admin/user/them')->with('thongbao','đã thêm thành công');
    }
    public function getSua($id){
        $user=user::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }
    public function getpostSua(Request $Request, $id){
        $this->validate($Request,[
            'Ten'=>'required|min:3|max:100',
            'Email'=>'required|unique:users,email',
            'Password'=>'required|min:6|max:32',
            'PasswordAgain'=>'required|same:Password',

        ],[
            'Ten.required'=>'Bạn chưa nhập tên',
            'Ten.min'=>'Tên phải có độ dài từ 3 đến 100 ký tự',
            'Ten.max'=>'Tên Phải có độ dài từ 3 đến 100 ký tự',
            'Email.required'=>'Bạn chưa nhập email',
            'Email.unique'=>'Email này đã tồn tại',
            'Password.required'=>'Bạn chưa nhập Password',
            'Password.min'=>'Password phải có độ dài từ 6 đến 32 ký tự',
            'Password.max'=>'Password phải có độ dài từ 6 đến 32 ký tự',
            'PasswordAgain.required'=>'Bạn chưa Nhập lại mật khẩu',
            'PasswordAgain.same'=>'Password bạn xác nhận không đúng',

        ]);

        $user=user::find($id);
        $user->name=$Request->Ten;
        $user->email=$Request->Email;
        $user->password=bcrypt($Request->Password);
        $user->level=$Request->Level;
        $user->save();
        return redirect('admin/user/sua/'.$id)->with('thongbao','Đã sửa thành công');

    }
    public function getXoa($id){
    	$user=user::find($id);
    	$user->delete();

    	return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công!');
    }

    public function getDangnhapAdmin(){
    	return view('admin/login');
    }
    public function getpostDangnhapAdmin(Request $Request){
    	$this->validate($Request,[
    		'Email'=>'required',
    		'Password'=>'required|min:6|max:32',
    	],[
    		'Email.required'=>'Bạn chưa nhập Email',
    		'Password.required'=>'Bạn chưa nhập Password',
    		'Password.min'=>'Password phải có độ dài từ 6 đến 32 ký tự',
    		'Password.max'=>'Password phải có độ dài từ 6 đến 32 ký tự',
    	]);

    	if(Auth::attempt(['email'=>$Request->Email,'password'=>$Request->Password])){
    		return redirect('admin/theloai/danhsach');
    	}else{
    		return redirect('admin/dangnhap')->with('thongbao','Bạn nhập sai email hoặc mật khẩu');
    	}
    }
    public function getDangxuatAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap');
    }

    public function getDangNhap(){
        return view('pages.dangnhap');
    }
    public function getpostDangNhap(Request $Request){
        $this->validate($Request,[
            'Email'=>'required',
            'Password'=>'required|min:6|max:32',
        ],[
            'Email.required'=>'Bạn chưa nhập Email',
            'Password.required'=>'Bạn chưa nhập Password',
            'Password.min'=>'Password phải có độ dài từ 6 đến 32 ký tự',
            'Password.max'=>'Password phải có độ dài từ 6 đến 32 ký tự',
        ]);
        if(Auth::attempt(['email'=>$Request->Email,'password'=>$Request->Password])){
            return redirect('trangchu');
        }else{
            return redirect('dangnhap')->with('thongbao','Email hoặc mật khẩu không đúng');
        }
    }

    public function getDangXuat(){
        Auth::logout();
        return redirect('trangchu');
    }
    public function getDangKy(){
        return view('pages.dangky');
    }
    public function getpostDangKy(Request $Request){
         $this->validate($Request,[
            'Ten'=>'required|min:3|max:100',
            'Email'=>'required|unique:users,email',
            'Password'=>'required|min:6|max:32',
            'PasswordAgain'=>'required|same:Password',

        ],[
            'Ten.required'=>'Bạn chưa nhập tên',
            'Ten.min'=>'Tên phải có độ dài từ 3 đến 100 ký tự',
            'Ten.max'=>'Tên Phải có độ dài từ 3 đến 100 ký tự',
            'Email.required'=>'Bạn chưa nhập email',
            'Email.unique'=>'Email này đã tồn tại',
            'Password.required'=>'Bạn chưa nhập Password',
            'Password.min'=>'Password phải có độ dài từ 6 đến 32 ký tự',
            'Password.max'=>'Password phải có độ dài từ 6 đến 32 ký tự',
            'PasswordAgain.required'=>'Bạn chưa Nhập lại mật khẩu',
            'PasswordAgain.same'=>'Password bạn xác nhận không đúng',

        ]);
         $user=new user();
         $user->name=$Request->Ten;
         $user->password=bcrypt($Request->Password);
         $user->email=$Request->Email;
         $user->level="0";
         $user->save();

         return redirect('trangchu');
    }
}
