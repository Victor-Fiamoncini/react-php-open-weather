//React:
import React from 'react'

//Form Component:
const Form = props => (
  <div>
    <form onSubmit={ props.getWheater }>
      <input type="text" name="city" placeholder="City..." />
      <input type="text" name="country" placeholder="Country..." />
      <button type="submit">Get Wheater</button>
    </form>
  </div>
)

export default Form