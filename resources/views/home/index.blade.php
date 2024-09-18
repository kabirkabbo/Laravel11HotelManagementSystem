<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
       @include('home.css')
    
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         @include('home.header')
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
         @include('home.slider')
      <!-- end banner -->
      <!-- about -->
         @include('home.about')
      <!-- end about -->
      <!-- our_room -->
         @include('home.room')
      <!-- end our_room -->
      <!-- gallery -->
          @include('home.gallary')
      <!-- end gallery -->
      
      <!-- end blog -->
      <!--  contact -->
         @include('home.contact')
      <!-- end contact -->
         @include('home.footer')
      <!--  footer -->
      
   </body>
</html>