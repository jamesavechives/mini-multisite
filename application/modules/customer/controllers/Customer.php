<?php

class Customer extends CI_Controller{
        private $site_id =0 ;
        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->site_id = is_numeric($this->uri->segment(1))?$this->uri->segment(1):2;
                $this->load->model('customer_model',NULL,FALSE,array('site_id'=>$this->site_id));
        }
        public function login()
        {
             /**
             * 小程序调用server获取token接口, 传入code, rawData, signature, encryptData.
             */
            $this->load->model('admin/admin_model');
            $site_info = $this->admin_model->get_site_detail($this->site_id);
            
            if(!isset($_GET["code"])&&!isset($_POST["code"])){
               //先检查skey是否一致，一致则代表已经登陆
                $skey = isset($_POST['session_key'])?$_POST['session_key']:$_GET['session_key'];
                $num = $this->customer_model->check_session($skey);
                $data['status']=0;
                $data['data']="";
                if($num==0){
                    $data['is_login']=0;
                }
                else{
                    $data['is_login']=1;
                }
                $this->output->set_output(json_encode($data));
            }
            else{
            /**
             * server调用微信提供的jsoncode2session接口获取openid, session_key, 调用失败应给予客户端反馈
             * , 微信侧返回错误则可判断为恶意请求, 可以不返回. 微信文档链接
             * 这是一个 HTTP 接口，开发者服务器使用登录凭证 code 获取 session_key 和 openid。其中 session_key 是对用户数据进行加密签名的密钥。
             * 为了自身应用安全，session_key 不应该在网络上传输。
             * 接口地址："https://api.weixin.qq.com/sns/jscode2session?appid=APPID&secret=SECRET&js_code=JSCODE&grant_type=authorization_code"
             */    
                $code = isset($_GET["code"])?$_GET["code"]:$_POST["code"];
                $params = [
                    'appid' => $site_info->appid,
                    'secret' => $site_info->secret_key,
                    'js_code' => $code,
                    'grant_type' => 'authorization_code'
                ];
                $res = makeRequest('https://api.weixin.qq.com/sns/jscode2session', $params);

                if ($res['code'] !== 200 || !isset($res['result']) || !isset($res['result'])) {
                    return json(ret_message('requestTokenFailed'));
                }
                $reqData = json_decode($res['result'], true);
                if (!isset($reqData['session_key'])) {
                    return $this->json($reqData);
                }
                $sessionKey = $reqData['session_key'];
                $openid = $reqData['openid'];
                //检查用户是否已经注册
                $num=$this->customer_model->check_customer($openid);
                if($num>0){
                    $skey = sha1($sessionKey . mt_rand());
                    //update 3rdSession_key in database
                    $update=[
                        'user_token'=>$skey,
                        'session_key'=>$sessionKey,
                        'update_time'   =>  intval(now()),
                            ];
                    $this->customer_model->update_session($update,$openid);
                    $data['is_login']=1;
                    $data['data']=$skey;
                    $this->output->set_output(json_encode($data));
                } else {
                    
                    $data['is_login']=2;
                    $this->output->set_output(json_encode($data));
                }
            }
        }
        public function login_user()
        {
            $this->load->model('admin/admin_model');
            $site_info = $this->admin_model->get_site_detail($this->site_id);
            
            $code = isset($_GET["code"])?$_GET["code"]:$_POST["code"];
            $params = [
                'appid' => $site_info->appid,
                'secret' => $site_info->secret_key,
                'js_code' => $code,
                'grant_type' => 'authorization_code'
            ];
            $res = makeRequest('https://api.weixin.qq.com/sns/jscode2session', $params);

            if ($res['code'] !== 200 || !isset($res['result']) || !isset($res['result'])) {
                return json(ret_message('requestTokenFailed'));
            }
            $reqData = json_decode($res['result'], true);
            if (!isset($reqData['session_key'])) {
                return $this->json($reqData);
            }
            $sessionKey = $reqData['session_key'];
            
            $encryptedData = isset($_POST["encryptedData"])?$_POST["encryptedData"]:$_GET["encryptedData"];
            $iv = isset($_POST["iv"])?$_POST["iv"]:$_GET["iv"];
            $skey = sha1($sessionKey . mt_rand());
            $decryptData = \openssl_decrypt(
                base64_decode($encryptedData),
                'AES-128-CBC',
                base64_decode($sessionKey),
                OPENSSL_RAW_DATA,
                base64_decode($iv)
            );
            $userinfo = json_decode($decryptData);

            // 储存到数据库中
            $db_data =[
                'user_token'    =>  $skey,
                'weixin_id'     =>  $userinfo->openId,
                'nickname'      =>  $userinfo->nickName,
                'cover_thumb'   =>  $userinfo->avatarUrl,
                'sex'           =>  $userinfo->gender,
                'province'      =>  $userinfo->province,
                'city'          =>  $userinfo->city,
                'country'       =>  $userinfo->country,
                'session_key'   =>  $sessionKey,
                'update_time'   =>  intval(now()),
            ];
            $this->customer_model->create_customer($db_data);
            $data['data']['user_info']=$userinfo;
            $data['data']['session_key']=$skey;
            $this->output->set_output(json_encode($data));
        }
        public function get_user_info()
        {
            $skey = isset($_GET['session_key'])?$_GET['session_key']:$_POST['session_key'];
            $users=$this->customer_model->get_customer_info(array('user_token'=>$skey));
            if(isset($users[0])){
                $data['status']=0;
                $users[0]['session_key']="";
                $data['data']=$users[0];
            }
            else{
                $data['status']=2;
            }
            $this->output->set_output(json_encode($data));
        }
        public function home()
        {
            $this->load->view('customer/customer_form');
        }
        
        public function insert()
        {
            $data = array();
            foreach($_GET as $k=>$v){
                if($k!='format'){
                    $data[$k] = $v;
                }
            }
            if($data !== null){
               $id = $this->customer_model->create_customer($data);
               if(is_numeric($id)&&$id>0){
                   $this->output->set_output("success!");
               }
            }
        }
}

/**
 * 返回信息
 * @param $message
 * @return array
 */
function ret_message($message = "") {
    if ($message == "") return ['result'=>0, 'message'=>''];
    $ret = lang($message);

    if (count($ret) != 2) {
        return ['result'=>-1,'message'=>'未知错误'];
    }
    return array(
        'result'  => $ret[0],
        'message' => $ret[1]
    );
}

/**
 * 发起http请求
 * @param string $url 访问路径
 * @param array $params 参数，该数组多于1个，表示为POST
 * @param int $expire 请求超时时间
 * @param array $extend 请求伪造包头参数
 * @param string $hostIp HOST的地址
 * @return array    返回的为一个请求状态，一个内容
 */
function makeRequest($url, $params = array(), $expire = 0, $extend = array(), $hostIp = '')
{
    if (empty($url)) {
        return array('code' => '100');
    }

    $_curl = curl_init();
    $_header = array(
        'Accept-Language: zh-CN',
        'Connection: Keep-Alive',
        'Cache-Control: no-cache'
    );
    // 方便直接访问要设置host的地址
    if (!empty($hostIp)) {
        $urlInfo = parse_url($url);
        if (empty($urlInfo['host'])) {
            $urlInfo['host'] = substr(DOMAIN, 7, -1);
            $url = "http://{$hostIp}{$url}";
        } else {
            $url = str_replace($urlInfo['host'], $hostIp, $url);
        }
        $_header[] = "Host: {$urlInfo['host']}";
    }

    // 只要第二个参数传了值之后，就是POST的
    if (!empty($params)) {
        curl_setopt($_curl, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($_curl, CURLOPT_POST, true);
    }

    if (substr($url, 0, 8) == 'https://') {
        curl_setopt($_curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($_curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    }
    curl_setopt($_curl, CURLOPT_URL, $url);
    curl_setopt($_curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($_curl, CURLOPT_USERAGENT, 'API PHP CURL');
    curl_setopt($_curl, CURLOPT_HTTPHEADER, $_header);

    if ($expire > 0) {
        curl_setopt($_curl, CURLOPT_TIMEOUT, $expire); // 处理超时时间
        curl_setopt($_curl, CURLOPT_CONNECTTIMEOUT, $expire); // 建立连接超时时间
    }

    // 额外的配置
    if (!empty($extend)) {
        curl_setopt_array($_curl, $extend);
    }

    $result['result'] = curl_exec($_curl);
    $result['code'] = curl_getinfo($_curl, CURLINFO_HTTP_CODE);
    $result['info'] = curl_getinfo($_curl);
    if ($result['result'] === false) {
        $result['result'] = curl_error($_curl);
        $result['code'] = -curl_errno($_curl);
    }

    curl_close($_curl);
    return $result;
}

/**
 * 读取/dev/urandom获取随机数
 * @param $len
 * @return mixed|string
 */
function randomFromDev($len) {
    $fp = @fopen('/dev/urandom','rb');
    $result = '';
    if ($fp !== FALSE) {
        $result .= @fread($fp, $len);
        @fclose($fp);
    }
    else
    {
        trigger_error('Can not open /dev/urandom.');
    }
    // convert from binary to string
    $result = base64_encode($result);
    // remove none url chars
    $result = strtr($result, '+/', '-_');

    return substr($result, 0, $len);
}
