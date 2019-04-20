<?php
namespace frontend\widgets\officeList;

use yii\base\Widget;
use frontend\models\City;
/**
 * Office List: a widget for displaying the list of cities and offices
 *
 * @author suray
 */
class OfficeList extends Widget{
    
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
