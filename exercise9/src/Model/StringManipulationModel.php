<?php
declare(strict_types=1);

namespace exercise9\Model;

class StringManipulationModel
{
    public function concatenate($str1, $str2)
    {
        return $str1 . $str2;
    }

    public function getSubstring($str, $start, $length = null)
    {
        if (is_null($length)) {
            return substr($str, $start);
        } else {
            return substr($str, $start, $length);
        }
    }

    public function replaceSubstring($str, $start, $replace, $length = null)
    {
        $begin = substr($str, 0, $start);
        $end = is_null($length) ? '' : substr($str, $start + $length);

        return $begin . $replace . $end;
    }
}
