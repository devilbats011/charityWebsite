<?php

namespace App\Http\Controllers;
use Validator;
use Storage;
use Illuminate\Http\Request;
use App\berita;
use App\slider as slider;
Use App\usahakami as usahakami;
use App\bankinfo as bankinfo;
use App\contactfooter as cf;
use App\Mail\helloworld;
use Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    
    public function __construct()
    {
        
    }
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function emailRegister()
    {   
        $url_route = route('send.email.register');
        echo "<a href='".$url_route."' class='btn btn-primary'>EMAIL REGISTRATION  </a>";
    }

    public function send()
    {
        Mail::to('wanafnanharizwz@gmail.com')->send(new helloworld);
        echo "Go Check Email";
    }

    public function homepage()
    {
        $sliders = slider::all(); 
        $beritas = berita::paginate(3); 
        $usahakamis = usahakami::all(); 
        $bankinfos = bankinfo::all();
        $cf = cf::all();
       //dd($bankinfos[0]->bankname);
        return view( 'pkas_homepage',compact('sliders','beritas','usahakamis','bankinfos','cf') );//->with('bankinfos',$bankinfos);
    
    }

    public function dashboard()
    {
        $ss = slider::all(); 
        $beritas = berita::all(); 
        $usahakamis = usahakami::all(); 
         $bankinfos = bankinfo::all();
          $cf = cf::all();
        foreach ($ss as $b)
        {
                $gambar_array[] = $b->gambar;
        }
          //  dd($beritas);
         return view('dashboard')->with('gambar_array',$gambar_array)
                                 ->with('ss',$ss)
                                 ->with('beritas',$beritas)
                                 ->with('usahakamis',$usahakamis)
                                 ->with('bankinfos',$bankinfos)
                                 ->with('cf',$cf);
    }

    public function StoreHeader(Request $r)
    {
      /*
       *preference of use|usage request
       *print_r($_POST['tajuk']);
       * print_r($_FILES);
       *echo $r->get('tajuk')." | ".$r->gambar->getClientOriginalName()." | ".$r->input('tajuk');
      */

        $validator = Validator::make($r->all(), [
            'tajuk' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2000', //2mb
            'content' => 'required',
        ]);

        if ($validator->fails())
        {
             return response()->json(['errors'=>$validator->errors()->all()]);
        }


       $globalNumber = $r->get('globalNumber');

       switch ($globalNumber) {
            case 0:
                $slider = slider::find(1);
                break;
            case 1:
                 $slider = slider::find(2);
                break;
            case 2:
                $slider = slider::find(3);
                break;
            default:
                $slider = slider::find(1);
        }

           $slider->tajuk = $r->get('tajuk');
           $slider->content = $r->get('content'); 

        if ( $r->hasFile('gambar') ) {
           $path = $r->gambar->storeAs('public/photos', $r->file('gambar')->getClientOriginalName()); //
           $slider->gambar = "storage/photos/".$r->file('gambar')->getClientOriginalName();

          // return "ceh check : ".$slider->gambar;
        }

        $slider->save();
        return slider::all();
        // return response()->json(['success'=>'Record is successfully added']);

       // return $r->all();
        //return "public/".$path; // "/public/".photos/Udon no Kuni - 02 - Large 01.jpg
        // return $r->file('gambar')->getClientOriginalName();

    }


    public function Header()
    {
        return view('/sandbox/header');//->with('sb','sandbox');

    }


    public function contactedit(Request $r)
    {
        $bi1 = bankinfo::find(1);
        $bi1->bankname = $r->get('bankinfo1');
        $bi1->bankaccount = $r->get('bankaccount1');

        $bi2 = bankinfo::find(2);
        $bi2->bankname = $r->get('bankinfo2');
        $bi2->bankaccount = $r->get('bankaccount2');

        $bi3 = bankinfo::find(3);
        $bi3->bankname = $r->get('bankinfo3');
        $bi3->bankaccount = $r->get('bankaccount3');

        $bi1->save();
        $bi2->save();
        $bi3->save();

        $cf = cf::find(1);
        // /'address', 'contactnumber', 'other1', 'other2'
        $cf->other1 = $r->get('other1');
        $cf->other2 = $r->get('other2');
        $cf->contactnumber = $r->get('contactnumber');
        $cf->address = $r->get('address');

        $cf->save();
        //print_r($r->get('bankinfo1') );
        return $r->all();
    }

    public function PkasBerita(Request $request)
    {

        $sliders = slider::all(); 
     
        $usahakamis = usahakami::all(); 
        $bankinfos = bankinfo::all();
        $cf = cf::all();
        $beritas = null;
        if($request->has('id'))
        {
          $beritas = berita::find($request->id);
          //dd($beritas);
        }

        return view( '/pkasberita',compact('sliders','beritas','usahakamis','bankinfos','cf') );//
    }

    public function EditBerita(Request $request)
    {

        $beritas = null;
        if($request->has('id'))
        {
          $beritas = berita::find($request->id);
          //dd($beritas);
        }

        $bankinfos = bankinfo::all();
        $cf = cf::all();

        return view( '/editberita',compact('beritas','bankinfos','cf') );


        /*$sliders = slider::all(); 
        $beritas = berita::paginate(3); 
        $usahakamis = usahakami::all(); 
        $bankinfos = bankinfo::all();
        $b = berita::find(1);
        $cf = cf::all();

        $contentArray = (isset($b->content) == true)?  $this->breakContentToArray($b->content) : "nothing" ;

        //echo $contentArray;
        //preg_replace("([0-9]+)", "2000", $copy_date);

        return view( '/editberita',compact('sliders','beritas','usahakamis','contentArray','bankinfos','cf') );//
        //abbandon
        */
      
    }




    public function editpost(Request $request)
    {
      //get from ajax
      if($request->id == null)
      {
        echo "request->id might null! <br>";
        dd( $request->all());
      }

      $b = berita::find($request->id);
      $b->tajuk = $request->tajuk;
      //dd($b);
        foreach ($request->all() as $key => $value) {
            if($key == 'text-1')
            {
               if ( $request->hasFile('gambar-1') )
                {
                 $request->file('gambar-1')->storeAs('/public/berita_photos', $request->file('gambar-1')->getClientOriginalName());
                  $b->gambar1 = "storage/berita_photos/".$request->file('gambar-1')->getClientOriginalName();

                }
                $b->text1 = $value;
            }

            if($key == 'text-2')
            {
               if ( $request->hasFile('gambar-2') )
                {
                 $request->file('gambar-2')->storeAs('/public/berita_photos', $request->file('gambar-2')->getClientOriginalName());
                  $b->gambar2 = "storage/berita_photos/".$request->file('gambar-2')->getClientOriginalName();
                }
                     $b->text2 = $value;
            }
            if($key == 'text-3')
            {
               if ( $request->hasFile('gambar-3') )
                {
                 $request->file('gambar-3')->storeAs('/public/berita_photos', $request->file('gambar-3')->getClientOriginalName());
                 $b->gambar3 = "storage/berita_photos/".$request->file('gambar-3')->getClientOriginalName();
                 
                }
                  $b->text3 = $value;
            }
        }

        if($b->save())
        {
          session()->flash('complete-status',"completed!");
          return redirect(route('dashboard'));
          
        }


    }
    public function postNewBerita(Request $request)
    {
       //dd($request->tajuk);
        $b = new berita;
        $b->tajuk = $request->tajuk;
        $id = $this->dynamicBerita($request,$b);

        if($id == 0)
        { dd("save failed"); }

      session()->flash('create-status',"created!");
      return redirect(route('dashboard'));
      //  return redirect(route( 'pkasberita', ['id'=>$id] ) );


    }

    public function deleteBerita(Request $request)
    {
      //dd($request->all());
      if($request->has('id')){ 
        //dd($request->id);
        $b = berita::find($request->id);
        if($b == null)
        {
          return redirect(route('dashboard'));
        }
        $b->delete();
        session()->flash('delete-status', "deleted!");
      } 

      return redirect(route('dashboard'));
    }

    public function newBerita()
    {
      $data =  [];
        $beritas = berita::paginate(3); 
        $bankinfos = bankinfo::all();
        $cf = cf::all();

        return view( '/new_berita',compact('beritas','bankinfos','cf','data') );
  
    }


    public function dynamicBerita($request,$b)
    {
        foreach ($request->all() as $key => $value) {
            if($key == 'text-1')
            {
               if ( $request->hasFile('gambar-1') )
                {
                 $request->file('gambar-1')->storeAs('/public/berita_photos', $request->file('gambar-1')->getClientOriginalName());
                  $b->gambar1 = "storage/berita_photos/".$request->file('gambar-1')->getClientOriginalName();

                }
                $b->text1 = $value;
            }

            if($key == 'text-2')
            {
               if ( $request->hasFile('gambar-2') )
                {
                 $request->file('gambar-2')->storeAs('/public/berita_photos', $request->file('gambar-2')->getClientOriginalName());
                  $b->gambar2 = "storage/berita_photos/".$request->file('gambar-2')->getClientOriginalName();
                }
                     $b->text2 = $value;
            }
            if($key == 'text-3')
            {
               if ( $request->hasFile('gambar-3') )
                {
                 $request->file('gambar-3')->storeAs('/public/berita_photos', $request->file('gambar-3')->getClientOriginalName());
                 $b->gambar3 = "storage/berita_photos/".$request->file('gambar-3')->getClientOriginalName();
                 
                }
                  $b->text3 = $value;
            }
          }

             if($b->save())
             {
               return $b->id;
             }

             return 0; //save failed
    }



}
