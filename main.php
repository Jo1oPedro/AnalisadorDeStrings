<?php
/* 
Alunos:
João Pedro Ferreira Pedreira - 202076009
Miguel Sales de Almeida Lopes - 202076024
*/
require_once 'autoload.php';

use Trabalho\Arquivo\Arquivo;
use Trabalho\String\ClasseString;
use Trabalho\Tags_Comandos\Tags_Comandos;
use Trabalho\Aviso\Aviso;

$arquivo = new Arquivo();
//$arquivo->exibeComandos();

$tags_comandos = new Tags_Comandos();
$tagDefinidaPeloUsuario = [];

$teste = 'dale1= a a1 /*teste*/';
$string = new ClasseString($teste);
$tagInvalida;
$escolha = '';

do{
    do {
        $tagInvalida = true;
        $tag = fgets(STDIN);//(string)readline();
        if($tags_comandos->isTag($tag)) {
            $tagDefinidaPeloUsuario [] = $tag;//$string->validaStringDoUsuario($tag);
            $tagInvalida = false;
        }else if($tags_comandos->isUnaryCommand($tag) || $tags_comandos->isCommand($tag)) {
            $escolha = substr($tag, 0, 2);
        }else { 
            Aviso::mostrarAviso('error', 'Entrada invalida.');;
        }
    } while(!$tagInvalida);
    
    $string->setString('dale5= b a1 /*teste2*/');
    $string->defineTags();
    
    $message = match ($escolha) {
        ':d' => Aviso::mostrarAviso('warning', 'Funcionalidade ainda não implementada.'),
        ':c' => $tags_comandos->carregaTagsExternas($tag),
        ':o' => Aviso::mostrarAviso('warning', 'Funcionalidade ainda não implementada.'),
        ':p' => Aviso::mostrarAviso('warning', 'Funcionalidade ainda não implementada.'),
        ':a' => Aviso::mostrarAviso('warning', 'Funcionalidade ainda não implementada.'),
        ':l' => $tags_comandos->exibeTagsValidas(),
        ':q' => Aviso::mostrarAviso('info', 'Finalizando o programa!'),
        ':s' => $tags_comandos->defineTagsDoUsuario($tagDefinidaPeloUsuario, $tag),
        //7 => $arquivo->imprime(),
        default => 'Invalid Input !',
    };
} while(true);


// mudar o :o para :s














































echo $message;

exit();

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