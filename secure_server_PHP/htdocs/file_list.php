<table border="1">
<tr>
	<th>저장된 파일명</th>
</tr>
<?php
$connect = mysqli_connect("localhost","root","","test") or die("fail");
$query = "SELECT * FROM upload_file ORDER BY reg_time DESC";

$result = $connect->query($query);

while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
  <td><a href="data/download.php?file_name=<?= $row['name_orig'] ?>" target="_blank"><?= $row['name_orig'] ?></a></td>
</tr>
<?php
} 
mysqli_close($connect);
?>
</table>
