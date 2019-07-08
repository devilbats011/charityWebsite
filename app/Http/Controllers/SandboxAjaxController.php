<?php

namespace App\Http\Controllers;
use App\berita;
use App\slider as slider;
Use App\usahakami as usahakami;
use App\bankinfo as bankinfo;
use App\contactfooter as cf;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use  App\registertoken;
class SandboxAjaxController extends Controller
{
    


    public function example(Request $request)
    {

        \Session::put('regtoken',$request->token); 
        return redirect()->route('register');
      /*  $resultSearch ="token not match or not found";
        $rts = registertoken::all();
        foreach ($rts as $rt) {
            if($rt->token == $request->token ){
                $resultSearch = "redirect to intended page!";
                break;
            }


        }
         echo $resultSearch;
         */
         //dd($request->token);
    }   

	public function index(){
		return view('sandbox/ajax/ajaxtest');
	}


    public function dummypost()
    {
    	//echo "hello world this is ajax"; //<-- ajax datatype:html
    return response()->json(['helloWorld' => 'ajaxHelloWorld']);  //<-- ajax datatype:json

	}

	public function PkasBerita()
	{
        $sliders = slider::all(); 
        $beritas = berita::paginate(3); 
        $usahakamis = usahakami::all(); 
        $bankinfos = bankinfo::all();
        $cf = cf::all();
       //dd();
        return view( 'sandbox/pkasberita',compact('sliders','beritas','usahakamis','bankinfos','cf') );//
	}
    

}
