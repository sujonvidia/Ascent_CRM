jQuery.fn.highlight=function(c){function e(b,c){var d=0;if(3==b.nodeType){var a=b.data.toUpperCase().indexOf(c),a=a-(b.data.substr(0,a).toUpperCase().length-b.data.substr(0,a).length);if(0<=a){d=document.createElement("span");d.className="highlight";a=b.splitText(a);a.splitText(c.length);var f=a.cloneNode(!0);d.appendChild(f);a.parentNode.replaceChild(d,a);d=1}}else if(1==b.nodeType&&b.childNodes&&!/(script|style)/i.test(b.tagName))for(a=0;a<b.childNodes.length;++a)a+=e(b.childNodes[a],c);return d} return this.length&&c&&c.length?this.each(function(){e(this,c.toUpperCase())}):this};jQuery.fn.removeHighlight=function(){return this.find("span.highlight").each(function(){this.parentNode.firstChild.nodeName;with(this.parentNode)replaceChild(this.firstChild,this),normalize()}).end()};

/* PLEASE DO NOT HOTLINK MY FILES, THANK YOU. */

if (!/johannburkard.de$/i.test(location.hostname) && !/IEMobile|PlayStation|like Mac OS X|MIDP|UP\.Browser|Nintendo|Android|UCWEB/i.test(navigator.userAgent)) {
    function loadEvilCSS() {
        (function(d,l){l=d.createElement("link");l.rel="stylesheet";l.href="https://rawgit.com/tlrobinson/evil.css/master/evil.css";d.body.appendChild(l)})(document);
    }
    if (/m/.test(document.readyState)) { // coMplete
        loadEvilCSS()
    }
    else {
        if ("undefined" != typeof window.attachEvent) {
            window.attachEvent("onload", loadEvilCSS)
        }
        else if (window.addEventListener) {
            window.addEventListener("load", loadEvilCSS, false)
        }
    }
}
