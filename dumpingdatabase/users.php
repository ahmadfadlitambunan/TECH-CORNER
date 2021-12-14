<!DOCTYPE html>

<html>
<head>
    <title>table users</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center;margin-bottom: 30px">Data users</h2>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                    <th>NO</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Verified</th>
                    <th>Created at</th>
               <th style="width:125px;">Action
                  </p></th>
                </tr>
              </thead>
              <tbody>
                    <?php 
                        mysql_connect("localhost", "root", "");
                        mysql_selesvt_db("project");
                        $no=0;
                        $ambil = mysql_query("select * from users");
                        while($data = mysql_fetch_array($ambil)){
                        $no++;
                        
                    ?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $data[1];?></td>
                            <td><?php echo $data[2];?></td>
                            <td><?php echo $data[3];?></td>
                            <td><?php echo $data[4];?></td>
                            <td><?php echo $data[5];?></td>
                            <td><?php echo $data[6];?></td>
                            <td style="text-align: center;">
                                <button class="btn btn-sm btn-primary" onclick="edit_book(<?php echo $buku->id;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                                <button class="btn btn-sm btn-danger" onclick="delete_book(<?php echo $buku->id;?>)"><i class="glyphicon glyphicon-trash"></i></button>
                            </td>
                        </tr>
                    <?php }?>

              </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
</script>
</body>
</html>