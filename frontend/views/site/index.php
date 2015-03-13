<?php
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */
$this->title = 'กรมอนามัย';
?>

<?php
Highcharts::widget([
    'scripts' => [
        'highcharts-more',
        //'themes/grid'
    //'modules/exporting',
    ]
]);
$this->registerJsFile('./js/chart_dial.js');
?>

<div class="site-index well well-material">
<?php
$route1 = Yii::$app->urlManager->createUrl('test/test1');
?>
<a href="<?=$route1?>">ไปที่ test1</a>
<br>

<?php
$route2 = Yii::$app->urlManager->createUrl(['test/test2','name'=>'utehn','lname'=>'JAD']);
?>
<a href="<?=$route2?>">ไปที่ test2</a>
<br>

<?=
Html::a('ลิงค์แบบที่ 3', ['test/test1','a'=>'1']);
?>
</div>
<div class="row">
    <div class="col-sm-4" style="text-align: center;">
        <?php        
        $target = 503;
        $result = 102;
        $persent = 0.00;
        if ($target > 0) {
            $persent = $result / $target * 100;
            $persent= number_format($persent, 2);
        }
        $base = 90;
        $this->registerJs("
                        var obj_div=$('#ch1');
                        gen_dial(obj_div,$base,$persent);
                    ");
        ?>
       <h4>หญิงมีครรภ์ได้รับการฝากครรภ์ครั้งแรก<br>ก่อน 12 สัปดาห์</h4>
        <div id="ch1"></div>
    </div>
     <div class="col-sm-4" style="text-align: center;">
        <?php        
        $target = 503;
        $result = 102;
        $persent = 0.00;
        if ($target > 0) {
            $persent = $result / $target * 100;
            $persent= number_format($persent, 2);
        }
        $base = 90;
        $this->registerJs("
                        var obj_div=$('#ch2');
                        gen_dial(obj_div,$base,$persent);
                    ");
        ?>
       <h4>หญิงมีครรภ์ได้รับการฝากครรภ์ครั้งแรก<br>ก่อน 12 สัปดาห์</h4>
        <div id="ch2"></div>
    </div>
     <div class="col-sm-4" style="text-align: center;">
        <?php        
        $target = 503;
        $result = 102;
        $persent = 0.00;
        if ($target > 0) {
            $persent = $result / $target * 100;
            $persent= number_format($persent, 2);
        }
        $base = 90;
        $this->registerJs("
                        var obj_div=$('#ch3');
                        gen_dial(obj_div,$base,$persent);
                    ");
        ?>
       <h4>หญิงมีครรภ์ได้รับการฝากครรภ์ครั้งแรก<br>ก่อน 12 สัปดาห์</h4>
        <div id="ch3"></div>
    </div>
</div>

<?php
// test database Yii::$app->db->open();
?>
