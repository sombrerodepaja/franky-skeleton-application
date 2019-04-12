<?php
use modulos\seo\Form\SEOForm;
use modulos\seo\vendor\model\SeoModel;
use modulos\seo\vendor\entity\SeoEntity;

$MySeo              = new SeoModel();
$SeoEntity  = new SeoEntity($MyRequest->getRequest());
$adminForm = new SEOForm("frmseo");

$id		= $MyRequest->getRequest('id');
$callback	= $MyRequest->getRequest('callback');

$data = $MyFlashMessage->getResponse();

if(!empty($id))
{
        $result	 = $MySeo->getData($SeoEntity->getArrayCopy());
	$data = $MySeo->getRows();
        $adminForm->addId();
}

$paginas = selectPagina();

$idiomas = array();

$idiomas_disponibles = getCoreConfig('base/theme/langs');
foreach($idiomas_disponibles as $idioma)
{
    $idiomas[$idioma] = $idioma;
}


$adminForm->setOptionsInput("id_franky", $paginas);
$adminForm->setOptionsInput("lang", $idiomas);
$adminForm->setData($data);
$adminForm->setAtributoInput("callback","value", urldecode($callback));

$title_form = "SEO";
?>
