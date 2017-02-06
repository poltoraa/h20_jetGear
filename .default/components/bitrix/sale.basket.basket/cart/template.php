<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
/** @var CBitrixBasketComponent $component */

/*echo "<pre>";
print_r($arResult["ITEMS"]["AnDelCanBuy"]);
echo "</pre>";*/
$econom=0;
?>
<!-- BEGIN BASKET BLOCK -->

    <div class="basket_main_block">

        <div class="container">



            <div class="row">
            
            <?
            if(count($arResult["ITEMS"]["AnDelCanBuy"])>0)
            {
            ?>



                <h2>Корзина</h2>



                <div class="row">



                    <div class="col-md-9">



                        <div class="order_block">
                        
                        <?
                        foreach ($arResult["ITEMS"]["AnDelCanBuy"] as $k => $arItem)
                        {
                        ?>



                            <div class="order_row clearfix">



                                <div class="order_img">

                                    <img src="<?=$arItem["PREVIEW_PICTURE_SRC"]?>" width="85" alt="<?=$arItem["NAME"]?>">

                                </div>





                                <div class="order_txt_block">



                                    <a href="<?=$arItem["DETAIL_PAGE_URL"] ?>">

                                        <h6><?=$arItem["NAME"]?></h6>

                                    </a>



                                    <div class="star_id_block">



                                        <div class="rating_block clearfix">

                                            <ul class="star_rating_nopick">

                                                <li class="current" style="width: <?=($arItem["RATE"]*20)?>%"><span class="star1" title="Рейтинг 1 из 5"></span></li>

                                                <li><span class="star2" title="Рейтинг 2 из 5"></span></li>

                                                <li><span class="star3" title="Рейтинг 3 из 5"></span></li>

                                                <li><span class="star4" title="Рейтинг 4 из 5"></span></li>

                                                <li><span class="star5" title="Рейтинг 5 из 5"></span></li>

                                            </ul>

                                            <a>(<?=$arItem["NUM"]?>)</a>

                                        </div>



                                        <div class="id_block">

                                            <b>ID:</b> <span><?=$arItem["PROPERTY_ID_VALUE"]?></span>

                                        </div>



                                    </div>



                                </div>



                                <div class="order_number">



                                    <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>

                                    <input class="good_count" type="text" value="<?=$arItem["QUANTITY"]?>" rel="<?=$arItem["ID"]?>">

                                    <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>



                                    <div class="delete_block" rel="<?=$arItem["ID"]?>"><span>Удалить</span></div>



                                </div>



                                <div class="price_block">
<?

if(!empty($arItem["DISCOUNT_PRICE"]) && $arItem["PRICE"]<$arItem["FULL_PRICE"])
{
?>
                                    <div class="old_price"><?=$arItem["FULL_PRICE_FORMATED"]?></div>

                                    <div class="new_price"><?=$arItem["PRICE_FORMATED"]?></div>
<?}
else 
{
	?>
	 <div class="new_price"><?=$arItem["PRICE_FORMATED"]?></div>
	<?
}
?>

<?
if(!empty($arItem["DISCOUNT_PRICE"]) && $arItem["PRICE"]<$arItem["FULL_PRICE"])
{
	$econom=($arItem["FULL_PRICE"]-$arItem["DISCOUNT_PRICE"])*$arItem["QUANTITY"];
?>
                                    <div class="economy_block">

                                        <span>Экономия <?=CurrencyFormat(($arItem["FULL_PRICE"]-$arItem["DISCOUNT_PRICE"]),"RUB")?> </span>

                                    </div>
                                    <?}?>

                                </div>



                            </div>

<?}?>

                            



                        </div>





                    </div>



                    <div class="col-md-3">



                        <div class="billing_block">



                            <div class="billing_row">



                                <div class="price_block">

                                    <div class="new_price">

                                        <h2><?=str_replace("руб.", "", $arResult["allSum_FORMATED"])?></h2> руб.</div>
<?
if(!empty($arResult["PRICE_WITHOUT_DISCOUNT"]) && intval($econom)>0)
{
?>
                                    <div class="old_price"><?=$arResult["PRICE_WITHOUT_DISCOUNT"]?></div>
                                    <?}?>

                                </div>

<?
if(intval($econom)>0)
{
?>

                                <span>Экономия <?=CurrencyFormat($econom,"RUB")?></span>
                                
                                <?}?>



                            </div>



                            <div class="billing_row">



                                <p>Доставим курьером</p>



                                <div class="txt_line">

                                    <h6>Сегодня</h6>

                                    <p>за</p>

                                    <h6><?=CurrencyFormat($arResult["DELIVERY"]["PRICE"], $arResult["DELIVERY"]["CURRENCY"])?></h6>

                                </div>



                            </div>



                            <div class="billing_row">

                                <a href="/personal/order/" class="btn blue_btn">Оформить</a>

                            </div>



                        </div>



                    </div>

<?}?>

                </div>





            </div>



        </div>

    </div>

    <!-- END BASKET BLOCK -->