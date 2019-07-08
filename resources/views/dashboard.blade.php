@extends('layouts.app')

@section('content')

<div id="delete-pack">
<article class="smokescreen">
</article>
<article class="delete-card" style="padding:1.2rem 1rem;">
    <p class="text-danger" style="font-size:1.3rem;font-weight:bold">Warning !</p>      

    <p class="text-default" style="font-size:0.8rem;font-weight:normal">Are you sure that you want to <b class="">permanently</b> delete <b class="s-item"> the-selected-item </b>? </p>  
    <div class="" style="padding-right:1.2rem;text-align: end;"><button class="btn" onclick="deletePackDisplayNone()" >Cancel</button><button class="btn" onclick="letDeleteItem()" >Delete</button> </div>
  
</article>
</div>
                   <article id="ToastrInterface" >

                        <div class="Toastr-item toastr-loading">
                            <div>
                                <span> <i class="fa fa-spinner fa-spin" style="font-size:26px"></i></span>
                                <span><p>LOADING ..</p></span>
                                <span></span>
                            </div>
                            
                        </div>

                        <div class="Toastr-item toastr-complete">
                            <div style="background: #1d6daf;">
                                <span> <i class="fa fa-hand-peace-o" style="font-size:26px"></i> </span>
                                <span style=""><p>COMPLETE !</p></span>
                                <span class="toastr-complete" ></span>
                            </div>
                            
                        </div>

                        <div class="Toastr-item bg-danger toastr-delete" >
                            <div style="background: #b3190e;">
                                <span> <i class="fa fa-trash" style="font-size:26px"></i> </span>
                                <span style=""><p>DELETED !</p></span>
                                <span class="bg-danger" ></span>
                            </div>
                            
                        </div>


                        <div class="Toastr-item bg-success toastr-create" >
                            <div style="background: #177d42;">
                                <span> <i class="fa fa-hand-peace-o" style="font-size:26px"></i> </span>
                                <span style=""><p>BERITA CREATED !</p></span>
                                <span class="bg-success" ></span>
                            </div>
                            
                        </div>


                        @if( session()->get('delete-status') != null )
                                      <p style="visibility: hidden;pointer-events: none" id="delete-complete"> trigger-complete </p>
                        
                        

                        @elseif( session()->get('create-status') != null )
                                      <p style="visibility: hidden;pointer-events: none" id="create-complete"> trigger-complete </p>


                        @elseif(session()->get('complete-status') != null  )
                                      <p style="visibility: hidden;pointer-events: none" id="general-complete"> trigger-complete </p>
                        @endif




                    </article>


<div class="dashboard-container " style="margin:20px auto;" id="testhtml" > 

        <div style="background:#AAAA;border-top-right-radius: 8px;border-top-left-radius: 8px;    padding: 20px 30px 0px 30px;" class="card-header"><h2>title </h2>
        </div>

            <main class="edit-header" style="min-height: 400px;" >
                
                <div class="tunjukGambar">
                    <img src="{{asset($gambar_array[0])}}" id="img_tunjukGambar">
                    <p>Gambar 1 </p>
                </div>
        <form method="post" enctype="multipart/form-data" action="{{route('StoreHeader')}}"  style="margin:5px;" id="StoreHeader" >
                <ul> <li onclick="TunjukGambar(0)" >Gambar 1</li> <li onclick="TunjukGambar(1)" >Gambar 2</li> <li onclick="TunjukGambar(2) ">Gambar 3</li></ul>
                <div id="formGambarHeader">

                    <center>
                       <!-- {{csrf_field()}} -->

                       <label>
                        <input type="file" name="gambar" id="gambar"> <br> 
                        </label><br>
                        <label><span> Tajuk </span>
                        <input type="text" name="tajuk" id="tajuk" value="{{ $ss[0]->tajuk }}" style="width:250px" >
                         </label><br>
                        <div style="width: 95%; background: crimson;color:white;text-align: center;margin-top:10px" > Content <br><small> [ warning: Can't type more than 250 words ]</small></div>
                        <textarea name="content" id="content">{{ $ss[0]->content }}</textarea><br>
                        <input type="text" name="globalNumber" id="globalNumber" value="0" hidden="true" >
                        <br>
                        <input type="submit" value="upload" ></input>
                    </center>
                </div>
        </form>

            </main>

</div>

<div class="dashboard-container" id="new_berita">
     <div style="background:white;border:2px solid crimson;border-bottom:1px solid crimson;    padding: 20px 30px 0px 30px;" class="card-header"><h2>Create New Berita</h2>
      </div>
    <div class="card-body" style="border:1px solid crimson">
                 <a class="btn btn-success" href="{{route('new.berita')}}" >New</a>
                

    </div>

</div>


<div class="dashboard-container" id="html2">
     <div style="background:white;border:2px solid crimson;border-bottom:1px solid crimson;    padding: 20px 30px 0px 30px;" class="card-header"><h2>Berita-Berita </h2>
            </div>
    <div class="Edit-Berita">
      <table border="0" width="100%" style="height:auto;text-align: center;" bordercolor="">
        <tr>
            <th> Tajuk </th> <th> Date Modified </th> <th style="text-align:center;"> Action </th>
        </tr>
        @foreach($beritas as $b)
        <tr>
            <td> {{$b->tajuk}} </td>
            <td style=""> {{ $b->updated_at->toDateString() }} </td>
             <td class="action_button_panel">

                 <div style=""><a target="_blank" class="btn-primary btn" href="{{ route('editberita' ,['id'=>$b->id]) }}" > Edit </a></div>
                 <div style=""><a  class="btn-danger btn del" data-tajuk="{{$b->tajuk}}" href="{{ route('delete.berita' ,['id'=>$b->id]) }}" > Delete </a></div>
                 <div style=""><a target="_blank" class="btn-success btn" href="{{ route('pkasberita' ,['id'=>$b->id]) }}" > View </a></div>
                
             </td>
              </article>
        </tr>
        @endforeach
      </table>
    </div>

</div>
        <br> 
<div style="margin:auto;background:red;width: 80%;" >
        <footer id="hubung_kami_grid">
                <div class="item item_a" style="border-right:1px solid gold;">
                    <h2>EDIT CONTACT<!--PERTUBUHAN KEBAJIKAN AN-NAJAH SELANGOR (PKAS) --> </h2>
                </div>
                <div class="item item_b" style="border-right:1px solid gold;">
                    <button id="commit-contact-change" onclick="ContactCommitChange()" >Commit Change
                        <!--Sebuah organisasi berdaftar di bawah Jabatan Perdana Menteri (PPAB-14/2012) sebagai pusat dakwah dan sokongan mualaf. --></button>
                </div>
                <div class="item item_c" style="border-right:1px solid gold;" >
                    <p id="loading"></p>
                    <!--<a href="#"><i class="fa fa-twitter" style="font-size:36px"></i></a>
                    <a href="#"><i class="fa fa-facebook" style="font-size:36px"></i></a>
                    <a href="#"><i class="fa fa-instagram" style="font-size:36px"></i></a>-->

                </div>
                <div class="item item_d">
                    <h2>MAKLUMAT SUMBANGAN</h2>
                </div>
                <div class="item item_e">
                    <section  >
                    <h3 contenteditable="true" >{{$bankinfos[0]->bankname}} </h3>  <i class="glyphicon glyphicon-plus"></i> 
                    </section>
                    <p  contenteditable="true"  > {{$bankinfos[0]->bankaccount}} </p>
                    <section >
                    <h3  contenteditable="true" > {{$bankinfos[1]->bankname}} </h3> <i class="glyphicon glyphicon-plus"></i>
                    </section>
                    <p  contenteditable="true"  > {{$bankinfos[1]->bankaccount}}  </p>
                    <section >
                    <h3  contenteditable="true" > {{$bankinfos[2]->bankname}}  </h3> <i class="glyphicon glyphicon-plus"></i>
                    </section>
                    <p  contenteditable="true"  > {{$bankinfos[2]->bankaccount}}  </p>
                </div>
                <div class="item item_f">
                    <h2>HUBUNGI KAMI</h2>
                </div>
                <div class="item item_g">
                    <h3 contenteditable="true" > {{ $cf[0]->other1 }} </h3>
                    <h3 contenteditable="true" > {{ $cf[0]->other2 }} </h3>
                    <h3 contenteditable="true" >  {{ $cf[0]->contactnumber }}</h3>
                    <h3 contenteditable="true" >  {{$cf[0]->address}} </h3>
                    <h3></h3>
                </div>

              <!--  <div class="item item_h"><p><i>Powered by</i> NightStorm</p></div>-->
        </footer>
</div>


@endsection

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
   crossorigin="anonymous">
    /*jquery cdn*/
</script> 
<script src="{{ asset('js/DashboardAjax.js') }}" ></script>
<script>

var DeleteHref = "";
var tajukHref = "";

setTimeout(()=>{

Array.from(document.getElementsByClassName("del")).forEach((elem)=>
{
  elem.style = "pointer-events: auto;";
  elem.addEventListener("click", function(event){
    event.preventDefault();
    var getHref = elem.getAttribute('href');
    DeleteHref = getHref;
   // console.log(elem.getAttribute('data-tajuk'));
    tajukHref = elem.getAttribute('data-tajuk');
    //console.log(tajukHref);
     var text = document.querySelector('.delete-card p.text-default .s-item');
    // var c = text.innerHTML.replace('the-selected-item',tajukHref);
    text.innerHTML = tajukHref;
    document.getElementById('delete-pack').style="display:block";
  
  });
  
});
  
},500);

function letDeleteItem()
{

  location.href = DeleteHref;
}

function deletePackDisplayNone()
{
  document.getElementById('delete-pack').style="display:none";
}




     var slider1 = {gambar:`{{$gambar_array[0]}}`,tajuk:`<?php echo $ss[0]->tajuk ?>`,content:`<?php echo $ss[0]->content ?>`};
     var slider2 =  {gambar:`{{$gambar_array[1]}}`,tajuk:`<?php echo $ss[1]->tajuk ?>`,content:`<?php echo $ss[1]->content ?>`};
     var slider3 =  {gambar:`{{$gambar_array[2]}}`,tajuk:`<?php echo $ss[2]->tajuk ?>`,content:`<?php echo $ss[2]->content ?>`};
     var globalNumber = 0;
    HeaderInterface();
    console.log(slider1.gambar);
    function TunjukGambar(num){
          globalNumber =  num;
          $("input:text#globalNumber").val(globalNumber);

          if(num == 0){
             document.getElementById("img_tunjukGambar").src = slider1.gambar; //ni cara vannila js
             document.getElementById("tajuk").value  = slider1.tajuk; 
             document.getElementById("content").innerHTML  = slider1.content;
             document.getElementsByClassName('tunjukGambar')[0].children[1].innerText = "Gambar 1"

          }
          if(num == 1){
            document.getElementById("img_tunjukGambar").src = slider2.gambar; 
             document.getElementById("tajuk").value  = slider2.tajuk; 
             document.getElementById("content").innerHTML  = slider2.content;
             document.getElementsByClassName('tunjukGambar')[0].children[1].innerText = "Gambar 2"
          }
          if(num == 2){
            document.getElementById("img_tunjukGambar").src = slider3.gambar; 
            document.getElementById("tajuk").value  = slider3.tajuk; 
            document.getElementById("content").innerHTML  = slider3.content;
            document.getElementsByClassName('tunjukGambar')[0].children[1].innerText = "Gambar 3"
          }
    }





    function runInterface(li_num){


    // $('.iscroll-interface li').get(li_num).click(()=>{
            if(li_num == 0)
                 HeaderInterface();
            if(li_num == 1)
               BeritaInterface();
            if(li_num == 2)
               UsahaKamiInterface();
            if(li_num == 3)
               ContactFooterInterface();
            
            
            
    // });

    }





function HeaderInterface()
{

        //$.get("/header", function(response){

       // $('#testhtml').html(response);

               setTimeout(()=>{

                     $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                    });


                     var StoreHeaderForm = $('form#StoreHeader');
                     //StoreHeaderForm.append('globalNumber',globalNumber);
                     StoreHeaderForm.submit(function(event){
                        console.log( $("textarea#content").val() );

                        document.getElementsByClassName('toastr-loading')[0].style.cssText = "top:10px; opacity:1";
                         
                         var form = new FormData(this);
                         event.preventDefault();
                        //alert(globalNumber);
                         var promiseAjax = $.ajax({
                            type: 'post', //StoreHeaderForm.attr('method'),
                            url: StoreHeaderForm.attr('action'),
                            data: form,
                            //dataType: "json",
                            cache: false,
                            contentType: false,
                            processData: false,
                         });

                         promiseAjax
                           .done((data)=>{
                               
                                if(data.hasOwnProperty("errors")){
                                    console.log("pls errors show! fire icon bootstrap");
                                    console.log(data.errors);
                                }
                                else if(data[0].hasOwnProperty("id"))
                                {
                                    console.log('id is defined!');
                                    datata(data);
                                    
                                }
                                
                                
                                console.log('always..');
                                console.log(data);
                            });


                        
                    });

                },800);

        //}); 

}

function datata(data)
{
                                slider1.tajuk = data[0].tajuk,slider1.content = data[0].content,slider1.gambar = data[0].gambar;
                                slider2.tajuk = data[1].tajuk,slider2.content = data[1].content,slider2.gambar = data[1].gambar;
                                 slider3.tajuk = data[2].tajuk,slider3.content = data[2].content,slider3.gambar = data[2].gambar;
                                
                                                    //alert(globalNumber);
                                setTimeout(()=>{
                                    document.getElementsByClassName('toastr-loading')[0].style.cssText = "top:0px; opacity:0";
                                    document.getElementsByClassName('toastr-complete')[0].style.cssText = "top:10px; opacity:1";
                                    setTimeout(()=>{
                                        document.getElementsByClassName('toastr-complete')[0].style.cssText = "top:0px; opacity:0";
                                    },1000);        
                                },500);
                                                    
                                TunjukGambar(globalNumber);
}


setTimeout(()=>{

 document.querySelector('#delete-complete') != null ? toastrDelete() : console.log("no toastr");
 document.querySelector('#create-complete') != null ? toastrCreate() : console.log("no toastr");
 document.querySelector('#general-complete') != null ? toastrComplete() : console.log("no toastr");

},400);


function toastrComplete()
{

  window.scrollTo(0,document.getElementById('new_berita').getBoundingClientRect().top-10);
  setTimeout(()=>{
  document.getElementsByClassName('toastr-complete')[0].style.cssText = "top:10px; opacity:1";
     setTimeout(()=>{
             document.getElementsByClassName('toastr-complete')[0].style.cssText = "top:0px; opacity:0";
      },1000);        
  },100);

}


function toastrCreate()
{
  //window.scrollTo(0,0);
  window.scrollTo(0,document.getElementById('new_berita').getBoundingClientRect().top-10);
  setTimeout(()=>{
  document.getElementsByClassName('toastr-create')[0].style.cssText = "top:10px; opacity:1";
     setTimeout(()=>{
             document.getElementsByClassName('toastr-create')[0].style.cssText = "top:0px; opacity:0";
      },1000);        
  },100);

}


function toastrDelete()
{
  //window.scrollTo(0,0);
  window.scrollTo(0,document.getElementById('new_berita').getBoundingClientRect().top-10);
  setTimeout(()=>{
  document.getElementsByClassName('toastr-delete')[0].style.cssText = "top:10px; opacity:1";
     setTimeout(()=>{
             document.getElementsByClassName('toastr-delete')[0].style.cssText = "top:0px; opacity:0";
      },1000);        
  },100);

}

function BeritaInterface(){
    console.log("supp B");
}

function UsahaKamiInterface(){
    console.log("supp U");
}

function ContactFooterInterface()
{
    console.log("supp C");
}


</script>
