<?php

namespace dominus77\noty;

use Yii;
use yii\base\Widget;
use yii\helpers\Json;

/**
 * Class NotyWidget
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
     * Layouts
     */
    const LAYOUT_TOP = 'top';
    const LAYOUT_TOP_LEFT = 'topLeft';
    const LAYOUT_TOP_CENTER = 'topCenter';
    const LAYOUT_TOP_RIGHT = 'topRight';
    const LAYOUT_CENTER = 'center';
    const LAYOUT_CENTER_LEFT = 'centerLeft';
    const LAYOUT_CENTER_RIGHT = 'centerRight';
    const LAYOUT_BOTTOM = 'bottom';
    const LAYOUT_BOTTOM_LEFT = 'bottomLeft';
    const LAYOUT_BOTTOM_CENTER = 'bottomCenter';
    const LAYOUT_BOTTOM_RIGHT = 'bottomRight';

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
    public $typeOptions = [
        self::TYPE_SUCCESS => [],
        self::TYPE_INFO => [],
        self::TYPE_ALERT => [],
        self::TYPE_ERROR => [],
        self::TYPE_WARNING => []
    ];

    /**
     * @var array
     */
    public $options = [
        'progressBar' => true,
        'timeout' => false,
        'layout' => self::LAYOUT_TOP_RIGHT,
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


        foreach ($flashes as $key => $item) {
            if (is_array($item)) {

                if (!isset($this->typeMap[$item[0]])) {
                    continue;
                }

                $typeAlert = $this->typeMap[$item[0]];
                $typeOptions = $this->typeOptions[$typeAlert];
                $oldOptions = $this->options;

                if (isset($item[2])) {
                    $this->typeOptions[$typeAlert] = array_merge($typeOptions, $item[2] ?? []);
                }

                if (isset($item[3])) {
                    $this->options = array_merge($oldOptions, $item[3] ?? []);
                }

                $options = array_merge($this->options, $this->typeOptions[$typeAlert] ?? []);

                $options['type'] = $typeAlert;
                $options['text'] = $item[1];

                $this->register($options);
                $this->typeOptions[$typeAlert] = $typeOptions;
                $this->options = $oldOptions;
            } else {

                if (!isset($this->typeMap[$key])) {
                    continue;
                }

                $typeAlert = $this->typeMap[$key];
                $options = array_merge($this->options, $this->typeOptions[$typeAlert] ?? []);

                foreach ((array)$item as $i => $message) {
                    $options['type'] = $typeAlert;
                    $options['text'] = $message;

                    $this->register($options);
                }
            }
            $session->removeFlash($key);
        }
    }

    /**
     * @param array $options
     */
    public function register($options = [])
    {
        $optionsEncoded = Json::encode($options);
        $this->_view->registerJs("new Noty($optionsEncoded).show();");
    }
}
