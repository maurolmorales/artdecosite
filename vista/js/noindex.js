let noIndex = ()=>{
	var meta1 = document.createElement("meta");
	meta1.setAttribute("name", "robots");
	meta1.setAttribute("content", "noindex");
	document.getElementsByTagName("head")[0].appendChild(meta1);
	var meta2 = document.createElement("meta");
	meta2.setAttribute("name", "googlebot");
	meta2.setAttribute("content", "noindex");
	document.getElementsByTagName("head")[0].appendChild(meta2);
};
noIndex();