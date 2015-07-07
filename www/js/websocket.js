var WebChatPackage = function()
{
	var MAGIC_WORD = 0XA8E2;
	var msg_id = 0;
	var members = {};

	this.set_msg_id = function(msgid) {
		msg_id = msgid;
	},
	this.get_msg_id = function() {
		return msg_id;
	},
	this.set_member = function(member_key, member_data) {
		members[member_key] = member_data;
	},
	this.get_member = function(member_key) {
		return members[member_key];
	},
	this.get_binary_data = function() {
		//var output = [];
		var strmembers = {};
		var totallen = 6;
		for (var member_key in members) {
			strmembers[member_key] = JSON.stringify(members[member_key]);
			totallen += strmembers[member_key].length + 3;
		}

		var buffer = new ArrayBuffer(totallen);
		var dv = new DataView(buffer);
		dv.setUint16(0, msg_id, true);
		dv.setUint16(2, totallen-6, true);
		dv.setUint16(4, MAGIC_WORD, true);
		
		var offset = 6;
		var strlen = 0;
		var str = "";
		for (var member_key in strmembers) {
			dv.setUint8(offset, member_key.charCodeAt(0));
			offset++;
			str = strmembers[member_key];
			strlen = str.length;
			dv.setUint16(offset, strlen, true);
			offset += 2;
			for (var i = 0; i < strlen; i++) {
				dv.setUint8(offset + i, str.charCodeAt(i));
			}
//			dv.write(str, offset, strlen);
//			for (var i = 0; i < strlen; i++) {
//				output.push(str.charCodeAt(i));
//			}
			offset += strlen;
		}
		return buffer;
	};
};

var WebChat = function(url, agr){

	var $this = this;

	this.connect = function(wcpkg){

		if (typeof(MozWebSocket) == 'function') {
			$this.websocket = new MozWebSocket(url, agr);
		} else {
			$this.websocket = new WebSocket(url, agr);
		}

		this.websocket.onmessage = function (e) {
			alert(e.data);
		}

		this.websocket.onopen = function(){
			$this.websocket.send(wcpkg);
		}
		
		this.websocket.onclose = function(e){this.conn = null;}
        
        this.websocket.onerror = function(error) {
        	onsole.log('WebSocket Error ' + error);
        }
	}
	this.send = function(pkg) {
		this.websocket.send(pkg.get_binary_data());//2015.6.29,get_binary_data()还没有写好
		return this;
	}

    // function server_callback(json) {
    //     if (typeof json === 'object' && typeof json.cmd === 'string') {
    //         eval("protocol." + json.cmd + " && " + "protocol." + json.cmd + "(json)");
    //         return;
    //     }

    //     try {
    //         json = json.replace(/}{/g, '},{');
    //         json = eval('([' + json + '])');
    //         for (var i in json) {
    //             if (typeof json[i] !== 'object' || typeof json[i].cmd !== 'string') {
    //                 continue;
    //             }
    //             eval("protocol." + json[i].cmd + " && " + "protocol." + json[i].cmd + "(json[i])");
    //         }
    //     } catch (e) {
    //         //
    //     }
    // }
}




