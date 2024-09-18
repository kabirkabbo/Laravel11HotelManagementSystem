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


             <table class="table_deg">

              <tr>
                
             
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Message</th>
              <th>Send Email</th>              
                
              </tr>
              
              @foreach($data as $data)

              <tr>
                
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->message}}</td>
                <td>
                  <a class="btn btn-success" href="{{url('send_mail',$data->id)}}">send mail</a>
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