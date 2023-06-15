<!DOCTYPE html>
<html>
<head>
    <title>List Pembelian Tiket</title>
    <style>
        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #259632;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:nth-child(odd) {
            background-color: #ffffff;
        }
        .btncari{
            background-color: #259632;
            color: white;
        }
        .btngunakan{
            background-color: #259632;
            color: white;
        }
    </style>
</head>
<body>
    <h1>List Pembelian Tiket</h1>
    <input type="text" id="searchInput" placeholder="Cari No Tiket">
    <button class="btncari" onclick="search()">Cari</button>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No.Telp</th>
                <th>Jumlah</th>
                <th>Bayar</th>
                <th>Status</th>
                <th>Waktu Pembelian</th>
                <th>Waktu Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->qty }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->updated_at }}</td>
                    
                    <td>
                        @if($order->status == 'Digunakan')
                            Digunakan
                            @elseif($order->status == 'belum di Bayar')
                            <button class="btnbelumgunakan" disabled>Gunakan</button>
                        @else
                            <form action="{{ route('updateStatus', $order->id) }}" method="POST">
                                @csrf
                                <button class="btngunakan" type="submit">Gunakan</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function search() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementsByTagName("table")[0];
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>
