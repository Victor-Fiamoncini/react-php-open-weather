// Action types:
import { UPDATE_WEATHER, SET_LOADING } from '../types'

// Reducer:
export default (state, action) => {
  const { type, payload } = action
  
  switch (type) {
    case UPDATE_WEATHER:
      return {
        ...payload,
        loading: false
      }

    case SET_LOADING:
      return {
        loading: true
      }

    default:
      return state
  }
}
