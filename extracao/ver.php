
<?php
$conecta = mysqli_connect("localhost", "root", "", "fb");
header('Content-Type: text/html; charset=utf-8');
mysqli_query($conecta, "SET NAMES 'utf8'");
mysqli_query($conecta, 'SET character_set_connection=utf8');
mysqli_query($conecta, 'SET character_set_client=utf8');
mysqli_query($conecta, 'SET character_set_results=utf8');



$sql = mysqli_query($conecta, "select * from feed");
while($rsql = mysqli_fetch_assoc($sql)){
	echo "<fieldset>
	<br><b>From Id: </b>" . $rsql['from_id'] . "
	<br><b>From Name: </b>" . $rsql['from_name'] . "
	<br><b>Id: </b>" . $rsql['id'] . "
	<br><b>Name: </b>" . $rsql['name'] . "
	<br><b>Description: </b>" . $rsql['description'] . "
	<br><b>Message: </b>" . $rsql['message'] . "
	<br><b>Full_picture: </b>" . $rsql['full_picture'] ."";
	

	echo "<br><b>Likes:</b>";
	$sql1 = mysqli_query($conecta, "select * from like_feed where id_feed = '$rsql[id]'");
	while($rsql1 = mysqli_fetch_assoc($sql1)){
		echo "<fieldset>
		<br><b>From Id: </b>" . $rsql1['from_id'] . "
		<br><b>From Name: </b>" . $rsql1['from_name'] . "
		</fieldset>";
	}
	




	echo "<br><b>Comentarios:</b>";
	$sql1 = mysqli_query($conecta, "select * from comments where id_feed = '$rsql[id]'");
	while($rsql1 = mysqli_fetch_assoc($sql1)){
		echo "<fieldset>
		<br><b>Id: </b>" . $rsql1['id'] . "
		<br><b>Like count: </b>" . $rsql1['like_count'] . "
		<br><b>From Id: </b>" . $rsql1['from_id'] . "
		<br><b>From Name: </b>" . $rsql1['from_name'] . "
		<br><b>Message: </b>" . $rsql1['message'];



		echo "<br><b>Likes:</b>";
		$sql2 = mysqli_query($conecta, "select * from like_comments where id_comments = '$rsql1[id]'");
		while($rsql2 = mysqli_fetch_assoc($sql2)){
			echo "<fieldset>
			<br><b>From Id: </b>" . $rsql2['from_id'] . "
			<br><b>From Name: </b>" . $rsql2['from_name'] . "
			</fieldset>";
		}
		


		echo "<br><b>Comentarios2:</b>";
		$sql2 = mysqli_query($conecta, "select * from comments2 where id_comments = '$rsql1[id]'");
		while($rsql2 = mysqli_fetch_assoc($sql2)){
			echo "<fieldset>
			<br><b>Id: </b>" . $rsql2['id'] . "
			<br><b>Like count: </b>" . $rsql2['like_count'] . "
			<br><b>From Id: </b>" . $rsql2['from_id'] . "
			<br><b>From Name: </b>" . $rsql2['from_name'] . "
			<br><b>Message: </b>" . $rsql2['message'];



			echo "<br><b>Likes:</b>";
			$sql3 = mysqli_query($conecta, "select * from like_comments2 where id_comments2 = '$rsql2[id]'");
			while($rsql3 = mysqli_fetch_assoc($sql3)){
				echo "<fieldset>
				<br><b>From Id: </b>" . $rsql3['from_id'] . "
				<br><b>From Name: </b>" . $rsql3['from_name'] . "
				</fieldset>";
			}
			echo "</fieldset>";
		}
		echo "</fieldset>";
	}
	echo "</fieldset>";
}






?>

