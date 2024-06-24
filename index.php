<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Case OOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            box-shadow:0 0 20px rgba(0,0,0,0.1);
            width: 500px;
            border-radius: 6px;
            margin-top: 10px;
            margin-bottom: 10px;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <center>
        <div class="container">
        <h2>Rental Motor</h2>
        <table>
        <form action="" method="post">
        <tr>
            <td>Nama Pelanggan</td>
            <td>:</td>
            <td><input class="form-control" type="text" name="nama" required></td>
        </tr>
        <tr>
            <td>Lama Waktu Rental (per hari)</td>
            <td>:</td>
            <td><input class="form-control" type="number" name="lamaRental" required></td>
        </tr>
        <tr>
            <td>Jenis Motor</td>
            <td>:</td>
            <td>
            <select class="form-select" id="jenis" name="jenis" required>
                <option value="Scooter">Scooter</option>
                <option value="Matic">Matic</option>
                <option value="Sport">Sport</option>
                <option value="Cross">Cross</option>
            </select>
            </td>
        </tr>
        <tr>
                <td></td>
                <td></td>
                <td><input class="btn btn-primary" type="submit" value="Submit" name="submit"></td>
        </tr>
            </form>
            </table>
        </div>
        <div style="border: 1px solid black; width: 40%; padding: 10px; margin:10px; border-radius: 6px;">
        <?php
            include 'logic.php';
            $proses = new Rental();
            $proses->setHarga(70000, 90000, 90000, 100000);

            if (isset($_POST['submit'])) {
                $proses->member = $_POST['nama'];
                $proses->jenis = $_POST['jenis'];
                $proses->waktu = $_POST['lamaRental'];

                $proses->Pembayaran();
            }
            ?>
        </div>
    </center>
</body>
</html>
