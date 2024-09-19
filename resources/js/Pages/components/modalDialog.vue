<template>
  <div class="background-modal">
    <div class="modal">
      <div class="modal__header">
        <div class="modal__header__close" @click="$emit('hide')">
          <img src="../sources/close-modal.png" alt="" />
        </div>
      </div>
      <div class="modal__title">Чат игроков</div>
      <div class="modal__dialog" v-for="message of messages" :key="message.user_id">
        <div v-if="!message.from_me" class="modal__dialog__item main">
          <div class="modal__dialog__item__header">
            <div class="modal__dialog__item__header__title">Игрок</div>
            <div class="modal__dialog__item__header__data">13:21</div>
          </div>
          <div class="modal__dialog__item__text">{{ message.message }}</div>
        </div>
        <div v-else class="modal__dialog__item second">
          <div class="modal__dialog__item__header">
            <div class="modal__dialog__item__header__title">Константин</div>
            <div class="modal__dialog__item__header__data">13:21</div>
          </div>
          <div class="modal__dialog__item__text">{{ message.message }}</div>
        </div>
        <div class="modal__dialog__sticker">
          <img src="../sources/sticker.png" alt="" />
        </div>
      </div>
      <div class="modal__input">
        <input v-model="text" type="text" placeholder="Сообщение" />
        <img @click="sendMessage" src="../sources/msg.png" alt="" />
      </div>
    </div>
  </div>
</template>
<script>
import {Centrifuge} from "centrifuge";
import telegram from '../api/telegram.js'
import api from '../api/users.api.js'
import messages from '../api/messages.api.js'

export default {
    props: {
        room: Object
    },
    data() {
        return {
            messages: [],
            text: '',
            user: null,
            centrifuge: null
        }
    },
    methods: {
        async sendMessage() {
            await messages.send(this.text, this.user.id, this.room.id, 'chatroom')
            this.text = ''
        }
    },
    async created() {
        this.user = await telegram.profile()

        const token = await api.generateConnectionToken(this.user.id)
        this.centrifugo = new Centrifuge(`wss://${window.location.host}/connection/websocket`, { token })
        const messages = await messages.load(this.room.id, 'chatroom')
        this.messages = messages.map(message => ({ message: message.message, from_me: message.user_id === this.user.id }))

        const subscription = this.centrifugo.newSubscription(`chatroom`)

        subscription.on('publication', context => {
            if (context.data.event === 'message') {
                this.messages.push({ message: context.data.message, from_me: context.data.user_id === this.user.id })
                console.log(this.messages)
            }
        }).subscribe()

        this.centrifugo.connect()
    }
}
</script>
<style lang="scss" scoped>
.background-modal {
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  -webkit-backdrop-filter: brightness(0.5);
  backdrop-filter: brightness(0.5);
  width: 100dvw;
  height: 100dvh;
  z-index: 10;
}
.modal {
  // border: 1px solid #643434;
  border-radius: 13px;
  width: 94%;
  background: #482020;
  align-self: center;
  position: relative;
  padding-bottom: 0;

  .modal__input {
    margin-top: 20px;
    background: #622d2d;
    display: flex;
    padding: 10px 13px;
    overflow: hidden;
    border-radius: 0 0 10px 10px;
    input {
      background: transparent;
      color: #a56060;
      font-size: 12px;
      font-family: 'SF Pro Display';
      outline: none;
      border: none;
      width: 100%;
    }
    img {
      width: 20px;
      height: 20px;
    }
  }
  .modal__dialog {
    padding: 0 10px;
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    .modal__dialog__sticker {
      width: 27px;
      position: relative;
      top: 10px;
      height: 27px;
      margin-left: auto;
      img {
        width: 100%;
        height: 100%;
      }
    }
    .modal__dialog__item {
      width: 45%;
      padding: 6px 6px;
      border-radius: 0 6px 6px 6px;
      background: #411c1c;
      border: 1px solid #643434;
      display: flex;
      flex-direction: column;
      gap: 5px;
      &.second {
        background: #522626;
        margin-left: auto;
        border-radius: 6px 6px 0px 6px;
      }
      .modal__dialog__item__text {
        font-family: 'SF Pro Display';
        color: white;
        font-size: 14px;
      }
      .modal__dialog__item__header {
        display: flex;
        justify-content: space-between;
        font-family: 'SF Pro Display';
        font-weight: 500;
        color: #7a3c3c;
        font-size: 12px;
      }
    }
  }
  .modal__title {
    font-family: 'SF Pro Display';
    color: white;
    font-size: 17px;
    font-weight: 600;
    text-align: center;
  }
  .modal__header {
    align-items: center;
    width: 95%;
    display: flex;
    justify-content: flex-end;
    top: -40px;
    height: 14px;
    padding: 0px 0 0 0;
    position: relative;
    .modal__header__title {
      color: white;
      font-family: 'SF Pro Display';
      text-align: center;
      font-size: 20px;
      font-weight: 500;
    }
    .modal__header__close {
      img {
        width: 30px;
        height: 30px;
      }
    }
  }
}
</style>
