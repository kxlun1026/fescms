<?php

use yii\db\Migration;

class m160415_044330_menu extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey()->unsigned(),
            'name' => $this->string()->notNull(),
            'parentid' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'route' => $this->string()->notNull(),
            'data' => $this->string()->notNull()->defaultValue(''),
            'icon' => $this->string()->notNull(),
            'sort' => $this->integer()->unsigned()->notNull()->defaultValue(0),
            'display' => $this->smallInteger()->unsigned()->notNull()->defaultValue(0),
        ], $tableOptions);
        $this->createIndex('idx-display', '{{%menu}}', 'display,sort,id');
        //添加数据
        $this->batchInsert('{{%menu}}', ['id', 'name', 'parentid', 'route', 'data', 'icon', 'sort', 'display'], 
            [
                ['1', '设置', '0', '/setting/index', '', 'fa-cog', '1', '1'],
                ['2', '内容', '0', '/content/index', '', 'fa-edit', '2', '1'],
                ['3', '用户', '0', '/user/index', '', 'fa-user-circle', '4', '1'],
                ['4', '权限', '0', '/admin/index', '', 'fa-key', '5', '1'],
                ['5', '扩展', '0', '/expand/*', '', 'fa-cube', '6', '1'],
                
                
                ['11', '系统设置', '1', '/setting/index', '', '', '0', '1'],
                ['12', '邮箱设置', '1', '/setting/email', '', '', '0', '1'],
                ['13', '自定义设置', '1', '/setting/custom', '', '', '0', '1'],
                ['14', '短信设置', '5', '/setting/sms', '', '', '0', '1'],
                ['15', '支付宝支付', '5', '/setting/alipay', '', '', '0', '1'],
                ['16', '微信支付', '5', '/setting/wxpay', '', '', '0', '1'],
                
                ['17', '内容管理', '2', '/content/index', '', '', '0', '1'],
                ['18', '添加内容', '17', '/content/create', '', '', '0', '0'],
                ['19', '修改内容', '17', '/content/update', '', '', '0', '0'],
                ['20', '删除内容', '17', '/content/delete', '', '', '0', '0'],
                
                ['21', '栏目管理', '2', '/category/index', '', '', '0', '1'],
                ['22', '添加栏目', '21', '/category/create', '', '', '0', '0'],
                ['23', '修改栏目', '21', '/category/update', '', '', '0', '0'],
                ['24', '删除栏目', '21', '/category/delete', '', '', '0', '0'],
                
                ['25', '附件管理', '2', '/attachment/index', '', '', '0', '1'],
                ['26', '删除附件', '25', '/attachment/delete', '', '', '0', '0'],
                ['27', '查看附件', '25', '/attachment/view-layer', '', '', '0', '0'],
                ['28', '查看缩略图', '25', '/attachment/thumbs', '', '', '0', '0'],
                ['29', '删除缩略图', '25', '/attachment/thumbdelete', '', '', '0', '0'],
                ['30', '附件地址替换', '25', '/attachment/address', '', '', '0', '0'],
                
                ['31', '推荐位管理', '2', '/position/index', '', '', '0', '1'],
                ['32', '添加推荐位', '31', '/position/create', '', '', '0', '0'],
                ['33', '修改推荐位', '31', '/position/update', '', '', '0', '0'],
                ['34', '删除推荐位', '31', '/position/delete', '', '', '0', '0'],
                ['35', '信息管理', '31', '/position-data/index', '', '', '0', '0'],
                ['36', '删除推荐位信息', '31', '/position-data/delete', '', '', '0', '0'],
                
                ['37', '管理员管理', '4', '/admin/index', '', '', '0', '1'],
                ['38', '添加管理员', '37', '/admin/create', '', '', '0', '0'],
                ['39', '修改管理员', '37', '/admin/update', '', '', '0', '0'],
                ['40', '删除管理员', '37', '/admin/delete', '', '', '0', '0'],
                
                ['41', '角色管理', '4', '/role/index', '', '', '0', '1'],
                ['42', '添加角色', '41', '/role/create', '', '', '0', '0'],
                ['43', '修改角色', '41', '/role/update', '', '', '0', '0'],
                ['44', '删除角色', '41', '/role/delete', '', '', '0', '0'],
                ['45', '角色权限设置', '41', '/role/priv', '', '', '0', '0'],
                
                ['46', '会员列表', '3', '/user/index', '', '', '0', '1'],
                ['47', '添加会员', '46', '/user/create', '', '', '0', '0'],
                ['48', '修改会员', '46', '/user/update', '', '', '0', '0'],
                ['49', '删除会员', '46', '/user/delete', '', '', '0', '0'],
                
                ['50', '会员组管理', '3', '/group/index', '', '', '0', '1'],
                ['51', '添加会员组', '50', '/group/create', '', '', '0', '0'],
                ['52', '修改会员组', '50', '/group/update', '', '', '0', '0'],
                ['53', '删除会员组', '50', '/group/delete', '', '', '0', '0'],
                
                ['54', '菜单管理', '5', '/menu/index', '', '', '0', '1'],
                ['55', '添加菜单', '54', '/menu/create', '', '', '0', '0'],
                ['56', '修改菜单', '54', '/menu/update', '', '', '0', '0'],
                ['57', '删除菜单', '54', '/menu/delete', '', '', '0', '0'],
                
                ['58', '日志管理', '5', '/log/index', '', '', '0', '1'],
                ['59', '查看日志', '58', '/log/view', '', '', '0', '0'],
                ['60', '删除日志', '58', '/log/delete', '', '', '0', '0'],
                
                ['61', '留言管理', '5', '/feedback/index', '', '', '0', '1'],
                ['62', '查看留言', '61', '/feedback/view', '', '', '0', '0'],
                ['63', '删除留言', '61', '/feedback/delete', '', '', '0', '0'],
                
                ['66', '合作伙伴', '5', '/partner/index', '', '', '0', '1'],
                ['67', '添加合作伙伴', '66', '/partner/create', '', '', '0', '0'],
                ['68', '修改合作伙伴', '66', '/partner/update', '', '', '0', '0'],
                ['69', '删除合作伙伴', '66', '/partner/delete', '', '', '0', '0'],
                
                ['70', '友情链接', '5', '/link/index', '', '', '0', '1'],
                ['71', '添加友情链接', '70', '/link/create', '', '', '0', '0'],
                ['72', '修改友情链接', '70', '/link/update', '', '', '0', '0'],
                ['73', '删除友情链接', '70', '/link/delete', '', '', '0', '0'],
                
                
            ]);

    }

    public function safeDown()
    {
        $this->dropTable('{{%menu}}');
    }
}
