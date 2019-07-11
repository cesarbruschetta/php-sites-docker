/* Suckerfish
   http://alistapart.com/articles/dropdowns

   Modified to correct a nasty rendering bug specific to IE6

   Further Modified to account for multiple instances of the gallery on one page
	 Uses http://www.robertnyman.com/2005/11/07/the-ultimate-getelementsbyclassname/
			Written by Jonathan Snook, http://www.snook.ca/jonathan
			Add-ons by Robert Nyman, http://www.robertnyman.com

*/

function getElementsByClassName(oElm, strTagName, strClassName){
    var arrElements = (strTagName == "*" && oElm.all)? oElm.all : oElm.getElementsByTagName(strTagName);
    var arrReturnElements = new Array();
    strClassName = strClassName.replace(/\-/g, "\\-");
    var oRegExp = new RegExp("(^|\\s)" + strClassName + "(\\s|$)");
    var oElement;
    for(var i=0; i<arrElements.length; i++){
        oElement = arrElements[i];
        if(oRegExp.test(oElement.className)){
            arrReturnElements.push(oElement);
        }
    }
    return (arrReturnElements)
}

startGallery = function() {
  if (document.all && document.getElementById) {
  	galleries = getElementsByClassName(document, "div", "gallery");
  	for (x = 0; x < galleries.length; x++) {
  	  galleryRoot = galleries[x].childNodes;
  	  workingID = galleries[x].id;
  	  fullSize = document.getElementById(workingID).firstChild.childNodes.length;
  	  for (i = 0; i < fullSize; i++) {
  	  	node = document.getElementById(workingID).firstChild.childNodes[i];
  	  	if (node.nodeName=="LI") {
  	  		node.onmouseover=function() {
  	  			if(this.hasChildNodes()) {
  	  				myTarget = this.childNodes[2];
  	  				galleryContainer = document.getElementById(workingID);
  	  				totalWidth = galleryContainer.offsetWidth;
  	  				targetWidth = Math.floor(totalWidth * .94);
  	  				myTarget.style.width = targetWidth + 'px';
  	  			}
  	  			this.className+=" over";
  	  		}
  	  		node.onmouseout=function() {
  	  			this.className = this.className.replace(" over", "");
  	  		}
  	  	}
  	  }
  	}
  }
}

Event.observe(window, 'load', startGallery, false);
