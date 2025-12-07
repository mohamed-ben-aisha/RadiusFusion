<?php

namespace App\Helpers;

class ConverterUnitHelper
{
    public static function convertBitesToOtherUnit($bytes): string
    {
        $units = ['Bits', 'Kbps', 'Mbps', 'Gbps', 'Tbps', 'Pbps'];

        $bytes = (int) $bytes;
        $i = 0;
        while ($bytes >= 1024 && $i < count($units) - 1) {
            $bytes /= 1024;
            $i++;
        }

        return round($bytes, 2).' '.$units[$i];
    }
}
