@extends('layouts.others')
@section('interface')
      <main class="min100-container pkascontainer1">
          
        <div>
          <!--<img src="https://www.striker.id/wp-content/uploads/2019/01/73766.jpg" alt="skopped!"> -->
             @if($beritas->gambar1 != null)     
                <img src="{{url($beritas->gambar1)}}"> </img>
            @else
                 <img src="https://upload.wikimedia.org/wikipedia/commons/f/fc/No_picture_available.png"> </img>

            @endif
            <section class="wrapper">
             <h1>{{$beritas->tajuk}}</h1>

           <!--  <span> Selangor | May 17, 2019 </span> -->
            <p>
            @if($beritas ==  null)
                Whoops! No News Yet, sorry buddy.
            @else
              @if($beritas->text1 == '')
                   eeHHmm yup! No News Yet, sorry buddy.
              @else
                {{$beritas->text1}}        
              @endif
            @endif
             </p> 

           </section>
              <br>
        </div>

      </main>
@endsection