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

  function toggle(event) {
    console.log(event);
    // const content = document.querySelector(`sort_section_container_${}`);
    // this.classList.toggle("is-active");
    // content.classList.toggle("is-open");
  }
  
  for (let i = 0; i < menu.length; i++) {
    menu[i].addEventListener("click", toggle);
  }

//   もう一回押したら閉じるようにする

// let a= document.getElementsByClassName("gyoukai_title");

// document.getElementByClassName("gyoukai_section").onclick = function() {
//     a.classList.remove("display_none");
//   }; 

// let item= document.getElementById("gyoukai_title");

// document.getElementById('sort_option_gyoukai_container').onclick = function() {
//   item.style.backgroundColor = "#3fb811";
// };