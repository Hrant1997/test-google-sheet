import Home from './pages/Home'
import Sheets from './pages/Sheets'
/**
 * Time out in seconds.
 * @type import("vue-router").RouteConfig[]
 */
const routes = [
  {
    path: '/',
    component: Home
  },
  {
    path: '/sheets',
    component: Sheets
  }
  
]
export default routes