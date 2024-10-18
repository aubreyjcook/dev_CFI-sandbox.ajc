"use strict";

/* 

This script takes two parameters. First, e, which is the change event being passed.
Secondly, an object, which you create; this would be made of keys (that are defined 
from the dropdown options' values) and values (the correlating websites to the keys).

A sample object may look like this:

const sampleObj = {
    google: "https://google.com",
    centerforinquiry: "https://centerforinquiry.org"
}

*/

var myObj = {
  quackwatch: "https://quackwatch.org/",
  acupuncture: "https://quackwatch.org/acupuncture/",
  allergy: "https://quackwatch.org/allergy/",
  autism: "https://quackwatch.org/autism/",
  cancer: "https://quackwatch.org/cancer/",
  cases: "https://quackwatch.org/cases/",
  chelation: "https://quackwatch.org/chelation/",
  chiro: "https://quackwatch.org/chiropractic/",
  credential: "https://quackwatch.org/credential/",
  dental: "https://quackwatch.org/dental/",
  diet: "https://quackwatch.org/diet/",
  fibro: "https://quackwatch.org/fibromyalgia/",
  homeo: "https://quackwatch.org/homeopathy/",
  info: "https://quackwatch.org/infomercial/",
  ihealth: "https://quackwatch.org/ihealth-pilot/",
  device: "https://quackwatch.org/device/",
  mental: "https://quackwatch.org/mental-health/",
  mlm: "https://quackwatch.org/mlm/",
  naturo: "https://quackwatch.org/naturopathy/",
  ncahf: "https://quackwatch.org/ncahf/",
  nccam: "https://quackwatch.org/nccam/",
  nutrition: "https://quackwatch.org/nutrition/",
  pharmacy: "https://quackwatch.org/pharmacy/"
};

function selectScript(e, obj) {
  
  if (event.target.tagName === "SELECT"){

    const val = e.target.value;
    let site;

    // Check object for select value
    if ( obj.hasOwnProperty(val) ){
        
        // Change window location to website
        site = obj[val];
        window.location = site;
    
    }

  }
  
} 

// Use this event listener template if you need to add more dropdowns.
// You'll need to add more objects as well to use different functionality.
document.addEventListener("change", function (e) {
  selectScript(e, myObj);
}, false);
