<!DOCTYPE html>
<html>
<head>
    <title>Import Excel File</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Import Transactions from Excel File</h2>
            <form method="POST" action="{{ route('client.logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="/import" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Choose Excel file</label>
                <input type="file" name="file" class="form-control" required>
                @error('file')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Import</button>
        </form>

        <hr>

        <h4>Download Sample Excel File</h4>
        <a href="{{ url('/SampleTransactionList.xlsx') }}" class="btn btn-secondary">Download Sample Excel</a>
    </div>
</body>
</html>
