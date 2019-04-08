<?php
namespace frontend\components;

use yii\base\Component;

/**
 * Formatter for units of measurement
 *
 * @author suray
 */
class UMdelimiter extends Component {
    
    /**
     * delimits string by '/' delimiter 
     * 
     * @param string $um
     * @return array
     */
    public function delimitUM($um) {
        return explode('/', $um);
    }
}
