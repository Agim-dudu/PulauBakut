<!DOCTYPE html>
<html>
<head>
    <title>Pembelian Tiket</title>
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
            width: 100%;
            background-image: url("assets/img/fasilitas/depan2.jpg");
            background-size: cover;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            opacity: 90%;
        }

        h1 {
            text-align: center;
        }
        .tarif{}

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
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
    <div class="container" data-image-src="assets/img/fasilitas/tower2.jpg">
        <h1>Tiket</h1>
        <div class="tarif">
            <h3>Tarif Masuk</h3>
            <p>Rp.10.000 / Orang</p>
        </div><br>
    
        <h3>Pembelian Tiket</h3>
        <form method="POST" action="/checkout">
            @csrf
            <input type="text" name="name" id="name" placeholder="Nama Lengkap" required>
            <input type="text" name="address" id="address" placeholder="Email" required>
            <input type="text" name="phone" id="phone" placeholder="no Telp" required>
            <input type="number" name="qty" id="qty" placeholder="Jumlah Tiket" required> {{--  <label for"qty" class="form-label">Tiket</label>  --}}
            <button type="submit">Beli Tiket</button>
        </form>
    </div>
</body>
</html>
