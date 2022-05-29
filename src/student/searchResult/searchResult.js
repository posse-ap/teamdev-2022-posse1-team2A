'use strict'

const comparisonButtons = document.querySelectorAll('.button_comparison');
const compareModalContainer = document.querySelector('.compare_modal_container');
const compareItemWrapper = document.querySelector('.compare_item_wrapper');
const buttonClose = document.getElementsByClassName('compare_modal_close')[0];
const compareSubmitButton = document.getElementsByClassName('compare_submit_button')[0];
const formElements = document.forms;  //各カードのform部分を配列で取得

buttonClose.addEventListener('click', modalClose);

// const formElements = evenGet(formElementsAll);

//カードの「比較ボタン」を押したとき
for(let i=0; i<formElements.length; i++){
  let cb = formElements[i].compare_checkbox;  //各カードのcheckboxを取得
  cb.addEventListener('change', function () { //checkboxの値が変わった時
    if (this.checked){
      compareModalContainer.style.display = 'block';
      addCard(i+1);
    } else {
      let compareItems = document.querySelector(`#agent_card${i+1}`);
      compareItems.remove();
    }
    if(compareItemWrapper.childElementCount === 0){ //modalにitemがなくなった時
      modalClose();
    }
  });
}

//モーダルの「比較ページへ」を押したとき
compareSubmitButton.addEventListener('click', function(){
  if(compareItemWrapper.childElementCount <= 1){
    alert('２件以上選択してください');
  } else {
    window.open('../compare/compare.html','_blank');
  }
});

function addCard(id) {
  const add_code = `
    <div class='compare_item' id='agent_card${id}'>
      <label for="agent${id}" class="compare_item_delete"><i class="fa-solid fa-square-xmark fa-lg"></i></label>
      <div class="compare_item_img_wrapper">
        <img src="../../materials/rikunavi.png" alt="リクナビ">
      </div>
    </div>
    `;
  compareItemWrapper.insertAdjacentHTML('beforeend', add_code);
};


function modalClose(){
  compareModalContainer.style.display = 'none';
};

function evenGet(array) {
  let eArray = new Array();
  for(let i; i<array.length; i++){
    if(i % 2 === 0){
      eArray.push(array[i]);
    }
  }
  return eArray;
}