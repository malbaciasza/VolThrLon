new Vue({
    el: '#app',
    data() {
        return {
            email: '',
            password: '',
            status: false,
            msg: ''
        }
    },

    mounted() {        
    },
    methods: {
        signin () {            
            axios
                .post('http://localhost:5500/api/login', {email: this.email, campus: this.campus})
                .then(response => (
                    this.status = response.data.status,
                    (this.status == true) ? window.location = "index.html" : this.msg = 'Not a valid email'                                     
                    )                    
                )             
                .catch(function (error) {
                    console.log(error);
                })
            
        }
    }
})