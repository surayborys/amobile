<?php
namespace frontend\models\forms;

use frontend\models\Order;
use yii\base\Model;

/**
 * Order Form
 *
 * @author suray
 */
class OrderForm extends Model {
    
    const SCENARIO_OFFICE = 'office';
    const SCENARIO_COURIER = 'courier';
   
    
    public $fullname;
    public $phone_number;
    public $email;
    public $mode;
    public $office_id;
    public $tarif_id;
    public $city;
    public $street;
    public $housing;
    public $house;
    public $apartment_office_num;
    public $status;


    public function scenarios()
    {
        return [
            self::SCENARIO_OFFICE => ['fullname', 'phone_number', 'email', 'mode', 'office_id', 'tarif_id', 'status'],
            self::SCENARIO_COURIER => ['fullname', 'phone_number', 'email', 'mode', 'city', 'street', 'housing', 'house', 'apartment_office_num', 'tarif_id', 'status'],
        ];
    }
    
    public function rules() 
    {
        return [
            #rules for the 'office' scenario
            [['phone_number', 'email', 'mode', 'fullname', 'tarif_id', 'office_id', 'status'], 'required', 'on' => self::SCENARIO_OFFICE],
            #rules for the 'courier' scenario
            [['phone_number', 'email', 'mode', 'fullname', 'tarif_id', 'city', 'street', 'house', 'status'], 'required', 'on' => self::SCENARIO_COURIER],
            #common rules
            [['mode', 'office_id', 'tarif_id', 'status'], 'integer'],
            [['created_at', 'performed_on', 'housing', 'apartment_office_num'], 'safe'],
            [['fullname', 'phone_number', 'email', 'city', 'street', 'housing', 'house', 'apartment_office_num'], 'string', 'max' => 255],
        ];
    }
    
    public function createOrder() 
    {
        if(!$this->validate()) {
            return null;
        }
        
        $order = new Order();
        $order->fullname = $this->fullname;
        $order->email = $this->email;
        $order->phone_number = $this->phone_number;
        $order->mode = $this->mode;
        $order->office_id = $this->office_id;
        $order->city = $this->city;
        $order->street = $this->street;
        $order->house = $this->house;
        $order->housing = $this->housing;
        $order->apartment_office_num = $this->apartment_office_num;
        $order->tarif_id = $this->tarif_id;
        $order->status = $this->status;
        
        return $order->save();
    }
}
