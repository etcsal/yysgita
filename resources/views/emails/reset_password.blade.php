<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Request</title>
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
        <h1>Password Reset Request</h1>
        <p>Kami menerima permintaan untuk menyetel ulang kata sandi Anda. Jika Anda tidak meminta ini, abaikan email ini. Jika tidak, Anda dapat menyetel ulang kata sandi dengan mengeklik tombol di bawah ini:</p>
        <a href="{{ $url }}" class="btn">Reset Password</a>
        <p>Jika Anda tidak meminta pengaturan ulang kata sandi, tidak ada tindakan lebih lanjut yang diperlukan.</p>
        <p>Terimakasih,</p>
        <p>Yayasan Gita Karsa Putri Pasundan</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Yayasan Gita Cahaya Karsa Putri Pasundan. Semua hak dilindungi.
    </div>
</body>
</html>
