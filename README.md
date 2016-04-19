# 模块
1. 用户模块
   > a. 登陆，注册，修改密码
   > b. 用户管理
   > c. 用户组管理
   > d.　权限管理

//TODO
   这里现在有个ｂｕｇ　如何阻止不用填写的字段，不可写
2. 权限模块  --不做
3. 会员管理
4. 微信卡券管理
5. 公告管理
6. 站点管理
 1. 站点基础信息管理
 2. 站点搜索优化管理


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
