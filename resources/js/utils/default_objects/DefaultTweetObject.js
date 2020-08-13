import DefaultUserObject from './DefaultUserObject'

export default {
  id: null,
  type: "tweet",
  body: null,
  created_at: null,
  likes_count: 0,
  original_tweet: null,
  replies_count: 0,
  retweets_count: 0,
  media: {
    data: []
  },
  entities: {
    data: []
  },
  user: DefaultUserObject
}