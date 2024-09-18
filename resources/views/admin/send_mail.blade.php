<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

     <style type="text/css">

       .div_center{
         text-align: center;
         padding-top: 40px;
       }

       .div_deg{
        padding-top: 30px;
       }
      
       label{
        display: inline-block;
        width: 200px;
        color: white!important;
       }
     </style>
  </head>
  <body>
    @include('admin.header')



    @include('admin.sidebar')
    
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

               <div class="div_center">

         <h1 style="font-size: 30px; font-weight: bold;">Mail Send to {{$data->name}}</h1>
               
               <form action="{{url('mail',$data->id)}}" method="Post">

                  @csrf

                 <div class="div_deg">
                   <label>Greeting</label>
                   <input type="text" name="greeting" >
                 </div>

                 <div class="div_deg">
                   <label>Mail Body </label>
                   <textarea name="body"></textarea>
                 </div>

                 <div class="div_deg">
                   <label>Action Text</label>
                   <input type="text" name="action_text">
                 </div>

                  <div class="div_deg">
                   <label>Action Url</label>
                   <input type="text" name="action_url">
                 </div>

                  <div class="div_deg">
                   <label>End Line</label>
                   <input type="text" name="endline">
                 </div>

                 <div class="div_deg">
                   
                   <input class="btn btn-primary" type="submit" value="Send Mail">
                 </div>

               </form>

            </div>


          </div>    
        </div>
      </div>

      @include('admin.footer')
   
  </body>

</html>