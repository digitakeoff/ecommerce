export default {
    state: '',
    city: '',
    locations: [],

    init() {
        window.axios.get('/location').then(({data}) => {
            this.locations = data
        })
        this.state = localStorage.getItem('state')
        this.city = localStorage.getItem('city')
    },

    getStates(){
        var states = {}
        if(this.locations.length){
            for(var i = 0; i < this.locations.length; i++){
                states[this.locations[i].slug] = this.locations[i].name
            }
        }
        return states
    },

    selectState(state){
        this.state = state
        localStorage.setItem('state', this.state)
    },

    selectCity(city){
        this.city = city
        localStorage.setItem('city', this.city)
        console.log(city)
    },

    getCities(){
        if(this.state && this.locations.length){
            var ap = this
            let state = this.locations.find(state => state.slug == ap.state)
            return state.cities
        }
    }
    
}