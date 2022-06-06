<?php
/**
 * Created by phpstorm
 * User: loveAKY
 * Date: 2021/1/18
 * Time: 17:06
 */

namespace app\middleware;

use think\facade\Request;
use think\Response;

/**
 * 跨域设置
 * Class CrossDomain
 * @package app\middleware
 */
//https://blog.csdn.net/fish_404/article/details/112789641?utm_medium=distribute.pc_relevant.none-task-blog-2%7Edefault%7ECTRLIST%7Edefault-2.no_search_link&depth_1-utm_source=distribute.pc_relevant.none-task-blog-2%7Edefault%7ECTRLIST%7Edefault-2.no_search_link
//抄的解决跨域问题
class CrossDomain
{
    /**
     * 设置跨域
     * @param $request
     * @param \Closure $next
     *
     * @return mixed|void
     */
    public function handle($request, \Closure $next)
    {
        //指定允许其他域名访问
//        'Access-Control-Allow-Origin:http://172.20.0.206'//一般用法（1*，2指定域，3动态设置），3是因为*不允许携带认证头和cookies
//        //是否允许后续请求携带认证信息（cookies）,该值只能是true,否则不返回
//        'Access-Control-Allow-Credentials:true'
//        //预检结果缓存时间,也就是上面说到的缓存啦
//        'Access-Control-Max-Age: 1800'
//        //允许的请求类型
//        'Access-Control-Allow-Methods:GET,POST,PUT,POST'
//        //允许的请求头字段
//        'Access-Control-Allow-Headers:x-requested-with,content-type'

        header('Access-Control-Allow-Origin:*');
        // 响应类型
        header('Access-Control-Allow-Methods:GET,POST,PUT,POST,OPTIONS');
        // 响应头设置
        header('Access-Control-Allow-Headers:Content-Type, Content-Length, Authorization, Accept, X-Requested-With, Token');

//        忽略options请求
//        if (Request::instance()->isOptions()) {
//            exit();
//        }

        return $next($request);
    }



}
