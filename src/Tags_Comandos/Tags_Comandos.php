<?php
/* 
Alunos:
João Pedro Ferreira Pedreira - 202076009
Miguel Sales de Almeida Lopes - 202076024
*/
namespace Trabalho\Tags_Comandos;

use Trabalho\Arquivo\Arquivo;
use Trabalho\Aviso\Aviso;

class Tags_Comandos 
{
    
    private array $tagsDefinidasPeloUsuario = [];

    public function __construct(private array $comandos = [], private array $tags = [], private Arquivo $arquivo = new Arquivo(), private array $ComandosUnarios = [])
    { 
        $this->arquivo->carregaArquivos($this->comandos, $this->tags, $this->ComandosUnarios);
    }

    public function exibeComandos(): void
    {
        $this->arquivo->exibeComandos();
    }

    public function exibeTagsValidas(): void
    {
        $this->arquivo->exibeTagsValidas();
    }

    public function salvaTags(string $caminhoDoArquivo, array $arrayDeTags): void 
    {   
        $this->arquivo->salvaTags($caminhoDoArquivo, $arrayDeTags);
    }

    public function isCommand(string $comando): bool
    {
        $codigoDoComando = substr($comando, 0, 2);
        if(in_array($codigoDoComando, $this->comandos)) {
            if(!((substr($comando, 2, 1) == ' ') && (substr($comando, 3, 1) != ' '))) {
                Aviso::mostrarAviso('error', 'Comando inválido.');
            }
        }
        return in_array($codigoDoComando, $this->comandos);
    }

    public function isTag(string $string): bool
    {
        $tags = strpos($string, ':');
        $tag = substr($string, 0, $tags);
        if(in_array($tag, $this->tags)) {
            if(!((substr($string, $tags+1, 1) == ' ') && (substr($string, $tags+2, 1) != ' '))) {
                Aviso::mostrarAviso('error', 'Tag inválida.');
            } // a tag só pode ter um único espaço após os ':', por isso verifico +2
        }
        return in_array($tag, $this->tags);
    }

    public function defineTagsDoUsuario(array $tags, string $caminhoDoArquivo): void // define um array com as keys sendo as tags do usuario(INT, VAR E ETC) e o valor do array sendo o restante(515, abc123, arroz)
    {
        foreach($tags as $tag) {
            $definicaoDaTag = strpos($tag, ':');
            $nameTag = substr($tag, 0, $definicaoDaTag);
            $definicaoTag = trim(substr($tag, $definicaoDaTag+1, strlen($tag)));
            $this->tagsDefinidasPeloUsuario[$nameTag] = '';
            for($i = 0; $i < strlen($definicaoTag); $i++) {
                $this->tagsDefinidasPeloUsuario[$nameTag] .= $definicaoTag[$i];
            }
        }
        $this->arquivo->salvaTags($caminhoDoArquivo, $this->tagsDefinidasPeloUsuario);
        Aviso::mostrarAviso('info', 'Tags salvas com sucesso!');
    }

    public function isUnaryCommand(string $comandos): bool
    {  
        $comandos = trim($comandos);
        return in_array($comandos, $this->ComandosUnarios);
    }

    public function carregaTagsExternas($caminhoDoArquivo): void
    {
        $tagsExternas = [];
        $this->arquivo->carregaTagsExternas($caminhoDoArquivo, $tagsExternas);
        foreach($tagsExternas as $tagsDoUsuario) {
            $this->isTag($tagsDoUsuario);
        }
        $this->defineTagsDoUsuario($tagsExternas, $caminhoDoArquivo);
        Aviso::mostrarAviso('info', 'Tags carregadas com sucesso!');
    }
}


/*while(!feof($arquivoDeComandos)) {
    echo fgets($arquivoDeComandos);
}*/

//fclose($arquivoDeComandos);



//https://stackoverflow.com/questions/13243177/reading-a-file-in-a-different-directory-php

//https://www.youtube.com/watch?v=2yiesjpWRhw