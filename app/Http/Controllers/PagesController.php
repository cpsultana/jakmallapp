<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function topup_balance() {
        $title = 'Prepaid Balance';
        return view('pages.topup_balance')->with('title', $title);
    }
    
    public function payment(Request $request) {
        $title = 'Pay your order';
        $id = $request->input('id');

        $data = array(
            'title' => $title,
            'id' => $id
        );

        return view('pages.payment')->with($data);
    }

    public function product() {
        $title = 'Product Page';
        return view('pages.product')->with('title', $title);
    }

    
}
