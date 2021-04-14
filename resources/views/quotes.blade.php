<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel Pagination Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
<div class="container mt-5">
    <table class="table table-bordered mb-5">
        <thead>
        <tr class="table-success">
            <th scope="col">Quote</th>
        </tr>
        </thead>
        <tbody>
        @foreach($quotes as $data)
            <tr>
                <td>{{ $data }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $quotes->links() !!}
    </div>
</div>
</body>

</html>
