<?php

require_once 'autoload.php';

//use Trabalho\Arquivo\Arquivo;
use Trabalho\String\ClasseString;
use Trabalho\Tags_Comandos\Tags_Comandos;

$tags_comandos = new Tags_Comandos();
$opcao = [];

do {
    //ClasseString::validaTag(fgets(STDIN));
    $tags_comandos->isTag(fgets(STDIN));
    $opcao [] = $string->validaString(fgets(STDIN));
} while(!$tags_comandos->isCommand($opcao[count($opcao)-1]));

exit();

$message = match (fgets(STDIN)) {
    1 => 'Monday',
    2 => 'Tuesday',
    3 => 'Wednesday',
    4 => 'Thursday',
    5 => 'Friday',
    6 => 'Saturday',
    //7 => $arquivo->imprime(),
    default => 'Invalid Input !',
};

$teste = 'dale1= a a1 /*teste*/';

$string = new ClasseString($teste);


$tags = $string->defineTags();
$nome = [];
foreach($tags as $tag) {
    $nome [] = (array_keys($tag))[0];
}
print_r($nome);

$arquivo->exibeComandos();
$arquivo->salvaTags("C:\\Users\\João\\Desktop\\testeLeitura", $nome);

// INT = Números inteiros
// SPACE = Sequência de espaços em branco
// VAR = Sequência de símbolo alfanuméricos com o primerio símbolo sendo uma letra
// EQUALS = O símbolo "="
// COMMENT = Qualquer sequência 