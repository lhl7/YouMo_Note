<?php
declare (strict_types = 1);

namespace app\middleware;

use think\facade\Request;
use think\facade\Session;

class AdminSession
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     */
    public function handle($request, \Closure $next)
    {
        $username = $request->param("admin");
//        echo "admin中间件测试";
        if(!(Session::has($username))){//如果session里没有admin，是空的，即没登录，拦截请求
            return json(['msg' => 'No hacking No blooding', 'status' => 0]);
        }
        else return $next($request);
    }
}
