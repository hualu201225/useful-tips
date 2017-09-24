<?php 
//使用curl模拟登陆获取页面信息
 
    function login_post($url, $cookie, $post){  
        $curl = curl_init($url);//初始化
        curl_setopt($curl, CURLOPT_URL, $url);//登录提交的地址 
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie); //设置Cookie信息保存在指定的文件中
        curl_setopt($curl, CURLOPT_POST, 1);//post方式提交              
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);//要提交的信息 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);//设置将获取到的信息返回，不输出
        $data = curl_exec($curl);//执行命令
        curl_close($curl);//关闭URL请求
    }
    function get_content($url, $cookie) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);//需要获取信息的页面
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//设置将获取到的信息返回，不输出
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //读取cookie
        $rs = curl_exec($ch); //执行cURL抓取页面内容
        curl_close($ch);
        return $rs;
    }
    //设置post数据
    $post = array(
            "username" => "13018901626",
            "password" => "Ths12138",
    );

    //登录地址
    $url = "http://mp.yidianzixun.com/sign_in?_rk=14914492618367";
    //cookie保存地址
    $cookie = '/tmp/cookie.txt';
    //登陆后需要获取的页面
    $url2 = 'http://mp.yidianzixun.com/model/Article?page=1&page_size=10&status=2%2C7&has_data=1&type=original&from_time=&to_time=&date=201704&title=&_rk=deffb31491464645190';
    // 模拟登录
    login_post($url, $cookie, $post);
    //获取登录页的信息
    $content = get_content($url2, $cookie);
	file_put_contents('yidian.php',$content);
	var_dump($content);
       
 ?>

