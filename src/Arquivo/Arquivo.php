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
        //rename('C:\Users\João\Desktop\testeLeitura\cursos.txt', 'cursos.txt');
        if(!file_exists($caminhoDoArquivo)) {
            'O arquivo requisitado não existe';
            exit();
        }
        file_put_contents("C:\Users\João\Desktop\Reserva\a.txt", implode("\n", $arrayDeTags), FILE_APPEND);
    }

    public function exibeComandos(): void
    {
        //$arquivoDeComandos = fopen('comandos.txt', 'r');
        //rename("C:\Users\João\Desktop\Reserva\comando2.txt.txt", 'comando2.txt');
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