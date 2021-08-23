  fetch(https://enmcl1x9akrhc23.m.pipedream.net)
  .then(response => response.json())
  .then(data => console.log(data))
  const fetchDataBtn = document.querySelector('#fetchdata')
const result = document.querySelector('#result')


const getData = function() {
  result.innerText = 'Loading....'
  fetch('https://api.github.com/users/gulshansainis')
    .then(res => res.json())
    .then(data => {
      result.innerText = JSON.stringify(data, null, 2)
    })
    .catch(error => console.log(error))
}


fetchDataBtn.addEventListener('click', getData)