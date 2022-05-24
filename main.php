<?php

require_once 'autoload.php';
use Trabalho\String\ClasseString;

$teste = 'dale1 a a1 /*teste*/';
$string = new ClasseString($teste);

$tags = $string->defineTags();
$nome = [];
foreach($tags as $tag) {
    $nome [] = (array_keys($tag))[0];
}
print_r($nome);


