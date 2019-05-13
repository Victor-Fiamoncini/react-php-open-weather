// React:
import React from 'react'

// Style:
import './style.css'

// Weather:
export const Weather = props => (
  <div className="weather-wrapper">
    {props.city && props.country && <p>Location: {props.country} , {props.city}</p>}
    {props.temperature && <p>Temperature: {props.temperature}</p>}
    {props.humidity && <p>Humidity: {props.humidity}</p>}
    {props.description && <p>Conditions: {props.description}</p>}
    {props.error && <p>{props.error}</p>}
  </div>
)