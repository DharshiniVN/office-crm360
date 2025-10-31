<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaign Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Campaign Details</h4>
                <a href="{{ url()->previous() }}" class="btn btn-light btn-sm">← Back</a>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th style="width: 200px;">Client Name:</th>
                        <td>{{ $data->clientName }}</td>
                    </tr>
                    <tr>
                        <th>Project Name:</th>
                        <td>{{ $data->projectName }}</td>
                    </tr>
                    <tr>
                        <th>Client Mobile:</th>
                        <td>{{ $data->clientMob }}</td>
                    </tr>
                    <tr>
                        <th>Client Gmail ID:</th>
                        <td>{{ $data->clientGmailID }}</td>
                    </tr>
                </table>
                <div class="mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
