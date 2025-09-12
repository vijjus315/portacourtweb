<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Order Has Been Placed Successfully!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            color: #333333;
        }
        .content {
            color: #333333;
        }
        .content p {
            margin: 10px 0;
        }
        .content ul {
            list-style-type: none;
            padding: 0;
        }
        .content ul li {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777777;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #007bff;
            color: #ffffff!important;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Your Order Has Been Placed Successfully!</h1>
        </div>
        <div class="content">
            <p>Dear {{$name}},</p>
            <p>Thank you for your order with PortaCourts!</p>
            <p>We’re excited to confirm that we have received your order. Below are the details of your purchase:</p>
            <p><strong>Order Number:</strong> {{$order->order_number}}</p>
            <p><strong>Order Date:</strong> {{date('D M,Y',strtotime($order->created_at))}}</p>
            <p><strong>Items Ordered:</strong></p>
            @php    
                $item  = App\Models\OrderDetail::where('order_id',$order->id)->get();
                $addressJson = $order->address;
                $address = json_decode($addressJson);
            @endphp
            <ul>
                @foreach($item as $singleitem)
                <li>{{$singleitem->product->title}}</li>
                @endforeach
            </ul>
            <p><strong>Shipping Address:</strong></p>
            <p>#{{$address->line1}}, {{$address->city}}, {{$address->country}}</p>
            <p>You will receive a shipping confirmation email once your order is on its way, along with tracking information.</p>
            <p>If you have any questions or need assistance, please reach out to us at <a href="mailto:support@portacourts.com">support@portacourts.com</a>.</p>
            <p>Thank you for choosing PortaCourts. We appreciate your business!</p>

            <!-- Track Order Button -->
            <div  style="text-align: center;"> 
                <a href="{{ route('myOrderList', ['q' => $order->order_number]) }}" class="btn" style="color: #fff !important;">Track Your Order</a>
            </div>

            <p>Best regards,</p>
            <p>The PortaCourts Team</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 PortaCourts. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
