<?php


namespace App\Helper;


use Exception;

class VerifyDataset
{
    /**
     * @param string $cep
     * @return string
     * @throws Exception
     */
    public function formatCep(string $cep): string
    {
        if (strlen($cep) !== 10) throw new Exception('CEP Invalido');
        $format = substr($cep, 0, 2) . ".";
        $format .= substr($cep, 3, 3);
        $format .= substr($cep, 6, 9);
        return $format;
    }

    /**
     * @param string $phone
     * @return string
     */
    public function formatPhone(string $telefone): string
    {
        $telefone = filter_var($telefone, FILTER_SANITIZE_NUMBER_INT);
        $formatado = "(" . substr($telefone, 0, 2) . ") ";
        $formatado .= substr($telefone, 2, -4);
        $formatado .= substr($telefone, -4);
        return $formatado;
    }
}