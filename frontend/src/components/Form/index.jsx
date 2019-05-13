// React:
import React from 'react'

// Style:
import './style.css'

// Form:
export const Form = props => (
  <div className="form-wrapper">
    <form onSubmit={props.getWheater}>
      <input type="text" name="city" placeholder="City..."/>
      <input type="text" name="country" placeholder="Country..."/>
      <button type="submit">Get Wheater</button>
    </form>
  </div>
)