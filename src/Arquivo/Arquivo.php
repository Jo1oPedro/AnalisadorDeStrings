<?php
/* 
Alunos:
João Pedro Ferreira Pedreira - 202076009
Miguel Sales de Almeida Lopes - 202076024
*/
namespace Trabalho\Arquivo;

use Trabalho\String\ClasseString;

class Arquivo 
{

    public function carregaArquivos(array &$comandos, array &$tags, array &$ComandosUnarios): void
    {
        $comandos = file('comandosValidos.txt');
        $tags = file('tagsValidas.txt');
        $ComandosUnarios = file('ComandosUnarios.txt');
        $this->retiraEspacosEmbranco($comandos, $tags, $ComandosUnarios);
    }

    public function salvaTags(string $caminhoDoArquivo, array $arrayDeTags) 
    {
        $caminhoDoArquivoTratado = strpos($caminhoDoArquivo, " ");
        $caminhoDoArquivo = substr($caminhoDoArquivo, $caminhoDoArquivoTratado+1);
        $caminhoDoArquivo = trim(str_replace('"', '', $caminhoDoArquivo));
        $arquivo = fopen($caminhoDoArquivo, 'w');
        if(!$arquivo) {
            echo 'Problema ao abrir o arquivo';
            exit();
        }
        foreach($arrayDeTags as $key => $tag) {
            $tagDefinicao = $key . ": " . $tag . PHP_EOL;
            fwrite($arquivo, $tagDefinicao);
        }
    }

    public function exibeComandos(): void
    {
        $arquivoDeComandos = fopen("comandosUsuario.txt", 'r');
        if(!$arquivoDeComandos) {
            echo 'Erro ao abrir o arquivo de comandos';
            exit();
        }
        stream_copy_to_stream($arquivoDeComandos, STDOUT);
        $this->fechaArquivo($arquivoDeComandos);
    }

    public function exibeTagsValidas(): void
    {
        $tagsValidas = fopen("tagsValidas.txt", 'r');
        if(!$tagsValidas){
            echo 'Erro ao abrir o arquivo de tags válidas.';
            exit();
        }
        stream_copy_to_stream($tagsValidas, STDOUT);
        $this->fechaArquivo($tagsValidas);
    }

    public function retiraEspacosEmbranco(mixed &$comandos = [], mixed &$tags = [], mixed &$ComandosUnarios = []): void
    {
        $comandos = array_map('trim', $comandos);  
        $tags = array_map('trim', $tags); 
        $ComandosUnarios = array_map('trim', $ComandosUnarios);
    }

    public function carregaTagsExternas(string $caminhoDoArquivo, mixed &$tagsExternas): void
    {
        $caminhoDoArquivo = trim(str_replace('"', '', $caminhoDoArquivo));
        if(!file_exists($caminhoDoArquivo)) {
            echo 'O arquivo requisitado não existe';
            exit();
        }

        $tagsExternas = file($caminhoDoArquivo);
        $this->retiraEspacosEmbranco(tags: $tagsExternas);
    }

    public function fechaArquivo(mixed $arquivoParaFechar): void 
    {
        fclose($arquivoParaFechar);
    }

}