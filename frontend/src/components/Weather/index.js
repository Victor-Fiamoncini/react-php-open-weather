// React:
import React, { useContext } from 'react'

// Context:
import WeatherContext from '../../context/wheater/context'

// Style:
import './style.css'

// Components:
import Spinner from '../layout/Spinner'

// Others:
import ReactCSSTransitionGroup from 'react-addons-css-transition-group'
import moment from 'moment'

// Weather:
const Weather = () => {
  const weatherContext = useContext(WeatherContext)

  const { 
    city, 
    country, 
    hours,
    error,
    loading
  } = weatherContext.weather

  return (
    loading ? <Spinner /> : (
      <div className="weather-wrapper">
        <ReactCSSTransitionGroup
          transitionName="fade"
          transitionEnterTimeout={300}
          transitionLeaveTimeout={300}
        >
          {error ? <p className="error">{error}</p> : (
            <div>
            {city && country && <p>Location: {country}, {city}</p>}
            {hours.map(hour => (
              <div className="main" key={hour.dt}>
                <div className="desc">
                  <span>
                    {moment.unix(hour.dt).format('DD/MM/YYYY').toString()}
                  </span>
                  <p>{hour.weather[0].description}</p>
                </div>
                <hr/>
                <div className="temps">
                  <p>Minimum: {Math.round(hour.main.temp_min - 273.15)} <sup>o</sup>C</p>
                  <p>Maximun: {Math.round(hour.main.temp_max - 273.15)} <sup>o</sup>C</p>
                </div>
              </div>
            ))}
            </div>
          )}
        </ReactCSSTransitionGroup>
      </div>
    )
  )
}

export default Weather
