<?php

namespace App\Services;

class NumberRomanService
{
    protected array $romanNumerals = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    ];

    public function parse(string $input): array
    {
        $numbersFound = $this->retrieveNumberPossibilities($input);

        return $this->transformOutput($numbersFound);
    }

    private function retrieveNumberPossibilities(string $input): array
    {
        $result = [];

        $numeralsSum = 0;
        $currentNumerals = '';
        $lastNumeralValue = 0;
        for ($i = strlen($input) - 1; $i >= 0; $i--) {
            $romanNumeral = $input[$i];
            if (!$this->isRomanNumeral($romanNumeral)) {
                $result[] = [
                    'text' => $currentNumerals,
                    'value' => $numeralsSum
                ];
                $currentNumerals = '';
                $numeralsSum = 0;
                $lastNumeralValue = 0;

                continue;
            }
            $word = $this->romanNumerals[$romanNumeral];

            $multiplier = 1;
            if ($word < $lastNumeralValue) {
                $multiplier = -1;
            }

            $currentNumerals .= $romanNumeral;
            $numeralsSum += ($word * $multiplier);
            $lastNumeralValue = $word;
        }

        $result[] = [
            'text' => $currentNumerals,
            'value' => $numeralsSum
        ];
        return $result;
    }

    private function isRomanNumeral(string $char): bool
    {
        return array_key_exists($char, $this->romanNumerals);
    }

    private function transformOutput(array $numbersFound): array
    {
        $result = collect($numbersFound)->sort(fn($numA, $numB) => $numA['value'] < $numB['value'])
            ->values()
            ->first();

        return [
            'number' => strrev($result['text']),
            'value' => $result['value']
        ];
    }
}
