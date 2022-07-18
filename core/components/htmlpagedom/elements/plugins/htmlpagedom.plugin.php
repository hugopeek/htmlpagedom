<?php
/**
 * HtmlPageDom
 *
 * This is just an example plugin to get started. Duplicate and do your thing.
 */

if (!class_exists(\Wa72\HtmlPageDom\HtmlPageCrawler::class)) {
    $modx->log(modX::LOG_LEVEL_ERROR, '[HtmlPageDom] Class not found!');
    return;
}

use \Wa72\HtmlPageDom\HtmlPageCrawler;

switch ($modx->event->name) {
    case 'OnWebPagePrerender':

        // Check if content type is text/html
        if ($modx->resource->get('content_type') !== 1) {
            break;
        }

        // Get processed output of resource
        $output = &$modx->resource->_output;

        // Feed output to HtmlPageDom
        $dom = new HtmlPageCrawler($output);

        // Do your thing


        // Save manipulated DOM
        $output = $dom->saveHTML();

        break;
}