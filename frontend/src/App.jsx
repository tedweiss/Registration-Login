import React from 'react'

const postRegistration = payload => {
  let url = './backend/registration.php'
  let xhr = new XMLHttpRequest()
  xhr.open('POST', url)
  xhr.onload = () => {
    if (xhr.status === 200) {
      console.log(xhr.response)
    } else {
      console.log('broke it')
    }
  }
  xhr.onerror = () => {
    console.log('still broke, but this is a request error')
  }
  xhr.send(JSON.stringify(payload))
}
const App = () => {
  let data = {
    email: 'you@you.you',
    password: 'tuvXYZ789',
    salt: 'pepper'
  }
  postRegistration(data)
  return <div>Registration</div>
}

export default App
