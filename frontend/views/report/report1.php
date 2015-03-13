<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use miloschuman\highcharts\Highcharts;

$this->params['breadcrumbs'][] = ['label' => 'รายงาน', 'url' => ['report/index']];
$this->params['breadcrumbs'][] = 'รายงานนับถือศาสนา';
?>


 <div id="chart" style="padding-bottom: 10px"></div>

<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'panel' => [
        'before' => 'รายงาน xxxx',
        'after' => 'ประมวลผล ณ ' . date('Y-m-d H:i:s')
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'hoscode',
            'header' => 'รหัสสถานบริการ',
        ],
        [
            'attribute' => 'hosname',
            'format' => 'raw',
            'value' => function($model) {
                $hoscode = $model['hoscode'];
                $hosname = $model['hosname'];
                return Html::a(Html::encode($hosname), ['report/report3', 'hoscode' => $hoscode]);
            }
                ],
                [
                    'attribute' => 'total',
                    'header' => 'ประชากรทั้งหมด(คน)'
                ],
                [
                    'attribute' => 'buddha',
                    'header' => 'ศาสนาพุทธ (คน)'
                ],
                [
                    'attribute' => 'other',
                    'header' => 'อื่นๆ (คน)'
                ],
            ]
        ]);
        ?>
<?php
        Highcharts::widget([
            'scripts' => [
                'highcharts-more',
                'themes/grid'
            ]
        ]);
        ?>

<?php
        $categ = [];
        for ($i = 0; $i < count($rawData); $i++) {
            $categ[] = $rawData[$i]['hosname'];
            //array_push($categ,'vvvv');
        }
        $js_categories = implode("','", $categ);
        $data = [];
        for ($i = 0; $i < count($rawData); $i++) {
            $data[] = $rawData[$i]['buddha'];
            //array_push($categ,'vvvv');
        }
        $js_data = implode(",", $data);
        $this->registerJs("
$(function () {
    $('#chart').highcharts({
         colors: ['#ED921C', '#1F7CDB'],
        chart: {
            type: 'column'
        },
        title: {
            text: 'รายงานประชากรในเขตพื้นที่รับผิดชอบที่นับถือศาสนาพุทธ'
        },
        subtitle: {
            text: 'ปีงบประมาณ 2558'
        },
        xAxis: {
            categories: ['$js_categories'],
            //crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'คน'
            }
        },
       
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'พุทธ',
            data: [$js_data]
        }]
    });
});
");
// จบ chart
        ?>