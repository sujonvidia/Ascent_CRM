/***********************************************************************************
* Add Array.indexOf                                                                *
***********************************************************************************/
(function ()
{
	if (typeof Array.prototype.indexOf !== 'function')
	{
		Array.prototype.indexOf = function(searchElement, fromIndex)
		{
			for (var i = (fromIndex || 0), j = this.length; i < j; i += 1)
			{
				if ((searchElement === undefined) || (searchElement === null))
				{
					if (this[i] === searchElement)
					{
						return i;
					}
				}
				else if (this[i] === searchElement)
				{
					return i;
				}
			}
			return -1;
		};
	}
})();
/**********************************************************************************/

(function ($,undefined)
{
	var toasting =
	{
		gettoaster : function ()
		{
			var toaster = $('#' + settings.toaster.id);

			if(toaster.length < 1)
			{
				toaster = $(settings.toaster.template).attr('id', settings.toaster.id).css(settings.toaster.css).addClass(settings.toaster['class']);

				if ((settings.stylesheet) && (!$("link[href=" + settings.stylesheet + "]").length))
				{
					$('head').appendTo('<link rel="stylesheet" href="' + settings.stylesheet + '">');
				}

				$(settings.toaster.container).append(toaster);
			}

			return toaster;
		},

		notify : function (title, message, priority,tid,proid,taskid)
		{
			var $toaster = this.gettoaster();
			var $toast  = $(settings.toast.template.replace('%priority%', priority)).hide().css(settings.toast.css).addClass(settings.toast['class']);
			

			$('.title', $toast).css(settings.toast.csst).html(title).attr('data-tid',tid).attr('data-proid',proid).attr('data-taskid',taskid);
			$('.message', $toast).css(settings.toast.cssm).html(message);
			//console.log($('.tid', $toast));
			//$('.tid', $toast).attr('data-id',tid);

			if ((settings.debug) && (window.console))
			{
				console.log(toast);
			}

			$toaster.append(settings.toast.display($toast));

			if (settings.donotdismiss.indexOf(priority) === -1)
			{
				var timeout = (typeof settings.timeout === 'number') ? settings.timeout : ((typeof settings.timeout === 'object') && (priority in settings.timeout)) ? settings.timeout[priority] : 1500;
				setTimeout(function()
				{
					settings.toast.remove($toast, function()
					{
						$toast.remove();
					});
				}, timeout);
			}
		}
	};

	var defaults =
	{
		'toaster'         :
		{
			'id'        : 'toaster',
			'container' : 'body',
			'template'  : '<div></div>',
			'class'     : 'toaster',
			'css'       :
			{
				'position' : 'fixed',
				'top'      : '50px',
				'right'    : '10px',
				'width'    : '350px',
				'zIndex'   : 50000
			}
		},

		'toast'       :
		{
			'template' :
			'<div class="alert alert-%priority% alert-dismissible tid" role="alert">' +
					// '<button type="button" class="close" data-dismiss="alert">' +
					// 	'<span aria-hidden="true">&times;</span>' +
					// 	'<span class="sr-only">Close</span>' +
					// '</button>' +
					'<span class="title"></span>: <div class="message"></div>' +
					'<span>'+
						'<button onclick="toastApprove(this)" style="margin:2px" type="button" class="btn btn-success btn-xs" data-dismiss="alert">Approve</button>' +
						'<button onclick="toastReject(this)" style="margin:2px" type="button" class="btn btn-danger btn-xs" data-dismiss="alert">Reject</button>' +
					'</span>'+
					'<span style="float:right">'+
						'<button onclick="toastApproveAll(this)" style="margin:2px" type="button" class="btn btn-success btn-xs" data-dismiss="alert">Approve All</button>' +
						'<button onclick="toastRejectAll(this)" style="margin:2px" type="button" class="btn btn-danger btn-xs" data-dismiss="alert">Reject All</button>' +
					'</span>'+
			'</div>',

			'css'      : {},
			'cssm'     : {},
			'csst'     : { 'fontWeight' : 'bold' },

			'fade'     : 'slow',

			'display'    : function ($toast)
			{
				return $toast.fadeIn(settings.toast.fade);
			},

			'remove'     : function ($toast, callback)
			{
				return $toast.animate(
					{
						opacity : '0',
						padding : '0px',
						margin  : '0px',
						height  : '0px'
					},
					{
						duration : settings.toast.fade,
						complete : callback
					}
				);
			}
		},

		'debug'        : false,
		'timeout'      : 1500,
		'stylesheet'   : null,
		'donotdismiss' : ['warning']
	};

	var settings = {};
	$.extend(settings, defaults);

	$.toaster = function (options)
	{
		if (typeof options === 'object')
		{
			if ('settings' in options)
			{
				settings = $.extend(settings, options.settings);
			}

			var tid    = ('tid' in options) ? options.tid : 'tid';
			var proid    = ('proid' in options) ? options.proid : 'proid';
			var taskid    = ('taskid' in options) ? options.taskid : 'taskid';
			var title    = ('title' in options) ? options.title : 'Notice';
			var message  = ('message' in options) ? options.message : null;
			var priority = ('priority' in options) ? options.priority : 'success';

			if (message !== null)
			{
				toasting.notify(title, message, priority,tid,proid,taskid);
			}
		}
	};

	$.toaster.reset = function ()
	{
		settings = {};
		$.extend(settings, defaults);
	};
})(jQuery);
