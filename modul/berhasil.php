<?php
session_start();
include "config/koneksi.php";
$nama = $_SESSION['username'];
$user_level = $_SESSION['user_level'];
if (!isset($_SESSION['username'])) {

    header('location:login.php');
    error_reporting(0);
}


$admin = mysql_num_rows(mysql_query("SELECT * from user "));
$mahasiswa = mysql_num_rows(mysql_query("SELECT * from mahasiswa "));
$datapresensi = mysql_num_rows(mysql_query("SELECT * from datapresensi "));


?>

<!--end row-->
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-3">
        <div class="card report-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-dark font-weight-semibold font-14">Data Admin</p>
                        <h3 class="my-3"><?php echo $admin; ?> Orang</h3>
                        <p class="mb-0 text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span> New Sessions Today</p>
                    </div>
                    <div class="align-self-center"><i class="dripicons-user-group report-main-icon bg-soft-purple text-purple"></i></div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-md-6 col-lg-3">
        <div class="card report-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-dark font-weight-semibold font-14">Data mahasiswa</p>
                        <h3 class="my-3"><?php echo $mahasiswa; ?> Orang</h3>
                        <p class="mb-0 text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>1.5%</span> Weekly Avg.Sessions</p>
                    </div>
                    <div class="align-self-center"><i class="dripicons-user-group report-main-icon bg-soft-purple text-purple"></i></div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-md-6 col-lg-3">
        <div class="card report-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-dark font-weight-semibold font-14">Data Presensi</p>
                        <h3 class="my-3"><?php echo $datapresensi; ?> Orang</h3>
                        <p class="mb-0 text-truncate"><span class="text-danger"><i class="mdi mdi-trending-down"></i>35%</span> Bounce Rate Weekly</p>
                    </div>
                    <div class="align-self-center"><i class="dripicons-user-group report-main-icon bg-soft-purple text-purple"></i></div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    <div class="col-md-6 col-lg-3">
        <div class="card report-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-dark font-weight-semibold font-14">Laporan Presensi</p>
                        <h3 class="my-3"><?php echo $datapresensi; ?> Orang</h3>
                        <p class="mb-0 text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>10.5%</span> Completions Weekly</p>
                    </div>
                    <div class="align-self-center"><i class="dripicons-user-group report-main-icon bg-soft-purple text-purple"></i></div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>


<!--end row-->
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mt-0 mb-3">Last Login</h4>
                <div class="table-responsive browser_users">
                    <table class="table mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th class="wd-15p">No</th>
                                <th class="wd-15p">Username</th>
                                <th class="wd-20p">Tanggal Login</th>


                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = mysql_query("select a.*,c.nama,b.nama from lastlogin a, `user` b, mahasiswa c
where a.id_user=b.id or a.id_user=c.id order by a.id_lastlogin desc limit 10");
                            $no;
                            while ($q = mysql_fetch_array($query)) {
                                $no++;


                                echo "
                              <tr>
                              <td>$no</td>
                               
                                <td>$q[nama]</td>
                                <td>$q[TanggalBuat] </td>
                                </tr>";
                            }


                            ?>