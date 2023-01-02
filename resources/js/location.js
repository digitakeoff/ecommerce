export default {
    state_id: '',
    city_id: '',

    locations: [],
    cities:[],
    
    init() {
        this.state_id = localStorage.getItem('state_id')
        window.axios.get('/states').then(({data}) => {
            this.locations = data
        })
 
        if(this.state_id != undefined && this.state_id != 'undefined'){
            window.axios.get('/states/'+this.state_id).then(({data}) => {
                this.cities = data.cities
            })
        }
    },


    selectState(e){
        const state = JSON.parse(e.target.value)
        this.state_id = state.id
        localStorage.setItem('state_id', this.state_id)

        const selectedState = this.locations.find(state => state.id == e.target.value)

        this.cities = (selectedState != undefined) ? selectedState.cities:[]
    },

    selectCity(e){
        this.city_id = e.target.value
        localStorage.setItem('city_id', e.target.value)
    }
}