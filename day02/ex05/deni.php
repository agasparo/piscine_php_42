#!/usr/bin/php
<?php
if (count($argv) == 3) {
		if (!file_exists($argv[1]))
				exit();
		if ($argv[2] == 'nom')
			$id = 0;
		else if ($argv[2] == 'prenom')
			$id = 1;
		else if ($argv[2] == 'mail')
			$id = 2;
		else if ($argv[2] == 'IP')
			$id = 3;
		else if ($argv[2] == 'pseudo')
			$id = 4;
		else
			exit();
		$data = file($argv[1]);
		$i = 0;
		while (isset($data[$i])) {
			$index = explode(';', $data[$i]);
			if ($i > 0) {
				$nom[trim($index[$id])] = $index[0];
				$prenom[trim($index[$id])] = $index[1];
				$mail[trim($index[$id])] = $index[2];
				$IP[trim($index[$id])] = $index[3];
				$pseudo[trim($index[$id])] = $index[4];
			}
			$i++;
		}
		while(1)
		{
			echo "Entrez votre commande: ";
			$line = trim(fgets(STDIN));
			if (feof(STDIN) == TRUE) {
				echo "\n";
				exit();
			}
			ob_start();
			$result = eval($line); 
			if ('' !== $error = ob_get_clean()) {
				if (preg_match("#Parse error:#", $error)) {
					echo "PHP Parse error : syntax error, unexpected T_STRING in [....]\n";
				} else {
					echo $error;
				}
			}
		}
}
?>