#!/bin/bash
path=$(pwd)
echo -n "请输入要查找的目录 ($path)："
read path
if [ -z "$path" ]; then
    path=$(pwd)
fi

dirs=$(find ${path} -name 'node_modules' -type d -prune 2>/dev/null)
dirs_len=0

for dir in $dirs; do
    echo - $dir
    dirs_len=$((dirs_len + 1))
done

if [ $dirs_len -gt 0 ]; then
    echo -n "找到 $dirs_len 个 node_modules 目录，是否删除？(y/N)"
    read is_delete
    if [ "$is_delete" = "y" ]; then
        echo 删除中...
        for dir in $dirs; do
            rm -rf "$dir"
            echo "==> ✅ 已删除 $dir"
        done
        echo 删除完成
    fi
else
    echo ❌ 没有找到 node_modules 目录
fi
