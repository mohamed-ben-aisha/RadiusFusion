<?php

namespace App\Enums;

enum ServiceOrdersCategoryEnum: string
{
    case InternetDown = 'Internet Down';
    case InternetSlow = 'Internet Slow';
    case InternetNotWorking = 'Internet Not Working';
    case NoCoverage = 'No Coverage';
    case HardwareProblem = 'Internet Not Working With LAN';
    case ConfigurationProblem = 'Configuration Problem';
    case Other = 'Other';
}
