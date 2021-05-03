<?php

namespace App\Http\Controllers;

use App\Model\Coupon;
use App\Model\CouponDetail;
use App\Model\Credit;
use App\Model\CreditDetail;
use App\Model\Reward;
use App\Model\RewardDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function reward($id)
    {
        $reward = Reward::where('user_id',$id)->first();
        $items = RewardDetail::where('user_id',$id)->get();
        return view('user.reward',compact('reward','items'));
    }
    public function credit($id)
    {
        $reward = Credit::where('user_id',$id)->first();
        $items = CreditDetail::where('user_id',$id)->get();
        return view('user.credit',compact('reward','items'));
    }
    public function coupon($id)
    {
        // $reward = Coupon::where('user_id',$id)->first();
        $items = CouponDetail::where('user_id',$id)->get();
        return view('user.coupon',compact('items'));
    }
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect('login');
    }
}
