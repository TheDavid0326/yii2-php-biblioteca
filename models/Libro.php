<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros".
 *
 * @property int $id
 * @property string $título
 * @property string $imagen
 */
class Libro extends \yii\db\ActiveRecord
{
    public $archivo;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'libros';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['título'], 'required'],
            [['título'], 'string', 'max' => 255],
            [['archivo'], 'file', 'extensions' => 'jpg, png, gif, webp', 'checkExtensionByMimeType' => false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'título' => 'Título',
            'archivo' => 'Imagen',
        ];
    }

}
