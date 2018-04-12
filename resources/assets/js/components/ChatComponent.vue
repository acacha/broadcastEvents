<template>
    <div>
        <ul>
            <li v-for="message in messages">{{ message.body }} </li>
        </ul>
        <input type="text" v-model="newMessage">
        <button @click="send">Enviar</button>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        newMessage: '',
        messages: [
          { body: 'Missatge 1'},
          { body: 'Missatge 2'},
          { body: 'Missatge 3'}
        ]
      }
    },
    methods: {
      send() {
        axios.post('/chat_message',{
          'body': this.newMessage
        })
      }
    },
    mounted() {
      console.log('Component mounted.')
      Echo.private('new-message')
        .listen('ChatMessage', (event) => {
          console.log('He rebut un nou event de broadcast')
          console.log(event);

          this.messages.push({ body: event.message})

        })
    }
  }
</script>
