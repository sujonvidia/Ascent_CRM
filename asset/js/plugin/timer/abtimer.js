;(function($) {

    $.abtimer = function(element, options) {
        var defaults = {
            abtimer_hour: 0,
            abtimer_minute: 0,
            abtimer_second: 0,
            abtimer_total_second: 0,
            onStop: function() {}
        }

        var plugin = this;

        plugin.settings = {}

        var $element = $(element),
             element = element;

        plugin.init = function() {
            plugin.settings = $.extend({}, defaults, options);
            var intervalid = setInterval(function(){ st_private_method(); }, 1000);
            var elementid = $(element).attr("id");
            $("#push"+elementid).attr("onclick", "pushtimer("+elementid+", "+intervalid+")");
        }

        plugin.st_public_method = function(sst) {
            // code goes here
            clearInterval(sst);
        }

        plugin.st_init_again = function(h,m,s,total) {
            plugin.settings = $.extend({}, defaults, options);
            plugin.settings.abtimer_hour = h;
            plugin.settings.abtimer_minute = m;
            plugin.settings.abtimer_second = s;
            plugin.settings.abtimer_second = s;
            plugin.settings.abtimer_total_second = total;
            var intervalid = setInterval(function(){ st_private_method(); }, 1000);
            var elementid = $(element).attr("id");
            $("#push"+elementid).attr("onclick", "pushtimer("+elementid+", "+intervalid+")");
        }
        
        function pad(d) {
            var s = (d < 10) ? '0' + d.toString() : d.toString();
            return (s == "000") ? "00" : s.toString();
        }

        var st_private_method = function() {
            plugin.settings.abtimer_second++;
            plugin.settings.abtimer_total_second++;
            if(plugin.settings.abtimer_second>59){plugin.settings.abtimer_minute++; plugin.settings.abtimer_second=0;}
            if(plugin.settings.abtimer_minute>59){plugin.settings.abtimer_hour++; plugin.settings.abtimer_minute=0;}
            var customText = pad(plugin.settings.abtimer_hour) + ":" + pad(plugin.settings.abtimer_minute) + ":" + pad(plugin.settings.abtimer_second);
            var elementid = $(element).attr("id");
            $("#hour"+elementid).text((plugin.settings.abtimer_total_second/3600).toFixed(2));
            $(element).text(customText);
        }

        plugin.init();
    }

    $.fn.abtimer = function(options) {

        return this.each(function() {
            if (undefined == $(this).data('abtimer')) {
                var plugin = new $.abtimer(this, options);
                $(this).data('abtimer', plugin);
            }
        });

    }

})(jQuery);