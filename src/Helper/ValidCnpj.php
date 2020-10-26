<?php


namespace App\Helper;


class ValidCnpj
{
    public function verify(string $cnpj): bool
    {
        if (!ValidCnpj::isCnpj($cnpj)) return false;
        $cnpjNumber = ValidCnpj::removeFormat($cnpj);
        if (!ValidCnpj::verifyNumberEqual($cnpjNumber)) return false;
        if (!ValidCnpj::validateDigits($cnpjNumber)) return false;
        return true;
    }

    private function isCnpj(string $cnpj)
    {
        $regexCnpj = "/[0-9]{2}\.[0-9]{3}\.[0-9]{3}\/[0-9]{4}\-[0-9]{2}/";
        return preg_match($regexCnpj, $cnpj);
    }

    private function removeFormat(string $cnpj)
    {
        return str_replace([".", "/", "-"], "", $cnpj);
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