<?php
namespace app\plb;

use Yii;
use yii\web\Controller;

class CController extends Controller
{
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config = []);
    }

    public function display($view, $params = [])
    {
        echo $content = $this->__output($view, $params);
    }

    public function fetch($view, $params = [])
    {
        return $content = $this->__outputf($view, $params);
    }

    private function __output($view, $params = [])
    {
        $this->layout = "test.php";
        return $this->render($view . ".html", $params);
    }

    private function __outputf($view, $params = [])
    {
        return $this->renderPartial($view . ".html", $params);
    }
}