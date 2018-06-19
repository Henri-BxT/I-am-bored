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
	for(i = 1; i < 6; i++) {
		img[i] = document.getElementById(String(i));
		img[i].addEventListener("mouseenter", etoile);
		img[i].addEventListener("mouseout", etoile_base);
	}
	etoile_base();
}

window.addEventListener("load", mon_script);