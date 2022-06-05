<?php

namespace Trabalho\Arquivo;

class Arquivo 
{

    public function carregaArquivos(array &$comandos, array &$tags, array &$tagsUnarias): void
    {
        $comandos = file('comandosValidos.txt');
        $tags = file('tagsValidas.txt');
        $tagsUnarias = file('tagsUnarias.txt');
        $this->retiraEspacosEmbranco($comandos, $tags, $tagsUnarias);
    }

    public function salvaTags(string $caminhoDoArquivo, array $arrayDeTags) 
    {
        $caminhoDoArquivo = trim(str_replace('"', '', $caminhoDoArquivo));
        if(!file_exists($caminhoDoArquivo)) {
            echo 'O arquivo requisitado não existe';
            exit();
        }
        file_put_contents($caminhoDoArquivo, implode("\n", $arrayDeTags), FILE_APPEND);
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

    public function retiraEspacosEmbranco(mixed &$comandos, mixed &$tags, mixed &$tagsUnarias): void
    {
        $comandos = array_map('trim', $comandos);  
        $tags = array_map('trim', $tags); 
        $tagsUnarias = array_map('trim', $tagsUnarias);
    }

    public function fechaArquivo(mixed $arquivoParaFechar): void 
    {
        fclose($arquivoParaFechar);
    }

}