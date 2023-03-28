@include('website.partials.head')
@include('website.partials.header')
<div class="error_page_bg">
        <div class="container">
            <div class="error_section">
                <div class="row">
                    <div class="col-12">
                        <div class="error_form">
                            <h1>404</h1>
                            <h2>Opps! PAGE NOT BE FOUND</h2>
                            <p>Sorry but the page you are looking for does not exist, have been<br> removed, name changed or is temporarily unavailable.</p>
                                <form action="#">
                                    <input placeholder="Search..." type="text">
                                    <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                </form>
                                <a href="{{route('website.index')}}">Back to home page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@include('website.partials.footer')
