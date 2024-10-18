let navIcon = document.querySelector("#nav-icon3");
const menuButton = document.querySelector("#menu-text");

function menuFunction(e){
	e.preventDefault();

	if ( menuButton.innerHTML == "MENU"){
		menuButton.innerHTML = "CLOSE";
		navIcon.classList.add("open");
	} else {
		menuButton.innerHTML = "MENU";
		navIcon.classList.remove("open");
	};
	return toggleIcon, menuButton.innerHTML;
}

navIcon.addEventListener("click", menuFunction, false);
