<?php

namespace app\controllers;

use yii;
use yii\data\Pagination;
use yii\web\Controller;
use app\models\CreateMessageForm;
use yii\db\Query;

class MessageController extends Controller
{
    public function actionCreateMessage()
    {
        $model = new CreateMessageForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $query = Yii::$app->db->createCommand('INSERT INTO `messages` (`text`) VALUES (:text)')
                ->bindValue(':text', $model->message)
                ->execute();

            return $this->render('messages-confirm', ['model' => $model]);
        } else {
            return $this->render('messages-error', ['model' => $model]);
        }
    }
    /**
     * Displays Message page
     *
     * @return string
     */
    public function actionMessages()
    {
        $model = new CreateMessageForm();

        $query = (new Query())
            ->select('*')
            ->from('messages');

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $messages = $query->orderBy('id ASC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('messages', [
            'model' => $model,
            'messages' => $messages,
            'pagination' => $pagination
        ]);
    }
}
