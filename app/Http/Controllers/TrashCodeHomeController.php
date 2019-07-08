<?php

namespace App\Http\Controllers;
use Validator;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\berita;
use App\slider as slider;
Use App\usahakami as usahakami;
use App\bankinfo as bankinfo;
use App\contactfooter as cf;
use App\Mail\helloworld;
use Mail;

class TrashCodeHomeController extends HomeController
{

    public function boley()
    {
      echo "boley!";
    }
    public function getContentArray()
    {
        $b = berita::find(1);
        $contentArray = (isset($b->content) == true)?  $this->breakContentToArray($b->content) : json_encode(["nothing"=>"nothing"]);
            
        return $contentArray;
    }
    public function getBeritaErrors()
    {
        dd(session()->get('errors') ); //if not exist it become null
    }

    public function DaRules($props)
    {
        $DaRulesArray = array();
        $DaRulesArray =  [
            'tajuk' => 'required|max:100',
        ];
        foreach ($props as $key => $value) {
            if(preg_match("/gambar/", $key))
            {
                //assoc array
             $DaRulesArray[$key] = 'required|image|mimes:jpeg,png,jpg,gif|max:2000'; //2mb 
             
            }
            else if(preg_match("/textarea/", $key))
            {
                $DaRulesArray[$key] = 'required';
            }

        }
        //dd($DaRulesArray);
        return $DaRulesArray;

    }
    public function testpost(Request $request)
    {
        $beritas = berita::paginate(3); 
        $bankinfos = bankinfo::all();
        $cf = cf::all();
        $b = berita::find(1);
        $stringTemp = "";
    
        $validator = Validator::make($request->all(), $this->DaRules( $request->except("_token") ) );

        if ($validator->fails())
        {

             $fails = response()->json(['errors'=>$validator->errors()->all()]);
             //dd($validator->errors()->all()[0]);
             $InputErrors = [];  

             foreach($fails->getData()->errors as $i => $e)
             {
               if( preg_match('/textarea-\d|gambar-\d|tajuk|prime-/', $e,$match) )
               {
                $InputErrors[] = [ $match[0] => $e];
               }
               else{
                    $InputErrors[] = [ $match[0] => $e];
               }
             }
            $ies = json_encode($InputErrors);
            session()->flash('errors',$ies );
            //dd(session()->get('errors'));
        }
        else
        {
            if( session()->get('errors') != null )
            {
              session()->remove('errors'); 
            }

            $b->tajuk = $request->tajuk;
            $b->content = $stringTemp;
            $b->save();
        }


        //dd("die");

        foreach ($request->except("_token",'tajuk','date') as $key => $value)
        {
          
          if ( $request->hasFile($key) )
          {
            //print_r($key);
           //dd($request->file($key));
           $request->file($key)->storeAs('/public/berita_photos', $request->file($key)->getClientOriginalName());
           $stringTemp .= "storage/berita_photos/".$request->file($key)->getClientOriginalName()."(-chocolatecaramel-)"."(-vanillacaramel-)";
          }
          else
          {
            $stringTemp .= $value."(-vanillacaramel-)";
            //  print_r($value);
          }
         
        }
        

        
        //dd($stringTemp);
        $contentArray = $this->breakContentToArray($stringTemp);
        //dd($contentArray);

        return view( '/editberita',compact('beritas','contentArray','bankinfos','cf') );
        
    }


    public function breakContentToArray($content)
    {
        $item = [];
        $resContent = preg_split("/\(-vanillacaramel-\)+/", $content);

      //  dd( $resContent );
        foreach ($resContent as $key => $value) {
     
            if($value != null){

                
                if (preg_match("/\(-chocolatecaramel-\)+/", $value, $match)) 
                {
                  
                   $valueArray = preg_split("/\(-chocolatecaramel-\)+/", $value);
                    foreach($valueArray as $value2)
                    {
                     if($value2 != null)
                     {

                       $item[] = [
                            "id"=>"#section-gambar-".$key,
                            "type"=>"chocolatefile",
                            "value" => $value2,
                        ];


                     }
                    }

                }
                else
                {
                    $item[] = [
                        "id"=>"#section-textarea-".$key,
                        "type"=>"vanillatext",
                        "value" => $value,
                    ];
                }
            }

        }
        
        $resContent = json_encode($item);
        //dd($resContent);

        //last checking --array kosong ke atau tidak..
        if( empty(json_decode($resContent) ) )
        {
            //klu yea ,array kosong, array equal to "nothing"
            $resContent = ["nothing"=>"nothing"] ;
            json_encode($resContent);
          //  dd($resContent);
        }
        return $resContent;
        
    }

}
