 new Vue({
    el: '#app',
    data() {
        return {
            name: '',
            email: '',
            password:'',
            phone: '',
            bday: '',
            org: '',
            
        }
    },

    mounted(){
        
    },
 
  methods: {
        signup () {
            console.log("working here")
            // axios
            //     .get('https://api.coindesk.com/v1/bpi/currentprice.json')
            //     .then(response => (this.message = response.data.chartName))
            
            axios
                .post('http://localhost:5500/api/volunteer', {name: this.name, email: this.email, password: this.password, phone: this.phone, bday: this.bday, org: this.org})
                .then(response => (
                    this.msg = response.data.status,
                    (this.msg == 'success') ? this.status = 'Added! Thanks.' : 'Ooops!'                                     
                    )                    
                )             
                // .then(() => ((this.msg == 'success')?this.status = 'Submitted! Thanks.':''))
                // .then(
                //     (this.msg == 'success') ? this.status = 'Submitted! Thanks.' : '',
                //     console.log('then ...')
                // )
                .catch(function (error) {
                    console.log(error);
              })
            }
        }




})


            
    