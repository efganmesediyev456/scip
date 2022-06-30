<?php

namespace App\Support\MediaLibrary;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\Conversions\Conversion;

class FileNamer extends \Spatie\MediaLibrary\Support\FileNamer\FileNamer
{
    public $name;

    public function __construct()
    {
        $this->name = Str::upper(Str::uuid());
    }

    public function originalFileName(string $fileName): string
    {
        return $this->name;
    }

    public function conversionFileName(string $fileName, Conversion $conversion): string
    {
        $strippedFileName =  $this->name;

        return "{$strippedFileName}-{$conversion->getName()}";
    }

    public function responsiveFileName(string $fileName): string
    {
        return $this->name;
    }
}
