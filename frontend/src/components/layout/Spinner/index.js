// React:
import React from 'react'

// Others:
import spinner from '../../../images/loading.gif'

// Spinner:
const Spinner = () => (
  <img 
    src={spinner} 
    alt="Loading..."
    style={{ width: '100px', margin: '20px 0', display: 'block' }}
  />
)

export default Spinner
