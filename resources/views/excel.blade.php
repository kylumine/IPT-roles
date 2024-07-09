<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        *{
            font-family: Arial, Helvetica, sans-serif
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td{
            border: 1px solid #333;
        }
    </style>
</head>
<body>
    <h1>Movies List</h1>

    <hr>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Rate</th>

            </tr>
        </thead>
        <tbody>
            @foreach($movie as $mov)
                <tr>
                    <td>{{ $mov->id }}</td>
                    <td>{{ $mov->title }}</td>
                    <td>{{ $mov->genre }}</td>
                    <td>{{ $mov->rate_per_day }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>
