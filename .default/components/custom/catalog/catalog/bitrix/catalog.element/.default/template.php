<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$buy_title = 'Купить ' . $arResult['NAME'];
$APPLICATION->SetTitle($buy_title);


$strTitle = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"] != ''
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]
	: $arResult['NAME']
);
$strAlt = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]) && $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"] != ''
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]
	: $arResult['NAME']
);

?>
<script>
$(document).ready(function () {
$(".tab").click(function () {
		$(".tab").removeClass("active");
		$(this).addClass("active");
		$(".tab_content").hide().removeClass("tab_active");
		$(".tab_content").eq($(".tab").index(this)).fadeIn().addClass("tab_active")
	});	
});
</script>
<div class="goods_card_main_block">
	<div class="container">
		<h2><?$APPLICATION->ShowTitle(false)?></h2>
		<div class="row">
			<div class="goods_card_block clearfix">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-lg-2 hidden-md col-sm-2 hidden-xs">
							<ul class="image_preview_col">
								<?$img=CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]["ID"], array('width'=>83, 'height'=>83), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
                                <li class="tab_img"><img src="<?=$img["src"]?>"></li>
                                <?foreach ($arResult["PROPERTIES"]["PHOTO"]["VALUE"] as $p=>$photo){
                                	$img=CFile::ResizeImageGet($photo, array('width'=>83, 'height'=>83), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
                                    <li class="tab_img<?=(!empty($arResult["PROPERTIES"]["PHOTO"]["DESCRIPTION"][$p])?" tab_img_video":"")?>">
                                    	<?/*if(!empty($arResult["PROPERTIES"]["PHOTO"]["DESCRIPTION"][$p])){?>
												<i class="circle fa fa-play"></i>
                                    	<?}*/?>
                                    	<img src="<?=$img["src"]?>">
                                    </li>
                                <?}?>                                  
                            </ul>
						</div>
						<div class="col-lg-10 col-md-12 col-sm-10">
							<div class="image_preview" id="wait_img">
								<div class="img_preview_box tab_active">
									<?$img=CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]["ID"], array('width'=>413, 'height'=>413), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
                                    <a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" class="fancybox" rel="gallery_1"><img src="<?=$img["src"]?>" alt="<?=$strAlt?>"></a>
                                </div>
								<?foreach ($arResult["PROPERTIES"]["PHOTO"]["VALUE"] as $p=>$photo){?>
									<div class="img_preview_box ">
										<?if(!empty($arResult["PROPERTIES"]["PHOTO"]["DESCRIPTION"][$p])){?>
											<div class="img_preview_box_video">
											<iframe src="<?=$arResult["PROPERTIES"]["PHOTO"]["DESCRIPTION"][$p]?>" frameborder="0" allowfullscreen></iframe>
										<?}else{?>
											<?$img=CFile::ResizeImageGet($photo, array('width'=>413, 'height'=>413), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
                                            <?$bimg=CFile::ResizeImageGet($photo, array('width'=>1000, 'height'=>1000), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
										    <a href="<?=$bimg["src"]?>" class="fancybox" rel="gallery_1"><img src="<?=$img["src"]?>" alt="<?=$strAlt?>"></a>
										<?}
										if(!empty($arResult["PROPERTIES"]["PHOTO"]["DESCRIPTION"][$p])){?>
											</div>
										<?}?>
									</div>
								<?}?>
							</div>
						</div>
						<div class="hidden-lg col-md-12 hidden-sm">
							<ul class="image_preview_col">
								<?$img=CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]["ID"], array('width'=>83, 'height'=>83), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
								<li class="tab_img"><img src="<?=$img["src"]?>"></li>
								<?foreach ($arResult["PROPERTIES"]["PHOTO"]["VALUE"] as $photo){
									$img=CFile::ResizeImageGet($photo, array('width'=>83, 'height'=>83), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
									<li class="tab_img"><img src="<?=$img["src"]?>"></li>
								<?}?>
							</ul>
						</div>
					</div>
				</div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="goods_card_box">
                                <div class="card_box_row clearfix">


<?
if(count($arResult["BRAND"])>0)
{
?>
                                    <div class="goods_brand_logo">



                                        <a href="<?=$arResult["BRAND"]["LINK"]?>" target="_blank">

                                            <img src="<?=$arResult["BRAND"]["PICTURE"]?>" alt="<?=$arResult["BRAND"]["NAME"]?>">

                                        </a>



                                    </div>
<?}?>


                                    <div data-brackets-id='34898' class="star_id_block">



                                        <div data-brackets-id='34899' class="rating_block clearfix">

                                            <ul class="star_rating_nopick">

                                                <li class="current" style="width: <?=($arResult["RATE"]*20)?>%"><span class="star1" title="Рейтинг 1 из 5"></span></li>

                                                <li><span class="star2" title="Рейтинг 2 из 5"></span></li>

                                                <li><span class="star3" title="Рейтинг 3 из 5"></span></li>

                                                <li><span class="star4" title="Рейтинг 4 из 5"></span></li>

                                                <li><span class="star5" title="Рейтинг 5 из 5"></span></li>

                                            </ul>

                                            <a>(<?=$arResult["NUM"]?>)</a>

                                        </div>



                                        <div class="id_block">

                                           <?
                                           
                                           
                                           
if(!empty($arResult["PROPERTIES"]["ID"]["VALUE"]))
{
?>
                                                            <b>ID:</b> <span><?=$arResult["PROPERTIES"]["ID"]["VALUE"]?></span>
                                                            
                                                            <?}?>

                                        </div>



                                        <a href="<?=$APPLICATION->GetCurPageParam("print=Y", array("print")); ?>" class="print_block"><span>распечатать</span></a>



                                    </div>



                                </div>



                                <div class="card_box_row">



                                    <div class="card_box_col">



                                        <div class="price_block">

<?
if(intval($arResult["MIN_PRICE"]["DISCOUNT_VALUE"])>0 && $arResult["MIN_PRICE"]["DISCOUNT_VALUE"]<$arResult["MIN_PRICE"]["VALUE"])
{
?>

                                            <div class="new_price">

                                                <h2><?=$arResult["MIN_PRICE"]["PRINT_DISCOUNT_VALUE"]?></h2></div>

                                            <div class="old_price"><?=$arResult["MIN_PRICE"]["PRINT_VALUE"]?></div>



                                            <div class="economy_block">

                                                <span>Экономия <?=CurrencyFormat(($arResult["MIN_PRICE"]["VALUE"]-$arResult["MIN_PRICE"]["DISCOUNT_VALUE"]),"RUB")?> </span>

                                            </div>
                                            
                                            <?}
                                            else 
                                            {
                                            	?>
                                            	<div class="new_price">

                                                <h2><?=$arResult["MIN_PRICE"]["PRINT_VALUE"]?></h2></div>
                                            	<?
                                            }
                                            ?>

                                        </div>



                                    </div>



                                    <div class="card_box_col">


<?
if($arResult["PROPERTIES"]["YES"]["VALUE"]=="1")
{
?>
                                        <div class="exist_block">Есть в наличии</div>
                                        <?}
                                        else 
                                        {
                                        	?>
                                        	 <div class="exist_block not">Нет в наличии</div>
                                        	<?
                                        }
                                        ?>



                                    </div>



                                </div>


<?
if($arResult["PROPERTIES"]["YES"]["VALUE"]=="1")
{
?>
                                <div class="card_box_row">



                                    <div class="card_box_col">



                                        <p>Доставим курьером</p>

                                        <h6>Сегодня</h6>



                                    </div>



                                    <div class="card_box_col">



                                        <h6><?=CurrencyFormat($arResult["DELIVERY"]["PRICE"], $arResult["DELIVERY"]["CURRENCY"])?></h6>



                                    </div>



                                </div>
                                
                                <?}?>



                                <div class="card_box_row clearfix">



                                  


<?
if($arResult["PROPERTIES"]["YES"]["VALUE"]==1)
{
?>
                                    <a href="<?=$arResult["ID"]?>" class="btn blue_btn b_buy">Купить</a>

                                    <a href="<?=$arResult["ID"]?>" rel="<?=$arResult["NAME"]?>" class="btn btn_black one_click_button">Купить в 1 клик</a>
                                    
                                    <?}?>



                                    <div class="card_box_col">



                                        <div class="like_add_block clearfix">



                                            <div class="like_btn<?=(in_array($arResult["ID"],$arResult["LIKE"])?" active":"")?> bdelay" href="<?=$arResult["ID"]?>">

                                                <span class="icon-hearth_ico"> <i>В избранное</i></span>

                                                <span class="icon-hearth_ico_full"> <i>Избранное</i></span>

                                            </div>



                                            <div class="add_basket b_compare <?=(count($_SESSION["CATALOG_COMPARE_LIST"][$arParams["IBLOCK_ID"]]["ITEMS"][$arResult["ID"]])>0?" active":"")?>" rel="<?=$arResult["ID"]?>">

                                                <span class="icon-plus"> <i>Сравнить</i></span>

                                                <span class="icon-check_ico"> <i>Выбрано</i></span>

                                            </div>



                                        </div>





                                    </div>



                                    <div class="card_box_col">



                                        <div class="social_enter_block">

                                            <p>Поделиться</p>


											<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-services="vkontakte,facebook,gplus,linkedin,tumblr"></div>

                                           <?/* ?> <div class="social_block">
                                                <a href="#" class="social_box facebook_ico">
                                                    <span class="icon-facebook2"></span>
                                                </a>
                                                <a href="#" class="social_box vk_ico">
                                                    <span class="icon-vk"></span>
                                                </a>
                                                <a href="#" class="social_box google_ico">
                                                    <span class="icon-google-plus2"></span>
                                                </a>
                                                <a href="#" class="social_box twitter_ico">
                                                    <span class="icon-tumblr2"></span>
                                                </a>
                                                <a href="#" class="social_box linkeid_ico">
                                                    <span class="icon-linkedin"></span>
                                                </a>
                                            </div>
*/?>


                                        </div>



                                    </div>



                                </div>



                            </div>



                        </div>

                    </div>



                </div>



            </div>



        </div>

    </div>

    <!-- END CATALOG BLOCK -->



    <!-- BEGIN GOODS MAIN TABS BLOCK -->

    <div class="goods_main_tabs_block">



        <div class="container">



            <div class="top_buy_row">



                <div class="tab active">

                    <h6>Описание</h6>

                </div>



                <div class="tab" id="character">

                    <h6>Характеристики</h6>

                </div>



                <div class="tab">

                    <h6>Отзывы</h6>

                </div>



                <div class="tab">

                    <h6>Оплата и доставка</h6>

                </div>



                <div class="tab">

                    <h6>Обсуждения</h6>

                </div>



            </div>



            <div class="tabs_content_block">



                <div class="tab_content tab_active">



                    <?=$arResult["DETAIL_TEXT"]?>





                    <div class="col-md-8">

                        <div class="row">


<?
if (!empty($arResult['DISPLAY_PROPERTIES']))
	{
?>
                            <ul class="goods_property_table">

                                <li>

                                    <h6>Основные характеристики</h6></li>

                                    
                                    <?
                                    $z=0;
foreach ($arResult['DISPLAY_PROPERTIES'] as &$arOneProp)
		{
			if($z>4) break;
?>
                                <li>

                                    <div class="property_table_col"><? echo $arOneProp['NAME']; ?></div>

                                    <div class="property_table_col"><?
			echo (
				is_array($arOneProp['DISPLAY_VALUE'])
				? implode(' / ', $arOneProp['DISPLAY_VALUE'])
				: $arOneProp['DISPLAY_VALUE']
			); ?></div>

                                </li>
                                <?
		$z++;
		}?>

                                

                            </ul>
                            <?}?>



                        </div>

                    </div>



                    <div class="clearfix"></div>

                    <a href="#all_properties" class="btn btn_black" onclick="$('#character').trigger('click');return false;">Все характеристики</a>



                </div>



                <div class="tab_content clearfix">



                    <div class="col-md-8">


<?
if (!empty($arResult['DISPLAY_PROPERTIES']))
	{
?>
                        <ul class="goods_property_table">

                            <li>

                                <h6>Основные характеристики</h6></li>
<?

                                    
foreach ($arResult['DISPLAY_PROPERTIES'] as &$arOneProp)
		{
?>
                            <li>

                                <div class="property_table_col"><? echo $arOneProp['NAME']; ?></div>

                                <div class="property_table_col"><?
			echo (
				is_array($arOneProp['DISPLAY_VALUE'])
				? implode(' / ', $arOneProp['DISPLAY_VALUE'])
				: $arOneProp['DISPLAY_VALUE']
			); ?></div>

                            </li>
                            
                            <?}?>

                           

                        </ul>

<?}?>

                    </div>



                    <div class="col-md-4">


<?
if(intval($arResult["PROPERTIES"]["PDF"]["VALUE"][0])>0)
{
?>
                        <div class="download_manual_block">


<?
foreach ($arResult["PROPERTIES"]["PDF"]["VALUE"] as $f=>$pdf)
{
	$pth=CFile::GetPath($pdf);
	if(!empty($arResult["PROPERTIES"]["PDF"]["DESCRIPTION"][$f]))
	{
		$ttl=$arResult["PROPERTIES"]["PDF"]["DESCRIPTION"][$f];
	}
	else $ttl=basename($pth);
?>
                            <div class="download_box">



                                <a href="<?=$pth?>" target="_blank"><h6><?=$ttl?></h6></a>

                                <span>(<?=(ceil(filesize($_SERVER['DOCUMENT_ROOT'].$pth)/1024))?> Кб.)</span>

<?}?>

                            </div>



                          



                        </div>
                        
<?}?>



                    </div>





                </div>



                <div class="tab_content">



                    <div class="goods_feedback_block">



                        <div class="fedback_header clearfix">



                            <h6><?=$arResult["NAME"]?> - Отзывы</h6>



                            <div class="rating_block clearfix">

                                <ul class="star_rating_nopick">

                                    <li class="current" style="width: <?=($arResult["RATE"]*20)?>%"><span class="star1" title="Рейтинг 1 из 5"></span></li>

                                    <li><span class="star2" title="Рейтинг 2 из 5"></span></li>

                                    <li><span class="star3" title="Рейтинг 3 из 5"></span></li>

                                    <li><span class="star4" title="Рейтинг 4 из 5"></span></li>

                                    <li><span class="star5" title="Рейтинг 5 из 5"></span></li>

                                </ul>



                                <a>(<?=intval($arResult["NUM"])?> <?=plural_form($arResult["NUM"], array("отзыв","отзыва","отзывов"))?> )</a>

                            </div>



                        </div>

<?
global $arrFc;
$arrFc=array("PROPERTY_GOOD"=>$arResult["ID"]);

?>
<div id="cmnt">
<?
if($_REQUEST["ajax_comment"]=="Y")
{
	$APPLICATION->RestartBuffer();
}
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"comment",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.y G:i",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("", ""),
		"FILTER_NAME" => "arrFc",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "3",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "comment",
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("MINUS_TEXT", "RATING", "PLUS_TEXT", "", ""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"GOOD_ID"=>$arResult["ID"]
	)
);?>
<?
if($_REQUEST["ajax_comment"]=="Y")
{
	die();
}
?>
</div>
                        



                        



                    </div>



                </div>



                <div class="tab_content">


<?$APPLICATION->IncludeFile("/include/delivery.php",Array(),Array("MODE"=>"html"));?>
                    



                </div>



                <div class="tab_content">



                   <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = "http://<?=$_SERVER['HTTP_HOST']?><?=$APPLICATION->GetCurPage()?>";  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = "Good<?=$arResult["ID"]?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = '//http-jetgear-ru.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>



                </div>



            </div>





        </div>



    </div>

    <!-- END GOODS MAIN TABS BLOCK -->


<?
if(intval($arResult["PROPERTIES"]["THIS"]["VALUE"][0])>0)
{
	?>
	<?
	global $arrFilterh;
 $arrFilterh=array("ID"=>$arResult["PROPERTIES"]["THIS"]["VALUE"]);
 ?>
 <?$APPLICATION->IncludeComponent("bitrix:catalog.section", "this", Array(
	"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
		"ADD_PICT_PROP" => "-",	// Дополнительная картинка основного товара
		"ADD_PROPERTIES_TO_BASKET" => "N",	// Добавлять в корзину свойства товаров и предложений
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"ADD_TO_BASKET_ACTION" => "ADD",	// Показывать кнопку добавления в корзину или покупки
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
		"BACKGROUND_IMAGE" => "-",	// Установить фоновую картинку для шаблона из свойства
		"BASKET_URL" => "/personal/cart",	// URL, ведущий на страницу с корзиной покупателя
		"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "N",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
		"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",	// Не подключать js-библиотеки в компоненте
		"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"ELEMENT_SORT_FIELD" => "shows",	// По какому полю сортируем элементы
		"ELEMENT_SORT_FIELD2" => "shows",	// Поле для второй сортировки элементов
		"ELEMENT_SORT_ORDER" => "asc",	// Порядок сортировки элементов
		"ELEMENT_SORT_ORDER2" => "asc",	// Порядок второй сортировки элементов
		"FILTER_NAME" => "arrFilterh",	// Имя массива со значениями фильтра для фильтрации элементов
		"HIDE_NOT_AVAILABLE" => "Y",	// Товары, которых нет на складах
		"IBLOCK_ID" => "1",	// Инфоблок
		"IBLOCK_TYPE" => "catalog",	// Тип инфоблока
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
		"LABEL_PROP" => "-",	// Свойство меток товара
		"LINE_ELEMENT_COUNT" => "1",	// Количество элементов выводимых в одной строке таблицы
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",	// Текст кнопки "Добавить в корзину"
		"MESS_BTN_BUY" => "Купить",	// Текст кнопки "Купить"
		"MESS_BTN_DETAIL" => "Подробнее",	// Текст кнопки "Подробнее"
		"MESS_BTN_SUBSCRIBE" => "Подписаться",	// Текст кнопки "Уведомить о поступлении"
		"MESS_NOT_AVAILABLE" => "Нет в наличии",	// Сообщение об отсутствии товара
		"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
		"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
		"OFFERS_LIMIT" => "5",	// Максимальное количество предложений для показа (0 - все)
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "",	// Название категорий
		"PAGE_ELEMENT_COUNT" => "50",	// Количество элементов на странице
		"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
		"PRICE_CODE" => array(	// Тип цены
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
		"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
		"PRODUCT_PROPERTIES" => array(	// Характеристики товара
			0 => "",
		),
		"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
		"PRODUCT_QUANTITY_VARIABLE" => "",	// Название переменной, в которой передается количество товара
		"PRODUCT_SUBSCRIPTION" => "N",	// Разрешить оповещения для отсутствующих товаров
		"PROPERTY_CODE" => array(	// Свойства
			0 => "ACTION",
			1 => "HIT",
			2 => "",
		),
		"SECTION_CODE" => "",	// Код раздела
		"SECTION_ID" => "",	// ID раздела
		"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
		"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
		"SECTION_USER_FIELDS" => array(	// Свойства раздела
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SHOW_ALL_WO_SECTION" => "Y",	// Показывать все элементы, если не указан раздел
		"SHOW_CLOSE_POPUP" => "N",	// Показывать кнопку продолжения покупок во всплывающих окнах
		"SHOW_DISCOUNT_PERCENT" => "N",	// Показывать процент скидки
		"SHOW_OLD_PRICE" => "N",	// Показывать старую цену
		"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
		"TEMPLATE_THEME" => "site",	// Цветовая тема
		"USE_MAIN_ELEMENT_SECTION" => "N",	// Использовать основной раздел для показа элемента
		"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
		"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
	),
	false
);?>
	<?
}
?>
    