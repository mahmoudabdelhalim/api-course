<!-- Sidebar Navigation Left -->
<aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">

 <!-- Logo -->
 <div class="logo-sn ms-d-block-lg">
   <a class="pl-0 ml-0 text-center" href="#"> <img src="{{ asset('assets/img/logo.png')}}" alt="logo"> </a>
 </div>

 <!-- Navigation -->
 <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
    <!-- Home -->
    <li class="menu-item ">
        <a class=" active" href="#">
            <span><i class="material-icons fs-16">home</i>{{ __('home') }} </span>
        </a>
       
    </li>
    <!-- /Home -->
     <!-- Setup  -->
     <li class="menu-item">
      <a href="#" class="has-chevron" data-toggle="collapse" data-target="#create" aria-expanded="false" aria-controls="tables">
        <span><i class="material-icons fs-16">build</i>{{ __('setup') }} </span>
      </a>
      <ul id="create" class="collapse" aria-labelledby="tables" data-parent="#side-nav-accordion">

      <li> <a href="{{route('brand.index')}}">{{ __('Brands') }} </a> </li>
      <li> <a href="{{route('size.index')}}">{{ __('Size') }} </a> </li>
      
        <li> <a href="{{route('color.index')}}">{{ __('Color') }} </a> </li>
        <li> <a href="{{route('shop.index')}}">{{ __('Shop') }}</a> </li>
     
      

      </ul>
  </li>
  <!--  Setup  -->

  <!--  Sending  -->
    <!-- product  -->
    <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#contactsdropdown" aria-expanded="false" aria-controls="contactsdropdown">
        <span><i class="material-icons fs-16">assignment</i>{{ __('product') }}</span>
      </a>
        <ul id="contactsdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
          <li> <a href="{{route('product.index')}}">{{ __('product') }}</a> </li>
         
        </ul>
      </li>
    <!--  Clients  -->
    <!-- Leads  -->
    <!-- <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#callsdropdown1" aria-expanded="false" aria-controls="callsdropdown">
        <span><i class="material-icons fs-16">call</i>{{ __('leads') }}</span>
      </a>
        <ul id="callsdropdown1" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
          <li> <a href="#">{{ __('leads') }}</a> </li>
         
        </ul>
      </li> -->
    <!--  Leads  -->
    <!-- Todo List -->
    <!-- <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#callsdropdown" aria-expanded="false" aria-controls="callsdropdown">
        <span><i class="material-icons fs-16">call</i>ToDo List</span>
      </a>
        <ul id="callsdropdown" class="collapse" aria-labelledby="basic-elements" data-parent="#side-nav-accordion">
          <li> <a href="#">ToDo List</a> </li>
         
        </ul>
      </li> -->
  
     
    
    
  </ul>


</aside>