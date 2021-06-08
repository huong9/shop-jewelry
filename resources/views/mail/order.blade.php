    <h2>Chúc mừng bạn {{ $order->name }} đã đặt hàng thành công!</h2>
    <br>
    <p style="font-size: 17px; font-weight: bold">Thông tin đơn hàng của bạn:</p>
    <p style="font-size: 15px">- Mã đơn hàng: {{ $order->id }}</p>
    <p style="font-size: 15px">- Ngày đặt hàng: {{ $order->created_at }}</p>
    <p style="font-size: 15px">- Địa chỉ: {{ $order->address }}</p>
    <p style="font-size: 15px">- SĐT: {{ $order->phone }}</p>
    @if ($order->payment == 0)
    <p style="font-size: 15px">- Phương thức thanh toán: Thanh toán khi nhận hàng (COD)</p>
    @else
    <p style="font-size: 15px">- Phương thức thanh toán: Chuyển khoản ngân hàng</p>
    @endif

    <br>
    <p style="font-size: 17px; font-weight: bold"">Chi tiết sản phẩm:</p>
    <table border="1" cellspacing = '0' cellpadding = "10">
        <thead>
            <tr style="border-top:1px solid #adadad; border-bottom: 1px solid #adadad; ">
                <th style="width: 50px">STT</th>
                <th style="width: 140px">Tên</th>
                <th style="width: 100px">Giá</th>
                <th style="width: 50px">Size</th>
                <th style="width: 50px">SL</th>
                <th style="width: 100px">Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php $n = 1; ?>
            
            @foreach ($items as $item)
            <tr>
                <td style="text-align: center">{{ $n }}</td>
                <td>{{ $item['name'] }}</td>
                <td>${{ $item['price'] }}</td>
                <td style="text-align: center">{{ $item['size'] }}</td>
                <td style="text-align: center">{{ $item['quantity'] }}</td>
                <td>${{ $item['price']*$item['quantity'] }}</td>
            </tr>
            <?php  $n++; ?>
            @endforeach
            <tr>
                <td style="font-size: 20px; font-weight: bold;" colspan="3">Tổng tiền:</td>
                <td style="font-size: 20px; font-weight: bold; text-align: center" colspan="3">${{ $total }}</td>
            </tr>
        </tbody>
    </table>

