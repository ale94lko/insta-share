import router from '@/router'
import httpClient from '@/services/http.service';
const authService = {
  async login(formData) {
    try {
      const { status, data } = await httpClient.post('user/login', formData)
      if (status === 200) {
        this.setUser(data)
        return {
          success: true,
        }
      }
    } catch (e) {
      return {
        success: false,
        errors: e.response.data.errors,
      }
    }
  },
  logout() {
    localStorage.removeItem('ACCESS_TOKEN')
    router.push({name: 'login'})
  },
  setUser(user) {
    localStorage.setItem('USERNAME', user.username)
    localStorage.setItem('ACCESS_TOKEN', user.access_token)
  },
  getUsername() {
    return localStorage.getItem('USERNAME')
  },
  isLoggedIn() {
    return !!localStorage.getItem('ACCESS_TOKEN')
  },
  getToken() {
    return localStorage.getItem('ACCESS_TOKEN')
  },
}

export default authService
