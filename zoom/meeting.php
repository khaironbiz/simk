<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Agenda Zoom Meeting</title>
</head>
<?php
 include('../auth/session.php');
?>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>Daftar Rapat Virtual <?= $user_check?></b></div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>#</th>
                            <th>Topik</th>
                            <th>Time</th>
                            <th>Duration</th>
                            <th>Timezone</th>
                            <th>URL Host</th>
                            <th>URL User</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <?php
                            $no         = 1;
                            $now        = time();
                            $sql_meeting = mysqli_query($host, "SELECT * FROM zoom_meeting WHERE start_time>'$now' ORDER BY start_time ASC");
                            while ($data_meeting = mysqli_fetch_array($sql_meeting)){
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data_meeting['meeting_topic']?></td>
                                <td><?= date('d-m-Y H:i:s', $data_meeting['start_time'])?></td>
                                <td><?= ($data_meeting['end_time']-$data_meeting['start_time'])/60; ?> Minutes</td>
                                <td><?= $data_meeting['timezone']?></td>
                                <td class="text-center"><a href="<?= $data_meeting['start_url']?>" class="btn btn-sm btn-primary">Start</a></td>
                                <td class="text-center"><a href="" class="btn btn-sm btn-success">Join</a></td>
                                <td class="text-center"><a href="" class="btn btn-sm btn-info">Detail</a></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>