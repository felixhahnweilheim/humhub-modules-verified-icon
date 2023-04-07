<?php

namespace humhub\modules\verifiedIcon\widgets;

use humhub\components\Widget;
use humhub\modules\verifiedIcon\assets\Assets;


class VrfdIconLoader extends Widget
{

    public function run() {

        Assets::register($this->view);
        return;
    }

}