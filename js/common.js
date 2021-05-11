'use strict';

//Ladda in items som spelaren har samlat in i STATE
window.onload = function(){
    switch(STATE.userLevel){
        case 1:
            console.log('bara id:et som visas');
            break;
        case 2: 
            updateInventory(portals.slice(0, 1));
            break;
        case 3:
            updateInventory(portals.slice(0, 2));
            break;
        case 4:
            updateInventory(portals.slice(0, 3));
            break;
        case 5:
            updateInventory(portals.slice(0, 4));
            break;
    }
    
    loadInventoryItems(STATE.inventory);
}

function updateInventory(portal){
    portal.forEach(portal => {
        STATE.inventory.push(portal.item);
    })
}

function loadInventoryItems(itemsArray){
    //ladda upp boxarna genom att appenda i en div som kommer från classes
    //const inventoryItemsHolder = document.getElementById("inventory-items");
    let i = 2;

    itemsArray.forEach(item => {
        let itemDiv = document.getElementById(`item-${i}`)
        itemDiv.style.backgroundImage = `url(${item.itemImg})`;
        i++
    });
}