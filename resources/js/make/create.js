export default () => ({
    name: '',
    images: '',
    make: '',

    init(){
        this.images = JSON.parse(localStorage.getItem('images')) || []
    },

    handleOnSubmit(){
       
        const formData = new FormData
        formData.append('name', this.name)
        formData.append('make', this.make)
        
        formData.append('image', JSON.stringify(this.images[this.images.length-1]))

        window.axios.post('/makes', formData).then(({data}) => {
            console.log(data)
        })
    }

})