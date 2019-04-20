<!--display city selector-->
<select class="select_order" id="city-selector" onchange="cityChangeOffice(this.value);">
    <!--php: case $cities_offices declared and not empty-->
    <?php if (isset($cities_offices) && !empty($cities_offices)): ?>
        <?php $number_of_cities = count($cities_offices); ?>
        <!--php: first element is selected by default-->
        <?php for ($j = 0; $j < 1; $j++): ?>
            <option  value="<?= $cities_offices[$j]['id'] ?>" selected="selected" id="connect-city-item_<?= $cities_offices[$j]['id'] ?>"><?= $cities_offices[$j]['title'] ?></option>
        <?php endfor; ?>
        <!--php: if we have more than one element - show them as select items-->
        <?php if ($number_of_cities > 1): ?>
            <?php for ($j = 1; $j < $number_of_cities; $j++): ?>
                <option  value="<?= $cities_offices[$j]['id'] ?>" id="connect-city-item_<?= $cities_offices[$j]['id'] ?>"><?= $cities_offices[$j]['title'] ?></option>
            <?php endfor; ?>
        <?php endif; ?>

    <?php endif; ?>
    <!--php: case $cities_offices not declared or empty-->
    <?php if (!isset($cities_offices) || empty($cities_offices)): ?>
    <?php endif; ?>
</select>