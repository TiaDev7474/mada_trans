
// const inputForm = document.querySelector('#inputForm');

// inputForm.addEventListener('submit', (e)=>{
//     e.preventDefault()
//      const formdata = new FormData(inputForm)
//      console.log('localhost:8080/index.php?action=search&' +new URLSearchParams(formdata).toString());
//       fetch('index.php?action=search&' + new URLSearchParams(formdata).toString())
//          .then(
//               console.log('here')
//          )
//          .catch (err=> console.log(err))

// })

// const CarListContainer= document.querySelector()

document.addEventListener('DOMContentLoaded',()=>{
    const params = new URLSearchParams(document.location.search)
    fetchData(params);
})

inputRadios = document.querySelectorAll("input[type='radio']");



// const baseURL = document.baseURI.split("?")[0].toString() +`?action=search&departure=${params.get('departure')}&arrival=${params.get('arrival')}&date=${params.get('date')}`

// console.log(`${document.location.pathname}?${params}`)
let $matchedCars= null
inputRadios.forEach(inputRadio => {
    inputRadio.addEventListener('click' ,() => {
      const params = new URLSearchParams(document.location.search)
      params.set('category',inputRadio.value)
     
      window.history.replaceState({},"",`${document.location.pathname}?${params}`);
        fetchData(params);
        
    })
    
});


function fetchData(params){
  fetch(`search.php?${params}`)
  .then(response =>{
    return response.json()
  }
     )
  .then(data=>{
     console.log(data)
     $matchedCars=data
       
  })
  .catch(err => console.log(err))
}




