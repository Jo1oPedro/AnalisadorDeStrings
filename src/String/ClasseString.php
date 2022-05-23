<?php

namespace Trabalho\String;
class ClasseString 
{
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
}