<?php
/**
 * Created by PhpStorm.
 * User: lsshu
 * Date: 2019/7/17
 * Time: 10:08
 */

if (version_compare(PHP_VERSION, '7.0', '<')) {
    die('PHP版本过低，最少需要PHP7.0，请升级PHP版本！');
}
/**
 * @method static Macaw get(string $route, Callable $callback)
 * @method static Macaw post(string $route, Callable $callback)
 * @method static Macaw put(string $route, Callable $callback)
 * @method static Macaw delete(string $route, Callable $callback)
 * @method static Macaw options(string $route, Callable $callback)
 * @method static Macaw head(string $route, Callable $callback)
 */
class Route {
    public static $halts = false;
    public static $routes = array();
    public static $methods = array();
    public static $callbacks = array();
    public static $maps = array();
    public static $patterns = array(
        ':any' => '[^/]+',
        ':num' => '[0-9]+',
        ':all' => '.*'
    );
    public static $error_callback;
    /**
     * Defines a route w/ callback and method
     */
    public static function __callstatic($method, $params) {
        if ($method == 'map') {
            $maps = array_map('strtoupper', $params[0]);
            $uri = strpos($params[1], '/') === 0 ? $params[1] : '/' . $params[1];
            $callback = $params[2];
        } else {
            $maps = null;
            $uri = strpos($params[0], '/') === 0 ? $params[0] : '/' . $params[0];
            $callback = $params[1];
        }
        array_push(self::$maps, $maps);
        array_push(self::$routes, $uri);
        array_push(self::$methods, strtoupper($method));
        array_push(self::$callbacks, $callback);
    }
    /**
     * Defines callback if route is not found
     */
    public static function error($callback) {
        self::$error_callback = $callback;
    }
    public static function haltOnMatch($flag = true) {
        self::$halts = $flag;
    }
    /**
     * Runs the callback for the given request
     */
    public static function dispatch(){
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        $searches = array_keys(static::$patterns);
        $replaces = array_values(static::$patterns);
        $found_route = false;
        self::$routes = preg_replace('/\/+/', '/', self::$routes);
        // Check if route is defined without regex
        if (in_array($uri, self::$routes)) {
            $route_pos = array_keys(self::$routes, $uri);
            foreach ($route_pos as $route) {
                // Using an ANY option to match both GET and POST requests
                if (self::$methods[$route] == $method || self::$methods[$route] == 'ANY' || (!empty(self::$maps[$route]) && in_array($method, self::$maps[$route]))) {
                    $found_route = true;
                    // If route is not an object
                    if (!is_object(self::$callbacks[$route])) {
                        // Grab all parts based on a / separator
                        $parts = explode('/',self::$callbacks[$route]);
                        // Collect the last index of the array
                        $last = end($parts);
                        // Grab the controller name and method call
                        $segments = explode('@',$last);
                        // Instanitate controller
                        $controller = new $segments[0]();
                        // Call method
                        return $controller->{$segments[1]}();
                        if (self::$halts) return;
                    } else {
                        // Call closure
                        call_user_func(self::$callbacks[$route]);
                        if (self::$halts) return;
                    }
                }
            }
        } else {
            // Check if defined with regex
            $pos = 0;
            foreach (self::$routes as $route) {
                if (strpos($route, ':') !== false) {
                    $route = str_replace($searches, $replaces, $route);
                }
                if (preg_match('#^' . $route . '$#', $uri, $matched)) {
                    if (self::$methods[$pos] == $method || self::$methods[$pos] == 'ANY' || (!empty(self::$maps[$pos]) && in_array($method, self::$maps[$pos]))) {
                        $found_route = true;
                        // Remove $matched[0] as [1] is the first parameter.
                        array_shift($matched);
                        if (!is_object(self::$callbacks[$pos])) {
                            // Grab all parts based on a / separator
                            $parts = explode('/',self::$callbacks[$pos]);
                            // Collect the last index of the array
                            $last = end($parts);
                            // Grab the controller name and method call
                            $segments = explode('@',$last);
                            // Instanitate controller
                            $controller = new $segments[0]();
                            // Fix multi parameters
                            if (!method_exists($controller, $segments[1])) {
                                echo "controller and action not found";
                            } else {
                                return call_user_func_array(array($controller, $segments[1]), $matched);
                            }
                            if (self::$halts) return;
                        } else {
                            call_user_func_array(self::$callbacks[$pos], $matched);
                            if (self::$halts) return;
                        }
                    }
                }
                $pos++;
            }
        }
        // Run the error callback if the route was not found
        if ($found_route == false) {
            if (!self::$error_callback) {
                self::$error_callback = function() {
                    header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");
                    echo '404';
                };
            } else {
                if (is_string(self::$error_callback)) {
                    self::get($_SERVER['REQUEST_URI'], self::$error_callback);
                    self::$error_callback = null;
                    self::dispatch();
                    return ;
                }
            }
            call_user_func(self::$error_callback);
        }
    }
}

class Request
{
    protected static $instance;     //对象实例
    /**
     * 构造函数
     * @access protected
     * @param array $options 参数
     */
    protected function __construct($options = array())
    {

    }
    /**
     * 初始化
     * @access public
     * @param array $options 参数
     * @return object|static
     */
    public static function instance($options = array())
    {
        if (is_null(self::$instance)) {
            self::$instance = new self($options);
        }
        return self::$instance;
    }

    /**
     * @return array
     */
    public function param()
    {
        return array_merge($_GET,($_POST ?: []));
    }
    public function __get($key) {
        return ($this->param()[$key]) ?? null;
    }
}

class Response
{
    protected static $instance;     //对象实例
    /**
     * 构造函数
     * @access protected
     * @param array $options 参数
     */
    protected function __construct($options = array())
    {

    }
    /**
     * 初始化
     * @access public
     * @param array $options 参数
     * @return object|static
     */
    public static function instance($options = array())
    {
        if (is_null(self::$instance)) {
            self::$instance = new self($options);
        }
        return self::$instance;
    }
    /**
     * 设置HTTP状态吗
     * @param int $num
     */
    public static function http($num = 200) {
        $http = [
            100 => "HTTP/1.1 100 Continue",
            101 => "HTTP/1.1 101 Switching Protocols",
            200 => "HTTP/1.1 200 OK",
            201 => "HTTP/1.1 201 Created",
            202 => "HTTP/1.1 202 Accepted",
            203 => "HTTP/1.1 203 Non-Authoritative Information",
            204 => "HTTP/1.1 204 No Content",
            205 => "HTTP/1.1 205 Reset Content",
            206 => "HTTP/1.1 206 Partial Content",
            300 => "HTTP/1.1 300 Multiple Choices",
            301 => "HTTP/1.1 301 Moved Permanently",
            302 => "HTTP/1.1 302 Found",
            303 => "HTTP/1.1 303 See Other",
            304 => "HTTP/1.1 304 Not Modified",
            305 => "HTTP/1.1 305 Use Proxy",
            307 => "HTTP/1.1 307 Temporary Redirect",
            400 => "HTTP/1.1 400 Bad Request",
            401 => "HTTP/1.1 401 Unauthorized",
            402 => "HTTP/1.1 402 Payment Required",
            403 => "HTTP/1.1 403 Forbidden",
            404 => "HTTP/1.1 404 Not Found",
            405 => "HTTP/1.1 405 Method Not Allowed",
            406 => "HTTP/1.1 406 Not Acceptable",
            407 => "HTTP/1.1 407 Proxy Authentication Required",
            408 => "HTTP/1.1 408 Request Time-out",
            409 => "HTTP/1.1 409 Conflict",
            410 => "HTTP/1.1 410 Gone",
            411 => "HTTP/1.1 411 Length Required",
            412 => "HTTP/1.1 412 Precondition Failed",
            413 => "HTTP/1.1 413 Request Entity Too Large",
            414 => "HTTP/1.1 414 Request-URI Too Large",
            415 => "HTTP/1.1 415 Unsupported Media Type",
            416 => "HTTP/1.1 416 Requested range not satisfiable",
            417 => "HTTP/1.1 417 Expectation Failed",
            500 => "HTTP/1.1 500 Internal Server Error",
            501 => "HTTP/1.1 501 Not Implemented",
            502 => "HTTP/1.1 502 Bad Gateway",
            503 => "HTTP/1.1 503 Service Unavailable",
            504 => "HTTP/1.1 504 Gateway Time-out"
        ];
        header($http[$num]);
    }

    /**
     * @param array|string $type
     */
    public static function header($type = 'default')
    {
        $header = [
            'default'=>'text/html;charset=utf-8',
            'atom'=>'application/atom+xml',
            'css'=>'text/css',
            'javascript'=>'text/javascript',
            'jpeg'=>'image/jpeg',
            'json'=>'application/json',
            'pdf'=>'application/pdf',
            'rss'=>'application/rss+xml; charset=ISO-8859-1',
            'text'=>'text/plain',
            'xml'=>'text/xml',
            'stream'=>'application/octet-stream',
            'zip'=>'application/zip',
        ];
        if(is_array($type)){
            foreach($type as $item){
                header('Content-Type: '.$header[$item]);
            }
        }else{
            header('Content-Type: '.$header[$type]);
        }
    }
}

class BaseController
{
    public function __call ($name , array $arguments )
    {

    }
    public static function __callStatic ($name , array $arguments )
    {

    }
}

class LiteDB extends SQLite3
{
    protected static $instance;     //对象实例

    /**
     * 构造函数
     * @access protected
     * @param array $options 参数
     */
    public function __construct($options = array())
    {
        if(is_string($options)){
            $this->open($options);
        }
    }
    /**
     * 初始化
     * @access public
     * @param array $options 参数
     * @return object|static
     */
    public static function instance($options = array())
    {
        if (is_null(self::$instance)) {
            self::$instance = new self($options);
        }
        return self::$instance;
    }

}

class App
{
    protected static $instance;     //对象实例
    protected static $serverApi = ''; // 主服务器请求地址
    protected static $actions = [ //请求方法
        'create'=>'',
        'update'=>'',
        'select'=>'',
        'delete'=>'',
        'updateAll'=>'',
        'deleteAll'=>'',
    ];
    protected static $allowExtension = [ //允许的类型
        ''
    ];
    protected static $prohibitExtension = [ //禁止的类型
        ''
    ];
    protected static $errors = [];
    /**
     * 构造函数
     * @access protected
     * @param array $options 参数
     */
    protected function __construct($options = array())
    {
        if(isset($options['serverApi'])){
            self::$serverApi = $options['serverApi'];
        }
        if(isset($options['actions'])){
            self::$actions = $options['actions'];
        }
        if(isset($options['allowExtension'])){
            self::$allowExtension = $options['allowExtension'];
        }
        if(isset($options['prohibitExtension'])){
            self::$prohibitExtension = $options['prohibitExtension'];
        }
    }
    /**
     * 初始化
     * @access public
     * @param array $options 参数
     * @return object|static
     */
    public static function instance($options = array())
    {
        if (is_null(self::$instance)) {
            self::$instance = new self($options);
        }
        return self::$instance;
    }
    /**
     * 地址参数
     * @return string
     */
    public static function getRequestUri() {
        if (isset($_SERVER['HTTP_X_REWRITE_URL'])) {
            // check this first so IIS will catch
            $requestUri = $_SERVER['HTTP_X_REWRITE_URL'];
        } elseif (isset($_SERVER['REDIRECT_URL'])) {
            // Check if using mod_rewrite
            $requestUri = $_SERVER['REDIRECT_URL'];
        } elseif (isset($_SERVER['REQUEST_URI'])) {
            $requestUri = $_SERVER['REQUEST_URI'];
        } elseif (isset($_SERVER['ORIG_PATH_INFO'])) {
            // IIS 5.0, PHP as CGI
            $requestUri = $_SERVER['ORIG_PATH_INFO'];
            if (!empty($_SERVER['QUERY_STRING'])) {
                $requestUri .= '?' . $_SERVER['QUERY_STRING'];
            }
        }
        return $requestUri;
    }
    /**
     * http|https
     * @return string
     */
    public static function getSiteProtocol()
    {
        return isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    }

    /**
     * HTTP_HOST 域名
     * @return string
     */
    public static function getSiteUrl()
    {
        return isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
    }

    /**
     * 获取文件后缀
     * @param $file
     * @return bool|string
     */
    protected static function getextension($file)
    {
        return substr(strrchr($file, '.'), 1);
//        return substr($file, strrpos($file, '.')+1);
//        return pathinfo($file)['extension'];
//        return pathinfo($file, PATHINFO_EXTENSION);
    }
    /**
     * 允许这个后缀
     * @param $extension
     * @return bool
     */
    protected static function isAllowExtension($extension)
    {
        return in_array($extension,self::$allowExtension);
    }

    /**
     * 不允许这个后缀
     * @param $extension
     * @return bool
     */
    protected static function isProhibitExtension($extension)
    {
        return in_array($extension,self::$prohibitExtension);
    }

    /**
     * 获取地址内容 写入文件
     * @param $url 地址
     * @param $path 文件
     */
    public static function httpGetContent($url, $path)
    {
        $content = self::getContent($url);
        self::touch($path, $content);
    }
    /**
     * 创建目录
     * @param $path
     * @return bool
     */
    protected static function mkDir($path)
    {
        if (is_dir($path)){
            self::error("对不起！目录 " . $path . " 已经存在！") ;
            return false;
        }else{
            //第三个参数是“true”表示能创建多级目录，iconv防止中文目录乱码
            // $res=mkdir($path,0777,true);
            $res=mkdir(iconv("UTF-8", "GBK", $path),0777,true);
            if ($res){
                return true;
            }else{
                self::error("目录 $path 创建失败") ;
                return false;
            }
        }
    }

    /**
     * 获取 域名
     * @return string
     */
    public static function getDomain()
    {
        return self::getSiteProtocol().self::getSiteUrl();
    }
    /**
     * 记录错误信息
     * @param $txt
     */
    protected static function error($txt)
    {
        self::$errors[] = $txt;
    }

    /**
     * 获取错误信息
     * @return array
     */
    public static function getError()
    {
        return self::$errors;
    }
    /**
     * 获取内容
     * @param $url
     * @return bool|string
     */
    public static function getContent($url)
    {
        return @file_get_contents($url);
    }
    /**
     * 创建文件
     * @param $file
     * @param string $data
     * @return bool
     */
    public static function touch($file, $data='')
    {
        // 文件是否存在
        if(file_exists($file)){
            self::error("文件 $file 已经存在") ;
            return false;
        }else{
            // 目录是否存在
            if(!is_dir(dirname($file))){
                //创建目录
                $mk_re = self::mkDir(dirname($file));
                if(!$mk_re){
                    return false;
                }
            }
            //创建文件
            $file_re = file_put_contents($file,$data);
            if($file_re >=0){
                return true;
            }else{
                self::error("创建文件 $file 错误") ;
                return false;
            }
        }
    }
    /**
     * @param string|array|null $content
     * @param int $status
     * @param array $headers
     * @return string
     */
    public static function response($content = '', $status = 200, array $headers = [])
    {
        if(is_array($content)){
            echo json_encode($content);
            Response::header('json');
        }else if(is_string($content)){
            echo $content;
            Response::header();
        }else{
            return Response::instance($content);
        }
        Response::http($status);
        Response::header($headers);
    }

    /**
     * Request 对象
     * @param array $param
     * @return object|Request
     */
    public static function request($param = [])
    {
        return Request::instance($param);
    }
}

class Controller extends BaseController
{
    public $defaultPath = 'a';
    public $defaultHtmlName = 'index.html';
    public function write()
    {
        $param = App::request()->param();

        // 模板地址
        $content_url = $param['content_url'] ?? null;
        // 模板文件内容
        $content = App::getContent($content_url);
        // 替换模板内容
        $content = $this->replaceContent($content,$param);
        // 是否带附件
        if(isset($param['enclosure']) && $param['enclosure']){
            $content = $this->getEnclosure($content,$param);
        }
        // 写入html
        App::touch($this->getPath($param,$this->getHtmlName($param)),$content);


        echo ($content);
//        return $param;



    }

    /**
     * 下载附件 和 处理 附件地址为相对
     * @param $content
     * @param $param
     * @return null|string|string[]
     */
    public function getEnclosure($content, $param)
    {
        $path = $this->getPath($param);
        $enclosures = [];
        preg_match_all("/<(script|link|img).*?(href|src)\s*=\s*[\'\"]((.*?)(css|js|images|img)(.*?)(\?.*?)?)[\'\"]/i",$content,$matches);
        // 处理正则数据结构
        foreach($matches as $i=>$match){
            foreach ($match as $key=>$val){
                $enclosures[$key][$i] = $val;
            }
        }
        // 下载html内容里的附件
        foreach ($enclosures as $enclosure){
            $enclosure_url = $enclosure[3];
            $enclosure_path = $path . $enclosure[5] . $enclosure[6];
            App::httpGetContent($enclosure_url,$enclosure_path);
        }
        $this->getCssBackgroundEnclosure($content, $param);
        // 处理附件为相对内容
        $content = preg_replace_callback("/(<(script|link|img).*?)(href|src)(\s*=\s*[\'\"])\s*((.*?)(css|js|images)(.*?))\s*([\'\"])/i",function ($matches) use ($param){
            return $matches[1] . $matches[3] . $matches[4] . $matches[7] . $matches[8] . $matches[9];
        },$content);
        return $content;
    }

    /**
     * 获取css背景图
     * @param $content
     * @param $param
     */
    protected function getCssBackgroundEnclosure($content, $param)
    {
        $url_path = substr($param['content_url'], 0,strrpos($param['content_url'], '/')+1);
        $path = $this->getPath($param);
        preg_replace_callback("/<link.*?href\s*=\s*([\'\"])\s*(.*?)\s*([\'\"])/i",function ($matches) use ($param,$url_path,$path){
            $css_url = $matches[2];
            $content = App::getContent($css_url);
            preg_match_all("/url\(\s*([\'\"])*\s*(.*?)\s*([\'\"])*\s*\)/i",$content,$css_matches);
            foreach ($css_matches[2] as $match){
                if(substr($match,0,3) == '../' ){
                    $url_file = $url_path . substr($match,3);
                    $path_file = $path.substr($match,3);
                    App::httpGetContent($url_file,$path_file);
                }
            }
        },$content);
    }
    /**
     * 替换模板内容
     * @param $content
     * @param $param
     * @return null|string|string[]
     */
    protected function replaceContent($content, $param)
    {
        // title
        if(isset($param['template_title']) && !empty($param['template_title'])){
            $content = preg_replace_callback("/(<\s*title\s*>)(.*?)(<\/\s*title\s*>)/i",function($matches) use ($param){
                return $matches[1].$param['template_title'].$matches[3];
            },$content);
        }
        // description
        if(isset($param['template_description']) && !empty($param['template_description'])){
            $content = preg_replace_callback("/(<meta\s*content=[\'\"])(.*?)([\'\"]\s*name=\"description\">)/i",function($matches) use ($param){
                return $matches[1].$param['template_description'].$matches[3];
            },$content);
        }
        // keywords
        if(isset($param['template_keywords']) && !empty($param['template_keywords'])){
            $content = preg_replace_callback("/(<meta\s*content=[\'\"])(.*?)([\'\"]\s*name=\"keywords\">)/i",function($matches) use ($param){
                return $matches[1].$param['template_keywords'].$matches[3];
            },$content);
        }
        // 去掉注释
        $content = preg_replace("/<!--.*?-->/i","",$content);


        // 是否让 hidden_class 变成 hidden_class_show
        $hidden_class = isset($param['hidden_class']) && $param['hidden_class'] ;
        $content = str_replace(($hidden_class?'hidden_class':'hidden_class_show'),(!$hidden_class?'hidden_class':'hidden_class_show'),$content);


        // 添加css
        if(isset($param['style'])){
            $content = preg_replace('/(<\/head>)/i','<style>'.$param['style'].'</style>'.' $1',$content);
        }
        // 添加js
        if(isset($param['script'])){
            $content = preg_replace('/(<\/body>)/i','$1 '.'<script>'.$param['script'].'</script>',$content);
        }

        // 去掉默认页面的zsly 模型 id
        $content = preg_replace_callback("/(var\s+zsly\s*=\s*\[[\'\"])(.*?)([\'\"]\s*,\s*)(\d+)(\s*\]\s*;)/i",function ($matches) use ($param){
            $mold = isset($param['mold']) && !empty($param['mold']) ? $param['mold'] : 'pc';
            return $matches[1].$mold.$matches[3].$param['name_id'].$matches[5];
        },$content);

        // 处理附件 变成全地址
        $content = preg_replace_callback("/(<(script|link|img).*?)(href|src)(\s*=\s*[\'\"])\s*((.*?)(css|js|images)(.*?))\s*([\'\"])/i",function ($matches) use ($param){
            if(substr($matches[5],0,4) == 'http' || substr($matches[5],0,2) == '//'){
                return $matches[0];
            }
            $path = substr($param['content_url'], 0,strrpos($param['content_url'], '/')+1);
            return $matches[1] . $matches[3] . $matches[4] . $path . $matches[7] . $matches[8] . $matches[9];
        },$content);

        return $content;
    }


    /**
     * 处理文件写入目录
     * @param $param
     * @param string $path
     * @return string
     */
    protected function getPath($param, $path = '')
    {
        return trim((isset($param['path']) && $param['path'] !=null) ? $param['path'] : $this->defaultPath , '/').'/' . ltrim($path,'/');
    }

    /**
     * 处理html 名称
     * @param $param
     * @return string
     */
    protected function getHtmlName($param)
    {
        return (isset($param['html_name']) && $param['html_name'] !=null) ? $param['html_name'] : $this->defaultHtmlName;
    }
}
/*路由*/
// 写入
Route::post('write','Controller@write');
App::response(Route::dispatch());