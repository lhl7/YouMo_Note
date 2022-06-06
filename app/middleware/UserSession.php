<?php
declare (strict_types = 1);

namespace app\middleware;

use think\facade\Cookie;
use think\facade\Request;
use think\facade\Session;

class UserSession
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     */
    public function handle($request, \Closure $next)
    {
        $username = $request->param("userName");
//        echo "session中间件测试";
        if(!(Session::has($username))){//如果session里没有username，是空的，即没登录，拦截请求
            return json(['msg' => 'No hacking No blooding', 'status' => 0]);
        }
        else return $next($request);
    }
}
