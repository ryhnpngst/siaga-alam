<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notifikasi Aduan Baru</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }

        h1 {
            font-size: 18px;
            margin-bottom: 20px;
        }

        p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .signature {
            font-style: italic;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            color: #ffffff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Notifikasi Aduan Baru</h1>
        <p>Halo Admin,</p>
        <p>Ada aduan baru yang masuk ke sistem. Mohon segera diperiksa untuk tindakan lebih lanjut.</p>
        <p>Detail aduan:</p>
        <p><strong>Jenis Bencana/Inside:</strong> {{ $report->category }}</p>
        <p><strong>Deskripsi:</strong> {{ $report->description }}</p>
        <p><strong>Tanggal:</strong>
            {{ \Carbon\Carbon::parse($report->created_at)->translatedFormat('l, d F Y \j\a\m H:i') }}</p>
        <p><strong>Lokasi:</strong> {{ $report->location }}</p>
        <p>Silakan klik tombol di bawah ini untuk melihat detail lengkap:</p>
        <p><a href="https://siagaalam.my.id/admin/reports" class="button">Lihat Aduan</a></p>
    </div>
</body>

</html>
