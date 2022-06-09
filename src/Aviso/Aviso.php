<?php

namespace Trabalho\Aviso;

class Aviso
{
    
    public static function mostrarAviso(string $tipo, string $mensagem){
        switch($tipo){
            case 'warning':
                echo "[WARNING] ". $mensagem;
                break;
            case 'info':
                echo "[INFO] ". $mensagem;
                break;
            case 'error':
                echo "[ERROR] ". $mensagem;
                break;
            default:
                echo $mensagem;
                break;
        }
    }
}