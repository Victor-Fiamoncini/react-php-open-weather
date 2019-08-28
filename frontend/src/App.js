// React:
import React from 'react'

// Components:
import Title from './components/Title'
import Form from './components/Form'
import Weather from './components/Weather'

// Context:
import WeatherState from './context/wheater/state'

// Style:
import './style.css'

// App:
const App = () => (
  <WeatherState>
    <div className="container">
      <div className="card">
        <Title/>
        <div className="main-wrapper">
          <Form/>
          <Weather />
        </div>
      </div>
    </div>
  </WeatherState>
)

export default App