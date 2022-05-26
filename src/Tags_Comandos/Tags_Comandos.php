<?php

namespace Trabalho\Tags_Comandos;

use Trabalho\Arquivo\Arquivo;

class Tags_Comandos 
{

    public function __construct(private array $comandos = [], private array $tags = [], private Arquivo $arquivo = new Arquivo())
    { 
        $this->arquivo->carregaArquivos($this->comandos, $this->tags);
    }

    public function exibeComandos(): void
    {
        $this->arquivo->exibeComandos();
    }

    public function salvaTags(string $caminhoDoArquivo, array $arrayDeTags): void 
    {   
        $this->arquivo->salvaTags($caminhoDoArquivo, $arrayDeTags);
    }

    public function isCommand(string $comando) {
        $comando = substr($comando, 0, 2);
        return in_array($comando, $this->comandos);
    }

    public function isTag(string $string) {
        $tags = strpos($string, ':');
        $tag = substr($string, 0, $tags);
        return in_array($tag, $this->tags);
    }
}


/*while(!feof($arquivoDeComandos)) {
    echo fgets($arquivoDeComandos);
}*/

//fclose($arquivoDeComandos);



//https://stackoverflow.com/questions/13243177/reading-a-file-in-a-different-directory-php

//https://www.youtube.com/watch?v=2yiesjpWRhw