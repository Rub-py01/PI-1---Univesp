<html>
<head>
   <title> Maquina de teste - Authentic </title>
</head>

<body>
<h1>Maquina de teste - Metricas</h1>

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


// #########################  LÓGICA PARA APRESENTAÇÃO DA QUANTIDADE DE PLACAS TESTADAS VS META DIÁRIA #########################
//REALIZA A CONSULTA NO BANCO DE DADOS
$sql_PlcTst = "SELECT COUNT(DISTINCT Board_SN) AS placas_Tst FROM `maquina_teste`";
$res_PlcTst = $db->query($sql_PlcTst);

//VERIFICA SE OCORREU ERRO NA CONSULTA
if ($res_PlcTst === false) {
	die("Erro ao executar a consulta no banco de dados: " . $conn->error);
}

//OBTÉM O RESULTADO DA CONSULTA
	$row = $res_PlcTst->fetch_assoc();
	$placas_Tst = $row["placas_Tst"];

//IMPRIME AS INFORMAÇÕES
	echo "Quantidade de placas testadas: " . $placas_Tst . ". Meta: 250" . "<br>";
	echo "<br>";


// #########################  LÓGICA PARA APRESENTAÇÃO DA PORCENTAGEM DE PLACAS APROVADAS #########################
//REALIZA A CONSULTA NO BANCO DE DADOS
$sql_PlcNOK = "SELECT COUNT(DISTINCT Board_SN) AS placas_NOK FROM `maquina_teste` WHERE Pass_Fail = 'FAILED'";
$res_PlcNOK = $db->query($sql_PlcNOK);

//VERIFICA SE OCORREU ERRO NA CONSULTA
if ($res_PlcNOK === false) {
	die("Erro ao executar a consulta no banco de dados: " . $db->error);
}

//OBTÉM O RESULTADO DA CONSULTA
	$row = $res_PlcNOK->fetch_assoc();
	$placas_NOK = $row["placas_NOK"];
	
// REALIZA O CALCULO DA PORCENTAGEM DE PLACAS APROVADAS
$Pct_PlcAprov = (($placas_Tst - $placas_NOK)/$placas_Tst)*100;

//IMPRIME AS INFORMAÇÕES
	echo "Porcentagem de placas aprovadas: " . $Pct_PlcAprov . "%" . "<br>";
	echo "<br>";
//	echo "<br>";


// #########################  LÓGICA PARA APRESENTAÇÃO DOS PRINCIPAIS DEFEITOS ENCONTRADOS #########################
//REALIZA A CONSULTA NO BANCO DE DADOS
$sql_DefCurtos = "SELECT COUNT(Pass_Fail) AS DefCurtos FROM `maquina_teste` WHERE Device_Name = 'CURTOS' AND Pass_Fail = 'FAILED'";
$res_DefCurtos = $db->query($sql_DefCurtos);

$sql_DefPT1 = "SELECT COUNT(Pass_Fail) AS DefPT1 FROM `maquina_teste` WHERE Device_Name = 'PT1' AND Pass_Fail = 'FAILED'";
$res_DefPT1 = $db->query($sql_DefPT1);

$sql_DefPOT = "SELECT COUNT(Pass_Fail) AS DefPOT FROM `maquina_teste` WHERE Device_Name = 'POT' AND Pass_Fail = 'FAILED'";
$res_DefPOT = $db->query($sql_DefPOT);

$sql_DefR1 = "SELECT COUNT(Pass_Fail) AS DefR1 FROM `maquina_teste` WHERE Device_Name = 'R1' AND Pass_Fail = 'FAILED'";
$res_DefR1 = $db->query($sql_DefR1);

$sql_DefR2 = "SELECT COUNT(Pass_Fail) AS DefR2 FROM `maquina_teste` WHERE Device_Name = 'R2' AND Pass_Fail = 'FAILED'";
$res_DefR2 = $db->query($sql_DefR2);

$sql_DefR3 = "SELECT COUNT(Pass_Fail) AS DefR3 FROM `maquina_teste` WHERE Device_Name = 'R3' AND Pass_Fail = 'FAILED'";
$res_DefR3 = $db->query($sql_DefR3);

$sql_DefZ1 = "SELECT COUNT(Pass_Fail) AS DefZ1 FROM `maquina_teste` WHERE Device_Name = 'Z1' AND Pass_Fail = 'FAILED'";
$res_DefZ1 = $db->query($sql_DefZ1);

$sql_DefZ2 = "SELECT COUNT(Pass_Fail) AS DefZ2 FROM `maquina_teste` WHERE Device_Name = 'Z2' AND Pass_Fail = 'FAILED'";
$res_DefZ2 = $db->query($sql_DefZ2);

$sql_DefC1 = "SELECT COUNT(Pass_Fail) AS DefC1 FROM `maquina_teste` WHERE Device_Name = 'C1' AND Pass_Fail = 'FAILED'";
$res_DefC1 = $db->query($sql_DefC1);

$sql_DefTRIACLOW = "SELECT COUNT(Pass_Fail) AS DefTRIACLOW FROM `maquina_teste` WHERE Device_Name = 'TRIAC_LOW' AND Pass_Fail = 'FAILED'";
$res_DefTRIACLOW = $db->query($sql_DefTRIACLOW);

$sql_DefDIACHIGH = "SELECT COUNT(Pass_Fail) AS DefDIACHIGH FROM `maquina_teste` WHERE Device_Name = 'DIAC_HIGH' AND Pass_Fail = 'FAILED'";
$res_DefDIACHIGH = $db->query($sql_DefDIACHIGH);

$sql_DefTRIACHIGH = "SELECT COUNT(Pass_Fail) AS DefTRIACHIGH FROM `maquina_teste` WHERE Device_Name = 'TRIAC_HIGH' AND Pass_Fail = 'FAILED'";
$res_DefTRIACHIGH = $db->query($sql_DefTRIACHIGH);


//VERIFICA SE OCORREU ERRO NA CONSULTA
if ($res_DefCurtos === false) {
	die("Erro ao executar a consulta no banco de dados: " . $db->error);
}

if ($res_DefPT1 === false) {
	die("Erro ao executar a consulta no banco de dados: " . $db->error);
}

if ($res_DefPOT === false) {
	die("Erro ao executar a consulta no banco de dados: " . $db->error);
}

if ($res_DefR1 === false) {
	die("Erro ao executar a consulta no banco de dados: " . $db->error);
}

if ($res_DefR2 === false) {
	die("Erro ao executar a consulta no banco de dados: " . $db->error);
}

if ($res_DefR3 === false) {
	die("Erro ao executar a consulta no banco de dados: " . $db->error);
}

if ($res_DefZ1 === false) {
	die("Erro ao executar a consulta no banco de dados: " . $db->error);
}

if ($res_DefZ2 === false) {
	die("Erro ao executar a consulta no banco de dados: " . $db->error);
}

if ($res_DefC1 === false) {
	die("Erro ao executar a consulta no banco de dados: " . $db->error);
}

if ($res_DefTRIACLOW === false) {
	die("Erro ao executar a consulta no banco de dados: " . $db->error);
}

if ($res_DefDIACHIGH === false) {
	die("Erro ao executar a consulta no banco de dados: " . $db->error);
}

if ($res_DefTRIACHIGH === false) {
	die("Erro ao executar a consulta no banco de dados: " . $db->error);
}


//OBTÉM O RESULTADO DA CONSULTA
	$row = $res_DefCurtos->fetch_assoc();
	$DefCurtos = $row["DefCurtos"];
	
	$row = $res_DefPT1->fetch_assoc();
	$DefPT1 = $row["DefPT1"];
	
	$row = $res_DefPOT->fetch_assoc();
	$DefPOT = $row["DefPOT"];
	
	$row = $res_DefR1->fetch_assoc();
	$DefR1 = $row["DefR1"];
	
	$row = $res_DefR2->fetch_assoc();
	$DefR2 = $row["DefR2"];
	
	$row = $res_DefR3->fetch_assoc();
	$DefR3 = $row["DefR3"];
	
	$row = $res_DefZ1->fetch_assoc();
	$DefZ1 = $row["DefZ1"];
	
	$row = $res_DefZ2->fetch_assoc();
	$DefZ2 = $row["DefZ2"];
	
	$row = $res_DefC1->fetch_assoc();
	$DefC1 = $row["DefC1"];
	
	$row = $res_DefTRIACLOW->fetch_assoc();
	$DefTRIACLOW = $row["DefTRIACLOW"];
	
	$row = $res_DefDIACHIGH->fetch_assoc();
	$DefDIACHIGH = $row["DefDIACHIGH"];
	
	$row = $res_DefTRIACHIGH->fetch_assoc();
	$DefTRIACHIGH = $row["DefTRIACHIGH"];	


//IMPRIME AS INFORMAÇÕES

	echo "Quantidade de defeitos encontrados durante os testes" . "<br>";;
	echo "<pre>";
	echo "     Teste CURTOS: " . $DefCurtos . "<br>";
	echo "     Teste PT1: " . $DefPT1 . "<br>";
	echo "     Teste POT: " . $DefPOT . "<br>";
	echo "     Teste R1: " . $DefR1 . "<br>";
	echo "     Teste R2: " . $DefR2 . "<br>";
	echo "     Teste R3: " . $DefR3 . "<br>";
	echo "     Teste Z1: " . $DefZ1 . "<br>";
	echo "     Teste Z2: " . $DefZ2 . "<br>";
	echo "     Teste C1: " . $DefC1 . "<br>";
	echo "     Teste TRIAC_LOW: " . $DefTRIACLOW . "<br>";
	echo "     Teste DIAC_HIGH: " . $DefDIACHIGH . "<br>";
	echo "     Teste TRIAC_HIGH: " . $DefTRIACHIGH . "<br>";
	echo "</pre>";


//FECHA A CONEXÃO COM O BANCO DE DADOS
$db->close();
?>

</body>
</html>