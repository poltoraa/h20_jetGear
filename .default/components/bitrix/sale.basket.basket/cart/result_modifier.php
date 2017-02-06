<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
use Bitrix\Main;

$defaultParams = array(
'TEMPLATE_THEME' => 'blue'
);
$arParams = array_merge($defaultParams, $arParams);
unset($defaultParams);

$arParams['TEMPLATE_THEME'] = (string)($arParams['TEMPLATE_THEME']);
if ('' != $arParams['TEMPLATE_THEME'])
{
	$arParams['TEMPLATE_THEME'] = preg_replace('/[^a-zA-Z0-9_\-\(\)\!]/', '', $arParams['TEMPLATE_THEME']);
	if ('site' == $arParams['TEMPLATE_THEME'])
	{
		$templateId = (string)Main\Config\Option::get('main', 'wizard_template_id', 'eshop_bootstrap', SITE_ID);
		$templateId = (preg_match("/^eshop_adapt/", $templateId)) ? 'eshop_adapt' : $templateId;
		$arParams['TEMPLATE_THEME'] = (string)Main\Config\Option::get('main', 'wizard_'.$templateId.'_theme_id', 'blue', SITE_ID);
	}
	if ('' != $arParams['TEMPLATE_THEME'])
	{
		if (!is_file($_SERVER['DOCUMENT_ROOT'].$this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css'))
		$arParams['TEMPLATE_THEME'] = '';
	}
}
if ('' == $arParams['TEMPLATE_THEME'])
$arParams['TEMPLATE_THEME'] = 'blue';


CModule::IncludeModule("sale");
$arDeliv = CSaleDelivery::GetByID(2);
$arResult["DELIVERY"]=$arDeliv;


CModule::IncludeModule("iblock");

foreach ($arResult["ITEMS"]["AnDelCanBuy"] as $k => $arItem)
{
	$arrF=array("IBLOCK_ID"=>3,"PROPERTY_GOOD"=>$arItem["PRODUCT_ID"]);
	$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arrF);
	$arResult["RATE"]=0;
	$num=0;
	$arResult["RATE"]=0;
	while($ar_fields = $res->GetNextElement())
	{
		$props = $ar_fields->GetProperties();
		$ar_res = $ar_fields->GetFields();

		$arResult["RATE"]=$arResult["RATE"]+$props["RATING"]["VALUE"];
		$num++;

	}
	$arResult["ITEMS"]["AnDelCanBuy"][$k]["RATE"]=ceil($arResult["RATE"]/$num);
	$arResult["ITEMS"]["AnDelCanBuy"][$k]["NUM"]=$num;

}
