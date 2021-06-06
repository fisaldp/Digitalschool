<?php include 'header.php'; ?>
<?php
$sql_berita = "SELECT nama_file FROM ebook WHERE ebook.id='$_GET[id]'";

$qry_berita = $mysqli->query($sql_berita) or die($mysqli->error);

$num = $qry_berita->num_rows;

$data = $qry_berita->fetch_assoc();
?>
<div class="container-fluid body">
    <div class="row">
        <div class="col-lg-2 sidebar">
            <?php include 'sidebar.php'; ?>
        </div>
        <div class="col-lg-10 main-content">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php
                    if ($num == 0) {
                        header('location:berita.php');
                    } else {
                        $del_sql = "DELETE FROM ebook WHERE ebook.id='$_GET[id]'";

                        $del_qry = $mysqli->query($del_sql);

                        if ($del_qry) {
                            unlink('../file/' . $data['nama_file']);
                            echo "<meta http-equiv='refresh' content='0;url=bsd.php'>";
                            echo "<h3 class='page-header'><i class='fa fa-refresh fa-spin'></i> Data berhasil dihapus</h3>";
                        } else {
                            echo $mysqli->error;
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>