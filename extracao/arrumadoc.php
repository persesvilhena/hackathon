<?php
$conecta = mysqli_connect("localhost", "root", "", "novobanco");
header('Content-Type: text/html; charset=utf-8');
mysqli_query($conecta, "SET NAMES 'utf8'");
mysqli_query($conecta, 'SET character_set_connection=utf8');
mysqli_query($conecta, 'SET character_set_client=utf8');
mysqli_query($conecta, 'SET character_set_results=utf8');

function data($data){
    $data = explode(" ", $data);
    if(isset($dias[2])){
	    if(isset($data[1])){
	        $dias = explode("-", $data[0]);
	        return $data[1] . " " . $dias[2] . "/" . $dias[1] . "/" . $dias[0];
	    }else{
	        $dias = explode("-", $data[0]);
	        return $dias[2] . "/" . $dias[1] . "/" . $dias[0];
	    }  
	}
}

function rdata($data){
    $data = explode(" ", $data);
    if(isset($dias[2])){
	    if(isset($data[1])){
	        $dias = explode("/", $data[1]);
	        return $dias[2] . "-" . $dias[1] . "-" . $dias[0] . " " . $data[0];
	    }else{
	        $dias = explode("/", $data[0]);
	        return $dias[2] . "-" . $dias[1] . "-" . $dias[0];
	    } 
	}else{
		return null;
	}
}

function limpa_codigo($codigo){
	$codigo = str_replace("-", "", $codigo);
	$codigo = str_replace(".", "", $codigo);
	$codigo = str_replace("/", "", $codigo);
	return $codigo;
}





$sql = mysqli_query($conecta, "select * from empresas_empresas");
while($rsql = mysqli_fetch_assoc($sql)){

			$documento = limpa_codigo($rsql['documento']);

			$atualiza ="
				UPDATE `empresas_empresas` 
				SET 
				`documento`= '$documento'
				WHERE codigo = '$rsql[codigo]'";
			mysqli_query($conecta, $atualiza);

}

/*

$sql = mysqli_query($conecta, "select * from empresas");
while($rsql = mysqli_fetch_assoc($sql)){
	$res = tenta($rsql['documento']);
	while(empty($res)){
		if(!empty($res)){
			$res->data_situacao = rdata($res->data_situacao);
			$res->abertura = rdata($res->abertura);
			$res->data_situacao_especial = rdata($res->data_situacao_especial);
			$res->atividade_principal = verifica_atividade($res->atividade_principal[0]);
			atividades($res->atividades_secundarias, $rsql['id']);

			$atualiza ="
				UPDATE `empresas` 
				SET 
				`data_situacao`= '$res->data_situacao',
				`nome_extra`= '$res->nome',
				`uf`= '$res->uf',
				`telefone`= '$res->telefone',
				`email`= '$res->email',
				`atividade_principal`= '$res->atividade_principal',
				`situacao`= '$res->situacao',
				`bairro`= '$res->bairro',
				`logradouro`= '$res->logradouro',
				`numero`= '$res->numero',
				`cep`= '$res->cep',
				`municipio`= '$res->municipio',
				`abertura`= '$res->abertura',
				`natureza_juridica`= '$res->natureza_juridica',
				`fantasia`= '$res->fantasia',
				`cnpj`= '$res->cnpj',
				`ultima_atualizacao`= '$res->ultima_atualizacao',
				`status`= '$res->status',
				`tipo_extra`= '$res->tipo',
				`complemento`= '$res->complemento',
				`efr`= '$res->efr',
				`motivo_situacao`= '$res->motivo_situacao',
				`situacao_especial`= '$res->situacao_especial',
				`data_situacao_especial`= '$res->data_situacao_especial',
				`capital_social`= '$res->capital_social' 
				WHERE codigo = '$rsql[codigo]'";
			mysqli_query($conecta, $atualiza);
		}
	}
}

/*
$sql = mysqli_query($conecta, "select * from empresas");
$rsql = mysqli_fetch_assoc($sql);

$url="http://receitaws.com.br/v1/cnpj/" . limpa_codigo($rsql['documento']);
echo $url;
$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
$res = json_decode($result);
echo "<pre>";
var_dump($res);
echo "</pre>";


$res->data_situacao = rdata($res->data_situacao);
$res->abertura = rdata($res->abertura);
$res->data_situacao_especial = rdata($res->data_situacao_especial);
$res->atividade_principal = verifica_atividade($res->atividade_principal[0]);
atividades($res->atividades_secundarias, $rsql['id']);

$atualiza ="
	UPDATE `empresas` 
	SET 
	`data_situacao`= '$res->data_situacao',
	`nome_extra`= '$res->nome',
	`uf`= '$res->uf',
	`telefone`= '$res->telefone',
	`email`= '$res->email',
	`atividade_principal`= '$res->atividade_principal',
	`situacao`= '$res->situacao',
	`bairro`= '$res->bairro',
	`logradouro`= '$res->logradouro',
	`numero`= '$res->numero',
	`cep`= '$res->cep',
	`municipio`= '$res->municipio',
	`abertura`= '$res->abertura',
	`natureza_juridica`= '$res->natureza_juridica',
	`fantasia`= '$res->fantasia',
	`cnpj`= '$res->cnpj',
	`ultima_atualizacao`= '$res->ultima_atualizacao',
	`status`= '$res->status',
	`tipo_extra`= '$res->tipo',
	`complemento`= '$res->complemento',
	`efr`= '$res->efr',
	`motivo_situacao`= '$res->motivo_situacao',
	`situacao_especial`= '$res->situacao_especial',
	`data_situacao_especial`= '$res->data_situacao_especial',
	`capital_social`= '$res->capital_social' 
	WHERE codigo = '$rsql[codigo]'";
	echo $atualiza;
	echo mysqli_query($conecta, $atualiza);

/*
$x=0;
while(isset($res->feed->data[$x])){
	echo "<fieldset>";
	if(isset($res->feed->data[$x]->from->id)){
		echo "<br><b>From Id: </b>" . $res->feed->data[$x]->from->id;
	}
	if(isset($res->feed->data[$x]->from->name)){
		echo "<br><b>From Name: </b>" . $res->feed->data[$x]->from->name;
	}
	if(isset($res->feed->data[$x]->id)){
		echo "<br><b>Id: </b>" . $res->feed->data[$x]->id;
	}
	if(isset($res->feed->data[$x]->name)){
		echo "<br><b>Name: </b>" . $res->feed->data[$x]->name;
	}
	if(isset($res->feed->data[$x]->description)){
		echo "<br><b>Description: </b>" . $res->feed->data[$x]->description;
	}
	if(isset($res->feed->data[$x]->full_picture)){
		echo "<br><b>Full_picture: </b>" . $res->feed->data[$x]->full_picture;
	}



	if(isset($res->feed->data[$x]->likes)){
		echo "<br><b>Likes:</b>";
		$y=0;
		while(isset($res->feed->data[$x]->likes->data[$y])){
			echo "<fieldset>";
			if(isset($res->feed->data[$x]->likes->data[$y]->id)){
				echo "<br><b>From Id: </b>" . $res->feed->data[$x]->likes->data[$y]->id;
			}
			if(isset($res->feed->data[$x]->likes->data[$y]->name)){
				echo "<br><b>From Name: </b>" . $res->feed->data[$x]->likes->data[$y]->name;
			}
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
				echo "<br><b>Id: </b>" . $res->feed->data[$x]->comments->data[$y]->id;
			}
			if(isset($res->feed->data[$x]->comments->data[$y]->like_count)){
				echo "<br><b>Like count: </b>" . $res->feed->data[$x]->comments->data[$y]->like_count;
			}
			if(isset($res->feed->data[$x]->comments->data[$y]->from->id)){
				echo "<br><b>From Id: </b>" . $res->feed->data[$x]->comments->data[$y]->from->id;
			}
			if(isset($res->feed->data[$x]->comments->data[$y]->from->name)){
				echo "<br><b>From Name: </b>" . $res->feed->data[$x]->comments->data[$y]->from->name;
			}
			if(isset($res->feed->data[$x]->comments->data[$y]->message)){
				echo "<br><b>Message: </b>" . $res->feed->data[$x]->comments->data[$y]->message;
			}

			if(isset($res->feed->data[$x]->comments->data[$y]->comments)){
				echo "<br><b>Comentarios:</b>";
				$z=0;
				while(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z])){
					echo "<fieldset>";
					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->id)){
						echo "<br><b>Id: </b>" . $res->feed->data[$x]->comments->data[$y]->comments->data[$z]->id;
					}
					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->like_count)){
						echo "<br><b>Like count: </b>" . $res->feed->data[$x]->comments->data[$y]->comments->data[$z]->like_count;
					}
					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->from->id)){
						echo "<br><b>From Id: </b>" . $res->feed->data[$x]->comments->data[$y]->comments->data[$z]->from->id;
					}
					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->from->name)){
						echo "<br><b>From Name: </b>" . $res->feed->data[$x]->comments->data[$y]->comments->data[$z]->from->name;
					}
					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->message)){
						echo "<br><b>Message: </b>" . $res->feed->data[$x]->comments->data[$y]->comments->data[$z]->message;
					}

					$z++;
					echo "</fieldset>";
				}
			}


			$y++;
			echo "</fieldset>";
		}
	}



	

	echo"<pre>";
	var_dump($res->feed->data[$x]);
	echo "</pre></fieldset>";



	$x++;
}*/





//$conecta = mysqli_connect("localhost", "root", "", "fb");
//INSERT INTO `feed` (`id`, `from_id`, `from_name`, `name`, `description`, `full_picture`) VALUES ('1', '1', 'teste', 'asdsad', 'asdasd', 'asdasd');


/*

$x=0;
while(isset($res->feed->data[$x])){
	echo "<fieldset>";
	if(isset($res->feed->data[$x]->from->id)){
		echo "<br><b>From Id: </b>" . $res->feed->data[$x]->from->id;
	}
	if(isset($res->feed->data[$x]->from->name)){
		echo "<br><b>From Name: </b>" . $res->feed->data[$x]->from->name;
	}
	if(isset($res->feed->data[$x]->id)){
		echo "<br><b>Id: </b>" . $res->feed->data[$x]->id;
	}
	if(isset($res->feed->data[$x]->name)){
		echo "<br><b>Name: </b>" . $res->feed->data[$x]->name;
	}
	if(isset($res->feed->data[$x]->description)){
		echo "<br><b>Description: </b>" . $res->feed->data[$x]->description;
	}
	if(isset($res->feed->data[$x]->full_picture)){
		echo "<br><b>Full_picture: </b>" . $res->feed->data[$x]->full_picture;
	}



	if(isset($res->feed->data[$x]->likes)){
		echo "<br><b>Likes:</b>";
		$y=0;
		while(isset($res->feed->data[$x]->likes->data[$y])){
			echo "<fieldset>";
			if(isset($res->feed->data[$x]->likes->data[$y]->id)){
				echo "<br><b>From Id: </b>" . $res->feed->data[$x]->likes->data[$y]->id;
			}
			if(isset($res->feed->data[$x]->likes->data[$y]->name)){
				echo "<br><b>From Name: </b>" . $res->feed->data[$x]->likes->data[$y]->name;
			}
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
				echo "<br><b>Id: </b>" . $res->feed->data[$x]->comments->data[$y]->id;
			}
			if(isset($res->feed->data[$x]->comments->data[$y]->like_count)){
				echo "<br><b>Like count: </b>" . $res->feed->data[$x]->comments->data[$y]->like_count;
			}
			if(isset($res->feed->data[$x]->comments->data[$y]->from->id)){
				echo "<br><b>From Id: </b>" . $res->feed->data[$x]->comments->data[$y]->from->id;
			}
			if(isset($res->feed->data[$x]->comments->data[$y]->from->name)){
				echo "<br><b>From Name: </b>" . $res->feed->data[$x]->comments->data[$y]->from->name;
			}
			if(isset($res->feed->data[$x]->comments->data[$y]->message)){
				echo "<br><b>Message: </b>" . $res->feed->data[$x]->comments->data[$y]->message;
			}



			if(isset($res->feed->data[$x]->comments->data[$y]->likes)){
				echo "<br><b>Likes:</b>";
				$z=0;
				while(isset($res->feed->data[$x]->comments->data[$y]->likes->data[$z])){
					echo "<fieldset>";
					if(isset($res->feed->data[$x]->comments->data[$y]->likes->data[$z]->id)){
						echo "<br><b>From Id: </b>" . $res->feed->data[$x]->comments->data[$y]->likes->data[$z]->id;
					}
					if(isset($res->feed->data[$x]->comments->data[$y]->likes->data[$z]->name)){
						echo "<br><b>From Name: </b>" . $res->feed->data[$x]->comments->data[$y]->likes->data[$z]->name;
					}
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
						echo "<br><b>Id: </b>" . $res->feed->data[$x]->comments->data[$y]->comments->data[$z]->id;
					}
					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->like_count)){
						echo "<br><b>Like count: </b>" . $res->feed->data[$x]->comments->data[$y]->comments->data[$z]->like_count;
					}
					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->from->id)){
						echo "<br><b>From Id: </b>" . $res->feed->data[$x]->comments->data[$y]->comments->data[$z]->from->id;
					}
					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->from->name)){
						echo "<br><b>From Name: </b>" . $res->feed->data[$x]->comments->data[$y]->comments->data[$z]->from->name;
					}
					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->message)){
						echo "<br><b>Message: </b>" . $res->feed->data[$x]->comments->data[$y]->comments->data[$z]->message;
					}


					if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->likes)){
						echo "<br><b>Likes:</b>";
						$a=0;
						while(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->likes->data[$a])){
							echo "<fieldset>";
							if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->likes->data[$a]->id)){
								echo "<br><b>From Id: </b>" . $res->feed->data[$x]->comments->data[$y]->comments->data[$z]->likes->data[$a]->id;
							}
							if(isset($res->feed->data[$x]->comments->data[$y]->comments->data[$z]->likes->data[$a]->name)){
								echo "<br><b>From Name: </b>" . $res->feed->data[$x]->comments->data[$y]->comments->data[$z]->likes->data[$a]->name;
							}
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




*/

?>

