function setCookie(c_name,value,exdays){
	var exdate=new Date();
	exdate.setDate(exdate.getDate() + exdays);
	var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
	document.cookie=c_name + "=" + c_value + "; path=/";
}
function getCookie(c_name){
	var i,x,y,ARRcookies=document.cookie.split(";");
	for (i=0;i<ARRcookies.length;i++){
		x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
		y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
		x=x.replace(/^\s+|\s+$/g,"");
		if (x==c_name){
			return unescape(y);
		}
	}
}
function cookiesInfo() {
	cookie = getCookie('cookie_policies_info');
	if(cookie == 'accepted_by_user') return;
	var divTag = document.createElement("div"); 
	divTag.id = "cookies_info"; 
	divTag.innerHTML = "<div class='d-flex flex-column flex-md-row align-items-center gap-3 py-15 px-4'><div class='color-gray-600'>Akceptuję <a href='#' class='link-gray-600 link-underline'>politykę plików cookies</a></div><div><button class='btn btn-primary text-md py-2 px-4 d-flex align-items-center' type='button' onClick='setCookie(\"cookie_policies_info\", \"accepted_by_user\", \"365\"); document.getElementById(\"cookies_info\").style.display = \"none\";'><span class=\"d-flex me-2\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\"><path d=\"M7.9585 14.9998L3.2085 10.2498L4.396 9.06234L7.9585 12.6248L15.6043 4.979L16.7918 6.1665L7.9585 14.9998Z\" fill=\"white\"/></svg></span> Akceptuję</button></div></div>";
	document.body.appendChild(divTag); 
}
window.onload=function(){ cookiesInfo(); };