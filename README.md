# 配置

Config组件用于完成网站配置项管理。

登录 [GITHUB](https://github.com/houdunwang/config)  查看源代码

[TOC]
#开始使用

####安装组件
使用 composer 命令进行安装或下载源代码使用。

```
composer require houdunwang/config
```
> HDPHP 框架已经内置此组件，无需要安装

####创建对象
```
$obj = new \houdunwang\mail\Config();
```

####设置配置

```
$obj->set('alipay.key.auth','houdunwang');
```

####检测配置
```
$obj->has('web.master');
```

####获取配置
如果想要获取配置文件的所有内容，只传递文件名就可以：
```
$obj->get('app');
```

####获取子元素
获取配置文件使用 get 方法完成，参数为 ”配置文件名.配置项"的形式。
```
$obj->get('view.path');
```

####获取所有
也可以使用 all 方法获取所有配置，例如：
```
$obj->all();
```

####排除批定字段
```
$obj->getExtName('database',['write','read']);
```

# c 函数
c函数是用来快速获取/设置配置项的

####获得所有
```
c();
```

####设置
```
c('alipay.key.auth','houdunwang');
```

####获取
```
c('alipay.key.auth');
```