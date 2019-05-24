const config = state => state.app.config
const isLoading = state => state.app.isLoading
const palette = state => state.app.config.palette
const isLoggedIn = state => !!state.token
const authStatus = state => state.status
export {
  isLoading,
  palette,
  config,
  isLoggedIn,
  authStatus
}