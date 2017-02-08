<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var file
     */
    public $file;

    public function rules()
    {
        return [
			[['file'], 'safe'],
          	[['file'], 'file', 'extensions' => 'xlsx, xls', 'on' => ['upload']]
        ];
    }

    public function upload()
    {

        if ($this->validate()) {
			
            $this->file->saveAs('uploads/' . $this->file->baseName . '.' . $this->file->extension);
            $uploadedFile = 'uploads/' . $this->file->baseName . '.' . $this->file->extension;
        } else {
            return false;
        }
    }
}
