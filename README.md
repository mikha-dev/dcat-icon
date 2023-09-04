# Dcat Admin Extension - SVG Icon

### composer
```shell
  composer require mikha-dev/dcat-dvg-icon
```
### Resources
```shell
  php artisan vendor:publish --tag=mikha-dev.dcat-svg-icon --force
```

### dcat-admin ide-helper
```shell
  php artisan admin:ide-helper
```

```php
    $form->svgIcon('column', 'label');    
```