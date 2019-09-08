// Imports:
import axios from 'axios'

// Base URL:
export const openWeatherMap = axios.create({
  baseURL: `http://api.openweathermap.org/data/2.5/forecast`
})