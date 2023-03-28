<h1>Đơn hàng đã thanh toán ở Store Phone</h1>
<p>Khách hàng : {{Auth::user()->fullname}}</p>
<p>Địa chỉ :{{Auth::user()->address}}</p>
<style>
  .gmail-table {
    border: solid 2px #DDEEEE;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 14px Roboto, sans-serif;
  }

  .gmail-table thead th {
    background-color: #DDEFEF;
    border: solid 1px #DDEEEE;
    color: #336B6B;
    padding: 10px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
    text-align:center;
  }

  .gmail-table tbody td {
    border: solid 1px #DDEEEE;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
    text-align:center;
  }

  .gmail-table tbody tr {
   text-align:center;
  }
  .gmail-table tfoot tr {
   text-align:center;
  }
</style>
<table class="gmail-table">
  <thead>
    <tr>
      <th>STT</th>
      <th>Name</th>
      <th>Position</th>
      <th>Height</th>
    </tr>
  </thead>
  <tbody>
      @php $i = 1; @endphp 
      @foreach($cart as $item)
      <tr >
          <td>@php echo $i++ @endphp</td>
          <td>{{$item->name}}</td>
          <td>{{$item->qty}}</td>
          <td>{{number_format($item->price* $item->qty)}} VND</td>
      </tr>
      @endforeach
  
  </tbody>
  <tfoot>
    <tr>
      <th>Giá chưa thuế</th>
      <td> <strong>{{Cart::count()}} Sản phẩm</strong></td>

      <td> <strong>{{Cart::subTotal()}} VND</strong></td>
    </tr>
    <tr>
      <th>Thuế</th>
      <td></td>
      <td><strong>8%</strong></td>
    </tr>
    <tr class="order_total">
      <th>Giá sau thuế</th>
      <td></td>
      <td><strong>{{Cart::total()}} VND</strong></td>
    </tr>
  </tfoot>
</table>
<p>Web: <a href="http://storephone.online/">StorePhone</a></p>
<p>Gmail: <a href="mailto:daothanhphuc15052001@gmail.com">StorePhone@gmail.com</a></p>

