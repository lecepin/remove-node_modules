# Remove node_modules
一键查找并删除 `node_modules` 文件夹。

One-click find and remove node_modules folder.

## 使用

下载 `rnm.php` 文件，执行：

```bash
$ php rnm.php someDir

# OR
$ chmod +x rnm.php
$ ./rnm.php someDir
```

## 效果

```bash
$ ./rnm.php dev/ 
发现文件如下：
- /Users/xx/Desktop/dev/d1/node_modules
- /Users/xx/Desktop/dev/d2/node_modules
- /Users/xx/Desktop/dev/decision-cmp/node_modules
- /Users/xx/Desktop/dev/d3/node_modules

全部删除，请输入 y，并按回车：
y
▶ 删除 /Users/xx/Desktop/dev/d1/node_modules …… ✅ 
▶ 删除 /Users/xx/Desktop/dev/d2/node_modules …… ✅ 
▶ 删除 /Users/xx/Desktop/dev/decision-cmp/node_modules …… ✅ 
▶ 删除 /Users/xx/Desktop/dev/d3/node_modules …… ✅ 
```
