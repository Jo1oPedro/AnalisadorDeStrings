<?php

namespace Trabalho\String;

use Trabalho\Arquivo\Arquivo;

class ClasseString // mudar o nome da classe para comando
{
    
    private array $stringTeste = [];
    private array $tagsDefinidasPeloUsuario = [];

    public function __construct(private string $string)
    {   
    }

    public function setString(string $string) {
        $this->string = $string;
    }

    public function is_numeric(String $string): bool 
    {
        return ctype_digit($string);
    }

    public function is_letter(String $string): bool 
    {
        return ctype_alpha($string);
    }

    public function is_comment(String $string): bool
    {
        return ($string == '/');
    }

    public function is_emptySpace(String $string): bool 
    {
        return ($string == '1espaceEmBranco');
    }

    public function defineSubStrings(/*String $string*/): void 
    {
        $contTags = 0;
        for($i=0;$i<strlen($this->string);$i++) {
            if($this->string[$i] == '/*') {
                do {
                    if(!isset($this->stringTeste[$contTags])) {
                        $this->stringTeste[$contTags] = '';
                        $this->stringTeste[$contTags] .= $this->string[$i];
                    } else {
                        $this->stringTeste[$contTags] .= $this->string[$i]; 
                    }
                    $i++;
                } while(isset($this->string[$i]) || $this->string[$i-1] != '*/');
                if($this->stringTeste[strlen($this->stringTeste[$contTags])-1] != '*/') {
                    echo 'String inserida invalida';
                    exit();
                } 
                if(!isset($this->string[$i])) {
                    break;
                }
            }
            if($this->string[$i] != ' ' && $this->string[$i] != '=') {
                if(!isset($this->stringTeste[$contTags])) {
                    $this->stringTeste[$contTags] = '';
                    $this->stringTeste[$contTags] .= $this->string[$i];
                } else {
                    $this->stringTeste[$contTags] .= $this->string[$i]; 
                }
            }
            if($this->string[$i] == ' ') {
                if(isset($this->stringTeste[$contTags])) {
                    $contTags++;
                }
                $this->stringTeste[$contTags] = '1espaçoEmBranco';
                $contTags++;
            }
            if($this->string[$i] == '=') {
                if(isset($this->stringTeste[$contTags])) {
                    $contTags++;
                }
                $this->stringTeste[$contTags] = '=';
                $contTags++;
            }
        }
    }

    public function defineTags(/*String $string*/): array 
    {
        $this->defineSubStrings();
        $tags = [];
        for($cont = 0; $cont < count($this->stringTeste); $cont++) {
            if($this->is_letter($this->stringTeste[$cont][0]) ) {
                for($i=1;$i<strlen($this->stringTeste[$cont]);$i++) {
                    if($this->is_numeric($this->stringTeste[$cont][$i])) {
                        $tags [] = ['is_var' => true];
                        break;
                    }   
                }
                if(!isset($tags[$cont]['is_var'])) {
                    $tags [] = ['is_string' => true];
                }
            }
            if($this->stringTeste[$cont] == '1espaçoEmBranco') {
                $tags [] = ['is_emptySpace' => true];
            } 
            if($this->stringTeste[$cont][0] == '/') {
                $tags [] = ['is_comment' => true];
            }
            if($this->stringTeste[$cont] == '=') {
                $tags [] = ['is_equal' => true];
            }
        }
        print_r($tags);
        exit();
        return $tags;
    }

    public function validaStringDoUsuario(String $string): void 
    {
        //$this->string = $this->tagsDefinidasPeloUsuario['A']; 
        //print_r($this->string);
    }

    /*public static function validaTag(string $string): bool
    {   
        $inicioTag = strpos($string, ': ');
        $definicaoTag = self::is_letter($string[$inicioTag+1]);
        if(!$inicioTag || !$definicaoTag) {
            echo PHP_EOL . 'Tag inserida invalida';
            exit();
        }
        if(Arquivo)
        exit();
    }*/

}