<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Room;

use App\Models\Booking;

use App\Models\Contact;

use App\Models\Galary;

use Carbon\Carbon;

use Stripe;

use Session;

class HomeController extends Controller
{
    public function home()
    {
        $room = Room::all();

        $gallary = Galary::all();

        return view('home.index',compact('room','gallary'));
    }

    public function room_details($id)
    {
        $room = Room::find($id);

        return view('home.room_details',compact('room'));
    }
    public function add_booking(Request   $request,$id)
    {
        $request->validate([
           'startDate'=> 'required|date',
           'endDate'=> 'date|after:startDate',
        ]);
        $data = new Booking;

        $data->room_id = $id;

        $data->name = $request->name;

        $data->email = $request->email;

        $data->phone = $request->phone;

        $startDate = $request->startDate;

        $endDate = $request->endDate;

       
 
        $isBooked = Booking::where('room_id', $id)
        ->where('start_date','<=',$endDate)
        ->where('end_date','>=',$startDate)->exists();

        if($isBooked)
        {
            return redirect()->back()->with('message','Room is already booked please try different date');
        }
        
        else
        {

            $toDate = Carbon::parse($startDate);

            $fromDate = Carbon::parse($endDate);

            $value = $toDate->diffInDays($fromDate);

            $room = Room::find($id);

            $room_price = $room->price;

            $price = $room_price * $value;
           

            $data->start_date = $request->startDate;

            $data->end_date = $request->endDate; 

            $data->payment_status="paid";

            $data->save();

             return view('home.stripe',compact('price'));

        }

     
    }

    public function stripePost(Request $request,$price)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $price * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
      
       toastr()->timeOut(5000)->closeButton()->addSuccess('Payment Successful');
              
         return redirect('our_rooms');
    }

     public function contact(Request   $request)
    {
    
        $contact = new Contact;

        $contact->name = $request->name;

        $contact->email = $request->email;

        $contact->phone = $request->phone;

        $contact->message = $request->message;

        $contact->save();

         return redirect()->back();
    }

     public function our_rooms()
    {
       
        $room = Room::all();

        return view('home.our_rooms',compact('room'));
    }

     public function contact_us()
    {
       
      
        
        return view('home.contact_us');
    }




}
