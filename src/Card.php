<?php

namespace paskuale75\metronic;

use yii\base\Widget;
use yii\helpers\Html;
use Yii;
use yii\helpers\ArrayHelper;

class Card extends Widget
{

    public $options = ['class' => 'card'];

    public function init()
    {
        //parent::init();

        echo Html::beginTag('div', $this->options['class']);
        echo $this->drawHeader();
        echo Html::beginTag('div', ['class' => 'card-body']);
    }

    public function run()
    {
        echo Html::endTag('div'); // End card-body
        echo $this->drawFooter();
        echo Html::endTag('div'); // End card section
    }



    private function drawHeader()
    {
        $header = false;
        $toolbar = false;

        if (ArrayHelper::keyExists('title', $this->options, false)) {
            $subTitle = Html::tag('small', $this->options['subTitle']);
            $label = Html::tag('h3', $this->options['title'] . $subTitle, ['class' => 'card-label']);
            $title = $label;
            $toolbar = $this->drawToolbar();
            $title = Html::tag('div', $title, ['class' => 'card-title']);
            $toolbar = Html::tag('div', $toolbar, ['class' => 'card-toolbar']);
            $header = Html::tag('div', $title . $toolbar, ['class' => 'card-header']);
        }
        return $header;
    }

    private function drawToolbar()
    {
        $toolbar = false;

        if (ArrayHelper::keyExists('toolbar', $this->options, false)) {
            if (isset($this->options['toolbar']['buttons'])) {
                $buttons = $this->options['toolbar']['buttons'];
                foreach ($buttons as $button) {
                    $toolbar .= $button;
                }
            }
        }
        return $toolbar;
    }


    private function drawFooter()
    {
        $footer = false;

        if (ArrayHelper::keyExists('footer', $this->options, false)) {
            $footer .=Html::beginTag('div', ['class' => $this->options['footer']['class']]);
            if (isset($this->options['footer']['buttons'])) {
                $buttons = $this->options['footer']['buttons'];
                foreach ($buttons as $button) {
                    $footer .= $button;
                }
            }

            $footer .=Html::endTag('div');
        }
        return $footer;
    }
}
