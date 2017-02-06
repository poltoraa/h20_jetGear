<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
use Bitrix\Main\Loader;
global $APPLICATION;
if (isset($templateData['TEMPLATE_THEME']))
{
	$APPLICATION->SetAdditionalCSS($templateData['TEMPLATE_THEME']);
}
if (isset($templateData['TEMPLATE_LIBRARY']) && !empty($templateData['TEMPLATE_LIBRARY']))
{
	$loadCurrency = false;
	if (!empty($templateData['CURRENCIES']))
		$loadCurrency = Loader::includeModule('currency');
	CJSCore::Init($templateData['TEMPLATE_LIBRARY']);
	if ($loadCurrency)
	{
	?>
	<script type="text/javascript">
		BX.Currency.setCurrencies(<? echo $templateData['CURRENCIES']; ?>);
	</script>
<?
	}
}
if (isset($templateData['JS_OBJ']))
{
?><script type="text/javascript">
BX.ready(BX.defer(function(){
	if (!!window.<? echo $templateData['JS_OBJ']; ?>)
	{
		window.<? echo $templateData['JS_OBJ']; ?>.allowViewedCount(true);
	}
}));
</script><?
}
global $USER, $APPLICATION;
if($USER->isAdmin()):
	$city_name = $APPLICATION->get_cookie("city_name");
	//var_dump($city_name);
	
?>
	<?$APPLICATION->IncludeComponent(
	"yandexmarketlab:yandexmarketlab.deliveryPickup",
	"info",
	array(
		"CITY_NAME" => $city_name,
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"TO_YD_WAREHOUSE" => "N",
		"USE_ITEM" => "Y",
		"WIDGET_CODE" => "<meta name=\"ydWidgetData\" id=\"fd755d8d7375d807c7acde4813d58763\" content=\"\" data-sender_id=\"18179\" data-weight=\"0\" data-cost=\"0\" data-height=\"0\" data-length=\"0\" data-width=\"0\" data-city_from=\"Москва\" data-geo_id_from=\"213\" data-css_name=\"geo_tpl\" data-tpl_name=\"geo_tpl\" data-container_tag_id=\"d3749580af064f8103d2b5ba005e691\" data-resource_id=\"24134\" data-resource_key=\"5b5c09f6f52d4e4cd072361acb3e9bf4\" data-tracking_method_key=\"022a3491112a8feaaeba650b06f3aede\" data-autocomplete_method_key=\"b9a0f8b3527b9582ca0b332a2c3fa8a1\"></meta><!--[if lt IE 9]><script>document.createElement(\"msw\");</script><![endif]--> <script src=\"https://delivery.yandex.ru/widget/widgetJsLoader?dataTagID=fd755d8d7375d807c7acde4813d58763\" charset=\"utf-8\"></script> <msw id=\"d3749580af064f8103d2b5ba005e691\" class=\"yd-widget-container\"></msw>",
		"COMPONENT_TEMPLATE" => "info",
		"ITEM_ID" => $arResult['ID'],
		"ITEM_QUANTITY" => "1"
	),
	false
);?>
<?endif;?>

