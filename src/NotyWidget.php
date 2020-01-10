<?php

namespace dominus77\noty;

use Yii;
use yii\base\Widget;
use yii\helpers\Json;

/**
 * Class Noty
 * @package dominus77\noty
 */
class NotyWidget extends Widget
{
    /**
     * Themes
     */
    const THEME_BOOTSTRAP_3 = 'bootstrap-v3';
    const THEME_BOOTSTRAP_4 = 'bootstrap-v4';
    const THEME_LIGHT = 'light';
    const THEME_METROUI = 'metroui';
    const THEME_MINT = 'mint';
    const THEME_NEST = 'nest';
    const THEME_RELAX = 'relax';
    const THEME_SEMANTICUI = 'semanticui';
    const THEME_SUNSET = 'sunset';

    /**
     * Types
     */
    const TYPE_ALERT = 'alert';
    const TYPE_SUCCESS = 'success';
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'error';
    const TYPE_ERROR = 'error';
    const TYPE_INFO = 'info';

    /**
     * @var array
     */
    private $typeMap = [
        'alert' => self::TYPE_ALERT,
        'success' => self::TYPE_SUCCESS,
        'warning' => self::TYPE_WARNING,
        'danger' => self::TYPE_DANGER,
        'error' => self::TYPE_ERROR,
        'info' => self::TYPE_INFO,
    ];

    /**
     * @var array
     */
    public $typeOptions = [];

    /**
     * @var array
     */
    public $options = [
        'progressBar' => true,
        'timeout' => false,
        'layout' => 'topRight',
        'dismissQueue' => true,
        'theme' => self::THEME_RELAX,
    ];

    /** @var yii\web\View */
    private $_view;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->_view = $this->getView();
        NotyAsset::register($this->_view);
    }

    /**
     * @return string|void
     */
    public function run()
    {
        $session = Yii::$app->session;
        $flashes = $session->getAllFlashes();

        foreach ($flashes as $type => $flash) {
            if (!isset($this->typeMap[$type])) {
                continue;
            }
            $typeAlert = $this->typeMap[$type];
            $options = array_merge($this->options, $this->typeOptions[$typeAlert] ?? []);

            foreach ((array)$flash as $i => $message) {
                $options['type'] = $typeAlert;
                $options['text'] = $message;
                $optionsEncoded = Json::encode($options);
                //$this->_view->registerJs("new Noty($optionsEncoded).show();");
                $this->_view->registerJs("
                    var n{$i} = new Noty($optionsEncoded);
                    n{$i}.show();
                ");
            }
            $session->removeFlash($type);
        }
    }
}
