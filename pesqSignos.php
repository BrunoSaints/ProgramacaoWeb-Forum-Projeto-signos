<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Signo</title>
</head>

<body style="
    text-align:center;
    background-color:cornflowerblue;
    color: #D9D9D9">

<h1>Seu signo é:</h1>

<?php
  $signs = simplexml_load_file('inforSignos.xml');
  $data = $_GET['birthDate'];
  $data = explode('-', $data);
  $dataFormat = $data[1] . "/" . $data[2];

  foreach ($signs->sign as $sign) {
    $initialDateForm = explode('/', $sign->initialDate);
    $initialDateForm = $initialDateForm[1] . "/" . $initialDateForm[0];

    $endDateForm = explode('/', $sign->endDate);
    $endDateForm = $endDateForm[1] . "/" . 
    $endDateForm[0];

    if (strtotime($dataFormat) >= strtotime($initialDateForm) && strtotime($dataFormat) <= strtotime($endDateForm)) {
    echo "<h3>$sign->signName</h3>";
    echo $sign->description;
  }
}
?>
<br/>
<br/>
<br/>
<input type="button" value="Voltar" onClick="history.go(-1)">
</body>
</html>