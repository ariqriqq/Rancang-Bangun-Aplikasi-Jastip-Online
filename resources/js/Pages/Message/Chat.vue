
<template>
  <div v-for="(message, index) in messages" :key="index" class="chat-history">
    <ul class="m-b-0">
      <li class="clearfix">
        <div class="message-data">
          <span class="message-data-time">10:12 AM, Today</span>
        </div>
        <div class="message other-message float-right">
          {{ message.message }}
        </div>
      </li>
    </ul>
  </div>
</template>
<script setup>
import { onMounted, ref } from "vue";
const emit = defineEmits({});
const props = defineProps({
  messages: Object,
});

const messages = ref(props.messages);

// onMounted(() => {
//   console.log(props.messages);
// });
</script>
