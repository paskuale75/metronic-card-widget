<?php

namespace paskuale75\metronic;

use yii\base\Widget;
use yii\helpers\Html;
use Yii;
use yii\helpers\ArrayHelper;

class Card extends Widget
{

    public $options = [];

    public function init()
    {
        //parent::init();

        echo Html::beginTag('div', ['class' => 'card card-custom gutter-b']);
        echo $this->drawHeader();
        echo Html::beginTag('div', ['class' => 'card-body']);
    }

    public function run()
    {
        echo Html::endTag('div'); // End card-body
        echo Html::endTag('div'); // End card section
    }



    private function drawHeader()
    {
        $header = false;

        if (ArrayHelper::keyExists('title', $this->options, false)) {
            $subTitle = Html::tag('small', $this->options['subTitle']);
            $label = Html::tag('h3', $this->options['title'] . $subTitle, ['class' => 'card-label']);
            $title = Html::tag('div', $label, ['class' => 'card-title']);
            //$body = $this->drawBody($this->options['body']);
            $header = Html::tag('div', $title, ['class' => 'card-header']);
        }
        return $header;
    }
}
