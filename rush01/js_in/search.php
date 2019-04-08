<?php

session_start();

extract($_POST);

if ($demande == "profil") {
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        ?>
       </div><div id='photo_pro'><h2 class="h2_form">Changer de photo de profil</h2>
        <form method="post" enctype="multipart/form-data">     
            <input type="file" id="file_up">    
            <input type="submit" value="Envoyer" id="sub_up">    
        </form>
        <img id='result_img_user' class='res_img_user'/>
        </div>
        <div style="position : absolute; top: 50%; text-align: center; color: white; width: 100%; font-family: fantasy; height: 30%;">
            <h2>Mon inventaire</h2>
            <div style='position: absolute; left: 5%;width: 90%; height: 90%; border: 2px solid grey; overflow: auto;'>
                <?php
                    $datas = file('../membres/loot.cvs');
                    $i = 0;
                    while(isset($datas[$i])) {
                        $e = explode(";", $datas[$i]);
                        $e[1] = str_replace("\n", "", $e[1]);
                        if ($e[0] == $_SESSION['id']) {
                            ?><img src='<?php echo "img/".$e[1].".png"; ?>' style="width: 50px; height: 50; float: left; margin-left: 5%; margin-top: 5%;" class='img_loot'/>
                            <?php
                        }
                        $i++;
                    }
                ?>
            </div>
        </div>
        <?php
        echo "<a href='membres/deconnection.php' class='txt_user'>Se deconnecter</a>";
    } else {
        echo "<div id='formulaires'><h2 class='txt_form'>Se connecter</h2>
        <p id='faute_co'></p>
        <form>
            <input type='email' name='mail_connect' id='mail_connect' placeholder='Votre mail' class='in_form'><br><br>
            <input type='password' name='mdp_connect' id='mdp_connect' placeholder='Votre mot de passe' class='in_form'><br><br>
            <input type='submit' name='coco' id='coco' value='Se connecter' class='btn-form'>
        </form>
        <br><br>
        <h2 class='txt_form'>S'inscrire</h2>
        <p id='faute_ins'></p>
        <form>
            <input type='text' name='pseudo_ins' id='pseudo_ins' placeholder='Votre pseudo' class='in_form'><br><br>
            <input type='email' name='mail_ins' id='mail_ins' placeholder='Votre mail' class='in_form'><br><br>
            <input type='password' name='mdp_ins' id='mdp_ins' placeholder='Votre mot de passe' class='in_form'><br><br>
            <input type='password' name='mdp_re_ins' id='mdp_re_ins' placeholder='Repeter votre mot de passe' class='in_form'><br><br>
            <input type='submit' name='ins' id='ins' value='S inscrire' class='btn-form'>
        </form></div>";
    }
}
if($demande == "histo") {
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $i = 0;
        $data = file('../membres/historique.cvs');
        ?><div id="possiti" style='overflow: auto;height: 80%;'><table>
            <tr>
                <td>Date</td>
                <td>Victoire / defaite</td>
                <td>Points finals</td>
            </tr>
        <?php
        $count = 0;
        while (isset($data[$i])) {
            $e = explode(";", $data[$i]);
            if (isset($e[0]) && $e[0] == $_SESSION['id']) {
            ?>
                <tr>
                    <td><?php echo $e[1]; ?></td>
                    <td><?php echo $e[2]; ?></td>
                    <td><?php echo $e[3]; ?></td>
                </tr>
            <?php
            $count = 1;
            }
            $i++;
        }
        if ($count == 0) { 
            ?>
            <td>Aucun</td>
            <td>match</td>
            <td>joue</td>
            <?php
        }
        ?></table></div><?php
    } else {
        echo "<h2 class='coco_toi'>Veuillez vous connecter</h2>";
    }
}

if($demande == "how_joue") {
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $i = 0;
        $data = file('../membres/membre.cvs');
        ?><div id="possiti"><table>
            <tr>
                <td>photo du joueur</td>
                <td>Nom du joueur</td>
                <td>Points du joueur</td>
            </tr>
        <?php
        while (isset($data[$i])) {
            $e = explode(";", $data[$i]);
            if (isset($e[1]) && isset($e[4])) {
            ?>
                <tr>
                    <td><img src='<?php echo $e[5]; ?>' class='img_tab'/></td>
                    <td><?php echo $e[1]; ?></td>
                    <td><?php echo $e[4]; ?></td>
                </tr>
            <?php
            }
            $i++;
        }
        ?></table></div><?php
    } else {
        echo "<h2 class='coco_toi'>Veuillez vous connecter</h2>";
    }
}

?>