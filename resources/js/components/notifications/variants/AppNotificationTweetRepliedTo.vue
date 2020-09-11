<template>
  <div class="p-4 flex-grow">
    <app-tweet
      v-if="resolvedTweet"
      :tweet="resolvedTweet"
      class="!border-0" />
  </div>
</template>

<script>
import {mapGetters} from 'vuex'
import AppTweet from '../../tweets/AppTweet'

export default {
  components: {
    AppTweet
  },

  props: {
    notification: {
      required: true,
      type: Object
    }
  },

  computed: {
    ...mapGetters({
      tweet: 'notifications/tweet'
    }),

    resolvedTweet () {
      return this.tweet(this.notification.data.tweet.id)
    }
  }
}
</script>
