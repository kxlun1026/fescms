<?php

use yii\db\Migration;
use yii\base\InvalidConfigException;
use yii\rbac\DbManager;

/**
 * Class m200625_093630_rbac_item_init
 */
class m200625_093630_rbac_item_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $authManager = $this->getAuthManager();
        
        $this->batchInsert($authManager->itemTable, ['name', 'type', 'description', 'created_at', 'updated_at'],
            [
                ['/attachment/index', '2', '附件管理', '1586588064', '1586588064'],
                ['/attachment/delete', '2', '删除附件', '1586588064', '1586588064'],
                ['/attachment/view-layer', '2', '查看附件', '1586588064', '1586588064'],
                ['/attachment/thumbs', '2', '查看缩略图', '1586588064', '1586588064'],
                ['/attachment/thumbdelete', '2', '删除缩略图', '1586588064', '1586588064'],
                ['/attachment/address', '2', '附件地址替换', '1586588064', '1586588064'],
                ['/setting/index', '2', '系统设置', '1586588064', '1586588064'],
                ['/setting/email', '2', '邮箱设置', '1586588064', '1586588064'],
                ['/setting/custom', '2', '自定义设置', '1586588064', '1586588064'],
                ['/setting/sms', '2', '短信设置', '1586588064', '1586588064'],
                ['/setting/alipay', '2', '支付宝支付', '1586588064', '1586588064'],
                ['/setting/wxpay', '2', '微信支付', '1586588064', '1586588064'],
                ['/content/index', '2', '内容管理', '1586588064', '1586588064'],
                ['/content/create', '2', '添加内容', '1586588064', '1586588064'],
                ['/content/update', '2', '修改内容', '1586588064', '1586588064'],
                ['/content/delete', '2', '删除内容', '1586588064', '1586588064'],
                ['/category/index', '2', '栏目管理', '1586588064', '1586588064'],
                ['/category/create', '2', '添加栏目', '1586588064', '1586588064'],
                ['/category/update', '2', '修改栏目', '1586588064', '1586588064'],
                ['/category/delete', '2', '删除栏目', '1586588064', '1586588064'],
                
                ['/page/index', '2', '单页管理', '1586588064', '1586588064'],
                ['/page/create', '2', '添加单页', '1586588064', '1586588064'],
                ['/page/update', '2', '修改单页', '1586588064', '1586588064'],
                ['/page/delete', '2', '删除单页', '1586588064', '1586588064'],
                
                ['/position/index', '2', '推荐位管理', '1586588064', '1586588064'],
                ['/position/create', '2', '添加推荐位', '1586588064', '1586588064'],
                ['/position/update', '2', '修改推荐位', '1586588064', '1586588064'],
                ['/position/delete', '2', '删除推荐位', '1586588064', '1586588064'],
                ['/position-data/index', '2', '推荐位信息管理', '1586588064', '1586588064'],
                ['/position-data/delete', '2', '删除推荐位信息', '1586588064', '1586588064'],
                
                ['/menu/index', '2', '菜单管理', '1586588064', '1586588064'],
                ['/menu/create', '2', '添加菜单', '1586588064', '1586588064'],
                ['/menu/update', '2', '修改菜单', '1586588064', '1586588064'],
                ['/menu/delete', '2', '删除菜单', '1586588064', '1586588064'],
                
                ['/admin/index', '2', '管理员管理', '1586588064', '1586588064'],
                ['/admin/create', '2', '添加管理员', '1586588064', '1586588064'],
                ['/admin/update', '2', '修改管理员', '1586588064', '1586588064'],
                ['/admin/delete', '2', '删除管理员', '1586588064', '1586588064'],
                
                ['/role/index', '2', '角色管理', '1586588064', '1586588064'],
                ['/role/create', '2', '添加角色', '1586588064', '1586588064'],
                ['/role/update', '2', '修改角色', '1586588064', '1586588064'],
                ['/role/delete', '2', '删除角色', '1586588064', '1586588064'],
                ['/role/priv', '2', '角色权限设置', '1586588064', '1586588064'],
                
                ['/user/index', '2', '用户管理', '1586588064', '1586588064'],
                ['/user/create', '2', '添加用户', '1586588064', '1586588064'],
                ['/user/update', '2', '修改用户', '1586588064', '1586588064'],
                ['/user/delete', '2', '删除用户', '1586588064', '1586588064'],
                
                ['/group/index', '2', '用户组管理', '1586588064', '1586588064'],
                ['/group/create', '2', '添加用户组', '1586588064', '1586588064'],
                ['/group/update', '2', '修改用户组', '1586588064', '1586588064'],
                ['/group/delete', '2', '删除用户组', '1586588064', '1586588064'],
                ['/expand/*', '2', '扩展', '1586588064', '1586588064'],
                ['/log/index', '2', '日志管理', '1586588064', '1586588064'],
                ['/log/view', '2', '查看日志', '1586588064', '1586588064'],
                ['/log/delete', '2', '删除日志', '1586588064', '1586588064'],
                
                ['/feedback/index', '2', '留言管理', '1586588064', '1586588064'],
                ['/feedback/view', '2', '查看留言', '1586588064', '1586588064'],
                ['/feedback/delete', '2', '删除留言', '1586588064', '1586588064'],
                
                ['/partner/index', '2', '合作伙伴管理', '1586588064', '1586588064'],
                ['/partner/create', '2', '添加合作伙伴', '1586588064', '1586588064'],
                ['/partner/update', '2', '修改合作伙伴', '1586588064', '1586588064'],
                ['/partner/delete', '2', '删除合作伙伴', '1586588064', '1586588064'],
                
                ['/link/index', '2', '友情链接管理', '1586588064', '1586588064'],
                ['/link/create', '2', '添加友情链接', '1586588064', '1586588064'],
                ['/link/update', '2', '修改友情链接', '1586588064', '1586588064'],
                ['/link/delete', '2', '删除友情链接', '1586588064', '1586588064'],
                
                
                
            ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200625_093630_rbac_item_init cannot be reverted.\n";

        return false;
    }

    /**
     * @throws yii\base\InvalidConfigException
     * @return DbManager
     */
    protected function getAuthManager()
    {
        $authManager = Yii::$app->getAuthManager();
        if (!$authManager instanceof DbManager) {
            throw new InvalidConfigException('You should configure "authManager" component to use database before executing this migration.');
        }
        
        return $authManager;
    }
}
