/**
* jQuery LinkColor Plugin 1.0
*
* http://www.9lessons.info/
* 
* Copyright (c) 2012 Arun Kumar Sekar and Srinivas Tamada
*/

(function($){	
	$.fn.emotions = function(options){
		$this = $(this);
		var opts = $.extend({}, $.fn.emotions.defaults, options);
		return $this.each(function(i,obj){
			var o = $.meta ? $.extend({}, opts, $this.data()) : opts;					   	
			var x = $(obj);
			// Entites Encode 
			var encoded = [];
			for(i=0; i<o.s.length; i++){
				encoded[i] = String(o.s[i]).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
			}
			for(j=0; j<o.s.length; j++){
				var repls = x.html();
				if(repls.indexOf(o.s[j]) || repls.indexOf(encoded[j])){
					var imgr = o.a+o.b[j]+"."+o.c;			
					var rstr = "<img src='"+imgr+"' border='0' />";	
					x.html(repls.replace(o.s[j],rstr));
					x.html(repls.replace(encoded[j],rstr));
				}
			}
		});
	}	
	// Defaults
	$.fn.emotions.defaults = {
		a : "emotion/",			// Emotions folder
		b : new Array("smile", "smile-big", "sad", "crying", "tongue", "shock", "angry", "confused", "wink", "embarrassed", "disapointed", "sick", "shut-mouth", "sleepy", "eyeroll", "thinking", "lying", "glasses-nerdy", "teeth", "angel", "bye", "clap", "hug-left", "hug-right", "party", "good", "bad", "highfive", "love", "love-over", "tv", "mail", "brb", "rain", "pizza", "coffee", "computer", "beer", "drink", "cat", "dog", "sun", "star", "clock", "present", "mobile", "musical-note", "boy", "girl", "cake", "car"),			// Emotions Type
		s : new Array(":)", ":D", ":(", ":'(", ":p", ":o", ":@", ":s", ";)", ":$", ":|", "+o(", ":-#", "|-)", "8-)", ":\ ", ":--)", "8-|", "8o|", "(A)", "(bye)", "(clap)", "({)", "(})", "<:o)", "(Y)", "(N)", "(hi5)", "<3", "(U)", "(tv)", "(mail)", "(brb)", "(rain)", "(pi)", "(C)", "(comp)", "(B)", "(D)", "(@)", "(&)", "(#)", "(*)", "(O)", "(G)", "(mp)", "-8", "(Z)", "(X)", "(^)", "(car)"),
		c : "png"					// Emotions Image format
	};
})(jQuery);


// Notes
// a - icon folder
// b - emotions name array
// c - image format
// x - current selector
// d - type of selector
// o - options 
