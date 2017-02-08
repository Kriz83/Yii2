<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UsersForm extends Model
{
    /**
     * @var
     */
    private $lp;
	private $name;
	private $enthusiasm;
	private $creativity;
	private $brilliance;
	private $innerPeace;

    public function rules()
    {
        return [
			[['lp', 'name', 'enthusiasm', 'creativity', 'brilliance', 'innerPeace' ], 'required'],
			['enthusiasm', 'integer'],
			['creativity', 'integer'],
			['brilliance', 'integer'],
			['innerPeace', 'integer'],
        ];
    }

    public function setLp($lp)
    {

		$this->lp = $lp;
        
    }
	
	public function setName($name)
    {

		$this->name = $name;
        
    }
	
	 public function setEnthusiasm($enthusiasm)
    {

		$this->enthusiasm = $enthusiasm;
        
    }
	
	 public function setCreativity($creativity)
    {

		$this->creativity = $creativity;

    }
	 
	 public function setBrilliance($brilliance)
    {

		$this->brilliance = $brilliance;
	        
    }
	
	 public function setInnerPeace($innerPeace)
    {

		$this->innerPeace = $innerPeace;
        
    }
	
	    public function getLp()
    {

		return $this->lp;
        
    }
	
	public function getName()
    {

		return $this->name;
        
    }
	
	 public function getEnthusiasm()
    {

		return $this->enthusiasm;
        
    }
	
	 public function getCreativity()
    {

		return $this->creativity;

    }
	 
	 public function getBrilliance()
    {

		return $this->brilliance;
	        
    }
	
	 public function getInnerPeace()
    {

		return $this->innerPeace;
        
    }
	
}
