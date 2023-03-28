<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
    <a class="large_logo" ><img src="{{ asset('website/assets/img/logo/PHONE STORE_free-file (3).png') }}" alt=""></a>
    <a class="small_logo" ><img src="{{ asset('style/img/mini_logo.png') }}" alt=""></a>
    <div class="sidebar_close_icon d-lg-none">
    <i class="ti-close"></i>
    </div>
    </div>
    <ul id="sidebar_menu">
        <li class="">
            <a aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{ asset('style/img/menu-icon/4.svg') }}" alt="">
                </div>
                <div class="nav_title">
                    <span>Hello {{ Auth::user()->fullname }}</span>
                </div>
            </a>
        </li>
    <li class="">
    <a class="has-arrow"  aria-expanded="false">
    <div class="nav_icon_small">
    <img src="{{ asset('style/img/menu-icon/dashboard.svg') }}" alt="">
    </div>
    <div class="nav_title">
    <span>Page</span>
    </div>
    </a>
    <ul>
    <li><a href="{{ route('website.index')}}" target="__blank">Trang chủ</a></li>
    </ul>
    </li>
    <li class="">
        <a class="has-arrow"  aria-expanded="false">
        <div class="nav_icon_small">
        <img src="{{ asset('style/img/menu-icon/5.svg') }}" alt="">
        </div>
        <div class="nav_title">
        <span>Calendars</span>
        </div>
        </a>
        <ul>
        <li><a href="{{ route('admin.calendars.index')}}">Lịch làm việc</a></li>
        <li><a href="{{ route('admin.calendars.create')}}">Thêm lịch làm việc</a></li>
        </ul>
    </li>
    
    <li class="">
    <a aria-expanded="false" href="{{ route('admin.users.index')}}">
    <div class="nav_icon_small">
    <img src="{{ asset('style/img/menu-icon/5.svg') }}" alt="">
    </div>
    <div class="nav_title">
    <span>Users</span>
    </div>
    </a>
    
      </li>

    <li class="">
        <a  aria-expanded="false" href="{{ route('admin.categories.index')}}">
        <div class="nav_icon_small">
        <img src="{{ asset('style/img/menu-icon/6.svg') }}" alt="">
        </div>
        <div class="nav_title">
        <span>Thể loại</span>
        </div>
        </a>
        
    </li>

    <li class="">
        <a class="has-arrow"  aria-expanded="false">
        <div class="nav_icon_small">
        <img src="{{ asset('style/img/menu-icon/6.svg') }}" alt="">
        </div>
        <div class="nav_title">
        <span>Sản phẩm</span>
        </div>
        </a>
        <ul>
        <li><a href="{{ route('admin.products.index')}}">Danh sách sản phẩm</a></li>
        <li><a href="{{ route('admin.products.create_new')}}">Thêm sản phẩm sắp ra mắt</a></li>
        <li><a href="{{ route('admin.wishlists.index')}}">Sản phẩm được yêu thích</a></li>
       
        </ul>
    </li>
   

    

    <li class="">
        <a class="has-arrow"  aria-expanded="false">
        <div class="nav_icon_small">
        <img src="{{ asset('style/img/menu-icon/11.svg') }}" alt="">
        </div>
        <div class="nav_title">
        <span>Kho</span>
        </div>
        </a>
        <ul>
        <li><a href="{{ route('admin.warehouses.index')}}">Danh sách trong kho</a></li>
        <li><a href="{{ route('admin.warehouses.create')}}">Thêm sản phẩm vào kho</a></li>
        </ul>
    </li>

    <li class="">
        <a class="has-arrow" aria-expanded="false">
        <div class="nav_icon_small">
        <img src="{{ asset('style/img/menu-icon/6.svg') }}" alt="">
        </div>
        <div class="nav_title">
        <span>Tin tức</span>
        </div>
        </a>
        <ul>
        <li><a href="{{ route('admin.news.index')}}">Danh sách tin tức</a></li>
        
        <li><a href="{{ route('admin.news.acceptCmt')}}">Comment của khách hàng</a></li>
        </ul>
    </li>
    <li class="">
        <a class="has-arrow"  aria-expanded="false">
        <div class="nav_icon_small">
        <img src="{{ asset('style/img/menu-icon/6.svg') }}" alt="">
        </div>
        <div class="nav_title">
        <span>Quản lý đơn hàng</span>
        </div>
        </a>
        <ul>
        <li><a href="{{ route('admin.orders.index')}}">Danh sách đơn hàng</a></li>
        
        </ul>
        <ul>
            <li><a href="{{ route('admin.turnovers.index')}}">Doanh Thu</a></li>
            
            </ul>
    </li>
   
    <li class="">
        <a   aria-expanded="false"  href="{{ route('admin.sliders.index')}}">
        <div class="nav_icon_small">
        <img src="{{ asset('style/img/menu-icon/6.svg') }}" alt="">
        </div>
        <div class="nav_title">
        <span>Sliders</span>
        </div>
        </a>
       
    </li>
    
    
    
 
    
    <li class="">
    <a href="{{ route('logout')}}" aria-expanded="false">
    <div class="nav_icon_small">
     <img src="{{ asset('style/img/menu-icon/10.svg') }}" alt="">
    </div>
    <div class="nav_title">
    <span>Logout</span>
    </div>
    </a>
    </li>
    
  
    
    
    
   
    
    
    
    
    
    
    </ul>
    </nav>