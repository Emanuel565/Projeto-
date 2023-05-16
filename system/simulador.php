<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/main.css">
</head>
<body>
<div>
<?php


		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$valor = $_POST["valor"];
			$taxa = $_POST["taxa"] / 100;
			$prazo = $_POST["prazo"] * 12; // converte anos em meses
			$prestacao = ($valor * $taxa) / (1 - (1 / pow(1 + $taxa, $prazo)));
			$total = $prestacao * $prazo;
			echo "<br><hr><br>";
			echo "Valor do Empréstimo: R$ " . number_format($valor, 2, ",", ".");
			echo "<br>";
			echo "Taxa de Juros: " . number_format($taxa * 100, 2, ",", ".") . "%";
			echo "<br>";
			echo "Prazo de Pagamento: " . $_POST["prazo"] . " anos";
			echo "<br><br>";
			echo "Valor da Prestação: R$ " . number_format($prestacao, 2, ",", ".");
			echo "<br>";
			echo "Valor Total do Empréstimo: R$ " . number_format($total, 2, ",", ".");
		}
	?>
	</div>
	<br> <br>
	
</body>
</html>
