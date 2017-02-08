<?php

namespace app\models;

use yii\base\Model;

class PartyForm extends Model
{
    /**
     * @var Liczba_imprez
     */
    public $Liczba_imprez;

    public function rules()
    {
        return [
			['Liczba_imprez', 'integer'],
			['Liczba_imprez', 'default', 'value' => 1],
        ];
    }

}
