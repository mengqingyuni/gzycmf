<?php
/**
 * 服务端
 * Created by server_socket.php.
 * User: gongzhiyang
 * Date: 18/12/3
 * Time: 6:55 下午
 */
//创建服务端的socket套接流,net协议为IPv4，protocol协议为TCP
/**
 *  socket_create($net参数1，$stream参数2，$protocol参数3)

　　　　作用：创建一个socket套接字，说白了，就是一个网络数据流。

　　　　返回值：一个套接字，或者是false，参数错误发出E_WARNING警告

　　　　php的在线手册那里说得更清楚：

　　　　socket_create创建并返回一个套接字，也称作一个通讯节点。一个典型的网络连接由 2 个套接字构成，一个运行在客户端，另一个运行在服务器端。

上面一句话是从php在线手册那里复制过来的。看到没有，这里说得意思是不是和我上面反反复复提到的客户端与服务端一模一样？呵呵。

　　　　参数1是：网络协议，

　　　　网络协议有哪些？它的选择项就下面这三个：

　　　　AF_INET：　　   IPv4 网络协议。TCP 和 UDP 都可使用此协议。一般都用这个，你懂的。

　　　　AF_INET6：　　 IPv6 网络协议。TCP 和 UDP 都可使用此协议。

　　　　AF_UNIX:    　　本地通讯协议。具有高性能和低成本的 IPC（进程间通讯）。

　　　　参数2：套接字流，选项有：

　　　　SOCK_STREAM　　SOCK_DGRAM　　SOCK_SEQPACKET　　SOCK_RAW　　SOCK_RDM。

　　　　这里只对前两个进行解释：

　　　　SOCK_STREAM　　TCP 协议套接字。

　　　　SOCK_DGRAM　　 UDP协议套接字。

　　　　欲了解更多请链接这里：http://php.net/manual/zh/function.socket-create.php

　　　　参数3：protocol协议，选项有：

　　　　SOL_TCP：　　TCP 协议。

　　　　SOL_UDP：　　UDP协议。

　　　　从这里可以看出，其实socket_create函数的第二个参数和第三个参数是相关联的。

　　　　比如，假如你第一个参数应用IPv4协议：AF_INET，然后，第二个参数应用的是TCP套接字：SOCK_STREAM，

　　　　那么第三个参数必须要用SOL_TCP，这个应该不难理解。
 */
$socket = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);

/*绑定接收的套接流主机和端口,与客户端相对应*/
/**
 * 作用：绑定一个套接字，返回值为true或者false

　　  参数1：socket_create的函数返回值

　　　　参数2：ip地址

　　　　参数3：端口号
 */
if (socket_bind($socket,'127.0.0.1',8182)==false){

	echo 'server bind fail:'.socket_strerror(socket_last_error());
	/*这里的127.0.0.1是在本地主机测试，你如果有多台电脑，可以写IP地址*/

}

//监听套接流

/**
 * 　　作用：监听一个套接字，返回值为true或者false

　　　　参数1：socket_create的函数返回值

　　　　参数2：最大监听套接字个数
 */

if (socket_listen($socket,4)==false) {
	echo 'server listen fail:'.socket_strerror(socket_last_error());
}

//让服务器无限获取客户端传过来的信息
do{
	/*接收客户端传过来的信息*/
	/**
	 * socket_accept($socket)

	　　作用：接收套接字的资源信息，成功返回套接字的信息资源，失败为false

	　 参数：socket_create的函数返回值


	 */

	$accept_resource = socket_accept($socket);

	if($accept_resource !== false){
		/*读取客户端传过来的资源，并转化为字符串*/
		/**
		 * 　socket_read($socket参数1,$length参数2)

		　　　　作用：读取套接字的资源信息，

		　　　　返回值：成功把套接字的资源转化为字符串信息，失败为false

		　　　  参数1：socket_create或者socket_accept的函数返回值

		　　　　参数2：读取的字符串的长度
		 */
		$string = socket_read($accept_resource,1024);
		echo 'server receive is :'.$string.PHP_EOL;//PHP_EOL为php的换行预定义常量

		if ($string!==false) {
			/*向socket_accept的套接流写入信息，也就是回馈信息给socket_bind()所绑定的主机客户端*/
			/**
			 * socket_write($socket参数1，$msg参数2，$strlen参数3)

			　　　　作用：把数据写入套接字中

			　　　　返回值：成功返回字符串的字节长度，失败为false

			　　　  参数1：socket_create或者socket_accept的函数返回值

			　　　　参数2：字符串

			　　　　参数3：字符串的长度
			 */
			$return_client = 'server receive is : '.$string.PHP_EOL;
			socket_write($accept_resource,$return_client,strlen($return_client));
			/*socket_write的作用是向socket_create的套接流写入信息，或者向socket_accept的套接流写入信息*/

		} else {
			echo 'socket_read is fail';
		}

		/*socket_close的作用是关闭socket_create()或者socket_accept()所建立的套接流*/
		socket_close($accept_resource);


	}else{
		echo 'socket_read is fail';
	}


}while(true);

socket_close($socket);
