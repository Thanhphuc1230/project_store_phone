@include('website.partials.head')
@include('website.partials.header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#like").on('click', function(){
            var newId = $(this).data("new");
            var userID = $(this).data("user");
            var element = this;

            $.ajax({
                type: "POST",
                url: "{{ route('website.like') }}",
                data:{
                    new: newId,
                    user: userID
                },
                success:function(result){
                    $(element).html(result)
                }
            });
        });
    });
</script>
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{route('website.index')}}">Home</a>
                        <li>Tin tức</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog_bg_area">
    <div class="container">
        <div class="blog_page_section">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!--blog grid area start-->
                    <div class="blog_wrapper blog_details">
                    </li>@foreach($news as $new)
                        <article class="single_blog">
                            <figure>
                                <div class="post_header" >
                                    <h3 class="post_title">{{$new->title}}</h3>
                                    <div class="blog_meta">
                                        <span class="author">Posted by : <a >{{$new->author}}</a> / </span>
                                        <span class="meta_date">On : <a href="#">{{ date('d/m/Y', strtotime($new->created_at)) }}</a> /</span>
                                        <span class="author">Rating : 

                                            @php $rate_number= number_format($rating_value) @endphp
                                            @for($i=1; $i<=$rate_number;$i++)
                                            <span class="fa fa-star checked"></span>
                                            @endfor

                                            @for($j=$rate_number+1; $j<=5 ;$j++)
                                            <span class="fa fa-star "></span>
                                            @endfor
                                            @if($rating->count() >0)
                                                ({{ $rating->count()}} Ratings) / 
                                            @else
                                                No Ratings /
                                            @endif                      
                                          
                                           
                                        </span>
                                        @php
                                        $likes= DB::table('likes')->select('likes.*')->where('new_id',$new->id)->count();
                                        @endphp
                                        @if(!Auth::user())
                                              <span class="meta_date"><i class="fa-solid fa-thumbs-up"  ></i> :{{$likes}} like</span>
                                        @endif
                                        @if(Auth::user())
                                        @php
                                             if($likes!==NULL){
                                        @endphp
                                        <span class="meta_date"><i class="fa-solid fa-thumbs-up" id="like" data-new={{ $new->id}} data-user={{ Auth::user()->id}} ></i> :{{$likes}} like</span>
                                        @php
                                            }else{
                                        @endphp
                                        <span class="meta_date"><i class="fa-solid fa-thumbs-up"id="like" data-new={{ $new->id}} data-user={{ Auth::user()->id}}></i> :{{$likes}} like</span>
                                        @php
                                                }
                                        @endphp
                                        @endif
                                       
                                    </div>
                                </div>
                                <div class="blog_thumb">
                                    <img src="{{ asset('images/news/'. $new->avatar) }}" alt="">
                                </div>
                                <figcaption class="blog_content">
                                    <div class="post_content">
                                            {{!!$new->content!!}}
                                    </div>
                                    <div class="entry_content">
                                        <div class="post_meta">
                                            <span>Tags: </span>
                                            <span><a href="#">, fashion</a></span>
                                            <span><a href="#">, t-shirt</a></span>
                                            <span><a href="#">, white</a></span>
                                        </div>

                                        <div class="social_sharing">
                                            <p>share this post:</p>
                                            <ul>
                                                <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                                                <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </figcaption>
                            </figure>
                        </article>
                        
                        <div class="related_posts">
                            <h3>Bài viết tương tự</h3>
                            <div class="row">
                                @foreach($news_random1 as $news1)
                                <div class="col-lg-4 col-md-6">
                                    <article class="single_related">
                                        <figure>
                                            <div class="related_thumb">
                                                <a href="{{ route('website.blogDetail', ['uuid' => $news1->title]) }}"><img src=" {{ asset('images/news/'. $news1->avatar) }} " alt=""></a>
                                            </div>
                                            <figcaption class="related_content">
                                                <h4><a href="{{ route('website.blogDetail', ['uuid' => $news1->title]) }}">{{$news1->title}}</a></h4>
                                                <div class="blog_meta">
                                                    <span class="author">By : <a href="">{{$news1->author}}</a> / </span>
                                                    <span class="meta_date">{{ date('d/m/Y', strtotime($news1->created_at)) }}	</span>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </article>
                                </div>
                                @endforeach
                               
                            </div>
                        </div>
                        <div class="comments_box">
                            <h3>Comments </h3>
                            @foreach($comments as $comment)
                            <div class="comment_list">
                                <div class="comment_thumb">
                                    <img src=" {{ asset('images/users/'.$comment->avatar) }} " alt="" style="width:50px">
                                </div>
                                
                                <div class="comment_content">
                                    <div class="comment_meta">
                                        <h5><a href="#">{{$comment->fullname}}</a></h5>
                                        <span>{{$comment->created_at}}</span>
                                    </div>
                                    <p>{{$comment->comments}}</p>
                                    {{-- <div class="comment_reply">
                                        <a href="#">Reply</a>
                                    </div> --}}
                                </div>
                                @endforeach
                            </div>
                            
                        </div>
                        <div class="comments_box" style="margin-bottom:10px !improtant">
                        
                        <h3>Rating </h3>
                    
                            
                        <div class="comments_form">
                            <form action="{{route('website.postComment', ['uuid'=>$new->uuid])}}" method="POST">
                                @csrf
                                <div class="row">
                                <div class="col-12">
                                    <fieldset class="rating">
                                        <input type="hidden" name="id_post" value="{{$new->uuid}}">
                                        <input type="radio" id="star5" name="rate" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                        <input type="radio" id="star4half" name="rate" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                        <input type="radio" id="star4" name="rate" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                        <input type="radio" id="star3half" name="rate" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                        <input type="radio" id="star3" name="rate" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                        <input type="radio" id="star2half" name="rate" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                        <input type="radio" id="star2" name="rate" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                        <input type="radio" id="star1half" name="rate" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                        <input type="radio" id="star1" name="rate" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                        <input type="radio" id="starhalf" name="rate" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                    </fieldset>
                                    </div>

                                    <div class="col-12">
                                        <label for="review_comment">Comment </label>
                                        <textarea name="comments" id="review_comment"></textarea>
                                    </div>
                                  
                                </div>
                                @if(Auth::user())
                                <button class="button" type="submit">Post Comment</button>
                                @endif
                                @if(!Auth::user())
                                <div class="cart_button">
                                    <a href="{{route('website.check')}}">Post Comment</a>
                                </div>
                                @endif
                              
                           
                        </div>
                        @endforeach

                    </div>
                </div>
                </form>
                {{-- <div class="col-lg-3 col-md-12">
                    <div class="blog_sidebar_widget">
                      
                       
                        <div class="widget_list widget_post">
                            <div class="widget_title">
                                <h3> Bài viết gần đây</h3>
                            </div>
                            @foreach($news_random as $random)
                            <div class="post_wrapper">
                                <div class="post_thumb">
                                    <a href="{{ route('website.blogDetail', ['uuid' => $random->uuid]) }}"><img src=" {{ asset('images/news/'. $random->avatar) }} " alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h4><a href="{{ route('website.blogDetail', ['uuid' => $random->uuid]) }}"  style="
                                        display:inline-block;
                                        white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        max-width: 20ch;">{{$random->title}}</a></h4>
                                    <span>{{ date('d/m/Y', strtotime($random->created_at)) }}</span>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                        <div class="widget_list widget_categories">
                            <div class="widget_title">
                                <h3>Categories</h3>
                            </div>
                            <ul>
                                @php
                                        
                                $categories = DB::table('categories')->where('parent_id',1)->get();
                                
                                
                                   @endphp
                                   @foreach ($categories as $category)
                                    <li><a href="{{route('website.product',['id' =>$category->id] ) }}">{{$category->name_cate}}</a></li>
                                    @endforeach
                            </ul>
                        </div>

                       
                    </div>
                </div> --}}
            </div>
                    <!--blog grid area start-->
              
                
            </div>
        </div>
    </div>

@include('website.partials.footer')