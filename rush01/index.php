<?php
//header("Location:http://google.com");
session_start();

?>
<html>
<head>
	<title>Battlestars</title>
	<link rel="stylesheet" type="text/css" href="css/loby.css">
</head>
<body>
    <div id="menu_right">
        <?php
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
            $data = file('membres/membre.cvs');
            $e = explode(";", $data[$_SESSION['id'] - 1]);
            ?><img src="<?php echo $e[5]; ?>" class="img_user"/><?php
        } else {
            ?><img src="img/logo_user.jpg" class="img_user"/><?php
        } ?>
        <h2 class="user_name">
        <?php
            if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                echo $_SESSION['pseudo'];
            } else {
                echo "Nom d'utilisateur";
            } ?>
        </h2>
        <hr class="hr_user">
        <div class="menu_user hovers" id="playeurs">Joueurs</div>
        <div class="menu_user" id="co_ins">Mon espace</div>
        <div class="menu_user" id="histo">Mon historique</div>
        <div id="content">
            
        </div>
    </div>
    <div id="menu_left">
        <?php
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
            ?><img src="img/play.png" id="search" class="img_play"/><?php
        } else {
            ?><img src="img/play.png" id="no_co" class="img_play"/><?php
        } ?>
    </div>
    <div id="news">
        <p class="text_news">News</p>
        <div class="articles">
            <h2 class="txt_news">Le Destroyer</h2>
            <img src="img/v1.jpg" class="img_news"/>
            <p class="des_news">Un destroyer ou contre-torpilleur est un navire de guerre capable de défendre un groupe de bâtiments contre toute menace, comme d'attaquer un groupe de navires moyennement défendus.</p>
        </div>
        <div class="articles">
            <h2 class="txt_news">Le Cuirasse</h2>
            <img src="img/v2.jpg" class="img_news"/>
            <p class="des_news">Le cuirassé est un navire dont le blindage constituait la première caractéristique, et dont l'artillerie principale était composée de pièces d'artillerie les plus puissantes du moment.</p>
        </div>
        <div class="articles">
            <h2 class="txt_news">La Fregate</h2>
            <img src="img/v3.jpg" class="img_news"/>
            <p class="des_news">Dans la marine moderne le rôle d'une frégate est la protection d'un bâtiment précieux, la lutte anti-navire, la lutte anti sous-marine ou anti-aérienne, la surveillance d’une zone maritime</p>
        </div>
        <div class="articles">
            <h2 class="txt_news">Le Big Boom</h2>
            <img src="img/v4.jpg" class="img_news"/>
            <p class="des_news">Le Big Boom est le vaisseau le plus puissant jamais construit a ce jour ... a vous de le tester</p>
        </div>
        <div class="articles">
            <h2 class="txt_news">L'exploreur</h2>
            <img src="img/v5.jpg" class="img_news"/>
            <p class="des_news">L'exploreur est un petit vaisseau tres rapide mais peu arme qui sert a savoir ou se situent vos enemis</p>
        </div>
    </div>
    <div id="classe">
        <p class="text_news">Top Classement</p>
        <?php
            $data = file('membres/membre.cvs');
            $val = array();
            $i = 0;
            $a = 0;
            while (isset($data[$i])) {
                $e = explode(';', $data[$i]);
                if (isset($e[4]) && isset($e[0]) && isset($e[1])) {
                    $e[4] = str_replace("\n", "", $e[4]);
                    $res[$a] = $e[0].";".$e[1].";".$e[4];
                    if (!in_array($e[4], $val))
                        $val[$a] = $e[4];
                    $a++; 
                }
                $i++;
            }
            ?>
            <table>
                <tr>
                    <td>Classement</td>
                    <td>Joueur</td>
                    <td>Nombre de points</td>
                </tr>
            <?php
            if (isset($val)) {
                sort($val);
                $count = 0;
                $i = count($val) - 1;
                while (isset($val[$i])) {
                    $j = 0;
                    while (isset($res[$j])) {
                        $value = explode(";", $res[$j]);
                        $value[2] = str_replace("\n", "", $value[2]);
                        if ($value[2] == $val[$i] && $count < 3) {
                            ?>
                                <tr>
                                    <td><?php echo $count + 1; ?></td>
                                    <td><?php echo $value[1]; ?></td>
                                    <td><?php echo $value[2]; ?></td>
                                </tr>
                            <?php
                            $count++;
                        }
                        $j++;
                    }
                    $i--;
                }
            }
        ?>
        </table>
    </div>
    <div id="is_seraching">
        <p id="search_text">Recherche de joueur</p>
        <p id="avert">En cherchant un match vous vous engagez a jouer le macth en entier.<br>Tout rage quit vous fera perdre.</p>
        <button id="stop_search">Annuler</button>
    </div>
	<div id="wrap">
        <div id="viewport">
            <div class="tv">
                <div class="screen mute" id="tv"></div>
            </div>
        </div>
    </div>
    <div id='show_loot_user' style="display: none; position: fixed; z-index: 900; width: 20%; left: 32.5%; height: 35%; top: 25%; background-color: rgba(120, 120, 120, 0.8); border: 2px solid grey; 1px 1px 12px #555; text-align: center; color: white; font-family: fantasy;">
        <u><h2 id="titre_show_loot_user"></h2></u>
        <img id="img_show_loot_user" style="position: relative; width: 70%; top: 5%; height: 40%; border: 2px solid lightgrey;"/>
        <p id="txt_show_loot_user"></p>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js_in/smoke.js"></script>
<script type="text/javascript" src="js_in/user.js"></script>
<script type="text/javascript" src="js_in/index.js"></script>
</html>