<?php

namespace dominus77\noty;

use Yii;
use yii\base\Widget;
use yii\helpers\Json;
use dominus77\noty\themes\Bootstrap3Asset;
use dominus77\noty\themes\Bootstrap4Asset;
use dominus77\noty\themes\LightAsset;
use dominus77\noty\themes\MetrouiAsset;
use dominus77\noty\themes\MintAsset;
use dominus77\noty\themes\NestAsset;
use dominus77\noty\themes\RelaxAsset;
use dominus77\noty\themes\SemanticuiAsset;
use dominus77\noty\themes\SunsetAsset;

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
        if (isset($this->options['theme']) && !empty($this->options['theme'])) {
            $this->registerTheme();
        }
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
                $this->_view->registerJs("new Noty($optionsEncoded).show();");
            }
            $session->removeFlash($type);
        }
    }

    /**
     * Register themes
     */
    protected function registerTheme()
    {
        $theme = $this->options['theme'];
        switch ($theme) {
            case self::THEME_BOOTSTRAP_3:
                Bootstrap3Asset::register($this->_view);
                break;
            case self::THEME_BOOTSTRAP_4:
                Bootstrap4Asset::register($this->_view);
                break;
            case self::THEME_LIGHT:
                LightAsset::register($this->_view);
                break;
            case self::THEME_METROUI:
                MetrouiAsset::register($this->_view);
                break;
            case self::THEME_MINT:
                MintAsset::register($this->_view);
                break;
            case self::THEME_NEST:
                NestAsset::register($this->_view);
                break;
            case self::THEME_RELAX:
                RelaxAsset::register($this->_view);
                break;
            case self::THEME_SEMANTICUI:
                SemanticuiAsset::register($this->_view);
                break;
            case self::THEME_SUNSET:
                SunsetAsset::register($this->_view);
                break;
            default:
                RelaxAsset::register($this->_view);
        }
    }
}
