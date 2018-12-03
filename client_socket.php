<?php
/**
 *
 * Created by client_socket.php.
 * User: gongzhiyang
 * Date: 18/12/3
 * Time: 7:16 下午
 */

//创建一个socket套接流

$socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
/**
 * socket_set_option($socket参数1 ，$level 参数2，$optname 参数3，$optval 参数4)

这个函数的作用是给套接字设置数据流选项，还是一个很重要的函数。

参数1：socket_create或者socket_accept的函数返回值

参数2：SOL_SOCKET，好像只有这个选项

参数3与参数4是相关联的，

参数3可为：SO_REUSEADDR　　SO_RCVTIMEO     S0_SNDTIMEO

解释一下：

SO_REUSEADDR　　是让套接字端口释放后立即就可以被再次使用

　　　　　　　　参数3假如是这个，则参数4可以为true或者false

SO_RCVTIMEO　　 是套接字的接收资源的最大超时时间

SO_SNDTIMEO　　　是套接字的发送资源的最大超时时间

　　参数3假如是这两个，则参数4是一个这样的数组array('sec'=>1,'usec'=>500000)

　　数组里面都是设置超时的最大时间，不过，一个是秒为单位，一个是微秒单位，作用都一样


 */
//接收套接流的最大超时时间1秒，后面是微秒单位超时时间，设置为零，表示不管它 服务端返回客户端
socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array("sec" => 60, "usec" => 0));
//发送套接流的最大超时时间为6秒 客户端发送服务端
socket_set_option($socket, SOL_SOCKET, SO_SNDTIMEO, array("sec" => 60, "usec" => 0));
//连接服务端的套接流，这一步就是使客户端与服务器端的套接流建立联系
if (socket_connect($socket,'localhost',8182)==false) {

	echo 'connect fail massege:'.socket_strerror(socket_last_error());

} else {
	$message = 'l love you 我爱你 socket';
	//向服务端写入字符串信息

	if (socket_write($socket,$message,strlen($message))==false) {

		echo 'connect fail massege:'.socket_strerror(socket_last_error());

	} else {

		//echo 'client write success'.PHP_EOL;
		//读取服务端返回来的套接流信息
		while($callback = socket_read($socket,1024)){
			echo 'server return message is:'.PHP_EOL.$callback;
		}

	}
}

socket_close($socket);//工作完毕，关闭套接流