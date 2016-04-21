﻿# 模块
1. 用户模块
   > a. 登陆，注册，修改密码
   > b. 用户管理
   > c. 用户组管理
   > d.　权限管理


 2. 权限模块  --不做
3. 会员管理
4. 微信卡券管理
5. 公告管理
6. 站点管理
 1. 站点基础信息管理
 2. 站点搜索优化管理  --不做


#数据结构

##用户表

> 1. id
> 2. name 登陆名
> 3. nickname  显示名
> 3. password   密码
> 2. email  邮箱地址
> 4. group  用户组
> 5. create_at  创建时间
> 6. update_at  更新时间
> 6. status    状态

## 用户组表

> 1. id
> 2. name  组名
> 3. privileges  允许的权限,可以序列化格式存储 直接存储url(模块的地址)

　

## 模块表
> 1. id
> 2. name 模块名
> 3. parent 父模块
> 3. url  模块url地址


## 站点表
>1. id
>2. name 站点名称
>3. author　站点作者
>4. keywords 站点关键字
>3. description　站点描述

## 会员表
1. id
--会员基本信息
2. name 会员姓名
3. birth-year 会员生日
4. birth-month
5. birth-day
3. phone　手机号码
4. phone_status 手机是否验证
---已读公告列表,存入已经读过的公告列表id
4. read_notices 已读公告

--登录信息 --
1. token  登录token
5. last_login_time　最后登录时间
6. last_login_ip  最后登录ip
　
--用户状态　
1. create_at 后台创建时间
2. update_at 后台更新时间
3. status 用户状态

## 会员卡表
--下面是会员卡信息
1. id
1. vip_card 会员卡号
2. vip_card_password　会员卡密码
3. member_id　会员卡所属会员
3. card_status　是否激活
4. actived_time 激活时间

--登录信息
1. token  登录token
5. last_login_time　最后登录时间
6. last_login_ip  最后登录ip



## 公告表
1. id
2. title
3. content
4. create_at
5. update_at
6. status


还是用会员的TOKEN不用卡的token

　　
------------------------------
------------------------------
#系统使用说明v-01
##　问题汇总
1. 前端登录页面的登录逻辑还没写完，所以各个页面可以单独进入
2. 头部显示的　Ｍy app 后面可能会直接在后台设置显示。
3. 验证码那块验证逻辑还没写完，只是一个效果。方便你们那边的设计进行设计
4. 微信卡券这边的逻辑还没定，这块我就直接在里边加了一个链接进去我的会员区
5. 我的会员区这里,公告后面的5是显示有几条消息没有显示。
6. 公告列表里边，颜色比较深的公告表示是未读公告，浅的表示已读公告，点击可以进去查看详情。
7. 微信卡券列表暂时未定，你们那边可以先设计页面.

注:上面的表结构不是最新的。


## 数据库链接
配置文件在Application/Common/Conf/config.php
进去修改配置就行
数据库表文件是根目录的membership.sql。

## PHP版本
我本地的ｐｈｐ版本时5.6的，虽然我在写法上兼容了5.3的写法，
但是尽量php版本在5.4以上把，不然可能会有些问题。主要我没在5.3上测过


## nginx 配置

location / {
            root /home/wj/www/thinkphp3.2/membership;
            index index.html index.htm index.php;
            if (!-e $request_filename) {
            rewrite ^/index.php(.*)$ /index.php?s=$1 last;
            rewrite ^(.*)$ /index.php?s=$1 last;
            break;
            }
         }

> 在server那个大括号内找到
>      location / {
>      ....
>      }

>删掉或者注释掉－－删掉之前最好备份一下
>然后把这一段拷贝进去







