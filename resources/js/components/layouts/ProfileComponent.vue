<template>

    <div class="profile--header">
        <h2>{{ user.email }}</h2>
        <p class="exit" v-on:click="logout">ВЫХОД</p>
    </div>
</template>

<script>
    import api from '../../api';
    export default {
        data(){
            return{
                user: {},
                answers: {}
            }
        },
        mounted() {
            api.get('http://127.0.0.1:8000/api/me').then(reponse => {
                this.user = reponse.data;
                console.log(this.user);
            });
            api.get('http://127.0.0.1:8000/api/answers').then(reponse => {
                this.answers = reponse.data.data;
                Object.values(this.answers).forEach(answer => {
                    if (answer.email === this.user.email)
                        this.setModal(answer.content, 'auth');

                })
            });
        },
        methods:{
            setModal(text, classes){
                this.$store.state.modalShow = true;
                this.$store.state.modalMessage = text;
                this.$store.state.modalClass = classes;
            },
            logout(){
                api.post('http://127.0.0.1:8000/api/logout').then(response =>{
                        localStorage.clear();
                        sessionStorage.clear();
                        this.$router.push('/about');
                    });
            }
        }
    }
</script>

<style scoped>
.profile--header{
    width: 100vw;
    height: 20vw;

    color: white;

    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 2vw;
}
.profile--header h2{
    font-family: sans-serif;
}
.exit{
    color: white;
    font-size: 2vw;
    font-family: sans-serif;

    cursor: pointer;

    transition: all 0.4s ease-in;
}
.exit:hover{
    color: red;
}
.profile--body{
    width: 100vw;
    height: 60vh;
}
</style>
