// Action types:
import { UPDATE_WEATHER } from '../types'

// Reducer:
export default (state, action) => {
  const { type, payload } = action
  
  switch (type) {
    case UPDATE_WEATHER:
      return payload

    default:
      return state
  }
}