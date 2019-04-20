<?php
namespace frontend\widgets\cityList;

use yii\base\Widget;
use frontend\models\City;
/**
 * City List: a widget for displaying the list of cities
 *
 * @author suray
 */
class CityList extends Widget{
    
public function run() 
{
    $cities = City::find()->joinWith('offices', 'city.id = office.city_id')->asArray()->orderBy('id')->all();
    $cities_offices = [];

    #check if the city has offices and add to $cities_offices[] only cities with offices
    if(isset($cities) && !empty($cities)) {
        foreach ($cities as $city) {
            if(isset($city['offices']) && !empty($city['offices'])) {
                $cities_offices[] = $city;
            }
        }
    }
    
    return $this->render('index', [
        'cities_offices' => $cities_offices,           
        ]);
    }
}
