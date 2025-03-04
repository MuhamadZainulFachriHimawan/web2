<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $proses = $_POST['proses'];
    $nama_siswa = $_POST['nama'];
    $mata_kuliah = $_POST['matkul'];
    $nilai_uts = $_POST['nilai_uts'];
    $nilai_uas = $_POST['nilai_uas'];
    $nilai_tugas = $_POST['nilai_tugas'];

    // Calculate the final score
    $nilai_akhir = (0.3 * $nilai_uts) + (0.35 * $nilai_uas) + (0.35 * $nilai_tugas);

    // Determine the grade
    if ($nilai_akhir >= 0 && $nilai_akhir <= 35) {
        $grade = 'E';
    } elseif ($nilai_akhir >= 36 && $nilai_akhir <= 55) {
        $grade = 'D';
    } elseif ($nilai_akhir >= 56 && $nilai_akhir <= 69) {
        $grade = 'C';
    } elseif ($nilai_akhir >= 70 && $nilai_akhir <= 84) {
        $grade = 'B';
    } elseif ($nilai_akhir >= 85 && $nilai_akhir <= 100) {
        $grade = 'A';
    } else {
        $grade = 'I';
    }

    // Determine the predikat
    switch ($grade) {
        case 'E':
            $predikat = 'Sangat Kurang';
            break;
        case 'D':
            $predikat = 'Kurang';
            break;
        case 'C':
            $predikat = 'Cukup';
            break;
        case 'B':
            $predikat = 'Memuaskan';
            break;
        case 'A':
            $predikat = 'Sangat Memuaskan';
            break;
        default:
            $predikat = 'Tidak Ada';
            break;
    }

    // Determine the status
    $status = ($nilai_akhir >= 55) ? 'Lulus' : 'Tidak Lulus';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Penilaian</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" style="padding: .75rem 1.25rem;">Hasil Penilaian</a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card" style="border-style: none;">
            <div class="card-header bg-white">
                <h3 style="margin-left: 0;">Hasil Penilaian Siswa</h3>
            </div>
            <div class="card-body col-12 text-end align-middle">
                <h4>Hasil Penilaian</h4>
                <p>Proses: <?php echo $proses; ?></p>
                <p>Nama: <?php echo $nama_siswa; ?></p>
                <p>Mata Kuliah: <?php echo $mata_kuliah; ?></p>
                <p>Nilai UTS: <?php echo $nilai_uts; ?></p>
                <p>Nilai UAS: <?php echo $nilai_uas; ?></p>
                <p>Nilai Tugas Praktikum: <?php echo $nilai_tugas; ?></p>
                <p>Nilai Akhir: <?php echo $nilai_akhir; ?></p>
                <p>Status: <?php echo $status; ?></p>
                <p>Grade: <?php echo $grade; ?></p>
                <p>Predikat: <?php echo $predikat; ?></p>
            </div>
        </div>
    </div>
</body>

</html>