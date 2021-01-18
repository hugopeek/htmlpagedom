# HtmlPageDom

A MODX wrapper for HtmlPageDom, a library for easy DOM manipulation of HTML documents.

For more info, visit https://github.com/wasinger/htmlpagedom.

## Plugin usage

The included plugin is just a primer for getting started (it's also disabled).

To start using it, copy and rename the plugin and attach it to the OnWebPagePrerender event.

## Examples

Add classes to elements:
```php
$dom->filter('h1:not(.header)')->addClass('ui header');
$dom->filter('h2:not(.header)')->addClass('ui header');
```

Add class to body based on ClientConfig setting:
```php
if ($modx->getObject('cgSetting', array('key' => 'theme_page_background_color'))->get('value') !== 'ffffff') {
    $dom->filter('body')->addClass('non-white');
}
```

Apply your own function to each filtered node:
```php
$dom->filter('.inverted.segment')
    ->each(function (HtmlPageCrawler $segment) {

        // Prevent elements from having the same color as their parent background
        if ($segment->hasClass('primary-color')) {
            $segment
                ->filter('.primary.button')
                ->removeClass('basic')
                ->addClass('inverted')
            ;
        }
    })
;
```

Move elements out of their parent container:
```php
$dom->filter('.swiper-container')
    ->parents()
    ->each(function (HtmlPageCrawler $parent) {
        if ($parent->hasClass('nested','slider')) {
            $parent->filter('.swiper-button-prev')->appendTo($parent);
            $parent->filter('.swiper-button-next')->appendTo($parent);
        }
    })
;
```

For more examples, see the [ManipulateDOM plugin](https://github.com/hugopeek/romanesco-patterns/blob/master/core/components/romanesco/elements/plugins/07_computations/c_content/manipulatedom.plugin.php) in Romanesco.

## Why

A page crawler to manipulate the DOM... Yes, that is exactly what jQuery does! But now we can do it server side, before the page is rendered. Much faster and more reliable.

Have fun!

## References

Some interesting resources:

- https://symfony.com/doc/current/components/dom_crawler.html
- https://victor.4devs.io/en/web-scraping/parsing-content-with-dom-crawler-and-css-selector.html
- https://stackoverflow.com/questions/19177578/symfony2-domcrawler-remove-nodes-from-domelement#29401018
