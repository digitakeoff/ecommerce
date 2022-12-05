export default () => ({
    name: '',

    errors: null,

    handleOnSubmit(){
        console.log(this.images)
        const images = JSON.parse(localStorage.getItem('images'))
        if(images.length){
            let ap = this
            const formData = new FormData
            formData.append('name', this.name)
            formData.append('image', JSON.stringify(images[images.length-1]))

            window.axios.post('/admin/bodytypes', formData).then(({data}) => {
                localStorage.removeItem('images')
                location.reload()
                console.log(data)
            }).catch((error) => {
                ap.errors = error.response.data.errors
            })
        }
    }

})