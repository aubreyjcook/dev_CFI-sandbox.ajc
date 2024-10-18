"use strict";

if (window.location.href == "https://quackwatch.org/site-map/") {
  (function() {
  
      // Add tippy tooltips
      tippy(".copy-text-link", {
        trigger: "click"
      }); 
      
      // Add clipboard functionality
      new ClipboardJS(".copy-text-link");
    
  })();
}
