export default {
    state: '',
    city: '',
    locations: [],

    init() {
        this.getLocation();
        this.getCities();
    },

    getLocation(){
        window.axios.get('/location').then(({data}) => {
            this.locations = data
        })
    },

    // getStates(){
    //     window.axios.get('/location').then(({data}) => {
    //         var states = {};
    //         for(var i = 0; i < data.length; i++){
    //             states[data[i].slug] = data[i].name
    //         }
    //         this.states = states
    //         console.log(this.states)
    //     })
    // },

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
        console.log(state)
    },

    getCities(){
        if(this.state){
            var ap = this
            let state = this.locations.find(state => state.slug == ap.state)
            return state.cities
        }
    }
    
}