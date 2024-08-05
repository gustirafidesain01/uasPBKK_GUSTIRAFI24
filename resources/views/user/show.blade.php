<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tampil Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .card {
            background: #ffffff;
        }
        .card-body h3 {
            font-size: 1.5rem;
            color: #007bff;
        }
        .card-body p {
            font-size: 1rem;
            color: #6c757d;
        }
        .card {
            border: 1px solid #dee2e6;
        }
        .section-header {
            background: #007bff;
            color: #ffffff;
            padding: 10px 0;
        }
        .section-header h3 {
            margin: 0;
        }
        .section-header hr {
            margin: 10px 0 0;
            border-color: #ffffff;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header text-center">
                    <h3>Data Pengguna</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded mt-4">
                    <div class="card-body">
                        <h3>{{ $pengguna->username }}</h3>
                        <p><strong>Email:</strong> {{ $pengguna->email }}</p>
                        <p><strong>Level:</strong> {{ $pengguna->level }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
