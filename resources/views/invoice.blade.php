<!DOCTYPE html>
<html>
<head>
    <title>Tiket</title>
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            background: #259632;
            color: white;
            text-align: center;
        }
        h3 {
            text-align: center;
        }

        input[type="text"], input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #259632;
            color: white;
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
        <h1>Tiket Masuk</h1>
        <h3>Taman Wisata Alam Pulau Bakut</h3>
        <table>
            <tr>
                <td>No</td>
                <td> : {{$order->id}}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td> : {{$order->name}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td> : {{$order->address}}</td>
            </tr>
            <tr>
                <td>No.Telp</td>
                <td> : {{$order->phone}}</td>
            </tr><br>
            <tr>
                <td>Jumlah</td>
                <td> : {{$order->qty}}</td>
            </tr>
            <tr>
                <td>Total Bayar</td>
                <td> : Rp.{{$order->total_price}}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td> : {{$order->status}}</td>
            </tr>
        </table>
    </div>
</body>
</html>
