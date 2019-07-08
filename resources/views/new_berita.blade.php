@extends('layouts.others')
@section('interface')
      <main class="min100-container pkascontainer1">
          
        <div>
          <img src="https://www.striker.id/wp-content/uploads/2019/01/73766.jpg" alt="skopped!"> 
            <section class="wrapper">
             

             <span> Selangor | May 17, 2019 </span>
             <form id="edit_form" enctype="multipart/form-data" action="{{route('post.new.berita')}}" method="post" style="color:black;padding:20px 0px" >
               @csrf
               <input type="file" onchange="setFileForm(this.files)" name="gambar-1" style="color:white" >
               <input id="tajuk" name="tajuk" value="" required ><br>
               <textarea name="text-1" required >  </textarea>
               <section id="appendMe">
                 
               </section>

               <button type="submit" id="btn-submit" > OMIT </button>
             </form>
             <button id="add-button"  onclick="add()" style="color:black"> ADD + </button>
             <script>
              setTimeout(()=>{
                 var count = document.getElementById('appendMe').getElementsByTagName('article').length;

                  if(count >= 2)
                  document.getElementById('add-button').remove();
              },500);

              var countAdd = 2;
              function add()
              {

                if(countAdd > 3 )
                { return false; }

                 var section = document.getElementById('appendMe');
                 var div = document.createElement("article");
                 div.innerHTML = 
                  `<input type="file" onchange="setFileForm(this.files)" name="gambar-${countAdd}" style='color:white' >
                   <textarea name="text-${countAdd}"> HELLO WORLD</textarea>
                 `;
                 section.appendChild(div);
                 countAdd++;


                if(countAdd > 3 )
                {  document.getElementById('add-button').remove();}

              }
              
              
              
              function setFileForm(yo)
              {
                //$('input[type=file]')[0]//(this.files
                //formData.append('tajuk',"GLorious thunderrr");
                formData.append('gambar', yo[0]);
                for(var pair of formData.entries()) {
                //   console.log(pair[0]+ ', '+ pair[1]); 
                }

              }

            function submitthissht(){
              var formData = new FormData();
                $("#edit_form").submit(function(e){
                    e.preventDefault();
                    console.log('prevented');
                });
                var err_count=  document.getElementsByClassName('errors').length;
                if(err_count > 0)
                {
                 var ers = Array.from(document.getElementsByClassName('errors'));
                 ers.forEach((item)=>{ item.remove()}); 
                }
               var count = document.getElementById('edit_form').getElementsByTagName('input').length;
               var ArrayFiles = Array.from(document.getElementById('edit_form').getElementsByTagName('input'));  
                var ArrayText = Array.from(document.getElementById('edit_form').getElementsByTagName('textarea')); 
               if( count > 0)
               {
                  ArrayText.forEach((item)=>{

                    /*  var err = document.createElement("p");
                      err.setAttribute('style','color:red');
                      err.setAttribute('class','errors');
                      err.innerText = `Error`;
                    if(item.value == '')
                    {
                      //error next to it
                      item.after(err);
                    }
                    */

                      if(item.value != ""){
                       formData.append( item.getAttribute('name'), item.value );
                       // console.log(`in`);
                      }

                      // console.log(`innerText`+item.value );
                      
                      
                  });

                  ArrayFiles.forEach((item)=>{
                    console.log(item);

                    if(item.files[0] != undefined)
                     formData.append( item.getAttribute('name'), item.files[0] );
                  });

                 for(var pair of formData.entries()) {
                    console.log(pair[0] + ', ' + pair[1]); 
                 }
               }

                
               /* $.ajaxSetup({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                var jinx =  $.ajax({
                url: $('form').get(0).getAttribute("method"),
                data: formData,
                type: 'POST',
                contentType: false, 
                processData: false, 
                });

                jinx.done(( msg )=> {
                  console.log( "Data Saved: " + msg );
                });

                */

            }

             </script>
            <p>
      
                         
             </p> 

           </section>
              <br>
        </div>

      </main>
@endsection

