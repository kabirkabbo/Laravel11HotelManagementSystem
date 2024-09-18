<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Room;

use App\Models\Booking;

use App\Models\Contact;

use App\Models\Galary;

use Notification;

use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    
    public function index()
    {

   
      return view('admin.index');
     
    
    }

     public function create_room()
     {

       return view('admin.create_room');
     }

    public function add_room(Request $request)
     {
       $data = new Room;

       $data->room_title=$request->title;
       $data->description=$request->description;
       $data->price=$request->price;
       $data->wifi=$request->wifi;
       $data->room_type=$request->type;
       
        $image=$request->image;
          if($image)
          {

            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('room',$imagename);
            $data->image = $imagename;

          }

       $data->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Room Added Successfully');

       return redirect('view_room');

       
     }

     public function view_room()
     {

      $data=Room::all();

       return view('admin.view_room',compact('data'));
     }

      
     public function room_delete($id)
     {

      $data=Room::find($id);
      $data->delete();

       toastr()->timeOut(5000)->closeButton()->addSuccess('Room  Deleted Successfully');

       return redirect()->back();

       
     }
     public function room_update($id)
     {
        $data=Room::find($id);

        return view('admin.update_room',compact('data'));
     }


     public function edit_room(Request   $request,$id)
    {
      $data=Room::find($id);
      $data->room_title=$request->title;
      $data->description=$request->description;
      $data->price=$request->price;
      $data->wifi=$request->wifi;
      $data->room_type=$request->type;

      $image=$request->image;
      if($image)
      {

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('room',    $imagename);
        $data->image = $imagename;

      }
      $data->save();

       toastr()->timeOut(5000)->closeButton()->addSuccess('Room  Edited Successfully');


      return redirect('view_room');
    }

    public function  bookings()
    {

      $data=Booking::all();

      return view('admin.booking',compact('data'));
    }

    public function delete_booking($id)
    {

      $data = Booking::find($id);

      $data->delete();

       toastr()->timeOut(5000)->closeButton()->addSuccess('Booking Deleted Successfully');

        return redirect()->back();

    }

    public function approve_booking($id)
     {
      $booking=Booking::find($id);
      $booking->status='approve';
      $booking->save();
      return redirect()->back();
     }

     public function reject_booking($id)
     {
      $data=Booking::find($id);
      $data->status='rejected';
      $data->save();
      return redirect()->back();
     }

     public function  view_gallary()
     {

      $gallary = Galary::all();

      return view('admin.gallary',compact('gallary'));
     }

     public function  upload_gallary(Request $request)
     {
        $data = new Galary;

        $image = $request->image;

         if($image)
      {

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('gallary', $imagename);

        $data->image = $imagename;

        $data->save();

        return redirect()->back();

      }
      
     }

     public function delete_gallary($id)
     {

      $data = Galary::find($id);

      $data->delete();

      toastr()->timeOut(5000)->closeButton()->addSuccess('Image Deleted Successfully');

      return redirect()->back();

     }


     public function  all_messages()
    {

      $data=Contact::all();

      return view('admin.all_messages',compact('data'));
    }

    public function  send_mail($id)
    {

      $data=Contact::find($id);

      return view('admin.send_mail',compact('data'));
    }

    public function  mail(Request   $request, $id)
    {

      $data=Contact::find($id);

      $details = [

          'greeting' => $request->greeting,

          'body' => $request->body,

          'action_text' => $request->action_text,

          'action_url' => $request->action_url,

          'endline' => $request->endline,

      ];

      Notification::send($data,new SendEmailNotification($details));

       toastr()->timeOut(5000)->closeButton()->addSuccess('Mail Sended Successfully');

      return redirect()->back();
    }

     

}
