<?php
$naam = test_input($_POST['naam']);
$email = $_POST['email'];
$vereniging = test_input($_POST['vereniging']);
$onderwerp = $_POST['onderwerp'];
$bericht = test_input($_POST['bericht']);
$from="noreply@aalstersegilles.be";

//CC invullen? 
if($_POST['copy']=='on')
{
    $sendtocreater = $_POST['copy'];
    	$headers =  'From: '.$from."\r\n".
			        'CC: '.$email."\r\n".
			'MIME-Version: 1.0' . "\r\n".
			'Content-type:text/html; charset=UTF-8' . "\r\n".
			'X-Mailer: PHP/' . phpversion(); 
    
}
else
{
    $sendtocreater="off";
    	$headers =  'From: '.$from."\r\n".
			
			'MIME-Version: 1.0' . "\r\n".
			'Content-type:text/html; charset=UTF-8' . "\r\n".
			'X-Mailer: PHP/' . phpversion(); 
}


//naar wie verzenden + aangeven onderwerp:

switch($onderwerp)
{
     case 0: 
        //other
        $mailto="info@aalstersegilles.be, webmaster@aalstersegilles.be";
        $subject= "er werd een vraag gesteld via de website maar geen onderwerp aangeduid.";
        break;
    case 1:
        //algemeen
        $mailto="info@aalstersegilles.be";
        $subject= "er werd een algemene vraag gesteld via de website";
        break;
    case 2:
        //GDPR
        $mailto="GDPR@aalstersegilles.be";
        $subject= "er werd een GDPR vraag gesteld via de website";
        break;
    case 3:
        //online (site, facebook,...)
        $mailto="webmaster@aalstersegilles.be";
        $subject= "er werd een IT vraag gesteld via de website";
        break;
    default: 
        //other
        $mailto="info@aalstersegilles.be, webmaster@aalstersegilles.be";
        $subject= "er werd een vraag gesteld via de website maar geen onderwerp aangeduid.";
}

//opmaken van mailbericht:

$message = "
<html>
<head>
<title>nieuw bericht op de website aalstersegilles.be</title>
</head>
<body>
<p>beste<br/><br/>het contactformulier werd ingevuld: </p>
<table border=1>
<tr>
<th>tag</th>
<th>inhoud</th>
</tr>
<tr>
<td>naam: </td>
<td>".$naam."</td>
</tr>
<tr>
<td>mail: </td>
<td>".$email."</td>
</tr>
<tr>
<td>vereniging: </td>
<td>".$vereniging."</td>
</tr>
<tr>
<td>Onderwerp: </td>
<td>".$subject."</td>
</tr>
<tr>
<td>boodschap: </td>
<td>".$bericht."</td>
</tr>
</table>
</body>
</html>
";

//opmaken van de header:
//-> zie boven(if statement)


//clearen van the message:
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



//zenden van het bericht
mail($mailto,$subject,$message,$headers);


/**
echo "mailto: ". $mailto;
echo "<br/><br/>";
echo "subject: " .$subject;
echo "<br/><br/>";
echo "message: " .$message;
echo "<br/><br/>";
echo "headers: " .$headers;
**/


//terugkeren naar de website
header("Location: ../contacteer.php?submit=true");



?>
