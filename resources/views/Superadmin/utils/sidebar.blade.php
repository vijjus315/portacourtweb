 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="{{route('home')}}" class="brand-link border-bottom-0 d-inline-block">
     <!-- <img src="{{url('/')}}/logo.svg" alt="" class="jack_logo_mobile"> -->
     <span class="brand-text font-weight-light"><img src="{{url('/')}}/logo.svg" alt="" class="jack_logo"></span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item menu-open">
           <a href="{{route('dashboard')}}" class="nav-link {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>

         </li>
         <li class="nav-item menu-open">
           <a href="{{route('userList')}}" class="nav-link {{ Request::segment(2) == 'user-list' ? 'active' : '' }}">
             <img src="/trade.png" alt="" class="without_hover nav-icon">
             <img src="/trade-hover.png" alt="" class="hover_img nav-icon">
             <p>
               Users
             </p>
           </a>
         </li>
         <li class="nav-item menu-open">
           <a href="{{route('banners.index')}}" class="nav-link {{ Request::segment(2) == 'banners' ? 'active' : '' }}">
             <img src="/trade.png" alt="" class="without_hover nav-icon">
             <img src="/trade-hover.png" alt="" class="hover_img nav-icon">
             <p>
               Banners
             </p>
           </a>
         </li>
         <li class="nav-item menu-open">
           <a href="{{route('category.index')}}" class="nav-link {{ Request::segment(2) == 'category' ? 'active' : '' }}">
             <img src="/trade.png" alt="" class="without_hover nav-icon">
             <img src="/trade-hover.png" alt="" class="hover_img nav-icon">
             <p>
               Categories
             </p>
           </a>
         </li>
         <li class="nav-item menu-open">
           <a href="{{route('product.index')}}" class="nav-link {{ Request::segment(2) == 'product' ? 'active' : '' }}">
             <img src="/trade.png" alt="" class="without_hover nav-icon">
             <img src="/trade-hover.png" alt="" class="hover_img nav-icon">
             <p>
               Products
             </p>
           </a>
         </li>
         <li class="nav-item menu-open">
           <a href="{{route('coupon.index')}}" class="nav-link {{ Request::segment(2) == 'coupon' ? 'active' : '' }}">
             <img src="/trade.png" alt="" class="without_hover nav-icon">
             <img src="/trade-hover.png" alt="" class="hover_img nav-icon">
             <p>
              Coupons
             </p>
           </a>
         </li>
         <li class="nav-item menu-open">
           <a href="{{route('orderList')}}" class="nav-link {{ Request::segment(2) == 'order-list' ? 'active' : '' }}">
             <img src="/trade.png" alt="" class="without_hover nav-icon">
             <img src="/trade-hover.png" alt="" class="hover_img nav-icon">
             <p>
               Orders
             </p>
           </a>
         </li>
         <li class="nav-item menu-open">
           <a href="{{route('post.index')}}" class="nav-link {{ Request::segment(2) == 'post' ? 'active' : '' }}">
             <img src="/trade.png" alt="" class="without_hover nav-icon">
             <img src="/trade-hover.png" alt="" class="hover_img nav-icon">
             <p>
              Blogs
             </p>
           </a>
         </li>
         <li class="nav-item menu-open">
           <a href="{{route('testimonail.index')}}" class="nav-link {{ Request::segment(2) == 'testimonail' ? 'active' : '' }}">
             <img src="/trade.png" alt="" class="without_hover nav-icon">
             <img src="/trade-hover.png" alt="" class="hover_img nav-icon">
             <p>
             Testimonails
             </p>
           </a>
         </li>
         <li class="nav-item menu-open">
           <a href="{{route('newsletterList')}}" class="nav-link {{ Request::segment(2) == 'newsletter-list' ? 'active' : '' }}">
             <img src="/trade.png" alt="" class="without_hover nav-icon">
             <img src="/trade-hover.png" alt="" class="hover_img nav-icon">
             <p>
               Newsletters
             </p>
           </a>
         </li>
       
         <li class="nav-item menu-open">
           <a href="{{route('contactList')}}" class="nav-link {{ Request::segment(2) == 'contact-list' ? 'active' : '' }}">
             <img src="/trade.png" alt="" class="without_hover nav-icon">
             <img src="/trade-hover.png" alt="" class="hover_img nav-icon">
             <p>
               Contact Us
             </p>
           </a>
         </li>

       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>