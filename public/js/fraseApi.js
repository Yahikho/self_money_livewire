const API_URL = 'https://api.quotable.io/random'

fetch(API_URL)
    .then(response => response.json())
    .then(data => {
        let element = document.getElementById('element')
        
        element.innerHTML = `<p class="text-gray-500 px-6 py-6 ">${data.content}</p>`

        Livewire.emitTo('show-home','render')
    })