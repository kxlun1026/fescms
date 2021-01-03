<?php
/**
 * NavBar.php
 * @author: allen
 * @date  2020年12月11日下午1:56:18
 * @copyright  Copyright igkcms
 */
namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Category;

/**
 * Menu displays a multi-level menu using nested HTML lists.
 *
 * The main property of Menu is [[items]], which specifies the possible items in the menu.
 * A menu item can contain sub-items which specify the sub-menu under that menu item.
 *
 * Menu checks the current route and request parameters to toggle certain menu items
 * with active state.
 *
 * Note that Menu only renders the HTML tags about the menu. It does do any styling.
 * You are responsible to provide CSS styles to make it look like a real menu.
 *
 * The following example shows how to use Menu:
 *
 * ```php
 * echo Menu::widget([
 *     'items' => [
 *         // Important: you need to specify url as 'controller/action',
 *         // not just as 'controller' even if default action is used.
 *         ['label' => 'Home', 'url' => ['site/index']],
 *         // 'Products' menu item will be selected as long as the route is 'product/index'
 *         ['label' => 'Products', 'url' => ['product/index'], 'items' => [
 *             ['label' => 'New Arrivals', 'url' => ['product/index', 'tag' => 'new']],
 *             ['label' => 'Most Popular', 'url' => ['product/index', 'tag' => 'popular']],
 *         ]],
 *         ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
 *     ],
 * ]);
 * ```
 *
 *
 */
class Menu extends Widget
{
    public $items = [];
    
    public $options = [];
    
    public function init()
    {
        parent::init();
        //$this->items = ArrayHelper::merge([['label' => '首页1', 'url' => '/site/index']], $this->items);
        if (empty($this->items)) {
            $this->items = $this->getCategory();
        }
        //print_r($this->items);exit;
        Html::addCssClass($this->options, ['widget' => 'navbar-nav']);
        
    }
    
    public function run(){
        parent::run();
        return Html::tag('ul', $this->renderItems($this->items), $this->options);
    }
    
    public function renderItems($items)
    {
        foreach ($items as $item) {
            $menu = $this->renderItem($item);
            $options = ArrayHelper::getValue($item, 'option', []);
            Html::addCssClass($options, 'nav-item');
            if (!empty($item['items'])) {
                $menu .= $this->renderDropdown($item['items']);
                Html::addCssClass($options, ['widget' => 'dropdown']);
            }
            $lines[] = Html::tag('li', $menu, $options);
        }
        return implode("\n", $lines);
    }
    
    public function renderItem($item)
    {
        if (empty($item['items'])) {
            return Html::a($item['label'], $item['url'], ['class' => 'nav-link']);
        } else {
            return Html::a($item['label'], $item['url'], ['class' => 'nav-link dropdown-toggle', 'data-toggle' => 'dropdown']);
        }
    }
    
    public function renderDropdown($items)
    {
        $dropdown = '';
        foreach ($items as $item) {
            $dropdown .= Html::a($item['label'], $item['url'], ['class' => 'dropdown-item']);
        }
        return Html::tag('div', $dropdown, ['class' => 'dropdown-menu']);
    }
    
    public function getCategory()
    {
        $categorys = Category::find()->orderBy('sort DESC,id DESC')->asArray()->all();
        //return $this->getChild($categorys);
        return ArrayHelper::merge([['label' => '首页', 'url' => '/site/index']], $this->getChild($categorys));
    }
    
    protected function getChild($categorys, $parentid = 0)
    {
        $items = [];
        foreach ($categorys as $r) {
            if ($r['parentid'] != $parentid) continue;
            $item['label'] = $r['catname'];
            $item['url'] = ['/content/index', 'catdir' => $r['catdir']];
            $child = $this->getChild($categorys, $r['id']);
            if ($child) {
                $item['items'] = $child;
            }
            $items[] = $item;
        }
        return $items;
    }
}