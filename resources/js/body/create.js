export default () => ({
    name: '',

    errors: [],

    handleOnSubmit(){
        var ap = this

        const images = JSON.parse(localStorage.getItem('images'))
        if(images == null){
            ap.errors.push(['Image is required'])
            return
        }

        if(images.length){
            let ap = this
            const formData = new FormData
            formData.append('name', this.name)
            formData.append('image', images[images.length-1].path)

            window.axios.post('/admin/bodytypes', formData).then(() => {
                localStorage.removeItem('images')
            }).catch((error) => {
                ap.errors = error.response.data.errors
            })

            window.scrollTo(0, 0)
        }
    }

})