// Imports:
import React, { useReducer } from 'react'

// Context & Reducer:
import WeatherContext from './context'
import weatherReducer from './reducer'

// Action types:
import { UPDATE_WEATHER } from '../types'

// Others:
import axios from 'axios'

// Actions:
const WeatherState = props => {
  // Initial state:
  const INITIAL_STATE = {
    temperature: undefined,
    city: undefined,
    country: undefined,
    humidity: undefined,
    description: undefined,
    error: undefined
  }

  const [state, dispatch] = useReducer(weatherReducer, INITIAL_STATE)

  // Actions:
  async function getWeather(event) {
    event.preventDefault()
    const city = event.target.city.value
    const country = event.target.country.value
    const hasNumber = /\d/
    const API_KEY = process.env.REACT_APP_API_KEY
    if (hasNumber.test(city) || hasNumber.test(country)) dispatch({ 
      type: UPDATE_WEATHER,
      payload: {
        temperature: undefined,
        city: undefined,
        country: undefined,
        humidity: undefined,
        description: undefined,
        error: 'Invalid value' 
      }
    })
    if (city && country) {
      const data = await axios.get(`
        http://api.openweathermap.org/data/2.5/weather?q=${city},${country}&appid=${API_KEY}&units=metric`
      )
      dispatch({
        type: UPDATE_WEATHER,
        payload: {
          temperature: data.data.main.temp,
          city: data.data.name,
          country: data.data.sys.country,
          humidity: data.data.main.humidity,
          description: data.data.weather[0].description,
          error: undefined
        }
      })
    } else {
      dispatch({
        type: UPDATE_WEATHER,
        payload: {
          temperature: undefined,
          city: undefined,
          country: undefined,
          humidity: undefined,
          description: undefined,
          error: 'Invalid inputs'
        }
      })
    }
  }

  return (
    <WeatherContext.Provider value={{
      // State props:
      weather: state,
      // Actions:
      getWeather
    }}>
      {props.children}
    </WeatherContext.Provider>
  )
}

export default WeatherState