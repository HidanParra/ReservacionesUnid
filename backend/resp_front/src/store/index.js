import Vue from 'vue';
import Vuex from 'vuex';
import Axios from 'axios';

import app from './modules/app';

import * as getters from './getters';

Vue.use(Vuex);

const store = new Vuex.Store({
  strict: false, // process.env.NODE_ENV !== 'production',
  getters,
  modules: {
    app
  },
  state: {
    status: '',
    token: localStorage.getItem('token') || '',
    user: {}
  },
  mutations: {
    auth_request(state) {
      state.status = 'loading'
    },
    auth_success(state, token, user) {
      state.status = 'success'
      state.token = token
      state.user = user
    },
    auth_error(state) {
      state.status = 'error'
    },
    logout(state) {
      state.status = ''
      state.token = ''
    },
  },
  actions: {
    login({
      commit
    }, user) {
      return new Promise((resolve, reject) => {
        commit('auth_request')
        commit('auth_success', 'asdasd', 'as')
        /*axios({
            url: 'http://localhost:3000/login',
            data: user,
            method: 'POST'
          })
          .then(resp => {
            const token = resp.data.token
            const user = resp.data.user
            localStorage.setItem('token', token)
            axios.defaults.headers.common['Authorization'] = token
            commit('auth_success', token, user)
            resolve(resp)
          })
          .catch(err => {
            commit('auth_error')
            localStorage.removeItem('token')
            reject(err)
          })*/
      })
    },
  }
})

export default store