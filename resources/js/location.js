export default {
    state_id: '',
    city_id: '',

    locations: [],
    cities:[],
    selectedState: '',
    
    init() {
        window.axios.get('/states').then(({data}) => {
            this.locations = data
        })
        if(localStorage.getItem('state_id')){
            window.axios.get('/states/'+localStorage.getItem('state_id')).then(({data}) => {
                this.cities = data.cities
                console.log(data.cities)
            })
        }
        this.state_id = localStorage.getItem('state_id')
        this.city_id = localStorage.getItem('city_id')
    },

    selectState(e){
        this.state_id = e.target.value
        localStorage.setItem('state_id', e.target.value)
    },

    selectCity(e){
        // if(this.state_id){
            this.city_id = e.target.value
            localStorage.setItem('city_id', e.target.value)
        // }
    }
}