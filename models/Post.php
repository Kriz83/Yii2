<?php

namespace app\models;

class Post extends \yii\db\ActiveRecord
{
	
	/**
	*
	*@ return string associated with database table name
	*/
	public static function tableName()
	{
		
		return 'posts';
		
	}
	
	/**
	*
	*@ return array primary key
	*/
	public static function primaryKey()
	{
		
		return array('id');
		
	}
	
	/**
	*
	*@ return array of customized attribute labels
	*/
	public function attributeLabels()
	{
		
		return array(
		
		'id'			=> 'ID',
		'title'			=> 'Title',
		'content'	=> 'Content',
		'created'	=> 'Created',
		'updated'	=> 'Updated',
		
		);
		
	}
	
}