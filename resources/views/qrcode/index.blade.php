<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>How To Generate QRcode In Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
    <div class="container">
        <h2>Click on button to generate Qrcode</h2>
        <form class="text-center" action="{{ route('qrcode.create') }}" method="get" accept-charset="utf-8">
            <div class="form-group">
                <input type="text" class="form-control" name="url" placeholder="url">
            </div>
            <button class="btn btn-success" type="submit">Generate</button>
            {{-- <a href="{{ asset('qrcode.png') }}" class="btn btn-primary" download>Download</a><br> --}}
            {{-- <img class="img-thumbnail" src="{{ $image }}" width="500" height="500" style="margin-top: 20px"> --}}
        </form>
    </div>

</body>

</html>
