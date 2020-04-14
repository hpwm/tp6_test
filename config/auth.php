<?php

/**
 * 认证配置信息
 */
return [
    //认证数据库组
    'admin'         =>[
        // 权限开关
        'auth_on'           => 1,
        // 认证方式，1为实时认证；2为登录认证。
        'auth_type'         => 1,
        // 用户组数据表名
        'auth_group'        => 'toadmin_auth_group',
        // 用户-用户组关系表
        'auth_group_access' => 'toadmin_auth_group_access',
        // 权限规则表
        'auth_rule'         => 'toadmin_auth_rule',
        // 用户信息表
        'auth_user'         => 'toadmin_auth_user',
        // 用户表ID字段名
        'auth_user_pk'      => 'id',
        // 用户操作日志表
        'auth_log'      => 'toadmin_auth_log',
        // 权限规则是否同个应用中统一，开启统一，即针对同一应用saas多站点，规则表都使用website=0的
        'auth_rule_unified'      => false,
        'auth_token_name' => 'X-token'
    ],
//        'tosubadmin'         =>[
//            // 权限开关
//            'auth_on'           => 1,
//            // 认证方式，1为实时认证；2为登录认证。
//            'auth_type'         => 1,
//            // 用户组数据表名
//            'auth_group'        => 'subadmin_auth_group',
//            // 用户-用户组关系表
//            'auth_group_access' => 'subadmin_auth_group_access',
//            // 权限规则表
//            'auth_rule'         => 'subadmin_auth_rule',
//            // 用户信息表
//            'auth_user'         => 'subadmin_auth_user',
//            // 用户表ID字段名
//            'auth_user_pk'      => 'id',
//            //用户操作日志表
//            'auth_log'      => 'subadmin_auth_log',
//            'auth_rule_unified'      => false,

//        ],
];