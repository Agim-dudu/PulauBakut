<!DOCTYPE html>
<html>
<head>
    <title>Pembelian Tiket</title>
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="{{config('midtrans.client_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        #pay-button{
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 3px;
            cursor: pointer;

        }

        .result {
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail pesanan</h1>
        <table>
            <tr>
                <td>Nama</td>
                <td> : {{$order->name}}</td>
            </tr>
            <tr>
                <td>email</td>
                <td> : {{$order->address}}</td>
            </tr>
            <tr>
                <td>no hp</td>
                <td> : {{$order->phone}}</td>
            </tr>
            <tr>
                <td>Qty</td>
                <td> : {{$order->qty}}</td>
            </tr>
            <tr>
                <td>Total Bayar</td>
                <td> : {{$order->total_price}}</td>
            </tr>
        </table>
        <button id="pay-button">Bayar Sekarang</button>

    </div>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
          window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
              /* You may add your own implementation here */
              /* alert("payment success!"); console.log(result);*/
              window.location.href = '/invoice/{{$order->id}}'
            },
            onPending: function(result){
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function(result){
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function(){
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          })
        });
      </script>
</body>
</html>
