<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if( ! function_exists('ckeditor')){
    /*
     *  name是创建的textarea的name名字
     *  type是工具栏调用功能，如果为空的话调用全部
     *  content是编辑器默认显示的内容，默认为空
     */
    function ckeditor($name='content',$type = array(0,3,2,1),$content = ''){
        $CI =& get_instance();  
        $config = $CI->config->config;      //取得配置文件中的配置信息
        if(!empty($config['ckeditorPath'])){
            $ckeditorPath = base_url().$config['ckeditorPath'];     //ckeditor路径
        }
        if(!empty($config['ckfinderPath'])){
            $ckfinderPath = base_url().$config['ckfinderPath'];     //ckfinder路径
        }
        if(!empty($config['editor_config'])){
            $editor_config = $config['editor_config'];              //配置文件
        }else{
            $editor_config = '';
        }
        if(!empty($config['toolbar_Full'])){                        //头部功能建设置
            if(is_array($type) && count($type) > 0){
                 foreach($type as $k => $v){
                    $editor_config['toolbar_Full'][] = $config['toolbar_Full'][$v];
                 }
            }else{
                $editor_config['toolbar_Full'] = '';
                $editor_config['toolbar'] = 'Full';
            }
        }else{
            $editor_config['toolbar'] = 'Full';
        }
        $CI->load->library('ckeditor');                     //导入application/library/ckeditor.php文件
        $CI->load->library('ckfinder');                     //导入application/library/ckfinder.php文件
        $CI->ckfinder->BasePath = $ckfinderPath;            //初始化ckfinder路径
        $CI->ckeditor->returnOutput = true;                 //设置返回输出
        $CI->ckeditor->basePath = $ckeditorPath;            //初始化ckeditor路径
        
        $CI->ckfinder->SetupCKEditor($CI->ckeditor,$ckfinderPath);  //ckfinder中自带集成ckeditor函数
        $ckeditor = $CI->ckeditor->editor($name,$content,$editor_config);   //生成ckeditor编辑器，带上传文件功能
        return $ckeditor;
    }
}
?>