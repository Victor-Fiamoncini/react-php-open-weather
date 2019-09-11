// Imports:
import React, { useReducer } from 'react'

// Context & Reducer:
import WeatherContext from './context'
import weatherReducer from './reducer'

// Action types:
import { UPDATE_WEATHER, SET_LOADING } from '../types'

// Others:
import { openWeatherMap, apache } from '../../config/api'

// Actions:
const WeatherState = props => {
  // Initial state:
  const INITIAL_STATE = {
    city: undefined,
    country: undefined,
    hours: [],
    error: undefined,
    loading: false
  }

  const [state, dispatch] = useReducer(weatherReducer, INITIAL_STATE)

  // Set Loading:
  const setLoading = () => dispatch({ type: SET_LOADING })

  // Get weather:
  const getWeather = async event => {
    event.preventDefault()
    const city = event.target.city.value
    const country = event.target.country.value
    const hasNumber = /\d/
    const API_KEY = process.env.REACT_APP_API_KEY
    if (hasNumber.test(city) || hasNumber.test(country)) dispatch({ 
      type: UPDATE_WEATHER,
      payload: {
        city: undefined,
        country: undefined,
        hours: [],
        error: 'Invalid value'
      }
    })
    if (city && country) {
      setLoading()
      const response = await openWeatherMap.get(`?q=${city},${country}&appid=${API_KEY}`)
      if (response.cod === '404') {
        dispatch({
          type: UPDATE_WEATHER,
          payload: {
            city: undefined,
            country: undefined,
            hours: [],
            error: response.message,
            loading: true
          }
        })
      } else {
        const { data } = response 
        dispatch({
          type: UPDATE_WEATHER,
          payload: {
            city: data.city.name,
            country: data.city.country,
            hours: data.list,
            error: undefined,
            loading: true
          }
        })
        // Request to PHP server:  
        const config = { headers: {
          'content-type': 'multipart/form-data',
          'Access-Control-Allow-Origin': '*',
          'Access-Control-Allow-Headers': '*'
      } }
        const body = JSON.stringify(data);
        const response2 = await apache.post('victor/weather-app/backend/index.php', body, config)
        console.log(response2);
      }
    } else {
      dispatch({
        type: UPDATE_WEATHER,
        payload: {
          temperature: undefined,
          city: undefined,
          country: undefined,
          hours: [],
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
