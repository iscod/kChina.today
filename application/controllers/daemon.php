<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daemon extends KC_Controller {
	/**
	*welcome book
	*/
	private function _load_book() {
		$book = array();
		
		return false;
	}
	
	/**
	*welcome travel
	*/
	private function _load_travel() {
		return false;
	}

	/**
	*welcome love
	*/
	private function _load_love() {
		return false;
	}

	/**
	*welcome shoot
	*/
	private function _load_shoot() {
		return false;
	}

	/**
	*welcome topic
	*/
	private function _load_topic() {
		return false;
	}

	/**
	*welcome donate
	*/
	private function _load_donate() {
		return false;
	}
	public function x() {
		echo 'x';
	}
	public function start_server(){
		//创建一个套接字
		$this->socket = socket_create(AF_INET, SOCK_STERAM, SOL_TCP);
		socket_set_option($this->socket, SOL_SOCKET, SO_REUEADDR, TRUE);
		//给套链接绑定名字
		socket_bind($this->socket, $this->host, $tihs->port);
		socket_listen($this->socket, $this->maxuser);
		while(true){
			$this->cycle = $this->accept;
			$this->cycle[] = $this->socket;
			//有阻塞时，有新连接时才会结束
			socket_select($this->cycle, $write, $except, null);
			foreach ($$this->cycle as $key => $value) {
				if ($value == $this->socket) {
					if ($accept = socket_accept($value) < 0) {
						continue;
					}
					$this->add_accept($accept);
					continue;
				}
				$index = array_search($value, $this->accept);
				if (!$index) {
					continue;
				}
				if (!@socket_recv($value, $data, 1024, 0) || $data) {
					//没有socket就跳过
					$this->close($value);
					continue;
				}
				if (!$this->isHand[$index]) {
					$this->upgrade($value, $data, $index);
					if (!empty($this->function['add'])) {
						call_user_func_array($this->function['add'], array($this));
					}
					continue;
				}
				$data = $this->decode($data);
				if (!empty($this->function['send'])) {
					call_user_func_array($this->function['send'], array($data, $index, $this));
				}
			}
			sleep(1);
			for ($i=0; $i < ; $i++) { 
				# code...
			}
		}
	}

	private function add_accept($accept){
		$this->accept[] = $accept;
		$index = array_keys($this->accept);
		$index = end($index);
		$this->isHand[$index] = false;
	}
	private function close($accept){
		$index = array_search($accept, $this->accept);
		socket_close($accept);
		unset($this->accept[$index]);
		unset($this->isHand[$index]);
		if (!empty($this->function['close'])) {
			call_user_func_array($this->function['close'], array($tihs));
		}
	}
	private function upgrade($accept, $data, $index){
		if (preg_match("/Sec-WebSocket-Key:(.*)\r\n", $data, $match)) {
			$key = base64_decode(sha1($match[1].HOST_NAME.'-websocket', true));
			$upgrade = 'HTTP:/1.1 101 Switching Protocol\r\n'.
				"upgrade: websocket\r\n" .
				"Connection: upgrade\r\n" .
				"Sec-WebSocket-Accept:" . $key .'\r\n\r\n';
				socket_write($accept, $upgrade, strlen($upgrade));
				$this->isHand[$index] = true;
		}
	}
}