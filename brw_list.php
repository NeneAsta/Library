Book Holding<br> <br>
<table border="1" cellpadding="2" cellspacing="0">
	<tr>
		<td>Book ID</td>
		<td>Title</td>
		<td>Lend Date</td>
		<td>Dead Line</td>
		<td>Restore</td>
	</tr>
	<?php
	$sql="SELECT books.bid,books.btitle, transections.tlend, DATE_ADD(transections.tlend, INTERVAL 7 DAY) AS deadline FROM books,transections WHERE books.bid=transections.bid AND transections.mid='$mid' AND transections.tstat='1' ";
	require('mysql/connect.php');
	while($record=mysqli_fetch_array($result)) {
	?>
	<tr>
		<td><?php echo($record[0]);?></td>
		<td><?php echo($record[1]);?></td>
		<td><?php echo($record[2]);?></td>
		<td><?php echo($record[3]);?></td>
		<td><a href="javascript:rstbook('<?php echo($record[0]);?>')">Restore</a></td>
	</tr>
<?php 
} 
require('mysql/unconn.php');
?> 
</table>
<script language="javascript">
function rstbook(v1){
	var url = "rst_save.php?mid=<?php echo($mid);?>&bid=" + v1;
	if(confirm("Restore this book ?")==true){
		window.location.href=url;
	}
}
</script>