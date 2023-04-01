<footer class="footer_widgets">
    <!--newsletter area start-->

    <!--newsletter area end-->
    <div class="footer_top">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-3 col-md-3 col-sm-5">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="{{route('website.about')}}">About Us</a></li>
                                {{-- <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">New products</a></li>
                                <li><a href="#">Best sales</a></li> --}}
                                <li><a href="{{route('website.check')}}">My Account</a></li>
                                <li><a href="{{route('website.check')}}">Order History</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        @if(!Auth::user())
                        <h3> Account</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="{{ route('getLogin') }}">Login</a></li>
                                <li><a href="{{ route('getRegister') }}">Register</a></li>
                        
                              
                            </ul>
                        </div>
                        @endif
                        @if(Auth::user())
                        <h3>My Account</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="{{ route('website.account', ['uuid' => Auth::user()->uuid]) }}">My Account</a></li>
                                <li><a href="{{route('website.cart', ['uuid' => Auth::user()->uuid]) }}">Shopping Cart</a></li>
                                <li><a href="{{route('website.wishlist')}}">Wish List</a></li>
                              
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Customer Service</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="{{route('website.map')}}">Sitemap</a></li>
                                <li><a href="{{route('website.check')}}">My Account</a></li>
                                @if(Auth::user())
                                <li><a href="{{ route('website.account', ['uuid' => Auth::user()->uuid]) }}">Order History</a></li>
                                @endif
                               
                                {{-- <li><a href="#">Specials</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-7 col-sm-12">
                    <div class="widgets_container">
                        <h3>CONTACT INFO</h3>
                        <div class="footer_contact">
                            <div class="footer_contact_inner">
                                <div class="contact_icone">
                                    <img src="{{ asset('website/assets/img/icon/icon-phone.png') }}" alt="">
                                </div>
                                <div class="contact_text">
                                    <p>Hotline Free 24/24: <br> <strong><a href="tel:+84706405646">0706405646</a> </strong></p>
                                </div>
                            </div>
                            <p>Your address goes here. <br> <a href="mailto:thanhphuc123465789@gmail.com" style="color: blue">Storephone@gmail.com</a> </p>
                        </div>

                        <div class="footer_social">
                            <ul>
                                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                             
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <p>{{ date('Y') }} <a href="index.html" class="text-uppercase"> Phone Store</a>. Made with <i class="fa fa-heart"></i> by <a target="_blank" href="https://www.facebook.com/Tphuc1505/">DTP</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_payment text-right">
                        <img src="{{ asset('website/assets/img/icon/payment.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('website/assets/js/plugins.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('website/assets/js/main.js') }}"></script>
<script src="https://kit.fontawesome.com/9d4570d54a.js" crossorigin="anonymous"></script>

<script>
    $('.search-result').hide();
    $('.search-input').keyup(function(){
        var _text =$(this).val();
        var _img = "{{ asset('images/products' )}}";
        var _url = "{{url('/detail')}}";
        if(_text != ''){
            $.ajax({
            url : "{{route('website.ajaxSearch')}}?key="+ _text,
            type: 'GET',
            success:function(res){
                var _html = '';
        
                for (var pro of res){
                     var _name_products =convertToSlug(pro.name);
                    _html +='<div class="post_wrapper">'
                    _html +='<div class="post_thumb">'
                    _html +='<a href="'+_url+'/'+_name_products+'/'+ pro.uuid+'"><img width="100" src="'+_img+'/' + pro.images + '" alt=""></a>'
                    _html +='</div>'
                    _html +='<div class="post_info">'
                    _html +='<h4><a href="'+_url+'/'+_name_products+'/'+ pro.uuid+ '">' +pro.name +'</a></h4>'
                    _html +='<span>'+ new Intl.NumberFormat().format(pro.price )+'VND </span>'
                    _html +='</div>'
                    _html +='</div>   '
                }
                $('.search-result').show();
                $('.search-result').html(_html);
                console.log(res);
                        }
                    });
        }else{
            $('.search-result').html('');
            $('.search-result').hide();
        }
              
         });
         function convertToSlug(Text) {
            // Replace spaces with hyphens
            var replaced = Text.replaceAll(' ', '-');
            
            // Encode special characters
            var encoded = encodeURIComponent(replaced);
            
            return encoded;
        }
</script>
</body>

</html>