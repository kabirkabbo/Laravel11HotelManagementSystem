<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
      
       

       .div_deg{
           display: flex;
           justify-content: center;
           align-items: center;
           margin-top: 15px;
       }


       .table_deg{
           border: 2px solid greenyellow;
         
       }

       
       th{

        background-color:skyblue ;

        padding: 10px;
        font-size: 15px;
        font-weight: bold;
        color: white;
       }

       td{

        color: white;
        padding :10px;
        border: 1px solid skyblue; 
       }

    </style>
  </head>
  <body>
    @include('admin.header')



    @include('admin.sidebar')
    
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">


             <div  class="div_deg">

             <table class="table_deg">

              <tr>
                
              <th>Room Id</th>
              <th>Customer Name</th>  
              <th>Email</th>
              <th>Phone </th>
              <th>Arrival Date</th>
              <th>Leaving Date</th>
              <th>Room Title</th>
              <th>Price</th>
              <th>Image</th>
              <th>Payment Status</th>
              <th>Delete</th>

              </tr>

              <tr>
                
              @foreach($data as $data)

                <td>{{$data->room_id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->start_date}}</td>
                <td>{{$data->end_date}}</td>
                <td>{{$data->room->room_title}}</td>
                <td>{{$data->room->price}}</td>
                <td>
                   <img style="width: 80px;"  src="room/{{$data->room->image}}">
                </td>
               <td>

                 @if($data->payment_status=='paid')

                  <span style="color:skyblue;">{{$data->payment_status}}</span>

                 @elseif($data->payment_status=='unpaid')

                    <span style="color:red;">{{$data->payment_status}}</span>

                 @endif
               </td>             
               <td>
                   <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_booking',$data->id)}}">Delete</a>
               </td>

              </tr>

              @endforeach
            
             </table>



     </div>

            
          </div>    
        </div>
      </div>

      @include('admin.footer')
   
  </body>

</html>