## ImageUpController

**接口地址：**http://10.21.145.59/filemanage.ImageUp

**功能:** 接收图片并保存，返回一个对应的文件地址。

团队的名字，团队ID，创建者 ，创建时间，[用户名，邮箱]数组

**参数**:($file,$username)

**返回值**:json字符串

**返回值示例：**

```json
成功：
{
  "imgUrl": "http://10.21.145.59/FileImage/test5/d2/1f722236d946fd98536ba805de31ed1ac2f4f8.jpg",
  "status": 1,
  "msg": "上传成功"
}
失败：
{
  "imgUrl": "",
  "status": 0,
  "msg": "上传文件后缀不允许/mime类型不允许/文件太大"
}
```

**方法：**

```php
public static function index()
    {
        //image是前端传来的name值（参数值）
        $file = request()-&gt;file('image');-&gt;
        $username="test5";
        //验证文件
        try {
            validate(['filecheck' =&gt; [
                'fileSize' =&gt; 3145728,//最多上传3M
                'fileExt' =&gt; 'jpg,png,gif,jpeg',//文件扩展名
                'fileMime' =&gt; 'image/jpeg,image/png,image/gif',//mime类型
            ]])-&gt;check(['filecheck' =&gt; $file]);//这个filecheck是验证规则名

           //上传文件
           //这里的disk里的参数是配置文件中的public组，写入的路径是配置文件里的路径
           // putfile第一个参数是生成的第一个文件夹名字，file是文件，rule是文件命名规则,这个文件会放在某个文件夹下
            $savename = Filesystem::disk('public')-&gt;putFile($username, $file,'sha1');
            //返回的名字： User1/d2\1f722236d946fd98536ba805de31ed1ac2f4f8.jpg
            //7b是生成的 使用哈希算法会自动取文件哈希值前两个字符作为目录名

            //得到路径，这个函数里的disk是配置文件中的public组，name是指要获得哪个配置参数，这里获得了url参数
            $url = \think\facade\Filesystem::getDiskConfig('public', 'url') . '/' . str_replace('\\', '/', $savename);
            //返回的名字：/UserImage/User1/d2/1f722236d946fd98536ba805de31ed1ac2f4f8.jpg

//            echo $url;
            if (!$savename) {
                return json(['imgUrl'=&gt;'', 'status' =&gt; 0, 'msg' =&gt; '上传失败']);
            }

            $serverIp='http://10.21.145.59';

            return json(['imgUrl' =&gt; $serverIp.$url, 'status' =&gt; 1, 'msg' =&gt; '上传成功']);
        //类型不允许
        } catch (ValidateException $e) {
            return json(['imgUrl'=&gt;'', 'status' =&gt; 0, 'msg' =&gt; $e-&gt;getMessage()]);
        }
    }
```

删除图片
接口地址: http://10.21.145.59/filemanage.ImageUp/delete
参数名：imageArr