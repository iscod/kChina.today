/**
 *alert for kc
 *请尽量少使用弹窗这种交互方式
*/
var art = {
	dialog : function (config) {
		this.config = config;
		var opt = $.extend({}, this._defaults, this.config);
		this._creatLayer(opt);
	},
	//默认参数
	_defaults: {
		type: null, //消息标题图标
		title: "确定", //标题默认提示
		icon: "info", //消息图标
		content: "", //消息内容
		okval: '确定', //确认按钮文本
		cancelval: '取消', //取消按钮文本
		ok: null, //确认按钮回调函数
		close: null, //取消按钮回调函数
		width: 0,
		height: 0,
		background: "#000", //背景颜色
		opacity: 0.3, //背景透明度
		duration: "normal", 
		showTitle: true,
		escClose: true,
		popMaskClose: false,
		drag: true, //是否允许用户拖动文字
		dragOpacity: 1,
		popType: "alert", //采取的方式默认是警告窗
	},
	//获取样式
	_defaultHtml : function (opt) {
		//弹窗的基本样式
		var wrap = "<div class='popMain'>";
		wrap += "<div class='popTitle'>"
			+ (opt.type !== null && opt.type !== "" ? "<img class='icon' src='" +opt.type + "' />" : "");
			wrap += "<span class='text'>" + opt.title + "</span><span class='close'>&times;</span></div>"
			wrap += "<div class='popContent'>";
			wrap += "<div class='layer_img'></div>";
			wrap += "<div class='layer_msg'><p>" + opt.content + "</p></div>";
			wrap += "<div class='popbutton'><button id='simplePopBtnSure'>" + opt.okval + "</button>";
				if (opt.popType == 'confirm') {
					wrap += '<button id="SimplePopBtncancel">' + opt.cancelval + "</button>";
				}
			wrap += "</div>";
			wrap += "</div>";
		wrap += "</div>";
		return wrap;
	},
	_creatLayer : function (opt) {
		var self = this;
		$(".popMask").empty().remove();
		$(".popMain").empty().remove();
		$("body").append("<div class='popMask'></div>");
		var $mask = $(".popMask");
		$mask.css({
			"background-color": opt.background,
			filter: "alpha(opacity=" + opt.opacity * 100 + ")",
			"-moz-opacity": opt.opacity,
			opacity: opt.opacity
		});
		opt.popMaskClose &&
			$mask.bind("click", function() {
				self._closeLayer()
			});
		opt.escClose && $(document).bind("keyup", function(e) {
			try {
				e.keyCode == 27 && self._closeLayer()
			} catch (f) {
				self._closeLayer()
			}
		});
		$mask.fadeIn(opt.duration);

		//弹窗的基本样式
		var wrap = self._defaultHtml(opt);

		$("body").append(wrap);
		var $popMain = $(".popMain");
		$popMain.find('.layer_img').addClass(opt.icon + '_icon');//图片

		var $popTitle = $(".popTitle");
		var $popContent = $(".popContent");
		opt.showTitle ? $popTitle.show() : $popTitle.hide();
		opt.width !== 0 && $popTitle.width(opt.width);
		$(".popTitle .close").bind("click", function() {
			$mask.fadeOut(opt.duration);
			$popMain.fadeOut(opt.duration);
			$popMain.attr("isClose", "1");
			opt.type == "container" && $(opt.targetId).empty().append(opt.content);
		});
		opt.width !== 0 && $popContent.width(opt.width);
		opt.height !== 0 && $popContent.height(opt.height);
		$popMain.css({
			left: $(window).width() / 2 - $popMain.width() / 2 + "px",
			top: $(window).height() / 2 - $popMain.height() / 2 + "px"
		});
		$(window).resize(function() {
			$popMain.css({
				left: $(window).width() / 2 - $popMain.width() / 2 + "px",
				top: $(window).height() / 2 - $popMain.height() / 2 + "px"
			})
		});
		opt.drag && this._drag(opt.dragOpacity)

		switch (opt.popType) {
			case "alert":
				//警告
				$popMain.fadeIn(opt.duration, function() {
					$popMain.attr("style", $popMain.attr("style").replace("FILTER:", ""))
				});
				$("#simplePopBtnSure").bind("click", function() {
					self._closeLayer()
					if (opt.ok != null && opt.ok != '') {
						opt.ok();
					}
				});
				break;
			case "dialog":
				//对话框
				$popMain.fadeIn(opt.duration, function() {
					$popMain.attr("style", $popMain.attr("style").replace("FILTER:", ""))
				});
				$("#simplePopBtnSure").bind("click", function() {
					self._closeLayer()
					opt.callback();
				});
				break;
			case "confirm":
				//确认
				$popMain.fadeIn(opt.duration, function() {
					$popMain.attr("style", $popMain.attr("style").replace("FILTER:", ""))
				});
				$("#simplePopBtnSure").bind("click",
					function() {
						self._closeLayer()
						if (opt.ok != null && typeof(opt.ok) == 'function') {
							opt.ok();
						}
					});
				$("#SimplePopBtncancel").bind("click", function() {
					self._closeLayer()
					if (opt.close != null && typeof(opt.close) == 'function') {
						opt.close();
					}
					
				});
				break;
			case "prompt":
				//提示
				$popMain.fadeIn(opt.duration, function() {
					$popMain.attr("style", $popMain.attr("style").replace("FILTER:", ""))
				});
				$("#simplePopBtnSure").bind("click",
					function() {
						opt.confirm($(".layer_msg input").val())
						self._closeLayer()
					});
				$("#SimplePopBtncancel").bind("click", function() {
					opt.cancel()
					self._closeLayer()
				});
				break;
			default:
				break;
		}
	},
	_closeLayer: function() {
		$(".popTitle .close").triggerHandler("click")
	},
	_drag: function(d) {
		var isDown = false,
			b, g;
		$(".popTitle").bind("mousedown", function(e) {
			if ($(".popMain:visible").length > 0) {
				isDown = true;
				b = e.pageX - parseInt($(".popMain").css("left"), 10);
				g = e.pageY - parseInt($(".popMain").css("top"), 10);
				$(".popTitle").css({
					cursor: "move"
				})
			}
		});
		$(document).bind("mousemove", function(e) {
			if (isDown && $(".popMain:visible").length > 0) {
				d != 1 && $(".popMain").fadeTo(0, d);
				var f = e.pageX - b;
				e = e.pageY - g;
				if (f < 0) f = 0;
				if (f > $(window).width() - $(".popMain").width()) f = $(window).width() - $(".popMain").width() - 2;
				if (e <
					0) e = 0;
				if (e > $(window).height() - $(".popMain").height()) e = $(window).height() - $(".popMain").height() - 2;
				$(".popMain").css({
					top: e,
					left: f
				})
			}
		}).bind("mouseup", function() {
			if ($(".popMain:visible").length > 0) {
				isDown = false;
				d != 1 && $(".popMain").fadeTo(0, 1);
				$(".popTitle").css({
					cursor: "auto"
				})
			}
		})
	}

}