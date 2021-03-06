<?php
namespace backend\models;

use Yii;

/**
 * Модель яблока.
 *
 * @property int      $id
 * @property string   $color
 * @property int      $created
 * @property int|null $fell
 * @property int      $status
 * @property float    $size
 */
class Apple extends \yii\db\ActiveRecord
{
    /** Статус висит. */
    const STATUS_HANGING = 1;

    /** Статус упало. */
    const STATUS_FELL    = 2;

    /** Статус сгнило. */
    const STATUS_DECAYED = 3;

    /** @var array Переводы статусов.  */
    private static $statuses = [
        self::STATUS_HANGING => 'Висит',
        self::STATUS_FELL    => 'Упало',
        self::STATUS_DECAYED => 'Сгнило'
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'apple';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['color', 'created', 'status'], 'required'],
            [['color'], 'string'],
            [['created', 'fell', 'status'], 'integer'],
            [['size'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id'      => 'ID',
            'color'   => 'Color',
            'created' => 'Created',
            'fell'    => 'Fell',
            'status'  => 'Status',
            'size'    => 'Size',
        ];
    }

    /**
     * Съесть кусок яблока.
     *
     * @param int $percent
     */
    public function eat(int $percent)
    {
        $maximum = ($this->size) * 100;

        if ($percent < 1 || $percent > $maximum) {
            throw new \RuntimeException('Вы можете откусить максимум ' . $maximum);
        }

        $this->size -= ($percent / 100);

        if ($this->size === 0) {
            $this->delete();
        }
        else {
            $this->save();
        }
    }

    /**
     * Установить статус упало.
     */
    public function toFall()
    {
        $this->status = Apple::STATUS_FELL;
        $this->fell   = \time();

        $this->save();
    }

    /**
     * Установить статус сгнило.
     */
    public function decayed()
    {
        $this->status = self::STATUS_DECAYED;

        $this->save();
    }

    /**
     * Получить статус.
     *
     * @return string
     */
    public function getStatusString(): string
    {
        return self::$statuses[$this->status];
    }
}
