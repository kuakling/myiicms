<?php

namespace vendor\kuakling\myiicms;

use Yii;
use vendor\kuakling\myiicms\models\Module as ModuleModel;

class Module extends \yii\base\Module
{
	const VERSION = 0.1;

    public $settings;
    public $activeModules;
    public $controllerLayout = 'main';
    public $controllerNamespace = 'vendor\kuakling\myiicms\controllers';

    public function init()
    {
        parent::init();

        $this->layout = $this->controllerLayout;

        $this->activeModules = ModuleModel::findAllActive();
        $modules = [];
        foreach($this->activeModules as $name => $module){
            $modules[$name]['class'] = $module->class;
            if(is_array($module->settings)){
                $modules[$name]['settings'] = $module->settings;
            }
        }
        $this->setModules($modules);
    }
}
