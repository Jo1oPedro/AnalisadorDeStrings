<?php
/* 
Alunos:
João Pedro Ferreira Pedreira - 202076009
Miguel Sales de Almeida Lopes - 202076024
*/
require_once 'autoload.php';

use Trabalho\Arquivo\Arquivo;
use Trabalho\Tags_Comandos\Tags_Comandos;
use Trabalho\Aviso\Aviso;

$arquivo = new Arquivo();

$tags_comandos = new Tags_Comandos();
$tagDefinidaPeloUsuario = [];

$tagInvalida = null;
$escolha = '';

do{
    do {
        $tagInvalida = true;
        $tag = fgets(STDIN);
        if($tags_comandos->isTag($tag)) {
            $tagDefinidaPeloUsuario [] = $tag;
            $tagInvalida = false;
        }else if($tags_comandos->isUnaryCommand($tag) || $tags_comandos->isCommand($tag)) {
            $escolha = substr($tag, 0, 2);
        }else { 
            Aviso::mostrarAviso('error', 'Entrada invalida.');;
        }
    } while(!$tagInvalida);
    
    
    $message = match ($escolha) {
        ':d' => Aviso::mostrarAviso('warning', 'Funcionalidade ainda não implementada.'),
        ':c' => $tags_comandos->carregaTagsExternas($tag),
        ':o' => Aviso::mostrarAviso('warning', 'Funcionalidade ainda não implementada.'),
        ':p' => Aviso::mostrarAviso('warning', 'Funcionalidade ainda não implementada.'),
        ':a' => Aviso::mostrarAviso('warning', 'Funcionalidade ainda não implementada.'),
        ':l' => $tags_comandos->exibeTagsValidas(),
        ':q' => Aviso::mostrarAviso('info', 'Finalizando o programa!'),
        ':s' => $tags_comandos->defineTagsDoUsuario($tagDefinidaPeloUsuario, $tag),
        default => 'Invalid Input !',
    };
} while(true);