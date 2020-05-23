<?php

namespace backend\controllers;

use backend\models\Apple;
use backend\models\Color;
use backend\utils\DateTime;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * Контроллер страницы с яблоками.
 */
class AppleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [],
            ],
        ];
    }

    /**
     * Страница с яблоками.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $this->updateDecayed();

        $query = Apple::find();

        $pagination = new Pagination(
            [
                'defaultPageSize' => 100,
                'totalCount'      => $query->count(),
            ]
        );

        $apples = $query->orderBy('fell DESC')
            ->addOrderBy('created ASC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render(
            'index',
            [
                'apples'     => $apples,
                'pagination' => $pagination,
            ]
        );
    }

    /**
     * Создать случайное количество яблок.
     *
     * @return Response
     */
    public function actionGenerate(): Response
    {
        $cnt = \mt_rand(10, 20);

        for ($i = 0; $i < $cnt; $i++) {
            $model          = new Apple();
            $model->color   = Color::getRandomColor();
            $model->created = DateTime::randomDate(new \DateTime("NOW-7DAYS"), new \DateTime("NOW"));
            $model->fell    = null;
            $model->status  = Apple::STATUS_HANGING;
            $model->size    = 1;

            $model->save();
        }

        return $this->redirect(['index']);
    }

    /**
     * Упасть.
     *
     * @param int $id
     *
     * @return Response
     * @throws NotFoundHttpException
     */
    public function actionToFall(int $id): Response
    {
        $model = $this->findModel($id);

        $model->toFall();

        return $this->redirect(['index']);
    }

    /**
     * Съесть яблоко.
     *
     * @param int $id
     * @param int $percent
     *
     * @return Response
     * @throws NotFoundHttpException
     */
    public function actionEat(int $id, int $percent): Response
    {
        $model = $this->findModel($id);

        $model->eat($percent);

        return $this->redirect(['index']);
    }

    /**
     * Удалить яблоко.
     *
     * @param integer $id
     *
     * @return Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDeleteApple($id): Response
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Найти яблоко по идентификатору.
     *
     * @param integer $id
     *
     * @return Apple the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): Apple
    {
        if (($model = Apple::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Найти сгнившие яблоки и обновить их статус.
     */
    private function updateDecayed()
    {
        $dt = new \DateTime("NOW-5 HOURS");

        $apples = Apple::find()
            ->where(
                "status = :status AND fell <= :time",
                [':status' => Apple::STATUS_FELL, ':time' => $dt->getTimestamp()]
            )
            ->all();

        foreach($apples as $apple) {
            $apple->decayed();
        }
    }
}
