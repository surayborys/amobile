<?php
namespace backend\widgets\singleTarif;

use yii\base\Widget;

/**
 * Handles displaying single tarif's detail info
 *
 * @author suray
 */
class SingleTarif extends Widget {
    public $tarif;
    
    public function run() {
        if(!is_array($this->tarif)) {
            echo '<h4>No actual tarif...</h4>';
            return false;
        }
        
        return $this->render('tarif', [
            'tarif' => $this->tarif,
        ]);
    }
}
