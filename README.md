基于CI开发的购物车程序模块
==========================

[ 介绍 ]

    这是一个基于CodeIgniter2.1.4开发的购物车程序模块。
    目前实现的功能有首页商品展示与多级分类；前台登录与注册、搜索及分页；
    购物流程，网店的配送方式，支付接口，订单结算；
    后台有权限管理；商品管理、属性编辑、分类品牌管理；订单的操作管理；支付方式及配送方式管理等等。
    
[ 特别说明 ]

    目前这个购物车程序模块只是个半成品，仅供学习参考使用，请勿用作生产环境。

[ 安装使用 ]

    1. 下载CI_Cart程序到你的localhost网站根目录下
    2. 创建MYSQL数据库，导入ci_cart.sql，
    配置数据库：\admin\application\config\database.php 和\application\config\database.php
    3. 后台入口 http://localhost/ci_cart/admin 后台帐号密码 admin admin888
    4. 其它的自己捣鼓吧~

[ 目录结构 ]

CI_Cart
├─admin
│  ├─application
│  │  ├─config
│  │  ├─controllers
│  │  ├─errors
│  │  ├─helpers
│  │  ├─hooks
│  │  ├─language
│  │  ├─libraries
│  │  ├─models
│  │  ├─plugins
│  │  └─views
│  │      ├─customer
│  │      ├─product
│  │      │  ├─attribute
│  │      │  ├─attribute_set
│  │      │  ├─brand
│  │      │  ├─category
│  │      │  └─product
│  │      ├─sales
│  │      │  └─order
│  │      ├─system
│  │      │  ├─admin_user
│  │      │  ├─payment
│  │      │  ├─role
│  │      │  ├─shipping
│  │      │  └─shipping_area
│  │      └─widget
│  ├─css
│  ├─fck
│  │  └─editor
│  ├─images
│  └─js
├─application
│  ├─config
│  ├─controllers
│  │  └─customer
│  ├─errors
│  ├─helpers
│  ├─hooks
│  ├─language
│  ├─libraries
│  │  ├─payment
│  │  └─shipping
│  ├─models
│  └─views
│      ├─brand
│      ├─category
│      ├─customer
│      ├─order
│      ├─product
│      └─widget
├─cache
├─css
├─images
├─js
├─logs
├─system
│  ├─codeigniter
│  ├─database
│  │  └─drivers
│  ├─fonts
│  ├─helpers
│  ├─language
│  ├─libraries
│  ├─plugins
│  └─scaffolding
│      ├─images
│      └─views
└─uploads

[ 协议 ]

    本系统除CodeIgniter框架外，遵循Apache Licence2.0开源许可协议发布，具体参考LICENSE内容。
