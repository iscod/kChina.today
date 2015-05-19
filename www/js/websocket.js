		// websocrt尽在html支持时

		var connention = new WebSocket('/daemon/websocrt', ['soap'], ['xmpp'])

		// 如果连接打开推送一条消息
		connention.onopen = function() {
			connention.send('Ping')
		}

		// log error
		connention.onerror = function () {
			connention.log('WebSocket Error' + error);
		}

		// 服务器日志消息
		connention.onmessage = function (e) {
			console.log('Server: ' + e.data);
		}