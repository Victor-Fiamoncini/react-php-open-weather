//React:
import React, { Component } from 'react'

//Form:
export default class Form extends Component {
  
  render() {
    return (
      <div>
        <form onSubmit={ this.props.getWheater }>
          <input type="text" name="city" placeholder="City..." />
          <input type="text" name="country" placeholder="Country..." />
          <button type="submit">Get Wheater</button>
        </form>
      </div>
    )
  }
  
} 