<template>
  <div class="p-4">
    <div class="text-gray-300 mb-4">
      <app-tweet-username :user="notification.data.user" /> liked your tweet
    </div>

    <p class="text-gray-600">
      {{ notification.data.tweet.body }}
    </p>
  </div>
</template>

<script>
  import AppTweetUsername from '../../tweets/AppTweetUsername'

  export default {
    components: {
      AppTweetUsername
    },

    props: {
      notification: {
        required: true,
        type: Object
      }
    }
  }
</script>
