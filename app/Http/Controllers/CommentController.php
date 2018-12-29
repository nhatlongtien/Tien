<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\TinTuc;


class CommentController extends Controller
{
    //
    public function getComment($id, $idTinTuc){
    	$comment=Comment::find($id);
    	$comment->delete();
    	return redirect('admin/tintuc/sua/'.$idTinTuc);
    }

    public function getpostComment($id, Request $Request){
    	$tintuc=tintuc::find($id);
    	$comment= new Comment();
    	$comment->idTinTuc=$tintuc->id;
    	$comment->NoiDung=$Request->NoiDung;
    	$comment->idUser=Auth::user()->id;
    	$comment->save();

    	return redirect('tintuc/'.$id.'/'.$tintuc->TieuDeKhongDau.'.html');
    }
}
