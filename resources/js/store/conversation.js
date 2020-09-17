import actions from './tweet/actions'
import mutations from './tweet/mutations'

export default {
  namespaced: true,

  state: {
    tweets: []
  },

  getters: {
    tweet (state) {
      return function findTweetById (id) {
        return state.tweets.find(t => t.id == id)
      }
    },

    parents (state) {
      return function findParentsByTweetId (id) {
        id = Number.parseInt(id)

        return state.tweets
          .filter(filterTweetsByIdAndWithoutChildren)
          .sort((a, b) => a.created_at - b.created_at)

        // *********************************
        function filterTweetsByIdAndWithoutChildren (tweet) {
          return tweet.id != id && !tweet.parent_ids.includes(id)
        }
      }


    },

    replies (state) {
      return function findRepliesByTweetId (id) {
        return state.tweets.filter(t => t.parent_id == id)
          .sort((a, b) => a.created_at - b.created_at)
      }
    }
  },

  mutations,

  actions
}