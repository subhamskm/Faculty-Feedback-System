<?php
$sql = "SELECT id, name FROM teachers";
$result = mysqli_query($conn, $sql);
$teachers = array();
$teacherid = array();
$n = mysqli_num_rows($result);
$i = 0;
if ( $n > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $teacherid[$i] = $row["id"];
        $teachers[$teacherid[$i]] = $row["name"];
        $i = $i + 1;
    }
}
?>