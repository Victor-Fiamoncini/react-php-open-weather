// React:
import React, { useContext } from 'react'

// Context:
import WeatherContext from '../../context/wheater/context'

// Style:
import './style.css'

// Others:
import ReactCSSTransitionGroup from 'react-addons-css-transition-group'

// Weather:
const Weather = () => {
  const weatherContext = useContext(WeatherContext)

  const { 
    temperature, 
    city, 
    country, 
    humidity, 
    description, 
    error 
  } = weatherContext.weather

  return (
    <div className="weather-wrapper">
      <ReactCSSTransitionGroup
        transitionName="fade"
        transitionEnterTimeout={300}
        transitionLeaveTimeout={300}
      >
        {city && country && <p>Location: {country} , {city}</p>}
        {temperature && <p>Temperature: {temperature}</p>}
        {humidity && <p>Humidity: {humidity}</p>}
        {description && <p>Conditions: {description}</p>}
        {error && <p>{error}</p>}
      </ReactCSSTransitionGroup>
    </div>
  )
}

export default Weather