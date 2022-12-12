export default () => ({
    state_id: '',
    city_id: '',

    locations: [],
    cities:[],
    selectedState: '',
    
    init() {
        window.axios.get('/states').then(({data}) => {
            this.locations = data
        })
        
        this.state_id = localStorage.getItem('state_id')
        this.city_id = localStorage.getItem('city_id')
    },

    selectState(e){
        this.state_id = e.target.value
        localStorage.setItem('state_id', e.target.value)

        // if(this.state_id){
            window.axios.get('/states/'+e.target.value).then(({data}) => {
                this.cities = data.cities
                console.log(data.cities)
            })
        // }
    },

    selectCity(e){
        this.city_id = e.target.value
        localStorage.setItem('city_id', e.target.value)
    }
})