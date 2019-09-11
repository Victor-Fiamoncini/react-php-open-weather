// Imports:
import axios from 'axios'

// Base URL #1:
export const openWeatherMap = axios.create({
  baseURL: `http://api.openweathermap.org/data/2.5/forecast`
})

// Base URL #2:
export const apache = axios.create({
  baseURL: `http://localhost:80`
})
