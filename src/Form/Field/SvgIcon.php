<?php

namespace Dcat\Admin\Form\Field;

use Dcat\Admin\Form\Field\Text;
use Dcat\Admin\Models\SvgIcon;

class Icon extends Text
{
    protected $view = 'mikha-dev.dcat-icon::index';

    public function render()
    {
        $this->defaultAttribute('autocomplete', 'off')
            ->defaultAttribute('style', 'width: 160px;flex:none');

        $this->addVariables(['icons' => SvgIcon::all()]);

        return parent::render();
    }
}
