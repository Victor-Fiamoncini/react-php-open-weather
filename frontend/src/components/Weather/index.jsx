// React:
import React from 'react'

// Style:
import './style.css'

// Others:
import ReactCSSTransitionGroup from 'react-addons-css-transition-group'

// Weather:
export const Weather = props => (
  <div className="weather-wrapper">
    <ReactCSSTransitionGroup
      transitionName="fade"
      transitionEnterTimeout={300}
      transitionLeaveTimeout={300}
    >
      {props.city && props.country && <p>Location: {props.country} , {props.city}</p>}
      {props.temperature && <p>Temperature: {props.temperature}</p>}
      {props.humidity && <p>Humidity: {props.humidity}</p>}
      {props.description && <p>Conditions: {props.description}</p>}
      {props.error && <p>{props.error}</p>}
    </ReactCSSTransitionGroup>
  </div>
)