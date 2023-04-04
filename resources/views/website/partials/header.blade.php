

    <div class="main_header">
        <div class="container">
            <!--header top start-->
            
            <!--header top start-->

            <!--header middel start-->
            <div class="header_middle sticky-header">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3 col-4">
                        <div class="logo">
                            <a href="{{route('website.index')}}"><img src="{{ asset('website/assets/img/logo/PHONE STORE_free-file (3).png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="main_menu menu_position text-center">
                            <nav>
                                <ul>
                                    <li><a class="" href="{{route('website.index')}}">home</a>
                                        
                                    </li>
                                    <li class="mega_items"><a href="">shop<i class="fa fa-angle-down"></i></a>
                                        <div class="mega_menu">
                                            <ul class="mega_menu_inner">
                                                <li><a href="#">Thương hiệu điện thoại</a>
                                                    <ul>
                                                       @php
                                        
                                                    $categories = DB::table('categories')->where('parent_id',2)->where('status',1)->get();
                                                  
                                                       @endphp
                                                    @foreach ($categories as $category)
                                                 
                                                        <li><a href="{{route('website.category',['id' =>$category->name_cate] ) }}" >{{$category->name_cate}}</a></li>
                                                        @endforeach
                                                      
                                                        
                                                            
                                                    </ul>
                                                </li>
                                                <li><a href="#">Phân khúc giá</a>
                                                    <ul>
                                                        @php
                                        
                                                        $categoriesPrice = DB::table('categories')->where('id',2)->where('status',1)->get();
                                                      
                                                        
                                                           @endphp
                                                           @foreach( $categoriesPrice as $categoriesPrices)
                                                          
                                                            <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>0,'price_end'=>5000000])}}">Dưới 5tr</a></li>
                                                            <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>5000000,'price_end'=>15000000])}}">5tr-15tr</a></li>
                                                            <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>15000000,'price_end'=>25000000])}}">15tr-25tr</a></li>
                                                            <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>25000000,'price_end'=>0])}}">Trên 25tr</a></li>
                                                            @endforeach
                                                    </ul>
                                                </li>
                                                <li><a href="#">Các dòng sản phẩm khác</a>
                                                    <ul>
                                                        @php
                                        
                                                        $categories = DB::table('categories')->where('parent_id',1)->where('status',1)->get();
                                                      
                                                        
                                                           @endphp
                                                           @foreach ($categories as $category)
                                                          
                                                            <li><a href="{{route('website.product',['id' =>$category->name_cate] ) }}">{{$category->name_cate}}</a></li>
                                                            @endforeach
                                                       

                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="{{route('website.blog')}}">News</a>
                                     
                                    </li>
                                    <li><a href="{{route('website.RestApi')}}">API</a>
                                     
                                     </li>
                                    <li><a href="#">pages <i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu pages">
                                            <li><a href="{{route('website.about')}}">About Us</a></li>
                                           
                                            
                                            <li><a href="https://www.facebook.com/Phone-Store-101136619424485" target="__blank">Fanpage Facebook</a></li>
                                            <li><a href="{{route('website.map')}}">maps</a></li>
                                            <li><a href="{{route('website.comingSoon')}}">coming soon</a></li>
                                        </ul>
                                    </li>
                                    @if(Auth::user())
                                    <li><a href="#">Profile <i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu pages">
                                            <li><a href="{{ route('website.account', ['uuid' => Auth::user()->uuid]) }}">My Account</a></li>
                                            
                                       

                                            <li><a href="{{route('website.wishlist')}}">Danh sách yêu thích</a></li>
                                            <li><a href="{{route('website.cart', ['uuid' => Auth::user()->uuid]) }}">Giỏ hàng</a></li>
                         
                           
                                            <li><a href="{{ route('logout')}}" >Logout</a></li>
                                        </ul>
                                    </li>
                                    @endif
                  
                                    @if(!Auth::user())
                                    <li><a href="{{route('postLogin')}}">Login</a></li>
                                    @endif
                                   
                                </ul>
                            </nav>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-7 col-6">
                 
                        <div class="header_configure_area">
                            
                            @if(Auth::user())
                            <div class="header_wishlist">
                            
                                <a href="{{route('website.wishlist')}}"><i class="fa-regular fa-heart"></i>
                                    
                                    <span class="wishlist_count">{{$count}}</span>
                                   
                                </a>
                           
                            </div>
                            @endif
                            @if(!Auth::user())
                            <div class="header_wishlist">
                            
                                <a href="{{route('website.check')}}"><i class="fa-regular fa-heart"></i>
                                    
                                    <span class="wishlist_count">{{$count}}</span>
                                   
                                </a>
                           
                            </div>
                            @endif
                            <div class="mini_cart_wrapper">
                                <a href="javascript:void(0)">
                                    <i class="fa fa-shopping-bag"></i>
                                   
                                    <span class="cart_price">{{Cart::total()}} VND <i class="fa-thin fa-cart-shopping"></i></span>
 
                                    <span class="cart_count">{{Cart::count()}}</span>
                                  
                                </a>

                            </div>
                        </div>
    
                    </div>
             
                </div>
            </div>
            <!--header middel end-->

            <!--mini cart-->
            <div class="mini_cart" style="overflow: croll">
                <div class="cart_close">
                    <div class="cart_text">
                        <h3>Giỏ hàng</h3>
                    </div>
                    <div class="mini_cart_close">
                        <a href="javascript:void(0)"><i class="fa-solid fa-cart-plus" style="color: black"></i></a>
                    </div>
                </div>
            
                <div class="item_cart" style="overflow-y: scroll; height:250px">
                @foreach($cart as $item)
             
                <div class="cart_item">
                    <div class="cart_img">
                        <a href="#"><img src="{{ asset('images/products/'. $item->options->images) }}" alt=""></a>
                    </div>
                    <div class="cart_info">
                        <a href="#">{{$item->name}}</a>
                        <p>{{$item->qty}} X <span>{{number_format($item->price)}}</span></p>
                    </div>
                    <div class="cart_remove">
                        <a href="{{ route('website.removeItemCart', ['id' => $item->rowId]) }}"><i class="fa-solid fa-x" style="color: black"></i></a>
                    </div>
                </div>
              
                @endforeach
                </div>
                <div class="mini_cart_table">
                    <div class="cart_total">
                        <span>Tổng tiền chưa thuế:</span>
                        <span class="price">{{Cart::subTotal()}} VND</span>
                    </div>
                    <div class="cart_total">
                        <span>Thuế:</span>
                        <span class="price"> 5%</span>
                    </div>
                    <div class="cart_total mt-10">
                        <span>Tổng tiền:</span>
                        <span class="price">{{Cart::total()}} VND</span>
                    </div>
                </div>
             
             
                <div class="mini_cart_footer">
                        @if(Auth::user())
                    <div class="cart_button">
                        <a href="{{route('website.cart', ['uuid' => Auth::user()->uuid]) }}">Xem giỏ hàng</a>
                    </div>
                    @endif
                    @if(!Auth::user())
                    <div class="cart_button">
                        <a href="{{route('website.check')}}">Xem giỏ hàng</a>
                    </div>
                    @endif
                   @if(!Auth::user())
                    <div class="cart_button">
                        <a class="active" href="{{route('website.check')}}">Thanh toán</a>
                    </div>
                    @endif
                    @if(Auth::user())
                    <div class="cart_button">
                        <a class="active" href="{{ route('website.checkout', ['uuid' => Auth::user()->uuid]) }}">Checkout</a>
                    </div>
                    @endif
                </div>
            </div>
            <!--mini cart end-->


            <!--header bottom satrt-->
            <div class="header_bottom">
                <div class="row align-items-center">
                    <div class="column1 col-lg-3 col-md-6">
                        <div class="categories_menu categories_three">
                            <div class="categories_title">
                                <h2 class="categori_toggle">DANH MỤC NỔI BẬT</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>
                                    <li class="menu_item_children"><a href="#" >Phone<i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu column_2">
                                            <li class="menu_item_children"><a href="#">Thể loại sản phẩm</a>
                                                <ul class="categorie_sub_menu">
                                                   
                                                    @php
                                        
                                                    $categories = DB::table('categories')->where('parent_id',2)->where('status',1)->get();
                                                       @endphp
                                                       @foreach ($categories as $category)
                                                        <li ><a href="{{route('website.category',['id' =>$category->name_cate] ) }}">{{$category->name_cate}}</a></li>
                                                        @endforeach
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Phân khúc giá</a>
                                                <ul class="categorie_sub_menu">
                                                    <li>
                                                        <ul>
                                                            @php
                                        
                                                        $categoriesPrice = DB::table('categories')->where('id',2)->where('status',1)->get();
                                                      
                                                        
                                                           @endphp
                                                           @foreach( $categoriesPrice as $categoriesPrices)
                                                           <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>0,'price_end'=>5000000])}}">Dưới 5tr</a></li>
                                                            <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>5000000,'price_end'=>15000000])}}">5tr-15tr</a></li>
                                                            <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>15000000,'price_end'=>25000000])}}">15tr-25tr</a></li>
                                                            <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>25000000,'price_end'=>0])}}">Trên 25tr</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                          
                                        </ul>
                                    </li>
                                    <li class="menu_item_children"><a href="#">Laptop<i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu column_2">
                                            <li class="menu_item_children"><a href="#">Nhãn hàng</a>
                                                <ul class="categorie_sub_menu">
                                                    @php
                                        
                                                    $categories = DB::table('categories')->where('parent_id',3)->where('status',1)->get();
                                                       @endphp
                                                       @foreach ($categories as $category)
                                                        <li><a href="{{route('website.category',['id' =>$category->name_cate] ) }}">{{$category->name_cate}}</a></li>
                                                        @endforeach
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#">Phân khúc giá</a>
                                                <ul class="categorie_sub_menu">
                                                    <li>
                                                        <ul>
                                                            @php
                                        
                                                        $categoriesPrice = DB::table('categories')->where('id',3)->where('status',1)->get();
                                                      
                                                        
                                                           @endphp
                                                           @foreach( $categoriesPrice as $categoriesPrices)
                                                           <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>0,'price_end'=>5000000])}}">Dưới 5tr</a></li>
                                                            <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>5000000,'price_end'=>15000000])}}">5tr-15tr</a></li>
                                                            <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>15000000,'price_end'=>25000000])}}">15tr-25tr</a></li>
                                                            <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>25000000,'price_end'=>0])}}">Trên 25tr</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    <li class="menu_item_children"><a href="#"> Tablet<i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu column_2">
                                            <li class="menu_item_children"><a href="#">Nhãn hàng</a>
                                                <ul class="categorie_sub_menu">
                                                    @php
                                        
                                                    $categories = DB::table('categories')->where('parent_id',6)->where('status',1)->get();
                                                       @endphp
                                                       @foreach ($categories as $category)
                                                        <li><a href="{{route('website.category',['id' =>$category->name_cate] ) }}">{{$category->name_cate}}</a></li>
                                                        @endforeach
                                                    @php
                                        
                                                    $categories = DB::table('categories')->where('parent_id',5)->where('status',1)->get();
                                                       @endphp
                                                       @foreach ($categories as $category)
                                                        <li><a href="{{route('website.category',['id' =>$category->name_cate] ) }}">{{$category->name_cate}}</a></li>
                                                        @endforeach
                                                </ul>
                                            </li>
                                            <li class="menu_item_children"><a href="#" >Phân khúc giá</a>
                                                <ul class="categorie_sub_menu">
                                                    <li>
                                                        <ul>
                                                            @php
                                        
                                                        $categoriesPrice = DB::table('categories')->where('id',5)->where('status',1)->get();
                                                      
                                                        
                                                           @endphp
                                                           @foreach( $categoriesPrice as $categoriesPrices)
                                                           <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>0,'price_end'=>5000000])}}">Dưới 5tr</a></li>
                                                            <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>5000000,'price_end'=>15000000])}}">5tr-15tr</a></li>
                                                            <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>15000000,'price_end'=>25000000])}}">15tr-25tr</a></li>
                                                            <li><a href="{{route('website.price',['id' => $categoriesPrices->name_cate,'price_start'=>25000000,'price_end'=>0])}}">Trên 25tr</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        
                                        </ul>
                                    </li>
                                    <li class="menu_item_children"><a href="#"> Phụ kiện<i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu column_2">
                                            <li class="menu_item_children"><a href="#">Phụ kiện ĐT</a>
                                                <ul class="categorie_sub_menu">
                                                    @php
                                        
                                                    $categories = DB::table('categories')->where('parent_id',7)->where('status',1)->get();
                                                       @endphp
                                                       @foreach ($categories as $category)
                                                        <li><a href="{{route('website.category',['id' =>$category->name_cate] ) }}">{{$category->name_cate}}</a></li>
                                                        @endforeach
                                                </ul>
                                            </li>
                                         
                                        </ul>
                                    </li>
                                    @if(Auth::user())
                                    <li class="menu_item_children"><a href="#"> Account<i class="fa fa-angle-right"></i></a>
                                        <ul class="categories_mega_menu column_2">
                                         
                                                <ul class="categorie_sub_menu"><a href="#">Account</a>
                                                   
                                                    <li><a href="{{ route('website.account', ['uuid' => Auth::user()->uuid]) }}">My Account</a></li>
                                            
                                       

                                                    <li><a href="{{route('website.wishlist')}}">Danh sách yêu thích</a></li>
                                                    <li><a href="{{route('website.cart', ['uuid' => Auth::user()->uuid]) }}">Giỏ hàng</a></li>
                                 
                                   
                                                    <li><a href="{{ route('logout')}}" >Logout</a></li>
                                                        
                                                </ul>
                                            </li>
                                         
                                        </ul>
                                    </li>
                                    @endif
                                    <li><a href="{{route('website.blog')}}">News</a></li>
                                    @if(!Auth::user())
                                    <li><a href="{{route('postLogin')}}">Login</a></li>
                                    @endif
                           
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="column2 col-lg-6 ">
                        <div class="search_container" style="display:block">
                            <form action="{{ route('website.search')}}" method="POST">
                                @csrf
                                
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text" name="search" class="search-input">
                                    <button type="submit">Search</button> 
                                </div>
                            </form>
                        </div>
                        <div class="column2 col-lg-6" style="position:absolute;z-index:10">
                        <div class="search_container search-result" style="  background-color: #fff;width:400px ;height: 250px;overflow: auto;" >
                            
                        </div>
                    </div>

                    </div>
                    
                    <div class="column3 col-lg-3 col-md-6">
                        {{-- <div class="header_bigsale">
                            <a href="#">BIG SALE BLACK FRIDAY</a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!--header bottom end-->
        </div>
    </div>
    @if (Session::get('success'))
    <div class="alert alert-success">
        <ul>        
                <li>{!! Session::get('success') !!}</li>            
        </ul>
    </div>
@endif
@if (Session::get('error'))
    <div class="alert alert-danger" >
        <ul>        
                <li>{!! Session::get('error') !!}</li>            
        </ul>
    </div>
@endif