// React:
import React, { Component } from 'react'

// Components:
import { Title } from './components/Title'
import { Form } from './components/Form'
import { Weather } from './components/Weather'

// Style:
import './style.css'

//Others:
import axios from 'axios'
import { API_KEY } from './config/api'

// App:
export default class App extends Component {
  state = {
    temperature: undefined,
    city: undefined,
    country: undefined,
    humidity: undefined,
    description: undefined,
    error: undefined,
  }

  getWheater = async event => {
    event.preventDefault()
    const city = event.target.city.value
    const country = event.target.country.value
    const hasNumber = /\d/
    if (hasNumber.test(city) || hasNumber.test(country)) return this.setState({ 
      temperature: undefined,
      city: undefined,
      country: undefined,
      humidity: undefined,
      description: undefined,
      error: 'Invalid value' 
    })
    if (city && country) {
      const data = await axios.get(`
        http://api.openweathermap.org/data/2.5/weather?q=${city},${country}&appid=${API_KEY}&units=metric`
      )
      this.setState({
        temperature: data.data.main.temp,
        city: data.data.name,
        country: data.data.sys.country,
        humidity: data.data.main.humidity,
        description: data.data.weather[0].description,
        error: undefined,
      })
    } else {
      this.setState({
        temperature: undefined,
        city: undefined,
        country: undefined,
        humidity: undefined,
        description: undefined,
        error: 'Please enter a value'
      })
    }
  }

  render() {
    const { temperature, city, country, humidity, description, error } = this.state

    return (
      <div className="container">
        <div className="card">
          <Title/>
          <div className="main-wrapper">
            <Form getWheater={this.getWheater}/>
            <Weather 
              temperature={temperature}
              city={city}
              country={country}
              humidity={humidity}
              description={description}
              error={error}
            />
          </div>
        </div>
      </div>
    )
  }
}