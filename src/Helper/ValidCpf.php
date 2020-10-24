<?php


namespace App\Helper;


class ValidCpf
{
    public function verify(string $cpf): bool
    {
        if (!ValidCpf::isCpf($cpf)) return false;
        $cpf_number = ValidCpf::removeFormat($cpf);
        if (!ValidCpf::verifyNumberEqual($cpf_number)) return false;
        if (!ValidCpf::validateDigits($cpf_number)) return false;
        return true;
    }


    private function isCpf(string $cpf)
    {
        $regexCpf = "/[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}/";
        return preg_match($regexCpf, $cpf);
    }

    private function removeFormat(string $cpf)
    {
        return str_replace([".", "-"], "", $cpf);
    }

    private function verifyNumberEqual(string $cpf): bool
    {
        for ($i = 0; $i <= 11; $i++) {
            if (str_repeat($i, 11) == $cpf) return false;
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

        $mathOne = ( ( $firstDigit % 11 ) < 2 ) ? 0 : 11 - ( $firstDigit % 11 );

        $mathTwo = ( ( $secondDigit % 11 ) < 2 ) ? 0 : 11 - ( $secondDigit % 11 );

        if ( $mathOne <> $cpf[9] || $mathTwo <> $cpf[10] ) return false;
        return true;
    }
}