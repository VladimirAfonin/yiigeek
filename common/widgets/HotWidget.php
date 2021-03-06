<?
namespace common\widgets;

use yii\bootstrap\Widget;
use yii\db\Query;

class HotWidget extends Widget
{
    private $_query;

    public function init()
    {
        $this->_query = new Query();
    }

    public function run()
    {
        $query = $this->_query;
        $result = $query->from('advert')->where('hot=1')->limit(5)->all();

        return $this->render('hot', ['result' => $result]);
    }

}