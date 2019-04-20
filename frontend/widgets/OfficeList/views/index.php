<!--display the list of cities with its offices-->
<div class = "placemarks-wrap" id = "placemark_wrap">
    <?php if (isset($cities_offices) && !empty($cities_offices)):
        ?>
        <?php $number_of_cities = count($cities_offices); ?>
        <!--php: first city element is active-->
        <?php
        for ($i = 0; $i < 1; $i++):
            ?>
            <div id="city-offices_<?= $cities_offices[$i]['id'] ?>" class="city-offices-list active">
                <?php $number_of_city_offices = count($cities_offices[$i]['offices']) ?>
                <!--php: first city-office element is active-->
                <?php
                for ($m = 0; $m < 1; $m++):
                    ?>
                    <div id="city-office_<?= $cities_offices[$i]['offices'][$m]['id'] ?>" class="connect-office-item box-place active-placemark" data-office="<?= $cities_offices[$i]['offices'][$m]['id'] ?>" data-lat="<?= $cities_offices[$i]['offices'][$m]['lat'] ?>" data-lng="<?= $cities_offices[$i]['offices'][$m]['lng'] ?>" data-city="<?= $cities_offices[$i]['id'] ?>">
                        <div class="box-top-text ">
                            1) <?= $cities_offices[$i]['title'] ?>, <?= $cities_offices[$i]['offices'][$m]['address'] ?>            </div>
                        <div class="bottom-text">
                            График работы:                    <span><?= $cities_offices[$i]['offices'][$m]['work_hours'] ?></span>
                        </div>
                    </div>
                <?php endfor; ?>
                <!--php: if we have more than 0ne city-office element - show them-->
                <?php if ($number_of_city_offices > 1): ?>
                    <?php
                    for ($m = 1; $m < $number_of_city_offices; $m++):
                        ?>
                        <div id="city-office_<?= $cities_offices[$i]['offices'][$m]['id'] ?>" class="connect-office-item box-place" data-office="<?= $cities_offices[$i]['offices'][$m]['id'] ?>" data-lat="<?= $cities_offices[$i]['offices'][$m]['lat'] ?>" data-lng="<?= $cities_offices[$i]['offices'][$m]['lng'] ?>" data-city="<?= $cities_offices[$i]['id'] ?>">
                            <div class="box-top-text ">
                                1) <?= $cities_offices[$i]['title'] ?>, <?= $cities_offices[$i]['offices'][$m]['address'] ?>            </div>
                            <div class="bottom-text">
                                График работы:                    <span><?= $cities_offices[$i]['offices'][$m]['work_hours'] ?></span>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
        <!--php: if we have more than one city element - show them as unactive-->
        <?php if ($number_of_cities > 1): ?>
            <?php
            for ($i = 1; $i < $number_of_cities; $i++):
                ?>
                <div id="city-offices_<?= $cities_offices[$i]['id'] ?>" class="city-offices-list">
                    <?php $number_of_city_offices = count($cities_offices[$i]['offices']) ?>
                    <!--php: first city-office element is active-->
                    <?php
                    for ($m = 0; $m < 1; $m++):
                        ?>
                        <div id="city-office_<?= $cities_offices[$i]['offices'][$m]['id'] ?>" class="connect-office-item box-place active-placemark" data-office="<?= $cities_offices[$i]['offices'][$m]['id'] ?>" data-lat="<?= $cities_offices[$i]['offices'][$m]['lat'] ?>" data-lng="<?= $cities_offices[$i]['offices'][$m]['lng'] ?>" data-city="<?= $cities_offices[$i]['id'] ?>">
                            <div class="box-top-text ">
                                1) <?= $cities_offices[$i]['title'] ?>, <?= $cities_offices[$i]['offices'][$m]['address'] ?>            </div>
                            <div class="bottom-text">
                                График работы:                    <span><?= $cities_offices[$i]['offices'][$m]['work_hours'] ?></span>
                            </div>
                        </div>
                    <?php endfor; ?>
                    <!--php: if we have more than 0ne city-office element - show them-->
                    <?php if ($number_of_city_offices > 1): ?>
                        <?php
                        for ($m = 1; $m < $number_of_city_offices; $m++):
                            ?>
                            <div id="city-office_<?= $cities_offices[$i]['offices'][$m]['id'] ?>" class="connect-office-item box-place" data-office="<?= $cities_offices[$i]['offices'][$m]['id'] ?>" data-lat="<?= $cities_offices[$i]['offices'][$m]['lat'] ?>" data-lng="<?= $cities_offices[$i]['offices'][$m]['lng'] ?>" data-city="<?= $cities_offices[$i]['id'] ?>">
                                <div class="box-top-text ">
                                    1) <?= $cities_offices[$i]['title'] ?>, <?= $cities_offices[$i]['offices'][$m]['address'] ?>            </div>
                                <div class="bottom-text">
                                    График работы:                    <span><?= $cities_offices[$i]['offices'][$m]['work_hours'] ?></span>
                                </div>
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                </div>    
            <?php endfor; ?>
        <?php endif; ?>
    <?php endif; ?>    


</div>
