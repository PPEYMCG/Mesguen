<?php
function GeraHash($qtd){
//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
$Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ';
$QuantitedeCaracteres = strlen($Caracteres);
$QuantitedeCaracteres--;


$Hash=NULL;
    for($x=1;$x<=$qtd;$x++){
        $Posicao = rand(0,$QuantitedeCaracteres);
        $Hash .= substr($Caracteres,$Posicao,1);
    }
return $Hash;
}




function GeraHash2($qtd){
	//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
	$Caracteres2 = '0123456789';
	$QuantitedeCaracteres2 = strlen($Caracteres2);
	$QuantitedeCaracteres2--;


	$Hash=NULL;
	for($x=1;$x<=$qtd;$x++){
		$Posicao2 = rand(0,$QuantitedeCaracteres2);
		$Hash .= substr($Caracteres2,$Posicao2,1);
	}
	return $Hash;
}

//Here you specify how many characters the returning string must have
echo GeraHash(2)."-".Gerahash2(3)."-".GeraHash(2);
?>