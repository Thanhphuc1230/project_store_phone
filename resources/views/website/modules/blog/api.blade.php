@include('website.partials.head')
@include('website.partials.header')
<div class="faq_page_bg">
        <div class="container">
            <!--faq area start-->
            <div class="faq_content_area">
                <div class="row">
                    <div class="col-12">
                        <div class="faq_content_wrapper">
                            <h4>Rest API</h4>
                            <p>API Product: <b>{{$url}}/api/product/get</b></p>
                            <p>API User: <b>{{$url}}/api/user/get</b></p>
                            <p>API Blog: <b>{{$url}}/api/news/get</b></p>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@include('website.partials.footer')