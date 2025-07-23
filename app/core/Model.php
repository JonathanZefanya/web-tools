<?php


namespace Altum\Models;

use Altum\Traits\Paramsable;

defined('ZEFANYA') || die();

class Model {
    use Paramsable;

    public $model;

    public function __construct(Array $params = []) {

        $this->add_params($params);

    }

}
