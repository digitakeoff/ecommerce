export default {
    state_id: '',
    city_id: '',

    locations: [],
    cities:[],
    
    init() {
        window.axios.get('/states').then(({data}) => {
            this.locations = data
        })
 
        if(window.state_id){
            window.axios.get('/states/'+window.state_id).then(({data}) => {
                this.cities = data.cities
            })
        }
    },


    selectState(e){
        var ap = this
        this.state_id = e.target.value
        
        localStorage.setItem('state_id', e.target.value)

        if(e.target.value){
            window.axios.get('/states/'+e.target.value).then(({data}) => {
                ap.cities = data.cities
                console.log(ap.cities)
            })
        }
    },

    selectCity(e){
        this.city_id = e.target.value
        localStorage.setItem('city_id', e.target.value)
    }
}