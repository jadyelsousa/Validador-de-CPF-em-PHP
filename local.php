<?php 

    $cpf=$_POST['cpf'];

    //Adicionando cpf em um Array:

     for ($i=0; $i <strlen($cpf) ; $i++) { 
        $cpfArray[$i]=substr($cpf,$i,1);
}
    
    function validaCpf($cpfArray,$indice=8){
    $contador=2;
    $montante=0;
    for ($j=$indice; $j>=0 ; $j--) { 
        $montante += $cpfArray[$j] * $contador;
        $contador++;
        $resto=$montante%11;
    }
    
    if ($resto<2) {
           if ($cpfArray[$indice+1]==0) {
                return true;
            }
           else {
            return false; 
           }
    }
    else{
         if ($cpfArray[$indice+1]==(11-$resto)) {
            return true;
         } else {
            return false;
         }
         }
}
  
if (strlen($cpf)==11) {
$primeiroDigito=validaCpf($cpfArray);
$segundoDigito=validaCpf($cpfArray,$indice=9);
        if ($primeiroDigito==true && $segundoDigito==true) {
            echo "<script>
                alert ('CPF validado');
                window.location.href='index.html';
            </script>";
        }
        else{
            echo "<script>
                alert ('CPF inválido');
                window.location.href='index.html';
            </script>";
        }
}
else {
    echo "<script>
    alert ('CPF incompleto');
    window.location.href='index.html';
    </script>";
}



?>