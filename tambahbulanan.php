<?php 
    session_start();
    require "koneksi.php";
     
    if (isset($_POST["submit"])) {
        if (tambahMasuk($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'datamemberbulanan.php';
                </script>
                ";
        } else {
            echo "
                <script>
                    alert('data gagal digagalkan!');
                </script>
                ";
        }
    }
    
    $month = date('m');
    $day = date('d');
    $year = date('Y');

    $today = $year . '-' . $month . '-' . $day;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="gym.png">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">
    <link rel="stylesheet" href="css/styler.css?v=1.0">
    <link rel="stylesheet" href="css/dashboard.css?v=1.0">
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="js/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

    <style>
    
.rentang {
    padding-bottom: 75px;
}
    </style>
</head>

<body>
    <div class="header">
        <img src="gym.png" width="1px" height="1px" class="float-right logo-fav">
        <h3 class="text-secondary font-weight-bold float-left logo">RONI</h3>
        <h3 class="text-secondary float-left logo2">- GYM</h3>
    </div>

    <div class="sidebar">
        <nav>
            <ul>
                <li class="rentang">
                    <img src="gym.png" class="img-fluid profile float-left" width="80px">

                </li>
                <script>
                    $(document).ready(function () {
                        $("#flip").click(function () {
                            $("#panel").slideToggle("medium");
                            $("#panel2").slideToggle("medium");
                        });
                        $("#flip2").click(function () {
                            $("#panel3").slideToggle("medium");
                            $("#panel4").slideToggle("medium");
                        });
                    });
                </script>
                <!-- dashboard -->
                    <a href="dashboard.html" style="text-decoration: none;">
                    <li>
                        <div>
                            <span class="fas fa-tachometer-alt"></span>
                            <span>Dashboard</span>
                        </div>
                    </li>
                </a>
                <li class="klik" id="flip" style="cursor:pointer;">
                    <div>
                        <span class="fas fa-database"></span>
                        <span>Data Anggota GYM</span>
                        <i class="fas fa-caret-right float-right" style="line-height: 20px;"></i>
                    </div>
                </li>

                <a href="datamemberbulanan.php" class="linkAktif">
                    <li id="panel" style="display: none;">
                        <div style="margin-left: 20px;">
                            <span><i class="fas fa-file-invoice-dollar"></i></span>
                            <span>Data Member Gym Bulanan</span>
                        </div>
                    </li>
                </a>

                <a href="datamemberharian.php" class="linkAktif">
                    <li id="panel2" style="display: none;">
                        <div style="margin-left: 20px;">
                            <span><i class="fas fa-hand-holding-usd"></i></span>
                            <span>Data Member Gym Harian</span>
                        </div>
                    </li>
                </a>
                <!-- dashboard -->

                <!-- Input -->
                <li class="klik2" id="flip2" style="cursor:pointer;">
                    <div>
                        <span class="fas fa-plus-circle"></span>
                        <span>Input Data Member</span>
                        <i class="fas fa-caret-up float-right" style="line-height: 20px;"></i>
                    </div>
                </li>

                <a href="tambahbulanan.php" class="linkAktif">
                    <li class="aktif" id="panel3" style="border-left: 5px solid #306bff;">
                        <div style="margin-left: 20px;">
                            <span><i class="fas fa-file-invoice-dollar"></i></span>
                            <span>Input Data Member Bulanan</span>
                        </div>
                    </li>
                </a>

                <a href="tambahharian.php" class="linkAktif">
                    <li id="panel4">
                        <div style="margin-left: 20px;">
                            <span><i class="fas fa-hand-holding-usd"></i></span>
                            <span>Input Data Member Harian</span>
                        </div>
                    </li>
                </a>

                <a href="index.html" style="text-decoration: none;">
                    <li>
                        <div>
                            <span><i class="fas fa-sign-out-alt float-right log"></i></span>
                            <span>Loggout</span>
                        </div>
                    </li>
                </a>

                <!-- change icon -->
                <script>
                    $(".klik").click(function () {
                        $(this).find('i').toggleClass('fa-caret-up fa-caret-right');
                        if ($(".klik").not(this).find("i").hasClass("fa-caret-right")) {
                            $(".klik").not(this).find("i").toggleClass('fa-caret-up fa-caret-right');
                        }
                    });
                    $(".klik2").click(function () {
                        $(this).find('i').toggleClass('fa-caret-up fa-caret-right');
                        if ($(".klik2").not(this).find("i").hasClass("fa-caret-right")) {
                            $(".klik2").not(this).find("i").toggleClass('fa-caret-up fa-caret-right');
                        }
                    });
                </script>
                <!-- change icon -->
            </ul>
        </nav>
    </div>
      <div class="main-content">
        <div class="konten">
            <div class="konten_dalem">
                <h2 class="head" style="color: #4b4f58;">DATA MEMBER BULANAN</h2>
                <hr style="margin-top: -5px;">
                <div class="headline">
                    <h5>Tambah Data Member Bulanan</h5>
                </div>
                <div class="container">
                    <div class="konten_isi">
                        <table class="table-sm">
                            <script type="text/javascript" src="js/pisahTitik.js"></script>
                            <form class="form-text" action="" method="post">
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                  <td><input class="form-control" type="text" name="nama_member" autocomplete="off" required></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Masuk Member</td>
                                    <td>:</td>
                                    <td><input class="form-control" type="date" name="tanggal_masuk" autocomplete="off" required></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                   <td><input class="form-control" type="text" name="alamat" autocomplete="off" required></td>
                                </tr>
                                <tr>
                                    <td>Jenis Member</td>
                                    <td>:</td>
                                    <td>
                                        <select name="kls_member" class="form-control">
                                            <option>Bulanan</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="hidden" name="username" value="<?= $ambilNama ?>"></td>
                                    <td></td>
                                    <td>
                                        <center><button class="btn btn-primary btn-block" type="submit" name="submit">tambah data</button></center>
                                    </td>
                                </tr>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>