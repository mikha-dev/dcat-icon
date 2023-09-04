<?php

namespace Dcat\Admin\ToolButtons;

use Dcat\Admin\Actions\Action;
use Dcat\Admin\Models\SvgIcon;
use Illuminate\Http\Request;

class RegenerateCssToolButton extends Action
{

    public function __construct($title = null)
    {
        parent::__construct($title);
    }

    public function handle(Request $request)
    {
        SvgIcon::generateCss();

        return $this->response()
            ->success(__('success'))
            ->refresh();
    }

    protected function parameters()
    {
        return [];
    }

    protected function html()
    {
        $this->appendHtmlAttribute('class', ' btn btn-primary btn-outline btn-outline');
        $this->defaultHtmlAttribute('href', 'javascript:void(0)');

        return <<<HTML
        <div class="btn-group pull-right" style="margin-right: 10px">
    <a {$this->formatHtmlAttributes()}>
        <i class="fa fa-recycle"></i>&nbsp;&nbsp;{$this->title()}
    </a>
</div>
HTML;
    }
}
