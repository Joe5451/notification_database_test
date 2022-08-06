<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        @foreach ($notifications as $notification)
            <div class="alert alert-success alert-dismissible fade show" notification-id="{{ $notification->id }}" role="alert">
                <p>
                    <b>{{ $notification->data['name'] }}</b> 於 {{ $notification->data['message'] }}</p>
                    <button type="button" onclick="sendMarkRequest('{{ $notification->id }}');" class="btn-close" aria-label="Close"></button>
            </div>
        @endforeach

        <script>
            function sendMarkRequest(id) {
                // console.log(id);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('markNotification') }}',
                    dataType: 'json',
                    data: {
                        id,
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (res) {
                        console.log(res);
                        
                        if (res.status == 'success') {
                            $('.alert[notification-id=' + id + ']').remove();
                        } else {
                            alert('標為已讀失敗!');
                        }
                    },
                    error: function(err)
                    {
                        console.log(err);
                    },
                });
            }
        </script>
    </div>
</body>
</html>