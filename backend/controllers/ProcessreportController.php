<?php
use Yii;
namespace backend\controllers;

class ProcessreportController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionExec () {
        $sql="call sp_rpt_1";
        yii::$app->db->createCommand($sql)->execute();
        
        return "ok";
    }
}
