function showMediaSelected(imgId, selectId, imgDir, extra, xoopsUrl, moduleUrl) {
	if (xoopsUrl == null) {
		xoopsUrl = "./";
	}
	imgDom = xoopsGetElementById(imgId);
	selectDom = xoopsGetElementById(selectId);

	if (selectDom.options[selectDom.selectedIndex].value.indexOf(".swf") != -1) {
		img = moduleUrl + "swf_icon.gif";
	} else {
		img = xoopsUrl + "/"+ selectDom.options[selectDom.selectedIndex].value;
	}
	imgDom.src = img + extra;
}