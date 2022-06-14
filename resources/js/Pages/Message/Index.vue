<template>
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"
                                    ><i class="fa fa-search"></i
                                ></span>
                            </div>
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Search..."
                            />
                        </div>
                        <ul
                            v-for="(user, index) in users"
                            :key="index"
                            class="list-unstyled chat-list mt-2 mb-0"
                        >
                            <li
                                @click="showSpecificChat(user.id)"
                                class="clearfix"
                            >
                                <img
                                    src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                    alt="avatar"
                                />
                                <div class="about">
                                    <div class="name">{{ user.name }}</div>
                                    <div class="status">
                                        <i class="fa fa-circle offline"></i>
                                        left 7 mins ago
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="chat">
                        <div class="chat-header clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a
                                        href="javascript:void(0);"
                                        data-toggle="modal"
                                        data-target="#view_info"
                                    >
                                        <img
                                            src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                            alt="avatar"
                                        />
                                    </a>
                                    <div class="chat-about">
                                        <h6 class="m-b-0">Aiden Chavez</h6>
                                        <small>Last seen: 2 hours ago</small>
                                    </div>
                                </div>
                                <div class="col-lg-6 hidden-sm text-right">
                                    <a
                                        href="javascript:void(0);"
                                        class="btn btn-outline-secondary"
                                        ><i class="fa fa-camera"></i
                                    ></a>
                                    <a
                                        href="javascript:void(0);"
                                        class="btn btn-outline-primary"
                                        ><i class="fa fa-image"></i
                                    ></a>
                                    <a
                                        href="javascript:void(0);"
                                        class="btn btn-outline-info"
                                        ><i class="fa fa-cogs"></i
                                    ></a>
                                    <a
                                        href="javascript:void(0);"
                                        class="btn btn-outline-warning"
                                        ><i class="fa fa-question"></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                        <Chat :messages="messages"></Chat>
                        <div class="chat-message clearfix">
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"
                                        ><i class="fa fa-send"></i
                                    ></span>
                                </div>
                                <form class="" @submit.prevent="sendMessage">
                                    <input
                                        v-model="formMessage.message"
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter text here..."
                                    />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
// import LayoutApp from "../../Layouts/App.vue";
import { Inertia } from "@inertiajs/inertia";
import { reactive, ref } from "@vue/reactivity";
import { onMounted } from "@vue/runtime-core";
import Pusher from "pusher-js";
import Chat from "../../Pages/Message/Chat.vue";
import { usePage } from "@inertiajs/inertia-vue3";

// props: {
//   messages: Object;
//   user: Object;
// }
// layout: LayoutApp;
const formMessage = reactive({
    message: "",
    seen: "",
    delivered: "",
});
const users = ref(usePage().props.value.users);
const messages = ref(null);
messages.value = usePage().props.value.messages;

const sendMessage = () => {
    // console.log("Hello");
    Inertia.post("message", {
        message: formMessage.message,
        user_id: usePage().props.value.user.id,
        seen: "0",
        delivered: "1",
    });
};
const showSpecificChat = (id) => {
    Inertia.get(`message/${id}`);
};
onMounted(() => {
    // console.log(usePage().props.value.user.id);
    Pusher.logToConsole = true;
    const pusher = new Pusher("6eed5bc35118755d5dd9", {
        cluster: "ap1",
    });
    const channel = pusher.subscribe("chat-app");
    channel.bind("chat", (data) => {
        messages.value.push(data);
    });
});
</script>
