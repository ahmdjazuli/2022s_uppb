<?php require('atas.php') ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><button class="btn btn-primary btn-lg"><a href="inventori_input.php" style="color: white; text-decoration: none">+Data Stok Barang</a></button></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTables-example">
                                <thead class="success">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Berat/Satuan</th>
                                        <th>Harga Jual</th>
                                        <th>Stok</th>
                                        <th><i class="fa fa-toggle-on"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; $query = mysqli_query($kon, "SELECT * FROM inventori ORDER BY namainven ASC");
                                        while($data = mysqli_fetch_array($query)){ ?>
                                            <tr class="odd gradeX">
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $data['namainven'] ?></td>
                                                    <td><?= $data['satuan'] ?></td>
                                                    <td><?= number_format($data['harga'],0,'.','.') ?></td>
                                                    <td><?= $data['stok'] ?></td>
                                                    <td>
                                                        <a href="inventori_edit.php?idinventori=<?php echo $data['idinventori']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"></i></a>
                                                        <a href="delete.php?idinventori=<?php echo $data['idinventori'] ?>" class="btn btn-primary btn-sm"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                        <?php } ?>
                                          
                                </tbody>
                            </table>
                        </div>
                                    
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php require('bawah.php') ?>
