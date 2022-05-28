'use strict'
// let down= document.getElementsByClassName("fa-sort-down");

// document.getElementById("sort_title_gyoukai").onclick = function() {
//     document.getElementById('sort_section_gyoukai_container').style.display = "block";
//     down[0].classList.add("rotate");
    
//   };
// document.getElementById("sort_title_area").onclick = function() {
//     document.getElementById('sort_section_area_container').style.display = "block";
//     down[1].classList.add("rotate");
//   }; 
// document.getElementById("sort_title_picky").onclick = function() {
//     document.getElementById('sort_section_picky_container').style.display = "block";
//     down[2].classList.add("rotate");
//   }; 

  const menu = document.querySelectorAll(".js-menu");
  let type = getElementByClassName("")

  function toggle(event) {
    console.log(event);
    const content = document.querySelector(`sort_section_container_${type}`);
    this.classList.toggle("is-active");
    content.classList.toggle("is-open");
  }

  for (let i = 0; i < menu.length; i++) {
    menu[i].addEventListener("click", function() {
      toggle(menu[i])
    })
  }

  function toggle(target) {
    console.log(target);
  }