<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">

        <table class="table">
            <thead class="table-warning">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">QTY</th>
                    <th scope="col">SUB TOTAl</th>
                    <th scope="col">CREATED AT</th>
                    <th scope="col">UPDATED AT</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $cartItem)
                    <tr>
                        <td>{{ $cartItem->id }}</td>
                        <td>{{ $cartItem->product->product_name }}</td>
                        <td>{{ $cartItem->item_quantity }}</td>
                        <td>{{ $cartItem->total_item_price }}</td>
                        <td>{{ $cartItem->created_at }}</td>
                        <td>{{ $cartItem->updated_at }}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

</body>
@vite(['resources/sass/app.scss', 'resources/js/app.js'])

</html>
