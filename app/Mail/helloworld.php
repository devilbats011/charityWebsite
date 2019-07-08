<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use  App\registertoken;
use Illuminate\Support\Arr;
class helloworld extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $random = "";
        $array1 = ['Caramel', 'StrawberryCake', 'Vanilla', 'Chocolate', 'Redvellet','Blueberry','MangoCream'];
        $array2 = ['1','2' ,'3','4','5','6','7','8','9'];

        for ($i=0; $i < 7; $i++) { 
        $random.= Arr::random($array1).Arr::random($array2);
        }

        $tokenCreated = registertoken::create(['token' => $random]);
        
        return $this->view('emails.helloworld')->with('random',$random);
    }
}
