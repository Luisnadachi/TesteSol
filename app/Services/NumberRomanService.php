<?php

namespace App\Services;

class NumberRomanService
{

    protected $romans = array(
        "I" => 1,
        "V" => 5,
        "X" => 10,
        "L" => 50,
        "C" => 100,
        "D" => 500,
        "M" => 1000
    );

    public function parse(string $input)
    {
        $total = 0;
        $text = '';
        $last = 0;

        for ($i =strlen($input) - 1; $i >= 0; $i--) {

            $word = 0;
            $number = $input[$i];
            if (array_key_exists($number, $this->romans)) {
                $word = $this->romans[$number];
            }

            $multiplier = 1;
            if ($word < $last) {
                $multiplier = -1;
            }

            $text .= $number;
            $total += ($word * $multiplier);
            $last = $word;
        }



        return response()->json([
            'number' => strrev($text),
            'value' => $total
        ]);
    }
}
