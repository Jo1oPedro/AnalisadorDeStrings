<?php

//Responsavel por fazer o require das classes requisitadas no arquivo main

spl_autoload_register(function (string $nomeCompletoDaClasse) {
    $caminhoArquivo = str_replace('Trabalho', 'src', $nomeCompletoDaClasse);
    $caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminhoArquivo);
    $caminhoArquivo .= '.php';
    if(file_exists($caminhoArquivo)) {
        require_once $caminhoArquivo;
    }
}); 