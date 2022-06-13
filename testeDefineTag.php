<?php
/* 
Alunos:
João Pedro Ferreira Pedreira - 202076009
Miguel Sales de Almeida Lopes - 202076024
*/
require_once 'autoload.php';
use Trabalho\String\ClasseString;

$string = new ClasseString('dale123');


echo "Defina as tags: " . PHP_EOL;
$userTag = trim(fgets(STDIN)); 
if(str_contains($userTag, ':')) {
    $string->defineTagsDoUsuario($userTag);
}

$string->verificaStringDoUsuario();