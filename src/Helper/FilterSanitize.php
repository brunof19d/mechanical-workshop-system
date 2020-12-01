<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Helper;

use Exception;

class FilterSanitize
{
    public function string($var, string $messageThrow)
    {
        $filter = filter_var($var, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        if (!$filter) throw new Exception($messageThrow);

        return $filter;
    }

    public function int($var, string $messageThrow)
    {
        $filterSanitize = filter_var($var, FILTER_SANITIZE_NUMBER_INT);
        if (!$filterSanitize) {
            throw new Exception($messageThrow);
        }

        $filterValidate = filter_var($filterSanitize, FILTER_VALIDATE_INT);
        if (!$filterValidate) {
            throw new Exception($messageThrow);
        }

        return $filterValidate;
    }

    public function email(string $var, string $messageThrow)
    {
        $filterValidate = filter_var($var, FILTER_VALIDATE_EMAIL);
        if ($filterValidate === FALSE) {
            throw new Exception($messageThrow);
        }

        $filterSanitize = filter_var($filterValidate, FILTER_SANITIZE_EMAIL);
        if ($filterSanitize === FALSE) {
            throw new Exception($messageThrow);
        }

        return $filterSanitize;
    }

    public function float($var, string $messageThrow)
    {
        $filter = filter_var($var, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_THOUSAND);
        if (!$filter) throw new Exception($messageThrow);
        return $filter;
    }

    public function phone($var, string $messageThrow)
    {
        $var = str_replace('-', '', $var);

        $string = filter_var($var, FILTER_SANITIZE_NUMBER_INT);

        if ($string === FALSE) {
            throw new Exception($messageThrow);
        }

        return $string;
    }

    public function cep($var, string $messageThrow)
    {
        return $this->phone($var, $messageThrow);
    }
}