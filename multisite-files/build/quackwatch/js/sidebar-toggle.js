const sidebarButton = document.querySelector("#sidebar-button");
const sidebar = document.querySelector("#sidebar-wrapper");
const content = document.querySelector("#content-wrapper");

function activateSidebar(e){
    e.preventDefault();
    let sidebarActive = sidebar.classList.toggle("active");
    let contentActive = content.classList.toggle("active");

    if (sidebarButton.innerHTML == "+"){
    	sidebarButton.innerHTML = "-";
    } else if (sidebarButton.innerHTML == "-"){
    	sidebarButton.innerHTML = "+";
    } else {
    	sidebarButton.innerHTML = "+";
    }

    return sidebarActive, contentActive, sidebarButton;

}

sidebarButton.addEventListener("click", activateSidebar, false);

