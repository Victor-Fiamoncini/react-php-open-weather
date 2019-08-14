// React:
import React, { useContext } from 'react'

// Context:
import WeatherContext from '../../context/wheater/context'

// Style:
import './style.css'

// Form:
const Form = () => {
  const weatherContext = useContext(WeatherContext)

  const { getWeather } = weatherContext

  function handleFormSubmit(event) {
    getWeather(event)
  }
  
  return (
    <div className="form-wrapper">
      <form onSubmit={event => handleFormSubmit(event)}>
        <input 
          type="text" 
          name="city" 
          placeholder="City..."
        />
        <input 
          type="text" 
          name="country" 
          placeholder="Country..."
        />
        <button type="submit">Get Wheater</button>
      </form>
    </div>
  )
}

export default Form