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
        const state = JSON.parse(e.target.value)
        this.state_id = state.id
        localStorage.setItem('state_id', this.state_id)

        // if(this.state_id){
            window.axios.get('/states/'+this.state_id).then(({data}) => {
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