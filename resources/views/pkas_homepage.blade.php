<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{ asset('/css/homepage.css') }}"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PKAS Homepage</title>
    </head>
<body>

  <main style="overflow-x: hidden;width:100vw;">
<!-- position fixed start -->


			<article id="infaq_Form"  style="display: none;top:150%;">
				<div onclick="InfaqForm()"></div>
				<span class="glyphicon glyphicon-remove" onclick="InfaqForm()"></span>
				<section class="braintree" >
                <h3> Infaq/donate ( US dollar )</h3> 
                <form action="{{route('infaq')}}" method="post" onsubmit="return validateForm()" >
                  @csrf
                    <input type="text" name="money" value="10" id="money">
                     <button type="submit" style="
                      border: 1px solid black;
                      color: black;
                      background: white;
                      padding: 0.3rem 2rem;
                      letter-spacing: 1px;
                      font-weight: bold;
                      " > Infaq </button>
                </form>
  
        </section>



			</article>



<!-- position fixed end -->

    	<header id="header">	
            <div id="smokescreen"></div>
             <figure>     <!-- slider1-->   </figure> <figure> <!-- slider2-->  </figure><figure> <!-- slider3--> </figure>
             <span class="arrowLeft glyphicon glyphicon-chevron-left" onclick="plusSlides(-1)" > </span>
             <span class="arrowRight glyphicon glyphicon-chevron-right" onclick="plusSlides(1)" > </span>
             <section class="dots_panel" >
             <button onclick="currentSlide(1)" ></button>
             <button onclick="currentSlide(2)" ></button>
             <button onclick="currentSlide(3)" ></button>
             </section >
    		<nav id="head_nav">
          <nav id="hamburger">
              <button onclick="hamburger_toggle()" >
                  <nav>
                  </nav>
                  <nav>
                  </nav>
                  <nav>
                  </nav>
              </button>
          </nav>
    			<div class="div-toggle-off" id="hamburger-toggle">
    				 <a href="{{route('homepage')}}" > Logo</a>
    				<a> Siapa Kami  <span class="glyphicon glyphicon-chevron-up"></span>
    				 <div>
    					<article style="border-right:1px solid white;"> lorum plrums</article>
    						<article style="border-right:1px solid white;"> lorum plrums</article>

    						<article> lorum plrums</article>
    				</div>
    			    </a>

    				<a></a>
    				<a  >Contact</a>
    				<a onclick="InfaqForm()" > Infaq </a>

    			</div>
    		</nav>

    		<div id="TEXT_IMAGE">
    		<h2><!--PERSATUAN KEBAJIKAN AnNAJAH SELANGOR AnNajah Comunnity --> {{$sliders[0]->tajuk}}  </h2>
    		<h3>
                {{$sliders[0]->content}} 
        
                
            </h3>
    		<br>
    		<!--<p>"Serulah ke jalan Tuhanmu dengan hikmah kebijaksanaan dan nasihat yang baik dan berbahaslah dengan mereka dengan cara yang lebih baik."
            ~ Quran 16:125 ~</p> -->

    		</div>
       

    	</header>


    	<div id="berita_wrapper">
    		<main id="berita_text_container">
    				<h1> Berita </h1>
    		</main>
           
    		<main id="berita_container">
                 @foreach($beritas as $b)
    			<div>
                
            <section>
             @if($b->gambar1 != null)     
                <img src="{{url($b->gambar1)}}"> </img>
            @else
                 <img src="https://upload.wikimedia.org/wikipedia/commons/f/fc/No_picture_available.png"> </img>

            @endif
             </section>
    				<section> 
                <h4 style="font-weight: bold;text-align: center;">{{$b->tajuk}}</h4>
              <p> <?php echo strlen($b->content) > 149 ?  substr($b->content,0,150)."..." : $b->content ?> 
              </section>
    				<section>
                        <a href="{{route('pkasberita',['id' => $b->id])}}" >
    				      Baca Lagi<i class='fas fa-angle-left'></i>
    			         </a>
                    </section>
                </div>
            @endforeach
            </main>
            <main id="berita_text_container">

                     {{ $beritas->links() }}
            </main>
    	</div>



    <!--	<div id="usaha_kami_wrapper">
    		<main id="usaha_kami_text_container">
    				<h1> Usaha Kami </h1>
    		</main>
    		<main id="usaha_kami_container">
                @foreach($usahakamis as $u)
    			<div><section> <img src="{{$u->gambar}}" alt=""></section>
    				<section><p>{{$u->content}}</p> </section>
    				<section> <a href="" >
    				Baca Lagi<i class='fas fa-angle-left'></i>
    			  </a></section> </div> 
                @endforeach
    		</main>
    	</div> -->

    	<div id="infaq_click_bait">
    		<h1> <span>“Rasulullah SAW adalah orang yang paling dermawan. Dan baginda lebih dermawan lagi di bulan Ramadan"</span><br><br>
Hadis Riwayat Bukhari</h1><br>
			<h2><button onclick="InfaqForm()" style="font-size: 26px;" >INFAQ <i class="fa fa-gratipay" style="font-size:36px;transform: translateY(3px);"></i> </button></h2>
			<br>


    	</div>

    	<footer id="hubung_kami_grid">
    			<div class="item item_a">
    				<h2>PERTUBUHAN KEBAJIKAN AN-NAJAH SELANGOR (PKAS)</h2>
				</div>
    			<div class="item item_b">
    				<h3>Sebuah organisasi berdaftar di bawah Jabatan Perdana Menteri (PPAB-14/2012) sebagai pusat dakwah dan sokongan mualaf.</h3>
    			</div>
    			<div class="item item_c">
    				<a href="#"><i class="fa fa-twitter" style="font-size:36px"></i></a>
    				<a href="#"><i class="fa fa-facebook" style="font-size:36px"></i></a>
    				<a href="#"><i class="fa fa-instagram" style="font-size:36px"></i></a>
    			</div>
    			<div class="item item_d">
    				<h2>MAKLUMAT SUMBANGAN</h2>
    			</div>
    			<div class="item item_e">
    				<section onclick="DisplayBankInfo(1)" >
    				<h3 >Maybank Islamic Berhad </h3>  <i class="glyphicon glyphicon-plus"></i> 
    				</section>
    				<p>-----------------------</p>
    				<section onclick="DisplayBankInfo(3)" >
    				<h3  >CitiBank Berhad &nbsp  </h3> <i class="glyphicon glyphicon-plus"></i>
    				</section>
    				<p>-----------------------</p>
    				<section onclick="DisplayBankInfo(5)" >
    				<h3  >Basnk Islam &nbsp  </h3> <i class="glyphicon glyphicon-plus"></i>
    				</section>
    				<p >-----------------------</p>
    			</div>
    			<div class="item item_f">
    				<h2>HUBUNGI KAMI</h2>
    			</div>
    			<div class="item item_g">
    				<h3>Lot 300.3, Lorong Selangor, Pusat Bandar Melawati, KL</h3>
    				<h3>03-4108 9669</h3>
    				<h3>03-4108 9669</h3>
    				<h3>info@hcf.org.my</h3>
    				<h3></h3>
    			</div>
    			<div class="item item_h"><p><i>Powered by</i> NightStorm</p></div>
    	</footer>
        <?php //echo dd() ?>

</main>
 </body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
   crossorigin="anonymous">
    /*jquery cdn*/
</script> 

<script>
    
    function hamburger_toggle()
    {
      var toggle = document.getElementById('hamburger-toggle');
      toggle.classList.contains('div-toggle-off')? toggle.className ='div-toggle-on' : toggle.className ='div-toggle-off'; 
    }
    

    const slider =  
    {
        sliderid:[0,1,2],
        gambar:[`<?php echo $sliders[0]->gambar ?>`,`{{$sliders[1]->gambar}}`,`{{$sliders[2]->gambar}}`],
        tajuk:[`{{$sliders[0]->tajuk}}`,`{{$sliders[1]->tajuk}}`,`{{$sliders[2]->tajuk}}`],
        content:[unescapeHtml(`{{$sliders[0]->content}}`),unescapeHtml(`{{$sliders[1]->content}}`),unescapeHtml(`{{$sliders[2]->content}}`)],
    };

    

function escapeHtml(text) {
  return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "#039;");
}

function unescapeHtml(text) {
  return text
      .replace(/&amp;/g, "&")
      .replace(/&lt;/g, "<")
      .replace(/&gt;/g, ">")
      .replace(/&quot;/g, `"`)
      .replace(/&#039;/g, "'");
}


</script>
<script src="{{ asset('/js/adminguard.js') }}" > </script>
<script src="{{ asset('/js/homeslider.js') }}" > </script>
<script>
		
	 const bankNameArray = Array.from(document.getElementsByClassName('item_e')[0].children);
	 const infaqForm = document.getElementById('infaq_Form');
     bankNameArray[0].children[0].innerText = `{{$bankinfos[0]->bankname}}`;
     bankNameArray[1].innerText = `{{$bankinfos[0]->bankaccount}}`; //$bankinfos[0]->bankname

     bankNameArray[2].children[0].innerText = `{{$bankinfos[1]->bankname}}`;
     bankNameArray[3].innerText = `{{$bankinfos[1]->bankaccount}}`; 

     bankNameArray[4].children[0].innerText = `{{$bankinfos[2]->bankname}}`;
     bankNameArray[5].innerText = `{{$bankinfos[2]->bankaccount}}`; 

     document.getElementsByClassName('item_g')[0].children[3].innerText =  `{{$cf[0]->address}}`; 
     document.getElementsByClassName('item_g')[0].children[2].innerText =  `{{$cf[0]->contactnumber}}`; 
     document.getElementsByClassName('item_g')[0].children[1].innerText =  `{{$cf[0]->other1}}`; 
     document.getElementsByClassName('item_g')[0].children[0].innerText =  `{{$cf[0]->other2}}`; 
	 //const infaq_button = document.getElementById('infaq_click_bait').getElementsByTagName('h2')[0].children[0];
	 
	 function InfaqForm()
	 {
	 	//console.log('b');
	 	if(infaqForm.style.display == "none"){
	 		infaqForm.style.display = "grid";
	 		setTimeout( () => { 
	 			infaqForm.style.top = null; 
	 		},200);
	 		
	 	}
	 	else
	 	{
	 		infaqForm.style.display = "none";
	 		infaqForm.style.top = "150%";
	 	}

	 }


	 function DisplayBankInfo(index)
	 {
	 	var item = bankNameArray[index];
	 	(item.style.height=="22px")? item.style.height = null : item.style.height ="22px";

	 }



</script>
<script>
  function validateForm() {
        var str = document.getElementById("money").value;
        //alert("rvgrs");
       // var re = new RegExp("^\d+$|^\d+.\d{1,2}$");
      var patt =  /^[0-9]{1,5}$|^[0-9]{1,5}\.[0-9]{1,2}$/g;
      var result = str.match(patt);
      if(result == null)
      {
        alert("Allow Digits or  Up to 5 Digits Only ");
        return false;
      }
      else
      {
         console.log(result);
         
      }

  }
</script>