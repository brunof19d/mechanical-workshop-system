<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Helper\Identification;

class CheckCPF
{
    public function verify(string $cpf): bool
    {
        if ($this->isCpf($cpf) === FALSE) {

            return false;

        } elseif ($this->verifyNumberEqual($cpf) === FALSE) {

            return false;

        } elseif ($this->validateDigits($cpf) === FALSE) {

            return false;

        }

        return true;
    }


    private function isCpf(string $cpf)
    {
        $regexCpf = "/[0-9]{11}/";
        return preg_match($regexCpf, $cpf);
    }

    private function verifyNumberEqual(string $cpf): bool
    {
        for ($i = 0; $i <= 11; $i++) {

            if (str_repeat($i, 11) == $cpf) {
                return false;
            }

        }

        return true;
    }

    private function validateDigits(string $cpf): bool
    {
        $firstDigit = 0;
        $secondDigit = 0;

        for ($i = 0, $weight = 10; $i <= 8; $i++, $weight--) {
            $firstDigit += $cpf[$i] * $weight;
        }

        for ($i = 0, $weight = 11; $i <= 9; $i++, $weight--) {
            $secondDigit += $cpf[$i] * $weight;
        }

        $mathOne = (($firstDigit % 11) < 2) ? 0 : 11 - ($firstDigit % 11);

        $mathTwo = (($secondDigit % 11) < 2) ? 0 : 11 - ($secondDigit % 11);

        if ($mathOne <> $cpf[9] || $mathTwo <> $cpf[10]) {
            return false;
        }

        return true;
    }
}