<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Helper\Identification;

class CheckID
{
    private CheckCPF $checkCpf;
    private CheckCNPJ $checkCnpj;

    public function __construct()
    {
        $this->checkCpf = new CheckCPF();
        $this->checkCnpj = new CheckCNPJ();
    }

    public function verify(string $identification): bool
    {
        if (strlen($identification) === 11) {

            return $this->checkCpf->verify($identification);

        } elseif (strlen($identification) === 14) {

            return $this->checkCnpj->verify($identification);
        }

        return false;
    }
}