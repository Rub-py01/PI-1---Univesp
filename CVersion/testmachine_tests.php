<html>
<head>
   <title> Maquina de teste - Authentic </title>
</head>

<body>
<h1>Maquina de teste - Testes realizados</h1>

  <ul>
    <li><a href="http://localhost/testmachine_main">Voltar para tela inicial</a></li>
  </ul>
  <br>


<?php
//LOGIN NO SQL
$username = "root";
$password = "";

//LOGIN NO BANCO DE DADOS
$db = new mysqli('localhost', $username, $password, 'authentic');

//VERIFICA SE OCORREU ERRO NA CONEXÃO COM O BANCO DE DADOS
if($db->connect_errno > 0){
    die('Erro na comunicação com o banco [' . $db->connect_error . ']');
}

//REALIZA A CONSULTA NO BANCO DE DADOS
$sql = <<<SQL
    SELECT *
    FROM `maquina_teste`
SQL;

//VERIFICA SE OCORREU ERRO NA CONSULTA
if(!$result = $db->query($sql)){
    die('Erro executando a consulta ao banco de dados [' . $db->error . ']');
}

//IMPRIME AS INFORMAÇÕES
while ($row = $result->fetch_assoc()) {
	echo "Numero teste: ".$row['Num_Tst']."<br>";
    echo "Data: ".$row['Date']."<br>";
	echo "Hora do teste: ".$row['Time']."<br>";
	echo "Numero serie da placa: ".$row['Board_SN']."<br>";
	echo "Modelo da placa: ".$row['Board_Model']."<br>";
	echo "Sequencia: ".$row['Sequence']."<br>";
    echo "Tipo dispositivo: ".$row['Device_Type']."<br>";
	echo "Nome dispositivo: ".$row['Device_Name']."<br>";
	echo "Medicao 1: ".$row['Med1']."<br>";
	echo "Medicao 2: ".$row['Med2']."<br>";
	echo "Medicao 3: ".$row['Med3']."<br>";
	echo "Medicao 4: ".$row['Med4']."<br>";
	echo "Resultado do teste: ".$row['Pass_Fail']."<br>";
	echo "<br>";
	
}

//FECHA A CONEXÃO COM O BANCO DE DADOS
$result->free();
$db->close();
?>

</body>
</html>