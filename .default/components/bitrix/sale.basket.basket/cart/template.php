<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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

use Bitrix\Sale\DiscountCouponsManager;

/*echo "<pre>";
print_r($arResult["ITEMS"]["AnDelCanBuy"]);
echo "</pre>";*/
$econom = 0;
?>
<!-- BEGIN BASKET BLOCK -->

<div class="basket_main_block">

    <div class="container">


        <div class="row">

            <?
            if (count($arResult["ITEMS"]["AnDelCanBuy"]) > 0)
            {
            ?>


            <h2>Корзина</h2>


            <div class="row">


                <div class="col-md-9">


                    <div class="order_block">

                        <?
                        foreach ($arResult["ITEMS"]["AnDelCanBuy"] as $k => $arItem) {
                            ?>


                            <div class="order_row clearfix">


                                <div class="order_img">

                                    <img src="<?= $arItem["PREVIEW_PICTURE_SRC"] ?>" width="85"
                                         alt="<?= $arItem["NAME"] ?>">

                                </div>


                                <div class="order_txt_block">


                                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">

                                        <h6><?= $arItem["NAME"] ?></h6>

                                    </a>


                                    <div class="star_id_block">


                                        <div class="rating_block clearfix">

                                            <ul class="star_rating_nopick">

                                                <li class="current" style="width: <?= ($arItem["RATE"] * 20) ?>%"><span
                                                        class="star1" title="Рейтинг 1 из 5"></span></li>

                                                <li><span class="star2" title="Рейтинг 2 из 5"></span></li>

                                                <li><span class="star3" title="Рейтинг 3 из 5"></span></li>

                                                <li><span class="star4" title="Рейтинг 4 из 5"></span></li>

                                                <li><span class="star5" title="Рейтинг 5 из 5"></span></li>

                                            </ul>

                                            <a>(<?= $arItem["NUM"] ?>)</a>

                                        </div>


                                        <div class="id_block">

                                            <b>ID:</b> <span><?= $arItem["PROPERTY_ID_VALUE"] ?></span>

                                        </div>


                                    </div>


                                </div>


                                <div class="order_number">


                                    <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>

                                    <input class="good_count" type="text" value="<?= $arItem["QUANTITY"] ?>"
                                           rel="<?= $arItem["ID"] ?>">

                                    <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>


                                    <div class="delete_block" rel="<?= $arItem["ID"] ?>"><span>Удалить</span></div>


                                </div>


                                <div class="price_block">
                                    <?

                                    if (!empty($arItem["DISCOUNT_PRICE"]) && $arItem["PRICE"] < $arItem["FULL_PRICE"]) {
                                        ?>
                                        <div class="old_price"><?= $arItem["FULL_PRICE_FORMATED"] ?></div>

                                        <div class="new_price"><?= $arItem["PRICE_FORMATED"] ?></div>
                                        <?
                                    } else {
                                        ?>
                                        <div class="new_price"><?= $arItem["PRICE_FORMATED"] ?></div>
                                        <?
                                    }
                                    ?>

                                    <?
                                    if (!empty($arItem["DISCOUNT_PRICE"]) && $arItem["PRICE"] < $arItem["FULL_PRICE"]) {
                                        $econom = ($arItem["FULL_PRICE"] - $arItem["DISCOUNT_PRICE"]) * $arItem["QUANTITY"];
                                        ?>
                                        <div class="economy_block">

                                            <span>Экономия <?= CurrencyFormat(($arItem["FULL_PRICE"] - $arItem["DISCOUNT_PRICE"]), "RUB") ?> </span>

                                        </div>
                                    <? } ?>

                                </div>


                            </div>

                        <? } ?>


                    </div>


                    <? global $USER;
                    if ($USER->isAdmin()) {
                        if (CModule::IncludeModule("catalog")) {
                            if ($arParams["HIDE_COUPON"] != "Y") {
                                ?>
<!--                                <div class="bx_ordercart_coupon">-->
<!--                                <span>--><?//= GetMessage("STB_COUPON_PROMT") ?><!--</span><input type="text" id="coupon"-->
<!--                                                                                         name="COUPON" value=""-->
<!--                                                                                         onchange="enterCoupon();">&nbsp;<a-->
<!--                                    class="bx_bt_button bx_big" href="javascript:void(0)" onclick="enterCoupon();"-->
<!--                                    title="--><?//= GetMessage('SALE_COUPON_APPLY_TITLE'); ?><!--">--><?//= GetMessage('SALE_COUPON_APPLY'); ?><!--</a>-->
<!--                                </div>-->

                                <div class="container"
                                     style="width: 676px;margin-top: 27px;position: absolute;/* margin-bottom: 20px; */">
                                    <div class="subscribe_txt_block" style="margin-top: 11px;">
                                        <h6>Введите купон:</h6>
                                    </div>

                                    <form action="" method="POST" class="subscr_form_1" style="float: right;">
                                        <input type="text" placeholder="Введите код на скидку" id="coupon" name="COUPON"
                                               value="" onchange="enterCoupon();" required=""
                                               style="/* font-size: 14px; */padding-left: 20px; width: 427px; line-height: 44px; font-size: 16px; border: none; outline: 1px solid #dfe6e9;">
                                    </form>
                                </div>


                                <?
                                if (!empty($arResult['COUPON_LIST'])) {
                                    foreach ($arResult['COUPON_LIST'] as $oneCoupon) {
                                        $couponClass = 'disabled';
                                        switch ($oneCoupon['STATUS']) {
                                            case DiscountCouponsManager::STATUS_NOT_FOUND:
                                            case DiscountCouponsManager::STATUS_FREEZE:
                                                $couponClass = 'bad';
                                                break;
                                            case DiscountCouponsManager::STATUS_APPLYED:
                                                $couponClass = 'good';
                                                break;
                                        }
                                        ?>
                                        <div class="bx_ordercart_coupon"><input disabled readonly type="text"
                                                                                name="OLD_COUPON[]"
                                                                                value="<?= htmlspecialcharsbx($oneCoupon['COUPON']); ?>"
                                                                                class="<? echo $couponClass; ?>"><span
                                            class="<? echo $couponClass; ?>"
                                            data-coupon="<? echo htmlspecialcharsbx($oneCoupon['COUPON']); ?>"></span>
                                        <div class="bx_ordercart_coupon_notes"><?
                                            if (isset($oneCoupon['CHECK_CODE_TEXT'])) {
                                                echo(is_array($oneCoupon['CHECK_CODE_TEXT']) ? implode('<br>', $oneCoupon['CHECK_CODE_TEXT']) : $oneCoupon['CHECK_CODE_TEXT']);
                                            }
                                            ?>
                                        </div>
                                        </div><?
                                    }
                                    unset($couponClass, $oneCoupon);
                                }
                            } else {
                                ?>&nbsp;<?
                            }

                        }
                    }
                    ?>

                </div>


                <div class="col-md-3">


                    <div class="billing_block">


                        <div class="billing_row">


                            <div class="price_block">

                                <div class="new_price">

                                    <h2><?= str_replace("руб.", "", $arResult["allSum_FORMATED"]) ?></h2> руб.
                                </div>
                                <?
                                if (!empty($arResult["PRICE_WITHOUT_DISCOUNT"]) && intval($econom) > 0) {
                                    ?>
                                    <div class="old_price"><?= $arResult["PRICE_WITHOUT_DISCOUNT"] ?></div>
                                <? } ?>

                            </div>

                            <?
                            if (intval($econom) > 0) {
                                ?>

                                <span>Экономия <?= CurrencyFormat($econom, "RUB") ?></span>

                            <? } ?>


                        </div>


                        <div class="billing_row">


                            <p>Доставим курьером</p>


                            <div class="txt_line">

                                <h6>Сегодня</h6>

                                <p>за</p>

                                <h6><?= CurrencyFormat($arResult["DELIVERY"]["PRICE"], $arResult["DELIVERY"]["CURRENCY"]) ?></h6>

                            </div>


                        </div>


                        <div class="billing_row">

                            <a href="/personal/order/" class="btn blue_btn">Оформить</a>

                        </div>


                    </div>


                </div>

                <? } ?>

            </div>


        </div>


    </div>

</div>

<!-- END BASKET BLOCK -->