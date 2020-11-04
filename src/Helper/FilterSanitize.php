<?php


namespace App\Helper;


use Exception;

class FilterSanitize
{
    public function string(string $var, string $messageThrow)
    {
        $filter = filter_var($var, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        if (!$filter) throw new Exception($messageThrow);
        return $filter;
    }

    public function int($var, string $messageThrow)
    {
        $filter = filter_var($var, FILTER_SANITIZE_NUMBER_INT);
        if (!$filter) throw new Exception($messageThrow);
        return $filter;
    }

    public function email(string $var, string $messageThrow)
    {
        $filter = filter_var($var, FILTER_VALIDATE_EMAIL);
        if (!$filter) throw new Exception($messageThrow);
        return $filter;
    }

    public function float($var, string $messageThrow)
    {
        $filter = filter_var($var, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_THOUSAND);
        if (!$filter) throw new Exception($messageThrow);
        return $filter;
    }
}