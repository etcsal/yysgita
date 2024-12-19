{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <style>
        /* Styling kustom untuk email */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333333;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 20px;
        }

        .content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            margin: 20px auto;
            max-width: 600px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            margin: 20px auto;
            font-size: 12px;
            color: #999999;
        }
    </style>
</head>
<body>
    <div class="header">
        
        <p>Yayasan</p>
        <p >Gita Cahaya Karsa Putri Pasundan</p> 
    </div>
    <div class="content">
        <h1>Halo!</h1>
        <p>Silakan klik tombol di bawah ini untuk memverifikasi email Anda:</p>
        <a href="{{ $actionUrl }}" class="btn btn-primary text-center">{{ $actionText }}</a>
        <p>Jika Anda tidak membuat akun, abaikan email ini.</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Yayasan Gita Cahaya Karsa Putri Pasundan. Semua hak dilindungi.
    </div>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 16px;
            color: #555;
        }
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            font-size: 12px;
            color: #777;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Yayasan</p>
        <p >Gita Cahaya Karsa Putri Pasundan</p> 
        <h1>Halo!</h1>
        <p>Silakan klik tombol di bawah ini untuk memverifikasi email Anda:</p>
        <a href="{{ $actionUrl }}" class="btn btn-primary text-center">{{ $actionText }}</a>
        <p>Jika Anda tidak membuat akun, abaikan email ini.</p>
        <p>Terimakasih,</p>
        <p>Yayasan Gita Karsa Putri Pasundan</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Yayasan Gita Cahaya Karsa Putri Pasundan. Semua hak dilindungi.
    </div>
</body>
</html>

