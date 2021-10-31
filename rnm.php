#!/usr/bin/php
<?php
$FIND_NAME = 'node_modules';

if ($argc < 2) {
  die('还未输入文件路径');
}

// 取待删除目录
// getcwd()
$removeDir = realpath($argv[1]);

// 遍历目录下 node_modules 的目录
$findArr = array();
findDir($removeDir, $FIND_NAME, $findArr);
if (!count($findArr)) {
  die('未发现' . $FIND_NAME);
}
echo "发现文件如下：\n";
array_map(function ($item) {
  echo '- ' . $item . "\n";
}, $findArr);

// 询问
echo "\n全部删除，请输入 y，并按回车：\n";
$isY = trim(fgets(STDIN)) == 'y';
if (!$isY) {
  die('取消删除');
}

// 删除遍历出来的目录
array_map(function ($item) {
  echo '▶ 删除 ' . $item . ' ……';
  system('rm -rf ' . $item);
  echo " ✅ \n";
}, $findArr);

function findDir($dir_path = '', $name, &$result = array())
{
  if (is_dir($dir_path)) {
    if (basename($dir_path) == $name) {
      array_push($result, $dir_path);
      return;
    }

    $dirs = opendir($dir_path);
    if ($dirs) {
      while (($file = readdir($dirs)) !== false) {
        if ($file !== '.' && $file !== '..') {
          if (is_dir($dir_path . '/' . $file)) {
            findDir($dir_path . '/' . $file, $name, $result);
          }
        }
      }
      closedir($dirs);
    }
  }
}
