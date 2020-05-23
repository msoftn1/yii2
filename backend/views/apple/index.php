<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<script>
    function eatApple(id, maximum, url)
    {
        var percent = document.getElementById("percent-"+id).value;

        if(percent < 1 || percent > maximum) {
            alert("Укажите целое число от 1 до " + maximum);
        }
        else {
            var redirectUrl = url + "&percent=" + percent;

            window.location.href = redirectUrl;
        }
    }
</script>
<h1>Apples</h1>
<table class="table">
    <tr>
        <th>Цвет</th>
        <th>Дата появления</th>
        <th>Дата падения</th>
        <th>Статус</th>
        <th>Съедено (%)</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($apples as $apple): ?>
        <?php $maximumSize = $apple->size*100; ?>
        <tr>
            <td style="background-color: <?= $apple->color ?>"></td>
            <td><?= \date('Y-m-d H:i:s', $apple->created) ?></td>
            <td><?php if($apple->fell): echo \date('Y-m-d H:i:s', $apple->fell); endif; ?></td>
            <td><?= $apple->getStatusString() ?></td>
            <td><?= (1-$apple->size)*100 ?>%</td>
            <td>
                <?php if($apple->status == \backend\models\Apple::STATUS_HANGING): ?>
                    <a href="<?= Url::toRoute(['apple/to-fall', 'id' => $apple->id]); ?>">Упасть</a>
                <?php elseif($maximumSize == 0 || $apple->status == \backend\models\Apple::STATUS_DECAYED): ?>
                    <a href="<?= Url::toRoute(['apple/delete-apple', 'id' => $apple->id]); ?>">Удалить</a>
                <?php elseif($apple->status == \backend\models\Apple::STATUS_FELL): ?>
                    <a href="<?= Url::toRoute(['apple/eat', 'id' => $apple->id]); ?>" onclick="eatApple(<?= $apple->id ?>, <?= $maximumSize; ?>, '<?= Url::toRoute(['apple/eat', 'id' => $apple->id]); ?>'); return false;">Съесть</a>
                    <input type="number" id="percent-<?= $apple->id ?>" min="1" max="<?= $apple->size*100; ?>" style="width:60px" value="<?= $maximumSize; ?>"/> %
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?= LinkPager::widget(['pagination' => $pagination]) ?>

<div>
    <a href="<?= Url::toRoute('apple/generate'); ?>">Сгенерировать</a>
</div>