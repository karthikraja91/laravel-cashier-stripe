<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class ProductController extends Controller
{
    public function index(){

    	$products = Product::get(['slug','name','price']);
    	//dd($data);
    	return view('welcome',compact('products'));

    }

    public function payNow($slug)
    {
    	$product = Product::whereSlug($slug)->first(['slug','name','price','description']);
    	
        $intent = auth()->user()->createSetupIntent();//dd($intent);

        return view('pay-now', compact('product', 'intent'));
    }

    public function purchase(Request $request,$slug)
	{
		$product = Product::whereSlug($slug)->first(['price']);
	    $user          = $request->user();
	    $paymentMethod = $request->input('payment_method');
	    try {
	        $user->createOrGetStripeCustomer();
	        $user->updateDefaultPaymentMethod($paymentMethod);
	        $user->charge($product->price * 100, $paymentMethod);  
	        return redirect()->route('success');    
	    } catch (\Exception $exception) { 	    	
	    }
	    
	    return redirect()->route('home');
	}

	public function success(){
    	
    	return view('success');

    }
}
