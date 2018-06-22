var fav = function(e) {
	var src = e.target.getAttribute("src");
	console.log(src);
	if(src === '../ressources/icons/unfavorit.png') {
		e.target.setAttribute("src", '../ressources/icons/favorit.png');
	} else {
		e.target.setAttribute("src", '../ressources/icons/unfavorit.png');
	}
}

var li = function(e) {
	var src = e.target.getAttribute("src");
	console.log(src);
	if(src === '../ressources/icons/add.png') {
		e.target.setAttribute("src", '../ressources/icons/X.png');
	} else {
		e.target.setAttribute("src", '../ressources/icons/add.png');
	}
}

var etoile = function(e) {
	var img = [];
	var id = e.target.getAttribute("id");
	for(i = 1; i < 6; i++) {
		img[i] = document.getElementById(String(i));
		if(i <= Number(id)) {
			img[i].setAttribute("src", "../ressources/icons/full_star.png");
		} else {
			img[i].setAttribute("src", "../ressources/icons/empty_star.png");
		}
	}
}

var etoile_base = function() {
	var img = [];
	for(i = 1; i < 6; i++) {
		img[i] = document.getElementById(String(i));
	}
	var grade = img[1].getAttribute("data-grade");
	for(i = 1; i < 6; i++) {
		if(i <= Number(grade)) {
			img[i].setAttribute("src", "../ressources/icons/full_star.png");
		} else {
			img[i].setAttribute("src", "../ressources/icons/empty_star.png");
		}
	}
}

var mon_script = function () {
	var img = [];
	var favorit;
	var list;
	for(i = 1; i < 6; i++) {
		img[i] = document.getElementById(String(i));
		img[i].addEventListener("mouseenter", etoile);
		img[i].addEventListener("mouseout", etoile_base);
	}
	
	favorit = document.getElementById("f");
	list = document.getElementById("l");
	favorit.addEventListener("mouseenter", fav);
	favorit.addEventListener("mouseout", fav);
	list.addEventListener("mouseenter", li);
	list.addEventListener("mouseout", li);
	etoile_base();
}

window.addEventListener("load", mon_script);