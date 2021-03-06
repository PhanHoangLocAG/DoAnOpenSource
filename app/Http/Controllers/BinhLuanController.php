<?php

namespace App\Http\Controllers;

use App\BinhLuan;
use Illuminate\Http\Request;

class BinhLuanController extends Controller
{
    public function addComment(Request $req , $makh , $masp){
        $kq = BinhLuan::check($makh,$masp);
        if($kq){
         $binhluan = new BinhLuan();
         $binhluan->makhachhang = $makh;
         $a = strlen(str_replace(["<p>","</p>"," ","&nbsp;"],"",$req->content));
         
         if($a==0)
         { 
            return redirect()->back()->with('thongbaoloi', 'Nội dung bình luận không được để trống');
         }

         
         $binhluan->noidung = $req->content;
         $binhluan->masanpham = $masp;
         $binhluan->save();
         //dd('sdf');
         return redirect('frontend/detailProduct/'.$masp)->with('thongbao','Binh luận thành công');
        }
        return redirect()->back()->with('thongbaoloi', 'Bạn chưa mua sản phẩm nên không được đánh giá');
     }

}
