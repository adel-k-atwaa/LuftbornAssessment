// import { createStore } from 'vuex';
// export default createStore({
//   state:{
//     access_token:null,
//     name: null,
//     expires:null
//   },
//   mutations: {
//     setAccessToken(state, text) {
//       state.access_token=text
//     },
//     setName(state, text) {
//       state.name=text
//     },
//     setExpires(state, text) {
//       state.expires = text
//     },
//     logout() {
//       commit('setAccessToken', null);
//       commit('setName', null);
//       commit('setExpires', null);
//     }
//   },
//   getters: {
//     getAccessToken(state) {
//       return  state.access_token
//     },
//     getName(state) {
//       return state.name
//     },
//     getExpires(state) {
//       return state.expires
//     }
//   }
// })

export const state = () => ({
      access_token: null,
      name:null,
      expires:null
    })

export const getters = {
  getAccessToken(state) {
    // return  state.access_token != ""?state.access_token:sessionStorage.getItem("access_token")
    return state.access_token

  },
  getName(state) {
    // return state.name != ""?state.name:sessionStorage.getItem("name")
    return state.name
  },
  getExpires(state) {
    // return state.expires != ""?state.expires:sessionStorage.getItem("expires")
    return state.expires
  }
}

export const mutations = {
  setAccessToken(state, text) {
    // sessionStorage.setItem('access_token', text)
    state.access_token=text
  },
  setName(state, text) {
    // sessionStorage.setItem('name', text)
    state.name=text
  },
  setExpires(state, text) {
    // sessionStorage.setItem('expires', text)
    state.expires = text
  },
  delete(state) {
    // sessionStorage.setItem('expires', "")
    // state.expires=null
    // sessionStorage.setItem('name', "")
    // state.name=null
    // sessionStorage.setItem('access_token', "")
    // state.access_token=null
    commit('setAccessToken', null);
    commit('setName', null);
    commit('setExpires', null);
  }
}
