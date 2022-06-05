<?php

namespace Trabalho\Arquivo;

class Arquivo 
{

    public function carregaArquivos(array &$comandos, array &$tags): void
    {
        $comandos = file('comandosValidos.txt');
        $tags = file('tagsValidas.txt');
        $this->retiraEspacosEmbranco($comandos, $tags);
    }

    public function salvaTags(string $caminhoDoArquivo, array $arrayDeTags) 
    {
        $caminhoDoArquivo = str_replace('"', '', $caminhoDoArquivo);
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

    public function retiraEspacosEmbranco(mixed &$comandos, mixed &$tags): void
    {
        $comandos = array_map('trim', $comandos);  
        $tags = array_map('trim', $tags); 
    }

    public function fechaArquivo(mixed $arquivoParaFechar): void 
    {
        fclose($arquivoParaFechar);
    }

}