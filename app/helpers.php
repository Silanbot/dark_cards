<?php

if (! function_exists('xor')) {
    function cipher(string $text, string $key): string
    {
        $outText = '';
        for ($i = 0; $i < strlen($text); $i++) {
            for ($j = 0; $j < strlen($key); $j++) {
                $outText .= $text[$i] ^ $key[$j];
            }
        }

        return $outText;
    }
}
