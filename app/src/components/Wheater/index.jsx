//React:
import React from 'react'

//Wheater Component:
const Wheater = props => (
  <div>
    { props.city && props.country && <p>Location: { props.country } , { props.city }</p> }
    { props.temperature && <p>Temperature: { props.temperature}</p> }
    { props.humidity && <p>Humidity: { props.humidity }</p> }
    { props.description && <p>Conditions: { props.description }</p> }
    { props.error && <p>{ props.error }</p> }
  </div>
)

export default Wheater