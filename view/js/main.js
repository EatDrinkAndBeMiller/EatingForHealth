//allow users to add ingredients to a shopping list

//get value from checkbox
let shoppingList = document.querySelector('.shopping-list');

shoppingList.addEventListener('click', () => {
    let checks = document.getElementsByClassName('form-check-input');
    let array = [];

    for (i=0; i<25; i++) {
        if(checks[i].checked) {
            array.push(checks[i].value);
        }
    }

    console.log(array);
});
