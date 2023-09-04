<?php

namespace Dcat\Admin;

use Dcat\Admin\Form;
use Dcat\Admin\Admin;
use Dcat\Admin\Form\Field\SvgIcon;
use Dcat\Admin\Models\SvgIcon as Model;
use Dcat\Admin\Extend\ServiceProvider;

class SvgIconServiceProvider extends ServiceProvider
{
	protected $js = [
        'js/icon.js',
    ];
	protected $css = [
	];

	protected $menu = [
        [
            'title' => 'Svg Icons',
            'uri' => 'svg-icons',
            'icon' => 'fa-icon',
        ],
    ];

	public function register()
	{
		//
	}

	public function init()
	{
		parent::init();

		Admin::css(\Storage::disk(config('admin.upload.disk'))->url(Model::formatCssFileName()));

		Form::extend('svgIcon', SvgIcon::class);

		Admin::requireAssets('@mikha-dev.dcat-svg-icon');

        $this->publishable();
	}

	public function settingForm()
	{
		return new Setting($this);
	}
}