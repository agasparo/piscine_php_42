<?php
echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m|                                CREATED by ==> AGASPARO <==                          |\033[0m\n";
echo "\033[35m ---------------------------------------------------------------------------------------\033[0m\n";
echo "\033[35m|                           Testors: lpelissi ceaudouy mascorpi                        |\033[0m\n";
echo "\033[35m----------------------------------------nom_fichier------------------------------------\033[0m\n";

$i = 0;
$tab[0] = 'Color.class.php';
$tab[1] = 'Vertex.class.php';
$tab[2] = 'Vector.class.php';
$tab[3] = 'Matrix.class.php';
$tab[4] = 'Camera.class.php';
$tab[5] = 'Render.class.php';

while ($i < 6) {
		$commade = "day06/ex0".$i."/".$tab[$i];
	if (file_exists($commade)) {
		echo "Fichier ".$tab[$i]." : \033[32m[OK]\033[0m\n";
	} else {
		echo "Fichier ".$tab[$i]." : \033[31m[non trouve]\033[0m\n";
	}
	$i++;
}

echo "Lancement du script de correction dans 3 secondes ...\n";
sleep(3);
echo "creation du dossier des mains ...\n";
if (!file_exists("day06/repo")) {
	mkdir("day06/repo");
}
echo "creation des mains...\n";
echo "main00...\n";
$in = "<?php
require_once 'day06/ex00/Color.class.php';

Color::".'$'."verbose = True;

".'$'."red     = new Color( array( 'red' => 0xff, 'green' => 0   , 'blue' => 0    ) );
".'$'."green   = new Color( array( 'rgb' => 255 << 8 ) );
".'$'."blue    = new Color( array( 'red' => 0   , 'green' => 0   , 'blue' => 0xff ) );

".'$'."yellow  = ".'$'."red->add( ".'$'."green );
".'$'."cyan    = ".'$'."green->add( ".'$'."blue );
".'$'."magenta = ".'$'."blue->add( ".'$'."red );

".'$'."white   = ".'$'."red->add( ".'$'."green )->add( ".'$'."blue );

print( ".'$'."red     . PHP_EOL );
print( ".'$'."green   . PHP_EOL );
print( ".'$'."blue    . PHP_EOL );
print( ".'$'."yellow  . PHP_EOL );
print( ".'$'."cyan    . PHP_EOL );
print( ".'$'."magenta . PHP_EOL );
print( ".'$'."white   . PHP_EOL );

Color::".'$'."verbose = False;

".'$'."black = ".'$'."white->sub( ".'$'."red )->sub( ".'$'."green )->sub( ".'$'."blue );
print( 'Black: ' . ".'$'."black . PHP_EOL );

Color::".'$'."verbose = True;

".'$'."darkgrey = new Color( array( 'rgb' => (10 << 16) + (10 << 8) + 10 ) );
print( 'darkgrey: ' . ".'$'."darkgrey . PHP_EOL );
".'$'."lightgrey = ".'$'."darkgrey->mult( 22.5 );
print( 'lightgrey: ' . ".'$'."lightgrey . PHP_EOL );

".'$'."random = new Color( array( 'red' => 12.3, 'green' => 31.2, 'blue' => 23.1 ) );
print( 'random: ' . ".'$'."random . PHP_EOL );

?>";
if (!file_exists("day06/repo/main00.php")) {
	$fd = fopen("day06/repo/main00.php", "w+");
	fwrite($fd, $in);
	fclose($fd);
}

echo "main01...\n";
$in = "<?php
require_once 'day06/ex00/Color.class.php';
require_once 'day06/ex01/Vertex.class.php';

Color::".'$'."verbose = False;

Vertex::".'$'."verbose = True;

".'$'."vtxO  = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
print( ".'$'."vtxO  . PHP_EOL );

".'$'."red   = new Color( array( 'red' => 255, 'green' =>   0, 'blue' =>   0 ) );
".'$'."green = new Color( array( 'red' =>   0, 'green' => 255, 'blue' =>   0 ) );
".'$'."blue  = new Color( array( 'red' =>   0, 'green' =>   0, 'blue' => 255 ) );

".'$'."unitX = new Vertex( array( 'x' => 1.0, 'y' => 0.0, 'z' => 0.0, 'color' => ".'$'."green ) );
".'$'."unitY = new Vertex( array( 'x' => 0.0, 'y' => 1.0, 'z' => 0.0, 'color' => ".'$'."red   ) );
".'$'."unitZ = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 1.0, 'color' => ".'$'."blue  ) );

print( ".'$'."unitX . PHP_EOL );
print( ".'$'."unitY . PHP_EOL );
print( ".'$'."unitZ . PHP_EOL );

Vertex::".'$'."verbose = False;

".'$'."sqrA = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
".'$'."sqrB = new Vertex( array( 'x' => 4.2, 'y' => 0.0, 'z' => 0.0 ) );
".'$'."sqrC = new Vertex( array( 'x' => 4.2, 'y' => 4.2, 'z' => 0.0 ) );
".'$'."sqrD = new Vertex( array( 'x' => 0.0, 'y' => 4.2, 'z' => 0.0 ) );

print( ".'$'."sqrA . PHP_EOL );
print( ".'$'."sqrB . PHP_EOL );
print( ".'$'."sqrC . PHP_EOL );
print( ".'$'."sqrD . PHP_EOL );

".'$'."A = new Vertex( array( 'x' => 3.0, 'y' => 3.0, 'z' => 3.0 ) );
print( ".'$'."A . PHP_EOL );
".'$'."equA = new Vertex( array( 'x' => 9.0, 'y' => 9.0, 'z' => 9.0, 'w' => 3.0 ) );
print( ".'$'."equA . PHP_EOL );

Vertex::".'$'."verbose = True;

?>";
if (!file_exists("day06/repo/main01.php")) {
	$fd = fopen("day06/repo/main01.php", "w+");
	fwrite($fd, $in);
	fclose($fd);
}

echo "main02...\n";
$in = "<?php
require_once 'day06/ex01/Vertex.class.php';
require_once 'day06/ex02/Vector.class.php';


Vertex::".'$'."verbose = False;

Vector::".'$'."verbose = True;


".'$'."vtxO = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
".'$'."vtxX = new Vertex( array( 'x' => 1.0, 'y' => 0.0, 'z' => 0.0 ) );
".'$'."vtxY = new Vertex( array( 'x' => 0.0, 'y' => 1.0, 'z' => 0.0 ) );
".'$'."vtxZ = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 1.0 ) );

".'$'."vtcXunit = new Vector( array( 'orig' => ".'$'."vtxO, 'dest' => ".'$'."vtxX ) );
".'$'."vtcYunit = new Vector( array( 'orig' => ".'$'."vtxO, 'dest' => ".'$'."vtxY ) );
".'$'."vtcZunit = new Vector( array( 'orig' => ".'$'."vtxO, 'dest' => ".'$'."vtxZ ) );

print( ".'$'."vtcXunit . PHP_EOL );
print( ".'$'."vtcYunit . PHP_EOL );
print( ".'$'."vtcZunit . PHP_EOL );

".'$'."dest1 = new Vertex( array( 'x' => -12.34, 'y' => 23.45, 'z' => -34.56 ) );
Vertex::".'$'."verbose = True;
".'$'."vtc1  = new Vector( array( 'dest' => ".'$'."dest1 ) );
Vertex::".'$'."verbose = False;

".'$'."orig2 = new Vertex( array( 'x' => 23.87, 'y' => -37.95, 'z' => 78.34 ) );
".'$'."dest2 = new Vertex( array( 'x' => -12.34, 'y' => 23.45, 'z' => -34.56 ) );
".'$'."vtc2  = new Vector( array( 'orig' => ".'$'."orig2, 'dest' => ".'$'."dest2 ) );

print( 'Magnitude is ' . ".'$'."vtc2->magnitude() . PHP_EOL );

".'$'."nVtc2 = ".'$'."vtc2->normalize();
print( 'Normalized ".'$'."vtc2 is ' . ".'$'."nVtc2 . PHP_EOL );
print( 'Normalized ".'$'."vtc2 magnitude is ' . ".'$'."nVtc2->magnitude() . PHP_EOL );

print( '".'$'."vtc1 + ".'$'."vtc2 is ' . ".'$'."vtc1->add( ".'$'."vtc2 ) . PHP_EOL );
print( '".'$'."vtc1 - ".'$'."vtc2 is ' . ".'$'."vtc1->sub( ".'$'."vtc2 ) . PHP_EOL );
print( 'opposite of ".'$'."vtc1 is ' . ".'$'."vtc1->opposite() . PHP_EOL );
print( 'scalar product of ".'$'."vtc1 and 42 is ' . ".'$'."vtc1->scalarProduct( 42 ) . PHP_EOL );
print( 'dot product of ".'$'."vtc1 and ".'$'."vtc2 is ' . ".'$'."vtc1->dotProduct( ".'$'."vtc2 ) . PHP_EOL );
print( 'cross product of ".'$'."vtc1 and ".'$'."vtc2 is ' . ".'$'."vtc1->crossProduct( ".'$'."vtc2 ) . PHP_EOL );
print( 'cross product of ".'$'."vtcXunit and ".'$'."vtcYunit is ' . ".'$'."vtcXunit->crossProduct( ".'$'."vtcYunit ) . 'aka ".'$'."vtcZunit' . PHP_EOL );
print( 'cosinus of angle between ".'$'."vtc1 and ".'$'."vtc2 is ' . ".'$'."vtc1->cos( ".'$'."vtc2 ) . PHP_EOL );
print( 'cosinus of angle between ".'$'."vtcXunit and ".'$'."vtcYunit is ' . ".'$'."vtcXunit->cos( ".'$'."vtcYunit ) . PHP_EOL );


?>";
if (!file_exists("day06/repo/main02.php")) {
	$fd = fopen("day06/repo/main02.php", "w+");
	fwrite($fd, $in);
	fclose($fd);
}

echo "main03...\n";
$in = "<?php
require_once 'day06/ex01/Vertex.class.php';
require_once 'day06/ex02/Vector.class.php';
require_once 'day06/ex03/Matrix.class.php';


Vertex::".'$'."verbose = False;
Vector::".'$'."verbose = False;

Matrix::".'$'."verbose = True;

print( 'Let\'s start with an harmless identity matrix :' . PHP_EOL );
".'$'."I = new Matrix( array( 'preset' => Matrix::IDENTITY ) );
print( ".'$'."I . PHP_EOL . PHP_EOL );

print( 'So far, so good. Let\'s create a translation matrix now.' . PHP_EOL );
".'$'."vtx = new Vertex( array( 'x' => 20.0, 'y' => 20.0, 'z' => 0.0 ) );
".'$'."vtc = new Vector( array( 'dest' => ".'$'."vtx ) );
".'$'."T  = new Matrix( array( 'preset' => Matrix::TRANSLATION, 'vtc' => ".'$'."vtc ) );
print( ".'$'."T . PHP_EOL . PHP_EOL );

print( 'A scale matrix is no big deal.' . PHP_EOL );
".'$'."S  = new Matrix( array( 'preset' => Matrix::SCALE, 'scale' => 10.0 ) );
print( ".'$'."S . PHP_EOL . PHP_EOL );

print( 'A Rotation along the OX axis :' . PHP_EOL );
".'$'."RX = new Matrix( array( 'preset' => Matrix::RX, 'angle' => M_PI_4 ) );
print( ".'$'."RX . PHP_EOL . PHP_EOL );

print( 'Or along the OY axis :' . PHP_EOL );
".'$'."RY = new Matrix( array( 'preset' => Matrix::RY, 'angle' => M_PI_2 ) );
print( ".'$'."RY . PHP_EOL . PHP_EOL );

print( 'Do a barrel roll !' . PHP_EOL );
".'$'."RZ = new Matrix( array( 'preset' => Matrix::RZ, 'angle' => 2 * M_PI ) );
print( ".'$'."RZ . PHP_EOL . PHP_EOL );

print( 'The bad guy now, the projection matrix : 3D to 2D !' . PHP_EOL );
print( 'The values are arbitray. We\'ll decipher them in the next exercice.' . PHP_EOL );
".'$'."P = new Matrix( array( 'preset' => Matrix::PROJECTION,
						'fov' => 60,
						'ratio' => 640/480,
						'near' => 1.0,
						'far' => -50.0 ) );
print( ".'$'."P . PHP_EOL . PHP_EOL );

print( 'Matrices are so awesome, that they can be combined !' . PHP_EOL );
print( 'This is a model matrix that scales, then rotates around OY axis,' . PHP_EOL );
print( 'then rotates around OX axis and finally translates.' . PHP_EOL );
print( 'Please note the reverse operations order. It\'s not an error.' . PHP_EOL );
".'$'."M = ".'$'."T->mult( ".'$'."RX )->mult( ".'$'."RY )->mult( ".'$'."S );
print( ".'$'."M . PHP_EOL . PHP_EOL );

print( 'What can you do with a matrix and a vertex ?' . PHP_EOL );
".'$'."vtxA = new Vertex( array( 'x' => 1.0, 'y' => 1.0, 'z' => 0.0 ) );
print( ".'$'."vtxA . PHP_EOL );
print( ".'$'."M . PHP_EOL );
print( 'Transform the damn vertex !' . PHP_EOL );
".'$'."vtxB = ".'$'."M->transformVertex( ".'$'."vtxA );
print( ".'$'."vtxB . PHP_EOL . PHP_EOL );

?>";
if (!file_exists("day06/repo/main03.php")) {
	$fd = fopen("day06/repo/main03.php", "w+");
	fwrite($fd, $in);
	fclose($fd);
}

echo "main04...\n";
$in = "<?php
require_once 'day06/ex01/Vertex.class.php';
require_once 'day06/ex02/Vector.class.php';
require_once 'day06/ex03/Matrix.class.php';
require_once 'day06/ex04/Camera.class.php';

Vertex::".'$'."verbose = False;
Vector::".'$'."verbose = False;
Matrix::".'$'."verbose = False;

Camera::".'$'."verbose = True;

".'$'."vtxO = new Vertex( array( 'x' => 20.0, 'y' => 20.0, 'z' => 80.0 ) );
".'$'."R    = new Matrix( array( 'preset' => Matrix::RY, 'angle' => M_PI ) );
".'$'."cam  = new Camera( array( 'origin' => ".'$'."vtxO,
						   'orientation' => ".'$'."R,
						   'width' => 640,
						   'height' => 480,
						   'fov' => 60,
						   'near' => 1.0,
						   'far' => 100.0) );

print( ".'$'."cam . PHP_EOL );
?>";
if (!file_exists("day06/repo/main04.php")) {
	$fd = fopen("day06/repo/main04.php", "w+");
	fwrite($fd, $in);
	fclose($fd);
}
echo "Lancement du script\n";
sleep(0.5);

shell_exec("chmod 755 day06/repo/main00.php");
shell_exec("chmod 755 day06/repo/main01.php");
shell_exec("chmod 755 day06/repo/main02.php");
shell_exec("chmod 755 day06/repo/main03.php");
shell_exec("chmod 755 day06/repo/main04.php");

echo "\033[35m-------------------------------------------ex00------------------------------------\033[0m\n";
echo "test 1 : \n";

$req = shell_exec("php day06/repo/main00.php");
$rep = "Color( red: 255, green:   0, blue:   0 ) constructed.
Color( red:   0, green: 255, blue:   0 ) constructed.
Color( red:   0, green:   0, blue: 255 ) constructed.
Color( red: 255, green: 255, blue:   0 ) constructed.
Color( red:   0, green: 255, blue: 255 ) constructed.
Color( red: 255, green:   0, blue: 255 ) constructed.
Color( red: 255, green: 255, blue:   0 ) constructed.
Color( red: 255, green: 255, blue: 255 ) constructed.
Color( red: 255, green: 255, blue:   0 ) destructed.
Color( red: 255, green:   0, blue:   0 )
Color( red:   0, green: 255, blue:   0 )
Color( red:   0, green:   0, blue: 255 )
Color( red: 255, green: 255, blue:   0 )
Color( red:   0, green: 255, blue: 255 )
Color( red: 255, green:   0, blue: 255 )
Color( red: 255, green: 255, blue: 255 )
Black: Color( red:   0, green:   0, blue:   0 )
Color( red:  10, green:  10, blue:  10 ) constructed.
darkgrey: Color( red:  10, green:  10, blue:  10 )
Color( red: 225, green: 225, blue: 225 ) constructed.
lightgrey: Color( red: 225, green: 225, blue: 225 )
Color( red:  12, green:  31, blue:  23 ) constructed.
random: Color( red:  12, green:  31, blue:  23 )
Color( red:  12, green:  31, blue:  23 ) destructed.
Color( red: 225, green: 225, blue: 225 ) destructed.
Color( red:  10, green:  10, blue:  10 ) destructed.
Color( red:   0, green:   0, blue:   0 ) destructed.
Color( red: 255, green: 255, blue: 255 ) destructed.
Color( red: 255, green:   0, blue: 255 ) destructed.
Color( red:   0, green: 255, blue: 255 ) destructed.
Color( red: 255, green: 255, blue:   0 ) destructed.
Color( red:   0, green:   0, blue: 255 ) destructed.
Color( red:   0, green: 255, blue:   0 ) destructed.
Color( red: 255, green:   0, blue:   0 ) destructed.
";
$tab_req = explode("\n", $req);
$tab_rep = explode("\n", $rep);
$final = array_diff($tab_rep, $tab_req);
foreach ($tab_rep as $key => $value) {
	if (isset($final[$key])) {
		echo "\033[31m".$final[$key]."\033[0m | your return : ".$tab_req[$key]."\n";
	} else {
		echo "\033[32m".$value."\033[0m\n";
	}
}
if (count($final) > 0)
	exit(0);
echo "\033[35m-------------------------------------------ex01------------------------------------\033[0m\n";
echo "test 1 : \n";

$req = shell_exec("php day06/repo/main01.php");
$rep = "Vertex( x: 0.00, y: 0.00, z:0.00, w:1.00, Color( red: 255, green: 255, blue: 255 ) ) constructed
Vertex( x: 0.00, y: 0.00, z:0.00, w:1.00, Color( red: 255, green: 255, blue: 255 ) )
Vertex( x: 1.00, y: 0.00, z:0.00, w:1.00, Color( red:   0, green: 255, blue:   0 ) ) constructed
Vertex( x: 0.00, y: 1.00, z:0.00, w:1.00, Color( red: 255, green:   0, blue:   0 ) ) constructed
Vertex( x: 0.00, y: 0.00, z:1.00, w:1.00, Color( red:   0, green:   0, blue: 255 ) ) constructed
Vertex( x: 1.00, y: 0.00, z:0.00, w:1.00, Color( red:   0, green: 255, blue:   0 ) )
Vertex( x: 0.00, y: 1.00, z:0.00, w:1.00, Color( red: 255, green:   0, blue:   0 ) )
Vertex( x: 0.00, y: 0.00, z:1.00, w:1.00, Color( red:   0, green:   0, blue: 255 ) )
Vertex( x: 0.00, y: 0.00, z:0.00, w:1.00 )
Vertex( x: 4.20, y: 0.00, z:0.00, w:1.00 )
Vertex( x: 4.20, y: 4.20, z:0.00, w:1.00 )
Vertex( x: 0.00, y: 4.20, z:0.00, w:1.00 )
Vertex( x: 3.00, y: 3.00, z:3.00, w:1.00 )
Vertex( x: 9.00, y: 9.00, z:9.00, w:3.00 )
Vertex( x: 9.00, y: 9.00, z:9.00, w:3.00, Color( red: 255, green: 255, blue: 255 ) ) destructed
Vertex( x: 3.00, y: 3.00, z:3.00, w:1.00, Color( red: 255, green: 255, blue: 255 ) ) destructed
Vertex( x: 0.00, y: 4.20, z:0.00, w:1.00, Color( red: 255, green: 255, blue: 255 ) ) destructed
Vertex( x: 4.20, y: 4.20, z:0.00, w:1.00, Color( red: 255, green: 255, blue: 255 ) ) destructed
Vertex( x: 4.20, y: 0.00, z:0.00, w:1.00, Color( red: 255, green: 255, blue: 255 ) ) destructed
Vertex( x: 0.00, y: 0.00, z:0.00, w:1.00, Color( red: 255, green: 255, blue: 255 ) ) destructed
Vertex( x: 0.00, y: 0.00, z:1.00, w:1.00, Color( red:   0, green:   0, blue: 255 ) ) destructed
Vertex( x: 0.00, y: 1.00, z:0.00, w:1.00, Color( red: 255, green:   0, blue:   0 ) ) destructed
Vertex( x: 1.00, y: 0.00, z:0.00, w:1.00, Color( red:   0, green: 255, blue:   0 ) ) destructed
Vertex( x: 0.00, y: 0.00, z:0.00, w:1.00, Color( red: 255, green: 255, blue: 255 ) ) destructed
";
$tab_req = explode("\n", $req);
$tab_rep = explode("\n", $rep);
$final = array_diff($tab_rep, $tab_req);
foreach ($tab_rep as $key => $value) {
	if (isset($final[$key])) {
		echo "\033[31m".$final[$key]."\033[0m | your return : ".$tab_req[$key]."\n";
	} else {
		echo "\033[32m".$value."\033[0m\n";
	}
}
if (count($final) > 0)
	exit(0);
echo "\033[35m-------------------------------------------ex02------------------------------------\033[0m\n";
echo "test 1 : \n";

$req = shell_exec("php day06/repo/main02.php");
$rep = "Vector( x:1.00, y:0.00, z:0.00, w:0.00 ) constructed
Vector( x:0.00, y:1.00, z:0.00, w:0.00 ) constructed
Vector( x:0.00, y:0.00, z:1.00, w:0.00 ) constructed
Vector( x:1.00, y:0.00, z:0.00, w:0.00 )
Vector( x:0.00, y:1.00, z:0.00, w:0.00 )
Vector( x:0.00, y:0.00, z:1.00, w:0.00 )
Vertex( x: 0.00, y: 0.00, z:0.00, w:1.00, Color( red: 255, green: 255, blue: 255 ) ) constructed
Vector( x:-12.34, y:23.45, z:-34.56, w:0.00 ) constructed
Vertex( x: 0.00, y: 0.00, z:0.00, w:1.00, Color( red: 255, green: 255, blue: 255 ) ) destructed
Vector( x:-36.21, y:61.40, z:-112.90, w:0.00 ) constructed
Magnitude is 133.51978917
Vector( x:-0.27, y:0.46, z:-0.85, w:0.00 ) constructed
Normalized ".'$'."vtc2 is Vector( x:-0.27, y:0.46, z:-0.85, w:0.00 )
Normalized ".'$'."vtc2 magnitude is 1
Vector( x:-48.55, y:84.85, z:-147.46, w:0.00 ) constructed
Vector( x:-48.55, y:84.85, z:-147.46, w:0.00 ) destructed
".'$'."vtc1 + ".'$'."vtc2 is Vector( x:-48.55, y:84.85, z:-147.46, w:0.00 )
Vector( x:23.87, y:-37.95, z:78.34, w:0.00 ) constructed
Vector( x:23.87, y:-37.95, z:78.34, w:0.00 ) destructed
".'$'."vtc1 - ".'$'."vtc2 is Vector( x:23.87, y:-37.95, z:78.34, w:0.00 )
Vector( x:12.34, y:-23.45, z:34.56, w:0.00 ) constructed
Vector( x:12.34, y:-23.45, z:34.56, w:0.00 ) destructed
opposite of ".'$'."vtc1 is Vector( x:12.34, y:-23.45, z:34.56, w:0.00 )
Vector( x:-518.28, y:984.90, z:-1451.52, w:0.00 ) constructed
Vector( x:-518.28, y:984.90, z:-1451.52, w:0.00 ) destructed
scalar product of ".'$'."vtc1 and 42 is Vector( x:-518.28, y:984.90, z:-1451.52, w:0.00 )
dot product of ".'$'."vtc1 and ".'$'."vtc2 is 5788.4854
Vector( x:-525.52, y:-141.77, z:91.45, w:0.00 ) constructed
Vector( x:-525.52, y:-141.77, z:91.45, w:0.00 ) destructed
cross product of ".'$'."vtc1 and ".'$'."vtc2 is Vector( x:-525.52, y:-141.77, z:91.45, w:0.00 )
Vector( x:0.00, y:0.00, z:1.00, w:0.00 ) constructed
Vector( x:0.00, y:0.00, z:1.00, w:0.00 ) destructed
cross product of ".'$'."vtcXunit and ".'$'."vtcYunit is Vector( x:0.00, y:0.00, z:1.00, w:0.00 )aka ".'$'."vtcZunit
cosinus of angle between ".'$'."vtc1 and ".'$'."vtc2 is 0.99548488751903
cosinus of angle between ".'$'."vtcXunit and ".'$'."vtcYunit is 0
Vector( x:-0.27, y:0.46, z:-0.85, w:0.00 ) destructed
Vector( x:-36.21, y:61.40, z:-112.90, w:0.00 ) destructed
Vector( x:-12.34, y:23.45, z:-34.56, w:0.00 ) destructed
Vector( x:0.00, y:0.00, z:1.00, w:0.00 ) destructed
Vector( x:0.00, y:1.00, z:0.00, w:0.00 ) destructed
Vector( x:1.00, y:0.00, z:0.00, w:0.00 ) destructed
";
$tab_req = explode("\n", $req);
$tab_rep = explode("\n", $rep);
$final = array_diff($tab_rep, $tab_req);
foreach ($tab_rep as $key => $value) {
	if (isset($final[$key])) {
		echo "\033[31m".$final[$key]."\033[0m | your return : ".$tab_req[$key]."\n";
	} else {
		echo "\033[32m".$value."\033[0m\n";
	}
}
if (count($final) > 0)
	exit(0);
echo "\033[35m-------------------------------------------ex03------------------------------------\033[0m\n";
echo "test 1 : \n";

$req = shell_exec("php day06/repo/main03.php");
$rep = "Let's start with an harmless identity matrix :
Matrix IDENTITY instance constructed
M | vtcX | vtcY | vtcZ | vtxO
-----------------------------
x | 1.00 | 0.00 | 0.00 | 0.00
y | 0.00 | 1.00 | 0.00 | 0.00
z | 0.00 | 0.00 | 1.00 | 0.00
w | 0.00 | 0.00 | 0.00 | 1.00

So far, so good. Let's create a translation matrix now.
Matrix TRANSLATION preset instance constructed
M | vtcX | vtcY | vtcZ | vtxO
-----------------------------
x | 1.00 | 0.00 | 0.00 | 20.00
y | 0.00 | 1.00 | 0.00 | 20.00
z | 0.00 | 0.00 | 1.00 | 0.00
w | 0.00 | 0.00 | 0.00 | 1.00

A scale matrix is no big deal.
Matrix SCALE preset instance constructed
M | vtcX | vtcY | vtcZ | vtxO
-----------------------------
x | 10.00 | 0.00 | 0.00 | 0.00
y | 0.00 | 10.00 | 0.00 | 0.00
z | 0.00 | 0.00 | 10.00 | 0.00
w | 0.00 | 0.00 | 0.00 | 1.00

A Rotation along the OX axis :
Matrix Ox ROTATION preset instance constructed
M | vtcX | vtcY | vtcZ | vtxO
-----------------------------
x | 1.00 | 0.00 | 0.00 | 0.00
y | 0.00 | 0.71 | -0.71 | 0.00
z | 0.00 | 0.71 | 0.71 | 0.00
w | 0.00 | 0.00 | 0.00 | 1.00

Or along the OY axis :
Matrix Oy ROTATION preset instance constructed
M | vtcX | vtcY | vtcZ | vtxO
-----------------------------
x | 0.00 | 0.00 | 1.00 | 0.00
y | 0.00 | 1.00 | 0.00 | 0.00
z | -1.00 | 0.00 | 0.00 | 0.00
w | 0.00 | 0.00 | 0.00 | 1.00

Do a barrel roll !
Matrix Oz ROTATION preset instance constructed
M | vtcX | vtcY | vtcZ | vtxO
-----------------------------
x | 1.00 | 0.00 | 0.00 | 0.00
y | -0.00 | 1.00 | 0.00 | 0.00
z | 0.00 | 0.00 | 1.00 | 0.00
w | 0.00 | 0.00 | 0.00 | 1.00

The bad guy now, the projection matrix : 3D to 2D !
The values are arbitray. We'll decipher them in the next exercice.
Matrix PROJECTION preset instance constructed
M | vtcX | vtcY | vtcZ | vtxO
-----------------------------
x | 1.30 | 0.00 | 0.00 | 0.00
y | 0.00 | 1.73 | 0.00 | 0.00
z | 0.00 | 0.00 | -0.96 | -1.96
w | 0.00 | 0.00 | -1.00 | 0.00

Matrices are so awesome, that they can be combined !
This is a model matrix that scales, then rotates around OY axis,
then rotates around OX axis and finally translates.
Please note the reverse operations order. It's not an error.
Matrix instance destructed
Matrix instance destructed
M | vtcX | vtcY | vtcZ | vtxO
-----------------------------
x | 0.00 | 0.00 | 10.00 | 20.00
y | 7.07 | 7.07 | -0.00 | 20.00
z | -7.07 | 7.07 | 0.00 | 0.00
w | 0.00 | 0.00 | 0.00 | 1.00

What can you do with a matrix and a vertex ?
Vertex( x: 1.00, y: 1.00, z:0.00, w:1.00 )
M | vtcX | vtcY | vtcZ | vtxO
-----------------------------
x | 0.00 | 0.00 | 10.00 | 20.00
y | 7.07 | 7.07 | -0.00 | 20.00
z | -7.07 | 7.07 | 0.00 | 0.00
w | 0.00 | 0.00 | 0.00 | 1.00
Transform the damn vertex !
Vertex( x: 20.00, y: 34.14, z:-0.00, w:1.00 )

Matrix instance destructed
Matrix instance destructed
Matrix instance destructed
Matrix instance destructed
Matrix instance destructed
Matrix instance destructed
Matrix instance destructed
Matrix instance destructed
";
$tab_req = explode("\n", $req);
$tab_rep = explode("\n", $rep);
$final = array_diff($tab_rep, $tab_req);
foreach ($tab_rep as $key => $value) {
	if (isset($final[$key])) {
		echo "\033[31m".$final[$key]."\033[0m | your return : ".$tab_req[$key]."\n";
	} else {
		echo "\033[32m".$value."\033[0m\n";
	}
}
if (count($final) > 0)
	exit(0);
echo "\033[35m-------------------------------------------ex04------------------------------------\033[0m\n";
echo "test 1 : \n";

$req = shell_exec("php day06/repo/main04.php");
$rep = "Camera instance constructed
Camera( 
+ Origine: Vertex( x: 20.00, y: 20.00, z:80.00, w:1.00 )
+ tT:
M | vtcX | vtcY | vtcZ | vtxO
-----------------------------
x | 1.00 | 0.00 | 0.00 | -20.00
y | 0.00 | 1.00 | 0.00 | -20.00
z | 0.00 | 0.00 | 1.00 | -80.00
w | 0.00 | 0.00 | 0.00 | 1.00
+ tR:
M | vtcX | vtcY | vtcZ | vtxO
-----------------------------
x | -1.00 | 0.00 | -0.00 | 0.00
y | 0.00 | 1.00 | 0.00 | 0.00
z | 0.00 | 0.00 | -1.00 | 0.00
w | 0.00 | 0.00 | 0.00 | 1.00
+ tR->mult( tT ):
M | vtcX | vtcY | vtcZ | vtxO
-----------------------------
x | -1.00 | 0.00 | -0.00 | 20.00
y | 0.00 | 1.00 | 0.00 | -20.00
z | 0.00 | 0.00 | -1.00 | 80.00
w | 0.00 | 0.00 | 0.00 | 1.00
+ Proj:
M | vtcX | vtcY | vtcZ | vtxO
-----------------------------
x | 1.30 | 0.00 | 0.00 | 0.00
y | 0.00 | 1.73 | 0.00 | 0.00
z | 0.00 | 0.00 | -1.02 | -2.02
w | 0.00 | 0.00 | -1.00 | 0.00
)
Camera instance destructed
";
$tab_req = explode("\n", $req);
$tab_rep = explode("\n", $rep);
$final = array_diff($tab_rep, $tab_req);
foreach ($tab_rep as $key => $value) {
	if (isset($final[$key])) {
		echo "\033[31m".$final[$key]."\033[0m | your return : ".$tab_req[$key]."\n";
	} else {
		echo "\033[32m".$value."\033[0m\n";
	}
}

shell_exec("rm -rf repo");

?>