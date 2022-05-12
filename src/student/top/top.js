'use strict'
let down= document.getElementsByClassName("fa-sort-down");

document.getElementById("sort_title_gyoukai").onclick = function() {
    document.getElementById('sort_option_gyoukai_container').style.display = "block";
    down[0].classList.add("rotate");
    
  };
document.getElementById("sort_title_area").onclick = function() {
    document.getElementById('sort_option_area_container').style.display = "block";
    down[10].classList.add("rotate");
  }; 
document.getElementById("sort_title_picky").onclick = function() {
    document.getElementById('sort_option_picky_container').style.display = "block";
    down[17].classList.add("rotate");
  }; 