//allow users to add ingredients to a shopping list

/*get value from checkbox -- this function gets the values of boxes checked upon submitting,
    iterates through values and adds them to an array*/
let shoppingList = document.querySelector('.shopping-list');

function shoppingLists() {
    shoppingList.addEventListener('click', function(event){
        event.preventDefault();
        
        const checks = document.querySelectorAll(`input[name="ingredient"]:checked`);
        let array = [];

        checks.forEach((check) => {
            array.push(check.value);
        });
        console.log(array);

        return array;
    });
}