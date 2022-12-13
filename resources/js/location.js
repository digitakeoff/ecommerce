export default {
    state_id: '',
    city_id: '',

    locations: [],
    cities:[],
    
    init() {
        window.axios.get('/states').then(({data}) => {
            this.locations = data
        })
    },

    selectState(e){
        this.state_id = e.target.value
        localStorage.setItem('state_id', e.target.value)

        const selectedState = this.locations.find(state => state.id == e.target.value)

        this.cities = (selectedState != undefined) ? selectedState.cities:[]
    },

    selectCity(e){
        this.city_id = e.target.value
        localStorage.setItem('city_id', e.target.value)
    }
}