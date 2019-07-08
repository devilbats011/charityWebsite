<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{ asset('/css/homepage.css') }}"/>
<link rel="stylesheet" href="{{ asset('/css/others.css') }}"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>PKAS Homepage</title>
    </head>
<body>
<!-- position fixed start -->

  <!--<div style="" class="deleteBox">
      <p><b>Are Your Sure? </b></p>
       <div> <button style="background:red;border-radius:4px"> DELETE</button> <button style="border-radius:4px"> CANCEL</button></div>
  </div>-->

      <p id="errors" style="z-index:-20;pointer-events: none;position: fixed;opacity: 0;">{!! session()->get('errors') !!}</p>


<!-- position fixed end -->

      <header id="header" style="height: auto;">  

        <nav id="head_nav" >

          <div>
             <a> Logo</a>
            <a> Siapa Kami  <span class="glyphicon glyphicon-chevron-up"></span>
             <div>
              <article style="border-right:1px solid white;"> lorum plrums</article>
                <article style="border-right:1px solid white;"> lorum plrums</article>

                <article> lorum plrums</article>
            </div>
              </a>
            <a></a>

            <a  >Contact </a>
            <a onclick="InfaqForm()" > Infaq </a>

          </div>
        </nav>

        <article id="infaq_Form"  style="display: none;top:150%;">
        <div onclick="InfaqForm()"></div>
        <span class="glyphicon glyphicon-remove" onclick="InfaqForm()"></span>
        <div class="item_a"> </div>
        <div class="item_b"> </div>
        <div class="item_c"> </div>
        <div class="item_d"> </div>
        </article>

      </header>
      <main class="min100-container pkascontainer1">
          
        <div style="margin-bottom:-15px;border:0px solid transparent;box-shadow: 0px 0px 0px transparent;color:white;letter-spacing: 4px"> <h2 style="" >EDIT BERITA</h2></div>
        <div>
         <!-- <img src="https://www.striker.id/wp-content/uploads/2019/01/73766.jpg" alt="skopped!" id="prime-img"> 
            <section class="wrapper">-->

            <?php //echo $beritas[0]->content ?>
           <!-- <form action="route('testpost')" method="post" accept-charset="utf-8" > csrf_field() <input type="submit" value="submit"  style="color:black;" ></form> -->
           <main style="position: relative;width: 100%;"><button style="position: absolute;right: 10px;padding:5px 10px" onclick="RefreshPopOut()"  class='btnAppend' >Refresh</button></main>
          <p><form id="editForm" enctype="multipart/form-data" method="post" action="{{route('testpost')}}" style="color:black;" >
                {{ csrf_field() }} <!-- cross site request forgery -->
                <br>
          <!--  <section id="section-prime-gambar">
             <input type="file" style="color:white;transition: 1s linear;" name="prime-gambar" id="prime-gambar" onchange="loadFile(event,'prime-img',this)"  >
           </section> -->

             <input type="text" value="{{$beritas[0]->tajuk }}" style="width:50%;" name="tajuk" id="tajuk" > <font color="white">TAJUK </font>
            <p class="tajuk"> </p>
            <br>
            <!-- <input type="text" value="" style="width:50%;" name="date" id="date" > <font color="white"> DATE</font>-->
             <!--<span> Selangor | May 17, 2019 | Tajuk Penguat kata! </span> -->
                <!--<span style="display:block;cursor: pointer;position: relative;top:5px;margin-top:10px;" ><i class="material-icons" style="background: red;border-radius:50%;">cancel</i></span>

                <textarea  style="width:100%;color:black;display:block;height:300px;margin-top:5px;"  id="prime-textarea" name="prime-textarea" >Type Something New Prime textarea</textarea>
                -->

                 <main id="appendMe">
                 </main>  
                 <button type="submit" class="btnAppend"style="margin:10px 0px;padding:6px 15px 5px 10px;" ><i class="glyphicon glyphicon-pencil"></i> COMMIT </button>    
             
                </form>

                 <br>
             <section>
                <button onclick="AppendTextarea()" class="btnAppend" > &nbsp <i class="glyphicon glyphicon-plus"></i>  Text Area &nbsp</button>
                <button onclick="AppendGambar()" class="btnAppend" > &nbsp <i class="glyphicon glyphicon-plus"></i> Gambar &nbsp</button>
              </section> 
              </p> 

           </section>
              <br>
        </div>

      </main>



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


 </body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
   crossorigin="anonymous">
    /*jquery cdn*/
</script> 

<script>

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

   DisplayBankInfo(1);
   function DisplayBankInfo(index)
   {
    var item = bankNameArray[index];
    (item.style.height=="22px")? item.style.height = null : item.style.height ="22px";

   }



</script>



<script>
  $(`#prime-textarea`).on('keyup', function(){
          localStorage.setItem(`#prime-textarea`, $(`#prime-textarea`).val() );

          console.log(localStorage.getItem(`#prime-textarea`));
  });

if(document.getElementById('prime-textarea') != null)
document.getElementById('prime-textarea').innerText = localStorage.getItem(`#prime-textarea`) == null ? "NULL" : localStorage.getItem(`#prime-textarea`);

//---------------------------------------------------------------------------------------------------


let persistentstack = new Array();

function ConvertNewLineToBr(text)
{
 return text.replace(/(?:\r\n|\r|\n)/g, '<br>');
}

function br2nl(str) {
    return str.replace(/<br>/mg,"\n");
}

  var contentArray = "";

   if(localStorage.persistentstack != null)
   {
    console.log(`localStorage.persistentstack is not null.`);
    //if(typeof persistentstack == 'string'){
    //  console.log('persistentstack is a string');}
    contentArray = localStorage.persistentstack;
    //console.log(contentArray);
    contentArray = ConvertNewLineToBr(contentArray);
    persistentstack = JSON.parse(contentArray); 
    //console.log(persistentstack);
    RememberManager(persistentstack);

   }
   else
   {



    fetch('/getContentArray') // Call the fetch function passing the url of the API as a parameter
      .then(function(response) {
        return response.json();
      })
      .then(function(JsonData) {
        console.log(JsonData);
        contentArray =  JsonData;


        if(contentArray.hasOwnProperty('nothing') )
        {
          console.log(contentArray['nothing']);
          console.log('Go Make New Berita :)');

        }
       else if(!contentArray.hasOwnProperty('nothing'))
       {
          console.log(`persistentstack array = contentArray from db!`);
          //console.log(JsonData);
          contentArray = JSON.stringify(JsonData);
          contentArray = ConvertNewLineToBr(contentArray);
         // localStorage.clear();
         // return false;
          localStorage.persistentstack = contentArray;
          //console.log(localStorage.persistentstack);
         // var contentArrayx = JSON.stringify(contentArray);
           
          var contentArrayx = JSON.parse(contentArray);
          persistentstack = contentArrayx;
          RememberManager(persistentstack,"db");
       }


    });

   }


function form(){
  var form = document.getElementsByTagName('form')[0];
  //console.log(form);
  form.addEventListener("submit", (event) =>{

    var PromiseForm = new Promise((resolve, reject) =>
    {
     event.preventDefault();
     //localStorage.clear();
      trigger = "isNotEmpty!";//validateInputFile();
      console.log(trigger);
      //console.log("submit preventDefault");
      if(trigger != "isEmpty!")
         form.submit();
      resolve();
    });
    PromiseForm.then(()=>{
      console.log("resolved");

   });
      
  }, true);
}

form();

function RememberManager (pstack,server = "client")
{
  //console.log(pstack[10]);
  var value="";//string
  //------------------------
  pstack.forEach((item,i)=> {
    item
    if(server == "db")
    {
      value = (!item.hasOwnProperty('value') )? "Type Something New!" : item.value;
      RememberAppendElements(value,item.type,item.id);
    }
    else if(server ==  "client")
    {
      value = (!item.hasOwnProperty('value') )? "Type Something New!" : item.value;
      RememberAppendElements(value,item.type,item.id);
      //value = (localStorage.getItem(`#textarea-${i}`) == null)? "Type Something New!" : localStorage.getItem(`#textarea-${i}`);
     // RememberAppendElements(value,item.type);
    }
  });
  //------------------------
}

function RememberAppendElements(localvalue,type,id)
{
    
      if(type == 'vanillatext')
      { AppendTextarea(true,localvalue,id) }
      else if(type == 'chocolatefile')
      { AppendGambar(true,id,localvalue); }
      else
      {  console.log(item); console.log("<-- ( this is other than vanilla or chocolate )") }
    
}

var loadFile = function(event,id,input) {
        console.log(input);
       // console.log(input.nextSibling);
        if(input.nextSibling != null){ input.nextSibling.remove() ;console.log("we remove input nextsibling");}

  var ChangeImage = new Promise(
    function (resolve, reject) {
        var image = document.getElementById(id);
        image.src = URL.createObjectURL(event.target.files[0]);

        if(image.src != undefined || image != null)
        {
            resolve(image); // fulfilled
        }
        else {
            reject(); // reject
        }

    }
  );

  ChangeImage.then((data)=>{
        //ImgToCanvasConverter(data);
        //console.log("Resolved Entered");
  }
  ).catch(function () {
            
            console.log("Rejected!");
  });

};

var ImgToCanvasConverter = (imgElement)=>
{
  //...this function is not working..
    var elephant = imgElement;
    var imgCanvas = document.createElement("canvas"),
        imgContext = imgCanvas.getContext("2d");

    // Make sure canvas is as big as the picture
    imgCanvas.width = elephant.width;
    imgCanvas.height = elephant.height;

    // Draw image into canvas element
    imgContext.drawImage(elephant, 0, 0, elephant.width, elephant.height);

    // Get canvas contents as a data URL
    var imgAsDataURL = imgCanvas.toDataURL("image/png");
    //document.getElementsByTagName('img')[0].setAttribute("src", `${imgAsDataURL}`);
    // Save image into localStorage
    try {

       localStorage.setItem("imgTest", imgAsDataURL);
    }
    catch (e) {
        console.log("Storage failed: " + e);
    }
    //this is need to be fixed...this function is not working..
}



function AppendGambar(repeat = false,id = null,value ="storage/download_img/no_image.png")
{

  //var input = document.createElement("input");
  var section = document.createElement("section");
  var appendMe = document.getElementById('appendMe');
  var count = appendMe.childElementCount;
  var UniqueNum =  id==null ? count : parseInt(id.match(/\d+/g));

  //console.log("parse! -> "+ parseInt(id.match(/\d+/g)) );
  section.setAttribute('id',`section-gambar-${UniqueNum}`);
  section.setAttribute('style','position:relative;margin:10px 0px;');
  console.log(value); 
  var elements =
  `<img src="${value}" id="img-${UniqueNum}" class="image" nama="img-${UniqueNum}" alt="img-${UniqueNum}"  >
  
  <span style='display:block;cursor: pointer;position: absolute;top:10px;left:10px;margin-top:0px;background: red;border-radius:50%;;width:24px;height:24px;z-index:2;' onclick="DeleteboxPopOut('#section-gambar-${UniqueNum}');" > <i class="material-icons" >cancel</i></span>
   <p class="gambar-${UniqueNum}" style="font-size:small;margin-top: 0px;position: absolute;bottom: 20px;left: 35px;pointer-events: none;" ></p>
   <input style="display:block;cursor: pointer;position: relative;top:5px;color:white;width:195px;transition:1s linear;" id="gambar-${UniqueNum}" name="gambar-${UniqueNum}" class="AppendGambar" type="file" onchange="loadFile(event,'img-${UniqueNum}',this)" >
  
   `;
  section.innerHTML = elements;


  if(count == 0)
  {
   appendMe.appendChild(section);
  }
  else{
    // appendMe.appendChild(cancelelement);
     appendMe.children[count-1].after(section);
   }

      if(!repeat)
      {
        persistentstack.forEach((item)=>{
          item.id  !=  `#section-gambar-${count}` ? console.log("no duplicate id found") : count=count+7;  

        });

        persistentstack.push({id:`#section-gambar-${count}`,type:`chocolatefile`,value:`storage/download_img/no_image2.jpg`});
        var tempPstack = persistentstack; 
        tempPstack = JSON.stringify(tempPstack);
        tempPstack = ConvertNewLineToBr(tempPstack);
        localStorage.persistentstack = tempPstack;
      }
      else
      {
        persistentstack.forEach((item)=>{
          if(item.id  ==  `#section-gambar-${UniqueNum}` ) console.log("something");  

        });  
      }
  /*setTimeout(()=>
  {

      
      //localStorage.persistentstack = JSON.stringify(persistentstack);
       $(`#gambar-${count}`).on('change', function(){
            localStorage.setItem(`test`, JSON.stringify(input) );
            console.log("live change!");
            var test = localStorage.getItem(`test`);
            console.log(test);

      });

  } ,300);*/
  
      
}

function AppendTextarea(repeat = false,tempText = "Bismillah, Type Something Awesome !",id = null) {

  var section = document.createElement("section");
  var appendMe = document.getElementById('appendMe');
  
  var count = appendMe.childElementCount;
  var UniqueNum =  id==null ? count : parseInt(id.match(/\d+/g));
  section.setAttribute('id',`section-textarea-${UniqueNum}`);
  section.setAttribute('style','position:relative;');
  /*if(localStorage.persistentstack != null){ var tempText = value;//(localStorage.getItem(`#textarea-${count}`) == null)? "Type Something New!" : localStorage.getItem(`#textarea-${count}`);
  }else
  {  var tempText = value;//(!persistentstack[count].hasOwnProperty('value') )? "Type Something New!" : persistentstack[count].value;
  }*/

  tempText = br2nl(tempText);
  var elements =
  `<p class="textarea-${UniqueNum}" style="font-size:small;margin-top: 0px;position: absolute;top: 5px;left: 35px;pointer-events: none;" ></p>
  <span style='display:block;cursor: pointer;position: relative;top:5px;margin-top:30px;background: red;border-radius:50%;;height:24px;width:24px;' <i class="material-icons" style=";" onclick="DeleteboxPopOut('#section-textarea-${UniqueNum}');" >cancel</i></span>
   <textarea style="display:block;width:100%;color:black;margin:10px 0px;height:300px;transition:1s linear;" id="textarea-${UniqueNum}" name="textarea-${UniqueNum}" class="AppendGambar" type="text" id="textarea-${UniqueNum}" > ${tempText} </textarea>`;
   section.innerHTML = elements;


  count == 0 ? appendMe.appendChild(section) :  appendMe.children[count-1].after(section);

  setTimeout(()=>
  {
      if(!repeat){

        persistentstack.forEach((item)=>{
          item.id  !=  `#section-textarea-${count}` ? console.log("no duplicate id found") : count=count+7;  

        });
        console.log(count);

       persistentstack.push({id:`#section-textarea-${count}`,type:`vanillatext`,value:`${tempText}`});
       var index = persistentstack.length -1;
      // localStorage.persistentstack = JSON.stringify(persistentstack);
       //count start with 0
       $(`#textarea-${count}`).on('keyup', function(){
          persistentstack[index].value = ConvertNewLineToBr($(`#textarea-${count}`).val());
          localStorage.persistentstack = JSON.stringify(persistentstack);
          //console.log( persistentstack[index].value );
       });
     }
     else
     {
        var index = 0;
        persistentstack.forEach((item,i)=>{
          if(item.id  ==  `#section-textarea-${UniqueNum}`) {index =   i};  
          
        });
       $(`#textarea-${UniqueNum}`).on('keyup', function(){
          persistentstack[index].value = ConvertNewLineToBr($(`#textarea-${UniqueNum}`).val());
          localStorage.persistentstack = JSON.stringify(persistentstack);
          console.log( persistentstack[index].value );
       });


     }

  } ,300);

}


var errors ="";
 var tajuk = document.getElementsByClassName('tajuk')[0];
if(document.getElementById('errors').innerHTML == "")
{ errors = "clear";console.log(errors);}
else
{
    errors = document.getElementById('errors').innerHTML;
   console.log(JSON.parse(errors) );
   var es = JSON.parse(errors);
   es.forEach((e,i)=>{
    //  console.log(e); //{tajuk,content}

      for(var Keycontent in e){
        //  console.log(e[Keycontent]);

      if(i == 0)
      {
        setTimeout(()=>{
        window.scrollTo(0,0);
        window.scrollTo(0,document.getElementById(Keycontent).getBoundingClientRect().top-50);
        },500);

             document.getElementById(Keycontent).setAttribute('class','Glowing');
          
              setTimeout(()=>{ document.getElementById(Keycontent).setAttribute('class','DeGlowing'); },800);
      }

        if(Keycontent == 'tajuk'){
         
         tajuk.innerHTML = `<font color='red'><span class="glyphicon glyphicon-arrow-up"></span><span> ${e[Keycontent]} </span></font>`;
          
        }
        else
        {
          if(document.getElementsByClassName(Keycontent).length != 0)
          {
            document.getElementsByClassName(Keycontent)[0].innerHTML = `<font color='red'><span class="glyphicon glyphicon-arrow-down"></span><span> ${e[Keycontent]} </span></font>`;


          }
        }
      }
   });
  
  //window.scrollTo(0, 0);
  
        //window.scrollTo(0,tajuk.getBoundingClientRect());
}

function validateInputFile()
{
  
  var isEmpty ="";
  var inputs = Array.from(document.getElementsByTagName('input'));
  var FileInputs = new Array();
  inputs.forEach((input)=>{

  if(input.type == "file")
  {
    //console.log('is a file');
    if(input.files.length == 0)
    {
      (input.id == 'prime-gambar') ? console.log('skip|did not push') : FileInputs.push(input);
    }
    
  }

  });
  
  console.log(FileInputs);
  //FileInputs.shift();
  FileInputs.forEach((input,i)=>{

       
      if(input.nextSibling != null || input.nextSibling != undefined)
        input.nextSibling.remove();
      var p = document.createElement('p');
      p.setAttribute('style','color:#ff2f2f;font-size:small;transition:1s;');
      p.innerHTML= `<span class="glyphicon glyphicon-arrow-up"></span><span> Whoops, You Forget to fill this ! </span>`;
      input.after(p);
      input.setAttribute('class','Glowing');
      setTimeout(()=>{ input.setAttribute('class','DeGlowing'); },800);

      if(i == 0){
      window.scrollTo(0, 0);
      window.scrollTo(0,input.getBoundingClientRect().top-40);
      isEmpty = "isEmpty!";
      }
      

  });
  
  return isEmpty;

}


function Refresh()
{
  var promiseRefresh = new Promise((resolve, reject)=>
  {
    if(persistentstack == undefined)
    {
      console.log("removeElement item undefined");
       $('.deleteBox').remove();
      return false;
    }
    persistentstack.forEach((item,i)=>{
      $(item.id).remove();
      console.log(item.id);
    });
    localStorage.clear();
    $('.deleteBox').remove();
    resolve("resolvedRefresh!");

  });

  promiseRefresh.then((m) =>
  {
   document.location.reload(true);
    console.log(m);
  } );

}


function RefreshPopOut()
{
  var div = document.createElement("div");
  div.setAttribute('class','deleteBox');
  div.innerHTML = 
  `<p><b>Are Your Sure To Refresh ? You will be back at square one. </b></p>
  <div> <button style="background:red;border-radius:4px;border:1px solid black" onclick="Refresh()" > DELETE</button> <button style="border-radius:4px"  onclick="removeElement('.deleteBox')" > CANCEL</button></div>`;
  document.body.appendChild(div);
 // removeElement(something);
}


//DeleteboxPopOut();
function DeleteboxPopOut(something = "nuthing")
{
  var div = document.createElement("div");
  div.setAttribute('class','deleteBox');
  div.innerHTML = 
  `<p><b>Are Your Sure? </b></p>
  <div> <button style="background:red;border-radius:4px" onclick="removeElement('${something}')" > DELETE</button> <button style="border-radius:4px"  onclick="removeElement('.deleteBox')" > CANCEL</button></div>`;
  document.body.appendChild(div);
 // removeElement(something);
}

function removeElement(elementProp= "nuting to remove")
{
  console.log(elementProp);
  $res=$(elementProp).remove();
  if(elementProp == ".deleteBox")
    return false;

  if($res != undefined)
  {
    $('.deleteBox').remove();
    //alert('remove');
  }

persistentstack.forEach((item,index)=>{
    if(item == undefined)
    {
      console.log("removeElement item undefined");
      return false;
    }
    if(item.id == elementProp){
    persistentstack.splice(index, 1);

      localStorage.persistentstack = JSON.stringify(persistentstack);
      var ele = elementProp.replace(/section-/i,"");
      console.log(ele);

      localStorage.removeItem(ele);
    }
});

}

</script>


