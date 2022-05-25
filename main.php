<?php

require_once 'autoload.php';
use Trabalho\String\ClasseString;

$teste = 'dale1= a a1 /*teste*/';

//echo "Digite a string: ";
//$teste = trim(fgets(STDIN)); Dessa forma basta apenas chamar => php main.php
//$teste = trim($argv[1]); // dessa forma é necessario chamar => php main.php dale
/*$userTag = [];
do {
    echo "Defina as tags: " . PHP_EOL;
    $userTag = trim(fgets(STDIN)); 
} while($userTag[0] != ':'); */

$string = new ClasseString($teste);

$tags = $string->defineTags();
$nome = [];
foreach($tags as $tag) {
    $nome [] = (array_keys($tag))[0];
}
print_r($nome);


// INT = Números inteiros
// SPACE = Sequência de espaços em branco
// VAR = Sequência de símbolo alfanuméricos com o primerio símbolo sendo uma letra
// EQUALS = O símbolo "="
// COMMENT = Qualquer sequência 

// Exemplo de leitura de dados de entrada/parametro

/*echo "Digite uma mensagem: ";
$line = trim(fgets(STDIN)); // Recebe uma linha da entrada
echo PHP_EOL;
$line = substr($line, 2, 5);
echo "Digite o número 1: ";
fscanf(STDIN, "%d\n", $number); // Recebe número dado na entrada
echo PHP_EOL;
echo "Digite o número 2: ";
fscanf(STDIN, "%f\n", $number2); // Recebe número float de entrada
echo $line . PHP_EOL;
echo $number . PHP_EOL;
echo $number2 . PHP_EOL;

// O primeiro índice é o nome do arquivo logo temos 3 parâmetros: 0 é o nome do arquivo, 1 é o primeiro número e 2 é o segundo número
if($argc < 2) {
    echo 'Não é possivel prosseguir com a execução do arquivo';
    exit();
}

echo 'Argumento 1: ' . $argv[1] . PHP_EOL;
echo 'Argumento 2: ' . $argv[2];
*/
