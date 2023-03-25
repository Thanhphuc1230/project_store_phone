@include('website.partials.head')
@include('website.partials.header')

<section class="about_section mb-60">
    <div class="row align-items-center">
        <div class="col-12">
            <figure>
                
                <figcaption class="about_content">
                    <h1>Đơn hàng đã được thanh toán thành công</h1>
                    
                    <p>Chúng tôi sẽ liên hệ với bạn sớm nhất có thể </p> <a href="{{ route('website.account', ['uuid' => Auth::user()->uuid]) }}" style="color:blue">Bạn có thẻ xem chi tiết đơn hàng ở đây</a> 
                    
                </figcaption>
            </figure>
        </div>
    </div>
</section>
@include('website.partials.footer')