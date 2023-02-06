export default () => ({
    
    errors: null,
    images:[],
    category:'',

    selectCategory(e){
        this.category = e.target.value
        console.log(this.category)
    },

    handleOnSubmit(){

        const form = document.getElementById('productcreate')
        const data = new FormData(form)
        // console.log(data)

        window.axios.post('/products', data).then(({data}) => {
            console.log(data)
        }).catch((error) => {
            // ap.errors = error.response.data.errors
            console.log(error.response.data.errors)
        })
    }

})