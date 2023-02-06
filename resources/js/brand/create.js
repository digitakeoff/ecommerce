export default () => ({
    name: '',
    make: '',

    errors: null,

    handleOnSubmit(){
        console.log(this.images)
        const images = JSON.parse(localStorage.getItem('images'))
        if(images.length){
            let ap = this
            const formData = new FormData
            formData.append('name', this.name)
            formData.append('image', images[images.length-1].path)

            window.axios.post('/admin/makes', formData).then(() => {
                localStorage.removeItem('images')
                location.reload()
            }).catch((error) => {
                ap.errors = error.response.data.errors
            })
        }
    }

})