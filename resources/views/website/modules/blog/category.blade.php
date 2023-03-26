@include('website.partials.head')
@include('website.partials.header')
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{route('website.index')}}">home</a></li>
                        <li>News</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blog_bg_area">
    <div class="container">
        <!--blog area start-->
        <div class="row">
            <div class="col-12">
                <div class="blog_wrapper blog_nosidebar mb-60">
                    <div class="blog_header">
                        <h1>News</h1>
                    </div>
                    <div class="blog_wrapper_inner">
                        @foreach($news as $new)
                        <article class="single_blog">
                            <figure>
                                <div class="blog_thumb">
                                    @php 
                                        
                                        $url = $new->title;
                                        $newUrl = str_replace('-', ' ', $url);
                                        $newUrl = rawurlencode($newUrl);
                                        $newUrl = str_replace('%', '-', $newUrl);
                                        
                                    @endphp
                                   
                                    <a href="{{ route('website.blogDetail', ['title' => $newUrl]) }}"><img src="{{ asset('images/news/'. $new->avatar) }}"alt=""></a>
                                </div>
                                <figcaption class="blog_content">
                                    <h4 class="post_title"><a href="{{ route('website.blogDetail', ['title' => $newUrl]) }}">{{$new ->title}}</a>
                                    </h4>
                                    <div class="blog_meta">
                                        <span class="author">Posted by : <a >{{$new->author}}</a> / </span>
                                        <span class="meta_date">Posted on : <a >{{ date('d/m/Y', strtotime($new->created_at)) }} / </a></span>
                                        @php
                                        $likes= DB::table('likes')->select('likes.*')->where('new_id',$new->id)->count();
                                        @endphp
                                        <span class="meta_date"><i class="fa-solid fa-thumbs-up"  ></i>: {{$likes}} Like</span>
                                    </div>
                                    <div class="blog_desc">
                                        <p>{{$new->intro}}</p>
                                    </div>
                                    <footer class="btn_more">
                                        <a href="{{ route('website.blogDetail', ['title' =>$newUrl]) }}"> Read more</a>
                                    </footer>
                                </figcaption>
                            </figure>
                        </article>
                        @endforeach
                            
                    </div>
                </div>
                <!--blog pagination area start-->
                <div class="blog_pagination">
                    <div class="pagination">
                        <ul>
                            <li class="current">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#">next</a></li>
                            <li><a href="#">&gt;&gt;</a></li>
                        </ul>
                    </div>
                </div>
                <!--blog pagination area end-->
            </div>
        </div>
        <!--blog area end-->
    </div>
</div>
@include('website.partials.footer')