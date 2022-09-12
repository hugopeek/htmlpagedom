<?php
/**
 * Resolve creating db tables
 *
 * THIS RESOLVER IS AUTOMATICALLY GENERATED, NO CHANGES WILL APPLY
 *
 * @package htmlpagedom
 * @subpackage build
 *
 * @var mixed $object
 * @var modX $modx
 * @var array $options
 */

if ($object->xpdo) {
    $modx =& $object->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $modelPath = $modx->getOption('htmlpagedom.core_path');

            if (empty($modelPath)) {
                $modelPath = '[[++core_path]]components/htmlpagedom/model/';
            }

            if ($modx instanceof modX) {
                $modx->addExtensionPackage('htmlpagedom', $modelPath, array (
  'serviceName' => 'htmlpagedom',
  'serviceClass' => 'HtmlPageDom',
));
            }

            break;
        case xPDOTransport::ACTION_UNINSTALL:
            if ($modx instanceof modX) {
                $modx->removeExtensionPackage('htmlpagedom');
            }

            break;
    }
}

return true;