"use strict"

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
    document.getElementById("mySidepannel").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
    document.getElementById("mySidepannel").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}
var trait = function() {
    document.getElementById("opener").addEventListener("click", openNav);
    document.getElementById("closer").addEventListener("click", closeNav);
    document.getElementById("q").focus();
}

window.addEventListener("load", trait);
