//React:
import React, { Component } from 'react'

//Axios:
import axios from 'axios'

//Components:
import Title from './components/Title'
import Form from './components/Form'
import Wheater from './components/Wheater'

//Others:
const API_KEY = 'f97637f9a3d18491a6cfd5db1a112aab'

//App:
export default class App extends Component {

  state = {

  }

  getWheater = async event => {
    event.preventDefault()
    const city = event.target.city.value
    const country = event.target.country.value
    const data = await axios.get(`
      http://api.openweathermap.org/data/2.5/weather?q=${city},${country}&appid=${API_KEY}&units=metric`
    )
    console.log(data);
  }

  render() {
    return (
      <div>
        <Title />
        <Form getWheater={ this.getWheater } />
        <Wheater />
      </div>
    )
  }

}
