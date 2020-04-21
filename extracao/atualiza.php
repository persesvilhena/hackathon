<?php
function recebe($valor){
	if($valor == NULL){
		$valor = "";
	}else{
		$valor = addslashes($valor);
	}
	return $valor;
}



$url="https://graph.facebook.com/v2.9/968745106584258?fields=feed.limit(1000)%7Bcomments.limit(1000)%7Bmessage%2Ccomments.limit(1000)%7Bmessage%2Cfrom%2Clike_count%2Clikes.limit(1000)%7Bname%7D%7D%2Clike_count%2Clikes.limit(1000)%7Bname%7D%2Cfrom%7D%2Cname%2Cdescription%2Clikes.limit(1000)%7Bname%7D%2Cfrom%2Cfull_picture%2Cmessage%7D&access_token=1399292373469355%7C9459ccbd52aec971c15d7ad32caaeae0";
$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
$res = json_decode($result);



$conecta = mysqli_connect("localhost", "root", "", "fb");
header('Content-Type: text/html; charset=utf-8');
mysqli_query($conecta, "SET NAMES 'utf8'");
mysqli_query($conecta, 'SET character_set_connection=utf8');
mysqli_query($conecta, 'SET character_set_client=utf8');
mysqli_query($conecta, 'SET character_set_results=utf8');

$query = mysqli_query($conecta, "TRUNCATE feed;");
$query = mysqli_query($conecta, "TRUNCATE comments;");
$query = mysqli_query($conecta, "TRUNCATE comments2;");
$query = mysqli_query($conecta, "TRUNCATE like_comments;");
$query = mysqli_query($conecta, "TRUNCATE like_comments2;");
$query = mysqli_query($conecta, "TRUNCATE like_feed;");
if($query){ echo "sucesso!<br>"; }else{ echo "ERROR<br>"; }




$x=0;
while(isset($res->feed->data[$x])){
	echo "<fieldset>";
	if(isset($res->feed->data[$x]->from->id)){
		$from_id = recebe($res->feed->data[$x]->from->id);
	}else{ $from_id = null; }
	if(isset($res->feed->data[$x]->from->name)){
		$from_name = recebe($res->feed->data[$x]->from->name);
	}else{ $from_name = null; }
	if(isset($res->feed->data[$x]->id)){
		$id = recebe($res->feed->data[$x]->id);
	}else{ $id = null; }
	if(isset($res->feed->data[$x]->name)){
		$name = recebe($res->feed->data[$x]->name);
	}else{ $name = null; }
	if(isset($res->feed->data[$x]->description)){
		$description = recebe($res->feed->data[$x]->description);
	}else{ $description = null; }
	if(isset($res->feed->data[$x]->full_picture)){
		$full_picture = recebe($res->feed->data[$x]->full_picture);
	}else{ $full_picture = null; }
	if(isset($res->feed->data[$x]->message)){
		$message = recebe($res->feed->data[$x]->message);
	}else{ $message = null; }
	$var = "INSERT INTO feed (id, from_id, from_name, name, description, full_picture, message) VALUES('$id', '$from_id', '$from_name', '$name', '$description', '$full_picture', '$message');";
	$query = mysqli_query($conecta, $var);

	if($query){ echo "sucesso!<br>"; }else{ echo "ERROR<br>";echo $var; }




	if(isset($res->feed->data[$x]->likes)){
		echo "<br><b>Likes:</b>";
		$y=0;
		while(isset($res->feed->data[$x]->likes->data[$y])){
			echo "<fieldset>";
			if(isset($res->feed->data[$x]->likes->data[$y]->id)){
				$from_id = recebe($res->feed->data[$x]->likes->data[$y]->id);
			}
			if(isset($res->feed->data[$x]->likes->data[$y]->name)){
				$from_name = recebe($res->feed->data[$x]->likes->data[$y]->name);
			}
			$var = "INSERT INTO `like_feed` (`from_id`, `from_name`, `id_feed`) VALUES ('$from_id', '$from_name', '$id');";
			$query = mysqli_query($conecta, $var);
			if($query){ echo "sucesso!<br>"; }else{ echo "ERROR<br>";echo $var; }


			$y++;
			echo "</fieldset>";
		}
	}




	if(isset($res->feed->data[$x]->comments)){
		echo "<br><b>Comentarios:</b>";
		$y=0;
		while(isset($res->feed->data[$x]->comments->data[$y])){
			echo "<fieldset>";
			if(isset($res->feed->data[$x]->comments->data[$y]->id)){
				$id_comment = recebe($res->feed->data[$x]->comments->data[$y]->id);
			}
			if(isset($res->feed->data[$x]->comments->data[$y]->like_count)){
				$like_count = recebe($res->feed->data[$x]->comments->data[$y]->like_count);
			}
			if(isset($res->feed->data[$x]->comments->data[$y]->from->id)){
				$from_id = recebe($res->feed->data[$x]->comments->data[$y]->from->id);
			}
			if(isset($res->feed->data[$x]->comments->data[$y]->from->name)){
				$from_name = recebe($res->feed->data[$x]->comments->data[$y]->from->name);
			}
			if(isset($res->feed->data[$x]->comments->data[$y]->message)){
				$message = recebe($res->feed->data[$x]->comments->data[$y]->message);
			}
			$var = "INSERT INTO `comments` (`id`, `id_feed`, `like_count`, `from_id`, `from_name`, `message`) VALUES ('$id_comment', '$id', '$like_count', '$from_id', '$from_name', '$message');";
			$query = mysqli_query($conecta, $var);
			if($query){ echo "sucesso!<br>"; }else{ echo "ERROR<br>";echo $var; }





			if(isset($res->feed->data[$x]->comments->data[$y]->likes)){
				echo "<br><b>Likes:</b>";
				$z=0;
				while(isset($res->feed->data[$x]->comments->data[$y]->likes->data[$z])){
					echo "<fieldset>";
					if(isset($res->feed->data[$x]->comments->data[$y]->likes->data[$z]->id)){
						$from_id = recebe($res->feed->data[$x]->comments->data[$y]->likes->data[$z]->id);
					}
					if(isset($res->feed->data[$x]->comments->data[$y]->likes->data[$z]->name)){
						$from_name = recebe($res->feed->data[$x]->comments->data[$y]->likes->data[$z]->name);
					}
					$var = "INSERT INTO `like_comments` (`from_id`, `from_name`, `id_comments`) VALUES ('$from_id', '$from_name', '$id_comment');";
					$query = mysqli_query($conecta, $var);
					if($query){ echo "sucesso!<br>"; }else{ echo "ERROR<br>";echo $var; }

					$z++;
					echo "</fieldset>";
				}
			}
			





			if(isset($res->feed->data[$x]->comments->data[$y]->comments)){
				echo "<br><b>Comentarios:</b>";
				$z=0;
				while(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z])){
					echo "<fieldset>";
					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->id)){
						$id_comment2 = recebe($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->id);
					}
					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->like_count)){
						$like_count = recebe($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->like_count);
					}
					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->from->id)){
						$from_id = recebe($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->from->id);
					}
					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->from->name)){
						$from_name = recebe($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->from->name);
					}
					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->message)){
						$message = recebe($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->message);
					}
					$var = "INSERT INTO `comments2` (`id`, `id_comments`, `like_count`, `from_id`, `from_name`, `message`) VALUES ('$id_comment2', '$id_comment', '$like_count', '$from_id', '$from_name', '$message');";
					$query = mysqli_query($conecta, $var);
					if($query){ echo "sucesso!<br>"; }else{ echo "ERROR<br>";echo $var; }



					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->likes)){
						echo "<br><b>Likes:</b>";
						$a=0;
						while(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->likes->data[$a])){
							echo "<fieldset>";
							if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->likes->data[$a]->id)){
								$from_id = recebe($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->likes->data[$a]->id);
							}
							if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->likes->data[$a]->name)){
								$from_name = recebe($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->likes->data[$a]->name);
							}
							$var = "INSERT INTO `like_comments2` (`from_id`, `from_name`, `id_comments2`) VALUES ('$from_id', '$from_name', '$id_comment2');";
							$query = mysqli_query($conecta, $var);
							if($query){ echo "sucesso!<br>"; }else{ echo "ERROR<br>";echo $var; }




							$a++;
							echo "</fieldset>";
						}
					}



					$z++;
					echo "</fieldset>";
				}


			}


			$y++;
			echo "</fieldset>";
		}
	}
	$x++;
	echo "</fieldset>";
}






?>

