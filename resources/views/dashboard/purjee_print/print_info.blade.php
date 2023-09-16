<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
         <div class="row">
            <div class="col-md-12">
                <a href="" onclick="window.print()" class="btn btn-success btn-sm mt-2">Print This Page</a>
                <table class="mt-2 table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Season</th>
                            <th>Purjee No</th>
                            <th>Deliver Date</th>
                            <th>Grower Name</th>
                            <th>Center</th>
                            <th>Unit</th>
                            <th>Grower Father Name</th>
                            <th>Village</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->season }}</td>
                                <td>{{ $item->purjeeno }}</td>
                                <td>{{ $item->deliverdate }}</td>
                                <td>{{ $item->center_id }}</td>
                                <td>{{ $item->unit_id }}</td>
                                <td>{{ $item->season }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
         </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
