//React:
import React from 'react'

//Axios:
import axios from 'axios'

//Components:
import Title from './components/Title'
import Form from './components/Form'
import Wheater from './components/Wheater'

//Others:
const API_KEY = 'f97637f9a3d18491a6cfd5db1a112aab'

//App:
class App extends React.Component {

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
        error: '',
      })
    } else {
      this.setState({
        temperature: undefined,
        city: undefined,
        country: undefined,
        humidity: undefined,
        description: undefined,
        error: 'Enter a value',
      })
    }
  }

  render() {
    return (
      <div>
        <Title />
        <Form getWheater={ this.getWheater } />
        <Wheater 
          temperature={ this.state.temperature }
          city={ this.state.city }
          country={ this.state.country }
          humidity={ this.state.humidity }
          description={ this.state.description }
          error={ this.state.error }
        />
      </div>
    )
  }

}


export default App