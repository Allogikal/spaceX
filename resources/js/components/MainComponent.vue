<template>
    <HeaderComponent v-show="!adminShow"></HeaderComponent>

    <Transition name="notification">
        <Notification
        v-if="this.$store.state.modalShow"
        :classes="this.$store.state.modalClass"
        :text="this.$store.state.modalMessage"></Notification>
    </Transition>

    <main>
        <router-view v-slot="{ Component }">
            <transition
                        enter-active-class="animate__animated animate__fadeInLeftBig"
                        leave-active-class="animate__animated animate__fadeOutLeftBig"
                        mode="out-in">
                <component :is="Component" />
            </transition>
        </router-view>
    </main>
    <transition name="login">
        <LoginComponent></LoginComponent>
    </transition>
    <Transition name="shadowModal">
        <div class="modal-shadow" v-if="this.$store.state.loginModel" v-on:click="closeModel"></div>
    </Transition>
    <Transition name="letter">
        <LetterToSpaceComponent v-if="this.$store.state.letter"></LetterToSpaceComponent>
    </Transition>
</template>

<script>
    import HeaderComponent from './HeaderComponent.vue';
    import LoginComponent from './LoginComponent.vue';
    import LetterToSpaceComponent from './LetterToSpaceComponent.vue';
    import Notification from './Notification.vue';
    import store from '../store';
    export default {
        mounted() {

        },
        data(){
            return{
                adminShow: false,
                modalShow: this.$store.state.modalShow,
                modalClass: this.$store.state.modalClass,
                modalMessage: this.$store.state.modalMessage,
            }
        },
        watch:{
            '$route'(){
                this.$data.adminShow = this.adminCheck();
            }
        },
        components:{
            HeaderComponent,
            LoginComponent,
            LetterToSpaceComponent,
            Notification
        },
        methods:{
            closeModel(){
                this.$store.state.loginModel = false;
            },
            adminCheck(){
                return localStorage.getItem('role') === 'admin' ? true : false;
            }
        }
    }
</script>

<style scoped>
    main{
        overflow-x: hidden;
    }
    .shadowModal-enter-active,
    .shadowModal-leave-active{
        transition: all 0.4s ease-in;
    }
    .letter-enter-active,
    .letter-leave-active{
        transition: all 0.4s ease-in;
    }
    .letter-enter-from,
    .letter-leave-to{
        opacity: 0;
    }
    .shadowModal-enter-from,
    .shadowModal-leave-to{
        transform: translate(0,15%);
        opacity: 0;
    }
    .notification-enter-active,
    .notification-leave-active{
        transition: all 0.4s ease-in;
    }
    .notification-enter-from,
    .notification-leave-to{
        top: -25%;
        opacity: 0;
    }
    .modal-shadow{
        position: absolute;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0,0,0,0.75);
        z-index: 9;
    }
    @media screen and (max-width:425px){
        .modal-shadow{
            display: none;
        }
    }
    .login-enter-active,
    .login-leave-active{
        transition: all 0.4s 0.25s ease-in;
    }
    .login-enter-from,
    .login-leave-to{
        transform: translate(-50%,15%);
        opacity: 0;
    }
</style>
