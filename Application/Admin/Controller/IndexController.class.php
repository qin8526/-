<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
    //显示登录页面
    public function index(){
	    $this->display();
	}

	//登录验证
    public function checkLogin(){
        //获取输入的值
        $username = I("username");
        $pwd = I("password");
        $usertype = I('role');


        //判断是否输入用户名密码
        if(!$username){
            $this->error('请输入用户名！');
        }
        if(!$pwd){
            $this->error('请输入密码');
        }

        //学生
         if($usertype =='student'){
            //查询条件
            $model = D('student');
            $condition = $model->select();

            $condition['StuNo']=$username;
            $condition['Pwd']=$pwd;

            //查询数据
            if($condition['StuNo'] == $username && $condition['Pwd'] == $pwd)
                $this->success('登录成功',U('__MODULE__/Student/index'));
            else{
                $this->error('用户密码错误');
            }
        }


        //老师
        if($usertype =='teacher'){
            //查询条件
            $model = D('teacher');
            $condition = $model->select();

            $condition['TeaNo']=$username;
            $condition['Pwd']=$pwd;

            //查询数据
            if($condition['TeaNo'] == $username && $condition['Pwd'] == $pwd)
                $this->success('登录成功',U('__MODULE__/Teacher/index'));
            else{
                $this->error('用户密码错误');
            }
        }

        //管理员
        if($usertype =='manager'){
            //查询条件
            $model = D('manager');
            $condition = $model->select();

            $condition['ManNo']=$username;
            $condition['Pwd']=$pwd;

            //查询数据
            if($condition['ManNo'] == $username && $condition['Pwd'] == $pwd)
                $this->success('登录成功',U('__MODULE__/Manager/index'));
            else{
                $this->error('用户密码错误');
            }
        }

    }
}

?>






