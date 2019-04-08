<?php

extract($_GET);
session_start();

?>
<link rel="stylesheet" type="text/css" href="css/loby.css">
<?php

if ($res == 1) {
	?><h1 style="position: fixed; color: white; text-align: center; width: 100%; text-shadow: 2px 2px 5px black; font-family: fantasy;">Ton adversaire a rage quit</h1><?php
} else {
    if ($_SESSION['id'] == $gg) {
        ?><h1 style="position: fixed; color: white; text-align: center; width: 100%; text-shadow: 2px 2px 5px black; font-family: fantasy;">tu as gagne la partie</h1><?php
    } else {
        ?><h1 style="position: fixed; color: white; text-align: center; width: 100%; text-shadow: 2px 2px 5px black; font-family: fantasy;">tu as perdu la partie</h1><?php
    }
}
$joueur = explode(';', $ids);
$ex = explode('.', $joueur[1]);
$joueur[1] = $ex[0];


$get_inf = file('membres/membre.cvs');
$data = file('membres/historique.cvs');

$j1_points = 0;
$j2_points = 0;

if ($res == 1) {
    $id_j1 = $_SESSION['id'];
    $id_j2 = $joueur[0];
    $j1 = explode(";", $get_inf[$id_j1 - 1]);
    $j2 = explode(";", $get_inf[$id_j2 - 1]);
    $line = $id_j1.";".date("Y/m/d").";victoire;".intval($j1[4] + 5)."\n";
    $j1_points = 5;
    if (intval($j2[4] - 2) > 0) {
        $line1 = $id_j2.";".date("Y/m/d").";defaite;".intval($j2[4] - 2)."\n";
        $j2_points = -2;
    } else {
        $line1 = $id_j2.";".date("Y/m/d").";defaite;0"."\n";
    }
    file_put_contents('membres/historique.cvs', $line, FILE_APPEND);
    file_put_contents('membres/historique.cvs', $line1, FILE_APPEND);
    
    if (intval($j2[4] - 2) > 0)
        $j2[4] = intval($j2[4] - 2);
    else
        $j2[4] = 0;
    $j1[4] = intval($j1[4] + 5);
    $get_inf[$id_j2 - 1] = implode(";", $j2);
    $get_inf[$id_j1 - 1] = implode(";", $j1);
    $i = 0;
    file_put_contents('membres/membre.cvs', "");
    while (isset($get_inf[$i])) {
        file_put_contents('membres/membre.cvs', $get_inf[$i], FILE_APPEND);
        $i++;
    }
} else {
    $file_to_check = "writing.cvs";
    $data = file($file_to_check);
    $i = 0;
    $count = 0;
    while(isset($data[$i])) {
        $se = explode("/", $data[$i]);
        if ($se[0] == $joueur[1].";".$joueur[0] || $se[0] == $joueur[0].";".$joueur[1])
            $count = 1;
        $i++;
    }
    echo $count;
    if ($count == 0) {
        $id_j1 = $joueur[1];
        $id_j2 = $joueur[0];
        $j1 = explode(";", $get_inf[intval($id_j1) - 1]);
        $j2 = explode(";", $get_inf[intval($id_j2) - 1]);
        if ($gg == 1) {
            $j1_points = -2;
            $line1 = $id_j2.";".date("Y/m/d").";victoire;".intval($j2[4] + 5)."\n";
            $j2_points = 5;
            if (intval($j2[4] - 2) > 0) {
                $line = $id_j1.";".date("Y/m/d").";defaite;".intval($j1[4] - 2)."\n";
            } else {
                $line = $id_j1.";".date("Y/m/d").";defaite;0"."\n";
            }
        } else {
            $line = $id_j1.";".date("Y/m/d").";victoire;".intval($j1[4] + 5)."\n";
            $j2_points = -2;
            $j1_points = 5;
            if (intval($j2[4] - 2) > 0) {
                $line1 = $id_j2.";".date("Y/m/d").";defaite;".intval($j2[4] - 2)."\n";
            } else {
                $line1 = $id_j2.";".date("Y/m/d").";defaite;0"."\n";
            }
        }
        file_put_contents("writing.cvs", $joueur[1].";".$joueur[0]."/".$j1_points.";".$j2_points."\n", FILE_APPEND);
        file_put_contents('membres/historique.cvs', $line, FILE_APPEND);
        file_put_contents('membres/historique.cvs', $line1, FILE_APPEND);
        
        if ($j2_points == -2) {
            if (intval($j2[4] - 2) > 0)
                $j2[4] = intval($j2[4] - 2);
            else
                $j2[4] = 0;
        } else {
            $j2[4] = intval($j2[4] + 5);
        }
        $get_inf[$id_j2 - 1] = implode(";", $j2);
        if ($j1_points == -2) {
            if (intval($j1[4] - 2) > 0)
                $j1[4] = intval($j1[4] - 2);
            else
                $j1[4] = 0;
        } else {
            $j1[4] = intval($j1[4] + 5);
        }
        $get_inf[$id_j1 - 1] = implode(";", $j1);
        $i = 0;
        file_put_contents('membres/membre.cvs', "");
        while (isset($get_inf[$i])) {
            file_put_contents('membres/membre.cvs', $get_inf[$i], FILE_APPEND);
            $i++;
        }
    } else {
        $id_j1 = $joueur[1];
        $id_j2 = $joueur[0];
        $j1 = explode(";", $get_inf[intval($id_j1) - 1]);
        $j2 = explode(";", $get_inf[intval($id_j2) - 1]);
        $file_to_check = "writing.cvs";
        $data = file($file_to_check);
        $i = 0;
        while(isset($data[$i])) {
            $se = explode("/", $data[$i]);
            if ($se[0] == $joueur[1].";".$joueur[0] || $se[0] == $joueur[0].";".$joueur[1]) {
                $se[1] = str_replace("\n", "", $se[1]);
                $points = explode(";", $se[1]);
                $j1_points = $points[1];
                $j2_points = $points[0];
                break;
            }
            $i++;
        }
        unset($data[$i]);
        $data = array_values($data);
        $i = 0;
        file_put_contents("writing.cvs", "");
        while (isset($data[$i])) {
            file_put_contents("writing.cvs", $data[$i], FILE_APPEND);
            $i++;
        }
        
    }
}

?>
<div style="position: fixed; width: 50%; height: 50%; left: 25%; top: 25%; background-color:rgba(180, 180, 180, 0.8); box-shadow: 1px 1px 12px #555; border: 2px solid grey; font-family: fantasy; color : white; text-align: center;">
<br><br>
<table>
<tr>
	<td>Joueur</td>
	<td>Points obtenus</td>
	<td>points total</td>
	<td>Loot</td>
</tr>
<?php
$i = 0;
while ($i < 1) {
	$v = 0;
	while ($v < 2) {
		?>
		<tr>
			<td><?php echo ${'j'.($v + 1)}[1]; if(${'j'.($v + 1)}[1] == $_SESSION['pseudo']) {echo " (toi)";}?></td>
			<td><?php echo ${'j'.($v + 1).'_points'}; ?></td>
			<td><?php echo ${'j'.($v + 1)}[4];?></td>
			<td>
			    <?php
			        $de = rand(0, 1000);
			        if ($de == 586) {
			            echo "Lance de Telesto";
			            file_put_contents('membres/loot.cvs', ${'id_j'.($v + 1)}.";"."Lance de Telesto"."\n", FILE_APPEND);
			        } else {
			            $de = rand(0, 100);
			            if ($de == 38 || $de == 66 || $de == 31 || $de == 13) {
			                if($de == 38) {
			                    echo "Medical Supply";
			                    file_put_contents('membres/loot.cvs', ${'id_j'.($v + 1)}.";"."Medical Supply"."\n", FILE_APPEND);
			                }
			                if($de == 66) {
			                    echo "Medical Supply plus";
			                    file_put_contents('membres/loot.cvs', ${'id_j'.($v + 1)}.";"."Medical Supply plus"."\n", FILE_APPEND);
			                }
			                if($de == 31) {
			                    echo "Loot chest";
			                    file_put_contents('membres/loot.cvs', ${'id_j'.($v + 1)}.";"."Loot chest"."\n", FILE_APPEND);
			                }
			                if($de == 13) {
			                    echo "sticker";
			                    file_put_contents('membres/loot.cvs', ${'id_j'.($v + 1)}.";"."sticker"."\n", FILE_APPEND);
			                }
			            } else {
			                echo "pas de loot";
			            }
			        }
			    ?>
			</td>
		</tr>
		<?php
		$v++;
	}
	$i++;
}

?>
</table>
<br>
<p>Redirection dans <font id='redi'>10</font> secondes<br><br><br> 1 chance sur 1000 de looter un objet legendaire<br>4 chances sur 100 de looter un objet rare</p>
<script>
    var a = 9;
    timerId = setInterval(() => a = redire(a), 1000);
    setTimeout(() => { clearInterval(timerId); fin(); }, 10000);
    
    function redire(nb) {
        document.getElementById('redi').innerHTML = nb;
        nb--;
        return(nb)
    }
    
    function fin() {
        window.close();
    }
</script>
</div>