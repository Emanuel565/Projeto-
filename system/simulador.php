
<?php


		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$valor = $_POST["valor"];
			$taxa = 1.89 / 100;
			$prazo = $_POST["prazo"] * 12; // converte anos em meses
			$prestacao = ($valor * $taxa) / (1 - (1 / pow(1 + $taxa, $prazo)));
			$total = $prestacao * $prazo;
			echo "Valor do Empréstimo: R$ " . number_format($valor, 2, ",", ".").
			"<br>".
			"Taxa de Juros: " . number_format($taxa * 100, 2, ",", ".") . "% <br> Prazo de Pagamento: " . $_POST["prazo"] . " anos<br><br>Valor da Prestação: R$ " . number_format($prestacao, 2, ",", ".").
			"<br>Valor Total do Empréstimo: R$ " . number_format($total, 2, ",", ".");
			 
		}
	?>

