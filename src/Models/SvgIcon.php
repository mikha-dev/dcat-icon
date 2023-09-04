<?php

namespace Dcat\Admin\Models;

use Dcat\Admin\Enums\IconType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Dcat\Admin\Traits\HasDateTimeFormatter;

class SvgIcon extends Model
{
    protected $table = 'admin_icons';

    use HasDateTimeFormatter;

    protected $casts = [
        'type' => IconType::class
    ];

    public static function generateCss()
    {
        $stub = file_get_contents(__DIR__ . '/../../resources/assets/css/index.css');

        Storage::disk(config('admin.upload.disk'))
            ->put('icons/icon-svg.css', $stub);

        self
            ::where('type', IconType::SVG)
            ->each(function (SvgIcon $icon) {
                SvgIcon::appendSvg($icon->name, $icon->icon);
            });
    }

    public static function appendSvg($fullName, $icon)
    {
        $filename = 'icons/' . $fullName . '.svg';

        Storage::disk(config('admin.upload.disk'))
            ->put($filename, $icon);

        $url = Storage::disk(config('admin.upload.disk'))->url($filename);
        $background = <<<CSS
.$fullName::before{background-image: url("$url");}
CSS;

        Storage::disk(config('admin.upload.disk'))
            ->append('icons/icon-svg.css', $background);
    }
}
