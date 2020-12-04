<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Helper\Identification;

class CheckCNPJ
{
    public function verify(string $cnpj): bool
    {
        if ($this->isCnpj($cnpj) === FALSE) {

            return false;

        } elseif ($this->verifyNumberEqual($cnpj) === FALSE) {

            return false;

        } elseif ($this->validateDigits($cnpj) === FALSE) {

            return false;

        }

        return true;
    }

    private function isCnpj(string $cnpj)
    {
        $regexCnpj = "/[0-9]{14}/";
        return preg_match($regexCnpj, $cnpj);
    }

    private function verifyNumberEqual(string $cnpj): bool
    {
        for ($i = 0; $i <= 14; $i++) {
            if (str_repeat($i, 14) == $cnpj) return false;
        }
        return true;
    }

    private function validateDigits(string $cnpj): bool
    {
        $firstDigit = 0;
        $secondDigit = 0;
        for ($i = 0, $weight = 5; $i <= 11; $i++, $weight--) {
            $weight = ($weight < 2) ? 9 : $weight;
            $firstDigit += $cnpj[$i] * $weight;
        }

        for ($i = 0, $weight = 6; $i <= 12; $i++, $weight--) {
            $weight = ($weight < 2) ? 9 : $weight;
            $secondDigit += $cnpj[$i] * $weight;
        }

        $mathOne = (($firstDigit % 11) < 2) ? 0 : (11 - ($firstDigit % 11));
        $mathTwo = (($secondDigit % 11) < 2) ? 0 : (11 - ($secondDigit % 11));

        if ($mathOne <> $cnpj[12] || $mathTwo <> $cnpj[13]) return false;
        return true;
    }
}