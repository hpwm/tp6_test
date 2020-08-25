pro_dir="/vagrant_data/dcadmin"
echo "进入前端项目目录"
cd $pro_dir
git reset --hard
git pull origin master
echo "拉取前端代码成功"

admin_dir="/vagrant_data/dcadmin"

copy -rf $pro_idr/index.html $admin_dir/application/system/view/view/index.html

copy -rf $pro_dir/ $admin_dir/public/system/
