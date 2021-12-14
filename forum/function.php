<?php
    //search 2
include('../_config/connect.php');

    $posting = query("SELECT * FROM posting");

    if( isset($_POST["search"]) ) {
    $posting = search($_POST["search"]);
    }

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function search($search) {
        $query = "SELECT * FROM posting WHERE konten LIKE '$search%' OR judul LIKE '$search%' OR kategori LIKE '$search%'";
        return query($query);
    }

?>