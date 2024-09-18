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
        padding: 15px;
        font-size: 20px;
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
                
              <th>Room Title</th>
              <th>Description</th>  
              <th>Price</th>
              <th>Room Type</th>
              <th>Free Wifi</th>
              <th>Image</th>
              <th>Edit</th>
              <th>Delete</th>
               
                
              </tr>
              
              @foreach($data as $data)
              
              <tr>
                
                <td>{{$data->room_title}}</td>
                <td>{!!Str::limit($data->description,50)!!}</td>
                <td>{{$data->price}}</td>
                <td>{{$data->wifi}}</td>
                <td>{{$data->room_type}}</td>
                 <td>
                   <img width="60" src="room/{{$data->image}}">
                 </td>

                  <td>
                  <a class="btn btn-success" href="{{url('room_update',$data->id)}}">Edit</a>
                </td>
                 <td>
                   <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('room_delete',$data->id)}}">Delete</a>
                 </td>

              </tr>

              @endforeach
            
             </table>



     </div>
   </div>
 </div>


  @include('admin.footer')
     
        
  </body>
</html>