export default {
  tweets (state) {
    return state.tweets
      .filter(t => t.id != null)
      .sort((a, b) => b.created_at - a.created_at)
  },

  tweet (state) {
    return id => state.tweets.find(t => t.id === id)
  }
}
