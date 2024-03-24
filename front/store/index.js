export const state = () => ({
      access_token: sessionStorage.getItem("access_token"),
      name:sessionStorage.getItem("name"),
      expires:sessionStorage.getItem("expires")
    })

export const getters = {
  getAccessToken(state) {
    return  state.access_token != ""?state.access_token:sessionStorage.getItem("access_token")
  },
  getName(state) {
    return state.name != ""?state.name:sessionStorage.getItem("name")
  },
  getExpires(state) {
    return state.expires != ""?state.expires:sessionStorage.getItem("expires")
  }
}

export const mutations = {
  setAccessToken(state, text) {
    sessionStorage.setItem('access_token', text)
    state.access_token=text
  },
  setName(state, text) {
    sessionStorage.setItem('name', text)
    state.name=text
  },
  setExpires(state, text) {
    sessionStorage.setItem('expires', text)
    state.expires = text
  },
  delete(state) {
    sessionStorage.setItem('expires', "")
    state.expires=""
    sessionStorage.setItem('name', "")
    state.name=""
    sessionStorage.setItem('access_token', "")
    state.access_token=""
  }
}
