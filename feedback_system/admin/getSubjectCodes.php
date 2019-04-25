<?php
    include('../database_con.php');
    $sql = "SELECT code from batch_record where sem = " . $_GET["sem"] . " and batch = " . $_GET["batch"] . " and teacher = " . $_GET["teacherid"] . "; ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
            echo "<option value = '" . $row["code"] . "'>" . $row["code"] . "</option>";
    }
?>