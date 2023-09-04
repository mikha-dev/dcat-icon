<?php

namespace Weiwait\DcatIcon\Enums;

use Dcat\Admin\DcatEnum;
use Dcat\Admin\Traits\DcatEnumTrait;

enum IconType : int implements DcatEnum
{
    use DcatEnumTrait;

    case SVG = 1;
    case FONT = 2;
}
