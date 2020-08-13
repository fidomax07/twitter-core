import getters from './tweet/getters'
import mutations from './tweet/mutations'
import actions from './tweet/actions'
import DefaultTweetObject from '../utils/default_objects/DefaultTweetObject'

export default {
  namespaced: true,

  state: {
    tweets: [DefaultTweetObject]
  },

  getters,
  mutations,
  actions
}