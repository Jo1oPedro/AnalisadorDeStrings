<?php

require_once 'autoload.php';
use Trabalho\String\ClasseString;
$string = new ClasseString();

$teste = 'dale1 a a1 /*teste*/';
$stringTeste = [];
$contTags = 0;
for($i=0;$i<strlen($teste);$i++) {
    if($teste[$i] == '/*') {
        do {
            if(!isset($stringTeste[$contTags])) {
                $stringTeste[$contTags] = '';
                $stringTeste[$contTags] .= $teste[$i];
            } else {
                $stringTeste[$contTags] .= $teste[$i]; 
            }
            $i++;
        } while(isset($teste[$i]) || $teste[$i-1] != '*/');
        if($stringTeste[strlen($stringTeste[$contTags])-1] != '*/') {
            echo 'String inserida invalida';
            exit();
        } 
        if(!isset($teste[$i])) {
            break;
        }
    }
    if($teste[$i] != ' ') {
        if(!isset($stringTeste[$contTags])) {
            $stringTeste[$contTags] = '';
            $stringTeste[$contTags] .= $teste[$i];
        } else {
            $stringTeste[$contTags] .= $teste[$i]; 
        }
    } else {
        $contTags++;
        $stringTeste[$contTags] = '1espaçoEmBranco';
        $contTags++;
    }
}
print_r($stringTeste) . PHP_EOL;
$tags = [];
for($cont = 0; $cont < count($stringTeste); $cont++) {
    if($string->is_letter($stringTeste[$cont][0]) ) {
        for($i=1;$i<strlen($stringTeste[$cont]);$i++) {
            if($string->is_numeric($stringTeste[$cont][$i])) {
                $tags [] = ['is_var' => true];
                break;
            }   
        }
        if(!isset($tags[$cont]['is_var'])) {
            $tags [] = ['is_string' => true];
        }
    }
    if($stringTeste[$cont] == '1espaçoEmBranco') {
        $tags [] = ['is_emptySpace' => true];
    } 
    if($stringTeste[$cont][0] == '/') {
        $tags [] = ['is_comment' => true];
    }
}

print_r($tags);
$nome = [];
foreach($tags as $tag) {
    $nome [] = (array_keys($tag))[0];
}
print_r($nome);
