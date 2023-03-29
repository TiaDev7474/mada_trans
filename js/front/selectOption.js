 
 const dep_select = document.querySelector('#departure');
 const city_dep_container= document.querySelector('#select_city_departure');
 const city_items_arv= document.querySelectorAll('.option_item_arv')

 const arv_select = document.querySelector('#arrival');
 const city_arv_container= document.querySelector('#select_city_arrival');
 const city_items_dep= document.querySelectorAll('.option_item_dep')

 const category_select = document.querySelector('#categories');
 const category_container= document.querySelector('#select_categories');
 const category_items= document.querySelectorAll('.option_item_category')


 /* _________data _________*/
   
   const cityData=['Antananarivo','Fianarantsoa','Toamasina','Mahajanga','Antsirabe','Toliara']


 /*_________________*/

/* departure select handler*/
 dep_select.addEventListener('focus',()=>{
         
       city_dep_container.classList.toggle('hidden')
       
 })
 city_items_dep.forEach(item =>{
     item.addEventListener('click' , () =>{
          dep_select.value=item.textContent.trim();
          city_dep_container.classList.toggle('hidden')
     })
 })


 /* arrival select  handler*/
 arv_select.addEventListener('focus',()=>{
         
  city_arv_container.classList.toggle('hidden')
  
})
city_items_arv.forEach(item =>{
item.addEventListener('click' , () =>{
     arv_select.value=item.textContent.trim();
     city_arv_container.classList.toggle('hidden')
})
})

 /* category select  handler*/


 category_select.addEventListener('focus',()=>{
         
  category_container.classList.toggle('hidden')
  
})
category_items.forEach(item =>{
item.addEventListener('click' , () =>{
  category_select.value=item.textContent.trim();
  category_container.classList.toggle('hidden')
})
})




//  function createSelectOption (optionList){
//        let selectHtml = document.createElement('html')
//        selectHtml.innerHTML = `<div class='absolute top-3 left-0' id='select_departure'>`
//       optionList.map(city => {
//             selectHtml.innerHTML += `<li class='option_item '>${city}</li>`
           

//       });
//             selectHtml.innerHTML +=`</div>`;
          
//       city_dep_container.innerHTML+= selectHtml;
//       console.log(city_dep_container)
         
 


 




 


 


 
 