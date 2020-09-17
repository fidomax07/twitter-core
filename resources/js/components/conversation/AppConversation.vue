<template>
  <div>
    <div>
      <app-tweet
        v-for="t in parents(id)"
        :key="t.id"
        :tweet="t" />
    </div>

    <div class="text-lg border-b-8 border-t-8 border-gray-800">
      <app-tweet
        v-if="tweet(id)"
        :tweet="tweet(id)" />
    </div>

    <div>
      <app-tweet
        v-for="t in replies(id)"
        :key="t.id"
        :tweet="t" />
    </div>
  </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex'
import AppTweet from '../tweets/AppTweet'

export default {
  name: 'AppConversation',
  props: {
    id: {
      required: true,
      type: String
    }
  },

  components: {
    AppTweet
  },

  computed: {
    ...mapGetters({
      tweet: 'conversation/tweet',
      parents: 'conversation/parents',
      replies: 'conversation/replies'
    })
  },

  methods: {
    ...mapActions({
      getTweets: 'conversation/getTweets'
    })
  },

  mounted () {
    this.getTweets(`/api/tweets/${this.id}`)
    this.getTweets(`/api/tweets/${this.id}/replies`)
  }
}
</script>

<style scoped>

</style>