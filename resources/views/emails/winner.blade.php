<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winner Notification</title>
</head>
<body>
    <h1>Selamat, {{ $kandidat->nama_kandidat }}!</h1>
    <p>Anda telah memenangkan kompetisi pemungutan suara dengan total {{ $kandidat->votes_count }} vote, pada periode bulan {{$kandidat->bulan}} {{$kandidat->tahun}}</p>
    <p>Detail profile Anda:</p>
    <ul>
        <li>Email: {{ $kandidat->email }}</li>
        <li>Pendidikan: {{ $kandidat->pendidikan }}</li>
        <li>Pekerjaan: {{ $kandidat->pekerjaan }}</li>
        <li>Bahasa: {{ $kandidat->bahasa }}</li>
        <!-- Add other fields as necessary -->
    </ul>
    <p>Terimakadih Atas Partisipasi Anda!</p>
</body>
</html>
