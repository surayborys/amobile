<?php
/* @var $this yii\web\View */
/* @var $serials[] frontend\models\Serial */
/* @var string $pageTitle */
/* @var string $headerText */
use yii\helpers\Html;

$this->title = Html::encode($pageTitle);
?>

<div id="content_box">

    <div class="tarifs-all">
        <div class="section_title_page">
            <div class="content-width-wrap">
                <?= $headerText?>
            </div>
        </div>

        <div class="section-faq-tabs content-width-wrap">
            <!--CASE NO CATEGORIES ON THE SITE-->
            <?php if (!$serials): ?>
                <h3>Пока на сайте нет категорий...</h3>
            <?php endif; ?>
            <!--/ENDCASE NO CATEGORIES ON THE SITE-->
            <!--CASE CATEGORIES PRESENT ON THE SITE-->
            <?php if($serials && is_array($serials)):?>
            <?php $cp_serials = $serials?>
            <ul class="tabs">         
                <!--CHOOSE ACTIVE CATEGORY AS THE FIRST ELEMENT OF $serials[] AND DESCRIBE ACTIVE CATEGORY TAB-->
                <?php $activeCategory = array_shift($serials);?>
                <li class="active point tcb category-<?= Yii::$app->formatter->asLatinNoSpaces($activeCategory->title)?>" data-cid="<?= Yii::$app->formatter->asLatinNoSpaces($activeCategory->title)?>" rel="tariff-tab-<?= Yii::$app->formatter->asLatinNoSpaces($activeCategory->title)?>"><?= \yii\helpers\Html::encode($activeCategory->title)?></li>
                <!--/ACTIVE CATEGORY -->
                <!--REST OF CATEGORIES-->
                    <?php if(is_array($serials)):?>
                        <?php foreach($serials as $serial): ?>
                            <li class="point tcb category-<?= Yii::$app->formatter->asLatinNoSpaces($serial->title)?>" data-cid="<?= Yii::$app->formatter->asLatinNoSpaces($serial->title)?>" rel="tariff-tab-<?= Yii::$app->formatter->asLatinNoSpaces($serial->title)?>"><?= \yii\helpers\Html::encode($serial->title)?></li>
                        <?php endforeach;?>
                    <?php endif;?>
                <!--/REST OF CATEGORIES-->
            </ul>

            <div class="tabs-select-wrap">

                <select class="tabs-select mtcb">
                    <option value="#tariff-tab-<?= Yii::$app->formatter->asLatinNoSpaces($activeCategory->title)?>">
                        <?= Html::encode($activeCategory->title)?>
                    </option>
                    <?php if(is_array($serials)):?>
                    <?php foreach($serials as $serial): ?>
                    <option value="#tariff-tab-<?= Yii::$app->formatter->asLatinNoSpaces($serial->title)?>">
                        <?= Html::encode($serial->title)?>
                    </option>
                    <?php endforeach;?>
                    <?php endif;?>

                </select>
            </div>


            <div class="tab_container tariff-category-container" style="display: none;">
                <?php foreach ($cp_serials as $category): ?>
                <div id="tariff-tab-<?= Yii::$app->formatter->asLatinNoSpaces($category->title)?>" class="tab_content tariff-category-tab">
                    <div class="box-search-result">
                        <?php if((isset($category->tarifs) && !empty($category->tarifs) )&& is_array($category->tarifs)):?>
                            <?php foreach($category->tarifs as $tarif): ?>
                            <div class="search-result-item">
                                <div class="result-item-inner-left box-all-tarifs-data">
                                    <div class="box-col2">
                                        <div class="box-col-inner">
                                            <h3 class="h3"><?= Html::encode($tarif->gen_title) ?>
                                                <div class="box-icons-tarifs">
                                                    <?php if($tarif->gen_4g_optimal == \frontend\models\Tarif::TARIF_4G):?>
                                                    <span class="icon-4g"></span>
                                                    <?php endif;?>
                                                    <?php if($tarif->gen_calls_optimal == \frontend\models\Tarif::TARIF_OPTIMAL_FOR_CALLS):?>
                                                    <span class="icon-phone"></span>
                                                    <?php endif;?>
                                                </div>
                                            </h3>
                                            <p><?= Html::encode($tarif->gen_short_desc) ?></p>
                                        </div>
                                    </div>

                                    <a href="/tariff/<?= Html::encode($tarif->id)?>" class="view_more_alltarif">Подробнее</a>

                                    <div class="box-col2">
                                        <div class="box-col-inner">
                                            <div class="title_m"><?= Html::encode($tarif->gen_advantage_1_bold) ?></div>
                                            <p><?= Html::encode($tarif->gen_advantage_1_desc) ?></p>
                                        </div>
                                    </div>
                                    <div class="box-col2">
                                        <div class="box-col-inner">
                                            <div class="title_m"><?= Html::encode($tarif->gen_advantage_2_bold) ?></div>
                                            <p><?= Html::encode($tarif->gen_advantage_2_desc) ?></p>
                                        </div>
                                    </div>
                                    <div class="box-col2">
                                        <div class="box-col-inner">
                                            <div class="title_m"><?= Html::encode($tarif->gen_advantage_3_bold) ?></div>
                                            <p><?= Html::encode($tarif->gen_advantage_3_desc) ?></p>
                                        </div>
                                    </div>




                                    <div class="box-col2 fl_r">
                                        <div class="box-col-inner">
                                            <a href="/tariff/<?= Html::encode($tarif->id)?>" class="btn_class_border">Подробнее</a>
                                        </div>
                                    </div>
                                    <div class="box-col2 big-number-wrap fl_r">
                                        <div class="box-col-inner">
                                            <div class="color-big-number">
                                                <?php if(isset($tarif->gen_cost_val) && !empty($tarif->gen_cost_val)):?>
                                                <div class="number"><?= Html::encode($tarif->gen_cost_val)?></div>
                                                <div class="box-sub-text-grey">
                                                    <!--php: check if units of measurement are setted for the gen_cost_val field-->
                                                    <?php if(isset($tarif->gen_cost_UM_id)):?>
                                                    <?php 
                                                        $um = Yii::$app->delimiter->delimitUM(Html::encode($tarif->genCostUM->title));
                                                        # explode 'rub/day' to array(0=>'rub', 1=>'day')
                                                        if(is_array($um) && count($um) == 2) {
                                                            #if $um has format array(0=>'rub', '1'=>'day')
                                                            $first_grey_text = array_shift($um);
                                                            $last_grey_text = array_shift($um);
                                                            echo '<span class="first-grey-text">' . $first_grey_text . '</span>'
                                                                    . '<span class="last-grey-text">' . $last_grey_text . '</span>';
                                                        } else {
                                                            #if $um has format array(0=>'rub')
                                                            echo '<span>' . $um[0] . '</span>';
                                                        }
                                                        
                                                    ?>
                                                    <?php endif;?>
                                                    <!--php: /endcheck-->
                                                </div>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php endforeach;?>
                        <?php endif;?>
                        <?php if(!isset($category->tarifs) || empty($category->tarifs)):?>
                        <h3>Пока нет тарифов в избранной категории...</h3>
                        <?php endif;?>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <?php endif;?>
            <!--ENDCASE CATEGORIES PRESENT ON THE SITE-->
        </div>

        <div style="clear: both;"></div>
        <div class="section-callback ">
            <div class="col content-width-wrap">
                <div class="row">
                    <div class="col box-link-wrap ">
                        <a href="/feedback" class="box-link">
                            <h2 class="h2 text-center">Обратная связь</h2>
                            <p class="text-center">Данный сервис предназначен для обратной связи. Воспользуйтесь формой по ссылке, чтобы задать интересующий Вас вопрос, отправить замечания или предложения.</p>
                            <div class="box-circle"></div>
                        </a>
                    </div>

                    <div class="col box-link-wrap">
                        <a href="/faq" class="box-link ">
                            <h2 class="h2 text-center">Вопросы и ответы</h2>
                            <p class="text-center">В данном разделе вы найдете ответы на часто возникающие вопросы. Для более быстрого получения ответа Вы можете воспользоваться поиском.</p>
                            <div class="box-circle"></div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="box-section section-search ">
            <form action="/search" class="form_search content-width-wrap col">
                <input type="text" name="q" placeholder="Поиск">
                <button class="send"></button>
            </form>
        </div></div>
    <style>
        @media (max-width:767px){

            .tarifs-all .box-col2.fl_r{
                display: none;
            }

            .tarifs-all .open-all-tarif .box-col2.fl_r{
                display: block;
                float: none !important;
            }
        }
    </style>
</div>
<?php 
    $this->registerJsFile("/js/tarifi/tariffs.js", [
        ['position' => \yii\web\View::POS_BEGIN,
            'depends' => [
            \yii\web\JqueryAsset::className()
        ]]
    ]);
    $this->registerJsFile("/js/tarifi/checkActiveTab.js", [
        ['position' => \yii\web\View::POS_BEGIN,
        'depends' => [
            \yii\web\JqueryAsset::className()
        ]]
    ]);
    $this->registerJsFile("/js/tarifi/scroll.js", [
        ['position' => \yii\web\View::POS_BEGIN,
            'depends' => [
            \yii\web\JqueryAsset::className()
        ]]
    ]);
?>
