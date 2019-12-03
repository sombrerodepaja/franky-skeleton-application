<?php
include 'lca.php';
include 'util.php';
bindtextdomain("catalog", PROJECT_DIR ."/modulos/catalog/locale");


if (function_exists('bind_textdomain_codeset')) 
{
    bind_textdomain_codeset("catalog", 'UTF-8');
}

$ObserverManager->addObserver('login_user','catalog_completarTareas');

define("OBJETO_PRODUCTOS", '\Catalog\model\CatalogproductsModel');
define("DIRECTORIO_IMAGENES_PRODUCTOS_ECOMMERCE","catalog/products/");
define("DETALLE_PRODUCTOS_ECOMMERCE", "");



$MyMetatag->setJs("/public/ajax/catalog/ajax.catalog.js");
?>