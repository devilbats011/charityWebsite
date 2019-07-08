<!DOCTYPE html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
body{position: relative;}
  .interface{
    display: flex;
    justify-content: center;
    width: 100%;
    height: 100%;
    padding-top:100px;
  }
  .interface section
  {

    width: 30%;
    height: 30%;
    border:2px solid darkseagreen;
    padding:10px 0 10px 0;
    
   
  }
  .interface section *
  {
    
    width: 220px;
    margin:auto;
    text-align: justify-all;
  }
  .interface h2
  {
    text-align: center;
  }
</style>
</head>

<body>

    <main class="interface">
      
       <section>

            <h2> Lorum brooo</h2>

            <p>We will use Twitter bootstrap to do some fancy styling for the user interface. Even though we only need one html page for all the functionality, we will take advantage of Laravel blade partials to breakdown the code into small manageable parts</p>
        </section>

       <section>
            <h2> Lorum brooo</h2>
            
            <p>We will use Twitter bootstrap to do some fancy styling for the user interface. Even though we only need one html page for all the functionality, we will take advantage of Laravel blade partials to breakdown the code into small manageable parts</p>
        </section>

       <section>
            <h2> Lorum brooo</h2>

            <p>We will use Twitter bootstrap to do some fancy styling for the user interface. Even though we only need one html page for all the functionality, we will take advantage of Laravel blade partials to breakdown the code into small manageable parts</p>
        </section>
    </main>

</body>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous">
  </script>

<script>
$(document).ready(function() {

          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          }); //for type:'GET' DONT NEED CSRF-TOKEN ...type:'POST' NEED THIS


       /*
        ---this works!
          $.get("/sandbox/dummypost", function(data){
           console.log(data);
         }); 
        ---
         */

     var promiseAjax = $.ajax({
            type: 'GET',
            url: '/sandbox/dummypost',
            dataType: 'json' //datatype --> nk terima datatype dlm bentuk apa,json ke html ke, xml ke,,...etc2
        });

     promiseAjax
       .done((data)=>{
        console.log('done or success!');
        let varx = data;
        console.log(typeof data);
        console.log(data);
        console.log(data.helloWorld);
          
        })
       .fail(function(data ) {
          console.log( "error" );
          console.log(data);
        })
      /* .always(function() {
          console.log( "always complete" );
        }); */


});

</script>
