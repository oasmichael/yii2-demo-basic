<?php
namespace common\plb;

use yii\console\Controller;

class CCController extends Controller
{
    public function fetch($view, $params = [])
    {
        $content = $this->__output($view. ".html", $params);
        return $content;
    }
    private function __output($view, $params = [])
    {
        return $this->renderPartial($view, $params);
    }
}