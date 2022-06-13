<?php
/* 
Alunos:
João Pedro Ferreira Pedreira - 202076009
Miguel Sales de Almeida Lopes - 202076024
*/
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
                exit();
            default:
                echo $mensagem;
                break;
        }
    }
}